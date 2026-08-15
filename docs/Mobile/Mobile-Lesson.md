# Mobile-Lesson.md

**Path:** `07-Mobile/Mobile-Lesson.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile Lesson / Learning Experience
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد تجربه **Lesson در موبایل** را برای افزونه WordPress **Iran LMS** تعریف می‌کند.

Lesson مهم‌ترین سطح Interaction در LMS است و باید کاربر را با کمترین حواس‌پرتی از:

```text
Course
↓
Lesson
↓
Consume Content
↓
Complete Lesson
↓
Next Lesson
```

هدایت کند.

راهنمای اصلی پروژه برای Lesson Player، Video، Curriculum، Resources، Notes، Bookmark، Mark Complete، Previous/Next و Focus Mode را به‌عنوان بخش‌های اصلی تجربه Lesson تعریف کرده است. 

---

# 2. Scope

این فایل شامل:

```text
Lesson Header
Video / Media Player
Lesson Information
Instructor
Description
Progress
Lesson Actions
Tabs
Files
Assignment
Quiz
Q&A
Comments
Notes
Bookmark
Previous / Next
Curriculum Access
Focus Mode
```

است.

این فایل شامل:

```text
Theme Header
Theme Footer
Blog
Shop
WordPress Admin UI
```

نیست.

---

# 3. Mobile Lesson Philosophy

Mobile Lesson نباید Desktop Lesson را فقط Stack کند.

اصل:

```text
Desktop Lesson Player
        ↓
Remove Secondary UI
        ↓
Prioritize Content
        ↓
Mobile Lesson
```

در Mobile، مهم‌ترین عنصر باید **محتوای آموزشی** باشد.

---

# 4. Primary Goal

کاربر باید بتواند:

```text
1. Lesson را شروع کند
2. محتوا را مشاهده/مطالعه کند
3. Progress را ببیند
4. فایل‌ها و Notes را استفاده کند
5. Lesson را Complete کند
6. به Lesson بعدی برود
```

بدون اینکه مجبور شود چندین بار بین صفحات جابه‌جا شود.

---

# 5. Mobile Lesson Structure

ساختار پایه:

```text
┌─────────────────────────────┐
│ Back / Lesson / Actions     │
├─────────────────────────────┤
│                             │
│ Media Player                │
│                             │
├─────────────────────────────┤
│ Lesson Title                │
│ Meta                        │
│ Instructor                  │
├─────────────────────────────┤
│ Description                 │
├─────────────────────────────┤
│ Lesson Actions              │
├─────────────────────────────┤
│ Tabs                        │
├─────────────────────────────┤
│ Tab Content                 │
├─────────────────────────────┤
│ Previous / Next             │
└─────────────────────────────┘
```

نمونه Mobile موجود پروژه نیز همین الگوی کلی را نشان می‌دهد: Header، Video Player، Lesson Title، Metadata، Instructor، Description، Next/Complete و Tabs. 

---

# 6. Lesson Header

Header باید بسیار ساده باشد.

نمونه:

```text
‹   درس
          🔖  ⋮
```

در سمت راست RTL، Back باید از نظر معنایی به صفحه Course یا Learning Context برگردد.

---

# 7. Header Actions

Actionهای Header:

```text
Bookmark
More
```

هستند.

Actionهای غیرضروری نباید Header را شلوغ کنند.

---

# 8. Back Navigation

Back باید به Context قبلی برگردد:

```text
Course
  ↓
Lesson
  ↓
Back
  ↓
