# LessonPlayer

**Component:** Learning
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Learning Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`LessonPlayer` کامپوننت اصلی تجربه یادگیری یک درس در Iran LMS است.

این کامپوننت محیطی را فراهم می‌کند که کاربر بتواند:

* محتوای درس را مشاهده کند.
* در Curriculum حرکت کند.
* وضعیت پیشرفت خود را ببیند.
* منابع درس را مشاهده کند.
* فایل‌های ضمیمه را باز کند.
* یادداشت شخصی ثبت کند.
* درس را Bookmark کند.
* درس را تکمیل‌شده علامت بزند.
* به درس قبلی و بعدی برود.
* در صورت فعال بودن، وارد Focus Mode شود.

طبق UI Guide، Lesson Player شامل Header، Curriculum، محتوای اصلی، Resources، Attachments، Notes، Bookmark، Mark Complete و Previous/Next است.

---

# 2. Core Principle

`LessonPlayer` یک **Learning Shell** است، نه یک Video Player.

ساختار:

```text
LessonPlayer
    │
    ├── Header
    │
    ├── Curriculum
    │
    ├── Lesson Content
    │
    ├── Lesson Information
    │
    ├── Resources
    │
    ├── Attachments
    │
    ├── Notes
    │
    ├── Actions
    │
    └── Navigation
```

---

# 3. Plugin Boundary

این کامپوننت متعلق به افزونه Iran LMS است:

```text
Iran LMS Plugin
    ↓
Learning Module
    ↓
LessonPlayer
```

Theme فقط می‌تواند آن را Style یا Extend کند.

`LessonPlayer` نباید متعلق به Theme باشد.

---

# 4. Theme Independence

LessonPlayer نباید به:

* قالب خاص
* Elementor
* Gutenberg Theme
* Bootstrap
* Tailwind
* jQuery UI

وابسته باشد.

باید با Themeهای مختلف WordPress کار کند.

---

# 5. Main Layout

در Desktop ساختار پایه:

```text
┌──────────────────────────────────────────────────────────┐
│                     Lesson Header                         │
├──────────────┬───────────────────────────┬───────────────┤
│              │                           │               │
│   Learning   │       Main Lesson         │   Curriculum  │
│   Insights   │          Content          │               │
│              │                           │               │
│              │       Video / Content     │   Chapters    │
│              │                           │   Lessons      │
│              │                           │               │
└──────────────┴───────────────────────────┴───────────────┘
```

UI Guide نیز ساختار سه‌ستونه شامل محتوای مرکزی، اطلاعات یادگیری و Curriculum را مشخص کرده است.

---

# 6. RTL Layout

در نسخه فارسی:

```text
Right
  ↓
Curriculum

Center
  ↓
Lesson Content

Left
  ↓
Learning Information
```

این ترتیب باید با RTL سیستم هماهنگ باشد.

---

# 7. Header

Header باید شامل اطلاعات و کنترل‌های عمومی Lesson باشد:

```text
Logo
Course Title
Breadcrumb
Progress
Theme Toggle
User
Exit Lesson
```

UI Guide نیز Logo، Course Title، Breadcrumb، Progress، Dark Mode و User Profile را برای Header مشخص کرده است.

---

# 8. Course Title

عنوان دوره باید در Header قابل مشاهده باشد.

مثال:

```text
دوره جامع آموزش React
```

اما Header نباید Course Entity را خودش Query کند.

---

# 9. Breadcrumb

Breadcrumb مسیر فعلی را نشان می‌دهد.

مثلاً:

```text
دوره‌ها
  /
دوره جامع React
  /
مقدمه
  /
مقدمه‌ای بر React
```

Breadcrumb Component مسئول نمایش ساختار مسیر است.

---

# 10. Course Progress

Progress دوره در Header می‌تواند نمایش داده شود:

```text
پیشرفت دوره
64%
████████████░░░░
```

Progress باید از Learning Module دریافت شود.

---

# 11. User Information

