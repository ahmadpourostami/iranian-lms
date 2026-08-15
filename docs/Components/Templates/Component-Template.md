# Component-Template.md

**Path:** `Templates/Component-Template.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** UI/UX Component Documentation
**Version:** 1.0
**Status:** Foundation

> این فایل، **قالب استاندارد مستندسازی تمام Componentهای UI افزونه ایران LMS** است.
> هدف آن این نیست که یک Component واقعی مثل Button یا Card را تعریف کند؛ بلکه مشخص می‌کند **هر فایل Component در پوشه UI با چه ساختار، سطح جزئیات و استانداردی نوشته شود.**

راهنمای اصلی پروژه، معماری را **Modern SaaS، Full RTL Persian، Component-Based، WordPress Friendly و Modular** تعریف کرده است. همچنین برای قابلیت‌های اختیاری مانند WooCommerce، Certificate، Wallet و Gamification تأکید شده که با غیرفعال‌شدن Module، Layout نباید خراب شود. 

---

# 1. Purpose

تمام Componentهای UI پروژه باید ساختار مستندسازی یکسان داشته باشند.

برای مثال:

```text
06-Components/
│
├── Button.md
├── Input.md
├── Select.md
├── Checkbox.md
├── Switch.md
├── Badge.md
├── Avatar.md
├── Chip.md
├── Divider.md
├── Icon.md
└── Tooltip.md
```

و Componentهای تخصصی:

```text
Learning/
├── CourseCard.md
├── LessonPlayer.md
├── Curriculum.md
├── Quiz.md
├── Assignment.md
└── ...
```

همه باید از یک Template مشترک استفاده کنند.

---

# 2. Documentation Principle

هر Component باید به این سؤال‌ها پاسخ دهد:

```text
این چیست؟
چه مشکلی را حل می‌کند؟
کجا استفاده می‌شود؟
چه Stateهایی دارد؟
چه Variantهایی دارد؟
چه Props/Optionsهایی دارد؟
در Mobile چه رفتاری دارد؟
در RTL چه رفتاری دارد؟
چه Moduleهایی روی آن تأثیر دارند؟
چه چیزهایی نباید در آن قرار بگیرد؟
```

---

# 3. Component Definition

ابتدای هر فایل:

```md
# Component Name

**Component:** ...
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** ...
**Type:** ...
**Version:** 1.0
**Status:** Foundation
```

---

# 4. Component Name

نام Component باید مشخص و قابل فهم باشد.

مثال:

```text
Button
CourseCard
LessonPlayer
Invoice
Coupon
```

از نام‌های مبهم اجتناب شود:

```text
Box
Thing
Element
Widget2
NewCard
CustomBlock
```

---

# 5. Platform

در تمام Componentهای این پروژه باید مشخص باشد:

```text
Platform:
WordPress Plugin
```

چون این پروژه یک Theme مستقل نیست.

---

# 6. Module

هر Component باید Module خودش را مشخص کند.

مثلاً:

```text
Module: Core
```

یا:

```text
Module: Learning
```

یا:

```text
Module: Commerce
```

یا:

```text
Module: Feedback
```

---

# 7. Type

Type مشخص می‌کند Component چه نقشی دارد.

نمونه:

```text
Type: Base UI Component
```

```text
Type: Data Display Component
```

```text
Type: Form Component
```

```text
Type: Learning Component
```

```text
Type: Commerce Component
```

---

# 8. Status

Status پیشنهادی:

```text
Foundation
Draft
Stable
Deprecated
Experimental
```

برای Componentهای پایه، ابتدا:

```text
Status: Foundation
```

استفاده شود.

---

# 9. Purpose Section

هر فایل باید توضیح کوتاه و دقیق داشته باشد:

```md
## Purpose

Button is the primary interactive action component
used across the Iran LMS WordPress plugin.
```

در نسخه فارسی مستندات:

```md
## هدف

Button برای نمایش Actionهای اصلی و فرعی
در رابط کاربری افزونه ایران LMS استفاده می‌شود.
```

---

# 10. Responsibilities

مشخص شود Component چه کاری انجام می‌دهد.

مثلاً برای Button:

```text
- اجرای Action
- نمایش وضعیت Loading
- نمایش وضعیت Disabled
- نمایش Variantهای مختلف
```

---

# 11. Non-Responsibilities

این بخش برای جلوگیری از بزرگ‌شدن Component بسیار مهم است.

مثلاً:

```text
Button نباید:

✗ Business Logic اجرا کند
✗ مستقیماً Database را تغییر دهد
✗ API Call انجام دهد
✗ Permission را خودش تعیین کند
```

---

# 12. Architecture

هر Component باید جایگاهش در Architecture مشخص باشد.

الگوی عمومی:

```text
Page
 ↓
Section
 ↓
Component
 ↓
Primitive Component
```

مثلاً:

```text
Course Detail
 ↓
Purchase Section
 ↓
Purchase Card
 ↓
Button
```

---

# 13. Component Hierarchy

اگر Component فرزند دارد:

```text
CourseCard
│
├── CourseThumbnail
├── CourseBadge
├── CourseTitle
├── Instructor
├── Rating
├── Progress
└── ActionButton
```

این Hierarchy باید در مستندات مشخص شود.

---

# 14. Dependencies

Dependencies داخلی:

```text
Depends on:
- Button
- Badge
- Avatar
- Progress
```

اگر Dependency خارجی وجود دارد:

```text
External Dependency:
None
```

---

# 15. WordPress Dependency

Component نباید به WordPress API وابستگی غیرضروری داشته باشد.

مثلاً:

```text
UI Component
     ↓
View Model / Data
```

بهتر از:

```text
UI Component
     ↓
WP_Query
```

است.

---

# 16. Data Boundary

Component نباید مستقیماً به Database متصل شود.

```text
Database
   ↓
Repository
   ↓
Application Service
   ↓
View Model
   ↓
Component
```

---

# 17. UI/Data Separation

Component باید داده دریافت کند.

مثلاً:

```js
{
  title: "آموزش React",
  instructor: "سارا رضایی",
  progress: 60
}
```

نه اینکه خودش:

```text
Database
 ↓
Find Course
 ↓
Calculate Progress
 ↓
Render UI
```

را انجام دهد.

---

# 18. Props / Inputs

هر Component باید Inputs خود را مشخص کند.

مثال:

```text
title
description
variant
size
disabled
loading
icon
```

---

# 19. Props Table

قالب پیشنهادی:

| Property   | Type    | Required | Default   | Description   |
| ---------- | ------- | -------: | --------- | ------------- |
| `variant`  | string  |       No | `primary` | نوع نمایش     |
| `size`     | string  |       No | `md`      | اندازه        |
| `disabled` | boolean |       No | `false`   | غیرفعال‌کردن  |
| `loading`  | boolean |       No | `false`   | وضعیت Loading |

---

# 20. Required vs Optional

هر Property باید مشخص کند:

```text
Required
Optional
Conditional
```

مثلاً:

```text
icon:
Optional

href:
Conditional

onClick:
Conditional
```

---

# 21. Variants

اگر Component Variant دارد، همه باید مستند شوند.

مثلاً:

```text
Primary
Secondary
Outline
Ghost
Danger
```

---

# 22. Variant Principle

Variant نباید صرفاً برای تغییر رنگ ساخته شود.

Variant باید Meaning داشته باشد.

مثلاً:

```text
Primary
=
Main Action
```

```text
Danger
=
Destructive Action
```

---

# 23. Sizes

اگر Component اندازه دارد:

```text
sm
md
lg
```

و در صورت نیاز:

```text
xl
```

استفاده شود.

نباید برای هر Page یک اندازه جدید ایجاد شود:

```text
button-dashboard-large
button-course-large
button-checkout-large
```

---

# 24. States

هر Component باید Stateهای خود را مستند کند.

حداقل:

```text
Default
Hover
Focus
Active
Disabled
Loading
Error
```

در صورت نیاز:

```text
Selected
Checked
Expanded
Collapsed
Completed
Locked
```

---

# 25. State Matrix

قالب پیشنهادی:

| State    | Description   | Interaction              |
| -------- | ------------- | ------------------------ |
| Default  | حالت عادی     | قابل تعامل               |
| Hover    | اشاره موس     | تغییر بصری               |
| Focus    | تمرکز کیبورد  | Focus Ring               |
| Disabled | غیرفعال       | بدون تعامل               |
| Loading  | در حال پردازش | جلوگیری از Action تکراری |
| Error    | خطا           | نمایش وضعیت خطا          |

---

# 26. Interaction

هر Component تعاملی باید Interaction خود را توضیح دهد.

مثلاً:

```text
User
 ↓
Click
 ↓
