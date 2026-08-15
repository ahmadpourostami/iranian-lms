# Certificate.md

**Component:** Certification / Learning
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Certificate Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Certificate` کامپوننت مربوط به تجربه دریافت، مشاهده و اعتبارسنجی گواهی پایان دوره در افزونه WordPress Iran LMS است.

این کامپوننت باید بتواند:

* وضعیت واجد شرایط بودن گواهی را نمایش دهد
* گواهی صادرشده را نمایش دهد
* اطلاعات اصلی گواهی را نشان دهد
* Certificate ID را نمایش دهد
* تاریخ صدور را نمایش دهد
* دوره و مدرس را نمایش دهد
* امکان مشاهده گواهی را فراهم کند
* امکان دانلود/چاپ را فراهم کند
* امکان Verify کردن گواهی را فراهم کند
* وضعیت‌های مختلف Certificate را مدیریت کند

---

# 2. Core Principle

`Certificate` فقط مسئول **Certificate Experience** در UI است.

منطق صدور گواهی متعلق به `Certificate Module` است.

```text
Certificate Domain
        ↓
Certificate Application Layer
        ↓
Certificate DTO / View Model
        ↓
Certificate UI
```

Certificate UI نباید خودش تصمیم بگیرد:

* کاربر دوره را کامل کرده است یا نه
* آزمون نهایی را قبول شده یا نه
* واجد شرایط Certificate است یا نه
* Certificate معتبر است یا نه
* Certificate صادر شود یا نه

---

# 3. Plugin Boundary

```text
Iran LMS
   ↓
Certificate Module
   ↓
Certificate UI
```

این Component نباید به Theme وابسته باشد.

---

# 4. Certificate Lifecycle

چرخه اصلی:

```text
Not Eligible
      ↓
Eligible
      ↓
Issuing
      ↓
Issued
      ↓
Revoked
```

در صورت نیاز:

```text
Issued
   ↓
Expired
```

---

# 5. Certificate States

```text
locked
not_eligible
eligible
pending
issued
revoked
expired
```

---

# 6. Certificate Eligibility

قبل از صدور:

```text
┌──────────────────────────────────┐
│ گواهی پایان دوره                 │
│                                  │
│ وضعیت: واجد شرایط               │
│                                  │
│ ✓ تکمیل دوره                     │
│ ✓ قبولی آزمون نهایی              │
│ ✓ تکمیل الزامات                  │
│                                  │
│ [ دریافت گواهی ]                 │
└──────────────────────────────────┘
```

---

# 7. Not Eligible State

اگر کاربر هنوز شرایط را نداشته باشد:

```text
┌──────────────────────────────────┐
│ 🔒 گواهی هنوز در دسترس نیست      │
│                                  │
│ برای دریافت گواهی باید دوره را  │
│ کامل کنید.                       │
│                                  │
│ پیشرفت دوره: 72٪                 │
└──────────────────────────────────┘
```

---

# 8. Eligibility Rules

شرایط ممکن:

```text
Course Completion
Final Quiz Passed
Minimum Score
Required Lessons
Required Assignments
Instructor Approval
```

این قوانین متعلق به Certificate Domain هستند.

---

# 9. Certificate Card

برای Dashboard:

```text
┌──────────────────────────────────┐
│ 🏆 React پیشرفته                 │
│                                  │
│ صادر شده: ۲۵ خرداد ۱۴۰۵          │
│ Certificate ID: IRL-2026-00123   │
│                                  │
│ [ مشاهده ]   [ دانلود ]          │
└──────────────────────────────────┘
```

---

# 10. Certificate Metadata

اطلاعات اصلی:

```text
Certificate ID
Certificate Number
Course
Student
Instructor
Issue Date
Expiry Date
Issuer
Status
Verification URL
```

---

# 11. Certificate ID

هر Certificate باید شناسه یکتا داشته باشد.

مثلاً:

```text
IRL-2026-00123
```

یا:

```text
CERT-9F3A72D1
```

شناسه باید توسط Backend ایجاد شود.

---

# 12. Certificate Number

در صورت نیاز می‌توان Certificate Number جدا داشت:

```text
Certificate No:
IRL-1405-000123
```

---

# 13. Issue Date

```text
تاریخ صدور
۲۵ خرداد ۱۴۰۵
```

زمان باید Server-generated باشد.

---

# 14. Expiry Date

اگر Certificate دارای اعتبار زمانی باشد:

```text
تاریخ اعتبار
۲۵ خرداد ۱۴۰۷
```

اگر دائمی باشد:

```text
بدون تاریخ انقضا
```

---

# 15. Student Name

گواهی باید نام دانشجو را نمایش دهد:

```text
این گواهی به