در صورت نیاز:

```text
Avatar
Name
Role
```

نمایش داده می‌شود.

اطلاعات User نباید مستقیماً از WordPress User API داخل Component دریافت شود.

---

# 12. Exit Lesson

کاربر باید امکان خروج از Lesson Player را داشته باشد.

مثلاً:

```text
[ خروج از درس ]
```

URL یا Action خروج باید توسط Parent تعیین شود.

---

# 13. Curriculum

Curriculum یکی از بخش‌های اصلی LessonPlayer است.

ساختار:

```text
سرفصل‌های دوره

فصل ۱
 ├── درس ۱ ✓
 ├── درس ۲ ●
 └── درس ۳

فصل ۲
 ├── درس ۴
 └── درس ۵
```

UI Guide نیز Curriculum را با Chapters قابل باز/بسته شدن، جستجوی درس و Highlight درس فعلی تعریف کرده است.

---

# 14. Chapter

Chapter باید قابل Expand/Collapse باشد.

```text
فصل ۱
   ↓
Expanded

فصل ۲
   ↓
Collapsed
```

وضعیت Collapse می‌تواند در UI نگهداری شود.

---

# 15. Lesson Item

هر Lesson Item می‌تواند شامل:

```text
Icon
Title
Duration
Status
Progress
```

باشد.

---

# 16. Current Lesson

درس فعلی باید کاملاً مشخص باشد.

مثلاً:

```text
┌────────────────────────────┐
│ ▶ مقدمه‌ای بر React        │
│   21:36                     │
└────────────────────────────┘
```

از Accent سیستم استفاده شود.

---

# 17. Lesson Type

Lesson Icon باید نوع محتوا را نشان دهد.

مثلاً:

```text
Video
PDF
Quiz
Assignment
Webinar
```

UI Guide نیز برای Curriculum آیکون‌های Video/PDF/Quiz/Assignment/Webinar را مشخص کرده است.

---

# 18. Lesson Status

Statusهای پایه:

```text
Locked
Available
In Progress
Completed
Current
```

---

# 19. Locked Lesson

برای درس قفل‌شده:

```text
🔒 درس بعدی
```

دلیل Lock می‌تواند خارج از Component تعیین شود.

---

# 20. Completed Lesson

درس تکمیل‌شده:

```text
✓
درس تکمیل‌شده
```

---

# 21. Lesson Search

Curriculum باید امکان جستجوی درس داشته باشد:

```text
جستجو در سرفصل‌ها
```

جستجو باید در مجموعه Lessonهای موجود انجام شود.

---

# 22. Main Content

مرکز LessonPlayer محل نمایش محتوای اصلی درس است.

ساختار:

```text
Content
 ↓
Lesson Header
 ↓
Lesson Renderer
 ↓
Description
 ↓
Teacher
 ↓
Resources
 ↓
Attachments
 ↓
Notes
```

---

# 23. Content Renderer

LessonPlayer نباید به Video وابسته باشد.

```text
LessonPlayer
     ↓
LessonRenderer
     ├── Video
     ├── Text
     ├── PDF
     ├── Audio
     ├── Quiz
     ├── Assignment
     └── Webinar
```

---

# 24. Video Lesson

برای Video:

```text
LessonPlayer
    ↓
VideoRenderer
```

Video Player مسئول:

* Play/Pause
* Volume
* Seek
* Speed
* Fullscreen

است.

LessonPlayer فقط آن را در تجربه Lesson قرار می‌دهد.

---

# 25. PDF Lesson

برای PDF:

```text
LessonPlayer
    ↓
FileViewer
    ↓
PDF Renderer
```

این معماری با `FileViewer` تعریف‌شده برای Media سازگار است.

---

# 26. Quiz Lesson

Quiz باید از Quiz Component/Module استفاده کند.

LessonPlayer نباید منطق:

* Question
* Answer
* Scoring
* Passing Score

را پیاده‌سازی کند.

---

# 27. Assignment Lesson

