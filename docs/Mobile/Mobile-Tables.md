# `Mobile-Tables.md`

**Path:** `07-Mobile/Mobile-Tables.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Shared UI / Data Presentation
**Scope:** Mobile Table System
**Version:** 1.0
**Status:** Foundation

> این فایل برای **افزونه WordPress ایران LMS** نوشته شده است؛ بنابراین Tableها بخشی از UI افزونه هستند و نباید به ساختار یا CSS یک Theme خاص وابسته باشند. راهنمای اصلی پروژه نیز بر **RTL فارسی، Component-Based، WordPress Friendly و Modular Architecture** تأکید دارد. 

---

# 1. Purpose

Tableها برای نمایش داده‌های ساختاریافته در بخش‌هایی مانند:

```text
Student
├── Grades
├── Assignments
├── Exams
├── Transactions
├── Certificates
└── Notifications

Instructor
├── Courses
├── Lessons
├── Students
├── Assignments
├── Exams
└── Reports

Commerce
├── Orders
├── Invoices
├── Coupons
└── Transactions
```

استفاده می‌شوند.

---

# 2. Mobile Table Principle

Table دسکتاپ را نباید صرفاً با `overflow-x` داخل Mobile قرار دهیم.

اولویت:

```text
Desktop Table
      ↓
Responsive Transformation
      ↓
