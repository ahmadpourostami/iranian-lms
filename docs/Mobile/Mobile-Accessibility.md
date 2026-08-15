# `07-Mobile/Mobile-Accessibility.md`

**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Mobile
**Feature:** Accessibility
**Version:** 1.0
**Status:** Foundation

> این سند Accessibility موبایل افزونه Iran LMS را تعریف می‌کند. مبنای آن Design System پروژه است که **RTL فارسی، Component-Based، WordPress Friendly و Modular Architecture** را جزو اصول اصلی قرار داده است. 

---

# 1. Purpose

هدف این سند این است که رابط Mobile افزونه برای بیشترین تعداد کاربران قابل استفاده باشد؛ از جمله کاربرانی که:

* از Screen Reader استفاده می‌کنند.
* محدودیت حرکتی دارند.
* با Touch دقت پایینی دارند.
* به Keyboard یا Switch Access نیاز دارند.
* به Contrast بالاتر نیاز دارند.
* از Zoom استفاده می‌کنند.
* در محیط‌های پرنور یا کم‌نور از موبایل استفاده می‌کنند.

---

# 2. Core Principles

Accessibility در Iran LMS باید:

```text
Perceivable
Operable
Understandable
Robust
```

باشد.

اما Accessibility نباید به صورت یک لایه جدا روی UI اضافه شود.

باید از ابتدا داخل Componentها طراحی شود.

---

# 3. Plugin Boundary

Accessibility مربوط به **UI افزونه Iran LMS** است.

نباید فرض کنیم Theme سایت:

```text
Accessible Header
Accessible Button
Accessible Modal
Accessible Navigation
```

دارد.

بنابراین Componentهای مهم افزونه باید Accessibility پایه خودشان را داشته باشند.

---

# 4. Mobile First Accessibility

تمام Componentها ابتدا برای Touch و Screen کوچک طراحی شوند:

```text
Mobile
↓
Touch
↓
Accessibility
↓
Responsive
```

و سپس به Desktop گسترش پیدا کنند.

---

# 5. RTL

Iran LMS رابط فارسی و RTL دارد. 

بنابراین Accessibility باید RTL را به عنوان حالت اصلی در نظر بگیرد.

```text
dir="rtl"
lang="fa"
```

در Root مربوط به UI افزونه باید به شکل صحیح مدیریت شود.

---

# 6. Direction Is Not Meaning

RTL نباید باعث تغییر معنای Actionها شود.

مثلاً:

```text
بعدی
قبلی
```

باید از نظر Semantic درست باشند، حتی اگر موقعیت بصری آن‌ها با LTR متفاوت باشد.

---

# 7. Touch Target

Interactive Elementها باید Touch Target مناسب داشته باشند.

حداقل طراحی:

```text
44 × 44 px
```

مثال:

```text
┌──────────────┐
│      🔖      │
└──────────────┘
```

خود Icon می‌تواند 20–24px باشد، اما Hit Area باید بزرگ‌تر باشد.

جزئیات Touch در `Mobile-Touch.md` تعریف شده است.

---

# 8. Small Icons

بد:

```text
     🔔
```

با Hit Area بسیار کوچک.

صحیح:

```text
┌────────────┐
│     🔔     │
└────────────┘
```

---

# 9. Adjacent Controls

دو Action نباید بیش از حد نزدیک باشند.

بد:

```text
[حذف][ویرایش]
```

بهتر:

```text
[ حذف ]   [ ویرایش ]
```

برای Actionهای خطرناک حتی فاصله بیشتری در نظر گرفته شود.

---

# 10. No Hover Dependency

Mobile نباید به Hover وابسته باشد.

بد:

```text
Hover
↓
Reveal Action
```

صحیح:

```text
Tap
↓
Reveal Action
```

---

# 11. Semantic HTML

تا حد امکان از عناصر Semantic استفاده شود:

```text
button
a
nav
main
header
section
form
label
input
```

به جای:

```text
<div onclick="...">
```

---

# 12. Button vs Link

اگر Action انجام می‌شود:

```text
button
```

اگر Navigation انجام می‌شود:

```text
a
```

استفاده شود.

مثال:

```text
[ذخیره]
```

→ Button

```text
[مشاهده دوره]
```

→ Link

---

# 13. Accessible Names