Assignment نیز باید Renderer/Module خودش را داشته باشد.

UI Guide برای Assignment قابلیت Drag & Drop Upload، Allowed Types و Deadline را مشخص کرده است.

---

# 28. Webinar Lesson

Webinar Renderer می‌تواند شامل:

```text
Webinar Provider
Instructor
Countdown
Join Button
```

باشد.

UI Guide نمونه integration با SkyRoom و Join Button و Countdown را مشخص کرده است.

---

# 29. Lesson Title

بعد از محتوای اصلی، عنوان درس باید نمایش داده شود.

مثال:

```text
درس ۱
مقدمه‌ای بر React و نحوه کار آن
```

---

# 30. Lesson Metadata

Metadata می‌تواند شامل:

```text
Duration
Lesson Type
Instructor
Estimated Study Time
```

باشد.

مثال:

```text
21:36 دقیقه
ویدیوی آموزشی
محمد رضایی
```

---

# 31. Estimated Study Time

UI Guide وجود `Estimated Study Time` را در Lesson Player مشخص کرده است.

مثلاً:

```text
زمان تقریبی مطالعه: 25 دقیقه
```

این مقدار باید از Lesson Metadata بیاید.

---

# 32. Instructor Card

Teacher Card می‌تواند شامل:

```text
Avatar
Name
Role
```

باشد.

مثلاً:

```text
[Avatar]
محمد رضایی
مربی این دوره
```

---

# 33. Instructor Boundary

Instructor Card نباید اطلاعات مدرس را Query کند.

صحیح:

```text
Course API
 ↓
Instructor DTO
 ↓
TeacherCard
```

---

# 34. Description

Description زیر Lesson Header نمایش داده می‌شود.

مثلاً:

```text
در این درس با مفاهیم پایه آشنا می‌شوید
و اولین پروژه خود را ایجاد می‌کنید.
```

Description باید قابل Collapse شدن در متن‌های طولانی باشد.

---

# 35. Bookmark

کاربر باید بتواند Lesson را Bookmark کند.

مثلاً:

```text
[ 🔖 ذخیره درس ]
```

---

# 36. Bookmark Boundary

LessonPlayer فقط Action را Trigger می‌کند.

```text
LessonPlayer
    ↓
Bookmark Event
    ↓
Learning Module
    ↓
Persistence
```

Database Query نباید داخل Component انجام شود.

---

# 37. Notes

بخش Notes برای یادداشت شخصی کاربر است.

UI Guide وجود Notes را در Lesson Player مشخص کرده است.

نمونه:

```text
یادداشت شخصی شما

نکته مهم این درس...
```

---

# 38. Notes Ownership

ذخیره Notes متعلق به Learning/Notes Module است.

LessonPlayer فقط UI را نمایش می‌دهد.

---

# 39. Resources

Resources بخشی از محتوای Lesson هستند.

مثلاً:

```text
منابع درس

📄 جزوه
🔗 لینک مستندات
💻 فایل پروژه
```

---

# 40. Attachments

Attachments نیز باید در Lesson Player قابل دسترسی باشند.

مثلاً:

```text
فایل‌های این درس

📄 lesson.pdf
📦 source.zip
```

UI Guide صراحتاً Resources و Attachments را در بخش مرکزی Lesson مشخص کرده است.

---

# 41. FileViewer Integration

برای فایل‌های قابل Preview:

```text
Attachment
 ↓
FileViewer
```

LessonPlayer نباید PDF یا Image Viewer جداگانه بسازد.

---

# 42. Tabs

برای جلوگیری از شلوغی می‌توان از Tabs استفاده کرد.

UI Guide این تب‌ها را مشخص کرده است:

```text
درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
نظرات
```

---

# 43. Tab Ownership

Tabs Component مسئول:

```text
Active Tab
Keyboard Navigation
Tab Indicator
```

است.

LessonPlayer فقط Tab Content را مدیریت می‌کند.

---

