# 00-Standards.md

# Iran LMS API Standards

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the global standards that apply to every Iran LMS API endpoint.

These standards ensure consistency, predictability, security, maintainability, and compatibility across all clients.

No API endpoint may violate these standards.

---

# 2. API Design Principles

Every API must follow these principles:

* API-First
* Resource-Oriented
* Stateless
* Predictable
* Versioned
* Secure
* Consistent
* Extensible

---

# 3. Base URL

Example:

```text
/api/v1/
```

All endpoints must be versioned.

---

# 4. Naming Convention

Resources use plural nouns.

Correct:

```text
GET /courses

GET /lessons

GET /students

GET /notifications
```

Incorrect:

```text
/course

/getCourses

/loadLesson

/course-list
```

---

# 5. HTTP Methods

| Method | Purpose                                       |
| ------ | --------------------------------------------- |
| GET    | Read data                                     |
| POST   | Create resources                              |
| PUT    | Replace resource                              |
| PATCH  | Partial update                                |
| DELETE | Remove resource (Soft Delete when applicable) |

---

# 6. HTTP Status Codes

| Code | Meaning               |
| ---- | --------------------- |
| 200  | Success               |
| 201  | Created               |
| 202  | Accepted              |
| 204  | No Content            |
| 400  | Bad Request           |
| 401  | Unauthorized          |
| 403  | Forbidden             |
| 404  | Not Found             |
| 409  | Conflict              |
| 422  | Validation Error      |
| 429  | Too Many Requests     |
| 500  | Internal Server Error |

---

# 7. Standard Success Response

Every successful request returns:

```json
{
    "success": true,
    "data": {},
    "meta": {},
    "links": {},
    "timestamp": "2026-08-03T10:00:00Z"
}
```

---

# 8. Standard Error Response

Every failed request returns:

```json
{
    "success": false,
    "error": {
        "code": "COURSE_NOT_FOUND",
        "message": "The requested course does not exist.",
        "details": []
    },
    "timestamp": "2026-08-03T10:00:00Z"
}
```

---

# 9. Validation Errors

Example:

```json
{
    "success": false,
    "error": {
        "code": "VALIDATION_ERROR",
        "message": "Validation failed.",
        "details": {
            "title": [
                "Title is required."
            ],
            "price": [
                "Price must be greater than zero."
            ]
        }
    }
}
```

---

# 10. Pagination

Collection endpoints support:

```text
?page=1

&per_page=20
```

Response:

```json
{
    "data": [],
    "meta": {
        "page": 1,
        "per_page": 20,
        "total": 450,
        "last_page": 23
    }
}
```

Maximum page size is configurable.

---

# 11. Sorting

Sorting syntax:

```text
?sort=created_at

?sort=-created_at

?sort=price

?sort=title
```

Minus (-) indicates descending order.

---

# 12. Filtering

Examples:

```text
?category=programming

?level=beginner

?status=published

?price=free
```

Multiple filters may be combined.

---

# 13. Searching

Example:

```text
?q=wordpress
```

Search should support:

* Full-text search
* Partial matches
* Language-aware search
* Relevance ordering

---

# 14. Field Selection

Clients may request only required fields.

Example:

```text
?fields=id,title,thumbnail
```

This reduces payload size.

---

# 15. Includes

Related resources are loaded explicitly.

Example:

```text
?include=instructor

?include=category

?include=sections

?include=lessons
```

Nested includes:

```text
?include=sections.lessons
```

No endpoint should eager-load large relationships by default.

---

# 16. Bulk Operations

Supported where appropriate.

Examples:

```text
POST /courses/bulk-delete

POST /students/bulk-enroll

POST /notifications/bulk-read
```

Bulk requests return individual operation results.

---

# 17. Idempotency

Sensitive operations support idempotency.

Example header:

```text
Idempotency-Key:
```

Duplicate requests must not create duplicate records.

Especially required for:

* Payments
* Enrollment
* Wallet
* Certificates

---

# 18. Date & Time

All timestamps are stored in UTC.

Format:

```text
ISO-8601
```

Example:

```text
2026-08-03T14:30:15Z
```

Clients are responsible for timezone conversion.

---

# 19. UUID

Public APIs expose UUIDs.

Numeric database IDs remain internal.

Example:

```text
ec7d5db5-fdea-4d97-b9fa-a770f26b6458
```

---

# 20. Authentication Header

Example:

```text
Authorization: Bearer <access_token>
```

Tokens are documented separately.

---

# 21. Correlation ID

Every request receives:

```text
X-Correlation-ID
```

This identifier is used for:

* Logging
* Monitoring
* Debugging
* Distributed tracing

---

# 22. Rate Limiting Headers

Example:

```text
X-RateLimit-Limit

X-RateLimit-Remaining

Retry-After
```

---

# 23. Localization

Every request may include:

```text
Accept-Language: fa-IR
```

Supported examples:

* fa-IR
* en-US
* ar-SA

Responses should be localized where applicable.

---

# 24. Content Negotiation

Headers:

```text
Accept: application/json

Content-Type: application/json
```

JSON is the default response format.

---

# 25. Soft Delete

Where supported:

DELETE requests perform Soft Delete.

Restore endpoint:

```text
POST /courses/{id}/restore
```

---

# 26. API Versioning

Breaking changes require:

```text
/api/v2/
```

Minor additions do not require a new version.

---

# 27. Security

All endpoints must enforce:

* Authentication
* Authorization
* Input Validation
* Output Encoding
* Rate Limiting
* CSRF Protection (where applicable)
* HTTPS Only

---

# 28. Performance Rules

Every endpoint should:

* Support pagination.
* Avoid unnecessary joins.
* Minimize payload size.
* Use caching where appropriate.
* Avoid N+1 query problems.
* Return only requested relationships.

---

# 29. Documentation Requirements

Every endpoint documentation must include:

* Purpose
* Authentication
* Permissions
* Request Parameters
* Request Body
* Validation Rules
* Success Response
* Error Responses
* Events
* Performance Notes
* Examples

Endpoints without documentation must not be released.

---

# 30. Deprecation Policy

Deprecated endpoints remain available until the next major API version.

Deprecation response header:

```text
Deprecation: true
```

Migration guidance must always be documented.

---

# 31. Backward Compatibility

New API versions should preserve existing client integrations whenever possible.

Breaking changes must be minimized and clearly communicated.

---

# 32. Design Rules

The following rules are mandatory:

1. Business logic never belongs in controllers.
2. API controllers should remain thin.
3. Validation occurs before application services.
4. Domain models never return HTTP responses.
5. Every endpoint should perform a single responsibility.
6. Error responses must follow the global standard.
7. API behavior must be deterministic.
8. Public contracts should remain stable.
9. Database schema must never leak into public APIs.
10. Every new endpoint must comply with this document.

---

# 33. Future Readiness

The API standards are designed to support future transports without changing business logic.

Future adapters may include:

* GraphQL
* WebSocket
* gRPC
* Server-Sent Events (SSE)
* Event Streaming
* CLI Commands

These adapters should consume the same Application Layer used by the REST API.
