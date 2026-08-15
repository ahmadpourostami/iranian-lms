# Mobile-Navigation.md

**Path:** `07-Mobile/Mobile-Navigation.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile Navigation System
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد Navigation موبایل برای **افزونه WordPress Iran LMS** را تعریف می‌کند.

هدف، تبدیل Navigation دسکتاپ به یک تجربه مناسب برای Viewport کوچک است؛ بدون اینکه Navigation به Theme خاص، Page Builder یا Module اختیاری وابسته شود.

راهنمای اصلی پروژه در Lesson Player، Sidebarهای Curriculum و Statistics و همچنین Bottom Tabs را تعریف کرده و روی Focus Mode و حفظ Navigation ضروری تأکید دارد. 

---

# 2. Navigation Architecture

ساختار کلی:

```text
Iran LMS Plugin
│
├── Global Navigation
│
├── Student Navigation
│
├── Course Navigation
│
├── Lesson Navigation
│
└── Contextual Navigation
```

Mobile باید همین Information Architecture را حفظ کند، اما نحوه نمایش می‌تواند تغییر کند.

---

# 3. Desktop → Mobile

قاعده اصلی:

```text
Desktop Sidebar
        ↓
Mobile Drawer
```

و در Contextهای مناسب:

```text
Primary Mobile Navigation
        ↓
Bottom Navigation
```

اما Bottom Navigation جایگزین تمام Navigationهای سیستم نیست.

---

# 4. Navigation Priority

Navigationها به سه سطح تقسیم می‌شوند:

```text
Primary
Secondary
Contextual
```

### Primary

مواردی که کاربر مرتباً استفاده می‌کند.

### Secondary

مواردی که اهمیت دارند اما نیاز نیست همیشه روی صفحه باشند.

### Contextual

Navigation مربوط به همان Feature یا Page.

---

# 5. Student Navigation

برای Student Dashboard، Navigation می‌تواند شامل مواردی مانند:

```text
داشبورد
دوره‌های من
ادامه یادگیری
تکالیف
آزمون‌ها
نمرات
گواهینامه‌ها
اعلان‌ها
یادداشت‌ها
کیف پول
پروفایل
تنظیمات
خروج
```

نمونه‌های مرجع پروژه نیز ساختاری مشابه برای Sidebar دانشجو نشان می‌دهند. 

---

# 6. Mobile Main Navigation

در Mobile نباید تمام موارد بالا دائماً نمایش داده شوند.

الگوی پیشنهادی:

```text
┌──────────────────────────┐
│ Header                   │
├──────────────────────────┤
│                          │
│ Content                  │
│                          │
├──────────────────────────┤
│ Home | Courses | Learning│
│ Tasks | Profile          │
└──────────────────────────┘
```

موارد ثانویه از Drawer قابل دسترسی باشند.

---

# 7. Bottom Navigation

Bottom Navigation برای Actionهای پرتکرار مناسب است.

حداکثر پیشنهادی:

```text
4–5 Items
```

نمونه مرجع Mobile Learning نیز Bottom Navigation پنج‌گزینه‌ای شامل خانه، دوره‌ها، درس‌ها، اعلان‌ها و پروفایل دارد. 

نمونه:

```text
خانه
دوره‌ها
یادگیری
اعلان‌ها
پروفایل
```

---

# 8. Bottom Navigation Rules

```text
☐ بیشتر از حد لازم Item ندارد
☐ Label دارد
☐ Icon دارد
☐ Active State دارد
☐ Badge پشتیبانی می‌کند
☐ با RTL هماهنگ است
☐ روی Content قرار نمی‌گیرد
```

---

# 9. Active Item

Active Navigation باید واضح باشد:

```text
Icon
+
Label
+
Visual State
```

مثلاً:

```text
دوره‌ها
  ●
