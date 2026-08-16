<?php

declare(strict_types=1);

namespace IranLMS\Modules\Courses\Repository;

use IranLMS\Contracts\CourseRepositoryInterface;
use IranLMS\Infrastructure\Database\DatabaseManager;
use RuntimeException;

final class CourseRepository implements CourseRepositoryInterface
{
    public function __construct(private DatabaseManager $database)
    {
    }

    public function create(array $data): int
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'courses';

        $result = $wpdb->insert($table, $data);

        if ($result === false) {
            throw new RuntimeException((string) ($wpdb->last_error ?? 'Unable to create course.'));
        }

        return (int) $wpdb->insert_id;
    }

    public function find(int $id): ?array
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'courses';

        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$table} WHERE id = %d LIMIT 1", $id),
            ARRAY_A
        );

        return is_array($row) ? $row : null;
    }

    public function update(int $id, array $data): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'courses';

        $result = $wpdb->update($table, $data, ['id' => $id]);

        if ($result === false) {
            throw new RuntimeException((string) ($wpdb->last_error ?? 'Unable to update course.'));
        }
    }

    public function delete(int $id): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'courses';

        $result = $wpdb->delete($table, ['id' => $id], ['%d']);

        if ($result === false) {
            throw new RuntimeException((string) ($wpdb->last_error ?? 'Unable to delete course.'));
        }
    }
}
