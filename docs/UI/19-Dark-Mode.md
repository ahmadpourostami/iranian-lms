# Dark Mode

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Dark Mode System used throughout the Iran LMS platform.

Dark Mode provides an alternative visual theme that improves comfort in low-light environments while maintaining readability, usability, and visual consistency.

Dark Mode is a first-class experience—not a color inversion.

---

# 2. Goals

The Dark Mode System should be:

* Comfortable
* Consistent
* Accessible
* Energy Efficient
* Themeable
* Maintainable

Every component should support both Light and Dark themes equally.

---

# 3. Design Philosophy

Dark Mode is another visual identity of the product.

The interface should preserve:

* Hierarchy
* Contrast
* Meaning
* Brand Identity
* Component Recognition

Changing themes should never change user behavior.

---

# 4. Theme Architecture

The theme system consists of:

```text id="z81fwt"
Design Tokens

↓

Theme Tokens

↓

CSS Variables

↓

Components

↓

Pages
```

Components should never define theme colors directly.

---

# 5. Theme Modes

Supported modes

```text id="8dzd7v"
Light

Dark

System
```

The System option follows the user's operating system preference.

---

# 6. Theme Switching

Users should be able to switch themes instantly.

The selected theme should be remembered across:

* Sessions
* Devices (when supported)
* Applications within the ecosystem

Theme switching should not require a page refresh.

---

# 7. Surface Hierarchy

Dark Mode should define multiple surface levels.

Examples

```text id="q1v5na"
Background

Surface

Elevated Surface

Modal Surface

Overlay
```

Different surfaces should remain visually distinguishable.

---

# 8. Color Usage

Dark Mode should use semantic colors.

Examples

* Primary
* Success
* Warning
* Danger
* Information
* Neutral

Semantic meaning must remain identical in every theme.

---

# 9. Typography

Text hierarchy should remain unchanged.

Supported levels

* Primary Text
* Secondary Text
* Muted Text
* Disabled Text
* Link Text

Contrast should remain readable without excessive brightness.

---

# 10. Icons

Icons should inherit semantic colors.

Avoid creating separate icon assets for Dark Mode.

SVG icons should adapt automatically through theme variables.

---

# 11. Buttons

Every button variant must support Dark Mode.

Examples

* Primary
* Secondary
* Outline
* Ghost
* Danger
* Success

Interaction states should remain recognizable.

---

# 12. Forms

Inputs should support:

* Focus
* Hover
* Error
* Disabled
* Read Only

Borders and backgrounds should remain distinguishable.

---

# 13. Cards

Cards should preserve visual depth.

Elevation should rely on:

* Surface Color
* Border
* Shadow (Subtle)

Heavy shadows should be avoided.

---

# 14. Tables

Tables should maintain readability.

Examples

* Clear Row Separation
* Hover State
* Selected Rows
* Sticky Headers

Contrast should prioritize data readability.

---

# 15. Charts

Charts should automatically adapt.

Requirements include:

* Theme-aware Colors
* Accessible Contrast
* Grid Visibility
* Tooltip Adaptation

Charts should never rely on hardcoded colors.

---

# 16. Media

Images and videos should remain unchanged.

However:

* Backgrounds
* Frames
* Controls
* Captions

should adapt to the active theme.

---

# 17. Notifications

Notifications should preserve semantic meaning.

Examples

* Success
* Warning
* Error
* Information

Visual emphasis should remain consistent.

---

# 18. Empty States

Illustrations and icons should support both themes.

Avoid illustrations designed only for light backgrounds.

---

# 19. Loading States

Loading indicators should remain visible.

Examples

* Skeleton Screens
* Progress Bars
* Spinners

Contrast should remain sufficient.

---

# 20. Motion

Theme switching should include a subtle transition.

Transitions should remain fast and optional.

Respect reduced-motion preferences.

---

# 21. Responsive Behavior

Theme behavior should remain identical across:

* Desktop
* Tablet
* Mobile

Layout should never change because of the active theme.

---

# 22. Accessibility

Dark Mode must support:

* WCAG 2.2 AA Contrast
* Keyboard Navigation
* Focus Indicators
* Screen Readers
* Reduced Motion

Accessibility requirements remain unchanged between themes.

---

# 23. Design Tokens

Examples

```text id="2zr9r5"
surface-primary

surface-secondary

text-primary

text-secondary

border-default

overlay-color

shadow-level
```

Theme-specific values should override shared design tokens.

---

# 24. CSS Variables

Examples

```css id="z8o4hv"
--color-background
--color-surface
--color-text
--color-border
--color-overlay
--shadow-level
```

Components should consume variables instead of hardcoded values.

---

# 25. Performance

Theme switching should:

* Avoid page reloads
* Avoid layout shifts
* Minimize repainting
* Preserve user state

The transition should feel immediate.

---

# 26. Future Expansion

The Theme System supports:

* High Contrast Mode
* Organization Branding
* White Label Themes
* Seasonal Themes
* Mobile Applications

Future themes should reuse the same token architecture.

---

# 27. Design Principles

Dark Mode should always remain:

* Comfortable
* Consistent
* Accessible
* Elegant
* Predictable
* Brand-Aligned

The interface should feel intentionally designed, not automatically inverted.

---

# 28. Design Decision

Iran LMS follows a **Token-Based Theme Architecture**.

```text id="eb3tbj"
Design Tokens

↓

Theme Tokens

↓

CSS Variables

↓

Reusable Components

↓

User Interface
```

Components remain theme-agnostic and receive their appearance through the theme system.

---

# 29. Strategic Vision

The Dark Mode System provides a seamless visual experience across the entire Iran LMS ecosystem.

Whether users are studying late at night, reviewing reports, managing courses, or participating in live classes, every interface adapts through a unified token-based architecture while preserving usability, accessibility, and brand consistency.

The long-term objective is to make theme switching effortless, scalable, and extensible, enabling future support for organization branding, white-label products, high-contrast accessibility themes, and additional visual identities without requiring component redesign.
