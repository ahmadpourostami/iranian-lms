# Dropdown

**Component:** Overlay
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Dropdown component displays a list of selectable options, actions, or values anchored to a trigger element.

Dropdowns provide quick access to choices while keeping the interface clean and minimizing occupied screen space.

---

# 2. Component Type

**Category**

Overlay Component

**Role**

Selection & Action Overlay

---

# 3. Usage

The Dropdown component is used for:

* Select Inputs
* User Profile Actions
* Language Selection
* Theme Selection
* Course Categories
* Organization Switcher
* Workspace Selector
* Sorting Options
* Filter Options
* Quick Actions

Dropdowns should present a manageable number of options for quick selection.

---

# 4. Anatomy

A Dropdown consists of:

```text id="m7k4pq"
Trigger

↓

Dropdown Panel

↓

Option List

↓

Optional Groups

↓

Optional Search

↓

Optional Footer
```

The dropdown should always remain visually connected to its trigger.

---

# 5. Dropdown Types

Supported dropdown types:

```text id="u5r8qc"
Standard

Searchable

Multi Select

Grouped

Icon Dropdown

Action Dropdown

Async Dropdown
```

The Standard Dropdown is recommended for simple selections.

---

# 6. Sizes

Supported sizes:

```text id="k3n7tx"
Small

Medium

Large
```

Medium should be the default size across Iran LMS.

---

# 7. Trigger

The trigger may include:

* Label
* Selected Value
* Placeholder
* Icon
* Chevron

The current selection should always be visible.

---

# 8. Option Item

Each option may contain:

* Label
* Icon
* Avatar
* Description
* Badge
* Shortcut

Options should remain easy to scan.

---

# 9. Selection Modes

Supported selection modes:

```text id="r8m2wy"
Single Select

Multi Select
```

Multi-select dropdowns should include checkboxes.

---

# 10. Grouped Options

Options may be grouped.

Example:

```text id="y2v8pk"
Frontend

• HTML

• CSS

• JavaScript

----------------

Backend

• PHP

• Node.js
```

Groups improve navigation in larger datasets.

---

# 11. Searchable Dropdown

Search should be enabled when:

* More than 10 options exist.
* Users frequently search for values.
* The dataset is dynamic.

Search results should update immediately.

---

# 12. Async Loading

Dropdowns may load options from an API.

During loading:

* Display Spinner
* Preserve layout
* Disable selection until data is available

---

# 13. Empty State

When no options exist:

Display:

```text id="p4k9mc"
No options available.
```

An optional action may allow users to create a new item.

---

# 14. Disabled Options

Individual options may be disabled.

Disabled options should:

* Remain visible.
* Not be selectable.
* Clearly communicate their unavailable state.

---

# 15. Positioning

Supported placements:

```text id="v7q2ma"
Bottom

Top

Bottom Start

Bottom End

Top Start

Top End
```

The dropdown should automatically reposition when space is limited.

---

# 16. Scrolling

Long dropdowns should:

* Support internal scrolling.
* Preserve keyboard navigation.
* Display a maximum height.

The page behind the dropdown should remain scrollable.

---

# 17. Responsive Behavior

Desktop

* Floating panel.

Tablet

* Larger touch targets.

Mobile

* Bottom Sheet for large datasets.
* Fullscreen selector when appropriate.

Dropdowns should remain easy to operate on touch devices.

---

# 18. Accessibility

The Dropdown component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Selected values should be announced by assistive technologies.

---

# 19. Keyboard Interaction

Supported keyboard actions:

* Enter / Space → Open Dropdown
* Arrow Up / Down → Navigate options
* Enter → Select option
* Escape → Close Dropdown
* Tab → Move focus

Keyboard interaction should follow platform conventions.

---

# 20. Animation

Recommended animations:

* Fade
* Slide
* Scale

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 21. Design Tokens

Examples

```text id="t5m7qx"
dropdown-width

dropdown-radius

dropdown-background

dropdown-shadow

dropdown-item-height

dropdown-padding
```

All visual properties should consume Design Tokens.

---

# 22. CSS Variables

Examples

```css id="f8v2kr"
--dropdown-width
--dropdown-radius
--dropdown-bg
--dropdown-shadow
--dropdown-item-height
--dropdown-padding
```

Implementation should remain token-driven.

---

# 23. Do

Recommended practices:

* Keep option labels concise.
* Enable search for large datasets.
* Highlight the selected option.
* Support keyboard navigation.
* Automatically reposition when necessary.

---

# 24. Don't

Avoid:

* Very long option labels.
* Hundreds of visible options without search.
* Deep nested hierarchies.
* Tiny click targets.
* Complex forms inside dropdowns.

Use a Drawer or Modal for advanced interactions.

---

# 25. Common Use Cases

Examples include:

* Course Category
* Instructor Selection
* Language Switcher
* Organization Selector
* Workspace Selector
* Theme Selection
* Sort By
* Filter Options
* User Menu
* Status Selection

Dropdowns provide efficient access to selectable options.

---

# 26. Component Properties (Props)

Typical configurable properties include:

```text id="q3w8pn"
options

value

placeholder

searchable

multiple

grouped

disabled

loading

placement

animation

maxHeight
```

Additional properties may be introduced while preserving backward compatibility.

---

# 27. Future Expansion

Future enhancements may include:

* AI Recommended Options
* Smart Search
* Virtualized Dropdown
* Voice Search
* Dynamic Option Loading
* Collaborative Selection

Future capabilities should extend the existing architecture.

---

# 28. Related Components

This component integrates with:

* Select
* Popover
* Menu
* Checkbox
* Avatar
* Badge
* Spinner
* Search
* Form

Together they provide flexible selection experiences across the platform.

---

# 29. Design Principles

The Dropdown component should always remain:

* Simple
* Accessible
* Responsive
* Efficient
* Searchable
* Consistent

Users should quickly find and select the desired option with minimal effort.

---

# 30. Design Decision

Iran LMS follows a **Progressive Selection Architecture**.

```text id="h6n4rv"
Trigger

↓

Dropdown

↓

Option Selection

↓

Value Applied
```

Dropdowns expose choices only when needed, reducing visual clutter while preserving discoverability.

---

# 31. Strategic Vision

The Dropdown component provides a unified selection experience across the Iran LMS ecosystem. Whether selecting courses, instructors, organizations, AI models, languages, themes, or filters, every dropdown follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Dropdown into an intelligent selection system capable of supporting AI-assisted recommendations, adaptive search, virtualization, enterprise-scale datasets, and personalized workflows while maintaining speed, usability, and consistency.
