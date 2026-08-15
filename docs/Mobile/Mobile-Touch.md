# `Mobile-Touch.md`

**Path:** `07-Mobile/Mobile-Touch.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Mobile / Touch Interaction
**Version:** 1.0
**Status:** Foundation

> این سند رفتارهای Touch در رابط موبایل افزونه Iran LMS را تعریف می‌کند. مبنا، Design System پروژه شامل **Modern SaaS، RTL فارسی، Component-Based، WordPress Friendly، Modular Architecture، Radius 16px و Micro Interactionهای نرم** است. 

---

# 1. Purpose

هدف این سیستم، تعریف رفتار استاندارد برای تعامل لمسی در:

```text
Buttons
Cards
Navigation
Tabs
Lists
Forms
Modals
Bottom Sheets
Sliders
Carousels
Video Player
Course Player
Quiz
Assignment
```

است.

---

# 2. Core Principle

Touch Interaction باید:

```text
Simple
Predictable
Forgiving
Accessible
Fast
Consistent
```

باشد.

کاربر نباید برای اجرای یک Action دقیقاً روی یک Pixel خاص ضربه بزند.

---

# 3. Touch Is Not Hover

در Mobile نباید Interaction اصلی بر اساس Hover طراحی شود.

بد:

```text
Hover
↓
Show Action
```

صحیح:

```text
Tap
↓
Show Action
```

راهنمای UI پروژه Micro Interaction را پشتیبانی می‌کند، اما رفتار آن باید با محیط Touch سازگار باشد. 

---

# 4. Touch Target

تمام عناصر Interactive باید Touch Target مناسب داشته باشند.

حداقل هدف طراحی:

```text
44 × 44 px
```

مثال:

```text
┌──────────────┐
│      🔔      │
│              │
└──────────────┘
```

حتی اگر خود Icon کوچک‌تر باشد، فضای قابل لمس باید بزرگ‌تر باشد.

---

# 5. Icon Button

بد:

```text
     ×
```

با Hit Area بسیار کوچک.

صحیح:

```text
┌────────────┐
│     ×      │
└────────────┘
```

Icon می‌تواند 20–24px باشد ولی Touch Area مستقل باشد.

---

# 6. Touch Spacing

دو Action نزدیک نباید باعث Tap اشتباه شوند.

بد:

```text
[حذف][ویرایش]
```

بهتر:

```text
[ حذف ]   [ ویرایش ]
```

یا در Mobile:

```text
[ ویرایش ]

[ حذف ]
```

برای Actionهای حساس.

---

# 7. Primary Touch Action

در هر View باید Action اصلی مشخص باشد.

مثلاً Lesson:

```text
[ ادامه درس ]
```

نباید در میان چندین Action دیگر گم شود.

---

# 8. Touch Feedback

پس از Tap، کاربر باید Feedback دریافت کند.

مثلاً:

```text
Tap
 ↓
Pressed State
 ↓
Action
 ↓
Loading / Success / Error
```

---

# 9. Pressed State

برای Button:

```text
Default
↓
Pressed
↓
Released
```

Pressed State باید کوتاه و ظریف باشد.

---

# 10. No Excessive Animation

Animation نباید تعامل را کند احساس کند.

اصل:

```text
Action
→
Immediate Feedback
```

نه:

```text
Action
→
Long Animation
→
Feedback
```

---

# 11. Haptic Feedback

در صورت پشتیبانی Platform، Haptic می‌تواند برای Actionهای مهم استفاده شود.

مثلاً:

```text
Quiz Answer
Complete Lesson
Successful Save
Delete Confirmation
```

اما نباید برای هر Tap فعال شود.

---

# 12. Haptic Principle

Haptic باید:

```text
Meaningful
Optional
Non-essential
```

باشد.

اگر Haptic در دسترس نبود، UI نباید خراب شود.

---

# 13. Tap

Tap برای Actionهای اصلی:

```text
Open
Select
Save
Continue
Complete
Submit
```

استفاده شود.

---

# 14. Double Tap

Double Tap فقط زمانی استفاده شود که معنای مشخصی داشته باشد.

در حالت عادی:

```text
Double Tap
```

نباید برای Actionهای مهم استفاده شود.

---

# 15. Long Press

Long Press برای Actionهای ثانویه مناسب است.

مثلاً:

```text
Lesson Card
 ↓