Mobile Data Presentation
```

در موبایل، بسته به نوع داده، Table می‌تواند به:

```text
Compact Table
Horizontal Scroll
Stacked Rows
Data Cards
Key-Value List
```

تبدیل شود.

---

# 3. Desktop vs Mobile

### Desktop

```text
┌────────┬────────┬────────┬────────┬────────┐
│ دوره   │ نمره   │ وضعیت  │ تاریخ  │ عملیات │
├────────┼────────┼────────┼────────┼────────┤
│ React  │ 92     │ کامل   │ ...    │ جزئیات │
└────────┴────────┴────────┴────────┴────────┘
```

### Mobile

```text
┌──────────────────────────┐
│ React جامع               │
│ نمره: 92                 │
│ وضعیت: تکمیل شده         │
│ تاریخ: ...               │
│                          │
│ [ مشاهده جزئیات ]        │
└──────────────────────────┘
```

---

# 4. Table Modes

سیستم Mobile Table حداقل چهار Mode داشته باشد:

```text
1. Compact Table
2. Horizontal Scroll
3. Stacked Table
4. Card/List Transformation
```

---

# 5. Compact Table

برای داده‌های کوتاه:

```text
┌──────────┬──────┬────────┐
│ دوره     │ نمره │ وضعیت  │
├──────────┼──────┼────────┤
│ React    │ 92   │ کامل   │
│ Node.js  │ 87   │ کامل   │
└──────────┴──────┴────────┘
```

مناسب برای:

```text
Short Data
Small Number of Columns
Simple Status
```

---

# 6. Horizontal Scroll

اگر ستون‌ها واقعاً باید کنار هم باقی بمانند:

```text
┌───────────────────────────→
│ دوره │ تکلیف │ آزمون │ ...
├───────────────────────────
│ React│ 28/30 │ 36/40│ ...
```

Scroll باید:

* واضح
* قابل تشخیص
* Touch Friendly

باشد.

---

# 7. Stacked Table

هر Row به یک Block تبدیل می‌شود:

```text
┌──────────────────────────┐
│ دوره                     │
│ React جامع               │
│                          │
│ نمره        92           │
│ وضعیت       تکمیل شده    │
│ رتبه        3 / 96       │
│                          │
│ [ جزئیات ]               │
└──────────────────────────┘
```

برای Mobile معمولاً این Mode خواناتر است.

---

# 8. Key-Value Mode

برای اطلاعاتی که ماهیت Table واقعی ندارند:

```text
دوره       React جامع
مدرس       سارا رضایی
نمره       92
رتبه       3 / 96
```

از Table Semantic استفاده نشود؛ بهتر است به صورت Definition List / Key-Value نمایش داده شود.

---

# 9. Course Grades

راهنمای پروژه نمونه‌ای از Table نمرات دارد که ستون‌هایی مانند:

```text
دوره
تکالیف
آزمون‌ها
پروژه‌ها
فعالیت‌ها
میانگین
رتبه در دوره
عملیات
```

را نمایش می‌دهد. 

در Mobile:

```text
┌──────────────────────────┐
│ React جامع               │
│ استاد سارا رضایی         │
├──────────────────────────┤
│ تکالیف       28 / 30     │
│ آزمون‌ها     36 / 40     │
│ پروژه‌ها     19 / 20     │
│ فعالیت‌ها     9.5 / 10   │
│ میانگین       92.5       │
│ رتبه          3 / 96     │
├──────────────────────────┤
│ [ جزئیات ]               │
└──────────────────────────┘
```

---

# 10. Assignment Table

در Desktop، Assignment List می‌تواند ستون‌های زیر را داشته باشد:

```text
تکلیف
دوره
تاریخ تحویل
امتیاز کل
وضعیت
عملیات
```

این ساختار در نمونه UI پروژه نیز دیده می‌شود. 

Mobile:

```text
┌──────────────────────────┐
│ پروژه نهایی React        │
│ React جامع               │
│                          │
│ تحویل: ۱۴۰۴/۰۳/۲۵       │
│ امتیاز: 100              │
│ وضعیت: نیاز به اقدام     │
│                          │
│ [ مشاهده و ارسال ]       │
└──────────────────────────┘
```

---

# 11. Exam Table

در Desktop ممکن است ستون‌های زیادی وجود داشته باشد:

```text
آزمون
دوره
نوع آزمون
زمان
تاریخ
وضعیت
نمره
عملیات
```

نمونه پروژه همین ساختار را برای لیست آزمون‌ها دارد. 

در Mobile:

```text
┌──────────────────────────┐
│ آزمون نهایی دوره React   │
│ React جامع               │
│                          │
│ نوع: پایانی              │
│ مدت: 90 دقیقه            │
│ وضعیت: تکمیل شده         │
│ نمره: 85%                │
│                          │
│ [ مشاهده نتیجه ]         │
└──────────────────────────┘
```

---

# 12. Transaction Table

برای Wallet:

```text
تاریخ
شرح
نوع
مبلغ
وضعیت
```

در نمونه Wallet نیز همین اطلاعات به شکل Table نمایش داده شده است. 

Mobile:

```text
┌──────────────────────────┐
│ خرید دوره React          │
│ ۱۴۰۴/۰۳/۲۸ • ۱۲:۴۵      │
│                          │
│ نوع: خرید                │
│ مبلغ: -۳۹۹,۰۰۰ تومان     │
│ وضعیت: موفق              │
└──────────────────────────┘
```

---

# 13. Table Header

Header باید:

```text
Clear
Readable
Sticky when useful
Accessible
```

باشد.

در Mobile Stacked Mode ممکن است Header حذف شود، زیرا Label هر Value همراه آن نمایش داده می‌شود.

---

# 14. Sticky Header

برای Tableهای بلند:

```text
┌──────────────────────────┐
│ نام        وضعیت         │ ← Sticky
├──────────────────────────┤
│ ...                      │
│ ...                      │
└──────────────────────────┘
```

فقط زمانی استفاده شود که واقعاً به فهم داده کمک کند.

---

# 15. Sticky First Column

در Horizontal Scroll، در صورت نیاز:

```text
┌──────────┬────────┬────────┬──────→
│ دوره     │ آزمون  │ پروژه  │ ...
│ React    │ 36     │ 19     │
```

ستون اصلی `دوره` می‌تواند Sticky باشد.

---

# 16. Horizontal Scroll Indicator

اگر Table قابل Scroll است، کاربر باید متوجه آن شود.

مثلاً:

```text
← برای مشاهده ستون‌های بیشتر بکشید →
```

یا با Shadow ظریف در لبه‌ها.

---

# 17. Row

هر Row باید:

```text
Readable
Clickable when needed
Separated
Touch Friendly
```

باشد.

---

# 18. Row Hover

Hover فقط برای Desktop است.

در Mobile نباید تعامل اصلی به Hover وابسته باشد.

---

# 19. Row Selection

اگر Table انتخاب‌پذیر باشد:

```text
☐ React جامع
☐ Node.js پیشرفته
☐ JavaScript
```

Selection State باید واضح باشد.

---

# 20. Bulk Actions

برای Tableهای مدیریتی:

```text
☐ همه

