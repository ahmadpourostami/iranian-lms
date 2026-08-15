# Popover

**Component:** Overlay
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Popover component displays contextual information, controls, or lightweight interactions anchored to a specific UI element without interrupting the user's workflow.

Unlike a Modal, a Popover is non-blocking and intended for short interactions.

---

# 2. Component Type

**Category**

Overlay Component

**Role**

Contextual Overlay

---

# 3. Usage

The Popover component is used for:

* Quick Actions
* User Information
* Course Preview
* Emoji Picker
* Date Picker
* Color Picker
* Quick Filters
* AI Suggestions
* Calendar Events
* Help Information
* Mini Forms
* Shortcut Menus

Popovers should provide contextual interactions while preserving the current page.

---

# 4. Anatomy

A Popover consists of:

```text id="m7q4pk"
Anchor Element

↓

Popover Container

↓

Arrow (Optional)

↓

Header (Optional)

↓

Content

↓

Footer (Optional)
```

The Popover should remain visually connected to its triggering element.

---

# 5. Popover Types

Supported types:

```text id="u5r8qc"
Information

Action Menu

Quick Form

Preview

Rich Content

Interactive
```

Interactive Popovers may contain forms or small controls.

---

# 6. Sizes

Supported sizes:

```text id="k3n7tx"
Small

Medium

Large
```

Popover size should remain appropriate for its content.

---

# 7. Placement

Supported positions:

```text id="r9m2wy"
Top

Bottom

Left

Right

Top Start

Top End

Bottom Start

Bottom End
```

Placement should automatically adapt to available viewport space.

---

# 8. Header

Optional header content:

* Title
* Status Badge
* Close Button

Headers are recommended only for complex popovers.

---

# 9. Content

Popover content may include:

* Text
* Buttons
* Icons
* Links
* Forms
* Lists
* Mini Tables
* Quick Settings

Content should remain concise and task-focused.

---

# 10. Footer

Optional footer actions:

* Save
* Apply
* Cancel
* Close

Footers should only appear when user actions are required.

---

# 11. Arrow

The Popover arrow visually connects the overlay to its anchor.

The arrow should automatically reposition when placement changes.

---

# 12. Opening Behavior

Supported triggers:

* Click
* Hover
* Focus
* Long Press (Mobile)

The chosen trigger should match the interaction pattern.

---

# 13. Closing Behavior

Supported closing methods:

* Click Outside
* Escape Key
* Close Button
* Action Completion
* Anchor Toggle

The Popover should close immediately when it is no longer relevant.

---

# 14. Interactive Popovers

Interactive Popovers may include:

* Text Inputs
* Switches
* Checkboxes
* Date Pickers
* Color Pickers
* AI Prompts

Complex workflows should use a Modal instead.

---

# 15. Positioning

The Popover should:

* Stay attached to its anchor.
* Reposition when the viewport changes.
* Avoid clipping outside the screen.

Automatic collision detection is required.

---

# 16. Responsive Behavior

Desktop

* Floating overlay.

Tablet

* Larger touch targets.

Mobile

* Bottom Sheet or Fullscreen replacement when appropriate.

Small popovers should not become unusable on touch devices.

---

# 17. Accessibility

The Popover component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Interactive popovers should receive keyboard focus when opened.

---

# 18. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate controls
* Shift + Tab → Reverse navigation
* Enter → Activate controls
* Escape → Close Popover

Keyboard users should easily exit the Popover.

---

# 19. Animation

Recommended animations:

* Fade
* Scale
* Slide
* Opacity Transition

Animations should remain subtle and respect the user's **Reduced Motion** preference.

---

# 20. Design Tokens

Examples

```text id="t5m7qx"
popover-width

popover-radius

popover-background

popover-shadow

popover-padding

popover-arrow-size
```

All visual properties should consume Design Tokens.

---

# 21. CSS Variables

Examples

```css id="f8v2kr"
--popover-width
--popover-radius
--popover-bg
--popover-shadow
--popover-padding
--popover-arrow-size
```

Implementation should remain token-driven.

---

# 22. Do

Recommended practices:

* Keep content concise.
* Position near the triggering element.
* Close automatically when appropriate.
* Support keyboard interaction.
* Use Popovers for lightweight tasks.

---

# 23. Don't

Avoid:

* Long forms.
* Multi-step workflows.
* Large tables.
* Deep navigation.
* Blocking user interaction.

For complex interactions, use a Drawer or Modal instead.

---

# 24. Common Use Cases

Examples include:

* User Profile Preview
* Course Quick View
* AI Suggestions
* Quick Filters
* Date Picker
* Color Picker
* Emoji Picker
* Calendar Events
* Help Information
* Inline Actions

Popovers provide contextual interactions with minimal disruption.

---

# 25. Component Properties (Props)

Typical configurable properties include:

```text id="q3w8pn"
placement

trigger

size

arrow

interactive

dismissible

offset

animation

content

header
```

Additional properties may be introduced while preserving backward compatibility.

---

# 26. Future Expansion

Future enhancements may include:

* AI Context Popovers
* Smart Positioning
* Collaborative Comments
* Multi-Anchor Popovers
* Voice Assistance
* Context-Aware Suggestions

Future capabilities should extend the existing architecture.

---

# 27. Related Components

This component integrates with:

* Tooltip
* Modal
* Drawer
* Menu
* Button
* Form
* Date Picker
* Color Picker

Together they provide layered contextual interactions.

---

# 28. Design Principles

The Popover component should always remain:

* Lightweight
* Contextual
* Accessible
* Responsive
* Non-Blocking
* Efficient

Users should access additional information or actions without leaving their current workflow.

---

# 29. Design Decision

Iran LMS follows a **Contextual Overlay Architecture**.

```text id="h6n4rv"
Anchor Element

↓

Popover

↓

Quick Interaction

↓

Continue Workflow
```

Popovers extend the interface with contextual information while preserving user focus.

---

# 30. Strategic Vision

The Popover component provides lightweight contextual interactions across the Iran LMS ecosystem. Whether previewing users, displaying AI suggestions, selecting dates, applying filters, or configuring quick settings, every popover follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Popover into an intelligent contextual assistant capable of supporting AI-powered recommendations, adaptive positioning, collaborative interactions, and personalized workflows while maintaining speed, clarity, and usability.
