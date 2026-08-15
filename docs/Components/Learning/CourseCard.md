# CourseCard

**Component:** Learning
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Reusable Learning Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`CourseCard` کامپوننت استاندارد نمایش خلاصه اطلاعات یک دوره در افزونه Iran LMS است.

این کامپوننت باید در بخش‌های مختلف افزونه قابل استفاده باشد، از جمله:

* Course Listing
* Course Search
* Course Category
* Student Dashboard
* My Courses
* Continue Learning
* Instructor Course List
* Related Courses
* Course Recommendations
* Course Archive
* Course Widgets

`CourseCard` فقط مسئول **نمایش دوره** است و نباید منطق مدیریت دوره، ثبت‌نام، پرداخت یا دسترسی را داخل خودش پیاده‌سازی کند.

---

# 2. Core Principle

معماری:

```text
Course Data
     ↓
CourseCard
     ↓
Visual Presentation
```

نه:

```text
CourseCard
     ↓
Database
     ↓
Enrollment
     ↓
Payment
     ↓
Course Logic
```

کامپوننت باید Presentation Layer باقی بماند.

---

# 3. WordPress Plugin Boundary

`CourseCard` بخشی از افزونه Iran LMS است.

بنابراین:

```text
Iran LMS Plugin
    ↓
Learning UI
    ↓
CourseCard
```

و نه:

```text
WordPress Theme
    ↓
CourseCard
```

Theme می‌تواند در آینده ظاهر آن را Override یا Extend کند، اما مالک اصلی Component، افزونه Iran LMS است.

---

# 4. Theme Independence

CourseCard نباید به موارد زیر وابسته باشد:

* قالب خاص
* Elementor
* Gutenberg Theme Styles
* Bootstrap
* Tailwind
* WooCommerce
* CSS Framework خاص

کامپوننت باید با Themeهای مختلف WordPress کار کند.

---

# 5. Primary Structure

ساختار پایه:

```text
┌─────────────────────────────────────┐
│             Course Image            │
│                                     │
│                Badge                │
├─────────────────────────────────────┤
│ Category                            │
│ عنوان دوره                          │
│ توضیح کوتاه                         │
│                                     │
│ 👤 مدرس                             │
│ ⭐ امتیاز                           │
│                                     │
│ 12 درس     4 ساعت     سطح متوسط     │
├─────────────────────────────────────┤
│ قیمت / وضعیت                        │
│              [مشاهده دوره]          │
└─────────────────────────────────────┘
```

---

# 6. Required Information

حداقل داده‌های مورد نیاز:

```text
id
title
permalink
thumbnail
```

سایر اطلاعات اختیاری هستند.

---

# 7. Recommended Data Model

نمونه:

```js
{
    id,
    title,
    permalink,
    thumbnail,
    excerpt,
    category,
    instructor,
    rating,
    lessonsCount,
    duration,
    level,
    price,
    salePrice,
    status,
    progress,
    badge
}
```

این object فقط یک نمونه UI Contract است.

ساختار واقعی داده باید با API و Domain Model افزونه هماهنگ باشد.

---

# 8. Course ID

CourseCard باید شناسه دوره را دریافت کند.

مثلاً:

```text
courseId
```

این ID می‌تواند برای:

* Navigation
* Analytics
* Actions
* Tracking

استفاده شود.

اما CourseCard نباید خودش Course Entity را از Database دریافت کند.

---

# 9. Course Title

عنوان دوره مهم‌ترین اطلاعات متنی Card است.

مثال:

```text
آموزش جامع PHP و توسعه افزونه وردپرس
```

عنوان باید:

* خوانا باشد
* محدودیت طول داشته باشد
* در چند خط مدیریت شود
* باعث شکستن Layout نشود

---

# 10. Title Overflow

اگر عنوان طولانی باشد:

```text
آموزش جامع طراحی و توسعه افزونه‌های
وردپرس از صفر تا پیشرفته...
```

نباید ارتفاع Card به شکل غیرقابل پیش‌بینی افزایش پیدا کند.

حداکثر خطوط باید بر اساس Variant تعیین شود.

---

# 11. Course Thumbnail

تصویر دوره بخش اصلی Card است.

نمونه:

