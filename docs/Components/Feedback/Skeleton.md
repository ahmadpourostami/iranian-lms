# Skeleton

**Component:** Feedback
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Skeleton component represents the structure of content while data is being loaded.

Instead of showing a blank area or a generic loading indicator, Skeleton preserves the expected layout and gives users a visual preview of the content that will appear.

---

# 2. Component Type

**Category**

Feedback Component

**Role**

Content Loading Placeholder

---

# 3. Usage

The Skeleton component is used for:

* Course Cards
* Course Details
* Lesson Lists
* Student Lists
* Instructor Lists
* Dashboard Widgets
* Tables
* Charts
* User Profiles
* Notifications
* Activity Timelines
* Search Results
* Reports
* Media Lists

Skeleton should be used when the final content structure is known.

---

# 4. Anatomy

A Skeleton may consist of:

```text id="m8q4pk"
Container

↓

Text Placeholder

↓

Image Placeholder

↓

Avatar Placeholder

↓

Button Placeholder

↓

Content Blocks
```

Only the elements that correspond to the expected content should be represented.

---

# 5. Skeleton Types

Supported types:

```text id="u5r8qc"
Text

Image

Avatar

Button

Input

Card

Table

List

Chart

Profile

Dashboard
```

Complex Skeletons may combine multiple primitive types.

---

# 6. Text Skeleton

Text placeholders represent content that has not yet loaded.

Example:

```text id="k3n7tx"
██████████████████

████████████

████████████████
```

Different widths should be used to create a natural text structure.

---

# 7. Image Skeleton

Used for:

* Course thumbnails
* Instructor images
* Profile images
* Media previews
* Article images

The Skeleton should preserve the final image dimensions and aspect ratio.

---

# 8. Avatar Skeleton

Avatar placeholders should preserve:

* Size
* Shape
* Position

Common sizes:

```text id="r9m2wy"
Small

32px

Medium

40px

Large

48px

Extra Large

64px
```

---

# 9. Card Skeleton

Card Skeletons should reproduce the approximate structure of the final Card.

Example:

```text id="y2v8pk"
┌─────────────────────┐
│                     │
│      IMAGE          │
│                     │
├─────────────────────┤
│ ███████████████     │
│ ██████████          │
│ ████████████████    │
│                     │
│ ███████             │
└─────────────────────┘
```

Card Skeletons should prevent layout shifts.

---

# 10. Table Skeleton

Table Skeletons should preserve:

* Number of columns
* Row height
* Approximate cell widths
* Header structure

Example:

```text id="p4k9mc"
████████  ████████  ███████  ███████

████████  ████████  ███████  ███████
████████  ████████  ███████  ███████
████████  ████████  ███████  ███████
```

The number of placeholder rows should match the expected viewport content.

---

# 11. List Skeleton

List Skeletons are used for:

* Students
* Courses
* Notifications
* Activities
* Messages
* Lessons

Each item should approximate the final List Item structure.

---

# 12. Chart Skeleton

Chart Skeletons may represent:

* Chart container
* Axes
* Legend
* Placeholder bars
* Placeholder lines

Charts should not display misleading fake data.

The Skeleton should communicate that the visualization is loading without implying actual values.

---

# 13. Dashboard Skeleton

Dashboard Skeletons should preserve the layout of:

* Statistics Cards
* Charts
* Tables
* Activity Panels
* Notifications
* Quick Actions

The dashboard structure should remain stable while data loads.

---

# 14. Animation

The recommended animation is:

```text id="v7q2ma"
Shimmer
```

The animation should move smoothly across the placeholder surface.

Alternative:

```text id="c5m7tv"
Pulse
```

Pulse may be used when Shimmer is not appropriate.

---

# 15. Reduced Motion

When the user prefers reduced motion:

```text id="n7q3tw"
Disable Shimmer

↓

Use Static Skeleton
```

The Skeleton must remain understandable without animation.

---

# 16. Loading Duration

Skeleton should be used when loading is expected to take long enough for users to notice.

For extremely short operations, showing a Skeleton may create unnecessary visual movement.

Use a simpler loading indicator when appropriate.

---

# 17. Content Accuracy

Skeleton dimensions should approximate the final content.

For example:

```text id="f4n8pv"
Course Image

→ Same aspect ratio

Course Title

→ Similar number of lines

Course Metadata

→ Similar layout
```

This helps prevent layout shifts when real content arrives.

---

# 18. Layout Stability

Skeleton should reserve the final content space before data arrives.

This reduces:

* Layout Shift
* Content Jumping
* Visual Instability
* Accidental Interaction

Skeleton is therefore an important part of perceived performance.

---

# 19. Responsive Behavior

Desktop

* Match desktop content structure.

Tablet

* Adapt to tablet layout.

Mobile

* Match mobile card and list dimensions.

Skeleton must follow the same responsive rules as the final component.

