# Divider

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Structural Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Divider is a structural component used to visually separate related sections of content without creating excessive visual weight.

In Iran LMS, Divider may be used between:

* Sections
* List items
* Metadata groups
* Form groups
* Navigation areas
* Course information
* Lesson content
* Dashboard widgets
* Settings groups
* Comments
* Table sections
* Mobile navigation areas

Divider is primarily a visual and structural component.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Divider must be:

```text id="v7k4s1"
Reusable
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

Divider must not contain business logic.

---

# 3. Divider Is Not a Border

A border belongs to a component's visual container.

A Divider is an intentional separation between pieces of content.

Example:

```text id="w2a1g9"
┌──────────────────────────┐
│ Course information       │
│                          │
├──────────────────────────┤
│ Instructor information   │
└──────────────────────────┘
```

The line between the two sections may be a Divider.

But:

```text id="s4x9qk"
┌──────────────────────────┐
│                          │
│        Card              │
│                          │
└──────────────────────────┘
```

The outer line is a Card border, not a Divider.

---

# 4. Semantic Principle

Divider should be used only when visual separation improves comprehension.

Do not add a Divider after every element.

Bad:

```text id="z7p3bq"
Title
─────
Description
─────
Button
─────
Metadata
─────
```

This creates unnecessary visual noise.

---

# 5. Basic Divider

Default Divider:

```text id="4qg1by"
────────────────────────────
```

Recommended for separating sections within a shared surface.

---

# 6. Horizontal Divider

The primary variant is horizontal:

```text id="7jz2yk"
────────────────────────────
```

Use for:

* Content sections
* Lists
* Form groups
* Settings
* Menus
* Course information

---

# 7. Vertical Divider

A vertical Divider may be used between horizontally arranged content.

Example:

```text id="b2u6q8"
مدرس │ ۱۲۳ دانشجو │ ۴.۸ امتیاز
```

The vertical separator should remain subtle.

Use it only when the surrounding layout provides enough horizontal space.

---

# 8. Divider With Label

Divider may contain a label.

Example:

```text id="5j5m2c"
────────  یا  ────────
```

or:

```text id="9n6j2r"
────────  اطلاعات دوره  ────────
```

This variant is useful when the divider represents a meaningful section boundary.

---

# 9. Label Alignment

Supported label positions:

```text id="b4f2x0"
Start
Center
End
```

In RTL layouts, the default logical start is the right side.

The implementation should use logical alignment rather than hard-coded left/right assumptions.

---

# 10. Divider With Text in Forms

Example:

```text id="e8o5v3"
ایمیل
[................]

──────── یا ────────

ورود با حساب دیگر
```

This is useful for authentication and alternative interaction paths.

---

# 11. Divider in Course Details

Course information may use separation between groups:

```text id="6v1lqy"
مدرس: سارا رضایی

────────────────

سطح: متوسط

────────────────

مدت: ۱۸ ساعت
```

However, if spacing alone provides enough separation, Divider should not be added.

---

# 12. Divider in Lesson Player

The Lesson Player contains multiple logical regions such as:

```text id="u9x2d8"
Lesson Header
──────────────
Description
──────────────
Resources
──────────────
Notes
```

Divider may separate these regions where needed.

The current design guide identifies lesson resources, attachments, notes, bookmarks and completion controls as separate lesson content areas.

---

# 13. Divider in Dashboard

Dashboard sections may use Divider when multiple information groups occupy the same surface.

Example:

```text id="g1n3v5"
پیشرفت کلی
۶۸٪

────────────────

دوره‌های در حال یادگیری
۱۲

────────────────

درس‌های تکمیل شده
۵۶
```

However, Card sections should generally prefer spacing and hierarchy before introducing lines.

---

# 14. Divider in Lists

Divider is useful in dense lists.

Example:

```text id="f2d8t1"
درس اول
────────────────
درس دوم
────────────────
درس سوم
```

The line separates items without requiring individual cards.

---

# 15. Divider in Navigation

Menus may use Divider to separate logical groups.

Example:

```text id="j7q4z8"
داشبورد
دوره‌های من
ادامه یادگیری

