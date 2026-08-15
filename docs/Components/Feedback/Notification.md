# Notification

**Component:** Feedback
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Notification component communicates events, updates, and activities that may require the user's attention.

Notifications are persistent or semi-persistent messages that users can review later through the Notification Center.

Unlike Toast and Snackbar, Notifications are part of the user's notification history and should remain accessible after the initial event.

---

# 2. Component Type

**Category**

Feedback Component

**Role**

Persistent User Notification

---

# 3. Usage

The Notification component is used for:

* New Assignments
* Exam Results
* New Messages
* Live Class Started
* Course Updates
* Certificate Issued
* Payment Events
* Enrollment Updates
* Instructor Messages
* System Announcements
* Security Events
* AI Recommendations
* Learning Reminders

Notifications should represent meaningful events rather than every minor system action.

---

# 4. Notification Center

Iran LMS provides a dedicated Notification Center where users can review their notification history.

Recommended structure:

```text
Notification Center

↓

Header

↓

Filters / Tabs

↓

Notification List

↓

Pagination / Load More
```

The current UI design uses:

```text
همه

خوانده نشده

خوانده شده
```

as the primary notification filters.

---

# 5. Anatomy

A Notification item consists of:

```text
Icon

↓

Title

↓

Description

↓

Context / Related Entity

↓

Timestamp

↓

Status

↓

Optional Action
```

Example:

```text
┌────────────────────────────────────┐
│  📋   تکلیف جدید ثبت شد             │
│      تکلیف «طراحی رابط کاربری»      │
│      در دوره UI/UX ثبت شد.           │
│                                      │
│      مشاهده تکلیف       ۱۰ دقیقه پیش │
└────────────────────────────────────┘
```

---

# 6. Notification Types

Supported types:

```text
Course

Assignment

Exam

Grade

Message

Live Class

Certificate

Payment

System

Security

AI

Reminder
```

Each type should have a recognizable semantic icon.

---

# 7. Status

Supported statuses:

```text
Unread

Read

Archived

Expired
```

The primary distinction should be between **Unread** and **Read**.

---

# 8. Unread State

Unread notifications should receive stronger visual emphasis.

Recommended indicators:

```text
Unread Dot

Bold Title

Subtle Background

Notification Badge
```

Example:

```text
●  تکلیف جدید ثبت شد
```

The unread indicator should not rely on color alone.

---

# 9. Read State

Read notifications should use reduced visual emphasis.

Recommended behavior:

* Normal title weight
* Neutral background
* Reduced status emphasis
* Preserve full content

Read notifications should remain accessible in notification history.

---

# 10. Notification Badge

The Notification component may expose an unread count.

Example:

```text
🔔 3
```

The badge should represent unread notifications, not total notifications.

Recommended behavior:

```text
0

↓

Hide Badge
```

```text
1–99

↓

Show Exact Count
```

```text
100+

↓

Show 99+
```

---

# 11. Notification Icon

Icons should communicate notification category.

Examples:

```text
Assignment

Clipboard

Exam

Document / Question

Grade

Chart

Message

Chat

Live Class

Broadcast

Certificate

Award

Payment

Wallet

System

Bell
```

The icon should remain visually secondary to the message.

---

# 12. Notification Title

Titles should be short and action-oriented.

Examples:

```text
تکلیف جدید ثبت شد

نمره آزمون ثبت شد

پیام جدید از مدرس

جلسه زنده آغاز شد
```

These patterns are consistent with the current Iran LMS notification design.

---

# 13. Description

The description provides additional context.

Example:

```text
تکلیف «طراحی رابط کاربری» در دوره
«طراحی UI/UX با Figma» ثبت شد.
```

Descriptions should answer:

* What happened?
* Where did it happen?
* Why is it relevant?

---

# 14. Related Entity

Notifications may reference an LMS entity.

Examples:

```text
Course

Lesson

Assignment

Exam

Certificate

Instructor

Student

Live Class

Payment
```

The related entity may be displayed as a label or metadata.

---

# 15. Timestamp

Every notification should display when the event occurred.

Supported formats:

```text
۱۰ دقیقه پیش

۳ ساعت پیش

دیروز، ۱۸:۳۰

۲ روز پیش
```

Relative timestamps are recommended for recent notifications.

Absolute dates may be displayed for older events.

---

# 16. Actions

Notifications may contain one contextual action.

Examples:

```text
مشاهده تکلیف

مشاهده نمره

مشاهده پیام

ورود به جلسه

مشاهده گواهینامه
```

