# Notes.md

**Component:** Learning / Notes
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Learning Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Notes` کامپوننت مدیریت **یادداشت‌های شخصی دانشجو** در افزونه WordPress Iran LMS است.

این کامپوننت به دانشجو اجازه می‌دهد هنگام یادگیری یک درس، نکات شخصی خود را ثبت، ویرایش، حذف و دوباره مشاهده کند.

در UI Guide، Notes مستقیماً در Lesson Player به‌عنوان یکی از امکانات اصلی درس معرفی شده و Focus Mode نیز باید امکان دسترسی به Notes را حفظ کند. 

همچنین در نمونه رابط Lesson Player، بخشی با عنوان **«یادداشت شخصی شما»** و Action **«ویرایش یادداشت»** وجود دارد.

---

# 2. Core Principle

`Notes` باید یک قابلیت **Personal Learning Tool** باشد.

یعنی:

```text
Student
   ↓
Lesson
   ↓
Personal Note
```

یادداشت متعلق به دانشجو است و نباید به‌صورت عمومی برای سایر دانشجویان نمایش داده شود.

---

# 3. Plugin Boundary

```text
Iran LMS
   ↓
Learning Module
   ↓
Notes
```

Notes نباید به Theme وابسته باشد.

---

# 4. Primary Use Case

مهم‌ترین محل استفاده:

```text
Lesson Player
      ↓
Lesson Content
      ↓
Notes
```

مثلاً:

```text
یادداشت شخصی شما

نکته مهم:
کامپوننت‌ها باید فقط یک المنت ریشه داشته باشند.

[ ویرایش یادداشت ]
```

این الگو در UI مرجع Lesson Player نیز وجود دارد. 

---

# 5. Notes Lifecycle

```text
No Note
   ↓
Create
   ↓
Saved
   ↓
Edit
   ↓
Updated
```

در صورت حذف:

```text
Saved
   ↓
Delete
   ↓
No Note
```

---

# 6. Note States

```text
empty
draft
saving
saved
updating
deleting
error
```

---

# 7. Empty State

وقتی برای Lesson یادداشتی وجود ندارد:

```text
┌──────────────────────────────────┐
│ 📝 یادداشت شخصی شما              │
│                                  │
│ هنوز یادداشتی برای این درس       │
│ ثبت نکرده‌اید.                   │
│                                  │
│ [ افزودن یادداشت ]               │
└──────────────────────────────────┘
```

---

# 8. Note Card

حالت دارای یادداشت:

```text
┌──────────────────────────────────┐
│ 📝 یادداشت شخصی شما              │
│                                  │
│ نکته مهم:                        │
│ کامپوننت‌ها باید فقط یک المنت    │
│ ریشه داشته باشند.                │
│                                  │
│ آخرین ویرایش: ۱۰ دقیقه پیش       │
│                                  │
│ [ ویرایش ]       [ حذف ]         │
└──────────────────────────────────┘
```

---

# 9. Note Editor

برای ایجاد یا ویرایش:

```text
یادداشت شخصی

┌──────────────────────────────────┐
│ نکته مهم این درس...              │
│                                  │
│                                  │
└──────────────────────────────────┘

[ انصراف ] [ ذخیره یادداشت ]
```

---

# 10. Editor Type

در نسخه Foundation، Editor می‌تواند یک `Textarea` ساده باشد.

```text
Textarea
   ↓
Plain Text Note
```

Rich Text Editor در نسخه اولیه ضروری نیست.

---

# 11. Why Plain Text

برای نسخه اول:

* ساده‌تر
* امن‌تر
* سبک‌تر
* قابل ذخیره‌سازی آسان
* مناسب Mobile
* بدون وابستگی به Editor سنگین

---

# 12. Future Rich Text

در آینده می‌توان:

```text
Bold
Italic
Lists
Links
Code
Highlight
```

را اضافه کرد.

اما API و Domain نباید از ابتدا به Rich Text وابسته شوند.

---

# 13. Note Scope

مهم‌ترین تصمیم معماری:

هر Note باید مشخص کند به چه Contextی تعلق دارد.

برای نسخه اول:

```text
User
+
Course
+
Lesson
```

یعنی:

```text
User A
   ↓
