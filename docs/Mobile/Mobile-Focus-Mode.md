# `07-Mobile/Mobile-Focus-Mode.md`

**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Mobile
**Feature:** Focus Mode
**Version:** 1.0
**Status:** Foundation

> این سند، نسخه موبایل **Focus Mode** را برای افزونه WordPress ما تعریف می‌کند. مبنا، راهنمای اصلی UI پروژه است که Focus Mode را به‌عنوان محیطی با **حذف Sidebarها، ویدیوی بزرگ، حداقل حواس‌پرتی و نگه‌داشتن Navigation و Notes** تعریف کرده است. 

---

# 1. Purpose

Focus Mode یک حالت ویژه برای مطالعه است که کاربر را از UIهای غیرضروری جدا می‌کند تا تمرکز روی محتوای آموزشی بیشتر شود.

اصل اصلی:

```text
Normal Lesson
      ↓
Enter Focus Mode
      ↓
Minimal Learning Environment
      ↓
Exit Focus Mode
      ↓
Normal Lesson
```

---

# 2. Plugin Boundary

Focus Mode بخشی از **افزونه Iran LMS** است، نه Theme.

بنابراین نباید به:

```text
Theme Header
Theme Sidebar
Theme Footer
Theme Navigation
```

وابسته باشد.

Focus Mode باید بتواند داخل Frontend سایت‌هایی که Themeهای مختلف دارند، به شکل مستقل اجرا شود.

---

# 3. Focus Mode Goal

در حالت Focus:

```text
Hide
├── Course Sidebar
├── Dashboard Navigation
├── Promotional Widgets
├── Unnecessary Statistics
├── Secondary Content
└── Non-essential Actions
```

و نگه‌داری:

```text
Keep
├── Lesson Content
├── Video Player
├── Essential Navigation
├── Progress
├── Notes
└── Exit Focus
```

این دقیقاً با پیشنهاد Focus Mode در Design Guide پروژه هماهنگ است. 

---

# 4. Mobile Philosophy

در Mobile Focus Mode باید حتی ساده‌تر از Desktop باشد.

```text
Desktop Focus
      ↓
Minimal UI

Mobile Focus
      ↓
Ultra Minimal UI
```

چون فضای صفحه بسیار محدودتر است.

---

# 5. Mobile Structure

ساختار پیشنهادی:

```text
┌──────────────────────┐
│ ←  Focus Mode   ⋮    │
├──────────────────────┤
│                      │
│      Video           │
│                      │
│                      │
├──────────────────────┤
│ Lesson Title         │
│ Progress             │
├──────────────────────┤
│ Notes / Navigation   │
└──────────────────────┘
```

---

# 6. Focus Header

Header باید بسیار کوچک باشد.

مثلاً:

```text
←    Focus Mode       ⋮
```

یا:

```text
←    عنوان درس       ⋮
```

---

# 7. Header Actions

حداکثر Actionهای اصلی:

```text
Back / Exit Focus
More
```

و در صورت نیاز:

```text
Lesson Progress
```

نباید Header با Actionهای متعدد شلوغ شود.

---

# 8. Exit Focus

کاربر همیشه باید بتواند Focus Mode را ترک کند.

مثلاً:

```text
[ خروج از فوکوس ]
```

یا:

```text
← بازگشت
```

در طراحی Focus Mode موجود نیز Action مشخص «خروج از فوکوس» وجود دارد. 

---

# 9. Video Priority

Video باید مهم‌ترین عنصر صفحه باشد.

```text
Focus Mode
      ↓
Video
      ↓
Lesson Content
      ↓
Secondary Actions
```

---

# 10. Responsive Video

Video در Mobile:

```text
width: 100%;
aspect-ratio: 16 / 9;
```

باشد.

در حالت Landscape:

```text
Full Viewport
```

در صورت پشتیبانی Player.

---

# 11. Video Controls

Controls اصلی:

```text
Play
Pause
Seek
Volume
Speed
Fullscreen
```

باید Touch Friendly باشند.

جزئیات Touch در `Mobile-Touch.md` تعریف شده است.

---

# 12. Auto Hide Controls

در Focus Mode:

```text
Tap Video
↓
Controls Visible
↓
Idle
↓
Controls Hidden
```

رفتار مناسب است.

اما کاربر باید بتواند با یک Tap دوباره Controls را نمایش دهد.

---

# 13. Lesson Information

اطلاعات زیر باید بعد از Video قابل دسترسی باشند:

```text
Lesson Title
Lesson Type
Duration
Instructor
Progress
```

نمونه Lesson Player پروژه همین اطلاعات را زیر Video نمایش می‌دهد. 

---

# 14. Mobile Information Hierarchy

ترتیب پیشنهادی:

```text
Video
↓
Lesson Title
↓
Progress
↓
Primary Actions
↓
Description
↓
Resources
```

---

# 15. Primary Action

Action اصلی می‌تواند:

```text
[ ادامه درس بعدی ]
```

یا:

```text
[ علامت‌گذاری به عنوان انجام شده ]
```

باشد.

---

# 16. Notes

Notes یکی از عناصر اصلی Focus Mode است.

Design Guide صراحتاً اشاره می‌کند:

> Keep only navigation and notes

بنابراین Notes نباید در Mobile حذف شود. 

---

# 17. Notes Interaction

در Mobile:

```text
یادداشت
↓
Tap
↓
Bottom Sheet
```

مناسب است.

ساختار:

```text
┌──────────────────────┐
│ یادداشت شخصی     ×   │
├──────────────────────┤
│                      │
│ متن یادداشت...       │
│                      │
├──────────────────────┤
│ [ ذخیره یادداشت ]    │
└──────────────────────┘
```

---

# 18. Quick Notes

در صورت نیاز، یک Action کوچک:

```text
📝 یادداشت
```

در کنار Video یا پایین آن قرار گیرد.

---

# 19. Bookmark

Bookmark می‌تواند کنار Notes قرار گیرد:

```text
[ 🔖 ] [ 📝 ]
```

اما در حالت خیلی محدود:

```text
⋮
↓
یادداشت
نشان‌گذاری
```

قرار گیرد.

---

# 20. Lesson Navigation

Focus Mode باید Navigation ضروری را نگه دارد.

```text
درس قبلی
      |
      |
درس بعدی
```

در Mobile بهتر است:

```text
[ درس قبلی ] [ درس بعدی ]
```

در انتهای محتوا باشد.

---

# 21. Sticky Navigation

برای Lessonهای طولانی:

```text
┌──────────────────────┐
│                      │
│ Content              │
│                      │
├──────────────────────┤
│ قبلی    بعدی         │
└──────────────────────┘
```

می‌تواند Sticky باشد.

اما نباید بخش مهم Video را بپوشاند.

---

# 22. Progress

Progress باید ساده باشد:

```text
64%
```

یا:

```text
24 از 38 درس
```

به همراه Progress Bar.

---

# 23. Progress Header

نمونه:

```text
پیشرفت دوره
██████████░░ 64%
```

در Header یا زیر Lesson Title.

---

# 24. Curriculum

در Focus Mode Curriculum نباید دائماً نمایش داده شود.

به جای آن:

```text
☰ سرفصل‌ها
```

و سپس:

```text
Bottom Sheet / Drawer
```

باز شود.

---

# 25. Mobile Curriculum Sheet

```text
┌──────────────────────┐
│ سرفصل‌های دوره    ×  │
├──────────────────────┤
│ ۱. مقدمه             │
│   ✓ درس ۱            │
│   ● درس ۲            │
│   ○ درس ۳            │
│                      │
│ ۲. مفاهیم پایه       │
│   ○ درس ۴            │
└──────────────────────┘
```

---

# 26. Lesson Search

Search Curriculum در Focus Mode باید فقط هنگام باز شدن Curriculum در دسترس باشد.

```text
سرفصل‌ها
↓
جستجو
```

نه اینکه Search دائماً صفحه را اشغال کند.

---

# 27. Bottom Navigation

Bottom Navigation اصلی Dashboard باید در Focus Mode حذف شود.

```text
Focus Mode
≠
Dashboard
```

بنابراین:

```text
Home
Courses
Profile
Notifications
Wallet
```

نباید در حالت Focus دائماً نمایش داده شوند.

