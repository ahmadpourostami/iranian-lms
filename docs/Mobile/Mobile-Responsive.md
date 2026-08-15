# `07-Mobile/Mobile-Responsive.md`

**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Mobile / Responsive System
**Version:** 1.0
**Status:** Foundation

> این سند، سیستم Responsive افزونه Iran LMS را تعریف می‌کند. مبنا، Design System موجود پروژه است: **Modern SaaS، RTL فارسی، Component-Based، WordPress Friendly، Modular Architecture، Radius 16px و Typography فارسی**. 

---

# 1. Purpose

Responsive System مشخص می‌کند رابط کاربری افزونه چگونه بین:

```text
Desktop
Tablet
Mobile
```

تغییر کند، بدون اینکه:

* اطلاعات از بین برود
* Interaction خراب شود
* Layout بشکند
* Componentها به Theme وابسته شوند
* قابلیت‌های افزونه به نسخه خاصی از صفحه وابسته شوند

---

# 2. Core Principle

Responsive در Iran LMS صرفاً به معنی:

```text
width: 100%;
```

نیست.

بلکه:

```text
Responsive
=
Layout Adaptation
+
Content Adaptation
+
Interaction Adaptation
+
Component Adaptation
```

است.

---

# 3. Plugin Boundary

این سیستم متعلق به **افزونه WordPress** است.

بنابراین Responsive System نباید فرض کند که:

```text
Theme
├── Header
├── Footer
├── Container
└── Grid
```

را کنترل می‌کند.

افزونه باید UI خودش را مستقل مدیریت کند.

---

# 4. Theme Independence

افزونه نباید به موارد زیر وابسته باشد:

```text
Theme Container
Theme Breakpoints
Theme Grid
Theme Header
Theme CSS
Theme JavaScript
```

در عوض:

```text
Iran LMS
    ↓
Own Design Tokens
    ↓
Own Responsive Rules
    ↓
Own Components
```

---

# 5. Responsive Layers

سیستم Responsive در چهار سطح عمل می‌کند:

```text
Viewport
   ↓
Page Layout
   ↓
Component Layout
   ↓
Content / Interaction
```

---

# 6. Viewport Classes

Breakpointها باید به عنوان **Design Token** تعریف شوند، نه اینکه در هر Component به صورت مستقل ساخته شوند.

ساختار منطقی:

```text
xs
sm
md
lg
xl
```

مقادیر دقیق باید از Design Token مرکزی پروژه خوانده شوند.

---

# 7. Mobile First

برای Componentهای جدید:

```text
Mobile
↓
Tablet
↓
Desktop
```

طراحی شود.

یعنی ابتدا حالت محدودتر تعریف شود و سپس امکانات Layout در Viewportهای بزرگ‌تر اضافه شوند.

---

# 8. Why Mobile First?

Mobile محدودیت بیشتری دارد:

```text
Width
Touch
Keyboard
Safe Area
Navigation
Reading Space
```

بنابراین اگر Component در Mobile درست طراحی شود، توسعه آن برای Desktop ساده‌تر خواهد بود.

---

# 9. Container

Container افزونه باید مستقل باشد.

مثلاً:

```text
.iran-lms-container
```

و نباید مستقیماً از:

```text
.container
.wrapper
.site-container
```

Theme استفاده کند.

---

# 10. Container Behavior

در Desktop:

```text
Viewport
┌────────────────────────────────────┐
│                                    │
│     ┌────────────────────────┐     │
│     │     Iran LMS Content   │     │
│     └────────────────────────┘     │
│                                    │
└────────────────────────────────────┘
```

در Mobile:

```text
┌────────────────────┐
│ Iran LMS Content   │
│                    │
│                    │
└────────────────────┘
```

---

# 11. Horizontal Padding

Padding افقی باید Responsive باشد.

مثلاً:

```text
Desktop
Large horizontal spacing

Tablet
Medium spacing

Mobile
Compact spacing
```

اما نباید در هر Page مقدار مستقل تعریف شود.

---

# 12. Grid System

