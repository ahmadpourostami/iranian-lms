<?php

declare(strict_types=1);

namespace IranLMS\API\Http;

final class ApiResponse
{
    public static function success(mixed $data = [], array $meta = [], array $links = [], int $status = 200): array
    {
        return ['success' => true, 'data' => $data, 'meta' => $meta, 'links' => $links, 'timestamp' => gmdate('c'), '_status' => $status];
    }

    public static function error(string $code, string $message, array $details = [], int $status = 400): array
    {
        return ['success' => false, 'error' => ['code' => $code, 'message' => $message, 'details' => $details], 'timestamp' => gmdate('c'), '_status' => $status];
    }
}