```

اما Active بودن نباید تنها با رنگ مشخص شود.

---

# 10. Badge

برای مواردی مانند Notification:

```text
اعلان‌ها  ۳
```

Badge باید:

```text
☐ کوچک
☐ خوانا
☐ قابل تشخیص
☐ بدون ایجاد Layout Shift
```

باشد.

---

# 11. Drawer

Drawer محل اصلی Navigation ثانویه در Mobile است.

ساختار:

```text
┌──────────────────────┐
│ Profile              │
├──────────────────────┤
│ داشبورد              │
│ دوره‌های من          │
│ تکالیف               │
│ آزمون‌ها             │
│ نمرات                │
│ گواهینامه‌ها         │
│ اعلان‌ها             │
│ یادداشت‌ها           │
├──────────────────────┤
│ تنظیمات              │
│ خروج                 │
└──────────────────────┘
```

---

# 12. Drawer Behavior

```text
Tap Menu
   ↓
Open Drawer
   ↓
Focus Drawer
   ↓
User Action
   ↓
Navigate / Close
```

Drawer باید:

```text
☐ با Backdrop بسته شود
☐ با Escape بسته شود
☐ Focus را مدیریت کند
☐ Scroll مستقل داشته باشد
```

---

# 13. Drawer Direction

در RTL:

```text
Drawer
←
```

یا از سمت مناسب Layout سیستم وارد شود، اما جهت باید با Information Architecture سازگار باشد.

نباید صرفاً به دلیل RTL، همه Drawerها الزاماً از یک سمت وارد شوند.

---

# 14. Header Navigation

Header Mobile حداقل باید Context فعلی را مشخص کند.

مثلاً:

```text
‹  دوره React
```

یا:

```text
☰   ایران LMS
```

بسته به Page.

---

# 15. Back Navigation

در صفحات عمیق:

```text
Course
 ↓
Lesson
 ↓
Quiz
 ↓
Result
```

کاربر باید بتواند مسیر برگشت را بفهمد.

Back Button باید Semantic باشد.

---

# 16. Breadcrumb

Breadcrumb کامل Desktop معمولاً در Mobile مناسب نیست.

مثلاً:

```text
خانه > دوره‌ها > برنامه‌نویسی > React > درس
```

ممکن است تبدیل شود به:

```text
‹ بازگشت به دوره
```

یا:

```text
‹ React
```

---

# 17. Course Navigation

در Course Context:

```text
Course
├── Overview
├── Curriculum
├── Instructor
├── Reviews
└── FAQ
```

در Mobile می‌توان از:

```text
Tabs
```

یا:

```text
Accordion
```

استفاده کرد.

---

# 18. Lesson Navigation

Lesson Navigation باید Actionهای اصلی را در دسترس نگه دارد:

```text
درس
فایل‌ها
تمرین
آزمون
پرسش و پاسخ
نظرات
```

این Bottom Tabs در Design Guide اصلی پروژه برای Lesson Player تعریف شده‌اند. 

---

# 19. Lesson Tabs

الگوی پیشنهادی:

```text
┌──────────────────────────────┐
│ درس | فایل‌ها | تمرین | آزمون │
└──────────────────────────────┘
```

اگر تعداد Tabs زیاد شود، از:

```text
More
```

یا Scroll افقی کنترل‌شده استفاده شود.

---

# 20. Curriculum Navigation

Curriculum در Mobile:

```text
Section
  ↓
Lessons
```

بهتر است Accordion باشد.

مثال:

```text
▼ فصل ۱
   ✓ درس ۱
   ✓ درس ۲
   ● درس ۳
   🔒 درس ۴

▶ فصل ۲
▶ فصل ۳
```

---

# 21. Current Lesson

Current Lesson باید همواره مشخص باشد.

حداقل:

```text
☐ Active State
☐ Progress State
☐ Completion State
☐ Locked State
```

---

# 22. Lesson Progress

Progress می‌تواند در Header یا Lesson Context نمایش داده شود:

```text
پیشرفت دوره
64%
```

نمونه Mobile مرجع نیز Progress دوره را در ابتدای صفحه نمایش می‌دهد. 

---

# 23. Focus Mode Navigation

Focus Mode Navigation باید حداقلی باشد.

```text
Normal
┌─────────────────────────────┐
│ Header                      │
│ Sidebar                     │
│ Content                     │
└─────────────────────────────┘

