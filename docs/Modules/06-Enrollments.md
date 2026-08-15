# 06-Enrollments.md

# Enrollments Module

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Enrollments module manages the relationship between learners and courses.

It determines **who can access which course**, **when access begins**, **when it expires**, and **under what conditions enrollment is valid**.

The Enrollments module is the gatekeeper of the learning experience.

---

# 2. Responsibilities

The Enrollments module is responsible for:

* Course Enrollment
* Enrollment Validation
* Course Access
* Enrollment Status
* Access Expiration
* Enrollment Source
* Enrollment History
* Access Rules
* Prerequisite Validation
* Enrollment Transfers (Future)

---

# 3. Business Boundaries

The Enrollments module owns:

* Enrollment Records
* Access Permissions
* Enrollment Status
* Expiration Rules
* Access Validation

The module does **not** own:

* Courses
* Lessons
* Learning Progress
* Payments
* Certificates

---

# 4. Enrollment Lifecycle

```text id="v4s8pt"
Pending

↓

Active

↓

Completed

↓

Expired

↓

Archived
```

An enrollment may also be cancelled or suspended depending on business rules.

---

# 5. Enrollment Aggregate

```text id="c5mtlb"
Enrollment
│
├── Student
├── Course
├── Access Rules
├── Status
├── Enrollment Source
├── Expiration
├── Completion State
└── Audit History
```

Each enrollment represents one learner's participation in one course.

---

# 6. Enrollment Entity

Each enrollment stores:

* UUID
* Student UUID
* Course UUID
* Status
* Source
* Access Starts At
* Access Expires At
* Enrolled At
* Completed At
* Created At
* Updated At

Business modules reference enrollments by UUID.

---

# 7. Enrollment Sources

Supported sources

```text id="o9g8uv"
Purchase

Manual

Free

Coupon

Subscription

Organization

Migration

Gift (Future)
```

The enrollment source is immutable after creation.

---

# 8. Enrollment Status

Supported states

```text id="jlwmx3"
Pending

Active

Completed

Expired

Cancelled

Suspended

Archived
```

Only active enrollments allow learning access.

---

# 9. Access Validation

Before accessing a course, the module validates:

* Enrollment Exists
* Enrollment Active
* Access Not Expired
* Course Published
* User Authorized

The result is a simple allow or deny decision.

---

# 10. Expiration Rules

Enrollment expiration may be based on:

* Fixed Date
* Number of Days
* Subscription
* Organization Membership
* Lifetime Access

Lifetime enrollments never expire.

---

# 11. Prerequisite Validation

Enrollment may require:

* Previous Course Completion
* Minimum Assessment Score
* Organization Membership
* Manual Approval

The Courses module defines prerequisites.

The Enrollments module enforces them.

---

# 12. Completion State

Completion information includes:

* Course Completed
* Completion Date
* Completion Percentage
* Completion Source

Progress information comes from the Learning module.

---

# 13. Enrollment History

The module records:

* Enrollment Created
* Status Changes
* Access Granted
* Access Revoked
* Expiration Changes
* Manual Adjustments

History supports auditing and reporting.

---

# 14. Access Rules

Examples

```text id="4vhv4s"
Lifetime

365 Days

30 Days After First Access

Subscription Active

Organization License
```

Access policies should remain configurable.

---

# 15. Events

Published events

```text id="t7r8x5"
EnrollmentCreated

EnrollmentActivated

EnrollmentExpired

EnrollmentCancelled

EnrollmentCompleted

AccessGranted

AccessRevoked
```

Other modules may subscribe to these events.

---

# 16. Validation

Examples

```text id="4e2a3d"
ENROLLMENT_NOT_FOUND

COURSE_NOT_ACCESSIBLE

ACCESS_DENIED

ENROLLMENT_EXPIRED

PREREQUISITE_NOT_MET

ALREADY_ENROLLED
```

Errors follow the global API specification.

---

# 17. Performance

The Enrollments module should:

* Cache access checks
* Index active enrollments
* Optimize enrollment lookups
* Minimize authorization queries

Access validation should be lightweight.

---

# 18. Mobile Considerations

Mobile applications should:

* Cache enrollment status
* Validate access before offline mode
* Refresh expired enrollments
* Sync enrollment changes automatically

Offline learning should respect enrollment validity.

---

# 19. Future Expansion

The module supports:

* Team Enrollments
* Organization Licenses
* Bulk Enrollment
* Enrollment Approval Workflows
* Enrollment Transfers
* Waitlists
* Seat Reservations

Future capabilities should not require redesigning the module.

---

# 20. Internal Components

```text id="e3b0yr"
Enrollments
│
├── Enrollment Manager
├── Access Validator
├── Expiration Manager
├── Prerequisite Validator
├── Source Manager
├── History Manager
├── Enrollment API
└── Event Publisher
```

Each component has a clearly defined responsibility.

---

# 21. Module Dependencies

The Enrollments module depends on:

```text id="j7b2pf"
Core

Users

Courses
```

Optional integrations:

```text id="6x5y0c"
Commerce

Learning
```

Commerce creates enrollments after successful payment.

Learning consumes active enrollments to begin tracking progress.

---

# 22. Ownership Boundaries

| Data              | Owner Module |
| ----------------- | ------------ |
| User Profile      | Users        |
| Course            | Courses      |
| Enrollment        | Enrollments  |
| Learning Progress | Learning     |
| Certificate       | Certificates |
| Order             | Commerce     |

Enrollment is the single source of truth for course access.

---

# 23. Enrollment Decision Flow

```text id="2qk6nh"
User Requests Course

↓

Enrollment Found?

↓

Access Active?

↓

Prerequisites Passed?

↓

Grant Access

↓

Learning Module Starts
```

Every access request follows this validation pipeline.

---

# 24. Enrollment State Machine

```text id="5mnv3l"
Pending
   │
   ▼
Active
   │
   ├────────► Suspended
   │              │
   │              ▼
   │           Active
   │
   ├────────► Cancelled
   │
   ├────────► Expired
   │
   └────────► Completed
```

State transitions must follow business rules and generate domain events.

---

# 25. Design Principles

The Enrollments module must remain:

* Access-Centric
* Rule-Driven
* Event-Driven
* Lightweight
* Secure
* Extensible
* Backward Compatible

The module answers one fundamental question:

**"Is this learner allowed to access this course right now?"**

---

# 26. Enrollment Policies

Enrollment behavior should be configurable.

Examples:

* Allow Multiple Enrollments
* Auto-Activate Free Courses
* Require Manual Approval
* Extend Expiration After Renewal
* Auto-Complete on 100% Progress
* Reopen Expired Enrollments

Policies should be configurable without modifying business logic.

---

# 27. Integration Flow

```text id="z8k1ua"
Commerce
     │
     ▼
Enrollment Created
     │
     ▼
Access Granted
     │
     ▼
Learning Module
     │
     ▼
Course Completed
     │
     ▼
Certificates Module
```

The Enrollments module acts as the bridge between acquiring a course and beginning the learning journey.

---

# 28. Design Decision

The Enrollments module intentionally **does not know how a learner obtained access** beyond the enrollment source.

Whether access comes from:

* A purchase
* A subscription
* A coupon
* An administrator
* An organization
* A free course

…the module applies the same access validation rules.

This separation allows Commerce, Organizations, and future licensing systems to evolve independently while preserving a single, consistent access control model throughout Iran LMS.