[ حذف ]
[ انتشار ]
[ تغییر وضعیت ]
```

در Mobile بهتر است Bulk Action Bar به صورت Sticky یا Bottom Action نمایش داده شود.

---

# 21. Actions

اگر چند Action وجود دارد:

```text
[ مشاهده ]
⋮
```

به جای نمایش تعداد زیادی Button کنار هم، از Overflow Menu استفاده شود.

---

# 22. Primary Action

هر Row حداکثر یک Primary Action داشته باشد.

مثلاً:

```text
[ ادامه آزمون ]
```

و Actionهای ثانویه داخل Menu.

---

# 23. Status

Status باید با:

```text
Badge
Icon
Text
```

نمایش داده شود.

مثلاً:

```text
✓ تکمیل شده
◷ پیش رو
! نیاز به اقدام
```

رنگ نباید تنها Indicator باشد.

---

# 24. Status Examples

```text
Success
✓ تکمیل شده

Warning
◷ پیش رو

Error
! تأخیر در تحویل

Info
در حال بررسی

Neutral
پیش‌نویس
```

---

# 25. Sorting

بالای Table:

```text
مرتب‌سازی:
[ جدیدترین ▼ ]
```

در Mobile بهتر است Sorting داخل Bottom Sheet یا Dropdown مناسب قرار گیرد.

---

# 26. Filtering

مثلاً:

```text
[ فیلترها ]
```

با باز شدن:

```text
┌──────────────────────────┐
│ فیلترها                  │
│                          │
│ دوره                     │
│ [ همه دوره‌ها ]          │
│                          │
│ وضعیت                    │
│ ☐ تکمیل شده              │
│ ☐ نیاز به اقدام          │
│                          │
│ [ پاک کردن ] [ اعمال ]   │
└──────────────────────────┘
```

---

# 27. Search

Tableهای بزرگ می‌توانند Search داشته باشند:

```text
🔍 جستجو در نتایج...
```

Search باید Server-side باشد، اگر Dataset بزرگ است.

---

# 28. Pagination

برای Datasetهای بزرگ:

```text
قبلی   1   2   3   بعدی
```

در Mobile بهتر است:

```text
[ قبلی ]     صفحه 2 از 10     [ بعدی ]
```

یا Infinite Loading در موارد مناسب.

---

# 29. Pagination Size

در صورت وجود:

```text
تعداد در صفحه:
[ 10 ▼ ]
```

در Mobile می‌تواند داخل Filter/Options قرار گیرد.

---

# 30. Infinite Scroll

Infinite Scroll فقط برای داده‌هایی مناسب است که:

```text
Sequential
Non-critical
Browse-oriented
```

هستند.

برای:

```text
Grades
Invoices
Transactions
Financial Records
```

Pagination معمولاً قابل پیش‌بینی‌تر است.

---

# 31. Empty State

اگر Table داده ندارد:

```text
┌──────────────────────────┐
│          ○               │
│                          │
│ هنوز داده‌ای وجود ندارد  │
│                          │
│ [ ایجاد مورد جدید ]      │
└──────────────────────────┘
```

---

# 32. Filtered Empty State

اگر Filter باعث خالی شدن نتیجه شده:

```text
نتیجه‌ای برای این فیلتر پیدا نشد.

