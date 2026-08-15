# Mobile-Design.md

**Path:** `07-Mobile/Mobile-Design.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile UI/UX Design System
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل اصول طراحی رابط کاربری موبایل برای **افزونه WordPress Iran LMS** را تعریف می‌کند.

هدف این فایل طراحی یک اپلیکیشن موبایل مستقل نیست؛ بلکه مشخص می‌کند UI افزونه وقتی در viewportهای کوچک WordPress نمایش داده می‌شود، چگونه باید رفتار کند.

```text
Desktop UI
    ↓
Responsive Rules
    ↓
Mobile UI
```

راهنمای اصلی پروژه، Iran LMS را یک UI مدرن SaaS، فارسی و RTL، Component-Based، WordPress Friendly و دارای معماری Modular تعریف می‌کند. 

---

# 2. Core Principles

Mobile UI باید این ویژگی‌ها را داشته باشد:

```text
Responsive
+
RTL
+
Touch Friendly
+
Accessible
+
Fast
+
Theme Independent
+
Module Independent
```

بنابراین Mobile Design نباید صرفاً:

```text
Desktop
↓
Smaller
```

باشد.

در Mobile، **Layout، Navigation، Priority و Interaction** ممکن است تغییر کنند.

---

# 3. Plugin Boundary

Iran LMS یک Plugin است و کنترل کامل صفحه WordPress را در اختیار ندارد.

بنابراین:

```text
WordPress
   │
   ├── Theme
   │
   └── Iran LMS Plugin
          │
          └── Mobile UI
```

Mobile UI باید تا حد امکان نسبت به Theme مستقل باشد.

نباید فرض شود:

* Theme خاصی فعال است.
* Page Builder خاصی نصب است.
* Header سایت توسط Plugin ساخته شده.
* Footer سایت توسط Plugin ساخته شده.

---

# 4. Design System

Mobile باید از Design System اصلی استفاده کند.

```text
Color
Typography
Spacing
Radius
Shadow
Icons
Components
```

نباید برای Mobile یک Design System جداگانه ساخته شود.

تنها در صورت نیاز، مقدار Responsive آن Token تغییر می‌کند.

---

# 5. Visual Direction

جهت بصری پروژه:

```text
Modern SaaS
Clean
Minimal
Soft Shadows
Rounded UI
Persian RTL
Purple / Blue Accent
```

راهنمای اصلی پروژه نیز `16px radius`، Soft Shadow، Blue + Purple Accent و فونت‌های `Vazirmatn / Estedad` را مشخص کرده است. 

---

# 6. Mobile Layout Strategy

در Mobile، اولویت محتوا مهم‌تر از حفظ Layout دسکتاپ است.

الگوی عمومی:

```text
Desktop
┌──────────┬──────────────┬──────────┐
│ Sidebar  │ Main Content │ Sidebar  │
└──────────┴──────────────┴──────────┘

Mobile
┌────────────────────────────┐
│ Header                     │
├────────────────────────────┤
│ Main Content               │
├────────────────────────────┤
│ Primary Navigation         │
└────────────────────────────┘
```

---

# 7. Content Priority

هر صفحه باید محتوا را به سه سطح تقسیم کند:

```text
Priority 1
Primary Content / Action

Priority 2
Supporting Content

Priority 3
Secondary / Optional Content
```

در Mobile:

```text
Priority 1
    ↓
Priority 2
    ↓
Priority 3
```

---

# 8. Responsive Transformation

Component می‌تواند در Mobile تغییر ساختار دهد.

مثال:

```text
Desktop Card
Horizontal

      ↓

Mobile Card
Vertical
```

یا:

```text
Desktop Sidebar
      ↓
Mobile Drawer
```

یا:

```text
Desktop Table
      ↓
Mobile Cards
```

---

# 9. Grid

Gridهای چندستونه Desktop نباید بدون بررسی مستقیماً به Mobile منتقل شوند.

مثلاً:

```text
Desktop
4 Columns

Tablet
2 Columns

