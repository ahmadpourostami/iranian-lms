# 05-Learning.md

# Learning Module

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Learning module is responsible for managing the student's learning journey after enrollment.

It tracks learning progress, lesson completion, study sessions, bookmarks, notes, learning history, and the overall learning experience.

The Learning module begins its responsibility when a learner starts studying a course.

---

# 2. Responsibilities

The Learning module is responsible for:

* Learning Progress
* Lesson Completion
* Continue Learning
* Learning Sessions
* Watch Progress
* Focus Mode
* Learning History
* Bookmarks
* Personal Notes
* Resume Learning
* Recently Viewed Lessons
* Offline Sync (Future)

---

# 3. Business Boundaries

The Learning module owns:

* Learning Progress
* Lesson Completion
* Study Sessions
* Video Progress
* Learning Timeline
* Notes
* Bookmarks

The module does **not** own:

* Courses
* Lessons
* Enrollments
* Quizzes
* Certificates
* Orders

---

# 4. Learning Lifecycle

```text id="8lghpq"
Enrollment

↓

Start Learning

↓

Lesson Progress

↓

Course Progress

↓

Course Completed

↓

Certificate Eligible
```

The module tracks learning activities but does not issue certificates.

---

# 5. Learning Aggregate

```text id="y27m9s"
Learning
│
├── Progress
├── Sessions
├── Lesson Status
├── Video Progress
├── Notes
├── Bookmarks
├── History
└── Resume Position
```

Each learner has one Learning Aggregate per enrollment.

---

# 6. Course Progress

Progress is calculated automatically.

Examples

* Lessons Completed
* Total Lessons
* Completion Percentage
* Remaining Lessons
* Estimated Time Left

Progress should always be derived from completed learning activities.

---

# 7. Lesson Status

Supported states

```text id="e1w9ju"
Not Started

In Progress

Completed

Skipped
```

Each lesson maintains an independent status.

---

# 8. Video Progress

For video lessons, the module stores:

* Current Position
* Duration
* Watch Percentage
* Last Playback Time
* Last Viewed At

Video files remain owned by the Media module.

---

# 9. Focus Mode

Focus Mode provides a distraction-free learning experience.

Features include:

* Fullscreen Video
* Hidden Navigation
* Minimal UI
* Keyboard Shortcuts
* Playback Controls
* Automatic Progress Saving
* Resume Playback
* Quick Note Panel
* Bookmark Timeline
* Lesson Navigation

Focus Mode is optimized for uninterrupted study sessions.

---

# 10. Continue Learning

The module maintains:

* Last Active Course
* Last Active Lesson
* Resume Position
* Continue Learning Queue

Users can resume learning with a single action.

---

# 11. Learning Sessions

Every study session stores:

* Session UUID
* User
* Course
* Lesson
* Start Time
* End Time
* Duration
* Device
* Platform

Sessions enable learning analytics.

---

# 12. Notes

Students may create private notes.

Each note includes:

* UUID
* Lesson
* Timestamp (Optional)
* Content
* Created At

Notes are visible only to their owner.

---

# 13. Bookmarks

Bookmarks allow quick navigation.

Bookmarks may reference:

* Lesson
* Video Timestamp
* Resource
* Paragraph (Future)

Bookmarks remain private.

---

# 14. Learning History

History records:

* Recently Viewed Lessons
* Recently Viewed Courses
* Resume Positions
* Learning Timeline

History improves user experience and recommendations.

---

# 15. Completion Rules

A lesson may be completed by:

* Manual Completion
* Automatic Completion
* Video Threshold
* Quiz Requirement
* Assignment Requirement

Completion rules are configurable per lesson.

---

# 16. Progress Calculation

Example

```text id="w8g5nb"
Completed Lessons

÷

Total Required Lessons

=

Course Progress
```

Optional lessons should not reduce completion percentage unless configured.

---

# 17. Events

Published events

```text id="fjlwm3"
LearningStarted

LessonStarted

LessonCompleted

CourseCompleted

BookmarkCreated

NoteCreated

ResumePositionUpdated
```

