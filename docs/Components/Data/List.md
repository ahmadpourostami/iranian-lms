# List

**Component:** Data Display
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The List component displays collections of related items in a structured and easy-to-scan format.

Lists provide a lightweight alternative to tables and cards when users primarily need to browse, select, or interact with sequential information.

---

# 2. Component Type

**Category**

Data Display Component

**Role**

Sequential Information Display

---

# 3. Usage

The List component is used for:

* Course Lists
* Lesson Lists
* Student Lists
* Instructor Lists
* Notifications
* Messages
* Tasks
* Media Files
* Search Results
* Activity Items
* Settings
* AI Suggestions

Lists should present related items in a clear and organized manner.

---

# 4. Anatomy

A List consists of:

```text id="k7m3pt"
List Container

↓

List Item

↓

Leading Content

↓

Primary Content

↓

Secondary Content

↓

Trailing Actions
```

Each list item represents one entity or action.

---

# 5. List Types

Supported list types:

```text id="u5v8qy"
Basic List

Interactive List

Selection List

Navigation List

Grouped List

Media List

Description List

Checklist
```

Interactive Lists are recommended for most application views.

---

# 6. List Item

Each List Item may contain:

* Icon
* Avatar
* Image
* Title
* Subtitle
* Badge
* Metadata
* Action Button
* Menu
* Checkbox
* Switch

Items should remain visually consistent.

---

# 7. Variants

Supported variants:

```text id="m2q9wc"
Standard

Compact

Dense
```

Standard is recommended for desktop interfaces.

---

# 8. States

Supported states:

```text id="r8n4px"
Default

Hover

Focused

Selected

Disabled

Loading
```

Interactive lists should provide clear feedback.

---

# 9. Leading Content

Leading content may include:

* Avatar
* Icon
* Thumbnail
* Checkbox
* Status Indicator

Leading elements should align consistently.

---

# 10. Primary Content

Primary content typically includes:

* Title
* Main Information

Example:

```text id="y3m6tr"
Advanced PHP Programming
```

The title should remain concise and descriptive.

---

# 11. Secondary Content

Secondary information may include:

* Description
* Instructor
* Date
* Duration
* Organization
* Category

Secondary content should remain visually subordinate.

---

# 12. Trailing Content

Trailing elements may include:

* Badge
* Menu
* Switch
* Button
* Progress
* Timestamp
* Chevron

Trailing content should not compete with the primary information.

---

# 13. Dividers

Lists may include separators between items.

Divider styles:

```text id="p5k8nv"
Full Width

Inset

Section Divider
```

Dividers improve readability without adding unnecessary visual weight.

---

# 14. Grouped Lists

Lists may be grouped by:

* Date
* Course
* Organization
* Category
* Status

Group headers should remain visible during scrolling when appropriate.

---

# 15. Selection

Selection modes:

```text id="v7q2ma"
Single

Multiple

Checkbox

Radio
```

Selection behavior should remain consistent throughout the platform.

---

# 16. Expandable Items

List items may expand to reveal:

* Description
* Metadata
* Attachments
* Child Items

Expanded content should remain visually separated.

---

# 17. Navigation Lists

Navigation Lists may display:

* Icon
* Label
* Badge
* Chevron

Selecting an item navigates the user to another destination.

---

# 18. Loading State

Loading lists should display:

* Skeleton Items
* Placeholder Avatars
* Placeholder Text

Layout shifts should be minimized.

---

# 19. Empty State

When no items exist:

Display:

* Illustration
* Friendly Message
* Optional Action

Example:

```text id="c4w9pk"
No lessons found.
```

---

# 20. Error State

When loading fails:

Display:

* Error Message
* Retry Button

Users should understand the issue and recover easily.

---

# 21. Responsive Behavior

Desktop

* Comfortable spacing.

Tablet

* Reduced padding.

Mobile

* Full-width items.
* Larger touch targets.
* Simplified metadata.

Lists should remain easy to scan and interact with on all devices.

---

# 22. Accessibility

The List component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Interactive items should expose appropriate semantic roles.

---

# 23. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate items
* Arrow Keys → Move between items (optional)
* Enter → Activate
* Space → Select

Keyboard interaction should remain predictable.

---

# 24. Animation

Recommended animations:

* Fade
* Expand
* Collapse
* Hover Highlight

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 25. Design Tokens

Examples

```text id="t9m4qx"
list-item-height

list-padding

list-gap

list-divider

list-hover

list-selected
```

All visual properties should consume Design Tokens.

---

# 26. CSS Variables

Examples

```css id="n6r8pv"
--list-item-height
--list-padding
--list-gap
--list-divider
--list-hover
--list-selected
```

Implementation should remain token-driven.

---

# 27. Do

Recommended practices:

* Keep items concise.
* Align leading and trailing content consistently.
* Use dividers where appropriate.
* Highlight interactive items.
* Preserve spacing and readability.

---

# 28. Don't

Avoid:

* Overcrowded list items.
* Excessive metadata.
* Misaligned icons.
* Too many inline actions.
* Inconsistent spacing.

Lists should remain simple and efficient.

---

# 29. Common Use Cases

Examples include:

* Course List
* Lesson List
* Student List
* Instructor List
* Notifications
* Messages
* Assignments
* Search Results
* Activity Feed
* Settings Menu

Lists provide a flexible way to present sequential information.

---

# 30. Component Properties (Props)

Typical configurable properties include:

```text id="f8q3tw"
items

variant

selectable

grouped

expandable

leading

trailing

loading

empty

responsive

animation
```

Additional properties may be introduced while preserving backward compatibility.

---

# 31. Future Expansion

Future enhancements may include:

* Virtualized Lists
* Infinite Scrolling
* AI Recommended Items
* Smart Grouping
* Drag-and-Drop Reordering
* Collaborative Lists
* Live Updating

Future capabilities should extend the existing architecture.

---

# 32. Related Components

This component integrates with:

* Card
* Avatar
* Badge
* Checkbox
* Switch
* Menu
* Divider
* Skeleton
* Empty State

Together they create flexible and scalable information displays.

---

# 33. Design Principles

The List component should always remain:

* Clean
* Accessible
* Responsive
* Readable
* Efficient
* Consistent

Users should quickly scan and interact with list items with minimal cognitive effort.

---

# 34. Design Decision

Iran LMS follows a **Sequential Information Architecture**.

```text id="q2v7kc"
Collection

↓

List

↓

Items

↓

Selection / Navigation

↓

Action
```

The List component provides a lightweight, scalable alternative to tables and cards while maintaining consistency across the platform.

---

# 35. Strategic Vision

The List component provides a unified way to present sequential information across the Iran LMS ecosystem. Whether displaying courses, lessons, students, instructors, notifications, search results, AI recommendations, or activity feeds, every list follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the List component into an intelligent information display system capable of supporting AI-powered prioritization, adaptive layouts, collaborative interactions, and enterprise-scale datasets while preserving simplicity, clarity, and performance.