```text
┌──────────────────────┐
│                      │
│    COURSE IMAGE      │
│                      │
└──────────────────────┘
```

Image باید از Component `Image` سیستم استفاده کند.

---

# 12. Thumbnail Ratio

نسبت تصویر باید ثابت باشد.

نسبت پیشنهادی:

```text
16 : 9
```

برای Variantهای خاص می‌توان نسبت دیگری تعریف کرد.

اما هر Card در یک Collection باید نسبت یکسان داشته باشد.

---

# 13. Image Loading

برای تصویر دوره:

```text
Loading
    ↓
Placeholder
    ↓
Image
```

در صورت خطا:

```text
Image Error
    ↓
Fallback
```

---

# 14. Image Alt

Alt Text نباید خالی باشد مگر اینکه تصویر صرفاً تزئینی باشد.

در حالت معمول:

```text
alt = course.title
```

یا metadata مناسب دوره.

---

# 15. Course Badge

CourseCard می‌تواند Badge داشته باشد.

مثلاً:

```text
پرفروش
جدید
ویژه
رایگان
محبوب
تکمیل شده
```

Badge باید از Component `Badge` پروژه استفاده کند.

---

# 16. Badge Ownership

CourseCard فقط Badge را نمایش می‌دهد.

تشخیص اینکه دوره:

```text
New
Popular
Featured
Bestseller
```

است باید از Data/Business Layer بیاید.

---

# 17. Category

Category می‌تواند زیر تصویر یا بالای عنوان نمایش داده شود.

مثال:

```text
برنامه‌نویسی
```

Category قابل کلیک بودن باید توسط Parent/Navigation مشخص شود.

---

# 18. Description

CourseCard می‌تواند توضیح کوتاه داشته باشد.

مثال:

```text
در این دوره با ساخت افزونه‌های حرفه‌ای
وردپرس از پایه تا سطح پیشرفته آشنا می‌شوید.
```

Description باید کوتاه و محدود باشد.

---

# 19. Instructor

اطلاعات مدرس می‌تواند شامل:

```text
Avatar
Name
Role
```

باشد.

مثال:

```text
[Avatar] احمد پوررستمی
```

---

# 20. Instructor Avatar

Avatar باید از Component `Avatar` سیستم استفاده کند.

نباید منطق Avatar داخل CourseCard دوباره پیاده‌سازی شود.

---

# 21. Instructor Link

در صورت فعال بودن Instructor Profile:

```text
مدرس
   ↓
Instructor Profile
```

CourseCard می‌تواند لینک پروفایل مدرس را ارائه کند.

اما Routing نباید داخل Component Hard-code شود.

---

# 22. Rating

Rating در صورت وجود داده می‌تواند نمایش داده شود.

مثلاً:

```text
★ 4.8
```

و در صورت نیاز:

```text
(124 نظر)
```

---

# 23. Rating Data

CourseCard نباید Rating را محاسبه کند.

مثلاً:

```text
rating = 4.8
reviewsCount = 124
```

باید از Data Layer دریافت شود.

---

# 24. Course Meta

اطلاعات متا می‌تواند شامل:

```text
تعداد درس
مدت دوره
سطح
تعداد دانشجو
```

باشد.

مثال:

```text
18 درس   •   6 ساعت   •   متوسط
```

---

# 25. Lessons Count

نمونه:

```text
24 درس
```

اگر Course دارای بخش‌های مختلف باشد، عدد باید از اطلاعات واقعی Course Aggregate بیاید.

---

# 26. Duration

نمونه:

```text
8 ساعت و 20 دقیقه
```

Duration باید توسط Domain/API آماده شود.

Card نباید زمان را از فایل‌های ویدئویی محاسبه کند.

---

# 27. Level

سطح می‌تواند:

```text
مقدماتی
متوسط
پیشرفته
همه سطوح
```

باشد.

مقادیر باید از سیستم Course تعریف شوند.

---

# 28. Pricing

CourseCard باید بتواند وضعیت قیمت را نمایش دهد.

مثال رایگان:

```text
رایگان
```

مثال پولی:

```text
۸۹۰,۰۰۰ تومان
```

مثال تخفیف:

```text
۱,۲۰۰,۰۰۰ تومان
۸۹۰,۰۰۰ تومان
```

