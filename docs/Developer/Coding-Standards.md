# `08-Developer/Coding-Standards.md`

**Project:** Iran LMS
**Type:** WordPress Plugin
**Section:** Developer
**Version:** 1.0
**Status:** Foundation / Developer Standard

> **توجه:** فایل مرجع فعلی پروژه، اصولی مثل **WordPress Friendly، Component Based، RTL Persian و Modular Architecture** را مشخص کرده، اما Coding Standards دقیق PHP/JS/CSS را تعریف نکرده است. 
> بنابراین این سند، **استاندارد پیشنهادی برای پیاده‌سازی Iran LMS** است و نباید به‌عنوان تصمیم قبلی پروژه تلقی شود.

---

# 1. هدف

این سند استانداردهای کدنویسی افزونه Iran LMS را مشخص می‌کند تا کد پروژه:

```text
Readable
Consistent
Secure
Maintainable
Testable
Extensible
WordPress-Compatible
```

باشد.

این استاندارد برای:

```text
PHP
JavaScript
CSS
HTML
REST API
Database
WordPress Hooks
Modules
Components
```

استفاده می‌شود.

---

# 2. اصل اصلی

Iran LMS یک **WordPress Plugin** است.

بنابراین استانداردهای توسعه باید در درجه اول با معماری WordPress سازگار باشند و نباید پروژه را به یک Application مستقل یا Theme تبدیل کنند.

```text
WordPress
   │
   └── Plugins
        │
        └── Iran LMS
             │
             ├── Core
             ├── Modules
             ├── API
             ├── Admin
             ├── Frontend
             └── Components
```

---

# 3. General Rules

کد باید:

```text
✓ ساده باشد
✓ قابل خواندن باشد
✓ مسئولیت مشخص داشته باشد
✓ قابل تست باشد
✓ قابل توسعه باشد
✓ از تکرار جلوگیری کند
✓ به WordPress احترام بگذارد
```

کد نباید صرفاً برای کوتاه‌تر شدن، پیچیده شود.

---

# 4. Principle: Readability First

این:

```php
if ($user && $user->can_access && !$user->blocked) {
    // ...
}
```

بهتر از یک Expression بسیار پیچیده و غیرقابل خواندن است.

هدف:

> Developer دیگری باید بتواند کد را بدون توضیح شفاهی درک کند.

---

# 5. Principle: Explicit Over Clever

از تکنیک‌هایی که فقط برای کوتاه کردن Code استفاده می‌شوند، در صورت کاهش خوانایی اجتناب شود.

بد:

```php
return $a && $b ? $x : $y;
```

در منطق پیچیده.

بهتر:

```php
if ($can_access) {
    return $allowed_result;
}

return $denied_result;
```

---

# 6. Naming Convention

نام‌گذاری باید:

```text
Predictable
Descriptive
Consistent
```

باشد.

نام مبهم ممنوع:

```text
$data
$item
$temp
$obj
$thing
```

مگر در Scope بسیار محدود و واضح.

---

# 7. PHP Variables

برای Variableها از `snake_case` استفاده شود:

```php
$course_id;
$lesson_title;
$user_progress;
```

نه:

```php
$courseId;
$lessonTitle;
$userProgress;
```

---

# 8. PHP Methods

Methodها نیز:

```php
get_course();
create_lesson();
calculate_progress();
```

باشند.

---

# 9. PHP Classes

Classها باید نام توصیفی داشته باشند.

نمونه:

```php
CourseService
CourseRepository
LessonService
EnrollmentService
QuizService
```

---

# 10. Class Responsibility

هر Class باید یک مسئولیت اصلی داشته باشد.

بد:

```text
CourseManager
├── Database
├── Payment
├── Email
├── Rendering
├── Validation
└── API
```

بهتر:

```text
CourseService
CourseRepository
CourseValidator
CourseController
CourseRenderer
```

---

# 11. Service Naming

Business Logic:

```text
CourseService
LessonService
EnrollmentService
ProgressService
CertificateService
```

---

# 12. Repository Naming

Database Access:

```text
CourseRepository
LessonRepository
EnrollmentRepository
QuizRepository
```