# 44. Lesson Tab

محتوای اصلی:

```text
Description
Instructor
Resources
Notes
```

---

# 45. Files Tab

محتوای:

```text
Attachments
Resources
Downloads
```

می‌تواند در این Tab نمایش داده شود.

---

# 46. Assignment Tab

اگر Assignment وجود داشته باشد:

```text
Assignment
Upload
Deadline
Status
```

نمایش داده می‌شود.

---

# 47. Quiz Tab

اگر Quiz فعال باشد:

```text
Quiz
Question Count
Time
Passing Score
Start
```

طبق UI Guide، Quiz Card شامل Start Button، Question Count، Time و Passing Score است.

---

# 48. Discussion Tab

در صورت فعال بودن Forum/Discussion:

```text
Questions
Replies
Instructor Badge
```

نمایش داده می‌شود.

---

# 49. Comments

Comments می‌توانند Threaded باشند.

UI Guide برای Comments:

```text
Threaded replies
Instructor badge
```

را مشخص کرده است.

---

# 50. Mark Complete

Action مهم Lesson:

```text
[ ✓ علامت‌گذاری به عنوان انجام شده ]
```

است.

---

# 51. Completion Boundary

LessonPlayer نباید خودش Completion را محاسبه کند.

```text
User Action
   ↓
Learning Module
   ↓
Lesson Completion
   ↓
Progress Update
```

---

# 52. Auto Completion

برای Video ممکن است Completion بر اساس درصد مشاهده اتفاق بیفتد.

اما Threshold باید توسط Learning Module تعیین شود.

مثلاً:

```text
Video watched
    ↓
80%
    ↓
Eligible for Completion
```

این منطق داخل Video Player یا LessonPlayer قرار نمی‌گیرد.

---

# 53. Previous / Next

Navigation:

```text
[ درس قبلی ]       [ درس بعدی ]
```

باید در پایین Lesson یا Header قابل دسترسی باشد.

UI Guide وجود Previous/Next Lesson را مشخص کرده است.

---

# 54. Navigation Data

LessonPlayer باید اطلاعات زیر را دریافت کند:

```text
previousLesson
nextLesson
```

یا:

```text
previousUrl
nextUrl
```

---

# 55. Navigation Rules

اگر Lesson اول است:

```text
Previous = Disabled
```

اگر Lesson آخر است:

```text
Next = Disabled
```

---

# 56. Progress

Progress می‌تواند در چند نقطه نمایش داده شود:

```text
Header
Curriculum
Lesson
```

اما منبع داده باید یکی باشد.

---

# 57. Progress Contract

نمونه:

```text
{
    completedLessons: 24,
    totalLessons: 38,
    percentage: 64
}
```

---

# 58. Progress Display

مثلاً:

```text
پیشرفت دوره
64%
████████████░░░░
```

یا:

```text
24 از 38 درس
```

---

# 59. Learning Sidebar

UI Guide برای Sidebar اطلاعاتی مانند:

```text
Course Progress
Remaining Lessons
Statistics
Learning Streak
Achievements
Certificate Progress
Webinar Countdown
```

را مشخص کرده است.

این بخش باید Modular باشد.

---

# 60. Course Progress Widget

```text
پیشرفت شما در این دوره

64%

24 از 38 درس
```

---

# 61. Remaining Lessons

مثلاً:

```text
14 درس باقی مانده
```

این مقدار از Progress Data به دست می‌آید.

---

# 62. Learning Statistics

نمونه:

```text
زمان یادگیری
18 ساعت

درس‌های تکمیل‌شده
24

جلسات یادگیری
32
```

این اطلاعات از Learning/Analytics Module می‌آیند.

---

# 63. Learning Streak

در صورت فعال بودن Gamification:

```text
🔥
12 روز متوالی
```

اما اگر Gamification غیرفعال باشد، Widget نباید فضای خالی ایجاد کند.

---

# 64. Achievements

در صورت فعال بودن:

