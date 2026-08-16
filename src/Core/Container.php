<?php

declare(strict_types=1);

namespace IranLMS\Core;

use RuntimeException;

final class Container
{
    /** @var array<string, callable|object> */
    private array $bindings = [];

    /** @var array<string, object> */
    private array $instances = [];

    public function bind(string $id, callable $factory): void
    {
        $this->bindings[$id] = $factory;
    }

    public function singleton(string $id, callable $factory): void
    {
        $this->bind($id, function () use ($id, $factory) {
            if (!isset($this->instances[$id])) {
                $this->instances[$id] = $factory($this);
            }

            return $this->instances[$id];
        });
    }

    public function instance(string $id, object $instance): void
    {
        $this->instances[$id] = $instance;
    }

    /**
     * @return mixed
     */
    public function get(string $id)
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (isset($this->bindings[$id])) {
            return ($this->bindings[$id])($this);
        }

        throw new RuntimeException(sprintf('Service [%s] is not registered.', $id));
    }

    public function has(string $id): bool
    {
        return isset($this->instances[$id]) || isset($this->bindings[$id]);
    }
}