Long Press
 ↓
Context Actions
```

اما نباید تنها روش دسترسی به Action باشد.

---

# 16. Context Menu

در صورت استفاده از Long Press:

```text
ویرایش
نشان‌گذاری
اشتراک‌گذاری
حذف
```

باید از طریق یک مسیر جایگزین نیز قابل دسترسی باشند.

---

# 17. Swipe

Swipe فقط وقتی استفاده شود که الگو برای کاربر قابل پیش‌بینی باشد.

مثلاً:

```text
Notification
 ← Swipe
 → Mark Read
```

---

# 18. Swipe Actions

Swipe نباید تنها راه انجام Action باشد.

مثلاً Notification:

```text
Swipe
↓
خوانده شد
```

ولی Menu نیز:

```text
⋮
↓
خوانده شد
```

را ارائه کند.

---

# 19. Horizontal Swipe

برای Carousel:

```text
← Card Card Card →
```

کاربر می‌تواند Swipe افقی انجام دهد.

---

# 20. Carousel

Carouselهای Course باید:

```text
Swipe
+
Next / Previous
```

را در صورت نیاز پشتیبانی کنند.

این موضوع برای Course Cardهای موبایل مهم است؛ نمونه طراحی موبایل پروژه نیز از Cardهای دوره و Actionهای لمسی استفاده می‌کند. 

---

# 21. Carousel Indicators

در صورت چند صفحه:

```text
● ○ ○ ○
```

یا:

```text
2 از 5
```

نمایش داده شود.

---

# 22. Carousel Accessibility

Carousel نباید برای مشاهده تمام محتوا به Swipe وابسته باشد.

کاربر باید بتواند:

```text
Next
Previous
```

را نیز داشته باشد.

---

# 23. Scroll

Scroll عمودی رفتار اصلی Mobile است.

```text
Swipe Up
↓
Scroll Down
```

---

# 24. Nested Scroll

تا حد امکان از Nested Scroll جلوگیری شود.

بد:

```text
Page Scroll
   ↓
Card Scroll
   ↓
Inner List Scroll
```

این حالت در Mobile گیج‌کننده است.

---

# 25. Horizontal Scroll

Horizontal Scroll فقط برای Componentهایی که واقعاً نیاز دارند.

مثلاً:

```text
Code
Table
Carousel
Timeline
```

و نه کل Page.

---

# 26. Pull to Refresh

اگر در یک View استفاده شود:

```text
Pull Down
↓
Release
↓
Refresh
```

رفتار باید واضح باشد.

اما در Lesson Player نباید باعث Reload ناخواسته درس شود.

---

# 27. Lesson Player

Touch Interaction در Lesson Player بسیار مهم است.

ساختار:

```text
Video
↓
Tap
↓
Show Controls
```

در طراحی پروژه Lesson Player، Video بخش اصلی تجربه یادگیری است و در کنار آن Notes، Bookmark، Mark Complete و Previous/Next وجود دارند. 

---

# 28. Video Controls

Controls:

```text
Play
Pause
Seek
Volume
Fullscreen
Speed
```

باید Touch Friendly باشند.

---

# 29. Video Seek

Seek Bar باید Hit Area کافی داشته باشد.

کاربر نباید مجبور باشد دقیقاً روی یک Pixel کوچک Tap کند.

---

# 30. Double Tap Video

در صورت پیاده‌سازی:

```text
Double Tap Right
→ Forward