Focus
┌─────────────────────────────┐
│ Minimal Header              │
│                             │
│ Large Lesson Content        │
│                             │
│ Lesson Navigation           │
└─────────────────────────────┘
```

Sidebarهای غیرضروری حذف می‌شوند، اما Navigation ضروری و Notes باقی می‌مانند. 

---

# 24. Contextual Navigation

هر Feature می‌تواند Navigation داخلی داشته باشد.

مثلاً Quiz:

```text
سؤال ۳ از ۲۰
```

یا:

```text
قبلی
بعدی
```

این Navigation نباید با Global Navigation اشتباه شود.

---

# 25. Quiz Navigation

ساختار:

```text
Quiz
│
├── Progress
├── Question
├── Answers
│
└── Navigation
      ├── Previous
      └── Next
```

Submit باید از Navigation معمولی متمایز باشد.

---

# 26. Assignment Navigation

Assignment:

```text
Instructions
 ↓
Upload
 ↓
Review
 ↓
Submit
```

Navigation باید کاربر را مرحله‌به‌مرحله هدایت کند.

---

# 27. Profile Navigation

Profile می‌تواند:

```text
اطلاعات شخصی
دوره‌ها
دستاوردها
فعالیت
امنیت
تنظیمات
```

را داشته باشد.

در Mobile بهتر است این موارد به Tab یا List تبدیل شوند.

---

# 28. Notification Navigation

Notification:

```text
همه
خوانده نشده
خوانده شده
```

می‌تواند به Tab تبدیل شود.

نمونه UI مرجع پروژه نیز همین ساختار Tab را برای Notifications دارد. 

---

# 29. Navigation State

Navigation باید State داشته باشد:

```text
Default
Active
Hover
Focus
Pressed
Disabled
```

در Mobile:

```text
Hover
```

نباید State اصلی باشد.

---

# 30. Loading Navigation

اگر Navigation مقصد در حال Load شدن است:

```text
Tap
 ↓
Loading
```

نباید کل Navigation غیرضروری قفل شود.

فقط Action مربوط به Request باید در صورت نیاز محدود شود.

---

# 31. Permission-Aware Navigation

Navigation باید با Permission هماهنگ باشد.

مثلاً اگر کاربر اجازه مشاهده Grade ندارد:

```text
نمرات
```

نباید در Navigation او نمایش داده شود.

اما:

> مخفی کردن Navigation جایگزین Authorization سمت Server نیست.

---

# 32. Module-Aware Navigation

Moduleهای Optional باید Navigation را به‌صورت Dynamic تغییر دهند.

مثلاً:

```text
Certificate Module
Enabled
↓
گواهینامه‌ها
```

و:

```text
Certificate Module
Disabled
↓
No Certificate Navigation
```

و Layout باید بدون ایجاد فضای خالی Reflow شود.

---

# 33. Theme Independence

Navigation نباید وابسته به Header یا Footer Theme باشد.

```text
Theme Navigation
       ≠
LMS Navigation
```

Plugin فقط Navigation مربوط به خودش را کنترل می‌کند.

---

# 34. WordPress Admin vs Frontend

این فایل مربوط به Navigation **Frontend / LMS UI** است.

Navigation در:

```text
wp-admin
```

مشمول Admin UI WordPress و استانداردهای مربوط به آن است و نباید بدون دلیل با Navigation Frontend یکی شود.

---

# 35. Accessibility

Navigation باید:

```text
☐ Keyboard Accessible
☐ Screen Reader Friendly
☐ Focus Visible
☐ Semantic
☐ دارای Label
```

باشد.

برای Drawer:

```text
Open
 ↓
Focus Trap
 ↓
Close
 ↓
