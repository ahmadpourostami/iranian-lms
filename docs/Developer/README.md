# `08-Developer/README.md`

**Project:** Iran LMS
**Type:** WordPress LMS Plugin
**Section:** Developer
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

پوشه `08-Developer/` مرجع اصلی توسعه‌دهندگان افزونه **Iran LMS** است.

این بخش مشخص می‌کند که قابلیت‌های تعریف‌شده در:

```text
01-Architecture/
02-Database/
03-API/
04-Modules/
05-UI/
06-Components/
07-Mobile/
```

چگونه باید در قالب یک **افزونه WordPress** پیاده‌سازی شوند.

اصل مهم پروژه:

```text
Design
   ↓
Architecture
   ↓
Database
   ↓
API
   ↓
Modules
   ↓
Components
   ↓
Mobile
   ↓
Developer Implementation
```

---

# 2. Developer Section Is Plugin-Centric

تمام مستندات این بخش با این فرض نوشته می‌شوند:

> **Iran LMS یک WordPress Plugin است، نه یک Theme و نه یک Application مستقل.**

بنابراین توسعه باید با معماری WordPress سازگار باشد.

نمونه:

```text
WordPress
│
├── Core
│
├── Themes
│
├── Plugins
│   └── Iran LMS
│       ├── Core
│       ├── Modules
│       ├── API
│       ├── Database
│       ├── Admin
│       └── Frontend
│
└── Other Plugins
```

---

# 3. Design → Code Principle

UI نباید مستقیماً و بدون معماری وارد کد شود.

هر Component ابتدا باید در Design System تعریف شده باشد.

مثلاً:

```text
06-Components/Button.md
        ↓
08-Developer/Button Implementation
```

همین رابطه برای:

```text
Card
Modal
Form
Table
Tabs
Notification
Lesson Player
Course Card
Quiz
Assignment
```

وجود دارد.

---

# 4. Source of Truth

در صورت اختلاف بین بخش‌های مختلف پروژه، توسعه‌دهنده نباید خودسرانه Component جدید بسازد.

ترتیب مرجع:

```text
Architecture
    ↓
Database
    ↓
API
    ↓
Modules
    ↓
Design System
    ↓
Components
    ↓
Mobile
    ↓
Developer Implementation
```

هر پیاده‌سازی باید با قراردادهای بالادستی هماهنگ باشد.

---

# 5. WordPress Compatibility

Iran LMS باید به عنوان یک Plugin استاندارد WordPress طراحی شود.

بنابراین کد باید تا حد امکان از:

```text
WordPress APIs
WordPress Hooks
WordPress Database APIs
WordPress HTTP APIs
WordPress Settings APIs
WordPress Authentication
WordPress Capability System
WordPress Nonces
WordPress Sanitization
WordPress Escaping
```

استفاده کند.

---

# 6. Theme Independence

افزونه نباید فرض کند Theme سایت چه ساختاری دارد.

نباید به این موارد وابسته باشد:

```text
theme-header.php
theme-footer.php
theme-sidebar.php
theme-container
theme-button
theme-modal
theme-grid
```

UI افزونه باید بتواند در Themeهای مختلف اجرا شود.

راهنمای UI پروژه نیز صراحتاً **WordPress friendly** و **Modular architecture** بودن سیستم را جزو اصول اصلی می‌داند. 

---

# 7. Plugin Independence

Iran LMS نباید بدون دلیل به Plugin دیگری وابسته باشد.

Integrationهای خارجی باید به صورت Module یا Adapter پیاده‌سازی شوند.

برای مثال:

```text
Iran LMS
│
├── Core
│
├── WooCommerce Adapter
├── SpotPlayer Adapter
├── SkyRoom Adapter
├── SMS Adapter
└── ...
```

---

# 8. Modular Architecture

قابلیت‌های اختیاری باید Module باشند.

Design Guide پروژه نمونه‌هایی مانند:

```text
WooCommerce
SpotPlayer
SkyRoom
Certificate
Wallet
SMS
Gamification
Attendance
Homework
Survey
Forum
```

را به عنوان قابلیت‌های Modular معرفی می‌کند. 

---

# 9. Disabled Module

اگر Module غیرفعال باشد:

```text
Module Disabled
       ↓
No UI
No Routes
No Actions
No Assets
No Broken Layout
```

نباید Componentهای باقی‌مانده خراب شوند.

---

# 10. Core vs Module

قابلیت‌های ضروری:

```text
Core
├── Users
├── Courses
├── Lessons
├── Learning
├── Enrollment
└── ...
```