---

# 13. Controller Naming

Request Handling:

```text
CourseController
LessonController
QuizController
```

Controller نباید محل اصلی Business Logic باشد.

---

# 14. Validator Naming

Validation:

```text
CourseValidator
LessonValidator
AssignmentValidator
```

---

# 15. DTO / Data Objects

اگر پروژه برای انتقال ساختاریافته داده به Object نیاز داشته باشد، نام باید مشخص باشد:

```text
CourseData
LessonData
EnrollmentData
```

از Objectهای Generic و مبهم اجتناب شود.

---

# 16. Constants

Constantها باید برای مقادیر واقعاً ثابت استفاده شوند.

مثلاً:

```php
const VERSION = '1.0.0';
```

از Constant برای مقادیر قابل تغییر استفاده نشود.

---

# 17. Magic Numbers

بد:

```php
if ($progress > 73) {
```

اگر `73` معنی مشخصی دارد، باید نام‌گذاری شود.

مثلاً:

```php
$completion_threshold = 73;
```

---

# 18. Boolean Naming

Boolean باید نامی داشته باشد که مفهوم True/False را منتقل کند:

```php
$is_enabled;
$is_completed;
$has_access;
$can_edit;
$should_notify;
```

---

# 19. Function Naming

نام Function باید Action را مشخص کند:

```text
create_course()
update_course()
delete_course()
publish_course()
calculate_progress()
```

نه:

```text
course()
process()
handle()
do_action()
```

مگر اینکه Context کاملاً مشخص باشد.

---

# 20. Database Naming

نام Tableها و Columnها باید یک الگوی ثابت داشته باشند.

Prefix پیشنهادی پروژه:

```text
wp_iran_lms_
```

مثلاً:

```text
wp_iran_lms_courses
wp_iran_lms_lessons
wp_iran_lms_enrollments
```

> Prefix نهایی باید در سند Database نهایی پروژه تثبیت شود.

---

# 21. WordPress Database Prefix

نباید Prefix را Hardcode کنیم:

```php
$wpdb->prefix
```

باید برای Prefix واقعی WordPress استفاده شود.

---

# 22. SQL Queries

Query نباید با Concatenation ناامن ساخته شود.

بد:

```php
$sql = "SELECT * FROM table WHERE id = " . $id;
```

از روش Parameterized مناسب استفاده شود.

---

# 23. Input Handling

هر Input باید این مسیر را طی کند:

```text
Request
   ↓
Validation
   ↓
Sanitization
   ↓
Authorization
   ↓
Processing
```

---

# 24. Sanitization

Sanitize باید متناسب با نوع داده باشد.

مثلاً:

```text
Text
Email
URL
Integer
Textarea
HTML
```

همه نباید با یک روش پردازش شوند.

---

# 25. Escaping

Output باید در Context مناسب Escape شود:

```text
HTML
Attribute
URL
JavaScript
```

---

# 26. Never Trust User Input

این موارد User Input محسوب می‌شوند:

```text
GET
POST
REST Request
AJAX
Cookies
Uploaded Files
Query Parameters
Form Data
```

هیچ‌کدام نباید Trusted فرض شوند.

---

# 27. Authorization

قبل از Actionهای حساس:

```text
Capability
+
Nonce where applicable
+
Validation
```

بررسی شود.

---

# 28. Authentication ≠ Authorization

```text
Authentication
→ کاربر چه کسی است؟

Authorization
→ چه کاری اجازه دارد انجام دهد؟
```

داشتن Login به معنی داشتن Permission نیست.

---

# 29. Nonce

برای Requestهای مناسب WordPress از Nonce استفاده شود.

اما:

> Nonce جای Authorization را نمی‌گیرد.

---

# 30. File Upload

Upload باید حداقل بررسی کند:

```text
User Permission
File Type
File Size
Upload Result
Storage
```

و نباید فقط به Extension اعتماد کند.

---

# 31. PHP Formatting

قالب‌بندی کد باید در کل پروژه یکسان باشد.

مثلاً:

```php
if ($condition) {
    do_something();
}
```

نه اینکه هر فایل Style متفاوتی داشته باشد.

