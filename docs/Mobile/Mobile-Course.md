# Mobile-Course.md

**Path:** `07-Mobile/Mobile-Course.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile Course Experience
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد طراحی و رفتار **Course UI در Mobile** را برای افزونه WordPress **Iran LMS** تعریف می‌کند.

هدف، تعریف تجربه کاربر در صفحه دوره است؛ از زمانی که کاربر وارد Course می‌شود تا زمانی که:

```text
Course
↓
Enrollment / Purchase
↓
Course Overview
↓
Curriculum
↓
Learning
```

را دنبال می‌کند.

راهنمای اصلی پروژه، Course UI را بر پایه RTL، SaaS مدرن، Component-Based، WordPress Friendly و معماری Modular تعریف کرده است. 

---

# 2. Scope

این فایل مربوط به **Course UI داخل Plugin** است.

شامل:

```text
Course Header
Course Overview
Course Information
Instructor
Progress
Curriculum
Enrollment
Purchase CTA
Course Features
Reviews
Related Courses
```

است.

شامل موارد زیر نیست:

```text
Theme Homepage
Blog
Podcast
Site Header
Site Footer
```

---

# 3. Course Mobile Philosophy

صفحه Course در Mobile نباید نسخه فشرده Desktop باشد.

اصل:

```text
Desktop Course
      ↓
Content Prioritization
      ↓
Mobile Course
```

هدف:

> کاربر باید بتواند در چند ثانیه بفهمد این دوره چیست، برای چه کسی مناسب است، چه چیزی یاد می‌گیرد و قدم بعدی چیست.

---

# 4. Reference Direction

Mockup موبایل موجود پروژه، Course Detail را به صورت یک صفحه عمودی با:

```text
Header
Hero / Preview
Course Title
Instructor
Rating
Stats
Sections
Reviews
FAQ
Related Courses
```

نشان می‌دهد. 

این ساختار مبنای خوبی برای Responsive Course UI است، اما Business Logic و Componentهای واقعی باید از معماری Plugin پیروی کنند.

---

# 5. Mobile Course Structure

ساختار پیشنهادی:

```text
┌─────────────────────────────┐
│ Mobile Header               │
├─────────────────────────────┤
│ Course Preview              │
├─────────────────────────────┤
│ Course Title                │
├─────────────────────────────┤
│ Instructor                  │
├─────────────────────────────┤
│ Rating / Stats              │
├─────────────────────────────┤
│ Primary CTA                 │
├─────────────────────────────┤
│ Course Overview             │
├─────────────────────────────┤
│ What You Learn              │
├─────────────────────────────┤
│ Curriculum                  │
├─────────────────────────────┤
│ Instructor                  │
├─────────────────────────────┤
│ Reviews                     │
├─────────────────────────────┤
│ FAQ                         │
├─────────────────────────────┤
│ Related Courses             │
└─────────────────────────────┘
```

---

# 6. Above-the-Fold Priority

در قسمت ابتدایی Mobile باید موارد زیر قابل مشاهده باشند:

```text
Course Preview
Course Title
Instructor
Rating
Price / Access State
Primary CTA
```

اطلاعات ثانویه نباید این بخش را بیش از حد طولانی کنند.

---

# 7. Course Preview

Preview می‌تواند شامل:

```text
Video Thumbnail
Play Button
Duration
Preview Badge
```

باشد.

نمونه Mockup پروژه نیز یک Preview Video با Play Button و Badge «پیش نمایش دوره» نشان می‌دهد. 

---

# 8. Preview Aspect Ratio

Preview باید Responsive باشد.

مثلاً:

```text
16:9
```

یا Aspect Ratio تعریف‌شده توسط Media System.

نباید:

```text
height: fixed
```

به شکلی استفاده شود که در Mobile باعث Distortion شود.

---

# 9. Preview Interaction

اگر Course Preview قابل پخش باشد:

```text
Tap
↓
Preview Player
```

و در صورت نیاز:

```text
Fullscreen
```

پشتیبانی شود.

---

# 10. Course Badges

Badgeهای مهم می‌توانند بالای Title نمایش داده شوند:

```text
پرفروش
جدید
ویژه
به‌روزرسانی شده
```

اما تعداد Badgeها باید محدود باشد.

مثلاً:

```text
Badge 1
Badge 2
```

بهتر از یک ردیف طولانی Badge است.

---

# 11. Course Title

Title باید مهم‌ترین متن صفحه باشد.

مثال:

```text
جامع‌ترین دوره آموزش React
```

در Mobile:

```text
font-size
↓
Responsive

