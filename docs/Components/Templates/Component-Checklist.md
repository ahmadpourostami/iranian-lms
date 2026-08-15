# Component-Checklist.md

**Path:** `Templates/Component-Checklist.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** UI/UX Component Quality Checklist
**Version:** 1.0
**Status:** Foundation

> این فایل چک‌لیست نهایی بررسی Componentهای UI افزونه **Iran LMS** است.
> هدف آن این است که قبل از تأیید هر Component مطمئن شویم Component از نظر طراحی، معماری، WordPress، RTL، Responsive، Accessibility، Modular Architecture و تجربه کاربری با استانداردهای پروژه هماهنگ است.

راهنمای پروژه، UI را **Modern SaaS، Full RTL Persian، Component-Based، WordPress Friendly و Modular** تعریف می‌کند و استفاده از Soft Shadow، Radius حدود 16px و Typography فارسی مانند Vazirmatn/Estedad را مشخص کرده است. 

---

# 1. How to Use

برای هر Component، این Checklist باید قبل از وضعیت `Stable` بررسی شود.

وضعیت هر مورد:

```text
☐ Not Checked
◐ Needs Review
✓ Passed
✗ Failed
N/A Not Applicable
```

قانون:

```text
Component
    ↓
Checklist
    ↓
Review
    ↓
Fix
    ↓
Re-check
    ↓