Loading
 ↓
Success
 ↓
Toast
```

---

# 27. Keyboard Interaction

برای Componentهای Interactive:

```text
Tab
Enter
Space
Escape
Arrow Keys
```

در صورت نیاز تعریف شود.

---

# 28. Accessibility

هر Component باید حداقل این موارد را بررسی کند:

```text
✓ Keyboard
✓ Focus
✓ Screen Reader
✓ Contrast
✓ Semantic HTML
✓ Accessible Name
```

---

# 29. RTL

تمام Componentهای ایران LMS باید RTL-aware باشند.

```text
direction: rtl
```

اما ترجیحاً Component باید از Layout Direction سیستم استفاده کند، نه اینکه RTL را به‌صورت Hard-code در همه جا قرار دهد.

---

# 30. RTL Rules

در RTL:

```text
Text
→ Right aligned

Icon + Text
→ Layout according to semantic direction

Navigation
→ RTL-aware

Spacing
→ Logical properties
```

به جای وابستگی شدید به:

```css
margin-left
margin-right
```

در موارد مناسب از:

```css
margin-inline-start
margin-inline-end
padding-inline
```

استفاده شود.

---

# 31. Typography

Component باید از Typography مرکزی استفاده کند.

راهنمای پروژه فونت‌های فارسی مانند:

```text
Vazirmatn
Estedad
```

را در نظر گرفته است. 

Component نباید Font Family مستقل و تصادفی تعریف کند.

---

# 32. Colors

Component باید از Design Tokens استفاده کند.

مثلاً:

```text
color.primary
color.text
color.muted
color.border
color.surface
color.danger
color.success
```

نه:

```css
color: #7239ea;
```

در هر Component به‌صورت Hard-coded.

---

# 33. Spacing

Spacing باید از Spacing System پروژه استفاده کند.

مثلاً:

```text
xs
sm
md
lg
xl
```

Component نباید مقادیر تصادفی تولید کند:

```text
17px
23px
29px
37px
```

مگر اینکه نیاز طراحی مشخصی وجود داشته باشد.

---

# 34. Radius

راهنمای پروژه از Rounded UI و Radius حدود 16px استفاده می‌کند. 

بنابراین:

```text
Radius
→ Design Token
```

باشد.

نه اینکه هر Component Radius متفاوتی تعریف کند.

---

# 35. Shadow

Shadow باید از Shadow Token استفاده کند.

مثلاً:

```text
shadow-sm
shadow-md
shadow-lg
```

نه Shadowهای اختصاصی و بی‌قاعده.

---

# 36. Responsive

هر Component باید رفتار Responsive داشته باشد.

حداقل:

```text
Desktop
Tablet
Mobile
```

---

# 37. Mobile Rule

Component نباید فقط کوچک شود.

ممکن است Layout تغییر کند.

مثلاً:

```text
Desktop:
Horizontal Card

Mobile:
Stacked Card
```

---

# 38. Responsive Example

```text
Desktop

┌──────────────────────────────┐
│ Image │ Content │ Actions    │
└──────────────────────────────┘
```

Mobile:

```text
┌────────────────────┐
│ Image              │
├────────────────────┤
│ Content            │
├────────────────────┤
│ Actions            │
└────────────────────┘
```

---

# 39. Dark Mode

اگر Component از Dark Mode پشتیبانی می‌کند:

```text
Light
Dark
```

هر دو State مستند شوند.

راهنمای پروژه Dark Mode را به‌عنوان بخشی از Design System در نظر گرفته است.

---

# 40. Theme Independence

Component نباید وابسته به Theme خاص WordPress باشد.

```text
Iran LMS Plugin
       ↓
UI Components
       ↓
Any Compatible Theme
```

---

# 41. Theme Override

اگر Plugin اجازه Theme Override بدهد، Component باید قرارداد مشخص داشته باشد.

```text
Core Component
      ↓
Theme Override
```

Override نباید API داخلی Component را بشکند.

---

# 42. Modular Architecture

Component باید با Moduleهای اختیاری سازگار باشد.

مثلاً:

```text
CourseCard
├── Certificate Badge
├── Wallet Badge
├── Gamification Badge
```

اگر Module غیرفعال باشد:

```text
CourseCard
├── Certificate Badge ✗
├── Wallet Badge ✗
└── Gamification Badge ✗
```

اما:

```text
CourseCard
```

باید بدون مشکل باقی بماند.

این اصل مستقیماً با راهنمای پروژه هماهنگ است که می‌گوید Moduleهای غیرفعال باید بدون شکستن Layout حذف شوند. 

---

# 43. Optional Features

قابلیت Optional نباید باعث شود Component اصلی Dependency اجباری داشته باشد.

اشتباه:

```text
CourseCard
   ↓
