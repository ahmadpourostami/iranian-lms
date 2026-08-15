# Icon

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Visual Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Icon is the foundational visual component used to represent actions, concepts, states, navigation items, and contextual information throughout Iran LMS.

Icons are heavily used across the LMS interface, including:

* Dashboard navigation
* Course navigation
* Lesson player
* Assessments
* Assignments
* Notifications
* User profile
* Search
* Settings
* Progress
* Certificates
* Gamification
* Communication
* Tables
* Buttons
* Forms
* Cards

The UI design guide explicitly identifies icons throughout the LMS interface, including navigation, lesson types, progress, achievements, notifications, and actions.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Icon must be:

```text
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

Icon must not contain business logic.

---

# 3. Icon Is Not an Action

An Icon represents something visually.

A Button performs an action.

Correct:

```text
[ 🔔 ]
```

Incorrect conceptual usage:

```text
[ 🔔 ] = automatically handles notifications
```

The Icon only represents the notification concept.

The Button or interaction component owns the action.

---

# 4. Icon Is Not an Image

Icon is a UI symbol.

Image is content.

Use Icon for:

```text
Search
Settings
Play
Pause
Download
Edit
Delete
Calendar
```

Use Image for:

```text
Course Thumbnail
Instructor Photo
Student Avatar
Project Screenshot
Educational Illustration
```

---

# 5. Icon System

Iran LMS should use a centralized Icon System.

Conceptually:

```text
Icon Registry
      ↓
Icon Name
      ↓
Icon Component
      ↓
Design Tokens
      ↓
UI
```

Individual modules should not introduce random icon libraries without approval.

---

# 6. Recommended Technology

For a WordPress Plugin, the icon implementation should support:

```text
SVG
```

as the primary icon format.

SVG provides:

* Scalability
* Sharp rendering
* CSS control
* Accessibility support
* Small file size
* Theme independence

The final implementation may use an internal SVG icon registry or another approved mechanism.

---

# 7. SVG First

Preferred:

```html
<svg>
    ...
