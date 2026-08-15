# Assignment.md

**Component:** Assessment / Learning
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Assessment Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Assignment` کامپوننت اصلی اجرای تکالیف در افزونه WordPress ایران LMS است.

هدف آن فراهم کردن تجربه کامل:

* مشاهده تکلیف
* مشاهده توضیحات
* مشاهده Deadline
* مشاهده امتیاز
* مشاهده فایل‌های موردنیاز
* آپلود پاسخ
* ارسال تکلیف
* مشاهده وضعیت ارسال
* مشاهده بازخورد مدرس
* مشاهده نمره
* اصلاح و ارسال مجدد در صورت مجاز بودن

در UI Guide، Assignment به‌عنوان یکی از محتواهای Curriculum تعریف شده و در Lesson Player نیز به‌عنوان Tab «تمرین» حضور دارد. همچنین برای Assignment، **Drag & Drop Upload، Allowed Types و Deadline** مشخص شده است. 

---

# 2. Core Principle

`Assignment` مسئول **تجربه کاربر در انجام و ارسال تکلیف** است.

اما مالک Business Logic نیست.

```text
Assignment Domain
       ↓
Assessment Application Layer
       ↓
Assignment View Model
       ↓
Assignment UI
```

Assignment نباید خودش:

* نمره تعیین کند
* Deadline را اعتبارسنجی امنیتی کند
* دسترسی User را تعیین کند
* فایل را مستقیماً در Database ذخیره کند
* وضعیت قبولی را تعیین کند

---

# 3. Plugin Boundary

```text
Iran LMS
   ↓
Assessment Module
   ↓
Assignment
```

این Component باید مستقل از Theme باشد.

---

# 4. Assignment Lifecycle

چرخه پیشنهادی:

```text
Not Started
     ↓
Available
     ↓
In Progress
     ↓
Submitted
     ↓
Under Review
     ↓
Graded
```

در صورت نیاز:

```text
Submitted
   ↓
Needs Revision
   ↓
Resubmitted
```

---

# 5. Assignment States

```text
locked
available
in_progress
draft
submitted
late
under_review
graded
needs_revision
expired
```

---

# 6. Assignment Card

برای نمایش در Course / Dashboard:

```text
┌──────────────────────────────────┐
│ 📋 پروژه نهایی React             │
│ ایجاد یک اپلیکیشن کامل           │
│                                  │
│ مهلت: ۲۵ خرداد                   │
│ امتیاز: ۱۰۰                      │
│                                  │
│ [ مشاهده و ارسال ]               │
└──────────────────────────────────┘
```

در طراحی داشبورد Assignment نیز همین اطلاعات کلیدی مانند عنوان، توضیح، Course، Deadline، Total Points و Status دیده می‌شود. 

---

# 7. Assignment Metadata

اطلاعات قابل نمایش:

```text
Title
Description
Course
Lesson
Instructor
Deadline
Total Points
Allowed File Types
Maximum File Size
Submission Attempts
Status
```

---

# 8. Assignment Description

توضیحات باید قبل از Submission به‌صورت واضح نمایش داده شود.

```text
## پروژه نهایی

یک اپلیکیشن کامل با استفاده از مفاهیم دوره ایجاد کنید.

موارد موردنیاز:
- ...
- ...
- ...
```

---

# 9. Deadline

Deadline یکی از مهم‌ترین اطلاعات Assignment است.

مثلاً:

```text
مهلت تحویل
۲۵ خرداد ۱۴۰۵
```

یا:

```text
۵ روز دیگر
```

UI Guide نیز Deadline را جزء اطلاعات اصلی Assignment مشخص می‌کند. 

---

# 10. Deadline States

```text
future
due_today
overdue
closed
```

نمایش پیشنهادی:

```text
۵ روز دیگر
```

```text
امروز
```

```text
۲ روز از موعد گذشته
```

---

# 11. Server-Side Deadline

Browser نباید مرجع Deadline باشد.

غلط:

```text
JavaScript Date
   ↓
Allow Submission
```

صحیح:

```text
Server Time
   ↓
Assessment Policy
   ↓