Grid باید بتواند Columnها را کاهش دهد.

مثلاً:

```text
Desktop
4 Columns

Tablet
2 Columns

Mobile
1 Column
```

---

# 13. Course Cards

مثلاً Course Card:

```text
Desktop:
[Card][Card][Card][Card]

Tablet:
[Card][Card]

Mobile:
[Card]
[Card]
[Card]
```

این رفتار باید از `CourseCard.md` و Design System پیروی کند.

---

# 14. Dashboard Layout

Dashboard دسکتاپ می‌تواند چند ستون داشته باشد:

```text
┌──────────┬───────────────────────┐
│ Sidebar  │ Main                  │
│          │                       │
│          │ Cards / Tables        │
└──────────┴───────────────────────┘
```

در Mobile:

```text
┌────────────────────┐
│ Header             │
├────────────────────┤
│ Main Content       │
│                    │
│ Card               │
│ Card               │
│ Card               │
└────────────────────┘
```

نمونه UI موجود پروژه نیز Dashboard موبایل را با Header، Progress Card، Continue Learning و اطلاعات دوره به شکل عمودی نمایش می‌دهد. 

---

# 15. Sidebar

Sidebar دسکتاپ:

```text
┌────────────┬──────────────────┐
│ Navigation │ Content          │
│            │                  │
└────────────┴──────────────────┘
```

Mobile:

```text
Header
   ↓
Menu Trigger
   ↓
Drawer / Navigation Sheet
```

Sidebar نباید در Mobile صرفاً کوچک شود.

---

# 16. Mobile Navigation

در Mobile ترجیح:

```text
Bottom Navigation
یا
Drawer
یا
Top Navigation
```

بر اساس Context.

در Mockup موبایل پروژه Bottom Navigation شامل:

```text
پروفایل
اعلان‌ها
درس‌ها
دوره‌ها
خانه
```

است. 

---

# 17. Header

Desktop Header می‌تواند:

```text
Logo
Search
Notifications
Profile
Actions
```

داشته باشد.

Mobile:

```text
Menu
Logo / Page Title
Notification
More
```

و عناصر غیرضروری حذف یا منتقل شوند.

---

# 18. Search

Desktop:

```text
[ 🔍 جستجوی دوره‌ها، درس‌ها... ]
```

Mobile:

```text
[ 🔍 ]
```

یا:

```text
[ جستجو... ]
```

با باز شدن Search View در صورت نیاز.

---

# 19. Tables

Table نباید فقط کوچک شود.

بسته به نوع داده:

```text
Desktop Table
      ↓
Compact Table
      ↓
Horizontal Scroll
      ↓
Stacked Cards
```

انتخاب شود.

جزئیات کامل در `Mobile-Tables.md` تعریف شده است.

---

# 20. Cards

Card باید:

```text
Desktop
Horizontal / Grid

Mobile
Stacked / Full Width
```

شود.

---

# 21. Card Content Priority

در Mobile:

```text
Title
↓
Primary Information
↓
Status
↓
Important Metadata
↓
Secondary Information
↓
Actions
```

نمایش داده شود.

اطلاعات کم‌اهمیت می‌تواند:

```text
Collapse
Hide
Details
```

شود.

---

# 22. Course Detail

صفحه Course Detail در Desktop می‌تواند Hero، Purchase Panel، Instructor و Curriculum را کنار هم قرار دهد.

در Mobile:

```text
Course Header
↓
Preview
↓
Title
↓
Instructor
↓
Stats
↓
Purchase CTA
↓
Curriculum
↓
Description
```

قرار گیرد.

Mockup موجود نیز اطلاعات دوره، مدرس، امتیاز، دانشجو و CTA خرید را در ساختار اصلی Course نمایش می‌دهد. 

---

# 23. Lesson Player

Lesson Player در Desktop:

```text
Sidebar
+
Video
+
Secondary Sidebar
```

است.

در Mobile:

```text
Header
↓
Video
↓
Lesson Info
↓
Actions
↓
Tabs
↓
Content
```

قرار می‌گیرد.

