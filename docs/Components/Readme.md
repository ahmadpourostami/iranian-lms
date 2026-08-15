# 06-Components

## Component Library

**Project:** Iran LMS
**Platform:** WordPress
**Type:** LMS Plugin
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The `06-Components` directory defines the reusable UI components used by the Iran LMS WordPress LMS Plugin.

Components are the building blocks of the plugin interface and provide a consistent structure for:

* Student Experience
* Instructor Experience
* Administrator Experience
* Course Management
* Learning Experience
* Assessments
* Certificates
* Notifications
* Reports
* Settings
* Modular Features

The component system must remain reusable, accessible, RTL-ready, responsive, and independent from any specific WordPress Theme.

---

# 2. Core Principle

Iran LMS is a **WordPress LMS Plugin**, not a standalone SaaS application.

Therefore:

```text
WordPress
    ↓
Iran LMS Plugin
    ↓
UI Components
    ↓
Theme Integration
```

The plugin provides the **functionality, structure, states, and component behavior**.

The active WordPress Theme provides the final visual environment and branding.

---

# 3. Component Philosophy

Every component should follow these principles:

```text
Reusable

↓

Composable

↓

Theme Independent

↓

WordPress Compatible

↓

RTL First

↓

Accessible

↓

Responsive

↓

Token Driven
```

Components should not be created specifically for a single page when the same UI pattern can be reused elsewhere.

---

# 4. Plugin vs Theme Responsibility

The separation between Plugin and Theme is critical.

## Plugin Responsibilities

The Iran LMS Plugin owns:

* Component structure
* Component behavior
* Component states
* LMS-specific interactions
* Accessibility behavior
* Data rendering
* Validation states
* Loading states
* Error states
* Empty states
* Responsive behavior
* RTL behavior
* JavaScript interactions
* WordPress integration

## Theme Responsibilities

The Theme may control:

* Branding
* Global typography
* Brand colors
* Visual identity
* Layout context
* Page composition
* Theme-specific styling
* Header
* Footer
* Marketing sections

The plugin must not assume that a specific Theme is installed.

---

# 5. WordPress Compatibility

Components must work within the WordPress ecosystem.

Potential rendering contexts include:

```text
Frontend

WordPress Dashboard

Plugin Admin Pages

Shortcodes

Blocks

Widgets

Template Parts

AJAX Responses

REST API Responses
```

A component should not depend on a custom application runtime.

---

# 6. LMS Context

Components should be designed around actual LMS entities.

Examples:

```text
Course

Lesson

Chapter

Instructor

Student

Enrollment

Assignment

Quiz

Question

Grade

Certificate

Notification

Payment

Live Class

Attendance

Comment

Media
```

The component library should provide reusable UI primitives for these entities without coupling the UI component to a single business module.

---

# 7. Component Categories

The library is organized into logical categories.

```text
06-Components/
│
├── README.md
│
├── Core/
│
├── Navigation/
│
├── Data/
│
├── Overlay/
│
├── Feedback/
│
├── Media/
│
└── Form/
```

Additional categories may be introduced when the library grows.

---

# 8. Core Components

Core components provide the smallest reusable building blocks.

Examples:

```text
Button
Input
Textarea
Select
Checkbox
Switch
Badge
Avatar
Chip
Divider
Icon
Tooltip
Progress
Spinner
```

These components should have minimal LMS-specific assumptions.

---

# 9. Navigation Components

Navigation components define movement through the LMS interface.

Examples:

```text
Sidebar
Topbar
BottomNavigation
Breadcrumb
Tabs
Pagination
Menu
Stepper
```

Navigation components should support:

* RTL
* Responsive behavior
* Keyboard navigation
* Active states
* Disabled states
* Mobile layouts

---

# 10. Data Components

Data components present structured LMS information.

Examples:

```text
Card
Table
Chart
Timeline
List
EmptyState
```

They may be used for:

* Courses
* Students
* Instructors
* Grades
* Assignments
* Reports
* Activities

---

# 11. Overlay Components

Overlay components appear above the current interface.

Examples:

```text
Modal
Drawer
Popover
Dropdown
ContextMenu
Dialog
```

They must provide predictable layering, focus management, keyboard behavior, and responsive handling.

---

# 12. Feedback Components

Feedback components communicate system state or user-facing events.

Examples:

```text
Alert
Toast
Snackbar
Skeleton
Loader
Notification
```

The components have different responsibilities and should not be treated as interchangeable.

```text
Toast

Temporary system feedback
```

