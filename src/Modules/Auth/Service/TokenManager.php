<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use IranLMS\Contracts\TokenServiceInterface;
use RuntimeException;

final class TokenManager implements TokenServiceInterface
{
    public function __construct(
        private TokenServiceInterface $token_service,
        private SessionService $sessions
    ) {
    }

    public function issue_access_token(int $user_id, array $claims = []): string
    {
        return $this->token_service->issue_access_token($user_id, $claims);
    }

    public function verify_access_token(string $token): array
    {
        $claims = $this->token_service->verify_access_token($token);

        if (isset($claims['sid']) && !$this->sessions->is_active((int) $claims['sid'])) {
            throw new RuntimeException('AUTH_TOKEN_INVALID');
        }

        return $claims;
    }

    public function revoke_access_token(string $token): void
    {
        $claims = $this->token_service->verify_access_token($token);

        if (isset($claims['sid'])) {
            $this->sessions->revoke((int) $claims['sid']);
        }

        $this->token_service->revoke_access_token($token);
    }
}