نمونه Mobile موجود همین الگو را با Video، عنوان درس، مدرس، Description، Next Lesson و Tabs نشان می‌دهد. 

---

# 24. Focus Mode

Focus Mode باید در Mobile ساده‌تر شود.

```text
Hide
Sidebars
Secondary Widgets
Promotional Content
```

و باقی بماند:

```text
Video
Lesson Navigation
Progress
Notes
Essential Actions
```

راهنمای پروژه نیز Focus Mode را به عنوان حالت کم‌حواس‌پرتی با حذف Sidebarها تعریف کرده است. 

---

# 25. Curriculum

Desktop:

```text
Course
├── Lesson
├── Lesson
├── Quiz
└── Assignment
```

Mobile:

```text
سرفصل‌ها
   ↓
Expandable Sections
   ↓
Lessons
```

به صورت Accordion نمایش داده شود.

---

# 26. Bottom Tabs

در Lesson:

```text
درس
فایل‌ها
تمرین
آزمون
بیشتر
```

در Mobile بهتر است تعداد Tabهای همزمان محدود باشد.

موارد کم‌کاربرد داخل:

```text
بیشتر
```

قرار گیرند.

---

# 27. Forms

Formهای Desktop:

```text
Two Columns
```

می‌توانند باشند.

Mobile:

```text
One Column
```

شود.

---

# 28. Form Field

Mobile Field:

```text
Label
↓
Input
↓
Help Text
↓
Error
```

باشد.

---

# 29. Form Actions

در Formهای مهم:

```text
Desktop:
[ Cancel ] [ Save ]

Mobile:
[ Save ]
[ Cancel ]
```

یا Sticky Bottom Action Bar استفاده شود.

---

# 30. Keyboard-Aware Forms

وقتی Keyboard باز می‌شود:

```text
Input
↓
Viewport Adjustment
↓
Input Visible
↓
Submit Visible
```

باشد.

---

# 31. Buttons

Button نباید صرفاً از نظر Width کوچک شود.

در Mobile:

```text
Touch Area
+
Readable Label
+
Clear Hierarchy
```

مهم است.

---

# 32. Full Width CTA

برای Actionهای اصلی:

```text
[ ادامه یادگیری ]
```

می‌تواند Full Width باشد.

---

# 33. Button Groups

Desktop:

```text
[ Secondary ] [ Primary ]
```

Mobile:

```text
[ Primary ]

[ Secondary ]
```

در عملیات مهم بهتر است Vertical شوند.

---

# 34. Modals

Modal Desktop:

```text
Centered Dialog
```

Mobile:

```text
Bottom Sheet
یا
Full Screen
```

بر اساس نوع تعامل.

جزئیات در `Mobile-Modals.md` تعریف شده است.

---

# 35. Alerts

Alertهای کوچک:

```text
Inline
Toast
Snackbar
```

و Alertهای مهم:

```text
Modal
```

باشند.

---

# 36. Images

Image باید:

```text
max-width: 100%;
height: auto;
```

داشته باشد.

Imageهای Course Thumbnail:

```text
Desktop
Aspect Ratio ثابت

Mobile
همان نسبت تصویر
```

را حفظ کنند.

---

# 37. Video

Video Player باید Responsive باشد.

```text
width: 100%;
aspect-ratio: 16 / 9;
```

در حالت عادی.

در Focus Mode می‌تواند به Full Viewport نزدیک شود.

---

# 38. Embedded Content

محتوای Embed مانند:

```text
YouTube
Vimeo
SpotPlayer
SkyRoom
```

نباید باعث Horizontal Overflow شود.

---

# 39. Horizontal Overflow

اصل مهم:

> هیچ Component عمومی افزونه نباید به صورت ناخواسته باعث Horizontal Scroll کل صفحه شود.

بررسی شود:

```text
Long Text
URL
Table
Image
Code
Video
Iframe
Badge Group
Button Group
```

---

# 40. Long Text

برای متن‌های طولانی:

```text
wrap
break
truncate
expand
```

بر اساس Context.

---

# 41. Code