---

# 28. Essential Navigation

فقط:

```text
Exit Focus
Previous Lesson
Next Lesson
Curriculum
Notes
```

باقی بماند.

---

# 29. Focus Mode from Lesson

Flow:

```text
Lesson Player
      ↓
[ Focus Mode ]
      ↓
Focus Mode
```

---

# 30. Enter Animation

ورود به Focus Mode می‌تواند:

```text
Normal UI
↓
Sidebars disappear
↓
Video expands
```

باشد.

Animation باید کوتاه و نرم باشد.

---

# 31. Exit Animation

```text
Focus Mode
↓
Exit
↓
Normal Lesson Layout
```

State فعلی Lesson باید حفظ شود.

---

# 32. State Preservation

خروج از Focus Mode نباید باعث از دست رفتن:

```text
Video Position
Lesson Progress
Notes
Bookmark
Quiz State
```

شود.

---

# 33. Video Position

مثلاً:

```text
08:45
```

کاربر وارد Focus شود:

```text
08:45
```

و پس از خروج نیز همان موقعیت حفظ شود.

---

# 34. Orientation

Portrait:

```text
Video
↓
Content
↓
Actions
```

Landscape:

```text
Full Screen Video
```

اولویت دارد.

---

# 35. Landscape Focus

ساختار:

```text
┌──────────────────────────────┐
│                              │
│                              │
│            VIDEO             │
│                              │
│                              │
└──────────────────────────────┘
```

Controls روی Video Overlay شوند.

---

# 36. Portrait Focus

```text
┌──────────────────────┐
│ Header               │
├──────────────────────┤
│ Video                │
├──────────────────────┤
│ Lesson               │
│ Progress             │
│ Actions              │
├──────────────────────┤
│ Notes                │
└──────────────────────┘
```

---

# 37. Fullscreen

Full Screen باید:

```text
Video Fullscreen
```

را از:

```text
Focus Mode Fullscreen
```

متمایز کند.

این دو State یکسان نیستند.

---

# 38. Focus Fullscreen

Focus Fullscreen:

```text
Video
+
Essential Controls
+
Minimal Navigation
```

را نگه می‌دارد.

---

# 39. Video Fullscreen

Video Fullscreen ممکن است فقط:

```text
Video
Player Controls
```

را نمایش دهد.

---

# 40. Focus Timer

Focus Mode اصلی Iran LMS الزاماً Timer ندارد.

در صورت فعال شدن Module مربوط به Focus Timer، می‌توان Timer را اضافه کرد.

Mockup Focus Mode موجود پروژه یک Timer مرکزی با حالت «تمرکز»، زمان `25:00` و انتخاب مدت جلسه دارد. 

بنابراین Timer باید **Feature قابل فعال/غیرفعال** باشد، نه وابستگی اجباری Focus Mode.

---

# 41. Timer Architecture

```text
Focus Mode
├── Lesson Focus
└── Focus Timer [Optional]
```

---

# 42. Focus Timer Mobile

در صورت فعال بودن:

```text
┌──────────────────────┐
│      تمرکز           │
│                      │
│      25:00           │
│                      │
│       [ شروع ]       │
└──────────────────────┘
```

---

# 43. Timer Sessions

در صورت فعال بودن:

```text
جلسه 1 از 4
```

و Session State:

```text
Upcoming
Active
Completed
```

باشد.

Mockup موجود برای جلسات امروز همین مفهوم را با Sessionهای 25 دقیقه‌ای و وضعیت‌های مختلف نمایش می‌دهد. 

---

# 44. Ambient Sound

Ambient Sound نیز باید Optional باشد.

در Mockup Focus Mode گزینه‌هایی مانند:

```text
بدون صدا
باران ملایم
جنگل
امواج دریا
کافه آرام
آتش شومینه
```

وجود دارد. 

در Mobile این موارد بهتر است به:

```text
🔊 صدای محیط
```

تبدیل شوند و انتخاب‌ها در Bottom Sheet نمایش داده شوند.

---

# 45. Focus Settings

Settings در Mobile نباید صفحه اصلی Focus را شلوغ کند.

```text
⚙ تنظیمات
```

