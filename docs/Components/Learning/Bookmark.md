# Bookmark.md

**Component:** Learning / Bookmark
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Learning Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Bookmark` کامپوننت ذخیره‌کردن یک **موقعیت یا آیتم آموزشی برای دسترسی سریع بعدی** توسط دانشجو است.

در UI راهنمای Iran LMS، Bookmark به‌صورت مستقیم در Lesson Player در کنار Notes قرار گرفته و همچنین در Course Cardهای داشبورد نیز آیکون Bookmark دیده می‌شود.  

بنابراین باید دو کاربرد را از هم تفکیک کنیم:

```text
Lesson Bookmark
    ↓
ذخیره درس برای بازگشت سریع

Course Bookmark
    ↓
ذخیره دوره به‌عنوان مورد موردعلاقه
```

اما این دو نباید در Domain یکی فرض شوند.

---

# 2. Core Principle

Bookmark یک **Personal Learning Shortcut** است.

یعنی:

```text
Student
   ↓
Learning Resource
   ↓
Bookmark
```

Bookmark نباید محتوای آموزشی را کپی کند؛ فقط Reference به Resource را نگه می‌دارد.

---

# 3. Plugin Boundary

```text
Iran LMS
   ↓
Learning Module
   ↓
Bookmark
```

Bookmark باید مستقل از WordPress Theme باشد.

---

# 4. Bookmark Types

برای معماری Iran LMS:

```text
Course Bookmark
Lesson Bookmark
```

در آینده می‌توان:

```text
Video Timestamp Bookmark
Resource Bookmark
Question Bookmark
```

را نیز اضافه کرد.

---

# 5. Course Bookmark

در Course Card:

```text
┌──────────────────────────────┐
│ [Course Thumbnail]       ♡   │
│                              │
│ آموزش جامع React             │
│                              │
│ [ ادامه یادگیری ]            │
└──────────────────────────────┘
```

در UI داشبورد نمونه، آیکون Bookmark در Course Card وجود دارد. 

---

# 6. Lesson Bookmark

در Lesson Player:

```text
مقدمه‌ای بر React

🔖 ذخیره درس
```

یا فقط:

```text
[ 🔖 ]
```

در نمونه Lesson Player نیز Bookmark در اطراف عنوان/Player وجود دارد. 

---

# 7. Bookmark State

```text
not_bookmarked
bookmarked
saving
removing
error
```

---

# 8. Toggle Behavior

رفتار اصلی:

```text
Not Bookmarked
      ↓
Click
      ↓
Bookmarked
```

و:

```text
Bookmarked
      ↓
Click
      ↓
Not Bookmarked
```

---

# 9. Icon State

حالت ذخیره نشده:

```text
♡
```

حالت ذخیره شده:

```text
♥
```

یا در سیستم Icon:

```text
bookmark-outline
bookmark-filled
```

استفاده از Icon باید مطابق `Icon.md` و Design System باشد.

---

# 10. Accessibility

فقط تغییر ظاهر Icon کافی نیست.

برای Screen Reader:

```text
ذخیره درس
```

و بعد از ذخیره:

```text
حذف درس از نشان‌شده‌ها
```

باید اعلام شود.

---

# 11. Button Semantics

Bookmark باید از Button استفاده کند:

```html
<button>
    ...
</button>
```

نه:

```html
<div>
    ...
</div>
```

---

# 12. Tooltip

در Desktop می‌توان:

```text
🔖
↓
Tooltip:
ذخیره درس
```

و بعد:

```text
🔖
↓
Tooltip:
حذف از نشان‌شده‌ها
```

داشت.

---

# 13. Toast Feedback

بعد از Bookmark:

```text
✓ درس به نشان‌شده‌ها اضافه شد.
```

بعد از Remove:

```text
✓ درس از نشان‌شده‌ها حذف شد.
```

---

# 14. Optimistic UI

برای تجربه سریع:

```text
Click
 ↓
UI → Bookmarked
 ↓