The action should lead directly to the relevant context.

The current notification UI follows this pattern.

---

# 17. Mark as Read

Users should be able to mark notifications as read.

Supported actions:

```text
Mark as Read

Mark All as Read
```

Opening an unread notification may automatically mark it as read.

---

# 18. Mark as Unread

Users may optionally restore the unread state.

Use cases:

* Reminder for later
* Important message
* Follow-up required

This is especially useful for instructors and administrators.

---

# 19. Archive

Notifications may support archiving.

Archived notifications should:

* Leave the primary inbox.
* Remain recoverable.
* Preserve their original timestamp.
* Maintain their related entity.

---

# 20. Filtering

Supported filters:

```text
All

Unread

Read
```

Future filters may include:

```text
Assignments

Exams

Messages

Courses

System
```

The initial implementation should remain simple.

---

# 21. Notification Priority

Supported priorities:

```text
Low

Normal

High

Critical
```

Priority affects:

* Visual emphasis
* Delivery
* Persistence
* Optional sound
* Badge behavior

Critical notifications should be used sparingly.

---

# 22. Delivery Channels

The Notification system may support multiple channels:

```text
In-App

Email

SMS

Push

Browser

Mobile App
```

The UI Notification component is responsible primarily for the **In-App** channel.

Other delivery channels belong to the broader notification architecture.

---

# 23. Real-Time Notifications

Notifications may arrive without page refresh.

Possible technologies include:

```text
WebSocket

Server-Sent Events

Polling

Push Notifications
```

The UI should update the unread count immediately when a new notification arrives.

---

# 24. Notification Dropdown

The Header may provide a compact Notification Dropdown.

Example:

```text
🔔 3

↓

┌─────────────────────────┐
│ اعلان‌ها                 │
│                         │
│ ● تکلیف جدید ثبت شد      │
│ ● نمره آزمون ثبت شد      │
│   پیام جدید از مدرس      │
│                         │
│ مشاهده همه اعلان‌ها      │
└─────────────────────────┘
```

The Dropdown should provide a quick preview rather than replacing the full Notification Center.

---

# 25. Empty State

When no notifications exist:

```text
اعلانی وجود ندارد

در حال حاضر اعلان جدیدی برای شما وجود ندارد.
```

The Notification Center should transition to the shared `EmptyState` component.

---

# 26. Loading State

While notifications are loading:

```text
Notification List

↓

Skeleton
```

The shared `Skeleton` component should be used instead of displaying an indefinite Spinner for the entire notification list.

---

# 27. Error State

If notifications cannot be loaded:

```text
Unable to load notifications.

[Retry]
```

The error state should provide a recovery action.

---

# 28. Responsive Behavior

### Desktop

* Notification Dropdown in Topbar.
* Full Notification Center page.

### Tablet

* Wider Dropdown.
* Responsive Notification List.

### Mobile

* Full-width Notification Center.
* Bottom Sheet or full-screen preview where appropriate.
* Large touch targets.

The notification experience must remain accessible on small screens.

---

# 29. Accessibility

The Notification component must support:

* WCAG 2.2 AA
* Screen Readers
* Keyboard Navigation
* Focus Indicators
* High Contrast Mode
* Reduced Motion

Unread state must not depend only on color.

---

# 30. Screen Reader Behavior

New notifications may be announced through an appropriate live region.

Recommended:

```text
aria-live="polite"
```

Critical notifications may use:

```text
aria-live="assertive"
```

Assertive announcements should be reserved for genuinely urgent events.

---

# 31. Keyboard Interaction

Supported actions:

```text
Tab

↓

Navigate notification controls
```

```text
Enter / Space

↓

Open Notification
```

```text
Escape

↓

Close Notification Dropdown
```

Additional shortcuts may be introduced later.

---

# 32. Animation

Recommended animations:

* Subtle Badge Update
* Fade In
* Slide In
* Highlight New Notification

Animations should remain subtle.

When Reduced Motion is enabled:

```text
Animated Notification

↓

Static Notification
```

---

# 33. Sound

Optional notification sounds may be supported.

Sound should:

* Be disabled by default where appropriate.
* Follow user preferences.
* Never be the only indication.
* Support per-category settings.

Critical system events may optionally use a stronger sound.

---

# 34. Notification Preferences

Users should be able to configure notification delivery.

Example:

```text
Course Updates

✓ In-App
✓ Email

Assignments

✓ In-App
✓ Push

Marketing

□ In-App
□ Email
```

Notification Preferences should be implemented as part of the Settings system.

---

