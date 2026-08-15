# `Mobile-Modals.md`

**Path:** `07-Mobile/Mobile-Modals.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Shared UI / Overlay System
**Scope:** Mobile Modal & Dialog System
**Version:** 1.0
**Status:** Foundation

> این فایل برای **افزونه WordPress ایران LMS** تعریف شده است. بنابراین Modalها بخشی از UI مشترک افزونه هستند و نباید به Theme یا یک Plugin جانبی خاص وابسته باشند. راهنمای پروژه روی RTL فارسی، طراحی Component-Based، WordPress Friendly و Modular Architecture تأکید دارد. 

---

# 1. Purpose

Modal برای نمایش یک تعامل یا اطلاعات موقت روی محتوای فعلی استفاده می‌شود.

در Iran LMS کاربردهای آن شامل:

```text
Confirmation
Delete
Edit
Details
Filters
Settings
Course Information
Quiz Information
Assignment Details
Certificate Preview
Payment Confirmation
Coupon
Media Selection
Notifications
Help
```

است.

---

# 2. Modal Principle

Modal نباید برای هر تعامل ساده استفاده شود.

اگر کاربر می‌تواند بدون خروج از Context فعلی کار را انجام دهد:

```text
Inline
Popover
Dropdown
Bottom Sheet
```

ممکن است انتخاب بهتری باشد.

Modal زمانی استفاده شود که نیاز به تمرکز موقت کاربر وجود دارد.

---

# 3. Mobile Modal Philosophy

در Mobile فضای صفحه محدود است.

بنابراین Modal باید:

```text
Focused
Simple
Touch Friendly
Dismissible
Accessible
Responsive
```

باشد.

---

# 4. Modal Types

سیستم Modal حداقل این Typeها را پشتیبانی کند:

```text
1. Alert Dialog
2. Confirmation Dialog
3. Form Modal
4. Detail Modal
5. Full-Screen Modal
6. Bottom Sheet
7. Selection Modal
8. Media Modal
```

---

# 5. Standard Modal

ساختار:

```text
┌──────────────────────────┐
│ عنوان             ×      │
├──────────────────────────┤
│                          │
│ محتوا                    │
│                          │
│                          │
├──────────────────────────┤
│ [ انصراف ] [ تأیید ]     │
└──────────────────────────┘
```

---

# 6. Mobile Width

در Mobile Modal نباید فضای افقی را بیش از حد اشغال کند.

الگو:

```text
Viewport
│
├── Horizontal Padding
│
└── Modal
```

Modal باید فاصله امن از لبه‌های صفحه داشته باشد، مگر در Full-Screen Mode.

---

# 7. Border Radius

طبق Design System پروژه، Radius اصلی UI برابر **16px** است. 

Modal نیز باید از همان Token استفاده کند و Radius مستقل و تصادفی نداشته باشد.

---

# 8. Overlay

پس‌زمینه Modal:

```text
Page
   ↓
Overlay
   ↓
Modal
```

Overlay باید:

* محتوای پشت Modal را کم‌اهمیت کند
* Focus بصری را روی Modal قرار دهد
* در صورت امکان تعامل با Background را مسدود کند

---

# 9. Background Interaction

به صورت پیش‌فرض:

```text
Modal Open
↓
Background Interaction
= Disabled
```

باشد.

---

# 10. Dismiss By Backdrop

برای Modalهای غیرحساس:

```text
Tap Outside
↓
Close
```

می‌تواند فعال باشد.

اما برای عملیات حساس مانند:

```text
Delete
Payment
Unsaved Changes
Critical Confirmation
```

نباید تنها روش خروج باشد.

---

# 11. Close Button

Modal باید در صورت قابل بستن بودن Close Button داشته باشد:

```text
×
```

محل آن در RTL باید با Layout پروژه هماهنگ باشد.

---

# 12. Close Button Accessibility

Close Button باید:

```text
aria-label="بستن"
```

یا معادل مناسب Accessibility داشته باشد.

---

# 13. Escape Key

در محیط‌هایی که Keyboard وجود دارد:

```text
Escape
↓
Close Modal
```

در صورتی که Modal قابل بستن باشد.

---

# 14. Back Button

در Mobile:

```text
Android Back
iOS Navigation
Browser Back
```

نباید باعث رفتار غیرقابل پیش‌بینی شود.

Modal باید بتواند Back State را مدیریت کند.

---

# 15. Modal Header

ساختار:

```text
عنوان
توضیح کوتاه
```

مثلاً:

```text
حذف دوره