↓

```text
Bottom Sheet
```

---

# 46. Optional Settings

بر اساس Mockup موجود:

```text
مسدود کردن اعلان‌ها
قفل کردن دوره
شروع خودکار وقفه
پس‌زمینه تیره
```

می‌توانند در Settings باشند. 

اما هر مورد باید وابسته به قابلیت/Module مربوطه باشد.

---

# 47. Module Independence

اگر یک Feature فعال نباشد:

```text
Focus Mode
├── Timer
├── Ambient Sound
├── Focus Settings
├── Notes
└── Bookmark
```

هر Feature باید مستقل باشد.

مثلاً:

```text
Timer Disabled
↓
Focus Mode Still Works
```

---

# 48. Notifications

در Focus Mode، اعلان‌های غیرضروری نباید مزاحم باشند.

در صورت فعال بودن قابلیت:

```text
Block Notifications
```

می‌تواند فعال شود.

اما این Block باید متعلق به **سیستم/اپلیکیشن مجاز** باشد و نباید ادعای کنترل Notificationهای سیستم‌عامل را در UI افزونه ایجاد کند مگر واقعاً Platform آن را پشتیبانی کند.

---

# 49. Dark Mode

Focus Mode می‌تواند Dark Mode داشته باشد.

هدف:

```text
Reduced Visual Distraction
```

است.

اما Dark Mode نباید Feature مستقل از Theme System پروژه شود.

---

# 50. Mobile Dark Focus

```text
Background
↓
Dark Neutral

Video
↓
High Contrast

Controls
↓
Low Distraction
```

---

# 51. Accessibility

Focus Mode باید:

```text
Keyboard Accessible
Screen Reader Accessible
Touch Accessible
Focus Managed
```

باشد.

---

# 52. Focus Trap

در Bottom Sheet و Modalهای Focus:

```text
Open
↓
Focus Inside
↓
Close
↓
Return Focus
```

باید رعایت شود.

---

# 53. Screen Reader

عناصر مهم:

```text
Exit Focus
Open Curriculum
Add Note
Bookmark
Next Lesson
Previous Lesson
```

باید Label معنایی داشته باشند.

---

# 54. Touch

Touch Targetها حداقل استاندارد پروژه Mobile را رعایت کنند.

برای Icon-only Actionها:

```text
Icon ≠ Touch Target
```

و Hit Area بزرگ‌تر از خود Icon باشد.

---

# 55. No Accidental Exit

اگر خروج از Focus ممکن است Progress یا حالت مهمی را تحت تأثیر قرار دهد:

```text
Exit
↓
Confirmation
```

فقط در موارد لازم نمایش داده شود.

برای خروج عادی از Focus نباید Confirmation آزاردهنده باشد.

---

# 56. Back Button

در Android / Browser Back:

```text
Focus Mode
↓
Back
↓
Exit Focus
```

باید رفتار قابل پیش‌بینی داشته باشد.

اگر Modal/Sheet باز است:

```text
Back
↓
Close Sheet
```

و سپس Back بعدی:

```text
Exit Focus
```

باشد.

---

# 57. Browser Back State

ترتیب پیشنهادی:

```text
Focus
   ↓
Open Curriculum
   ↓
Back
   ↓
Close Curriculum
   ↓
Back
   ↓
Exit Focus
```

---

# 58. URL State

در صورت نیاز معماری افزونه می‌تواند Focus Mode را در URL State ذخیره کند:

```text
?focus=1
```

یا مسیر مستقل داشته باشد.

اما این تصمیم باید با Routing Architecture پروژه هماهنگ شود.

---

# 59. WordPress Routing

Focus Mode نباید به URLهای Theme وابسته باشد.

اگر از Query Arg یا Rewrite Rule استفاده شود، باید Namespace افزونه داشته باشد.

---

# 60. Performance

Focus Mode باید حتی سبک‌تر از Lesson Player عادی باشد.

هنگام ورود:

```text
Hide UI
↓
Reduce DOM Work
↓
Focus Video
```

---

# 61. Asset Loading

Assetهای غیرضروری Focus:

```text
Dashboard Charts
Commerce Widgets
Instructor Directory
Marketplace Components
```

