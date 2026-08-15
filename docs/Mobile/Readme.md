# README.md

**Path:** `07-Mobile/README.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile UI/UX Standards
**Version:** 1.0
**Status:** Foundation

---

# 1. هدف

پوشه `07-Mobile/` استانداردهای طراحی و رفتار رابط کاربری **Iran LMS WordPress Plugin** در نمایشگرهای کوچک را تعریف می‌کند.

این بخش یک **Mobile App مستقل** نیست.

تمرکز آن بر این است که رابط کاربری افزونه، وقتی در محیط‌های مختلف WordPress و Themeهای سازگار روی موبایل استفاده می‌شود:

* قابل استفاده باشد
* Responsive باشد
* RTL را به‌درستی پشتیبانی کند
* Touch-friendly باشد
* Accessibility مناسب داشته باشد
* Layout را نشکند
* با Moduleهای اختیاری سازگار بماند

---

# 2. جایگاه Mobile در معماری پروژه

Mobile یک لایه مستقل از Business Logic نیست.

ساختار:

```text
Iran LMS Plugin
│
├── Core
├── Modules
├── UI / Components
├── Templates
└── Mobile
      │
      ├── Responsive Rules
      ├── Touch Rules
      ├── Mobile Layout
      ├── Mobile Navigation
      └── Mobile Accessibility
```

بنابراین:

```text
Mobile
   ≠
Business Logic
```

و:

```text
Mobile
   ≠
Database
```

و:

```text
Mobile
   ≠
WordPress Plugin Core
```

Mobile فقط **نحوه ارائه و تعامل UI در فضای کوچک** را کنترل می‌کند.

---

# 3. هدف اصلی

هدف Mobile Design این پروژه:

```text
Desktop UI
    ↓
Responsive Transformation
    ↓
Mobile UI
```

است.

نه:

```text
Desktop UI
    ↓
Shrink Everything
```

---

# 4. Mobile First

برای Components جدید، رفتار Mobile باید از ابتدا در نظر گرفته شود.

اما این پروژه الزاماً یک سیستم کاملاً Mobile-First در CSS نیست.

اصل مهم‌تر:

> هیچ Component یا Templateای نباید بدون تعریف رفتار Mobile وارد وضعیت Stable شود.

---

# 5. Responsive Philosophy

Responsive فقط تغییر Width نیست.

ممکن است در Mobile:

```text
Grid
 ↓
Stack
```

یا:

```text
Sidebar
 ↓
Drawer
```

یا:

```text
Table
 ↓
Card List
```

یا:

```text
Horizontal Actions
 ↓
Vertical Actions
```

تبدیل شود.

---

# 6. Breakpoints

Breakpoints باید از سیستم Responsive مرکزی پروژه استفاده کنند.

از تعریف Breakpoint اختصاصی برای هر Component خودداری شود.

مثلاً:

```text
Mobile
Tablet
Desktop
Large Desktop
```

اما مقدار دقیق Breakpoint باید در Design System پروژه تعیین شود.

---

# 7. Mobile Layout

در Mobile اولویت با:

```text
Content
 ↓
Primary Action
 ↓
Secondary Action
 ↓
Optional Content
```

است.

اطلاعات غیرضروری نباید فضای اصلی صفحه را اشغال کنند.

---

# 8. Mobile Width

در Mobile:

```text
☐ Horizontal Overflow ممنوع
☐ Content از Viewport خارج نشود
☐ Padding مناسب باشد
☐ Cardها قابل مشاهده باشند
☐ Buttonها از صفحه بیرون نزنند
```

---

# 9. Touch Target

تمام عناصر Interactive باید برای Touch مناسب باشند.

موارد زیر:

```text
Button
Link
Checkbox
Switch
Tab
Menu
Icon Button
```

باید Hit Area مناسبی داشته باشند.

---

# 10. Touch Interaction

Mobile نباید به Hover وابسته باشد.

اشتباه:

```text
Hover
  ↓
Show Action
```

درست:

```text
Tap
  ↓