Submission Allowed?
```

---

# 12. Late Submission

اگر Late Submission مجاز باشد:

```text
ارسال با تأخیر مجاز است.
```

اگر مجاز نباشد:

```text
مهلت ارسال این تکلیف به پایان رسیده است.
```

---

# 13. Late Status

در Dashboard می‌تواند:

```text
تأخیر در تحویل
```

نمایش داده شود.

نمونه UI مرجع نیز وضعیت «تأخیر در تحویل» را با Status جداگانه نمایش می‌دهد. 

---

# 14. Total Points

مثلاً:

```text
امتیاز کل
۱۰۰
```

این مقدار از Assessment Configuration می‌آید.

---

# 15. Submission Attempts

مثلاً:

```text
تلاش‌های مجاز: 3
تلاش‌های باقی‌مانده: 2
```

---

# 16. Submission

کاربر باید بتواند پاسخ خود را ارسال کند.

```text
Assignment
   ↓
Prepare Submission
   ↓
Upload
   ↓
Submit
```

---

# 17. Upload Area

طبق UI Guide، Assignment باید Drag & Drop Upload داشته باشد. 

نمونه:

```text
┌────────────────────────────────────┐
│                                    │
│        📤 فایل خود را بکشید        │
│           و اینجا رها کنید         │
│                                    │
│       یا [ انتخاب فایل ]           │
│                                    │
└────────────────────────────────────┘
```

---

# 18. File Types

باید Allowed Types مشخص باشد.

مثلاً:

```text
فرمت‌های مجاز:
PDF, ZIP, DOCX
```

---

# 19. File Type Validation

اعتبارسنجی واقعی باید Server-side انجام شود.

Client-side Validation فقط برای UX است.

```text
Client
 ↓
UX Validation
 ↓
API
 ↓
Server Validation
 ↓
Storage
```

---

# 20. Maximum File Size

مثلاً:

```text
حداکثر حجم فایل: 20MB
```

اگر چند فایل مجاز باشد، Policy می‌تواند برای:

* هر فایل
* مجموع فایل‌ها

تعریف شود.

---

# 21. Multiple Files

Assignment می‌تواند چند فایل دریافت کند:

```text
submission/
 ├── project.zip
 ├── report.pdf
 └── screenshot.png
```

---

# 22. File List

بعد از Upload:

```text
┌──────────────────────────────┐
│ 📦 project.zip       8.2 MB │
│ PDF report.pdf       1.4 MB │
│ image.png             800 KB│
└──────────────────────────────┘
```

---

# 23. Remove File

قبل از Submit:

```text
[ حذف ]
```

باید امکان حذف فایل از Draft وجود داشته باشد.

---

# 24. Upload Progress

برای فایل بزرگ:

```text
project.zip
████████████░░░░ 78%
```

---

# 25. Upload Error

مثلاً:

```text
حجم فایل بیشتر از حد مجاز است.
```

یا:

```text
فرمت این فایل مجاز نیست.
```

---

# 26. Upload Security

فایل نباید صرفاً با Extension اعتبارسنجی شود.

Backend باید:

* MIME Type
* Extension
* File Size
* User Permission
* Assignment Permission

را بررسی کند.

---

# 27. Protected Files

Submission File نباید URL عمومی قابل حدس داشته باشد.

بهتر:

```text
User
 ↓
Authorized Download Endpoint
 ↓
Permission Check
 ↓
File
```

---

# 28. Storage Boundary

Assignment Component نباید خودش فایل را در WordPress Media Library یا Filesystem ذخیره کند.

```text
Assignment UI
      ↓
Media / Storage Service
      ↓
Protected File
```

---

# 29. WordPress Architecture

غلط:

```php
move_uploaded_file(...)
```

داخل Component.

صحیح:

```text
Assignment UI
 ↓
Upload API
 ↓
Media Module
 ↓
Storage
```

---

# 30. Submission Text

Assignment می‌تواند علاوه بر فایل، پاسخ متنی داشته باشد.

```text
توضیحات ارسال

┌──────────────────────────────┐
│ توضیحات خود را بنویسید...   │
│                              │
└──────────────────────────────┘
```

در صورت نیاز از `Textarea` Component استفاده شود.

---

# 31. Submission Draft

کاربر می‌تواند قبل از Submit Draft داشته باشد:

```text
Draft
 ↓
Upload Files
 ↓
Write Description
 ↓
Save
 ↓