Course X
   ↓
Lesson Y
   ↓
Note
```

---

# 14. Note Ownership

هر Note یک Owner دارد:

```text
ownerId
```

این مقدار از Authentication/Users دریافت می‌شود.

Client نباید Owner را تعیین کند.

---

# 15. Note Privacy

Notes به‌صورت پیش‌فرض:

```text
Private
```

است.

یعنی:

```text
Student A → Note A
Student B → Note B
```

و:

```text
Student B ≠ Note A
```

---

# 16. Instructor Access

در نسخه Foundation، مدرس نباید به Notes شخصی دانشجو دسترسی داشته باشد مگر اینکه Feature جداگانه‌ای برای آن تعریف شود.

---

# 17. Note Content

حداقل اطلاعات:

```text
content
```

اما View Model بهتر است شامل:

```js
{
    id,
    userId,
    courseId,
    lessonId,
    content,
    createdAt,
    updatedAt
}
```

باشد.

---

# 18. Note ID

هر Note باید شناسه یکتا داشته باشد.

```text
noteId
```

مثلاً:

```text
note_8f3a72
```

یا ID داخلی WordPress/Database.

UI نباید به فرمت ID وابسته باشد.

---

# 19. Created At

زمان ایجاد:

```text
createdAt
```

باید Server-generated باشد.

---

# 20. Updated At

هر ویرایش:

```text
updatedAt
```

را به‌روزرسانی می‌کند.

---

# 21. Last Edited

در UI:

```text
آخرین ویرایش:
۱۰ دقیقه پیش
```

یا:

```text
آخرین ویرایش:
۱۴۰۵/۰۳/۲۵ - ۱۰:۴۵
```

---

# 22. Save Flow

```text
User writes
     ↓
Save
     ↓
API
     ↓
Authorization
     ↓
Validation
     ↓
Persistence
     ↓
Updated Note
```

---

# 23. Save Feedback

پس از موفقیت:

```text
✓ یادداشت ذخیره شد.
```

می‌تواند با Toast نمایش داده شود.

---

# 24. Save Loading

در هنگام ذخیره:

```text
[ در حال ذخیره... ]
```

دکمه باید از ارسال چندباره جلوگیری کند.

---

# 25. Save Error

```text
ذخیره یادداشت انجام نشد.

لطفاً دوباره تلاش کنید.
```

متن قبلی نباید از بین برود.

---

# 26. Autosave

Autosave می‌تواند Feature اختیاری باشد.

```text
Typing
   ↓
Debounce
   ↓
Autosave
```

اما در Foundation بهتر است:

```text
Explicit Save
```

پیاده‌سازی شود.

---

# 27. Autosave Future

در نسخه‌های بعد:

```text
در حال ذخیره...
✓ ذخیره شد
```

می‌تواند کنار Editor نمایش داده شود.

---

# 28. Character Limit

برای جلوگیری از Noteهای غیرمنطقی می‌توان Limit تعریف کرد.

مثلاً:

```text
حداکثر ۵۰۰۰ کاراکتر
```

این مقدار باید Configuration-driven باشد.

---

# 29. Character Counter

در صورت فعال بودن:

```text
۱۲۸ / ۵۰۰۰
```

---

# 30. Validation

حداقل Validation:

```text
Empty
Too Long
Invalid Payload
Unauthorized
```

---

# 31. Empty Content

ذخیره Note خالی نباید انجام شود.

```text
لطفاً متن یادداشت را وارد کنید.
```

---

# 32. Sanitization

در صورت ذخیره Plain Text:

```text
Text
 ↓
Validation
 ↓
Sanitization
 ↓
Storage
```

اگر در آینده Rich Text اضافه شود، Sanitization باید بر اساس Allowlist انجام شود.

---

# 33. WordPress Security

Notes نباید با `$_POST` خام مستقیماً ذخیره شوند.

مسیر صحیح:

```text
Request
 ↓
Nonce / Authentication
 ↓
Authorization
 ↓
Validation
 ↓
