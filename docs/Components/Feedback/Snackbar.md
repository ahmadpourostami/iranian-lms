# Snackbar

**Component:** Feedback
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Snackbar component provides brief, non-blocking feedback after a user action and may offer a contextual follow-up action.

Snackbar is especially useful when the system needs to acknowledge an action while giving the user a short opportunity to reverse, retry, or inspect that action.

---

# 2. Component Type

**Category**

Feedback Component

**Role**

Action Feedback & Recovery

---

# 3. Usage

The Snackbar component is used for:

* Item Deleted
* Item Archived
* Changes Saved
* Course Published
* Lesson Removed
* File Moved
* Assignment Submitted
* Settings Updated
* Action Undone
* Network Reconnected
* Background Operation Completed

Snackbar should primarily be associated with a recent user action.

---

# 4. Snackbar vs Toast

Snackbar and Toast are related but serve different purposes.

```text id="m8q4pk"
Toast

System Feedback

↓

Short Information

↓

Usually No Action
```

```text id="u5r8qc"
Snackbar

User Action

↓

Feedback

↓

Optional Recovery Action
```

Examples:

```text id="k3n7tx"
Toast:

Course saved successfully.
```

```text id="r9m2wy"
Snackbar:

Course deleted.

[Undo]
```

When an immediate recovery action is important, prefer Snackbar.

---

# 5. Anatomy

A Snackbar consists of:

```text id="y2v8pk"
Message

↓

Optional Action

↓

Optional Close Button

↓

Optional Progress Indicator
```

The message should remain concise.

---

# 6. Snackbar Types

Supported types:

```text id="p4k9mc"
Neutral

Success

Warning

Error

Action
```

The Action variant is especially useful when the user can reverse or continue an operation.

---

# 7. Variants

Supported variants:

```text id="v7q2ma"
Standard

Elevated

Compact
```

The Standard variant is recommended as the default.

---

# 8. Message

Messages should clearly communicate what happened.

Examples:

```text id="c5m7tv"
Changes saved.

Course archived.

File moved.

Assignment submitted.
```

Avoid technical system messages unless they are necessary for the user.

---

# 9. Action

A Snackbar may contain one primary contextual action.

Common actions:

* Undo
* Retry
* View
* Open
* Restore
* Reconnect

Example:

```text id="n7q3tw"
Lesson deleted.

[Undo]
```

Actions should directly relate to the message.

---

# 10. Action Priority

When an action is provided:

* Keep it short.
* Use a clear verb.
* Make it visually distinct.
* Avoid multiple competing actions.

Recommended:

```text id="f4n8pv"
Deleted

[Undo]
```

Avoid:

```text id="h3m9qw"
[Undo] [View] [Details] [Close]
```

---

# 11. Duration

Recommended durations:

```text id="t6q5mr"
Standard

4 Seconds

With Action

6 Seconds

Critical Error

Persistent
```

Users must have enough time to understand and activate an available action.

---

# 12. Placement

Supported positions:

```text id="m5v3kt"
Bottom Left

Bottom Center

Bottom Right
```

For the RTL-first Iran LMS interface, the recommended default is:

```text id="q8r4nw"
Bottom Left
```

Placement should avoid covering primary navigation or important controls.

---

# 13. Stacking

Multiple Snackbars should generally not appear simultaneously.

Recommended behavior:

* Maximum visible: **1**
* Additional messages enter a queue.
* New messages replace or follow the previous Snackbar according to priority.

This keeps the feedback layer predictable.

---

# 14. Queue Management

The Snackbar queue should:

* Preserve important messages.
* Avoid duplicate messages.
* Prevent notification flooding.
* Display messages sequentially.

Critical errors may bypass the normal queue when immediate attention is required.

---

# 15. Dismiss Behavior

Supported dismissal methods:

* Automatic Dismiss
* Action Completion
* Close Button
* Swipe Gesture on Mobile

A Snackbar with an important recovery action should remain visible long enough for the user to act.

---

# 16. Undo Pattern

Undo is one of the primary Snackbar use cases.

Recommended flow:

```text id="w6k2pv"
User Action

↓

Operation Executed

↓

Snackbar Appears

↓

[Undo]

↓

Reverse Operation
```

Undo should only be offered when the system can reliably reverse the operation.

---

# 17. Retry Pattern

Snackbars may provide a Retry action for recoverable operations.

Example:

```text id="r4m8qx"
Unable to save changes.

[Retry]
```

Retry should not be used when the underlying error requires a more detailed explanation.

---

# 18. Error Handling

For minor recoverable errors:

```text id="p7n3wc"
Upload failed.

[Retry]
```

For serious errors requiring detailed explanation, use:

* Alert
* Dialog
* Dedicated Error State

Snackbar should not hide important error information.

---

# 19. Progress Indicator

A progress indicator may represent the remaining display duration.

Example:

