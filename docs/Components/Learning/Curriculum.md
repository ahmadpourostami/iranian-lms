# Curriculum

**Component:** Learning
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Learning Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Curriculum` کامپوننت نمایش ساختار آموزشی یک دوره است.

این کامپوننت باید ساختار زیر را برای کاربر قابل مشاهده و قابل پیمایش کند:

```text
Course
 ├── Section / Chapter
 │    ├── Lesson
 │    ├── Lesson
 │    └── Quiz
 │
 ├── Section / Chapter
 │    ├── Lesson
 │    ├── Assignment
 │    └── Lesson
 │
 └── Section / Chapter
      └── Lesson
```

Curriculum معمولاً در:

* LessonPlayer
* Course Detail
* Course Overview
* Student Dashboard
* Continue Learning

استفاده می‌شود.

---

# 2. Core Principle

Curriculum مسئول **نمایش و تعامل با ساختار آموزشی** است.

```text
Course Structure
       ↓
Curriculum
       ↓
Visual Tree
       ↓
User Navigation
```

اما:

```text
Curriculum
   ✕
Course Database
   ✕
Enrollment Logic
   ✕
Access Control
   ✕
Quiz Scoring
```

این موارد متعلق به Moduleهای دیگر هستند.

---

# 3. Plugin Boundary

Curriculum بخشی از UI افزونه Iran LMS است:

```text
Iran LMS Plugin
    ↓
Learning Module
    ↓
Curriculum
```

Theme می‌تواند ظاهر آن را Override یا Extend کند، اما Curriculum نباید به Theme خاصی وابسته باشد.

---

# 4. Theme Independence

Curriculum نباید وابسته به:

* Elementor
* Gutenberg Theme
* Bootstrap
* Tailwind
* Theme-specific CSS
* WooCommerce

باشد.

---

# 5. Curriculum Structure

ساختار استاندارد:

```text
┌──────────────────────────────┐
│ سرفصل‌های دوره               │
├──────────────────────────────┤
│                              │
│ ▼ فصل اول                    │
│   ✓ مقدمه                    │
│   ▶ نصب و راه‌اندازی        │
│   🔒 پروژه اول               │
│                              │
│ ▼ فصل دوم                    │
│   ○ مفاهیم پایه              │
│   ○ تمرین                    │
│                              │
│ ▶ فصل سوم                    │
│                              │
└──────────────────────────────┘
```

---

# 6. Course Structure vs Curriculum

ساختار واقعی Course متعلق به Domain است:

```text
Course
  ↓
Sections
  ↓
Items
```

Curriculum فقط Projection آن ساختار برای UI است:

```text
Course Structure
      ↓
Curriculum View Model
      ↓
Curriculum UI
```

---

# 7. Section

هر Course می‌تواند چند Section یا Chapter داشته باشد.

مثلاً:

```text
فصل ۱: مقدمات
فصل ۲: مباحث اصلی
فصل ۳: پروژه نهایی
```

---

# 8. Section Data

نمونه:

```js
{
    id,
    title,
    description,
    order,
    items,
    expanded
}
```

`expanded` بهتر است State مربوط به UI باشد، نه Domain Entity.

---

# 9. Lesson Item

هر Section می‌تواند Lesson داشته باشد.

```text
Lesson
 ├── id
 ├── title
 ├── type
 ├── duration
 ├── status
 └── url
```

---

# 10. Supported Item Types

Curriculum باید بتواند انواع Learning Item را نمایش دهد:

```text
Video
Audio
Text
PDF
Quiz
Assignment
Webinar
Live Class
```

لیست نهایی باید با Lesson/Assessment Module هماهنگ باشد.

---

# 11. Item Type Icon

هر نوع محتوا می‌تواند Icon مخصوص داشته باشد:

```text
🎬 Video
🎧 Audio
📄 PDF
📝 Quiz
📋 Assignment
🔴 Live
```

Icon باید از `Icon` Component سیستم استفاده کند.

---

# 12. Item Status

هر Item می‌تواند State داشته باشد:

```text
locked
available
in_progress
completed
current
```

---

# 13. Current Item

Item فعلی باید کاملاً قابل تشخیص باشد.

مثلاً:

```text
┌──────────────────────────────┐
│ ▶  نصب و راه‌اندازی React    │
│    18 دقیقه                  │
└──────────────────────────────┘
```

---

# 14. Completed Item

نمونه:

```text
✓ مقدمه React
```

Completion Indicator باید از داده Learning Module بیاید.

---

# 15. Locked Item

نمونه:

```text
🔒 پروژه نهایی
```

Curriculum فقط State را نمایش می‌دهد.

تشخیص اینکه چرا Item قفل است، متعلق به Access/Enrollment Layer است.

---

# 16. In Progress

مثلاً:

```text
◐ آموزش Components
```

یا:

```text
██████░░░░ 60%
```

Progress دقیق نباید داخل Curriculum محاسبه شود.

---

# 17. Section Expand / Collapse

Section باید قابلیت:

```text
Expand
Collapse
```

داشته باشد.

مثال:

```text
▼ فصل اول
  Lesson 1
  Lesson 2