---

# 20. Accessibility

Skeleton loading states must support:

* WCAG 2.2 AA
* Screen Readers
* Reduced Motion
* High Contrast Mode

Loading content should not create confusing announcements for assistive technologies.

When appropriate, the loading container may communicate its state using an accessible loading status.

---

# 21. Screen Reader Behavior

Decorative Skeleton shapes should generally not be announced individually.

Instead, the containing region should communicate:

```text id="t6q5mr"
Loading content...
```

Once the content becomes available, the loading state should be removed from the accessibility tree.

---

# 22. Interaction

Skeletons should generally be non-interactive.

Avoid making placeholder elements appear clickable unless the actual component will immediately support interaction.

---

# 23. Error Transition

If loading fails:

```text id="m5v3kt"
Skeleton

↓

Error State

↓

Retry / Recovery
```

Skeleton should never remain indefinitely when the request has failed.

---

# 24. Empty State Transition

If loading succeeds but no data exists:

```text id="q8r4nw"
Skeleton

↓

Empty State
```

Skeleton and Empty State represent different system states.

---

# 25. Loading State Lifecycle

Recommended lifecycle:

```text id="w6k2pv"
Initial Request

↓

Skeleton

↓

Data Loaded

↓

Real Content
```

Failure path:

```text id="r4m8qx"
Initial Request

↓

Skeleton

↓

Request Failed

↓

Error State
```

Empty path:

```text id="p7n3wc"
Initial Request

↓

Skeleton

↓

No Data

↓

Empty State
```

---

# 26. Design Tokens

Examples:

```text id="k5v9mt"
skeleton-background

skeleton-highlight

skeleton-radius

skeleton-animation-duration

skeleton-opacity

skeleton-gap
```

All visual properties should consume Design Tokens.

---

# 27. CSS Variables

Examples:

```css id="f5r9pk"
--skeleton-bg
--skeleton-highlight
--skeleton-radius
--skeleton-animation-duration
--skeleton-opacity
--skeleton-gap
```

Implementation should remain token-driven.

---

# 28. Do

Recommended practices:

* Match the final content structure.
* Preserve layout dimensions.
* Use Skeleton for meaningful loading periods.
* Keep animations subtle.
* Respect Reduced Motion.
* Transition cleanly to content, empty, or error states.

---

# 29. Don't

Avoid:

* Using Skeleton for every tiny operation.
* Showing fake information.
* Using unrealistic placeholder dimensions.
* Leaving Skeletons visible indefinitely.
* Making placeholders unnecessarily detailed.
* Using animated Skeletons when reduced motion is enabled.

---

# 30. Common Use Cases

Examples include:

* Course List Loading
* Course Detail Loading
* Student Table Loading
* Instructor Profile Loading
* Dashboard Loading
* Search Results Loading
* Notification List Loading
* Reports Loading
* Media Library Loading
* Lesson Curriculum Loading

Skeleton should appear wherever the structure of the upcoming content is predictable.

---

# 31. Component Properties (Props)

Typical configurable properties include:

```text id="q4w8mv"
variant

width

height

radius

lines

count

animation

duration

loading

responsive
```

Additional properties may be introduced while preserving backward compatibility.

---

# 32. Future Expansion

Future enhancements may include:

* AI-Generated Loading Structures
* Adaptive Skeleton Layouts
* Network-Aware Loading Strategies
* Predictive Content Loading
* Progressive Content Rendering
* Personalized Loading Experiences

Future capabilities should extend the existing architecture without compromising performance.

---

# 33. Related Components

This component integrates with:

* Spinner
* Progress
* EmptyState
* Alert
* Toast
* Snackbar
* Card
* Table
* List
* Chart

Together they provide a complete loading and feedback system.

---

# 34. Design Principles

The Skeleton component should always remain:

* Predictable
* Lightweight
* Responsive
* Accessible
* Stable
* Non-Interactive
* Structure-Oriented

The Skeleton should represent the expected content rather than simulate fake data.

---

# 35. Design Decision

Iran LMS follows a **Structure-Preserving Loading Architecture**.

```text id="h6n4rv"
Request

↓

Skeleton

↓

┌───────────────┬───────────────┐
│               │               │
Data            Empty           Error
│               │               │
↓               ↓               ↓
Content       EmptyState      ErrorState
```

The loading state preserves the final layout and provides a smooth transition to the actual application state.

---

# 36. Strategic Vision

The Skeleton component provides a consistent content-loading experience across the Iran LMS ecosystem. Whether loading courses, students, instructors, dashboards, reports, lessons, notifications, or media, every Skeleton follows a predictable, accessible, responsive, and token-driven architecture.

The long-term objective is to evolve Skeleton into an adaptive loading system capable of supporting progressive rendering, network-aware behavior, predictive data loading, and AI-assisted content preparation while maintaining visual stability, performance, and user confidence.