Icon-only Button باید Accessible Name داشته باشد.

بد:

```html
<button>
  🔖
</button>
```

صحیح:

```html
<button aria-label="نشان‌گذاری درس">
  🔖
</button>
```

---

# 14. Visible Labels

در Actionهای مهم بهتر است Icon به همراه Label باشد.

مثلاً:

```text
[ 📝 یادداشت ]
```

به جای:

```text
[ 📝 ]
```

خصوصاً در Mobile Focus Mode.

---

# 15. Screen Reader

Screen Reader باید بتواند ساختار صفحه را درک کند:

```text
Course
↓
Lesson
↓
Video
↓
Progress
↓
Actions
↓
Resources
```

---

# 16. Heading Hierarchy

Headingها باید منطقی باشند:

```text
h1
 ├── h2
 │    ├── h3
 │    └── h3
 └── h2
```

نباید صرفاً به دلیل ظاهر UI از Headingهای اشتباه استفاده شود.

---

# 17. Course Page

مثلاً:

```text
h1: آموزش React
h2: مسیر یادگیری
h2: آنچه یاد می‌گیرید
h2: مدرس
h2: نظرات
```

---

# 18. Lesson Page

در Lesson:

```text
h1: عنوان درس
h2: توضیحات درس
h2: فایل‌ها
h2: تمرین
h2: آزمون
```

ساختار باید با تجربه واقعی Lesson هماهنگ باشد.

Design Guide پروژه نیز Lesson را به بخش‌هایی مانند درس، فایل‌ها، تمرین، آزمون، پرسش و پاسخ و نظرات تقسیم کرده است. 

---

# 19. Landmarks

در صورت نیاز:

```text
header
nav
main
aside
footer
```

استفاده شود.

در Mobile Focus Mode تعداد Landmarkها کاهش پیدا کند.

---

# 20. Focus Mode

در Focus Mode:

```text
main
├── Video
├── Lesson
└── Essential Actions
```

باید ساختار ساده‌ای داشته باشد.

Design Guide نیز Focus Mode را به عنوان حالت کم‌حواس‌پرتی با حذف Sidebarها و حفظ Navigation و Notes تعریف کرده است. 

---

# 21. Keyboard Accessibility

حتی در Mobile، بعضی کاربران با:

```text
Bluetooth Keyboard
Switch Access
External Keyboard
```

کار می‌کنند.

بنابراین Componentهای تعاملی نباید فقط Touch-based باشند.

---

# 22. Focus Order

ترتیب Focus باید با ترتیب منطقی محتوا هماهنگ باشد.

مثلاً:

```text
Exit Focus
↓
Video
↓
Lesson Actions
↓
Notes
↓
Curriculum
↓
Next Lesson
```

---

# 23. No Positive tabindex

تا حد امکان از:

```html
tabindex="1"
tabindex="2"
```

استفاده نشود.

ترتیب DOM باید ترتیب منطقی Focus را ایجاد کند.

---

# 24. Focus Indicator

Focus State باید واضح باشد.

مثلاً:

```text
┌──────────────────────┐
│   ادامه درس          │
└──────────────────────┘
```

با Outline قابل تشخیص.

Focus نباید فقط با تغییر جزئی رنگ مشخص شود.

---

# 25. Focus vs Active

این دو State متفاوت‌اند:

```text
Focus
Active
```

نباید یکی جای دیگری استفاده شود.

---

# 26. Modal Focus

وقتی Modal باز می‌شود:

```text
Page
↓
Modal
↓
Focus inside Modal
```

Focus نباید پشت Modal سرگردان شود.

---

# 27. Return Focus

بعد از بستن Modal:

```text
Open Notes
↓
Notes Modal
↓
Close
↓
Focus → Notes Button
```

برگردد.

---

# 28. Bottom Sheet

برای Bottom Sheet:

```text
Open
↓
Move Focus
↓
Interact
↓
Close
↓
Restore Focus
```

---

# 29. Drawer

Drawer نیز باید Focus Management داشته باشد:

```text
Open Drawer
↓
Focus Drawer
↓
Navigate
↓
Close
↓
Return Focus
```

---

# 30. Escape / Back

اگر Device یا Keyboard امکان Escape/Back دارد:

```text
Escape
↓
Close Modal / Sheet
```

و:

```text
Back
↓
Close Sheet
```

