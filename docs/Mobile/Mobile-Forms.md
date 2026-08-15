# `Mobile-Forms.md`

**Path:** `07-Mobile/Mobile-Forms.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Core UI / Shared Components
**Scope:** Mobile Form System
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد طراحی و رفتار **Formها در موبایل** را برای افزونه WordPress **Iran LMS** تعریف می‌کند.

Formها در بخش‌های مختلف افزونه استفاده می‌شوند، از جمله:

```text
Authentication
Profile
Course Management
Lesson Management
Quiz
Assignment
Assessment
Checkout
Coupon
Settings
Search
Instructor
Notifications
```

هدف این استاندارد ایجاد یک Form System یکپارچه، قابل استفاده مجدد، Responsive و مستقل از Theme است.

---

# 2. Plugin Boundary

Form System متعلق به **افزونه Iran LMS** است، نه Theme.

معماری:

```text
WordPress
   ↓
Iran LMS Plugin
   ↓
Shared UI
   ↓
Form System
   ↓
Feature Modules
```

Form Component نباید مستقیماً به:

```text
Theme
$wpdb
WordPress Options
WooCommerce
Specific Database Table
```

وابسته باشد.

---

# 3. Form Architecture

ساختار کلی:

```text
Form
│
├── Form Header
├── Form Description
├── Form Fields
├── Field Groups
├── Validation
├── Help / Feedback
└── Form Actions
```

---

# 4. Mobile Form Principles

Form موبایل باید:

```text
Simple
Readable
Touch Friendly
Fast
Accessible
RTL Ready
Responsive
Error Resistant
```

باشد.

اصل اصلی:

> هر Form باید کمترین تعداد تعامل لازم را برای تکمیل موفقیت‌آمیز فرآیند داشته باشد.

---

# 5. Form Width

در Mobile:

```text
Viewport
↓
Horizontal Padding
↓
Form
```

Form نباید به لبه صفحه بچسبد.

الگوی پیشنهادی:

```text
┌─────────────────────────┐
│                         │
│  Label                  │
│  ┌───────────────────┐  │
│  │ Input             │  │
│  └───────────────────┘  │
│                         │
└─────────────────────────┘
```

---

# 6. Form Container

Form Container می‌تواند شامل:

```text
Title
Description
Fields
Actions
```

باشد.

برای Formهای ساده، Card اجباری نیست.

---

# 7. Form Header

مثال:

```text
ویرایش پروفایل

اطلاعات حساب کاربری خود را به‌روزرسانی کنید.
```

ساختار:

```text
Title
Description
```

---

# 8. Field Structure

هر Field:

```text
Label
Control
Help Text
Error Message
```

ساختار:

```text
نام دوره

[ دوره جامع React ]

عنوان دوره را وارد کنید.
```

---

# 9. Label

Label باید همیشه مشخص باشد.

مثال:

```text
نام کاربری
```

Placeholder نباید جایگزین Label شود.

❌:

```text
[ نام کاربری ]
```

به عنوان تنها راهنمای Field.

✅:

```text
نام کاربری

[ وارد کردن نام کاربری ]
```

---

# 10. Required Fields

Field اجباری باید مشخص باشد:

```text
نام *
```

یا با Accessibility Attribute مناسب:

```text
required
```

علامت `*` به تنهایی نباید تنها روش تشخیص برای Screen Reader باشد.

---

# 11. Optional Fields

در صورت نیاز:

```text
نام مستعار (اختیاری)
```

نمایش داده شود.

اما بهتر است تعداد Fieldهای Optional حداقل باشد.

---

# 12. Placeholder

Placeholder فقط برای Example یا Format استفاده شود.

مثلاً:

```text
شماره موبایل

[ 09121234567 ]
```

Placeholder نباید اطلاعات مهمی را منتقل کند.

---

# 13. Help Text

Help Text باید کوتاه باشد:

```text
رمز عبور باید حداقل ۸ کاراکتر باشد.
```

و مستقیماً زیر Field قرار گیرد.

---

# 14. Error Message

Error باید نزدیک Field باشد:

```text
ایمیل

[ example ]

⚠ ایمیل واردشده معتبر نیست.
```

Error نباید فقط با رنگ قرمز مشخص شود.

---

# 15. Success State

برای Fieldهایی که نیاز به Feedback موفق دارند:

```text
✓ ایمیل تأیید شد.
```

اما Success Indicator نباید برای همه Fieldها اجباری باشد.

---

# 16. Field States

تمام Fieldها باید Stateهای زیر را پشتیبانی کنند:

```text
Default
Hover
Focus
Filled
Disabled
Readonly
Error
Success
Loading
```

---

# 17. Focus State

Focus باید کاملاً قابل مشاهده باشد.

```text
Label