---

# 29. Price Logic

CourseCard نباید تخفیف را محاسبه کند.

مثلاً:

```text
finalPrice
originalPrice
discount
```

باید از Commerce/Domain دریافت شوند.

---

# 30. WooCommerce Boundary

اگر Iran LMS در آینده با WooCommerce یکپارچه باشد:

```text
WooCommerce
    ↓
Commerce Integration
    ↓
Course Data
    ↓
CourseCard
```

CourseCard نباید مستقیماً API داخلی WooCommerce را فراخوانی کند.

---

# 31. Enrollment Status

CourseCard می‌تواند وضعیت کاربر را نمایش دهد.

مثلاً:

```text
شروع دوره
ادامه یادگیری
مشاهده دوره
ثبت‌نام شده
تکمیل شده
```

اما تصمیم Enrollment خارج از Card است.

---

# 32. Enrollment Boundary

صحیح:

```text
Enrollment Module
      ↓
enrollmentStatus
      ↓
CourseCard
```

غلط:

```text
CourseCard
      ↓
Check User
      ↓
Database
```

---

# 33. Progress

برای دوره‌هایی که کاربر در آن‌ها ثبت‌نام کرده، Progress قابل نمایش است.

مثال:

```text
پیشرفت دوره
████████░░ 80%
```

---

# 34. Progress Data

Card نباید Progress را محاسبه کند.

مثلاً:

```text
progress = 80
```

از Learning Module دریافت شود.

---

# 35. Continue Learning

در Dashboard می‌توان Action متفاوتی داشت:

```text
ادامه یادگیری
```

این Action باید کاربر را به موقعیت یادگیری مناسب هدایت کند.

CourseCard فقط Action را نمایش می‌دهد.

---

# 36. Completed Course

برای دوره تکمیل‌شده:

```text
✓ تکمیل شده
```

یا:

```text
مشاهده دوره
```

می‌تواند نمایش داده شود.

---

# 37. Certificate Status

اگر Certificate Module فعال باشد، CourseCard می‌تواند وضعیت مربوطه را نمایش دهد.

مثلاً:

```text
گواهینامه آماده است
```

اما Certificate Logic خارج از Card است.

راهنمای UI پروژه نیز Certificate را به‌عنوان یک قابلیت Modular در نظر گرفته است.

---

# 38. Modular Architecture

یکی از اصول مهم Iran LMS این است که Moduleهای غیرفعال نباید Layout را خراب کنند.

بنابراین CourseCard باید بتواند بدون موارد زیر هم درست کار کند:

```text
Certificate
Commerce
Gamification
Attendance
Survey
Forum
```

---

# 39. Optional Features

اطلاعات زیر باید Optional باشند:

```text
Rating
Price
Instructor
Category
Progress
Badge
Certificate
Students Count
```

Card نباید برای نمایش صحیح به همه آن‌ها وابسته باشد.

---

# 40. Minimal CourseCard

حداقل Variant:

```text
┌──────────────────────┐
│      Image           │
├──────────────────────┤
│ عنوان دوره           │
│                      │
│ [مشاهده دوره]        │
└──────────────────────┘
```

این Variant برای:

* Related Courses
* Sidebar
* Compact Lists

مناسب است.

---

# 41. Standard CourseCard

Variant استاندارد:

```text
Image
Badge
Category
Title
Instructor
Rating
Meta
Price
CTA
```

---

# 42. Student CourseCard

برای Dashboard:

```text
Image
Title
Progress
Last Lesson
Continue Button
```

مثال:

```text
آموزش PHP
████████░░ 80%

آخرین درس:
ساخت REST API

[ادامه یادگیری]
```

---

# 43. Search Result CourseCard

برای Search:

```text
Image
Title
Category
Instructor
Rating
Price
```

اطلاعات اضافی نباید Search Result را بیش از حد شلوغ کند.

---

# 44. Instructor CourseCard

در Instructor Dashboard:

```text
Image
Title
Status
Students
Revenue
Actions
```

در این حالت CourseCard ممکن است Variant مدیریتی داشته باشد.

---

# 45. CourseCard vs Admin Course Row

نباید CourseCard را مجبور کنیم همه نیازهای Admin را پوشش دهد.