برای Code Block:

```text
overflow-x: auto;
```

می‌تواند روی خود Code Container اعمال شود.

نه روی کل Page.

---

# 42. Breadcrumb

Desktop:

```text
خانه / دوره‌ها / React / درس ۱
```

Mobile:

```text
← React
```

یا:

```text
React / درس ۱
```

بر اساس اهمیت Navigation.

---

# 43. Pagination

Desktop:

```text
قبلی  1  2  3  4  بعدی
```

Mobile:

```text
[ قبلی ]   2 از 10   [ بعدی ]
```

---

# 44. Filters

Desktop:

```text
[ دوره ] [ وضعیت ] [ سطح ] [ مدرس ]
```

Mobile:

```text
[ فیلترها ]
```

و Filter Panel به صورت Bottom Sheet / Modal باز شود.

---

# 45. Sorting

Desktop:

```text
[ مرتب‌سازی: جدیدترین ]
```

Mobile:

```text
[ مرتب‌سازی ]
```

و گزینه‌ها داخل Sheet نمایش داده شوند.

---

# 46. Notifications

Desktop می‌تواند List یا Panel باشد.

Mobile:

```text
Notification Card
Notification Card
Notification Card
```

باشد.

نمونه Notifications موجود دارای دسته‌بندی و Filter هستند که در Mobile می‌توانند به Filter Sheet منتقل شوند. 

---

# 47. Empty States

Empty State باید در Mobile:

```text
Compact
Centered
Actionable
```

باشد.

---

# 48. Loading

برای Loading:

```text
Skeleton
Spinner
Progress
```

بر اساس Context.

Skeleton باید Layout نهایی Mobile را شبیه‌سازی کند.

---

# 49. Toast

Toast نباید:

```text
عرض زیاد
متن طولانی
دکمه‌های متعدد
```

داشته باشد.

در Mobile معمولاً نزدیک Bottom و خارج از Bottom Navigation قرار گیرد.

---

# 50. Snackbar

Snackbar باید Bottom Navigation را نپوشاند.

```text
Bottom Navigation
        ↑
Snackbar
```

Safe Area لحاظ شود.

---

# 51. Accessibility

Responsive نباید Accessibility را کاهش دهد.

تمام Viewها باید:

```text
Keyboard Accessible
Screen Reader Friendly
Touch Accessible
Color Independent
```

باشند.

---

# 52. Touch Target

Targetهای قابل لمس:

```text
Minimum ≈ 44 × 44 px
```

در نظر گرفته شوند.

---

# 53. Typography

Typography در Mobile نباید صرفاً با کوچک کردن Font حل شود.

Hierarchy باید حفظ شود:

```text
H1
↓
H2
↓
H3
↓
Body
↓
Caption
```

---

# 54. Persian Typography

Typography باید با Font System پروژه هماهنگ باشد:

```text
Vazirmatn
Estedad
```

و RTL حفظ شود. 

---

# 55. Numbers

اعداد باید خوانا باقی بمانند:

```text
87.6
۴,۵۶۳
۳۹۹,۰۰۰ تومان
۲۴ / ۳۸
```

---

# 56. LTR Content

موارد زیر می‌توانند LTR باشند:

```text
Email
URL
Course ID
Order ID
Transaction ID
Code
```

---

# 57. RTL

اصل کلی:

```text
direction: rtl;
```

اما محتوای LTR باید Explicitly مشخص شود.

---

# 58. Safe Area

Mobile UI باید Safe Area را در نظر بگیرد:

```text
Top
Bottom
Left
Right
```

به‌خصوص برای:

```text
Bottom Navigation
Bottom Sheet
Sticky CTA
Video Controls
```

---

# 59. Orientation

افزونه باید حداقل:

```text
Portrait
```

را به صورت کامل پشتیبانی کند.

Landscape نیز برای مواردی مانند:

```text
Video
Focus Mode
Quiz
```

نباید Layout را خراب کند.

---

# 60. Landscape Lesson

در Landscape:

```text
Video
→
Full Width
```

