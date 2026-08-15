# Loader

**Component:** Feedback
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Loader component communicates that the system is currently processing an operation or waiting for a resource to become available.

Unlike Skeleton, which represents the expected structure of content, Loader communicates the existence of an active loading or processing state.

---

# 2. Component Type

**Category**

Feedback Component

**Role**

Process & Loading Indicator

---

# 3. Usage

The Loader component is used for:

* API Requests
* Page Loading
* Data Fetching
* File Processing
* Search Requests
* AI Processing
* Course Publishing
* Video Processing
* Report Generation
* Export Operations
* Authentication
* Background Tasks

Loader should be used when the system is actively processing an operation.

---

# 4. Loader vs Spinner vs Skeleton

These components serve different purposes.

```text
Loader

System is processing

↓

Show active progress state
```

```text
Spinner

Small localized loading indicator

↓

Show inside a control or compact area
```

```text
Skeleton

Content structure is known

↓

Show expected layout
```

Recommended usage:

```text
Page Data Loading
→ Skeleton

Button Processing
→ Spinner

AI Generation
→ Loader

File Processing
→ Loader
```

---

# 5. Anatomy

A Loader may consist of:

```text id="m8q4pk"
Loading Indicator

↓

Optional Label

↓

Optional Progress

↓

Optional Status Message
```

The simplest Loader contains only the loading indicator.

---

# 6. Loader Types

Supported types:

```text id="u5r8qc"
Circular

Linear

Progressive

Fullscreen

Inline

Process
```

The type should match the scope of the operation.

---

# 7. Circular Loader

Circular Loader is suitable for:

* Page transitions
* Data fetching
* Processing states
* AI operations
* General asynchronous tasks

Example:

```text id="k3n7tx"
      ◌
   Loading...
```

---

# 8. Linear Loader

Linear Loader communicates progress across a horizontal track.

Example:

```text id="r9m2wy"
Processing

██████████████░░░░░░

70%
```

Use Linear Loader when progress can be measured.

---

# 9. Determinate Loader

A determinate Loader communicates measurable progress.

Example:

```text id="y2v8pk"
Uploading video

████████████████░░░░

82%
```

Determinate loading should display progress when reliable progress information is available.

---

# 10. Indeterminate Loader

An indeterminate Loader is used when the duration or progress cannot be calculated.

Example:

```text id="p4k9mc"
Processing...

◌
```

Do not display fake percentages for indeterminate operations.

---

# 11. Fullscreen Loader

Fullscreen Loader covers the current interface when interaction must temporarily stop.

Use for:

* Application Initialization
* Authentication
* Critical Page Transition
* Large System Initialization

Fullscreen loading should be used sparingly.

---

# 12. Inline Loader

Inline Loader appears within an existing interface element.

Examples:

* Button
* Form
* Search Field
* Table Cell
* Card
* Toolbar

Example:

```text id="v7q2ma"
[ Saving... ◌ ]
```

Inline loading should preserve the dimensions of the original component.

---

# 13. Process Loader

Process Loader communicates that a longer operation is being performed.

Examples:

```text id="c5m7tv"
Generating Certificate...

Processing...
```

Optional status messages may explain the current operation.

---

# 14. AI Loader

AI operations may require a specialized Loader.

Examples:

* Generating Course Description
* Generating Quiz Questions
* Analyzing Student Performance
* Creating Learning Recommendations
* Generating Report

Example:

```text id="n7q3tw"
AI is generating your content...

◌
```

AI Loaders should avoid implying that generated content is already complete.

---

# 15. Status Messages

Long-running operations should provide meaningful status messages.

Examples:

```text id="f4n8pv"
Uploading file...

Processing video...

Generating certificate...

Preparing report...
```

Messages should describe the current operation rather than simply saying "Please wait."

---

# 16. Duration

Loading states should reflect the actual operation.

```text id="t6q5mr"
Short Operation

Inline Loader

Medium Operation

Loader + Status

Long Operation

Loader + Progress / Status
```

Operations expected to take significant time should provide meaningful feedback.

---

# 17. Progress

When measurable progress is available, display:

* Percentage
* Progress Bar
* Current Step
* Estimated Status

Example:

```text id="m5v3kt"
Generating Report

Step 3 of 5

████████████░░░░░░

60%
```

Never fabricate progress values.

---

# 18. Cancellation

Long-running operations may support cancellation.

Example:

```text id="q8r4nw"
Processing video...

████████████░░░░

[Cancel]
```

Cancellation should be provided when the underlying operation can safely be stopped.

---

# 19. Error Transition

If processing fails:

```text id="w6k2pv"
Loader

↓

Error

↓

Retry / Recovery
```

The Loader should never remain active after the operation has failed.