▶ فصل دوم
```

---

# 18. Default Expansion

Parent می‌تواند تعیین کند:

```text
expandedSections
```

کدام Sectionها باز باشند.

پیشنهاد:

* Section دارای Lesson فعلی → باز
* Sectionهای قبل → قابل باز شدن
* Sectionهای بعد → بسته یا باز بر اساس Configuration

---

# 19. Expand All

در Curriculumهای بزرگ می‌توان:

```text
[ باز کردن همه ]
```

داشت.

---

# 20. Collapse All

همچنین:

```text
[ بستن همه ]
```

می‌تواند ارائه شود.

این Action فقط UI State را تغییر می‌دهد.

---

# 21. Search

Curriculum باید در حالت‌های مناسب قابلیت جستجو داشته باشد.

```text
┌──────────────────────────────┐
│ 🔍 جستجو در سرفصل‌ها         │
└──────────────────────────────┘
```

UI Guide پروژه نیز جستجوی درس را در Curriculum مشخص کرده است.

---

# 22. Search Behavior

با جستجو:

```text
Query
 ↓
Filter Items
 ↓
Show Matching Sections
 ↓
Highlight Match
```

---

# 23. Search and Expansion

اگر Lesson داخل Section بسته باشد و نتیجه جستجو باشد:

```text
Search
 ↓
Matching Lesson
 ↓
Parent Section Automatically Opens
```

---

# 24. Search Empty State

اگر نتیجه‌ای وجود نداشته باشد:

```text
هیچ درسی پیدا نشد.
```

از `EmptyState` استفاده شود.

---

# 25. Current Lesson Highlight

Lesson فعلی باید با Accent Color یا State مناسب مشخص شود.

مثلاً:

```text
▶ درس فعلی
```

---

# 26. Highlight vs Completion

این دو State نباید با هم اشتباه شوند:

```text
Current
    ≠
Completed
```

ممکن است یک Lesson:

```text
Current + Completed
```

نیز باشد.

---

# 27. Navigation

با کلیک روی Lesson:

```text
Curriculum
    ↓
Lesson Navigation
    ↓
LessonPlayer
```

Curriculum باید URL یا Action آماده را مصرف کند.

---

# 28. Navigation Boundary

Curriculum نباید خودش URL Course را بسازد.

بد:

```text
/course/lesson/
```

به‌صورت Hard-coded.

بهتر:

```text
item.url
```

از API/Router دریافت شود.

---

# 29. LessonPlayer Integration

در LessonPlayer:

```text
LessonPlayer
    ├── Curriculum
    └── Lesson Content
```

Curriculum باید بتواند:

```text
Current Lesson
Previous Lesson
Next Lesson
```

را با LessonPlayer هماهنگ کند.

---

# 30. Current Item Contract

نمونه:

```js
{
    currentItemId: "lesson-24"
}
```

Curriculum بر اساس آن Highlight می‌کند.

---

# 31. Progress

Curriculum می‌تواند Progress هر Lesson را نمایش دهد.

مثلاً:

```text
مقدمه                    ✓
React Components         70%
Hooks                    ○
```

---

# 32. Course Progress

بالای Curriculum می‌توان:

```text
پیشرفت دوره

