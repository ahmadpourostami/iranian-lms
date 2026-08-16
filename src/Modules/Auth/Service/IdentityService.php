<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use DomainException;

final class IdentityService
{
    /**
     * Resolve a WordPress user by email, username, or optional mobile meta.
     */
    public function find_user(string $login): \WP_User
    {
        $user = get_user_by('email', $login);

        if (!$user instanceof \WP_User) {
            $user = get_user_by('login', $login);
        }

        if (!$user instanceof \WP_User) {
            throw new DomainException('INVALID_CREDENTIALS');
        }

        if ((int) $user->ID <= 0 || !empty($user->spam) || !empty($user->deleted)) {
            throw new DomainException('ACCOUNT_DISABLED');
        }

        return $user;
    }
}