[ پاک کردن فیلترها ]
```

---

# 33. Loading

برای Tableهای کوتاه:

```text
در حال بارگذاری...
```

و برای Tableهای بزرگ:

```text
Row Skeleton
Row Skeleton
Row Skeleton
```

استفاده شود.

---

# 34. Skeleton Table

```text
┌──────────────────────────┐
│ ████████   █████         │
│ █████████  ████          │
├──────────────────────────┤
│ ████████   █████         │
│ █████████  ████          │
└──────────────────────────┘
```

Skeleton باید ساختار واقعی Row را شبیه‌سازی کند.

---

# 35. Error State

```text
⚠ دریافت اطلاعات انجام نشد.

[ تلاش دوباره ]
```

---

# 36. Partial Loading

اگر برخی داده‌ها آماده هستند:

```text
Row 1 → Ready
Row 2 → Loading
Row 3 → Ready
```

کل Table نباید الزاماً Block شود.

---

# 37. Expandable Row

برای داده‌های پیچیده:

```text
React جامع                    ˅
```

با باز شدن:

```text
React جامع

تکالیف: 28/30
آزمون‌ها: 36/40
پروژه‌ها: 19/20
میانگین: 92.5
```

این الگو برای Mobile بسیار مناسب است.

---

# 38. Detail Drawer

برای اطلاعات بیشتر:

```text
Row
 ↓
[ مشاهده جزئیات ]
 ↓
Bottom Sheet / Drawer
```

استفاده شود.

---

# 39. Bottom Sheet Details

مثلاً:

```text
┌──────────────────────────┐
│ جزئیات نمره              │
│ ───────────────────────  │
│ React جامع               │
│                          │
│ تکالیف       28 / 30     │
│ آزمون‌ها     36 / 40     │
│ پروژه‌ها     19 / 20     │
│ فعالیت‌ها     9.5 / 10   │
│                          │
│ [ بستن ]                 │
└──────────────────────────┘
```

---

# 40. Data Priority

در Mobile باید داده‌ها بر اساس اهمیت مرتب شوند:

```text
Primary
↓
Status
↓
Important Metadata
↓
Secondary Metadata
↓
Actions
```

داده‌های کم‌اهمیت می‌توانند Collapse شوند.

---

# 41. Column Priority

برای Tableهای زیادستونه:

```text
Priority 1
Always Visible

Priority 2
Visible when possible

Priority 3
Collapsed / Details

Priority 4
Hidden
```

---

# 42. Example: Grade Table

```text
Priority 1:
دوره
میانگین
وضعیت

Priority 2:
رتبه

Priority 3:
تکالیف
آزمون‌ها
پروژه‌ها