API Request
```

اگر Request شکست خورد:

```text
API Error
 ↓
Rollback UI
 ↓
Toast Error
```

---

# 15. Save Flow

```text
User
 ↓
Bookmark Button
 ↓
Application API
 ↓
Authorization
 ↓
Validation
 ↓
Bookmark Service
 ↓
Persistence
```

---

# 16. Remove Flow

```text
User
 ↓
Bookmarked Button
 ↓
Remove Bookmark
 ↓
Authorization
 ↓
Persistence
 ↓
Updated State
```

---

# 17. Ownership

Bookmark همیشه متعلق به User است:

```text
userId
```

این مقدار باید از Authentication Context دریافت شود.

Client نباید مالک Bookmark را تعیین کند.

---

# 18. Privacy

Bookmarkها Private هستند.

```text
Student A
   ↓
Bookmarks A

Student B
   ↓
Bookmarks B
```

Student B نباید Bookmarkهای Student A را ببیند.

---

# 19. Bookmark Entity

مدل منطقی:

```js
{
    id,
    userId,
    targetType,
    targetId,
    createdAt
}
```

---

# 20. Target Type

```text
course
lesson
```

مثلاً:

```js
{
    targetType: "lesson",
    targetId: 245
}
```

---

# 21. Target ID

Bookmark فقط Reference نگه می‌دارد:

```text
targetId
```

و محتوای Course/Lesson را ذخیره نمی‌کند.

---

# 22. Duplicate Prevention

برای یک User و Target نباید Bookmark تکراری ایجاد شود.

قاعده:

```text
Unique
(userId + targetType + targetId)
```

---

# 23. Bookmark Existence

برای بررسی:

```text
Is Bookmarked?
```

Backend باید وضعیت را برگرداند.

مثلاً:

```js
{
    bookmarked: true
}
```

---

# 24. Course Bookmark vs Favorite

در Iran LMS بهتر است مفهوم‌ها شفاف باشند.

```text
Bookmark
=
ذخیره برای دسترسی سریع
```

در حالی که:

```text
Favorite
=
علاقه‌مندی
```

اگر پروژه در آینده هر دو Feature را داشته باشد، نباید یکی جای دیگری استفاده شود.

---

# 25. Dashboard Integration

در Student Dashboard / My Courses، Course Card می‌تواند Bookmark داشته باشد.

نمونه UI پروژه نشان می‌دهد Course Card دارای Bookmark Icon است. 

---

# 26. Bookmarked Courses

در My Courses:

```text
همه دوره‌ها
در حال یادگیری
تکمیل شده
علاقه‌مندی‌ها
```

نمونه داشبورد نیز Tab «علاقه‌مندی‌ها» را نشان می‌دهد. 

اگر این Tab در محصول نهایی به Bookmark اختصاص داده شود، باید Label آن با Domain واقعی محصول هماهنگ شود.

---

# 27. Bookmark Dashboard

یک صفحه مستقل نیز می‌تواند وجود داشته باشد:

```text
نشان‌شده‌ها

┌──────────────────────────────┐
│ 🔖 دوره‌های ذخیره‌شده        │
│                              │
│ React Advanced               │
│ Node.js                      │
│ UI/UX                        │
└──────────────────────────────┘
```

---

# 28. Bookmark List

```text
Bookmarks
 ├── Courses
 └── Lessons