┌───────────────────────┐
│ متن                   │
└───────────────────────┘
      ↑
    Focus
```

Focus صرفاً با تغییر جزئی رنگ Border مشخص نشود.

---

# 18. Disabled

Disabled Field:

```text
نام کاربری

[ ahmad123 ]
```

باید غیرقابل ویرایش باشد.

اما اگر دلیل Disabled بودن مهم است، Help Text نمایش داده شود.

---

# 19. Readonly

Readonly با Disabled متفاوت است.

Readonly:

```text
قابل مشاهده
قابل انتخاب
غیرقابل ویرایش
```

است.

مثلاً:

```text
شماره سفارش
#12456
```

---

# 20. Text Input

برای Text:

```text
Label
[ Input ]
Help
Error
```

استفاده شود.

---

# 21. Input Height

Touch Target باید برای موبایل مناسب باشد.

حداقل ارتفاع پیشنهادی:

```text
44px
```

و برای عناصر اصلی می‌توان از ارتفاع بزرگ‌تر استفاده کرد.

---

# 22. Textarea

Textarea برای:

```text
Description
Notes
Assignment Answer
Bio
Comment
```

استفاده شود.

باید امکان Auto Grow در صورت نیاز وجود داشته باشد.

---

# 23. Number Input

برای اعداد از Input مناسب استفاده شود.

مثلاً:

```text
تعداد جلسات

[ 12 ]
```

در صورت امکان از Numeric Keyboard استفاده شود.

---

# 24. Email Input

Email باید Keyboard مناسب موبایل را فعال کند.

مثلاً:

```text
type="email"
```

---

# 25. URL Input

برای URL:

```text
type="url"
```

استفاده شود.

---

# 26. Password Input

Password باید امکان:

```text
Show
Hide
```

داشته باشد.

مثال:

```text
رمز عبور

[ ••••••••••• ] 👁
```

---

# 27. Password Rules

در صورت نیاز:

```text
حداقل ۸ کاراکتر
حداقل یک عدد
```

نمایش داده شود.

Validation باید توسط Application Layer نیز انجام شود.

---

# 28. Search Input

Search Field:

```text
🔍 جستجو در دوره‌ها...
```

باید برای استفاده سریع در موبایل بهینه باشد.

در صورت امکان:

```text
Clear
Submit
Loading
```

پشتیبانی شود.

---

# 29. Select

Select برای لیست‌های کوتاه:

```text
نوع دوره
[ آنلاین ▼ ]
```

مناسب است.

---

# 30. Mobile Select

برای لیست‌های طولانی بهتر است از:

```text
Bottom Sheet
Modal Select
Searchable Select
```

استفاده شود.

---

# 31. Checkbox

برای انتخاب مستقل:

```text
☐ قوانین را می‌پذیرم.
```

استفاده شود.

---

# 32. Checkbox Group

مثلاً:

```text
موضوعات

☐ برنامه‌نویسی
☐ طراحی
☐ وردپرس
☐ UI/UX
```

---

# 33. Radio

برای انتخاب یکی از گزینه‌ها:

```text
○ مبتدی
○ متوسط
○ پیشرفته
```

استفاده شود.

---

# 34. Radio vs Checkbox

قاعده:

```text
One choice
→ Radio

Multiple choices
→ Checkbox
```

---

# 35. Switch

برای فعال/غیرفعال:

```text
اعلان‌های ایمیلی

[ ●──── ]
```

مثلاً:

```text
فعال‌سازی اعلان‌ها
```

Switch برای انتخاب چند گزینه مناسب نیست.

---

# 36. Date Picker

Date Picker باید Touch Friendly باشد.

مثلاً:

```text
تاریخ شروع

[ ۱۴۰۵/۰۵/۲۰ 📅 ]
```

---

# 37. Time Picker

برای زمان:

```text
ساعت شروع

[ 18:30 🕐 ]
```

استفاده شود.

---

# 38. Date + Time

اگر هر دو مورد نیاز باشد:

```text
تاریخ
[ ۱۴۰۵/۰۵/۲۰ ]

ساعت
[ 18:30 ]
```

بهتر از یک Control پیچیده است.

---

# 39. File Upload

برای Upload:

```text
فایل پیوست

┌───────────────────────┐
│      ↑                │
│ فایل را انتخاب کنید  │
│ JPG / PNG / PDF       │
└───────────────────────┘
```

---

# 40. Upload States

```text
Idle
Selecting
Uploading
Processing
Success
Error
```

---

# 41. Upload Progress

برای فایل بزرگ:

```text
Uploading...