Double Tap Left
→ Rewind
```

باید واضح و Consistent باشد.

---

# 31. Fullscreen Video

Tap روی Fullscreen:

```text
Video
↓
Fullscreen
↓
Landscape Preferred
```

در صورت پشتیبانی Device.

---

# 32. Lesson Navigation

Previous / Next:

```text
[ درس قبلی ]    [ درس بعدی ]
```

در Mobile باید به راحتی قابل لمس باشند.

برای Action اصلی:

```text
[ ادامه درس ]
```

می‌تواند Full Width باشد.

---

# 33. Mark Complete

Action:

```text
✓ تکمیل درس
```

باید Touch Target مناسب داشته باشد.

پس از Tap:

```text
Tap
↓
Loading
↓
Success
↓
Progress Update
```

---

# 34. Bookmark

Bookmark:

```text
☆ 
```

یا:

```text
★
```

باید وضعیت واضح داشته باشد:

```text
Inactive
Active
Loading
Error
```

---

# 35. Notes

در Mobile:

```text
یادداشت
↓
Bottom Sheet / Modal
↓
Input
```

مناسب است.

در فایل UI موجود پروژه نیز Notes و Bookmark به عنوان Actionهای اصلی تجربه یادگیری Mobile دیده می‌شوند. 

---

# 36. Course Card

Tap روی Course Card باید رفتار مشخصی داشته باشد:

```text
Tap Card
↓
Course Detail
```

اما Actionهایی مانند Bookmark:

```text
Tap Bookmark
↓
Bookmark
```

نباید Course Detail را باز کنند.

---

# 37. Touch Event Priority

وقتی یک Card و یک Button داخل آن وجود دارد:

```text
Card
└── Button
```

Tap روی Button باید Button را اجرا کند، نه Card را.

---

# 38. Event Propagation

Componentهای Interactive نباید باعث اجرای ناخواسته Parent Action شوند.

مثلاً:

```text
Card Click
```

نباید با:

```text
Bookmark Click
```

همزمان اجرا شود.

---

# 39. Tabs

Tabها باید:

```text
Tap
↓
Immediate State Change
```

داشته باشند.

مثلاً Lesson:

```text
درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
```

در Design Guide پروژه همین دسته‌بندی Bottom Tabs برای Lesson تعریف شده است. 

---

# 40. Horizontal Tabs

اگر Tabها زیاد باشند:

```text
درس | فایل‌ها | تمرین | آزمون | ...
```

می‌توانند Horizontal Scroll شوند.

اما Tab فعال باید قابل مشاهده بماند.

---

# 41. Bottom Navigation

Bottom Navigation برای Mobile باید:

```text
Tap
↓
Navigate
```

را سریع انجام دهد.

در Mockup موبایل پروژه نیز Navigation پایین صفحه به عنوان بخش اصلی ساختار Mobile دیده می‌شود. 

---

# 42. Bottom Navigation Touch Area

هر Item:

```text
Icon
+
Label
+
Touch Area
```

داشته باشد.

---

# 43. Drawer

برای Menu:

```text
☰
↓
Drawer
```

استفاده شود.

Tap روی Overlay:

```text
Overlay Tap
↓
Close Drawer
```

در صورت غیرحساس بودن.

---

# 44. Swipe Drawer

اگر Drawer از لبه Swipe می‌شود:

```text
Edge Swipe
→
Open Drawer
```

باید Optional باشد و با Browser Gestureها Conflict نداشته باشد.

---

# 45. Bottom Sheet

Bottom Sheet برای:

```text
Filters
Sorting
Actions
Selection
Short Details
```

مناسب است.

---

# 46. Bottom Sheet Drag

در صورت Draggable بودن:

```text
Drag Up
↓
Expand

Drag Down
↓
Collapse / Close
```

---

# 47. Bottom Sheet Handle

Handle:

```text
─────
```

باید صرفاً Indicator نباشد؛ در صورت طراحی Drag، ناحیه لمس کافی داشته باشد.

---

# 48. Modal Touch

Modalهای Mobile طبق `Mobile-Modals.md` باید:

```text
Tap Outside
Close
```

را فقط در Modalهای قابل Dismiss پشتیبانی کنند.

---

# 49. Dialog Actions

Actionهای مهم:

```text
[ انصراف ] [ حذف دوره ]
```

باید فاصله کافی داشته باشند.

---

# 50. Forms

Touch در Form شامل:

```text
Input
Select
Checkbox
Radio
Switch
Date Picker
File Upload
```

است.

---

# 51. Input

کاربر باید بتواند با Tap روی:

```text
Label
Input
```

به Field دسترسی پیدا کند، در صورت مناسب بودن ساختار Semantic.

---

# 52. Select

Select در Mobile بهتر است به:

```text
Native Picker
Bottom Sheet
Full-Screen Selection
```

تبدیل شود، بسته به پیچیدگی.

---

# 53. Checkbox

به جای کوچک کردن Checkbox:

```text
☐
```

کل Row می‌تواند قابل لمس باشد:

```text
┌──────────────────────┐
│ ☐  دریافت اعلان‌ها   │
└──────────────────────┘
```

---

# 54. Radio

برای انتخاب:

```text
○ مبتدی
○ متوسط
○ پیشرفته
```

کل Option قابل Tap باشد.

---

# 55. Switch

Switch:

```text
فعال
غیرفعال
```

باید State واضح داشته باشد.

Tap روی Label نیز در صورت امکان Switch را تغییر دهد.

---

# 56. File Upload

Assignment در پروژه امکان Drag & Drop روی Desktop دارد. 

در Mobile نباید به Drag & Drop وابسته باشد.

بهتر:

```text
[ انتخاب فایل ]
```

با:

```text
Camera
Gallery
Files
```

در صورت پشتیبانی Device.

---

# 57. Drag & Drop

Drag & Drop:

```text
Desktop
→ Supported