Course / Curriculum
```

نباید الزاماً کاربر را به Dashboard بفرستد.

---

# 9. Lesson Type

Lesson می‌تواند انواع مختلف Content داشته باشد:

```text
Video
Audio
Text
PDF
Quiz
Assignment
Webinar
Mixed Content
```

UI باید بر اساس Lesson Type تغییر کند.

---

# 10. Video Lesson

برای Video Lesson:

```text
Header
↓
Video Player
↓
Lesson Details
```

اولویت دارد.

---

# 11. Video Player

Video Player باید تا حد ممکن عرض صفحه را پر کند.

```text
┌─────────────────────────────┐
│                             │
│          VIDEO              │
│                             │
│ ▶                    1080p │
│                             │
│ ─────────●────────────      │
│ 08:45 / 21:36               │
└─────────────────────────────┘
```

نمونه طراحی پروژه نیز Player با Play/Pause، Volume، Timeline، Speed، Settings، Fullscreen و کیفیت 1080p را نشان می‌دهد. 

---

# 12. Video Aspect Ratio

نسبت تصویر باید Responsive باشد.

پیشنهاد:

```text
16:9
```

اما Player Provider می‌تواند Aspect Ratio مخصوص خود را ارائه کند.

---

# 13. Video Controls

حداقل Controls:

```text
Play / Pause
Progress
Volume
Time
Speed
Quality
Fullscreen
```

Controls ثانویه می‌توانند داخل Settings قرار بگیرند.

---

# 14. Playback Speed

Speedهای رایج:

```text
0.75x
1x
1.25x
1.5x
2x
```

می‌توانند ارائه شوند.

انتخاب کاربر باید در همان Lesson حفظ شود، در صورت پشتیبانی Player.

---

# 15. Video Progress

Progress Video باید با Learning Progress سیستم هماهنگ باشد.

اما:

```text
Video Position
≠
Lesson Completion
```

این دو مفهوم یکسان نیستند.

---

# 16. Lesson Completion

Lesson فقط زمانی Complete شود که Rule مربوط به Lesson برقرار شده باشد.

مثلاً:

```text
Video Watched
+
Completion Rule
↓
Lesson Completed
```

UI نباید صرفاً با رسیدن Video به 100٪ تصمیم‌گیری کند، مگر Completion Policy همین را تعریف کرده باشد.

---

# 17. Auto Completion

اگر Auto Completion فعال باشد:

```text
Video End
↓
Completion Service
↓
Completed
```

در غیر این صورت:

```text
Video End
↓
[ علامت‌گذاری به عنوان انجام شده ]
```

---

# 18. Complete Button

CTA:

```text
✓ علامت‌گذاری به عنوان انجام شده
```

باید واضح باشد.

Stateها:

```text
Default
Loading
Completed
Disabled
Error
```

---

# 19. Completed State

پس از Completion:

```text
✓ انجام شد
```

و در صورت نیاز:

```text
درس بعدی →
```

نمایش داده شود.

---

# 20. Next Lesson

Next Lesson باید یکی از مهم‌ترین Actionهای پایین Lesson باشد.

```text
[ درس بعدی → ]
```

اگر Lesson بعدی وجود نداشته باشد:

```text
دوره تکمیل شد 🎉
```

نمایش داده شود.

---

# 21. Previous Lesson

Previous:

```text
← درس قبلی
```

Action ثانویه است.

در اولین Lesson باید Disabled یا Hidden باشد.

---

# 22. Navigation Group

ترتیب پیشنهادی:

```text
درس قبلی
علامت‌گذاری به عنوان انجام شده
درس بعدی
```

اما Next Lesson باید Visual Priority بیشتری داشته باشد.

---

# 23. Lesson Title

Title باید بلافاصله بعد از Player قرار گیرد.

مثال:

```text
مقدمه‌ای بر React و نحوه کار آن
```

نمونه UI پروژه نیز Lesson Title را همراه Badge «درس ۱» نمایش می‌دهد. 

---

# 24. Lesson Badge

Badge:

```text
درس ۱
```

یا:

```text
قسمت ۳
```

می‌تواند کنار Title قرار گیرد.

Badge نباید جایگزین Title شود.

---

# 25. Lesson Metadata

Meta:

```text
۲۱:۳۶ دقیقه
ویدیوی آموزشی
```

می‌تواند زیر Title قرار گیرد.

---

# 26. Instructor

Instructor باید Compact باشد:

```text
Avatar
محمد رضایی
مربی این دوره
```

نمونه Mobile پروژه همین ساختار را استفاده می‌کند. 

---

# 27. Instructor Profile

در صورت وجود Profile:

```text
[ مشاهده مدرس ]
```

می‌تواند در More یا Instructor Card قرار گیرد.

---

# 28. Lesson Description

Description باید خوانا باشد.

```text
در این درس با مفاهیم پایه آشنا می‌شویم...
```

اگر متن طولانی است:

```text
نمایش بیشتر
```

استفاده شود.

---

# 29. Estimated Study Time

در صورت وجود:

```text
زمان مطالعه پیشنهادی:
۲۰ دقیقه
```

نمایش داده شود.

این مقدار با Duration Media یکی نیست.

---

# 30. Bookmark

Bookmark باید از Lesson قابل دسترسی باشد.

```text
♡
```

و بعد:

```text
♥
```

یا State معادل.

Action باید بدون Reload کامل صفحه انجام شود.

---

# 31. Notes

Notes یکی از قابلیت‌های اصلی Lesson است.

راهنمای اصلی پروژه Notes را در Lesson Player تعریف کرده است. 

Mobile:

```text
یادداشت شخصی شما