Sanitization
 ↓
Application Service
 ↓
Repository
```

---

# 34. Authorization

برای مشاهده:

```text
Can User View This Note?
```

برای Update:

```text
Can User Edit This Note?
```

برای Delete:

```text
Can User Delete This Note?
```

---

# 35. Ownership Rule

کاربر فقط می‌تواند Note متعلق به خودش را:

```text
View
Edit
Delete
```

کند.

---

# 36. Lesson Access

حتی اگر User مالک Note باشد، بهتر است Access به Lesson نیز بررسی شود.

```text
Authenticated
      ↓
Owns Note
      ↓
Has Lesson Access
      ↓
Allow
```

---

# 37. Course Context

اگر Note به Course وابسته است:

```text
Course Access
```

نیز می‌تواند بررسی شود.

---

# 38. Lesson Player Integration

Notes باید در Lesson Player به‌صورت Native حضور داشته باشد.

ساختار:

```text
Lesson
 ├── Video
 ├── Description
 ├── Resources
 ├── Attachments
 ├── Notes
 └── Navigation
```

UI Guide نیز Notes را در بخش اصلی Lesson Player قرار داده است. 

---

# 39. Bottom Tabs Integration

در UI فعلی، Bottom Tabs شامل:

```text
درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
نظرات
```

است. 

بنابراین Notes در نسخه فعلی **نباید الزاماً یک Tab مستقل** ایجاد کند.

بهتر است در:

```text
درس
```

یا به‌عنوان یک Panel داخل Lesson نمایش داده شود.

---

# 40. Focus Mode

Focus Mode باید Notes را حفظ کند.

UI Guide صراحتاً می‌گوید Focus Mode باید فقط Navigation و Notes را نگه دارد. 

بنابراین:

```text
Focus Mode
 ├── Video
 ├── Minimal Navigation
 └── Notes
```

---

# 41. Focus Mode Notes

در Focus Mode می‌توان Notes را به شکل Floating Panel نمایش داد:

```text
┌──────────────────────────────┐
│ 📝 یادداشت                   │
│                              │
│ نکته مهم این درس...          │
│                              │
│ [ ویرایش ]                   │
└──────────────────────────────┘
```

---

# 42. Notes Dashboard

در Student Dashboard می‌توان یک صفحه مستقل:

```text
یادداشت‌ها
```

داشت.

نمونه UI داشبورد نیز «یادداشت‌ها» را در Navigation دانشجو قرار داده است. 

---

# 43. Notes List

صفحه Notes:

```text
یادداشت‌ها

🔍 جستجو در یادداشت‌ها

┌──────────────────────────────┐
│ نکته مهم React Hooks         │
│ آموزش جامع React             │
│ مقدمه‌ای بر React Hooks      │
│ آخرین ویرایش: امروز          │
│ [ مشاهده ]                   │
└──────────────────────────────┘
```

---

# 44. Note Context

در Notes Dashboard باید Context مشخص باشد:

```text
دوره:
آموزش جامع React

درس:
React Hooks
```

این موضوع مانع از تبدیل شدن Notes به یک لیست مبهم از متن‌ها می‌شود.

---

# 45. Search

Search باید بتواند در:

```text
Note Content
Course Title
Lesson Title
```

جستجو کند.

اما Search Content متعلق به Search Module است.

Notes فقط Query را مصرف می‌کند.

---

# 46. Filtering

در آینده:

```text
همه دوره‌ها
دوره مشخص
درس مشخص
```

---

# 47. Sorting

گزینه‌های مناسب:

```text
جدیدترین
قدیمی‌ترین
آخرین ویرایش
```

---

# 48. Pagination

برای تعداد زیاد Notes:

```text
1  2  3  ...  بعدی
```

Pagination باید Server-side باشد.

---

# 49. Note Preview

در List، متن باید محدود شود:

```text
نکته مهم: کامپوننت‌ها باید فقط یک...
```

و برای متن کامل:

```text
[ مشاهده ]
```

---

# 50. Note Detail

```text
یادداشت

دوره:
React

درس:
React Hooks

────────────────

نکته مهم:
...