Mobile
→ Optional
```

باشد.

---

# 58. Quiz

Touch در Quiz باید سریع و بدون خطا باشد.

```text
Question
↓
Options
↓
Tap Answer
↓
Selected State
```

---

# 59. Quiz Option

کل Option قابل Tap باشد:

```text
┌──────────────────────┐
│ ○ گزینه اول           │
└──────────────────────┘
```

نه فقط Radio کوچک.

---

# 60. Quiz Submit

Submit:

```text
[ ثبت پاسخ‌ها ]
```

باید Confirmation داشته باشد اگر امکان اشتباه یا از دست رفتن پاسخ‌ها وجود دارد.

---

# 61. Assignment

Actionهای Assignment:

```text
مشاهده
ارسال
ویرایش
حذف
دانلود
```

باید از هم تفکیک شوند.

---

# 62. Swipe to Delete

برای Assignment یا Notes، Swipe to Delete فقط برای Actionهای قابل بازیابی مناسب است.

برای Delete دائمی:

```text
Swipe
↓
Confirmation
```

لازم است.

---

# 63. Notifications

Notification می‌تواند:

```text
Tap
↓
Open Details
```

شود.

Swipe:

```text
Mark Read
```

می‌تواند Action ثانویه باشد.

---

# 64. Touch Feedback for Notifications

پس از Tap:

```text
Unread
↓
Read
```

باید سریع و قابل تشخیص باشد.

---

# 65. Progress

Progress Bar معمولاً Interactive نیست.

اگر قابل تغییر است:

```text
Slider
```

استفاده شود.

---

# 66. Slider

Slider باید:

```text
Large Thumb
Large Hit Area
Visible Value
```

داشته باشد.

---

# 67. Range Slider

در Range Slider:

```text
Min ●──────● Max
```

Thumbها نباید بیش از حد نزدیک باشند.

در حالت نزدیک:

```text
Touch Ambiguity
```

باید مدیریت شود.

---

# 68. Calendar

Calendar در Mobile:

```text
Swipe Month
Tap Day
```

را می‌تواند پشتیبانی کند.

---

# 69. Date Picker

برای تاریخ شمسی:

```text
سال
ماه
روز
```

باید Touch Friendly باشد و RTL را رعایت کند.

---

# 70. Time Picker

Time Picker:

```text
ساعت
دقیقه
```

باید برای Touch مناسب باشد.

---

# 71. Zoom

برای Image یا Certificate Preview:

```text
Pinch
↓
Zoom
```

می‌تواند فعال باشد.

---

# 72. Pinch to Zoom

Pinch فقط روی محتوای Zoomable فعال شود.

در کل Page نباید رفتار Zoom اختصاصی Component ایجاد کند.

---

# 73. Image Gallery

Gallery:

```text
Swipe Left
→ Next

