# Breadcrumb

**Component:** Navigation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Breadcrumb component displays the user's current location within the application's hierarchy.

It helps users understand navigation context and quickly return to higher-level pages without relying on the browser's Back button.

---

# 2. Component Type

**Category**

Navigation Component

**Role**

Hierarchical Navigation

---

# 3. Usage

The Breadcrumb component is used for:

* Course Pages
* Lesson Pages
* Student Dashboard
* Instructor Dashboard
* Organization Panel
* Admin Panel
* Reports
* Settings
* Commerce
* Documentation

Breadcrumbs should appear only when the navigation hierarchy contains multiple levels.

---

# 4. Anatomy

A Breadcrumb consists of:

```text id="n7k4pz"
Home

↓

Separator

↓

Parent Page

↓

Separator

↓

Current Page
```

The current page is always the final item.

---

# 5. Structure

Example:

```text id="m3v9qt"
Dashboard

>

Courses

>

PHP Masterclass

>

Lesson 4
```

Each level represents a parent-child relationship.

---

# 6. Breadcrumb Items

Each item may contain:

* Label
* Optional Icon
* Optional Link

Only the current page should be non-clickable.

---

# 7. Separators

Supported separators include:

```text id="u5r2wx"
>

/

Chevron

Arrow
```

Chevron (`>`) is the recommended default.

---

# 8. States

Breadcrumb items support:

```text id="j8n6my"
Default

Hover

Focus

Visited

Current
```

Only navigable items should display hover feedback.

---

# 9. Current Page

The final breadcrumb item:

* Is not clickable.
* Uses emphasized styling.
* Clearly identifies the current location.

Users should immediately recognize their current position.

---

# 10. Icons

Optional icons may be displayed for:

* Home
* Dashboard
* Organization
* Course
* Settings

Icons should support recognition without replacing text labels.

---

# 11. Overflow Handling

Long breadcrumb paths should support:

* Truncation
* Ellipsis
* Collapsible middle items

Example:

```text id="q4t8va"
Home

>

...

>

Course

>

Lesson
```

The beginning and current location should remain visible.

---

# 12. Responsive Behavior

Desktop

* Display full breadcrumb path.

Tablet

* Collapse long paths when needed.

Mobile

* Show only the most relevant levels.
* Support overflow menus if necessary.

Breadcrumbs should never dominate limited screen space.

---

# 13. Accessibility

The Breadcrumb component must support:

* WCAG 2.2 AA
* Screen Readers
* Keyboard Navigation
* Focus Indicators
* Semantic Navigation Landmarks

The breadcrumb trail should be announced as navigation.

---

# 14. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate Links
* Enter → Open Selected Page
* Shift + Tab → Reverse Navigation

The current page should not receive unnecessary focus.

---

# 15. Responsive Labels

Labels should remain:

* Short
* Clear
* Consistent

Avoid excessively long page titles inside breadcrumbs.

---

# 16. Placement

Recommended placement:

```text id="x9m2pk"
Topbar

↓

Breadcrumb

↓

Page Title

↓

Page Content
```

Breadcrumbs should appear near the top of the content area.

---

# 17. Design Tokens

Examples

```text id="r3q7yn"
breadcrumb-color

breadcrumb-active-color

breadcrumb-separator

breadcrumb-spacing

breadcrumb-font
```

All visual properties should consume Design Tokens.

---

# 18. CSS Variables

Examples

```css id="p6v4tc"
--breadcrumb-color
--breadcrumb-active
--breadcrumb-separator
--breadcrumb-spacing
--breadcrumb-font
```

Implementation should remain token-driven.

---

# 19. Do

Recommended practices:

* Display meaningful navigation hierarchy.
* Keep labels concise.
* Highlight the current page.
* Make parent items clickable.
* Collapse overly long paths.

---

# 20. Don't

Avoid:

* Using breadcrumbs for flat navigation.
* Making the current page clickable.
* Displaying duplicate page titles.
* Deep navigation without collapsing.
* Replacing primary navigation with breadcrumbs.

Breadcrumbs complement, rather than replace, the Sidebar and Topbar.

---

# 21. Common Use Cases

Examples include:

* Dashboard > Courses > Course Details
* Dashboard > Students > Student Profile
* Dashboard > Reports > Revenue
* Dashboard > Settings > Notifications
* Organization > Members > User Profile
* Learning > Course > Lesson

Breadcrumbs improve orientation across deep navigation structures.

---

# 22. Component Properties (Props)

Typical configurable properties include:

```text id="f5k8mr"
items

separator

showIcons

collapsible

maxItems

currentItem

responsive

homeIcon
```

Additional properties may be introduced while preserving backward compatibility.

---

# 23. Future Expansion

Future enhancements may include:

* AI Navigation Suggestions
* Recently Visited Paths
* Smart Hierarchy Detection
* Organization Context
* Dynamic Breadcrumb Generation
* Personalized Navigation

Future capabilities should extend the existing architecture.

---

# 24. Related Components

This component integrates with:

* Sidebar
* Topbar
* Navigation
* Page Header
* Search
* Menu
* Link

Together they provide a complete navigation experience.

---

# 25. Design Principles

The Breadcrumb component should always remain:

* Clear
* Lightweight
* Accessible
* Predictable
* Responsive
* Context-Aware

Users should always understand where they are within the application's hierarchy.

---

# 26. Design Decision

Iran LMS follows a **Hierarchical Navigation Context Architecture**.

```text id="w2n9qb"
Application

↓

Hierarchy

↓

Breadcrumb

↓

Current Page

↓

Content
```

Breadcrumbs provide contextual orientation while complementing the Sidebar and Topbar.

---

# 27. Strategic Vision

The Breadcrumb component provides hierarchical context across the Iran LMS ecosystem. Whether users are navigating courses, lessons, reports, organizations, administrative tools, or settings, every breadcrumb follows a consistent, accessible, and token-driven navigation model.

The long-term objective is to evolve the Breadcrumb into an intelligent contextual navigation system capable of supporting AI-generated navigation paths, personalized history, multi-tenant hierarchies, and adaptive workspace navigation while maintaining clarity, consistency, and ease of use.
