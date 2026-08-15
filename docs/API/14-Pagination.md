# 14-Pagination.md

# API Pagination

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the pagination strategy for all collection endpoints in the Iran LMS API.

Every endpoint returning multiple resources must use a consistent pagination format.

The pagination contract applies to:

* REST APIs
* Mobile Applications
* WordPress Frontend
* Third-party Integrations

---

# 2. Goals

The pagination system should:

* Be predictable
* Be performant
* Scale to millions of records
* Minimize payload size
* Support filtering and sorting
* Remain client-friendly

---

# 3. Supported Pagination Types

Iran LMS supports two pagination strategies.

## Offset Pagination

Best suited for:

* Admin dashboards
* Small datasets
* Reporting interfaces

Example

```text
GET /courses?page=2&per_page=20
```

---

## Cursor Pagination

Recommended for:

* Mobile applications
* Infinite scrolling
* Large datasets
* Activity feeds
* Notifications

Example

```text
GET /notifications?cursor=eyJpZCI6...
```

Cursor pagination is the preferred strategy for high-volume endpoints.

---

# 4. Default Pagination

If no pagination parameters are provided:

```text
page=1

per_page=20
```

---

# 5. Pagination Parameters

Offset Pagination

```text
page

per_page
```

Cursor Pagination

```text
cursor

limit
```

---

# 6. Limits

Recommended defaults

| Parameter | Default | Maximum |
| --------- | ------: | ------: |
| per_page  |      20 |     100 |
| limit     |      20 |     100 |

Requests exceeding the maximum should automatically use the configured maximum.

---

# 7. Standard Response

Example

```json
{
  "success": true,
  "data": [],
  "meta": {
    "page": 2,
    "per_page": 20,
    "total": 138,
    "last_page": 7
  },
  "links": {
    "first": "...",
    "previous": "...",
    "next": "...",
    "last": "..."
  }
}
```

---

# 8. Cursor Response

Example

```json
{
  "success": true,
  "data": [],
  "meta": {
    "limit": 20,
    "has_more": true
  },
  "links": {
    "next_cursor": "eyJpZCI6..."
  }
}
```

---

# 9. Metadata

Offset pagination metadata

```text
page

per_page

total

last_page
```

Cursor pagination metadata

```text
limit

has_more
```

Metadata should remain consistent across all APIs.

---

# 10. Sorting Requirements

Pagination should always operate on a deterministic ordering.

Examples

```text
sort=created_at

sort=-created_at

sort=updated_at

sort=-updated_at
```

Cursor pagination requires stable sorting.

---

# 11. Filtering

Pagination works together with:

* Search
* Filters
* Includes
* Sorting

Example

```text
GET /courses

?category=wordpress

&level=advanced

&sort=-rating

&page=2
```

---

# 12. Includes

Pagination should not be affected by included relationships.

Example

```text
GET /courses

?include=instructor

?include=sections.lessons
```

Related resources should not duplicate parent records.

---

# 13. Performance Rules

Large datasets should:

* Use indexed sorting
* Avoid OFFSET for massive tables
* Prefer Cursor Pagination
* Limit eager loading
* Cache total counts where possible

Cursor pagination is recommended whenever record counts exceed practical offset limits.

---

# 14. Error Handling

Examples

```text
INVALID_PAGE

INVALID_CURSOR

INVALID_LIMIT

PAGINATION_LIMIT_EXCEEDED
```

Validation errors should return HTTP 422.

---

# 15. Mobile Considerations

Mobile clients should:

* Use Cursor Pagination by default
* Cache previously loaded pages
* Support infinite scrolling
* Avoid requesting duplicate records

Cursor pagination minimizes synchronization conflicts.

---

# 16. Third-Party Integrations

External clients should:

* Preserve pagination links
* Avoid constructing cursors manually
* Respect configured limits
* Follow provided navigation links

Cursor values should be treated as opaque tokens.

---

# 17. Future Expansion

The pagination architecture supports:

* Window Pagination
* Time-Based Pagination
* GraphQL Connections
* Stream Pagination
* Delta Synchronization

These capabilities should not require breaking API changes.

---

# 18. Design Principles

The pagination system must remain:

* Consistent
* Predictable
* Scalable
* Efficient
* Backward Compatible
* Client-Friendly

Every collection endpoint should expose a uniform pagination experience.

---

# 19. Endpoint Recommendations

Recommended pagination strategy by endpoint type:

| Endpoint           | Strategy |
| ------------------ | -------- |
| Courses            | Offset   |
| Course Search      | Offset   |
| Categories         | Offset   |
| Students           | Offset   |
| Instructors        | Offset   |
| Orders             | Offset   |
| Enrollments        | Offset   |
| Notifications      | Cursor   |
| Learning Timeline  | Cursor   |
| Activity Feed      | Cursor   |
| Audit Logs         | Cursor   |
| Webhook Deliveries | Cursor   |
| Queue Jobs         | Cursor   |

This recommendation balances usability with database performance.

---

# 20. Field Selection

To reduce payload size, collection endpoints may support field selection.

Example

```text
GET /courses

?fields=uuid,title,price,thumbnail
```

Nested fields

```text
GET /courses

?fields=uuid,title

&include=instructor

&fields[instructor]=uuid,name,avatar
```

Clients should request only the fields they need, especially on mobile networks.

---

# 21. Total Count Optimization

Computing the exact total number of records can become expensive for very large datasets.

Endpoints may expose:

```json
{
  "meta": {
    "total": 1000000,
    "total_is_estimated": true
  }
}
```

or omit the total count entirely for cursor-based endpoints when it would negatively affect performance.

Clients should not assume that every paginated response contains an exact total.