قبل از Exit کامل صفحه انجام شود.

---

# 31. Screen Reader State

Stateهای Dynamic باید اعلام شوند.

مثلاً:

```text
درس با موفقیت تکمیل شد.
```

یا:

```text
یادداشت ذخیره شد.
```

---

# 32. Live Region

برای Feedbackهای کوتاه می‌توان از:

```html
aria-live="polite"
```

استفاده کرد.

برای Errorهای فوری:

```text
assertive
```

فقط در موارد ضروری.

---

# 33. Toast Accessibility

Toast نباید تنها راه اطلاع‌رسانی باشد.

مثلاً:

```text
یادداشت ذخیره شد.
```

باید برای Screen Reader نیز قابل اعلام باشد.

---

# 34. Snackbar Accessibility

Snackbar دارای Action باید:

```text
Message
+
Action
```

را برای Assistive Technology قابل دسترسی کند.

---

# 35. Notification

Notification باید وضعیت:

```text
Unread
Read
```

را به صورت Semantic منتقل کند.

---

# 36. Icons

Icon به تنهایی نباید معنی حیاتی را منتقل کند.

مثلاً:

```text
🔒
```

به تنهایی کافی نیست.

بهتر:

```text
🔒 درس قفل است
```

یا Accessible Label مناسب.

---

# 37. Decorative Icons

اگر Icon صرفاً تزئینی است:

```html
aria-hidden="true"
```

در نظر گرفته شود.

---

# 38. Images

Imageهای آموزشی باید Alt مناسب داشته باشند.

مثلاً:

```text
alt="نمایش ساختار کامپوننت React"
```

اما تصاویر تزئینی:

```text
alt=""
```

---

# 39. Course Thumbnail

اگر Thumbnail صرفاً تزئینی است:

```text
alt=""
```

عنوان Course باید متن واقعی و قابل دسترسی باشد.

---

# 40. Avatar

Avatar در صورتی که اطلاعات هویتی ارائه می‌کند:

```text
alt="تصویر مدرس دوره"
```

در غیر این صورت تزئینی باشد.

---

# 41. Video Accessibility

Video Player باید در صورت پشتیبانی:

```text
Play/Pause
Captions
Volume
Fullscreen
Playback Speed
```

را در اختیار کاربر قرار دهد.

---

# 42. Captions

برای محتوای ویدیویی آموزشی:

```text
Video
+
Captions
```

یک قابلیت بسیار مهم Accessibility است.

---

# 43. Transcript

در صورت وجود Transcript:

```text
مشاهده متن درس
```

به صورت قابل دسترسی ارائه شود.

---

# 44. Audio

برای محتوای Audio:

```text
Play
Pause
Seek
Volume
```

باید Accessible باشند.

---

# 45. Video Controls

هر Control باید:

```text
Accessible Name
Keyboard Support
Touch Target
Visible State
```

داشته باشد.

---

# 46. Lesson Progress

Progress نباید فقط با رنگ نمایش داده شود.

بد:

```text
████████░░
```

صحیح:

```text
████████░░
64٪ تکمیل شده
```

---

# 47. Status by Color

نباید فقط از رنگ استفاده شود.

بد:

```text
🟢
🔴
```

صحیح:

```text
✓ تکمیل شده
! نیازمند اقدام
```

---

# 48. Contrast

Text و UI باید Contrast کافی داشته باشند.

خصوصاً:

```text
Primary Text
Secondary Text
Disabled Text
Button Text
Placeholder
Progress
Badge
```

---

# 49. Purple Accent

رنگ Purple اصلی پروژه نباید تنها نشانه State باشد.

مثلاً Active Tab:

```text
Tab
────────
```

علاوه بر رنگ باید:

```text
aria-selected="true"
```

یا State مناسب داشته باشد.

---

# 50. Disabled State

Disabled نباید فقط با کم‌رنگ شدن تشخیص داده شود.

در صورت امکان:

```text
aria-disabled="true"
```

یا Native Disabled استفاده شود.

---

# 51. Error State

Error باید هم:

```text
Visual
```

و هم:

```text
Textual
```

باشد.

مثلاً:

```text
ایمیل وارد شده معتبر نیست.
```

---

# 52. Form Labels

هر Input باید Label داشته باشد.

بد:

