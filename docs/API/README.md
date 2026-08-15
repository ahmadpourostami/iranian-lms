# README.md

# Iran LMS API Documentation

**Version:** 1.0
**Status:** Draft

---

# Introduction

The Iran LMS API provides a unified interface for interacting with every feature of the platform.

It is designed around an **API-First** architecture, ensuring that all clients—including the WordPress frontend, native mobile applications, third-party integrations, and future web applications—communicate with the same business logic.

The API layer acts as a transport mechanism only.

Business rules are implemented in the Application and Domain layers.

---

# Objectives

The API is designed to:

* Expose all platform capabilities.
* Maintain consistency across all clients.
* Be versionable.
* Be secure.
* Be scalable.
* Be extensible.
* Support future technologies without redesign.

---

# API Philosophy

Iran LMS follows these principles:

* API-First
* Resource-Oriented
* Stateless
* Versioned
* Predictable
* Secure
* Backward Compatible

Every endpoint should have a single responsibility.

---

# Directory Structure

```text
04-API/

README.md

00-Standards.md

01-Authentication.md

02-Course-API.md

03-Learning-API.md

04-Enrollment-API.md

05-Assessment-API.md

06-Certificate-API.md

07-Commerce-API.md

08-Communication-API.md

09-Gamification-API.md

10-Webhooks.md

11-Errors.md

12-Versioning.md

13-Rate-Limiting.md

14-Pagination.md

15-Filtering.md

16-Sorting.md

17-Search.md

18-Upload.md
```

---

# API Architecture

```text
Client

↓

REST API

↓

Application Layer

↓

Domain Layer

↓

Repositories

↓

Database
```

REST is an adapter.

Business logic must never exist inside controllers.

---

# Supported Clients

The API is shared across:

* WordPress Frontend
* WordPress Admin
* Native Android
* Native iOS
* Future SPA
* External Applications
* Automation Services

No client receives special business rules.

---

# API Categories

The API is organized into domains.

## Authentication

Authentication and authorization.

---

## Course

Course management.

---

## Learning

Learning experience.

---

## Enrollment

Learning access.

---

## Assessment

Quizzes and assignments.

---

## Certificate

Digital credentials.

---

## Commerce

Orders, payments, subscriptions and wallet.

---

## Communication

Notifications, messages and discussions.

---

## Gamification

XP, badges, achievements and leaderboards.

---

# URL Structure

Example:

```text
/api/v1/courses

/api/v1/courses/{id}

/api/v1/lessons/{id}
```

Every endpoint belongs to a version.

---

# API Versioning

Versioning follows URI versioning.

Example:

```text
/api/v1/

/api/v2/
```

Breaking changes always require a new version.

---

# Authentication

Authentication methods are documented separately.

Supported mechanisms include:

* JWT
* Access Token
* Refresh Token
* API Token

Future authentication methods may be added.

---

# Authorization

Authorization is permission-based.

Examples:

* View Course
* Publish Course
* Complete Lesson
* Review Assignment
* Issue Certificate

Authentication identifies the user.

Authorization determines what the user may do.

---

# Request Flow

```text
Client

↓

Authentication

↓

Authorization

↓

Validation

↓

Application Service

↓

Domain

↓

Repository

↓

Database

↓

Response
```

---

# Response Format

Every endpoint returns a consistent response structure.

The exact specification is defined in **00-Standards.md**.

---

# Error Handling

Errors are standardized.

Every error includes:

* Error Code
* Message
* HTTP Status
* Optional Details

The complete specification is documented in **11-Errors.md**.

---

# Pagination

Large datasets are paginated.

Pagination rules are documented in:

```text
14-Pagination.md
```

---

# Filtering

Filtering is supported wherever applicable.

Documentation:

```text
15-Filtering.md
```

---

# Sorting

Sorting rules are documented in:

```text
16-Sorting.md
```

---

# Search

Search capabilities are documented in:

```text
17-Search.md
```

---

# Uploads

File uploads use a unified interface.

Documentation:

```text
18-Upload.md
```

---

# Webhooks

External systems may subscribe to platform events.

Examples:

* Course Published
* Enrollment Created
* Payment Completed
* Certificate Issued

Webhook documentation is maintained separately.

---

# Rate Limiting

Rate limiting protects the platform against abuse.

Rules are documented in:

```text
13-Rate-Limiting.md
```

---

# API Lifecycle

Every endpoint follows a defined lifecycle.

```text
Draft

↓

Review

↓

Development

↓

Testing

↓

Stable

↓

Deprecated

↓

Removed
```

Deprecated endpoints remain available until the next major API version.

---

# Documentation Rules

Each API document must include:

* Purpose
* Endpoint
* Authentication
* Authorization
* Request Parameters
* Request Body
* Validation Rules
* Response Examples
* Error Codes
* Events
* Business Notes
* Performance Notes

No endpoint should be documented without complete examples.

---

# Design Principles

Every API must be:

* Predictable
* Consistent
* Stateless
* Secure
* Extensible
* Versioned
* Well Documented
* Backward Compatible

Developers should be able to understand and integrate the API without reading the platform source code.

---

# Future Roadmap

The API architecture is prepared for future expansion, including:

* GraphQL Adapter
* WebSocket Gateway
* gRPC Services
* Event Streaming
* Public Developer Platform
* SDKs for JavaScript, PHP, Dart and Swift
* OpenAPI (Swagger) Documentation
* Postman Collections
* API Explorer

These capabilities should be added without modifying the Domain layer or breaking existing integrations.
