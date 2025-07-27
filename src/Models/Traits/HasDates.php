<?php

declare(strict_types=1);

namespace ModelTools\Models\Traits;

use Carbon\Carbon;

trait HasDates
{
    public function getCreatedAt(): ?Carbon
    {
        $date = $this->getAttribute('created_at');

        return $date ? new Carbon($date) : null;
    }

    public function getUpdatedAt(): ?Carbon
    {
        $date = $this->getAttribute('updated_at');

        return $date ? new Carbon($date) : null;
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
