<?php

namespace App\Traits;

trait HasMetadata
{
    /**
     * Get or set a metadata value.
     */
    public function metadata(string $key, mixed $default = null): mixed
    {
        return $this->metadata[$key] ?? $default;
    }

    /**
     * Set a metadata value.
     */
    public function setMetadata(string $key, mixed $value): self
    {
        $metadata = $this->metadata ?? [];
        $metadata[$key] = $value;
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Check if a metadata key exists.
     */
    public function hasMetadata(string $key): bool
    {
        return array_key_exists($key, $this->metadata ?? []);
    }
}
