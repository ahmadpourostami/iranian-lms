<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use IranLMS\Contracts\TokenServiceInterface;
use RuntimeException;

final class TokenManager implements TokenServiceInterface
{
    public function __construct(private TokenServiceInterface $token_service)
    {
    }

    public function issue_access_token(int $user_id, array $claims = []): string
    {
        return $this->token_service->issue_access_token($user_id, $claims);
    }

    public function verify_access_token(string $token): array
    {
        return $this->token_service->verify_access_token($token);
    }

    public function revoke_access_token(string $token): void
    {
        $this->token_service->revoke_access_token($token);
    }
}