آخرین ویرایش:
۲۵ خرداد ۱۴۰۵

[ ویرایش ]
[ حذف ]
```

---

# 51. Delete

Delete باید Confirmation داشته باشد.

```text
حذف یادداشت؟

این یادداشت برای همیشه حذف خواهد شد.

[ انصراف ]
[ حذف یادداشت ]
```

---

# 52. Delete Success

```text
✓ یادداشت حذف شد.
```

---

# 53. Delete Error

```text
حذف یادداشت انجام نشد.
```

Note باید در UI باقی بماند تا Retry امکان‌پذیر باشد.

---

# 54. Multiple Notes Per Lesson

برای نسخه Foundation بهتر است:

```text
1 User
+
1 Lesson
=
1 Note
```

مدل ساده‌تر است.

---

# 55. Future Multiple Notes

در آینده می‌توان:

```text
1 User
+
1 Lesson
=
N Notes
```

را پشتیبانی کرد.

مثلاً:

```text
نکته اول
نکته دوم
سؤال
ایده
```

اما API فعلی نباید بدون نیاز پیچیده شود.

---

# 56. Timestamped Notes

Feature آینده بسیار مناسب برای Video:

```text
Video Time:
08:42

Note:
نکته مهم درباره useState
```

---

# 57. Timestamp Architecture

در آینده:

```js
{
    noteId,
    lessonId,
    content,
    timestampSeconds
}
```

این قابلیت باید در Domain پیش‌بینی‌پذیر باشد ولی در نسخه Foundation اجباری نیست.

---

# 58. Video Integration

در صورت وجود Timestamp:

```text
Note
   ↓
08:42
   ↓
Click
   ↓
Video → 08:42
```

---

# 59. Bookmark vs Note

Notes نباید با Bookmark یکی شوند.

```text
Bookmark
    =
ذخیره موقعیت / Lesson

Note
    =
ذخیره محتوای شخصی
```

---

# 60. Note + Bookmark

در آینده ممکن است:

```text
Bookmark
+
Note
+
Timestamp
```

در یک Learning Interaction ترکیب شوند.

اما Domainها باید جدا باقی بمانند.

---

# 61. Notes API Boundary

API پیشنهادی:

```text
GET    /notes
POST   /notes
GET    /notes/{id}
PATCH  /notes/{id}
DELETE /notes/{id}
```

---

# 62. Lesson Notes API

برای دسترسی مستقیم:

```text
GET /lessons/{lessonId}/notes
```

و در صورت مدل One-Note:

```text
PUT /lessons/{lessonId}/note
```

API نهایی باید طبق `03-API/04-Learning-API.md` و استانداردهای پروژه تعیین شود.

---

# 63. Notes DTO

```js
{
    id,
    lessonId,
    courseId,
    content,
    createdAt,
    updatedAt
}
```

---

# 64. Notes List DTO

```js
{
    id,
    course,
    lesson,
    preview,
    updatedAt,
    actions
}
```

---

# 65. WordPress Architecture

Notes Component نباید مستقیم:

```php
$wpdb
get_post_meta()
update_post_meta()
```

را اجرا کند.

ساختار:

```text
Notes UI
    ↓
Learning Application Service
    ↓
Notes Repository
    ↓
Persistence
```

---

# 66. Database Boundary

نحوه ذخیره‌سازی باید از UI مخفی باشد.

ممکن است در آینده Notes در:

```text
Custom Table
```

ذخیره شود.

یا:

```text
User Meta
```

یا مدل دیگری.

Component نباید به این تصمیم وابسته باشد.

---

# 67. Recommended Persistence

به دلیل رابطه:

```text
User
Course
Lesson
Note
```

و احتمال رشد Featureها، Custom Table در معماری آینده گزینه مناسبی است.

اما تصمیم نهایی متعلق به Database Architecture پروژه است، نه UI Component.

---

# 68. Notification

ایجاد یا ویرایش Note معمولاً Notification لازم ندارد.

اما در آینده اگر:

```text
Shared Notes
Instructor Feedback
```

اضافه شود، Communication Module می‌تواند Notification ایجاد کند.

---

# 69. Analytics

Eventهای احتمالی:

```text
note_created
note_updated
note_deleted
note_viewed
note_searched
```

در صورت اضافه شدن Timestamp:

```text
note_timestamp_clicked
```

---

# 70. Gamification

در نسخه Foundation، ایجاد Note نباید الزاماً XP ایجاد کند.

اگر Gamification Module در آینده بخواهد:

```text
اولین یادداشت
۱۰ یادداشت
```

را Achievement کند، باید از Event استفاده کند.

---

# 71. Mobile

Notes در Mobile باید سریع و ساده باشد.

```text
Lesson
 ↓