line-height
↓
Readable
```

باشد.

Title نباید با Ellipsis بریده شود مگر اینکه Component مشخصاً برای List طراحی شده باشد.

---

# 12. Course Subtitle

Subtitle می‌تواند یک توضیح کوتاه ارائه کند:

```text
از صفر تا ساخت اپلیکیشن‌های حرفه‌ای
```

اما نباید جای Description کامل را بگیرد.

---

# 13. Description

Description کامل بهتر است در Section جداگانه قرار گیرد.

```text
درباره دوره
```

یا:

```text
معرفی دوره
```

---

# 14. Instructor

Instructor باید در Mobile به شکل Compact نمایش داده شود:

```text
┌───────────────────────────┐
│ Avatar                    │
│ علی احمدی                 │
│ توسعه‌دهنده ارشد          │
│ ✓ تایید شده               │
└───────────────────────────┘
```

نمونه Course Mockup پروژه نیز Instructor، Avatar و عنوان تخصصی مدرس را در بخش Hero نشان می‌دهد. 

---

# 15. Instructor Action

در صورت وجود Instructor Profile:

```text
[ مشاهده پروفایل مدرس ]
```

می‌تواند نمایش داده شود.

Action نباید با CTA اصلی Course رقابت کند.

---

# 16. Rating

Rating باید واضح باشد:

```text
⭐ 4.8
۳۹۴ نظر
```

Rating نباید تنها با رنگ منتقل شود.

---

# 17. Course Stats

Stats مهم:

```text
دانشجو
مدت دوره
سطح
آخرین بروزرسانی
```

می‌توانند در Mobile به صورت Grid دو ستونه نمایش داده شوند:

```text
┌─────────────┬─────────────┐
│ 24K         │ 24 ساعت     │
│ دانشجو      │ مدت دوره    │
├─────────────┼─────────────┤
│ متوسط       │ ۱۴۰۳        │
│ سطح         │ بروزرسانی   │
└─────────────┴─────────────┘
```

---

# 18. Course Meta

اطلاعات Meta نباید بیش از حد زیاد شوند.

Primary Meta:

```text
Rating
Students
Duration
Level
```

Secondary Meta می‌تواند در بخش اطلاعات دوره قرار گیرد.

---

# 19. Enrollment State

Course UI باید بر اساس وضعیت کاربر تغییر کند.

حالت‌ها:

```text
Guest
↓
Not Enrolled
↓
Enrolled
↓
In Progress
↓
Completed
```

---

# 20. Guest State

کاربر مهمان:

```text
Course Preview
Title
Description
Instructor
Rating
Price
[ ثبت‌نام / خرید ]
```

را می‌بیند.

---

# 21. Not Enrolled

اگر کاربر Login کرده اما Enrolled نیست:

```text
[ ثبت‌نام در دوره ]
```

یا:

```text
[ خرید دوره ]
```

نمایش داده شود.

---

# 22. Enrolled

اگر کاربر Enrolled باشد:

```text
Progress
Continue Learning
```

در اولویت قرار می‌گیرد.

مثلاً:

```text
پیشرفت شما
64%

[ ادامه یادگیری ]
```

---

# 23. In Progress

اگر دوره در حال یادگیری است:

```text
████████░░ 64%

آخرین درس:
مقدمه‌ای بر React

