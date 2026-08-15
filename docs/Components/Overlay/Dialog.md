# Dialog

**Component:** Overlay
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Dialog component presents short, focused interactions that require an immediate user decision before continuing.

Unlike a Modal, which may contain complex forms or workflows, a Dialog is designed for concise communication, confirmations, alerts, and simple decision-making.

---

# 2. Component Type

**Category**

Overlay Component

**Role**

Decision & Confirmation Dialog

---

# 3. Usage

The Dialog component is used for:

* Delete Confirmation
* Publish Confirmation
* Logout Confirmation
* Session Expiration
* Permission Requests
* Warning Messages
* Success Messages
* Error Messages
* Unsaved Changes
* Reset Confirmation
* AI Confirmation
* Security Alerts

Dialogs should request a decision, not perform lengthy workflows.

---

# 4. Anatomy

A Dialog consists of:

```text id="m8q4pk"
Backdrop

↓

Dialog Container

↓

Icon (Optional)

↓

Title

↓

Description

↓

Actions
```

Dialogs should remain visually compact.

---

# 5. Dialog Types

Supported dialog types:

```text id="u5r8qc"
Confirmation

Alert

Warning

Error

Success

Information

Permission

Session
```

Each type communicates a specific level of urgency.

---

# 6. Sizes

Supported sizes:

```text id="k3n7tx"
Small

Medium

Large
```

Recommended widths:

```text id="r9m2wy"
Small

360px

Medium

480px

Large

600px
```

Dialogs should not become full-screen except on small mobile devices.

---

# 7. Icon

Dialogs may display an icon representing the message.

Examples:

* Success
* Warning
* Error
* Information
* Question

Icons reinforce meaning but should never replace text.

---

# 8. Title

Titles should clearly describe the decision.

Examples:

```text id="y2v8pk"
Delete Course?

Discard Changes?

Session Expired
```

Titles should remain short and direct.

---

# 9. Description

Descriptions explain:

* What happened.
* What will happen next.
* Any consequences.

Example:

```text id="p4k9mc"
Deleting this course cannot be undone.
```

Descriptions should remain concise.

---

# 10. Actions

Typical actions include:

* Confirm
* Cancel
* Continue
* Delete
* Retry
* Close
* Save
* Discard

Primary and secondary actions should be visually distinguishable.

---

# 11. Button Order

Recommended order:

```text id="v7q2ma"
Primary Action

Secondary Action
```

Destructive actions should use semantic danger styling.

---

# 12. Dismiss Behavior

Dialogs may close by:

* Action Buttons
* Escape Key
* Close Button
* Clicking Outside (optional)

Critical confirmations should prevent accidental dismissal.

---

# 13. Confirmation Dialog

Example:

```text id="n7q3tw"
Delete Student?

[Delete]

[Cancel]
```

Confirmation dialogs should clearly communicate irreversible actions.

---

# 14. Alert Dialog

Example:

```text id="c4w9pk"
Connection Lost

Please reconnect to continue.
```

Alerts inform users without requiring complex interaction.

---

# 15. Warning Dialog

Warning dialogs should:

* Explain the risk.
* Highlight consequences.
* Offer a safe alternative when possible.

---

# 16. Error Dialog

Error dialogs should include:

* Error description
* Recovery option
* Retry action (when appropriate)

Users should always understand how to proceed.

---

# 17. Responsive Behavior

Desktop

* Centered dialog.

Tablet

* Medium width.

Mobile

* Nearly full width.
* Large touch targets.

Dialogs should remain readable and actionable on every device.

---

# 18. Accessibility

The Dialog component must support:

* WCAG 2.2 AA
* Focus Trap
* Screen Readers
* Keyboard Navigation
* High Contrast Mode

Focus should move into the dialog when it opens and return to the triggering element when it closes.

---

# 19. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate actions
* Shift + Tab → Reverse navigation
* Enter → Activate primary action
* Escape → Close (when permitted)

Keyboard users should always know which action is focused.

---

# 20. Animation

Recommended animations:

* Fade
* Scale
* Soft Pop

Animations should remain subtle and respect the user's **Reduced Motion** preference.

---

# 21. Design Tokens

Examples

```text id="t5m7qx"
dialog-width

dialog-radius

dialog-background

dialog-shadow

dialog-padding

dialog-icon-size
```

All visual properties should consume Design Tokens.

---

# 22. CSS Variables

Examples

```css id="f8v2kr"
--dialog-width
--dialog-radius
--dialog-bg
--dialog-shadow
--dialog-padding
--dialog-icon-size
```

Implementation should remain token-driven.

---

# 23. Do

Recommended practices:

* Keep dialogs concise.
* Focus on one decision.
* Clearly label actions.
* Highlight destructive actions.
* Provide recovery options for errors.

---

# 24. Don't

Avoid:

* Long forms.
* Multi-step workflows.
* Excessive text.
* Ambiguous button labels.
* Multiple dialogs stacked together.

Use a Modal or Drawer for more complex interactions.

---

# 25. Common Use Cases

Examples include:

* Delete Confirmation
* Publish Confirmation
* Logout
* Session Timeout
* Payment Success
* Error Notification
* Unsaved Changes
* Retry Request
* Permission Request
* AI Confirmation

Dialogs support short, high-priority user decisions.

---

# 26. Component Properties (Props)

Typical configurable properties include:

```text id="q3w8pn"
type

title

description

icon

actions

dismissible

size

animation

loading

danger
```

Additional properties may be introduced while preserving backward compatibility.

---

# 27. Future Expansion

Future enhancements may include:

* AI Decision Suggestions
* Smart Confirmation Messages
* Voice Confirmation
* Context-Aware Dialogs
* Adaptive Actions
* Enterprise Policy Dialogs

Future capabilities should extend the existing architecture.

---

# 28. Related Components

This component integrates with:

* Modal
* Drawer
* Button
* Icon
* Notification
* Tooltip
* Spinner

Together they provide a complete system for user communication and decision-making.

---

# 29. Design Principles

The Dialog component should always remain:

* Clear
* Focused
* Accessible
* Responsive
* Concise
* Action-Oriented

Users should understand the situation immediately and confidently choose the appropriate action.

---

# 30. Design Decision

Iran LMS follows a **Decision-Centered Interaction Architecture**.

```text id="h6n4rv"
Event

↓

Dialog

↓

User Decision

↓

Action

↓

Continue Workflow
```

Dialogs interrupt the workflow only when a user decision is essential.

---

# 31. Strategic Vision

The Dialog component provides a consistent decision-making experience across the Iran LMS ecosystem. Whether confirming destructive actions, displaying warnings, reporting errors, requesting permissions, or presenting AI-generated recommendations, every dialog follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Dialog into an intelligent decision interface capable of supporting AI-assisted confirmations, adaptive messaging, enterprise policy enforcement, and contextual guidance while maintaining clarity, safety, and user confidence.
