<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

final class AuthorizationService
{
    public function can(int $user_id, string $permission): bool
    {
        if ($user_id <= 0 || $permission === '') {
            return false;
        }

        $user = get_userdata($user_id);

        if (!$user) {
            return false;
        }

        return user_can($user_id, $permission);
    }

    public function require(int $user_id, string $permission): void
    {
        if (!$this->can($user_id, $permission)) {
            throw new \RuntimeException('AUTH_FORBIDDEN');
        }
    }
}