[ ادامه یادگیری ]
```

CTA اصلی باید Continue Learning باشد.

---

# 24. Completed

اگر Course تکمیل شده:

```text
✓ دوره تکمیل شده
```

و در صورت فعال بودن Certificate:

```text
[ دریافت گواهینامه ]
```

نمایش داده شود.

---

# 25. Primary CTA

CTA اصلی بسته به وضعیت کاربر:

```text
Guest
→ مشاهده / ثبت‌نام

Not Enrolled
→ خرید / ثبت‌نام

Enrolled
→ ادامه یادگیری

Completed
→ مشاهده دوره / گواهینامه
```

---

# 26. Sticky CTA

در Mobile می‌توان Primary CTA را Sticky کرد:

```text
┌─────────────────────────────┐
│ [ ادامه یادگیری ]           │
└─────────────────────────────┘
```

اما Sticky CTA نباید Content را بپوشاند.

Page باید Bottom Padding مناسب داشته باشد.

---

# 27. Purchase Card

Purchase Card دسکتاپ که معمولاً Sidebar است، در Mobile نباید Sidebar باقی بماند.

تبدیل:

```text
Desktop
Sticky Purchase Card

        ↓

Mobile
Sticky Bottom CTA
+
Expandable Pricing Details
```

---

# 28. Pricing

Pricing باید واضح باشد:

```text
قیمت اصلی
↓
تخفیف
↓
قیمت نهایی
```

مثال:

```text
۱,۹۸۰,۰۰۰ تومان
25٪ تخفیف

۱,۴۹۰,۰۰۰ تومان
```

---

# 29. Coupon

Coupon در صفحه Course نباید بیش از حد فضای Hero را اشغال کند.

در صورت وجود:

```text
کد تخفیف دارید؟
```

می‌تواند به یک Bottom Sheet یا Checkout منتقل شود.

---

# 30. Course Features

Featureهای مهم:

```text
دسترسی دائمی
گواهینامه
آپدیت
پشتیبانی
پروژه عملی
```

می‌توانند به شکل Grid دو ستونه نمایش داده شوند.

Mockup پروژه نیز Featureهایی مانند پروژه عملی، گواهینامه، دسترسی دائمی، آپدیت و پشتیبانی را نمایش می‌دهد. 

---

# 31. What You Will Learn

این Section باید قابل Scan باشد.

مثلاً:

```text
در این دوره یاد می‌گیرید:

✓ ساخت UI با React
✓ مدیریت State
✓ کار با API
✓ React Router
✓ Performance
```

در Mobile بهتر است ابتدا چند مورد مهم نمایش داده شود و:

```text
مشاهده همه
```

برای ادامه استفاده شود.

---

# 32. Curriculum

Curriculum یکی از مهم‌ترین بخش‌های Course است.

در Mobile:

```text
Section
↓
Lessons
```

به شکل Accordion نمایش داده شود.

---

# 33. Curriculum Example

```text
▼ ۱. مقدمه و نصب
   ✓ مقدمه‌ای بر React
   ✓ نصب محیط
   ○ ساخت اولین برنامه

▶ ۲. مبانی React

▶ ۳. Hooks

🔒 ۴. مدیریت State
```

---

# 34. Curriculum States

Lessonها می‌توانند:

```text
Available
Completed
Current
Locked
Preview
```

باشند.

هر State باید Visual و Semantic مشخص داشته باشد.

---

# 35. Lesson Metadata

در Curriculum می‌توان نمایش داد:

```text
نوع محتوا
مدت
وضعیت
```

مثلاً:

```text
▶ مقدمه React
   ویدیو • 21:36