قابلیت‌های اختیاری:

```text
Modules
├── Certificate
├── Wallet
├── Gamification
├── Webinar
├── SMS
└── ...
```

---

# 11. Dependency Rules

یک Module نباید بدون نیاز Core را به خودش وابسته کند.

صحیح:

```text
Core
 ↑
Module
```

نه:

```text
Core
 ↓
Optional Module
```

یعنی Core نباید برای اجرای خود به Module اختیاری نیاز داشته باشد.

---

# 12. PHP Architecture

کد PHP باید:

```text
Modular
Object-Oriented
Testable
Maintainable
WordPress-Compatible
```

باشد.

از فایل‌های PHP عظیم و دارای مسئولیت‌های متعدد جلوگیری شود.

---

# 13. Single Responsibility

هر Class باید یک مسئولیت اصلی داشته باشد.

بد:

```text
CourseManager
├── Database
├── API
├── Email
├── Payment
├── Rendering
└── Validation
```

صحیح‌تر:

```text
CourseRepository
CourseService
CourseValidator
CourseController
CourseRenderer
```

---

# 14. Separation of Concerns

لایه‌ها باید از هم جدا باشند:

```text
Controller
    ↓
Service
    ↓
Repository
    ↓
Database
```

و:

```text
Controller
    ↓
View / Response
```

---

# 15. Database Access

UI یا Controller نباید مستقیماً منطق پیچیده Database را اجرا کند.

بد:

```text
Controller
    ↓
SQL
```

صحیح:

```text
Controller
    ↓
Service
    ↓
Repository
    ↓
Database
```

---

# 16. API Architecture

API باید قرارداد مشخص داشته باشد.

مثلاً:

```text
REST API
   ↓
Controller
   ↓
Request Validation
   ↓
Service
   ↓
Repository
   ↓
Response
```

---

# 17. API vs Internal Service

API Endpoint نباید محل اصلی Business Logic باشد.

بد:

```text
REST Controller
├── Validation
├── Business Logic
├── Database
├── Email
└── Response
```

صحیح:

```text
REST Controller
      ↓
Service
      ↓
Repository
```

---

# 18. Validation

هر ورودی باید قبل از استفاده Validation شود.

مثلاً:

```text
Request
 ↓
Validate
 ↓
Sanitize
 ↓
Authorize
 ↓
Process
```

---

# 19. Sanitization

داده ورودی کاربر نباید مستقیماً وارد:

```text
Database
HTML
SQL
API
```

شود.

از APIهای استاندارد WordPress برای Sanitization در جای مناسب استفاده شود.

---

# 20. Escaping

داده هنگام خروج نیز باید بر اساس Context Escape شود.

مثلاً:

```text
HTML
Attribute
URL
JS
```

هرکدام Context متفاوت دارند.

اصل:

```text
Input
↓
Sanitize
↓
Store
↓
Escape on Output
```

---

# 21. Authorization

Authentication و Authorization یکی نیستند.

```text
Authentication
→ Who are you?

Authorization
→ What are you allowed to do?
```

هر Action حساس باید Permission مناسب داشته باشد.

---

# 22. WordPress Capabilities

برای Permissionها تا حد امکان از سیستم Capability خود WordPress استفاده شود.

مثلاً:

```text
manage_courses
edit_course
publish_course
manage_students
```

نام‌گذاری نهایی باید در مستندات Auth/Permissions مشخص شود.

---

# 23. Nonce

Requestهای حساس در WordPress باید در صورت مناسب بودن با Nonce محافظت شوند.

خصوصاً:

```text
Delete
Update
Save
Upload
Admin Actions
```

---

# 24. CSRF Protection

Nonceها بخشی از دفاع در برابر CSRF هستند، اما نباید جای Authorization را بگیرند.

ترتیب:

```text
Nonce
+
Capability
+
Validation
```

---

# 25. XSS Prevention

محتوای Course، Lesson، Comment، Note و سایر داده‌های کاربر نباید بدون Escape وارد HTML شود.

---

# 26. SQL Injection Prevention

Queryهای Database باید از APIهای امن WordPress یا روش‌های Parameterized استفاده کنند.

نباید Query با Concatenation ناامن ساخته شود.

---

# 27. File Upload Security

برای:

```text
Course Resources
Lesson Attachments
Assignment
Certificate
Media
```

باید:

```text
Type Validation
Size Validation
Permission Check
Safe Storage
Safe Naming
```

در نظر گرفته شود.