این عملیات قابل بازگشت نیست.
```

---

# 16. Modal Body

Body می‌تواند شامل:

```text
Text
Form
List
Table
Image
Video
Course Details
Warning
```

باشد.

---

# 17. Modal Footer

Footer برای Actionها:

```text
[ انصراف ] [ تأیید ]
```

است.

Primary Action باید واضح‌تر باشد.

---

# 18. Primary Action

مثلاً:

```text
[ حذف دوره ]
```

یا:

```text
[ ذخیره تغییرات ]
```

---

# 19. Secondary Action

مثلاً:

```text
[ انصراف ]
```

Secondary Action نباید با Primary اشتباه شود.

---

# 20. Destructive Modal

برای Delete:

```text
┌──────────────────────────┐
│ حذف دوره                 │
│                          │
│ آیا از حذف این دوره      │
│ مطمئن هستید؟             │
│                          │
│ این عملیات قابل بازگشت   │
│ نیست.                    │
│                          │
│ [ انصراف ] [ حذف ]       │
└──────────────────────────┘
```

---

# 21. Destructive Confirmation

Action خطرناک باید:

```text
Clear
Explicit
Irreversible-aware
```

باشد.

نباید از متن مبهمی مانند:

```text
[ OK ]
```

استفاده شود.

بهتر:

```text
[ حذف دوره ]
```

---

# 22. Confirmation Modal

برای عملیات معمول:

```text
تکمیل درس

آیا می‌خواهید این درس را به عنوان تکمیل‌شده ثبت کنید؟

[ انصراف ] [ تکمیل درس ]
```

---

# 23. Alert Modal

برای اطلاع مهم:

```text
┌──────────────────────────┐
│ ⚠ توجه                  │
│                          │
│ برای ادامه باید ابتدا    │
│ وارد حساب کاربری شوید.   │
│                          │
│ [ ورود به حساب ]         │
└──────────────────────────┘
```

---

# 24. Form Modal

برای فرم‌های کوتاه:

```text
ویرایش نام

نام

[ احمد ]

[ انصراف ] [ ذخیره ]
```

برای Formهای بزرگ از Full-Screen Form استفاده شود.

---

# 25. Form Validation

Error باید داخل Modal قابل مشاهده باشد:

```text
نام

[      ]

⚠ وارد کردن نام الزامی است.
```

Modal نباید بعد از Validation Error بسته شود.

---

# 26. Long Form

اگر Form طولانی است:

```text
Modal
↓
Scrollable Body
↓
Sticky Footer
```

استفاده شود.

---

# 27. Full-Screen Modal

برای تعاملات پیچیده:

```text
┌──────────────────────────┐
│ ← عنوان           ✓      │
├──────────────────────────┤
│                          │
│ Form / Content           │
│                          │
│                          │
│                          │
├──────────────────────────┤
│ [ ذخیره ]                │
└──────────────────────────┘
```

کل Viewport را اشغال می‌کند.

---

# 28. Full-Screen Use Cases

مناسب برای:

```text
Course Editor
Lesson Editor
Quiz Editor
Assignment Editor
Media Picker
Large Forms
Complex Filters
```

---

# 29. Bottom Sheet

برای تعاملات سبک:

```text
┌──────────────────────────┐
│                          │
│ صفحه اصلی               │
│                          │
├──────────────────────────┤
│ ─────                    │
│ گزینه‌ها                 │
│                          │
│ ویرایش                   │
│ اشتراک‌گذاری             │
│ حذف                      │
└──────────────────────────┘
```

Bottom Sheet برای Mobile بسیار مناسب است.

---

# 30. Bottom Sheet Handle

در صورت Draggable بودن:

```text
─────
```

نمایش داده شود.

---

# 31. Bottom Sheet States

```text
Collapsed
Expanded
Full Height
Closed
```

در صورت نیاز.

---

# 32. Bottom Sheet Use Cases

مثلاً در Course:

```text
اشتراک‌گذاری
افزودن به علاقه‌مندی
دانلود
گزارش
```

---

# 33. Selection Modal

برای انتخاب:

```text
مدرس