64%
24 از 38 درس
████████████░░░░
```

را نمایش داد.

این اطلاعات باید از Learning Module بیاید.

---

# 33. Progress Source

Curriculum نباید:

```text
Completed Lessons / Total Lessons
```

را خودش محاسبه کند، مگر برای محاسبات صرفاً UI در صورت وجود داده کامل.

ترجیح:

```text
Learning Module
      ↓
Progress DTO
      ↓
Curriculum
```

---

# 34. Duration

Lesson Duration می‌تواند نمایش داده شود:

```text
🎬 React Components
21:36
```

Duration باید از Lesson Data بیاید.

---

# 35. Section Description

Section می‌تواند توضیح کوتاه داشته باشد:

```text
فصل اول
مبانی اولیه و مفاهیم اصلی
```

نمایش Description اختیاری است.

---

# 36. Section Item Count

می‌توان تعداد Itemها را نمایش داد:

```text
فصل اول
8 درس
```

یا:

```text
8 محتوا
```

---

# 37. Section Progress

می‌توان:

```text
5 / 8
```

را نمایش داد.

مثلاً:

```text
فصل اول
████████░░ 5/8
```

---

# 38. Completion Percentage

در صورت وجود Progress:

```text
62%
```

نمایش داده شود.

Curriculum نباید این درصد را بدون داده معتبر از Database محاسبه کند.

---

# 39. Accessibility

Curriculum باید:

* Keyboard Accessible
* Screen Reader Friendly
* Focus Visible
* Semantic
* RTL Compatible

باشد.

---

# 40. Semantic Structure

برای Sectionها می‌توان از:

```html
<section>
```

و برای Itemهای قابل انتخاب از:

```html
<a>
```

یا:

```html
<button>
```

بر اساس رفتار واقعی استفاده کرد.

---

# 41. Expand Button

Expand/Collapse باید Button واقعی باشد.

بد:

```html
<div onclick="...">
```

بهتر:

```html
<button>
```

---

# 42. ARIA

برای Section:

```text
aria-expanded
```

و:

```text
aria-controls
```

می‌تواند استفاده شود.

---

# 43. Current Item

برای Item فعلی می‌توان از:

```text
aria-current
```

استفاده کرد.

---

# 44. Keyboard Navigation

حداقل:

```text
Tab
Shift + Tab
Enter
Space
```

باید کار کند.

در Tree-like Navigation می‌توان Arrow Navigation را نیز اضافه کرد.

---

# 45. Focus

Focus باید واضح باشد:

```text
┌──────────────────────────────┐
│   Lesson Title               │
└──────────────────────────────┘
          ↑
      Focus Ring
```

---

# 46. RTL

Curriculum باید RTL-native باشد.

مثلاً:

```text
✓  مقدمه React
```

و Iconها و Alignment باید با RTL سازگار باشند.

---

# 47. Bidirectional Content

ممکن است عنوان:

```text
آموزش React و Next.js
```

باشد.

Direction متن باید باعث شکستن UI نشود.

---

# 48. LTR Technical Content

کد، URL و نام فایل ممکن است LTR باقی بمانند.

مثلاً:

```text
https://example.com/api
```

نباید به‌زور RTL شود.

---

# 49. Mobile

در Mobile، Curriculum معمولاً باید داخل Drawer نمایش داده شود.

```text
LessonPlayer
      ↓
[ سرفصل‌های دوره ]
      ↓
Drawer
      ↓
Curriculum
```

---

# 50. Mobile Curriculum

ساختار:

```text
┌──────────────────────────┐
│ سرفصل‌های دوره      ✕   │
├──────────────────────────┤
│ 🔍 جستجو                 │
├──────────────────────────┤
│ ▼ فصل اول                │
│   ✓ درس اول              │
│   ▶ درس دوم              │
│                          │
│ ▶ فصل دوم                │
└──────────────────────────┘
```

---

# 51. Desktop Sidebar

در LessonPlayer می‌تواند به صورت Sidebar ثابت یا Sticky باشد.

```text
┌───────────────┐
│ Curriculum    │
│               │
│ Chapter 1     │
│ Chapter 2     │
│ Chapter 3     │
└───────────────┘
```

---

# 52. Sticky Behavior

Sticky بودن باید توسط Layout/Parent تعیین شود.

Curriculum نباید خودش کل Page Scroll را مدیریت کند.

---

# 53. Independent Scroll

در LessonPlayer ممکن است Curriculum Scroll مستقل داشته باشد:

```text
Page
 ├── Header
 └── Content
      ├── Curriculum Scroll
      └── Main Content Scroll
