# README.md

# Iran LMS Modules

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The **Modules** layer defines the functional architecture of Iran LMS.

Each business capability is implemented as an independent module with clear boundaries, responsibilities, and communication rules.

Modules encapsulate their own business logic while collaborating through shared contracts, domain events, and application services.

This architecture follows a **Modular Monolith** approach, enabling long-term maintainability and future scalability without introducing the complexity of microservices.

---

# 2. Objectives

The module architecture is designed to achieve:

* High Cohesion
* Low Coupling
* Clear Domain Boundaries
* Independent Development
* Predictable Dependencies
* Easy Testing
* Future Scalability

Each module should solve one business problem and expose only its public contracts.

---

# 3. Module Principles

Every module must:

* Own its business rules.
* Own its database entities.
* Publish domain events.
* Consume only documented public interfaces.
* Avoid direct database access to other modules.
* Avoid circular dependencies.
* Remain independently testable.

---

# 4. Communication Rules

Modules communicate using:

* Domain Events
* Application Services
* Public APIs
* Shared Contracts

Modules must **never** communicate through internal implementation details.

---

# 5. Module Structure

Every module follows the same internal structure.

```text
Module/

├── Application/
├── Domain/
├── Infrastructure/
├── API/
├── Database/
├── Events/
├── Policies/
├── Resources/
├── Config/
└── Tests/
```

Not every folder is required initially, but the structure should remain consistent across all modules.

---

# 6. Current Modules

Core modules included in Iran LMS:

```text
Core

Authentication

Users

Courses

Learning

Enrollments

Assessments

Certificates

Commerce

Communication

Gamification

Media

Notifications

Search

Reports

Settings
```

Additional modules may be added without modifying existing modules.

---

# 7. Module Responsibilities

Each module owns a specific business capability.

Examples:

| Module         | Responsibility                              |
| -------------- | ------------------------------------------- |
| Core           | Shared infrastructure and platform services |
| Authentication | Authentication and authorization            |
| Users          | User profiles and roles                     |
| Courses        | Course management                           |
| Learning       | Learning experience and progress            |
| Enrollments    | Course access management                    |
| Assessments    | Quizzes, assignments and grading            |
| Certificates   | Certificate generation and validation       |
| Commerce       | Payments and orders                         |
| Communication  | Messaging and discussions                   |
| Gamification   | XP, badges and achievements                 |
| Media          | Media processing and storage                |
| Notifications  | Multi-channel notification delivery         |
| Search         | Content indexing and search                 |
| Reports        | Analytics and reporting                     |
| Settings       | System configuration                        |

---

# 8. Dependency Rules

Dependencies must always point inward.

Example

```text
Application

↓

Domain

↓

Infrastructure
```

Business rules must never depend on infrastructure.

Modules must not create circular dependencies.

---

# 9. Shared Services

Some platform services are available to every module.

Examples

* Event Bus
* Queue
* Cache
* Logger
* Scheduler
* Configuration
* Authorization
* Validation
* Localization
* File Storage

Shared services belong to the Core module.

---

# 10. Events

Every module may publish domain events.

Example

```text
CoursePublished

EnrollmentCreated

LessonCompleted

CertificateIssued

PaymentCompleted
```

Other modules may subscribe to these events without introducing direct dependencies.

---

# 11. API Exposure

A module may expose:

* REST API
* Internal Services
* Event Handlers
* CLI Commands
* Scheduled Jobs

Internal implementation details must never be exposed publicly.

---

# 12. Database Ownership

Each module owns its data model.

Rules:

* No direct table access between modules.
* Shared data is accessed through services or events.
* Database ownership follows domain ownership.

This minimizes coupling and simplifies future migrations.

---

# 13. Testing

Every module should maintain:

* Unit Tests
* Integration Tests
* Contract Tests
* Feature Tests

Modules should be testable in isolation.

---

# 14. Configuration

Each module may define its own configuration.

Example

```text
config/module-name.php
```

Configuration should remain isolated from other modules whenever possible.

---

# 15. Extensibility

Modules should support extension through:

* Events
* Hooks
* Policies
* Service Contracts
* Dependency Injection

Direct modification of module internals should be avoided.

---

# 16. Performance

Modules should:

* Minimize database queries
* Cache frequently used data
* Use background jobs for heavy operations
* Publish events asynchronously where appropriate

Performance optimizations should not affect module boundaries.

---

# 17. Security

Each module is responsible for:

* Authorization
* Input Validation
* Business Rule Validation
* Audit Logging (where applicable)

Security should be enforced at the module boundary.

---

# 18. Future Expansion

The architecture supports future modules such as:

* Organizations
* Multi-Tenant
* AI Assistant
* Live Classes
* SCORM
* xAPI
* Marketplace
* Plugin SDK

These modules should integrate without requiring structural changes to existing modules.

---

# 19. Design Philosophy

Iran LMS is designed as a **Modular Monolith**.

This approach combines the simplicity of a single deployable application with the maintainability of modular architecture.

If required in the future, selected modules may be extracted into independent services with minimal changes.

---

# 20. Design Principles

Every module should remain:

* Independent
* Cohesive
* Loosely Coupled
* Event-Driven
* Testable
* Extensible
* Backward Compatible

The module system forms the foundation for the long-term evolution of Iran LMS.
