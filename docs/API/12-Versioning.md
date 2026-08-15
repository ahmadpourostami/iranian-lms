# 12-Versioning.md

# API Versioning

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the versioning strategy for the Iran LMS API.

A consistent versioning policy ensures long-term stability, backward compatibility, and predictable upgrades for all API consumers.

The versioning strategy applies to:

* WordPress Frontend
* WordPress Admin
* Mobile Applications
* Third-party Integrations
* Public Developer APIs

---

# 2. Goals

The versioning system should:

* Preserve backward compatibility
* Minimize breaking changes
* Support parallel API versions
* Simplify client upgrades
* Enable gradual migration
* Maintain stable API contracts

---

# 3. Versioning Strategy

Iran LMS uses **URI Versioning**.

Example:

```text
/api/v1/

/api/v2/

/api/v3/
```

Every public endpoint must belong to a specific version.

---

# 4. Current Version

Current stable version:

```text
v1
```

Future versions must remain available alongside existing versions until officially deprecated.

---

# 5. Version Lifecycle

Every API version follows the same lifecycle.

```text
Draft

↓

Beta

↓

Stable

↓

Deprecated

↓

End of Support

↓

Removed
```

Older versions remain functional until the published support period ends.

---

# 6. Breaking Changes

The following changes require a new major version:

* Removing endpoints
* Renaming endpoints
* Removing response fields
* Changing field data types
* Changing authentication behavior
* Changing business behavior
* Changing error contracts
* Changing request structure
* Changing URL patterns

Example:

```text
/api/v1/courses

↓

/api/v2/courses
```

---

# 7. Non-Breaking Changes

The following changes do not require a new version:

* Adding optional fields
* Adding optional query parameters
* Performance improvements
* Bug fixes
* New endpoints
* Additional filters
* Additional sorting options
* Additional includes

Existing clients should continue to work without modification.

---

# 8. Deprecation Policy

Deprecated APIs remain available for a defined support period.

Responses should include:

```text
Deprecation: true

Sunset: 2028-01-01
```

Documentation must clearly indicate:

* Deprecation date
* Sunset date
* Migration guide

---

# 9. Version Discovery

Clients can determine the supported API versions through:

```http
GET /api
```

Example Response

```json
{
    "versions": [
        {
            "version": "v1",
            "status": "stable"
        },
        {
            "version": "v2",
            "status": "beta"
        }
    ]
}
```

---

# 10. Compatibility Rules

Every new version should:

* Preserve existing behavior whenever possible
* Reuse unchanged endpoints
* Keep authentication compatible
* Maintain error standards
* Preserve resource identifiers

Breaking changes should be minimized.

---

# 11. Documentation

Each API version must maintain independent documentation.

Example:

```text
/docs/api/v1

/docs/api/v2
```

Documentation must remain accessible even after deprecation.

---

# 12. Client Version Reporting

Clients should identify themselves using headers.

Example:

```text
X-Client-Name: IranLMS-Mobile

X-Client-Version: 2.4.1

X-Platform: Android
```

This information assists with:

* Debugging
* Analytics
* Compatibility monitoring

---

# 13. SDK Compatibility

Official SDKs should clearly declare supported API versions.

Example

```text
JavaScript SDK

Supports:

v1

v2
```

The same applies to:

* PHP SDK
* Dart SDK
* Swift SDK
* Kotlin SDK

---

# 14. Migration

Every major version must provide:

* Migration Guide
* Changelog
* Upgrade Notes
* Deprecated Feature List
* Code Examples

Migration should be incremental whenever possible.

---

# 15. Changelog

Each version should publish a structured changelog.

Categories:

* Added
* Changed
* Deprecated
* Removed
* Fixed
* Security

Example:

```text
v2.0.0

Added

- Learning Timeline API

Changed

- Quiz Result Response

Deprecated

- Legacy Wallet Endpoint

Removed

- v1 Discussion Endpoint
```

---

# 16. Testing

Every supported API version must maintain:

* Automated Tests
* Integration Tests
* Contract Tests
* Regression Tests

New versions must never break supported clients unintentionally.

---

# 17. Monitoring

Version-specific metrics should be collected.

Examples:

* Requests per Version
* Error Rate
* Response Time
* Active Clients
* Deprecated Endpoint Usage

These metrics help determine when an old version can be retired.

---

# 18. Future Expansion

The versioning architecture supports:

* Long-Term Support (LTS) Releases
* Preview APIs
* Experimental Endpoints
* Module-Level Versioning
* GraphQL Schema Versioning
* Event Schema Versioning

These capabilities should coexist without affecting existing API consumers.

---

# 19. Design Principles

The versioning strategy must remain:

* Predictable
* Backward Compatible
* Well Documented
* Easy to Adopt
* Observable
* Extensible
* Stable

API versions represent long-term contracts with developers.

Breaking those contracts should always be the last resort.
