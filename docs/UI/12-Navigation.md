# Navigation

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Navigation System used throughout the Iran LMS platform.

Navigation enables users to move efficiently between modules, pages, learning content, and administrative tools while always maintaining awareness of their current location.

A consistent navigation system reduces cognitive load and improves productivity.

---

# 2. Goals

The Navigation System should be:

* Consistent
* Predictable
* Responsive
* Accessible
* Scalable
* Context-Aware

Users should never wonder where they are or where to go next.

---

# 3. Design Philosophy

Navigation should support the user's workflow, not interrupt it.

The system should answer three questions at all times:

* Where am I?
* Where can I go?
* How do I return?

Navigation should feel natural regardless of the module.

---

# 4. Navigation Architecture

The navigation system consists of multiple layers.

```text
Global Navigation

↓

Module Navigation

↓

Local Navigation

↓

Context Navigation

↓

Page Actions
```

Each layer has a different responsibility.

---

# 5. Navigation Types

Supported navigation types

```text
Global Navigation

Sidebar Navigation

Top Navigation

Bottom Navigation (Mobile)

Breadcrumb

Tabs

Wizard Navigation

Pagination

Context Menu
```

Each type serves a specific purpose.

---

# 6. Global Navigation

Global Navigation provides access to the platform's primary modules.

Examples include:

* Dashboard
* Courses
* Learning
* Students
* Instructors
* Commerce
* Reports
* Settings

Global navigation should remain stable across the application.

---

# 7. Sidebar Navigation

The sidebar is the primary navigation pattern for desktop.

It should support:

* Nested Menus
* Icons
* Active States
* Collapse / Expand
* Section Grouping

The sidebar should remain predictable across modules.

---

# 8. Top Navigation

The top navigation contains global utilities.

Typical items include:

* Search
* Notifications
* Messages
* Language Switcher
* Theme Switcher
* User Menu

Top navigation should remain lightweight.

---

# 9. Mobile Navigation

Mobile navigation should prioritize the most frequently used destinations.

Possible patterns include:

* Bottom Navigation Bar
* Navigation Drawer
* Floating Action Button (when appropriate)

Navigation should remain reachable with one hand.

---

# 10. Breadcrumb Navigation

Breadcrumbs display the user's current location.

Example

```text
Dashboard

>

Courses

>

Course Details

>

Lesson
```

Breadcrumbs should never replace the primary navigation.

---

# 11. Tab Navigation

Tabs organize related content within a page.

Examples

* Overview
* Curriculum
* Students
* Reviews
* Settings

Tabs should never be used for unrelated content.

---

# 12. Context Navigation

Context Navigation provides actions related to the current object.

Examples

* Course Actions
* Lesson Actions
* Student Actions
* Order Actions

Context menus should contain only relevant actions.

---

# 13. Learning Navigation

Learning pages require a specialized navigation model.

Examples

* Previous Lesson
* Next Lesson
* Course Curriculum
* Lesson Progress
* Notes
* Resources

Learning navigation should minimize distractions.

---

# 14. Wizard Navigation

Multi-step workflows should display:

* Current Step
* Completed Steps
* Remaining Steps

Users should always understand their progress.

---

# 15. Active State

Navigation should clearly indicate the active destination.

Only one primary navigation item should appear active within the same level.

---

# 16. Expandable Navigation

Nested menus should support:

* Expand
* Collapse
* Remember Previous State

Animation should remain subtle.

---

# 17. Search Integration

Global Search should integrate naturally with navigation.

Users should be able to navigate directly from search results.

---

# 18. Notifications

Notification access should be available from the global navigation.

Unread notifications should be visually distinguishable.

---

# 19. Responsive Behavior

Navigation adapts to:

* Desktop
* Tablet
* Mobile

The navigation model may change, but navigation hierarchy should remain consistent.

---

# 20. Accessibility

Navigation must support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* Accessible Labels
* Skip Navigation Links

Navigation should comply with WCAG 2.2 AA.

---

# 21. Navigation States

Supported states

```text
Default

Hover

Active

Focus

Expanded

Collapsed

Disabled
```

State transitions should remain consistent.

---

# 22. Design Tokens

Examples

```text
nav-height

sidebar-width

nav-gap

nav-item-padding

nav-radius

nav-icon-size
```

Navigation components should consume shared design tokens.

---

# 23. CSS Variables

Examples

```css
--nav-height
--sidebar-width
--nav-gap
--nav-item-padding
--nav-radius
--nav-transition
```

Implementation should avoid hardcoded values.

---

# 24. Future Expansion

The Navigation System supports:

* AI Navigation
* Organizations
* White Label Themes
* Mobile Applications
* Multi-Tenant Deployments
* Plugin Extensions

Future modules should integrate into the existing navigation hierarchy.

---

# 25. Design Principles

Navigation should always remain:

* Clear
* Predictable
* Consistent
* Minimal
* Accessible
* Context-Aware

The user should never lose orientation within the application.

---

# 26. Design Decision

Iran LMS follows a **Hierarchical Navigation Architecture**.

```text
Global Navigation

↓

Module Navigation

↓

Local Navigation

↓

Context Navigation

↓

User Actions
```

Every navigation layer has a single responsibility and should not duplicate another layer.

---

# 27. Strategic Vision

The Navigation System provides the structural backbone of the Iran LMS user experience.

By separating global, module, local, and contextual navigation, the platform can scale from a simple learning website to a comprehensive enterprise learning ecosystem without sacrificing usability.

Whether users are students, instructors, administrators, or organization managers, navigation should remain intuitive, efficient, and consistent across every product and every screen.
