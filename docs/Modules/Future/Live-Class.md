# Live-Class.md

# Live Class Module

**Version:** 1.0
**Status:** Future Architecture

---

# 1. Purpose

The Live Class module enables real-time online learning experiences within Iran LMS.

It provides infrastructure for live lectures, webinars, virtual classrooms, workshops, mentoring sessions, office hours, and interactive educational events.

The module is provider-agnostic and supports multiple video conferencing platforms through a unified architecture.

---

# 2. Vision

Live Classes are not just video meetings.

They are fully integrated learning sessions connected to courses, lessons, attendance, assignments, recordings, certificates, and learning analytics.

The goal is to make synchronous learning a first-class citizen of the platform.

---

# 3. Responsibilities

The Live Class module is responsible for:

* Live Sessions
* Meeting Scheduling
* Instructor Management
* Participant Management
* Attendance
* Waiting Rooms
* Session Recording
* Calendar Integration
* Live Chat Integration
* Session Analytics

---

# 4. Business Boundaries

The Live Class module owns:

* Live Sessions
* Session Scheduling
* Attendance Records
* Meeting Metadata
* Recordings Metadata
* Session Status

The module does **not** own:

* Courses
* Lessons
* Users
* Messages
* Certificates

Business modules reference Live Sessions through Live Session IDs.

---

# 5. Live Class Aggregate

```text
Live Class
│
├── Session
├── Schedule
├── Participants
├── Attendance
├── Recording
├── Waiting Room
├── Calendar
└── Analytics
```

Every live session has its own lifecycle.

---

# 6. Session Entity

Each session contains:

* UUID
* Course
* Lesson (Optional)
* Title
* Description
* Instructor
* Provider
* Status
* Start Time
* End Time
* Recording Status
* Created At

Sessions are immutable after completion except for metadata.

---

# 7. Supported Session Types

```text
Course Lecture

Webinar

Workshop

Office Hour

Group Discussion

Mentoring Session

Live Q&A

Organization Meeting
```

New session types may be added without architectural changes.

---

# 8. Supported Providers

Examples

```text
Zoom

Google Meet

Microsoft Teams

BigBlueButton

Jitsi Meet

Whereby

Custom Provider
```

Providers implement a common interface.

---

# 9. Session Lifecycle

```text
Draft

↓

Scheduled

↓

Waiting

↓

Live

↓

Ended

↓

Recording Processing

↓

Completed
```

Every transition is event-driven.

---

# 10. Scheduling

Scheduling supports:

* One-Time Sessions
* Recurring Sessions
* Time Zone Awareness
* Instructor Availability
* Capacity Limits
* Calendar Invitations

Scheduling should integrate with organization settings.

---

# 11. Participant Management

Supported participant roles

```text
Host

Co-Host

Instructor

Teaching Assistant

Student

Guest

Observer
```

Permissions depend on participant role.

---

# 12. Attendance

Attendance records include:

* Join Time
* Leave Time
* Total Duration
* Device Information
* Attendance Status
* Participation Score (Future)

Attendance is synchronized automatically.

---

# 13. Waiting Room

The waiting room supports:

* Early Join
* Manual Approval
* Automatic Admission
* Capacity Management
* Instructor Notifications

Waiting rooms improve session control.

---

# 14. Recording

Supported recording features

* Automatic Recording
* Manual Recording
* Cloud Storage
* Local Storage
* Recording Download
* Recording Access Control

Recordings are managed through the Media module.

---

# 15. Calendar Integration

Supported calendars

```text
Google Calendar

Microsoft Outlook

Apple Calendar

ICS Export
```

Calendar synchronization is optional.

---

# 16. Events

Consumed events

```text
EnrollmentCreated

CoursePublished

LessonUpdated

InstructorAssigned
```

Published events

```text
LiveSessionScheduled

LiveSessionStarted

ParticipantJoined

ParticipantLeft

AttendanceRecorded

LiveSessionEnded

RecordingReady
```

Other modules consume these events.

---

# 17. Validation

Examples

