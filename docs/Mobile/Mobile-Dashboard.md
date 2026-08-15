# Mobile-Dashboard.md

**Path:** `07-Mobile/Mobile-Dashboard.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile Student Dashboard
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل رفتار و ساختار **Dashboard موبایل** در افزونه WordPress Iran LMS را تعریف می‌کند.

هدف این Dashboard ارائه یک نمای سریع و کاربردی از وضعیت یادگیری کاربر در فضای کوچک است.

Dashboard نباید صرفاً نسخه کوچک‌شده Dashboard دسکتاپ باشد.

```text
Desktop Dashboard
        ↓
Content Prioritization
        ↓
Mobile Dashboard
```

---

# 2. Scope

این Dashboard مربوط به **بخش LMS افزونه** است.

بنابراین مواردی مانند:

```text
Site Header
Site Footer
Blog
Shop Theme
WordPress Theme Homepage
```

جزو مسئولیت این فایل نیستند.

Plugin فقط Dashboard و UI مربوط به LMS را ارائه می‌کند.

---

# 3. Dashboard Goals

Dashboard موبایل باید در اولین نگاه به این سؤالات پاسخ دهد:

```text
من کجا هستم؟
چه دوره‌ای را ادامه بدهم؟
چقدر پیشرفت کرده‌ام؟
چه کاری باید انجام دهم؟
چه چیزی جدید است؟
```

---

# 4. Information Priority

ترتیب کلی:

```text
1. Context / Welcome
2. Continue Learning
3. Overall Progress
4. Important Tasks
5. Courses
6. Recent Activity
7. Achievements / Secondary Data
```

این ترتیب قابل تغییر است، اما Primary Learning Action باید در قسمت بالای Dashboard باقی بماند.

---

# 5. Mobile Layout

ساختار پایه:

```text
┌─────────────────────────────┐
│ Header                      │
├─────────────────────────────┤
│ Welcome / User Context      │
├─────────────────────────────┤
│ Continue Learning           │
├─────────────────────────────┤
│ Overall Progress            │
├─────────────────────────────┤
│ Tasks / Assessments         │
├─────────────────────────────┤
│ My Courses                  │
├─────────────────────────────┤
│ Recent Activity             │
├─────────────────────────────┤
│ Achievements                │
└─────────────────────────────┘
```

---

# 6. Header

Header موبایل نباید اطلاعات زیادی داشته باشد.

حداقل:

```text
☰
Dashboard Context
Notifications
```

در صورت نیاز Avatar نیز می‌تواند نمایش داده شود.

---

# 7. Welcome Section

Welcome باید کوتاه باشد:

```text
سلام احمد 👋
به مسیر یادگیریت ادامه بده.
```

اما اطلاعات طولانی نباید فضای بالای صفحه را اشغال کند.

---

# 8. Continue Learning

مهم‌ترین بخش Dashboard موبایل:

```text
┌─────────────────────────────┐
│ ادامه یادگیری               │
│                             │
│ دوره React                  │
│ درس: Components             │
│                             │
│ ███████████░░░  72٪         │
│                             │
│ [ ادامه یادگیری ]           │
└─────────────────────────────┘
```

هدف:

> کاربر بدون جستجو بتواند آخرین Learning Context خود را ادامه دهد.

---

# 9. Continue Learning Priority

اگر چند دوره در حال یادگیری وجود دارد:

```text
Primary Course
      ↓
Secondary Courses
```

فقط یک دوره باید Primary CTA اصلی را دریافت کند.

---

# 10. Progress

Progress کلی می‌تواند نمایش داده شود:

```text
پیشرفت یادگیری
72٪
```

یا:

```text
████████████░░░
72%
```

Progress نباید فقط با رنگ مشخص شود.

---

# 11. Progress Data

Progress باید از سیستم Learning افزونه دریافت شود.

Component نباید خودش:

```text
Enrollment
Lesson Completion
Quiz Completion
```

را محاسبه کند.

معماری:

```text
Learning Service
      ↓
Progress View Model
      ↓
