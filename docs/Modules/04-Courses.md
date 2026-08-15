# 04-Courses.md

# Courses Module

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Courses module is the core business module of Iran LMS.

It is responsible for the complete lifecycle of educational content, including course creation, organization, publishing, pricing metadata, instructors, and curriculum structure.

The module owns the educational content itself.

It does **not** manage enrollments, learning progress, assessments, or payments.

---

# 2. Responsibilities

The Courses module is responsible for:

* Course Management
* Course Structure
* Sections
* Lessons
* Course Metadata
* Categories
* Tags
* Instructor Assignment
* Publishing Workflow
* Course Visibility
* Course Versioning
* Course Prerequisites
* Learning Paths (Future)

---

# 3. Business Boundaries

The Courses module owns:

* Courses
* Sections
* Lessons
* Categories
* Tags
* Curriculum Structure

The module does **not** own:

* Student Progress
* Enrollments
* Quiz Attempts
* Certificates
* Orders
* Notifications

---

# 4. Aggregate Structure

```text id="x3kj1n"
Course
│
├── Sections
│     ├── Lessons
│     ├── Resources
│     └── Metadata
│
├── Categories
├── Tags
├── Instructors
├── Prerequisites
└── Publishing
```

The **Course Aggregate** is the primary aggregate of this module.

---

# 5. Course Lifecycle

```text id="r8y2u4"
Draft

↓

In Review

↓

Published

↓

Updated

↓

Archived
```

Every state transition should be validated through business rules.

---

# 6. Course Entity

Each course includes:

* UUID
* Title
* Slug
* Subtitle
* Description
* Difficulty Level
* Language
* Estimated Duration
* Cover Image
* Intro Video
* Visibility
* Status
* Created At
* Updated At
* Published At

---

# 7. Sections

A course contains one or more sections.

Each section contains:

* UUID
* Title
* Position
* Description

Sections exist only inside a course.

---

# 8. Lessons

Lessons belong to a section.

Supported lesson types:

```text id="ljc9b5"
Video

Article

Live Session

Assignment

Quiz

Download

External Link
```

Each lesson owns:

* UUID
* Title
* Position
* Lesson Type
* Estimated Duration
* Preview Status

Lesson completion belongs to the Learning module.

---

# 9. Categories

Courses may belong to multiple categories.

Categories support:

* Hierarchy
* Slug
* Icon
* Visibility
* Ordering

Categories are reusable.

---

# 10. Tags

Tags provide lightweight classification.

Examples

```text id="9bzjlwm"
PHP

WordPress

Laravel

React

UI Design
```

Tags are optional.

---

# 11. Instructor Assignment

A course may have:

* Primary Instructor
* Co-Instructors
* Guest Instructors

Instructor profile information comes from the Users module.

---

# 12. Course Visibility

Visibility levels

```text id="tv6ejy"
Public

Private

Organization

Hidden

Unlisted
```

Visibility determines discoverability, not access rights.

---

# 13. Publishing Workflow

Publishing actions include:

* Save Draft
* Submit for Review
* Publish
* Unpublish
* Archive

Publishing should generate domain events.

---

# 14. Course Metadata

Metadata examples:

* Difficulty
* Duration
* Language
* Skill Level
* Target Audience
* Requirements
* Learning Outcomes

Metadata improves search and discovery.

---

# 15. Course Resources

Lessons may reference:

* Videos
* Documents
* Images
* Audio
* External URLs

Files are managed by the Media module.

---

# 16. Prerequisites

Courses may require:

* Completion of another course
* Minimum score
* Organization membership
* Manual approval

Enrollment validation is handled by the Enrollments module.

---

# 17. Versioning

Each published course may maintain versions.

Example

```text id="xh2yb0"
Version 1.0

↓

Version 1.1

↓

Version 2.0
```

Version history should preserve previous published states.

---

# 18. Events

Published events