</svg>
```

Avoid using raster images for standard UI icons.

Do not use:

```text
PNG
JPG
WebP
```

for ordinary interface icons.

---

# 8. Icon Registry

All approved icons should exist in a central registry.

Conceptually:

```text
icons/
├── search
├── menu
├── close
├── check
├── arrow-right
├── arrow-left
├── chevron-down
├── play
├── pause
├── bell
├── mail
├── user
├── settings
└── ...
```

The exact filesystem location depends on the final implementation architecture.

---

# 9. Naming

Icon names should describe meaning rather than visual appearance.

Good:

```text
search
settings
download
delete
calendar
certificate
```

Avoid:

```text
circle-blue
purple-icon
small-arrow
dashboard-icon-2
```

Semantic names make the system maintainable.

---

# 10. Naming Convention

Use one consistent naming convention.

Recommended:

```text
kebab-case
```

Examples:

```text
arrow-left
arrow-right
chevron-down
book-open
graduation-cap
check-circle
circle-alert
```

Do not mix:

```text
arrowLeft
arrow_left
ArrowLeft
arrow-left
```

inside the same registry.

---

# 11. Categories

Icons should be organized semantically.

Recommended categories:

```text
Navigation
Actions
Communication
Learning
Assessment
Users
Commerce
Media
Status
Files
Calendar
Analytics
Gamification
System
```

---

# 12. Navigation Icons

Examples:

```text
dashboard
menu
home
arrow-left
arrow-right
chevron-down
chevron-left
chevron-right
sidebar
logout
```

The student dashboard design uses navigation icons for items such as Dashboard, Courses, Learning, Assignments, Exams, Grades, Certificates, Notifications, Wallet, Profile and Settings.

---

# 13. Learning Icons

Recommended:

```text
book
book-open
play
pause
lesson
video
file
headphones
clock
bookmark
check-circle
```

The Lesson Player specifically includes icons for video, PDF, quiz, assignment and webinar content types.

---

# 14. Assessment Icons

Recommended:

```text
quiz
question
check
x
clock
alert
score
certificate
```

These may represent:

* Exams
* Questions
* Passing
* Failure
* Time
* Results

---

# 15. Assignment Icons

Recommended:

```text
clipboard
file
upload
download
paperclip
check-circle
clock
alert
```

Assignment interfaces may include drag-and-drop upload, allowed file types and deadlines.

---

# 16. Communication Icons

Recommended:

```text
mail
message
bell
send
reply
forward
phone
video
```

Use consistent icons across:

* Messages
* Notifications
* Discussions
* Comments
* Support

---

# 17. User Icons

Recommended:

```text
user
users
user-plus
user-check
user-x
profile
```

Avatar remains responsible for actual user imagery.

Icon should be used when a symbolic user representation is required.

---

# 18. Commerce Icons

Potential icons:

```text
cart
wallet
credit-card
receipt
tag
discount
money
```

Commerce modules should use the centralized Icon system.

---

# 19. Media Icons

Recommended:

```text
play
pause
volume
volume-off
fullscreen
fullscreen-exit
image
video
music
file
```

Media controls should use consistent icon sizes and interaction states.

---

# 20. File Icons

Recommended:

```text
file
file-text
file-pdf
file-image
file-video
file-audio
file-code
download
upload
```

File-type icons should communicate file categories.

Do not use hundreds of unnecessary file-specific icons.

---

# 21. Status Icons

Recommended:

```text
check
check-circle
info
alert
alert-circle
x
x-circle
clock
loader
```

Status icons should be paired with appropriate text where necessary.

Do not rely exclusively on color.

---

# 22. Gamification Icons

Potential icons:

```text
trophy
medal
star
flame
target
award
crown
```

The dashboard designs use achievement, streak and reward concepts with icons and badge-like visuals.

---

# 23. Analytics Icons

Recommended:

```text
chart
chart-line
chart-bar
chart-pie
trend-up
trend-down
activity
```

Use icons to support the meaning of metrics, not replace the metric itself.

---

# 24. Calendar Icons

Recommended:

```text
calendar
calendar-days
clock
schedule
```

Useful for:

* Deadlines
* Exams
* Webinars
* Assignments
* Events
* Learning schedule

The student dashboard contains calendar-driven learning items and deadlines.

---

# 25. Icon Size

Recommended standard sizes:

```text
12
16
20
24
32
40
48
```

The exact values should come from Design Tokens.

Default UI icon:

```text
24px
```

Compact UI:

```text
16px
```

Large visual icon:

```text
32px+
```

---

# 26. Icon Size Rules

Icon size should normally match the surrounding component.

Examples:

```text
Button → 16–20px
Input → 16–20px
Navigation → 20–24px
Card → 20–24px
Empty State → 40–48px
Hero → 48px+
```

Do not arbitrarily resize icons per page.

---

# 27. Icon and Text

When Icon appears with text:

```text
[ 🔍 ] جستجو
```

spacing should be controlled by the parent component.

Use:

```text
gap
```

instead of manually applying directional margins.

---

# 28. RTL Spacing

Iran LMS is RTL-first.

Do not assume:

```css
margin-left
```

or:

```css
margin-right
```

for icon positioning.

Prefer:

```text
gap
margin-inline
padding-inline
```

where appropriate.

---

# 29. Directional Icons

Some icons are directional:

```text
arrow-left
arrow-right
chevron-left
chevron-right
```

Their semantic direction must remain clear.

In RTL interfaces, navigation semantics should determine whether an icon is mirrored.

Do not blindly flip every SVG.

---

# 30. Mirroring

Icons that represent physical direction may need RTL mirroring.

Examples:

```text
Arrow
Chevron
Undo
Redo
Reply
Forward
```

Icons that represent concepts rather than direction generally should not be mirrored.

Examples:

```text
Search
Settings
Calendar
Bell
Heart
Star
```

---

# 31. Icon Direction API

Where appropriate, support:

```text
auto
ltr
rtl
none
```

Example:

```text
Icon
    name="arrow-right"
    direction="auto"
```

The exact implementation is determined by the Icon system.

---

# 32. Stroke Style

Iran LMS should maintain a consistent icon visual language.

Recommended default:

```text
Outline / Stroke
```

with controlled stroke width.

Do not mix:

```text
Heavy filled
Thin outline
3D
Gradient
```

randomly.

---

# 33. Stroke Width

A standard stroke width should be defined.

Recommended baseline:

```text
2px
```

The actual SVGs must be normalized to the project icon grid.

---

# 34. Filled Icons

Filled icons may be used when:

* The icon is a selected navigation item.
* A strong status needs emphasis.
* A visual brand treatment requires it.

Example:

```text
Active:
[ filled home ]