```text
Snackbar

Action-oriented temporary feedback
```

```text
Notification

Persistent user communication
```

```text
Skeleton

Content loading placeholder
```

```text
Loader

Active processing state
```

```text
Alert

Visible contextual message
```

---

# 13. Media Components

Media components handle visual and multimedia content.

Examples:

```text
Image
Video
Audio
File
MediaPicker
```

Media components should integrate with WordPress media capabilities where appropriate.

For example, image selection may use the WordPress Media Library rather than introducing a completely independent media-management system.

---

# 14. Component Structure

Every component document should describe the component using a consistent structure.

Recommended structure:

```text
Purpose

Component Type

WordPress Context

LMS Use Cases

Anatomy

Variants

States

Behavior

Responsive Behavior

RTL Behavior

Accessibility

Design Tokens

WordPress Integration

Implementation Notes

Do / Don't

Related Components

Future Expansion
```

Not every component requires every section, but the component documentation should remain consistent.

---

# 15. Component States

Components should explicitly define their states.

Common states:

```text
Default

Hover

Focus

Active

Selected

Disabled

Loading

Success

Error

Empty

Readonly
```

Only applicable states should be implemented.

---

# 16. State Consistency

The same state should behave consistently across the component library.

For example:

```text
Disabled Button
```

should use the same semantic disabled behavior wherever it appears.

Similarly:

```text
Loading

Error

Focus

Selected
```

should follow shared Design Tokens and accessibility rules.

---

# 17. Design Tokens

Components must consume the project's Design Token system.

Components should not hard-code global design decisions unnecessarily.

Examples:

```text
color

spacing

radius

typography

shadow

border

transition

z-index
```

The source of truth for tokens is defined in:

```text
05-UI/28-Design-Tokens.md
```

---

# 18. Theme Integration

Components should allow Theme-level customization without requiring component rewrites.

Recommended architecture:

```text
Component Structure

↓

Semantic Classes / Attributes

↓

Design Tokens

↓

Theme Styling

↓

Final UI
```

The plugin should avoid assuming that every Theme uses the same visual language.

---

# 19. CSS Architecture

Component styles should be:

* Scoped
* Predictable
* Token-driven
* RTL-compatible
* Responsive
* Maintainable

Avoid global selectors that may unexpectedly modify WordPress or Theme styles.

Avoid:

```css
button {
    ...
}
```

Prefer component-scoped selectors such as:

```css
.iran-lms-button {
    ...
}
```

The actual naming convention should follow the project's CSS architecture standard.

---

# 20. JavaScript Architecture

JavaScript behavior should remain component-oriented.

A component may define:

```text
Initialization

Events

State Changes

Async Operations

Accessibility Behavior

Cleanup
```

JavaScript should not assume that a specific Theme or page exists.

---

# 21. PHP Integration

Where server-side rendering is required, components should be compatible with WordPress PHP architecture.

Potential patterns include:

```text
PHP Template

Template Part

Render Function

Shortcode

Block

Admin Page

REST Response
```

Business logic should not be embedded directly inside presentation markup.

---

# 22. WordPress Data

Components may receive WordPress-specific data such as:

```text
Post ID

User ID

Attachment ID

Taxonomy ID

Meta Value

URL

Nonce

Capability

Status
```

However, components should receive prepared data whenever possible rather than directly querying the database.

---

# 23. Security

Components must respect WordPress security practices.

Relevant concerns include:

* Escaping Output
* Sanitizing Input
* Nonces
* Capability Checks
* Safe URLs
* Safe HTML
* Safe Attributes

UI components must never bypass WordPress security mechanisms for convenience.

---

# 24. Accessibility

All components should follow:

* WCAG 2.2 AA
* Keyboard Navigation
* Visible Focus
* Semantic HTML
* Screen Reader Support
* Reduced Motion
* Sufficient Contrast
* Accessible Names

Accessibility is a component requirement, not an optional enhancement.

---

# 25. RTL First

Iran LMS is a Persian-first LMS.

Components must support RTL from the beginning.

RTL considerations include:

```text
Text Alignment

Icon Position

Spacing

Margins

Padding

Navigation Direction

Dropdown Position

Animations

Progress Direction
```

Do not create an LTR component first and attempt to patch RTL later.

---

# 26. Responsive Design

Components should work across:

```text
Desktop

Tablet

Mobile
```

Responsive behavior should be documented per component when it differs from the standard Responsive System.

The source of truth for responsive behavior is:

```text
05-UI/21-Responsive.md
05-UI/20-Mobile.md
```

---

# 27. Dark Mode

Components must support the project's Dark Mode strategy when applicable.

The component should consume semantic tokens rather than hard-coding light-mode colors.

Source of truth:

```text
05-UI/19-Dark-Mode.md
```

---

# 28. Loading Architecture

Loading behavior should be selected according to context.

```text
Known Content Structure
        ↓
Skeleton
```

```text
Active Local Operation
        ↓
Spinner
```

```text
Long Processing Operation
        ↓
Loader / Progress
```

This prevents unnecessary or confusing loading indicators.

---

# 29. Empty States

Empty states should be represented using the shared `EmptyState` component.

Example:

```text
No Courses

↓

EmptyState

↓

Optional CTA
```

Components should not independently invent empty-state layouts.

---

# 30. Error States

Errors should follow the shared Feedback system.

Example:

```text
Request Failed

↓

Alert / Error State

↓

Retry
```

Error handling should remain consistent throughout the plugin.

---

# 31. Modular Architecture

Iran LMS contains optional modules.

Examples include:

```text
WooCommerce

Certificate

Wallet

SMS

Gamification

Attendance

Homework

Survey

Forum

SpotPlayer

SkyRoom
```

These modules may be enabled or disabled.

The UI must support this architecture.

Disabled modules must disappear without breaking layouts.

---

# 32. Component Composition

Components should be composable.

Example:

```text
Course Card
│
├── Image
├── Badge
├── Icon
├── Title
├── Avatar
├── Progress
└── Button
```

Complex UI should be built from smaller reusable components rather than duplicated markup.

---

# 33. Component Independence

A component should not know unnecessary details about its parent.

For example:

```text
Button
```

should not know whether it is being used inside:

```text
Course

Assignment

Quiz

Certificate

Dashboard
```

The parent determines the context.

---

# 34. Component Naming

Component names should be:

* Clear
* Consistent
* Semantic
* Reusable

Examples:

```text
Button
Input
Card
Table
Modal
Toast
Notification
Image
```

Avoid names tied to a single page.

Prefer:

```text
CourseCard
```

only when the component contains genuinely course-specific structure.

Use:

```text
Card
```

when the structure is generic.

---

# 35. Component Documentation

Every component document should answer:

```text
What is it?

When should it be used?

Where is it used?

What states does it have?

How does it behave?

How does it work in RTL?

How does it behave on mobile?

How is it styled?

How does it integrate with WordPress?

What should developers avoid?
```

Documentation should be implementation-oriented rather than purely visual.

---

# 36. Component API

Interactive components should define their public API.

Typical properties may include:

```text
variant

size

state

disabled

loading

label

icon

action
```

The exact API belongs to each component.

Do not introduce unnecessary properties.

---

# 37. Extensibility

Components should allow controlled extension.

Possible extension mechanisms include:

```text
CSS Customization

Design Tokens

WordPress Hooks

WordPress Filters

Component Variants

Theme Overrides
```

Extension points should be documented when officially supported.

---

# 38. Backward Compatibility

Once a component API becomes part of the plugin architecture:

* Avoid unnecessary breaking changes.
* Deprecate before removing.
* Preserve existing variants where possible.
* Document migration paths.

This is especially important for a plugin distributed to external WordPress sites.

---

# 39. Performance

Components should avoid unnecessary overhead.

Consider:

* Minimal JavaScript
* Efficient DOM
* Lazy loading where appropriate
* Avoiding unnecessary re-renders
* Optimized assets
* Scoped CSS
* Conditional module loading

The component system must remain practical for WordPress hosting environments.

---

# 40. WordPress Admin Compatibility

Components used inside WordPress Admin must respect the WordPress admin environment.

Avoid globally overriding:

```text
WordPress Buttons

WordPress Forms

WordPress Tables

WordPress Navigation
```

Admin components should be appropriately scoped to the Iran LMS plugin.

---

# 41. Frontend Compatibility

Frontend components should coexist with the active WordPress Theme.

The plugin should avoid:

* Resetting the entire page
* Overwriting Theme typography globally
* Overwriting Theme buttons globally
* Assuming a specific CSS framework
* Depending on Theme-specific classes

---

# 42. Testing

Components should be tested for:

```text
Desktop

Mobile

RTL

LTR where required

Light Mode

Dark Mode

Keyboard

Screen Reader

Loading

Error

Empty

Disabled
```