Swipe Right
→ Previous
```

و:

```text
Tap
→ Close / Details
```

را پشتیبانی کند.

---

# 74. Touch Direction in RTL

RTL بودن Interface به معنی معکوس کردن همه Gestureها نیست.

مثلاً:

```text
Swipe
```

باید از نظر معنای Interaction Consistent باشد.

Direction باید در Documentation هر Component مشخص شود.

---

# 75. Horizontal Carousel in RTL

برای Carousel RTL:

```text
Current
← Next
```

ممکن است با جهت بصری متفاوت از LTR باشد.

اما مهم‌ترین اصل:

> رفتار Carousel باید برای کاربر قابل پیش‌بینی باشد.

---

# 76. Touch + Accessibility

Touch نباید تنها روش دسترسی باشد.

برای Actionهای مهم باید مسیرهای:

```text
Touch
Keyboard
Screen Reader
```

تا حد امکان فراهم باشد.

---

# 77. Focus

بعد از Touch روی Component تعاملی، Focus State نباید Accessibility را خراب کند.

---

# 78. Keyboard + Touch

در Form:

```text
Touch Input
↓
Keyboard
↓
Submit
```

دکمه Submit باید در دسترس باقی بماند.

---

# 79. Safe Area

Bottom Touch Controls باید Safe Area را در نظر بگیرند:

```text
Bottom Navigation
+
Snackbar
+
Bottom Sheet
+
Sticky CTA
```

---

# 80. Touch + Toast

Toast نباید دکمه‌های اصلی را بپوشاند.

مثلاً:

```text
Bottom Navigation
↑
Toast
```

باید فاصله امن داشته باشد.

---

# 81. Touch + Snackbar

Snackbar باید با:

```text
Bottom Navigation
```

تداخل نداشته باشد.

---

# 82. Accidental Tap Prevention

برای Actionهای خطرناک:

```text
Delete
Cancel Payment
Leave Quiz
Discard Changes
```

بهتر است Confirmation وجود داشته باشد.

---

# 83. Destructive Action

Delete:

```text
Tap
↓
Confirmation
↓
Delete
```

نه:

```text
Tap
↓
Immediate Delete
```

برای عملیات غیرقابل بازگشت.

---

# 84. Double Submission

برای جلوگیری از دوبار Tap:

```text
Submit
↓
Loading
↓
Disable Submit
```

انجام شود.

---

# 85. Payment

در Checkout:

```text
Tap پرداخت
↓
Loading
↓
Disable Button
↓
Gateway
```

دکمه نباید چند بار Request ایجاد کند.

---

# 86. Lesson Completion

برای Complete:

```text
Tap
↓
Optimistic Feedback
↓
Server Request
```

در صورت مناسب بودن معماری.

اگر Request شکست خورد:

```text
State
→
Rollback
```

---

# 87. Offline / Network Failure

اگر Touch Action به Network وابسته است:

```text
Tap
↓
Request
↓
Network Error
↓
Retry
```

و Action نباید بدون Feedback ناپدید شود.

---

# 88. Touch Loading

هنگام Loading:

```text
[ در حال ذخیره... ]
```

بهتر از:

```text
[ ذخیره ]
```

بدون Feedback است.

---

# 89. Gesture Conflicts

Gestureها نباید با هم Conflict کنند.

مثلاً:

```text
Horizontal Carousel
+
Vertical Page Scroll
```

باید Direction را درست تشخیص دهد.

---

# 90. Gesture Priority

اصل پیشنهادی:

```text
Native Scroll
↓
Component Gesture
↓
Nested Gesture
```

کمترین میزان Interception را داشته باشد.

---

# 91. No Gesture Dependency

هیچ Feature مهمی نباید فقط از طریق Gesture قابل دسترسی باشد.

بد:

```text
Swipe only
```

صحیح:

```text
Swipe
+
Button / Menu
```

---

# 92. WordPress Plugin Isolation

Touch Handlerهای افزونه نباید Global Eventهای Theme یا سایر Pluginها را مختل کنند.

از:

```text
document.body
window
global touch handlers
```

با احتیاط استفاده شود.

---

# 93. JavaScript Scope

Event Listenerها باید تا حد امکان Scoped باشند:

```text
.iran-lms-course
.iran-lms-player
.iran-lms-modal
```

و پس از Unmount / Destroy پاک شوند.

---

# 94. Performance

Touch Eventهای سنگین نباید باعث:

```text
Jank
Scroll Lag
Dropped Frames
```

شوند.

---

# 95. Passive Events

برای Scroll-related Touch Eventها در صورت مناسب بودن از Passive Listener استفاده شود.

---

# 96. Prevent Default

`preventDefault()` نباید بدون دلیل روی Gestureها استفاده شود.

چون می‌تواند:

```text
Scroll
Browser Navigation
Native Gesture
```

را خراب کند.

---

# 97. WordPress Compatibility

Touch System نباید به Theme خاصی وابسته باشد و باید در:

```text
Frontend
Frontend Dashboard
Plugin Pages
Shortcode Pages
Block-rendered UI
```

تا حد امکان رفتار سازگار داشته باشد.

---

# 98. Modular Architecture

اگر Module غیرفعال باشد:

```text
Module Disabled
↓
Touch Handler Removed
↓
Remaining UI Works
```

نباید Event Handlerهای آن Layout سایر Moduleها را تحت تأثیر قرار دهند.

---

# 99. Touch State Model

برای Componentهای Interactive:

```text
idle
↓
pressed
↓
active
↓
loading
↓
success / error
```

در صورت نیاز تعریف شود.

---

# 100. Testing Matrix

Touch باید حداقل در این سناریوها تست شود:

```text
☐ Single Tap
☐ Fast Repeated Tap
☐ Long Press
☐ Swipe
☐ Horizontal Swipe
☐ Vertical Swipe
☐ Pinch
☐ Scroll
☐ Nested Scroll
☐ Keyboard Open
☐ Landscape
☐ Portrait
☐ Safe Area
☐ RTL
☐ Dark Mode
☐ Slow Network
☐ Offline
```

---

# 101. Component Checklist

هر Component لمسی باید مشخص کند:

```text
☐ Primary Gesture
☐ Secondary Gesture
☐ Touch Target
☐ Pressed State
☐ Loading State
☐ Error State
☐ Success State
☐ Disabled State
☐ Accessibility
☐ Keyboard Alternative
☐ RTL Behavior
☐ Gesture Conflict
☐ Safe Area
☐ Mobile Performance
```

---

# 102. Definition of Done

```text
☐ Touch Target استاندارد
☐ Pressed State
☐ Tap Feedback
☐ No Hover Dependency
☐ Swipe Rules
☐ Long Press Rules
☐ Carousel Interaction
☐ Bottom Sheet Interaction
☐ Modal Interaction
☐ Form Interaction
☐ Quiz Interaction
☐ Assignment Interaction
☐ Lesson Player Interaction
☐ Course Card Interaction
☐ Bookmark Interaction
☐ Notes Interaction
☐ Notification Interaction
☐ File Upload Interaction
☐ Slider Interaction
☐ Gallery Interaction
☐ Pinch Zoom
☐ Safe Area
☐ Keyboard Handling
☐ Accessibility
☐ RTL
☐ Gesture Conflict Handling
☐ Double Submit Prevention
☐ Network Error Handling
☐ WordPress Compatibility
☐ Theme Independence
☐ Modular Architecture
☐ Event Cleanup
☐ Performance Testing
☐ Real Device Testing
```

---

# 103. Final Architecture

```text
                 Touch System
                      │
        ┌─────────────┼─────────────┐
        │             │             │
       Tap          Swipe       Long Press
        │             │             │
        └─────────────┼─────────────┘
                      ↓
               Component State
                      │
        ┌─────────────┼─────────────┐
        │             │             │
      Loading       Success        Error
        │             │             │
        └─────────────┼─────────────┘
                      ↓
              Application Action
                      ↓
              Iran LMS Module
                      ↓
              WordPress Layer
```

---

# 104. Final Principle

> **Touch در Iran LMS نباید یک لایه تزئینی باشد؛ بخشی از Interaction Architecture افزونه است. تمام Actionهای مهم باید بدون Gesture خاص قابل دسترسی باشند، Touch Targetها باید مناسب باشند، Gestureها نباید با Scroll یا رفتارهای Native تداخل ایجاد کنند و هیچ Touch Handler نباید به صورت Global، Theme یا Pluginهای دیگر را تحت تأثیر قرار دهد. در بخش‌های آموزشی مانند Lesson Player، Quiz، Assignment و Course، تعامل لمسی باید سریع، قابل پیش‌بینی و همراه با Feedback واضح باشد.**