Mobile
1 Column
```

اما تعداد ستون‌ها باید بر اساس Content تعیین شود، نه یک قانون ثابت برای همه Components.

---

# 10. Container

Mobile Container باید:

```text
width: 100%
```

باشد و Padding داخلی از Spacing System پیروی کند.

اصل:

```text
Viewport
│
├── Page Padding
│
├── Content
│
└── Page Padding
```

نباید Content به لبه صفحه بچسبد.

---

# 11. Horizontal Overflow

در صفحات معمولی LMS:

```text
Horizontal Overflow = Forbidden
```

مگر در Componentهایی که ذاتاً نیاز به Horizontal Scroll دارند؛ مانند:

* Carousel
* بعضی Tableها
* Timelineهای خاص
* Previewهای عریض

---

# 12. Navigation

Navigation Desktop معمولاً:

```text
Sidebar
```

است.

در Mobile می‌تواند تبدیل شود به:

```text
Drawer
```

یا:

```text
Compact Header
```

یا در Contextهای مناسب:

```text
Bottom Navigation
```

---

# 13. Mobile Header

Header موبایل باید حداقل:

```text
Menu
Brand / Context
Primary Action
```

را در صورت نیاز ارائه کند.

از قرار دادن تعداد زیادی Icon در Header موبایل خودداری شود.

---

# 14. Dashboard

Dashboard موبایل باید از اطلاعات پرتراکم Desktop فاصله بگیرد.

الگوی پیشنهادی:

```text
Header
↓
Welcome / Context
↓
Overall Progress
↓
Continue Learning
↓
Important Tasks
↓
Recent Activity
↓
Secondary Widgets
```

نمونه‌های UI مرجع پروژه نیز روی Progress، Continue Learning، Learning Streak و Achievementها تأکید دارند.

---

# 15. Course UI

Course UI در Mobile باید اطلاعات اصلی را سریع منتقل کند:

```text
Course Image
Course Title
Instructor
Rating
Progress / Price
Primary Action
```

اطلاعات ثانویه می‌توانند در Sections پایین‌تر قرار بگیرند.

---

# 16. Course Detail

ترتیب پیشنهادی:

```text
Course Preview
↓
Title
↓
Instructor
↓
Rating / Stats
↓
Primary CTA
↓
Course Description
↓
Curriculum
↓
Learning Outcomes
↓
Reviews
↓
Related Courses
```

---

# 17. Course Card

در Mobile:

```text
┌────────────────────────┐
│                        │
│       Course Image     │
│                        │
├────────────────────────┤
│ Course Title           │
│ Instructor             │
│ Rating                 │
│ Progress / Price       │
│                        │
│ [ Primary Action ]     │
└────────────────────────┘
```

Primary Action باید به‌وضوح قابل مشاهده باشد.

---

# 18. Lesson Player

Lesson Player یکی از مهم‌ترین صفحات Mobile است.

ساختار پیشنهادی:

```text
Header
↓
Video / Lesson Content
↓
Lesson Title
↓
Progress
↓
Actions
↓
Resources
↓
Notes
↓
Lesson Navigation
```

راهنمای پروژه Lesson Player را حول Video، Curriculum، Resources، Notes، Bookmark، Mark Complete و Previous/Next Lesson تعریف کرده است. 

---

# 19. Lesson Player Sidebars

در Desktop:

```text
Right Sidebar
Curriculum

Center
Lesson

Left Sidebar
Progress / Statistics
```

در Mobile:

```text
Desktop Sidebar
        ↓
Mobile Drawer / Sheet
```

Sidebar نباید فضای اصلی Video را اشغال کند.

---

# 20. Focus Mode

Focus Mode باید Mobile را به یک محیط متمرکز برای Learning تبدیل کند.

```text
Normal Lesson
    ↓
Focus Mode
    ↓
Minimal UI
```

در حالت Focus:

```text
☐ Sidebar حذف یا مخفی
☐ Video بزرگ
☐ Navigation ضروری حفظ شود
☐ Notes در دسترس باشد
☐ Actionهای اصلی حفظ شوند
```

این رویکرد با Focus Mode تعریف‌شده در Design Guide پروژه هماهنگ است. 

---

# 21. Curriculum

Curriculum در Mobile باید Accordion/Expandable باشد:

```text
Section 1
  ├─ Lesson
  ├─ Lesson
  └─ Lesson

Section 2
  ├─ Lesson
  └─ Lesson