---

# 32. Indentation

Indentation باید ثابت باشد.

ترجیح پروژه:

```text
4 spaces
```

و استفاده از Tab/Space به صورت مخلوط ممنوع.

---

# 33. Braces

Braceها باید واضح باشند:

```php
if ($condition) {
    // code
}
```

نه ساختارهای مبهم.

---

# 34. One Statement Per Line

ترجیحاً هر Statement در یک Line قرار گیرد.

بد:

```php
$a = 1; $b = 2; $c = 3;
```

بهتر:

```php
$a = 1;
$b = 2;
$c = 3;
```

---

# 35. Long Lines

Lineهای بسیار طولانی باید شکسته شوند تا خوانایی حفظ شود.

---

# 36. Comments

Comment باید توضیح دهد:

> چرا؟

نه اینکه فقط بگوید:

> چه اتفاقی افتاده.

بد:

```php
// Get course
$course = $repository->get($id);
```

بهتر:

```php
// Load the course before checking enrollment permissions.
$course = $repository->get($id);
```

---

# 37. Avoid Obvious Comments

کد واضح نباید با Commentهای اضافی پوشانده شود.

---

# 38. PHPDoc

برای Classها و Methodهای Public مهم، Documentation مناسب نوشته شود.

مثلاً:

```php
/**
 * Calculates the user's progress in a course.
 *
 * @param int $user_id
 * @param int $course_id
 * @return float
 */
```

---

# 39. Error Handling

Error نباید بی‌صدا نادیده گرفته شود.

بد:

```php
$result = do_something();
```

بدتر:

```php
@do_something();
```

استفاده بی‌دلیل از `@` ممنوع.

---

# 40. Exceptions

Exception فقط زمانی استفاده شود که واقعاً برای Flow پروژه مناسب باشد.

Exception نباید جای Validation عادی را بگیرد.

---

# 41. Return Values

Methodها باید Return Contract مشخص داشته باشند.

مثلاً:

```text
Course|null
bool
int
array
WP_Error
```

و این Contract باید در کل پروژه ثابت باشد.

---

# 42. WordPress Errors

در بخش‌هایی که با APIهای WordPress تعامل دارند، `WP_Error` باید به شکل Consistent مدیریت شود.

---

# 43. REST API

REST Controller فقط باید:

```text
Receive
Validate
Authorize
Call Service
Format Response
```

انجام دهد.

---

# 44. REST Business Logic

Business Logic نباید در Callback Endpoint نوشته شود.

بد:

```text
REST Endpoint
 ├── Query
 ├── Calculation
 ├── Validation
 ├── Update
 └── Response
```

بهتر:

```text
REST Endpoint
      ↓
Service
      ↓
Repository
```

---

# 45. JavaScript Naming

در JavaScript از `camelCase` استفاده شود:

```javascript
courseId
lessonId
isCompleted
userProgress
```

---

# 46. JavaScript Functions

```javascript
loadCourse();
saveLesson();
completeLesson();
openModal();
```

---

# 47. JavaScript Classes

در صورت استفاده از Class:

```javascript
CoursePlayer
LessonPlayer
ModalManager
```

---

# 48. Global JavaScript

Global Namespace نباید آلوده شود.

به جای Variableهای پراکنده:

```javascript
window.player;
window.modal;
window.course;
```

یک Namespace مشخص برای افزونه در نظر گرفته شود.

مثلاً:

```javascript
window.IranLMS = window.IranLMS || {};
```

> ساختار نهایی Namespace باید با معماری JavaScript پروژه تثبیت شود.

---

# 49. DOM Selectors

Selectorها باید Namespace داشته باشند.

بد:

```javascript
document.querySelector('.button');
```

بهتر:

```javascript
document.querySelector('.iran-lms-button');
```

---

# 50. Event Listeners

Event باید تا حد امکان به Component مربوط باشد.

بد:

```javascript
document.addEventListener('click', handler);
```

وقتی نیاز به Event Delegation عمومی وجود ندارد.

---

# 51. Event Delegation

برای Listهای Dynamic می‌توان از Event Delegation استفاده کرد؛ اما Scope باید محدود باشد.

