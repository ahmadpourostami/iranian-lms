# Modal

**Component:** Overlay
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Modal component presents focused content or actions in a layer above the current interface, temporarily interrupting the user's workflow until the required task is completed or dismissed.

Modals are intended for high-priority interactions that require user attention without navigating away from the current page.

---

# 2. Component Type

**Category**

Overlay Component

**Role**

Focused Interaction Dialog

---

# 3. Usage

The Modal component is used for:

* Confirmation Dialogs
* Create Course
* Edit Course
* Delete Confirmation
* Student Details
* Instructor Details
* Settings
* File Upload
* AI Assistant
* Live Class Configuration
* Payment Confirmation
* Media Preview

Use a Modal only when the task requires immediate user attention.

---

# 4. Anatomy

A Modal consists of:

```text id="p7m4kx"
Backdrop

↓

Container

↓

Header

↓

Body

↓

Footer

↓

Close Button
```

Every Modal should contain meaningful content and a clear exit path.

---

# 5. Modal Types

Supported modal types:

```text id="r5v8qc"
Standard

Confirmation

Form

Fullscreen

Scrollable

Side Modal

Media Preview

AI Assistant
```

The Standard Modal is recommended for most interactions.

---

# 6. Sizes

Supported sizes:

```text id="m3q9tp"
Small

Medium

Large

Extra Large

Fullscreen
```

Recommended widths:

```text id="k6n2wy"
Small

400px

Medium

600px

Large

800px

Extra Large

1200px
```

Responsive layouts may override fixed widths.

---

# 7. Header

The header may contain:

* Title
* Subtitle
* Status Badge
* Close Button

Every Modal should have a clear title.

---

# 8. Body

The body may include:

* Forms
* Text
* Tables
* Lists
* Charts
* Images
* Videos
* Tabs
* AI Content

Body content should remain scrollable when necessary.

---

# 9. Footer

The footer typically contains actions.

Examples:

* Save
* Cancel
* Delete
* Continue
* Confirm

Primary actions should be visually emphasized.

---

# 10. Close Button

A visible close button should be provided unless the workflow explicitly requires completion before exiting.

The close button should appear in the upper corner according to the current writing direction (RTL/LTR).

---

# 11. Backdrop

The backdrop:

* Focuses user attention.
* Prevents interaction with background content.
* Darkens the underlying interface.

Background interaction should be disabled while the modal is open.

---

# 12. Scrolling

Supported scrolling behavior:

```text id="u4r8mv"
Body Scroll

Internal Modal Scroll

Fullscreen Scroll
```

The page behind the modal should not scroll.

---

# 13. Dismiss Behavior

Depending on the workflow, a Modal may close by:

* Close Button
* Cancel Button
* Clicking Outside
* Escape Key

Critical confirmation dialogs should disable accidental dismissal.

---

# 14. Focus Management

When opened:

* Focus moves to the Modal.
* Keyboard focus remains trapped inside.
* Focus returns to the triggering element after closing.

Proper focus management is required for accessibility.

---

# 15. Stacking

Multiple modals should generally be avoided.

If stacking is necessary:

* Maximum depth: **2**
* Higher layers must visually dominate lower layers.

---

# 16. Responsive Behavior

Desktop

* Centered dialog.

Tablet

* Larger width.
* Reduced margins.

Mobile

* Fullscreen or Bottom Sheet.
* Large touch targets.
* Simplified spacing.

The interaction should remain comfortable on touch devices.

---

# 17. Accessibility

The Modal component must support:

* WCAG 2.2 AA
* Focus Trap
* Screen Readers
* Keyboard Navigation
* High Contrast Mode

The modal should announce itself when opened.

---

# 18. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate controls
* Shift + Tab → Reverse navigation
* Enter → Activate primary action
* Escape → Close (when permitted)

Keyboard users should never lose focus outside the modal.

---

# 19. Animation

Recommended animations:

* Fade
* Scale
* Slide Up
* Slide Down

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 20. Design Tokens

Examples

```text id="t9k5pr"
modal-width

modal-radius

modal-background

modal-shadow

modal-padding

modal-backdrop
```

All visual properties should consume Design Tokens.

---

# 21. CSS Variables

Examples

```css id="v6m2qa"
--modal-width
--modal-radius
--modal-bg
--modal-shadow
--modal-padding
--modal-backdrop
```

Implementation should remain token-driven.

---

# 22. Do

Recommended practices:

* Keep the modal focused on a single task.
* Use concise titles.
* Highlight the primary action.
* Provide a clear way to close the modal.
* Trap keyboard focus correctly.

---

# 23. Don't

Avoid:

* Multiple nested modals.
* Long multi-page workflows.
* Excessive scrolling.
* Hidden close actions.
* Large amounts of unrelated content.

Use dedicated pages for complex workflows.

---

# 24. Common Use Cases

Examples include:

* Create Course
* Edit Student
* Delete Confirmation
* Upload Files
* Certificate Preview
* AI Assistant
* Payment Confirmation
* Live Class Settings
* User Profile
* Organization Settings

Modals support focused, temporary interactions without leaving the current context.

---

# 25. Component Properties (Props)

Typical configurable properties include:

```text id="f3q8wn"
title

size

fullscreen

scrollable

backdrop

closeButton

dismissible

footer

loading

animation
```

Additional properties may be introduced while preserving backward compatibility.

---

# 26. Future Expansion

Future enhancements may include:

* AI Assistant Modal
* Split View Modal
* Collaborative Editing
* Draggable Modal
* Resizable Modal
* Multi-Step Wizard Modal

Future capabilities should extend the existing architecture.

---

# 27. Related Components

This component integrates with:

* Button
* Form
* Input
* Tabs
* Table
* Card
* Spinner
* Tooltip
* Notification

Together they create complete focused interaction workflows.

---

# 28. Design Principles

The Modal component should always remain:

* Focused
* Accessible
* Responsive
* Predictable
* Lightweight
* Task-Oriented

Users should complete the intended task quickly without losing context.

---

# 29. Design Decision

Iran LMS follows a **Focused Interaction Architecture**.

```text id="c8v4my"
Current Page

↓

Modal

↓

Focused Task

↓

Completion

↓

Return to Context
```

The Modal temporarily isolates an important interaction while preserving the user's original workflow.

---

# 30. Strategic Vision

The Modal component provides a consistent overlay experience across the Iran LMS ecosystem. Whether creating courses, editing records, confirming destructive actions, configuring live classes, interacting with AI tools, or previewing content, every modal follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Modal into an intelligent interaction container capable of supporting AI-powered workflows, collaborative editing, adaptive layouts, and enterprise-scale interactions while maintaining clarity, focus, and exceptional usability.
