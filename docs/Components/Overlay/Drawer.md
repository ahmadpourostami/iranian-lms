# Drawer

**Component:** Overlay
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Drawer component presents secondary content, navigation, or workflows in a sliding panel that appears from the edge of the screen without completely replacing the current page.

Drawers allow users to complete supporting tasks while preserving context.

---

# 2. Component Type

**Category**

Overlay Component

**Role**

Contextual Side Panel

---

# 3. Usage

The Drawer component is used for:

* Course Details Preview
* Student Profile
* Instructor Profile
* Filters
* Notifications Center
* AI Assistant
* Activity Timeline
* Shopping Cart
* Course Curriculum
* Settings Panel
* Organization Details
* Quick Create Forms

Drawers should be used when users need additional information without navigating away from the current page.

---

# 4. Anatomy

A Drawer consists of:

```text id="p7k4mr"
Backdrop (Optional)

↓

Drawer Panel

↓

Header

↓

Body

↓

Footer (Optional)

↓

Close Button
```

The Drawer slides into view while the current page remains visible.

---

# 5. Drawer Types

Supported drawer types:

```text id="m3v8qt"
Left Drawer

Right Drawer

Bottom Drawer

Fullscreen Drawer

Mini Drawer

Persistent Drawer
```

For RTL layouts, the primary contextual drawer should open from the **left**, while navigation drawers typically open from the **right**.

---

# 6. Sizes

Supported sizes:

```text id="u5r2wc"
Small

Medium

Large

Extra Large

Fullscreen
```

Recommended widths:

```text id="k9n6px"
Small

360px

Medium

480px

Large

640px

Extra Large

800px
```

---

# 7. Header

The header may contain:

* Title
* Subtitle
* Status Badge
* Close Button
* Optional Actions

The title should clearly describe the drawer content.

---

# 8. Body

The body may contain:

* Forms
* Lists
* Tables
* Cards
* Charts
* Timeline
* Tabs
* AI Responses
* Activity Feed

The body should support independent scrolling.

---

# 9. Footer

Optional footer actions include:

* Save
* Cancel
* Continue
* Apply Filters
* Confirm
* Close

Primary actions should remain visible when appropriate.

---

# 10. Opening Behavior

A Drawer may be opened by:

* Button
* Table Row
* Card
* Navigation Item
* Context Menu
* Keyboard Shortcut

Opening should feel immediate and responsive.

---

# 11. Closing Behavior

Supported closing methods:

* Close Button
* Escape Key
* Clicking Backdrop
* Swipe Gesture (Mobile)
* Action Completion

Critical workflows may disable backdrop dismissal.

---

# 12. Backdrop

Supported modes:

```text id="r8m3qy"
Modal Backdrop

Transparent Backdrop

No Backdrop
```

The backdrop should match the importance of the interaction.

---

# 13. Persistent Drawer

Persistent Drawers remain visible while users continue interacting with the page.

Common examples:

* AI Assistant
* Learning Notes
* Live Chat
* Course Curriculum

Persistent drawers should not block primary content.

---

# 14. Responsive Behavior

Desktop

* Side Drawer.

Tablet

* Wider Drawer.
* Reduced margins.

Mobile

* Bottom Drawer or Fullscreen Drawer.
* Swipe-to-close support.
* Large touch targets.

Drawers should adapt naturally to available screen space.

---

# 15. Scrolling

Supported scrolling behavior:

```text id="v4k8tp"
Internal Scroll

Fullscreen Scroll
```

The page behind the drawer should remain fixed unless using a persistent drawer.

---

# 16. Accessibility

The Drawer component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Focus Trap (Modal Drawers)
* Screen Readers
* High Contrast Mode

Focus should return to the triggering element after closing.

---

# 17. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate controls
* Shift + Tab → Reverse navigation
* Enter → Activate action
* Escape → Close (when permitted)

Keyboard users should remain inside modal drawers until they are dismissed.

---

# 18. Animation

Recommended animations:

* Slide In
* Slide Out
* Fade Backdrop
* Soft Shadow Transition

Animations should remain smooth and respect the user's **Reduced Motion** preference.

---

# 19. Design Tokens

Examples

```text id="n6q2mx"
drawer-width

drawer-radius

drawer-background

drawer-shadow

drawer-padding

drawer-backdrop
```

All visual properties should consume Design Tokens.

---

# 20. CSS Variables

Examples

```css id="t5v9pr"
--drawer-width
--drawer-radius
--drawer-bg
--drawer-shadow
--drawer-padding
--drawer-backdrop
```

Implementation should remain token-driven.

---

# 21. Do

Recommended practices:

* Keep the drawer focused on a single purpose.
* Allow independent scrolling.
* Provide a visible close button.
* Use drawers for secondary workflows.
* Preserve user context.

---

# 22. Don't

Avoid:

* Deep multi-step workflows.
* Multiple stacked drawers.
* Excessively wide panels.
* Hiding essential actions.
* Blocking users unnecessarily.

Complex workflows should move to dedicated pages or full-screen experiences.

---

# 23. Common Use Cases

Examples include:

* Student Details
* Instructor Details
* Course Preview
* Filters
* Notifications Center
* AI Assistant
* Learning Notes
* Activity History
* Organization Details
* Shopping Cart

Drawers enable quick interactions without leaving the current page.

---

# 24. Component Properties (Props)

Typical configurable properties include:

```text id="q8m4wc"
position

size

title

persistent

backdrop

dismissible

scrollable

footer

animation

fullscreen
```

Additional properties may be introduced while preserving backward compatibility.

---

# 25. Future Expansion

Future enhancements may include:

* AI Workspace Drawer
* Split Drawer
* Resizable Drawer
* Multi-Panel Drawer
* Collaborative Drawer
* Dockable Drawer

Future capabilities should extend the existing architecture.

---

# 26. Related Components

This component integrates with:

* Modal
* Sidebar
* Button
* Tabs
* Table
* Card
* Timeline
* Form
* Notification

Together they provide flexible overlay interactions across the platform.

---

# 27. Design Principles

The Drawer component should always remain:

* Contextual
* Accessible
* Responsive
* Non-Disruptive
* Efficient
* Flexible

Users should access supporting information without losing their current workflow.

---

# 28. Design Decision

Iran LMS follows a **Context-Preserving Overlay Architecture**.

```text id="f2r7kn"
Current Page

↓

Drawer

↓

Secondary Task

↓

Close Drawer

↓

Continue Workflow
```

Drawers extend the current page instead of replacing it, enabling smooth and uninterrupted user experiences.

---

# 29. Strategic Vision

The Drawer component provides flexible side-panel interactions across the Iran LMS ecosystem. Whether previewing courses, managing users, filtering reports, reviewing notifications, working with AI assistants, or viewing organizational data, every drawer follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Drawer into an intelligent workspace capable of supporting AI copilots, collaborative editing, dockable panels, adaptive layouts, and enterprise-scale workflows while preserving user context, productivity, and usability.