○ احمد
○ محمد
○ سارا
○ نیما
```

بعد:

```text
[ تأیید ]
```

---

# 34. Searchable Selection

برای داده‌های زیاد:

```text
انتخاب مدرس

[ 🔍 جستجوی مدرس ]

احمد
محمد
سارا
نیما
```

---

# 35. Filter Modal

برای Mobile Filter:

```text
┌──────────────────────────┐
│ فیلترها                  │
├──────────────────────────┤
│ دسته‌بندی                │
│                          │
│ ☐ برنامه‌نویسی           │
│ ☐ طراحی                  │
│ ☐ کسب‌وکار               │
│                          │
│ سطح                      │
│ ○ مبتدی                  │
│ ○ متوسط                  │
│ ○ پیشرفته                │
├──────────────────────────┤
│ [ پاک کردن ] [ اعمال ]   │
└──────────────────────────┘
```

---

# 36. Course Details Modal

برای Preview کوتاه:

```text
دوره جامع React

مدرس: علی احمدی
مدت: ۲۴ ساعت
سطح: متوسط
دانشجو: ۴,۵۶۳

[ مشاهده دوره ]
```

---

# 37. Lesson Details

Modal می‌تواند اطلاعات سریع Lesson را نمایش دهد:

```text
مقدمه‌ای بر React

مدت:
۲۱:۳۶

نوع:
ویدئو

وضعیت:
تکمیل نشده

[ شروع درس ]
```

---

# 38. Quiz Information

```text
آزمون فصل ۲

تعداد سؤال:
۲۰

زمان:
۳۰ دقیقه

حداقل نمره:
۷۰٪

[ شروع آزمون ]
```

---

# 39. Assignment Details

```text
پروژه نهایی React

مهلت:
۱۴۰۴/۰۳/۲۵

امتیاز:
۱۰۰

فایل‌های مجاز:
PDF, ZIP

[ ارسال تکلیف ]
```

---

# 40. Certificate Preview

برای Preview:

```text
┌──────────────────────────┐
│ گواهینامه           ×    │
│                          │
│      [ Certificate ]     │
│                          │
│ شماره: #CERT-12456       │
│                          │
│ [ دانلود ] [ اشتراک ]    │
└──────────────────────────┘
```

---

# 41. Media Modal

برای مشاهده Image:

```text
┌──────────────────────────┐
│                    ×     │
│                          │
│       [ IMAGE ]          │
│                          │
│     عنوان تصویر          │
└──────────────────────────┘
```

در Image Viewer می‌توان:

```text
Zoom
Next
Previous
Download
```

داشت.

---

# 42. Video Modal

برای Video Preview:

```text
┌──────────────────────────┐
│                    ×     │
│                          │
│       ▶ Video            │
│                          │
└──────────────────────────┘
```

Video باید Responsive باشد.

---

# 43. Modal Stacking

از باز کردن چند Modal روی هم تا حد امکان جلوگیری شود.

بد:

```text
Modal A
 ↓
Modal B
 ↓
Modal C
```

بهتر:

```text
Modal A
 ↓
Replace / Expand
```

---

# 44. Nested Modal

اگر Nested Modal اجتناب‌ناپذیر است:

```text
Parent Modal
     ↓
Child Modal
```

Focus و Close Order باید مشخص باشد.

---

# 45. Z-Index

Modalها باید از یک Z-Index System مشترک استفاده کنند.

مثلاً:

```text
Base Content
↓
Sticky Elements
↓
Dropdown
↓
Overlay
↓
Modal
↓
Toast / Critical Feedback
```

مقادیر عددی نباید در هر Component به صورت تصادفی تعریف شوند.

---

# 46. Scroll Lock

هنگام باز شدن Modal:

```text
Modal Open
↓
Background Scroll Locked
```

باشد.

پس از Close:

```text
Modal Close
↓
Original Scroll Position Restored
```

---

# 47. Scrollable Body

اگر محتوا زیاد است:

```text
Header
Fixed

Body
Scrollable

