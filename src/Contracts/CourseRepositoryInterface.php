<?php

declare(strict_types=1);

namespace IranLMS\Contracts;

interface CourseRepositoryInterface
{
    public function create(array $data): int;

    public function find(int $id): ?array;

    public function update(int $id, array $data): void;

    public function delete(int $id): void;
}