Dashboard Component
```

---

# 12. Course Progress

هر Course Card می‌تواند Progress داشته باشد:

```text
React
████████░░  80٪
```

اما Progress باید با وضعیت واقعی Enrollment/Completion هماهنگ باشد.

---

# 13. Tasks

Dashboard باید کارهای مهم را سریع نشان دهد.

مثلاً:

```text
تکالیف در انتظار
آزمون‌های پیش‌رو
درس‌های ناقص
```

ساختار:

```text
┌──────────────────────────┐
│ کارهای من                │
│                          │
│ ۳ تکلیف در انتظار        │
│ ۲ آزمون                  │
│                          │
│ [ مشاهده همه ]           │
└──────────────────────────┘
```

---

# 14. Tasks Priority

ترتیب:

```text
Overdue
↓
Due Soon
↓
Upcoming
```

مهم‌ترین Action باید اول دیده شود.

---

# 15. Notifications

Notification Summary می‌تواند:

```text
اعلان‌ها
۳ مورد جدید
```

را نمایش دهد.

اما Dashboard نباید تمام Notificationها را نمایش دهد.

CTA:

```text
[ مشاهده اعلان‌ها ]
```

---

# 16. My Courses

Course List در Mobile بهتر است محدود باشد:

```text
دوره‌های من
[Course Card]
[Course Card]
[Course Card]

مشاهده همه →
```

نباید تمام Courseهای کاربر در Dashboard رندر شوند.

---

# 17. Course Card

Card موبایل:

```text
┌────────────────────────────┐
│ Course Image               │
├────────────────────────────┤
│ عنوان دوره                 │
│ مدرس                       │
│                            │
│ ███████░░  70٪             │
│                            │
│ [ ادامه ]                  │
└────────────────────────────┘
```

Component باید از `Learning/CourseCard.md` و Design System اصلی استفاده کند و نباید یک Card مخصوص Dashboard با قرارداد متفاوت ساخته شود.

---

# 18. Recent Activity

Recent Activity می‌تواند شامل:

```text
درس تکمیل شد
آزمون انجام شد
گواهینامه دریافت شد
تکلیف ارسال شد
```

باشد.

مثال:

```text
امروز
✓ درس Components تکمیل شد

دیروز
✓ آزمون JavaScript ارسال شد
```

---

# 19. Activity Limit

در Mobile فقط چند Activity اخیر نمایش داده شود.

مثلاً:

```text
3–5 Items
```

و سپس:

```text
[ مشاهده فعالیت‌ها ]
```

---

# 20. Achievements

Achievementها Secondary Content هستند.

می‌توان نمایش داد:

```text
🔥 7 روز متوالی
🏆 12 درس تکمیل‌شده
⭐ 4 دستاورد
```

اما Achievement نباید بالاتر از Continue Learning قرار بگیرد.

---

# 21. Learning Streak

در صورت فعال بودن قابلیت Gamification:

```text
🔥 7 روز
```

نمایش داده شود.

اگر Module مربوطه فعال نباشد:

```text
Gamification Disabled
        ↓
No Streak Section
```

و Layout باید بدون فضای خالی Reflow شود.

---

# 22. Achievement Module

اگر Gamification فعال باشد:

```text
Dashboard
├── Progress
├── Courses
├── Tasks
└── Achievements
```

اگر غیرفعال باشد:

```text
Dashboard
├── Progress
├── Courses
└── Tasks
```

---

# 23. Certificate

اگر کاربر Certificate داشته باشد:

```text
آخرین گواهینامه
```

می‌تواند در Dashboard نمایش داده شود.

اگر Certificate Module غیرفعال باشد، این بخش نباید نمایش داده شود.

---

# 24. Wallet

Wallet یک قابلیت Optional است.

در صورت فعال بودن:

```text
موجودی کیف پول
1,250,000 تومان
```

و:

```text
[ مشاهده کیف پول ]
```

اما Wallet نباید جزو Core Dashboard محسوب شود.

---

# 25. Commerce

اگر WooCommerce / Commerce Integration فعال باشد، می‌توان بخش‌هایی مانند:

```text
آخرین سفارش
پرداخت در انتظار
```

را نمایش داد.

اما:

```text
Dashboard UI
```

نباید مستقیماً منطق Order یا Payment را اجرا کند.

---

# 26. Optional Modules

Dashboard باید Module-aware باشد.

مثلاً:

```text
Certificate
Wallet
Gamification
Attendance
Homework
Forum
```

می‌توانند Optional باشند.

قاعده:

```text
Module Enabled
    ↓
Feature Visible

Module Disabled
    ↓
Feature Removed
    ↓