```

---

# 29. Filter

در آینده:

```text
همه
دوره‌ها
درس‌ها
```

---

# 30. Search

کاربر بتواند Bookmarkها را جستجو کند:

```text
🔍 جستجو در نشان‌شده‌ها
```

Search واقعی باید توسط Search Module انجام شود.

---

# 31. Sorting

گزینه‌های مناسب:

```text
جدیدترین
قدیمی‌ترین
آخرین دسترسی
```

---

# 32. Pagination

برای لیست بزرگ:

```text
1  2  3  ...  بعدی
```

Pagination باید Server-side باشد.

---

# 33. Empty State

اگر Bookmark وجود نداشته باشد:

```text
┌──────────────────────────────────┐
│ 🔖                               │
│ هنوز چیزی ذخیره نکرده‌اید.       │
│                                  │
│ دوره‌ها و درس‌های موردنیاز خود   │
│ را برای دسترسی سریع ذخیره کنید. │
│                                  │
│ [ مشاهده دوره‌ها ]               │
└──────────────────────────────────┘
```

---

# 34. Lesson Player Integration

در Lesson Player ساختار:

```text
Lesson
 ├── Video
 ├── Description
 ├── Resources
 ├── Attachments
 ├── Notes
 ├── Bookmark
 └── Navigation
```

را داریم. این ساختار مستقیماً با UI Guide پروژه هم‌خوان است. 

---

# 35. Notes vs Bookmark

این دو Feature نباید یکی شوند:

```text
Notes
=
ثبت اطلاعات شخصی

Bookmark
=
ذخیره Reference
```

مثلاً:

```text
Bookmark:
React Hooks

Note:
useEffect بعد از Render اجرا می‌شود...
```

---

# 36. Bookmark vs Progress

Bookmark وضعیت Progress را تغییر نمی‌دهد.

```text
Bookmark
   ≠
Progress
```

مثلاً:

```text
Lesson Progress: 60%
Bookmarked: Yes
```

هر دو مستقل هستند.

---

# 37. Bookmark vs Completion

Bookmark باعث Complete شدن Lesson نمی‌شود.

```text
Bookmark
   ≠
Mark Complete
```

---

# 38. Focus Mode

Focus Mode باید Bookmark را نیز حفظ کند، در صورتی که Action آن در Lesson Header قرار گرفته باشد.

```text
Focus Mode
 ├── Video
 ├── Navigation
 ├── Notes
 └── Bookmark
```

UI Guide تأکید می‌کند Focus Mode باید Navigation و Notes را حفظ کند؛ Bookmark نیز چون Action مربوط به Lesson است نباید با ورود به Focus Mode بدون دلیل از بین برود. 

---

# 39. Mobile

در Mobile Bookmark باید دسترسی سریع داشته باشد:

```text
┌─────────────────────────┐
│ ← درس             🔖 ⋮  │
├─────────────────────────┤
│                         │
│       Video             │
│                         │
└─────────────────────────┘
```

---

# 40. Mobile Lesson Card

در Lesson Card:

```text
مقدمه React
21:36

🔖
```

---

# 41. Desktop

در Desktop می‌توان Bookmark را:

```text
Lesson Header
```

یا:

```text
Player Action Bar
```

قرار داد.

---

# 42. Responsive Rule

در Breakpointهای مختلف، جای Bookmark می‌تواند تغییر کند، اما رفتار آن نباید تغییر کند.

```text
Desktop → Icon Button
Tablet  → Icon Button
Mobile  → Compact Icon Button
```

---

# 43. RTL

Bookmark باید در Layout RTL به‌درستی قرار گیرد.

اما خود Icon جهت‌دار نیست و نباید به‌صورت RTL/LTR Mirror شود.

---

# 44. Dark Mode

Bookmark از Design Tokens استفاده کند:

```text
icon-default
icon-hover
icon-active
surface
border
accent
```

---

# 45. Visual States

### Default

```text
🔖
```

### Hover

```text
🔖  ← hover
```

### Active

```text
🔖 filled
```

### Focus

```text
┌─────┐
│ 🔖  │
└─────┘
```

### Disabled

```text
🔖
```

با Opacity مناسب.

---

# 46. Error State

اگر ذخیره‌سازی شکست خورد:

```text
✕ ذخیره درس انجام نشد.

[ تلاش مجدد ]
```

State قبلی باید حفظ یا Rollback شود.

---

# 47. Loading State

در هنگام Request:

```text
[ ⏳ ]
```

یا Icon با Loading State.

نباید دکمه چند بار Request ارسال کند.

---

# 48. Offline

در نسخه Foundation:

```text
Offline
 ↓