Footer
Fixed
```

بهتر است.

---

# 48. Sticky Footer

برای Actionهای مهم:

```text
┌──────────────────────────┐
│ Scrollable Content       │
│                          │
│                          │
├──────────────────────────┤
│ [ انصراف ] [ ذخیره ]     │
└──────────────────────────┘
```

---

# 49. Modal Height

Modal نباید بدون دلیل کل Viewport را بگیرد.

در حالت عادی:

```text
Content Height
+
Safe Margins
```

استفاده شود.

برای Full-Screen:

```text
100vh
```

با در نظر گرفتن Safe Area.

---

# 50. Safe Area

در دستگاه‌های دارای Notch یا Home Indicator:

```text
env(safe-area-inset-top)
env(safe-area-inset-bottom)
```

در Layout لحاظ شود.

---

# 51. Mobile Keyboard

اگر Modal دارای Form است:

```text
Input Focus
↓
Keyboard Open
↓
Modal Reposition
↓
Input Visible
```

باشد.

Keyboard نباید دکمه Submit را پنهان کند.

---

# 52. Focus Management

پس از Open:

```text
Modal Open
↓
Focus → Modal
```

پس از Close:

```text
Modal Close
↓
Focus → Trigger
```

برگردد.

---

# 53. Focus Trap

در Modal فعال:

```text
Tab
```

نباید Focus را به محتوای پشت Modal منتقل کند.

---

# 54. Screen Reader

Modal باید Role مناسب داشته باشد:

```text
dialog
```

و برای Alertهای حساس:

```text
alertdialog
```

استفاده شود.

---

# 55. Modal Title Association

عنوان باید به Modal متصل باشد:

```text
aria-labelledby
```

و توضیح در صورت وجود:

```text
aria-describedby
```

---

# 56. Accessible Close

Modal قابل بستن باید حداقل یکی از مسیرهای زیر را داشته باشد:

```text
Close Button
Escape
Back
```

با توجه به Context.

---

# 57. Loading Modal

برای عملیات کوتاه:

```text
در حال ذخیره...

      ◌
```

استفاده شود.

اما Modal نباید صرفاً برای هر Loading کوچک باز شود.

---

# 58. Processing Modal

برای عملیات طولانی:

```text
در حال ایجاد دوره...

این عملیات ممکن است چند لحظه طول بکشد.
```

اگر عملیات قابل Cancel است:

```text
[ لغو ]
```

نمایش داده شود.

---

# 59. Success Modal

برای موفقیت‌هایی که نیاز به توجه دارند:

```text
✓
دوره با موفقیت ایجاد شد.

[ مشاهده دوره ]
```

برای Feedbackهای ساده Toast مناسب‌تر است.

---

# 60. Error Modal

برای خطاهای Critical:

```text
⚠
عملیات انجام نشد.

لطفاً دوباره تلاش کنید.

[ تلاش دوباره ]
```

خطاهای ساده بهتر است Inline یا Toast باشند.

---

# 61. Network Error

```text
ارتباط با سرور برقرار نشد.

اطلاعات واردشده حفظ شده است.

[ تلاش دوباره ]
```

---

# 62. Permission Error

```text
دسترسی محدود است.

شما اجازه انجام این عملیات را ندارید.

[ بستن ]
```

---

# 63. WordPress Permission

UI نباید صرفاً با:

```text
is_user_logged_in()
```

تصمیم بگیرد که کاربر مجاز است.

Permission واقعی باید Server-side بررسی شود.

---

# 64. Modal + REST

در UIهای REST-based:

```text
Modal
 ↓
Action
 ↓
REST Request
 ↓
Application Service
 ↓
Response
 ↓
Modal State
```

---

# 65. No Direct Database Access

Modal Component نباید:

```text
$wpdb
```

را مستقیماً صدا بزند.

معماری صحیح:

```text
Modal
 ↓
Action Handler
 ↓
Application Layer
 ↓
Domain
 ↓
Repository
 ↓
WordPress Data Layer
```

---

# 66. Theme Independence

Modal نباید به CSS Theme وابسته باشد.

Namespace پیشنهادی:

```text
.iran-lms-modal
.iran-lms-modal__overlay
.iran-lms-modal__dialog
.iran-lms-modal__header
.iran-lms-modal__body
.iran-lms-modal__footer
```

---

# 67. Modular Architecture

اگر یک Feature Module غیرفعال باشد، Modal مربوط به آن نباید Layout یا سایر بخش‌های افزونه را خراب کند.

مثلاً:

```text
Certificate Module
       ↓
Disabled
       ↓
Certificate Modal
       ↓
Not Registered
```

این با اصل Modular پروژه هماهنگ است؛ راهنمای پروژه صراحتاً می‌گوید قابلیت‌های غیرفعال باید بدون خراب کردن Layout از UI حذف شوند. 

---

# 68. WooCommerce Integration

اگر Commerce با WooCommerce Integration کار کند:

```text
Modal
 ↓
