# Color System

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the color system used throughout the Iran LMS platform.

The Color System provides a consistent visual language across all interfaces including the WordPress theme, LMS plugin, administration panel, instructor dashboard, student dashboard, and future mobile applications.

Colors should communicate meaning before aesthetics.

---

# 2. Design Goals

The color system should be:

* Consistent
* Accessible
* Scalable
* Themeable
* RTL Friendly
* Future Ready

Every color must have a defined purpose.

---

# 3. Color Philosophy

The interface should remain calm and distraction-free.

Educational content should always receive more visual attention than decorative colors.

Color is used to:

* Guide
* Inform
* Emphasize
* Communicate Status

Never to decorate unnecessarily.

---

# 4. Color Architecture

The platform uses three layers of colors.

```text
Primitive Colors
        ↓
Semantic Tokens
        ↓
Component Tokens
```

Each layer has a different responsibility.

---

# 5. Primitive Colors

Primitive colors represent the base palette.

Examples

```text
Blue

Green

Red

Orange

Purple

Gray
```

Primitive colors should never be referenced directly by components.

---

# 6. Semantic Tokens

Semantic colors describe meaning instead of appearance.

Examples

```text
Primary

Secondary

Success

Warning

Danger

Info

Surface

Background

Border

Text
```

Components should use semantic tokens.

---

# 7. Component Tokens

Component tokens map semantic colors to UI elements.

Examples

```text
Button Primary

Button Hover

Card Background

Input Border

Sidebar Background

Navigation Active

Table Header

Progress Bar
```

Changing a semantic token automatically updates all related components.

---

# 8. Brand Colors

The platform defines brand colors separately.

Tokens

```text
Brand Primary

Brand Secondary

Brand Accent
```

Brand colors should be configurable from the Theme System.

---

# 9. Neutral Palette

Neutral colors are used for structure.

Examples

* Background
* Borders
* Dividers
* Text
* Cards
* Inputs

A complete neutral scale should be available.

---

# 10. Surface Levels

Different elevation levels should have distinct surfaces.

Examples

```text
Surface 0

Surface 1

Surface 2

Surface 3

Surface 4
```

Higher surfaces indicate greater elevation.

---

# 11. Text Colors

Text colors include:

* Primary
* Secondary
* Muted
* Disabled
* Inverse
* Link

Contrast should always satisfy accessibility requirements.

---

# 12. Status Colors

Every status uses dedicated semantic colors.

Examples

```text
Success

Warning

Danger

Info
```

Status colors should remain consistent across the platform.

---

# 13. Interactive Colors

Interactive elements require dedicated states.

States include:

* Default
* Hover
* Active
* Focus
* Disabled

Each state should use predefined tokens.

---

# 14. Feedback Colors

Feedback components include:

* Alerts
* Toasts
* Notifications
* Validation Messages
* Progress Indicators

Feedback colors should communicate system state immediately.

---

# 15. Charts

Charts should use a dedicated palette.

Chart colors should remain distinguishable even for users with color vision deficiencies.

---

# 16. Course Categories

Course categories may define optional accent colors.

These colors are decorative only and must never replace semantic status colors.

---

# 17. Tags

Tags should use semantic variants.

Examples

* Primary
* Success
* Warning
* Danger
* Neutral

Tag colors should remain subtle.

---

# 18. Dark Mode

Every color token must define:

* Light Theme Value
* Dark Theme Value

Theme switching should modify tokens rather than components.

---

# 19. High Contrast Mode

The color system should support an optional high-contrast mode.

High contrast should improve readability without changing layout.

---

# 20. Accessibility

Color should never be the only way to communicate information.

Status indicators should combine:

* Color
* Icons
* Labels
* Shapes

The system should comply with WCAG 2.2 AA.

---

# 21. Color Customization

Organizations and themes may customize:

* Brand Colors
* Accent Colors
* Logo Colors

Semantic colors should remain unchanged to preserve usability.

---

# 22. Design Tokens

Examples

```text
color-primary

color-success

color-danger

color-warning

color-info

color-background

color-surface

color-border

color-text-primary

color-text-secondary
```

Token names should remain platform-independent.

---

# 23. CSS Variables

The implementation should expose tokens as CSS Variables.

Example

```css
--color-primary
--color-success
--color-surface
--color-border
--color-text-primary
```

Components should consume variables instead of hardcoded values.

---

# 24. Mobile Applications

Mobile applications should consume the same semantic color tokens.

Only implementation details may differ between platforms.

---

# 25. Future Expansion

The architecture supports:

* Multiple Themes
* White Label Branding
* Organization Branding
* Seasonal Themes
* Accessibility Themes

New themes should require only token changes.

---

# 26. Design Principles

The Color System should always remain:

* Semantic
* Accessible
* Predictable
* Consistent
* Minimal
* Extensible

Components should never depend on fixed hexadecimal values.

---

# 27. Design Decision

Iran LMS follows a **Semantic Token Architecture**.

```text
Primitive Colors

↓

Semantic Tokens

↓

Component Tokens

↓

UI Components
```

Business modules never reference color values directly.

Only semantic tokens are used throughout the platform.

---

# 28. Strategic Vision

The Color System is designed as a platform-wide design foundation rather than a visual theme.

By separating primitive colors, semantic tokens, and component tokens, Iran LMS can support light mode, dark mode, organization branding, white-label deployments, and future design updates without modifying component implementations.

This architecture ensures long-term consistency, maintainability, and scalability across all current and future products.
