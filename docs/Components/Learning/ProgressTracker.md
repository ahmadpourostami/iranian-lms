# ProgressTracker.md

**Component:** Learning / ProgressTracker
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Learning Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`ProgressTracker` مسئول نمایش و مدیریت **پیشرفت یادگیری کاربر** در سطوح مختلف است.

این Component نباید صرفاً یک Progress Bar باشد؛ بلکه UI باید وضعیت Progress را از Domain مربوط به Learning دریافت و در Contextهای مختلف نمایش دهد.

در UI Guide، Progress در چند نقطه اصلی تعریف شده است:

* Progress درصدی در Header Lesson Player
* Progress در Sidebar دوره
* Progress درس فعلی
* Course Progress
* Remaining Lessons
* Statistics
* Certificate Progress
* Progress در Course Cardهای Dashboard 

همچنین نمونه Dashboard شامل درصد پیشرفت دوره، تعداد درس فعلی و Progress Bar است. 

---

# 2. Core Principle

```text
ProgressTracker
=
Learning Progress Presentation
```

اما:

```text
ProgressTracker
≠
Progress Domain
```

یعنی Component نباید خودش تصمیم بگیرد که کاربر چه زمانی 60٪ پیشرفت کرده است.

```text
Learning Domain
      ↓
Progress Data
      ↓
ProgressTracker
      ↓
UI
```

---

# 3. Plugin Boundary

```text
Iran LMS Plugin
      │
      └── Learning
           │
           └── ProgressTracker
```

این Component باید کاملاً مستقل از Theme باشد.

Theme فقط ظاهر و Layout را کنترل می‌کند.

---

# 4. Progress Levels

Progress باید حداقل در این سطوح قابل نمایش باشد:

```text
Course
Lesson
Chapter / Section
Learning Path
```

در Foundation:

```text
Course
Lesson
```

اولویت دارند.

---

# 5. Course Progress

نمونه:

```text
پیشرفت دوره

██████████████░░░░░░ 72٪

18 از 25 درس تکمیل شده
```

---

# 6. Lesson Progress

```text
پیشرفت درس

████████████░░░░ 60٪
```

این مقدار می‌تواند بر اساس Video Watch Progress یا Completion State محاسبه شود.

---

# 7. Current Lesson

در Lesson Player باید وضعیت درس فعلی مشخص باشد.

مثلاً:

```text
درس ۱۵ از ۱۹

Async/Await و Promises

██████████████░░ 72٪
```

نمونه Dashboard نیز از الگوی «درس ۱۵ از ۱۹» و درصد Progress استفاده می‌کند. 

---

# 8. Header Progress

در Lesson Player:

```text
Course Title
     │
     └── Progress: 72٪
```

UI Guide صراحتاً Progress درصدی را در Header تعریف کرده است. 

---

# 9. Sidebar Progress

در Sidebar:

```text
پیشرفت دوره

72٪

18 / 25 درس
```

Sidebar می‌تواند اطلاعات بیشتری داشته باشد:

```text
تکمیل شده
18

باقی‌مانده
7
```

---

# 10. Progress Formula

برای Course Progress در ساده‌ترین حالت:

```text
completedLessons
──────────────────── × 100
totalLessons
```

اما این فقط یکی از روش‌های محاسبه است.

اگر Course از Completion Rules پیچیده‌تر استفاده کند، Progress باید از Learning Domain دریافت شود.

---

# 11. Do Not Calculate in UI

این کار اشتباه است:

```text
UI
 ↓
completed / total
 ↓
calculate
```

بهتر:

```text
Progress Service
 ↓
percentage: 72
 ↓
ProgressTracker
```

---

# 12. Progress Model

مدل پیشنهادی:

```js
{
    percentage: 72,
    completed: 18,
    total: 25
}
```

---

# 13. Extended Progress Model

برای Foundation می‌توان Model را این‌گونه طراحی کرد:

```js
{
    percentage: 72,
    completed: 18,
    total: 25,
    remaining: 7,
    status: "in_progress"
}
```

---

# 14. Progress Status

```text
not_started
in_progress
completed
locked
```

---

# 15. Not Started

```text
پیشرفت
0٪
```

UI باید بتواند این وضعیت را بدون نمایش خطای Empty State نشان دهد.

---

# 16. In Progress

```text
پیشرفت
72٪
```

---

# 17. Completed

```text
✓ تکمیل شده
100٪
```

Progress Bar در این حالت می‌تواند به حالت Completed تغییر کند.

