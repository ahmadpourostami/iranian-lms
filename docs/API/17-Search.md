# 17-Search.md

# API Search

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the search architecture for all searchable resources in Iran LMS.

Search is responsible for discovering relevant resources using free-text queries and ranking algorithms.

Search is independent from filtering, sorting, and pagination, although these systems work together.

---

# 2. Goals

The search system should:

* Return relevant results
* Support multilingual content
* Scale efficiently
* Provide consistent behavior
* Deliver fast responses
* Support future AI-powered search

---

# 3. Search Scope

Search may be available for:

* Courses
* Lessons
* Categories
* Instructors
* Students (Authorized)
* Certificates
* Discussions
* Announcements
* Orders (Authorized)
* Users (Admin)

Each endpoint explicitly documents whether search is supported.

---

# 4. Standard Syntax

Search uses the global query parameter:

```text
search=keyword
```

Example

```text
GET /courses?search=wordpress
```

Search parameters are global and must never appear under `filter[...]`.

---

# 5. Search Behavior

A search query may match:

* Title
* Subtitle
* Description
* Summary
* Tags
* Keywords
* Instructor Name
* Category Name

Each endpoint defines its searchable fields.

---

# 6. Search Modes

Supported modes

| Mode              | Description             |
| ----------------- | ----------------------- |
| Full Text         | Default search          |
| Prefix            | Beginning of words      |
| Exact             | Exact phrase            |
| Fuzzy             | Tolerates typos         |
| Keyword           | Token-based             |
| Semantic (Future) | AI-based meaning search |

The default mode is Full Text.

---

# 7. Phrase Search

Exact phrases may be searched using quotes.

Example

```text
GET /courses?search="object oriented php"
```

Phrase search should prioritize exact matches.

---

# 8. Multiple Keywords

Multiple words are treated as a single search query.

Example

```text
GET /courses?search=advanced wordpress security
```

The search engine determines the optimal relevance ranking.

---

# 9. Search Fields

Each endpoint documents searchable fields.

Example

Courses

```text
title

subtitle

description

tags

instructor.name

category.title
```

Searching undocumented fields is not supported.

---

# 10. Search with Filtering

Search is executed before filtering.

Execution order

```text
Search

↓

Filter

↓

Sort / Ranking

↓

Paginate

↓

Serialize
```

Example

```text
GET /courses

?search=wordpress

&filter[level]=advanced
```

---

# 11. Search with Sorting

Search results may be sorted.

Example

```text
GET /courses

?search=wordpress

&sort=relevance
```

If another sortable field is requested:

```text
sort=-price
```

The endpoint must document how relevance is combined with manual sorting.

---

# 12. Search with Pagination

Both Offset and Cursor pagination are supported.

Example

```text
GET /courses

?search=wordpress

&page=2
```

Search ordering must remain stable across pages.

---

# 13. Highlighting

Endpoints may optionally return highlighted matches.

Example

```json
{
  "title": "Mastering <mark>WordPress</mark>"
}
```

Highlighting is intended for presentation only.

---

# 14. Autocomplete

Autocomplete endpoint

```http
GET /search/suggestions
```

Example

```text
?search=word
```

Returns:

* Suggested Queries
* Courses
* Categories
* Instructors

Autocomplete responses should be lightweight.

---

# 15. Recent Searches

Authenticated users may retrieve their recent searches.

Endpoint

```http
GET /search/recent
```

Users may also clear search history.

```http
DELETE /search/recent
```

---

# 16. Popular Searches

Endpoint

```http
GET /search/popular
```

Returns trending search terms.

Popular searches may be calculated globally or per organization.

---

# 17. Search Analytics

The system may collect:

* Search Frequency
* Zero Result Searches
* Click-through Rate
* Popular Keywords
* Average Response Time

Analytics must respect privacy settings.

---

# 18. Validation

Examples

```text
SEARCH_QUERY_REQUIRED

SEARCH_QUERY_TOO_SHORT

SEARCH_QUERY_TOO_LONG

SEARCH_NOT_SUPPORTED
```

Invalid requests return HTTP 422.

---

# 19. Performance Rules

The search engine should:

* Use full-text indexes
* Avoid table scans
* Cache popular queries
* Limit expensive wildcard searches
* Support asynchronous indexing
* Optimize ranking

Search response time should remain consistent under load.

---

# 20. Security

Search must never expose:

* Hidden resources
* Unauthorized content
* Private metadata
* Soft-deleted records
* Restricted courses

Authorization checks apply after matching but before returning results.

---

# 21. Mobile Considerations

Mobile applications should:

* Debounce search input
* Cancel obsolete requests
* Cache recent results
* Use autocomplete
* Request lightweight payloads

Search should remain responsive on slow networks.

---

# 22. Third-Party Integrations

External clients should:

* Respect rate limits
* Cache autocomplete responses
* Avoid repeated identical queries
* Use documented search endpoints only

---

# 23. Future Expansion

The search architecture supports:

* AI Semantic Search
* Vector Search
* Personalized Results
* Voice Search
* Image Search
* OCR-Based Search
* Synonym Dictionaries
* Multi-language Search
* Federated Search

These capabilities should not require breaking API changes.

---

# 24. Design Principles

The search system must remain:

* Fast
* Relevant
* Consistent
* Secure
* Extensible
* Observable
* Backward Compatible

Search should help users discover content without exposing implementation details.

---

# 25. Search Endpoint Recommendations

| Resource     | Endpoint                               |
| ------------ | -------------------------------------- |
| Courses      | GET /courses?search=                   |
| Lessons      | GET /lessons?search=                   |
| Categories   | GET /categories?search=                |
| Instructors  | GET /instructors?search=               |
| Students     | GET /students?search=                  |
| Certificates | GET /certificates?search=              |
| Orders       | GET /commerce/orders?search=           |
| Discussions  | GET /communication/discussions?search= |

Search should be integrated into resource endpoints rather than duplicated.

---

# 26. Zero Result Handling

When no matching resources are found:

```json
{
  "success": true,
  "data": [],
  "meta": {
    "total": 0
  },
  "suggestions": [
    "wordpress",
    "php",
    "laravel"
  ]
}
```

Whenever possible, the API should suggest related queries instead of returning an empty response.

---

# 27. Search Ranking Signals

The default ranking algorithm may consider:

* Title Match
* Exact Phrase Match
* Keyword Frequency
* Course Popularity
* Student Rating
* Completion Rate
* Recently Updated
* Instructor Reputation
* Language Match

The weighting of these signals is implementation-specific and may evolve without changing the API contract.

---

# 28. Synonyms & Normalization

The search engine should normalize queries before execution.

Examples:

* Case-insensitive matching
* Unicode normalization
* Diacritics removal (where appropriate)
* Persian/Arabic character normalization
* Whitespace normalization

The engine may also support configurable synonym dictionaries.

Example:

```text
JS → JavaScript

WP → WordPress

UI → User Interface
```

Normalization should improve relevance without changing the original query.