Stable
```

---

# 2. Component Identity

```text
☐ نام Component مشخص است
☐ نام با Naming Convention پروژه هماهنگ است
☐ Module مشخص است
☐ Type مشخص است
☐ Version مشخص است
☐ Status مشخص است
☐ Purpose مشخص است
```

مثال:

```text
Component: CourseCard
Module: Learning
Type: Feature Component
Status: Stable
```

---

# 3. Responsibility

```text
☐ مسئولیت اصلی Component مشخص است
☐ فقط یک مسئولیت اصلی دارد
☐ Responsibility با نام Component هماهنگ است
☐ Non-Responsibilities مشخص شده‌اند
☐ Business Logic غیرضروری وارد Component نشده
```

---

# 4. Component Boundary

بررسی شود:

```text
☐ Component بیش از حد بزرگ نیست
☐ چند Component نامرتبط در یک Component ادغام نشده‌اند
☐ امکان Composition وجود دارد
☐ Dependencyهای غیرضروری ندارد
☐ Circular Dependency ندارد
```

ساختار مطلوب:

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

---

# 5. Component Layer

مشخص شود Component در کدام Layer قرار دارد:

```text
☐ Primitive
☐ Base
☐ Composite
☐ Feature
☐ Page/Template
```

نباید Componentی که قرار است `Primitive` باشد، به Featureهای LMS وابسته شود.

---

# 6. Design System

```text
☐ Component از Design System استفاده می‌کند
☐ رنگ‌ها Token-based هستند
☐ Typography Token-based است
☐ Spacing Token-based است
☐ Radius Token-based است
☐ Shadow Token-based است
☐ Icon System رعایت شده
```

راهنمای اصلی پروژه استفاده از Design System مشترک را مبنا قرار می‌دهد. 

---

# 7. Color

```text
☐ Primary Color صحیح است
☐ Secondary/Accent صحیح است
☐ Text Color صحیح است
☐ Muted Color صحیح است
☐ Border Color صحیح است
☐ Surface Color صحیح است
☐ Success Color صحیح است
☐ Warning Color صحیح است
☐ Error Color صحیح است
```

بررسی شود:

```text
☐ رنگ Hard-coded غیرضروری وجود ندارد
☐ Meaning فقط با Color منتقل نمی‌شود
```

---

# 8. Typography

```text
☐ Font Family صحیح است
☐ Font Weight صحیح است
☐ Heading hierarchy صحیح است
☐ Body Text خوانا است
☐ Line Height مناسب است
☐ Text overflow مدیریت شده
☐ متن فارسی به‌درستی نمایش داده می‌شود
```

فونت‌های فارسی مورد اشاره در Design Guide شامل `Vazirmatn / Estedad` هستند. 

---

# 9. Spacing

```text
☐ Paddingها مطابق Spacing System هستند
☐ Marginها مطابق Spacing System هستند
☐ Gapها مطابق Spacing System هستند
☐ فاصله‌های تصادفی وجود ندارد
☐ Component در Layoutهای مختلف دچار Collapse نمی‌شود
```

از مقادیر تصادفی مانند:

```text
17px
23px
29px
37px
```

بدون دلیل طراحی استفاده نشود.

---

# 10. Radius

```text
☐ Radius از Token استفاده می‌کند
☐ Radius با سایر Components هماهنگ است
☐ Cornerها در حالت‌های مختلف یکدست هستند
```

Design Guide استفاده از UI با Radius حدود `16px` را مشخص کرده است. 

---

# 11. Shadow

```text
☐ Shadow از سیستم مرکزی استفاده می‌کند
☐ Shadow بیش از حد سنگین نیست
☐ Shadow در Dark Mode بررسی شده
☐ Shadow فقط برای ایجاد Hierarchy استفاده شده
```

---

# 12. Icon

```text
☐ Icon از Icon System استفاده می‌کند
☐ Icon اندازه مناسب دارد
☐ Icon با Text هماهنگ است
☐ Icon معنی مشخص دارد
☐ Icon به‌تنهایی اطلاعات حیاتی منتقل نمی‌کند
☐ Position آیکون در RTL صحیح است
```

راهنمای پروژه بر استفاده از Iconهای Minimal تأکید دارد. 

---

# 13. Variants

اگر Component Variant دارد:

```text
☐ همه Variantها مستند شده‌اند
☐ نام Variantها Semantic است
☐ Variantها کاربرد واقعی دارند
☐ Variant اضافی وجود ندارد
☐ Variantها با Design System هماهنگ‌اند
```

مثلاً:

```text
☐ primary
☐ secondary
☐ outline
☐ ghost
☐ danger
```

---

# 14. Sizes

```text
☐ Small
☐ Medium
☐ Large
```

در صورت نیاز:

```text
☐ Extra Large
```

بررسی:

```text
☐ Sizeها معنای مشخص دارند
☐ اندازه‌های مشابه دوباره تعریف نشده‌اند
```

---

# 15. States

حداقل:

```text
☐ Default
☐ Hover
☐ Focus
☐ Active
☐ Disabled
```

در صورت نیاز:

```text
☐ Loading
☐ Error
☐ Success
☐ Selected
☐ Checked
☐ Expanded
☐ Collapsed
☐ Locked
☐ Completed
```

---

# 16. State Consistency

```text
☐ Stateها فقط با Color مشخص نشده‌اند
☐ Disabled واقعاً غیرفعال است
☐ Loading باعث Double Action نمی‌شود
☐ Error قابل تشخیص است
☐ Success قابل تشخیص است
☐ Focus قابل مشاهده است
```

---

# 17. Interaction

```text
☐ Interaction واضح است
☐ Hover مناسب است
☐ Click Feedback وجود دارد
☐ Active State وجود دارد
☐ Loading State وجود دارد
☐ Transition منطقی است
☐ Animation مانع استفاده نمی‌شود
```

Micro-interactions پروژه شامل Hover Animation و Smooth Transition است، اما باید Minimal و کاربردی باقی بماند. 

---

# 18. Animation

```text
☐ Animation ضروری است
☐ Duration مناسب است
☐ Animation بیش از حد نیست
☐ Motion باعث حواس‌پرتی نمی‌شود
☐ Reduced Motion در نظر گرفته شده
```

---

# 19. Keyboard

برای Component تعاملی:

```text
☐ Tab قابل استفاده است
☐ Enter در صورت نیاز کار می‌کند
☐ Space در صورت نیاز کار می‌کند
☐ Escape در صورت نیاز کار می‌کند
☐ Arrow Keys در Components مناسب کار می‌کنند
☐ ترتیب Focus منطقی است
```

---

# 20. Focus

```text
☐ Focus Ring قابل مشاهده است
☐ Focus با Hover اشتباه گرفته نشده
☐ Focus در Dark Mode قابل مشاهده است
☐ Focus از Component خارج نمی‌شود
```

---

# 21. Accessibility

```text
☐ Semantic HTML
☐ Accessible Name
☐ Keyboard Support
☐ Focus Management
☐ Screen Reader Support
☐ Color Contrast
☐ Error Announcement
☐ State Announcement
```

---

# 22. Screen Reader

بررسی شود:

```text
☐ Label مناسب دارد
☐ Role صحیح دارد
☐ Stateهای مهم اعلام می‌شوند
☐ Button و Link اشتباه استفاده نشده‌اند
☐ Icon-only Action دارای Accessible Label است
```

---

# 23. RTL

Iran LMS یک محصول فارسی و RTL است.

```text
☐ direction صحیح است
☐ Text Alignment صحیح است
☐ Icon Position صحیح است
☐ Navigation صحیح است
☐ Form Layout صحیح است
☐ Spacing منطقی است
☐ Chevron Direction صحیح است
☐ Progress Direction صحیح است
```

راهنمای پروژه `Full RTL Persian` را به‌عنوان اصل پایه مشخص کرده است. 

---

# 24. RTL Logical Properties

در صورت امکان:

```text
☐ margin-inline
☐ padding-inline
☐ inset-inline
☐ border-inline
```

به جای وابستگی غیرضروری به:

```text
☐ margin-left
☐ margin-right
```

استفاده شود.

---

# 25. Persian Content

```text
☐ Text فارسی صحیح است
☐ نیم‌فاصله‌ها صحیح هستند
☐ علائم نگارشی صحیح هستند
☐ متن بیش از حد طولانی نیست
☐ متن UI طبیعی است
```

---

# 26. Number Formatting

برای Componentهای دارای عدد:

```text
☐ Number Formatter استفاده شده
☐ Persian/English Number Policy مشخص است
☐ Decimal Format صحیح است
☐ Percentage صحیح است
```

مثلاً:

```text
۹۶٪
```

مطابق UIهای مرجع پروژه قابل استفاده است. 

---

# 27. Currency

برای Commerce:

```text
☐ Currency Formatter استفاده شده
☐ تومان/ریال از Data Layer می‌آید
☐ جداکننده اعداد صحیح است
☐ Decimal Handling مشخص است
☐ Component خودش Calculation انجام نمی‌دهد
```

---

# 28. Date / Time

```text
☐ Date Formatter مرکزی استفاده شده
☐ Persian Calendar در صورت نیاز رعایت شده
☐ Timezone مشخص است
☐ Relative Time در صورت نیاز استاندارد است
```

---

# 29. Responsive

هر Component باید بررسی شود:

```text
☐ Desktop
☐ Tablet
☐ Mobile
```

---

# 30. Desktop

```text
☐ عرض مناسب
☐ Alignment صحیح
☐ Content خوانا
☐ فضای خالی مناسب
☐ Actionها قابل دسترس
```

Desktop Design Guide پروژه بر مبنای طراحی `1440px` تعریف شده است. 

---

# 31. Tablet

```text
☐ Layout نمی‌شکند
☐ Text Overflow ندارد
☐ Buttons قابل استفاده‌اند
☐ Columns در صورت نیاز Stack می‌شوند
☐ Sidebar رفتار مناسب دارد
```

---

# 32. Mobile

```text
☐ Component قابل استفاده با Touch است
☐ Hit Area مناسب است
☐ Text خوانا است
☐ Buttonها بیش از حد کوچک نیستند
☐ Horizontal Overflow ندارد
☐ Content مهم مخفی نشده
```

---

# 33. Responsive Transformation

بررسی شود که آیا Component باید:

```text
Desktop
Horizontal
```

باشد و در Mobile:

```text
Mobile
Stacked
```

شود.

صرفاً Scale کردن Component کافی نیست.

---

# 34. Dark Mode

اگر Component از Dark Mode پشتیبانی می‌کند:

```text
☐ Background
☐ Surface
☐ Text
☐ Border
☐ Icon
☐ Shadow
☐ Focus
☐ Error
☐ Success
```

بررسی شوند.

---

# 35. Theme Independence

```text
☐ Component به Theme خاص وابسته نیست
☐ CSS Theme نمی‌تواند Component را خراب کند
☐ Naming Collision کنترل شده
☐ Style Isolation مناسب است
```

---

# 36. WordPress Compatibility

```text
☐ Component در WordPress Plugin قابل استفاده است
☐ وابستگی به Theme ندارد
☐ WordPress API فقط در Layer مناسب استفاده شده
☐ Database Access ندارد
☐ WP_Query داخل Component نیست
☐ $wpdb داخل Component نیست
☐ Business Logic داخل Component نیست
```

---

# 37. Data Boundary

معماری مورد انتظار:

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

بررسی:

```text
☐ Component فقط Data موردنیاز را دریافت می‌کند
☐ Query اجرا نمی‌کند
☐ Data Transformation سنگین انجام نمی‌دهد
☐ Business Rule اجرا نمی‌کند
```

---

# 38. API Boundary

```text
☐ Component API Call مستقیم غیرضروری ندارد
☐ Loading State از Application Layer دریافت می‌شود
☐ Error State قابل نمایش است
☐ Response مستقیماً به UI Coupled نشده
```

---

# 39. Security

```text
☐ داده حساس نمایش داده نمی‌شود
☐ Token نمایش داده نمی‌شود
☐ Password نمایش داده نمی‌شود
☐ Permission از Client قابل اعتماد نیست
☐ Authorization سمت Server انجام می‌شود
```

---

# 40. Permission

اگر Action محدود به Permission است:

```text
☐ UI Permission-aware است
☐ Action غیرمجاز مخفی/Disabled می‌شود
☐ Server همچنان Authorization را بررسی می‌کند
```

---

# 41. Modular Architecture

Component باید بدون Moduleهای Optional هم سالم کار کند.

مثلاً در Lesson Player، مواردی مانند Certificate باید فقط در صورت فعال‌بودن Module نمایش داده شوند؛ خود Design Guide نیز این رفتار را صراحتاً مشخص کرده است. 

بررسی:

```text
☐ Core بدون Optional Modules کار می‌کند
☐ Module Optional Dependency اجباری نشده
☐ Disabled Module از UI حذف می‌شود
☐ Layout بعد از حذف Module نمی‌شکند
☐ Empty Space غیرضروری ایجاد نمی‌شود
```

---

# 42. Optional Module Checklist

برای هر Feature اختیاری:

```text
☐ WooCommerce
☐ SpotPlayer
☐ SkyRoom
☐ Certificate
☐ Wallet
☐ SMS
☐ Gamification
☐ Attendance
☐ Homework
☐ Survey
☐ Forum
```

در صورت استفاده:

```text
☐ Enabled State
☐ Disabled State
```

تست شود.

این Moduleها در Design Guide به‌عنوان قابلیت‌های Modular پروژه ذکر شده‌اند. 

---

# 43. Loading

```text
☐ Loading State تعریف شده
☐ Skeleton در صورت نیاز وجود دارد
☐ Spinner در جای مناسب استفاده شده
☐ Layout هنگام Loading نمی‌پرد
☐ Action تکراری جلوگیری شده
```

---

# 44. Empty State

در Componentهای Data-driven:

```text
☐ Empty State تعریف شده
☐ پیام واضح است
☐ CTA در صورت نیاز وجود دارد
☐ Empty State با Error اشتباه نشده
```

---

# 45. Error State

```text
☐ Error State وجود دارد
☐ Error Message واضح است
☐ Technical Error به کاربر نمایش داده نمی‌شود
☐ Retry در صورت نیاز وجود دارد
☐ Error فقط با رنگ نشان داده نمی‌شود
```

---

# 46. Success State

در صورت نیاز:

```text
☐ Success State وجود دارد
☐ Feedback واضح است
☐ Duplicate Feedback ایجاد نمی‌شود
☐ Toast/Notification مرکزی استفاده شده
```

---

# 47. Notification Integration

```text
☐ Toast مرکزی
☐ Snackbar مرکزی
☐ Notification Service مرکزی
```

به جای Notification اختصاصی داخل Component استفاده شود.

---

# 48. Form Component

اگر Component فرم است:

```text
☐ Label
☐ Placeholder در صورت نیاز
☐ Helper Text
☐ Error Text
☐ Required State
☐ Disabled State
☐ Loading State
☐ Validation State
```

---

# 49. Validation

تفکیک:

```text
Client/UI Validation
        +