---

# 52. Cleanup

Listener، Timer، Observer و Subscriptionهایی که دیگر لازم نیستند باید حذف شوند.

---

# 53. Async Operations

برای Requestهای Async باید Stateها مشخص باشند:

```text
Idle
Loading
Success
Error
```

مثلاً:

```text
Request
  ↓
Loading
  ├── Success
  └── Error
```

---

# 54. CSS Naming

CSS باید Namespace افزونه داشته باشد.

پیشنهاد:

```text
.iran-lms-*
```

مثلاً:

```css
.iran-lms-card
.iran-lms-button
.iran-lms-course-card
.iran-lms-modal
```

---

# 55. Avoid Generic CSS

از Classهای عمومی مثل:

```text
.card
.button
.title
.container
.header
```

در Scope عمومی افزونه اجتناب شود.

---

# 56. CSS Variables

Design Tokenها بهتر است به صورت CSS Variable تعریف شوند:

```css
--iran-lms-color-primary
--iran-lms-spacing-md
--iran-lms-radius-md
```

---

# 57. No Inline Styles

تا حد امکان:

```html
style="..."
```

برای UI اصلی افزونه استفاده نشود.

---

# 58. RTL CSS

برای Layoutهای RTL از Logical Properties تا حد امکان استفاده شود.

مثلاً:

```css
margin-inline-start
padding-inline-end
inset-inline-start
```

به جای وابستگی شدید به:

```css
margin-left
margin-right
```

---

# 59. Responsive CSS

Responsive behavior باید از Design System پروژه پیروی کند.

نباید هر Component Breakpointهای کاملاً متفاوت داشته باشد.

---

# 60. Component-Based CSS

Style هر Component باید تا حد امکان Scope مشخص داشته باشد:

```text
CourseCard
Modal
Button
Tabs
LessonPlayer
```

---

# 61. Accessibility in Code

Accessibility باید هنگام Coding رعایت شود، نه در پایان.

موارد مهم:

```text
Semantic HTML
ARIA
Focus
Keyboard
Labels
Contrast
Screen Reader
```

---

# 62. HTML

از Semantic Elementها استفاده شود:

```html
<button>
<a>
<nav>
<main>
<section>
<form>
<label>
```

به جای استفاده افراطی از `div`.

---

# 63. Button vs Link

Action:

```html
<button>
```

Navigation:

```html
<a>
```

نباید برای هر دو از `<div>` استفاده شود.

---

# 64. Accessible Names

Icon-only Button باید Accessible Name داشته باشد.

```html
<button aria-label="نشان‌گذاری درس">
```

---

# 65. Internationalization

تمام متن‌های User-Facing باید Translation-ready باشند.

بد:

```php
echo 'دوره با موفقیت ذخیره شد';
```

بهتر:

```php
esc_html_e(
    'Course saved successfully.',
    'iran-lms'
);
```

---

# 66. Text Domain

Text Domain پروژه:

```text
iran-lms
```

باید یکسان باشد.

---

# 67. Persian UI

UI پیش‌فرض پروژه:

```text
Persian
RTL
```

است؛ اما Code نباید به متن فارسی Hardcode شده وابسته باشد.

---

# 68. Date / Number / Currency

Formatting نباید در Componentهای مختلف تکرار شود.

بهتر است:

```text
DateFormatter
NumberFormatter
CurrencyFormatter
```

یا Layer مشابه مرکزی داشته باشیم.

---

# 69. Module Coding

هر Module باید تا حد امکان مستقل باشد:

```text
Module
├── Registration
├── Services
├── Controllers
├── Assets
└── Integration
```

---

# 70. Disabled Modules

کد Module غیرفعال نباید:

```text
Routes
Assets
Hooks
Queries
```

غیرضروری را فعال نگه دارد.

---

# 71. Core Dependencies

Core نباید به Optional Module وابسته باشد.

```text
Core
 ↑
Optional Module
```

---

# 72. Integration Adapters

Integration خارجی باید Adapter داشته باشد.

مثلاً:

```text
PaymentInterface
      ↓
ZarinPalAdapter
```