Submit
```

---

# 32. Autosave

در صورت فعال بودن:

```text
✓ ذخیره شد
```

Draft می‌تواند به‌صورت خودکار ذخیره شود.

---

# 33. Autosave Boundary

Autosave نباید برای هر Keypress Request ارسال کند.

استفاده از:

```text
Debounce
Batch Update
```

پیشنهاد می‌شود.

---

# 34. Submit Button

```text
[ ارسال تکلیف ]
```

Action اصلی باید واضح باشد.

---

# 35. Submit Confirmation

قبل از Submit:

```text
آیا می‌خواهید تکلیف را ارسال کنید؟

۳ فایل پیوست شده است.

پس از ارسال، ویرایش ممکن است محدود شود.

[ بازگشت ]
[ ارسال نهایی ]
```

---

# 36. Submission Lock

اگر بعد از Submit دیگر امکان تغییر وجود نداشته باشد:

```text
Submitted
 ↓
Locked
```

UI باید آن را واضح نمایش دهد.

---

# 37. Resubmission

اگر مجاز باشد:

```text
[ اصلاح و ارسال مجدد ]
```

و:

```text
remainingAttempts
```

نمایش داده شود.

---

# 38. Submission Status

Statusهای قابل نمایش:

```text
نیاز به اقدام
تحویل داده شده
تأخیر در تحویل
در حال بررسی
ارزیابی شده
نیاز به اصلاح
```

این Statusها با طراحی Assignment Dashboard نیز هم‌راستا هستند؛ نمونه مرجع وضعیت‌های «نیاز به اقدام»، «تأخیر در تحویل» و «تحویل داده شده» را نشان می‌دهد. 

---

# 39. Status Badge

از `Badge` Component استفاده شود.

مثلاً:

```text
🟡 نیاز به اقدام
🟢 تحویل داده شده
🔴 تأخیر در تحویل
🔵 در حال بررسی
```

---

# 40. Submitted View

بعد از ارسال:

```text
✓ تکلیف شما با موفقیت ارسال شد.

زمان ارسال:
۲۳ خرداد، ۱۴:۳۵

وضعیت:
در حال بررسی
```

---

# 41. Submission Timestamp

زمان ارسال باید Server-generated باشد.

```text
submittedAt
```

---

# 42. Late Submission Timestamp

اگر دیر ارسال شده:

```text
ارسال شد:
۲ روز پس از موعد
```

---

# 43. Instructor Review

پس از ارسال:

```text
Submitted
   ↓
Instructor Review
   ↓
Grade
```

Assignment UI باید وضعیت Review را نمایش دهد.

---

# 44. Feedback

مدرس می‌تواند Feedback ارائه کند:

```text
بازخورد مدرس

ساختار پروژه خوب است، اما بخش مدیریت خطا
نیاز به اصلاح دارد.
```

---

# 45. Grade

پس از ارزیابی:

```text
نمره
۸۵ / ۱۰۰
```

---

# 46. Grade Percentage

```text
۸۵٪
```

---

# 47. Graded State

```text
✓ ارزیابی شده

نمره: ۸۵ از ۱۰۰
```

---

# 48. Needs Revision

اگر مدرس نیاز به اصلاح داشته باشد:

```text
نیاز به اصلاح

لطفاً بخش Authentication را اصلاح کنید.
```

---

# 49. Revision Flow

```text
Submitted
    ↓
Needs Revision
    ↓
Edit Submission
    ↓
Resubmit
    ↓
Review
```

---

# 50. Rubric

در نسخه‌های پیشرفته می‌توان Rubric داشت:

```text
Code Quality       20
Functionality      40
UI/UX              20
Documentation      20
----------------------
Total              100
```

Rubric متعلق به Assessment Engine است؛ Assignment فقط آن را نمایش می‌دهد.

---

# 51. Assignment Dashboard

برای Student Dashboard می‌توان Assignmentها را به‌صورت List/Table نمایش داد.

UI مرجع شامل ستون‌های زیر است:

```text
تکلیف
دوره
تاریخ تحویل
امتیاز کل
وضعیت
عملیات
```



---

# 52. Assignment Dashboard Actions

Actions ممکن:

```text
مشاهده
مشاهده و ارسال
ارسال تکلیف
مشاهده بازخورد
```

---

# 53. Assignment Filters

برای Dashboard:

```text
همه
تحویل داده شده
نیاز به اقدام
ارزیابی شده
```

نمونه UI مرجع نیز همین Tabها را نشان می‌دهد. 

---

# 54. Assignment Statistics

در Dashboard می‌توان:

```text
تکالیف کل
12

تحویل داده شده
7

نیاز به اقدام
3

