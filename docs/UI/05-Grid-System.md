# Grid System

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Grid System used throughout the Iran LMS platform.

The Grid System provides a consistent layout structure for all pages, dashboards, learning interfaces, mobile applications, and future products.

A unified grid improves alignment, readability, scalability, and implementation consistency.

---

# 2. Goals

The Grid System should be:

* Consistent
* Responsive
* Flexible
* Predictable
* Scalable
* Easy to Implement

Every layout should follow the same structural rules.

---

# 3. Design Philosophy

Users should never consciously notice the grid.

The Grid System exists to create visual harmony and improve scanning, navigation, and learning.

Alignment is a usability feature—not merely a visual preference.

---

# 4. Grid Architecture

The layout architecture consists of several layers.

```text
Viewport
      ↓
Container
      ↓
Columns
      ↓
Gutters
      ↓
Content
```

Each layer has a specific responsibility.

---

# 5. Layout Types

Iran LMS defines three primary layout categories.

```text
Application Layout

Learning Layout

Marketing Layout
```

Each layout type shares the same grid principles while serving different user experiences.

---

# 6. Containers

Containers define the maximum readable width of content.

Container behavior should:

* Prevent overly wide content
* Improve readability
* Maintain visual balance
* Support large displays

Container sizes should be controlled through layout tokens.

---

# 7. Columns

The platform uses a responsive column system.

Recommended structure

```text
Desktop → 12 Columns

Tablet → 8 Columns

Mobile → 4 Columns
```

Columns should adapt automatically according to screen size.

---

# 8. Gutters

Gutters separate columns.

They improve:

* Readability
* Visual grouping
* Component separation

Gutters should remain consistent throughout the platform.

---

# 9. Margins

Every layout defines safe outer margins.

Margins should:

* Prevent edge collisions
* Improve readability
* Support touch interaction

Margins should scale responsively.

---

# 10. Dashboard Layout

Dashboards use a modular grid.

Typical elements include:

* Statistics Cards
* Charts
* Tables
* Activity Panels
* Calendar Widgets

Widgets should align to the shared column structure.

---

# 11. Learning Layout

Learning pages prioritize educational content.

The grid should support:

* Lesson Content
* Video Player
* Lesson Navigation
* Notes
* Attachments
* Progress

Content receives the highest layout priority.

---

# 12. Focus Mode Layout

Focus Mode intentionally simplifies the grid.

The layout emphasizes:

* Lesson Content
* Video
* Reading Area

Secondary navigation is minimized to reduce distractions.

---

# 13. Sidebar Layout

Sidebars should occupy dedicated grid regions.

Supported sidebars include:

* Main Navigation
* Course Navigation
* Filters
* Settings
* Instructor Tools

Sidebar width should remain predictable across pages.

---

# 14. Forms

Forms align to the same grid system.

Fields should:

* Align vertically
* Maintain consistent widths
* Preserve comfortable reading flow

Complex forms may span multiple columns on larger screens.

---

# 15. Tables

Tables should respect the grid.

Responsive behavior includes:

* Horizontal scrolling
* Column collapsing
* Priority-based visibility

Critical information should remain visible.

---

# 16. Cards

Cards align to the grid.

Cards should:

* Share consistent widths
* Align vertically
* Maintain equal spacing

Card layouts should remain modular.

---

# 17. Responsive Behavior

The grid adapts across:

* Desktop
* Laptop
* Tablet
* Mobile

Layouts should reflow naturally rather than simply shrinking.

---

# 18. Mobile Grid

Mobile layouts prioritize vertical flow.

Typical characteristics include:

* Single-column layouts
* Stacked components
* Comfortable touch spacing
* Simplified navigation

Mobile usability has priority over visual symmetry.

---

# 19. Wide Screens

Large displays should not stretch educational content indefinitely.

Instead:

* Increase whitespace
* Preserve readable content width
* Expand secondary panels only when beneficial

Reading comfort remains the priority.

---

# 20. Accessibility

The Grid System supports accessibility by:

* Maintaining predictable layouts
* Preventing overcrowding
* Improving reading flow
* Supporting zoom without layout failure

Layout should remain usable under accessibility settings.

---

# 21. Layout Tokens

Examples

```text
container-default

container-learning

grid-columns

grid-gutter

page-margin

sidebar-width

content-max-width
```

Layout values should originate from reusable tokens.

---

# 22. CSS Variables

Layout tokens should be exposed through CSS Variables.

Example

```css
--container-width
--grid-columns
--grid-gutter
--page-margin
--sidebar-width
--content-max-width
```

Components should consume variables rather than fixed measurements.

---

# 23. Future Expansion

The Grid System supports:

* Mobile Applications
* White Label Themes
* AI Interfaces
* Analytics Dashboards
* Enterprise Modules
* Large Displays

Future layouts should require only configuration updates.

---

# 24. Design Principles

The Grid System should always remain:

* Invisible
* Consistent
* Flexible
* Predictable
* Responsive
* Content-First

Layout should support learning rather than compete with it.

---

# 25. Design Decision

Iran LMS adopts a **Responsive 12-Column Grid Architecture**.

```text
Layout Tokens

↓

Containers

↓

Columns

↓

Sections

↓

Components

↓

Pages
```

All layouts inherit from the same grid foundation while allowing specialized templates for dashboards, learning experiences, and marketing pages.

---

# 26. Strategic Vision

The Grid System serves as the structural foundation of the Iran LMS ecosystem.

By separating layout tokens, containers, and responsive grid rules, every interface—from the WordPress website and LMS plugin to the administration panel and future mobile applications—maintains a coherent and scalable layout language.

The ultimate objective is to ensure that users always focus on learning, while the underlying layout quietly provides clarity, balance, and consistency across every screen.