برای Admin ممکن است Component جداگانه مناسب‌تر باشد:

```text
CourseTable
```

CourseCard برای تجربه Learning/User مناسب است.

---

# 46. Related Course

در Related Courses:

```text
CourseCard
CourseCard
CourseCard
```

باید ارتفاع و ساختار هماهنگ داشته باشند.

---

# 47. Grid

نمونه:

```text
┌──────────┐ ┌──────────┐ ┌──────────┐
│ Course   │ │ Course   │ │ Course   │
│ Card     │ │ Card     │ │ Card     │
└──────────┘ └──────────┘ └──────────┘
```

Grid مسئول Layout است.

CourseCard نباید خودش Grid را کنترل کند.

---

# 48. Responsive Grid

در Desktop:

```text
4 Cards
```

در Tablet:

```text
2 Cards
```

در Mobile:

```text
1 Card
```

این تصمیم باید توسط Parent/Grid Component انجام شود.

---

# 49. CourseCard Width

CourseCard نباید Width ثابت سراسری داشته باشد.

بهتر:

```text
width: 100%
```

و Parent تعیین کند Card چه مقدار فضا داشته باشد.

---

# 50. CourseCard Height

در Gridهای هم‌ردیف، ارتفاع Cards بهتر است هماهنگ باشد.

اما نباید با Height ثابت و شکننده این کار انجام شود.

استفاده از:

```text
flex
line clamp
consistent sections
```

مناسب‌تر است.

---

# 51. CTA

CTA اصلی می‌تواند:

```text
مشاهده دوره
```

باشد.

برای کاربر ثبت‌نام‌شده:

```text
ادامه یادگیری
```

و برای دوره خریداری‌نشده:

```text
ثبت‌نام در دوره
```

---

# 52. CTA Boundary

CourseCard نباید تصمیم بگیرد کدام CTA صحیح است.

Parent/Data Layer می‌تواند:

```text
cta.type
cta.label
cta.href
```

را مشخص کند.

---

# 53. Clickable Card

کل Card می‌تواند clickable باشد، اما بهتر است CTA و لینک‌های داخلی semantics مناسبی داشته باشند.

نباید چندین لینک تو در تو ایجاد شود.

---

# 54. Accessibility

CourseCard باید:

* Keyboard Accessible
* Focus Visible
* Screen Reader Friendly
* دارای Heading مناسب
* دارای Alt Text
* دارای Button Label واضح

باشد.

---

# 55. Semantic Structure

ساختار پیشنهادی:

```html
<article>
    <a>
        <img />
    </a>

    <h3>
        <a>عنوان دوره</a>
    </h3>

    ...
</article>
```

ساختار نهایی باید از Nested Interactive Elements جلوگیری کند.

---

# 56. Keyboard

کاربر باید بتواند با:

```text
Tab
Enter
Space
```

به عناصر تعاملی دسترسی داشته باشد.

---

# 57. Focus

Focus State باید واضح باشد.

مثلاً:

```text
┌──────────────────────┐
│ Course Card          │
│                      │
└──────────────────────┘
      ↑
 Visible Focus Ring
```

---

# 58. RTL

CourseCard برای فارسی باید RTL باشد.

مثلاً:

```text
عنوان دوره
مدرس
قیمت
```

همه باید مطابق RTL نمایش داده شوند.

---

# 59. Mixed Content

ممکن است عنوان دوره فارسی و انگلیسی باشد:

```text
آموزش WordPress Plugin Development
```

نباید Direction متن باعث خراب شدن Layout شود.

---

# 60. Typography

بر اساس Design Guide پروژه، Typography باید از فونت‌های تعیین‌شده مانند:

```text
Vazirmatn
Estedad
```

استفاده کند.

CourseCard نباید Font Family مستقل تعریف کند.

---

# 61. Color System

CourseCard باید از Semantic Color Tokens استفاده کند.

مثلاً:

```text
text-primary
text-secondary
surface
border
accent
success
warning
danger
```

---

# 62. Radius

طبق Design Guide، طراحی Iran LMS از:

```text
16px Radius
```

به‌عنوان مبنای بصری استفاده می‌کند.

مقادیر نهایی باید از Design Tokens پروژه خوانده شوند و مستقیماً Hard-code نشوند.