────────────

تکالیف
آزمون‌ها
نمرات

────────────

تنظیمات
خروج
```

The Navigation component owns menu semantics.

Divider only provides visual grouping.

---

# 16. Divider in Sidebar

A Sidebar may contain multiple navigation groups.

Example:

```text id="m3a9p2"
Learning
────────
دوره‌های من
ادامه یادگیری
گواهینامه‌ها

Management
────────
تکالیف
آزمون‌ها
نمرات
```

The exact grouping belongs to Navigation.

---

# 17. Divider in Settings

Settings pages are a common use case.

Example:

```text id="r4c7x1"
حساب کاربری
نام
ایمیل
شماره موبایل

────────────────

اعلان‌ها
اعلان ایمیل
اعلان پیامکی

────────────────

حریم خصوصی
تنظیمات نمایش پروفایل
```

Divider helps establish sections without creating additional cards.

---

# 18. Divider in Forms

Divider may separate independent form groups.

Example:

```text id="v8s5k3"
اطلاعات شخصی
[ نام ]
[ نام خانوادگی ]

────────────────

اطلاعات تماس
[ ایمیل ]
[ تلفن ]
```

Use Field Group spacing first.

Divider should be secondary.

---

# 19. Divider in Modal

Modal content may use:

```text id="p6e2z7"
Header
────────────
Body
────────────
Footer
```

If the Modal component already provides clear structural separation, a Divider may not be necessary.

Avoid duplicating separators.

---

# 20. Divider in Drawer

Drawer may similarly use:

```text id="c1f8n4"
Header
────────────
Content
────────────
Actions
```

The Drawer component owns the overall layout.

---

# 21. Divider in Dropdown

Dropdown menus may use a Divider between action groups.

Example:

```text id="k9w2s6"
ویرایش
کپی

────────

اشتراک‌گذاری

────────

