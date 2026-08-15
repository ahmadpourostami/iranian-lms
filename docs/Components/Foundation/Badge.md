# Badge

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Informational Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Badge is a compact UI component used to communicate a short piece of contextual information.

In Iran LMS, Badge is used for:

* Status
* Category
* Course progress
* Exam type
* Achievement
* New content
* Popular content
* Featured content
* Notification counts
* Verification states
* Content labels
* User roles
* Small metadata

Badge should communicate information quickly without requiring the user to read a long description.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Badge must be:

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

Badge must not contain business logic.

---

# 3. Badge Is Not a Button

A Badge communicates information.

A Button performs an action.

Correct:

```text
[ تکمیل شده ]
```

Incorrect:

```text
[ مشاهده نتیجه ]
```

The second one is an action and should use Button.

---

# 4. Badge Is Not a Chip

Badge and Chip may look visually similar, but their purpose is different.

### Badge

Used primarily to communicate status or metadata:

```text
[ تکمیل شده ]
[ جدید ]
[ ۷۲٪ ]
```

### Chip

Usually represents:

* User-selected filters
* Removable values
* Tags
* Interactive categories

Example:

```text
[ React × ]
[ طراحی × ]
```

The distinction must remain consistent across the Design System.

---

# 5. Common LMS Examples

The current Iran LMS designs use Badge patterns such as:

```text
[ ۶۰٪ ]
[ ۴۴٪ ]
[ ۷۲٪ ]
[ ۳۰٪ ]
```

for course progress.

Exam interfaces also use status and type badges:

```text
[ تکمیل شده ]
[ پیش رو ]
[ در حال انجام ]

[ پایانی ]
[ میان‌ترم ]
[ کوتاه ]
```

---

# 6. Anatomy

A Badge may contain:

```text
Icon
+
Label
+
Optional Count
```

Example:

```text
[ ✓ تکمیل شده ]
```

or:

```text
[ ۷۲٪ ]
```

or:

```text
[ جدید ]
```

Keep Badge content short.

---

# 7. Basic Badge

Simple informational Badge:

```text
[ جدید ]
```

Recommended for:

* New courses
* New lessons
* New features
* Recently published content

---

# 8. Status Badge

Status Badge communicates the current state of an entity.

Examples:

```text
[ تکمیل شده ]
[ در حال انجام ]
[ پیش رو ]
[ لغو شده ]
[ منقضی شده ]
```

The status vocabulary should come from the corresponding domain module.

---

# 9. Semantic Status

Badge colors should communicate semantic meaning consistently.

Recommended semantic categories:

```text
Neutral
Info
Success
Warning
Danger
Primary
```

Example:

```text
Success
[ تکمیل شده ]

Warning
[ نیاز به اقدام ]

Danger
[ تأخیر ]

Info
[ در حال بررسی ]
```

Do not assign colors arbitrarily on individual pages.

---

# 10. Color Is Not the Only Signal

Do not communicate status using color alone.

Bad:

```text
Green = completed
Red = failed
```

without text or icon.

Better:

```text
[ ✓ تکمیل شده ]
```

or:

```text
[ ! تأخیر ]
```

This improves accessibility and comprehension.

---

# 11. Progress Badge

Badge may display course progress:

```text
[ ۶۰٪ ]
```

The existing My Courses interface uses percentage badges on course cards.

Examples:

```text
[ ۲۵٪ ]
[ ۵۰٪ ]
[ ۷۲٪ ]
[ ۸۰٪ ]
```

Progress Badge should remain concise.

---

# 12. Progress vs Progress Bar

Badge communicates the number.

Progress Bar communicates the visual magnitude.

Use together when appropriate:

```text
[ ۷۲٪ ]

████████████░░░░
```

The Badge should not replace a Progress component when the visual progress itself is important.

---

# 13. Achievement Badge

Achievements may use a Badge-like visual representation.

Examples from the LMS UI include:

```text
[ ۷ روز پشت سر هم ]
[ یادگیرنده پیشرفته ]
[ تکمیل ۱۰ درس ]
[ آزمون موفق ]
```

Achievement presentation may be richer than a normal Badge, but it should use the same semantic foundation.

---

# 14. Course Badge

Course cards may use labels such as:

```text
[ محبوب ]
[ پرفروش ]
[ جدید ]
```

The homepage design uses labels such as «محبوب»، «پرفروش» and «جدید» on course cards.

These should be treated as metadata, not actions.

---

# 15. Exam Type Badge

Exam types may use:

```text
[ پایانی ]
[ میان‌ترم ]
[ کوتاه ]
```

The exam dashboard uses these as compact metadata indicators.

---

# 16. Notification Count Badge

Badge can also display a small count:

```text
🔔 ③
```

or visually:

```text
🔔
  ●3
```

Current LMS dashboard concepts use notification badges such as `3`.

This variant should remain visually compact.

---

# 17. Count Badge

Count Badge may display:

```text
[ 12 ]
```

Examples:

```text
پیام‌ها       [ ۳ ]

تکالیف         [ ۱۲ ]

دوره‌ها        [ ۸ ]
```

Use Count Badge only when the number itself is meaningful.

---

# 18. Maximum Count

For notification-style badges, large numbers may be shortened:

```text
[ 9 ]
[ 99 ]
[ 99+ ]
```

Do not allow large numbers to make compact UI controls excessively wide.

---

# 19. Verification Badge

Badge may represent verification:

```text
✓ مدرس تأییدشده
```

or as a compact icon near a user name.

The instructor profile concept uses a verification-style badge next to the instructor identity.

If the Badge is icon-only, accessible labeling is required.

---

# 20. Role Badge

Badge can represent a user role:

```text
[ مدرس ]
[ دانشجو ]
[ مدیر ]
```

The role should be derived from the actual authorization/domain model.

Do not let the UI Badge determine the user's permission level.

---

# 21. Badge Sizes

Recommended sizes:

```text
Small
Medium
Large
```

Default:

```text
Medium
```

### Small

For:

* Notification counts
* Dense tables
* Compact metadata

### Medium

Default for:

* Cards
* Lists
* Tables
* Dashboards

### Large

For:

* Hero sections
* Featured achievements
* Important promotional states

---

# 22. Badge Shape

Badge should generally use:

```text
Pill
```

for compact labels.

Example:

```text
╭────────────╮
│ تکمیل شده  │
╰────────────╯
```

However, the Design System may also support rounded-rectangle variants.

Do not introduce arbitrary border radii per page.

---

# 23. Icon + Text

Badge may contain an icon.

Example:

```text
[ ✓ تکمیل شده ]
```

Recommended icons:

```text
Success → Check
Warning → Alert
Info → Info
Danger → Alert
```

Icons should reinforce the meaning rather than add decoration only.

---

# 24. Icon Spacing

Spacing between icon and text must use logical spacing.

For RTL:

```text
[ ✓ تکمیل شده ]
```

should remain visually balanced.

Do not hard-code:

```css
margin-left
margin-right
```

when logical properties can be used.

Prefer:

```css
gap
```

or logical spacing tokens.

---

# 25. Persian Numerals

Where appropriate, user-facing numeric Badge content should follow the project's localization rules.

Examples:

```text
[ ۷۲٪ ]
[ ۱۲ ]
[ ۳ ]
```

rather than forcing Western digits in Persian UI.

The actual localization strategy belongs to the global formatting system.

---

# 26. Percentage Badge

Percentage values should be short.

Correct:

```text
[ ۷۲٪ ]
```

Avoid:

```text
[ میزان پیشرفت دوره: ۷۲ درصد ]
```

The latter is too verbose for Badge.

Use a label or text component for detailed information.

---

# 27. Date Badge

Badge can represent compact date information:

```text
[ امروز ]
[ جدید ]
```

but should not replace full date/time information when precision matters.

For example:

```text
[ امروز ]
۱۴۰۴/۰۳/۲۸ - ۱۸:۲۰
```

---

# 28. Status Vocabulary

Iran LMS should maintain a controlled vocabulary.

Example:

```text
Course
فعال
غیرفعال
منتشر شده
پیش‌نویس

Enrollment
فعال
تکمیل شده
لغو شده

Assessment
پیش رو
در حال انجام
تکمیل شده
منقضی شده

Assignment
نیاز به اقدام
تحویل داده شده
ارزیابی شده
تأخیر
```

Badge should display the vocabulary but not define the business rules.

---

# 29. Empty Badge

Do not render an empty Badge:

```text
[       ]
```

If there is no meaningful content, do not render the component.

---

# 30. Truncation

Badge text should generally remain short.

If truncation is necessary:

```text
[ مدرس توسعه... ]
```

provide an accessible full value.

Do not truncate critical statuses in a way that makes them ambiguous.

---

# 31. Wrapping

Badge should normally remain on one line.

Avoid multi-line Badge labels unless the design explicitly requires it.

If the content is too long:

* Shorten the label.
* Use Tooltip.
* Use regular Text.
* Use a Card/List description.

---

# 32. Tooltip

Tooltip may provide additional context.

Example:

```text
[ گواهینامه ]
```

Tooltip:

```text
گواهینامه این دوره برای شما صادر شده است.
```

Tooltip should supplement, not replace, essential visible information.

---

# 33. Accessibility