و UI غیرضروری مخفی یا قابل دسترسی از Controls شود.

---

# 61. Responsive Course Card

```text
Desktop
┌────────────────┐
│ Thumbnail      │
│ Title          │
│ Instructor     │
│ Rating         │
│ Price          │
└────────────────┘

Mobile
┌────────────────────┐
│ Thumbnail          │
│ Title              │
│ Instructor         │
│ Rating             │
│ Price              │
│ [ ادامه / خرید ]   │
└────────────────────┘
```

---

# 62. Responsive Progress

Progress Ring:

```text
Desktop
Large Ring

Mobile
Smaller Ring
```

ولی اطلاعات کلیدی مثل:

```text
64%
24 از 38 درس
```

نباید حذف شود.

نمونه Mobile Dashboard پروژه همین اطلاعات را در Progress Card نگه می‌دارد. 

---

# 63. Responsive Stats

Desktop:

```text
[ 87.6 ] [ 6 ] [ 42 ] [ 7/128 ]
```

Mobile:

```text
[ 87.6 ]
میانگین کل

[ 6 ]
دوره

[ 42 ]
ارزیابی
```

---

# 64. Responsive Dashboard Cards

Cardهای چندستونه:

```text
Desktop
4 × 1

Tablet
2 × 2

Mobile
1 × 4
```

---

# 65. Responsive Charts

Chart نباید صرفاً Shrink شود.

در Mobile:

```text
Reduce Labels
Reduce Density
Enable Scroll
Simplify Legend
```

در صورت نیاز.

---

# 66. Grade Dashboard

صفحه Grades دسکتاپ دارای Summary Cards، Filter و Grade Table است. 

Mobile:

```text
Summary
↓
Filters
↓
Course Grade Cards
↓
Details
```

---

# 67. Responsive Course Curriculum

در Desktop:

```text
Sidebar
```

در Mobile:

```text
Accordion
```

یا:

```text
Bottom Sheet
```

استفاده شود.

---

# 68. Responsive Commerce

Cart Desktop:

```text
Products | Summary
```

Mobile:

```text
Products
↓
Coupon
↓
Summary
↓
Checkout CTA
```

---

# 69. Checkout

Mobile Checkout باید مرحله‌بندی شده باشد:

```text
اطلاعات
↓
پرداخت
↓
تأیید
```

در صورت پیچیدگی زیاد.

---

# 70. Invoice

Invoice نباید صرفاً یک Table کوچک شود.

در Mobile:

```text
Invoice Header
↓
Customer
↓
Items
↓
Totals
↓
Payment
↓
Actions
```

به شکل Stacked نمایش داده شود.

---

# 71. Coupon

Coupon Field در Mobile:

```text
[ کد تخفیف ] [ اعمال ]
```

و در عرض کم:

```text
[ کد تخفیف ]

[ اعمال کد ]
```

---

# 72. Component Breakpoint Ownership

هر Component نباید Breakpointهای مستقل و ناسازگار تعریف کند.

صحیح:

```text
Design Tokens
     ↓
Responsive Tokens
     ↓
Components
```

غلط:

```text
Button → breakpoint A
Card → breakpoint B
Table → breakpoint C
```

بدون استاندارد مرکزی.

---

# 73. Container Queries

در آینده، Componentهای پیچیده می‌توانند از Container Query استفاده کنند.

مثلاً:

```text
CourseCard
```

باید بر اساس فضای Container خودش تغییر کند، نه فقط Viewport.

---

# 74. Responsive Tokens

ساختار پیشنهادی:

```text
responsive/
├── breakpoints
├── container
├── spacing
├── typography
├── grid
└── visibility
```

---

# 75. Visibility Rules

Component می‌تواند:

```text
visible
collapsed
hidden
replaced
```

شود.

مثلاً:

```text
Desktop Sidebar
↓
Mobile Drawer
```

این بهتر از صرفاً:

```text
display: none;
```

است.

---

# 76. Replace vs Hide

اگر اطلاعات مهم است:

```text
Hide
```

مناسب نیست.

بهتر:

```text
Desktop Table
↓
Mobile Card
```

باشد.

---

# 77. Content Priority

برای هر Responsive Component باید مشخص شود:

```text
Must Keep
Can Collapse
Can Move
Can Replace
Can Hide
```

---

# 78. Responsive State Matrix

هر Component مهم باید Matrix داشته باشد:

| Component    | Desktop | Tablet      | Mobile           |
| ------------ | ------- | ----------- | ---------------- |
| Sidebar      | Fixed   | Collapsible | Drawer           |
| Course Cards | Grid    | 2 Col       | 1 Col            |
| Table        | Full    | Compact     | Cards/Scroll     |
| Modal        | Dialog  | Dialog      | Sheet/Fullscreen |
| Filters      | Inline  | Compact     | Sheet            |
| Navigation   | Sidebar | Sidebar     | Bottom/Drawer    |
| Curriculum   | Sidebar | Accordion   | Accordion        |
| Form         | 2 Col   | 1–2 Col     | 1 Col            |

---

# 79. Performance

Responsive نباید باعث Load غیرضروری شود.

در Mobile:

```text
Lazy Images
Lazy Media
Deferred Non-critical JS
Reduced DOM
```

در نظر گرفته شود.

---

# 80. WordPress Performance

افزونه نباید برای Responsive:

```text
Global CSS Everywhere
Huge JS Bundle
Duplicate CSS
```

بارگذاری کند.

Assetها باید تا حد امکان:

```text
Scoped
Modular
Conditional
```

باشند.

---

# 81. Asset Loading

مثلاً:

```text
Course Module
↓
Course CSS

Quiz Module
↓
Quiz CSS

Checkout Module
↓
Checkout CSS
```

و نه اینکه تمام Assetهای افزونه در تمام صفحات Load شوند.

---

# 82. Breakpoint Testing

حداقل تست:

```text
320px
360px
375px
390px
414px
768px
1024px
1280px
1440px
```

انجام شود.

این‌ها Test View هستند و نباید الزاماً به عنوان Breakpointهای اصلی تعریف شوند.

---

# 83. Real Device Testing

Responsive فقط با Browser Resize کافی نیست.

تست شود:

```text
Android
iPhone
Tablet
Desktop
```

به‌خصوص:

```text
Keyboard
Safe Area
Touch
Orientation
Scrolling
```

---

# 84. RTL Testing

تست Responsive باید در RTL انجام شود.

موارد حساس:

```text
Drawer
Back Button
Breadcrumb
Tables
Horizontal Scroll
Icons
Arrows
Pagination
Progress
Charts
```

---

# 85. Dark Mode

Responsive Layout و Dark Mode باید مستقل باشند:

```text
Responsive
+
Theme Mode
```

نه اینکه برای Mobile Theme جداگانه ساخته شود.

---

# 86. Reduced Motion

در Responsive Components:

```text
prefers-reduced-motion
```

رعایت شود.

---

# 87. WordPress Admin

اگر Component داخل WordPress Admin استفاده شود:

```text
Admin CSS
Admin Sidebar
Admin Toolbar
```

نباید Layout افزونه را خراب کنند.

در نتیجه Namespace و Isolation اهمیت زیادی دارد.

---

# 88. Frontend Dashboard

در Frontend Dashboard نیز Theme ممکن است:

```text
Global box-sizing
Global button styles
Global typography
```

داشته باشد.

افزونه باید Componentهای حساس را Scoped کند.

---

# 89. CSS Isolation

ساختار پیشنهادی:

```text
.iran-lms
  .iran-lms-dashboard
  .iran-lms-course
  .iran-lms-table
  .iran-lms-modal
  .iran-lms-mobile-nav
```

---

# 90. No Theme Overrides

نباید نیاز باشد کاربر برای استفاده از افزونه CSS Theme را دستکاری کند.

در صورت Conflict باید:

```text
Namespace
Specific Component Tokens
CSS Layers
```

راه‌حل اصلی باشند.

---

# 91. Responsive JavaScript

