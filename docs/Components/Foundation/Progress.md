# Progress

**Component:** Foundation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Progress component visually communicates the completion status of an ongoing process, task, upload, lesson, course, or operation.

It provides immediate feedback about progress, reducing uncertainty while improving user confidence during long-running actions.

---

# 2. Component Type

**Category**

Foundation Component

**Role**

Progress Indicator

---

# 3. Usage

The Progress component is used for:

* Course Completion
* Lesson Progress
* Quiz Progress
* Assignment Submission
* File Upload
* Download Progress
* Video Watching
* Learning Paths
* System Processes
* AI Operations

Progress indicators should always reflect actual progress whenever possible.

---

# 4. Anatomy

A Progress component consists of:

```text id="t6v3xp"
Track

↓

Progress Fill

↓

Optional Percentage

↓

Optional Label

↓

Optional Status
```

The filled portion visually represents completed progress.

---

# 5. Progress Types

Supported types:

```text id="p9k2rw"
Linear

Circular

Step Progress

Segmented Progress

Indeterminate
```

Each type should be selected based on the user task.

---

# 6. Variants

Supported variants:

```text id="v3m8qa"
Primary

Success

Warning

Danger

Info
```

Variants communicate the semantic meaning of the current progress.

---

# 7. Sizes

Supported sizes:

```text id="m5u7yc"
Small

Medium

Large
```

Progress indicators should scale consistently across the platform.

---

# 8. States

The Progress component supports:

```text id="r8n4kh"
Idle

In Progress

Paused

Completed

Failed

Canceled

Indeterminate
```

Each state should provide clear visual feedback.

---

# 9. Linear Progress

Linear progress is recommended for:

* Uploads
* Downloads
* Form Completion
* Course Progress
* Loading Content

Horizontal progress bars are the default style.

---

# 10. Circular Progress

Circular progress is recommended for:

* Dashboard Statistics
* Learning Completion
* Widget Summaries
* Small Status Indicators

Circular indicators should remain compact and easy to interpret.

---

# 11. Step Progress

Step Progress represents multi-stage workflows.

Examples:

```text id="f2q9zb"
Enrollment

↓

Payment

↓

Confirmation

↓

Learning
```

Each step should clearly indicate its current state.

---

# 12. Segmented Progress

Segmented Progress is useful for:

* Learning Modules
* Lesson Sequences
* Course Sections
* Multi-Part Tasks

Each segment represents an individual milestone.

---

# 13. Percentage Display

When appropriate, display:

```text id="a4y6nt"
75%
```

Percentage values should be rounded appropriately and remain synchronized with the visual indicator.

---

# 14. Labels

Optional labels may describe:

* Current Task
* Progress Description
* Remaining Work
* Completed Work

Examples:

* Uploading...
* Lesson 4 of 12
* Course Progress
* AI Processing

---

# 15. Indeterminate Progress

Indeterminate progress should be used when:

* Completion time is unknown.
* Backend processing is occurring.
* Data is loading.

It should not display a percentage.

---

# 16. Completion State

When completed:

* Progress reaches 100%.
* Completion status becomes visible.
* Optional success animation may appear.

The final state should remain visible long enough to be recognized.

---

# 17. Failure State

Failure may display:

* Error Color
* Error Icon
* Retry Action

Users should understand what happened and how to recover.

---

# 18. Animation

Progress animations should be:

* Smooth
* Consistent
* Lightweight

Animations must respect the user's **Reduced Motion** preference.

---

# 19. Responsive Behavior

Desktop

* Full-width bars where appropriate.

Tablet

* Comfortable spacing.

Mobile

* Larger touch-friendly indicators.
* Maintain readability.

Progress indicators should remain clear on every device.

---

# 20. Accessibility

The Progress component must support:

* WCAG 2.2 AA
* Screen Readers
* High Contrast Mode
* Semantic Progress Values

Assistive technologies should be able to announce the current progress when applicable.

---

# 21. Design Tokens

Examples

```text id="k7m5pv"
progress-track

progress-fill

progress-radius

progress-height

progress-color

progress-animation
```

All visual properties should consume Design Tokens.

---

# 22. CSS Variables

Examples

```css id="q2x8rm"
--progress-track
--progress-fill
--progress-radius
--progress-height
--progress-color
--progress-animation
```

Implementation should remain token-driven.

---

# 23. Do

Recommended practices:

* Show real progress whenever possible.
* Display percentages when meaningful.
* Use indeterminate progress only when necessary.
* Clearly indicate completion.
* Keep animations subtle.

---

# 24. Don't

Avoid:

* Fake progress values.
* Infinite loading without explanation.
* Excessive animation.
* Tiny unreadable indicators.
* Hiding failure states.

Progress should always communicate meaningful information.

---

# 25. Common Use Cases

Examples include:

* Course Completion
* Lesson Progress
* Quiz Completion
* Assignment Upload
* Video Watching
* File Download
* AI Generation
* Import Data
* Export Reports
* System Backup

The Progress component should communicate advancement across every workflow.

---

# 26. Component Properties (Props)

Typical configurable properties include:

```text id="u4n9qc"
type

variant

size

value

max

label

percentage

animated

indeterminate

status

showLabel

showValue
```

Additional properties may be introduced while preserving backward compatibility.

---

# 27. Future Expansion

Future enhancements may include:

* Gradient Progress
* Milestone Indicators
* Predictive Completion Time
* AI Learning Progress
* Gamified Progress
* Real-Time Collaborative Progress

Future capabilities should extend the same interaction model.

---

# 28. Related Components

This component integrates with:

* Spinner
* Skeleton
* Loader
* Card
* Dashboard
* Course Card
* Lesson Player
* Upload

Together they provide comprehensive feedback during ongoing processes.

---

# 29. Design Principles

The Progress component should always remain:

* Honest
* Accessible
* Predictable
* Informative
* Responsive
* Lightweight

Users should always understand how much work has been completed and what remains.

---

# 30. Design Decision

Iran LMS follows a **Transparent Progress Architecture**.

```text id="n8v3yw"
Task

↓

Progress Indicator

↓

Current State

↓

Completion Feedback

↓

Finished Process
```

Progress should accurately represent system activity and reduce user uncertainty throughout every workflow.

---

# 31. Strategic Vision

The Progress component provides a unified feedback mechanism across the Iran LMS ecosystem. Whether tracking course completion, lesson viewing, uploads, AI processing, assessments, or administrative operations, every progress indicator follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Progress component into an intelligent progress system capable of supporting predictive completion estimates, learning analytics, collaborative workflows, and AI-assisted guidance while maintaining clarity, reliability, and user trust.