احمد پوررستمی

اعطا می‌شود.
```

نام از User/Profile Domain دریافت می‌شود.

---

# 16. Course Name

```text
دوره:
توسعه افزونه‌های حرفه‌ای وردپرس
```

---

# 17. Instructor

در صورت فعال بودن:

```text
مدرس:
...
```

---

# 18. Issuer

Certificate می‌تواند Issuer داشته باشد:

```text
صادرکننده:
Iran LMS Academy
```

این اطلاعات باید Configuration-driven باشد.

---

# 19. Certificate Preview

نمایش گواهی:

```text
┌─────────────────────────────────────────┐
│                                         │
│             CERTIFICATE                 │
│                                         │
│       این گواهی به                       │
│                                         │
│           نام دانشجو                     │
│                                         │
│       برای تکمیل دوره                    │
│                                         │
│            Course Name                   │
│                                         │
│       Instructor                         │
│                                         │
│       Date       Certificate ID          │
│                                         │
└─────────────────────────────────────────┘
```

---

# 20. Certificate Template

Certificate UI نباید Template نهایی گواهی را Hardcode کند.

```text
Certificate
      ↓
Certificate Template
      ↓
Rendered Certificate
```

---

# 21. Template Boundary

Template می‌تواند شامل:

```text
Background
Logo
Typography
Student Name
Course Name
Instructor
Date
Certificate ID
Signature
Seal
QR Code
```

باشد.

---

# 22. Certificate Theme

Certificate Template می‌تواند Theme مستقل داشته باشد:

```text
classic
modern
minimal
academic
```

اما این Theme با WordPress Theme کاربر یکی نیست.

---

# 23. Certificate Rendering

Rendering می‌تواند:

```text
HTML
PDF
Image
```

باشد.

اما Certificate UI نباید مسئول PDF Generation باشد.

---

# 24. PDF Boundary

```text
Certificate UI
      ↓
Certificate Data
      ↓
Certificate Renderer
      ↓
PDF Generator
```

---

# 25. Download

Action:

```text
[ دانلود گواهی ]
```

باید از API/Download Service استفاده کند.

---

# 26. Print

Action اختیاری:

```text
[ چاپ ]
```

می‌تواند Print View باز کند.

---

# 27. Share

در صورت فعال بودن:

```text
[ اشتراک‌گذاری ]
```

می‌تواند لینک Verify را Share کند.

---

# 28. Verification URL

مثلاً:

```text
https://example.com/certificate/IRL-2026-00123
```

اما URL نباید در UI Hardcode شود.

---

# 29. Verification Page

صفحه عمومی Verification:

```text
┌──────────────────────────────────┐
│ ✓ Certificate Verified           │
│                                  │
│ نام: احمد پوررستمی               │
│ دوره: WordPress Development      │
│ صادر شده: ۲۵ خرداد ۱۴۰۵          │
│ وضعیت: معتبر                     │
│ Certificate ID: IRL-2026-00123   │
└──────────────────────────────────┘
```

---

# 30. Verification Status

```text
valid
invalid
revoked
expired
not_found
```

---

# 31. Valid Certificate

```text
✓ این گواهی معتبر است.
```

---

# 32. Invalid Certificate

```text
✕ این گواهی معتبر نیست.
```

---

# 33. Revoked Certificate

```text
این گواهی توسط صادرکننده لغو شده است.
```

---

# 34. Expired Certificate

```text
اعتبار این گواهی به پایان رسیده است.
```

---

# 35. Verification Security

Verification باید Server-side انجام شود.

Client نباید بتواند:

```text
status = valid
```

را جعل کند.

---

# 36. QR Code

در صورت فعال بودن، Certificate می‌تواند QR Code داشته باشد.

```text
┌──────────┐
│ QR CODE  │
└──────────┘
```

QR باید به Verification URL اشاره کند.

---

# 37. QR Boundary

QR Code فقط Verification Link را encode می‌کند.

اطلاعات حساس نباید داخل QR قرار گیرد.

---

# 38. Certificate Dashboard

Student می‌تواند گواهی‌های خود را مشاهده کند:

```text
گواهی‌های من