حذف
```

Danger actions may be separated visually but should not rely on the Divider alone to communicate danger.

---

# 22. Divider in Course Card

Usually avoid using Divider inside small Course Cards.

Prefer:

```text id="x6v1j9"
Spacing
Typography
Grouping
```

instead of:

```text id="q2b7m5"
Title
────────
Instructor
────────
Price
```

Cards already provide sufficient visual structure.

---

# 23. Divider in Table

Tables already provide structural rows and columns.

A Divider may be used only for:

* Table sections
* Group headers
* Summary rows

Do not add a heavy Divider to every table row if the Table component already provides row separation.

---

# 24. Divider in Timeline

Timeline has its own visual connector.

Do not replace timeline connectors with generic Divider.

The Timeline component should own:

```text id="a5r8n2"
Connector
Node
Content
```

---

# 25. Divider in Tabs

Tabs should not use Divider between every tab.

The active tab indicator and spacing should establish hierarchy.

A Divider may appear below the entire Tab Bar:

```text id="d3y7p1"
تب درباره دوره
سرفصل‌ها
نظرات
مدرس
────────────────────
Content
```

---

# 26. Divider in Focus Mode

Focus Mode intentionally minimizes visual distractions.

Therefore Dividers should be used sparingly.

The design guide explicitly describes Focus Mode as a distraction-free environment with hidden sidebars and minimal distractions.

Prefer:

```text id="n8h4z3"
Whitespace
Subtle background shifts
Typography
```

before using visible Dividers.

---

# 27. Divider Variants

Recommended variants:

```text id="s2q6f8"
Solid
Dashed
```

Default:

```text id="c7m1v4"
Solid
```

Dashed should be reserved for specific contextual patterns.

Do not introduce decorative patterns without a documented use case.

---

# 28. Divider Thickness

Recommended:

```text id="p9d3w2"
1px
```

Default.

A stronger Divider may use:

```text id="q4j8n1"
2px
```

only for deliberate section emphasis.

Avoid thick generic separators.

---

# 29. Divider Color

Divider should use a neutral semantic token.

Recommended:

```text id="h3v6k2"
border-subtle
```

rather than a hard-coded color.

Example:

```css id="z5q8r1"
border-color: var(--color-border-subtle);
```

The actual token must come from the global Design Token system.

---

# 30. Dark Mode

Divider must adapt to Dark Mode.

Light:

```text id="e2m7p4"
subtle light border
```

Dark:

```text id="k6w1s9"
subtle dark-theme border
```

Do not simply reuse the Light Mode color.

The contrast should remain subtle while still providing separation.

---

# 31. RTL

Divider is direction-independent when horizontal.

For vertical and labeled variants, logical direction matters.

Use:

```text id="n3f7c2"
margin-inline
padding-inline
inset-inline
```

where applicable.

Avoid hard-coded:

```css id="t7q2m5"
margin-left
margin-right
```

unless there is a specific reason.

---

# 32. Responsive Behavior

Horizontal Divider:

```text id="b8n4y6"
Desktop → full available width
Mobile → full available width
```

Vertical Divider may become horizontal when the layout changes from:

```text id="u4m8x2"
Row
```

to:

```text id="y7p3k9"
Column
```

The parent layout should determine this transformation.

---

# 33. Mobile

On mobile:

* Maintain sufficient spacing around Divider.
* Avoid excessive separators.
* Preserve readability.
* Avoid creating visually dense screens.

For compact mobile layouts, whitespace is often preferable to repeated Dividers.

---

# 34. Spacing

Divider must have spacing tokens.

Recommended:

```text id="f5z9q1"
divider-margin-block-sm
divider-margin-block-md
divider-margin-block-lg
```

For labeled Divider:

```text id="r2k7m8"
divider-gap
```

Spacing should come from the global spacing system.

---

# 35. Accessibility

A purely decorative Divider generally does not need to be announced by a screen reader.

For example:

```html id="a8v3p2"
<div aria-hidden="true"></div>
```

may be appropriate depending on implementation.

If the Divider has a meaningful semantic heading or label, the label should be represented using appropriate semantic HTML.

---

# 36. Semantic `<hr>`

When the Divider represents a thematic break between content sections, the semantic HTML element:

```html id="g4y1w7"
<hr>
```

is preferred.

This gives the browser and assistive technologies appropriate structural information.

---

# 37. Decorative Divider

If the line is purely decorative:

```text id="m9c2x5"
visual separator only
```

it should not create unnecessary accessibility announcements.

Implementation may use a decorative element or CSS.

---

# 38. Divider With Label Semantics

Example:

```text id="x8q4v1"
──────── آزمون ────────
```

The label is meaningful content.

If it represents a real section heading, prefer:

```html id="d5n7z3"
<h2>آزمون</h2>
```

with visual Divider styling around it.

Do not use a generic Divider as a replacement for semantic headings.

---

# 39. Animation

Divider normally does not need animation.

Avoid:

```text id="k2f8p5"
Animated lines
Moving gradients
Continuous glow
```

A subtle transition may be appropriate when a section dynamically appears.

---

# 40. Dynamic Visibility

Modules in Iran LMS can be enabled or disabled.

The design guide explicitly states that disabled modules should disappear without breaking the layout.

Therefore:

```text id="w6q1r8"
Module A
────────
Module B
────────
Module C
```

If Module B is disabled:

```text id="p4m9z2"
Module A
────────
Module C
```

The application should avoid leaving an orphan Divider.

---

# 41. Component Boundary

Divider owns:

```text id="v1k8s4"
Orientation
Thickness
Style
Color Token
Spacing
Label Position
Responsive Presentation
```

Divider does not own:

```text id="n7c2x6"
Business Logic
Navigation
Data
Permissions
Content State
Form State
```

---

# 42. Component API

Recommended properties:

```text id="j5r9w3"
orientation
variant
size
label
labelPosition
className
ariaHidden
```

Possible orientation values:

```text id="x2m6q8"
horizontal
vertical
```

Possible variants:

```text id="f7n3p1"
solid
dashed
```

---

# 43. Example API

Basic:

```text id="a4v8k2"
Divider
```

Vertical:

```text id="b6x1m9"
Divider
    orientation="vertical"