نکته مهم: ...

[ ویرایش یادداشت ]
```

---

# 32. Notes Interaction

Notes می‌تواند:

```text
View
Edit
Save
Delete
```

داشته باشد.

Editor باید Mobile-friendly باشد.

---

# 33. Notes Persistence

Note باید به:

```text
User
+
Course
+
Lesson
```

متصل باشد.

UI نباید مالک Persistence باشد.

---

# 34. Lesson Tabs

Tabs اصلی پروژه:

```text
درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
نظرات
```

هستند. 

در Mobile تعداد زیاد Tab می‌تواند مشکل ایجاد کند.

---

# 35. Mobile Tabs Strategy

دو الگوی مجاز:

### حالت A — Horizontal Scroll

```text
درس | فایل‌ها | تمرین | آزمون | پرسش و پاسخ | نظرات →
```

### حالت B — Priority Tabs

```text
درس | فایل‌ها | تمرین | آزمون | بیشتر
```

و موارد ثانویه داخل More.

---

# 36. Recommended Mobile Tabs

برای Width کوچک:

```text
درس
فایل‌ها
تمرین
آزمون
بیشتر
```

در `بیشتر`:

```text
پرسش و پاسخ
نظرات
```

قرار می‌گیرند.

این الگو با نمونه Mobile پروژه نیز سازگار است که Tabs را به «درس، فایل‌ها، تمرین، آزمون، بیشتر» خلاصه کرده است. 

---

# 37. Lesson Tab

Tab اصلی:

```text
درس
```

شامل:

```text
Description
Notes
Learning Content
```

است.

---

# 38. Files Tab

Files می‌تواند شامل:

```text
PDF
ZIP
Source Code
Slides
Images
Documents
```

باشد.

هر File باید:

```text
Name
Type
Size
Action
```

را نمایش دهد.

---

# 39. Assignment Tab

اگر Assignment فعال باشد:

```text
تکلیف این درس
Deadline
Instructions
Submission Status
```

نمایش داده شود.

---

# 40. Quiz Tab

Quiz Card:

```text
آزمون درس

۱۰ سؤال
۱۵ دقیقه
حداقل نمره: ۷۰٪