Inactive:
[ outline home ]
```

This can improve navigation state recognition.

---

# 35. Icon Consistency

Icons placed next to each other should have:

* Similar optical size
* Similar stroke weight
* Similar visual density
* Consistent corner treatment

Avoid mixing unrelated icon families.

---

# 36. Optical Alignment

Two icons with identical mathematical dimensions may not appear equally sized.

Therefore the Icon System should support optical normalization.

For example:

```text
Search
User
Bell
```

may require slight visual adjustments while maintaining the same bounding box.

---

# 37. Icon Color

Icon color should normally inherit from the parent.

Example:

```css
color: currentColor;
```

This allows:

```text
Default
Hover
Active
Disabled
Danger
Success
```

states to be controlled by the parent.

---

# 38. Semantic Icon Colors

Recommended semantic usage:

```text
Primary
Info
Success
Warning
Danger
Neutral
Muted
```

Do not hard-code colors inside individual SVG files.

---

# 39. Dark Mode

Icons must support Dark Mode.

The preferred approach is:

```text
currentColor
```

rather than embedding a fixed fill color.

This allows the Theme-independent plugin component system to adapt automatically.

---

# 40. Accessibility

Icon accessibility depends on its role.

Three main cases:

```text
Decorative
Informative
Interactive
```

Each requires different handling.

---

# 41. Decorative Icon

Example:

```text
[ 🔍 ] جستجو
```

If the text already says "جستجو", the icon may be decorative.

Conceptually:

```html
aria-hidden="true"
```

may be used.

---

# 42. Informative Icon

Example:

```text
⚠️ پرداخت ناموفق
```

The icon reinforces meaning.

The text should still communicate the actual state.

Do not depend solely on the icon.

---

# 43. Icon-Only Button

Example:

```text
[ 🔔 ]
```

The icon is the visible label.

The Button must provide an accessible name:

```text
aria-label="اعلان‌ها"
```

The Icon itself does not need to become the accessible label if the Button already provides it.

---

# 44. Icon + Tooltip

Icon-only controls may use Tooltip.

Example:

```text
[ ⚙ ]
```

Tooltip:

```text
تنظیمات
```

Tooltip is supplementary.

Accessibility must still work without relying exclusively on hover.

---

# 45. Interactive Icon

Icon should normally be wrapped by:

```text
Button
```

or:

```text
Link
```

rather than becoming an interactive element itself.

Preferred:

```text
<Button>
    <Icon name="settings" />
</Button>
```

Avoid:

```text
<Icon onClick="..." />
```

as the primary architecture.

---

# 46. Icon Button

The Icon Button component owns:

* Click
* Keyboard interaction
* Focus
* Tooltip integration
* Accessible name
* Touch target

Icon owns only visual representation.

---

# 47. Touch Target

The icon itself can be visually small.

The interactive parent should provide an adequate touch target.

Example:

```text
Visual icon: 20px

Interactive area: larger
```

This is particularly important on mobile.

---

# 48. Loading Icon

For loading states, use the dedicated Spinner/Loader component where appropriate.

Do not create dozens of animated loading icons.

Example:

```text
[ Spinner ]
در حال بارگذاری...
```

The Icon system may contain a static loader symbol, but loading behavior belongs to Loader/Spinner.

---

# 49. Animation

Icons should normally be static.

Allowed micro-interactions include:

```text
Chevron rotation
Menu transformation
Play → Pause
Like state
Bookmark state
Loading
```

Animations should be subtle.

---

# 50. Reduced Motion

Animated icon behavior must respect:

```text
prefers-reduced-motion
```

Users who disable motion should receive a non-animated state.

---

# 51. Icon in Navigation

Navigation icons should maintain:

```text
20–24px
```

with consistent alignment.

Example:

```text
[ 🏠 ] داشبورد
[ 📚 ] دوره‌های من
[ ▶ ] ادامه یادگیری
[ 📝 ] تکالیف
[ ❓ ] آزمون‌ها
```

The student dashboard design follows this icon-based navigation pattern.

---

# 52. Icon in Cards

Card icons may communicate:

```text
Course Type
Statistic
Status
Feature
Action
```

Example:

```text
[ 🕐 ] ۱۸ ساعت
[ 👥 ] ۴,۵۶۳ دانشجو
[ 🎓 ] گواهینامه
```

The Course Dashboard design uses icons alongside course information such as duration, level, students, update date and certificate availability.

---

# 53. Icon in Progress

Progress-related icons:

```text
chart
check-circle
clock
target
```

should support the metric.

Example:

```text
[ ✓ ] ۲۳ درس تکمیل شده
[ ⏱ ] ۴۲ ساعت یادگیری
[ ◔ ] ۶۵٪ پیشرفت
```

The Student Dashboard design uses this type of icon-supported learning summary.

---

# 54. Icon in Lesson Types

Lesson types may use different icons:

```text
Video
PDF
Quiz
Assignment
Webinar
```

Example:

```text
[ ▶ ] Video
[ 📄 ] PDF
[ ? ] Quiz
[ □ ] Assignment
[ 🎥 ] Webinar
```

The actual icon names must come from the centralized registry.

---

# 55. Icon in Empty State

Empty States may use larger illustrative icons:

```text
       [ 📚 ]

