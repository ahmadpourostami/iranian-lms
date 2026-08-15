# RTL (Right-to-Left)

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Right-to-Left (RTL) Design System used throughout the Iran LMS platform.

RTL support ensures that languages such as Persian, Arabic, and Urdu receive a native, intuitive, and fully localized user experience without compromising usability or consistency.

RTL is a first-class design requirement—not an afterthought.

---

# 2. Goals

The RTL System should be:

* Native
* Consistent
* Accessible
* Maintainable
* Responsive
* Internationalized

Every interface should work equally well in both RTL and LTR environments.

---

# 3. Design Philosophy

RTL is not simply mirroring the interface.

The system should intelligently adapt:

* Layout
* Navigation
* Typography
* Icons
* Components
* User Expectations

Reading direction should feel completely natural.

---

# 4. RTL Architecture

The RTL system follows this structure.

```text id="n8v2fw"
Language

↓

Direction

↓

Layout

↓

Components

↓

Pages

↓

User Experience
```

Direction should be determined by language settings rather than individual pages.

---

# 5. Supported Directions

Iran LMS supports:

```text id="o5jz4k"
RTL

LTR
```

Future languages should automatically inherit the appropriate direction.

---

# 6. Layout Direction

The overall layout should automatically mirror.

Examples

* Sidebar Position
* Navigation Flow
* Grid Alignment
* Page Structure

The information hierarchy must remain unchanged.

---

# 7. Text Alignment

Text alignment should follow the writing direction.

RTL

* Right Align

LTR

* Left Align

Alignment should never depend on fixed CSS values.

---

# 8. Navigation

Navigation should automatically adapt.

Examples

* Sidebar
* Breadcrumbs
* Tabs
* Pagination
* Drawers

Navigation flow should match reading direction.

---

# 9. Forms

Forms should support RTL naturally.

Examples

* Labels
* Inputs
* Validation Messages
* Helper Text

Form usability should remain identical in both directions.

---

# 10. Icons

Icons fall into two categories.

Direction-Independent

* Search
* User
* Settings
* Calendar
* Bell

Direction-Dependent

* Back
* Next
* Forward
* Previous
* Expand
* Collapse

Directional icons should automatically mirror.

---

# 11. Buttons

Buttons should preserve:

* Icon Position
* Padding
* Alignment
* Focus States

Primary actions should remain visually consistent.

---

# 12. Cards

Cards should adapt:

* Metadata Alignment
* Action Placement
* Content Flow

Card structure should remain familiar across languages.

---

# 13. Tables

RTL tables should support:

* Right-Aligned Text
* Mirrored Action Columns
* Responsive Behavior

Numeric values should remain easy to scan.

---

# 14. Charts

Charts generally remain language-neutral.

However:

* Legends
* Labels
* Tooltips
* Axis Titles

should adapt to the active language.

Chart direction should only change when it improves comprehension.

---

# 15. Typography

Typography should support:

* Persian
* Arabic
* English
* Mixed Content

Line height and spacing should remain comfortable.

---

# 16. Mixed Content

Interfaces frequently contain:

* Persian Text
* English Terms
* URLs
* Emails
* Numbers
* Code

Mixed-direction content should render correctly without breaking layout.

---

# 17. Numbers

The platform should support configurable number display.

Examples

* Persian Digits
* English Digits

The selected format should remain consistent throughout the interface.

---

# 18. Code Blocks

Programming code should always remain LTR.

Examples

* HTML
* CSS
* JavaScript
* PHP
* SQL

Code readability must never be affected by page direction.

---

# 19. Media

Images and videos generally remain unchanged.

However:

* Controls
* Captions
* Descriptions

should follow the active language direction.

---

# 20. Responsive Behavior

RTL should behave consistently across:

* Desktop
* Tablet
* Mobile

Changing screen size must not affect reading direction.

---

# 21. Accessibility

RTL interfaces must support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* WCAG 2.2 AA

Accessibility behavior should remain identical across directions.

---

# 22. Internationalization

RTL support should integrate with the localization system.

Examples

* Language Switching
* Date Formatting
* Number Formatting
* Locale Detection

Direction should update automatically when the language changes.

---

# 23. Design Tokens

Examples

```text id="s1cm9t"
layout-start

layout-end

text-start

text-end

icon-direction

navigation-position
```

Logical properties should replace physical positioning.

---

# 24. CSS Variables

Examples

```css id="b91e0k"
--layout-direction
--text-align-start
--text-align-end
--sidebar-position
--navigation-direction
--icon-direction
```

Components should avoid hardcoded left/right values.

---

# 25. Development Guidelines

Developers should prefer logical CSS properties.

Examples

Use:

* margin-inline-start
* margin-inline-end
* padding-inline-start
* padding-inline-end
* inset-inline-start

Avoid:

* margin-left
* margin-right
* padding-left
* padding-right
* left
* right

Logical properties improve maintainability.

---

# 26. Future Expansion

The RTL System supports:

* Additional RTL Languages
* White Label Products
* Mobile Applications
* Progressive Web Apps
* Enterprise Deployments

Future languages should require minimal implementation effort.

---

# 27. Design Principles

RTL interfaces should always remain:

* Native
* Predictable
* Consistent
* Accessible
* Localized
* Scalable

Users should never feel that the interface was translated after being designed.

---

# 28. Design Decision

Iran LMS follows a **Direction-Agnostic Design Architecture**.

```text id="7fh3vq"
Language

↓

Direction

↓

Logical Layout

↓

Reusable Components

↓

Localized Experience
```

Components are built once and adapt automatically based on the active writing direction.

---

# 29. Strategic Vision

The RTL System enables Iran LMS to deliver a truly multilingual experience through a single design architecture.

By relying on logical layouts, semantic design tokens, and automatic direction handling, the platform can support Persian, Arabic, English, and future languages without redesigning components.

The long-term objective is to ensure that every user experiences a native, intuitive, and culturally appropriate interface regardless of language or writing direction.