---

# 18. Locked

اگر Course/Lesson هنوز قابل دسترسی نیست:

```text
🔒 قفل شده
```

Progress نباید به‌عنوان 0٪ تفسیر شود.

---

# 19. Progress Variants

```text
linear
circular
compact
detailed
card
sidebar
header
lesson
dashboard
```

---

# 20. Linear Progress

حالت اصلی:

```text
پیشرفت دوره

██████████████░░░░░░ 72٪
```

---

# 21. Circular Progress

برای Dashboard:

```text
      ╭──────╮
     │  72٪  │
      ╰──────╯

    پیشرفت کل
```

این نوع نمایش با الگوهای داشبورد پروژه نیز سازگار است. 

---

# 22. Compact Progress

برای Course Card:

```text
72٪
██████████░░
```

نمونه Dashboard Course Card نیز Progress Bar و درصد را نمایش می‌دهد. 

---

# 23. Detailed Progress

```text
پیشرفت دوره

72٪

18 از 25 درس
7 درس باقی‌مانده

██████████████░░░░░░
```

---

# 24. Progress Card

```text
┌──────────────────────────────┐
│ پیشرفت دوره                  │
│                              │
│ 72٪                          │
│ ██████████████░░░░░░         │
│                              │
│ 18 از 25 درس تکمیل شده       │
│ 7 درس باقی‌مانده             │
└──────────────────────────────┘
```

---

# 25. Course Card

در Course Card:

```text
آموزش جامع React

درس 12 از 28

████████████░░░░ 60٪

[ ادامه یادگیری ]
```

---

# 26. Recent Lessons

در Dashboard، Progress می‌تواند کنار Last Viewed Lesson نمایش داده شود.

نمونه UI:

```text
آخرین درس‌های مشاهده شده

مقدمه‌ای بر React Hooks
پیشرفت: 60٪

ماژول‌ها در Node.js
پیشرفت: 44٪
```

این الگو در Dashboard مرجع پروژه دیده می‌شود. 

---

# 27. Continue Learning

ProgressTracker باید با Continue Learning سازگار باشد:

```text
Course
 ↓
Last Lesson
 ↓
Progress
 ↓
Continue
```

مثلاً:

```text
60٪
درس 12 از 28

[ ادامه یادگیری ]
```

---

# 28. Lesson Completion

Progress نباید الزاماً معادل Completion باشد.

مثلاً:

```text
Video watched: 60٪
Lesson completed: No
```

ممکن است Lesson هنوز Complete نشده باشد.

---

# 29. Mark Complete

در Lesson Player Action:

```text
[ ✓ تکمیل درس ]
```

می‌تواند وضعیت Completion را تغییر دهد و سپس ProgressTracker به‌روزرسانی شود.

---

# 30. Progress Update Flow

```text
User Action
    ↓
Learning Event
    ↓
Progress Service
    ↓
Persist Progress
    ↓
Recalculate
    ↓
ProgressTracker
```

---

# 31. Video Progress

برای Lesson ویدئویی:

```text
Video
 ↓
Watch Position
 ↓
Progress Service
 ↓
Lesson Progress
```

مثلاً:

```text
12:00 / 20:00
=
60٪
```

اما UI نباید خودش تصمیم بگیرد که این مقدار به‌تنهایی Lesson را Complete می‌کند.

---

# 32. Progress Persistence

Progress باید Server-side ذخیره شود.

مثلاً:

```text
userId
courseId
lessonId
progress
lastPosition
updatedAt
```

---

# 33. Resume Learning

ProgressTracker باید Resume Learning را پشتیبانی کند.

```text
Lesson
 ↓
lastPosition = 08:42
 ↓
Continue
 ↓
Video → 08:42
```

---

# 34. Last Position

برای Video:

```js
{
    lessonId,
    percentage,
    lastPositionSeconds
}
```

---

# 35. Progress vs Bookmark

این دو کاملاً متفاوت هستند:

```text
Progress
=
کاربر چقدر پیش رفته؟

Bookmark
=
کاربر چه چیزی را ذخیره کرده؟
```

مثلاً:

```text
Progress: 72٪
Bookmark: Yes
```

---

# 36. Progress vs Notes

```text
Progress
=
وضعیت یادگیری

Notes
=
یادداشت شخصی
```

---

# 37. Course Progress Source

ProgressTracker نباید مستقیماً از Post Typeهای WordPress محاسبه کند.

اشتباه:

