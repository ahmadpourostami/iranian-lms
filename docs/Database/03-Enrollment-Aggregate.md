# 03-Enrollment-Aggregate.md

# Enrollment Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Enrollment Aggregate manages a student's access to educational content.

Its responsibility is not simply registering a student into a course, but controlling the entire lifecycle of learning access.

Every request to access protected learning resources must be validated through this aggregate.

---

# 2. Responsibilities

The Enrollment Aggregate is responsible for:

* Course Enrollment
* Access Validation
* Enrollment Lifecycle
* Expiration
* Suspension
* Reactivation
* Enrollment History
* Access Permissions
* Learning Availability

This aggregate does **not** process payments or course progress.

---

# 3. Aggregate Root

```text
Enrollment
```

Every access decision originates from the Enrollment entity.

---

# 4. Entities

```text
Enrollment

EnrollmentHistory

EnrollmentAccess

EnrollmentExpiration

EnrollmentLog

EnrollmentSource
```

---

# 5. Relationships

```text
Student

│

├──── Enrollments

│          │

│          ├──── Course

│          ├──── Progress

│          ├──── Certificates

│          ├──── Quiz Attempts

│          └──── Assignments
```

Each student may have multiple enrollments.

Each course may contain multiple enrolled students.

---

# 6. Enrollment Sources

Supported enrollment methods:

* Free Enrollment
* Direct Purchase
* WooCommerce Order
* Wallet Payment
* Subscription
* Membership
* Coupon
* Manual Enrollment
* Admin Assignment
* Organization License
* Gift Enrollment

Future sources should require no architectural changes.

---

# 7. Enrollment Lifecycle

```text
Pending

↓

Active

↓

Completed

↓

Expired

↓

Suspended

↓

Cancelled
```

Additional future states:

* Refunded
* Awaiting Payment
* Frozen

---

# 8. Database Tables

```text
ilms_enrollments

ilms_enrollment_history

ilms_enrollment_logs

ilms_enrollment_access

ilms_enrollment_sources
```

---

# 9. Enrollment Entity

Core fields:

```text
ID

UUID

Student ID

Course ID

Enrollment Source

Status

Access Start

Access End

Created At

Updated At
```

---

# 10. Access Rules

An enrollment determines:

* Can view course
* Can watch lessons
* Can download resources
* Can participate in quizzes
* Can submit assignments
* Can receive certificates

Every protected feature must validate enrollment before execution.

---

# 11. Access Duration

Supported access models:

* Lifetime
* Fixed Days
* Monthly
* Yearly
* Subscription
* Organization License

Future access models should remain compatible.

---

# 12. Business Rules

Examples:

A student cannot have duplicate active enrollments for the same course.

Expired enrollments lose learning access.

Suspended enrollments cannot open lessons.

Completed enrollments retain historical records.

Deleting a course does not remove enrollment history.

Enrollment records must never be physically deleted.

Soft delete is preferred.

---

# 13. Events

This aggregate emits:

```text
EnrollmentCreated

EnrollmentActivated

EnrollmentExpired

EnrollmentSuspended

EnrollmentCancelled

EnrollmentCompleted

EnrollmentRestored

EnrollmentSourceChanged
```

Other modules subscribe to these events.

---

# 14. API Ownership

```text
GET /enrollments

GET /enrollments/{id}

POST /courses/{id}/enroll

POST /enrollments/{id}/cancel

POST /enrollments/{id}/restore

POST /enrollments/{id}/extend

GET /students/{id}/courses
```

---

# 15. Permissions

Permissions include:

* Enroll Student
* Cancel Enrollment
* Suspend Enrollment
* Restore Enrollment
* Extend Access
* View Enrollment History
* Manage All Enrollments

---

# 16. Performance Strategy

Enrollment validation occurs on nearly every protected request.

Optimization requirements:

* Cache active enrollment checks.
* Avoid repeated permission queries.
* Index Student ID and Course ID.
* Optimize access validation.
* Batch enrollment lookups when possible.

---

# 17. Mobile Considerations

Mobile clients rely on enrollment status to:

* Display accessible courses
* Continue learning
* Download lessons
* Validate offline access
* Refresh permissions

Enrollment state must synchronize across all devices.

---

# 18. Future Expansion

Potential future capabilities:

* Team Enrollments
* Organization Licenses
* Bulk Enrollment
* Learning Groups
* Course Bundles
* Academic Semesters
* Multi-campus Support
* Family Accounts
* Enterprise Licensing

The architecture must support these features without redesign.

---

# 19. Design Principles

The Enrollment Aggregate should always remain:

* Secure
* Independent
* Event-driven
* API-first
* Highly scalable
* Auditable
* Backward compatible

Enrollment is the single source of truth for learning access throughout the platform.