Priority 4:
جزئیات آماری
```

---

# 43. RTL

Table به صورت RTL طراحی می‌شود.

```text
┌──────────────┬────────┬────────┐
│ دوره         │ نمره   │ وضعیت  │
└──────────────┴────────┴────────┘
```

جهت متن و ترتیب Columnها باید با RTL هماهنگ باشد.

---

# 44. Numeric Data

اعداد باید Alignment مناسب داشته باشند.

برای داده‌های عددی:

```text
92.5
28/30
399,000
3 / 96
```

خوانایی اولویت دارد.

---

# 45. LTR Data

مواردی مانند:

```text
Email
URL
Order ID
Transaction ID
Course Slug
Code
```

می‌توانند LTR باشند.

---

# 46. Currency

مبلغ:

```text
۳۹۹,۰۰۰ تومان
```

نمایش داده شود.

منبع مبلغ باید Commerce Layer باشد.

UI نباید مبلغ نهایی را محاسبه کند.

---

# 47. Date

تاریخ در UI فارسی:

```text
۱۴۰۴/۰۳/۲۸
```

یا:

```text
۲۸ خرداد ۱۴۰۴
```

طبق استاندارد Date System پروژه.

---

# 48. Relative Date

برای موارد غیرحساس:

```text
امروز
دیروز
۲ روز پیش
```

مناسب است.

اما برای:

```text
Invoice
Payment
Transaction
Deadline
```

تاریخ دقیق باید قابل مشاهده باشد.

---

# 49. Accessibility

Table باید Semantic باشد.

برای Table واقعی:

```html
<table>
<thead>
<tbody>
<th>
<td>
```

استفاده شود.

در صورت تبدیل به Card، ارتباط Label/Value باید برای Screen Reader حفظ شود.

---

# 50. Touch Targets

Actionهای Table باید حداقل Touch Target مناسب داشته باشند:

```text
44 × 44 px
```

---

# 51. Keyboard Accessibility

حتی در Mobile/Responsive UI، Component باید با Keyboard نیز قابل استفاده باشد.

```text
Tab
Enter
Space
Escape
Arrow Keys
```

در موارد مناسب.

---

# 52. Screen Reader

کاربر باید بتواند بفهمد:

```text
Row
Column
Value
Status
Action
```

چیست.

---

# 53. No Color-Only Meaning

این اشتباه است:

```text
سبز = موفق
قرمز = خطا
```

بدون متن یا Icon.

صحیح:

```text
✓ موفق
! خطا
```

---

# 54. Mobile Table Component

ساختار پیشنهادی:

```text
MobileTable
│
├── TableToolbar
│   ├── Search
│   ├── Filter
│   └── Sort
│
├── TableHeader
│
├── TableBody
│   └── TableRow
│       ├── TableCell
│       └── RowActions
│
├── Pagination
│
└── TableState
    ├── Loading
    ├── Empty
    └── Error
```

---

# 55. Responsive Transformation

Component باید بتواند Mode را بر اساس Breakpoint تغییر دهد:

```text
Desktop
→ Full Table

Tablet
→ Compact Table

Mobile
→ Stacked / Card
```

اما Breakpoint نباید تنها عامل تصمیم باشد؛ تعداد و اهمیت ستون‌ها نیز باید در نظر گرفته شود.

---

# 56. Theme Independence

CSS نباید به Theme وابسته باشد.

Namespace:

```text
.iran-lms-table
.iran-lms-table__toolbar
.iran-lms-table__header
.iran-lms-table__row
.iran-lms-table__cell
.iran-lms-table__actions
.iran-lms-table__pagination
```

---

# 57. WordPress Compatibility

Table Component باید بتواند در محیط‌های مختلف افزونه نمایش داده شود:

```text
WordPress Admin
Frontend Dashboard
Student Dashboard
Instructor Dashboard
Shortcode
Block
REST-powered UI
```

بدون وابستگی به Markup یک Theme خاص.

---

# 58. Data Boundary

Table فقط Data را نمایش می‌دهد.

```text
API / Application
       ↓
View Model
       ↓
Table
```

Table نباید مستقیماً:

```text
$wpdb
WP_Query
WooCommerce Order API
```

را برای تصمیم‌گیری Business Logic صدا بزند.

---

# 59. Permissions

اگر کاربر اجازه Action ندارد:

```text
[ ویرایش ]
```

نباید صرفاً با CSS مخفی شود.

Permission باید Server-side کنترل شود.

UI فقط State مناسب را Render می‌کند.

---

# 60. Modular Features

اگر Module مربوطه فعال نباشد، Column مربوط به آن نیز باید حذف شود.

مثلاً:

```text
Gamification Enabled
→ Badge Column

Gamification Disabled
→ Badge Column Removed
```

همان اصل Modular Architecture پروژه باید حفظ شود: Feature غیرفعال نباید Layout را خراب کند. 

---

# 61. Example: Wallet Table

```text
Mobile Wallet Transactions