[ شروع آزمون ]
```

مطابق استاندارد اصلی Quiz Card پروژه. 

---

# 41. Quiz State

Quiz می‌تواند:

```text
Not Started
In Progress
Passed
Failed
Locked
```

باشد.

---

# 42. Q&A

Q&A باید امکان:

```text
Question
Reply
Instructor Reply
Thread
```

را فراهم کند.

Comment/Thread structure در راهنمای اصلی نیز برای Lesson تعریف شده است. 

---

# 43. Comments

Comments می‌تواند:

```text
نظر
پاسخ
Instructor Badge
```

داشته باشد.

در Mobile Threadها باید به صورت Vertical نمایش داده شوند.

---

# 44. Webinar Lesson

اگر Lesson از نوع Webinar باشد:

```text
وبینار
تاریخ
زمان
Countdown
Instructor
```

نمایش داده شود.

در صورت فعال بودن SkyRoom:

```text
[ ورود به وبینار ]
```

نمایش داده شود.

راهنمای پروژه SkyRoom و Countdown و Join Button را برای Webinar تعریف کرده است. 

---

# 45. Webinar States

```text
Upcoming
Live
Ended
Cancelled
```

هرکدام CTA متفاوت دارند.

---

# 46. PDF Lesson

برای PDF:

```text
PDF Viewer
```

باید تا حد امکان درون همان Learning Context باقی بماند.

Actionهای مهم:

```text
Zoom
Page Navigation
Download
```

می‌توانند ارائه شوند.

---

# 47. Text Lesson

Text Lesson باید:

```text
Typography
Headings
Lists
Images
Code Blocks
Quotes
Tables
```

را به شکل Responsive نمایش دهد.

---

# 48. Code Content

برای درس‌های برنامه‌نویسی:

```text
Code Block
```

باید:

```text
Horizontal Scroll
Copy
Syntax Highlighting
```

را در صورت پشتیبانی ارائه کند.

---

# 49. Media Lesson

اگر Lesson شامل چند Media باشد:

```text
Video
+
PDF
+
Audio
```

باید Content Hierarchy مشخص باشد.

همه Media نباید همزمان Auto Play شوند.

---

# 50. Lesson Resources

Resources می‌توانند شامل:

```text
دانلودها
فایل تمرین
Source Code
لینک‌ها
```

باشند.

---

# 51. Download

Download Action:

```text
دانلود
```

باید Permission-aware باشد.

مثلاً فایل فقط برای Enrolled User قابل دانلود باشد.

---

# 52. Protected Media

UI نباید تصور کند:

```text
Hide Download Button
=
Security
```

نیست.

Protection باید در Server / Media Layer اعمال شود.

---

# 53. Curriculum Access

Curriculum در Mobile نباید دائماً فضای صفحه را اشغال کند.

الگوی پیشنهادی:

```text
Lesson Header
↓
[ سرفصل‌های دوره ]
↓
Drawer / Bottom Sheet
```

---

# 54. Curriculum Drawer

با Tap:

```text
سرفصل‌های دوره
```

Bottom Sheet یا Drawer باز شود:

```text
┌─────────────────────────────┐
│ سرفصل‌های دوره          ×   │
├─────────────────────────────┤
│ ▼ ۱. مقدمه                  │
│   ✓ درس ۱                   │
│   ● درس ۲                   │
│   ○ درس ۳                   │
│                             │
│ ▶ ۲. مبانی                  │
│ ▶ ۳. Hooks                  │
└─────────────────────────────┘
```

---

# 55. Current Lesson

Current Lesson باید کاملاً مشخص باشد.

```text
● مقدمه‌ای بر React
```

و Completed:

```text
✓ نصب محیط
```

Locked:

```text
🔒 پروژه نهایی
```

---

# 56. Lesson Search

اگر Course Curriculum طولانی است:

```text
جستجو در سرفصل‌ها
```

در Curriculum Drawer قرار گیرد.

Search باید فقط Curriculum همان Course را جستجو کند.

---

# 57. Lesson Progress

Progress کلی Course می‌تواند در Header یا Curriculum نمایش داده شود:

```text
پیشرفت دوره
64٪
```

اما نباید Player را تحت تأثیر قرار دهد.

---

# 58. Mobile Focus Mode

Focus Mode برای Lesson بسیار مهم است.

راهنمای اصلی پروژه می‌گوید:

```text
Hide Sidebars
Large Video
Minimal Distractions
Keep Navigation and Notes
```

. 

در Mobile:

```text
Normal Lesson
      ↓
Focus Mode
      ↓
Minimal Header
      ↓
Media
      ↓
Essential Navigation
      ↓
Notes
```

---

# 59. Focus Mode Header

در Focus Mode:

```text
‹
Lesson Title
        خروج
