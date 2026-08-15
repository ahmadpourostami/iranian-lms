# Spacing

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the spacing system used throughout the Iran LMS platform.

A consistent spacing system improves readability, visual rhythm, maintainability, and scalability across all interfaces.

Spacing should create order, not decoration.

---

# 2. Goals

The spacing system should be:

* Consistent
* Predictable
* Responsive
* Scalable
* Easy to Implement

All spacing decisions should originate from reusable spacing tokens.

---

# 3. Design Philosophy

Spacing is one of the strongest tools for creating hierarchy.

Good spacing makes interfaces easier to understand without adding visual complexity.

The platform should feel open, calm, and organized.

---

# 4. Spacing Architecture

The spacing system consists of three layers.

```text
Base Unit
      ↓
Spacing Tokens
      ↓
Component & Layout Spacing
```

Each layer builds upon the previous one.

---

# 5. Base Unit

Iran LMS follows an **8-point spacing system**.

All spacing values should be multiples of the base unit whenever possible.

Benefits include:

* Visual consistency
* Easier layout construction
* Predictable scaling
* Better responsive behavior

Small exceptions may exist for borders or icon alignment.

---

# 6. Spacing Scale

The spacing scale defines reusable spacing tokens.

Examples

```text
XS

SM

MD

LG

XL

2XL

3XL
```

Developers should use tokens rather than arbitrary spacing values.

---

# 7. Spacing Tokens

Examples

```text
space-xs

space-sm

space-md

space-lg

space-xl

space-2xl

space-3xl
```

Token names remain stable even if actual values change.

---

# 8. Layout Spacing

Layout spacing controls the distance between major sections.

Examples include:

* Page Margins
* Content Width
* Sidebar Gap
* Section Separation
* Header Offset
* Footer Offset

Layout spacing creates overall page rhythm.

---

# 9. Component Spacing

Each component defines its own internal spacing.

Examples

* Button Padding
* Card Padding
* Input Padding
* Modal Padding
* Table Cell Padding
* Navigation Item Padding

Components should never hardcode spacing values.

---

# 10. Content Spacing

Educational content should provide generous spacing between:

* Headings
* Paragraphs
* Lists
* Images
* Videos
* Code Blocks
* Tables

Comfortable reading is a primary goal.

---

# 11. Form Spacing

Forms should maintain consistent spacing between:

* Labels
* Inputs
* Help Text
* Validation Messages
* Groups
* Action Buttons

Forms should feel structured and easy to scan.

---

# 12. Card Spacing

Cards should define spacing for:

* Header
* Body
* Footer
* Actions

Card content should never appear crowded.

---

# 13. Navigation Spacing

Navigation spacing should provide:

* Comfortable Click Targets
* Clear Grouping
* Visual Balance

Navigation should remain easy to scan.

---

# 14. Dashboard Spacing

Dashboard layouts should prioritize:

* Widget Separation
* Information Hierarchy
* Visual Balance

Related widgets should remain visually grouped.

---

# 15. Responsive Spacing

Spacing should adapt to:

* Desktop
* Tablet
* Mobile

Small screens may reduce spacing while preserving hierarchy.

---

# 16. Accessibility

Spacing should improve accessibility by:

* Increasing touch target separation
* Preventing accidental clicks
* Improving readability
* Reducing visual clutter

Whitespace is an accessibility feature.

---

# 17. Focus Mode

Learning interfaces should provide additional whitespace around:

* Lesson Content
* Videos
* Reading Material
* Interactive Exercises

Spacing should minimize distractions.

---

# 18. Mobile Considerations

Mobile layouts should prioritize:

* Comfortable Touch Targets
* Vertical Rhythm
* Reduced Horizontal Crowding

Spacing should support one-handed interaction.

---

# 19. Design Tokens

Examples

```text
space-xs

space-sm

space-md

space-lg

space-xl

space-section

space-page

space-card
```

Design tokens should be reused across every interface.

---

# 20. CSS Variables

Spacing tokens should be exposed through CSS Variables.

Example

```css
--space-xs
--space-sm
--space-md
--space-lg
--space-xl
--space-page
--space-section
```

Components should reference variables rather than fixed values.

---

# 21. Future Expansion

The spacing system supports:

* Mobile Apps
* Responsive Layouts
* White Label Themes
* Multiple Density Modes
* Future Design Updates

Changes should require only token adjustments.

---

# 22. Design Principles

Spacing should always be:

* Consistent
* Predictable
* Responsive
* Minimal
* Purposeful

Whitespace is intentional and should never be considered "empty space."

---

# 23. Design Decision

Iran LMS adopts an **8-point Grid Spacing System**.

```text
Base Unit (8pt)

↓

Spacing Tokens

↓

Layout Rules

↓

Components

↓

Pages
```

Business modules should never define custom spacing values.

All spacing originates from the shared spacing system.

---

# 24. Strategic Vision

The Spacing System establishes a unified visual rhythm across the Iran LMS ecosystem.

By separating base units, spacing tokens, and layout rules, the platform achieves consistent interfaces that remain scalable across desktop, mobile, administration panels, and future applications.

Consistent spacing reduces cognitive load, improves readability, and creates a professional learning experience where content—not layout inconsistencies—receives the user's attention.