Badge should not create accessibility barriers.

Requirements:

* Sufficient contrast
* Meaningful text
* No color-only semantics
* Proper icon labeling
* Screen-reader compatibility
* Keyboard independence when non-interactive

---

# 34. Non-Interactive Badge

Default Badge should not be focusable.

Example:

```text
[ تکمیل شده ]
```

It communicates information only.

Do not add:

```text
tabindex="0"
```

unless there is an actual interaction.

---

# 35. Interactive Badge

If a Badge becomes clickable, it is no longer purely informational.

Example:

```text
[ React × ]
```

may represent a removable filter.

In that case, use:

```text
Chip
```

or another appropriate interactive component.

Do not turn Badge into a generic clickable element.

---

# 36. Screen Reader

A textual Badge should naturally be announced as its content.

For icon-only Badge:

```text
[ ✓ ]
```

provide an accessible name such as:

```text
تکمیل شده
```

---

# 37. Dark Mode

Badge must support the shared Dark Mode system.

Every semantic state must remain distinguishable:

```text
Primary
Info
Success
Warning
Danger
Neutral
```

Do not simply invert light-mode colors.

---

# 38. Design Tokens

Recommended tokens:

```text
badge-height-sm
badge-height-md
badge-height-lg

badge-padding-inline-sm
badge-padding-inline-md
badge-padding-inline-lg

badge-gap

badge-radius

badge-font-size-sm
badge-font-size-md
badge-font-size-lg

badge-primary-background
badge-primary-text

badge-info-background
badge-info-text

badge-success-background
badge-success-text

badge-warning-background
badge-warning-text

badge-danger-background
badge-danger-text

badge-neutral-background
badge-neutral-text
```

The source of truth is:

```text
05-UI/28-Design-Tokens.md
```

---

# 39. Theme Independence

Badge must not depend on a specific WordPress Theme.

It should work with:

```text
Classic Themes
Block Themes
Custom Themes
RTL Themes
Dark Themes
Light Themes
```

The component uses Iran LMS Design Tokens rather than arbitrary Theme styles.

---

# 40. WordPress Admin

When used inside WordPress Admin:

* Scope CSS.
* Avoid modifying global WordPress badges.
* Avoid conflicts with other plugins.
* Keep selectors isolated.
* Preserve WordPress accessibility behavior.

Avoid:

```css
.badge {
}
```

as a global selector.

Prefer a project-scoped class such as:

```css
.iran-lms-badge {
}
```

according to the final CSS naming strategy.

---

# 41. Module Usage

Badge may be consumed by:

```text
Courses
Learning
Enrollments
Assessments
Assignments
Certificates
Communication
Gamification
Notifications
Commerce
Users
Reports
```

Modules should not create independent visual versions of Badge.

---

# 42. Course Card

Example:

```text
┌──────────────────────────────┐
│ [ محبوب ]                    │
│                              │
│     Course Thumbnail         │
│                              │
│ طراحی تجربه کاربری           │
│ سارا رضایی                   │
│                              │
│ [ ۶۰٪ ]                      │
└──────────────────────────────┘
```

Badge communicates compact metadata while the Card provides the complete information.

---

# 43. Exam Table

Example:

```text
آزمون نهایی React

[ پایانی ]

[ تکمیل شده ]

85%
```

Different badges may communicate different dimensions:

```text
Type
Status
```

Do not combine unrelated meanings into one Badge.

---

# 44. Assignment Status

Example:

```text
[ تحویل داده شده ]
[ نیاز به اقدام ]
[ ارزیابی شده ]
[ تأخیر ]
```

These statuses should come from the Assignment domain.

---

# 45. Certificate

Possible:

```text
[ معتبر ]
[ منقضی شده ]
[ در حال بررسی ]
```

The Certificate module defines the state.

Badge only renders it.

---

# 46. Wallet

Wallet transaction types can use badges.

Example:

```text
[ خرید ]
[ شارژ ]
```

The Wallet UI uses transaction type badges such as «خرید» and «شارژ».

Status can be displayed separately:

```text
[ موفق ]
```

Do not combine transaction type and status into one Badge.

---

# 47. Multiple Badges

Multiple Badges may appear together.

Example:

```text
[ محبوب ] [ جدید ] [ پرفروش ]
```

Use sparingly.

Too many badges reduce their informational value.

Recommended:

```text
Maximum 1–3 contextual badges
```

depending on the available space.

---

# 48. Priority

If multiple badges exist, establish priority.

Example:

```text
Primary Status
    ↓
Important State
    ↓
Secondary Metadata
```

Do not make every Badge visually dominant.

---

# 49. Badge Placement

Common placements:

