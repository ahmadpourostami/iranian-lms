# 07-Communication-Aggregate.md

# Communication Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Communication Aggregate is responsible for all interactions between users and the platform.

It provides a unified communication infrastructure for notifications, messaging, discussions, announcements, questions, and future collaboration features.

The aggregate is responsible only for communication.

Business logic remains inside other aggregates.

---

# 2. Responsibilities

The Communication Aggregate is responsible for:

* Notifications
* Announcements
* Direct Messaging
* Course Discussions
* Lesson Q&A
* Comments
* Mentions
* Email Queue
* SMS Queue
* Push Notifications
* Communication History

---

# 3. Aggregate Root

```text
Communication
```

All communication objects originate from the Communication Aggregate.

---

# 4. Entities

```text
Communication

Notification

Announcement

Conversation

ConversationParticipant

Message

Comment

Question

Answer

Mention

CommunicationPreference

DeliveryLog
```

---

# 5. Relationships

```text
User

│

Communication

├── Notifications

├── Messages

├── Conversations

├── Questions

├── Answers

├── Comments

└── Delivery Logs
```

Communication can reference:

* Course
* Lesson
* Quiz
* Assignment
* Certificate

without owning those entities.

---

# 6. Communication Types

Supported communication channels:

* In-App Notification
* Email
* SMS
* Push Notification
* Internal Message
* Lesson Discussion
* Course Announcement
* System Alert

Future channels:

* WhatsApp
* Telegram
* Slack
* Microsoft Teams

---

# 7. Notification Lifecycle

```text
Created

↓

Queued

↓

Delivered

↓

Read

↓

Archived
```

Additional states:

* Failed
* Expired
* Cancelled

---

# 8. Database Tables

```text
ilms_notifications

ilms_notification_templates

ilms_notification_preferences

ilms_messages

ilms_conversations

ilms_conversation_participants

ilms_comments

ilms_questions

ilms_answers

ilms_mentions

ilms_delivery_logs
```

---

# 9. Notification Entity

Core fields:

```text
ID

UUID

Recipient ID

Sender ID

Type

Priority

Title

Body

Action URL

Status

Read At

Created At
```

---

# 10. Messaging

Supported capabilities:

* One-to-One Chat
* Instructor ↔ Student
* Group Conversation (Future)
* Attachments
* Read Receipts
* Typing Indicator (Future)

Messages are persistent and searchable.

---

# 11. Lesson Q&A

Students may:

* Ask Questions
* Reply
* Mark Accepted Answers
* Mention Users
* Vote (Future)

Questions belong to lessons but remain independent entities.

---

# 12. Announcements

Announcements support:

* Course-wide
* Lesson-specific
* Global
* Scheduled
* Pinned

Announcements are read-only.

Students cannot reply unless discussion is enabled.

---

# 13. Communication Preferences

Each user can configure:

* Email Notifications
* Push Notifications
* SMS Notifications
* Marketing Messages
* Course Updates
* Reminder Frequency

Preferences are synchronized across all clients.

---

# 14. Business Rules

Examples:

Notifications are immutable after delivery.

Deleted conversations remain in audit logs.

Unread notifications cannot disappear.

Communication history is never physically deleted.

Soft delete is preferred.

---

# 15. Events

```text
NotificationCreated

NotificationDelivered

NotificationRead

MessageSent

MessageRead

ConversationStarted

QuestionAsked

QuestionAnswered

CommentAdded

MentionTriggered
```

Other aggregates consume these events.

---

# 16. API Ownership

```text
GET /notifications

POST /notifications/read

GET /messages

POST /messages

GET /conversations

POST /questions

POST /answers

GET /announcements
```

---

# 17. Permissions

Permissions include:

* Send Message
* Delete Message
* Create Announcement
* Moderate Discussion
* Manage Notifications
* Manage Templates
* View Communication Logs

---

# 18. Performance Strategy

Communication services should:

* Queue outgoing messages.
* Batch notification delivery.
* Cache unread notification counts.
* Lazy-load conversation history.
* Archive old communication records.

High-volume communication must not impact core learning performance.

---

# 19. Mobile Considerations

Supported capabilities:

* Push Notifications
* Deep Links
* Offline Notification Cache
* Native Sharing
* Real-time Messaging
* Badge Counters

Communication state must remain synchronized across all devices.

---

# 20. Integration Points

The Communication Aggregate integrates with:

* Course Aggregate
* Learning Aggregate
* Enrollment Aggregate
* Assessment Aggregate
* Certificate Aggregate
* Commerce Aggregate
* Gamification Aggregate

Other aggregates publish events.

Communication decides how those events reach users.

---

# 21. Future Expansion

Potential future capabilities:

* AI Reply Suggestions
* AI Moderation
* Live Chat
* Voice Messages
* Video Messages
* Community Spaces
* Course Forums
* Organization Channels
* Translation Engine
* Multi-language Notifications

---

# 22. Design Principles

The Communication Aggregate must remain:

* Event-driven
* Non-blocking
* Extensible
* API-first
* Reliable
* Auditable
* User-centric

Communication should enhance the learning experience without becoming a distraction.