JS فقط زمانی استفاده شود که CSS کافی نیست.

مثلاً:

```text
CSS
→ Grid
→ Flex
→ Container Query

JS
→ Drawer
→ Bottom Navigation State
→ Modal
→ Complex Interaction
```

---

# 92. Avoid Resize Logic Everywhere

نباید در هر Component:

```text
window.innerWidth
```

به صورت مستقل بررسی شود.

بهتر:

```text
Responsive Controller
+
CSS Media Queries
```

باشد.

---

# 93. Mobile Navigation State

مثلاً:

```text
closed
opening
open
closing
```

و با Focus Management هماهنگ باشد.

---

# 94. Responsive API

Componentها نباید API خود را صرفاً بر اساس Device تعریف کنند.

بد:

```text
isMobile
isTablet
isDesktop
```

در همه Componentها.

بهتر:

```text
variant
density
layout
```

و CSS Responsive تصمیم Layout را بگیرد.

---

# 95. Responsive Density

Componentها می‌توانند Density داشته باشند:

```text
comfortable
compact
```

مثلاً Table:

```text
Desktop → comfortable
Mobile → compact
```

---

# 96. Responsive Accessibility

Responsive نباید:

```text
aria-label
Focus
Keyboard
Semantic HTML
```

را تغییر دهد مگر برای الگوی Interaction متفاوت.

---

# 97. Responsive Documentation

هر Component جدید باید این موارد را مشخص کند:

```text
Desktop Layout
Tablet Layout
Mobile Layout
Collapse Rules
Hide Rules
Replace Rules
Interaction Changes
Accessibility
```

---

# 98. Definition of Done

```text
☐ Mobile First
☐ Desktop Support
☐ Tablet Support
☐ Responsive Container
☐ Responsive Grid
☐ Responsive Typography
☐ Responsive Spacing
☐ Responsive Cards
☐ Responsive Tables
☐ Responsive Forms
☐ Responsive Modals
☐ Responsive Navigation
☐ Responsive Sidebar
☐ Responsive Curriculum
☐ Responsive Course Detail
☐ Responsive Lesson Player
☐ Responsive Quiz
☐ Responsive Assignment
☐ Responsive Certificate
☐ Responsive Commerce
☐ Responsive Checkout
☐ Responsive Invoice
☐ Responsive Filters
☐ Responsive Search
☐ Responsive Pagination
☐ Responsive Charts
☐ Responsive Media
☐ Safe Area
☐ Keyboard Handling
☐ Orientation
☐ RTL
☐ LTR Content
☐ Accessibility
☐ Touch Targets
☐ Dark Mode
☐ Reduced Motion
☐ Theme Independence
☐ WordPress Admin Compatibility
☐ Frontend Compatibility
☐ Asset Isolation
☐ Modular Asset Loading
☐ Performance
☐ Real Device Testing
☐ No Horizontal Overflow
☐ Component Documentation
```

---

# 99. Final Architecture

```text
                 Iran LMS
                    │
            Responsive System
                    │
       ┌────────────┼────────────┐
       │            │            │
    Desktop       Tablet       Mobile
       │            │            │
       └────────────┼────────────┘
                    │
             Component System
                    │
      ┌─────────────┼─────────────┐
      │             │             │
    Layout       Content      Interaction
      │             │             │
   Grid/Flex    Priority      Touch/Drawer
   Container    Collapse      Sheet/Modal
```

---

# 100. Final Principle

> **Responsive در Iran LMS یک لایه مستقل از Theme و درون معماری خود افزونه است. هدف آن فقط کوچک‌کردن UI نیست؛ بلکه باید Layout، Content و Interaction را متناسب با فضای دستگاه تغییر دهد. اطلاعات مهم نباید صرفاً به دلیل کوچک‌شدن صفحه حذف شوند؛ بلکه باید با Card، Accordion، Bottom Sheet، Drawer یا Full-Screen View جایگزین شوند. تمام این رفتارها نیز باید با RTL، Accessibility، Modular Architecture، Performance و WordPress Compatibility هماهنگ باشند.**