```text
Card Header
Card Thumbnail
Table Cell
List Item
Avatar
Page Heading
Notification Icon
```

Badge placement should be consistent across the component system.

---

# 50. Thumbnail Badge

Course cards may place Badge over the thumbnail:

```text
┌─────────────────────────────┐
│ [ محبوب ]                   │
│                             │
│       Thumbnail             │
│                             │
└─────────────────────────────┘
```

Ensure sufficient contrast against the image.

A surface or backdrop may be required.

---

# 51. Avatar Badge

A small Badge may appear on an Avatar:

```text
   ┌─────┐
   │ 👤  │●
   └─────┘
```

Typical meanings:

```text
Online
Verified
Instructor
Achievement
```

The meaning must be clear and accessible.

---

# 52. Notification Badge

Notification count Badge is a specialized compact variant.

Example:

```text
🔔
 ●3
```

It should:

* Remain compact.
* Avoid excessive width.
* Support 99+ behavior.
* Remain readable in Dark Mode.
* Have an accessible announcement.

---

# 53. Loading

Badge itself normally does not need a loading state.

If the underlying data is loading, use:

```text
Skeleton
```

or another appropriate loading component.

Avoid displaying:

```text
[ ... ]
```

as a fake Badge state.

---

# 54. Animation

Badges should use minimal animation.

Avoid continuous pulsing.

Appropriate cases:

```text
New notification
Important status change
Achievement unlocked
```

Even then, animation should be subtle.

Respect:

```text
prefers-reduced-motion
```

---

# 55. Security

Badge is presentation-only.

It must never be used to determine:

```text
Permission
Role
Access
Payment
Enrollment
Certificate Validity
```

For example:

```text
[ مدیر ]
```

does not grant admin privileges.

The backend remains authoritative.

---

# 56. Data Safety

Badge content may originate from:

```text
Database
REST API
WordPress Metadata
User Input
Course Data
Assessment Data
```

Dynamic values must be escaped according to the rendering context.

Do not output raw user-controlled HTML.

---

# 57. Component API

Recommended properties:

```text
label
variant
size
icon
count
status
className
ariaLabel
```

Possible variants:

```text
neutral
primary
info
success
warning
danger
```

The exact implementation API may vary by frontend technology.

---

# 58. Example API

Conceptually:

```text
Badge
    label="تکمیل شده"
    variant="success"
    icon="check"
    size="md"
```

Progress:

```text
Badge
    label="۷۲٪"
    variant="primary"
    size="sm"
```

Exam:

```text
Badge
    label="پایانی"
    variant="primary"
```

---

# 59. Do

* Keep content short.
* Use semantic variants.
* Use controlled status vocabulary.
* Support RTL.
* Support Persian numerals.
* Use Design Tokens.
* Keep Badge non-interactive by default.
* Provide accessible labels for icon-only variants.
* Use color together with text/icon.
* Scope CSS for WordPress.
* Keep business logic outside the component.

---

# 60. Don't

Avoid:

* Using Badge as Button.
* Making every Badge clickable.
* Using color as the only status signal.
* Putting paragraphs inside Badge.
* Allowing uncontrolled wrapping.
* Creating page-specific Badge styles.
* Hard-coding colors.
* Using Badge to enforce permissions.
* Exposing unsanitized dynamic content.
* Creating separate RTL/LTR Badge implementations.

---

# 61. Testing Requirements

Test:

```text
Neutral
Primary
Info
Success
Warning
Danger

Small
Medium
Large

Text
Icon + Text
Count
Percentage

Light Mode
Dark Mode

RTL
LTR

Desktop
Tablet
Mobile
```

Accessibility:

```text
Contrast
Screen Reader
Icon Label
No Unnecessary Focus
Color + Text Semantics
```

Content:

```text
Persian
English
Persian Numerals
Long Label
Short Label
99+
```

WordPress:

```text
Frontend
Admin
Block Theme
Classic Theme
Plugin Conflict
```

---

# 62. Architecture Decision

Iran LMS follows a **Semantic Informational Badge Architecture**:

```text
Domain State
      ↓
Status / Metadata
      ↓
Badge Variant
      ↓
Badge Component
      ↓
Design Tokens
      ↓
Visual Output
```

The Badge does not determine the domain state.

It only represents it.

---

# 63. Strategic Vision

Badge is a foundational component across Iran LMS.

It provides a unified visual language for:

* Course states
* Course progress
* Exam states
* Exam types
* Assignment states
* Certificate states
* Notification counts
* Achievements
* Categories
* Roles
* Verification
* Commerce transaction types

The long-term goal is a **consistent, semantic, RTL-first, accessible and Theme-independent Badge system** that can be reused across every Iran LMS module without duplicating visual logic.
