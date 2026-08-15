# 00-Module-Standards.md

# Module Development Standards

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the development standards for every module in the Iran LMS platform.

Every module must follow the same architecture, conventions, naming rules, and communication patterns.

The goal is to ensure consistency, maintainability, scalability, and predictable development across the entire system.

---

# 2. Module Philosophy

Every module represents a single business capability.

A module should:

* Solve one business problem.
* Own its domain.
* Expose a clear public interface.
* Hide internal implementation.
* Remain independently testable.

Modules are business boundaries, not technical folders.

---

# 3. Standard Module Structure

Every module follows the same directory layout.

```text
Module/

├── Application/
│
├── Domain/
│
├── Infrastructure/
│
├── API/
│
├── Database/
│
├── Events/
│
├── Policies/
│
├── Resources/
│
├── Config/
│
└── Tests/
```

Additional folders may be added only when justified by the module.

---

# 4. Layer Responsibilities

## Domain

Contains:

* Entities
* Value Objects
* Aggregates
* Domain Services
* Domain Events
* Business Rules

The Domain layer must never depend on infrastructure.

---

## Application

Contains:

* Use Cases
* Commands
* Queries
* DTOs
* Application Services
* Event Handlers

Coordinates business operations without containing business rules.

---

## Infrastructure

Contains:

* Database
* Cache
* Storage
* External APIs
* Queue
* Mail
* Repository Implementations

Infrastructure depends on Domain—not the other way around.

---

## API

Contains:

* Controllers
* Request Validation
* Response Resources
* Route Definitions

The API layer translates HTTP requests into application commands.

---

## Database

Contains:

* Migrations
* Seeders
* Factories

No business logic belongs here.

---

## Events

Contains:

* Published Events
* Event Subscribers
* Integration Events

Events should represent completed business actions.

---

## Policies

Contains:

* Authorization Policies
* Permission Rules

Policies define **who may perform an action**, not how the action is executed.

---

## Resources

Contains:

* Localization
* Email Templates
* Notification Templates
* Static Assets

---

## Config

Contains:

* Module Configuration
* Feature Flags
* Defaults

---

## Tests

Contains:

* Unit Tests
* Integration Tests
* Feature Tests
* Contract Tests

---

# 5. Naming Conventions

Modules

```text
Courses

Learning

Commerce
```

Classes

```text
CourseService

CreateCourseCommand

CompleteLessonHandler
```

Events

```text
CoursePublished

LessonCompleted

PaymentCompleted
```

Commands

```text
CreateCourse

EnrollStudent

CompleteLesson
```

Queries

```text
GetCourse

ListCourses

SearchCourses
```

---

# 6. Dependency Rules

Allowed dependency flow:

```text
API

↓

Application

↓

Domain

↑

Infrastructure
```

Rules:

* Domain must never depend on Infrastructure.
* Modules must not access each other's internal classes.
* Circular dependencies are forbidden.

---

# 7. Public Contracts

Every module exposes only:

* Public Services
* Public DTOs
* Published Events
* REST APIs

Everything else is considered internal.

---

# 8. Database Rules

Each module owns its own persistence.

Rules:

* No shared tables.
* No direct SQL between modules.
* No foreign business logic.

Cross-module communication must use services or events.

---

# 9. Event Standards

Events:

* Must describe something that already happened.
* Must be immutable.
* Must contain only required data.

Examples

```text
EnrollmentCreated

LessonCompleted

CertificateIssued
```

Avoid command-like event names.

Incorrect

```text
CreateCourse
```

Correct

```text
CourseCreated
```

---

# 10. API Standards

Every module follows global API standards.

Including:

* Authentication
* Pagination
* Filtering
* Sorting
* Search
* Versioning
* Error Handling
* Rate Limiting

Modules must not introduce alternative conventions.

---

# 11. Configuration Standards

Configuration values should:

* Have sensible defaults.
* Be environment-aware.
* Be documented.
* Support runtime overrides where appropriate.

Configuration should never contain business logic.

---

# 12. Logging

Every module should log:

* Critical Operations
* Security Events
* Integration Failures
* Background Jobs

Logs should include:

* Request ID
* User ID
* Timestamp
* Module Name

---

# 13. Error Handling

Modules should:

* Throw domain-specific exceptions.
* Never expose infrastructure exceptions.
* Return standardized API errors.

Errors must follow the global `Errors.md` specification.

---

# 14. Performance Guidelines

Modules should:

* Minimize database queries.
* Prefer eager loading.
* Cache expensive operations.
* Use queues for long-running tasks.
* Avoid N+1 query problems.

Performance optimizations must not break module boundaries.

---

# 15. Security Standards

Every module must implement:

* Authorization
* Validation
* Input Sanitization
* Audit Logging (where required)

Sensitive data must never be exposed outside the module.

---

# 16. Testing Standards

Minimum testing requirements:

* Unit Tests
* Integration Tests
* Feature Tests

Recommended:

* Contract Tests
* Performance Tests

Each module should be testable in complete isolation.

---

# 17. Documentation Requirements

Every module must maintain:

* Overview
* Public APIs
* Events
* Configuration
* Permissions
* Database Schema
* Extension Points

Documentation is considered part of the module.

---

# 18. Extension Points

Modules should be extensible through:

* Domain Events
* Event Subscribers
* Service Contracts
* Dependency Injection
* Feature Flags

Direct modification of module internals should be avoided.

---

# 19. Module Lifecycle

Recommended lifecycle:

```text
Planning

↓

Implementation

↓

Testing

↓

Documentation

↓

Review

↓

Release

↓

Maintenance

↓

Deprecation
```

---

# 20. Quality Checklist

Before releasing a module:

* Business rules implemented
* Tests passing
* Events documented
* API documented
* Permissions verified
* Logging implemented
* Performance reviewed
* Security reviewed
* Documentation completed

---

# 21. Future Readiness

Every module should be designed to support:

* Modular Deployment
* Event Streaming
* Background Processing
* API Evolution
* Mobile Applications
* AI Features
* Multi-Tenant Architecture

Future capabilities should not require rewriting the module.

---

# 22. Design Principles

Every Iran LMS module must be:

* Cohesive
* Loosely Coupled
* Event-Driven
* Domain-Oriented
* Testable
* Observable
* Extensible
* Backward Compatible

A module is the smallest independently maintainable business unit in the platform.
