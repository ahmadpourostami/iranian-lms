# 02-Course-API.md

# Course API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Course API provides all endpoints required to create, manage, publish, search, and consume courses.

This API is used by:

* WordPress Frontend
* WordPress Admin
* Mobile Applications
* External Integrations
* Future Web Clients

Business logic belongs to the Application Layer.

The API acts only as a transport interface.

---

# 2. Base Endpoint

```text
/api/v1/courses
```

---

# 3. Resources

The Course API manages:

* Courses
* Categories
* Sections
* Lessons
* Instructors
* Attachments
* Prerequisites
* Learning Objectives
* Course Settings
* Course Visibility

---

# 4. Authentication

Required for all write operations.

Public read operations may be available depending on course visibility.

Authentication:

```text
Bearer Token
```

---

# 5. Permissions

Examples:

```text
course.view

course.create

course.update

course.delete

course.publish

course.archive

course.duplicate
```

---

# 6. Endpoints

## List Courses

```http
GET /courses
```

Purpose:

Return paginated courses.

Supports:

* Pagination
* Filtering
* Sorting
* Search
* Includes

Query Example

```text
GET /courses

?page=1

&per_page=20

&q=wordpress

&category=programming

&level=beginner

&price=free

&sort=-created_at
```

Success Response

```json
{
  "success": true,
  "data": [],
  "meta": {},
  "links": {}
}
```

---

## Get Course

```http
GET /courses/{uuid}
```

Returns complete course details.

Supports optional includes:

```text
?include=instructor

?include=sections

?include=sections.lessons
```

---

## Create Course

```http
POST /courses
```

Permissions

```text
course.create
```

Example Request

```json
{
  "title": "Mastering PHP",
  "slug": "mastering-php",
  "description": "...",
  "category_uuid": "...",
  "price": 120,
  "status": "draft"
}
```

Validation

* Title required
* Slug unique
* Category exists
* Price >= 0

Events

```text
CourseCreated
```

---

## Update Course

```http
PUT /courses/{uuid}
```

Updates the complete resource.

Requires:

```text
course.update
```

Event

```text
CourseUpdated
```

---

## Patch Course

```http
PATCH /courses/{uuid}
```

Updates selected fields only.

---

## Delete Course

```http
DELETE /courses/{uuid}
```

Soft Delete only.

Event

```text
CourseDeleted
```

---

## Restore Course

```http
POST /courses/{uuid}/restore
```

Restores a soft-deleted course.

---

## Publish Course

```http
POST /courses/{uuid}/publish
```

Validation:

* Required fields completed
* At least one lesson
* Valid instructor

Event

```text
CoursePublished
```

---

## Archive Course

```http
POST /courses/{uuid}/archive
```

Archives a published course.

---

## Duplicate Course

```http
POST /courses/{uuid}/duplicate
```

Creates a new draft copy.

Event

```text
CourseDuplicated
```

---

## Search Courses

```http
GET /courses/search
```

Example

```text
?q=wordpress
```

Supports:

* Full-text Search
* Fuzzy Search
* Ranking
* Language-aware Search

---

## Categories

```http
GET /courses/categories
```

Returns course categories.

---

## Course Instructors

```http
GET /courses/{uuid}/instructors
```

Returns assigned instructors.

---

## Sections

```http
GET /courses/{uuid}/sections
```

---

## Lessons

```http
GET /courses/{uuid}/lessons
```

Returns lessons ordered by curriculum.

---

## Learning Objectives

```http
GET /courses/{uuid}/objectives
```

---

## Attachments

```http
GET /courses/{uuid}/attachments
```

---

# 7. Filtering

Supported filters

```text
category

level

language

price

status

featured

instructor

rating

certificate

duration
```

---

# 8. Sorting

Supported

```text
created_at

updated_at

title

price

students

rating

duration
```

Ascending

```text
sort=price
```

Descending

```text
sort=-price
```

---

# 9. Includes

Supported relationships

```text
instructor

categories

sections

sections.lessons

attachments

prerequisites

objectives
```

---

# 10. Business Rules

Examples

A published course cannot have an empty curriculum.

Draft courses are invisible unless authorized.

Deleted courses are recoverable.

Course UUID is immutable.

Slug must remain unique.

Publishing validates the entire course structure.

---

# 11. Events

```text
CourseCreated

CourseUpdated

CoursePublished

CourseArchived

CourseDeleted

CourseRestored

CourseDuplicated
```

---

# 12. Error Codes

Examples

```text
COURSE_NOT_FOUND

COURSE_ALREADY_PUBLISHED

COURSE_ALREADY_ARCHIVED

COURSE_SLUG_EXISTS

COURSE_VALIDATION_FAILED

COURSE_PERMISSION_DENIED
```

---

# 13. Performance Notes

The Course API should:

* Support response caching.
* Avoid N+1 queries.
* Lazy-load relationships.
* Return only requested includes.
* Cache category lookups.
* Use indexed search fields.

---

# 14. Mobile Considerations

The same endpoints must be used by mobile applications.

Mobile clients should support:

* Incremental loading
* Offline course metadata cache
* Optimized thumbnails
* Reduced payload using field selection

---

# 15. Future Expansion

The API is designed to support:

* AI-generated course metadata
* Multi-language courses
* Course bundles
* Learning paths
* Cohort-based courses
* Live courses
* Organization-owned courses
* Multi-tenant deployments

No breaking changes should be required to support these capabilities.