تأخیر در تحویل
2
```

نمایش داد. 

---

# 55. Course Integration

Assignment می‌تواند در Curriculum قرار گیرد:

```text
فصل چهارم
 ├── Lesson
 ├── Lesson
 ├── 📋 تمرین
 └── Quiz
```

Curriculum فقط Item را نمایش می‌دهد.

---

# 56. LessonPlayer Integration

در LessonPlayer:

```text
Bottom Tabs

درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
نظرات
```

Assignment باید در Tab `تمرین` قابل دسترسی باشد. 

---

# 57. Assignment Card in Lesson

```text
┌──────────────────────────────┐
│ 📋 تمرین فصل چهارم           │
│                              │
│ مهلت: ۲۵ خرداد               │
│ امتیاز: ۵۰                   │
│ فرمت: PDF, ZIP               │
│                              │
│ [ مشاهده تکلیف ]             │
└──────────────────────────────┘
```

---

# 58. Mobile

در Mobile:

```text
Assignment
   ↓
Description
   ↓
Deadline
   ↓
Upload
   ↓
Files
   ↓
Submit
```

---

# 59. Mobile Upload

Dropzone باید برای Touch مناسب باشد.

به‌جای وابستگی به Drag & Drop:

```text
[ انتخاب فایل ]
```

همیشه باید وجود داشته باشد.

---

# 60. Mobile File List

هر فایل باید یک Row ساده داشته باشد:

```text
📄 report.pdf
1.2 MB

[ حذف ]
```

---

# 61. RTL

Assignment باید RTL-native باشد.

اما:

* Filename
* URL
* Code
* Extension

می‌توانند LTR باشند.

---

# 62. Accessibility

باید:

* Keyboard Accessible
* Screen Reader Friendly
* Focus Visible
* Semantic
* RTL Compatible

باشد.

---

# 63. Dropzone Accessibility

Dropzone نباید تنها با Drag & Drop قابل استفاده باشد.

حتماً:

```text
[ انتخاب فایل ]
```

وجود داشته باشد.

---

# 64. File Input

File Input باید Label واضح داشته باشد.

مثلاً:

```text
<label>
فایل پاسخ
</label>
```

---

# 65. Focus Management

بعد از Upload:

```text
Upload Complete
 ↓
Focus → File Status
```

در Error:

```text
Error
 ↓
Focus → Error Message
```

---

# 66. Loading State

در زمان دریافت Assignment:

```text
Assignment Skeleton
Description Skeleton
Upload Skeleton
```

---

# 67. Upload Loading

هنگام Upload:

```text
در حال آپلود...
████████░░ 80%
```

---

# 68. Error State

```text
بارگذاری تکلیف انجام نشد.

[ تلاش مجدد ]
```

---

# 69. Submission Error

اگر Submit شکست خورد:

```text
ارسال تکلیف انجام نشد.
لطفاً دوباره تلاش کنید.
```

Draft نباید بدون دلیل از بین برود.

---

# 70. Empty Assignment

اگر Assignment محتوای کافی ندارد:

```text
اطلاعات این تکلیف هنوز کامل نشده است.
```

---

# 71. Expired Assignment

```text
مهلت ارسال این تکلیف به پایان رسیده است.
```

اگر Late Submission مجاز باشد، Action مربوطه باید همچنان نمایش داده شود.

---

# 72. Locked Assignment

```text
🔒
این تکلیف هنوز برای شما فعال نشده است.
```

---

# 73. Dark Mode

Assignment باید از Design Tokens استفاده کند:

```text
surface
surface-elevated
text-primary
text-secondary
border
accent
success
warning
danger
```

---

# 74. Visual Style

مطابق UI Guide:

* Modern SaaS
* Full RTL Persian
* Rounded UI
* 16px Radius
* Soft Shadows
* Blue/Purple Accent
* Component Based
* WordPress Friendly
* Modular Architecture



---

# 75. Components Used

Assignment باید از Components موجود استفاده کند:

```text
Card
Button
Badge
Icon
Input
Textarea
Progress
Modal
Drawer
Toast
Alert
Skeleton
EmptyState
```

---

# 76. File Upload Components

برای Upload بهتر است Componentهای زیر از هم جدا باشند:

```text
FileDropzone
FileList
FileItem
UploadProgress
UploadError
```

---

# 77. Assignment Variants

Variantهای پیشنهادی:

```text
card
detail
submission
result
dashboard
compact
```

---

# 78. Card Variant

برای Dashboard:

```text
AssignmentCard
```

اطلاعات:

```text
Title
Course
Deadline
Points
Status
Action
```

---

# 79. Detail Variant

```text
AssignmentDetail
 ├── Header
 ├── Description
 ├── Requirements
 ├── Deadline
 ├── Points
 └── Submission