---

# 63. Shadow

Card باید از Shadow نرم استفاده کند.

```text
Soft Shadow
```

و از Shadowهای سنگین یا قدیمی جلوگیری شود.

راهنمای طراحی پروژه نیز Soft Shadows را به‌عنوان اصل بصری مشخص کرده است.

---

# 64. Hover

در Desktop:

```text
Hover
 ↓
Subtle Elevation
 ↓
Soft Transition
```

حرکت نباید شدید باشد.

---

# 65. Motion

Motion باید:

```text
Fast
Subtle
Predictable
Accessible
```

باشد.

در صورت فعال بودن Reduced Motion، انیمیشن‌های غیرضروری باید کاهش پیدا کنند.

---

# 66. Dark Mode

CourseCard باید Dark Mode را پشتیبانی کند.

```text
Light
    ↓
CourseCard
    ↓
Dark
```

تصویر دوره نباید به‌صورت خودکار تغییر رنگ داده شود.

---

# 67. Loading State

هنگام دریافت Courses:

```text
┌───────────────┐
│ ░░░░░░░░░░░░ │
│ ░░░░░░░░░░░░ │
│ ░░░░░░░░     │
│ ░░░░░░░░     │
└───────────────┘
```

از Skeleton Component استفاده شود.

---

# 68. Error State

اگر اطلاعات Course دریافت نشود، Parent باید Error State را مدیریت کند.

CourseCard نباید به‌صورت مستقل API Call کند.

---

# 69. Missing Image

اگر تصویر موجود نباشد:

```text
┌──────────────────────┐
│                      │
│      Course          │
│       Image          │
│                      │
└──────────────────────┘
```

یک Placeholder استاندارد نمایش داده شود.

---

# 70. Missing Instructor

اگر مدرس وجود نداشته باشد، بخش Instructor باید حذف شود.

نباید جای خالی بزرگ ایجاد شود.

---

# 71. Missing Rating

اگر Rating فعال نباشد:

```text
Rating
```

نباید Layout را خراب کند.

---

# 72. Missing Pricing

برای دوره رایگان:

```text
رایگان
```

و اگر Commerce Module غیرفعال است، بخش Pricing باید به‌صورت کامل حذف شود.

---

# 73. Module-Aware Rendering

CourseCard باید قابلیت دریافت Feature State داشته باشد.

مثلاً:

```text
{
    commerce: true,
    ratings: true,
    certificate: false,
    gamification: true
}
```

اما بهتر است این وضعیت توسط Parent یا Configuration Layer آماده شود.

---

# 74. CourseCard Does Not Check Modules

بد:

```text
if (woocommerce_active) ...
if (certificate_active) ...
```

در داخل Presentation Component.

بهتر:

```text
CourseCard
    ↓
Received Data
    ↓
Render
```

---

# 75. CourseCard and Course Detail

CourseCard باید به صفحه Course Detail لینک شود.

```text
CourseCard
    ↓
Course URL
    ↓
Course Detail
```

CourseCard نباید صفحه Course Detail را خودش Render کند.

---

# 76. Course URL

URL باید از Backend/Router دریافت شود.

نباید:

```text
/course/
```

به‌صورت Hard-coded در Component قرار گیرد.

---

# 77. WordPress Permalink

به دلیل WordPress بودن پروژه، URL دوره ممکن است توسط:

* Rewrite Rules
* Custom Post Type
* Plugin Router
* Site Configuration

تعیین شود.

بنابراین CourseCard باید URL نهایی را مصرف کند.

---

# 78. Custom Post Type Boundary

اگر Course به‌صورت CPT پیاده‌سازی شود، CourseCard نباید مستقیماً به `WP_Query` وابسته باشد.

صحیح:

```text
WP_Query / Repository
        ↓
Course Data
        ↓
CourseCard
```

---

# 79. REST API Boundary

در آینده ممکن است CourseCard از REST API تغذیه شود.

```text
REST API
   ↓
Course DTO
   ↓
CourseCard
```

این موضوع برای اپلیکیشن موبایل آینده نیز معماری تمیزتری ایجاد می‌کند.

---

# 80. Mobile App Compatibility