```text
[ ایمیل خود را وارد کنید ]
```

به عنوان Placeholder تنها.

صحیح:

```text
ایمیل

[ __________________ ]
```

---

# 53. Placeholder

Placeholder نباید جای Label را بگیرد.

---

# 54. Required Fields

Required بودن باید واضح باشد:

```text
نام *
```

و برای Assistive Technology نیز Semantic مناسب داشته باشد.

---

# 55. Error Association

Error باید به Field مربوط شود.

```text
ایمیل
[ ... ]

خطا: ایمیل معتبر نیست.
```

و از `aria-describedby` یا ساختار Semantic مناسب استفاده شود.

---

# 56. Quiz Accessibility

Quiz باید برای هر سؤال:

```text
Question
Options
Selected State
Feedback
```

را قابل دسترسی کند.

---

# 57. Quiz Option

کل Option باید قابل انتخاب باشد:

```text
┌──────────────────────┐
│ ○ گزینه اول          │
└──────────────────────┘
```

نه فقط Radio کوچک.

---

# 58. Selected Answer

Selected State باید با بیش از یک نشانه مشخص شود:

```text
✓ انتخاب شده
```

به همراه Style بصری.

---

# 59. Quiz Timer

Timer آزمون نباید فقط با تغییر رنگ هشدار دهد.

مثلاً:

```text
زمان باقی‌مانده: 02:15
```

---

# 60. Assignment

Assignment شامل Upload است و Design Guide نیز Drag & Drop Upload را تعریف کرده است. 

در Mobile باید مسیر جایگزین ساده وجود داشته باشد:

```text
[ انتخاب فایل ]
```

---

# 61. File Upload Accessibility

کاربر باید بتواند با:

```text
Touch
Keyboard
Screen Reader
```

فایل انتخاب کند.

---

# 62. File Status

پس از Upload:

```text
فایل انتخاب شد
در حال بارگذاری
بارگذاری موفق
خطا
```

باید قابل تشخیص باشد.

---

# 63. Tables

Tableهای Mobile باید برای Screen Reader قابل فهم باشند.

در صورت پیچیدگی زیاد:

```text
Table
↓
Responsive Card/List
```

می‌تواند استفاده شود.

---

# 64. Mobile Tables

نباید صرفاً Table را با:

```text
overflow-x: scroll
```

حل کنیم.

در صورت امکان ساختار Mobile مناسب ارائه شود.

---

# 65. Tabs

Tabها باید Semantic باشند.

```text
Tablist
 ├── Tab
 ├── Tab
 └── Tab
```

و Panel مربوطه مشخص باشد.

---

# 66. Bottom Tabs

در Lesson:

```text
درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
نظرات
```

باید Active State هم بصری و هم Semantic باشد. این ساختار در Design Guide پروژه آمده است. 

---

# 67. Swipe Accessibility

هیچ Feature مهمی نباید فقط با Swipe قابل استفاده باشد.

بد:

```text
Swipe Only
```

صحیح:

```text
Swipe
+
Button
```

---

# 68. Carousel Accessibility

Carousel باید:

```text
Previous
Next
Current Position
```

را قابل درک کند.

مثلاً:

```text
درس 2 از 5
```

---

# 69. Focus Mode Accessibility

Focus Mode باید:

```text
Minimal UI
+
Full Accessibility
```

داشته باشد.

Minimal به معنی حذف Accessibility نیست.

---

# 70. Focus Mode Reading Order

ترتیب پیشنهادی:

```text
Exit Focus
↓
Lesson Title
↓
Video
↓
Progress
↓
Notes
↓
Curriculum
↓
Previous / Next
```

---

# 71. Focus Mode Screen Reader

کاربر باید بداند وارد Focus Mode شده است.

مثلاً:

```text
Focus Mode، عنوان درس: مقدمه React
```

---

# 72. Focus Mode Exit

Action خروج باید همیشه قابل پیدا کردن باشد.

```text
خروج از حالت تمرکز
```

نباید فقط Icon باشد.

---

# 73. Reduced Motion

اگر کاربر Motion را کاهش داده باشد:

```text
prefers-reduced-motion
```

Animationهای غیرضروری کاهش پیدا کنند.

---

# 74. Animation

Animation نباید برای فهم State ضروری باشد.

بد:

```text
Animation = Meaning
```

