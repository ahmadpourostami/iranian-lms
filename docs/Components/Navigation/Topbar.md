# Topbar

**Component:** Navigation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Topbar component provides quick access to global actions, navigation controls, search, notifications, user profile, and workspace information.

It serves as the primary global navigation layer while the Sidebar provides contextual navigation.

---

# 2. Component Type

**Category**

Navigation Component

**Role**

Global Navigation

---

# 3. Usage

The Topbar is used for:

* Global Search
* Notifications
* User Profile
* Workspace Information
* Sidebar Toggle
* Organization Switching
* Quick Actions
* AI Assistant
* Theme Switching
* Language Selection

The Topbar remains visible throughout authenticated areas of the application.

---

# 4. Anatomy

A Topbar consists of:

```text id="q8m4kp"
Sidebar Toggle

↓

Page Title

↓

Breadcrumb (Optional)

↓

Search

↓

Quick Actions

↓

Notifications

↓

AI Assistant

↓

User Profile
```

Elements should be arranged according to platform priorities.

---

# 5. Layout

Recommended layout:

```text id="w6v2na"
Left

Sidebar Toggle

Logo (Optional)

Page Title

Center

Search

Right

Quick Actions

Notifications

Theme Switcher

Language

Profile
```

The layout should remain balanced across all screen sizes.

---

# 6. Topbar Types

Supported types:

```text id="m3q8zc"
Standard

Compact

Transparent

Sticky

Floating
```

Sticky is recommended for dashboard experiences.

---

# 7. Height

Recommended height:

```text id="r7p4tx"
72px
```

Compact version:

```text id="j5n8qa"
64px
```

Height should be controlled using Design Tokens.

---

# 8. Page Title

The Topbar should display:

* Current Page
* Current Section
* Current Workspace (Optional)

Titles should remain concise.

---

# 9. Breadcrumb

Optional breadcrumb navigation may display:

```text id="x2w7mf"
Dashboard

>

Courses

>

Course Details
```

Breadcrumbs help users understand navigation hierarchy.

---

# 10. Search

Global search may include:

* Courses
* Lessons
* Students
* Instructors
* Organizations
* Reports
* Settings

Search should provide instant suggestions.

---

# 11. Quick Actions

Examples:

* Create Course
* Add Student
* Upload Media
* Schedule Live Class
* Generate AI Content

Quick actions should be configurable according to user role.

---

# 12. Notifications

Notification area may include:

* Notification Icon
* Unread Badge
* Dropdown Panel

Notification counts should update in real time.

---

# 13. AI Assistant

The Topbar may provide access to:

* AI Chat
* AI Suggestions
* AI Content Generator
* AI Search

The AI entry point should remain consistently positioned.

---

# 14. Theme Switcher

Optional controls include:

* Light Mode
* Dark Mode
* Auto Theme

Theme switching should occur instantly.

---

# 15. Language Switcher

Supported languages may include:

* فارسی
* English
* العربية

The component should fully support RTL and LTR layouts.

---

# 16. User Profile

Profile area may include:

* Avatar
* Name
* Current Role
* Organization
* Dropdown Menu

The profile menu provides account-related actions.

---

# 17. Workspace Information

Enterprise deployments may display:

* Organization
* Workspace
* Tenant
* Active Subscription

Workspace information should remain easily accessible.

---

# 18. Responsive Behavior

Desktop

* Full navigation.

Tablet

* Reduced spacing.
* Collapsible search.

Mobile

* Drawer menu.
* Search overlay.
* Simplified actions.
* Overflow menu.

Primary actions should remain accessible.

---

# 19. Accessibility

The Topbar component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Every interactive control should include an accessible label.

---

# 20. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate
* Enter → Activate
* Esc → Close Menus
* Arrow Keys → Navigate Dropdowns

Keyboard interaction should remain consistent across all menus.

---

# 21. Animation

Topbar animations should be:

* Smooth
* Lightweight
* Predictable

Examples:

* Dropdown Fade
* Search Expansion
* Notification Panel Slide

Animations should respect the user's **Reduced Motion** preference.

---

# 22. Design Tokens

Examples

```text id="p4k9ry"
topbar-height

topbar-background

topbar-border

topbar-padding

topbar-shadow

topbar-item-spacing
```

All visual properties should consume Design Tokens.

---

# 23. CSS Variables

Examples

```css id="t8v5qm"
--topbar-height
--topbar-bg
--topbar-border
--topbar-padding
--topbar-shadow
--topbar-item-gap
```

Implementation should remain token-driven.

---

# 24. Do

Recommended practices:

* Keep important actions visible.
* Use concise page titles.
* Maintain consistent spacing.
* Support responsive layouts.
* Prioritize frequently used actions.

---

# 25. Don't

Avoid:

* Overcrowding the Topbar.
* Duplicating Sidebar navigation.
* Large dropdown menus.
* Multiple search fields.
* Excessive icons without labels or tooltips.

The Topbar should remain focused on global actions.

---

# 26. Common Use Cases

Examples include:

* Dashboard Header
* Student Panel
* Instructor Panel
* Organization Dashboard
* Admin Dashboard
* Reports
* Commerce
* Learning Area
* Settings
* AI Workspace

The Topbar provides global access regardless of the current page.

---

# 27. Component Properties (Props)

Typical configurable properties include:

```text id="u2n6wc"
sticky

transparent

pageTitle

breadcrumb

search

notifications

profile

workspace

themeSwitcher

languageSwitcher

quickActions
```

Additional properties may be introduced while preserving backward compatibility.

---

# 28. Future Expansion

Future enhancements may include:

* AI Global Search
* Personalized Quick Actions
* Workspace Recommendations
* Live Collaboration Indicators
* Smart Notifications
* Organization Branding

Future capabilities should extend the existing architecture.

---

# 29. Related Components

This component integrates with:

* Sidebar
* Breadcrumb
* Search
* Notification
* Avatar
* Dropdown
* Badge
* AI Assistant

Together they provide the platform's complete navigation experience.

---

# 30. Design Principles

The Topbar component should always remain:

* Clean
* Accessible
* Responsive
* Predictable
* Efficient
* Role-Aware

Users should be able to access the most important global actions from any authenticated page.

---

# 31. Design Decision

Iran LMS follows a **Global Navigation Architecture**.

```text id="h7m3zd"
Application

↓

Topbar

↓

Global Actions

↓

Contextual Navigation

↓

Workspace
```

The Topbar complements the Sidebar by providing universal actions that remain available throughout the application.

---

# 32. Strategic Vision

The Topbar serves as the global command center of the Iran LMS ecosystem. From search and notifications to AI services, workspace management, and user account controls, every global interaction follows a unified, accessible, and token-driven architecture.

The long-term objective is to evolve the Topbar into an intelligent workspace capable of delivering AI-powered search, personalized shortcuts, real-time collaboration, enterprise controls, and adaptive navigation while preserving simplicity, speed, and consistency.