████████████░░░ 80%
```

---

# 42. Upload Error

```text
آپلود فایل انجام نشد.

[ تلاش دوباره ]
```

---

# 43. Image Upload

برای Avatar:

```text
      ┌─────┐
      │     │
      │ 👤  │
      │     │
      └─────┘

[ تغییر تصویر ]
```

---

# 44. Form Sections

Formهای بزرگ باید به Section تقسیم شوند:

```text
اطلاعات پایه

...

اطلاعات دوره

...

تنظیمات انتشار

...
```

---

# 45. Accordion Sections

در Mobile برای Formهای طولانی:

```text
اطلاعات پایه       ˅
تنظیمات دوره       ˅
SEO                ˅
```

می‌تواند استفاده شود.

اما اطلاعات ضروری نباید پنهان شوند.

---

# 46. Multi-Step Form

برای Formهای پیچیده:

```text
مرحله ۱
اطلاعات پایه

↓
مرحله ۲
تنظیمات

↓
مرحله ۳
مرور

↓
ذخیره
```

---

# 47. Step Progress

```text
●────●────○
۱    ۲    ۳
```

کاربر باید بداند:

```text
Current Step
Total Steps
```

---

# 48. Step Navigation

دکمه‌ها:

```text
[ قبلی ]       [ بعدی ]
```

در آخر:

```text
[ ذخیره ]
```

---

# 49. Form Draft

برای Formهای طولانی می‌توان Draft داشت:

```text
ذخیره خودکار شد ✓
```

Draft باید توسط Application Layer مدیریت شود.

---

# 50. Auto Save

Auto Save نباید باعث:

```text
Page Reload
Input Reset
Focus Loss
```

شود.

---

# 51. Unsaved Changes

اگر کاربر قصد خروج داشته باشد:

```text
تغییرات ذخیره نشده‌اند.

آیا می‌خواهید خارج شوید؟

[ ادامه ویرایش ]
[ خروج ]
```

---

# 52. Form Submit

CTA اصلی باید واضح باشد:

```text
[ ذخیره تغییرات ]
```

یا:

```text
[ ایجاد دوره ]
```

متن CTA باید Action واقعی را بیان کند.

---

# 53. Submit Loading

هنگام Submit:

```text
[ در حال ذخیره... ]
```

دکمه Disabled شود.

---

# 54. Double Submit

پس از Submit:

```text
Submit
↓
Loading
↓
Disabled
↓
Response
```

از ارسال چندباره جلوگیری شود.

---

# 55. Success Feedback

پس از موفقیت:

```text
✓ تغییرات با موفقیت ذخیره شد.
```

می‌تواند با Toast یا Inline Feedback نمایش داده شود.

---

# 56. Server Validation

Validation باید دو سطح داشته باشد:

```text
Client Validation
        +
Server Validation
```

Client Validation برای UX است.

Server Validation منبع نهایی اعتبارسنجی است.

---

# 57. Validation Rules

مثلاً:

```text
Required
Email
Min Length
Max Length
Number Range
File Type
File Size
Permission
Business Rule
```

---

# 58. Server Error

اگر Server Validation خطا داد:

```text
این دوره قابل انتشار نیست.
لطفاً حداقل یک درس اضافه کنید.
```

Error باید به Form و Field مرتبط شود.

---

# 59. General Form Error

برای خطای کلی:

```text
⚠ ذخیره اطلاعات انجام نشد.

لطفاً دوباره تلاش کنید.
```

در ابتدای Form نمایش داده شود.

---

# 60. Error Summary

در Formهای طولانی می‌توان Summary داشت:

```text
لطفاً موارد زیر را اصلاح کنید:

• عنوان دوره وارد نشده است.
• قیمت معتبر نیست.
• تصویر دوره انتخاب نشده است.
```

Tap روی هر مورد باید کاربر را به Field مربوطه ببرد.

---

# 61. Scroll To Error

پس از Submit ناموفق:

```text
Submit
↓
Validation
↓
First Error
↓
Scroll
↓
Focus
```

---

# 62. Keyboard Navigation

در Mobile:

```text
Field
↓
Keyboard
↓
Next
↓
Next Field
```

ترتیب Focus باید منطقی باشد.

---

# 63. Input Formatting

Formatting باید هنگام تایپ باعث خراب شدن Input نشود.

مثلاً:

```text
Price
Phone
National ID
```

---

# 64. Persian Digits

در UI فارسی می‌توان نمایش اعداد را مطابق Design System انجام داد، اما مقدار واقعی باید به شکل استاندارد برای Backend ارسال شود.

مثلاً:

```text
۱۲۳۴۵
```

در UI

و مقدار استاندارد:

```text
12345
```

در Data Layer.

---

# 65. Currency

مبالغ:

```text
۱,۲۹۰,۰۰۰ تومان
```

نمایش داده شوند.

اما Currency Formatting نباید در Component Form انجام شود؛ مقدار Form باید از Commerce/Domain بیاید.

---

# 66. Form Data Boundary

Form Component فقط باید:

```text
Input
State
Validation Feedback
Submit Event
```

را مدیریت کند.

---

# 67. No Direct WordPress Database

این اشتباه است:

```text
Form
 ↓
