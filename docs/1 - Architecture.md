# Architecture.md

# Iran LMS System Architecture

**Version:** 1.0
**Status:** Draft
**Last Updated:** August 2026

---

# 1. Purpose

This document defines the overall architecture of Iran LMS.

It describes how the system is organized, how modules communicate, and how different clients interact with the platform.

This document serves as the foundation for:

* Database Design
* API Design
* Module Specifications
* UI Design
* Mobile Applications
* Third-party Integrations

---

# 2. Architectural Principles

Iran LMS is built around the following principles:

* API-First
* Modular Architecture
* Component-Based UI
* Event-Driven Communication
* Headless-Ready
* Mobile Ready
* WordPress Native
* Extensible by Design

---

# 3. High-Level Architecture

```text
                        Clients

 ┌─────────────────────────────────────────────┐
 │ WordPress Theme                             │
 │ Native Android App                          │
 │ Native iOS App                              │
 │ Future Web Application                      │
 │ Third-party Services                        │
 └─────────────────────────────────────────────┘
                    │
                    ▼
             REST API Layer
                    │
                    ▼
             Iran LMS Core
                    │
     ┌──────────────┼──────────────┐
     │              │              │
 Modules      Event System     Permission
     │              │              │
     └──────────────┼──────────────┘
                    ▼
             Database Layer
```

---

# 4. System Layers

## Presentation Layer

Responsible only for rendering the user interface.

Examples:

* WordPress Templates
* Theme Components
* Gutenberg Blocks
* Elementor Widgets
* Mobile Screens

No business logic should exist in this layer.

---

## API Layer

Acts as the public interface of the system.

Responsibilities:

* Authentication
* Authorization
* Validation
* Request Handling
* Response Formatting
* Rate Limiting

All future clients communicate through this layer.

---

## Core Layer

Contains all business logic.

Examples:

* Course Management
* Enrollment
* Lesson Progress
* Quiz Engine
* Assignment Engine
* Certificate Engine
* Wallet Logic

The Core must never depend on UI implementation.

---

## Module Layer

Every major feature is an independent module.

Each module owns:

* Business Logic
* Database Tables
* API Endpoints
* Events
* Settings
* Components

Modules communicate through Events and Services instead of direct dependencies whenever possible.

---

## Data Layer

Responsible for:

* Database Access
* Data Validation
* Repository Pattern
* Query Optimization
* Caching

The rest of the application should not directly manipulate database tables.

---

# 5. Module Architecture

Every module follows the same structure.

```text
Module

├── API
├── Services
├── Repository
├── Models
├── Components
├── Templates
├── Assets
├── Events
├── Hooks
├── Permissions
└── Settings
```

This consistent structure simplifies maintenance and extension.

---

# 6. Core Modules

## Learning

* Courses
* Sections
* Lessons
* Progress
* Enrollment

---

## Assessment

* Quiz
* Assignment
* Survey

---

## Certification

* Certificates
* Templates
* Verification

---

## Instructor

* Instructor Dashboard
* Earnings
* Students
* Analytics

---

## Student

* Dashboard
* Continue Learning
* Notes
* Certificates
* Notifications

---

## Commerce

* Pricing
* Orders
* Coupons
* Wallet
* Subscription

---

## Communication

* Notifications
* Messaging
* Q&A
* Comments

---

## Integration

* SpotPlayer
* SkyRoom
* WooCommerce
* SMS
* Email
* Webhooks

---

# 7. Event-Driven Architecture

Modules should communicate through events whenever possible.

Example:

```text
Lesson Completed

↓

Update Progress

↓

Calculate Course Completion

↓

Check Certificate Eligibility

↓

Award XP

↓

Send Notification

↓

Trigger Webhook
```

A module should not need to know who is listening to its events.

---

# 8. API-First Design

Every feature must expose a documented API.

Example resources:

* Courses
* Lessons
* Sections
* Progress
* Enrollments
* Quizzes
* Assignments
* Certificates
* Notifications
* Profile

The WordPress frontend and future mobile applications must use the same business logic.

---

# 9. UI Architecture

UI is composed entirely of reusable components.

Examples:

* Course Card
* Lesson Item
* Quiz Card
* Instructor Card
* Sidebar
* Progress Bar
* Modal
* Drawer
* Empty State
* Toast
* Video Player

Components should support:

* Multiple Variants
* Dark Mode
* Light Mode
* RTL
* Responsive Layout

---

# 10. Layout System

The plugin must support interchangeable layouts.

Examples:

* Dashboard Layout A

* Dashboard Layout B

* Course Layout A

* Course Layout B

* Lesson Layout A

* Lesson Layout B

Users should be able to switch layouts without changing functionality.

---

# 11. Template Override System

Themes must be able to override plugin templates without modifying the plugin.

Priority:

```text
Theme Override

↓

Child Theme Override

↓

Plugin Default Template
```

This guarantees update safety.

---

# 12. Permission Architecture

Permissions are role-based.

Examples:

* Student
* Instructor
* Assistant Instructor
* Reviewer
* Manager
* Administrator

Every API endpoint, module, and screen must define its required permissions.

---

# 13. Data Ownership

Every module owns its own data.

Examples:

Course Module

* Courses
* Sections
* Lessons

Quiz Module

* Questions
* Attempts
* Results

Wallet Module

* Balance
* Transactions

No module should directly modify another module's data.

Communication should occur through services or events.

---

# 14. Performance Strategy

Performance principles:

* Lazy Loading
* Pagination
* Background Processing
* Intelligent Cache
* Optimized Queries
* Asset Splitting
* Deferred JavaScript
* Database Indexing

Performance is considered during architecture, not after implementation.

---

# 15. Scalability

The architecture should support:

* Thousands of courses
* Millions of lesson completions
* Large student bases
* Multiple instructors
* High API traffic
* Future cloud services

No architectural decision should unnecessarily limit future growth.

---

# 16. Future Expansion

The architecture is designed to support future capabilities without major refactoring.

Potential future modules include:

* AI Learning Assistant
* Learning Paths
* Team Training
* Organizations
* Multi-Tenant LMS
* Marketplace
* Affiliate System
* Offline Learning
* SCORM/xAPI Support
* Advanced Analytics

---

# 17. Architecture Rules

The following rules are mandatory throughout the project:

1. Business logic must never be implemented inside templates.
2. UI components must remain reusable.
3. Every major feature should be implemented as a module.
4. Modules communicate through services and events whenever possible.
5. APIs are the primary interface for data exchange.
6. Every module must be independently testable.
7. Template overrides must remain update-safe.
8. All new features must follow the established architecture.

---

# 18. Architecture Roadmap

The architecture documentation will be expanded with dedicated documents:

* Domain Model
* Database Design
* API Specification
* Authentication
* Permissions
* Event System
* Hook Reference
* Module Specifications
* Component Library
* Mobile Architecture

These documents together define the complete technical foundation of Iran LMS.