```

کافی است.

---

# 60. Focus Mode Content

در Focus Mode نباید:

```text
Course Statistics
Achievements
Wallet
Related Courses
```

نمایش داده شوند.

---

# 61. Focus Mode Navigation

Navigation ضروری باقی می‌ماند:

```text
Previous
Next
Curriculum
Notes
```

تا کاربر در Learning Flow گیر نکند.

---

# 62. Focus Mode Fullscreen

در صورت پشتیبانی Browser:

```text
[ تمام صفحه ]
```

می‌تواند فعال شود.

Fullscreen باید با Focus Mode اشتباه نشود.

---

# 63. Lesson State Machine

مدل مفهومی:

```text
Locked
  ↓
Available
  ↓
Started
  ↓
In Progress
  ↓
Completed
```

در صورت نیاز:

```text
In Progress
  ↓
Failed / Blocked
```

نیز می‌تواند وجود داشته باشد.

---

# 64. State Ownership

State اصلی باید توسط Learning Domain مدیریت شود.

```text
Learning Domain
      ↓
Lesson State
      ↓
View Model
      ↓
Mobile Lesson UI
```

UI نباید Completion State را مستقل نگهداری کند.

---

# 65. Error Handling

خطاهای Lesson:

```text
Media Error
Permission Error
Network Error
Submission Error
Progress Error
```

باید به User-friendly State تبدیل شوند.

---

# 66. Media Error

مثلاً:

```text
پخش ویدیو ممکن نیست.

[ تلاش دوباره ]
```

و در صورت امکان:

```text
[ باز کردن نسخه جایگزین ]
```

---

# 67. Progress Error

اگر Completion ثبت نشد:

```text
ثبت پیشرفت انجام نشد.

[ تلاش دوباره ]
```

Video نباید لزوماً از ابتدا شروع شود.

---

# 68. Loading

Loading State باید برای:

```text
Player
Lesson Data
Tabs
Notes
Curriculum
```

مجزا مدیریت شود.

کل صفحه نباید به دلیل Loading یک Tab قفل شود.

---

# 69. Skeleton

Skeleton:

```text
Header
Player
Title
Meta
Description
```

باید ساختار واقعی UI را حفظ کند.

---

# 70. Empty States

مثلاً Files:

```text
فایلی برای این درس وجود ندارد.
```

Comments:

```text
هنوز نظری ثبت نشده است.
```

Notes:

```text
هنوز یادداشتی ثبت نکرده‌اید.
```

Empty State باید فقط در همان Context نمایش داده شود.

---

# 71. Mobile Navigation

Navigation اصلی از `Mobile-Navigation.md` پیروی می‌کند.

Lesson نباید Bottom Navigation اصلی اپلیکیشن را با Navigation داخلی خود اشتباه بگیرد.

---

# 72. Bottom Navigation Conflict

اگر Global Bottom Navigation فعال باشد:

```text
Global Bottom Navigation
```

و:

```text
Lesson Tabs
```

نباید همزمان فضای زیادی از صفحه را اشغال کنند.

در Lesson می‌توان Global Navigation را در Focus Mode مخفی کرد، در صورتی که Navigation ضروری همچنان در دسترس باشد.

---

# 73. Touch Targets

Actionهای مهم:

```text
Play
Pause
Next
Previous
Bookmark
Complete
Curriculum
Notes
Tabs
```

باید Touch Target مناسب داشته باشند.

---

# 74. Gesture Rules

Gestureهای مهم:

```text
Swipe
Tap
Scroll
Pinch
```

نباید با Player Controls یا Browser Gestures تداخل ایجاد کنند.

---

# 75. Pull to Refresh

برای Lesson Player معمولاً توصیه نمی‌شود.

Refresh ناخواسته می‌تواند:

```text
Video Position
Unsaved Note
Quiz State
```

را تحت تأثیر قرار دهد.

---

# 76. Orientation

برای Lesson Video:

```text
Portrait
```

حالت اصلی است.

اما:

```text
Landscape
```

باید برای Video و Focus Mode پشتیبانی شود.

---

# 77. Landscape Video

در Landscape:

```text
Video
↓
Maximum Available Area
```

و Controls باید قابل دسترسی باقی بمانند.

---

# 78. Dark Mode

Lesson باید در Dark Mode موارد زیر را پشتیبانی کند:

```text
Player
Lesson Details
Tabs
Notes
Curriculum
Quiz
Assignment
Comments
```

---

# 79. RTL

تمام Lesson UI باید RTL باشد، به جز Contentهایی که ذاتاً Direction دیگری دارند.

مثلاً:

```text
Code
URL
Email
English Text
```

می‌توانند LTR باشند.

---

# 80. Accessibility

Lesson Player باید:

```text
☐ Keyboard Accessible
☐ Screen Reader Accessible
☐ Captions
☐ Focus Visible
☐ Semantic Buttons
☐ Accessible Media Controls
```

را تا حد قابلیت Provider رعایت کند.

---

# 81. Video Captions

در صورت وجود Caption:

```text
CC
```

باید قابل فعال/غیرفعال شدن باشد.

Caption نباید به‌صورت Hardcoded داخل Video باشد.

---

# 82. Contrast

Contrast برای:

```text
Player Controls
Progress
Buttons
Tabs
Text
```

باید مناسب باشد.

---

# 83. Theme Independence

Lesson UI متعلق به Plugin است.

```text
Theme
≠
Lesson Logic
```

Theme نباید بتواند با CSS عمومی، Player یا Completion UI را به شکل غیرقابل استفاده تغییر دهد.

---

# 84. WordPress Plugin Architecture

ساختار پیشنهادی:

```text
WordPress
    ↓