چون CourseCard بخشی از UI Web Plugin است، نباید فرض شود همین UI مستقیماً در Mobile App استفاده خواهد شد.

اما Data Contract باید تا حد امکان از Presentation مستقل باشد.

```text
Course Domain
   ├── Web UI
   │     └── CourseCard
   │
   └── Mobile App
         └── Mobile Course Card
```

---

# 81. Analytics

CourseCard می‌تواند Eventهایی مثل:

```text
course_card_viewed
course_card_clicked
course_card_cta_clicked
```

را expose کند.

اما Analytics Storage متعلق به Analytics Module است.

---

# 82. Tracking Boundary

غلط:

```text
CourseCard
 ↓
Database
 ↓
Save Analytics
```

صحیح:

```text
CourseCard
 ↓
Event
 ↓
Analytics Layer
```

---

# 83. Props / API

API پیشنهادی:

```text
<CourseCard
    course={course}
    variant="standard"
    showInstructor
    showRating
    showPrice
    showProgress
    showBadge
    cta={cta}
/>
```

---

# 84. Variant

Variantهای اولیه:

```text
compact
standard
student
search
related
```

---

# 85. Compact Variant

برای:

* Sidebar
* Related Courses
* Small Widgets

ساختار:

```text
Thumbnail
Title
Price / Status
```

---

# 86. Standard Variant

برای Course Listing:

```text
Thumbnail
Badge
Category
Title
Instructor
Rating
Meta
Price
CTA
```

---

# 87. Student Variant

برای Dashboard:

```text
Thumbnail
Title
Progress
Last Lesson
Continue
```

---

# 88. Search Variant

برای Search Results:

```text
Thumbnail
Title
Category
Instructor
Rating
Price
```

---

# 89. Related Variant

برای Course Detail:

```text
Thumbnail
Title
Rating
Price
```

باید اطلاعات کمتری نسبت به Standard داشته باشد.

---

# 90. States

CourseCard می‌تواند stateهای زیر داشته باشد:

```text
default
hover
focus
loading
disabled
enrolled
completed
locked
```

---

# 91. Locked Course

برای دوره‌ای که کاربر اجازه مشاهده آن را ندارد:

```text
🔒
دسترسی محدود
```

اما تشخیص Locked بودن باید از Access Layer بیاید.

---

# 92. Disabled

Disabled باید فقط در شرایط خاص استفاده شود.

برای مثال:

```text
Course Unavailable
```

نباید با `display:none` اشتباه گرفته شود.

---

# 93. Completed

برای Course تکمیل‌شده:

```text
✓ تکمیل شده
```

می‌تواند Badge یا Status باشد.

---

# 94. Price and Enrollment Combination

ممکن است:

```text
Price + Not Enrolled
```

یا:

```text
Price + Enrolled
```

وجود داشته باشد.

در حالت Enrolled، CTA باید بر اساس Enrollment State تعیین شود.

---

# 95. Course Card Actions

حداقل Action:

```text
View Course
```

Actionهای اختیاری:

```text
Continue
Enroll
Wishlist
Share
More
```

---

# 96. Wishlist

Wishlist جزء پایه CourseCard نیست.

اگر در آینده فعال شود:

```text
Wishlist Module
    ↓
CourseCard
```

و نه اینکه CourseCard منطق Wishlist را خودش داشته باشد.

---

# 97. More Menu

برای Actionهای متعدد:

```text
[ ⋮ ]
```

می‌تواند Menu را باز کند.

Menu Component مسئول Overlay و Action Menu است.

---

# 98. CourseCard in Dashboard

Dashboard دانشجو می‌تواند CourseCard را برای:

```text
My Courses
Continue Learning
Recommended Courses
```

استفاده کند.

این بخش با ساختار Student/Learner مورد نظر پروژه هماهنگ است.

---

# 99. Continue Learning

در Continue Learning، اطلاعات مهم‌تر:

```text
Course Title
Progress
Last Lesson
Estimated Remaining
Continue
```

است.

اطلاعات تزئینی باید کاهش پیدا کند.

---

# 100. Empty State

اگر کاربر دوره‌ای ندارد:

```text
هنوز در دوره‌ای ثبت‌نام نکرده‌اید.

[مشاهده دوره‌ها]
```

