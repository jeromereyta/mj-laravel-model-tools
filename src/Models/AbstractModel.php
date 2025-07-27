<?php

declare(strict_types=1);

namespace ModelTools\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    /**
     * Safe access to an attribute using Laravel's getAttribute
     */
    public function attributes(string $field): mixed
    {
        return $this->getAttribute($field);
    }

    public function getId(): int
    {
        return (int) $this->getAttribute('id');
    }

    public function getCreatedAt(): ?Carbon
    {
        $date = $this->attributes('created_at');

        return $date ? Carbon::parse($date) : null;
    }

    public function getUpdatedAt(): ?Carbon
    {
        $date = $this->attributes('updated_at');

        return $date ? Carbon::parse($date) : null;
    }

    public function getCreatedAtAsString(): ?string
    {
        return $this->getCreatedAt()?->toDateTimeString();
    }

    public function getUpdatedAtAsString(): ?string
    {
        return $this->getUpdatedAt()?->toDateTimeString();
    }
}
