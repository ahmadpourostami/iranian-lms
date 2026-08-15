# 03-Learning-API.md

# Learning API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Learning API manages the learner experience.

It provides endpoints for consuming educational content, tracking progress, bookmarking lessons, taking notes, continuing learning, and managing the learning session.

This API is intended for students and learning clients.

Course creation and management are outside the scope of this API.

---

# 2. Base Endpoint

```text
/api/v1/learning
```

---

# 3. Resources

The Learning API manages:

* Learning Sessions
* Current Lesson
* Lesson Progress
* Continue Learning
* Lesson Completion
* Video Position
* Notes
* Bookmarks
* Learning History
* Focus Mode
* Last Activity

---

# 4. Authentication

All endpoints require authentication.

```text
Bearer Token
```

---

# 5. Permissions

Examples

```text
learning.view

learning.progress

learning.note.create

learning.bookmark

learning.complete
```

---

# 6. Endpoints

## Continue Learning

```http
GET /learning/continue
```

Returns the most recent unfinished learning items.

Response includes:

* Course
* Lesson
* Progress
* Remaining Time

---

## Current Learning Session

```http
GET /learning/session
```

Returns the active learning session.

---

## Start Learning

```http
POST /learning/session
```

Starts a new learning session.

Request

```json
{
    "lesson_uuid": "..."
}
```

Event

```text
LearningStarted
```

---

## Finish Learning Session

```http
POST /learning/session/finish
```

Marks the learning session as finished.

Event

```text
LearningFinished
```

---

## Lesson Progress

```http
GET /learning/progress
```

Returns learning progress.

Supports:

* Course
* Section
* Lesson

---

## Update Lesson Progress

```http
PATCH /learning/progress
```

Example Request

```json
{
    "lesson_uuid": "...",
    "progress": 72
}
```

Validation

* Progress 0-100
* Student enrolled

Event

```text
LessonProgressUpdated
```

---

## Complete Lesson

```http
POST /learning/lessons/{uuid}/complete
```

Validation

* Lesson viewed
* Completion requirements satisfied

Event

```text
LessonCompleted
```

---

## Uncomplete Lesson

```http
POST /learning/lessons/{uuid}/reset
```

Resets lesson completion.

Administrator permissions may be required depending on configuration.

---

## Save Video Position

```http
PATCH /learning/video-position
```

Example

```json
{
    "lesson_uuid": "...",
    "position": 845
}
```

Position is stored in seconds.

---

## Bookmarks

### List

```http
GET /learning/bookmarks
```

---

### Create

```http
POST /learning/bookmarks
```

Request

```json
{
    "lesson_uuid": "...",
    "time": 532,
    "title": "Important explanation"
}
```

---

### Delete

```http
DELETE /learning/bookmarks/{uuid}
```

---

## Notes

### List

```http
GET /learning/notes
```

---

### Create

```http
POST /learning/notes
```

---

### Update

```http
PUT /learning/notes/{uuid}
```

---

### Delete

```http
DELETE /learning/notes/{uuid}
```

Notes belong only to the learner.

---

## Learning History

```http
GET /learning/history
```

Returns:

* Courses
* Lessons
* Watch Time
* Completion History
* Last Activity

---

## Focus Mode

```http
GET /learning/focus
```

Returns configuration required for distraction-free learning.

Example

```json
{
    "sidebar": false,
    "comments": false,
    "autoplay": true,
    "dark_mode": true
}
```

---

# 7. Business Rules

Examples

Students cannot access lessons without enrollment.

Lesson completion may require watching a configurable percentage of the video.

Progress increases only forward unless reset.

Bookmarks belong only to their creator.

Video position is updated periodically.

Learning sessions automatically expire after inactivity.

---

# 8. Events

```text
LearningStarted

LearningFinished

LessonStarted

LessonCompleted

LessonReset

LessonProgressUpdated

VideoPositionSaved

BookmarkCreated

BookmarkDeleted

NoteCreated

NoteUpdated

NoteDeleted
```

---

# 9. Error Codes

Examples

```text
LESSON_NOT_FOUND

NOT_ENROLLED

PROGRESS_INVALID

SESSION_EXPIRED

BOOKMARK_NOT_FOUND

NOTE_NOT_FOUND

LEARNING_FORBIDDEN
```

---

# 10. Performance Notes

The Learning API should:

* Autosave progress asynchronously.
* Batch video progress updates.
* Cache continue-learning data.
* Minimize write operations.
* Avoid duplicate completion events.

Learning interactions should remain responsive even under heavy load.

---

# 11. Mobile Considerations

Supported features:

* Offline lesson progress cache
* Automatic synchronization
* Resume playback
* Background progress updates
* Native video player integration

Synchronization conflicts should be resolved safely.

---

# 12. Future Expansion

The Learning API is designed to support:

* Offline Learning
* AI Learning Assistant
* Smart Resume
* Adaptive Learning Paths
* Study Planner
* Pomodoro Sessions
* Live Lesson Tracking
* Multi-device synchronization
* Wearable Device Support

These features should integrate without changing existing API contracts.