Other modules may subscribe to these events.

---

# 18. Learning Statistics

Available metrics

* Total Study Time
* Completed Lessons
* Completed Courses
* Learning Streak
* Average Session Length
* Daily Activity
* Weekly Activity

Statistics support dashboards and reports.

---

# 19. Validation

Examples

```text id="ztg0wm"
LESSON_NOT_AVAILABLE

LESSON_ALREADY_COMPLETED

INVALID_RESUME_POSITION

BOOKMARK_NOT_FOUND

NOTE_TOO_LONG
```

Errors follow the global API specification.

---

# 20. Performance

The Learning module should:

* Save progress asynchronously
* Batch frequent updates
* Cache resume positions
* Minimize write operations
* Support offline synchronization

Frequent progress updates should not overload the database.

---

# 21. Mobile Considerations

Mobile applications should support:

* Automatic Progress Sync
* Offline Learning Queue
* Resume Playback
* Background Progress Updates
* Local Cache

Synchronization conflicts should be resolved safely.

---

# 22. Future Expansion

The Learning module supports:

* Offline Learning
* AI Learning Assistant
* Smart Recommendations
* Personalized Learning Paths
* Adaptive Learning
* Cross-Device Synchronization
* Learning Goals
* Pomodoro Integration

Future capabilities should integrate without redesigning the module.

---

# 23. Internal Components

```text id="0k30uq"
Learning
│
├── Progress Manager
├── Session Manager
├── Lesson Tracker
├── Video Tracker
├── Focus Mode
├── Continue Learning
├── Bookmark Manager
├── Notes Manager
├── History Manager
├── Statistics Engine
└── Learning API
```

Each component has a clearly defined responsibility.

---

# 24. Module Dependencies

The Learning module depends on:

```text id="9jqlp4"
Core

Courses

Enrollments

Media
```

The module does **not** depend on:

* Commerce
* Certificates
* Notifications

It publishes events that these modules may consume.

---

# 25. Ownership Boundaries

| Data              | Owner Module |
| ----------------- | ------------ |
| Course            | Courses      |
| Lesson            | Courses      |
| Enrollment        | Enrollments  |
| Learning Progress | Learning     |
| Study Session     | Learning     |
| Video Progress    | Learning     |
| Bookmark          | Learning     |
| Note              | Learning     |
| Certificate       | Certificates |

Ownership boundaries must remain explicit.

---

# 26. Learning State Machine

```text id="f6j4lw"
Not Started

↓

In Progress

↓

Completed

↓

Reviewed (Future)
```

Transitions must always follow business rules.

---

# 27. Resume Learning Workflow

```text id="5rgnpk"
Open Course

↓

Find Resume Position

↓

Restore Lesson

↓

Restore Video Position

↓

Continue Learning
```

This workflow provides a seamless experience across devices.

---

# 28. Design Principles

The Learning module must remain:

* Student-Centric
* Progress-Oriented
* Event-Driven
* Device Independent
* Highly Performant
* Extensible
* Backward Compatible

The module is responsible for **how students learn**, not **what they learn**.

---

# 29. Learning Analytics

The module produces learning events for analytics.

Examples:

* Time Spent Per Lesson
* Completion Rate
* Drop-off Points
* Daily Learning Time
* Weekly Learning Activity
* Average Session Duration

Analytics consumers should subscribe to events rather than querying operational tables directly.

---

# 30. Cross-Device Synchronization

Learning progress must remain synchronized across:

```text id="l9u6h7"
Web

↓

Mobile

↓

Tablet

↓

Future Desktop Apps
```

The most recent valid learning state should become the authoritative source after conflict resolution.

---

# 31. Design Decision

The Learning module intentionally contains **no educational content**.

Courses, lessons and curriculum belong to the Courses module.

The Learning module only records **student interactions with educational content**.

This separation enables:

* Independent scaling
* Better performance
* Clean domain boundaries
* Accurate analytics
* Future AI-powered personalization
* Consistent synchronization across multiple client applications