```text
LIVE_SESSION_NOT_FOUND

SESSION_FULL

SESSION_ALREADY_STARTED

PROVIDER_UNAVAILABLE

INVALID_TIME_SLOT

ATTENDANCE_NOT_FOUND
```

Errors follow the global API specification.

---

# 18. Performance

The Live Class module should:

* Support thousands of concurrent participants
* Minimize scheduling latency
* Synchronize attendance efficiently
* Queue recording processing
* Scale independently of other modules

Real-time traffic should not impact the rest of the platform.

---

# 19. Mobile Considerations

Mobile applications should support:

* Join Live Session
* Push Reminders
* Calendar Integration
* Picture-in-Picture
* Background Audio
* Recording Playback

The experience should be optimized for unstable network conditions.

---

# 20. Future Expansion

The architecture supports:

* AI Meeting Assistant
* Live Translation
* Live Captioning
* Whiteboard Collaboration
* Polls
* Breakout Rooms
* Shared Notes
* Interactive Labs
* VR Classrooms

Future capabilities should require no redesign.

---

# 21. Internal Components

```text
Live Class
│
├── Session Manager
├── Schedule Manager
├── Provider Adapter
├── Attendance Manager
├── Recording Manager
├── Calendar Manager
├── Notification Integration
├── Live Class API
└── Event Publisher
```

Each component has a single responsibility.

---

# 22. Module Dependencies

The Live Class module depends on:

```text
Core

Users

Courses

Media

Notifications
```

Optional integrations

```text
Learning

Organizations

Reports

Communication

AI
```

Business modules remain loosely coupled through events.

---

# 23. Ownership Boundaries

| Data           | Owner Module  |
| -------------- | ------------- |
| Course         | Courses       |
| User           | Users         |
| Recording File | Media         |
| Notification   | Notifications |
| Attendance     | Live Class    |
| Live Session   | Live Class    |

Only the Live Class module owns live session metadata.

---

# 24. Session Workflow

```text
Instructor

↓

Create Session

↓

Select Provider

↓

Schedule

↓

Notify Participants

↓

Session Starts

↓

Attendance

↓

Recording

↓

Learning Progress Updated
```

The workflow integrates with multiple business modules.

---

# 25. Security

The Live Class module should provide:

* Secure Join Links
* Waiting Room Protection
* Meeting Passwords
* Participant Authentication
* Recording Permissions
* Audit Logging

Access should always respect course enrollment and organizational policies.

---

# 26. Analytics

Collected metrics include:

* Attendance Rate
* Average Participation Time
* Session Duration
* Join Delay
* Recording Views
* Instructor Activity
* Drop-off Rate

Analytics feed the Reports module.

---

# 27. Design Principles

The Live Class module must remain:

* Provider-Agnostic
* Event-Driven
* Scalable
* Secure
* Extensible
* Real-Time Ready
* Backward Compatible

The module orchestrates live learning rather than implementing video conferencing technology.

---

# 28. Design Decision

The Live Class module follows a **Provider Adapter Pattern**.

```text
Instructor

↓

Live Class

↓

Provider Adapter

↓

Zoom / BBB / Meet / Teams

↓

Participants
```

The platform never communicates directly with a specific provider.

All integrations pass through a unified adapter interface, making providers interchangeable without affecting business logic.

---

# 29. Enterprise Readiness

The architecture supports enterprise-scale live learning, including:

* Multi-organization scheduling
* Large virtual classrooms
* Organization-specific providers
* Attendance auditing
* High-volume recurring sessions
* Centralized recording management
* Compliance logging
* Enterprise calendar integration

These capabilities make Iran LMS suitable for universities, corporate academies, training centers, and government organizations.

---

# 30. Strategic Vision

The Live Class module is designed to become the **Real-Time Learning Platform** of Iran LMS.

Rather than embedding a single meeting provider, it establishes a unified architecture for synchronous education, enabling instructors and organizations to choose their preferred conferencing technology while maintaining a consistent learning experience, centralized analytics, attendance tracking, and seamless integration with the broader LMS ecosystem.
