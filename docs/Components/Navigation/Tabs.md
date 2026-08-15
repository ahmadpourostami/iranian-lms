# Tabs

**Component:** Navigation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Tabs component organizes related content into multiple sections without requiring users to navigate to different pages.

Tabs enable users to switch between closely related views while maintaining context and reducing navigation complexity.

---

# 2. Component Type

**Category**

Navigation Component

**Role**

Content Navigation

---

# 3. Usage

The Tabs component is used for:

* Course Details
* User Profiles
* Student Dashboard Sections
* Instructor Dashboard
* Organization Settings
* Reports
* Commerce
* Certificates
* Analytics
* AI Features

Tabs should organize content that belongs to the same page.

---

# 4. Anatomy

A Tabs component consists of:

```text id="q7m4pk"
Tab List

↓

Tab Item

↓

Active Indicator

↓

Tab Panel
```

Only one Tab Panel is visible at a time.

---

# 5. Tab Types

Supported types:

```text id="k5v2rz"
Primary Tabs

Secondary Tabs

Segmented Tabs

Scrollable Tabs

Icon Tabs
```

Primary Tabs are recommended for most pages.

---

# 6. Variants

Supported variants:

```text id="m8q6ty"
Underline

Contained

Pill

Segmented
```

Underline is the default style for Iran LMS.

---

# 7. Sizes

Supported sizes:

```text id="u4r9wc"
Small

Medium

Large
```

Medium should be the default size.

---

# 8. States

The Tabs component supports:

```text id="n2x7pa"
Default

Hover

Focused

Active

Disabled
```

Only one tab should be active at a time.

---

# 9. Tab Labels

Labels should:

* Be concise.
* Clearly describe the content.
* Remain consistent across the application.

Examples:

* Overview
* Lessons
* Assignments
* Students
* Reviews
* Settings

---

# 10. Icons

Tabs may optionally include icons.

Examples:

* Course
* Video
* Quiz
* Certificate
* Analytics

Icons should reinforce labels rather than replace them.

---

# 11. Badges

Tabs may display badges.

Examples:

* Notifications
* Unread Messages
* Pending Reviews
* Assignment Count

Badges should remain compact and unobtrusive.

---

# 12. Scrollable Tabs

When the number of tabs exceeds available space:

* Enable horizontal scrolling.
* Preserve the active tab.
* Keep interaction smooth.

Scrollable tabs are recommended on mobile devices.

---

# 13. Tab Panels

Each Tab Panel should:

* Display only relevant content.
* Preserve state when appropriate.
* Load efficiently.

Switching tabs should not unnecessarily reset user input.

---

# 14. Lazy Loading

Large content sections may use lazy loading.

Examples:

* Reports
* Analytics
* Media Libraries
* Student Lists

Loading behavior should remain transparent to users.

---

# 15. Responsive Behavior

Desktop

* Full-width tab list.

Tablet

* Scrollable when necessary.

Mobile

* Horizontal scrolling.
* Touch-friendly spacing.

Tabs should remain easy to select using touch.

---

# 16. Accessibility

The Tabs component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Each tab should be correctly associated with its corresponding panel.

---

# 17. Keyboard Interaction

Supported keyboard actions:

* Tab → Focus Tab List
* Left Arrow → Previous Tab
* Right Arrow → Next Tab
* Home → First Tab
* End → Last Tab
* Enter / Space → Activate Tab

Keyboard navigation should follow established accessibility standards.

---

# 18. Animation

Recommended animations:

* Underline Slide
* Fade Content
* Crossfade
* Small Horizontal Transition

Animations should remain subtle and respect the user's **Reduced Motion** preference.

---

# 19. Design Tokens

Examples

```text id="v6k3qm"
tab-height

tab-padding

tab-color

tab-active-color

tab-indicator

tab-radius
```

All visual properties should consume Design Tokens.

---

# 20. CSS Variables

Examples

```css id="c9w5pn"
--tab-height
--tab-padding
--tab-color
--tab-active
--tab-indicator
--tab-radius
```

Implementation should remain token-driven.

---

# 21. Do

Recommended practices:

* Keep labels short.
* Highlight the active tab clearly.
* Preserve user context when switching.
* Use icons only when they improve recognition.
* Support horizontal scrolling on mobile.

---

# 22. Don't

Avoid:

* Excessive numbers of tabs.
* Long tab labels.
* Multiple active tabs.
* Deeply nested tabs.
* Resetting user data on every tab change.

Tabs should simplify navigation rather than complicate it.

---

# 23. Common Use Cases

Examples include:

* Course Overview
* Curriculum
* Assignments
* Discussions
* Reviews
* Students
* Analytics
* Payments
* Organization Members
* Settings

Tabs provide contextual navigation within a single page.

---

# 24. Component Properties (Props)

Typical configurable properties include:

```text id="y3n8tr"
items

activeTab

variant

size

scrollable

showIcons

showBadges

lazyLoad

animation

disabled
```

Additional properties may be introduced while preserving backward compatibility.

---

# 25. Future Expansion

Future enhancements may include:

* AI Suggested Tabs
* Dynamic Tabs
* Closable Tabs
* Drag-and-Drop Reordering
* Personalized Layouts
* Workspace-Specific Tabs

Future capabilities should extend the existing architecture.

---

# 26. Related Components

This component integrates with:

* Sidebar
* Topbar
* Breadcrumb
* Card
* Badge
* Icon
* Page Header
* Navigation

Together they provide layered navigation throughout the platform.

---

# 27. Design Principles

The Tabs component should always remain:

* Clear
* Accessible
* Responsive
* Predictable
* Contextual
* Efficient

Users should immediately understand which section is active and switch between sections with minimal effort.

---

# 28. Design Decision

Iran LMS follows a **Contextual Content Navigation Architecture**.

```text id="r5m2vx"
Page

↓

Tabs

↓

Selected Section

↓

Content Panel
```

Tabs provide fast navigation between related content while keeping users within the same page context.

---

# 29. Strategic Vision

The Tabs component provides structured in-page navigation across the Iran LMS ecosystem. Whether organizing course information, student records, instructor tools, reports, analytics, or administrative settings, every tab follows a consistent, accessible, and token-driven interaction model.

The long-term objective is to evolve the Tabs component into an adaptive navigation system capable of supporting AI-powered content prioritization, personalized layouts, enterprise workflows, and dynamic workspaces while preserving simplicity, performance, and usability.