---

# 28. Media Architecture

Media نباید به صورت پراکنده در هر Module پیاده‌سازی شود.

باید از Media Layer مشترک استفاده شود:

```text
Media
├── Image
├── Video
├── Audio
├── Document
└── Attachment
```

---

# 29. UI Rendering

Rendering باید تا حد امکان Component-Based باشد.

مثلاً:

```text
CourseCard
    ↓
Props / Data
    ↓
Rendered UI
```

نه اینکه هر صفحه HTML خودش را از صفر بسازد.

---

# 30. Component Contract

هر Component باید مشخص کند:

```text
Name
Inputs
Outputs
States
Events
Accessibility
Responsive Behavior
Dependencies
```

---

# 31. Component Reuse

اگر Component موجود است:

```text
Use Existing Component
```

نه:

```text
Create Similar Component
```

مثلاً اگر `Button` داریم، برای Action جدید Button اختصاصی نسازیم مگر نیاز واقعی وجود داشته باشد.

---

# 32. Design Tokens

مقادیر UI باید از Design Tokenها استفاده کنند:

```text
Color
Typography
Spacing
Radius
Shadow
Breakpoint
Motion
```

راهنمای UI پروژه نیز Typography، Spacing، Grid، Colors و سایر بخش‌های Design System را به عنوان اجزای مستقل تعریف کرده است. 

---

# 33. RTL

RTL باید حالت اصلی UI ایران LMS باشد.

```text
<html dir="rtl">
```

یا Scope مناسب Component.

نباید برای RTL، Layout را با تعداد زیادی `margin-left/right` دستی کنترل کرد.

---

# 34. CSS Architecture

CSS باید Scoped و قابل کنترل باشد.

نمونه:

```text
.iran-lms
.iran-lms-course
.iran-lms-course-card
.iran-lms-lesson-player
```

از Classهای عمومی مانند:

```text
.card
.button
.container
.header
```

بدون Namespace جلوگیری شود.

---

# 35. JavaScript Namespace

JS نیز نباید Global Namespace را آلوده کند.

بد:

```javascript
window.courseData
window.player
window.modal
```

صحیح‌تر:

```text
IranLMS
 ├── Courses
 ├── Learning
 ├── Player
 └── UI
```

---

# 36. Event Handling

Eventهای Component باید Scoped باشند.

به‌خصوص:

```text
click
touch
keydown
scroll
resize
```

نباید بدون دلیل روی کل `document` یا `window` اعمال شوند.

---

# 37. Event Cleanup

اگر Component Destroy یا Unmount می‌شود:

```text
Listeners
Timers
Observers
Subscriptions
```

باید Cleanup شوند.

---

# 38. AJAX

در WordPress برای Requestهای Async باید قرارداد مشخص وجود داشته باشد.

بسته به معماری:

```text
REST API
```

اولویت دارد؛ در موارد لازم می‌توان از:

```text
admin-ajax.php
```

استفاده کرد.

---

# 39. REST API

REST Endpointها باید:

```text
Authentication
Authorization
Validation
Pagination
Filtering
Sorting
Error Handling
Versioning
```

را طبق API Standards پروژه رعایت کنند.

---

# 40. Response Contract

Response باید ساختار ثابت داشته باشد.

مثلاً:

```json
{
  "success": true,
  "data": {}
}
```

یا Contract استانداردی که در API Documentation پروژه تعریف خواهد شد.

---

# 41. Error Contract

خطا نباید فقط:

```text
Something went wrong
```

باشد.

باید امکان تشخیص:

```text
Code
Message
Context
Status
```

وجود داشته باشد.

---

# 42. Logging

Logging باید:

```text
Useful
Structured
Safe
Configurable
```

باشد.

اطلاعات حساس نباید وارد Log شوند.

---

# 43. Debug Mode

در محیط Development می‌توان Debug فعال کرد.

اما:

```text
Production
≠
Development Debug Output
```

نباید Errorهای داخلی به کاربر نهایی نمایش داده شوند.

---

# 44. Internationalization

تمام Textهای قابل نمایش باید قابل ترجمه باشند.

مثلاً:

```php
__( 'Complete Lesson', 'iran-lms' );
```

Text نباید مستقیماً Hardcode شود.

---

# 45. Text Domain

Text Domain افزونه باید ثابت و یکپارچه باشد:

```text
iran-lms
```

---

# 46. Persian Localization

UI اصلی پروژه فارسی و RTL است.

اما Plugin باید ساختار Translation-ready داشته باشد تا:

```text
Persian
English
Other Languages
```

قابل پشتیبانی باشند.

---

# 47. Date & Number Formatting

نمایش:

```text
Date
Time
Number
Currency
Percentage
```

باید از یک Formatting Layer مشخص استفاده کند.

Component نباید هرکدام روش جداگانه داشته باشند.

---

# 48. Business Logic

Business Logic نباید در Template قرار بگیرد.

بد:

```text
Template
↓
Calculate Course Progress
↓
Database Query
```

صحیح:

```text
Service
↓
Course Progress
↓
View
```

---

# 49. Caching

Cache باید در Layer مناسب قرار گیرد.

```text
Database
↓
Repository
↓
Cache
↓
Service
```

یا معماری نهایی پروژه بر اساس نیاز واقعی.

---

# 50. Performance

توسعه‌دهنده باید مراقب موارد زیر باشد:

```text
N+1 Queries
Large Queries
Unnecessary Assets
Large DOM
Repeated API Requests
Unnecessary Re-renders
Unoptimized Media
```

---

# 51. Asset Loading

CSS/JS افزونه نباید در تمام صفحات WordPress بدون نیاز Load شود.

بهتر:

```text
Course Page
→ Course Assets

Lesson Page
→ Lesson Assets

Dashboard
→ Dashboard Assets
```

---

# 52. Admin vs Frontend

Assetهای:

```text
Admin
Frontend
Mobile
Lesson Player
```

باید از هم تفکیک شوند.

---

# 53. Admin Architecture

WordPress Admin باید با Frontend افزونه قاطی نشود.

```text
Iran LMS Admin
      │
      ├── Courses
      ├── Lessons
      ├── Users
      ├── Assessments
      └── Settings
```

---

# 54. Frontend Architecture

```text
Iran LMS Frontend
      │
      ├── Course
      ├── Learning
      ├── Dashboard
      ├── Lesson Player
      ├── Quiz
      └── Assignment
```

---

# 55. Mobile Architecture

Mobile یک Application جدا نیست.

```text
Core UI
   ↓
Responsive System
   ↓
Mobile Behavior
```

فایل‌های `07-Mobile/` باید رفتار Mobile را روی همان سیستم Component تعریف کنند.

---

# 56. Focus Mode

Focus Mode نیز نباید Application مستقل باشد.

```text
Lesson Player
      ↓
Focus Mode
```

و باید از همان:

```text
Course
Lesson
Progress
Notes
Bookmark
Curriculum
```

استفاده کند.

---

# 57. External Integrations

Integrationهای خارجی باید Adapter داشته باشند.

مثلاً:

```text
PaymentGatewayInterface
        ↓
ZarinPalAdapter

VideoProviderInterface
        ↓
SpotPlayerAdapter

WebinarProviderInterface
        ↓
SkyRoomAdapter
```

---

# 58. No Vendor Lock-in

Business Logic نباید مستقیماً به Vendor خاص وابسته شود.

بد:

```text
CourseService
↓
ZarinPal API
```

صحیح:

```text
CourseService
↓
PaymentInterface
↓
ZarinPalAdapter
```

---

# 59. Hooks

برای Extensibility می‌توان از:

```text
Actions
Filters
```

استفاده کرد.

اما Hookهای زیاد و بدون قرارداد مشخص ایجاد نشوند.

---

# 60. Public Hooks

Hookهایی که Developerهای دیگر می‌توانند استفاده کنند باید:

```text
Documented
Stable
Named
Versioned
```

باشند.

---

# 61. Backward Compatibility

در صورت تغییر Public API یا Hook:

```text
Old
 ↓
Deprecation
 ↓
Migration
 ↓
New
```

انجام شود.

---

# 62. Versioning

نسخه Plugin باید Semantic Versioning داشته باشد:

```text
MAJOR.MINOR.PATCH
```

مثلاً:

```text
1.4.2
```

---

# 63. Database Migration

تغییر Schema نباید با Update ساده Plugin باعث از بین رفتن داده شود.

```text
Plugin Update
↓
Migration Check
↓
Migration
↓
New Schema
```

---

# 64. Activation

هنگام Activation:

```text
Register
↓
Check Dependencies
↓
Create Required Structures
↓
Register Capabilities
↓
Initialize Modules
```

---

# 65. Deactivation

Deactivate نباید به طور پیش‌فرض داده‌های کاربر را حذف کند.

```text
Deactivate
≠
Delete Data
```

---

# 66. Uninstall

