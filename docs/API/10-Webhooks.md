# 10-Webhooks.md

# Webhooks

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Webhook system allows Iran LMS to notify external systems whenever important events occur.

Webhooks enable integrations without polling the API.

The Webhook layer is event-driven and independent from the business domain.

---

# 2. Goals

The Webhook system should provide:

* Real-time notifications
* Reliable delivery
* Retry support
* Secure communication
* Event filtering
* Developer-friendly integrations

---

# 3. Architecture

```text
Domain Event

↓

Application Event

↓

Webhook Dispatcher

↓

Delivery Queue

↓

External Endpoint
```

Business logic never communicates directly with external services.

---

# 4. Base Endpoint

Webhook management:

```text
/api/v1/webhooks
```

---

# 5. Resources

The Webhook API manages:

* Webhooks
* Event Subscriptions
* Delivery Attempts
* Retry Queue
* Secret Keys
* Delivery Logs

---

# 6. Authentication

Webhook management endpoints require:

```text
Bearer Token
```

Outgoing webhook requests are authenticated using signatures.

---

# 7. Endpoints

## List Webhooks

```http
GET /webhooks
```

Returns configured webhook endpoints.

---

## Get Webhook

```http
GET /webhooks/{uuid}
```

Returns webhook details.

---

## Create Webhook

```http
POST /webhooks
```

Example Request

```json
{
    "name": "CRM Integration",
    "url": "https://example.com/webhook",
    "events": [
        "course.published",
        "payment.completed",
        "certificate.issued"
    ]
}
```

Event

```text
WebhookCreated
```

---

## Update Webhook

```http
PUT /webhooks/{uuid}
```

Updates webhook configuration.

---

## Delete Webhook

```http
DELETE /webhooks/{uuid}
```

Disables webhook delivery.

---

## Test Webhook

```http
POST /webhooks/{uuid}/test
```

Sends a sample payload.

Returns delivery result.

---

## Retry Delivery

```http
POST /webhooks/deliveries/{uuid}/retry
```

Retries a failed delivery.

---

## Delivery Logs

```http
GET /webhooks/deliveries
```

Returns webhook delivery history.

Supports filtering by:

* Event
* Status
* Date
* Webhook

---

# 8. Event Categories

Supported event groups:

```text
Authentication

Course

Learning

Enrollment

Assessment

Certificate

Commerce

Communication

Gamification

System
```

---

# 9. Supported Events

Examples

```text
course.created

course.updated

course.published

course.deleted

lesson.completed

learning.started

learning.finished

enrollment.created

enrollment.cancelled

quiz.submitted

assignment.reviewed

certificate.issued

payment.completed

refund.created

wallet.updated

notification.created

badge.unlocked

achievement.unlocked
```

New events should be added without changing the delivery protocol.

---

# 10. Payload Format

Example

```json
{
    "id": "evt_01J...",
    "event": "payment.completed",
    "occurred_at": "2026-08-03T18:00:00Z",
    "data": {
        "order_uuid": "...",
        "student_uuid": "...",
        "amount": 950000
    }
}
```

Every payload must include:

* Event ID
* Event Name
* Timestamp
* Payload Data

---

# 11. Security

Outgoing requests include:

```text
X-Webhook-ID

X-Webhook-Event

X-Webhook-Signature

X-Webhook-Timestamp
```

The receiver validates the signature using the shared secret.

---

# 12. Delivery Rules

Webhook delivery should:

* Be asynchronous
* Preserve event order where required
* Respect timeouts
* Retry failed requests
* Avoid duplicate deliveries

---

# 13. Retry Policy

Recommended strategy:

```text
1 minute

↓

5 minutes

↓

15 minutes

↓

30 minutes

↓

1 hour

↓

6 hours

↓

24 hours
```

Maximum retry count should be configurable.

---

# 14. Delivery Status

Supported states:

```text
Queued

Processing

Delivered

Failed

Retrying

Cancelled
```

---

# 15. Error Handling

Failures should record:

* HTTP Status
* Response Body
* Timeout
* Retry Count
* Error Message

Delivery failures must never interrupt the originating business process.

---

# 16. Filtering

Webhook subscriptions may filter events by:

* Event Type
* Course
* Organization
* Instructor
* Student
* Module

Only matching events are delivered.

---

# 17. Performance Notes

The Webhook system should:

* Use background queues.
* Batch retry processing.
* Prevent duplicate deliveries.
* Compress large payloads where supported.
* Archive historical logs.

Webhook execution must never block user requests.

---

# 18. Mobile Considerations

Mobile applications should not consume webhooks directly.

Instead, mobile notifications should be delivered through:

* Push Notification Services
* Notification API
* Synchronization APIs

---

# 19. Future Expansion

The architecture is prepared for:

* Webhook Versioning
* Custom Payload Templates
* Event Replay
* Event Streaming
* Amazon SQS
* RabbitMQ
* Apache Kafka
* Google Pub/Sub
* Azure Event Grid

These capabilities should require no breaking changes.

---

# 20. Design Principles

The Webhook system must remain:

* Event-driven
* Reliable
* Secure
* Asynchronous
* Observable
* Extensible
* Backward Compatible

Every business event should be publishable without modifying existing integrations.
