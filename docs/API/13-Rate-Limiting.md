# 13-Rate-Limiting.md

# API Rate Limiting

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the rate limiting strategy for the Iran LMS API.

Rate limiting protects the platform against abuse, brute-force attacks, denial-of-service attempts, and excessive resource consumption while ensuring fair access for legitimate clients.

The policy applies to:

* WordPress Frontend
* WordPress Admin
* Mobile Applications
* Third-party Integrations
* Public APIs

---

# 2. Goals

The rate limiting system should:

* Protect infrastructure
* Prevent API abuse
* Mitigate brute-force attacks
* Ensure fair resource usage
* Support burst traffic
* Scale horizontally
* Remain configurable

---

# 3. Strategy

Iran LMS uses a layered rate limiting strategy.

Limits may be applied based on:

* Authenticated User
* API Token
* IP Address
* Device Identifier
* Client Application
* Organization (Future)

Multiple limits may apply simultaneously.

---

# 4. Algorithms

Supported algorithms:

* Token Bucket
* Sliding Window
* Fixed Window
* Leaky Bucket

Default recommendation:

```text
Sliding Window
```

Authentication endpoints may use stricter algorithms.

---

# 5. Rate Limit Profiles

Example default profiles:

| Profile            |                 Requests | Time Window |
| ------------------ | -----------------------: | ----------: |
| Public API         |                       60 |    1 Minute |
| Authenticated User |                      300 |    1 Minute |
| Mobile App         |                      600 |    1 Minute |
| Admin API          |                     1000 |    1 Minute |
| Internal Services  | Unlimited (Configurable) |             |

These values should be configurable.

---

# 6. Sensitive Endpoints

Some endpoints require stricter limits.

Examples:

| Endpoint             |       Limit |
| -------------------- | ----------: |
| Login                |  5 / Minute |
| Password Reset       |    3 / Hour |
| Email Verification   |   10 / Hour |
| OTP Verification     |   10 / Hour |
| Payment Verification | 30 / Minute |
| Webhook Test         |   20 / Hour |

---

# 7. Response Headers

Every limited endpoint should return:

```text
X-RateLimit-Limit

X-RateLimit-Remaining

X-RateLimit-Reset
```

Example:

```text
X-RateLimit-Limit: 300
X-RateLimit-Remaining: 128
X-RateLimit-Reset: 1723004000
```

---

# 8. Exceeded Limit

When a client exceeds the allowed limit:

HTTP Status

```text
429 Too Many Requests
```

Response Example

```json
{
  "success": false,
  "error": {
    "code": "RATE_LIMIT_EXCEEDED",
    "message": "Too many requests.",
    "retry_after": 60
  }
}
```

Response Header

```text
Retry-After: 60
```

---

# 9. Exemptions

The following may receive custom limits:

* Administrators
* Internal Services
* Trusted Integrations
* Background Workers
* Health Checks

Exemptions must be configurable.

---

# 10. Burst Handling

Short traffic bursts may be allowed.

Example:

Normal limit:

```text
300 requests / minute
```

Burst:

```text
500 requests within 10 seconds
```

The burst policy should not compromise platform stability.

---

# 11. Distributed Systems

In clustered deployments, rate limiting must remain consistent.

Supported storage backends:

* Redis
* Database (Fallback)
* Distributed Cache

Counters must be shared across all application nodes.

---

# 12. Abuse Detection

The system should automatically detect:

* Brute-force login attempts
* Credential stuffing
* API scraping
* Automated bots
* Excessive payment verification
* Suspicious request patterns

Detected abuse may trigger temporary blocking.

---

# 13. Temporary Blocking

Blocking policy example:

```text
First Violation

↓

Rate Limited

↓

Repeated Violations

↓

Temporary Suspension

↓

Manual Review (Optional)
```

Block duration should be configurable.

---

# 14. Monitoring

The system should collect:

* Rate Limit Violations
* Top Consumers
* Blocked Requests
* Retry Counts
* Peak Request Rates
* Endpoint Usage

Metrics should be exportable to monitoring systems.

---

# 15. Logging

Every violation should record:

* Timestamp
* Request ID
* User ID (if available)
* Client IP
* Endpoint
* HTTP Method
* Client Application
* Rate Limit Profile

Sensitive information must not be logged.

---

# 16. Mobile Considerations

Mobile applications should:

* Respect Retry-After
* Retry using exponential backoff
* Batch synchronization requests
* Avoid unnecessary polling

Offline synchronization should minimize repeated requests.

---

# 17. Third-Party Integrations

External integrations should:

* Respect rate limit headers
* Implement retry strategies
* Cache responses when appropriate
* Avoid aggressive polling

Webhook-based integrations are recommended over frequent polling.

---

# 18. Future Expansion

The architecture is designed to support:

* Adaptive Rate Limiting
* AI-Based Abuse Detection
* Geographic Rate Policies
* Organization-Level Limits
* Subscription-Based API Quotas
* Premium API Plans

These capabilities should not require breaking API changes.

---

# 19. Design Principles

The rate limiting system must remain:

* Fair
* Predictable
* Configurable
* Distributed
* Secure
* Observable
* Scalable

Protection mechanisms should defend the platform without negatively affecting legitimate users.
