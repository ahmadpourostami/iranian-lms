# 15-Filtering.md

# API Filtering

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the filtering strategy for all collection endpoints in the Iran LMS API.

Filtering allows clients to retrieve only the resources that match specific criteria while maintaining a consistent and predictable API experience.

The filtering standard applies to:

* REST APIs
* Mobile Applications
* WordPress Frontend
* Admin Dashboard
* Third-party Integrations

---

# 2. Goals

The filtering system should:

* Be consistent across all endpoints
* Support complex queries
* Be easy to understand
* Scale efficiently
* Prevent ambiguous filtering
* Work seamlessly with pagination and sorting

---

# 3. Standard Syntax

Filters use the following query parameter:

```text
filter[field]=value
```

Example

```text
GET /courses?filter[level]=beginner
```

Multiple filters

```text
GET /courses

?filter[level]=advanced

&filter[language]=fa

&filter[status]=published
```

---

# 4. Supported Filter Types

Supported operators:

| Operator    | Description           |
| ----------- | --------------------- |
| eq          | Equal                 |
| neq         | Not Equal             |
| gt          | Greater Than          |
| gte         | Greater Than or Equal |
| lt          | Less Than             |
| lte         | Less Than or Equal    |
| in          | Match Any             |
| not_in      | Exclude Values        |
| like        | Partial Match         |
| starts_with | Prefix Match          |
| ends_with   | Suffix Match          |
| between     | Range                 |
| null        | Is Null               |
| not_null    | Is Not Null           |

---

# 5. Equality Filters

Example

```text
GET /courses

?filter[level]=beginner
```

Equivalent

```text
filter[level][eq]=beginner
```

---

# 6. Range Filters

Example

```text
GET /courses

?filter[price][gte]=100000

&filter[price][lte]=500000
```

Date Example

```text
GET /orders

?filter[created_at][between]=2026-01-01,2026-12-31
```

---

# 7. List Filters

Example

```text
GET /courses

?filter[level][in]=beginner,intermediate
```

Exclude

```text
filter[level][not_in]=draft,archived
```

---

# 8. Text Filters

Contains

```text
GET /courses

?filter[title][like]=wordpress
```

Starts With

```text
filter[title][starts_with]=Master
```

Ends With

```text
filter[title][ends_with]=Bootcamp
```

Text filtering should be case-insensitive whenever supported.

---

# 9. Boolean Filters

Example

```text
GET /courses

?filter[featured]=true

&filter[certificate]=true
```

Supported values

```text
true

false
```

---

# 10. Null Filters

Example

```text
GET /courses

?filter[published_at][null]=true
```

Or

```text
filter[deleted_at][not_null]=true
```

---

# 11. Nested Filters

Related resources may also be filtered.

Example

```text
GET /courses

?filter[instructor.name][like]=Ahmad
```

Another example

```text
filter[category.slug]=programming
```

Nested filtering should only be available for documented relationships.

---

# 12. Combining Filters

Filters are combined using logical AND by default.

Example

```text
GET /courses

?filter[level]=advanced

&filter[price][lte]=500000
```

Result:

```text
Advanced

AND

Price <= 500000
```

---

# 13. OR Conditions

OR groups use array syntax.

Example

```text
GET /courses

?or[0][level]=beginner

&or[1][level]=advanced
```

Equivalent logic

```text
Level = Beginner

OR

Level = Advanced
```

---

# 14. Supported Fields

Every endpoint must explicitly document filterable fields.

Example

Courses

```text
title

slug

status

level

language

price

featured

rating

category

instructor

created_at
```

Filtering on undocumented fields should return an error.

---

# 15. Filtering with Pagination

Filtering must always occur before pagination.

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

---

# 16. Filtering with Includes

Example

```text
GET /courses

?include=instructor

&filter[instructor.country]=IR
```

Filtering related resources must not duplicate parent records.

---

# 17. Validation

Invalid filters return HTTP 422.

Examples

```text
UNKNOWN_FILTER

INVALID_OPERATOR

INVALID_FILTER_VALUE

FILTER_NOT_ALLOWED
```

---

# 18. Performance Rules

Filtering should:

* Use indexed columns whenever possible
* Avoid full table scans
* Prevent unrestricted wildcard searches
* Limit nested joins
* Optimize large datasets

Expensive filters may be disabled or optimized per endpoint.

---

# 19. Mobile Considerations

Mobile applications should:

* Request only required data
* Combine filters with field selection
* Avoid excessive filtering requests
* Cache repeated filter combinations

---

# 20. Third-Party Integrations

External clients should:

* Use documented filters only
* Avoid relying on undocumented behavior
* Handle unsupported filters gracefully
* Respect validation responses

---

# 21. Security

Filtering must never expose:

* Hidden attributes
* Private relationships
* Internal identifiers
* Soft-deleted resources (unless authorized)

All filters must pass authorization checks.

---

# 22. Future Expansion

The filtering architecture supports:

* Full-Text Search Integration
* AI Semantic Search
* Saved Filters
* Dynamic Filter Presets
* Geo Filters
* Organization-Level Filters
* Custom Filter Providers

These capabilities should not require breaking API changes.

---

# 23. Design Principles

The filtering system must remain:

* Predictable
* Consistent
* Secure
* Performant
* Extensible
* Backward Compatible

Filtering should never change resource semantics; it only narrows the result set.

---

# 24. Endpoint Recommendations

Recommended filters by resource:

| Resource      | Recommended Filters                                            |
| ------------- | -------------------------------------------------------------- |
| Courses       | category, level, language, instructor, price, rating, featured |
| Lessons       | course, section, type, duration                                |
| Enrollments   | student, course, status, source                                |
| Assessments   | type, course, lesson, status                                   |
| Orders        | status, gateway, payment_status, created_at                    |
| Certificates  | course, student, issued_at                                     |
| Notifications | type, read, priority                                           |
| Users         | role, status, country                                          |

Each endpoint may expose additional documented filters.

---

# 25. Reserved Query Parameters

The following query parameters are reserved globally and must not be reused for filtering:

```text
page

per_page

cursor

limit

sort

include

fields

search

locale

expand
```

Custom filters must always be placed under the `filter[...]` namespace to ensure consistency across the entire API.