صحیح:

```text
Animation
+
State
```

---

# 75. Loading

Loading باید برای Screen Reader قابل اعلام باشد.

مثلاً:

```text
در حال بارگذاری...
```

---

# 76. Skeleton

Skeleton نباید محتوای واقعی را برای Screen Reader به شکل نامفهوم ارائه کند.

در صورت Loading:

```text
aria-busy="true"
```

در Container مناسب قابل استفاده است.

---

# 77. Loader

Loader:

```text
⟳
```

به تنهایی کافی نیست.

بهتر:

```text
در حال ذخیره...
```

---

# 78. Network State

در صورت خطای شبکه:

```text
ارتباط با سرور برقرار نشد.

[ تلاش مجدد ]
```

پیام باید واضح باشد.

---

# 79. Offline

اگر Feature قابلیت Offline ندارد، UI نباید وانمود کند که عملیات انجام شده است.

---

# 80. Touch + Accessibility

Touch Area بزرگ:

```text
44×44
```

و Semantic Name:

```text
aria-label
```

دو موضوع جدا هستند.

هر دو باید رعایت شوند.

---

# 81. Haptic

Haptic نباید تنها Feedback باشد.

بد:

```text
Haptic
↓
No Visual / Audio Feedback
```

صحیح:

```text
Haptic
+
Visual
+
Optional Announcement
```

---

# 82. Device Font Scaling

UI نباید با بزرگ شدن Font به هم بریزد.

موارد حساس:

```text
Button
Card
Tab
Modal
Bottom Sheet
Navigation
```

---

# 83. Text Wrapping

عنوان‌های فارسی ممکن است طولانی شوند.

بنابراین:

```text
No fixed-height text containers
```

برای متن‌های متغیر تا حد امکان.

---

# 84. Dynamic Content

Course Title، Lesson Title و Instructor Name نباید با Width ثابت باعث:

```text
Text Clipping
```

شوند.

---

# 85. Zoom

کاربر نباید برای استفاده از UI مجبور به Zoom باشد.

اما اگر Zoom استفاده شد:

```text
No Broken Layout
No Hidden Controls
No Horizontal Chaos
```

---

# 86. Orientation

Accessibility باید در هر دو حالت بررسی شود:

```text
Portrait
Landscape
```

خصوصاً برای Lesson Player و Video.

---

# 87. Safe Area

در Deviceهای دارای Notch:

```text
Header
Bottom Actions
Bottom Sheet
Navigation
```

نباید پشت Safe Area قرار بگیرند.

---

# 88. Sticky Actions

Sticky CTA نباید محتوای مهم را بپوشاند.

---

# 89. Mobile Navigation

Navigation موبایل باید:

```text
Predictable
Consistent
Accessible
```

باشد.

---

# 90. WordPress Compatibility

Accessibility Componentها نباید به CSS یا JS یک Theme خاص متکی باشند.

---

# 91. CSS Isolation

Scope پیشنهادی:

```text
.iran-lms
  .iran-lms-mobile
```

و برای Component:

```text
.iran-lms-button
.iran-lms-modal
.iran-lms-tabs
```

---

# 92. JavaScript Isolation

Eventهای Accessibility و Keyboard نباید Global باشند مگر ضرورت داشته باشد.

به خصوص:

```text
keydown
touchstart
touchmove
focus
```

باید Scoped و مدیریت‌شده باشند.

---

# 93. Modular Architecture

اگر Module خاموش باشد:

```text
Certificate Disabled
↓
Certificate UI Removed
↓
Accessibility Tree Still Valid
```

Layout نباید خراب شود.

این با اصل Modular Architecture پروژه سازگار است؛ ماژول‌های غیرفعال باید بدون شکستن Layout حذف شوند. 

---

# 94. Accessibility of Optional Modules

برای:

```text
WooCommerce
Certificate
Wallet
Gamification
Attendance
Homework
Survey
Forum
```

هر Module مسئول Accessibility Componentهای خودش است.

---

# 95. Testing Devices

حداقل تست:

```text
☐ Android Phone
☐ iPhone
☐ Small Screen
☐ Large Screen
☐ Portrait
☐ Landscape
```

---

# 96. Assistive Technology Testing

```text
☐ TalkBack
☐ VoiceOver
☐ Switch Access
☐ External Keyboard
```

