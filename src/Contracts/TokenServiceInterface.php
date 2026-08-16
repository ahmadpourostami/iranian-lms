<?php

declare(strict_types=1);

namespace IranLMS\Contracts;

interface TokenServiceInterface
{
    public function issue_access_token(int $user_id, array $claims = []): string;

    public function verify_access_token(string $token): array;

    public function revoke_access_token(string $token): void;
}
