# 05-Certificate-Aggregate.md

# Certificate Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Certificate Aggregate is responsible for managing academic achievements and verifiable learning credentials.

A certificate is considered a permanent educational record rather than a downloadable PDF.

The aggregate manages the complete lifecycle of certificates, including issuance, verification, revocation, expiration, regeneration, and public validation.

---

# 2. Responsibilities

The Certificate Aggregate is responsible for:

* Certificate Generation
* Certificate Issuance
* Certificate Verification
* Public Validation
* Certificate Templates
* Certificate Versioning
* Revocation
* Download History
* Credential Metadata

This aggregate does not determine whether a student passes a course.

Eligibility is provided by other aggregates.

---

# 3. Aggregate Root

```text
Certificate
```

Every operation begins from the Certificate entity.

---

# 4. Entities

```text
Certificate

CertificateTemplate

CertificateVersion

CertificateVerification

CertificateDownload

CertificateMetadata

CertificateSignature

CertificateRevocation
```

---

# 5. Relationships

```text
Student

│

Enrollment

│

Course

│

Certificate

├── Template

├── Verification

├── Downloads

├── Metadata

└── Version
```

---

# 6. Certificate Lifecycle

```text
Eligible

↓

Generated

↓

Issued

↓

Downloaded

↓

Verified

↓

Revoked
```

Future states:

* Expired
* Archived
* Reissued

---

# 7. Eligibility Rules

A certificate may require:

* Course Completion
* Minimum Passing Score
* Assignment Approval
* Required Lesson Completion
* Manual Instructor Approval
* Attendance Requirement

Eligibility rules are defined by the Course and Assessment aggregates.

---

# 8. Database Tables

```text
ilms_certificates

ilms_certificate_templates

ilms_certificate_versions

ilms_certificate_metadata

ilms_certificate_downloads

ilms_certificate_verifications

ilms_certificate_signatures

ilms_certificate_revocations
```

---

# 9. Certificate Entity

Core fields:

```text
ID

UUID

Certificate Number

Verification Code

Student ID

Course ID

Enrollment ID

Template ID

Issue Date

Status

Language

Version

Created At

Updated At
```

---

# 10. Certificate Number

Every certificate receives a globally unique identifier.

Example:

```text
ILMS-2026-00015482
```

Certificate numbers must never be reused.

---

# 11. Verification

Every certificate must be publicly verifiable.

Supported methods:

* Verification Code
* Public Verification URL
* QR Code

Future support:

* Digital Signature
* Blockchain Verification

Verification does not require user authentication.

---

# 12. Templates

Certificates are generated from templates.

Template components:

* Background
* Logo
* Student Name
* Course Name
* Instructor
* Issue Date
* QR Code
* Verification Code
* Signature
* Dynamic Fields

Templates support:

* RTL
* LTR
* Light
* Print Optimization

---

# 13. Downloads

The system records:

* Download Time
* Device
* IP Address
* File Format
* Download Count

This information supports auditing.

---

# 14. Revocation

Certificates may be revoked.

Examples:

* Fraud
* Academic Misconduct
* Administrative Error
* Duplicate Issue

Revoked certificates remain visible but fail verification.

---

# 15. Business Rules

Examples:

A certificate is issued only once per successful enrollment.

Certificate numbers are immutable.

Verification codes cannot change.

Deleting a course does not invalidate issued certificates.

Certificates are never physically deleted.

PDF regeneration must preserve certificate identity.

---

# 16. Events

```text
CertificateEligible

CertificateGenerated

CertificateIssued

CertificateDownloaded

CertificateVerified

CertificateRevoked

CertificateRegenerated
```

---

# 17. API Ownership

```text
GET /certificates

GET /certificates/{id}

GET /certificates/verify/{code}

POST /certificates/{id}/generate

POST /certificates/{id}/download

POST /certificates/{id}/revoke

POST /certificates/{id}/regenerate
```

---

# 18. Permissions

Permissions include:

* Generate Certificate
* Download Certificate
* Verify Certificate
* Revoke Certificate
* Manage Templates
* Edit Templates
* Regenerate Certificate

---

# 19. Performance Strategy

Certificate generation should:

* Run asynchronously
* Cache templates
* Generate PDFs on demand
* Optimize image assets
* Minimize repeated rendering

Verification endpoints should remain lightweight.

---

# 20. Mobile Considerations

Mobile applications should support:

* Certificate Wallet
* QR Verification
* Offline Viewing
* Native Sharing
* PDF Export

Future versions may support integration with external digital wallets.

---

# 21. Integration Points

The Certificate Aggregate integrates with:

* Enrollment Aggregate
* Course Aggregate
* Learning Aggregate
* Assessment Aggregate
* Communication Aggregate
* Gamification Aggregate

Eligibility is determined externally.

Issuance remains the responsibility of this aggregate.

---

# 22. Future Expansion

Potential future capabilities:

* Multi-language Certificates
* Digital Badges
* Open Badge Standard
* Blockchain Verification
* Digital Transcript
* Academic Portfolio
* Employer Verification Portal
* Organization-issued Certificates

---

# 23. Design Principles

The Certificate Aggregate must remain:

* Trustworthy
* Immutable
* Verifiable
* Secure
* API-first
* Event-driven
* Legally auditable

A certificate represents an academic credential, not merely a downloadable document.