Request Failed
 ↓
Keep Previous State
```

در آینده می‌توان Offline Queue اضافه کرد.

---

# 49. API

API پیشنهادی:

```text
GET    /bookmarks
POST   /bookmarks
DELETE /bookmarks/{id}
```

برای بررسی مستقیم:

```text
GET /lessons/{lessonId}/bookmark
```

یا:

```text
GET /bookmarks?targetType=lesson&targetId=123
```

ساختار نهایی باید طبق API Standards پروژه تعیین شود.

---

# 50. Create Request

مثلاً:

```json
{
    "targetType": "lesson",
    "targetId": 123
}
```

---

# 51. Delete Request

مثلاً:

```text
DELETE /bookmarks/{bookmarkId}
```

---

# 52. Toggle Endpoint

می‌توان در UI یک abstraction داشت:

```text
toggleBookmark()
```

اما Backend الزاماً نباید Endpoint مبهم `toggle` داشته باشد.

بهتر است عملیات:

```text
Create
Delete
```

قابل پیش‌بینی و Idempotent باشند.

---

# 53. WordPress Architecture

UI نباید مستقیم:

```php
$wpdb
get_user_meta()
update_user_meta()
```

را اجرا کند.

معماری:

```text
Bookmark UI
     ↓
Learning Application Service
     ↓
Bookmark Repository
     ↓
Persistence
```

---

# 54. Authorization

قبل از Create:

```text
Authenticated?
```

قبل از Delete:

```text
Authenticated?
Owns Bookmark?
```

و در صورت نیاز:

```text
Has Access To Target?
```

---

# 55. Access Rule

برای Lesson Bookmark:

```text
Authenticated
      ↓
Lesson Exists
      ↓
User Has Access
      ↓
Create Bookmark
```

---

# 56. Deleted Target

اگر Lesson یا Course حذف شود، Bookmark نباید باعث خطای UI شود.

```text
Target Deleted
     ↓
Bookmark Invalid
     ↓
Cleanup / Ignore
```

Policy نهایی باید در Data Layer تعیین شود.

---

# 57. Soft Delete

اگر Course/Lesson Soft Delete داشته باشد، Bookmark می‌تواند باقی بماند ولی UI باید وضعیت Target را مدیریت کند.

---

# 58. Cache

Bookmark State می‌تواند Cache شود، اما Source of Truth باید Backend باشد.

---

# 59. Analytics

Eventهای پیشنهادی:

```text
bookmark_created
bookmark_removed
bookmark_clicked
```

مثلاً:

```js
{
    targetType: "lesson",
    targetId: 123
}
```

---

# 60. Gamification

Bookmark نباید به‌صورت پیش‌فرض XP ایجاد کند.

اگر در آینده Achievement تعریف شود:

```text
اولین Bookmark
100 Bookmark
```

Gamification Module باید از Eventها استفاده کند.

---

# 61. Notifications

Bookmark معمولاً Notification ندارد.

---

# 62. Components Used

```text
Button
Icon
Tooltip
Toast
Badge
Card
EmptyState
Skeleton
Dropdown
Pagination
```

---

# 63. Variants

```text
lesson
course
card
header
compact
dashboard
```

---

# 64. Bookmark Button

```text
BookmarkButton
 ├── Icon
 ├── Tooltip
 └── Accessibility Label
```

---

# 65. Bookmark Card

```text
BookmarkCard
 ├── Thumbnail
 ├── Type
 ├── Title
 ├── Context
 ├── Created At
 └── Remove
```

---

# 66. Bookmark List

```text
BookmarkList
 ├── Search
 ├── Filter
 ├── Sort
 ├── Items
 └── Pagination
