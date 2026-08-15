# Design Tokens

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Design Token System used throughout the Iran LMS platform.

Design Tokens are the single source of truth for every visual property in the user interface.

All components, pages, themes, and future applications must consume Design Tokens instead of hardcoded values.

---

# 2. Goals

The Design Token System should be:

* Centralized
* Consistent
* Reusable
* Themeable
* Platform Independent
* Scalable

Every visual decision should originate from a design token.

---

# 3. Design Philosophy

Design Tokens separate design decisions from implementation.

Instead of defining colors, spacing, or typography directly inside components, components reference semantic tokens.

This approach enables consistent branding, rapid theme changes, and easier maintenance.

---

# 4. Token Architecture

Iran LMS follows a layered token architecture.

```text id="xg7wq2"
Core Tokens

↓

Semantic Tokens

↓

Component Tokens

↓

CSS Variables

↓

UI Components
```

Each layer has a specific responsibility.

---

# 5. Core Tokens

Core Tokens define raw design values.

Examples

```text id="b2qf9n"
Blue-500

Gray-100

Gray-900

Radius-8

Spacing-16

Shadow-2
```

Core Tokens should never be used directly inside components.

---

# 6. Semantic Tokens

Semantic Tokens define meaning rather than appearance.

Examples

```text id="tn8m4y"
Primary

Secondary

Success

Warning

Danger

Surface

Background

Border

Text

Overlay
```

Semantic Tokens provide stability even when visual values change.

---

# 7. Component Tokens

Component Tokens specialize semantic values.

Examples

```text id="r7v0dk"
Button Background

Button Radius

Card Padding

Input Border

Modal Shadow

Navigation Height
```

Component Tokens simplify component implementation.

---

# 8. Color Tokens

Color tokens include:

* Brand Colors
* Semantic Colors
* Surface Colors
* Background Colors
* Border Colors
* Text Colors

Colors should never be hardcoded.

---

# 9. Typography Tokens

Typography tokens define:

* Font Family
* Font Size
* Font Weight
* Line Height
* Letter Spacing

Typography should remain consistent across all platforms.

---

# 10. Spacing Tokens

Spacing tokens define:

* Margin
* Padding
* Grid Gap
* Section Spacing
* Component Gap

Spacing should follow a consistent scale.

---

# 11. Radius Tokens

Radius tokens define:

* Small Radius
* Medium Radius
* Large Radius
* Pill Radius

Border radius should remain consistent across components.

---

# 12. Elevation Tokens

Elevation tokens define:

* Shadow Levels
* Surface Layers
* Overlay Depth

Elevation should communicate hierarchy.

---

# 13. Motion Tokens

Motion tokens define:

* Duration
* Delay
* Easing
* Scale
* Opacity

Motion behavior should remain consistent.

---

# 14. Size Tokens

Size tokens define:

* Icon Size
* Avatar Size
* Button Height
* Input Height
* Navigation Height

Component dimensions should consume shared tokens.

---

# 15. Breakpoint Tokens

Responsive behavior uses breakpoint tokens.

Examples

```text id="y4bspm"
XS

SM

MD

LG

XL

2XL
```

Responsive layouts should reference breakpoint tokens rather than fixed viewport values.

---

# 16. Z-Index Tokens

Layering tokens define interface stacking.

Examples

```text id="q9s6ht"
Base

Dropdown

Sticky

Modal

Popover

Toast

Tooltip
```

Layer hierarchy should remain predictable.

---

# 17. Theme Integration

Themes override semantic tokens.

Examples

```text id="4z0vhy"
Light Theme

Dark Theme

Organization Theme

White Label Theme
```

Components remain unchanged during theme switching.

---

# 18. Platform Support

Design Tokens should be platform-independent.

Supported platforms

* Web
* Progressive Web App
* Android
* iOS
* Desktop
* Future Applications

The same token system should serve every platform.

---

# 19. Naming Convention

Tokens should use meaningful names.

Examples

```text id="pk3u1n"
color-primary

color-surface

spacing-lg

radius-md

shadow-sm

motion-fast
```

Names should describe purpose rather than appearance.

---

# 20. CSS Variables

Tokens should generate CSS variables.

Examples

```css id="3o8nlu"
--color-primary
--color-surface
--spacing-lg
--radius-md
--shadow-sm
--motion-fast
```

CSS variables should be generated automatically from the token system whenever possible.

---

# 21. Component Integration

Every reusable component should consume tokens.

Examples

* Button
* Input
* Card
* Modal
* Table
* Navigation
* Chart

No component should define visual values directly.

---

# 22. Accessibility

Tokens should support accessibility.

Examples

* Contrast Ratios
* Focus Indicators
* Minimum Touch Size
* Reduced Motion

Accessibility should be built into the token system.

---

# 23. Versioning

Token updates should follow semantic versioning.

Examples

* Stable
* Experimental
* Deprecated

Breaking changes should be documented carefully.

---

# 24. Documentation

Every token should include:

* Name
* Category
* Purpose
* Default Value
* Theme Variants
* Usage Examples

Documentation should remain synchronized with implementation.

---

# 25. Performance

A centralized token system should:

* Reduce duplication
* Simplify theme switching
* Improve maintainability
* Enable caching

Tokens should contribute to long-term scalability.

---

# 26. Future Expansion

The Design Token System supports:

* AI-Generated Themes
* White Label Products
* Enterprise Branding
* Dynamic Themes
* Mobile Applications
* Cross-Platform Design Systems

Future tokens should extend the existing architecture rather than replace it.

---

# 27. Design Principles

Design Tokens should always remain:

* Centralized
* Semantic
* Reusable
* Predictable
* Themeable
* Platform Independent

Every visual property should originate from a documented token.

---

# 28. Design Decision

Iran LMS follows a **Token-Driven Design Architecture**.

```text id="u5x7cr"
Core Tokens

↓

Semantic Tokens

↓

Component Tokens

↓

CSS Variables

↓

Reusable Components

↓

Pages

↓

Applications
```

Business features consume components, and components consume Design Tokens.

---

# 29. Strategic Vision

The Design Token System is the foundation of the Iran LMS Design System.

By centralizing every visual decision into reusable, semantic, and platform-independent tokens, the platform achieves consistency across components, themes, products, and future applications. Whether supporting web, mobile, white-label deployments, or enterprise branding, Design Tokens enable rapid evolution without requiring component redesign.

The long-term objective is to establish a single design language that connects designers and developers through a shared, scalable, and maintainable visual foundation.
