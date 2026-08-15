# 08-Communication-API.md

# Communication API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Communication API manages all communication channels within Iran LMS.

It provides endpoints for notifications, announcements, messaging, discussions, mentions, and system communications.

The API supports both real-time and asynchronous communication.

---

# 2. Base Endpoint

```text
/api/v1/communication
```

---

# 3. Resources

The Communication API manages:

* Notifications
* Announcements
* Direct Messages
* Conversations
* Course Discussions
* Lesson Discussions
* Comments
* Mentions
* Email Queue
* Push Notifications
* System Messages

---

# 4. Authentication

All endpoints require authentication unless explicitly marked as public.

```text
Bearer Token
```

---

# 5. Permissions

Examples

```text
communication.view

communication.message

communication.comment

communication.announcement

communication.manage
```

---

# 6. Notifications

## List Notifications

```http
GET /communication/notifications
```

Returns paginated notifications.

Supports:

* Pagination
* Filtering
* Sorting

---

## Get Notification

```http
GET /communication/notifications/{uuid}
```

---

## Mark as Read

```http
POST /communication/notifications/{uuid}/read
```

Event

```text
NotificationRead
```

---

## Mark All as Read

```http
POST /communication/notifications/read-all
```

---

## Delete Notification

```http
DELETE /communication/notifications/{uuid}
```

---

# 7. Direct Messages

## List Conversations

```http
GET /communication/conversations
```

---

## Get Conversation

```http
GET /communication/conversations/{uuid}
```

---

## Send Message

```http
POST /communication/messages
```

Example Request

```json
{
  "receiver_uuid": "...",
  "message": "Hello!"
}
```

Event

```text
MessageSent
```

---

## Edit Message

```http
PUT /communication/messages/{uuid}
```

Editing may be restricted by configurable time limits.

---

## Delete Message

```http
DELETE /communication/messages/{uuid}
```

Soft Delete.

---

# 8. Course Discussions

## List Discussions

```http
GET /communication/discussions
```

Supports:

* Course
* Lesson
* Thread

---

## Create Discussion

```http
POST /communication/discussions
```

Example

```json
{
  "course_uuid": "...",
  "lesson_uuid": "...",
  "title": "...",
  "content": "..."
}
```

---

## Reply

```http
POST /communication/discussions/{uuid}/reply
```

---

## Close Discussion

```http
POST /communication/discussions/{uuid}/close
```

---

# 9. Announcements

## List Announcements

```http
GET /communication/announcements
```

---

## Create Announcement

```http
POST /communication/announcements
```

---

## Update Announcement

```http
PUT /communication/announcements/{uuid}
```

---

## Delete Announcement

```http
DELETE /communication/announcements/{uuid}
```

---

# 10. Mentions

## My Mentions

```http
GET /communication/mentions
```

Returns all messages or discussions where the authenticated user is mentioned.

---

# 11. Email Queue

## My Email History

```http
GET /communication/emails
```

Returns emails delivered to the authenticated user.

Administrator endpoints may expose delivery status and queue information.

---

# 12. Push Notifications

## Register Device

```http
POST /communication/push/register
```

Example Request

```json
{
  "device_token": "...",
  "platform": "android"
}
```

---

## Remove Device

```http
DELETE /communication/push/{uuid}
```

---

# 13. Filtering

Supported filters

```text
type

status

course

lesson

sender

receiver

created_at
```

---

# 14. Sorting

Supported

```text
created_at

updated_at

priority

read_at
```

---

# 15. Business Rules

Examples

Users may only access their own private conversations.

Announcements are visible only to their target audience.

Notifications are immutable after creation.

Deleted messages are soft-deleted unless retention policies require otherwise.

Mentions automatically generate notifications.

Discussion permissions follow course enrollment rules.

---

# 16. Events

```text
NotificationCreated

NotificationRead

NotificationDeleted

MessageSent

MessageEdited

MessageDeleted

DiscussionCreated

DiscussionReplied

DiscussionClosed

AnnouncementPublished

AnnouncementUpdated

MentionCreated

PushRegistered
```

---

# 17. Error Codes

Examples

```text
MESSAGE_NOT_FOUND

NOTIFICATION_NOT_FOUND

DISCUSSION_NOT_FOUND

ANNOUNCEMENT_NOT_FOUND

ACCESS_DENIED

INVALID_RECIPIENT

PUSH_DEVICE_NOT_FOUND
```

---

# 18. Performance Notes

The Communication API should:

* Queue email delivery.
* Batch notification creation.
* Cache unread notification counts.
* Optimize conversation queries.
* Use asynchronous processing for push notifications.
* Minimize database writes for read status updates.

Real-time communication should remain responsive under high load.

---

# 19. Mobile Considerations

Mobile applications should support:

* Push notifications
* Offline message cache
* Background synchronization
* Deep linking from notifications
* Real-time unread badge updates

The communication experience should remain consistent across all clients.

---

# 20. Future Expansion

The Communication API is designed to support:

* Real-time WebSocket Messaging
* Live Chat
* Voice Messages
* Video Messages
* AI Assistant Conversations
* Community Forums
* Instructor Office Hours
* Broadcast Channels
* Multi-language Notifications
* External Notification Providers

These capabilities should integrate without requiring breaking API changes.
