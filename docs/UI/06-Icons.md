# Icons

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the icon system used throughout the Iran LMS platform.

Icons improve recognition, reduce cognitive load, and help users navigate the interface more efficiently.

Icons should support understanding—not replace it.

---

# 2. Goals

The icon system should be:

* Consistent
* Recognizable
* Accessible
* Scalable
* Lightweight
* Theme Compatible

Icons should feel unified across every product.

---

# 3. Design Philosophy

Icons are visual aids.

They should clarify actions and content, not decorate the interface.

Whenever an icon creates ambiguity, text should take priority.

---

# 4. Icon Architecture

The icon system consists of:

```text
Icon Library
      ↓
Icon Categories
      ↓
Semantic Usage
      ↓
UI Components
```

Icons should always be selected based on meaning.

---

# 5. Icon Library

Iran LMS should use **one** icon library throughout the platform.

Mixing multiple icon sets is prohibited.

The selected library should provide:

* Outline Icons
* Filled Icons
* Scalable SVG
* Consistent Stroke
* RTL Compatibility

---

# 6. Icon Categories

Icons are grouped into logical categories.

Examples

```text
Navigation

Learning

Commerce

Communication

Media

Assessment

Settings

Reports

System
```

Categories improve discoverability and consistency.

---

# 7. Navigation Icons

Navigation icons identify destinations.

Examples include:

* Dashboard
* Courses
* Learning
* Certificates
* Reports
* Settings
* Notifications
* Profile

Navigation icons should remain stable across updates.

---

# 8. Action Icons

Action icons represent user actions.

Examples

* Add
* Edit
* Delete
* Save
* Share
* Download
* Upload
* Copy
* Search

Actions should be immediately recognizable.

---

# 9. Status Icons

Status icons communicate system state.

Examples

* Success
* Warning
* Error
* Information
* Pending
* Completed

Status icons should always accompany semantic colors.

---

# 10. Learning Icons

Examples

* Lesson
* Video
* Quiz
* Assignment
* Certificate
* Progress
* Bookmark
* Notes
* Live Class

Learning icons should reinforce educational concepts.

---

# 11. Media Icons

Media-related icons include:

* Play
* Pause
* Volume
* Fullscreen
* Download
* Attachment
* Image
* Audio
* Video

Media controls should remain universally recognizable.

---

# 12. Icon Sizes

Supported size tokens

```text
XS

SM

MD

LG

XL
```

Arbitrary icon sizes should be avoided.

---

# 13. Stroke Style

Icons should use a consistent stroke style.

Examples

* Rounded
* Uniform Thickness
* Simple Geometry

Visual consistency is more important than artistic variety.

---

# 14. Filled vs Outline

Preferred usage

Outline Icons

* Navigation
* Actions
* General Interface

Filled Icons

* Active States
* Selected Items
* Notifications
* Important Status Indicators

Filled icons should be used sparingly.

---

# 15. Color Usage

Icons should inherit semantic colors.

Examples

* Primary
* Success
* Warning
* Danger
* Muted

Hardcoded icon colors should be avoided.

---

# 16. Accessibility

Icons should never communicate meaning through graphics alone.

Whenever necessary:

* Add Labels
* Add Tooltips
* Provide Accessible Names

Decorative icons should be hidden from assistive technologies.

---

# 17. RTL Support

Directional icons must adapt automatically.

Examples

* Back
* Forward
* Previous
* Next
* Expand
* Collapse

Mirroring should occur automatically where appropriate.

---

# 18. Interactive States

Interactive icons support:

* Default
* Hover
* Active
* Focus
* Disabled

State transitions should remain consistent.

---

# 19. Animation

Only meaningful icons may animate.

Examples

* Loading
* Sync
* Upload
* Download

Animations should remain subtle and purposeful.

---

# 20. SVG Standard

Icons should be implemented as SVG.

Advantages include:

* Scalability
* Small File Size
* Theme Support
* Easy Styling
* Better Accessibility

Bitmap icons should be avoided.

---

# 21. Design Tokens

Examples

```text
icon-size-sm

icon-size-md

icon-size-lg

icon-color-primary

icon-color-muted

icon-stroke-width
```

Components should consume icon tokens.

---

# 22. CSS Variables

Examples

```css
--icon-size-sm
--icon-size-md
--icon-size-lg
--icon-color
--icon-stroke-width
```

Implementation should rely on reusable variables.

---

# 23. Future Expansion

The icon system supports:

* Dark Mode
* White Label Themes
* Mobile Applications
* Custom Icon Packs
* Organization Branding

Future icon updates should preserve semantic meaning.

---

# 24. Design Principles

Icons should always remain:

* Simple
* Recognizable
* Consistent
* Minimal
* Accessible

Decorative icon usage should be minimized.

---

# 25. Design Decision

Iran LMS follows a **Semantic Icon System**.

```text
Icon Library

↓

Semantic Categories

↓

Design Tokens

↓

UI Components

↓

Pages
```

Business modules reference icon semantics rather than individual icon files.

---

# 26. Strategic Vision

The Icon System provides a consistent visual language across the Iran LMS ecosystem.

By standardizing icon categories, semantic usage, sizing, and interaction rules, the platform ensures that every interface—from the WordPress theme and LMS plugin to future mobile applications—communicates actions and information clearly, efficiently, and consistently.

Icons should enhance learning, never distract from it.
