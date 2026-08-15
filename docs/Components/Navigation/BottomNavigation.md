# Bottom Navigation

**Component:** Navigation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Bottom Navigation component provides quick access to the most important destinations on mobile devices.

It enables users to switch between primary sections of the Iran LMS application using one-handed interaction.

Unlike the Sidebar, Bottom Navigation is designed specifically for mobile-first experiences.

---

# 2. Component Type

**Category**

Navigation Component

**Role**

Primary Mobile Navigation

---

# 3. Usage

Bottom Navigation is used for:

* Student Mobile App
* Instructor Mobile App
* Organization Mobile App
* Progressive Web App (PWA)
* Mobile Web Experience

It should only appear on mobile and small tablet layouts.

---

# 4. Anatomy

A Bottom Navigation consists of:

```text id="k7m3tp"
Navigation Bar

↓

Navigation Items

↓

Icon

↓

Label

↓

Optional Badge

↓

Active Indicator
```

Each item represents one primary destination.

---

# 5. Navigation Items

Recommended primary destinations include:

```text id="n8v5qy"
Home

Courses

Learning

Notifications

Profile
```

Items should reflect the user's role.

---

# 6. Item Count

Recommended number of items:

```text id="u3r9kc"
Minimum

3

Maximum

5
```

More than five items should be avoided.

Additional destinations should be accessible through other navigation patterns.

---

# 7. Navigation Types

Supported types:

```text id="p6w4mz"
Fixed

Shifting

Floating
```

**Fixed** navigation is recommended for Iran LMS.

---

# 8. Active State

The active item should display:

* Active Icon
* Active Label
* Active Color
* Active Indicator

Only one item should be active at a time.

---

# 9. Badges

Navigation items may display:

* Notification Count
* New Messages
* AI Updates
* Unread Alerts

Badge counts should update in real time.

---

# 10. Labels

Every navigation item should include:

* Icon
* Text Label

Labels should remain visible even for the active item.

---

# 11. Icons

Icons should:

* Match the Design System.
* Remain consistent across the platform.
* Clearly represent their destination.

Outline icons are recommended by default.

---

# 12. Safe Area

Bottom Navigation must respect:

* iOS Safe Area
* Android Gesture Navigation
* Device Insets

Content should never overlap the system navigation area.

---

# 13. Responsive Behavior

Desktop

* Hidden

Tablet

* Optional

Mobile

* Visible
* Fixed to bottom
* Safe-area aware

Bottom Navigation is optimized for touch interaction.

---

# 14. Accessibility

The Bottom Navigation component must support:

* WCAG 2.2 AA
* Keyboard Navigation (where applicable)
* Screen Readers
* Focus Indicators
* High Contrast Mode

Each destination should expose an accessible label.

---

# 15. Touch Interaction

Navigation items should provide:

* Minimum 44×44pt touch targets
* Immediate visual feedback
* Smooth transitions

Users should comfortably operate the navigation with one hand.

---

# 16. Animation

Recommended animations:

* Active Indicator Slide
* Icon Scale
* Fade Transition

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 17. Visibility Behavior

Bottom Navigation should remain:

* Fixed while navigating.
* Visible across primary application sections.

Optional behaviors:

* Auto-hide while scrolling downward.
* Reappear when scrolling upward.

This behavior should be configurable.

---

# 18. Design Tokens

Examples

```text id="f2q8rh"
bottom-nav-height

bottom-nav-background

bottom-nav-border

bottom-nav-item-color

bottom-nav-active-color

bottom-nav-shadow
```

All visual properties should consume Design Tokens.

---

# 19. CSS Variables

Examples

```css id="y5v3na"
--bottom-nav-height
--bottom-nav-bg
--bottom-nav-border
--bottom-nav-item
--bottom-nav-active
--bottom-nav-shadow
```

Implementation should remain token-driven.

---

# 20. Do

Recommended practices:

* Keep only primary destinations.
* Display both icons and labels.
* Highlight the active destination.
* Respect mobile safe areas.
* Maintain consistent iconography.

---

# 21. Don't

Avoid:

* More than five items.
* Nested navigation.
* Secondary actions.
* Large badges.
* Frequently changing item order.

Navigation should remain predictable.

---

# 22. Common Use Cases

Examples include:

* Home
* My Courses
* Continue Learning
* Notifications
* Messages
* AI Assistant
* Profile
* Wallet
* Dashboard
* Certificates

The Bottom Navigation serves as the primary mobile navigation experience.

---

# 23. Component Properties (Props)

Typical configurable properties include:

```text id="m4k9xu"
items

activeItem

fixed

floating

showLabels

showBadges

safeArea

autoHide

animation
```

Additional properties may be introduced while preserving backward compatibility.

---

# 24. Future Expansion

Future enhancements may include:

* AI Quick Access
* Dynamic Navigation
* Personalized Shortcuts
* Organization Branding
* Context-Aware Navigation
* Gesture Navigation

Future capabilities should extend the existing architecture.

---

# 25. Related Components

This component integrates with:

* Sidebar
* Topbar
* Navigation Item
* Badge
* Icon
* Avatar
* Drawer
* Floating Action Button (FAB)

Together they provide a complete navigation system across desktop and mobile experiences.

---

# 26. Design Principles

The Bottom Navigation component should always remain:

* Mobile-First
* Accessible
* Predictable
* Responsive
* Lightweight
* Thumb-Friendly

Users should reach every primary destination with minimal effort.

---

# 27. Design Decision

Iran LMS follows a **Mobile-First Navigation Architecture**.

```text id="r7n2pc"
Application

↓

Bottom Navigation

↓

Primary Destinations

↓

Current Section
```

Bottom Navigation complements the Sidebar by delivering a dedicated navigation experience for mobile devices.

---

# 28. Strategic Vision

The Bottom Navigation component provides the primary navigation experience for the Iran LMS mobile ecosystem. Whether learners are continuing a lesson, instructors are managing courses, or administrators are monitoring platform activity, every mobile interaction is built upon a consistent, accessible, and token-driven navigation model.

The long-term objective is to evolve the Bottom Navigation into an intelligent mobile navigation system capable of supporting AI-powered shortcuts, adaptive destinations, personalized workflows, and enterprise branding while preserving simplicity, speed, and one-handed usability.