Commerce Service
 ↓
WooCommerce Integration
```

اما Modal نباید مستقیماً وابسته به WooCommerce باشد.

---

# 69. Payment Confirmation

برای عملیات مالی:

```text
پرداخت

مبلغ:
۱,۴۹۰,۰۰۰ تومان

روش پرداخت:
درگاه بانکی

[ انصراف ] [ پرداخت ]
```

مبلغ باید از Commerce دریافت شود.

---

# 70. Coupon Modal

برای Mobile می‌توان Coupon را داخل Bottom Sheet نمایش داد:

```text
کد تخفیف

[ وارد کردن کد ]

[ اعمال کد ]
```

---

# 71. Notification Details

Notificationهای موجود در افزونه می‌توانند با Modal جزئیات کامل داشته باشند:

```text
اعلان جدید

تکلیف جدید ثبت شد

تکلیف «طراحی رابط کاربری»
در دوره «UI/UX» ثبت شد.

[ مشاهده تکلیف ]
```

---

# 72. Modal Animation

Animation باید کوتاه و نرم باشد.

مثلاً:

```text
Open
Fade + Scale

Bottom Sheet
Translate Y

Close
Reverse Animation
```

---

# 73. Reduced Motion

اگر کاربر:

```text
prefers-reduced-motion
```

داشته باشد، Animation باید کاهش پیدا کند.

---

# 74. Dark Mode

Modal باید Dark Mode را پشتیبانی کند:

```text
Overlay
Dialog
Text
Inputs
Buttons
Icons
```

---

# 75. RTL

Modal باید RTL باشد:

```text
direction: rtl;
```

مواردی مثل:

```text
Email
URL
Order ID
Transaction ID
```

می‌توانند LTR باشند.

---

# 76. Touch Targets

تمام Actionهای Modal حداقل Touch Target مناسب داشته باشند:

```text
44 × 44 px
```

---

# 77. Modal State

State پیشنهادی:

```text
Closed
Opening
Open
Submitting
Loading
Success
Error
Closing
```

---

# 78. Modal API

Component منطقی می‌تواند چنین APIای داشته باشد:

```text
Modal
├── open
├── close
├── title
├── description
├── size
├── variant
├── dismissible
├── loading
├── actions
└── children
```

---

# 79. Modal Variants

```text
default
confirmation
danger
success
warning
info
fullscreen
bottom-sheet
```

---

# 80. Size

برای Desktop:

```text
sm
md
lg
xl
```

اما در Mobile باید Responsive Behavior داشته باشد.

مثلاً:

```text
Desktop:
md

Mobile:
Full-width / Bottom Sheet
```

---

# 81. Trigger

Modal باید از Trigger مستقل باشد.

مثلاً:

```text
Button
 ↓
Modal
```

یا:

```text
Table Row
 ↓
Modal
```

یا:

```text
Notification
 ↓
Modal
```

---

# 82. State Preservation

اگر Modal با Form بسته شد، بسته به نوع عملیات:

```text
Cancel
↓
Discard

Close
↓
Preserve Draft
```

باید رفتار مشخصی داشته باشد.

---

# 83. Unsaved Changes

برای Modal Form:

```text
تغییرات ذخیره نشده‌اند.

آیا مطمئن هستید که می‌خواهید خارج شوید؟

[ ادامه ویرایش ]
[ خروج ]
```

---

# 84. Modal vs Toast

### Modal

برای:

```text
Decision
Confirmation
Complex Interaction
Important Information
```

### Toast

برای:

```text
Success
Small Feedback
Non-blocking Status
```

---

# 85. Modal vs Snackbar

Snackbar برای Feedback سریع و معمولاً غیرمسدودکننده مناسب است.

Modal باید فقط زمانی استفاده شود که User Action نیاز به تمرکز داشته باشد.

---

# 86. Modal vs Dropdown

Dropdown:

```text
Quick Choice
Navigation
Small Action List
```

Modal:

```text
Important Choice
Complex Content
Confirmation
```

---

# 87. Modal vs Bottom Sheet

Bottom Sheet برای Mobile اولویت دارد زمانی که:

```text
Quick Selection
Filter
Actions
Short Details
```

داریم.

Modal Centered برای:

```text
Confirmation
Critical Action
Focused Form
```

مناسب‌تر است.

---

# 88. Performance

Modal Content سنگین نباید قبل از نیاز Render شود.

برای محتواهای سنگین:

```text
Open Modal
↓
Lazy Load Content
```

استفاده شود.

---

# 89. Video / Media

برای Video یا Media سنگین:

```text
Modal Shell
↓
Lazy Media Loading
```

انجام شود.

---

# 90. Modal Lifecycle

```text
Trigger
 ↓
