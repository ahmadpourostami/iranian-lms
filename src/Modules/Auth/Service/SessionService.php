<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

final class SessionService
{
    public function create(int $user_id, array $context): string
    {
        return wp_generate_uuid4();
    }

    public function revoke(string $session_id): void
    {
        // Persistence is added when the session schema is finalized.
    }
}
