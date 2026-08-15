# Spinner

**Component:** Foundation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Spinner component indicates that the system is currently processing a task or loading data.

Unlike the Progress component, a Spinner does **not** communicate completion percentage. It is used when the remaining duration is unknown.

---

# 2. Component Type

**Category**

Foundation Component

**Role**

Loading Indicator

---

# 3. Usage

The Spinner component is used for:

* Page Loading
* API Requests
* Authentication
* AI Processing
* File Upload Initialization
* Search Requests
* Dashboard Refresh
* Data Synchronization
* Payment Verification
* Background Operations

Spinners should communicate that the system is actively working.

---

# 4. Anatomy

A Spinner consists of:

```text id="x4n8pk"
Spinner Animation

↓

Optional Label

↓

Optional Description
```

The animation is the primary visual indicator.

---

# 5. Spinner Types

Supported types:

```text id="m7v2qr"
Circular Spinner

Dots

Pulse

Ring

Dual Ring

Inline Spinner
```

The Circular Spinner should be the default loading indicator across the platform.

---

# 6. Variants

Supported variants:

```text id="u8k5yt"
Primary

Secondary

Light

Dark

Success

Warning
```

Variants should match the surrounding interface theme.

---

# 7. Sizes

Supported sizes:

```text id="j3r9wc"
Extra Small

Small

Medium

Large

Extra Large
```

The default size should be **Medium**.

---

# 8. States

The Spinner component supports:

```text id="q5m1xh"
Visible

Hidden

Paused

Disabled
```

Loading indicators should only appear while processing is active.

---

# 9. Labels

Optional labels may describe the current operation.

Examples:

* Loading...
* Saving...
* Uploading...
* Processing...
* Connecting...
* AI is thinking...

Labels improve clarity for longer operations.

---

# 10. Inline Spinner

Inline Spinners appear inside components.

Examples:

* Button Loading
* Table Loading
* Form Submission
* Search Field

They should not significantly change the component layout.

---

# 11. Full Page Spinner

Full Page Spinners may be used for:

* Authentication
* Initial Application Loading
* Critical System Operations

Full-screen loading should only be used when user interaction is temporarily unavailable.

---

# 12. Overlay Spinner

Overlay Spinners may appear:

* Inside Cards
* Inside Modals
* On Dashboard Widgets
* During Background Refresh

Users should still understand the surrounding content.

---

# 13. Animation

Spinner animation should be:

* Smooth
* Continuous
* Lightweight
* Consistent

Animations must respect the user's **Reduced Motion** preference.

---

# 14. Duration

Recommended behavior:

* Display only while processing.
* Avoid flashing for very short operations.
* Replace with Skeleton loaders for longer page loading when appropriate.

Loading indicators should not remain indefinitely.

---

# 15. Error Recovery

If loading fails:

Replace the Spinner with:

* Error Message
* Retry Button
* Alternative Action

Users should never be left with an endless spinner.

---

# 16. Responsive Behavior

Desktop

* Standard spinner size.

Tablet

* Slightly larger spacing.

Mobile

* Larger touch-friendly presentation.
* Center loading indicators appropriately.

Spinners should remain visible without overwhelming the interface.

---

# 17. Accessibility

The Spinner component must support:

* WCAG 2.2 AA
* Screen Readers
* High Contrast Mode
* Accessible Loading Announcements

Loading states should be announced when appropriate.

---

# 18. Design Tokens

Examples

```text id="t6q3my"
spinner-size

spinner-color

spinner-speed

spinner-stroke

spinner-background
```

All visual properties should consume Design Tokens.

---

# 19. CSS Variables

Examples

```css id="c8v4pa"
--spinner-size
--spinner-color
--spinner-speed
--spinner-stroke
--spinner-background
```

Implementation should remain token-driven.

---

# 20. Do

Recommended practices:

* Use Spinners only when progress cannot be measured.
* Display short explanatory labels for longer operations.
* Keep animations lightweight.
* Replace with content immediately after completion.
* Provide recovery options when loading fails.

---

# 21. Don't

Avoid:

* Endless loading indicators.
* Multiple spinners in the same area.
* Excessive animation.
* Blocking the entire interface unnecessarily.
* Using a Spinner when actual progress can be displayed.

Prefer a Progress component whenever measurable progress is available.

---

# 22. Common Use Cases

Examples include:

* User Login
* Course Publishing
* Saving Settings
* AI Content Generation
* Importing Students
* Exporting Reports
* Payment Verification
* Live Data Refresh
* Course Search
* Dashboard Loading

The Spinner component represents unknown-duration processing across the platform.

---

# 23. Component Properties (Props)

Typical configurable properties include:

```text id="p2w7rf"
type

variant

size

label

description

fullscreen

overlay

inline

speed

visible
```

Additional properties may be introduced while preserving backward compatibility.

---

# 24. Future Expansion

Future enhancements may include:

* AI Thinking Animation
* Branded Loading Animations
* Context-Aware Spinners
* Progress Estimation Integration
* Organization Themes
* Adaptive Motion

Future capabilities should extend the existing architecture while preserving simplicity.

---

# 25. Related Components

This component integrates with:

* Progress
* Skeleton
* Button
* Card
* Modal
* Table
* Dashboard
* Notification

Together they provide comprehensive loading and feedback experiences.

---

# 26. Design Principles

The Spinner component should always remain:

* Lightweight
* Accessible
* Predictable
* Responsive
* Non-Intrusive
* Informative

Users should immediately recognize that processing is underway.

---

# 27. Design Decision

Iran LMS follows an **Unknown Duration Loading Architecture**.

```text id="r9m6tk"
User Action

↓

System Processing

↓

Spinner

↓

Completed Result

↓

Content Display
```

A Spinner should be used only when progress cannot be accurately measured.

---

# 28. Strategic Vision

The Spinner component provides a consistent loading experience across the Iran LMS ecosystem. Whether authenticating users, communicating with AI services, synchronizing data, or processing administrative operations, every loading indicator follows a unified, accessible, and token-driven architecture.

The long-term objective is to evolve the Spinner into an adaptive loading system that intelligently combines contextual messaging, predictive loading behaviors, and enterprise branding while preserving clarity, performance, and user confidence.
