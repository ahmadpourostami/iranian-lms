# 01-Core.md

# Core Module

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Core module is the foundation of the Iran LMS platform.

It provides the shared infrastructure, platform services, architectural contracts, and cross-cutting concerns used by every other module.

The Core module contains no educational business logic.

Its responsibility is to support the platform itself.

---

# 2. Responsibilities

The Core module is responsible for:

* Application Bootstrap
* Dependency Injection
* Module Registration
* Configuration Management
* Event Bus
* Queue Integration
* Logging
* Caching
* Scheduling
* Localization
* Feature Flags
* Service Discovery
* Shared Contracts
* Audit Infrastructure
* Health Monitoring

Every other module depends on Core.

---

# 3. Architecture

```text id="wq7q9e"
Application

↓

Core

↓

Infrastructure
```

The Core module acts as the platform layer shared by all business modules.

---

# 4. Responsibilities Matrix

| Capability           | Owned by Core |
| -------------------- | ------------- |
| Bootstrap            | ✅             |
| Event Bus            | ✅             |
| Queue                | ✅             |
| Logging              | ✅             |
| Configuration        | ✅             |
| Cache                | ✅             |
| Scheduler            | ✅             |
| Storage Abstraction  | ✅             |
| Localization         | ✅             |
| Feature Flags        | ✅             |
| Audit Infrastructure | ✅             |
| Health Checks        | ✅             |

---

# 5. Bootstrap

Core initializes the platform.

Responsibilities:

* Load Configuration
* Register Modules
* Register Services
* Register Event Subscribers
* Register Routes
* Register Scheduled Tasks

Application startup always begins in Core.

---

# 6. Dependency Injection

Core owns the dependency injection container.

Responsibilities:

* Service Registration
* Interface Binding
* Lazy Resolution
* Module Discovery

Business modules must depend on interfaces rather than implementations.

---

# 7. Configuration

Core manages global configuration.

Examples

```text id="wb0whu"
Application

Database

Cache

Storage

Queue

Mail

Localization

API

Security
```

Module-specific configuration belongs inside the respective module.

---

# 8. Event Bus

Core provides the global event bus.

Responsibilities

* Publish Events
* Subscribe Events
* Queue Events
* Retry Failed Events
* Event Logging

Example

```text id="y6d8f3"
CoursePublished

↓

Event Bus

↓

Search

Notification

Gamification
```

The publisher never knows who consumes the event.

---

# 9. Queue System

Core manages asynchronous processing.

Examples

* Email Delivery
* Notification Dispatch
* Video Processing
* Certificate Generation
* Webhook Delivery
* Search Index Updates

Long-running tasks should never block HTTP requests.

---

# 10. Cache Layer

Core provides a unified cache abstraction.

Supported providers

* Redis
* Memcached
* Database
* File Cache

Responsibilities

* Cache Keys
* Cache Tags
* Cache Invalidation
* TTL Management

Business modules should not depend on a specific cache provider.

---

# 11. Logging

Core provides centralized logging.

Log Categories

* Application
* Security
* Audit
* Queue
* API
* Performance
* Integration

Logs should be structured whenever possible.

---

# 12. Audit Infrastructure

Core provides audit capabilities.

Audit records may include:

* User ID
* Module
* Action
* Resource
* Timestamp
* IP Address
* Request ID

Audit storage is centralized.

---

# 13. Scheduler

Core owns background scheduling.

Examples

* Cleanup Jobs
* Retry Jobs
* Expired Enrollments
* Certificate Maintenance
* Search Optimization
* Statistics Refresh

Scheduling should be configurable.

---

# 14. Localization

Core provides localization services.

Supported capabilities

* Translation
* Date Formatting
* Number Formatting
* Currency Formatting
* Time Zone Handling

Business modules should never implement localization independently.

---

# 15. Feature Flags

Core manages feature toggles.

Examples

```text id="3qlf8f"
Certificates

Wallet

Gamification

Live Classes

AI Assistant
```

Feature flags allow gradual rollout without code changes.

---

# 16. Storage Abstraction

Core exposes a storage interface.

Supported providers

* Local Storage
* Amazon S3
* Cloudflare R2
* Google Cloud Storage
* Azure Blob Storage

Business modules interact only with the storage contract.

---

# 17. Health Monitoring

Core exposes health endpoints.

Checks may include:

* Database
* Cache
* Queue
* Storage
* Mail
* Search
* Background Workers

Example endpoint

```http id="mwg0df"
GET /system/health
```

---

# 18. Shared Contracts

Core defines shared contracts used across modules.

Examples

* Repository Interfaces
* Service Interfaces
* Event Interfaces
* Notification Contracts
* Storage Contracts
* Queue Contracts

These contracts ensure loose coupling.

---

# 19. Security Services

Core provides platform-wide security services.

Including:

* Encryption
* Hashing
* CSRF Protection
* Token Utilities
* Secret Management
* Rate Limiting Infrastructure

Security logic should not be duplicated across modules.

---

# 20. Module Registry

Core maintains the module registry.

Each module declares:

* Name
* Version
* Dependencies
* Status
* Configuration
* Service Provider

Modules are loaded automatically during bootstrap.

---

# 21. Performance Services

Core provides shared performance infrastructure.

Examples

* Cache Manager
* Lazy Loading
* Queue Workers
* Background Processing
* Performance Metrics

Performance optimizations remain transparent to business modules.

---

# 22. Error Infrastructure

Core centralizes:

* Exception Handling
* Error Mapping
* API Error Responses
* Logging
* Correlation IDs

All modules follow the same error standards.

---

# 23. Observability

Core provides observability services.

Collected metrics may include:

* Request Count
* Response Time
* Queue Length
* Event Throughput
* Cache Hit Rate
* Database Performance

Metrics should be exportable to monitoring systems.

---

# 24. Extension Points

Core allows extension through:

* Service Providers
* Event Subscribers
* Middleware
* Hooks
* Contracts
* Module Registration

Extensions should not require modifying the Core module.

---

# 25. Future Expansion

The Core architecture supports:

* Plugin Marketplace
* Module Hot Loading
* Multi-Tenant
* Distributed Workers
* AI Services
* Event Streaming
* Cluster Deployments
* Cloud-Native Infrastructure

These capabilities should integrate without changing existing module contracts.

---

# 26. Design Principles

The Core module must remain:

* Stable
* Lightweight
* Independent
* Framework-Agnostic (where practical)
* Event-Driven
* Extensible
* Observable

Business logic must never be implemented inside the Core module.

---

# 27. Internal Components

The Core module consists of several platform components.

```text id="ewqvcx"
Core
│
├── Bootstrap
├── Container
├── Module Registry
├── Configuration
├── Event Bus
├── Queue Manager
├── Cache Manager
├── Logger
├── Scheduler
├── Storage Manager
├── Localization
├── Feature Flags
├── Health Monitor
├── Audit Manager
├── Security Services
├── Contracts
└── Metrics Collector
```

Each component has a single responsibility and serves the entire platform.

---

# 28. Core Dependency Rules

The Core module has special dependency rules.

```text id="1ttr3t"
Core

↓

(No Business Modules)
```

Rules:

* Core may not depend on any business module.
* Business modules may depend on Core contracts only.
* Core must remain reusable and independent of domain-specific logic.
* Cross-module communication must occur through Core infrastructure (Events, Contracts, Queue, etc.).

These rules preserve the integrity of the platform architecture and prevent architectural erosion over time.
