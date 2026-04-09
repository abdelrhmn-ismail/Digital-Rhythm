<?php

namespace App\Repositories;

use App\Models\GalleryImage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class GalleryImageRepository
{
    public function query(): Builder
    {
        return GalleryImage::query();
    }

    public function paginate(array $filters, int $perPage = 15): LengthAwarePaginator
    {
        return $this->applyFilters($this->query(), $filters)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getAllActive(array $filters = []): Collection
    {
        return $this->applyFilters(
            $this->query()->where('is_active', true),
            $filters
        )
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get();
    }

    public function findById(int $id): ?GalleryImage
    {
        return GalleryImage::find($id);
    }

    public function create(array $data): GalleryImage
    {
        return GalleryImage::create($data);
    }

    public function update(GalleryImage $image, array $data): GalleryImage
    {
        $image->fill($data)->save();

        return $image->fresh();
    }

    public function delete(GalleryImage $image): void
    {
        $image->delete();
    }

    public function toggleFeatured(GalleryImage $image): GalleryImage
    {
        $image->update(['is_featured' => ! $image->is_featured]);

        return $image->fresh();
    }

    public function toggleActive(GalleryImage $image): GalleryImage
    {
        $image->update(['is_active' => ! $image->is_active]);

        return $image->fresh();
    }

    public function reorder(array $orders): void
    {
        foreach ($orders as $item) {
            GalleryImage::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }
    }

    public function getCategories(): Collection
    {
        return GalleryImage::where('is_active', true)
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();
    }

    public function countAll(): int
    {
        return GalleryImage::count();
    }

    public function countActive(): int
    {
        return GalleryImage::where('is_active', true)->count();
    }

    protected function applyFilters(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['search'] ?? null, function (Builder $builder, string $search) {
                $builder->where(function (Builder $sub) use ($search) {
                    $like = "%{$search}%";
                    $sub->where('title', 'like', $like)
                        ->orWhere('caption', 'like', $like)
                        ->orWhere('category', 'like', $like)
                        ->orWhere('tags', 'like', $like);
                });
            })
            ->when($filters['category'] ?? null, function (Builder $builder, string $category) {
                $builder->where('category', $category);
            })
            ->when($filters['featured'] ?? null, function (Builder $builder, string $featured) {
                if ($featured === 'true') {
                    $builder->where('is_featured', true);
                }
            })
            ->when($filters['active'] ?? null, function (Builder $builder, string $active) {
                $builder->where('is_active', $active === 'true');
            });
    }
}