Show Action
```

یا Action باید از ابتدا قابل مشاهده باشد.

---

# 11. Hover

در Mobile:

```text
☐ هیچ Action حیاتی فقط با Hover قابل دسترسی نیست
☐ Tooltip صرفاً Hover-based نیست
☐ Navigation وابسته به Hover نیست
```

---

# 12. Mobile Navigation

Navigation افزونه باید برای فضای کوچک بازطراحی شود.

الگوی پیشنهادی:

```text
Desktop
Sidebar
   ↓
Mobile
Drawer / Bottom Navigation / Compact Header
```

بسته به Context.

---

# 13. Dashboard

Dashboard موبایل باید اطلاعات را اولویت‌بندی کند:

```text
Header
 ↓
Important Stats
 ↓
Continue Learning
 ↓
Recent Courses
 ↓
Other Information
```

اطلاعات ثانویه می‌توانند پایین‌تر قرار بگیرند.

---

# 14. Course

Course UI در Mobile باید:

```text
Course Image
Course Title
Instructor
Price / Status
Progress
Primary Action
```

را بدون شلوغی نمایش دهد.

---

# 15. Course Card

در Mobile:

```text
┌─────────────────────┐
│ Course Image        │
├─────────────────────┤
│ Course Title        │
│ Instructor          │
│ Rating              │
│ Progress            │
│                     │
│ [ ادامه یادگیری ]   │
└─────────────────────┘
```

در صورت نیاز می‌توان Layout را از Horizontal به Vertical تغییر داد.

---

# 16. Lesson

Lesson Page در Mobile باید تمرکز اصلی را روی Learning Content قرار دهد:

```text
Header
 ↓
Video / Lesson Content
 ↓
Lesson Navigation
 ↓
Notes / Bookmark
 ↓
Next Lesson
```

---

# 17. Lesson Player

Video Player باید:

```text
☐ Responsive باشد
☐ Aspect Ratio حفظ شود
☐ Controls قابل Touch باشند
☐ Fullscreen پشتیبانی شود
☐ Subtitle در صورت وجود قابل دسترس باشد
```

---

# 18. Focus Mode

Focus Mode در Mobile نیز باید قابل استفاده باشد.

هدف:

```text
Distraction
   ↓
Minimum
```

اما Navigation ضروری و کنترل‌های اصلی Learning نباید حذف شوند.

---

# 19. Curriculum

Curriculum در Mobile باید از ساختار فشرده استفاده کند:

```text
Section
 ├── Lesson
 ├── Lesson
 └── Lesson
```

Sectionها می‌توانند:

```text
Expanded
Collapsed
```

باشند.

---

# 20. Quiz

Quiz Mobile باید:

```text
Question
 ↓
Options
 ↓
Navigation
 ↓
Progress
 ↓
Submit
```

را به شکل واضح نمایش دهد.

---

# 21. Assignment

فرم Assignment در Mobile باید:

```text
Title
Description
Upload
Comment
Submit
```

را بدون نیاز به Zoom نمایش دهد.

---

# 22. Certificate

Certificate Preview باید در Mobile:

```text
☐ قابل مشاهده
☐ قابل Scroll
☐ قابل Download
```

باشد.

در صورت نیاز Preview می‌تواند Horizontal Scroll داشته باشد، ولی صفحه اصلی نباید Horizontal Overflow ایجاد کند.

---

# 23. Commerce

برای Commerce Components:

```text
Product
 ↓
Pricing
 ↓
Cart
 ↓
Checkout
 ↓
Payment
```

باید Mobile-friendly باشند.

---

# 24. Pricing

Pricing Card در Mobile ترجیحاً:

```text
┌──────────────────────┐
│ Plan                 │
│ Price                │
│ Features             │
│                      │
│ [ انتخاب دوره ]      │
└──────────────────────┘
```

باشد.

---

# 25. Cart

Cart Mobile باید اطلاعات اصلی را در اولویت قرار دهد:

```text
Product
Price
Quantity
Discount
Total
Checkout
```

---

# 26. Checkout

Checkout باید تا حد امکان ساده باشد:

```text
Customer
 ↓
Order
 ↓