```

این تصمیم باید در Layout Layer پیاده‌سازی شود.

---

# 54. Large Curriculum

برای دوره‌های بسیار بزرگ:

```text
500+ Lessons
```

نباید تمام DOM به‌صورت همزمان ساخته شود.

راهکارهای احتمالی:

* Lazy Render
* Virtualization
* Section-level Loading

---

# 55. Lazy Section

می‌توان Itemهای Section را فقط هنگام Expand کردن Render کرد.

```text
Collapsed
    ↓
No Lesson DOM

Expand
    ↓
Render Lessons
```

---

# 56. Performance

Curriculum نباید برای هر Item:

* API Request
* Database Query
* Progress Query
* Instructor Query

انجام دهد.

---

# 57. N+1 Problem

غلط:

```text
100 Lessons
 ↓
100 API Requests
```

بهتر:

```text
Course API
 ↓
Curriculum DTO
 ↓
Curriculum
```

---

# 58. Data Model

View Model پیشنهادی:

```js
{
    courseId,
    title,
    progress,
    sections: [
        {
            id,
            title,
            itemCount,
            progress,
            items: [
                {
                    id,
                    title,
                    type,
                    duration,
                    status,
                    progress,
                    url
                }
            ]
        }
    ]
}
```

این مدل صرفاً UI Contract است.

---

# 59. Domain Independence

Curriculum نباید Domain Entity را مستقیماً مصرف کند اگر باعث وابستگی شدید به Domain شود.

بهتر:

```text
Domain Entity
      ↓
Application / API DTO
      ↓
Curriculum View Model
```

---

# 60. WordPress Boundary

Curriculum نباید مستقیماً از:

```text
WP_Query
wpdb
get_post()
```

برای ساخت UI استفاده کند.

---

# 61. REST API

Curriculum باید بتواند از API داده دریافت کند:

```text
REST API
   ↓
Course Structure
   ↓
Curriculum
```

این موضوع برای Mobile App آینده نیز مهم است.

---

# 62. Course CPT

اگر Course با Custom Post Type پیاده‌سازی شود:

```text
CPT
 ↓
Repository
 ↓
Course DTO
 ↓
Curriculum
```

نه:

```text
Curriculum
 ↓
get_posts()
```

---

# 63. Enrollment

Curriculum می‌تواند State دسترسی را دریافت کند:

```text
accessible
locked
completed
```

اما Enrollment را خودش بررسی نمی‌کند.

---

# 64. Access Control

Security باید Backend-side باشد.

مخفی کردن Lesson:

```text
display:none
```

نباید به‌عنوان Security استفاده شود.

---

# 65. Locked Content

اگر Lesson قابل مشاهده نیست:

```text
🔒 Lesson
```

نمایش داده شود.

اما Resource واقعی نیز باید در Backend Protected باشد.

---

# 66. Prerequisites

اگر Lesson پیش‌نیاز دارد:

```text
Lesson 3
 🔒
نیازمند تکمیل Lesson 2
```

این Message باید از Access/Enrollment Layer بیاید.

---

# 67. Paid Course

در Course خریداری‌نشده:

```text
🔒
ثبت‌نام لازم است
```

Curriculum فقط State را نشان می‌دهد.

---

# 68. Feature Modules

Curriculum باید با Moduleهای اختیاری سازگار باشد.

مثلاً:

```text
Quiz
Assignment
Certificate
Gamification
Live Class
Forum
```

اگر Module غیرفعال است، Item مربوطه نباید Layout را خراب کند.

---

# 69. Quiz Integration

Quiz Item:

```text
📝 آزمون فصل اول
10 سؤال
```

Quiz Logic متعلق به Assessment Module است.

---

# 70. Assignment Integration

Assignment Item:

```text
📋 تمرین پروژه
Deadline: 20 مرداد
```

اطلاعات Assignment از Assessment Module می‌آید.

---

# 71. Live Class Integration

Live Class:

```text
🔴 کلاس زنده
امروز، 18:00
```

Provider می‌تواند SkyRoom یا سرویس دیگری باشد.

Curriculum فقط اطلاعات را نمایش می‌دهد.

---

# 72. Certificate Integration

Certificate معمولاً Item مستقیم Curriculum نیست، اما وضعیت Course می‌تواند به آن مرتبط باشد.

مثلاً:

```text
✓ دوره تکمیل شد
🏆 گواهینامه آماده
```

Certificate Module مسئول منطق آن است.

---

# 73. Gamification Integration

در صورت فعال بودن:

```text
🏆 +50 XP
```

یا:

```text
🔥 Streak
```

می‌تواند بعد از Completion نمایش داده شود.

این اطلاعات باید Optional باشد.

---

# 74. Event System

Curriculum می‌تواند Eventهای زیر را منتشر کند:

```text
onSectionExpand
onSectionCollapse
onItemClick
onSearch
onCurrentItemChange
```

---

# 75. Analytics

Analytics نباید داخل Curriculum ذخیره شود.

```text
Curriculum
    ↓