```text
WP_Query
 ↓
count posts
 ↓
calculate %
```

صحیح:

```text
Learning Domain
 ↓
Progress Service
 ↓
Progress DTO
 ↓
UI
```

---

# 38. WordPress Architecture

ساختار پیشنهادی:

```text
ProgressTracker UI
        ↓
Learning Application Layer
        ↓
Progress Service
        ↓
Progress Repository
        ↓
Database
```

---

# 39. Database Independence

Component نباید بداند Progress در:

```text
Custom Table
User Meta
Post Meta
External Storage
```

ذخیره شده است.

این تصمیم متعلق به Database Architecture است.

---

# 40. API Boundary

API پیشنهادی:

```text
GET /courses/{courseId}/progress
GET /lessons/{lessonId}/progress
POST /lessons/{lessonId}/progress
```

یا برای Update:

```text
PATCH /learning-progress/{id}
```

ساختار نهایی باید با `03-API/04-Learning-API.md` هماهنگ باشد.

---

# 41. Course Progress Response

```json
{
    "courseId": 123,
    "percentage": 72,
    "completed": 18,
    "total": 25,
    "remaining": 7,
    "status": "in_progress"
}
```

---

# 42. Lesson Progress Response

```json
{
    "lessonId": 456,
    "percentage": 60,
    "completed": false,
    "lastPositionSeconds": 720,
    "updatedAt": "..."
}
```

---

# 43. API Security

Progress Update باید:

```text
Authenticated
        ↓
User Owns Progress
        ↓
Has Course/Lesson Access
        ↓
Validate Payload
        ↓
Update
```

باشد.

---

# 44. Client Ownership

Client نباید بتواند:

```json
{
    "userId": 999,
    "percentage": 100
}
```

ارسال کند و باعث تغییر Progress کاربر دیگر شود.

User Identity باید Server-side تعیین شود.

---

# 45. Validation

Progress:

```text
minimum = 0
maximum = 100
```

باید Validate شود.

---

# 46. Precision

برای UI معمولاً:

```text
72٪
```

کافی است.

Domain می‌تواند مقدار دقیق‌تر نگه دارد:

```text
72.35
```

و UI آن را Round کند.

---

# 47. Progress Rounding

قاعده UI:

```text
72.35 → 72٪
72.50 → 73٪
```

یا Policy ثابت دیگری.

این Policy باید در Design System یکسان باشد.

---

# 48. Loading State

در بارگذاری:

```text
پیشرفت دوره

░░░░░░░░░░░░░░░░
```

یا Skeleton.

---

# 49. Error State

اگر Progress دریافت نشد:

```text
امکان دریافت پیشرفت وجود ندارد.

[ تلاش مجدد ]
```

نباید Progress اشتباه مثل `0٪` نمایش داده شود.

---

# 50. Unknown State

اگر Server هنوز Progress را مشخص نکرده:

```text
—
```

بهتر از:

```text
0٪
```

است.

چون `0٪` معنی مشخص دارد.

---

# 51. Empty State

ProgressTracker معمولاً Empty State ندارد.

برای:

```text
Not Started
```

از:

```text
0٪
```

استفاده می‌شود.

---

# 52. Disabled State

اگر Target Locked باشد:

```text
🔒 قفل شده
```

و Progress Bar غیرفعال است.

---

# 53. Animation

هنگام تغییر Progress:

```text
40٪
 ↓
60٪
```

Progress Bar می‌تواند Smooth Transition داشته باشد.

مثلاً:

```text
transition: width
```

اما Animation نباید مانع دسترسی یا Performance شود.

---

# 54. Reduced Motion

اگر کاربر:

```text
prefers-reduced-motion
```

فعال کرده باشد، Animation باید کاهش پیدا کند یا حذف شود.

---

# 55. Color Semantics

Progress معمولی:

```text
Primary
```

Completed:

```text
Success
```

Locked:

```text
Neutral
```

Error:

```text
Danger
```

از رنگ‌های Hard-coded استفاده نشود.

---

# 56. Design Tokens

Progress باید از Tokenها استفاده کند:

```text
progress-track
progress-fill
progress-completed
progress-locked
progress-text
```

---

# 57. Dark Mode

```text
Track
=
Dark Surface

Fill
=
Primary

Text
=
Primary / Secondary
```

---

# 58. RTL

Progress Bar در RTL باید از نظر Layout طبیعی باشد.

اما یک نکته مهم:

```text
Progress = 0 → 100
```

