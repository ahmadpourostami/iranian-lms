# 01-Authentication.md

# Iran LMS Authentication & Authorization

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the authentication and authorization architecture for Iran LMS.

The authentication system must support:

* WordPress Frontend
* WordPress Admin
* Native Android
* Native iOS
* Future Web Applications
* Third-party Integrations

The authentication layer must remain independent from any specific client.

---

# 2. Goals

The authentication system should provide:

* Secure authentication
* Stateless API access
* Long-term scalability
* Multi-device support
* Session management
* Token rotation
* Future SSO compatibility

---

# 3. Authentication Flow

```text
Client

↓

Login Request

↓

Authentication Service

↓

User Verification

↓

Access Token

+

Refresh Token

↓

Protected APIs
```

---

# 4. Supported Authentication Methods

Current:

* JWT Access Token
* Refresh Token

Future:

* OAuth 2.1
* OpenID Connect
* API Keys
* Single Sign-On (SSO)
* Social Login
* Passkeys (WebAuthn)

---

# 5. Login Methods

Supported login identifiers:

* Email
* Username
* Mobile Number (Optional)

Future:

* National ID (Configurable)
* Organization Account
* Social Providers

---

# 6. Login Endpoint

```text
POST /auth/login
```

Request Example:

```json
{
    "login": "user@example.com",
    "password": "********"
}
```

Success Response:

```json
{
    "success": true,
    "data": {
        "access_token": "...",
        "refresh_token": "...",
        "expires_in": 3600,
        "token_type": "Bearer"
    }
}
```

---

# 7. Token Types

## Access Token

Purpose:

* Authenticate API requests

Characteristics:

* Short-lived
* Stateless
* Signed
* Revocable

---

## Refresh Token

Purpose:

* Generate new Access Tokens

Characteristics:

* Long-lived
* Rotated after use
* Stored securely
* Revocable

---

# 8. Token Lifetime

Recommended defaults:

Access Token

* 60 minutes

Refresh Token

* 30 days

Values should be configurable.

---

# 9. Refresh Flow

```text
Client

↓

Refresh Token

↓

POST /auth/refresh

↓

New Access Token

↓

New Refresh Token
```

Refresh Token Rotation is mandatory.

---

# 10. Logout

Endpoint:

```text
POST /auth/logout
```

Logout should:

* Revoke current Access Token
* Revoke Refresh Token
* Invalidate active session
* Record audit log

---

# 11. Logout From All Devices

Endpoint:

```text
POST /auth/logout-all
```

Terminates every active session belonging to the user.

---

# 12. Password Reset

Endpoints:

```text
POST /auth/forgot-password

POST /auth/reset-password
```

Supported delivery:

* Email
* SMS (Optional)

Reset tokens are single-use.

---

# 13. Email Verification

Endpoint:

```text
POST /auth/verify-email
```

Verification status should be stored in the user profile.

---

# 14. Two-Factor Authentication (2FA)

Supported methods:

* TOTP Authenticator Apps
* Email Code
* SMS Code
* Backup Recovery Codes

Future:

* WebAuthn
* Hardware Security Keys

2FA is optional but configurable.

---

# 15. Session Management

Each authenticated device creates an independent session.

Session information:

* Device Name
* Browser
* Operating System
* IP Address
* Country (Approximate)
* Last Activity
* Created At

Users can terminate individual sessions.

---

# 16. Device Management

Endpoints:

```text
GET /auth/devices

DELETE /auth/devices/{id}
```

Users should be able to:

* View active devices
* Remove lost devices
* Rename trusted devices (Optional)

---

# 17. Authorization

Authentication identifies the user.

Authorization determines permissions.

Authorization is Role-Based (RBAC).

Example roles:

* Student
* Instructor
* Assistant Instructor
* Reviewer
* Manager
* Administrator

---

# 18. Permission Model

Permissions are granular.

Examples:

* course.view
* course.create
* lesson.complete
* quiz.review
* certificate.issue
* wallet.manage

Roles are collections of permissions.

---

# 19. Request Header

```text
Authorization: Bearer <access_token>
```

Every protected endpoint requires this header.

---

# 20. Security Rules

Mandatory:

* HTTPS Only
* Password Hashing (Argon2id or bcrypt)
* Token Expiration
* Refresh Token Rotation
* Brute-force Protection
* Login Rate Limiting
* Secure Cookies (when applicable)

---

# 21. Audit Logging

Authentication events must be logged.

Examples:

* Login
* Logout
* Failed Login
* Password Change
* Password Reset
* Email Verification
* 2FA Enabled
* Session Revoked

Audit logs must be immutable.

---

# 22. Error Codes

Examples:

```text
AUTH_INVALID_CREDENTIALS

AUTH_TOKEN_EXPIRED

AUTH_TOKEN_INVALID

AUTH_REFRESH_EXPIRED

AUTH_2FA_REQUIRED

AUTH_ACCOUNT_DISABLED

AUTH_EMAIL_NOT_VERIFIED
```

Errors follow the global API standard.

---

# 23. Mobile Considerations

Mobile clients should support:

* Silent Token Refresh
* Offline Session Cache
* Biometric Unlock
* Device Binding (Optional)
* Push Token Registration

The authentication flow must remain identical to the web API.

---

# 24. Future Expansion

Planned capabilities:

* OAuth Authorization Server
* Enterprise SSO
* LDAP Integration
* Active Directory
* Multi-Factor Policies
* Organization Login
* Passwordless Authentication
* Magic Links

The architecture must support these features without breaking existing clients.

---

# 25. Design Principles

The authentication system must remain:

* Secure
* Stateless
* Scalable
* Client-Agnostic
* Extensible
* Auditable
* API-First

Authentication is responsible only for identity verification.

Authorization is responsible for access control.

These responsibilities must never be mixed.
