# 06-Certificate-API.md

# Certificate API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Certificate API manages the complete lifecycle of digital certificates.

It is responsible for issuing, validating, downloading, revoking, regenerating, and verifying certificates.

Certificates represent successful completion of learning achievements.

---

# 2. Base Endpoint

```text id="3f6mya"
/api/v1/certificates
```

---

# 3. Resources

The Certificate API manages:

* Certificates
* Certificate Templates
* Certificate Verification
* Certificate Downloads
* Certificate Metadata
* Certificate Revocation
* Certificate History

---

# 4. Authentication

Most endpoints require authentication.

Public verification endpoints are accessible without authentication.

Authentication:

```text id="nd2v1z"
Bearer Token
```

---

# 5. Permissions

Examples

```text id="g6v2tx"
certificate.view

certificate.issue

certificate.download

certificate.verify

certificate.revoke

certificate.manage
```

---

# 6. Endpoints

## My Certificates

```http id="h6gw7n"
GET /certificates
```

Returns all certificates belonging to the authenticated learner.

Supports:

* Pagination
* Filtering
* Sorting

---

## Get Certificate

```http id="y4ugli"
GET /certificates/{uuid}
```

Returns certificate details.

---

## Download Certificate

```http id="3qz0kz"
GET /certificates/{uuid}/download
```

Returns the certificate file.

Supported formats:

* PDF

Future:

* PNG
* SVG

---

## Issue Certificate

```http id="ngzjxr"
POST /certificates
```

Example Request

```json id="w9a6xv"
{
    "student_uuid": "...",
    "course_uuid": "...",
    "template_uuid": "..."
}
```

Validation

* Course completed
* Completion requirements satisfied
* Certificate not already issued

Event

```text id="rdshx4"
CertificateIssued
```

---

## Regenerate Certificate

```http id="5xjlwm"
POST /certificates/{uuid}/regenerate
```

Rebuilds the certificate using the current template.

Event

```text id="tjqxxo"
CertificateRegenerated
```

---

## Revoke Certificate

```http id="vs1zdb"
POST /certificates/{uuid}/revoke
```

Revokes a previously issued certificate.

Event

```text id="ljpqwo"
CertificateRevoked
```

---

## Verify Certificate

```http id="jlwmcl"
GET /certificates/verify
```

Query Example

```text id="iqdiz6"
?code=ABC123XYZ
```

Response

```json id="3gm8ig"
{
  "success": true,
  "data": {
    "valid": true,
    "certificate_uuid": "...",
    "student_name": "John Doe",
    "course_title": "Mastering PHP",
    "issued_at": "2026-08-03"
  }
}
```

This endpoint is public.

---

## Certificate Templates

```http id="bj9c0m"
GET /certificates/templates
```

Returns available certificate templates.

---

## Certificate History

```http id="o15mjc"
GET /certificates/{uuid}/history
```

Returns certificate lifecycle events.

---

# 7. Filtering

Supported filters

```text id="qmyvqg"
course

issued_at

status

template

student
```

---

# 8. Sorting

Supported

```text id="ktnhw8"
issued_at

created_at

course

student
```

---

# 9. Business Rules

Examples

A learner may receive only one active certificate per course unless reissuance is explicitly allowed.

Certificates cannot be issued before all completion requirements are satisfied.

Revoked certificates remain stored for audit purposes.

Verification codes must be globally unique.

Certificate files should be generated asynchronously when appropriate.

---

# 10. Events

```text id="ehj2u4"
CertificateIssued

CertificateDownloaded

CertificateVerified

CertificateRegenerated

CertificateRevoked
```

---

# 11. Error Codes

Examples

```text id="n2g7i5"
CERTIFICATE_NOT_FOUND

CERTIFICATE_ALREADY_ISSUED

CERTIFICATE_REVOKED

CERTIFICATE_NOT_ELIGIBLE

INVALID_CERTIFICATE_CODE

CERTIFICATE_TEMPLATE_NOT_FOUND
```

---

# 12. Performance Notes

The Certificate API should:

* Cache generated certificate files.
* Queue PDF generation.
* Use indexed verification codes.
* Prevent duplicate certificate generation.
* Optimize verification lookups.

Public verification endpoints should respond with minimal latency.

---

# 13. Mobile Considerations

Mobile applications should support:

* Certificate list
* PDF viewing
* Certificate sharing
* Verification link opening
* Offline access to downloaded certificates

The certificate experience should remain consistent across platforms.

---

# 14. Future Expansion

The Certificate API is designed to support:

* Digital Badges
* Verifiable Credentials (VC)
* Blockchain Verification
* Open Badges Standard
* Certificate Expiration
* Continuing Education Credits (CEU)
* Multi-language Certificates
* QR Code Verification
* Organization-branded Certificates

These capabilities should integrate without breaking existing API contracts.