Coupon
 ↓
Payment
 ↓
Confirmation
```

از فرم‌های طولانی و چندستونه در Mobile پرهیز شود.

---

# 27. Tables

Table در Mobile نباید باعث شکستن صفحه شود.

راه‌حل‌ها:

```text
Table
 ↓
Horizontal Scroll
```

یا:

```text
Table
 ↓
Responsive Card List
```

یا:

```text
Priority Columns
 ↓
Secondary Details
```

بر اساس نوع داده انتخاب شود.

---

# 28. Forms

Form در Mobile:

```text
☐ Single Column
☐ Label واضح
☐ Input بزرگ و قابل Touch
☐ Error نزدیک Input
☐ Keyboard مناسب
☐ Submit قابل مشاهده
```

---

# 29. Input Keyboard

نوع Input باید با Data هماهنگ باشد.

مثلاً:

```text
Email
→ Email Keyboard

Number
→ Numeric Keyboard

Phone
→ Telephone Keyboard
```

---

# 30. Modal

Modal در Mobile نباید صرفاً نسخه کوچک Desktop Modal باشد.

بسته به Context:

```text
Desktop:
Centered Modal

Mobile:
Bottom Sheet / Fullscreen Dialog
```

می‌تواند استفاده شود.

---

# 31. Drawer

Drawer باید:

```text
☐ قابل بازکردن با Touch
☐ قابل بستن با Escape در Keyboard
☐ قابل بستن با Backdrop
☐ Focus را مدیریت کند
```

باشد.

---

# 32. Popover / Dropdown

Popoverهای کوچک Desktop در Mobile ممکن است مناسب نباشند.

در صورت نیاز:

```text
Popover
 ↓
Bottom Sheet
```

تبدیل شود.

---

# 33. Toast / Snackbar

Feedbackهای کوتاه باید:

```text
☐ خوانا باشند
☐ روی Content اصلی قرار نگیرند
☐ قابل Dismiss باشند
☐ برای اطلاعات حیاتی تنها روش اطلاع‌رسانی نباشند
```

---

# 34. Empty State

Empty State در Mobile باید کوتاه باشد:

```text
Icon
Title
Short Description
CTA
```

از متن‌های طولانی پرهیز شود.

---

# 35. Loading

Loading در Mobile نباید Layout Shift شدید ایجاد کند.

ترجیح:

```text
Skeleton
```

برای Contentهای بزرگ و:

```text
Inline Loader
```

برای Actionهای کوچک.

---

# 36. Images

تصاویر باید:

```text
☐ Responsive
☐ Optimized
☐ دارای Aspect Ratio مشخص
☐ دارای Fallback
```

باشند.

---

# 37. Typography

Typography Mobile باید:

```text
☐ خوانا
☐ مناسب Touch UI
☐ دارای Line Height مناسب
☐ بدون متن خیلی ریز
```

باشد.

---

# 38. RTL Mobile

تمام قوانین RTL باید در Mobile نیز حفظ شوند:

```text
RTL
 ↓
Mobile RTL
```

بررسی:

```text
☐ Text
☐ Icons
☐ Navigation
☐ Forms
☐ Cards
☐ Progress
☐ Breadcrumb
```

---

# 39. Mobile Accessibility

Mobile باید برای:

```text
Touch
Keyboard
Screen Reader
Zoom
Large Text
```

قابل استفاده باشد.

---

# 40. Mobile Zoom

کاربر نباید برای انجام Actionهای اصلی مجبور به Zoom شود.

```text
☐ Form
☐ Button
☐ Navigation
☐ Checkout
☐ Quiz
```

باید بدون Zoom قابل استفاده باشند.

---

# 41. Orientation

در صورت نیاز:

```text
Portrait
Landscape
```

بررسی شود.

به‌خصوص:

```text
Video Player
Tables
Charts
Course Content
```

---

# 42. Performance

Mobile معمولاً محدودیت بیشتری دارد.

بنابراین:

```text
☐ JavaScript غیرضروری Load نشود
☐ Image بزرگ بدون Optimization استفاده نشود
☐ Animation سنگین نباشد
☐ API Request غیرضروری وجود نداشته باشد
☐ Componentهای غیرضروری Render نشوند
```

---

# 43. WordPress Plugin Constraint

این بخش بسیار مهم است:

`07-Mobile` نباید فرض کند که Iran LMS مالک کل صفحه WordPress است.

افزونه ممکن است داخل Themeهای مختلف اجرا شود.

بنابراین:

```text
Theme
   ↓