📝 Notes
 ↓
Editor
```

---

# 72. Mobile Editor

Editor باید:

* تمام عرض
* Touch Friendly
* دکمه Save واضح
* Keyboard Friendly

باشد.

---

# 73. Mobile Bottom Sheet

برای ویرایش سریع می‌توان از:

```text
Bottom Sheet
```

استفاده کرد.

```text
┌───────────────────────────┐
│ یادداشت شخصی              │
│                           │
│ ...                       │
│                           │
│ [ ذخیره ]                 │
└───────────────────────────┘
```

---

# 74. Desktop Editor

در Desktop می‌توان Inline Edit داشت:

```text
یادداشت شخصی شما
        ↓
[ ویرایش ]
        ↓
Textarea
```

---

# 75. RTL

Notes کاملاً RTL باشد.

اما:

```text
Code
URLs
Technical identifiers
```

می‌توانند LTR باشند.

---

# 76. Accessibility

Notes باید:

* Keyboard Accessible
* Focus Visible
* Screen Reader Friendly
* Semantic
* RTL Compatible

باشد.

---

# 77. Textarea Accessibility

Textarea باید Label داشته باشد:

```html
<label for="lesson-note">
    یادداشت شخصی شما
</label>
```

---

# 78. Keyboard Shortcuts

در آینده:

```text
Ctrl/Cmd + Enter
```

می‌تواند Save کند.

اما نباید جایگزین Button شود.

---

# 79. Loading State

در بارگذاری:

```text
┌──────────────────────────────┐
│ ░░░░░░░░░░░░░░░░░░           │
│ ░░░░░░░░░░░░░░░░░░           │
└──────────────────────────────┘
```

از Skeleton Component استفاده شود.

---

# 80. Error State

```text
امکان دریافت یادداشت وجود ندارد.

[ تلاش مجدد ]
```

---

# 81. Offline Consideration

در آینده می‌توان Draft را Local نگه داشت:

```text
Editor
 ↓
Local Draft
 ↓
Online
 ↓
Sync
```

اما این Feature برای Foundation الزامی نیست.

---

# 82. Conflict Handling

اگر چند Device یک Note را ویرایش کنند، در نسخه پیشرفته باید Conflict Policy وجود داشته باشد.

مثلاً:

```text
Server Version
Local Version
       ↓
Conflict
       ↓
Resolve
```

---

# 83. Dark Mode

Notes باید از Design Tokens پروژه استفاده کند:

```text
surface
surface-elevated
text-primary
text-secondary
border
accent
success
danger
```

---

# 84. Visual Style

مطابق UI Guide:

* Modern SaaS
* Full RTL Persian
* Rounded UI
* 16px Radius
* Soft Shadows
* Blue + Purple Accent
* Vazirmatn / Estedad
* Component Based
* WordPress Friendly
* Modular Architecture



---

# 85. Components Used

Notes از Components موجود استفاده کند:

```text
Card
Button
Textarea
Icon
Badge
Modal
Drawer
Toast
Alert
Skeleton
EmptyState
Pagination
```

---

# 86. Notes Variants

```text
lesson
editor
detail
dashboard
compact
focus-mode
```

---

# 87. Lesson Variant

```text
LessonNotes
 ├── Header
 ├── Note Content
 ├── Updated At
 └── Actions
```

---

# 88. Editor Variant

```text
NoteEditor
 ├── Textarea
 ├── Character Counter
 ├── Cancel
 └── Save