```text
دستاوردها
🏆 🏅 🎯
```

نمایش داده می‌شود.

---

# 65. Certificate Progress

در صورت فعال بودن Certificate:

```text
پیشرفت گواهینامه
80%
```

نمایش داده می‌شود.

Certificate باید Module مستقل باقی بماند.

---

# 66. Webinar Countdown

اگر Webinar بعدی مرتبط باشد:

```text
وبینار بعدی

02 روز
16 ساعت
47 دقیقه
23 ثانیه
```

Widget Webinar مسئول Countdown است.

---

# 67. Modular Features

UI Guide ماژول‌های زیر را به‌عنوان قابلیت‌های قابل فعال/غیرفعال شدن مشخص کرده است:

```text
WooCommerce
SpotPlayer
SkyRoom
Certificate
Wallet
SMS
Gamification
Attendance
Homework
Survey
Forum
```

---

# 68. Disabled Modules

قانون مهم:

```text
Module Disabled
      ↓
Component Hidden
      ↓
Layout Remains Valid
```

نباید:

```text
Module Disabled
      ↓
Empty Card
      ↓
Broken Layout
```

ایجاد شود.

---

# 69. Focus Mode

Focus Mode یکی از قابلیت‌های مهم LessonPlayer است.

هدف:

```text
Remove Distractions
Keep Lesson
Keep Essential Navigation
```

UI Guide نیز Focus Mode را با مخفی شدن Sidebars، Video بزرگ، حداقل حواس‌پرتی و نگه داشتن Navigation و Notes تعریف کرده است.

---

# 70. Enter Focus Mode

Action:

```text
[ حالت تمرکز ]
```

بعد:

```text
LessonPlayer
      ↓
Focus Mode
```

---

# 71. Focus Mode Layout

```text
┌──────────────────────────────────────────┐
│          Minimal Header                  │
├──────────────────────────────────────────┤
│                                          │
│                                          │
│             Lesson Content               │
│                                          │
│             Large Player                 │
│                                          │
│                                          │
├──────────────────────────────────────────┤
│      Notes      Previous      Next       │
└──────────────────────────────────────────┘
```

---

# 72. What Focus Mode Hides

به‌صورت پیش‌فرض:

```text
Curriculum Sidebar
Learning Insights Sidebar
Unnecessary Widgets
```

مخفی می‌شوند.

---

# 73. What Focus Mode Keeps

باید باقی بمانند:

```text
Lesson Content
Essential Navigation
Notes
Progress/Completion
Exit Focus
```

---

# 74. Focus Mode Independence

Focus Mode نباید یک Component کاملاً جدا از LessonPlayer باشد.

بهتر:

```text
LessonPlayer
    ├── Normal Mode
    └── Focus Mode
```

---

# 75. Mobile Layout

در Mobile، سه ستون Desktop حذف می‌شوند.

ساختار:

```text
Header
 ↓
Lesson Content
 ↓
Lesson Info
 ↓
Tabs
 ↓
Navigation
```

Curriculum می‌تواند داخل Drawer قرار گیرد.

---

# 76. Mobile Curriculum

```text
[ سرفصل‌ها ]
```

با انتخاب:

```text
Drawer
 ↓
Curriculum
```

باز می‌شود.

Drawer Component مسئول Drawer است.

---

# 77. Mobile Bottom Navigation

برای Actionهای اصلی می‌توان از Bottom Navigation استفاده کرد:

```text
درس قبلی
سرفصل‌ها
درس بعدی
```

اما نباید تمام UI LessonPlayer را به Bottom Navigation تبدیل کرد.

---

# 78. Responsive Player

Video یا FileViewer باید:

```text
width: 100%
```

و نسبت تصویر مناسب داشته باشد.

نباید Horizontal Overflow ایجاد کند.

---

# 79. Dark Mode

LessonPlayer باید Light و Dark Mode را پشتیبانی کند.

Theme Tokenها باید از Design System بیایند.

---

# 80. RTL