$wpdb
 ↓
Database
```

معماری صحیح:

```text
Form
 ↓
Application Service
 ↓
Domain
 ↓
Repository
 ↓
WordPress Data Layer
```

---

# 68. WordPress Integration

Formها می‌توانند از طریق:

```text
Admin UI
Shortcode
Block
REST-powered UI
Frontend App
Dashboard
```

ارائه شوند.

اما منطق Form نباید به یکی از این Presentation Layerها محدود شود.

---

# 69. REST Integration

در UIهای REST-based:

```text
Form
 ↓
API Request
 ↓
Application Layer
 ↓
Domain
```

Response باید State مناسب UI را برگرداند.

---

# 70. Nonce / Authorization

برای عملیات حساس، امنیت باید توسط Backend کنترل شود.

Form نباید تصور کند:

```text
User Logged In
=
Permission Granted
```

Permission باید Server-side بررسی شود.

---

# 71. Permission Errors

مثلاً:

```text
شما اجازه ویرایش این دوره را ندارید.
```

و Form باید وارد حالت مناسب شود.

---

# 72. Form Security

اطلاعات حساس مانند:

```text
Password
Payment Data
Private Tokens
API Keys
```

نباید در Local Storage یا Stateهای غیرضروری نگهداری شوند.

---

# 73. Form Accessibility

حداقل:

```text
☐ Label
☐ Input Association
☐ Error Association
☐ Keyboard Navigation
☐ Visible Focus
☐ Screen Reader
☐ Touch Target
☐ Contrast
```

---

# 74. RTL

تمام Formهای فارسی:

```text
direction: rtl
```

را رعایت کنند.

مواردی مانند:

```text
Email
URL
Code
API Key
```

می‌توانند LTR باشند.

---

# 75. Dark Mode

Form باید Dark Mode را پشتیبانی کند:

```text
Input
Textarea
Select
Checkbox
Radio
Switch
Date Picker
Upload
Errors
Success
```

---

# 76. Mobile Spacing

Spacing باید مطابق Design System پروژه باشد.

اصل:

```text
Label
↓
Small Gap
↓
Control
↓
Help / Error
↓
Field Gap
```

از فاصله‌های نامنظم جلوگیری شود.

---

# 77. Touch Target

تمام Controls تعاملی باید Touch Target مناسب داشته باشند.

حداقل هدف:

```text
44 × 44 px
```

---

# 78. Form Actions

در موبایل:

```text
Primary Action
Secondary Action
```

از هم قابل تشخیص باشند.

مثلاً:

```text
[ ذخیره تغییرات ]
[ انصراف ]
```

---

# 79. Sticky Actions

برای Formهای طولانی می‌توان از Sticky Footer استفاده کرد:

```text
┌────────────────────────────┐
│ [ انصراف ] [ ذخیره ]       │
└────────────────────────────┘
```

اما فقط زمانی که واقعاً ارزش UX داشته باشد.

---

# 80. Destructive Action

برای عملیات خطرناک:

```text
حذف دوره
حذف حساب
حذف فایل
```

Confirmation لازم است.

---

# 81. Form Reset

Reset نباید به صورت ناخواسته فعال باشد.

در صورت وجود:

```text
[ پاک کردن فرم ]
```

باید Confirmation مناسب داشته باشد.

---

# 82. Loading Field

برای Fieldهایی که مقدارشان از Server می‌آید:

```text
در حال بارگذاری...
```

یا Skeleton استفاده شود.

---

# 83. Async Select

مثلاً انتخاب Instructor:

```text
مدرس