---

# 20. Success Transition

When processing completes:

```text id="r4m8qx"
Loader

↓

Success

↓

Content / Result
```

The transition should happen immediately after successful completion.

---

# 21. Responsive Behavior

Desktop

* Standard Loader size.

Tablet

* Maintain proportional spacing.

Mobile

* Larger touch-safe controls when actions are present.
* Avoid unnecessary fullscreen blocking.

Loader should adapt to the size and context of its container.

---

# 22. Accessibility

The Loader component must support:

* WCAG 2.2 AA
* Screen Readers
* Reduced Motion
* High Contrast Mode
* Keyboard Accessibility

Loading states should communicate status without creating unnecessary interruptions.

---

# 23. Screen Reader Behavior

Loading containers may communicate:

```text id="p7n3wc"
Loading...
```

For longer operations, use meaningful status information:

```text id="k5v9mt"
Processing video...
```

The loading message should be removed or updated when the operation completes.

---

# 24. Animation

Recommended animations:

* Rotation
* Pulse
* Progress Movement
* Indeterminate Slide

Animations should remain subtle.

When Reduced Motion is enabled:

```text id="f5r9pk"
Animated Loader

↓

Static Loader
```

---

# 25. Color Usage

Loader colors should follow the semantic design system.

Default:

```text id="n6q4pt"
Primary
```

Semantic states may use:

```text
Success
Warning
Error
Neutral
```

Color should not be the only indicator of state.

---

# 26. Design Tokens

Examples:

```text id="t8m3qw"
loader-size

loader-stroke

loader-color

loader-track

loader-duration

loader-gap

loader-label-color
```

All visual properties should consume Design Tokens.

---

# 27. CSS Variables

Examples:

```css id="v4m8qx"
--loader-size
--loader-stroke
--loader-color
--loader-track
--loader-duration
--loader-gap
--loader-label-color
```

Implementation should remain token-driven.

---

# 28. Do

Recommended practices:

* Clearly communicate active processing.
* Use determinate progress when reliable.
* Use meaningful status messages for long operations.
* Preserve the dimensions of inline components.
* Provide cancellation when appropriate.
* Transition immediately to success or error states.

---

# 29. Don't

Avoid:

* Fake progress percentages.
* Indefinite fullscreen loading.
* Blocking the interface unnecessarily.
* Using Loader when Skeleton is more appropriate.
* Showing a Loader after an operation has completed.
* Using vague messages for long-running operations.

---

# 30. Common Use Cases

Examples include:

* AI Content Generation
* Video Processing
* File Upload
* Certificate Generation
* Report Generation
* Course Publishing
* Search Processing
* Data Synchronization
* Authentication
* Export Operations

Loader provides clear feedback during active system processing.

---

# 31. Component Properties (Props)

Typical configurable properties include:

```text id="q4w8mv"
variant

size

label

progress

determinate

fullscreen

inline

cancellable

status

animation

color
```

Additional properties may be introduced while preserving backward compatibility.

---

# 32. Future Expansion

Future enhancements may include:

* AI Process Estimation
* Smart Progress Prediction
* Multi-Step Process Visualization
* Network-Aware Loading
* Background Task Monitoring
* Cancelable Operations
* Real-Time Processing Status

Future capabilities should extend the existing architecture without compromising clarity or performance.

---

# 33. Related Components

This component integrates with:

* Spinner
* Skeleton
* Progress
* Alert
* Toast
* Snackbar
* EmptyState
* Dialog

Together they provide a complete loading, processing, and feedback system.

---

# 34. Design Principles

The Loader component should always remain:

* Clear
* Lightweight
* Honest
* Responsive
* Accessible
* Non-Deceptive
* Context-Aware

Loading indicators should accurately represent system activity.

---

# 35. Design Decision

Iran LMS follows a **Transparent Processing Architecture**.

```text id="h6n4rv"
User Action

↓

Active Processing

↓

Loader

↓

┌───────────────┬───────────────┐
│               │               │
Success         Error           Cancel
│               │               │
↓               ↓               ↓
Result        Recovery        Previous State
```

The Loader communicates that the system is actively working and prevents users from assuming that an action has failed.

---

# 36. Strategic Vision

The Loader component provides a unified processing-feedback layer across the Iran LMS ecosystem. Whether the system is generating AI content, processing video, publishing courses, creating certificates, generating reports, uploading files, or synchronizing data, every Loader follows a consistent, accessible, responsive, and token-driven architecture.

The long-term objective is to evolve Loader into an intelligent process-feedback system capable of displaying real-time processing stages, estimated completion, background tasks, cancellation controls, and AI-assisted progress explanations while maintaining honesty, performance, and user confidence.