تمام UI باید RTL باشد، اما:

* Video controls
* Code
* URLs
* File names
* Technical content

نباید الزاماً RTL شوند.

---

# 81. Accessibility

LessonPlayer باید:

```text
Keyboard Accessible
Screen Reader Friendly
Focus Managed
Visible Focus
Semantic Structure
```

باشد.

---

# 82. Keyboard Navigation

حداقل:

```text
Tab
Shift + Tab
Enter
Space
Escape
Arrow Keys
```

بسته به Component داخلی.

---

# 83. Focus Management

وقتی Curriculum از Drawer باز می‌شود:

```text
Open Drawer
 ↓
Focus → Drawer
 ↓
Close
 ↓
Focus → Trigger
```

---

# 84. Loading State

در بارگذاری Lesson:

```text
Header Skeleton
Curriculum Skeleton
Content Skeleton
```

نمایش داده شود.

---

# 85. Error State

اگر Lesson قابل بارگذاری نباشد:

```text
درس قابل بارگذاری نیست.

[ تلاش مجدد ]
```

Error Handling باید از Data Layer جدا باشد.

---

# 86. Access Denied

اگر کاربر اجازه دسترسی ندارد:

```text
🔒
شما به این درس دسترسی ندارید.
```

اما Access Check خارج از Component انجام می‌شود.

---

# 87. Lesson Not Found

اگر Lesson حذف شده یا وجود نداشته باشد:

```text
درس پیدا نشد.
```

Parent/Router باید تصمیم Navigation را بگیرد.

---

# 88. LessonPlayer API

نمونه API:

```js
<LessonPlayer
    course={course}
    lesson={lesson}
    curriculum={curriculum}
    progress={progress}
    instructor={instructor}
    resources={resources}
    attachments={attachments}
    navigation={navigation}
    features={features}
/>
```

---

# 89. Feature Configuration

مثلاً:

```js
features = {
    notes: true,
    bookmarks: true,
    ratings: true,
    forum: false,
    certificate: true,
    gamification: true,
    webinar: false
}
```

LessonPlayer بر اساس داده دریافت‌شده Render می‌کند.

---

# 90. Event API

Eventهای عمومی:

```text
onLessonOpen
onLessonComplete
onLessonChange
onBookmark
onNoteSave
onResourceOpen
onAttachmentOpen
onFocusModeEnter
onFocusModeExit
onPrevious
onNext
```

---

# 91. Analytics Boundary

LessonPlayer فقط Event ایجاد می‌کند.

```text
LessonPlayer
   ↓
Event
   ↓
Analytics Module
```

ذخیره Analytics در Component انجام نمی‌شود.

---

# 92. Learning Progress Boundary

```text
LessonPlayer
   ↓
Progress Event
   ↓
Learning Module
   ↓
Persistence
```

---

# 93. API Boundary

LessonPlayer نباید مستقیماً:

```text
wpdb
WP_Query
REST Request
```

انجام دهد.

بهتر:

```text
Repository / API
      ↓
DTO
      ↓
LessonPlayer
```

---

# 94. WordPress Architecture

برای افزونه:

```text
WordPress
    ↓
Iran LMS Plugin
    ├── Domain
    ├── Application
    ├── API
    ├── Modules
    └── UI
          ↓
      LessonPlayer
```

LessonPlayer در Presentation/UI Layer قرار می‌گیرد.

---

# 95. REST/API Future

ساختار باید برای Web و Mobile قابل استفاده باشد:

```text
Course/Lesson Domain
       ↓
API
   ┌───┴────┐
   ↓        ↓
 Web       Mobile
   ↓
LessonPlayer
```

Mobile App کامپوننت Web را استفاده نمی‌کند، اما همان Domain/API را مصرف خواهد کرد.

---

# 96. Component Composition

LessonPlayer باید از Componentهای قبلی استفاده کند:

```text
LessonPlayer
 ├── Topbar
 ├── Breadcrumb
 ├── Progress
 ├── Sidebar
 ├── Card
 ├── Tabs
 ├── Button
 ├── Badge
 ├── Avatar
 ├── FileViewer
 ├── Notes
 ├── Modal
 ├── Drawer
 └── Notification
```

نباید این Componentها دوباره داخل LessonPlayer پیاده‌سازی شوند.

---

# 97. LessonPlayer Does Not Own

موارد زیر نباید مالکیت LessonPlayer باشند:

```text
Course Database
Enrollment
Payment
Quiz Scoring
Assignment Grading
Certificate Generation
Analytics Storage
User Authentication
File Permission
```

---

# 98. LessonPlayer Owns

مسئولیت‌های اصلی:

```text
Lesson Layout
Lesson Navigation
Renderer Placement
UI State
Focus Mode State
Tab State
Curriculum Visibility
Presentation Events
```

---

# 99. Performance

LessonPlayer ممکن است صفحه سنگینی باشد؛ بنابراین:

* Rendererها Lazy Load شوند.
* Curriculumهای بزرگ Virtualize شوند.
* فایل‌ها قبل از نیاز بارگذاری نشوند.
* Widgetهای اختیاری فقط در صورت فعال بودن Render شوند.
* API Requestهای تکراری حذف شوند.

---

# 100. Large Curriculum

برای دوره‌های بزرگ:

```text
100+ Lessons
```

نباید همه Lesson Contentها همزمان Render شوند.

فقط اطلاعات لازم Curriculum بارگذاری شود.

---

# 101. State Management

Stateهای UI:

```text
activeTab
curriculumOpen
focusMode
expandedChapters
searchQuery
```

می‌توانند Client-side باشند.

Stateهای Domain:

```text
lessonProgress
completion
enrollment
bookmark
```

باید از Learning/API دریافت و ذخیره شوند.

---

# 102. URL State

در صورت نیاز:

```text
/course/react/lesson/intro
```

باید Lesson فعلی را مشخص کند.

Tab یا Focus Mode می‌تواند در آینده بخشی از URL State باشد، ولی نباید الزاماً باشد.

---

# 103. Navigation After Completion

بعد از Complete شدن Lesson:

```text
Complete
 ↓
Progress Update
 ↓
Next Lesson
```

کاربر می‌تواند پیشنهاد:

```text
[ درس بعدی ]
```

دریافت کند.

---

# 104. Completion Feedback

پس از تکمیل:

```text
✓ درس تکمیل شد
```

یک Feedback کوتاه نمایش داده شود.

Toast یا Inline Feedback می‌تواند استفاده شود.

---

# 105. Micro Interactions

طبق UI Guide، سیستم باید از:

```text
Hover Animations
Smooth Transitions
Floating Buttons
Soft Glow
Minimal Icons
Premium Badges
```

استفاده کند.

اما Motion نباید مانع یادگیری شود.

---

# 106. Course Locking

اگر Course یا Lesson Lock شده باشد:

```text
Access Layer
 ↓
locked
 ↓
LessonPlayer
```

LessonPlayer فقط UI مناسب را نمایش می‌دهد.

---

# 107. Prerequisite

اگر Lesson نیازمند Lesson قبلی باشد:

```text
Prerequisite
 ↓
Access Decision
 ↓
LessonPlayer
```

Prerequisite Logic نباید داخل UI Component باشد.

---

# 108. Security

LessonPlayer نباید امنیت را با مخفی کردن Button تأمین کند.

مثلاً:

```text
Download Button hidden
```

به معنی Protected File نیست.

Authorization باید در Backend انجام شود.

---

# 109. Protected Content

برای محتوای Protected:

```text
User
 ↓
Authorization
 ↓
Secure Resource
 ↓
Renderer
```

---

# 110. Do