```

فقط Section مورد نیاز بهتر است باز باشد.

---

# 22. Quiz

Quiz باید در Mobile روی یک سؤال در یک زمان تمرکز کند.

```text
Quiz
 ↓
Progress
 ↓
Question
 ↓
Answers
 ↓
Navigation
```

از نمایش چندین سؤال طولانی در یک View تا حد امکان پرهیز شود.

---

# 23. Assignment

فرم Assignment باید Single Column باشد:

```text
Title
↓
Description
↓
Upload
↓
Comment
↓
Submit
```

Drag & Drop در Mobile نباید تنها روش Upload باشد.

باید امکان انتخاب فایل با Touch نیز وجود داشته باشد.

---

# 24. Certificate

Certificate Preview در Mobile باید:

```text
Responsive
Scrollable
Readable
Downloadable
```

باشد.

اگر خود Certificate ذاتاً عریض است، Scroll کردن Preview قابل قبول است؛ اما نباید باعث Horizontal Overflow کل صفحه شود.

---

# 25. Tables

Tableهای LMS معمولاً داده زیادی دارند.

سه Strategy مجاز:

```text
Table
↓
Horizontal Scroll
```

یا:

```text
Table
↓
Responsive Cards
```

یا:

```text
Primary Columns
+
Expandable Details
```

انتخاب باید بر اساس اهمیت داده انجام شود.

---

# 26. Charts

Chart در Mobile باید:

```text
☐ Responsive
☐ قابل خواندن
☐ دارای Label مناسب
☐ دارای Alternative Information
```

باشد.

Chart نباید تنها روش انتقال یک اطلاعات مهم باشد.

---

# 27. Forms

Formهای Mobile:

```text
Single Column
```

باشند مگر اینکه Layout دیگری واقعاً ضروری باشد.

هر Field:

```text
Label
Input
Helper / Error
```

را در صورت نیاز داشته باشد.

---

# 28. Touch

هر Interactive Element باید برای Touch مناسب باشد:

```text
Button
Link
Checkbox
Switch
Tab
Menu
Icon Button
```

Action نباید به Hover وابسته باشد.

---

# 29. Hover

Mobile:

```text
Hover ≠ Primary Interaction
```

هر Action مهم باید بدون Hover قابل دسترسی باشد.

---

# 30. Touch Feedback

بعد از Tap باید Feedback مناسب وجود داشته باشد:

```text
Tap
↓
Visual Feedback
↓
Action
```

در Actionهای Async:

```text
Tap
↓
Loading
↓
Success / Error
```

---

# 31. Typography

Mobile Typography باید خوانا باقی بماند.

بررسی:

```text
☐ Font
☐ Size
☐ Weight
☐ Line Height
☐ Contrast
☐ Overflow
```

فونت اصلی باید با Typography System پروژه هماهنگ باشد؛ راهنمای اصلی `Vazirmatn / Estedad` را پیشنهاد می‌کند. 

---

# 32. RTL

تمام Mobile UI باید RTL باشد.

```text
direction: rtl
```

موارد مهم:

```text
☐ Text
☐ Navigation
☐ Icons
☐ Breadcrumb
☐ Progress
☐ Forms
☐ Cards
☐ Tabs
```

---

# 33. Icon Direction

Iconهایی که Direction دارند باید در RTL درست نمایش داده شوند.

مثلاً:

```text
Next
Previous
Back
Forward
Chevron
Arrow
```

نباید صرفاً با `rotate` تصادفی اصلاح شوند؛ باید Semantic Direction آن‌ها مشخص باشد.

---

# 34. Modal

Modal Desktop ممکن است در Mobile تبدیل شود به:

```text
Bottom Sheet
```

یا:

```text
Fullscreen Dialog
```

به‌خصوص برای فرم‌ها و Selectionهای بزرگ.

---

# 35. Drawer

Drawer باید:

```text
☐ Touch Friendly
☐ Keyboard Accessible
☐ Focus Managed
☐ Dismissible
☐ دارای Scroll مستقل
```

باشد.

---

# 36. Popover

Popover کوچک Desktop ممکن است در Mobile فضای مناسبی نداشته باشد.

در صورت نیاز:

```text
Popover
↓
Bottom Sheet
```

تبدیل شود.

---

# 37. Notifications

Toast / Snackbar نباید روی Action اصلی قرار بگیرد.

در Mobile:

```text
☐ خوانا
☐ کوتاه
☐ Dismissible
☐ دارای فاصله از لبه Viewport
```

باشد.

---

# 38. Empty State

Empty State موبایل:

```text
Icon
↓
Short Title
↓
Short Description
↓
CTA
```

باشد.

از متن‌های طولانی پرهیز شود.

---

# 39. Loading

برای Loading محتوای اصلی:

```text
Skeleton
```

ترجیح دارد.

برای Action کوچک:

```text
Inline Loader
```

مناسب است.

---

# 40. Error

Error باید:

```text
Clear
Readable
Actionable
```

باشد.

مثلاً:

```text
امکان دریافت اطلاعات وجود ندارد.

