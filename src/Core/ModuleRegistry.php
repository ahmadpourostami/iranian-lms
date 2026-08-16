<?php

declare(strict_types=1);

namespace IranLMS\Core;

use IranLMS\Contracts\ModuleInterface;
use InvalidArgumentException;

final class ModuleRegistry
{
    /** @var array<string, ModuleInterface> */
    private array $modules = [];

    public function register(ModuleInterface $module): void
    {
        $name = $module->get_name();

        if (isset($this->modules[$name])) {
            throw new InvalidArgumentException(sprintf('Module [%s] is already registered.', $name));
        }

        $this->modules[$name] = $module;
        $module->register();
    }

    public function boot_all(): void
    {
        foreach ($this->modules as $module) {
            $module->boot();
        }
    }

    public function has(string $name): bool
    {
        return isset($this->modules[$name]);
    }

    /**
     * @return array<string, ModuleInterface>
     */
    public function all(): array
    {
        return $this->modules;
    }
}