Event
    ↓
Analytics Module
```

---

# 76. State Management

Stateهای UI:

```text
expandedSections
searchQuery
selectedItem
```

می‌توانند Client-side باشند.

Stateهای Domain:

```text
completion
progress
access
```

باید از Application/Backend بیایند.

---

# 77. URL State

Current Lesson بهتر است با URL هماهنگ باشد:

```text
/course/react/lesson/components
```

Curriculum باید از Router/Parent برای Navigation استفاده کند.

---

# 78. Current Item Synchronization

وقتی URL تغییر کرد:

```text
URL
 ↓
Current Lesson
 ↓
Curriculum Highlight
```

و بالعکس:

```text
Click Lesson
 ↓
Navigation
 ↓
URL Update
 ↓
LessonPlayer
```

---

# 79. Previous / Next

Curriculum می‌تواند اطلاعات ترتیب را برای Parent فراهم کند:

```text
previousItem
currentItem
nextItem
```

اما Navigation نهایی می‌تواند توسط LessonPlayer انجام شود.

---

# 80. Completion Feedback

بعد از تکمیل Lesson:

```text
✓ تکمیل شد
```

Curriculum باید بتواند State جدید را دریافت کند و UI را Update کند.

---

# 81. Real-Time Update

مثلاً:

```text
Before:
○ Lesson 4

Complete

After:
✓ Lesson 4
```

نیازی به Reload کامل Course نیست.

---

# 82. Optimistic UI

برای بعضی Actionهای کم‌خطر می‌توان Optimistic Update داشت.

مثلاً:

```text
Click Complete
 ↓
UI → ✓
 ↓
API
```

در صورت Failure:

```text
Rollback
```

---

# 83. Error Handling

اگر Update Progress شکست خورد:

```text
وضعیت ذخیره نشد.
[ تلاش مجدد ]
```

Curriculum نباید Error را نادیده بگیرد.

---

# 84. Loading State

در Loading اولیه:

```text
┌──────────────────────────────┐
│ ░░░░░░░░░░░░░░░░            │
│ ░░░░░░░░░░░░░░░░            │
│   ░░░░░░░░░░░░              │
└──────────────────────────────┘
```

از Skeleton Component استفاده شود.

---

# 85. Empty Curriculum

اگر Course هیچ محتوایی نداشته باشد:

```text
هنوز محتوایی برای این دوره منتشر نشده است.
```

از EmptyState استفاده شود.

---

# 86. Empty Section

اگر Section خالی باشد، ترجیحاً اصلاً نمایش داده نشود؛ مگر در حالت مدیریت Course که نیاز به نمایش ساختار خالی وجود داشته باشد.

---

# 87. Error State

اگر Curriculum Load نشد:

```text
بارگذاری سرفصل‌ها انجام نشد.

[ تلاش مجدد ]
```

---

# 88. Skeleton

Skeleton باید تقریباً ساختار واقعی را شبیه‌سازی کند:

```text
░░░░░░░░░░░░
  ░░░░░░░░
  ░░░░░░░░░
  ░░░░░░░░
