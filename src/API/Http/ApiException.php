<?php

declare(strict_types=1);

namespace IranLMS\API\Http;

use RuntimeException;

final class ApiException extends RuntimeException
{
    public function __construct(
        string $message,
        private readonly string $error_code,
        private readonly int $status = 400,
        private readonly array $details = []
    ) {
        parent::__construct($message);
    }

    public function get_error_code(): string { return $this->error_code; }
    public function get_status(): int { return $this->status; }
    public function get_details(): array { return $this->details; }
}