به جای وابستگی مستقیم Service اصلی به Vendor.

---

# 73. No Vendor Logic in Core

Core نباید بداند Vendor خاص چگونه کار می‌کند.

---

# 74. Database Queries in Repositories

ترجیحاً Queryهای Database در Repository/Database Layer قرار گیرند.

---

# 75. Business Rules in Services

قوانین اصلی سیستم در Service قرار گیرند.

مثلاً:

```text
EnrollmentService
ProgressService
CertificateService
```

---

# 76. Rendering in Views/Components

Rendering نباید Business Rule اصلی را اجرا کند.

---

# 77. No Duplicate Business Logic

مثلاً Progress نباید در:

```text
Dashboard
CourseCard
Lesson
API
Mobile
```

به صورت جداگانه محاسبه شود.

یک Source of Truth داشته باشد.

---

# 78. Performance

Developer باید از موارد زیر جلوگیری کند:

```text
N+1 Queries
Unnecessary Queries
Repeated API Calls
Unnecessary Asset Loading
Large DOM
Duplicate Calculations
```

---

# 79. Assets

Assetها فقط زمانی Load شوند که مورد نیاز هستند.

```text
Course Page
→ Course Assets

Lesson Page
→ Lesson Assets

Quiz
→ Quiz Assets
```

---

# 80. Caching

Cache نباید باعث ناسازگاری داده‌های حساس Learning شود.

خصوصاً:

```text
Progress
Quiz Attempt
Enrollment
Payment
Certificate
```

باید با دقت Cache شوند.

---

# 81. Security Priority

ترتیب ذهنی Developer:

```text
Security
↓
Correctness
↓
Maintainability
↓
Performance
↓
Convenience
```

Performance نباید با حذف Security به دست بیاید.

---

# 82. Git

هر تغییر باید قابل ردیابی باشد.

Commit باید یک هدف مشخص داشته باشد.

بد:

```text
update stuff
fix things
changes
```

بهتر:

```text
feat: add lesson completion service
fix: prevent duplicate quiz attempts
refactor: extract course repository
```

---

# 83. Small Commits

ترجیحاً Commitها کوچک و منطقی باشند.

یک Commit نباید هم‌زمان:

```text
Database
UI
API
Refactor
Unrelated Fix
```

را تغییر دهد، مگر واقعاً به هم وابسته باشند.

---

# 84. Code Review

قبل از Merge:

```text
☐ Correctness
☐ Security
☐ Architecture
☐ WordPress Compatibility
☐ Performance
☐ Accessibility
☐ Tests
☐ Documentation
```

بررسی شود.

---

# 85. Testing

هر Feature مهم باید Test مناسب داشته باشد.

```text
Unit
Integration
API
Database
UI
Accessibility
```

---

# 86. Backward Compatibility

تغییرات Public نباید بدون بررسی Compatibility انجام شوند.

موارد حساس:

```text
REST Endpoints
Hooks
Filters
Database Schema
Public Classes
Public Methods
Settings
```

---

# 87. Deprecation

اگر API یا Hookی قرار است حذف شود:

```text
Current
 ↓
Deprecated
 ↓
Migration Notice
 ↓
Removed in Future Major Version
```

---

# 88. Debugging

Debug Output نباید وارد Production شود.

بد:

```php
var_dump($course);
die();
```

یا:

```php
print_r($data);
```

در Production Code.

---

# 89. Sensitive Data

هرگز موارد زیر در Log یا Error Message عمومی قرار نگیرند:

```text
Passwords
Tokens
API Keys
Payment Secrets
Private User Data
Authentication Credentials
```

---

# 90. Naming Consistency

یک مفهوم باید یک نام داشته باشد.

مثلاً اگر پروژه از:

```text
course_id
```

استفاده می‌کند، در جای دیگر برای همان مفهوم:

```text
training_id
program_id
course_identifier
```

نسازیم.

---

# 91. Developer Checklist

قبل از ارسال Code:

```text
☐ Naming consistent
☐ Formatting consistent
☐ No dead code
☐ No debug output
☐ No duplicated logic
☐ Input validated
☐ Output escaped
☐ Permissions checked
☐ Nonce checked where needed
☐ Errors handled
☐ Translation-ready
☐ RTL compatible
☐ Accessibility considered
☐ Assets scoped
☐ Module boundaries respected
☐ Tests added
```

---

# 92. Feature Checklist

برای Feature جدید:

```text
Requirement
    ↓
Architecture
    ↓
Existing Code Search
    ↓
Reuse
    ↓
Implementation
    ↓
Security
    ↓
Accessibility
    ↓
Testing
    ↓
Documentation
```

---

# 93. Anti-Patterns

موارد زیر در پروژه ممنوع یا به‌شدت نامطلوب هستند:

```text
❌ Business Logic inside Template
❌ SQL inside UI Component
❌ Hardcoded User-Facing Text
❌ Generic Global CSS
❌ Global JS Pollution
❌ Unvalidated Input
❌ Unescaped Output
❌ Capability Bypass
❌ Nonce-only Authorization
❌ Duplicate Business Logic
❌ Optional Module coupled to Core
❌ Vendor Logic inside Core
❌ Debug Output in Production
❌ Silent Error Suppression
❌ Unnecessary Global Event Listeners
```

---

# 94. Standard Architecture

الگوی کلی Code:

```text
                        Iran LMS
                           │
                    ┌──────┴──────┐
                    │             │
                   Admin       Frontend
                    │             │
                 Controller    Component
                    │             │
                    └──────┬──────┘
                           ↓
                       Service
                           ↓
                     Repository
                           ↓
                       Database
```

برای API:

```text
Request
  ↓
Controller
  ↓
Validation
  ↓
Authorization
  ↓
Service
  ↓
Repository
  ↓
Response
```

---

# 95. WordPress Boundary

کد پروژه باید مرز مشخصی بین Domain Logic و WordPress داشته باشد.

ترجیحاً:

```text
Domain Logic
     ↓
Application Layer
     ↓
WordPress Adapter
```

تا Business Logic تا حد امکان به APIهای خاص WordPress قفل نشود.

---

# 96. What This Standard Does Not Define

این فایل عمداً وارد جزئیات زیر نمی‌شود:

```text
Database Schema
REST Endpoint Definitions
Module Contracts
Component API
Exact Folder Structure
Exact Namespace
Exact PHP Autoloading Strategy
Deployment Process
Release Process
```

این موارد باید در فایل‌های تخصصی خودشان تعریف شوند.

---

# 97. Source of Truth

در صورت اختلاف:

```text
Architecture
    ↓
Database
    ↓
API
    ↓
Modules
    ↓
UI / Design System
    ↓
Components
    ↓
Mobile
    ↓
Developer Standards
```

و اگر استاندارد جدید Developer با معماری بالادستی تضاد داشت، ابتدا باید معماری اصلاح/تصمیم‌گیری شود؛ نباید Developer به‌صورت مستقل قرارداد سیستم را تغییر دهد.

---

# 98. Definition of Done

این فایل زمانی قابل قبول است که تمام Developerهای پروژه بتوانند بر اساس آن:

```text
☐ PHP یکدست بنویسند
☐ JavaScript یکدست بنویسند
☐ CSS یکدست بنویسند
☐ WordPress را به شکل صحیح مصرف کنند
☐ Security را رعایت کنند
☐ Moduleها را مستقل نگه دارند
☐ Componentها را Reuse کنند
☐ Business Logic را از UI جدا کنند
☐ API را از Service جدا کنند
☐ Database را از Business Logic جدا کنند
☐ RTL و Accessibility را رعایت کنند
☐ کد قابل تست تولید کنند
```

---

# 99. Final Rule

> **هر خط کد Iran LMS باید با این سؤال بررسی شود: آیا این کد واقعاً متعلق به همین Layer و همین مسئولیت است؟**

اگر پاسخ منفی است، ابتدا Architecture را اصلاح کن؛ سپس کد بنویس.

```text
Correct Layer
+
Clear Responsibility
+
WordPress Compatibility
+
Security
+
Accessibility
+
Reusability
=
Iran LMS Code Standard
```