Open
 ↓
Mount
 ↓
Focus
 ↓
Interact
 ↓
Submit / Close
 ↓
Unmount
```

---

# 91. Cleanup

پس از Close:

```text
Event Listeners
Timers
Subscriptions
Temporary State
```

باید Cleanup شوند.

---

# 92. Error Recovery

اگر Action داخل Modal شکست خورد:

```text
Modal remains open
↓
Error displayed
↓
User can retry
```

Modal نباید به صورت خودکار بسته شود.

---

# 93. Success Recovery

پس از موفقیت:

```text
Action Success
↓
Update Parent State
↓
Close Modal
```

یا اگر نیاز به مشاهده نتیجه وجود دارد:

```text
Success State
↓
User Action
```

---

# 94. Example: Delete Course

```text
Course List
   ↓
⋮
   ↓
حذف
   ↓
Confirmation Modal
   ↓
[ حذف دوره ]
   ↓
Application Service
   ↓
Success
   ↓
Close
   ↓
Refresh Course List
```

---

# 95. Example: Edit Lesson

```text
Lesson
 ↓
ویرایش
 ↓
Full-Screen Modal
 ↓
Lesson Form
 ↓
Validation
 ↓
Save
 ↓
Update Lesson
 ↓
Close
```

---

# 96. Example: Filter

```text
Course List
 ↓
فیلتر
 ↓
Bottom Sheet
 ↓
Select Filters
 ↓
اعمال
 ↓
Update Query
 ↓
Close
```

---

# 97. Example: Certificate

```text
Certificate
 ↓
مشاهده
 ↓
Media / Detail Modal
 ↓
Preview
 ↓
Download / Share
```

---

# 98. Definition of Done

```text
☐ Standard Modal
☐ Alert Dialog
☐ Confirmation Dialog
☐ Destructive Dialog
☐ Form Modal
☐ Detail Modal
☐ Full-Screen Modal
☐ Bottom Sheet
☐ Selection Modal
☐ Filter Modal
☐ Media Modal
☐ Video Modal
☐ Header
☐ Body
☐ Footer
☐ Overlay
☐ Close Button
☐ Back Handling
☐ Escape Handling
☐ Scroll Lock
☐ Scrollable Body
☐ Sticky Footer
☐ Focus Management
☐ Focus Trap
☐ Screen Reader
☐ Keyboard Accessibility
☐ Touch Targets
☐ Keyboard Handling
☐ Safe Area
☐ Validation
☐ Loading
☐ Success
☐ Error
☐ Network Error
☐ Permission Error
☐ Unsaved Changes
☐ RTL
☐ LTR Data
☐ Dark Mode
☐ Reduced Motion
☐ Theme Independence
☐ WordPress Compatibility
☐ REST Compatibility
☐ Modular Architecture
☐ No Direct Database Access
☐ Commerce Compatibility
☐ Lazy Loading
☐ Lifecycle Cleanup
```

---

# 99. Final Architecture

```text
Feature
   ↓
Trigger
   ↓
Modal Controller
   ↓
Modal Shell
   │
   ├── Header
   ├── Body
   └── Footer
   ↓
Action
   ↓
Application Service
   ↓
Domain / Module
   ↓
WordPress Data Layer
```

---

# 100. Final Principle

> **Modal در Iran LMS یک لایه Overlay عمومی برای افزونه است، نه یک Component وابسته به Theme. در موبایل باید تا حد امکان ساده و Context-aware باشد؛ برای انتخاب‌های سریع از Bottom Sheet، برای عملیات حساس از Confirmation Dialog و برای تعاملات پیچیده از Full-Screen Modal استفاده شود. همچنین تمام Validation، Permission، Commerce و Business Logic باید در لایه‌های داخلی افزونه باقی بماند و Modal صرفاً مسئول تجربه تعامل کاربر باشد.**
