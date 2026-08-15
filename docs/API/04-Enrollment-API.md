# 04-Enrollment-API.md

# Enrollment API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Enrollment API manages learner access to educational content.

It is responsible for creating, updating, validating, suspending, and revoking enrollments.

Enrollment determines whether a learner is allowed to access a course.

It does not process payments or manage learning progress.

---

# 2. Base Endpoint

```text
/api/v1/enrollments
```

---

# 3. Resources

The Enrollment API manages:

* Enrollments
* Enrollment Status
* Enrollment History
* Access Validation
* Expiration
* Enrollment Source
* Enrollment Metadata

---

# 4. Authentication

All endpoints require authentication.

```text
Bearer Token
```

---

# 5. Permissions

Examples

```text
enrollment.view

enrollment.create

enrollment.update

enrollment.cancel

enrollment.restore

enrollment.manage
```

---

# 6. Enrollment Status

Supported statuses

```text
Pending

Active

Completed

Suspended

Expired

Cancelled
```

Status transitions are validated by business rules.

---

# 7. Endpoints

## List Enrollments

```http
GET /enrollments
```

Supports:

* Pagination
* Filtering
* Sorting
* Search

---

## Get Enrollment

```http
GET /enrollments/{uuid}
```

Returns a single enrollment.

---

## Create Enrollment

```http
POST /enrollments
```

Example Request

```json
{
    "student_uuid": "...",
    "course_uuid": "...",
    "source": "purchase"
}
```

Possible sources:

* purchase
* free
* manual
* coupon
* subscription
* organization
* import

Event

```text
EnrollmentCreated
```

---

## Update Enrollment

```http
PUT /enrollments/{uuid}
```

Updates enrollment metadata.

---

## Suspend Enrollment

```http
POST /enrollments/{uuid}/suspend
```

Temporarily removes learning access.

Event

```text
EnrollmentSuspended
```

---

## Resume Enrollment

```http
POST /enrollments/{uuid}/resume
```

Restores learner access.

Event

```text
EnrollmentResumed
```

---

## Cancel Enrollment

```http
POST /enrollments/{uuid}/cancel
```

Revokes access permanently according to configured policies.

Event

```text
EnrollmentCancelled
```

---

## Extend Enrollment

```http
POST /enrollments/{uuid}/extend
```

Example

```json
{
    "expires_at": "2027-12-31"
}
```

---

## Validate Access

```http
GET /enrollments/access
```

Query Example

```text
?course_uuid=...

&student_uuid=...
```

Returns

```json
{
    "success": true,
    "data": {
        "has_access": true,
        "status": "active",
        "expires_at": null
    }
}
```

---

## My Enrollments

```http
GET /enrollments/me
```

Returns all enrollments belonging to the authenticated learner.

---

# 8. Filtering

Supported filters

```text
status

course

student

source

expires_at

created_at
```

---

# 9. Sorting

Supported

```text
created_at

updated_at

expires_at

status
```

---

# 10. Business Rules

Examples

A learner cannot have duplicate active enrollments for the same course.

Enrollment is required before accessing protected lessons.

Suspended enrollments cannot access learning resources.

Expired enrollments lose access automatically.

Cancelled enrollments cannot be restored unless allowed by policy.

Enrollment source is immutable after creation.

---

# 11. Events

```text
EnrollmentCreated

EnrollmentActivated

EnrollmentSuspended

EnrollmentResumed

EnrollmentExpired

EnrollmentCancelled

EnrollmentCompleted

EnrollmentExtended
```

---

# 12. Error Codes

Examples

```text
ENROLLMENT_NOT_FOUND

ALREADY_ENROLLED

ENROLLMENT_EXPIRED

ACCESS_DENIED

INVALID_ENROLLMENT_STATUS

COURSE_NOT_AVAILABLE
```

---

# 13. Performance Notes

The Enrollment API should:

* Cache access validation.
* Use indexed lookups for course and student pairs.
* Prevent duplicate enrollments with transactional operations.
* Minimize access-check latency.
* Support batch enrollment operations.

Access validation should be optimized because it is executed frequently.

---

# 14. Mobile Considerations

Mobile applications should support:

* Offline enrollment cache
* Automatic access synchronization
* Expiration reminders
* Instant access validation after purchase

The enrollment status should remain synchronized across all devices.

---

# 15. Future Expansion

The Enrollment API is designed to support:

* Cohort Enrollment
* Organization Enrollment
* Team Enrollment
* Invitation-based Enrollment
* Learning Paths
* Subscription Access
* Lifetime Access
* Scheduled Enrollment
* Multi-Tenant Enrollment

These capabilities should require no breaking API changes.