در صورت دسترسی به Device/Environment مناسب.

---

# 97. Screen Reader Test

سناریوی اصلی:

```text
Login
↓
Dashboard
↓
My Courses
↓
Course
↓
Lesson
↓
Play Video
↓
Notes
↓
Complete Lesson
↓
Next Lesson
```

کاربر باید بتواند کل مسیر را بدون Mouse/Visual Pointer طی کند.

---

# 98. Quiz Test

```text
Open Quiz
↓
Read Question
↓
Select Option
↓
Next
↓
Submit
↓
Read Result
```

---

# 99. Assignment Test

```text
Open Assignment
↓
Read Deadline
↓
Choose File
↓
Upload
↓
Read Status
↓
Submit
```

---

# 100. Focus Mode Test

```text
Enter Focus Mode
↓
Read Lesson Title
↓
Operate Video
↓
Open Notes
↓
Open Curriculum
↓
Next Lesson
↓
Exit Focus
```

---

# 101. Accessibility Checklist

```text
☐ RTL
☐ Semantic HTML
☐ Accessible Names
☐ Heading Hierarchy
☐ Landmarks
☐ Touch Target
☐ Keyboard Support
☐ Focus Order
☐ Focus Indicator
☐ Focus Trap
☐ Focus Restoration
☐ Screen Reader
☐ Live Region
☐ Image Alt
☐ Decorative Icon Handling
☐ Video Controls
☐ Captions
☐ Transcript
☐ Form Labels
☐ Form Errors
☐ Quiz Accessibility
☐ Assignment Accessibility
☐ Table Accessibility
☐ Tabs Accessibility
☐ Carousel Accessibility
☐ Focus Mode Accessibility
☐ Reduced Motion
☐ Contrast
☐ Color Independence
☐ Font Scaling
☐ Zoom
☐ Safe Area
☐ Portrait
☐ Landscape
☐ Network Error
☐ Loading State
☐ WordPress Compatibility
☐ Theme Independence
☐ Module Independence
```

---

# 102. Definition of Done

فایل زمانی کامل محسوب می‌شود که:

```text
☐ تمام Interactive Components Accessible باشند
☐ Touch Targetها استاندارد باشند
☐ Screen Reader بتواند مسیر اصلی Learning را طی کند
☐ Keyboard/Assistive Input پشتیبانی شود
☐ Focus Management صحیح باشد
☐ Modal و Bottom Sheet Accessible باشند
☐ Video Player Accessible باشد
☐ Quiz Accessible باشد
☐ Assignment Accessible باشد
☐ Focus Mode Accessible باشد
☐ RTL بدون مشکل کار کند
☐ Dynamic Stateها اعلام شوند
☐ Color تنها روش انتقال اطلاعات نباشد
☐ Font Scaling Layout را خراب نکند
☐ Reduced Motion رعایت شود
☐ Theme Dependency وجود نداشته باشد
☐ Pluginهای دیگر تحت تأثیر قرار نگیرند
```

---

# 103. Final Architecture

```text
                    Iran LMS Mobile
                           │
                    Accessibility
                           │
       ┌───────────────────┼───────────────────┐
       │                   │                   │
   Perceivable          Operable          Understandable
       │                   │                   │
   ├── Contrast        ├── Touch           ├── Labels
   ├── Text            ├── Keyboard        ├── Errors
   ├── Images          ├── Focus            ├── Instructions
   ├── Captions        ├── Navigation       └── Feedback
   └── States          └── Gestures
                           │
                           ↓
                    Robust Components
                           │
                    WordPress Plugin
                           │
              ┌────────────┴────────────┐
              │                         │
        Theme Independent          Modular
```

---

# 104. Final Principle

> **Accessibility در Iran LMS یک Feature جانبی نیست؛ بخشی از معماری Componentهای افزونه است. هر چیزی که کاربر می‌تواند لمس کند، باید تا حد امکان با Assistive Technology نیز قابل استفاده باشد. Mobile Accessibility باید هم‌زمان Touch، Keyboard/Assistive Input، Screen Reader، RTL، Contrast، Focus Management، Dynamic Feedback، Video، Quiz، Assignment و Focus Mode را پوشش دهد؛ بدون اینکه به Theme یا Plugin دیگری وابسته شود.**
