# Modal

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Modal System used throughout the Iran LMS platform.

Modals provide temporary interaction spaces without forcing users to leave their current context.

They should interrupt the user's workflow only when necessary.

---

# 2. Goals

The Modal System should be:

* Consistent
* Accessible
* Responsive
* Reusable
* Predictable
* Non-disruptive

Modals should simplify workflows, not complicate them.

---

# 3. Design Philosophy

A modal represents a focused task.

Users should always understand:

* Why the modal appeared
* What action is required
* How to close it
* What happens after completion

Only one primary task should exist inside a modal.

---

# 4. Modal Architecture

Every modal follows the same structure.

```text
Modal

↓

Overlay

↓

Container

↓

Header

↓

Body

↓

Footer

↓

Actions
```

Each section has a single responsibility.

---

# 5. Modal Types

Supported modal types

```text
Information

Confirmation

Form

Warning

Success

Error

Media Preview

Fullscreen

Drawer (Side Modal)
```

Each type follows the same interaction principles.

---

# 6. Overlay

The overlay separates the modal from the background.

It should:

* Dim background content
* Prevent unintended interaction
* Keep context visible

The background should never disappear completely.

---

# 7. Header

The header may include:

* Title
* Subtitle
* Close Button
* Status Badge

Every modal should clearly identify its purpose.

---

# 8. Body

The body contains the primary content.

Examples include:

* Forms
* Messages
* Images
* Videos
* Tables
* Course Information
* Lesson Details

Content should remain focused on one task.

---

# 9. Footer

The footer contains actions.

Typical actions

* Save
* Cancel
* Continue
* Delete
* Close

The primary action should be visually emphasized.

---

# 10. Confirmation Modal

Confirmation modals protect users from unintended actions.

Examples

* Delete Course
* Remove Student
* Cancel Order
* Publish Changes

Confirmation should be required only for important actions.

---

# 11. Form Modal

Small forms may appear inside modals.

Examples

* Create Category
* Rename Lesson
* Add Tag
* Invite Instructor

Large forms should open on dedicated pages instead.

---

# 12. Information Modal

Information modals communicate important messages.

Examples

* System Notice
* Update Information
* Learning Tips
* Release Notes

Users should dismiss them easily.

---

# 13. Media Modal

Media modals display:

* Images
* Videos
* Certificates
* Attachments

Media should maximize available viewing space.

---

# 14. Fullscreen Modal

Fullscreen modals are reserved for complex workflows.

Examples

* Quiz Builder
* Lesson Editor
* Course Builder
* Advanced Filters

Fullscreen modals should preserve navigation context.

---

# 15. Drawer

A Drawer slides in from the screen edge.

Typical usage

* Filters
* Notifications
* Settings
* Quick Details

Drawers should not interrupt the primary workflow.

---

# 16. Modal Size

Supported sizes

```text
XS

SM

MD

LG

XL

Fullscreen
```

Content determines the appropriate size.

---

# 17. Modal States

Supported states

```text
Opening

Default

Loading

Submitting

Success

Error

Closing
```

State transitions should remain smooth and predictable.

---

# 18. Closing Behavior

Users may close a modal by:

* Close Button
* Escape Key
* Cancel Action
* Clicking Outside (when appropriate)

Critical workflows may disable outside-click dismissal.

---

# 19. Focus Management

When opened:

* Focus moves into the modal.
* Keyboard navigation remains trapped inside.
* Closing returns focus to the previously active element.

Focus management is mandatory.

---

# 20. Responsive Behavior

Modals adapt across:

* Desktop
* Tablet
* Mobile

On mobile:

* Large modals may become full-screen.
* Actions remain easy to reach.
* Scrolling remains smooth.

---

# 21. Accessibility

Every modal must support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* Accessible Titles
* Accessible Close Button

The background should be hidden from assistive technologies while the modal is active.

---

# 22. Design Tokens

Examples

```text
modal-radius

modal-padding

modal-shadow

modal-width

modal-header-height

modal-footer-height

overlay-opacity
```

All modal styling should consume shared design tokens.

---

# 23. CSS Variables

Examples

```css
--modal-radius
--modal-padding
--modal-width
--modal-shadow
--modal-overlay-opacity
--modal-transition
```

Implementation should avoid hardcoded values.

---

# 24. Reusable Components

Modals should reuse existing components.

Examples

* Buttons
* Forms
* Inputs
* Tables
* Cards
* Alerts
* Progress Indicators

Modals compose components rather than replacing them.

---

# 25. Future Expansion

The Modal System supports:

* AI Assistants
* Live Collaboration
* Mobile Applications
* White Label Themes
* Multi-Step Wizards
* Side Panels

Future modal types should inherit the existing architecture.

---

# 26. Design Principles

Modals should always remain:

* Focused
* Lightweight
* Accessible
* Predictable
* Non-intrusive
* Task-Oriented

A modal should solve one problem at a time.

---

# 27. Design Decision

Iran LMS follows a **Context-Preserving Modal Architecture**.

```text
Current Page

↓

Overlay

↓

Modal

↓

Reusable Components

↓

User Action

↓

Return to Context
```

Users should complete their task without losing their place in the application.

---

# 28. Strategic Vision

The Modal System provides a unified interaction model across the Iran LMS ecosystem.

Whether confirming an action, editing information, previewing content, or completing a focused workflow, every modal follows the same structure, accessibility rules, and interaction patterns.

The objective is to keep users productive by minimizing navigation interruptions while maintaining clarity, consistency, and confidence throughout the platform.
