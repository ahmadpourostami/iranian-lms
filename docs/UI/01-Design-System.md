# Design System

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the architecture of the Iran LMS Design System.

The Design System provides a single source of truth for all visual and interactive elements across the platform.

It ensures consistency between the web application, WordPress theme, administration panel, instructor dashboard, student dashboard, and future mobile applications.

---

# 2. Goals

The Design System aims to:

* Maintain visual consistency
* Increase development speed
* Reduce duplicated components
* Improve user experience
* Simplify maintenance
* Support future scalability

The system should evolve without breaking existing interfaces.

---

# 3. Design System Layers

The Design System consists of multiple layers.

```text
Design Principles
        ↓
Design Tokens
        ↓
Foundations
        ↓
UI Components
        ↓
Patterns
        ↓
Templates
        ↓
Pages
```

Each layer builds upon the previous one.

---

# 4. Foundations

Foundations define the visual language of the platform.

They include:

* Colors
* Typography
* Spacing
* Grid
* Radius
* Shadows
* Borders
* Icons
* Motion

Foundations should never reference business logic.

---

# 5. Design Tokens

Design Tokens are the smallest reusable visual values.

Examples include:

* Primary Color
* Border Radius
* Font Size
* Font Weight
* Shadow Level
* Animation Duration
* Spacing Unit

Components should consume tokens instead of hardcoded values.

---

# 6. Components

Components are reusable building blocks.

Examples

* Button
* Input
* Card
* Badge
* Modal
* Tabs
* Avatar
* Tooltip
* Table
* Pagination

Each component should have a single responsibility.

---

# 7. Component States

Every interactive component should define all supported states.

Typical states include:

* Default
* Hover
* Active
* Focus
* Disabled
* Loading
* Success
* Error

State behavior should remain consistent across the platform.

---

# 8. Composition

Complex interfaces are created by combining simple components.

Example

```text
Page
    ↓
Section
    ↓
Card
    ↓
Button
```

Composition is preferred over creating large custom components.

---

# 9. Design Patterns

Patterns combine multiple components to solve common user tasks.

Examples include:

* Login Form
* Course Card
* Dashboard Widget
* Search Result
* Lesson Navigation
* Progress Overview
* Checkout Flow

Patterns should be reusable across modules.

---

# 10. Templates

Templates define page structure without business data.

Examples

* Dashboard
* Profile
* Course Detail
* Lesson Viewer
* Checkout
* Settings

Templates should focus on layout only.

---

# 11. Pages

Pages combine templates with real data.

Business modules are responsible for providing content.

The Design System defines appearance, not business rules.

---

# 12. Naming Convention

Component names should be:

* Clear
* Predictable
* Singular
* Descriptive

Examples

```text
Button

CourseCard

ProfileAvatar

ProgressBar

LessonSidebar
```

Avoid ambiguous names.

---

# 13. Reusability

Before creating a new component, developers should verify whether an existing component can be reused.

Duplicate components should not exist.

---

# 14. Modularity

Every component should be:

* Independent
* Reusable
* Replaceable
* Testable

Components should minimize dependencies.

---

# 15. Variants

Components may define visual variants.

Example

```text
Primary

Secondary

Outline

Ghost

Danger

Success
```

Variants should reuse the same underlying behavior.

---

# 16. Sizes

Supported size scale

```text
XS

SM

MD

LG

XL
```

Custom sizes should be avoided.

---

# 17. Responsive Design

Every component should adapt to:

* Desktop
* Tablet
* Mobile

Responsive behavior should preserve usability rather than simply shrinking content.

---

# 18. Accessibility

Every component should support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* Sufficient Contrast
* Accessible Labels

Accessibility is required for every new component.

---

# 19. Dark Mode

The Design System must support both:

* Light Theme
* Dark Theme

Theme switching should rely on Design Tokens rather than component-specific overrides.

---

# 20. RTL Support

Every component must support:

* Right-to-Left Layout
* Left-to-Right Layout

Direction-specific styling should remain minimal.

---

# 21. Animation

Animations should communicate interface changes.

Motion should be:

* Fast
* Consistent
* Purposeful

Animation should never delay user interaction.

---

# 22. Empty States

Every data-driven interface should define an Empty State.

Empty States should:

* Explain the situation
* Suggest the next action
* Reduce confusion

---

# 23. Error States

Components should clearly communicate:

* Validation Errors
* Network Errors
* Permission Errors
* System Errors

Errors should always include a recovery path whenever possible.

---

# 24. Loading States

Loading should be represented using:

* Skeletons
* Progress Indicators
* Inline Loading

Spinners should be used only when progress cannot be estimated.

---

# 25. Documentation

Each component should be documented with:

* Purpose
* Properties
* Variants
* States
* Accessibility Notes
* Usage Examples
* Do's
* Don'ts

Documentation is part of the component.

---

# 26. Versioning

The Design System should evolve through semantic versioning.

Examples

```text
1.0.0

1.1.0

2.0.0
```

Breaking changes should be documented.

---

# 27. Future Compatibility

The Design System should support future products including:

* WordPress Theme
* Native Mobile App
* Instructor Panel
* Student Panel
* Admin Panel
* Enterprise Dashboard

The visual language should remain consistent across all products.

---

# 28. Architecture Overview

```text
Design Tokens
        ↓
Foundations
        ↓
Primitive Components
        ↓
Composite Components
        ↓
Patterns
        ↓
Templates
        ↓
Pages
```

Each layer has a single responsibility and depends only on lower layers.

---

# 29. Design Decision

Iran LMS follows an **Atomic Design-inspired architecture**.

```text
Tokens

↓

Foundations

↓

Primitives

↓

Components

↓

Patterns

↓

Templates

↓

Pages
```

Unlike a strict Atomic Design implementation, business logic is intentionally excluded from the Design System.

The Design System owns only visual language and interaction behavior.

---

# 30. Strategic Vision

The Iran LMS Design System is intended to become the shared visual foundation for every current and future product.

Whether users interact through the WordPress website, the LMS plugin, the administration panel, or future mobile applications, they should experience one unified design language.

A consistent Design System reduces maintenance costs, accelerates development, improves usability, and ensures that the platform can grow without losing visual coherence.