هنوز دوره‌ای ندارید
```

Use a dedicated EmptyState component around the Icon.

Icon itself remains reusable.

---

# 56. Icon in Error State

Example:

```text
[ ! ]

خطایی رخ داد.
لطفاً دوباره تلاش کنید.
```

The icon should reinforce the message.

The actual error handling belongs to the Feedback system.

---

# 57. Icon in Success State

Example:

```text
[ ✓ ]

دوره با موفقیت تکمیل شد.
```

The icon reinforces success but should not be the only indication.

---

# 58. Icon in Notification

Example:

```text
[ 🔔 ] اعلان‌ها
        [3]
```

The Badge component owns the count.

The Icon owns the bell.

This separation is important.

---

# 59. Icon in Avatar

Avatar and Icon may work together.

Example:

```text
[ Avatar ] ●
```

The Avatar owns the user image.

Icon or status indicator may represent:

```text
Verified
Online
Achievement
```

Do not embed the entire status system inside Icon.

---

# 60. Icon in Badge

Example:

```text
[ ✓ تکمیل شده ]
```

Badge owns the layout.

Icon provides the check symbol.

---

# 61. Icon in Chip

Example:

```text
[ ⚛ React × ]
```

Chip owns:

* Label
* Selection
* Remove action

Icon only renders the React-related symbol if approved by the Icon system.

---

# 62. Icon in Button

Example:

```text
[ + افزودن دوره ]
```

Button owns interaction.

Icon provides:

```text
plus
```

The icon should not determine the Button's behavior.

---

# 63. Icon in Forms

Common form icons:

```text
search
calendar
eye
eye-off
lock
mail
user
upload
```

Examples:

```text
[ mail ] ایمیل
[ lock ] رمز عبور
[ eye ] نمایش رمز
```

Input and Form components own the interaction.

---

# 64. Icon in Tables

Table actions may use:

```text
edit
delete
view
download
more-horizontal
```

For icon-only actions, the surrounding Button must have an accessible name.

Example:

```text
[ ✏ ]
```

must have a semantic label such as:

```text
ویرایش دوره
```

---

# 65. More Menu

Use:

```text
more-horizontal
```

for contextual menus where appropriate.

The Menu/Dropdown component owns the actual menu.

Do not make the Icon itself responsible for opening menus.

---

# 66. Search Icon

Search icon should be consistent throughout:

```text
Header
Course Search
Lesson Search
Filters
Tables
```

Avoid using multiple visually different search icons.

---

# 67. Icon Grid

The Icon System should define a consistent internal grid.

Recommended:

```text
24 × 24
```

with SVG viewBox:

```text
0 0 24 24
```

All icons should be normalized where possible.

---

# 68. SVG Rules

Recommended SVG requirements:

```text
viewBox="0 0 24 24"
fill="none"
stroke="currentColor"
```

where compatible with the selected icon style.

Avoid unnecessary:

```text
Inline styles
Fixed colors
Embedded raster images
Unnecessary metadata
```

---

# 69. Accessibility Attributes

Decorative SVG:

```text
aria-hidden="true"
```

Informative SVG:

```text
role="img"
```

with an appropriate accessible label where required.

Interactive icon:

Use a semantic Button or Link and label the parent.

---

# 70. Security

Icons are static assets.

Do not allow arbitrary user-provided SVG markup to be injected into the Icon component.

Avoid accepting raw SVG strings from untrusted sources.

Preferred:

```text
Icon Name
    ↓
