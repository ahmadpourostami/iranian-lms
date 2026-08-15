# Toast

**Component:** Feedback
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Toast component provides brief, non-blocking feedback about completed actions, background processes, or system events.

Unlike Alerts or Dialogs, Toasts appear temporarily without interrupting the user's workflow.

---

# 2. Component Type

**Category**

Feedback Component

**Role**

Temporary Notification

---

# 3. Usage

The Toast component is used for:

* Save Successful
* Course Published
* Lesson Created
* File Uploaded
* Payment Completed
* Clipboard Copied
* Settings Updated
* AI Task Completed
* Download Started
* Undo Available
* Network Reconnected
* Background Sync Finished

Toasts should confirm actions or communicate lightweight status updates.

---

# 4. Anatomy

A Toast consists of:

```text id="m8q4pk"
Status Icon

↓

Title

↓

Description (Optional)

↓

Action (Optional)

↓

Close Button (Optional)
```

The content should remain concise and immediately understandable.

---

# 5. Toast Types

Supported toast types:

```text id="u5r8qc"
Success

Info

Warning

Error

Neutral
```

Each type should follow the semantic color system.

---

# 6. Variants

Supported variants:

```text id="k3n7tx"
Filled

Soft

Outlined

Minimal
```

The Soft variant is recommended as the default.

---

# 7. Duration

Recommended display duration:

```text id="r9m2wy"
Success

3 Seconds

Info

4 Seconds

Warning

5 Seconds

Error

Persistent Until Dismissed
```

The duration should depend on the importance of the message.

---

# 8. Title

Examples:

```text id="y2v8pk"
Course Saved

Changes Updated

Download Started

Copied
```

Titles should clearly describe the completed action.

---

# 9. Description

Optional descriptions provide additional context.

Example:

```text id="p4k9mc"
Your course has been successfully published.
```

Descriptions should be short and informative.

---

# 10. Actions

Optional actions include:

* Undo
* Retry
* View
* Open
* Learn More

Actions should be limited to one primary contextual action.

---

# 11. Placement

Supported positions:

```text id="v7q2ma"
Top Left

Top Center

Top Right

Bottom Left

Bottom Center

Bottom Right
```

Recommended default:

```text id="c5m7tv"
Bottom Right
```

For RTL interfaces, the default placement is **Bottom Left**.

---

# 12. Stacking

Multiple Toasts may appear simultaneously.

Recommended behavior:

* Maximum visible: **3**
* Newest appears first.
* Older items move downward.

Additional Toasts should be queued automatically.

---

# 13. Queue Management

When the queue is full:

* Remove the oldest completed Toast.
* Preserve Error Toasts until dismissed.
* Maintain smooth transitions.

Queue management should prevent interface clutter.

---

# 14. Dismiss Behavior

Supported dismissal methods:

* Auto Dismiss
* Manual Close
* Swipe (Mobile)
* Action Completion

Critical errors should require manual dismissal.

---

# 15. Progress Indicator

Optional progress bars may indicate:

* Remaining visibility time
* Background task completion

Progress indicators should remain unobtrusive.

---

# 16. Responsive Behavior

Desktop

* Floating notification.

Tablet

* Slightly larger spacing.

Mobile

* Full-width near screen edge.
* Swipe-to-dismiss support.
* Large touch targets.

Toasts should never obscure essential UI controls.

---

# 17. Accessibility

The Toast component must support:

* WCAG 2.2 AA
* Screen Readers
* High Contrast Mode
* Keyboard Accessibility
* ARIA Live Regions

Success and informational messages should use **polite** announcements.

Error messages should use **assertive** announcements when appropriate.

---

# 18. Animation

Recommended animations:

* Slide In
* Fade In
* Fade Out
* Slide Out

Animations should remain subtle and respect the user's **Reduced Motion** preference.

---

# 19. Color Usage

Toast colors follow semantic tokens:

```text id="t6q5mr"
Success

Green

Info

Blue

Warning

Orange

Error

Red

Neutral

Gray
```

Icons, borders, and backgrounds should consistently reflect the semantic state.

---

# 20. Design Tokens

Examples

```text id="f4n8pv"
toast-width

toast-radius

toast-background

toast-shadow

toast-padding

toast-gap
```

All visual properties should consume Design Tokens.

---

# 21. CSS Variables

Examples

```css id="n5v3kt"
--toast-width
--toast-radius
--toast-bg
--toast-shadow
--toast-padding
--toast-gap
```

Implementation should remain token-driven.

---

# 22. Do

Recommended practices:

* Keep messages brief.
* Automatically dismiss non-critical messages.
* Offer Undo when appropriate.
* Display one clear primary action.
* Use semantic colors consistently.

---

# 23. Don't

Avoid:

* Long paragraphs.
* Multiple action buttons.
* Blocking user interaction.
* Using Toasts for critical confirmations.
* Showing too many Toasts simultaneously.

Dialogs or Alerts should be used for important decisions.

---

# 24. Common Use Cases

Examples include:

* Course Saved
* Lesson Published
* Payment Successful
* Download Started
* File Uploaded
* Clipboard Copied
* AI Response Ready
* Changes Undone
* Session Restored
* Network Reconnected

Toasts provide immediate confirmation while allowing uninterrupted workflow.

---

# 25. Component Properties (Props)

Typical configurable properties include:

```text id="h3m9qw"
type

title

description

duration

action

dismissible

placement

progress

animation

persistent
```

Additional properties may be introduced while preserving backward compatibility.

---

# 26. Future Expansion

Future enhancements may include:

* AI Prioritized Toasts
* Smart Queue Management
* Personalized Notification Timing
* Collaborative Toasts
* Cross-Device Synchronization
* Enterprise Notification Policies

Future capabilities should extend the existing architecture.

---

# 27. Related Components

This component integrates with:

* Alert
* Notification
* Dialog
* Banner
* Icon
* Button
* Spinner

Together they provide a complete feedback system across the platform.

---

# 28. Design Principles

The Toast component should always remain:

* Lightweight
* Non-Blocking
* Accessible
* Informative
* Responsive
* Temporary

Users should receive immediate feedback without interrupting their current task.

---

# 29. Design Decision

Iran LMS follows a **Non-Blocking Feedback Architecture**.

```text id="c8v4my"
User Action

↓

System Response

↓

Toast

↓

Continue Workflow
```

Toasts acknowledge successful or background events while allowing users to remain focused on their work.

---

# 30. Strategic Vision

The Toast component provides lightweight feedback across the Iran LMS ecosystem. Whether confirming course updates, file uploads, AI operations, payments, downloads, or synchronization events, every toast follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Toast component into an intelligent notification layer capable of supporting AI-prioritized messaging, adaptive timing, collaborative events, and enterprise-scale notification management while maintaining clarity, responsiveness, and minimal disruption.