┌───────────────────────────────┐
│ React Advanced               │
│ صادر شده: 25 خرداد           │
│ ID: IRL-2026-00123           │
│ [ مشاهده ] [ دانلود ]         │
└───────────────────────────────┘
```

---

# 39. Certificate List

در صورت وجود چند گواهی:

```text
CertificateList
```

با:

```text
Search
Filter
Sort
Pagination
```

---

# 40. Certificate Filters

مثلاً:

```text
همه
معتبر
منقضی
لغوشده
```

---

# 41. Certificate Empty State

اگر گواهی وجود نداشته باشد:

```text
┌──────────────────────────────────┐
│ 🏆                               │
│ هنوز گواهی‌ای دریافت نکرده‌اید. │
│                                  │
│ با تکمیل دوره‌ها می‌توانید      │
│ گواهی دریافت کنید.               │
│                                  │
│ [ مشاهده دوره‌ها ]               │
└──────────────────────────────────┘
```

---

# 42. Certificate Detail

ساختار:

```text
CertificateDetail
│
├── Header
├── Preview
├── Metadata
├── Verification
└── Actions
```

---

# 43. Certificate Header

```text
گواهی پایان دوره
```

و:

```text
وضعیت: معتبر
```

---

# 44. Certificate Metadata Panel

```text
نام دانشجو
دوره
مدرس
تاریخ صدور
Certificate ID
اعتبار
```

---

# 45. Certificate Actions

```text
[ مشاهده ]
[ دانلود PDF ]
[ چاپ ]
[ اشتراک‌گذاری ]
```

Actions باید بر اساس Permission و State نمایش داده شوند.

---

# 46. Revoked Certificate UI

```text
┌──────────────────────────────┐
│ گواهی لغو شده                │
│                              │
│ این گواهی دیگر معتبر نیست.   │
└──────────────────────────────┘
```

---

# 47. Expired Certificate UI

```text
گواهی منقضی شده است.
```

اما اطلاعات تاریخی Certificate همچنان می‌تواند نمایش داده شود.

---

# 48. Certificate Download Permission

Backend باید بررسی کند:

```text
Authenticated
        ↓
Certificate Ownership
        ↓
Permission
        ↓
Download
```

---

# 49. Public Verification

Verification می‌تواند بدون Login قابل مشاهده باشد.

اما فقط اطلاعاتی که Certificate Policy اجازه می‌دهد باید نمایش داده شود.

---

# 50. Privacy

Public Verification نباید اطلاعات اضافی User را افشا کند.

مثلاً:

* Email
* Phone
* Address
* Internal User ID

نباید نمایش داده شود.

---

# 51. WordPress Architecture

Certificate UI نباید مستقیم:

```php
get_user_meta()
get_post_meta()
wpdb
```

را صدا بزند.

معماری:

```text
Certificate Repository
        ↓
Certificate Application Service
        ↓
Certificate DTO
        ↓
Certificate UI
```

---

# 52. REST API Boundary

```text
GET /certificates
GET /certificates/{id}
GET /certificates/{id}/download
GET /certificates/{id}/verify
```

Endpointهای دقیق باید طبق API Standards پروژه تعیین شوند.

---

# 53. Certificate DTO

```js
{
    id,
    number,
    student,
    course,
    instructor,
    issuer,
    issuedAt,
    expiresAt,
    status,
    verificationUrl,
    template,
    actions
}
```

---

# 54. Eligibility DTO

```js
{
    eligible,
    progress,
    requirements,
    missingRequirements,
    canIssue
}
```

---

# 55. Certificate Settings

```js
{
    enabled,
    autoIssue,
    requireCourseCompletion,
    requireFinalQuiz,
    minimumScore,
    expiryEnabled,
    expiryDuration,
    allowDownload,
    allowPrint,
    allowPublicVerification,
    showQrCode
}
```

---

# 56. Certificate Generation

Certificate می‌تواند:

```text
Manual
Automatic
```

باشد.

---

# 57. Automatic Issue

مثلاً:

```text
Course Completed
      ↓
Eligibility Check
      ↓
Certificate Service
      ↓
Issue Certificate
      ↓
Notification
```

---

# 58. Manual Issue

Instructor/Admin:

```text
Eligible
   ↓
Issue Certificate
```

---

# 59. Duplicate Prevention

برای یک Course/User نباید Certificateهای تکراری بدون Policy مشخص ایجاد شود.

مثلاً:

```text
User + Course
      ↓
Existing Certificate?
      ↓