Interactive components should also be tested for user interaction and state transitions.

---

# 43. Component Library Roadmap

The component library may evolve through:

```text
Phase 1

Core Components

↓

Phase 2

Navigation + Data

↓

Phase 3

Overlay + Feedback

↓

Phase 4

Media + Advanced Components

↓

Phase 5

Reusable LMS Patterns
```

The component library should grow based on actual product requirements.

---

# 44. Relationship With UI Documentation

The Component Library depends on the broader UI system.

```text
05-UI/
│
├── Design Principles
├── Design System
├── Color System
├── Typography
├── Spacing
├── Grid
├── Accessibility
├── Dark Mode
├── Mobile
├── Responsive
├── Animation
├── RTL
└── Design Tokens
        ↓
06-Components/
        ↓
Reusable UI Components
```

The UI documentation defines the rules.

The Component Library implements those rules.

---

# 45. Source of Truth

When conflicts occur, use this hierarchy:

```text
Product Architecture
        ↓
UI Design System
        ↓
Design Tokens
        ↓
Component Rules
        ↓
Page-Specific Implementation
```

A page-specific implementation must not silently redefine a global component rule.

---

# 46. Current Component Structure

The current library includes:

```text
06-Components/
│
├── README.md
│
├── Core/
│   ├── Button.md
│   ├── Input.md
│   ├── Textarea.md
│   ├── Select.md
│   ├── Checkbox.md
│   ├── Switch.md
│   ├── Badge.md
│   ├── Avatar.md
│   ├── Chip.md
│   ├── Divider.md
│   ├── Icon.md
│   ├── Tooltip.md
│   ├── Progress.md
│   └── Spinner.md
│
├── Navigation/
│   ├── Sidebar.md
│   ├── Topbar.md
│   ├── BottomNavigation.md
│   ├── Breadcrumb.md
│   ├── Tabs.md
│   ├── Pagination.md
│   ├── Menu.md
│   └── Stepper.md
│
├── Data/
│   ├── Card.md
│   ├── Table.md
│   ├── Chart.md
│   ├── Timeline.md
│   ├── List.md
│   └── EmptyState.md
│
├── Overlay/
│   ├── Modal.md
│   ├── Drawer.md
│   ├── Popover.md
│   ├── Dropdown.md
│   ├── ContextMenu.md
│   └── Dialog.md
│
├── Feedback/
│   ├── Alert.md
│   ├── Toast.md
│   ├── Snackbar.md
│   ├── Skeleton.md
│   ├── Loader.md
│   └── Notification.md
│
└── Media/
    └── Image.md
```

This structure may evolve as new LMS requirements are introduced.

---

# 47. Recommended Future Components

Potential future additions include:

```text
Form/
    FormField
    FormGroup
    FormError

Media/
    Video
    Audio
    File
    MediaPicker
    Gallery

Feedback/
    Progress
    Confirm

Data/
    StatCard
    DataGrid
    FilterBar

LMS/
    CourseCard
    LessonItem
    InstructorCard
    AssignmentItem
    QuizCard
    CertificateCard
```

LMS-specific components should only be introduced when generic components are no longer sufficient.

---

# 48. Design Decision

Iran LMS follows a:

**WordPress-Compatible, Theme-Independent, Component-Based UI Architecture.**

```text
WordPress
    │
    ▼
Iran LMS Plugin
    │
    ├── Business Logic
    ├── LMS Modules
    ├── Data
    ├── API
    │
    ▼
Component Library
    │
    ├── Core
    ├── Navigation
    ├── Data
    ├── Overlay
    ├── Feedback
    └── Media
    │
    ▼
Theme Integration
    │
    ▼
Final User Interface
```

The component library is therefore a bridge between the LMS functionality and the visual environment of the active WordPress Theme.

---

# 49. Strategic Vision

The Iran LMS Component Library is intended to become the reusable UI foundation of the plugin.

It should allow the LMS to provide a consistent experience across:

* Student Dashboard
* Instructor Dashboard
* Course Pages
* Lesson Player
* Assignments
* Exams
* Grades
* Certificates
* Notifications
* Profile
* Settings
* Admin Management
* Future Mobile/Web Applications

The architecture must remain independent enough that the same LMS functionality can be used with different WordPress Themes without rebuilding the entire interface.

The long-term goal is a **stable, extensible, WordPress-native component architecture** that can evolve alongside the Iran LMS plugin while preserving backward compatibility, accessibility, RTL support, responsive behavior, modularity, and theme independence.