نباید صرفاً به دلیل باز شدن Focus Mode Load شوند.

---

# 62. JavaScript

JS Focus Mode باید Module-based باشد:

```text
FocusMode
├── State
├── Navigation
├── Video
├── Notes
├── Curriculum
├── Timer [optional]
└── Settings [optional]
```

---

# 63. State Model

```text
focus: false
focus: true
```

و Stateهای داخلی:

```text
videoState
curriculumOpen
notesOpen
settingsOpen
timerState
```

از هم مستقل باشند.

---

# 64. Focus Mode State

```text
idle
active
paused
exiting
```

در صورت وجود Timer:

```text
timerIdle
timerRunning
timerPaused
timerCompleted
```

---

# 65. No Theme Dependency

Focus Mode نباید برای اجرا به این موارد نیاز داشته باشد:

```text
theme-sidebar
theme-header
theme-container
theme-modal
theme-button
```

---

# 66. CSS Isolation

Scope پیشنهادی:

```text
.iran-lms
  .iran-lms-focus-mode
    .iran-lms-focus-header
    .iran-lms-focus-player
    .iran-lms-focus-notes
    .iran-lms-focus-curriculum
```

---

# 67. Desktop / Mobile Relationship

```text
Focus Mode
├── Desktop Focus
└── Mobile Focus
```

هر دو از یک Component System استفاده می‌کنند.

Mobile نباید یک Feature مستقل و جداگانه باشد که منطق دیگری داشته باشد.

---

# 68. Responsive Transformation

Desktop:

```text
Video
+
Navigation
+
Notes
```

Mobile:

```text
Video
↓
Navigation Sheet
↓
Notes Sheet
```

یعنی **Layout تغییر می‌کند، Feature تغییر نمی‌کند.**

---

# 69. Mobile Focus Components

```text
MobileFocusHeader
MobileFocusPlayer
MobileFocusProgress
MobileFocusActions
MobileFocusNotes
MobileFocusCurriculum
MobileFocusSettings
MobileFocusTimer [optional]
```

---

# 70. Component Rules

هر Component باید:

```text
RTL
Responsive
Touch Friendly
Accessible
Theme Independent
```

باشد.

---

# 71. Error State

اگر Video Load نشد:

```text
ویدیو بارگذاری نشد

[ تلاش مجدد ]
```

Focus Mode نباید صفحه خالی نشان دهد.

---

# 72. Network Failure

در صورت قطع اینترنت:

```text
Connection Lost

[ تلاش مجدد ]
```

و در صورت امکان:

```text
آخرین وضعیت درس
```

حفظ شود.

---

# 73. Empty Notes

اگر Note وجود ندارد:

```text
هنوز یادداشتی ثبت نکرده‌اید.

[ افزودن یادداشت ]
```

---

# 74. Curriculum Empty State

اگر Curriculum در دسترس نباشد:

```text
سرفصل‌های دوره در دسترس نیست.
```

Focus Mode همچنان باید قابل استفاده باشد.

---

# 75. Optional Features

معماری نهایی:

```text
Focus Mode
│
├── Core
│   ├── Player
│   ├── Navigation
│   ├── Progress
│   └── Exit
│
├── Learning
│   ├── Notes
│   ├── Bookmark
│   └── Curriculum
│
└── Optional
    ├── Timer
    ├── Ambient Sound
    ├── Focus Statistics
    └── Focus Settings
```

---

# 76. Focus Statistics

در صورت فعال بودن، Statistics نباید فضای اصلی Mobile را اشغال کند.

مثلاً:

```text
آمار تمرکز
```

↓

```text
Bottom Sheet
```

Mockup موجود آمارهایی مانند زمان تمرکز، تعداد جلسات و میانگین هر جلسه را نشان می‌دهد. 

---

# 77. Focus Tips

Tips در Mobile بهتر است:

```text
💡 نکات تمرکز
```

به صورت Collapsible نمایش داده شوند.

در Mockup موجود پیشنهادهایی مانند فعال کردن Do Not Disturb، تعیین هدف جلسه و مطالعه در محیط آرام وجود دارد. 

---

# 78. Main Mobile Layout