WordPress
   ↓
Iran LMS Plugin
```

و:

```text
Iran LMS Mobile UI
```

باید تا حد امکان **Theme-independent** باشد.

---

# 44. Theme Compatibility

Mobile UI نباید با CSS Theme باعث:

```text
☐ Overflow
☐ Broken Grid
☐ Wrong Font Size
☐ Wrong Button Style
☐ Broken Form
☐ Broken Modal
```

شود.

---

# 45. CSS Isolation

در صورت نیاز باید از Namespace یا Strategy مناسب برای جلوگیری از CSS Collision استفاده شود.

مثلاً:

```text
iran-lms
```

به عنوان Namespace منطقی.

---

# 46. Plugin vs Theme Responsibility

```text
Plugin
→ Component Behavior
→ Responsive Rules
→ Accessibility
→ LMS UI

Theme
→ Global Site Styling
→ Header
→ Footer
→ Site Branding
```

مرز این دو نباید شکسته شود.

---

# 47. Optional Modules

Mobile UI باید با Moduleهای اختیاری نیز سازگار باشد.

مثلاً:

```text
Course
├── Certificate
├── Wallet
├── Gamification
└── Attendance
```

اگر Module غیرفعال شود:

```text
Course
```

نباید خراب شود.

---

# 48. Mobile Module Rule

```text
Module Enabled
    ↓
Mobile Feature Visible

Module Disabled
    ↓
Mobile Feature Removed
    ↓
Layout Reflows
```

---

# 49. Testing Devices

حداقل تست:

```text
☐ Small Mobile
☐ Standard Mobile
☐ Large Mobile
☐ Tablet
```

و در صورت امکان:

```text
☐ Android
☐ iOS
```

---

# 50. Browser Testing

حداقل:

```text
☐ Chrome Mobile
☐ Safari iOS
```

و در صورت نیاز Browserهای دیگر.

---

# 51. Mobile QA Checklist

قبل از Stable شدن هر Mobile UI:

```text
☐ No Horizontal Overflow
☐ Touch Targets
☐ RTL
☐ Typography
☐ Forms
☐ Navigation
☐ Loading
☐ Empty State
☐ Error State
☐ Accessibility
☐ Dark Mode
☐ Theme Compatibility
☐ Optional Modules
☐ Performance
```

---

# 52. اصول نهایی

Mobile Design در Iran LMS یعنی:

```text
Responsive
      +
Touch Friendly
      +
RTL
      +
Accessible
      +
Fast
      +
Theme Independent
      +
Module Independent
```

و نه:

```text
Desktop UI
     ↓
Scale Down
```

---

# 53. ساختار این بخش

فایل‌های داخل `07-Mobile/` باید هرکدام یک موضوع مشخص را پوشش دهند و با Componentهای `06-Components/` هماهنگ باشند:

```text
06-Components/
       ↓
Component Definition

07-Mobile/
       ↓
Mobile Behavior
```

بنابراین اگر مثلاً `CourseCard.md` در Components تعریف شده باشد، Mobile Design آن نباید یک CourseCard جدید بسازد؛ بلکه **رفتار همان Component در Mobile** را تعریف می‌کند.

---

# 54. Final Rule

> **07-Mobile بخشی از UI/UX افزونه Iran LMS است، نه یک سیستم مستقل.**

هر تصمیم Mobile باید با این چهار اصل سازگار باشد:

```text
Iran LMS Plugin
        +
WordPress Compatibility
        +
Design System
        +
Responsive UX
```

و هیچ تصمیم Mobile نباید باعث وابستگی اجباری افزونه به یک Theme خاص، Page Builder خاص یا Module اختیاری شود.