Wallet
   ↓
WooCommerce
   ↓
Certificate
```

درست:

```text
CourseCard
   ├── Wallet Extension?
   ├── Certificate Extension?
   └── Gamification Extension?
```

---

# 44. Events

اگر Component Event دارد، مشخص شود:

```text
onClick
onChange
onSubmit
onOpen
onClose
onSelect
```

---

# 45. Event Responsibility

Event فقط باید Interaction را منتقل کند.

مثلاً:

```text
Button
 ↓
onClick
 ↓
Parent / Controller
```

نه:

```text
Button
 ↓
Create Order
 ↓
Process Payment
```

---

# 46. Business Logic

Business Logic نباید داخل Component UI باشد.

```text
Component
   ↓
Event
   ↓
Application Layer
   ↓
Domain Logic
```

---

# 47. Validation

اگر Form Component است:

```text
UI Validation
```

می‌تواند برای UX وجود داشته باشد.

اما:

```text
Business Validation
```

باید Server-side انجام شود.

---

# 48. Error Handling

Component باید Error را دریافت و نمایش دهد.

مثلاً:

```text
{
    status: "error",
    message: "این کد تخفیف معتبر نیست."
}
```

Component نباید Error Business Logic را خودش تولید کند مگر برای Validation کاملاً UI-level.

---

# 49. Loading

Loading باید بخشی از قرارداد Component باشد، نه اینکه هر Page یک Spinner متفاوت بسازد.

```text
loading = true
```

مثلاً:

```text
[ در حال بارگذاری... ]
```

یا Skeleton مناسب.

---

# 50. Empty State

اگر Component داده‌ای نمایش می‌دهد، در صورت نیاز Empty State آن تعریف شود.

مثلاً:

```text
CourseList
 ↓
0 items
 ↓
EmptyState
```

---

# 51. Skeleton

برای Componentهای Data-driven:

```text
Loading
 ↓
Skeleton
 ↓
Content
```

Skeleton باید ساختار واقعی Component را تقلید کند.

---

# 52. Notification

Component نباید Notification System مستقل بسازد.

در صورت نیاز:

```text
Component
 ↓
Notification Service
 ↓
Toast / Snackbar
```

از Feedback Components مرکزی استفاده شود.

---

# 53. Icon

Icon باید از Icon System پروژه استفاده کند.

```text
Icon
 ↓
Icon Library
```

نه SVGهای تکراری در هر Component.

---

# 54. Icon Meaning

Icon نباید تنها حامل Meaning مهم باشد.

مثلاً:

```text
✓ پرداخت شده
```

بهتر از:

```text
✓
```

برای Accessibility است.

---

# 55. Content Rules

متن UI باید:

* کوتاه
* واضح
* فارسی
* RTL
* قابل فهم
* Action-oriented

باشد.

---

# 56. Localization

متن‌ها نباید Hard-code انگلیسی باشند.

اشتباه:

```text
Loading...
```

در UI فارسی.

درست:

```text
در حال بارگذاری...
```

و در Implementation باید از سیستم Translation پروژه استفاده شود.

---

# 57. Persian Numbers

در UI فارسی در صورت نیاز از Number Formatter مرکزی استفاده شود.

مثلاً:

```text
1,490,000
```

به:

```text
۱٬۴۹۰٬۰۰۰
```

تبدیل شود.

---

# 58. Date Formatting

Component نباید خودش تاریخ را تبدیل کند.

```text
Date
 ↓
Date Formatter
 ↓
Component
```

مثلاً:

```text
۱۴۰۵/۰۵/۱۳
```

---

# 59. Currency Formatting

برای Commerce:

```text
Amount
 ↓
Currency Formatter
 ↓
Component
```

Component نباید خودش:

```text
amount / 10
```

یا تبدیل‌های مشابه انجام دهد.

---

# 60. Data Formatting

همین اصل برای:

```text
Date
Time
Currency
Number
Percentage
Duration
```

اعمال شود.

---

# 61. Security

Component نباید داده حساس را نمایش دهد مگر اینکه explicitly لازم باشد.

مثلاً:

```text
✗ Full Card Number
✗ CVV
✗ Password
✗ Secret Token
```

---

# 62. Permission-aware UI

اگر Action به Permission نیاز دارد:

```text
Permission
 ↓