Dashboard Reflows
```

---

# 27. Empty Dashboard

اگر کاربر هنوز دوره‌ای ندارد:

```text
┌────────────────────────────┐
│ هنوز دوره‌ای نداری         │
│                            │
│ یک دوره انتخاب کن و        │
│ یادگیری را شروع کن.        │
│                            │
│ [ مشاهده دوره‌ها ]         │
└────────────────────────────┘
```

---

# 28. New Student

برای User جدید:

```text
Welcome
↓
No Courses
↓
Recommended / Available Courses
↓
Start Learning
```

Dashboard نباید با Empty Widgetهای متعدد پر شود.

---

# 29. Error State

اگر Dashboard Data دریافت نشد:

```text
اطلاعات داشبورد بارگذاری نشد.

[ تلاش دوباره ]
```

Technical Error نباید نمایش داده شود.

---

# 30. Loading State

در زمان Load:

```text
Header Skeleton
Progress Skeleton
Course Skeleton
Task Skeleton
```

استفاده شود.

Layout نباید با Load شدن Data شدیداً جابه‌جا شود.

---

# 31. Dashboard Refresh

در صورت نیاز:

```text
Pull to Refresh
```

می‌تواند در محیط‌هایی که مناسب است پشتیبانی شود.

اما این رفتار نباید برای عملکرد صحیح Dashboard اجباری باشد.

---

# 32. Navigation

Dashboard باید به Navigation اصلی افزونه متصل باشد.

Primary:

```text
Dashboard
Courses
Learning
Notifications
Profile
```

و Secondary:

```text
Assignments
Exams
Grades
Certificates
Settings
```

طبق Navigation System موبایل مدیریت شوند.

---

# 33. Bottom Navigation

اگر Bottom Navigation فعال باشد، Dashboard باید یکی از Primary Items باشد:

```text
⌂ خانه
▣ دوره‌ها
▶ یادگیری
🔔 اعلان‌ها
● پروفایل
```

---

# 34. Dashboard Scroll

Dashboard معمولاً Vertical Scroll است.

```text
Vertical Scroll
✓

Horizontal Page Scroll
✗
```

مگر برای Component خاصی که ذاتاً Horizontal Scroll دارد.

---

# 35. Section Headers

هر Section باید Header مشخص داشته باشد:

```text
ادامه یادگیری                 مشاهده همه →
```

اما Header نباید بیش از حد ارتفاع بگیرد.

---

# 36. Section Spacing

فاصله بین Sections باید از Spacing System پروژه استفاده کند.

از Marginهای تصادفی جلوگیری شود.

---

# 37. Mobile Cards

Cardها:

```text
☐ Radius استاندارد
☐ Shadow مناسب
☐ Padding مناسب
☐ Touch Target
☐ Overflow کنترل‌شده
```

داشته باشند.

---

# 38. RTL

Dashboard کاملاً RTL است.

بررسی:

```text
☐ Text
☐ Card
☐ Progress
☐ Icons
☐ Navigation
☐ Alignment
☐ Numbers
```

---

# 39. Number Formatting

اعداد باید از Formatter مرکزی استفاده کنند.

مثلاً:

```text
۷۲٪
۱۲ درس
۳ آزمون
```

یا طبق Number Policy پروژه.

Dashboard نباید Number Formatting مخصوص خودش داشته باشد.

---

# 40. Currency

برای Wallet / Commerce:

```text
1,250,000 تومان
```

باید توسط Currency Formatter مرکزی تولید شود.

UI نباید خودش تبدیل ریال/تومان انجام دهد.

---

# 41. Accessibility

Dashboard باید:

```text
☐ Semantic Headings
☐ Accessible Labels
☐ Keyboard Navigation
☐ Visible Focus
☐ Screen Reader Support
☐ Color Contrast
```

را رعایت کند.

---

# 42. Screen Reader Order

ترتیب DOM باید با ترتیب منطقی محتوا هماهنگ باشد:

```text
Welcome
↓
Continue Learning
↓
Progress
↓
Tasks
↓
Courses
↓
Activity
```

نباید Visual Order و Reading Order به شکل نامناسب متفاوت باشند.

---

# 43. Touch

Actionهای اصلی:

```text
Continue Learning
View Courses
View Tasks
View Notifications
```

باید Touch-friendly باشند.

---

# 44. Theme Independence

Dashboard نباید به CSS خاص Theme وابسته باشد.

```text
Theme
   ↓
Site Shell

Iran LMS
   ↓