حذف Database یا داده‌های دائمی باید فقط طبق سیاست Uninstall مشخص انجام شود.

---

# 67. Dependency Check

اگر یک Integration نیازمند Plugin دیگری باشد:

```text
Dependency Missing
↓
Clear Admin Notice
↓
Module Disabled
```

و کل Iran LMS نباید از کار بیفتد.

---

# 68. Testing

حداقل Test Layerها:

```text
Unit
Integration
API
Database
UI
Accessibility
Responsive
```

---

# 69. Regression Testing

هر تغییر در Core می‌تواند Moduleهای دیگر را تحت تأثیر قرار دهد.

پس بعد از تغییر:

```text
Core
↓
Courses
↓
Learning
↓
Assessment
↓
Commerce
↓
Certificates
```

تست شوند.

---

# 70. Security Testing

حداقل موارد:

```text
☐ XSS
☐ CSRF
☐ SQL Injection
☐ Privilege Escalation
☐ Unauthorized Access
☐ File Upload
☐ Nonce
☐ Capability
☐ REST Permission
```

---

# 71. Accessibility Testing

مطابق `07-Mobile/Mobile-Accessibility.md`:

```text
Touch
Keyboard
Screen Reader
Focus
Contrast
RTL
Responsive
```

باید تست شوند.

---

# 72. Code Review

هر Pull Request باید حداقل بررسی کند:

```text
Architecture
Security
Performance
WordPress Compatibility
UI
Accessibility
Tests
Backward Compatibility
```

---

# 73. Git Workflow

توسعه باید با Git انجام شود.

Branchهای پیشنهادی:

```text
main
develop
feature/*
fix/*
refactor/*
docs/*
```

---

# 74. Commit Convention

Commitها باید واضح باشند.

مثلاً:

```text
feat: add course enrollment service
fix: prevent duplicate lesson completion
refactor: extract course repository
docs: update API authentication
```

---

# 75. Pull Request

PR باید توضیح دهد:

```text
What changed?
Why?
Affected modules?
Database changes?
API changes?
UI changes?
Tests?
Breaking changes?
```

---

# 76. Documentation

هر Feature مهم باید Documentation داشته باشد.

حداقل:

```text
Architecture
Database
API
Module
UI
Developer
```

این ساختار باعث می‌شود Developer مجبور نباشد منطق سیستم را از روی Source Code حدس بزند.

---

# 77. File Responsibility

هر فایل Developer باید یک موضوع مشخص را توضیح دهد.

بد:

```text
Developer.md
```

با هزاران موضوع.

صحیح:

```text
Coding-Standards.md
Security.md
Hooks.md
REST-API.md
Testing.md
Performance.md
...
```

---

# 78. Developer Directory

ساختار پیشنهادی ادامه این بخش:

```text
08-Developer/
│
├── README.md
│
├── 01-Coding-Standards.md
├── 02-Architecture.md
├── 03-Plugin-Structure.md
├── 04-WordPress-Standards.md
├── 05-Security.md
├── 06-Database.md
├── 07-API.md
├── 08-Modules.md
├── 09-Components.md
├── 10-Frontend.md
├── 11-Admin.md
├── 12-JavaScript.md
├── 13-CSS.md
├── 14-Accessibility.md
├── 15-Performance.md
├── 16-Caching.md
├── 17-Testing.md
├── 18-Git.md
├── 19-Hooks.md
├── 20-Extensibility.md
├── 21-Integrations.md
├── 22-Internationalization.md
├── 23-Logging.md
├── 24-Error-Handling.md
├── 25-Migrations.md
├── 26-Versioning.md
└── 27-Release.md
```

این فهرست **نقشه پیشنهادی بخش Developer** است و در فایل‌های بعدی می‌توانیم آن را بر اساس استانداردهای پروژه اصلاح کنیم؛ قرار نیست بدون بررسی، همه موارد را قطعی فرض کنیم.

---

# 79. Developer Workflow

فرآیند توسعه هر Feature:

```text
Requirement
    ↓
Architecture
    ↓
Database
    ↓
API Contract
    ↓
Module
    ↓
Component
    ↓
Responsive / Mobile
    ↓
Implementation
    ↓
Testing
    ↓
Security Review
    ↓
Documentation
```

---

# 80. New Feature Checklist

قبل از شروع Feature جدید:

```text
☐ Requirement exists
☐ Architecture defined
☐ Database impact checked
☐ API impact checked
☐ Module identified
☐ Existing Component searched
☐ Mobile behavior defined
☐ Accessibility considered
☐ Security considered
☐ Tests planned
```

