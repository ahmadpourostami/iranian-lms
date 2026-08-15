# Card

**Component:** Data Display
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Card component is a flexible container used to group related information, actions, and media into a single, visually distinct unit.

Cards are one of the most frequently used components throughout the Iran LMS ecosystem, presenting content in a structured, reusable, and responsive format.

---

# 2. Component Type

**Category**

Data Display Component

**Role**

Content Container

---

# 3. Usage

The Card component is used for:

* Course Cards
* Lesson Cards
* Student Cards
* Instructor Cards
* Certificate Cards
* Product Cards
* Statistics Widgets
* Reports
* AI Results
* Dashboard Widgets

Cards should group related information while maintaining visual hierarchy.

---

# 4. Anatomy

A Card consists of:

```text id="m7q4pk"
Header (Optional)

↓

Media (Optional)

↓

Body

↓

Metadata (Optional)

↓

Actions (Optional)

↓

Footer (Optional)
```

Every card must contain a content body.

---

# 5. Card Types

Supported types:

```text id="u3v8qc"
Basic Card

Course Card

Profile Card

Statistic Card

Media Card

Product Card

Report Card

Dashboard Widget

AI Result Card
```

Each type extends the same foundational structure.

---

# 6. Variants

Supported variants:

```text id="k5n2wy"
Elevated

Outlined

Filled

Ghost
```

Outlined is the recommended default across Iran LMS.

---

# 7. Sizes

Supported sizes:

```text id="r9m6tx"
Small

Medium

Large
```

Cards should adapt naturally to responsive layouts.

---

# 8. States

The Card component supports:

```text id="c8q4pv"
Default

Hover

Focused

Selected

Disabled

Loading
```

Interactive cards should provide visual feedback on hover and focus.

---

# 9. Header

Optional header content may include:

* Title
* Subtitle
* Status Badge
* Category
* Menu Button

Headers should remain clean and concise.

---

# 10. Media

Cards may include:

* Image
* Video Thumbnail
* Avatar
* Illustration
* Icon

Media should maintain a consistent aspect ratio.

---

# 11. Body

The body contains the primary information.

Examples:

* Course Description
* Student Information
* Statistics
* Product Details
* AI Summary

Body content should be easy to scan.

---

# 12. Metadata

Examples:

* Instructor
* Duration
* Students
* Price
* Rating
* Publish Date
* Completion Percentage

Metadata should be secondary to the primary content.

---

# 13. Footer

The footer may contain:

* Action Buttons
* Links
* Progress
* Status
* Additional Information

Footer actions should remain clearly separated from content.

---

# 14. Actions

Cards may provide actions such as:

* View
* Edit
* Continue
* Download
* Share
* Delete
* Duplicate

Primary actions should be visually emphasized.

---

# 15. Interactive Cards

Interactive cards should:

* Support hover states.
* Support keyboard focus.
* Provide click feedback.
* Preserve accessibility.

The entire card may be clickable when appropriate.

---

# 16. Loading State

Loading cards should use:

* Skeleton placeholders
* Loading indicators
* Reserved layout space

Content shifts should be minimized.

---

# 17. Empty State

Cards without content should display:

* Illustration
* Short Message
* Optional Action Button

Empty cards should guide users toward the next action.

---

# 18. Responsive Behavior

Desktop

* Multi-column layouts.

Tablet

* Reduced spacing.

Mobile

* Single-column layout.
* Full-width cards.

Cards should remain readable across all devices.

---

# 19. Accessibility

The Card component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Interactive cards should expose appropriate semantic roles.

---

# 20. Animation

Recommended animations:

* Hover Elevation
* Fade
* Scale (Subtle)
* Shadow Transition

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 21. Design Tokens

Examples

```text id="t4w8rm"
card-radius

card-background

card-border

card-shadow

card-padding

card-gap
```

All visual properties should consume Design Tokens.

---

# 22. CSS Variables

Examples

```css id="y6m2qa"
--card-radius
--card-bg
--card-border
--card-shadow
--card-padding
--card-gap
```

Implementation should remain token-driven.

---

# 23. Do

Recommended practices:

* Group related information.
* Maintain consistent spacing.
* Keep content concise.
* Highlight primary actions.
* Use consistent visual hierarchy.

---

# 24. Don't

Avoid:

* Overcrowded cards.
* Excessive actions.
* Multiple competing visual elements.
* Inconsistent spacing.
* Mixing unrelated content.

Cards should simplify information presentation.

---

# 25. Common Use Cases

Examples include:

* Course Card
* Lesson Card
* Instructor Card
* Student Card
* Certificate Card
* Dashboard Widget
* Revenue Summary
* Product Card
* AI Recommendation
* Notification Summary

Cards are the foundation of information presentation throughout Iran LMS.

---

# 26. Component Properties (Props)

Typical configurable properties include:

```text id="f3q7kn"
variant

size

header

media

body

footer

actions

clickable

loading

selected

disabled
```

Additional properties may be introduced while preserving backward compatibility.

---

# 27. Future Expansion

Future enhancements may include:

* Expandable Cards
* AI Insight Cards
* Live Data Cards
* Collaborative Cards
* Organization Branding
* Smart Card Layouts

Future capabilities should extend the existing architecture.

---

# 28. Related Components

This component integrates with:

* Avatar
* Badge
* Button
* Progress
* Skeleton
* Menu
* Tooltip
* Divider

Together they create rich, modular information displays.

---

# 29. Design Principles

The Card component should always remain:

* Modular
* Accessible
* Responsive
* Reusable
* Consistent
* Content-Focused

Cards should organize information without distracting from the content.

---

# 30. Design Decision

Iran LMS follows a **Modular Card Architecture**.

```text id="p8v5tc"
Data

↓

Card

↓

Content Sections

↓

Actions

↓

User Interaction
```

Cards provide a scalable and reusable foundation for presenting information across every part of the platform.

---

# 31. Strategic Vision

The Card component is the core building block for presenting information across the Iran LMS ecosystem. Whether displaying courses, users, certificates, products, reports, analytics, AI-generated content, or dashboard widgets, every card follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Card component into a highly adaptive presentation system capable of supporting AI-driven layouts, enterprise customization, collaborative workflows, and responsive experiences while maintaining clarity, flexibility, and visual consistency.