```

---

# 89. Dashboard Variant

```text
NotesList
 ├── Search
 ├── Filters
 ├── Sort
 ├── Notes
 └── Pagination
```

---

# 90. Focus Mode Variant

```text
FocusNotes
 ├── Compact Header
 ├── Note
 └── Edit
```

---

# 91. Do

* Notes را بخشی از Learning Module نگه دار.
* Note را Personal نگه دار.
* Ownership را Server-side بررسی کن.
* Lesson Context را ذخیره کن.
* Save را Explicit نگه دار در Foundation.
* Error را بدون از دست رفتن متن مدیریت کن.
* Notes را در Lesson Player در دسترس قرار بده.
* Notes را در Focus Mode حفظ کن.
* Dashboard مستقل برای Notes داشته باش.
* Search و Pagination را به Search/API Layer بسپار.
* از Componentهای Design System استفاده کن.
* Mobile و RTL را از ابتدا در نظر بگیر.
* امکان Timestamp را برای آینده در معماری در نظر بگیر.

---

# 92. Don't

* Notes را Public نکن.
* Note را با Bookmark یکی نکن.
* Note را با Comment یکی نکن.
* Note را به Theme وابسته نکن.
* Database Query مستقیم در UI نداشته باش.
* Owner ID را از Client قبول نکن.
* Permission را فقط در Frontend کنترل نکن.
* متن Note را هنگام Save Error پاک نکن.
* از Rich Text در Foundation بدون نیاز استفاده نکن.
* Autosave را بدون Debounce پیاده‌سازی نکن.

---

# 93. Testing Requirements

## Creation

```text
Create
Empty
Too Long
Success
Failure
```

## Editing

```text
Edit
Update
Cancel
Update Failure
```

## Delete

```text
Delete
Confirm
Cancel
Delete Failure
```

## Permission

```text
Own Note
Other User Note
Unauthorized
```

## Lesson

```text
Lesson Access
No Lesson Access
Deleted Lesson
```

## Dashboard

```text
List
Search
Filter
Sort
Pagination
Empty
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
Focus
Screen Reader
RTL
Contrast
```

---

# 94. Final Architecture

```text
                         Learning Module
                               │
                             Notes
                               │
                    ┌──────────┼──────────┐
                    ↓          ↓          ↓
                 Create      Update      Delete
                    │          │          │
                    └──────────┼──────────┘
                               ↓
                       Notes Application
                               │
                         Authorization
                               │
                         Notes Repository
                               │
                           Persistence
                               │
                         Notes View Model
                               │
              ┌────────────────┼────────────────┐
              ↓                ↓                ↓
        Lesson Notes      Notes Dashboard    Focus Notes
              │
              ↓
         Note Editor
```

---

# 95. Responsibility Map

```text
Learning Module
    → Note Domain
    → Note Ownership
    → Note Lifecycle

Users / Auth
    → Authentication
    → User Identity

Enrollment / Access
    → Lesson Access

Search Module
    → Search Notes

Analytics
    → Note Events

Communication
    → Future Note Notifications

Gamification
    → Future Note Achievements

Lesson Player
    → Note Experience

Notes UI
    → Display
    → Create
    → Edit
    → Delete
    → Search Experience
```

---

# 96. Final Principle

`Notes` در Iran LMS باید یک **Personal Learning Memory** باشد؛ یعنی ابزاری برای اینکه دانشجو دانش و نکات خود را در همان Context یادگیری ثبت کند.

معماری نهایی:

```text
Student
   ↓
Course
   ↓
Lesson
   ↓
Personal Note
   ↓
Create / Edit / Delete
   ↓
Notes Repository
   ↓
Notes Dashboard
```

و مرزبندی اصلی:

```text
Notes UI
     ≠
Notes Domain
     ≠
Authorization
     ≠
Persistence
     ≠
Search
```

این ساختار باعث می‌شود Notes هم در **Lesson Player**، هم در **Focus Mode** و هم در **Student Dashboard** یک رفتار یکپارچه داشته باشد؛ در حالی که منطق اصلی آن کاملاً مستقل از Theme وردپرس باقی می‌ماند.
