# Figma Rules

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Figma Organization Rules for the Iran LMS Design System.

Although the design system is platform-independent, every UI created in Figma should follow the same structure, naming conventions, and component architecture.

A well-organized design file is as important as clean source code.

---

# 2. Goals

The Figma structure should be:

* Consistent
* Modular
* Reusable
* Scalable
* Developer-Friendly
* Team-Friendly

Design files should remain understandable even years later.

---

# 3. Design Philosophy

Design files are products.

Every screen should be assembled from reusable components instead of individually designed elements.

The Design System should always be the single source of truth.

---

# 4. File Architecture

Recommended Figma file structure:

```text id="2b8tvf"
Foundation

↓

Component Library

↓

Patterns

↓

Templates

↓

Pages

↓

Prototype
```

Each layer has a clear responsibility.

---

# 5. Foundation Pages

Foundation pages include:

* Colors
* Typography
* Grid
* Spacing
* Icons
* Motion
* Elevation

Only global design decisions belong here.

---

# 6. Component Pages

Components should be grouped by category.

Examples

* Buttons
* Forms
* Navigation
* Cards
* Tables
* Dialogs
* Charts
* Learning Components

Every reusable component should exist only once.

---

# 7. Pattern Pages

Patterns combine multiple components.

Examples

* Login Form
* Dashboard Widget
* Course Card Grid
* Checkout Flow
* Quiz Layout

Patterns should never duplicate components.

---

# 8. Template Pages

Templates define reusable layouts.

Examples

* Dashboard
* Learning Page
* Course Detail
* Settings
* Reports

Templates should contain placeholder content only.

---

# 9. Screen Pages

Actual product screens belong here.

Examples

* Student Dashboard
* Instructor Dashboard
* Learning Mode
* Checkout
* Organization Settings

Screens should consume templates and components.

---

# 10. Naming Convention

Names should follow a predictable hierarchy.

Examples

```text id="znpsq8"
Button / Primary

Button / Secondary

Card / Course

Card / Lesson

Input / Text

Navigation / Sidebar
```

Names should remain short and descriptive.

---

# 11. Auto Layout

Every reusable component should use Auto Layout.

Benefits include:

* Flexible Resizing
* Responsive Behavior
* Better Developer Handoff

Manual positioning should be minimized.

---

# 12. Constraints

Components should define:

* Resize Behavior
* Alignment
* Stretch Rules

Responsive behavior should be predictable.

---

# 13. Variables

Whenever possible, Figma Variables should control:

* Colors
* Spacing
* Radius
* Typography
* Elevation

Variables should mirror Design Tokens.

---

# 14. Component Properties

Components should expose only meaningful properties.

Examples

* Variant
* Size
* State
* Icon
* Label

Avoid unnecessary customization.

---

# 15. Variants

Examples

```text id="vkj4sd"
Primary

Secondary

Outline

Ghost

Danger

Success
```

Variants should cover common use cases without creating duplicates.

---

# 16. States

Interactive components should include:

```text id="utp5ya"
Default

Hover

Focus

Active

Disabled

Loading

Error

Success
```

Every state should be documented.

---

# 17. Icons

Icons should:

* Use a single style
* Follow a common grid
* Support component properties

Avoid multiple icon styles within one project.

---

# 18. Typography

Text styles should use shared variables.

Examples

* Display
* Heading
* Title
* Body
* Caption

Manual text formatting should be avoided.

---

# 19. Color Styles

Colors should be semantic.

Examples

* Primary
* Success
* Warning
* Danger
* Surface
* Background

Avoid naming colors by appearance (e.g., Blue 500) in component usage.

---

# 20. Documentation

Every component should include:

* Description
* Usage
* Variants
* States
* Accessibility Notes
* Responsive Notes

Documentation should remain close to the component.

---

# 21. Prototype Rules

Prototypes should demonstrate:

* Navigation
* User Flow
* Animation
* Interaction

Prototype files should not replace design documentation.

---

# 22. Versioning

Major design updates should be versioned.

Examples

* v1
* v2
* Experimental

Deprecated components should remain archived until removed.

---

# 23. Developer Handoff

Designs should provide:

* Measurements
* Variables
* Component Names
* Responsive Behavior
* Design Tokens

Developers should not guess implementation details.

---

# 24. Performance

Large Figma files should remain manageable.

Recommendations

* Archive unused pages
* Remove duplicate components
* Optimize images
* Organize assets

Maintain performance as the library grows.

---

# 25. Future Expansion

The Figma structure supports:

* White Label Themes
* Organization Branding
* Mobile Applications
* Design Tokens Sync
* AI-Assisted Design
* Multi-Product Libraries

Future additions should preserve the same architecture.

---

# 26. Design Principles

Figma files should always remain:

* Organized
* Reusable
* Predictable
* Scalable
* Developer-Friendly
* Easy to Maintain

Every designer should be able to understand the file structure immediately.

---

# 27. Design Decision

Iran LMS follows a **Component-First Design Workflow**.

```text id="qz86vk"
Foundation

↓

Reusable Components

↓

Patterns

↓

Templates

↓

Pages

↓

Prototype
```

Every screen is assembled from reusable building blocks instead of custom-designed elements.

---

# 28. Strategic Vision

The Figma organization rules provide a scalable foundation for managing the Iran LMS design system across multiple products, teams, and future platforms.

Although the current project is being designed without Figma, these standards ensure that the entire design system can later be migrated into a professional Figma library with minimal effort. By aligning file organization, component structure, naming conventions, and design tokens, future designers and developers can collaborate efficiently while maintaining consistency across web, mobile, white-label, and enterprise editions of Iran LMS.