Iran LMS
    ↓
Learning Domain
    ↓
Lesson Service
    ↓
Lesson View Model
    ↓
Mobile Lesson Components
```

Component نباید مستقیماً:

```text
$wpdb
WP_Query
Enrollment Database
Quiz Database
```

را اجرا کند.

---

# 85. Module Awareness

Lesson می‌تواند Moduleهای مختلف را مصرف کند:

```text
Certificate
Homework
Quiz
Forum
Survey
Attendance
Gamification
SpotPlayer
SkyRoom
WooCommerce
```

اما Feature فقط در صورت فعال بودن Module نمایش داده شود.

---

# 86. Module Reflow

مثلاً:

```text
Quiz Enabled
↓
آزمون Tab

Quiz Disabled
↓
Tab Removed
↓
Tabs Reflow
```

نباید Tab خالی باقی بماند.

---

# 87. SpotPlayer

اگر SpotPlayer فعال باشد:

```text
Player Provider
↓
SpotPlayer
```

اما Lesson UI نباید به SpotPlayer وابسته باشد.

---

# 88. SkyRoom

اگر Webinar/SkyRoom فعال باشد:

```text
Webinar Lesson
↓
SkyRoom CTA
```

در غیر این صورت:

```text
No SkyRoom UI
```

---

# 89. Certificate

Certificate معمولاً بعد از Course Completion فعال می‌شود و نباید بدون شرایط لازم در Lesson نمایش داده شود.

---

# 90. Gamification

Gamification می‌تواند بعد از Completion:

```text
+ XP
Badge
Streak
Achievement
```

را نمایش دهد.

این Feedback باید Secondary باشد و Learning Flow را قطع نکند.

---

# 91. Notifications

اگر Completion باعث Notification شود:

```text
Lesson Completed
↓
Notification Service
```

و Notification نباید مستقیماً توسط Lesson Component ایجاد شود.

---

# 92. Performance

Lesson Page به دلیل Media حساس است.

باید:

```text
☐ Lazy Load Secondary Content
☐ Optimize Images
☐ Avoid Duplicate Requests
☐ Preserve Video Position
☐ Avoid Heavy Animations
```

رعایت شود.

---

# 93. Data Loading

ترجیح:

```text
Lesson Data
+
Progress
+
Permissions
```

به صورت View Model مناسب دریافت شود.

برای Secondary Tabs:

```text
Files
Comments
Q&A
```

می‌توان Lazy Load استفاده کرد.

---

# 94. Unsaved Notes

اگر User در حال نوشتن Note است و قصد خروج دارد:

```text
Unsaved Changes
```

باید مدیریت شود.

در صورت نیاز:

```text
ذخیره یادداشت؟
[ ذخیره ]
[ خروج بدون ذخیره ]
[ لغو ]
```

---

# 95. Quiz Unsaved State

اگر Quiz در Progress باشد، خروج نباید بدون Warning انجام شود، در صورتی که Quiz Policy چنین نیازی داشته باشد.

---

# 96. Lesson Completion Feedback

پس از Completion:

```text
✓ درس تکمیل شد
```

یک Feedback کوتاه کافی است.

در صورت فعال بودن Gamification:

```text
+10 XP
🏆 Achievement
```

می‌تواند به شکل Secondary Feedback نمایش داده شود.

---

# 97. Recommended Mobile Flow

```text
Open Lesson
     ↓