```text id="ygb7tw"
CourseCreated

CourseUpdated

CoursePublished

CourseArchived

SectionCreated

LessonCreated

LessonUpdated
```

Other modules subscribe to these events when necessary.

---

# 19. Validation

Examples

```text id="it1bpb"
INVALID_COURSE

COURSE_NOT_FOUND

INVALID_SECTION

INVALID_LESSON

COURSE_NOT_PUBLISHED

INVALID_PREREQUISITE
```

Errors follow the global API specification.

---

# 20. Performance

The Courses module should:

* Cache published courses
* Cache curriculum trees
* Optimize category lookups
* Use lazy loading for lesson content
* Avoid recursive queries

Published content should be highly cacheable.

---

# 21. Search Integration

The Search module indexes:

* Course Title
* Subtitle
* Description
* Categories
* Tags
* Instructor Name
* Learning Outcomes

The Courses module publishes events to trigger re-indexing.

---

# 22. Mobile Considerations

Mobile applications should:

* Download curriculum structure efficiently
* Cache course metadata
* Lazy load lesson content
* Support offline metadata browsing

Lesson progress synchronization belongs to the Learning module.

---

# 23. Future Expansion

The module supports:

* Learning Paths
* Bundled Courses
* Course Templates
* AI Course Generation
* Localization
* Multi-Instructor Workflows
* SCORM Packages
* xAPI Content

Future capabilities should not require redesigning the aggregate.

---

# 24. Internal Components

```text id="w7r1bm"
Courses
│
├── Course Manager
├── Curriculum Manager
├── Section Manager
├── Lesson Manager
├── Category Manager
├── Tag Manager
├── Instructor Assignment
├── Publishing Workflow
├── Version Manager
├── Search Publisher
└── Course API
```

Each component has a clearly defined responsibility.

---

# 25. Module Dependencies

The Courses module depends on:

```text id="5lm2vl"
Core

Users

Media

Search (Events Only)
```

The module does **not** depend on:

* Learning
* Enrollments
* Commerce
* Certificates

This keeps educational content independent from business processes.

---

# 26. Ownership Boundaries

| Data               | Owner Module |
| ------------------ | ------------ |
| Course             | Courses      |
| Section            | Courses      |
| Lesson             | Courses      |
| Category           | Courses      |
| Tag                | Courses      |
| Instructor Profile | Users        |
| Enrollment         | Enrollments  |
| Lesson Progress    | Learning     |
| Quiz Attempt       | Assessments  |
| Certificate        | Certificates |
| Order              | Commerce     |

Ownership boundaries must remain explicit.

---

# 27. Course Lifecycle Events

```text id="eiz6vw"
CourseCreated

↓

CourseUpdated

↓

CourseSubmittedForReview

↓

CoursePublished

↓

CourseVersionReleased

↓

CourseArchived
```

Every transition publishes a domain event.

---

# 28. Design Principles

The Courses module must remain:

* Content-Centric
* Aggregate-Oriented
* Version-Aware
* Event-Driven
* Highly Cacheable
* Extensible
* Backward Compatible

Educational content is the responsibility of the Courses module; all learner interactions are delegated to other modules.

---

# 29. Curriculum Model

The curriculum hierarchy is fixed and predictable.

```text id="bpkczd"
Course
│
├── Section
│     ├── Lesson
│     │     ├── Resources
│     │     ├── Attachments
│     │     └── Lesson Metadata
│
└── Course Metadata
```

This structure ensures a consistent learning experience across web, mobile, and future client applications.

---

# 30. Design Decision

The Courses module is intentionally designed as a **Content Management Module**, not a **Learning Management Module**.

Its responsibility ends when educational content is published.

Everything that happens **after** a learner starts interacting with the course—progress tracking, lesson completion, quizzes, certificates, achievements, and enrollments—is owned by other dedicated modules.

This separation of concerns keeps the architecture clean, scalable, and suitable for future expansion into enterprise, mobile, and AI-powered learning platforms.