```

---

# 80. Submission Variant

```text
AssignmentSubmission
 ├── Text
 ├── Dropzone
 ├── FileList
 └── Submit
```

---

# 81. Result Variant

```text
AssignmentResult
 ├── Status
 ├── Grade
 ├── Feedback
 ├── Rubric
 └── Resubmit
```

---

# 82. Dashboard Variant

```text
AssignmentList
 ├── Filters
 ├── Sorting
 ├── Table/List
 └── Pagination
```

---

# 83. View Model

```js
{
    id,
    title,
    description,
    courseId,
    lessonId,
    instructor,
    deadline,
    totalPoints,
    allowedFileTypes,
    maxFileSize,
    maxFiles,
    attempts,
    status,
    submission,
    settings
}
```

---

# 84. Submission Model

```js
{
    id,
    assignmentId,
    attemptNumber,
    status,
    text,
    files,
    submittedAt,
    isLate,
    grade,
    feedback,
    reviewedAt
}
```

---

# 85. Assignment Settings

```js
{
    allowLateSubmission,
    allowResubmission,
    maxAttempts,
    requireFile,
    requireText,
    allowedFileTypes,
    maxFileSize,
    maxFiles,
    showGrade,
    showFeedback
}
```

---

# 86. API Boundary

```text
Assignment API
       ↓
Assignment DTO
       ↓
Assignment UI
```

Component نباید مستقیم به:

```text
wpdb
WP_Query
get_posts()
```

دسترسی داشته باشد.

---

# 87. WordPress Boundary

اگر Assignment در WordPress Custom Post Type یا Custom Tables ذخیره شود، UI نباید از نحوه Persistence مطلع باشد.

```text
Repository
   ↓
Application Service
   ↓
DTO
   ↓
UI
```

---

# 88. Media Boundary

```text
Assignment
   ↓
Media Service
   ↓
Protected Storage
```

---

# 89. Enrollment Boundary

Assignment باید Access State را از Enrollment/Authorization دریافت کند.

مثلاً:

```js
{
    canView: true,
    canSubmit: true
}
```

---

# 90. Assessment Boundary

Assessment Module مالک:

* Submission
* Attempts
* Grading
* Rubric
* Deadline Policy

است.

---

# 91. Notifications

بعد از:

```text
Assignment Submitted
Assignment Graded
Revision Requested
Deadline Approaching
```

Notification می‌تواند توسط Communication Module ایجاد شود.

Assignment نباید خودش Notification Database را مدیریت کند.

---

# 92. Gamification

در صورت فعال بودن:

```text
Assignment Completed
       ↓
Gamification Event
       ↓
