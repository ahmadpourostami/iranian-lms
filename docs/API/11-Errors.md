# 11-Errors.md

# API Error Handling

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the standard error model for every API in Iran LMS.

All services must return errors using the same response structure.

No endpoint may introduce its own error format.

---

# 2. Error Philosophy

Errors should be:

* Predictable
* Consistent
* Human-readable
* Machine-readable
* Localizable
* Traceable

The client should always know:

* What happened
* Why it happened
* What should happen next

---

# 3. Standard Error Response

Every failed request returns:

```json
{
    "success": false,
    "error": {
        "code": "COURSE_NOT_FOUND",
        "message": "The requested course was not found.",
        "details": [],
        "request_id": "req_01HZX9...",
        "documentation": "/docs/errors#COURSE_NOT_FOUND"
    },
    "timestamp": "2026-08-03T10:00:00Z"
}
```

---

# 4. Error Object

| Field         | Description                      |
| ------------- | -------------------------------- |
| code          | Machine-readable error code      |
| message       | Human-readable message           |
| details       | Validation or contextual details |
| request_id    | Request trace identifier         |
| documentation | Documentation reference          |

---

# 5. HTTP Status Mapping

| HTTP Status | Meaning                |
| ----------- | ---------------------- |
| 400         | Bad Request            |
| 401         | Unauthorized           |
| 403         | Forbidden              |
| 404         | Not Found              |
| 405         | Method Not Allowed     |
| 409         | Conflict               |
| 410         | Gone                   |
| 412         | Precondition Failed    |
| 415         | Unsupported Media Type |
| 422         | Validation Failed      |
| 423         | Locked                 |
| 429         | Too Many Requests      |
| 500         | Internal Server Error  |
| 502         | Bad Gateway            |
| 503         | Service Unavailable    |
| 504         | Gateway Timeout        |

---

# 6. Validation Errors

Validation errors always return HTTP 422.

Example

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

# 7. Authentication Errors

Examples

```text
AUTH_INVALID_CREDENTIALS

AUTH_TOKEN_EXPIRED

AUTH_TOKEN_INVALID

AUTH_REFRESH_EXPIRED

AUTH_EMAIL_NOT_VERIFIED

AUTH_ACCOUNT_DISABLED

AUTH_2FA_REQUIRED
```

HTTP Status:

```text
401

403
```

---

# 8. Authorization Errors

Examples

```text
PERMISSION_DENIED

ROLE_REQUIRED

RESOURCE_FORBIDDEN

OWNER_REQUIRED
```

HTTP Status

```text
403
```

---

# 9. Course Errors

Examples

```text
COURSE_NOT_FOUND

COURSE_ALREADY_PUBLISHED

COURSE_ALREADY_ARCHIVED

COURSE_SLUG_EXISTS

COURSE_INVALID_STATUS

COURSE_PERMISSION_DENIED
```

---

# 10. Enrollment Errors

Examples

```text
ENROLLMENT_NOT_FOUND

ALREADY_ENROLLED

ENROLLMENT_EXPIRED

ENROLLMENT_CANCELLED

ACCESS_DENIED
```

---

# 11. Learning Errors

Examples

```text
LESSON_NOT_FOUND

LESSON_LOCKED

LESSON_NOT_COMPLETED

SESSION_EXPIRED

PROGRESS_INVALID

BOOKMARK_NOT_FOUND

NOTE_NOT_FOUND
```

---

# 12. Assessment Errors

Examples

```text
ASSESSMENT_NOT_FOUND

QUIZ_ATTEMPT_LIMIT_REACHED

QUIZ_TIME_EXPIRED

SUBMISSION_CLOSED

ASSESSMENT_ALREADY_SUBMITTED

GRADE_NOT_AVAILABLE
```

---

# 13. Certificate Errors

Examples

```text
CERTIFICATE_NOT_FOUND

CERTIFICATE_NOT_ELIGIBLE

CERTIFICATE_ALREADY_ISSUED
```

---

# 14. Commerce Errors

Examples

```text
PAYMENT_FAILED

PAYMENT_VERIFICATION_FAILED

ORDER_NOT_FOUND

ORDER_ALREADY_PAID

WALLET_INSUFFICIENT_BALANCE

COUPON_INVALID

COUPON_EXPIRED

REFUND_NOT_ALLOWED
```

---

# 15. Communication Errors

Examples

```text
NOTIFICATION_NOT_FOUND

MESSAGE_NOT_FOUND

DISCUSSION_LOCKED
```

---

# 16. Gamification Errors

Examples

```text
BADGE_NOT_FOUND

ACHIEVEMENT_NOT_FOUND

XP_LIMIT_REACHED
```

---

# 17. System Errors

Examples

```text
SERVICE_UNAVAILABLE

DATABASE_ERROR

CACHE_ERROR

QUEUE_ERROR

UNKNOWN_ERROR
```

---

# 18. Error Localization

Clients may request localized messages.

Example header

```text
Accept-Language: fa-IR
```

Machine-readable codes never change.

Human-readable messages may be localized.

---

# 19. Correlation ID

Every error should include a request identifier.

Example header

```text
X-Correlation-ID
```

The same identifier should appear in:

* API Response
* Logs
* Queue Jobs
* Webhook Deliveries
* Audit Logs

This enables end-to-end request tracing.

---

# 20. Error Logging

Unexpected errors should record:

* Request ID
* User ID (if available)
* Endpoint
* HTTP Method
* Timestamp
* Stack Trace
* Client IP
* User Agent

Sensitive information must never be returned to clients.

---

# 21. Retry Guidance

Some errors are retryable.

Examples

| Error               | Retry |
| ------------------- | ----- |
| SERVICE_UNAVAILABLE | Yes   |
| GATEWAY_TIMEOUT     | Yes   |
| PAYMENT_PENDING     | Yes   |
| VALIDATION_ERROR    | No    |
| PERMISSION_DENIED   | No    |

Clients should implement exponential backoff for retryable errors.

---

# 22. Documentation

Every public error code must include:

* Description
* HTTP Status
* Possible Causes
* Suggested Resolution
* Related Endpoints

Error codes should remain stable across API versions.

---

# 23. Future Expansion

The error system is designed to support:

* Problem Details (RFC 9457)
* Error Categories
* Nested Errors
* Batch Operation Errors
* Distributed Tracing
* AI-assisted Diagnostics

These enhancements should not require breaking changes.

---

# 24. Design Principles

The error system must remain:

* Consistent
* Predictable
* Version-safe
* Localizable
* Observable
* Secure
* Backward Compatible

Every error should help both developers and end users understand the problem without exposing internal implementation details.
