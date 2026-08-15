# Buttons

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Button component used throughout the Iran LMS platform.

Buttons represent the primary interaction mechanism between users and the system.

Every actionable operation should use standardized button components.

---

# 2. Goals

The Button System should be:

* Consistent
* Accessible
* Predictable
* Reusable
* Responsive
* Themeable

Buttons should clearly communicate available actions.

---

# 3. Design Philosophy

Buttons indicate intention.

Users should immediately recognize:

* What the action does
* How important it is
* Whether it is currently available

Buttons should attract attention only when necessary.

---

# 4. Button Architecture

The Button component consists of:

```text id="4z9a3h"
Button

↓

Variant

↓

Size

↓

State

↓

Content

↓

Action
```

Each layer has a single responsibility.

---

# 5. Button Variants

Supported variants

```text id="lvd8qi"
Primary

Secondary

Outline

Ghost

Danger

Success

Link
```

Each variant communicates a different action priority.

---

# 6. Primary Button

Primary buttons represent the main action on a page.

Examples

* Save
* Continue
* Purchase
* Enroll
* Submit

Only one primary button should exist within the same action group whenever possible.

---

# 7. Secondary Button

Secondary buttons represent alternative actions.

Examples

* Cancel
* Back
* Preview
* Edit

Secondary actions should never visually compete with the primary action.

---

# 8. Outline Button

Outline buttons indicate lower visual emphasis while remaining interactive.

Typical usage includes:

* Filters
* Optional Actions
* Configuration
* Management Screens

---

# 9. Ghost Button

Ghost buttons minimize visual weight.

Typical usage

* Toolbars
* Inline Actions
* Card Actions
* Navigation Utilities

Ghost buttons should not be used for destructive actions.

---

# 10. Danger Button

Danger buttons represent irreversible operations.

Examples

* Delete
* Remove
* Archive
* Reset

Danger buttons should usually require confirmation before execution.

---

# 11. Success Button

Success variants are reserved for positive workflows.

Examples

* Approve
* Publish
* Complete
* Confirm

They should be used sparingly.

---

# 12. Link Button

Link buttons behave like text while triggering actions.

Typical usage includes:

* Learn More
* View Details
* Open History
* Documentation

They should remain visually distinct from normal hyperlinks.

---

# 13. Button Sizes

Supported sizes

```text id="6ikufl"
XS

SM

MD

LG

XL
```

Custom sizes should be avoided.

---

# 14. Button Width

Supported layouts

* Auto Width
* Full Width
* Fixed Width (Rare)

Buttons should not stretch unnecessarily.

---

# 15. Button Content

Buttons may contain:

* Text
* Icon
* Text + Icon
* Loading Indicator

Content should remain concise.

---

# 16. Icon Buttons

Icon-only buttons should be reserved for universally understood actions.

Examples

* Search
* Close
* Settings
* Favorite

Every icon button must include an accessible label.

---

# 17. Button States

Every button supports:

```text id="q3sqte"
Default

Hover

Active

Focus

Disabled

Loading
```

State transitions should remain consistent across the platform.

---

# 18. Loading State

While processing:

* Show loading indicator
* Prevent repeated clicks
* Preserve button width
* Maintain layout stability

Users should immediately know the action is in progress.

---

# 19. Disabled State

Disabled buttons indicate unavailable actions.

Disabled controls should clearly communicate why the action is unavailable whenever possible.

---

# 20. Button Groups

Multiple related actions may be grouped together.

Examples

* Save / Cancel
* Previous / Next
* Approve / Reject

Groups should maintain consistent spacing and hierarchy.

---

# 21. Responsive Behavior

Buttons adapt to:

* Desktop
* Tablet
* Mobile

On smaller screens:

* Touch targets become larger
* Full-width buttons may be preferred
* Button groups may stack vertically

---

# 22. Accessibility

Buttons must support:

* Keyboard Navigation
* Focus Indicators
* Screen Readers
* Sufficient Contrast
* Minimum Touch Target Size

Buttons should comply with WCAG 2.2 AA.

---

# 23. Design Tokens

Examples

```text id="l7z9r2"
button-height

button-radius

button-padding

button-gap

button-font

button-shadow
```

Buttons should consume design tokens rather than fixed values.

---

# 24. CSS Variables

Examples

```css id="jlwm10"
--button-height
--button-radius
--button-padding
--button-gap
--button-font-size
--button-transition
```

Implementation should rely on reusable variables.

---

# 25. Usage Guidelines

Buttons should:

* Use action-oriented labels
* Clearly indicate outcomes
* Avoid ambiguous wording
* Maintain visual hierarchy

Preferred labels:

* Save
* Continue
* Publish
* Enroll
* Complete

Avoid generic labels like:

* OK
* Click Here
* Submit (when a more specific label is possible)

---

# 26. Future Expansion

The Button System supports:

* Dark Mode
* White Label Themes
* Mobile Applications
* Loading Animations
* Split Buttons
* Dropdown Buttons

Future variants should inherit the same interaction model.

---

# 27. Design Principles

Buttons should always remain:

* Clear
* Predictable
* Consistent
* Accessible
* Minimal
* Action-Oriented

The importance of an action should be reflected by its visual emphasis.

---

# 28. Design Decision

Iran LMS follows a **Semantic Button Architecture**.

```text id="2gfjlwm"
Action Priority

↓

Button Variant

↓

Button Size

↓

Button State

↓

UI Component

↓

Business Action
```

Business modules define the action, while the Design System determines how that action is presented.

---

# 29. Strategic Vision

The Button System serves as the primary interaction foundation of the Iran LMS ecosystem.

By standardizing variants, sizes, states, accessibility, and responsive behavior, every product—from the LMS plugin and WordPress theme to the administration panel and future mobile applications—delivers a consistent and intuitive interaction experience.

Buttons should make user actions obvious, reliable, and effortless while keeping the learner focused on the educational journey rather than the interface itself.