# 35. Design Tokens

Examples:

```text
notification-background

notification-unread-background

notification-radius

notification-padding

notification-icon-size

notification-title-color

notification-description-color

notification-time-color

notification-unread-indicator

notification-gap
```

All visual properties should consume Design Tokens.

---

# 36. CSS Variables

Examples:

```css
--notification-bg
--notification-unread-bg
--notification-radius
--notification-padding
--notification-icon-size
--notification-title-color
--notification-description-color
--notification-time-color
--notification-unread-indicator
--notification-gap
```

Implementation should remain token-driven.

---

# 37. Do

Recommended practices:

* Make unread notifications visually distinguishable.
* Provide direct contextual actions.
* Preserve notification history.
* Display meaningful timestamps.
* Group notifications logically.
* Allow users to mark notifications as read.
* Keep notification messages concise.
* Provide notification preferences.

---

# 38. Don't

Avoid:

* Sending notifications for insignificant events.
* Excessive notification badges.
* Long notification descriptions.
* Ambiguous titles.
* Using color as the only unread indicator.
* Making every notification high priority.
* Permanently storing irrelevant notifications.

Notification quality is more important than notification volume.

---

# 39. Common Use Cases

Examples include:

```text
تکلیف جدید ثبت شد

نمره آزمون ثبت شد

پیام جدید از مدرس

جلسه زنده آغاز شد

دوره بروزرسانی شد

گواهینامه صادر شد

پرداخت موفق بود

ثبت‌نام دوره تکمیل شد
```

The current Iran LMS notification design already uses assignment, exam grade, instructor message, and live-session notifications as primary examples.

---

# 40. Component Properties (Props)

Typical configurable properties include:

```text
id

type

title

description

icon

timestamp

status

priority

action

relatedEntity

read

archived

dismissible

persistent
```

Additional properties may be introduced while preserving backward compatibility.

---

# 41. Notification Data Model

A notification should conceptually contain:

```text
Notification
│
├── ID
├── Type
├── Title
├── Description
├── Icon
├── Status
├── Priority
├── Timestamp
├── User
├── Related Entity
├── Action
└── Metadata
```

The UI component should remain independent from the underlying persistence implementation.

---

# 42. Future Expansion

Future enhancements may include:

* AI-Personalized Notifications
* Smart Notification Prioritization
* Notification Bundling
* Digest Notifications
* Cross-Device Synchronization
* Push Notifications
* Mobile Notifications
* Email Notifications
* SMS Notifications
* Notification Analytics
* Organization-Wide Announcements
* Scheduled Notifications

These capabilities should be implemented through the broader Notification Service rather than tightly coupling them to the UI component.

---

# 43. Related Components

This component integrates with:

* Alert
* Toast
* Snackbar
* Dialog
* Dropdown
* Badge
* Icon
* Skeleton
* EmptyState
* Topbar
* Settings

Together they form the feedback and notification ecosystem.

---

# 44. Design Principles

The Notification component should always remain:

* Relevant
* Timely
* Contextual
* Accessible
* Actionable
* Persistent When Necessary
* Non-Intrusive

The system should notify users about things that matter rather than simply exposing every system event.

---

# 45. Design Decision

Iran LMS follows a **Persistent Notification Architecture**.

```text
System Event

↓

Notification Service

↓

Notification

↓

┌───────────────────┬──────────────────┐
│                   │                  │
Unread              Read               Archived
│                   │                  │
↓                   ↓                  ↓
Attention           History            Storage
```

The notification system separates temporary feedback from persistent user communication.

---

# 46. Notification Lifecycle

```text
Event Created

↓

Notification Generated

↓

Delivered

↓

Unread

↓

Viewed

↓

Read

↓

Archived / Retained
```

If the notification expires:

```text
Notification

↓

Expired

↓

Archived / Removed
```

Lifecycle behavior should depend on notification type and retention policy.

---

# 47. Strategic Vision

The Notification component is the persistent communication layer of the Iran LMS ecosystem.

It connects learning activities, assessments, instructors, courses, certificates, payments, live classes, security events, and future AI capabilities into a unified notification experience.

The long-term objective is to evolve the system from a simple notification list into an **intelligent notification platform** capable of:

* Understanding notification priority
* Grouping related events
* Personalizing delivery
* Reducing notification fatigue
* Synchronizing across devices
* Supporting AI-generated recommendations
* Respecting user notification preferences
* Supporting enterprise-wide communication

The UI component should remain lightweight while the underlying notification architecture grows independently with the LMS platform.
