<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

final class PasswordService
{
    public function hash(string $password): string
    {
        $hash = wp_hash_password($password);

        if (!is_string($hash) || $hash === '') {
            throw new \RuntimeException('Unable to hash password.');
        }

        return $hash;
    }

    public function verify(string $password, string $hash): bool
    {
        return wp_check_password($password, $hash);
    }
}
