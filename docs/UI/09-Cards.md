# Cards

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Card System used throughout the Iran LMS platform.

Cards are the primary building blocks used to present structured information.

Every module should use the shared Card System instead of creating custom card layouts.

---

# 2. Goals

The Card System should be:

* Modular
* Reusable
* Responsive
* Accessible
* Consistent
* Scalable

Cards should adapt to different content while preserving a unified visual language.

---

# 3. Design Philosophy

Cards group related information into meaningful visual units.

A card should communicate:

* What this item is
* Why it matters
* What the user can do next

Cards should never feel overloaded.

---

# 4. Card Architecture

Each card is composed of reusable sections.

```text id="y2jhdx"
Card

↓

Header

↓

Media (Optional)

↓

Body

↓

Metadata

↓

Actions

↓

Footer (Optional)
```

Not every card requires every section.

---

# 5. Card Types

Iran LMS supports multiple card categories.

```text id="jw57my"
Course Card

Lesson Card

Instructor Card

Certificate Card

Quiz Card

Assignment Card

Product Card

Order Card

Notification Card

Dashboard Card

Statistics Card
```

Each type extends the same foundation.

---

# 6. Card Variants

Supported variants

```text id="jlwmkn"
Standard

Compact

Horizontal

Vertical

Featured

Minimal

Interactive
```

Variants should differ only in presentation—not behavior.

---

# 7. Card Header

The header may contain:

* Title
* Subtitle
* Badge
* Avatar
* Status
* Context Menu

The header identifies the content.

---

# 8. Card Media

Media is optional.

Examples

* Course Thumbnail
* Instructor Photo
* Lesson Cover
* Certificate Preview
* Product Image

Media should support responsive layouts.

---

# 9. Card Body

The body contains primary information.

Examples

* Description
* Progress
* Statistics
* Metadata
* Learning Status

Body content should remain concise.

---

# 10. Metadata

Metadata provides supporting information.

Examples

* Duration
* Lessons
* Students
* Price
* Rating
* Category
* Updated Date
* Instructor

Metadata should never dominate the primary content.

---

# 11. Card Actions

Supported actions include:

* View
* Continue
* Edit
* Delete
* Share
* Bookmark
* Purchase
* Download

Actions should remain visually consistent.

---

# 12. Card Footer

The footer is optional.

Examples

* Progress Bar
* Last Updated
* Tags
* Completion Status
* CTA Button

Only relevant information should appear.

---

# 13. Interactive Cards

Interactive cards may support:

* Hover
* Focus
* Active
* Selected

Interaction should clearly indicate clickability.

---

# 14. Dashboard Cards

Dashboard cards present summarized information.

Examples

* Statistics
* Revenue
* Course Count
* Active Students
* Notifications

They should prioritize quick scanning.

---

# 15. Learning Cards

Learning cards support:

* Continue Learning
* Lesson Progress
* Completion Status
* Resume Position

Learning progress should always be visible.

---

# 16. Commerce Cards

Commerce cards may display:

* Product
* Subscription
* Order
* Invoice

Price should never overpower the primary information.

---

# 17. Responsive Behavior

Cards adapt to:

* Desktop
* Tablet
* Mobile

Layouts may switch between:

* Horizontal
* Vertical
* Compact

Content hierarchy should remain unchanged.

---

# 18. Accessibility

Cards should support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* Clear Click Targets

Interactive cards should expose their purpose to assistive technologies.

---

# 19. Empty Cards

Placeholder cards may be used during:

* Loading
* Empty States
* Skeleton Screens

Placeholders should preserve layout stability.

---

# 20. Design Tokens

Examples

```text id="oblbsy"
card-radius

card-padding

card-gap

card-shadow

card-border

card-header-gap

card-footer-gap
```

Cards should consume shared design tokens.

---

# 21. CSS Variables

Examples

```css id="3wqkki"
--card-radius
--card-padding
--card-gap
--card-shadow
--card-border
--card-background
```

Components should avoid fixed visual values.

---

# 22. Card Composition

Complex cards should reuse existing components.

Example

```text id="dr5s7l"
Card

↓

Avatar

↓

Badge

↓

Progress Bar

↓

Button
```

Cards should compose components rather than duplicate functionality.

---

# 23. Future Expansion

The Card System supports:

* AI Recommendations
* Live Classes
* Organizations
* White Label Themes
* Mobile Applications
* Future Learning Modules

New card types should inherit the existing architecture.

---

# 24. Design Principles

Cards should always remain:

* Simple
* Informative
* Modular
* Consistent
* Accessible
* Action-Oriented

Whitespace is preferred over crowded layouts.

---

# 25. Design Decision

Iran LMS follows a **Composable Card Architecture**.

```text id="i9kj5w"
Card Container

↓

Reusable Sections

↓

Reusable Components

↓

Business Data
```

The Card component provides structure, while business modules supply content.

---

# 26. Strategic Vision

The Card System is one of the core visual foundations of the Iran LMS ecosystem.

By standardizing card structure, variants, interaction patterns, and reusable sections, every module—from courses and lessons to commerce, reports, and future AI-powered experiences—shares a consistent presentation model.

A unified Card System reduces development effort, simplifies maintenance, and creates a familiar experience that allows users to recognize information and take action quickly, regardless of which part of the platform they are using.