┌──────────────────────────┐
│ خرید دوره React          │
│ ۱۴۰۴/۰۳/۲۸ • ۱۲:۴۵      │
│ خرید                     │
│ -۳۹۹,۰۰۰ تومان            │
│ ✓ موفق                   │
└──────────────────────────┘

┌──────────────────────────┐
│ شارژ کیف پول             │
│ ۱۴۰۴/۰۳/۲۵ • ۱۸:۲۰      │
│ شارژ                     │
│ +۵۰۰,۰۰۰ تومان            │
│ ✓ موفق                   │
└──────────────────────────┘
```

---

# 62. Example: Assignment Table

```text
┌──────────────────────────┐
│ پروژه نهایی React        │
│ React جامع               │
│                          │
│ موعد: ۱۴۰۴/۰۳/۲۵        │
│ امتیاز: 100              │
│ وضعیت: نیاز به اقدام     │
│                          │
│ [ مشاهده و ارسال ]       │
└──────────────────────────┘
```

---

# 63. Example: Exam Table

```text
┌──────────────────────────┐
│ آزمون نهایی دوره React   │
│                          │
│ دوره: React جامع         │
│ نوع: پایانی              │
│ مدت: 90 دقیقه            │
│ وضعیت: تکمیل شده         │
│ نمره: 85%                │
│                          │
│ [ مشاهده نتیجه ]         │
└──────────────────────────┘
```

---

# 64. Performance

برای Datasetهای بزرگ:

```text
Server Pagination
Server Filtering
Server Sorting
Debounced Search
Lazy Loading
```

استفاده شود.

---

# 65. Avoid Rendering Huge Datasets

این الگو مناسب نیست:

```text
10,000 Rows
↓
Render Everything
```

در عوض:

```text
API
↓
Pagination
↓
20 Rows
↓
Render
```

---

# 66. Table State Model

```text
TableState
├── data
├── loading
├── error
├── page
├── pageSize
├── search
├── filters
├── sort
├── selectedRows
└── expandedRows
```

---

# 67. Definition of Done

```text
☐ Mobile Table
☐ Compact Mode
☐ Horizontal Scroll
☐ Stacked Mode
☐ Card Transformation
☐ Key-Value Mode
☐ Responsive Transformation
☐ Header
☐ Rows
☐ Cells
☐ Status
☐ Row Actions
☐ Bulk Actions
☐ Sorting
☐ Filtering
☐ Search
☐ Pagination
☐ Empty State
☐ Filtered Empty State
☐ Loading
☐ Skeleton
☐ Error State
☐ Expandable Rows
☐ Bottom Sheet Details
☐ Sticky Header
☐ Sticky Column
☐ RTL
☐ LTR Data
☐ Numeric Alignment
☐ Currency
☐ Date
☐ Accessibility
☐ Keyboard Support
☐ Screen Reader
☐ Touch Targets
☐ Dark Mode
☐ Theme Independence
☐ WordPress Compatibility
☐ REST Compatibility
☐ Permission Handling
☐ Modular Architecture
☐ Server-side Pagination
☐ Server-side Filtering
☐ Server-side Sorting
☐ Large Dataset Handling
```

---

# 68. Final Principle

معماری نهایی:

```text
Application / API
       ↓
View Model
       ↓
MobileTable
       ↓
Responsive Mode
       ↓
┌──────────────────────────┐
│ Compact                  │
│ Horizontal               │
│ Stacked                  │
│ Card                     │
└──────────────────────────┘
```

اصل کلیدی:

> **Mobile Table در Iran LMS نباید صرفاً یک Table دسکتاپ با Scroll افقی باشد. باید بر اساس اهمیت داده، تعداد ستون‌ها و نوع عملیات، به مناسب‌ترین الگوی نمایش موبایل تبدیل شود؛ در عین حال Semantic، RTL، Accessibility، Modular Architecture و استقلال افزونه از Theme باید حفظ شود.**