```

---

# 36. Free Preview

اگر Course دارای Free Preview باشد:

```text
رایگان
```

باید واضح باشد.

کاربر Guest باید بتواند Preview مجاز را بدون Enrollment مشاهده کند.

---

# 37. Locked Content

Locked Lesson:

```text
🔒 درس بعدی
```

باید دلیل Lock در صورت نیاز قابل فهم باشد.

مثلاً:

```text
این درس پس از ثبت‌نام در دوره در دسترس است.
```

---

# 38. Roadmap

اگر Course دارای Learning Roadmap باشد، در Mobile:

```text
شروع
↓
مقدماتی
↓
متوسط
↓
پیشرفته
↓
پروژه نهایی
```

به Vertical Timeline تبدیل شود.

Mockup موجود پروژه Roadmap را به صورت Horizontal نمایش می‌دهد؛ در Mobile تبدیل آن به Vertical Flow از نظر Responsive منطقی است. 

---

# 39. Course Reviews

Reviews در Mobile به صورت:

```text
Rating Summary
↓
Review Cards
↓
View More
```

نمایش داده شوند.

---

# 40. Review Card

```text
┌──────────────────────────┐
│ Avatar  نام کاربر        │
│ ⭐⭐⭐⭐⭐  4.8             │
│ متن نظر...               │
│ تاریخ                    │
└──────────────────────────┘
```

---

# 41. Review Filter

در صورت تعداد زیاد Reviews:

```text
همه
۵ ستاره
۴ ستاره
۳ ستاره
```

می‌تواند به Dropdown یا Bottom Sheet تبدیل شود.

---

# 42. FAQ

FAQ در Mobile باید Accordion باشد:

```text
▼ این دوره برای چه کسی مناسب است؟
  پاسخ...

▶ آیا گواهینامه دارد؟
▶ آیا آپدیت رایگان است؟
▶ دسترسی چقدر است؟
```

---

# 43. Related Courses

Related Courses در Mobile می‌تواند Horizontal Carousel باشد:

```text
← [Course] [Course] [Course] →
```

یا Vertical List.

Mockup پروژه Related Courses را به صورت Carousel نمایش می‌دهد. 

---

# 44. Related Course Priority

حداکثر چند Course مهم نمایش داده شود.

مثلاً:

```text
3–5 Courses
```

و:

```text
مشاهده همه
```

برای بقیه.

---

# 45. Share

Share Action می‌تواند:

```text
Share
```

باشد، اما در Mobile ترجیحاً Native Share API یا Share Sheet سیستم استفاده شود، در صورت پشتیبانی محیط.

---

# 46. Favorite

Favorite:

```text
♡
```

باید Stateهای:

```text
Default
Active
Loading
Error
```

داشته باشد.

---

# 47. Compare

Compare در Mobile معمولاً Secondary Action است.

نباید کنار CTA اصلی فضای زیادی اشغال کند.

می‌تواند داخل:

```text
More
```

قرار گیرد.

---

# 48. Gift Course

اگر قابلیت Gift فعال باشد:

```text
هدیه دادن دوره
```

Secondary Action محسوب شود.

---

# 49. Optional Modules

Course UI باید Module-aware باشد.

مثلاً:

```text
Certificate
Wallet
Gamification
Attendance
Homework
Survey
Forum
WooCommerce
SpotPlayer
SkyRoom
```

را فقط در صورت فعال بودن نمایش دهد.

راهنمای پروژه صراحتاً این Moduleها را به عنوان قابلیت‌های Modular فهرست کرده و تأکید می‌کند Module غیرفعال نباید Layout را خراب کند. 

---

# 50. Module Reflow

مثلاً:

```text
Certificate Enabled
↓
Certificate Section

Certificate Disabled
↓
Section Removed
↓
No Empty Space
```

---

# 51. Webinar

اگر Webinar Module فعال باشد:

```text
وبینار بعدی
تاریخ
Countdown
Instructor