EmptyState مسئول این وضعیت است.

CourseCard نباید Empty State را Render کند.

---

# 101. Performance

CourseCard باید سبک باشد.

از موارد زیر جلوگیری شود:

* API Request داخل هر Card
* Query جداگانه برای Instructor
* Query جداگانه برای Rating
* Query جداگانه برای Progress
* تصویر بدون Lazy Loading
* محاسبات سنگین در Render

---

# 102. N+1 Problem

اگر 20 Course نمایش داده می‌شود، نباید 20 درخواست جدا برای Instructor ایجاد شود.

بهتر:

```text
Course API
   ↓
Prepared Course DTO
   ↓
20 CourseCards
```

---

# 103. Lazy Image

Course Thumbnail در لیست‌های طولانی باید Lazy Load شود، مگر اینکه در بخش Hero یا بالای viewport قرار داشته باشد.

---

# 104. Reusability

CourseCard نباید فقط برای یک صفحه طراحی شود.

```text
Course Archive
Search
Dashboard
Related
Category
Instructor
Recommendations
```

همه باید بتوانند از همان Component استفاده کنند.

---

# 105. Do

* مستقل از Theme باشد.
* بخشی از Plugin UI باشد.
* Presentation-only باشد.
* داده را از Parent دریافت کند.
* از Design Tokens استفاده کند.
* RTL را کامل پشتیبانی کند.
* Responsive باشد.
* Accessibility داشته باشد.
* Variant داشته باشد.
* Moduleها را به‌صورت Optional پشتیبانی کند.
* با REST/API آینده سازگار باشد.
* با WordPress Media هماهنگ باشد.
* از Image و Avatar و Badge موجود استفاده کند.

---

# 106. Don't

* `WP_Query` داخل Component
* Database Query داخل Component
* Enrollment Check داخل Component
* Payment Logic داخل Component
* WooCommerce API مستقیم
* Certificate Logic
* Analytics Storage
* Theme-specific CSS
* Hard-coded URL
* Hard-coded Module Check
* Hard-coded Font
* Hard-coded Color
* Hard-coded Course Data

---

# 107. Testing Requirements

## Content

```text
Long Title
Short Title
Missing Description
Missing Instructor
Missing Image
Missing Rating
Free Course
Paid Course
Discounted Course
```

## States

```text
Default
Hover
Focus
Loading
Locked
Enrolled
Completed
Disabled
```

## Variants

```text
Compact
Standard
Student
Search
Related
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## RTL

```text
Persian
English
Mixed Persian/English
```

## Modules

```text
Commerce Enabled
Commerce Disabled
Certificate Enabled
Certificate Disabled
Rating Enabled
Rating Disabled
```

## Accessibility

```text
Keyboard
Focus
Screen Reader
Alt Text
Semantic Heading
```

---

# 108. Architecture Decision

معماری نهایی:

```text
                 Course Domain
                      ↓
                 Course DTO
                      ↓
               CourseCard
                      │
       ┌──────────────┼──────────────┐
       ↓              ↓              ↓
    Image          Metadata         Actions
       │              │              │
       ↓              ↓              ↓
   Image Card      Badge/Rating     Button
   Avatar          Progress         Menu
   Thumbnail       Price            Link
```

---

# 109. Responsibility Map

```text
Course Repository
    → دریافت Course

Course API
    → انتقال Course Data

Enrollment
    → وضعیت ثبت‌نام

Learning
    → Progress

Commerce
    → Price

Certificate
    → Certificate State

Rating
    → Rating Data

CourseCard
    → نمایش همه این داده‌ها

Theme
    → امکان Styling/Extension
```

---

# 110. Final Principle

`CourseCard` باید یک **Primitive اصلی UI در بخش Learning افزونه Iran LMS** باشد.

این کامپوننت نباید تبدیل به یک صفحه کوچک Course شود.

هدف آن:

```text
Course Data
     ↓
Clear Information
     ↓
Consistent UI
     ↓
Useful Action
```

است.

به این ترتیب یک Course می‌تواند در بخش‌های مختلف افزونه با ظاهر و رفتار هماهنگ نمایش داده شود، بدون اینکه منطق Course، Enrollment، Commerce، Certificate یا Learning Progress وارد Component شود.