مفهوم عددی است و نباید به خاطر RTL تغییر کند.

---

# 59. Mobile

در Mobile:

```text
Course
60٪

████████████░░░
```

اطلاعات اضافی مثل:

```text
18 از 25
```

می‌تواند زیر Bar قرار گیرد.

---

# 60. Accessibility

Progress باید Semantic باشد.

برای Progress Bar می‌توان از:

```html
role="progressbar"
```

استفاده کرد.

و:

```text
aria-valuenow
aria-valuemin
aria-valuemax
```

را تنظیم کرد.

مثلاً:

```text
aria-valuenow="72"
aria-valuemin="0"
aria-valuemax="100"
```

---

# 61. Screen Reader

بهتر است اطلاعات قابل فهم باشد:

```text
پیشرفت دوره: 72 درصد، 18 درس از 25 درس تکمیل شده
```

---

# 62. Circular Progress Accessibility

عدد داخل Circle باید قابل دسترسی باشد:

```text
72 درصد پیشرفت دوره
```

نه فقط یک Graphic.

---

# 63. Progress + Certificate

UI Guide Certificate Progress را نیز در Lesson Player پیش‌بینی کرده است. 

پس:

```text
Course Progress
       ↓
Certificate Eligibility
```

ممکن است مرتبط باشد.

اما:

```text
ProgressTracker
≠
Certificate Engine
```

Certificate Module باید Eligibility را تعیین کند.

---

# 64. Progress + Gamification

Learning Progress می‌تواند Event تولید کند:

```text
progress_updated
lesson_completed
course_completed
```

Gamification Module می‌تواند از آن استفاده کند.

مثلاً:

```text
100٪ دوره
 ↓
Achievement
```

---

# 65. Progress + Analytics

Eventهای احتمالی:

```text
lesson_progress_updated
course_progress_updated
lesson_completed
course_completed
```

Analytics نباید منطق Progress را در اختیار بگیرد.

---

# 66. Progress + Notification

در آینده ممکن است:

```text
80٪ دوره تکمیل شد
```

Notification ایجاد شود.

اما Notification Module باید مصرف‌کننده Event باشد.

---

# 67. Progress + Streak

ProgressTracker مسئول Streak نیست.

```text
Progress
≠
Learning Streak
```

UI Guide هر دو را در Sidebar جداگانه تعریف کرده است. 

---

# 68. Progress + Statistics

Statistics می‌تواند از Progress Data استفاده کند:

```text
دروس تکمیل شده
18

دروس باقی‌مانده
7
```

ولی Statistics Component نباید مالک Progress باشد.

---

# 69. Course Completion

Course Completion زمانی رخ می‌دهد که Completion Rule مربوط به Course برقرار باشد.

مثلاً:

```text
All required lessons completed
```

یا در آینده:

```text
Lessons
+
Required Quiz
+
Assignment
```

بنابراین:

```text
100٪
```

و:

```text
Course Completed
```

از نظر Domain باید قابل تفکیک باشند.

---

# 70. Completion Rule

ProgressTracker نباید Completion Rule را Hard-code کند.

```text
Course
 ↓
Completion Policy
 ↓
Progress / Completion
```

---

# 71. Progress Hierarchy

```text
Learning Path
      ↓
Course
      ↓
Chapter
      ↓
Lesson
      ↓
Content
```

هر سطح می‌تواند Progress خودش را داشته باشد.

---

# 72. Foundation Scope

در نسخه 1:

```text
✓ Course Progress
✓ Lesson Progress
✓ Percentage
✓ Completed / Total
✓ Last Position
✓ Continue Learning
✓ Progress Bar
✓ Circular Progress
✓ Loading
✓ Error
✓ Accessibility
✓ RTL
✓ Mobile
```

---

# 73. Future Scope

در نسخه‌های بعد:

```text
○ Learning Path Progress
○ Chapter Progress
○ Video Timestamp Progress
○ Weighted Progress
○ Custom Completion Rules
○ Offline Progress
○ Cross-device Sync
○ Detailed Analytics
```

---

# 74. Weighted Progress

برای Courseهای پیچیده:

```text
Video       20%
Quiz        30%
Assignment  30%
Project     20%
```

Progress نهایی ممکن است Weighted باشد.

این منطق نباید داخل UI باشد.

---

# 75. Progress Event

مثلاً:

```js
{
    type: "lesson_progress_updated",
    userId,
    courseId,
    lessonId,
    percentage,
    timestamp
}
```