[ ورود به وبینار ]
```

می‌تواند نمایش داده شود.

اگر SkyRoom غیرفعال باشد، UI مربوط به آن نباید نمایش داده شود.

---

# 52. SpotPlayer

اگر SpotPlayer فعال باشد:

```text
1080p
بدون تبلیغات
پخش سریع
```

می‌تواند به عنوان Feature یا Player Provider نمایش داده شود.

اما Course UI نباید به SpotPlayer وابسته باشد.

---

# 53. WooCommerce

اگر Commerce از WooCommerce استفاده کند، Course UI باید از Commerce Service/Integration Layer استفاده کند.

نباید:

```text
Course Component
↓
Direct WooCommerce Database Query
```

انجام دهد.

---

# 54. Security

Course UI نباید صرفاً با مخفی کردن Button، دسترسی را کنترل کند.

مثلاً:

```text
Hide Lesson
```

جایگزین:

```text
Server-side Authorization
```

نیست.

---

# 55. WordPress Plugin Boundary

معماری پیشنهادی:

```text
WordPress
   ↓
Iran LMS Services
   ↓
Course View Model
   ↓
Mobile Course Components
```

UI نباید مستقیماً مسئول:

```text
Database
Enrollment Logic
Payment Logic
Permission Logic
Certificate Logic
```

باشد.

---

# 56. Theme Independence

Course UI باید روی Themeهای مختلف کار کند.

نباید فرض کند Theme:

```text
display: grid
font-size
button
img
```

خاصی را تعریف کرده است.

Componentهای Plugin باید Style Contract مشخص داشته باشند.

---

# 57. CSS Isolation

Course Mobile Components باید تا حد امکان Scoped باشند.

مثلاً:

```text
.iran-lms-course
.iran-lms-course__hero
.iran-lms-course__curriculum
.iran-lms-course__cta
```

تا Collision با Theme کمتر شود.

---

# 58. Dark Mode

Course باید در Dark Mode نیز تمام Stateها را پشتیبانی کند:

```text
Course
Price
Progress
Curriculum
Locked
Completed
CTA
Review
```

---

# 59. RTL

Course Mobile باید کاملاً RTL باشد.

به‌خصوص:

```text
Title
Instructor
Stats
Curriculum
Progress
CTA
Roadmap
Reviews
```

---

# 60. Accessibility

Course UI باید:

```text
☐ Semantic Headings
☐ Accessible Buttons
☐ Keyboard Navigation
☐ Focus Visible
☐ Screen Reader Labels
☐ Color Contrast
☐ Touch Targets
```

را رعایت کند.

---

# 61. Performance

Course Page ممکن است تصاویر و اطلاعات زیادی داشته باشد.

بنابراین:

```text
☐ Lazy Load Images
☐ Optimize Thumbnails
☐ Avoid unnecessary Requests
☐ Lazy Load Secondary Sections
☐ Avoid Heavy Animations
```

---

# 62. Above-the-Fold Performance

موارد زیر باید سریع‌تر در دسترس باشند:

```text
Course Preview
Title
Price / State
CTA
```

Sections پایین صفحه می‌توانند Lazy Load شوند.

---

# 63. Loading State

Course Skeleton:

```text
┌────────────────────────────┐
│ ████████████████████████   │
│                            │
│ ███████████████            │
│ ██████████                 │
│                            │
│ ███████░░░░                │
│                            │
│ █████████████████          │
└────────────────────────────┘
```

Skeleton نباید شکل نهایی Component را بیش از حد تغییر دهد.

---

# 64. Error State

اگر Course Load نشد:

```text
دوره قابل بارگذاری نیست.

[ تلاش دوباره ]
```

و در صورت نیاز:

```text
[ بازگشت به دوره‌ها ]
```

---

# 65. Not Found

اگر Course وجود نداشته باشد:

```text
دوره پیدا نشد.

ممکن است دوره حذف شده یا دیگر در دسترس نباشد.

[ مشاهده دوره‌ها ]
```

---

# 66. Enrollment Error

اگر Enrollment موفق نشد:

```text
ثبت‌نام انجام نشد.

