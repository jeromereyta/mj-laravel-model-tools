<?php

declare(strict_types=1);

namespace ModelTools\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

trait HasRelationshipWithUser
{
    public function getCreatedBy(): Model
    {
        return $this->createdBy;
    }

    public function getUpdatedBy(): ?Model
    {
        return $this->updatedBy;
    }

    public function getCreatedById(): int
    {
        return $this->getAttribute('created_by');
    }

    public function getUpdatedById(): int
    {
        return $this->getAttribute('updated_by');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo($this->getUserModelClass(), 'created_by')->withTrashed();
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo($this->getUserModelClass(), 'updated_by')->withTrashed();
    }

    public function setCreatedBy(Model $user): self
    {
        $this->createdBy()->associate($user);
        return $this;
    }

    public function setUpdatedBy(Model $user): self
    {
        $this->updatedBy()->associate($user);
        return $this;
    }

    protected function getUserModelClass(): string
    {
        return config('model-tools.user_model', User::class);
    }
}