```

---

# 89. Dark Mode

Curriculum باید با Dark Mode سازگار باشد.

از:

```text
surface
surface-elevated
text-primary
text-secondary
border
accent
success
```

استفاده شود.

---

# 90. Typography

Curriculum نباید Font Family مستقل داشته باشد.

باید از Typography System پروژه استفاده کند.

---

# 91. Spacing

Spacing باید از Design Tokens استفاده کند.

مثلاً:

```text
section-gap
item-gap
content-padding
```

مقادیر نباید در هر صفحه دوباره تعریف شوند.

---

# 92. Icons

Iconها باید از Component `Icon` استفاده کنند.

مثلاً:

```text
Chevron
Play
Lock
Check
File
Quiz
Assignment
```

---

# 93. Badges

برای وضعیت‌ها می‌توان از `Badge` استفاده کرد:

```text
جدید
قفل
تکمیل‌شده
زنده
```

---

# 94. Tooltips

برای Iconهای بدون Label در Desktop می‌توان Tooltip استفاده کرد.

اما Labelهای مهم نباید فقط Tooltip باشند.

---

# 95. Mobile Interaction

روی Mobile:

* Tap Target کافی
* فاصله مناسب
* عدم استفاده از Hover
* Drawer برای Curriculum
* Scroll مناسب

باید رعایت شود.

---

# 96. Touch Target

حداقل Target تعاملی باید برای استفاده لمسی مناسب باشد.

مثلاً:

```text
Lesson Item
   ↓
Tap Area
```

نه فقط خود Icon.

---

# 97. Course Detail Integration

در Course Detail می‌توان Curriculum را به‌صورت:

```text
Course Curriculum
```

نمایش داد.

در این حالت:

```text
LessonPlayer Navigation
```

وجود ندارد.

---

# 98. Course Detail Variant

Variant ممکن است اطلاعات بیشتری نشان دهد:

```text
فصل اول
8 درس
3 ساعت
```

---

# 99. LessonPlayer Variant

در LessonPlayer:

```text
Compact Curriculum
```

مناسب‌تر است.

تمرکز روی Navigation است، نه توضیحات زیاد.

---

# 100. Student Dashboard Variant

در Dashboard:

```text
My Course
 ↓
Curriculum Preview
```

می‌تواند فقط چند Section یا Lesson را نمایش دهد.

---

# 101. Instructor/Admin Boundary

Curriculum برای Student/User Experience است.

برای مدیریت Course، بهتر است Componentهای مدیریتی جداگانه وجود داشته باشند:

```text
CourseBuilder
SectionEditor
LessonEditor
```

نباید Curriculum را به Editor تبدیل کنیم.

---

# 102. Curriculum vs CourseBuilder

Curriculum:

```text
Read / Navigate
```

CourseBuilder:

```text
Create / Edit / Reorder
```

این دو باید جدا باشند.

---

# 103. Ordering

Curriculum فقط ترتیب دریافت‌شده را نمایش می‌دهد.

Ordering Logic متعلق به Course/Application Layer است.

---

# 104. Drag & Drop

Drag & Drop برای تغییر ترتیب Lessonها نباید در Curriculum Student UI باشد.

اگر لازم باشد:

```text
CourseBuilder
```

این قابلیت را ارائه می‌کند.

---

# 105. Reordering Boundary

```text
CourseBuilder
   ↓
Reorder Command
   ↓
Course Module
   ↓
Persistence
```

Curriculum فقط نتیجه نهایی را نمایش می‌دهد.

---

# 106. Security

Curriculum نباید URL فایل‌های Protected را افشا کند مگر Backend آن Resource را برای User مجاز کرده باشد.

---

# 107. Performance Rules

برای Courseهای بزرگ:

* Curriculum DTO را یکجا دریافت کن.
* از N+1 Request جلوگیری کن.
* Sectionها را Lazy Render کن.
* Iconهای سنگین را تکراری Load نکن.
* Progress را برای هر Item جداگانه Request نکن.
* Search را روی داده موجود یا Search API انجام بده.

---

# 108. Component API

نمونه:

```jsx
<Curriculum
    courseId={courseId}
    sections={sections}
    currentItemId={currentItemId}
    progress={progress}
    features={features}
    variant="player"
    onItemSelect={handleItemSelect}