[ جستجوی مدرس... ]
```

نتایج:

```text
احمد
محمد
رضا
```

---

# 84. Searchable Select

برای داده‌های زیاد:

```text
Select
↓
Search
↓
Results
↓
Selection
```

استفاده شود.

---

# 85. Dependent Fields

مثلاً:

```text
دسته‌بندی
↓
زیر‌دسته
```

پس از انتخاب Category:

```text
Loading Subcategories
↓
Subcategory Enabled
```

---

# 86. Form State

State کلی:

```text
Idle
Editing
Validating
Submitting
Success
Error
```

---

# 87. Field State Model

```text
Field
├── value
├── touched
├── dirty
├── valid
├── error
├── disabled
└── loading
```

---

# 88. Dirty State

اگر مقدار تغییر کرده باشد:

```text
dirty = true
```

و خروج از صفحه می‌تواند Warning ایجاد کند.

---

# 89. Form Context

Form باید Context مربوط به Module را حفظ کند.

مثلاً:

```text
Course Form
Lesson Form
Quiz Form
Assignment Form
Checkout Form
```

همگی می‌توانند از Shared Form System استفاده کنند.

---

# 90. Reusable Components

ساختار:

```text
Form
├── FormField
├── FormLabel
├── FormControl
├── FormHelp
├── FormError
├── FormSection
├── FormActions
└── FormSummary
```

---

# 91. Component Independence

هر Component باید تا حد امکان مستقل باشد:

```text
FormInput
≠
CourseInput
```

مثلاً Course Form از Input عمومی استفاده کند:

```text
CourseForm
   ↓
FormField
   ↓
TextInput
```

---

# 92. Theme Independence

Formها نباید به:

```text
.theme-form
.theme-input
```

وابسته باشند.

Namespace پیشنهادی:

```text
.iran-lms-form
.iran-lms-form-field
.iran-lms-form-control
.iran-lms-form-error
.iran-lms-form-actions
```

---

# 93. Performance

Form System باید:

```text
Lightweight
Reusable
Low JS Overhead
Minimal Re-render
```

باشد.

---

# 94. Long Forms

برای Formهای طولانی:

```text
Sectioning
Progress
Sticky Actions
Autosave
Error Summary
```

در نظر گرفته شود.

---

# 95. Form in Dashboard

در Dashboard مدرس:

```text
Course
Lesson
Quiz
Assignment
```

Formها باید از همان Shared Form System استفاده کنند.

---

# 96. Form in Student Area

در Student Area:

```text
Profile
Assignment
Quiz
Notes
Settings
```

نیز همین استاندارد استفاده شود.

---

# 97. Form in Commerce

Checkout و Coupon باید از Form System استفاده کنند:

```text
Commerce
   ↓
Shared Form
```

اما Validation و Business Logic Commerce باید در Commerce Module باقی بماند.

---

# 98. Form in Authentication

Login/Register:

```text
Authentication
   ↓
Shared Form
```

اما Authentication Policy خارج از UI قرار دارد.

---

# 99. Form Events

Form می‌تواند Eventهای مفهومی داشته باشد:

```text
onChange
onBlur
onFocus
onSubmit
onReset
onValidation
```

اما Event Handler نباید مستقیماً Business Logic سنگین اجرا کند.

---

# 100. Definition of Done

```text
☐ Form Container
☐ Form Header
☐ Label
☐ Required State
☐ Optional State
☐ Help Text
☐ Error Text
☐ Success State
☐ Text Input
☐ Textarea
☐ Number Input
☐ Email Input
☐ URL Input
☐ Password
☐ Search
☐ Select
☐ Searchable Select
☐ Checkbox
☐ Checkbox Group
☐ Radio
☐ Radio Group
☐ Switch
☐ Date Picker
☐ Time Picker
☐ File Upload
☐ Image Upload
☐ Multi-Step Form
☐ Draft
☐ Auto Save
☐ Validation
☐ Server Validation
☐ Error Summary
☐ Scroll To Error
☐ Submit Loading
☐ Double Submit Protection
☐ Unsaved Changes
☐ RTL
☐ Dark Mode
☐ Accessibility
☐ Keyboard Handling
☐ Touch Targets
☐ Theme Independence
☐ WordPress Plugin Boundary
☐ REST Compatibility
☐ Permission Handling
☐ Domain Logic خارج از UI
```

---

# 101. Final Principle

معماری نهایی Form System:

```text
Feature Module
      ↓
Shared Form
      ↓
Form Components
      ↓
User Input
      ↓
Validation
      ↓
Application Service
      ↓
Domain
      ↓
WordPress Data Layer
```

و اصل نهایی:

> **Form در Iran LMS فقط یک مجموعه Input نیست؛ یک لایه تعامل مشترک برای تمام ماژول‌های افزونه است. Form باید از Theme مستقل باشد، Validation نهایی و Business Logic را به لایه‌های داخلی افزونه بسپارد و در تمام محیط‌های موبایل، RTL، Dashboard، Student Area، Assessment و Commerce رفتار یکپارچه‌ای داشته باشد.**