Approved Registry
    ↓
Known SVG
```

---

# 71. Performance

Icons are used frequently.

Therefore:

* Avoid unnecessarily large SVG files.
* Reuse icons.
* Normalize SVGs.
* Avoid duplicate icon assets.
* Prefer a centralized registry.
* Avoid loading an entire external icon library when only a small subset is required.

---

# 72. Theme Independence

Icon must work with:

```text
Classic Themes
Block Themes
Custom Themes
RTL Themes
Light Themes
Dark Themes
```

The plugin must not depend on Theme-specific icon classes.

---

# 73. WordPress Admin

When used inside WordPress Admin:

* Scope CSS.
* Avoid overriding WordPress icons globally.
* Avoid global SVG rules.
* Avoid replacing unrelated plugin icons.
* Preserve admin accessibility.

Avoid:

```css
svg {
}
```

as a global plugin rule.

---

# 74. Component API

Recommended:

```text
Icon
    name
    size
    color
    ariaLabel
    decorative
    direction
    className
```

Example:

```text
Icon
    name="search"
    size="20"
```

---

# 75. Example Usage

Decorative:

```text
Icon
    name="search"
    decorative=true
```

Informative:

```text
Icon
    name="check-circle"
    ariaLabel="تکمیل شده"
```

Directional:

```text
Icon
    name="arrow-right"
    direction="auto"
```

---

# 76. Icon Registry Example

Recommended initial registry:

```text
Navigation
├── home
├── menu
├── sidebar
├── arrow-left
├── arrow-right
├── chevron-left
├── chevron-right
├── chevron-up
└── chevron-down

Actions
├── plus
├── minus
├── edit
├── delete
├── close
├── check
├── download
├── upload
├── copy
└── more-horizontal

Learning
├── book
├── book-open
├── play
├── pause
├── video
├── file
├── bookmark
├── clock
└── graduation-cap

Communication
├── bell
├── mail
├── message
├── send
└── reply

Users
├── user
├── users
├── user-plus
└── user-check

System
├── search
├── settings
├── info
├── alert
├── help
└── loader
```

This list is the initial foundation, not the final complete library.

---

# 77. Do

* Use a centralized Icon System.
* Prefer SVG.
* Use semantic names.
* Use consistent sizing.
* Normalize icon geometry.
* Support RTL.
* Support Dark Mode.
* Use `currentColor`.
* Keep interaction in parent components.
* Provide accessible names where necessary.
* Scope WordPress CSS.
* Prevent arbitrary SVG injection.

---

# 78. Don't

Avoid:

* Random icon libraries per module.
* Raster images for standard icons.
* Fixed colors inside SVGs.
* Generic icon names.
* Global SVG CSS.
* Making Icon itself responsible for business logic.
* Making Icon itself responsible for Button behavior.
* Using color as the only status signal.
* Mirroring every icon automatically.
* Injecting arbitrary SVG from users.

---

# 79. Testing Requirements

Test:

```text
Search
Navigation
Actions
Learning
Assessment
Communication
User
Commerce
Status
Media
Files
```

Sizes:

```text
12
16
20
24
32
40
48
```

States:

```text
Default
Hover
Active
Disabled
Focus
Loading
```

Themes:

```text
Light
Dark
```

Directions:

```text
RTL
LTR
Mixed Content
```

Accessibility:

```text
Decorative
Informative
Icon-only Button
Screen Reader
Keyboard
Focus
```

WordPress:

```text
Frontend
Admin
Classic Theme
Block Theme
Plugin Conflict
```

---

# 80. Architecture Decision

Iran LMS follows a **Centralized Semantic Icon Architecture**:

```text
Approved Icon Registry
        ↓
Icon Name
        ↓
Icon Component
        ↓
Parent Component
        ↓
Design Tokens
        ↓
UI
```

The Icon is deliberately kept presentation-focused.

Buttons, Links, Menus, Forms and domain modules own interaction and business logic.

---

# 81. Strategic Vision

Icon is one of the most reused primitives in Iran LMS.

A centralized Icon System prevents:

* Visual inconsistency
* Duplicate SVGs
* Random icon libraries
* RTL bugs
* Accessibility problems
* Theme conflicts
* Excessive asset size

The long-term goal is a **consistent, semantic, SVG-first, RTL-aware, accessible and Theme-independent Icon System** that serves every Iran LMS module from one controlled source of truth.