```text id="k5v9mt"
Course archived.    [Undo]
━━━━━━━━━━━━━━━━
```

Progress indicators should remain subtle.

---

# 20. Responsive Behavior

Desktop

* Floating Snackbar near the bottom edge.

Tablet

* Comfortable horizontal padding.

Mobile

* Near full width.
* Safe-area aware.
* Swipe-to-dismiss support.
* Large touch targets.

Snackbar should not cover essential mobile navigation.

---

# 21. Accessibility

The Snackbar component must support:

* WCAG 2.2 AA
* Screen Readers
* Keyboard Navigation
* Focus Management
* High Contrast Mode
* Reduced Motion

Important actions must be keyboard accessible.

---

# 22. ARIA Behavior

Snackbar announcements should use an appropriate live region.

Recommended behavior:

```text id="c3q8mv"
Informational

aria-live="polite"
```

Critical messages may require:

```text id="v7m2rx"
aria-live="assertive"
```

Use assertive announcements carefully to avoid disrupting users.

---

# 23. Keyboard Interaction

Supported keyboard actions:

* Tab → Focus Action
* Shift + Tab → Reverse Focus
* Enter / Space → Activate Action
* Escape → Dismiss (when permitted)

Keyboard users must be able to access the contextual action.

---

# 24. Animation

Recommended animations:

* Slide Up
* Fade In
* Fade Out
* Slide Down

Animations should remain subtle and respect the user's **Reduced Motion** preference.

---

# 25. Semantic Colors

Snackbar colors should follow the semantic color system:

```text id="n6q4pt"
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

Color must not be the only indicator of meaning.

---

# 26. Design Tokens

Examples:

```text id="t8m3qw"
snackbar-width

snackbar-min-height

snackbar-radius

snackbar-background

snackbar-shadow

snackbar-padding

snackbar-gap

snackbar-action-color
```

All visual properties should consume Design Tokens.

---

# 27. CSS Variables

Examples:

```css id="f5r9pk"
--snackbar-width
--snackbar-min-height
--snackbar-radius
--snackbar-bg
--snackbar-shadow
--snackbar-padding
--snackbar-gap
--snackbar-action-color
```

Implementation should remain token-driven.

---

# 28. Do

Recommended practices:

* Associate the Snackbar with a recent user action.
* Keep the message short.
* Offer Undo when appropriate.
* Use one clear action.
* Give users enough time to read and act.
* Queue multiple messages.
* Keep the interaction non-blocking.

---

# 29. Don't

Avoid:

* Long explanations.
* Multiple actions.
* Permanent messages without strong justification.
* Using Snackbar for complex errors.
* Hiding critical information inside a temporary message.
* Showing multiple Snackbars simultaneously.

Use Alert, Dialog, or dedicated Error States for more important communication.

---

# 30. Common Use Cases

Examples include:

* Course Deleted → Undo
* Lesson Archived → Undo
* File Moved → Undo
* Assignment Submitted → View
* Changes Saved → Dismiss
* Upload Failed → Retry
* Connection Restored → Dismiss
* Settings Updated → Undo

Snackbar is especially valuable for reversible actions.

---

# 31. Component Properties (Props)

Typical configurable properties include:

```text id="q4w8mv"
type

message

action

duration

placement

dismissible

progress

persistent

priority

animation
```

Additional properties may be introduced while preserving backward compatibility.

---

# 32. Future Expansion

Future enhancements may include:

* Smart Undo
* AI Recovery Suggestions
* Action Prediction
* Priority-Based Queueing
* Cross-Device Action Recovery
* Collaborative Action Feedback
* Offline Action Recovery

Future capabilities should extend the existing architecture.

---

# 33. Related Components

This component integrates with:

* Toast
* Alert
* Notification
* Dialog
* Button
* Icon
* Spinner
* Progress

Together they provide a complete feedback and recovery system.

---

# 34. Design Principles

The Snackbar component should always remain:

* Action-Oriented
* Non-Blocking
* Temporary
* Accessible
* Recoverable
* Contextual

The user should immediately understand what happened and, when appropriate, how to reverse or retry the action.

---

# 35. Design Decision

Iran LMS follows an **Action Feedback & Recovery Architecture**.

```text id="h6n4rv"
User Action

↓

System Response

↓

Snackbar

↓

Optional Recovery Action

↓

Continue Workflow
```

Snackbar is specifically designed for feedback that benefits from an immediate contextual action.

---

# 36. Strategic Vision

The Snackbar component provides a consistent action-feedback mechanism across the Iran LMS ecosystem. Whether undoing deleted content, retrying failed operations, restoring archived data, or opening recently affected resources, every Snackbar follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve Snackbar into an intelligent recovery layer capable of supporting AI-assisted recovery actions, smart prioritization, offline operation recovery, and cross-device continuity while maintaining speed, clarity, and minimal disruption.