[ تلاش دوباره ]
```

از نمایش Error فنی WordPress یا PHP به کاربر جلوگیری شود.

---

# 67. Purchase Flow

اگر Course Paid باشد:

```text
Course
↓
CTA
↓
Checkout
↓
Payment
↓
Enrollment
↓
Learning
```

Course UI نباید Payment را خودش پیاده‌سازی کند.

---

# 68. Mobile Checkout Boundary

در Mobile:

```text
Course CTA
```

کاربر را به Checkout استاندارد سیستم می‌برد.

Course Page نباید تبدیل به یک Checkout پیچیده شود.

---

# 69. Sticky CTA Behavior

در Scroll:

```text
Initial
↓
Hero CTA Visible

Scroll Down
↓
Sticky CTA Appears
```

پس از رسیدن دوباره به CTA اصلی:

```text
Sticky CTA
↓
Hide
```

می‌تواند پیاده‌سازی شود.

---

# 70. Touch Targets

Actionهای Course:

```text
CTA
Favorite
Share
Curriculum
FAQ
Review
```

باید Touch Area مناسب داشته باشند.

---

# 71. Course Page Scroll

اصل:

```text
Vertical Page Scroll
✓
```

و:

```text
Horizontal Page Scroll
✗
```

مگر برای:

```text
Carousel
Certificate Preview
Specific Table
```

---

# 72. Orientation

Portrait حالت اصلی است.

Landscape باید حداقل برای:

```text
Preview
Video
Course Media
```

بررسی شود.

---

# 73. Course Architecture

```text
Mobile Course
│
├── Header
├── Preview
├── Course Identity
│   ├── Badges
│   ├── Title
│   ├── Subtitle
│   └── Description
│
├── Instructor
├── Rating / Stats
├── Enrollment CTA
├── Progress
├── Features
├── What You Learn
├── Curriculum
├── Roadmap
├── Reviews
├── FAQ
├── Related Courses
└── Optional Modules
```

---

# 74. Component Reuse

Course Mobile نباید Componentهای Desktop را دوباره‌سازی کند.

اصل:

```text
Same Component
+
Responsive Variant
```

نه:

```text
Desktop Component
+
Completely Separate Mobile Component
```

مگر زمانی که Interaction واقعاً متفاوت باشد.

---

# 75. View Model

Course UI باید داده مورد نیاز خود را از View Model دریافت کند.

نمونه مفهومی:

```text
CourseViewModel
├── identity
├── preview
├── instructor
├── rating
├── stats
├── pricing
├── enrollment
├── progress
├── curriculum
├── learningOutcomes
├── reviews
├── faq
├── relatedCourses
└── enabledFeatures
```

این قرارداد UI است و نباید مستقیماً به Database Schema تبدیل شود.

---

# 76. Definition of Done

Course Mobile زمانی آماده است که:

```text
☐ Course Identity واضح است
☐ Preview Responsive است
☐ Instructor قابل مشاهده است
☐ Rating واضح است
☐ Price / Enrollment State مشخص است
☐ Primary CTA واضح است
☐ Continue Learning درست نمایش داده می‌شود
☐ Curriculum Accordion است
☐ Locked / Completed / Current States مشخص‌اند
☐ Reviews قابل استفاده‌اند
☐ FAQ Accordion است
☐ Related Courses Responsive هستند
☐ Optional Modules Layout را نمی‌شکنند
☐ RTL کامل است
☐ Dark Mode پشتیبانی می‌شود
☐ Accessibility رعایت شده
☐ Theme Independent است
☐ Business Logic در UI نیست
☐ WordPress Plugin Boundary رعایت شده
☐ Loading / Error / Empty States وجود دارد
☐ Performance مناسب است
```

---

# 77. Final Principle

Course Mobile در Iran LMS باید این مسیر را ساده کند:

```text
شناخت دوره
   ↓
اعتماد
   ↓
تصمیم
   ↓
ثبت‌نام / خرید
   ↓
شروع یادگیری
   ↓
ادامه یادگیری
```

و اصل نهایی:

> **Mobile-Course فقط یک Responsive Layout نیست؛ یک تجربه Course کامل برای کاربر موبایل است که با معماری Plugin، Design System، Module System و WordPress Compatibility پروژه هماهنگ باقی می‌ماند.**