* LessonPlayer را Core Learning Component نگه دار.
* Rendererها را جدا کن.
* Curriculum را Modular طراحی کن.
* Progress را از Learning Module دریافت کن.
* Resources و Attachments را پشتیبانی کن.
* FileViewer را برای فایل‌ها استفاده کن.
* Focus Mode را در همان Shell پیاده کن.
* RTL را جدی بگیر.
* Mobile را از ابتدا در معماری در نظر بگیر.
* Accessibility را رعایت کن.
* Theme Independence را حفظ کن.
* Moduleهای اختیاری را بدون شکستن Layout مدیریت کن.
* API/Domain را از UI جدا نگه دار.
* Eventها را برای Analytics و Learning expose کن.

---

# 111. Don't

* Video Player را با LessonPlayer یکی نکن.
* Database Query داخل Component انجام نده.
* Enrollment Check داخل Component انجام نده.
* Quiz Logic داخل Component انجام نده.
* Payment Logic داخل Component انجام نده.
* Certificate Logic داخل Component انجام نده.
* Authorization را با Hide کردن UI حل نکن.
* Theme CSS را فرض نکن.
* WooCommerce را Dependency مستقیم نکن.
* همه Lessonهای Curriculum را یکجا Render نکن.
* Focus Mode را به یک صفحه مستقل و جدا از LessonPlayer تبدیل نکن.

---

# 112. Testing Requirements

## Lesson Types

```text
Video
PDF
Text
Audio
Quiz
Assignment
Webinar
```

## Navigation

```text
First Lesson
Middle Lesson
Last Lesson
Previous
Next
```

## Progress

```text
0%
25%
50%
100%
```

## States

```text
Loading
Ready
Error
Locked
Completed
In Progress
```

## Features

```text
Notes
Bookmark
Resources
Attachments
Comments
Quiz
Assignment
Certificate
Gamification
Webinar
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## Modes

```text
Normal
Focus Mode
Dark Mode
Light Mode
```

## Accessibility

```text
Keyboard
Screen Reader
Focus
ARIA
RTL
```

---

# 113. Final Architecture

```text
                         LessonPlayer
                              │
          ┌───────────────────┼───────────────────┐
          │                   │                   │
       Header             Main Content        Curriculum
          │                   │                   │
     Course Info          Renderer              Chapters
     Progress             Lesson Info           Lessons
     Navigation           Resources             Search
                          Attachments             Progress
                          Notes
                          Tabs
                          Actions
                              │
                 ┌────────────┼────────────┐
                 ↓            ↓            ↓
               Video        File        Quiz
              Renderer     Viewer       Module
                 │            │            │
                 ↓            ↓            ↓
             Video       PDF/Image      Assessment
```

---

# 114. Final Responsibility Map

```text
Course Module
    → Course Information

Learning Module
    → Lesson
    → Progress
    → Completion
    → Bookmark
    → Learning State

Enrollment Module
    → Enrollment / Access

Assessment Module
    → Quiz / Assignment

Certificate Module
    → Certificate

Commerce Module
    → Price / Purchase

Media Module
    → Files / Media

Communication Module
    → Comments / Discussion

Analytics Module
    → Tracking

LessonPlayer
    → Presentation + Orchestration of Lesson Experience
```

---

# 115. Final Principle

`LessonPlayer` باید **مرکز تجربه یادگیری Iran LMS** باشد، اما نباید تبدیل به یک God Component شود.

اصل معماری:

```text
LessonPlayer
     ↓
Compose Modules
     ↓
Present Learning Experience
```

نه:

```text
LessonPlayer
     ↓
Own Everything
```

بنابراین LessonPlayer فقط Shell و Orchestrator تجربه یادگیری است و منطق اصلی Course، Learning، Assessment، Commerce، Certificate، Media و Communication در Moduleهای مستقل باقی می‌ماند.

این ساختار باعث می‌شود افزونه Iran LMS بتواند در آینده قابلیت‌هایی مانند Quiz، Assignment، Webinar، Certificate، Gamification، Focus Mode و Mediaهای مختلف را بدون بازنویسی هسته Lesson Player توسعه دهد.