نسخه نهایی پیشنهادی:

```text
┌──────────────────────┐
│ ←  Focus       ⋮     │
├──────────────────────┤
│                      │
│        VIDEO         │
│                      │
├──────────────────────┤
│ درس ۱                │
│ مقدمه‌ای بر React    │
│ ████████░░ 64%       │
├──────────────────────┤
│ 🔖    📝    ☰        │
├──────────────────────┤
│ توضیحات درس          │
│ ...                  │
├──────────────────────┤
│ [ درس قبلی ][ بعدی ] │
└──────────────────────┘
```

---

# 79. Ultra Focus Layout

برای حالت حداکثری:

```text
┌──────────────────────┐
│              ×       │
│                      │
│                      │
│        VIDEO         │
│                      │
│                      │
│                      │
└──────────────────────┘
```

و Controls فقط هنگام تعامل نمایش داده شوند.

---

# 80. Focus Mode Entry Checklist

```text
☐ Hide Dashboard Navigation
☐ Hide Course Sidebars
☐ Expand Player
☐ Preserve Video Position
☐ Preserve Lesson State
☐ Keep Exit Action
☐ Keep Essential Navigation
☐ Keep Notes
☐ Keep Bookmark
☐ Preserve RTL
```

---

# 81. Mobile Checklist

```text
☐ Portrait
☐ Landscape
☐ Touch Targets
☐ Video Responsive
☐ Notes Sheet
☐ Curriculum Sheet
☐ Settings Sheet
☐ Back Button
☐ Safe Area
☐ Bottom Navigation Removed
☐ Sticky Actions
☐ Dark Mode
☐ Accessibility
☐ Screen Reader
☐ Keyboard
```

---

# 82. WordPress Plugin Checklist

```text
☐ Theme Independent
☐ CSS Scoped
☐ JS Scoped
☐ No Global Event Conflicts
☐ Modular Assets
☐ Optional Features
☐ No Required Theme Components
☐ Frontend Compatible
☐ WordPress Admin Unaffected
☐ Other Plugins Unaffected
```

---

# 83. Definition of Done

```text
☐ Focus Mode Entry
☐ Focus Mode Exit
☐ Mobile Header
☐ Responsive Video
☐ Video Controls
☐ Lesson Information
☐ Progress
☐ Notes
☐ Bookmark
☐ Previous / Next
☐ Curriculum Sheet
☐ Touch Support
☐ Back Button
☐ Portrait
☐ Landscape
☐ Fullscreen
☐ Safe Area
☐ Accessibility
☐ RTL
☐ Dark Mode
☐ Error States
☐ Network States
☐ State Preservation
☐ Theme Independence
☐ WordPress Compatibility
☐ Modular Architecture
☐ Optional Timer
☐ Optional Ambient Sound
☐ Optional Focus Statistics
☐ Performance
```

---

# 84. Final Architecture

```text
                    Iran LMS
                       │
                  Lesson Player
                       │
                  Focus Mode
                       │
          ┌────────────┼────────────┐
          │            │            │
        Core         Learning     Optional
          │            │            │
       Player        Notes        Timer
       Progress      Bookmark     Sound
       Exit          Curriculum   Statistics
       Navigation                 Settings
          │            │            │
          └────────────┼────────────┘
                       │
                  Mobile Layer
                       │
          ┌────────────┼────────────┐
          │            │            │
       Portrait    Landscape    Fullscreen
```

---

# 85. Final Principle

> **Mobile Focus Mode در Iran LMS یک صفحه جدید مستقل از سیستم آموزشی نیست؛ یک حالت نمایشی و تعاملی از Lesson Player افزونه است. این حالت باید Sidebarها و حواس‌پرتی‌ها را حذف کند، Video و محتوای آموزشی را در اولویت قرار دهد و فقط Navigation و ابزارهای ضروری مانند Notes و Bookmark را نگه دارد. قابلیت‌هایی مانند Timer، Ambient Sound و Focus Statistics باید Modular و اختیاری باشند. مهم‌تر از همه، Focus Mode باید مستقل از Theme، سازگار با WordPress، RTL، Touch، Accessibility و Responsive باشد.**