Server/Business Validation
```

بررسی:

```text
☐ UX Validation وجود دارد
☐ Business Validation به Client واگذار نشده
```

---

# 50. Data-driven Component

اگر Component داده دریافت می‌کند:

```text
☐ Loading
☐ Success
☐ Empty
☐ Error
```

چهار State بررسی شوند.

---

# 51. Performance

```text
☐ Rendering غیرضروری ندارد
☐ Asset غیرضروری Load نمی‌شود
☐ Image Optimization رعایت شده
☐ Animation سنگین نیست
☐ Dependency غیرضروری ندارد
☐ DOM بیش از حد بزرگ نیست
```

---

# 52. Images

برای Componentهای دارای Image:

```text
☐ Alt Text
☐ Aspect Ratio
☐ Lazy Loading در صورت نیاز
☐ Fallback
☐ Broken Image State
☐ Object Fit صحیح
```

---

# 53. Interaction Feedback

کاربر باید بداند Action انجام شده:

```text
☐ Click
☐ Loading
☐ Success
☐ Error
```

مثلاً:

```text
Click
 ↓
Loading
 ↓
Success
```

---

# 54. Focus Mode

برای Components مربوط به Learning:

```text
☐ Focus Mode سازگار است
☐ Sidebar قابل حذف است
☐ Content اصلی حفظ می‌شود
☐ Navigation ضروری باقی می‌ماند
```

Design Guide برای Lesson Player حالت Focus Mode را با حذف Sidebarها و نگه‌داشتن Navigation و Notes تعریف می‌کند. 

---

# 55. Learning Components

برای Componentهای Learning بررسی شود:

```text
☐ Course Context
☐ Lesson Context
☐ Progress
☐ Completion
☐ Locked State
☐ Assessment State
```

در صورت نیاز.

---

# 56. Commerce Components

برای:

```text
ProductCard
PricingCard
Cart
Checkout
Invoice
Coupon
```

بررسی شود:

```text
☐ Price Source مشخص است
☐ Currency صحیح است
☐ Discount Source مشخص است
☐ Final Price Server-side تعیین می‌شود
☐ Payment Logic داخل UI نیست
☐ Order Logic داخل UI نیست
```

---

# 57. Component Composition

```text
☐ Component از Components موجود استفاده می‌کند
☐ Component مشابه دوباره ساخته نشده
☐ Button اختصاصی غیرضروری وجود ندارد
☐ Input اختصاصی غیرضروری وجود ندارد
☐ Badge اختصاصی غیرضروری وجود ندارد
```

---

# 58. Reusability

```text
☐ Component قابل استفاده مجدد است
☐ API آن ساده است
☐ وابستگی غیرضروری ندارد
☐ Context خاص فقط در Feature Components وجود دارد
```

---

# 59. Naming

```text
☐ PascalCase برای Component
☐ Semantic Names
☐ Booleanها واضح
☐ Variantها Semantic
☐ Eventها استاندارد
```

مثال:

```text
isLoading
isDisabled
isSelected
onChange
onSelect
```

---

# 60. Documentation

```text
☐ Purpose
☐ Responsibility
☐ Props
☐ Variants
☐ Sizes
☐ States
☐ Interaction
☐ Accessibility
☐ RTL
☐ Responsive
☐ Dark Mode
☐ Examples
☐ Testing
```

---

# 61. Example

```text
☐ Example واقعی است
☐ Example بیش از حد پیچیده نیست
☐ Example قرارداد Component را نشان می‌دهد
☐ Example شامل Business Logic نیست
```

---

# 62. Visual QA

قبل از Stable:

```text
☐ Alignment
☐ Typography
☐ Spacing
☐ Radius
☐ Shadow
☐ Color
☐ Icon
☐ State
☐ Responsive
```

---

# 63. Cross-Component QA

Component را در کنار Components دیگر بررسی کن:

```text
☐ Button
☐ Input
☐ Card
☐ Badge
☐ Modal
☐ Table
☐ Toast
```

هدف:

```text
Visual Consistency
```

---

# 64. Page Context QA

Component فقط به‌صورت Standalone بررسی نشود.

حداقل در یک Context واقعی تست شود:

```text
☐ Dashboard
☐ Course
☐ Lesson
☐ Checkout
```

بسته به نوع Component.

---

# 65. Regression

بعد از تغییر Componentهای پایه:

```text
☐ وابستگی‌ها بررسی شدند
☐ Pageهای مهم بررسی شدند
☐ Mobile دوباره بررسی شد
☐ RTL دوباره بررسی شد
☐ Dark Mode دوباره بررسی شد
```

---

# 66. Final Approval

Component فقط زمانی:

```text
Status: Stable
```

شود که:

```text
☐ Architecture Passed
☐ Design Passed
☐ UX Passed
☐ Accessibility Passed
☐ RTL Passed
☐ Responsive Passed
☐ WordPress Passed
☐ Modular Passed
☐ Security Passed
☐ Performance Passed
☐ Documentation Passed
```

---

# 67. Quick Checklist

برای Review سریع:

```text
☐ Purpose
☐ Responsibility
☐ API
☐ Variants
☐ States
☐ Design Tokens
☐ RTL
☐ Responsive
☐ Accessibility
☐ Dark Mode
☐ WordPress
☐ Modular
☐ Loading
☐ Empty
☐ Error
☐ Security
☐ Performance
☐ Documentation
```

---

# 68. Release Gate

```text
                    Component
                        │
                        ↓
                 ┌─────────────┐
                 │ Architecture│
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ Design      │
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ UX / States │
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ RTL / Mobile│
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ Accessibility│
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ WordPress   │
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ Modular     │
                 └──────┬──────┘
                        ↓
                 ┌─────────────┐
                 │ QA / Testing│
                 └──────┬──────┘
                        ↓
                    STABLE
```

---

# 69. Final Principle

یک Component در Iran LMS زمانی آماده انتشار است که فقط **زیبا** نباشد؛ بلکه:

```text
Beautiful
   +
Reusable
   +
Accessible
   +
RTL
   +
Responsive
   +
WordPress Friendly
   +
Modular
   +
Secure
   +
Maintainable
```

باشد.

و مهم‌تر از همه:

```text
UI Component
      ≠
Business Logic
      ≠
Database
      ≠
Payment
      ≠
WordPress Query
```

**Component باید یک واحد مستقل، قابل استفاده مجدد و قابل نگهداری از UI افزونه باشد که از Design System پیروی می‌کند و بدون وابستگی اجباری به Theme یا Moduleهای اختیاری کار می‌کند.**