Yes → Return Existing
```

---

# 60. Certificate Revocation

Certificate باید امکان Revocation داشته باشد.

مثلاً:

```text
Issued
   ↓
Revoked
```

علت Revocation می‌تواند ذخیره شود.

---

# 61. Revocation Reason

مثلاً:

```text
دلیل لغو:
صدور اشتباه گواهی
```

این اطلاعات برای Admin/Instructor است و لزوماً در Public Verification نمایش داده نمی‌شود.

---

# 62. Certificate Version

اگر Certificate Template تغییر کند، Certificateهای قدیمی نباید بدون دلیل تغییر ظاهری کنند.

بنابراین بهتر است:

```text
certificate.templateVersion
```

ثبت شود.

---

# 63. Immutable Certificate

پس از صدور:

```text
Student
Course
Issue Date
Certificate ID
```

نباید بدون Audit/Revision تغییر کنند.

---

# 64. Audit

برای Certificate می‌توان Eventهایی مانند:

```text
certificate_issued
certificate_downloaded
certificate_verified
certificate_revoked
certificate_reissued
```

ثبت کرد.

---

# 65. Notification

بعد از صدور:

```text
🎉 گواهی شما صادر شد.

[ مشاهده گواهی ]
```

Notification توسط Communication Module مدیریت می‌شود.

---

# 66. Course Integration

Certificate نتیجه Course Completion است.

```text
Course
   ↓
Progress
   ↓
Completion
   ↓
Certificate Eligibility
   ↓
Certificate
```

---

# 67. Quiz Integration

در صورت نیاز:

```text
Final Quiz Passed
        ↓
Certificate Eligibility
```

اما Certificate نباید Quiz را مستقیم Query کند.

---

# 68. Assignment Integration

در صورت نیاز:

```text
Required Assignment Completed
        ↓
Certificate Eligibility
```

---

# 69. Curriculum Integration

تمام الزامات Curriculum می‌توانند در Eligibility لحاظ شوند.

---

# 70. Dashboard Integration

در Student Dashboard:

```text
Certificates
```

باید به Certificate List متصل باشد.

---

# 71. Course Completion CTA

در Course Completion:

```text
🎉 دوره را با موفقیت تکمیل کردید.

گواهی شما آماده است.

[ مشاهده گواهی ]
```

---

# 72. Mobile

در Mobile:

```text
Certificate
   ↓
Preview
   ↓
Metadata
   ↓
Actions
```

---

# 73. Mobile Preview

Certificate Preview باید Responsive باشد.

برای نمایش کامل می‌توان از:

```text
Horizontal Scroll
Zoom
Full Screen
```

استفاده کرد.

---

# 74. Mobile Actions

Actions می‌توانند Sticky باشند:

```text
[ مشاهده ] [ دانلود ]
```

---

# 75. RTL

UI باید RTL-native باشد.

اما:

```text
Certificate ID
Verification URL
QR
Numeric Data
```

می‌توانند LTR باشند.

---

# 76. Accessibility

Certificate UI باید:

* Keyboard Accessible
* Screen Reader Friendly
* Focus Visible
* Semantic
* High Contrast

باشد.

---

# 77. PDF Accessibility

اگر PDF تولید می‌شود، Accessibility آن باید در PDF Renderer بررسی شود.

UI Component مسئول PDF Accessibility نیست.

---

# 78. Loading State

```text
Certificate Skeleton
Preview Skeleton
Metadata Skeleton
```

---

# 79. Error State

```text
بارگذاری گواهی انجام نشد.

[ تلاش مجدد ]
```

---

# 80. Download Error

```text
دانلود گواهی انجام نشد.

[ تلاش مجدد ]
```

---

# 81. Verification Loading

```text
در حال بررسی اعتبار گواهی...
```

---

# 82. Verification Error

```text
امکان بررسی اعتبار گواهی وجود ندارد.

[ تلاش مجدد ]
```

---

# 83. Dark Mode

Certificate Dashboard UI باید از Design Tokens استفاده کند:

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

اما خود Certificate Artwork می‌تواند Template مستقل داشته باشد.

---

# 84. Visual Style

UI اطراف Certificate باید مطابق Design System پروژه باشد:

* Modern SaaS
* RTL
* Rounded UI
* Soft Shadow
* 16px Radius
* Blue/Purple Accent
* Component Based
* WordPress Friendly
* Responsive

---

# 85. Components Used

```text
Card
Badge
Button
Icon
Avatar
Modal
Drawer
Toast
Alert
Skeleton
EmptyState
Progress
```

---

# 86. Certificate Variants

```text
card
detail
preview
compact
dashboard
verification
```

---

# 87. Certificate Card Variant

```text
CertificateCard
 ├── Course
 ├── Issue Date
 ├── Status
 ├── Certificate ID
 └── Actions
