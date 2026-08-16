<?php

declare(strict_types=1);

namespace IranLMS\Contracts;

interface AuthenticationServiceInterface
{
    /**
     * @return array{access_token:string,refresh_token:string,expires_in:int,token_type:string}
     */
    public function authenticate(string $login, string $password): array;
}