Action Visibility
```

مثلاً:

```text
Edit Course
```

فقط برای User دارای Capability نمایش داده شود.

اما Authorization واقعی همچنان Server-side است.

---

# 63. Component API

هر Component باید API ساده و قابل پیش‌بینی داشته باشد.

مثلاً:

```text
<Badge
    variant="success"
    size="sm"
/>
```

نه API پیچیده و اختصاصی.

---

# 64. API Stability

پس از Stable شدن Component:

```text
Breaking API Change
=
Requires Versioning
```

---

# 65. Naming Convention

نام‌ها:

```text
PascalCase
```

مثلاً:

```text
CourseCard
Invoice
CouponField
ProgressTracker
```

---

# 66. Boolean Naming

برای Booleanها:

```text
isDisabled
isLoading
isSelected
isExpanded
hasError
```

بهتر از:

```text
disabledState
loadingMode
selectedValueBoolean
```

است.

---

# 67. Variant Naming

Variantها باید Semantic باشند:

```text
primary
secondary
success
warning
danger
neutral
```

نه:

```text
blue
purple
green
red
```

---

# 68. Documentation Example

هر Component در پایان می‌تواند Example داشته باشد:

```text
Example:

CourseCard
├── Title
├── Instructor
├── Rating
├── Progress
└── Action
```

---

# 69. Usage Example

در صورت نیاز:

```js
<CourseCard
    title="آموزش جامع React"
    instructor="سارا رضایی"
    progress={60}
    status="learning"
/>
```

Example باید صرفاً قرارداد Component را نشان دهد.

---

# 70. Do

```text
✓ Reuse Design Tokens
✓ Reuse Base Components
✓ Support RTL
✓ Support Accessibility
✓ Support Responsive
✓ Support Dark Mode when applicable
✓ Separate UI from Business Logic
✓ Separate UI from Database
✓ Respect Module boundaries
✓ Document all States
✓ Document all Variants
✓ Document Dependencies
```

---

# 71. Don't

```text
✗ Direct Database Access
✗ Direct Business Logic
✗ Hard-coded Colors
✗ Hard-coded Fonts
✗ Hard-coded Currency
✗ Hard-coded Dates
✗ Theme-specific assumptions
✗ WooCommerce dependency unless explicitly required
✗ Duplicate existing Components
✗ Create arbitrary spacing
✗ Create arbitrary breakpoints
✗ Hide important information only by color
```

---

# 72. Standard File Structure

هر فایل Component باید در صورت نیاز از این ترتیب پیروی کند:

```text
# Component Name

1. Metadata
2. Purpose
3. Responsibilities
4. Non-Responsibilities
5. Architecture
6. Hierarchy
7. Dependencies
8. Props / Inputs
9. Variants
10. Sizes
11. States
12. Interaction
13. Accessibility
14. RTL
15. Responsive
16. Dark Mode
17. Design Tokens
18. Data Boundary
19. WordPress Integration
20. Modular Behavior
21. Examples
22. Testing
23. Do
24. Don't
25. Final Principle
```

همه بخش‌ها برای همه Componentها اجباری نیستند؛ Component ساده‌ای مثل `Divider` به بخش‌هایی مثل Data Boundary یا WordPress Integration نیاز بسیار کمی دارد.

---

# 73. Foundation vs Feature Component

در مستندات باید مشخص شود Component از کدام نوع است.

### Foundation

```text
Button
Input
Badge
Icon
Avatar
Divider
```

### Feature

```text
CourseCard
LessonPlayer
Quiz
Assignment
Invoice
Coupon
```

Foundationها باید تا حد ممکن مستقل باشند.

Featureها می‌توانند Domain-specific باشند.

---

# 74. Component Layering

معماری پیشنهادی:

```text
Layer 1
Primitives
│
├── Icon
├── Divider
└── Typography

Layer 2
Base Components
│
├── Button
├── Input
├── Badge
└── Avatar

Layer 3
Composite Components
│
├── Card
├── Table
├── Modal
└── Dropdown

Layer 4
Feature Components
│
├── CourseCard
├── Quiz
├── Invoice
└── Coupon