```

---

# 88. Certificate Preview Variant

```text
CertificatePreview
 ├── Template
 ├── Student
 ├── Course
 ├── Instructor
 ├── Date
 └── Certificate ID
```

---

# 89. Verification Variant

```text
CertificateVerification
 ├── Status
 ├── Certificate ID
 ├── Student
 ├── Course
 └── Issue Date
```

---

# 90. Do

* Certificate را بخشی از Certificate Module نگه دار.
* Eligibility را Server-side کنترل کن.
* Certificate ID را Backend تولید کن.
* Verification را Server-side انجام بده.
* Certificateهای صادرشده را Immutable در نظر بگیر.
* Template Version ذخیره کن.
* Download را Permission-aware کن.
* Public Verification را Privacy-aware کن.
* QR را به Verification URL متصل کن.
* Certificate UI را از PDF Renderer جدا نگه دار.
* با Course Completion یکپارچه باش.
* با Dashboard یکپارچه باش.
* Mobile و RTL را پشتیبانی کن.

---

# 91. Don't

* Certificate را با Course UI یکی نکن.
* Eligibility را در JavaScript محاسبه نکن.
* Certificate ID را Client-generated نکن.
* اطلاعات حساس User را در Public Verification نمایش نده.
* فایل PDF را مستقیماً از UI تولید نکن.
* Certificate را بدون Audit تغییر نده.
* Template را داخل Component Hardcode نکن.
* Certificate را به Theme وابسته نکن.
* Database Query مستقیم داخل Component نداشته باش.

---

# 92. Testing Requirements

## Eligibility

```text
Eligible
Not Eligible
Missing Requirement
Completed
```

## Certificate

```text
Issued
Revoked
Expired
```

## Actions

```text
View
Download
Print
Share
Verify
```

## Verification

```text
Valid
Invalid
Revoked
Expired
Not Found
```

## Privacy

```text
Authenticated User
Public Verification
Unauthorized Access
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
RTL
Contrast
```

---

# 93. Final Architecture

```text
                         Certificate Module
                                │
                    ┌───────────┼───────────┐
                    ↓           ↓           ↓
                Eligibility  Certificate  Verification
                    │           │           │
                    └───────────┼───────────┘
                                ↓
                         Application API
                                │
                                ↓
                        Certificate DTO
                                │
             ┌──────────────────┼──────────────────┐
             ↓                  ↓                  ↓
      CertificateCard    CertificateDetail   Verification
                                │
                                ↓
                       CertificatePreview
                                │
                         Certificate Template
                                │
                    ┌───────────┼───────────┐
                    ↓           ↓           ↓
                   HTML        PDF        Image
```

---

# 94. Responsibility Map

```text
Certificate Module
    → Eligibility
    → Issuing
    → Revocation
    → Certificate State
    → Certificate Identity

Course Module
    → Completion

Assessment Module
    → Quiz / Assignment Requirements

User Module
    → Student Identity

Media Module
    → Certificate Assets

PDF / Rendering Service
    → PDF Generation

Communication Module
    → Certificate Notifications

Analytics
    → Certificate Events

Certificate UI
    → Display
    → Preview
    → Actions
    → Verification Experience
```

---

# 95. Final Principle

`Certificate` در Iran LMS باید یک **Credential Experience** باشد، نه صرفاً یک فایل PDF.

معماری نهایی:

```text
Course Completion
       ↓
Eligibility Engine
       ↓
Certificate Service
       ↓
Issue Certificate
       ↓
Certificate Record
       ↓
Template Rendering
       ↓
Preview / PDF
       ↓
Verification
```

و مرزبندی اصلی:

```text
Certificate UI
       ≠
Eligibility Engine
       ≠
Certificate Service
       ≠
PDF Generator
       ≠
Verification Engine
```

این تفکیک باعث می‌شود Certificate هم در **Student Dashboard**، هم در **Course Completion**، هم در **Profile** و هم در یک صفحه عمومی **Certificate Verification** قابل استفاده باشد و همان API بتواند در آینده توسط اپلیکیشن موبایل Iran LMS نیز مصرف شود.