Event Bus می‌تواند آن را به Moduleهای دیگر ارسال کند.

---

# 76. Caching

برای Dashboard که Progressهای زیادی نمایش می‌دهد، Cache کردن Aggregate Progress می‌تواند در آینده مناسب باشد.

اما:

```text
Cache
≠
Source of Truth
```

---

# 77. Batch Progress

Dashboard ممکن است به جای درخواست جداگانه برای هر Course:

```text
GET /my-learning/progress
```

دریافت کند.

مثلاً:

```json
[
    {
        "courseId": 1,
        "percentage": 72
    },
    {
        "courseId": 2,
        "percentage": 44
    }
]
```

---

# 78. Performance

نباید برای یک Dashboard با 10 Course:

```text
10 API Requests
```

اجباری شود.

Aggregate API در لایه Application می‌تواند بهتر باشد.

---

# 79. Testing

## Course

```text
0%
1%
50%
99%
100%
```

## Lesson

```text
0%
25%
50%
75%
100%
```

## Access

```text
Authorized
Unauthorized
Locked
```

## Persistence

```text
Create
Update
Reload
Sync
```

## UI

```text
Loading
Success
Error
Completed
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## Accessibility

```text
Keyboard
Screen Reader
Focus
Reduced Motion
```

---

# 80. Do

* Progress را از Domain جدا نگه دار.
* Calculation را داخل UI انجام نده.
* Course و Lesson Progress را تفکیک کن.
* Completion و Progress را یکی نکن.
* Progress را Server-side ذخیره کن.
* Last Position را برای Video در نظر بگیر.
* Continue Learning را بر اساس Progress پشتیبانی کن.
* Error را با `0٪` جایگزین نکن.
* از Design Tokens استفاده کن.
* RTL و Mobile را از ابتدا پشتیبانی کن.
* Accessibility را از ابتدا پیاده کن.
* امکان Completion Rules پیچیده را برای آینده حفظ کن.

---

# 81. Don't

* Progress را داخل Theme پیاده نکن.
* Progress را مستقیماً از `post_meta` در UI نخوان.
* User ID را از Client قبول نکن.
* Completion را فقط بر اساس `percentage === 100` فرض نکن.
* `0٪` را برای وضعیت Unknown نمایش نده.
* Progress را با Streak، Bookmark یا Notes ترکیب نکن.
* Weighted Progress را در Component UI محاسبه نکن.
* Hard-code کردن Completion Rules داخل Component انجام نده.

---

# 82. Responsibility Map

```text
Learning Domain
    ↓
Completion Rules
    ↓
Progress Service
    ↓
Progress Repository
    ↓
Progress DTO
    ↓
ProgressTracker
```

سایر Moduleها:

```text
Analytics
    ← Progress Events

Gamification
    ← Progress Events

Certificate
    ← Completion State

Notifications
    ← Progress Events

Dashboard
    ← Progress DTO
```

---

# 83. Final Architecture

```text
                         Learning Module
                               │
                        Progress Service
                               │
                    ┌──────────┴──────────┐
                    ↓                     ↓
              Course Progress       Lesson Progress
                    │                     │
                    └──────────┬──────────┘
                               ↓
                       Progress Repository
                               │
                           Database
                               │
                         Progress DTO
                               │
            ┌──────────────────┼──────────────────┐
            ↓                  ↓                  ↓
       Lesson Player       Course Card        Dashboard
            │                  │                  │
            ↓                  ↓                  ↓
       Progress Bar       Compact Progress   Progress Card
            │
            ↓
       Continue Learning
```

---

# 84. Final Principle

`ProgressTracker` در Iran LMS یک **UI Component برای نمایش وضعیت واقعی یادگیری** است، نه موتور محاسبه Progress.

مرزبندی نهایی:

```text
Progress Domain
      ≠
Progress Service
      ≠
Progress Repository
      ≠
ProgressTracker UI
```

و رابطه اصلی:

```text
Student
   ↓
Learning Activity
   ↓
Progress Service
   ↓
Persist Progress
   ↓
Course / Lesson Progress
   ↓
ProgressTracker
   ↓
Lesson Player / Dashboard / Course Card
```

این ساختار باعث می‌شود Progress در تمام بخش‌های افزونه — از **Lesson Player و Continue Learning تا Course Card و Dashboard** — یک منبع منطقی واحد داشته باشد، بدون اینکه UI یا Theme مالک منطق پیشرفت شود.