Return Focus
```

---

# 36. Touch

Navigationهای Mobile باید Touch-friendly باشند.

```text
☐ Menu Button
☐ Bottom Nav
☐ Drawer Items
☐ Tabs
☐ Back Button
☐ Accordion
```

---

# 37. Scroll

اگر Navigation طولانی است:

```text
Navigation
↓
Independent Scroll
```

و نه:

```text
Entire Page
↓
Scroll Until Navigation Item
```

---

# 38. Safe Areas

در دستگاه‌های دارای:

```text
Notch
Home Indicator
Rounded Corners
```

Navigation نباید با لبه‌های سیستم تداخل داشته باشد.

به‌خصوص Bottom Navigation باید فضای Safe Area را در نظر بگیرد.

---

# 39. Fixed Navigation

Bottom Navigation می‌تواند Fixed باشد، اما:

```text
Content
```

باید Padding مناسب داشته باشد تا آخرین Content زیر Navigation مخفی نشود.

---

# 40. Navigation Animation

Animation باید Minimal باشد:

```text
Open Drawer
Close Drawer
Tab Transition
Accordion
```

نباید Animation باعث تأخیر در Navigation شود.

---

# 41. RTL Rules

در RTL:

```text
☐ Text alignment
☐ Icon alignment
☐ Back/Forward semantics
☐ Drawer behavior
☐ Tab order
☐ Breadcrumb
```

باید بررسی شود.

---

# 42. Navigation Labels

Labelها باید کوتاه و واضح باشند.

ترجیح:

```text
دوره‌ها
آزمون‌ها
نمرات
اعلان‌ها
پروفایل
```

نه:

```text
مشاهده و مدیریت تمامی دوره‌های آموزشی شما
```

---

# 43. Icon + Label

Navigation مهم باید Icon و Label داشته باشد.

```text
Icon
+
Text
```

بهتر از Icon تنها است.

Icon-only فقط برای Actionهای کاملاً شناخته‌شده قابل قبول است.

---

# 44. Navigation Density

Mobile Navigation نباید شلوغ باشد.

اصل:

```text
Few
+
Important
+
Discoverable
```

---

# 45. Final Navigation Model

مدل پیشنهادی کلی:

```text
                 Iran LMS
                    │
          ┌─────────┴─────────┐
          │                   │
       Primary            Secondary
          │                   │
   Bottom Navigation        Drawer
          │                   │
          └─────────┬─────────┘
                    │
              Contextual
                    │
        ┌───────────┼───────────┐
        │           │           │
      Course      Lesson       Quiz
        │           │           │
      Tabs      Lesson Nav   Question Nav
```

---

# 46. Final Rules

```text
1. Mobile Navigation باید ساده‌تر از Desktop باشد.
2. Navigation مهم نباید پشت Hover مخفی شود.
3. Bottom Navigation فقط برای Primary Navigation است.
4. Secondary Navigation در Drawer قرار می‌گیرد.
5. Contextual Navigation داخل Feature باقی می‌ماند.
6. RTL باید در تمام Navigationها رعایت شود.
7. Permission و Module State باید Navigation را کنترل کنند.
8. Theme نباید مالک Navigation داخلی Iran LMS باشد.
9. Navigation نباید Business Logic یا Database Logic داشته باشد.
10. هیچ Navigationی نباید بدون بررسی Accessibility و Touch منتشر شود.
```

---

# 47. Definition of Done

`Mobile-Navigation.md` زمانی قابل استفاده است که هر Navigation جدید بتواند به این سؤالات پاسخ دهد:

```text
☐ این Navigation Primary است یا Secondary؟
☐ در Bottom Navigation قرار می‌گیرد یا Drawer؟
☐ Contextual است یا Global؟
☐ در RTL چگونه نمایش داده می‌شود؟
☐ در Mobile چه چیزی حذف یا جابه‌جا می‌شود؟
☐ Active State چیست؟
☐ Loading State چیست؟
☐ Permission چه اثری دارد؟
☐ Module اختیاری چه اثری دارد؟
☐ Accessibility چگونه مدیریت می‌شود؟
☐ Theme می‌تواند آن را خراب کند؟
☐ در Small Mobile هم قابل استفاده است؟
```

**اصل نهایی:**

> Navigation موبایل Iran LMS باید مسیر رسیدن کاربر به مهم‌ترین بخش‌های افزونه را کوتاه کند، نه اینکه صرفاً نسخه کوچک‌شده Sidebar دسکتاپ باشد.
