# API-Keys.md

# API Keys Module

**Version:** 1.0
**Status:** Future Architecture

---

# 1. Purpose

The API Keys module provides secure programmatic access to the Iran LMS Platform.

It enables third-party applications, mobile apps, plugins, external services, and enterprise integrations to authenticate without using user passwords.

The module manages the complete lifecycle of API credentials, including creation, rotation, expiration, revocation, auditing, and usage monitoring.

---

# 2. Vision

API Keys are first-class platform resources.

They are designed to support future developer ecosystems, public APIs, SDKs, partner integrations, and enterprise deployments.

---

# 3. Responsibilities

The API Keys module is responsible for:

* API Key Management
* Secret Generation
* Key Rotation
* Key Revocation
* Expiration
* Permissions
* Scopes
* Usage Analytics
* Audit Logs
* Rate Limit Profiles

---

# 4. Business Boundaries

The API Keys module owns:

* API Keys
* Secrets
* Key Permissions
* Scopes
* Usage Statistics
* Rotation History
* Revocation Status

The module does **not** own:

* Users
* Organizations
* OAuth Sessions
* Tokens
* Authentication Providers

API Keys authenticate applications, not users.

---

# 5. API Key Aggregate

```text
API Key
│
├── Secret
├── Scopes
├── Permissions
├── Usage
├── Rotation
├── Expiration
└── Audit Log
```

Every API Key has an independent lifecycle.

---

# 6. API Key Entity

Each key contains:

* UUID
* Name
* Prefix
* Secret Hash
* Owner
* Organization
* Status
* Created At
* Expires At
* Last Used At
* Rotated At

Secrets are never stored in plaintext.

---

# 7. Key Types

Supported key types

```text
Personal API Key

Application Key

Organization Key

Server-to-Server Key

Temporary Key

Read-Only Key
```

Each type has different security policies.

---

# 8. Permission Scopes

Examples

```text
courses.read

courses.write

learning.read

learning.write

users.read

commerce.read

reports.read

admin
```

Scopes follow the principle of least privilege.

---

# 9. Key Lifecycle

```text
Create

↓

Activate

↓

Use

↓

Rotate

↓

Expire

↓

Revoke
```

Keys may be rotated without service interruption.

---

# 10. Secret Generation

Requirements

* Cryptographically Secure
* High Entropy
* Unique Prefix
* Non-Reversible Storage
* One-Time Display

Secrets are shown only during creation.

---

# 11. Authentication Flow

```text
Application

↓

API Key

↓

API Gateway

↓

Validation

↓

Permission Check

↓

Business API
```

All requests pass through the API Gateway.

---

# 12. Rotation

Supported strategies

```text
Manual

Scheduled

Automatic

Emergency Rotation
```

Old keys may remain valid during a configurable grace period.

---

# 13. Expiration

Supported expiration policies

```text
Never

30 Days

90 Days

180 Days

1 Year

Custom
```

Expired keys are automatically rejected.

---

# 14. Revocation

A revoked key:

* Cannot authenticate
* Cannot be restored automatically
* Remains in audit logs
* Preserves historical usage

Revocation is immediate.

---

# 15. Rate Limit Profiles

Examples

```text
Free

Professional

Enterprise

Internal

Unlimited
```

Each profile defines independent request limits.

---

# 16. Usage Monitoring

Collected metrics

* Request Count
* Last Request
* Failed Requests
* Average Latency
* IP Addresses
* Bandwidth
* Error Rate

Usage statistics support operational monitoring.

---

# 17. Audit Logging

Every important action is logged.

Examples

```text
Key Created

Key Used

Key Rotated

Key Revoked

Permission Updated

Expiration Changed
```

Audit logs are immutable.

---

# 18. Events

Published events

```text
ApiKeyCreated

ApiKeyRotated

ApiKeyRevoked

ApiKeyExpired

ApiKeyUsed
```

Other modules may subscribe to these events.

---

# 19. Validation

Examples

```text
INVALID_API_KEY

KEY_EXPIRED

KEY_REVOKED

INSUFFICIENT_SCOPE

INVALID_SIGNATURE

RATE_LIMIT_EXCEEDED
```

Validation follows the global API specification.

---

# 20. Performance

The API Keys module should:

* Cache active keys
* Cache permissions
* Support millions of requests
* Validate keys in constant time
* Minimize database lookups

Authentication should add minimal latency.

---

# 21. Mobile Considerations

Mobile applications should **not** embed permanent API Keys.

Instead, they should use:

* OAuth
* Access Tokens
* Refresh Tokens

API Keys are intended for trusted applications and backend services.

---

# 22. Future Expansion

The architecture supports:

* Scoped Organizations
* Temporary Keys
* Signed Requests
* IP Restrictions
* Domain Restrictions
* Mutual TLS
* Hardware Security Modules (HSM)
* Secret Vault Integration

Future security features should require no redesign.

---

# 23. Internal Components

```text
API Keys
│
├── Key Manager
├── Secret Generator
├── Scope Manager
├── Rotation Manager
├── Validation Engine
├── Usage Tracker
├── Audit Logger
├── API Keys API
└── Event Publisher
```

Each component has a single responsibility.

---

# 24. Module Dependencies

The API Keys module depends on:

```text
Core

Users

Organizations (Optional)

Settings
```

The API Gateway consumes API Keys during authentication.

---

# 25. Ownership Boundaries

| Data          | Owner Module  |
| ------------- | ------------- |
| User          | Users         |
| Organization  | Organizations |
| API Key       | API Keys      |
| Secret Hash   | API Keys      |
| Scopes        | API Keys      |
| Usage Metrics | API Keys      |

API Keys own only authentication credentials for applications.

---

# 26. Security

The module should provide:

* Secret Hashing
* Constant-Time Comparison
* One-Time Secret Display
* Key Prefixes
* Audit Logging
* Rotation Policies
* IP Allow Lists (Future)
* Secret Encryption

Security is the highest priority.

---

# 27. Design Principles

The API Keys module must remain:

* Secure
* Stateless
* Provider-Agnostic
* Auditable
* Scalable
* Extensible
* Backward Compatible

API Keys should never expose sensitive information after creation.

---

# 28. Key Format

Example

```text
ilm_live_8P3M...xxxxxxxxxxxxxxxx

ilm_test_A82L...xxxxxxxxxxxxxxxx
```

Recommended structure

```text
Prefix + Environment + Random Secret
```

The prefix allows quick identification without exposing sensitive data.

---

# 29. Design Decision

The API Keys module follows an **Application Identity Pattern**.

```text
Application

↓

API Key

↓

API Gateway

↓

Permission Engine

↓

Business APIs
```

Applications authenticate using API Keys, while end users authenticate using OAuth or session-based authentication.

Separating application identity from user identity improves security, auditing, and scalability.

---

# 30. Enterprise Readiness

The architecture supports enterprise API management features, including:

* Organization-level API Keys
* Environment-specific Keys
* Key Rotation Policies
* Fine-Grained Scopes
* Audit Compliance
* Usage Monitoring
* High-Performance Validation
* Secret Vault Integration

These capabilities enable Iran LMS to safely expose public and private APIs to partners, enterprise customers, mobile applications, and future developer ecosystems.

---

# 31. Strategic Vision

The API Keys module is the foundation of the future **Developer Platform**.

Together with the API Gateway, Webhooks, SDKs, OAuth, and public documentation, it enables Iran LMS to become an extensible platform where developers can build integrations, mobile applications, plugins, automation workflows, and third-party services securely and at scale.
