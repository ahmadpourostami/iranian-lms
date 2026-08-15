# 01-Course-Aggregate.md

# Course Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Course Aggregate is the heart of Iran LMS.

Every learning experience begins with a Course.

This aggregate is responsible for managing the complete lifecycle of a course, including:

* Course Creation
* Course Publishing
* Pricing
* Visibility
* Curriculum Structure
* Enrollment Rules
* Learning Settings
* Metadata
* Relationships with other modules

The Course Aggregate does **not** manage lesson completion, quizzes, assignments, or certificates directly. Those belong to their own aggregates.

---

# 2. Responsibilities

The Course Aggregate is responsible for:

* Creating courses
* Updating course information
* Publishing and unpublishing courses
* Managing course metadata
* Organizing curriculum
* Defining instructors
* Configuring pricing
* Managing prerequisites
* Managing learning settings
* Managing visibility
* Defining enrollment rules

---

# 3. Entities

This aggregate consists of the following entities.

```text
Course
CourseMeta
CoursePricing
CourseSettings
CourseRequirement
CourseTargetAudience
CourseFAQ
CourseCategory
CourseTag
```

---

# 4. Aggregate Root

The Aggregate Root is:

```text
Course
```

Every operation inside this aggregate must start from the Course entity.

No other entity should be modified independently.

---

# 5. Relationships

```text
Course

├── has many Sections

├── has many Instructors

├── has many FAQs

├── has many Requirements

├── has many Learning Outcomes

├── belongs to Category

├── has many Tags

├── has many Enrollments

├── has many Reviews

├── has many Certificates

└── has many Orders
```

---

# 6. Course Lifecycle

```text
Draft

↓

Pending Review

↓

Published

↓

Private

↓

Archived

↓

Deleted
```

State transitions should always be validated.

Example:

A Draft course cannot receive enrollments.

---

# 7. Course Types

Supported course types:

* Free
* Paid
* Subscription
* Membership
* Coming Soon
* Private
* Invite Only

Future types may be added without changing the architecture.

---

# 8. Database Tables

The Course Aggregate owns the following tables.

```text
ilms_courses

ilms_course_meta

ilms_course_pricing

ilms_course_requirements

ilms_course_targets

ilms_course_faq

ilms_course_categories

ilms_course_tags

ilms_course_tag_relationships
```

Other modules must not modify these tables directly.

---

# 9. Course Entity

## Core Fields

```text
ID

UUID

Title

Slug

Description

Excerpt

Thumbnail

Cover Image

Instructor ID

Primary Category

Language

Difficulty

Duration

Status

Visibility

Created At

Updated At
```

---

# 10. Pricing

Pricing information is stored independently.

Supported pricing models:

* One-time Payment
* Subscription
* Membership
* Free

Future pricing models should not require database redesign.

---

# 11. Visibility

Supported visibility levels:

* Public
* Private
* Password Protected
* Hidden
* Draft

Visibility does not affect publication status.

---

# 12. Learning Configuration

Each course defines its own learning settings.

Examples:

* Sequential Learning
* Drip Content
* Minimum Passing Score
* Completion Rules
* Preview Lessons
* Download Permissions

---

# 13. Curriculum

A Course owns multiple Sections.

Each Section owns multiple Lessons.

The Course Aggregate manages only the structure.

Lesson content belongs to the Learning Aggregate.

---

# 14. Business Rules

Examples:

A course must have at least one instructor.

A published course must have at least one section.

A paid course must define a valid price.

A deleted course cannot accept new enrollments.

Archived courses remain accessible to enrolled students unless explicitly disabled.

---

# 15. Events

The Course Aggregate emits events.

Examples:

```text
CourseCreated

CourseUpdated

CoursePublished

CourseArchived

CourseDeleted

CoursePriceChanged

InstructorAssigned

CourseDuplicated
```

Other modules listen to these events.

---

# 16. API Ownership

This aggregate owns endpoints related to:

```text
GET /courses

GET /courses/{id}

POST /courses

PUT /courses/{id}

DELETE /courses/{id}

POST /courses/{id}/publish

POST /courses/{id}/archive

POST /courses/{id}/duplicate
```

---

# 17. Permissions

Typical permissions include:

* View Course
* Create Course
* Edit Own Course
* Edit Any Course
* Publish Course
* Delete Course
* Archive Course
* Manage Pricing
* Assign Instructor

Permissions are role-based and enforced at the service layer.

---

# 18. Performance Considerations

* Frequently requested course lists should be cached.
* Listing endpoints should support pagination.
* Heavy metadata should be loaded only when required.
* Course cards should retrieve only lightweight summary data.
* Aggregate queries should avoid unnecessary joins.

---

# 19. Integration Points

The Course Aggregate interacts with:

* Learning Aggregate
* Enrollment Aggregate
* Assessment Aggregate
* Certificate Aggregate
* Commerce Aggregate
* Communication Aggregate
* Gamification Aggregate

Communication should occur through services or events rather than direct table access.

---

# 20. Future Expansion

The architecture should support future capabilities without structural changes.

Possible additions include:

* Learning Paths
* Multi-Instructor Collaboration
* Course Bundles
* AI-generated Course Metadata
* SCORM Packages
* xAPI Support
* Versioned Courses
* Course Marketplace
* Organization-owned Courses

---

# 21. Design Principles

The Course Aggregate must remain:

* Independent
* Extensible
* API-First
* Event-Driven
* Performance-Oriented
* Backward Compatible

Any future feature related to courses must integrate through this aggregate rather than bypassing it.
