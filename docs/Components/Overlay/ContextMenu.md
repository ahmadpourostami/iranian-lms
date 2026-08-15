# Context Menu

**Component:** Overlay
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Context Menu component provides quick access to actions that are directly related to a selected object or interface element.

It appears only when requested by the user, keeping the interface clean while exposing contextual functionality exactly when needed.

---

# 2. Component Type

**Category**

Overlay Component

**Role**

Contextual Action Menu

---

# 3. Usage

The Context Menu component is used for:

* Course Actions
* Lesson Actions
* Student Management
* Instructor Management
* Organization Management
* File Management
* Media Library
* Table Rows
* Tree Views
* Calendar Events
* AI Results
* Dashboard Widgets

Context menus should display only actions that apply to the selected object.

---

# 4. Anatomy

A Context Menu consists of:

```text id="m8q4pk"
Trigger

↓

Context Menu Panel

↓

Action Items

↓

Optional Icons

↓

Optional Submenus

↓

Optional Dividers
```

The menu should appear adjacent to the user's interaction point.

---

# 5. Context Menu Types

Supported types:

```text id="u5r8qc"
Standard

Table Row

File Explorer

Tree View

Calendar

Media

Canvas
```

Each type shares the same interaction principles.

---

# 6. Trigger

Supported triggers:

```text id="k3n7tx"
Right Click

Long Press

Keyboard Menu Key

Shift + F10
```

Desktop systems primarily use right-click.

Mobile devices should use long press.

---

# 7. Action Items

Each menu item may contain:

* Icon
* Label
* Shortcut
* Badge
* Chevron
* Status

Each item represents one contextual action.

---

# 8. Common Actions

Typical actions include:

* Open
* Edit
* Rename
* Duplicate
* Archive
* Download
* Export
* Share
* Move
* Delete

Only actions relevant to the selected item should be displayed.

---

# 9. Destructive Actions

Destructive actions such as:

* Delete
* Remove
* Reset

should be visually distinguished using semantic danger colors.

Confirmation should be required for irreversible actions.

---

# 10. Grouping

Actions may be grouped.

Example:

```text id="r9m2wy"
Open

Edit

Duplicate

----------------

Export

Download

----------------

Delete
```

Groups improve discoverability.

---

# 11. Submenus

Supported nesting:

```text id="y2v8pk"
Maximum Depth

2 Levels
```

Deep submenu hierarchies should be avoided.

---

# 12. Disabled Actions

Unavailable actions should:

* Remain visible.
* Appear disabled.
* Not respond to interaction.

Users should understand that the action exists but is currently unavailable.

---

# 13. Positioning

The Context Menu should:

* Open near the pointer.
* Stay inside the viewport.
* Reposition automatically when needed.

The menu should never overflow the visible screen.

---

# 14. Responsive Behavior

Desktop

* Right-click interaction.

Tablet

* Long press.

Mobile

* Long press.
* Bottom Sheet may replace complex menus.

Touch interactions should remain comfortable.

---

# 15. Accessibility

The Context Menu component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Users who cannot use a mouse should have equivalent access.

---

# 16. Keyboard Interaction

Supported keyboard actions:

* Menu Key → Open
* Shift + F10 → Open
* Arrow Up / Down → Navigate
* Arrow Right → Open Submenu
* Arrow Left → Close Submenu
* Enter → Execute Action
* Escape → Close Menu

Keyboard interaction should match desktop platform conventions.

---

# 17. Animation

Recommended animations:

* Fade
* Scale
* Slide

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 18. Design Tokens

Examples

```text id="t5m7qx"
contextmenu-width

contextmenu-radius

contextmenu-background

contextmenu-shadow

contextmenu-item-height

contextmenu-padding
```

All visual properties should consume Design Tokens.

---

# 19. CSS Variables

Examples

```css id="f8v2kr"
--contextmenu-width
--contextmenu-radius
--contextmenu-bg
--contextmenu-shadow
--contextmenu-item-height
--contextmenu-padding
```

Implementation should remain token-driven.

---

# 20. Do

Recommended practices:

* Display only relevant actions.
* Group related actions.
* Support keyboard access.
* Position near the user's pointer.
* Highlight destructive actions.

---

# 21. Don't

Avoid:

* Showing unrelated commands.
* Very long menus.
* Deep submenu hierarchies.
* Tiny click targets.
* Opening multiple context menus simultaneously.

Context menus should remain fast and task-oriented.

---

# 22. Common Use Cases

Examples include:

* Edit Course
* Delete Lesson
* Download Certificate
* Rename File
* Duplicate Quiz
* Export Report
* Share Link
* Archive Student
* Move Organization
* View Activity

Context menus provide quick access to object-specific operations.

---

# 23. Component Properties (Props)

Typical configurable properties include:

```text id="q3w8pn"
items

position

submenu

disabled

icons

shortcuts

animation

maxHeight

autoClose
```

Additional properties may be introduced while preserving backward compatibility.

---

# 24. Future Expansion

Future enhancements may include:

* AI Suggested Actions
* Predictive Menus
* Smart Context Detection
* Collaborative Context Actions
* Workspace Customization
* Voice Commands

Future capabilities should extend the existing architecture.

---

# 25. Related Components

This component integrates with:

* Menu
* Dropdown
* Popover
* Tooltip
* Button
* Table
* Tree View
* File Explorer

Together they provide contextual interaction patterns throughout the platform.

---

# 26. Design Principles

The Context Menu component should always remain:

* Context-Aware
* Accessible
* Responsive
* Efficient
* Minimal
* Predictable

Users should immediately find the actions most relevant to the selected object.

---

# 27. Design Decision

Iran LMS follows a **Contextual Action Architecture**.

```text id="h6n4rv"
User Selection

↓

Context Menu

↓

Relevant Actions

↓

Command Execution
```

The Context Menu exposes functionality only when appropriate, reducing interface complexity while improving productivity.

---

# 28. Strategic Vision

The Context Menu component delivers fast, object-specific interactions across the Iran LMS ecosystem. Whether managing courses, lessons, students, organizations, media, reports, AI-generated content, or administrative records, every context menu follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Context Menu into an intelligent action system capable of supporting AI-recommended commands, adaptive workflows, enterprise customization, and personalized productivity tools while maintaining speed, precision, and usability.
