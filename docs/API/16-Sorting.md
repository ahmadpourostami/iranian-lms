# 16-Sorting.md

# API Sorting

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the standard sorting strategy for all collection endpoints in the Iran LMS API.

Sorting determines the order in which resources are returned and must remain consistent across all APIs.

The sorting standard applies to:

* REST APIs
* Mobile Applications
* WordPress Frontend
* Admin Dashboard
* Third-party Integrations

---

# 2. Goals

The sorting system should:

* Be predictable
* Be consistent
* Support multiple fields
* Scale efficiently
* Work with filtering and pagination
* Prevent ambiguous ordering

---

# 3. Standard Syntax

Sorting uses a single query parameter.

```text
sort=field
```

Ascending

```text
GET /courses?sort=title
```

Descending

```text
GET /courses?sort=-title
```

A minus (`-`) indicates descending order.

---

# 4. Multi-Column Sorting

Multiple fields are separated by commas.

Example

```text
GET /courses

?sort=-rating,title
```

Execution order

1. Rating (Descending)
2. Title (Ascending)

---

# 5. Supported Sort Directions

Ascending

```text
sort=created_at
```

Descending

```text
sort=-created_at
```

Only these two directions are supported.

---

# 6. Default Sorting

Every endpoint must define a default ordering.

Examples

| Resource      | Default Sort   |
| ------------- | -------------- |
| Courses       | -published_at  |
| Lessons       | position       |
| Sections      | position       |
| Categories    | position,title |
| Enrollments   | -created_at    |
| Orders        | -created_at    |
| Certificates  | -issued_at     |
| Notifications | -created_at    |
| Users         | name           |

If no sort parameter is supplied, the endpoint must use its documented default.

---

# 7. Supported Fields

Each endpoint explicitly defines sortable fields.

Example

Courses

```text
title

price

rating

created_at

updated_at

published_at

students_count

duration

position
```

Sorting by undocumented fields should return an error.

---

# 8. Relationship Sorting

Sorting by related resources is supported only when documented.

Example

```text
GET /courses

?sort=instructor.name
```

Another example

```text
sort=category.title
```

Relationship sorting should use indexed joins whenever possible.

---

# 9. Aggregate Sorting

Sorting by computed values may be supported.

Examples

```text
sort=-students_count

sort=-average_rating

sort=-sales_count

sort=-completion_rate
```

Aggregate values should be precomputed or indexed whenever possible.

---

# 10. Localized Sorting

Localized resources should respect the active locale.

Example Header

```text
Accept-Language: fa-IR
```

Text sorting should follow locale-aware collation rules whenever supported.

---

# 11. Sorting with Filtering

Execution order

```text
Filter

↓

Sort

↓

Paginate

↓

Serialize
```

Sorting always occurs after filtering.

---

# 12. Sorting with Pagination

Sorting must always be deterministic.

Example

```text
sort=-created_at,uuid
```

The final field should uniquely identify each record.

This prevents duplicate or skipped records during pagination.

---

# 13. Cursor Pagination

Cursor pagination requires stable sorting.

Recommended

```text
sort=-created_at,uuid
```

Unstable ordering is not allowed for cursor-based endpoints.

---

# 14. Null Handling

Null values should have predictable behavior.

Recommended default

Ascending

```text
NULLS LAST
```

Descending

```text
NULLS LAST
```

Behavior must remain consistent across all endpoints.

---

# 15. Validation

Invalid sorting requests return HTTP 422.

Examples

```text
INVALID_SORT_FIELD

INVALID_SORT_DIRECTION

SORT_NOT_ALLOWED
```

---

# 16. Performance Rules

Sorting should:

* Use indexed columns
* Avoid sorting large unindexed datasets
* Limit expensive relationship sorting
* Prefer database sorting over application sorting
* Use covering indexes where practical

Server-side sorting is mandatory.

---

# 17. Mobile Considerations

Mobile applications should:

* Request only necessary sorting
* Avoid frequent sort changes
* Cache common sort combinations
* Use cursor pagination for activity feeds

---

# 18. Third-Party Integrations

External clients should:

* Use only documented sortable fields
* Preserve returned ordering
* Avoid assumptions about default ordering
* Handle unsupported sort requests gracefully

---

# 19. Security

Sorting must never expose:

* Hidden attributes
* Internal columns
* Sensitive metadata
* Private relationships

Only publicly documented fields are sortable.

---

# 20. Future Expansion

The sorting architecture supports:

* AI Relevance Ranking
* Personalized Sorting
* Weighted Ranking
* Geographic Sorting
* Popularity-Based Sorting
* Business Rule Sorting

These capabilities should not require breaking API changes.

---

# 21. Design Principles

The sorting system must remain:

* Predictable
* Stable
* Consistent
* Efficient
* Secure
* Backward Compatible

Sorting changes only the order of returned resources, never their meaning.

---

# 22. Endpoint Recommendations

Recommended sortable fields by resource:

| Resource      | Recommended Sort Fields                                                  |
| ------------- | ------------------------------------------------------------------------ |
| Courses       | title, published_at, created_at, rating, price, students_count, duration |
| Lessons       | position, title, created_at                                              |
| Sections      | position, title                                                          |
| Enrollments   | created_at, expires_at, status                                           |
| Assessments   | deadline, created_at, score                                              |
| Orders        | created_at, total_amount, payment_status                                 |
| Certificates  | issued_at, student_name                                                  |
| Notifications | created_at, priority                                                     |
| Users         | name, created_at, last_login                                             |

Each endpoint may expose additional sortable fields.

---

# 23. Reserved Sort Values

The following sort values are reserved by the platform:

```text
relevance

random

recommended
```

These values are only available on endpoints that explicitly document support for them.

Examples

```text
GET /courses?sort=relevance

GET /courses?sort=recommended
```

Using reserved values on unsupported endpoints must return an error.

---

# 24. Natural Ordering

Resources that have an explicit business order should always expose it.

Examples:

* Course Sections
* Lessons
* Quiz Questions
* Learning Path Steps
* Menu Items

These resources should support:

```text
sort=position
```

Business ordering always takes precedence over creation date.

---

# 25. Ranking Consistency

Endpoints that support search should preserve ranking consistency.

Example

```text
GET /courses

?search=wordpress

&sort=relevance
```

When `sort=relevance` is used:

* Search ranking is determined by the search engine.
* Manual sorting fields are ignored unless documented.
* Results should remain stable for identical queries.

This ensures predictable behavior for search-based user experiences.