XP / Achievement
```

---

# 93. Analytics

Eventهای احتمالی:

```text
assignment_viewed
assignment_started
assignment_file_uploaded
assignment_submitted
assignment_resubmitted
assignment_graded
assignment_revision_requested
```

---

# 94. Security

Backend باید بررسی کند:

```text
User Authentication
User Authorization
Assignment Access
Submission Ownership
Deadline
Attempt Limit
File Validation
File Permission
```

---

# 95. Anti-Tampering

Client نباید بتواند:

```text
deadline = future
grade = 100
status = submitted
attempts = unlimited
```

را به Backend تحمیل کند.

---

# 96. Performance

برای Assignment:

* فایل‌ها Lazy Load شوند.
* Preview فقط در صورت نیاز ایجاد شود.
* Uploadها Chunked در صورت نیاز باشند.
* Autosave Debounce شود.
* Assignment List Pagination داشته باشد.
* Dashboard Statistics یکجا دریافت شوند.

---

# 97. Large Files

برای فایل‌های بزرگ، در آینده می‌توان:

```text
Chunk Upload
Resume Upload
Upload Retry
```

را اضافه کرد.

---

# 98. Assignment List Pagination

برای Dashboard:

```text
1  2  3  ...  Next
```

Pagination باید Server-side باشد.

---

# 99. Search

Assignment Dashboard می‌تواند Search داشته باشد:

```text
🔍 جستجو در تکالیف
```

---

# 100. Filtering

فیلترها:

```text
همه
نیاز به اقدام
تحویل داده شده
تأخیر
ارزیابی شده
```

---

# 101. Sorting

مثلاً:

```text
مرتب‌سازی: جدیدترین
```

یا:

```text
نزدیک‌ترین Deadline
```

---

# 102. Do

* Assignment را بخشی از Assessment Module نگه دار.
* Deadline را Server-side اعتبارسنجی کن.
* Upload را به Media/Storage Layer بسپار.
* Allowed Types را نمایش بده.
* Drag & Drop + File Picker داشته باش.
* Statusها را واضح نمایش بده.
* Draft را پشتیبانی کن.
* Submission Confirmation داشته باش.
* Feedback و Grade را نمایش بده.
* Resubmission را Configuration-driven کن.
* با Curriculum و LessonPlayer یکپارچه باش.
* RTL و Mobile را از ابتدا در نظر بگیر.
* Accessibility را رعایت کن.
* فایل‌ها را Protected نگه دار.

---

# 103. Don't

* فایل را مستقیماً داخل UI ذخیره نکن.
* Deadline را فقط با JavaScript کنترل نکن.
* Grade را از Client قبول نکن.
* Permission را در UI به‌عنوان Security در نظر نگیر.
* URL عمومی برای فایل Submission نساز.
* Assignment را با Quiz یکی نکن.
* Assignment را به WooCommerce وابسته نکن.
* Assignment را به Theme وابسته نکن.
* Database Query داخل Component نداشته باش.
* Draft کاربر را هنگام خطای Submit حذف نکن.

---

# 104. Testing Requirements

## Assignment

```text
Available
Locked
Expired
Empty
```

## Deadline

```text
Future
Today
Overdue
Closed
Late Allowed
Late Disabled
```

## Upload

```text
Single File
Multiple Files
Invalid Type
Too Large
Upload Failure
Upload Retry
```

## Submission

```text
Draft
Submit
Confirmation
Submitted
Resubmit
Attempts Exhausted
```

## Review

```text
Under Review
Graded
Needs Revision
```

## Grade

```text
Passed
Low Score
No Grade Yet
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
```

---

# 105. Final Architecture

```text
                         Assessment Module
                                │
                         Assignment Domain
                                │
                    ┌───────────┼───────────┐
                    ↓           ↓           ↓
                Assignment   Submission   Grading
                    │           │           │
                    └───────────┼───────────┘
                                ↓
                         Application API
                                │
                                ↓
                        Assignment View Model
                                │
             ┌──────────────────┼──────────────────┐
             ↓                  ↓                  ↓
       AssignmentCard      AssignmentDetail   AssignmentResult
                                  │
                                  ↓
                         AssignmentSubmission
                                  │
                    ┌─────────────┼─────────────┐
                    ↓             ↓             ↓
                 Text         Dropzone       FileList
```

---

# 106. Final Responsibility Map

```text
Assessment Module
    → Assignment Definition
    → Submission
    → Attempts
    → Deadline Policy
    → Grading
    → Rubric

Media Module
    → Upload
    → Storage
    → Protected File Access

Enrollment / Access
    → User Permission

Communication
    → Notifications

Gamification
    → XP / Achievements

Analytics
    → Assignment Events

Curriculum
    → Assignment Item

LessonPlayer
    → Assignment Tab

Assignment UI
    → Display
    → Upload Interaction
    → Submission UX
    → Status
    → Feedback
    → Grade
```

---

# 107. Final Principle

`Assignment` در Iran LMS باید یک **Submission Experience** باشد، نه یک File Upload ساده.

معماری نهایی:

```text
Assignment Definition
        ↓
Access Check
        ↓
Assignment Detail
        ↓
Draft Submission
        ↓
File Upload / Text
        ↓
Submit
        ↓
Assessment Engine
        ↓
Review / Grading
        ↓
Feedback + Grade
        ↓
Resubmission (if allowed)
```

و مرزبندی اصلی:

```text
Assignment UI
      ≠
Submission Engine
      ≠
Grading Engine
      ≠
File Storage
```

این تفکیک باعث می‌شود Assignment هم در **LessonPlayer**، هم در **Curriculum** و هم در **Student Dashboard** قابل استفاده باشد و در آینده همان API و منطق Submission بتواند توسط اپلیکیشن موبایل Iran LMS نیز مصرف شود.
