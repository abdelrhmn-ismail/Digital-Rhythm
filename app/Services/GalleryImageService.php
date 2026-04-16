<?php

namespace App\Services;

use App\Models\GalleryImage;
use App\Repositories\GalleryImageRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helpers\UploadHelper;

class GalleryImageService
{
    public function __construct(private readonly GalleryImageRepository $repository) {}

    public function list(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($filters, $perPage);
    }

    public function getAllActive(array $filters = []): Collection
    {
        return $this->repository->getAllActive($filters);
    }

    public function findById(int $id): ?GalleryImage
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): GalleryImage
    {
        return DB::transaction(function () use ($data) {
            // Handle image upload
            if (isset($data['image'])) {
                $data['image_path'] = $this->uploadImage($data['image']);
                unset($data['image']);
            }

            // Parse tags if provided
            if (isset($data['tags']) && is_string($data['tags'])) {
                $data['tags'] = array_map('trim', explode(',', $data['tags']));
            }

            $data['order'] = $data['order'] ?? 0;
            $data['is_active'] = $data['is_active'] ?? true;
            $data['is_featured'] = $data['is_featured'] ?? false;

            return $this->repository->create($data);
        });
    }

    public function update(GalleryImage $image, array $data): GalleryImage
    {
        return DB::transaction(function () use ($image, $data) {
            // Handle new image upload
            if (isset($data['image'])) {
                // Delete old image
                $this->deleteImage($image->image_path);

                $data['image_path'] = $this->uploadImage($data['image']);
                unset($data['image']);
            }

            // Parse tags if provided
            if (isset($data['tags']) && is_string($data['tags'])) {
                $data['tags'] = array_map('trim', explode(',', $data['tags']));
            }

            return $this->repository->update($image, $data);
        });
    }

    public function delete(GalleryImage $image): void
    {
        $this->deleteImage($image->image_path);
        $this->repository->delete($image);
    }

    public function toggleFeatured(GalleryImage $image): GalleryImage
    {
        return $this->repository->toggleFeatured($image);
    }

    public function toggleActive(GalleryImage $image): GalleryImage
    {
        return $this->repository->toggleActive($image);
    }

    public function reorder(array $orders): void
    {
        $this->repository->reorder($orders);
    }

    public function getCategories(): Collection
    {
        return $this->repository->getCategories();
    }

    public function stats(): array
    {
        return [
            'total' => $this->repository->countAll(),
            'active' => $this->repository->countActive(),
        ];
    }

    protected function uploadImage($image): string
    {
        return UploadHelper::upload($image, 'gallery');
    }

    protected function deleteImage(?string $imagePath): void
    {
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