```

---

# 67. Bookmark Data Model

```js
{
    id: string,
    userId: string,
    targetType: "course" | "lesson",
    targetId: string,
    createdAt: string
}
```

---

# 68. Future Data Model

برای Timestamp:

```js
{
    id,
    userId,
    targetType,
    targetId,
    timestampSeconds,
    createdAt
}
```

این قابلیت برای Bookmark داخل Video بسیار ارزشمند است، اما جزء Foundation نیست.

---

# 69. Testing Requirements

## Create

```text
Create Course Bookmark
Create Lesson Bookmark
Duplicate Bookmark
Unauthorized
Invalid Target
```

## Remove

```text
Remove Own Bookmark
Remove Other User Bookmark
Already Removed
Unauthorized
```

## UI

```text
Default
Hover
Focus
Active
Loading
Error
Disabled
```

## Integration

```text
Lesson Player
Course Card
Dashboard
Focus Mode
Mobile
```

## Data

```text
Correct Owner
Correct Target
Correct Timestamp
Correct State
```

---

# 70. Do

* Bookmark را Personal نگه دار.
* Course و Lesson Bookmark را از نظر Domain تفکیک کن.
* Ownership را Server-side بررسی کن.
* Duplicate را با Constraint/Service کنترل کن.
* Bookmark را فقط Reference نگه دار.
* آن را از Progress و Notes جدا کن.
* در Lesson Player در دسترس باشد.
* در Course Card نیز قابل استفاده باشد.
* UI را Optimistic طراحی کن.
* خطا را با Rollback مدیریت کن.
* Mobile و RTL را از ابتدا در نظر بگیر.
* امکان Timestamp Bookmark را برای آینده در معماری در نظر بگیر.

---

# 71. Don't

* Bookmark را با Favorite یکی نکن.
* Bookmark را با Note یکی نکن.
* Bookmark را باعث Completion نکن.
* Owner ID را از Client قبول نکن.
* Permission را فقط در Frontend کنترل نکن.
* Database Query مستقیم داخل Component نداشته باش.
* Target Content را داخل Bookmark ذخیره نکن.
* Bookmark تکراری ایجاد نکن.
* در Focus Mode بدون دلیل Bookmark را حذف نکن.

---

# 72. Final Architecture

```text
                         Learning Module
                               │
                           Bookmark
                               │
                    ┌──────────┴──────────┐
                    ↓                     ↓
              Course Bookmark       Lesson Bookmark
                    │                     │
                    └──────────┬──────────┘
                               ↓
                       Bookmark Service
                               │
                         Authorization
                               │
                       Bookmark Repository
                               │
                           Persistence
                               │
                       Bookmark View Model
                               │
             ┌─────────────────┼─────────────────┐
             ↓                 ↓                 ↓
        Course Card       Lesson Player      Dashboard
                                 │
                                 ↓
                           Focus Mode
```

---

# 73. Responsibility Map

```text
Bookmark Domain
    → Bookmark Lifecycle
    → Ownership
    → Target Reference
    → Duplicate Prevention

Learning Module
    → Course / Lesson Context

Auth / Users
    → Current User

Enrollment / Access
    → Target Access

Search Module
    → Bookmark Search

Analytics
    → Bookmark Events

Gamification
    → Future Bookmark Achievements

UI
    → Toggle
    → Feedback
    → List
    → Filtering
    → Navigation
```

---

# 74. Final Principle

`Bookmark` در Iran LMS باید **میان‌بُر شخصی دانشجو برای بازگشت به محتوای آموزشی** باشد، نه یک سیستم محتوایی مستقل.

معماری اصلی:

```text
Student
   ↓
Course / Lesson
   ↓
Bookmark Reference
   ↓
Create / Remove
   ↓
Bookmark Repository
   ↓
Dashboard / Lesson Player
```

و مرزبندی:

```text
Bookmark
    ≠ Note
    ≠ Favorite
    ≠ Progress
    ≠ Completion
```

این تفکیک برای افزونه WordPress ما مهم است؛ چون بعداً می‌توانیم Bookmark را به **اپلیکیشن موبایل، Video Timestamp، Search و Dashboard** متصل کنیم بدون اینکه ساختار اصلی Learning Module را دوباره طراحی کنیم.