/>
```

---

# 109. Variants

Variantهای پیشنهادی:

```text
player
course
dashboard
compact
```

---

# 110. Player Variant

ویژگی‌ها:

```text
Compact
Current Highlight
Progress
Search
Navigation
```

---

# 111. Course Variant

برای Course Detail:

```text
Expanded
Section Description
Item Duration
Item Count
```

---

# 112. Dashboard Variant

برای Dashboard:

```text
Compact
Limited Items
Progress
Continue Learning
```

---

# 113. Compact Variant

برای Sidebarهای کوچک:

```text
Icon
Title
Status
```

---

# 114. Feature Configuration

مثلاً:

```js
features = {
    progress: true,
    duration: true,
    search: true,
    badges: true,
    descriptions: false,
    quiz: true,
    assignment: true,
    liveClass: false
}
```

---

# 115. Event Contract

نمونه:

```js
onItemSelect({
    itemId,
    type,
    url
})
```

و:

```js
onSectionToggle({
    sectionId,
    expanded
})
```

---

# 116. Do

* ساختار Course را واضح نمایش بده.
* Sectionها را Expand/Collapse کن.
* Lesson فعلی را Highlight کن.
* Statusها را واضح نمایش بده.
* Progress را از Learning Module بگیر.
* Search را پشتیبانی کن.
* Mobile Drawer را پشتیبانی کن.
* RTL را Native در نظر بگیر.
* Accessibility را رعایت کن.
* با LessonPlayer یکپارچه باش.
* با API و DTO کار کن.
* از Componentهای پایه سیستم استفاده کن.
* CourseBuilder را از Curriculum جدا نگه دار.

---

# 117. Don't

* Database Query داخل Component.
* `WP_Query` داخل Component.
* Enrollment Check داخل Component.
* Quiz Logic داخل Component.
* Payment Logic داخل Component.
* Course Editing داخل Curriculum.
* Drag & Drop Editing در Student Curriculum.
* Hard-coded URL.
* Theme-specific CSS.
* وابستگی مستقیم به WooCommerce.
* محاسبه مستقل Progress از داده ناقص.
* افشای Protected Resource.
* Render کردن صدها Lesson بدون توجه به Performance.

---

# 118. Testing Requirements

## Structure

```text
1 Section
Multiple Sections
Empty Section
Large Course
```

## Items

```text
Video
PDF
Quiz
Assignment
Webinar
Locked
Completed
Current
```

## Interaction

```text
Expand
Collapse
Search
Select Lesson
Current Lesson
```

## Responsive

```text
Desktop
Tablet
Mobile
Drawer
```

## Accessibility

```text
Keyboard
Focus
ARIA
Screen Reader
RTL
```

## States

```text
Loading
Empty
Error
Ready
```

## Modules

```text
Quiz Enabled
Quiz Disabled
Assignment Enabled
Assignment Disabled
Gamification Enabled
Gamification Disabled
```

---

# 119. Architecture

```text
                         Course Structure
                                │
                                ↓
                       Application / API
                                │
                                ↓
                      Curriculum View Model
                                │
              ┌─────────────────┼─────────────────┐
              ↓                 ↓                 ↓
          Sections           Progress          Access
              │
              ↓
            Items
              │
      ┌───────┼────────┬──────────┐
      ↓       ↓        ↓          ↓
    Video    PDF      Quiz     Assignment
```

---

# 120. Final Responsibility Map

```text
Course Module
    → Course Structure
    → Section Ordering

Learning Module
    → Progress
    → Completion
    → Current Learning State

Enrollment / Access
    → Access
    → Locked State

Assessment
    → Quiz
    → Assignment

Media
    → Files

Live Class
    → Webinar / Live Lesson

Curriculum
    → Display Structure
    → Navigation UI
    → Section Interaction
    → Current Item Highlight
    → Search UI
    → Presentation State
```

---

# 121. Final Principle

`Curriculum` باید **نمایش‌دهنده و Navigator ساختار آموزشی** باشد، نه مدیر ساختار Course.

معماری نهایی:

```text
Course Domain
      ↓
Course Structure
      ↓
Curriculum View Model
      ↓
Curriculum
      ↓
LessonPlayer / Course Detail / Dashboard
```

و برای ویرایش:

```text
CourseBuilder
      ↓
Course Module
      ↓
Persistence
```

به این ترتیب Curriculum می‌تواند در تمام بخش‌های افزونه Iran LMS دوباره استفاده شود، بدون اینکه به Database، Theme، WooCommerce یا منطق Business وابسته شود.