```

Labeled:

```text id="q3z7w5"
Divider
    label="اطلاعات دوره"
    labelPosition="center"
```

Dashed:

```text id="s8p2n4"
Divider
    variant="dashed"
```

---

# 44. WordPress Implementation

Divider may be rendered through:

```text id="c5h9y2"
PHP
HTML
CSS
JavaScript
Gutenberg
REST-driven UI
```

The design specification must remain independent from implementation technology.

---

# 45. CSS Scope

Do not use a generic selector such as:

```css id="w4n7q2"
hr {
}
```

because it may modify the Theme or other plugins.

Likewise avoid an overly generic:

```css id="m8p3z6"
.divider {
}
```

Use the project's scoped component naming convention.

Conceptually:

```css id="k2r6x9"
.iran-lms-divider {
}
```

---

# 46. Design Tokens

Recommended tokens:

```text id="y3f7m1"
divider-color
divider-color-subtle
divider-color-strong

divider-thickness
divider-radius

divider-spacing-sm
divider-spacing-md
divider-spacing-lg

divider-label-gap
```

All colors and spacing values should resolve from the global Design Token system.

---

# 47. Theme Independence

Divider must work with:

```text id="r8v2c5"
Classic Themes
Block Themes
Custom Themes
RTL Themes
Light Themes
Dark Themes
```

The plugin must not assume the Theme has a specific Divider implementation.

---

# 48. Module Usage

Divider may be used by:

```text id="h4q9n7"
Courses
Learning
Enrollments
Assessments
Assignments
Certificates
Communication
Gamification
Notifications
Users
Reports
Settings
```

Modules should use the same component instead of implementing their own separator styles.

---

# 49. Do

* Use Divider to clarify structure.
* Prefer semantic `<hr>` for thematic breaks.
* Keep the visual weight subtle.
* Use Design Tokens.
* Support RTL.
* Support Dark Mode.
* Support horizontal and vertical orientations.
* Keep spacing consistent.
* Use whitespace before adding separators.
* Scope CSS for WordPress.
* Remove orphan Dividers when dynamic modules disappear.

---

# 50. Don't

Avoid:

* Adding a Divider between every element.
* Using Divider as a replacement for headings.
* Using heavy borders unnecessarily.
* Hard-coding colors.
* Using global `hr` styles.
* Creating page-specific Divider variants.
* Using Divider for Timeline connectors.
* Using Divider as a Button boundary.
* Relying on Divider alone to communicate semantic meaning.
* Leaving empty separators after disabled modules.

---

# 51. Testing Requirements

Test:

```text id="q7m3x8"
Horizontal
Vertical
Labeled
Solid
Dashed
1px
2px
```

Contexts:

```text id="b4n8k1"
Dashboard
Course
Lesson
Settings
Forms
Sidebar
Dropdown
Modal
Drawer
List
```

Responsive:

```text id="v6p2r9"
Desktop
Tablet
Mobile
Row → Column
```

Accessibility:

```text id="j8c5w2"
Semantic HR
Decorative Divider
Screen Reader
Heading + Divider
Keyboard Navigation
```

Themes:

```text id="m1z7q4"
Light Mode
Dark Mode
RTL
LTR
```

WordPress:

```text id="s9x3k6"
Frontend
Admin
Classic Theme
Block Theme
Plugin Conflict
```

---

# 52. Architecture Decision

Iran LMS follows a **Structural Divider Architecture**:

```text
Content Structure
      ↓
Semantic Group
      ↓
Divider
      ↓
Visual Separation
```

Divider does not create the structure.

It makes an existing structure easier to perceive.

---

# 53. Strategic Vision

Divider is intentionally a simple component.

Its value comes from consistency rather than complexity.

Across Iran LMS, Divider should provide a unified mechanism for subtle separation between:

* Dashboard sections
* Course information
* Lesson content
* Forms
* Settings
* Navigation groups
* Lists
* Menus
* Modal sections

The long-term goal is a **minimal, semantic, RTL-first, accessible and Theme-independent Divider system** that improves information hierarchy without adding unnecessary visual noise.