[ تلاش دوباره ]
```

---

# 41. Dark Mode

Mobile Dark Mode باید از همان Dark Mode سیستم اصلی استفاده کند.

نباید رنگ‌های Mobile به صورت مستقل تعریف شوند.

بررسی:

```text
☐ Surface
☐ Text
☐ Border
☐ Icon
☐ Focus
☐ Error
☐ Success
```

---

# 42. Theme Compatibility

چون Iran LMS Plugin است، باید با Themeهای مختلف سازگار باشد.

```text
Plugin CSS
       ↓
Scoped / Controlled
       ↓
Theme CSS
```

Theme نباید بتواند به‌صورت ناخواسته Layout اصلی LMS را خراب کند.

---

# 43. Optional Modules

Mobile باید Moduleهای Optional را نیز پشتیبانی کند.

برای مثال:

```text
Certificate
Wallet
Gamification
Attendance
Homework
Survey
Forum
WooCommerce
SkyRoom
SpotPlayer
SMS
```

در صورت Disabled بودن:

```text
Module Disabled
       ↓
UI Removed
       ↓
Layout Reflows
```

راهنمای اصلی نیز تأکید می‌کند که Module غیرفعال نباید Layout را خراب کند. 

---

# 44. Performance

Mobile Performance باید جدی گرفته شود:

```text
☐ Images Optimized
☐ Lazy Loading
☐ JS غیرضروری کم
☐ API Request غیرضروری کم
☐ Animation محدود
☐ DOM معقول
```

---

# 45. Accessibility

Mobile UI باید حداقل موارد زیر را رعایت کند:

```text
☐ Keyboard
☐ Screen Reader
☐ Focus
☐ Contrast
☐ Touch Target
☐ Zoom
☐ Reduced Motion
```

---

# 46. WordPress Integration

Mobile UI نباید مستقیماً:

```text
WP_Query
wpdb
Database
Payment
Business Logic
```

را مدیریت کند.

معماری:

```text
WordPress / Plugin Services
          ↓
       View Model
          ↓
       UI Component
          ↓
      Mobile Layout
```

---

# 47. Mobile Testing

هر Component مهم باید حداقل در این حالت‌ها بررسی شود:

```text
Small Mobile
Standard Mobile
Large Mobile
Tablet
```

و برای مرورگرهای مهم:

```text
Chrome Mobile
Safari iOS
```

---

# 48. Mobile QA

قبل از تأیید:

```text
☐ No Horizontal Overflow
☐ RTL Correct
☐ Touch Correct
☐ Typography Correct
☐ Navigation Correct
☐ Forms Correct
☐ Loading Correct
☐ Empty State Correct
☐ Error State Correct
☐ Dark Mode Correct
☐ Accessibility Correct
☐ Theme Compatible
☐ Modules Compatible
```

---

# 49. Final Rule

Mobile Design در Iran LMS باید یک **Responsive Layer روی همان UI System افزونه** باشد، نه یک UI مستقل.

اصل نهایی:

```text
Same Component
       ↓
Different Layout
       ↓
Different Interaction
       ↓
Same Design System
       ↓
Same Business Rules
```

بنابراین:

> **Mobile در Iran LMS رفتار Responsive افزونه WordPress را تعریف می‌کند؛ Business Logic، Database و معماری Plugin را تغییر نمی‌دهد.**
