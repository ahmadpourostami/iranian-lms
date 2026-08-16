<?php

declare(strict_types=1);

namespace IranLMS\Modules\Courses\Service;

use IranLMS\Contracts\CourseRepositoryInterface;
use DomainException;

final class CourseService
{
    private const STATUS_DRAFT = 'draft';
    private const STATUS_PENDING_REVIEW = 'pending_review';
    private const STATUS_PUBLISHED = 'published';
    private const STATUS_PRIVATE = 'private';
    private const STATUS_ARCHIVED = 'archived';
    private const STATUS_DELETED = 'deleted';

    public function __construct(private CourseRepositoryInterface $courses)
    {
    }

    public function create(array $data): int
    {
        $data['status'] = $data['status'] ?? self::STATUS_DRAFT;
        $data['visibility'] = $data['visibility'] ?? 'public';

        if (empty($data['instructor_id'])) {
            throw new DomainException('A course must have at least one instructor.');
        }

        return $this->courses->create($data);
    }

    public function update(int $id, array $data): void
    {
        $course = $this->require_course($id);

        if ($course['status'] === self::STATUS_DELETED) {
            throw new DomainException('A deleted course cannot be updated.');
        }

        $this->courses->update($id, $data);
    }

    public function publish(int $id): void
    {
        $course = $this->require_course($id);

        if (!in_array($course['status'], [self::STATUS_DRAFT, self::STATUS_PENDING_REVIEW, self::STATUS_PRIVATE], true)) {
            throw new DomainException('Course cannot be published from its current state.');
        }

        $this->courses->update($id, ['status' => self::STATUS_PUBLISHED]);
    }

    public function submit_for_review(int $id): void
    {
        $course = $this->require_course($id);

        if ($course['status'] !== self::STATUS_DRAFT) {
            throw new DomainException('Only draft courses can be submitted for review.');
        }

        $this->courses->update($id, ['status' => self::STATUS_PENDING_REVIEW]);
    }

    public function make_private(int $id): void
    {
        $course = $this->require_course($id);

        if ($course['status'] !== self::STATUS_PUBLISHED) {
            throw new DomainException('Only published courses can be made private.');
        }

        $this->courses->update($id, ['status' => self::STATUS_PRIVATE]);
    }

    public function archive(int $id): void
    {
        $course = $this->require_course($id);

        if ($course['status'] === self::STATUS_DELETED) {
            throw new DomainException('A deleted course cannot be archived.');
        }

        $this->courses->update($id, ['status' => self::STATUS_ARCHIVED]);
    }

    public function delete(int $id): void
    {
        $course = $this->require_course($id);

        if ($course['status'] === self::STATUS_DELETED) {
            throw new DomainException('Course is already deleted.');
        }

        $this->courses->update($id, ['status' => self::STATUS_DELETED]);
    }

    private function require_course(int $id): array
    {
        $course = $this->courses->find($id);

        if ($course === null) {
            throw new DomainException('COURSE_NOT_FOUND');
        }

        return $course;
    }
}