Load Lesson
     ↓
Show Media
     ↓
Consume Content
     ↓
Save Progress
     ↓
Complete Lesson
     ↓
Feedback
     ↓
Next Lesson
```

---

# 98. Component Architecture

```text
MobileLesson
│
├── LessonHeader
├── LessonMedia
├── LessonIdentity
│   ├── Badge
│   ├── Title
│   └── Metadata
│
├── Instructor
├── LessonDescription
├── LessonActions
│   ├── Bookmark
│   ├── Complete
│   ├── Previous
│   └── Next
│
├── LessonTabs
│   ├── Lesson
│   ├── Files
│   ├── Assignment
│   ├── Quiz
│   └── More
│
├── Notes
├── CurriculumDrawer
└── FocusMode
```

---

# 99. Component Responsibility

مثلاً:

```text
LessonMedia
```

فقط مسئول Media UI است.

نباید:

```text
Enrollment
Completion
Certificate
```

را مدیریت کند.

و:

```text
LessonActions
```

باید Actionها را به Service/Command مناسب متصل کند.

---

# 100. View Model

نمونه مفهومی:

```text
LessonViewModel
├── lesson
├── course
├── media
├── instructor
├── progress
├── completion
├── permissions
├── navigation
├── resources
├── notes
├── quiz
├── assignment
├── discussion
└── enabledFeatures
```

این View Model یک قرارداد UI است و نباید مستقیماً Schema دیتابیس باشد.

---

# 101. Definition of Done

Mobile Lesson زمانی آماده است که:

```text
☐ Header ساده و واضح است
☐ Player Responsive است
☐ Video Controls مناسب‌اند
☐ Lesson Title خواناست
☐ Instructor نمایش داده می‌شود
☐ Description قابل خواندن است
☐ Bookmark کار می‌کند
☐ Completion State مشخص است
☐ Previous/Next درست کار می‌کنند
☐ Curriculum در Drawer/Sheet قابل دسترسی است
☐ Notes قابل استفاده است
☐ Files قابل دسترسی است
☐ Quiz قابل دسترسی است
☐ Assignment قابل دسترسی است
☐ Q&A و Comments قابل دسترسی‌اند
☐ Focus Mode وجود دارد
☐ RTL کامل است
☐ Dark Mode پشتیبانی می‌شود
☐ Accessibility رعایت شده
☐ Loading / Error / Empty States وجود دارد
☐ Optional Modules Layout را نمی‌شکنند
☐ Theme Independence رعایت شده
☐ WordPress Plugin Boundary رعایت شده
☐ Business Logic داخل UI نیست
☐ Performance مناسب است
```

---

# 102. Final Principle

Lesson Mobile در Iran LMS باید این تجربه را ایجاد کند:

```text
Open
 ↓
Learn
 ↓
Track
 ↓
Complete
 ↓
Continue
```

بدون:

```text
Unnecessary Navigation
+
Visual Clutter
+
Theme Dependency
+
Business Logic in UI
```

اصل نهایی:

> **Mobile-Lesson باید کوچک‌ترین و متمرکزترین واحد تجربه یادگیری در Iran LMS باشد؛ محتوا در مرکز، Navigation ضروری در دسترس، و تمام منطق Learning در لایه‌های داخلی افزونه باقی بماند.**
