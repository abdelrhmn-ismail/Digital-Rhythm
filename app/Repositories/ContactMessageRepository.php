<?php

namespace App\Repositories;

use App\Models\ContactMessage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ContactMessageRepository
{
    public function query(): Builder
    {
        return ContactMessage::query();
    }

    public function paginate(array $filters, int $perPage = 15): LengthAwarePaginator
    {
        return $this->applyFilters($this->query(), $filters)
            ->orderByDesc('created_at')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data): ContactMessage
    {
        return ContactMessage::create($data);
    }

    public function markAsRead(ContactMessage $message): ContactMessage
    {
        if (! $message->is_read) {
            $message->forceFill(['is_read' => true])->save();
        }

        return $message->fresh();
    }

    public function markAsUnread(ContactMessage $message): ContactMessage
    {
        if ($message->is_read) {
            $message->forceFill(['is_read' => false])->save();
        }

        return $message->fresh();
    }

    public function update(ContactMessage $message, array $attributes): ContactMessage
    {
        $message->fill($attributes)->save();

        return $message->fresh();
    }

    public function delete(ContactMessage $message): void
    {
        $message->delete();
    }

    public function countAll(): int
    {
        return ContactMessage::count();
    }

    public function countUnread(): int
    {
        return ContactMessage::where('is_read', false)->count();
    }

    public function allForExport(array $filters)
    {
        return $this->applyFilters($this->query(), $filters)
            ->orderByDesc('created_at')
            ->cursor();
    }

    protected function applyFilters(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['search'] ?? null, function (Builder $builder, string $search) {
                $builder->where(function (Builder $sub) use ($search) {
                    $like = "%{$search}%";
                    $sub->where('name', 'like', $like)
                        ->orWhere('email', 'like', $like)
                        ->orWhere('company', 'like', $like)
                        ->orWhere('message', 'like', $like);
                });
            })
            ->when($filters['status'] ?? null, function (Builder $builder, string $status) {
                if ($status === 'unread') {
                    $builder->where('is_read', false);
                } elseif ($status === 'read') {
                    $builder->where('is_read', true);
                }
            })
            ->when($filters['date'] ?? null, function (Builder $builder, string $dateRange) {
                $now = Carbon::now();
                if ($dateRange === 'today') {
                    $builder->whereDate('created_at', $now->toDateString());
                } elseif ($dateRange === 'week') {
                    $builder->where('created_at', '>=', $now->copy()->subDays(7));
                } elseif ($dateRange === 'month') {
                    $builder->where('created_at', '>=', $now->copy()->subDays(30));
                }
            });
    }
}