---

# 81. Before Coding

توسعه‌دهنده نباید فوراً کدنویسی را شروع کند.

ابتدا:

```text
Search Existing
↓
Understand Contract
↓
Check Dependencies
↓
Check Reuse
↓
Implement
```

---

# 82. Reuse Principle

اول:

```text
Can I reuse?
```

بعد:

```text
Can I extend?
```

و در نهایت:

```text
Do I need a new Component?
```

---

# 83. No Duplicate Logic

یک Business Rule نباید در چند نقطه تکرار شود.

مثلاً Course Progress:

```text
CourseProgressService
```

باید Source of Truth باشد.

نه اینکه:

```text
Dashboard
Lesson
Course Card
Mobile
API
```

هرکدام Progress را جداگانه محاسبه کنند.

---

# 84. Data Flow

الگوی کلی:

```text
User
 ↓
UI Component
 ↓
Controller / API
 ↓
Service
 ↓
Repository
 ↓
Database
```

و Response:

```text
Database
 ↓
Repository
 ↓
Service
 ↓
Controller
 ↓
API / View
 ↓
UI
```

---

# 85. Final Developer Principles

```text
01. Plugin First
02. WordPress Compatible
03. Theme Independent
04. Modular
05. Component Based
06. Secure by Default
07. Accessible by Default
08. RTL First
09. API Driven
10. Reusable
11. Testable
12. Maintainable
13. Performant
14. Extensible
15. Backward Compatible
```

---

# 86. Definition of Done

`08-Developer/README.md` زمانی کامل محسوب می‌شود که توسعه‌دهنده بداند:

```text
☐ Iran LMS Plugin است
☐ Theme نیست
☐ Core و Module چه تفاوتی دارند
☐ UI نباید Business Logic داشته باشد
☐ API نباید Business Logic اصلی داشته باشد
☐ Database باید از طریق Layer مناسب مصرف شود
☐ Componentها باید Reusable باشند
☐ Mobile بخشی از همان UI Architecture است
☐ Focus Mode بخشی از Lesson Player است
☐ Integrationها باید Adapter داشته باشند
☐ WordPress Security باید رعایت شود
☐ RTL باید First-Class باشد
☐ Accessibility باید از ابتدا لحاظ شود
☐ Assets باید Scoped و Conditional باشند
☐ داده‌ها نباید هنگام Deactivation حذف شوند
☐ Migration باید Versioned باشد
☐ Public Hooks باید مستند باشند
☐ تست و Code Review الزامی است
```

---

# 87. Final Architecture

```text
                         Iran LMS Plugin
                                │
             ┌──────────────────┼──────────────────┐
             │                  │                  │
            Core              Modules            UI
             │                  │                  │
       ┌─────┼─────┐      ┌─────┼─────┐      ┌────┼────┐
       │     │     │      │     │     │      │    │    │
    Users Courses Learning Cert Commerce  Components Mobile
       │     │     │      │     │     │      │    │    │
       └─────┴─────┴──────┴─────┴─────┴──────┴────┴────┘
                                │
                              API
                                │
                            Services
                                │
                          Repositories
                                │
                            Database
                                │
                           WordPress
```

---

# 88. Final Rule

> **هر چیزی که در `08-Developer/` نوشته می‌شود باید برای پیاده‌سازی واقعی Iran LMS به عنوان یک WordPress Plugin قابل استفاده باشد. Developer نباید UI را از Theme قرض بگیرد، Business Logic را داخل Template قرار دهد، Module اختیاری را به Core وابسته کند، یا برای هر قابلیت منطق جداگانه و تکراری بسازد. هدف این بخش تبدیل قراردادهای Architecture، Database، API، Modules، UI، Components و Mobile به یک مسیر توسعه امن، قابل نگهداری، قابل توسعه و سازگار با WordPress است.**

**نکته مهم:** فایل مرجع فعلی پروژه، اصولی مثل **WordPress Friendly، Component Based، RTL و Modular Architecture** را صراحتاً تأیید می‌کند؛ اما جزئیات دقیق ساختار کد `08-Developer/` در منبع فعلی تعریف نشده است. بنابراین مواردی مثل نام دقیق Classها، Namespace، ساختار نهایی پوشه‌های PHP و قرارداد دقیق API را در این README به‌عنوان **استاندارد پیشنهادی توسعه** نگه داشتم، نه اینکه آن‌ها را به‌عنوان تصمیم قبلی پروژه جا بزنم. 