Layer 5
Page / Template
│
├── Dashboard
├── Course Detail
└── Lesson Player
```

---

# 75. Dependency Direction

Dependency باید یک‌طرفه باشد:

```text
Page
 ↓
Feature
 ↓
Composite
 ↓
Base
 ↓
Primitive
```

نباید:

```text
Button
 ↓
CourseCard
```

باشد.

---

# 76. Circular Dependency

این ساختار ممنوع:

```text
CourseCard
 ↓
Invoice
 ↓
CourseCard
```

یا:

```text
Button
 ↓
Dashboard
 ↓
Button
```

---

# 77. Component Composition

به جای ساخت Componentهای بسیار بزرگ:

```text
MegaCourseComponent
```

از Composition استفاده شود:

```text
CourseCard
├── Badge
├── Thumbnail
├── Title
├── Meta
├── Progress
└── Button
```

---

# 78. Component Size

هدف:

```text
Single Responsibility
```

هر Component باید یک مسئولیت اصلی داشته باشد.

---

# 79. Reusability

Reusable بودن به معنی Generic و بی‌هویت بودن نیست.

مثلاً:

```text
CourseCard
```

باید Course-specific باشد.

اما:

```text
Button
```

باید Generic باشد.

---

# 80. Testing Template

هر فایل Component باید در صورت نیاز Testهای خودش را تعریف کند:

```text
### Functional

✓ Default
✓ Interaction
✓ Disabled
✓ Loading

### Responsive

✓ Desktop
✓ Tablet
✓ Mobile

### Accessibility

✓ Keyboard
✓ Screen Reader
✓ Focus
✓ Contrast

### RTL

✓ Persian Text
✓ Direction
✓ Icon Position
```

---

# 81. Visual QA

برای Componentهای بصری:

```text
✓ Spacing
✓ Typography
✓ Alignment
✓ Radius
✓ Shadow
✓ Color
✓ Icon
✓ State
```

بررسی شود.

---

# 82. Regression

تغییر یک Foundation Component نباید بدون بررسی Featureهای وابسته منتشر شود.

مثلاً:

```text
Button
 ↓
CourseCard
 ↓
Checkout
 ↓
Invoice
```

اگر Button تغییر کرد، Featureهای وابسته باید بررسی شوند.

---

# 83. Versioning

اگر API Component شکسته شود:

```text
Button v1
 ↓
Button v2
```

یا Migration مشخص شود.

---

# 84. Deprecation

اگر Component منسوخ شود:

```text
Status: Deprecated
```

و مشخص شود:

```text
Replacement:
NewComponent
```

---

# 85. Final Checklist

قبل از نهایی‌شدن هر Component:

```text
Metadata
☐ Name
☐ Module
☐ Type
☐ Version
☐ Status

Architecture
☐ Responsibility
☐ Non-responsibility
☐ Dependencies
☐ Hierarchy

API
☐ Props
☐ Variants
☐ Sizes
☐ States

Design
☐ Tokens
☐ Typography
☐ Spacing
☐ Radius
☐ Shadow
☐ Icons

UX
☐ Interaction
☐ Loading
☐ Error
☐ Empty State

Platform
☐ WordPress compatibility
☐ Theme independence
☐ Modular behavior

Responsive
☐ Desktop
☐ Tablet
☐ Mobile

Accessibility
☐ Keyboard
☐ Focus
☐ Screen Reader
☐ Contrast

Localization
☐ RTL
☐ Persian
☐ Translation
☐ Number formatting
☐ Date formatting
☐ Currency formatting
```

---

# 86. Final Principle

تمام Componentهای Iran LMS باید از این زنجیره پیروی کنند:

```text
Design System
      ↓
Primitive
      ↓
Base Component
      ↓
Composite Component
      ↓
Feature Component
      ↓
Page / Template
```

و از نظر معماری:

```text
WordPress
    ↓
Iran LMS Plugin
    ↓
Module
    ↓
Application / Domain
    ↓
View Model
    ↓
UI Component
```

بنابراین **Component فقط مسئول نمایش و Interaction است**؛ نه Database، نه Business Logic، نه Payment و نه WordPress Query.

این Template از اینجا به بعد **مرجع استاندارد مستندسازی Componentهای UI افزونه** خواهد بود؛ Componentهای بعدی باید با همین قرارداد نوشته شوند و اگر Component قدیمی با این قرارداد تناقض داشته باشد، در ادامه باید اصلاح شود.