LMS Dashboard
```

این دو باید تا حد ممکن از هم جدا باشند.

---

# 45. WordPress Constraint

Dashboard نباید مستقیماً:

```text
WP_Query
$wpdb
Database Queries
Payment API
```

را اجرا کند.

ساختار:

```text
WordPress / LMS Services
        ↓
Application Layer
        ↓
Dashboard View Model
        ↓
Dashboard Components
```

---

# 46. Security

Dashboard ممکن است داده‌های حساس کاربر را نمایش دهد.

بنابراین:

```text
☐ Permission Check
☐ Ownership Check
☐ Server-side Authorization
☐ No Sensitive Data Leakage
```

باید رعایت شود.

---

# 47. Performance

Dashboard نباید برای نمایش چند Widget، تعداد زیادی Request ایجاد کند.

ترجیح:

```text
Dashboard Request
        ↓
Aggregated View Data
        ↓
Components
```

به جای:

```text
Widget 1 → Request
Widget 2 → Request
Widget 3 → Request
Widget 4 → Request
```

---

# 48. Lazy Loading

Sections پایین‌تر صفحه در صورت سنگین بودن می‌توانند Lazy Load شوند.

مثلاً:

```text
Above Fold
↓
Immediate

Below Fold
↓
Lazy
```

اما Continue Learning و اطلاعات اصلی نباید به شکل غیرضروری Lazy شوند.

---

# 49. Dark Mode

تمام Dashboard Components باید با Dark Mode سیستم اصلی سازگار باشند.

```text
☐ Background
☐ Surface
☐ Card
☐ Text
☐ Progress
☐ Icon
☐ Border
☐ Focus
```

---

# 50. Responsive

حداقل:

```text
Small Mobile
Standard Mobile
Large Mobile
Tablet
Desktop
```

بررسی شود.

Mobile Dashboard نباید فقط روی یک Width طراحی شود.

---

# 51. Portrait / Landscape

Portrait حالت اصلی است.

Landscape باید حداقل برای:

```text
Course
Lesson
Video
```

بررسی شود.

Dashboard می‌تواند در Landscape همان Vertical Layout را حفظ کند، مگر اینکه فضای افقی مزیت واقعی ایجاد کند.

---

# 52. Mobile Dashboard Architecture

```text
Dashboard
│
├── Header
│
├── Welcome
│
├── ContinueLearning
│
├── Progress
│
├── Tasks
│
├── Courses
│
├── Activity
│
└── Optional Features
      ├── Achievements
      ├── Certificates
      └── Wallet
```

---

# 53. Component Responsibility

هر Component فقط مسئول UI خودش است.

مثلاً:

```text
ContinueLearningCard
```

نباید:

```text
Enrollment Query
Lesson Query
Progress Calculation
```

را خودش انجام دهد.

---

# 54. Data Contract

Dashboard باید View Model مشخص دریافت کند.

نمونه مفهومی:

```text
DashboardViewModel
├── user
├── continueLearning
├── progress
├── tasks
├── courses
├── activities
├── notifications
└── optionalFeatures
```

این ساختار صرفاً یک قرارداد مفهومی UI است و نباید مستقیماً به Schema دیتابیس تبدیل شود.

---

# 55. Mobile Dashboard Rule

در Mobile، اولویت با:

```text
Continue Learning
```

است.

نه:

```text
Statistics
Achievements
Decorative Widgets
```

---

# 56. Definition of Done

Dashboard موبایل زمانی آماده است که:

```text
☐ Continue Learning واضح است
☐ Progress قابل فهم است
☐ Tasks قابل مشاهده‌اند
☐ Course List محدود و مفید است
☐ Navigation قابل دسترسی است
☐ Optional Modules درست رفتار می‌کنند
☐ Empty State دارد
☐ Loading State دارد
☐ Error State دارد
☐ RTL کامل است
☐ Responsive است
☐ Accessibility رعایت شده
☐ Theme Independent است
☐ WordPress Plugin Boundary رعایت شده
☐ Performance مناسب است
```

---

# 57. Final Principle

Dashboard موبایل Iran LMS باید:

```text
Less Information
+
Higher Priority
+
Faster Actions
+
Clear Learning Context
```

را ارائه کند.

اصل نهایی:

> **Dashboard موبایل افزونه باید کاربر را سریع‌تر به «ادامه یادگیری» برساند، نه اینکه تمام اطلاعات سیستم LMS را در یک صفحه کوچک فشرده کند.**
