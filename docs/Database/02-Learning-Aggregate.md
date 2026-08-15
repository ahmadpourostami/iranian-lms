# 02-Learning-Aggregate.md

# Learning Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Learning Aggregate is responsible for delivering educational content and managing the student's learning experience.

It controls how lessons are organized, presented, consumed, and completed.

This aggregate is the core of the learning engine and powers:

* Lesson Playback
* Learning Progress
* Continue Learning
* Focus Mode
* Notes
* Bookmarks
* Learning History
* Resources
* Downloads

The Learning Aggregate does **not** manage enrollments, quizzes, assignments, certificates, or payments.

---

# 2. Responsibilities

The Learning Aggregate is responsible for:

* Managing course curriculum
* Organizing sections
* Managing lessons
* Delivering lesson content
* Tracking lesson completion
* Tracking learning progress
* Continue Learning
* Managing bookmarks
* Managing personal notes
* Learning history
* Lesson resources
* Download permissions

---

# 3. Aggregate Root

```text
Lesson
```

Although lessons belong to a Course, the Lesson is the Aggregate Root of the learning process.

---

# 4. Entities

```text
Lesson

Section

LessonContent

LessonResource

LessonAttachment

LessonProgress

LearningHistory

Bookmark

StudentNote

VideoProgress

ContinueLearning
```

---

# 5. Relationships

```text
Course

├── Sections

│     ├── Lessons

│     │      ├── Resources

│     │      ├── Attachments

│     │      ├── Notes

│     │      ├── Bookmarks

│     │      └── Progress
```

---

# 6. Lesson Types

Supported lesson types:

* Video
* Text
* Audio
* PDF
* Live Session
* External URL
* SCORM (Future)
* Interactive Lesson (Future)

Each lesson type uses the same lifecycle.

---

# 7. Lesson Lifecycle

```text
Draft

↓

Published

↓

Updated

↓

Archived

↓

Deleted
```

Students only have access to published lessons.

---

# 8. Student Learning Lifecycle

```text
Not Started

↓

Started

↓

In Progress

↓

Completed
```

Additional future states:

* Paused
* Skipped
* Locked

---

# 9. Database Tables

```text
ilms_sections

ilms_lessons

ilms_lesson_contents

ilms_lesson_resources

ilms_lesson_attachments

ilms_lesson_progress

ilms_video_progress

ilms_learning_history

ilms_continue_learning

ilms_notes

ilms_bookmarks
```

---

# 10. Lesson Entity

Core fields:

```text
ID

UUID

Course ID

Section ID

Title

Slug

Type

Duration

Preview

Content

Video Provider

Video URL

Status

Order

Created At

Updated At
```

---

# 11. Focus Mode

Focus Mode is a distraction-free learning environment.

Features:

* Full-screen lesson experience
* Minimal header
* Auto-hide curriculum
* Floating controls
* Continue learning
* Quick notes
* Lesson resources
* Keyboard shortcuts
* Dark & Light modes
* Theater-style layout

Focus Mode is the default learning interface for video lessons.

---

# 12. Video Progress

The system automatically stores:

* Current playback position
* Last watched timestamp
* Playback percentage
* Total watch time
* Resume position

Students can continue from the exact second where they stopped.

---

# 13. Continue Learning

The aggregate maintains:

* Last opened lesson
* Last watched position
* Last course
* Recently viewed lessons
* Continue Learning recommendations

---

# 14. Student Notes

Each note belongs to:

* Student
* Lesson
* Timestamp

Example:

```text
08:35

Dependency Injection Example
```

Selecting the note reopens the lesson at the associated timestamp.

---

# 15. Bookmarks

Students can bookmark:

* Entire lessons
* Specific timestamps
* Important concepts

Bookmarks are synchronized across all supported clients.

---

# 16. Lesson Resources

Each lesson may include:

* PDF
* ZIP
* Source Code
* Images
* External Links
* Attachments

Access depends on course permissions.

---

# 17. Business Rules

Examples:

A lesson belongs to exactly one section.

A section belongs to exactly one course.

Lesson order must be unique within a section.

Deleted lessons cannot appear in Continue Learning.

Preview lessons are accessible without enrollment.

Sequential learning rules are enforced by the Course Aggregate.

---

# 18. Events

The aggregate emits:

```text
LessonStarted

LessonPaused

LessonResumed

LessonCompleted

VideoProgressUpdated

BookmarkCreated

BookmarkRemoved

NoteCreated

NoteUpdated

ContinueLearningUpdated
```

Other modules subscribe to these events.

---

# 19. API Ownership

```text
GET /lessons/{id}

GET /lessons/{id}/resources

POST /lessons/{id}/complete

POST /lessons/{id}/progress

POST /lessons/{id}/bookmark

POST /lessons/{id}/note

GET /continue-learning
```

---

# 20. Permissions

Permissions include:

* View Lesson
* Preview Lesson
* Download Resources
* Create Notes
* Edit Notes
* Delete Notes
* Bookmark Lesson
* Continue Learning

---

# 21. Performance Strategy

Learning pages are the most frequently visited screens.

Performance requirements:

* Progressive loading
* Video lazy loading
* Resource caching
* Optimized lesson queries
* Background progress synchronization
* Minimal payload for Continue Learning

---

# 22. Mobile Considerations

The Learning Aggregate must support:

* Resume playback
* Offline lesson downloads (Future)
* Picture-in-Picture
* Background audio
* Gesture navigation
* Full-screen player
* Auto-sync progress

All learning state must synchronize automatically between web and mobile.

---

# 23. Future Expansion

Potential future features:

* AI-generated lesson summaries
* AI note suggestions
* Automatic transcript generation
* Subtitle management
* Multi-language lessons
* Learning paths
* Offline packages
* Interactive video
* SCORM/xAPI compatibility

---

# 24. Design Principles

The Learning Aggregate must always be:

* Student-first
* Distraction-free
* Fast
* Mobile-ready
* API-first
* Event-driven
* Accessible
* Extensible

Every feature should improve the learning experience without introducing unnecessary complexity.
