یک اصلاح مهم هم نسبت به `Coding-Standards.md` قبلی پیدا شد: در استاندارد رسمی WordPress، برای PHP و JS و CSS استفاده از **Tab برای indentation** توصیه شده، در حالی که در فایل قبلی ما `4 spaces` نوشته بودیم. بنابراین `Coding-Standards.md` قبلی باید در مرحله اصلاح بعدی بازنویسی شود. استاندارد رسمی WordPress همچنین روی Interoperability، Security و Translatability تأکید دارد. ([WordPress Developer Resources][1])

---

# `08-Developer/WordPress-Standards.md`

**Project:** Iran LMS
**Type:** WordPress LMS Plugin
**Section:** Developer
**Version:** 1.0
**Status:** Development Standard

---

# 1. Purpose

این فایل استانداردهای مخصوص **توسعه افزونه Iran LMS روی WordPress** را مشخص می‌کند.

این سند مکمل `Coding-Standards.md` و `Architecture.md` است و مشخص می‌کند Iran LMS چگونه باید با اکوسیستم WordPress تعامل داشته باشد.

مبنای این فایل، استانداردهای رسمی WordPress برای Plugin Development، Coding Standards، Security، Hooks، REST API و Plugin Lifecycle است. ([WordPress Developer Resources][2])

---

# 2. Core Principle

Iran LMS باید یک:

```text
WordPress Plugin
```

باقی بماند.

نه:

```text
Theme
Standalone SaaS
Standalone PHP Application
Separate CMS
```

معماری:

```text
WordPress
   │
   └── Iran LMS Plugin
          │
          ├── Core
          ├── Modules
          ├── Services
          ├── API
          ├── Admin
          ├── Frontend
          └── Components
```

---

# 3. WordPress Compatibility

کد Iran LMS باید با APIها و Conventionهای WordPress تا حد امکان سازگار باشد.

از قابلیت‌های استاندارد WordPress استفاده شود:

```text
Hooks
Filters
Options API
Settings API
Metadata API
Users API
Capabilities
REST API
HTTP API
Filesystem API
Cron
Transients
Internationalization
```

در صورت وجود API رسمی WordPress، ساخت راه‌حل موازی بدون دلیل معماری مناسب نیست. Plugin Handbook نیز همین APIها را به‌عنوان بخش‌های اصلی توسعه Plugin معرفی می‌کند. ([WordPress Developer Resources][2])

---

# 4. WordPress Coding Standards

تمام Code جدید پروژه باید تا حد امکان با WordPress Coding Standards هماهنگ باشد.

WordPress این Standards را برای Pluginها و Themeها نیز توصیه می‌کند و آن‌ها فقط Style نیستند؛ موضوعاتی مانند امنیت، ترجمه‌پذیری و Interoperability را نیز دربر می‌گیرند. ([WordPress Developer Resources][3])

---

# 5. PHP Indentation

برای PHP از **Tabs** مطابق WordPress Coding Standards استفاده شود.

```php
if ( $course ) {
	$course_title = $course->get_title();
}
```

نه:

```php
if ( $course ) {
    $course_title = $course->get_title();
}
```

این مورد باید در `Coding-Standards.md` قبلی نیز اصلاح شود. ([WordPress Developer Resources][3])

---

# 6. PHP Naming

برای Function و Variable:

```php
$course_id;
$user_progress;

get_course();
calculate_progress();
```

یعنی:

```text
lowercase
+
underscore
```

و نه:

```php
$courseId;
getCourse();
```

WordPress صراحتاً برای Function، Variable، Action و Filter نام‌گذاری lowercase با underscore را توصیه می‌کند. ([WordPress Developer Resources][3])

---

# 7. Class Naming

برای Class، Interface، Trait و Enum از نام‌های Capitalized استفاده شود.

مثلاً:

```text
Course_Service
Course_Repository
Lesson_Service
Enrollment_Service
```

در صورت استفاده از Namespace، Namespace اختصاصی پروژه باید استفاده شود.

Namespaceهای `wp` و `WordPress` برای خود WordPress رزرو هستند. ([WordPress Developer Resources][3])

---

# 8. Plugin Namespace

Iran LMS نباید از Namespaceهای عمومی و قابل برخورد استفاده کند.

ممنوع:

```php
namespace WordPress;
namespace WP;
namespace LMS;
```

Namespace نهایی پروژه باید در سند ساختار PHP پروژه تثبیت شود.

---

# 9. Plugin Prefix

تمام مواردی که Namespace روی آن‌ها اثر ندارد باید Prefix مناسب داشته باشند.

این موارد شامل:

```text
Hooks
Functions
Constants
Options
Transients
Meta Keys
Database Tables
AJAX Actions
REST Namespace
```

می‌شوند.

---

# 10. Plugin Text Domain

Text Domain پروژه:

```text
iran-lms
```

باید در تمام Translation Functionها ثابت باشد.

مثلاً:

```php
__( 'Course completed.', 'iran-lms' );
```

---

# 11. Translation Ready

تمام متن‌های User-Facing باید Translation-ready باشند.

بد:

```php
echo 'دوره با موفقیت تکمیل شد';
```

بهتر:

```php
echo esc_html__(
	'Course completed successfully.',
	'iran-lms'
);
```

---

# 12. Never Hardcode UI Text

متن‌های UI نباید در Business Logic Hardcode شوند.

```text
Service
    ↓
Data / Status
    ↓
UI
    ↓
Translation
```

---

# 13. Security Principle

اصل امنیتی WordPress:

> Never trust user input.

همچنین WordPress توصیه می‌کند داده خروجی تا حد امکان در آخرین مرحله Escape شود. ([WordPress Developer Resources][4])

مسیر:

```text
Input
 ↓
Validate
 ↓
Sanitize
 ↓
Authorize
 ↓
Process
 ↓
Escape Output
```

---

# 14. Validation

Validation برای بررسی درست بودن داده است.

مثلاً:

```text
Course ID
Email
Price
Date
Status
Enum
```

نباید صرفاً Sanitize شوند و سپس معتبر فرض شوند.

---

# 15. Sanitization

Sanitization برای پاک‌سازی داده قبل از ذخیره یا پردازش مناسب است.

روش Sanitization باید متناسب با نوع داده باشد.

---

# 16. Escaping

Output باید بر اساس Context Escape شود.

مثلاً:

```php
esc_html()
esc_attr()
esc_url()
esc_js()
wp_kses()
```

WordPress توصیه می‌کند داده‌های غیرقابل اعتماد، شامل داده‌های Database و User، هنگام Output Escape شوند. ([WordPress Developer Resources][4])

---

# 17. Database Data Is Not Automatically Trusted

این اشتباه ممنوع است:

```text
Database
→ Trusted
```

داده Database نیز ممکن است قبلاً توسط User یا سیستم خارجی وارد شده باشد.

پس:

```text
Database
 ↓
Output Context
 ↓
Escape
```

---

# 18. Capabilities

برای Actionهای حساس باید Capability بررسی شود.

مثلاً:

```php
current_user_can( 'manage_options' );
```

یا Capability اختصاصی:

```text
manage_iran_lms_courses
edit_iran_lms_course
manage_iran_lms_settings
```

---

# 19. Authentication vs Authorization

Login بودن کاربر به معنی مجاز بودن Action نیست.

```text
Authentication
→ Who are you?

Authorization
→ What are you allowed to do?
```

---

# 20. Nonces

Nonce برای محافظت از Requestهای مناسب WordPress در برابر CSRF استفاده شود.

اما:

> Nonce جای Capability Check نیست.

ساختار:

```text
Nonce
+
Capability
+
Validation
```

---

# 21. Admin Requests

برای Requestهای Admin:

```text
Request
 ↓
Nonce
 ↓
Capability
 ↓
Validation
 ↓
Sanitization
 ↓
Service
```

---

# 22. REST Requests

REST API نیز باید Authorization و Validation مناسب داشته باشد.

```text
REST Request
 ↓
Authentication
 ↓
Permission Check
 ↓
Validation
 ↓
Service
 ↓
Response
```

---

# 23. REST API Namespace

REST API باید Namespace اختصاصی داشته باشد.

الگوی پیشنهادی:

```text
/wp-json/iran-lms/v1/
```

Versioning باید از ابتدا در نظر گرفته شود.

WordPress REST API بخشی رسمی از Plugin Handbook است و برای ساخت APIهای قابل مصرف توسط Clientهای مختلف طراحی شده است. ([WordPress Developer Resources][5])

---

# 24. REST Controller

Controller باید مسئول:

```text
Receive
Validate
Authorize
Call Service
Format Response
```

باشد.

نباید محل اصلی Business Logic باشد.

---

# 25. REST Response

Response باید ساختار Consistent داشته باشد.

موارد مهم:

```text
Data
Status
Errors
Pagination
Meta
```

در صورت نیاز.

---

# 26. Hooks

Hooks یکی از پایه‌های اصلی WordPress Plugin Architecture هستند.

دو نوع اصلی:

```text
Actions
Filters
```

WordPress Plugin Handbook Hooks را یکی از روش‌های اصلی تعامل Plugin با WordPress و سایر توسعه‌دهندگان معرفی می‌کند. ([WordPress Developer Resources][2])

---

# 27. Actions

Action برای اجرای عملیات است.

مثلاً:

```php
do_action( 'iran_lms_course_completed', $course_id, $user_id );
```

---

# 28. Filters

Filter برای تغییر Value است.

مثلاً:

```php
apply_filters(
	'iran_lms_course_price',
	$price,
	$course_id
);
```

---

# 29. Custom Hook Naming

Hookهای Iran LMS باید Prefix داشته باشند:

```text
iran_lms_*
```

مثلاً:

```text
iran_lms_course_created
iran_lms_course_completed
iran_lms_before_enrollment
iran_lms_after_enrollment
```

---

# 30. Hook Arguments

Hookها باید Argumentهای مشخص و مستند داشته باشند.

مثلاً:

```php
/**
 * Fires after a student completes a course.
 *
 * @param int $course_id Course ID.
 * @param int $user_id   User ID.
 */
do_action(
	'iran_lms_course_completed',
	$course_id,
	$user_id
);
```

WordPress برای Documentation مربوط به Hookها استاندارد PHP Documentation مشخص دارد. ([WordPress Developer Resources][6])

---

# 31. Avoid Anonymous Hook Callbacks

برای Hookهایی که نیاز به Remove شدن دارند، Callbackهای Anonymous نباید استفاده شوند.

WordPress Coding Standards نیز اشاره می‌کند که حذف Closureهای استفاده‌شده به‌عنوان Action/Filter Callback پیچیده است. ([WordPress Developer Resources][3])

بهتر:

```php
add_action(
	'init',
	array( $this, 'register_courses' )
);
```

---

# 32. Plugin Bootstrap

فایل اصلی Plugin باید تا حد امکان کوچک باشد.

```text
Plugin File
    ↓
Bootstrap
    ↓
Core
    ↓
Modules
```

Business Logic نباید در فایل اصلی Plugin قرار گیرد.

---

# 33. Plugin Header

فایل اصلی Plugin باید Header استاندارد WordPress داشته باشد.

نمونه:

```php
/**
 * Plugin Name: Iran LMS
 * Description: Learning Management System for WordPress.
 * Version: 1.0.0
 * Text Domain: iran-lms
 */
```

مقادیر نهایی باید با Release Configuration پروژه هماهنگ شوند.

---

# 34. Activation

Activation باید از API رسمی WordPress استفاده کند.

کارهای ممکن:

```text
Database Setup
Capabilities
Default Options
Rewrite Rules
Initial Configuration
```

Activation نباید بدون دلیل داده‌های User را تغییر دهد.

---

# 35. Deactivation

Deactivation نباید معادل Uninstall باشد.

```text
Deactivate
≠
Delete Data
```

اطلاعات دوره‌ها، Enrollmentها، Progress و سایر داده‌های LMS نباید صرفاً با Deactivate حذف شوند.

---

# 36. Uninstall

حذف دائمی داده باید فقط در Uninstall Flow تعریف‌شده انجام شود.

WordPress Plugin Handbook برای Activation، Deactivation و Uninstall مکانیزم‌های رسمی دارد. ([WordPress Developer Resources][5])

---

# 37. Database Access

Database Access باید از `$wpdb` و APIهای مناسب WordPress استفاده کند.

بد:

```php
mysqli_query();
```

برای Database اصلی WordPress.

---

# 38. `$wpdb`

برای Queryهای مستقیم:

```php
global $wpdb;
```

و Query باید با روش امن مناسب ساخته شود.

---

# 39. Prepared Queries

ورودی User نباید مستقیم وارد SQL شود.

بد:

```php
$sql = "SELECT * FROM table WHERE id = " . $id;
```

بهتر:

```php
$sql = $wpdb->prepare(
	"SELECT * FROM {$table} WHERE id = %d",
	$id
);
```

---

# 40. Database Prefix

Prefix جدول نباید Hardcode شود.

از:

```php
$wpdb->prefix
```

استفاده شود.

مثلاً:

```php
$table_name = $wpdb->prefix . 'iran_lms_courses';
```

---

# 41. Database Naming

نام جدول باید:

```text
WordPress Prefix
+
Plugin Prefix
+
Entity
```

باشد.

مثلاً:

```text
wp_iran_lms_courses
wp_iran_lms_enrollments
```

Prefix واقعی باید از `$wpdb->prefix` گرفته شود.

---

# 42. Options API

برای Configurationهای ساده Plugin از Options API استفاده شود.

مثلاً:

```text
iran_lms_settings
```

اما داده‌های حجیم و رابطه‌ای نباید به شکل نامناسب در Options ذخیره شوند.

---

# 43. Settings API

صفحات تنظیمات Admin باید تا حد امکان از Settings API استفاده کنند.

این باعث می‌شود:

```text
Registration
Validation
Sanitization
Settings Storage
```

ساختار استانداردتری داشته باشد.

---

# 44. Metadata

برای داده‌هایی که به Entityهای WordPress متصل هستند، در صورت مناسب بودن از Metadata API استفاده شود.

مثلاً:

```text
User Meta
Post Meta
Term Meta
```

اما نباید فقط به دلیل سهولت، تمام داده‌های LMS به Meta تبدیل شوند.

---

# 45. Users

User اصلی باید با سیستم User WordPress هماهنگ باشد.

نباید سیستم Authentication موازی برای Userهای عادی LMS ساخته شود مگر دلیل معماری بسیار مشخصی وجود داشته باشد.

---

# 46. Roles

Roleهای LMS در صورت نیاز باید با Role/Capability سیستم WordPress یکپارچه باشند.

مثلاً:

```text
Student
Instructor
Manager
```

در سطح Capability طراحی شوند.

---

# 47. Capabilities Over Role Names

Business Logic نباید بیش از حد به نام Role وابسته باشد.

بد:

```php
if ( $user->role === 'instructor' ) {
```

بهتر:

```php
if ( current_user_can( 'edit_iran_lms_courses' ) ) {
```

---

# 48. Enqueue Scripts

JavaScript نباید به صورت مستقیم با:

```html
<script>
```

در Templateهای Plugin قرار گیرد.

از WordPress enqueue system استفاده شود.

---

# 49. Enqueue Styles

CSS نیز باید با:

```php
wp_enqueue_style()
```

ثبت شود.

---

# 50. Conditional Assets

Assetها فقط در Context لازم Load شوند.

مثلاً:

```text
Course Page
→ Course Assets

Lesson Player
→ Player Assets

Quiz
→ Quiz Assets
```

---

# 51. Asset Dependencies

Dependencyهای JS/CSS باید به WordPress معرفی شوند.

مثلاً:

```text
Iran LMS Player
   ↓
Requires Core Script
```

---

# 52. Script Data

برای انتقال Configuration محدود به JavaScript از APIهای WordPress مانند:

```text
wp_localize_script()
wp_add_inline_script()
```

در Context مناسب استفاده شود.

اطلاعات حساس نباید به Browser ارسال شوند.

---

# 53. AJAX

در صورت استفاده از WordPress AJAX:

```text
Request
 ↓
Nonce
 ↓
Capability
 ↓
Validation
 ↓
Service
 ↓
Response
```

AJAX Handler نباید Business Logic را در خود جای دهد.

---

# 54. REST vs AJAX

برای APIهای پایدار و قابل استفاده توسط Mobile App:

```text
REST API
```

اولویت دارد.

AJAX بیشتر برای تعاملات داخلی WordPress مناسب است.

---

# 55. Shortcodes

Shortcode در صورت نیاز باید:

```text
Small
Predictable
Escaped
Translation-ready
```

باشد.

Business Logic اصلی نباید داخل Shortcode Callback قرار گیرد.

---

# 56. Blocks

اگر Iran LMS در آینده Gutenberg Block داشته باشد، Block باید Presentation/Interaction را مدیریت کند و Business Logic در Service Layer باقی بماند.

---

# 57. Admin Menus

منوهای Admin باید با API رسمی WordPress ثبت شوند.

Capability مناسب باید در Registration لحاظ شود.

---

# 58. Admin Screens

Admin Screen باید:

```text
UI
 ↓
Controller
 ↓
Service
```

داشته باشد.

Database Query مستقیم در Template Admin ممنوع.

---

# 59. Admin Notices

برای پیام‌های Admin از مکانیزم استاندارد WordPress استفاده شود.

پیام‌ها باید:

```text
Translatable
Accessible
Contextual
```

باشند.

---

# 60. Cron

برای Jobهای زمان‌بندی‌شده از WordPress Cron یا Abstraction مناسب استفاده شود.

مثلاً:

```text
Certificate Processing
Reminder Notifications
Cleanup
Reports
Scheduled Tasks
```

---

# 61. HTTP API

برای ارتباط با سرویس‌های خارجی از WordPress HTTP API استفاده شود.

نه اینکه هر Integration یک HTTP Client مستقل وارد پروژه کند، مگر نیاز مشخصی وجود داشته باشد.

---

# 62. External Integrations

Integrationها باید Adapter داشته باشند.

مثلاً:

```text
PaymentInterface
     ↓
ZarinPalAdapter
IDPayAdapter
...
```

---

# 63. Filesystem

برای عملیات File System باید از API مناسب WordPress استفاده شود و مسیرهای File به صورت Hardcoded ساخته نشوند.

---

# 64. Uploads

برای Upload:

```text
Permission
Validation
File Type
Size
Storage
Error Handling
```

بررسی شود.

---

# 65. Media

Mediaهای LMS باید با WordPress Media Library تا حد امکان سازگار باشند.

در صورت استفاده از سیستم اختصاصی، Integration باید مشخص و مستند باشد.

---

# 66. Internationalization

متن User-Facing باید قابل ترجمه باشد.

همچنین:

```text
Dates
Numbers
Currency
Pluralization
```

نباید به شکل Hardcoded و غیرقابل Localization نوشته شوند.

---

# 67. RTL

RTL بخشی از UI پروژه است.

اما PHP/Business Logic نباید به RTL وابسته باشد.

```text
Business Logic
→ Language Independent

Presentation
→ RTL
```

---

# 68. Accessibility

WordPress برای Code جدید و به‌روزشده روی Accessibility و هدف WCAG Level AA تأکید دارد. ([WordPress Developer Resources][1])

بنابراین UI افزونه باید:

```text
Keyboard Accessible
Semantic
Screen Reader Friendly
Focus Safe
```

باشد.

---

# 69. HTML

HTML باید Semantic و معتبر باشد.

WordPress Coding Standards نیز روی Well-formed HTML و Validation تأکید دارد. ([WordPress Developer Resources][7])

---

# 70. JavaScript

JavaScript پروژه باید با WordPress JavaScript Coding Standards هماهنگ باشد.

WordPress برای JS مواردی مانند:

```text
Spacing
Indentation
Semicolons
Naming
Globals
Equality
Comments
```

را مشخص کرده است. ([WordPress Developer Resources][8])

---

# 71. JavaScript Indentation

در JS نیز از Tab مطابق WordPress Standards استفاده شود. ([WordPress Developer Resources][8])

---

# 72. JavaScript Strings

در استاندارد WordPress، برای Stringهای JavaScript استفاده از Single Quote ترجیح داده می‌شود. ([WordPress Developer Resources][8])

```javascript
const message = 'Course completed.';
```

---

# 73. JavaScript Globals

Global Scope نباید آلوده شود.

بد:

```javascript
window.course = {};
window.player = {};
```

به صورت پراکنده.

بهتر است Namespace پروژه مشخص باشد.

---

# 74. CSS

CSS افزونه باید با WordPress CSS Coding Standards هماهنگ باشد.

این استانداردها روی خوانایی، ساختار منظم، Selectorهای قابل فهم و Consistency تأکید دارند. ([WordPress Developer Resources][9])

---

# 75. CSS Indentation

برای CSS نیز WordPress Coding Standards استفاده از Tab را توصیه می‌کند. ([WordPress Developer Resources][9])

---

# 76. CSS Namespace

برای جلوگیری از Collision با Theme و سایر Pluginها:

```css
.iran-lms-course-card {}
.iran-lms-button {}
.iran-lms-modal {}
```

استفاده شود.

---

# 77. Avoid Generic Selectors

ممنوع:

```css
.button {}
.card {}
.title {}
.container {}
```

در Scope عمومی Plugin.

---

# 78. Inline CSS

استفاده گسترده از:

```html
style=""
```

ممنوع است.

Style باید در Assetهای مدیریت‌شده WordPress قرار گیرد.

---

# 79. Third-Party Libraries

Third-party Libraryها الزاماً مشمول WordPress Coding Standards نیستند.

اما:

```text
Vendor Code
```

نباید بدون نیاز Refactor شود.

WordPress نیز Third-party Libraries را از شمول مستقیم Coding Standards مستثنی می‌کند. ([WordPress Developer Resources][1])

---

# 80. Do Not Modify WordPress Core

Iran LMS نباید فایل‌های Core WordPress را تغییر دهد.

ممنوع:

```text
wp-admin/*
wp-includes/*
WordPress Core Files
```

---

# 81. Do Not Assume Theme Structure

Plugin نباید فرض کند Theme خاصی فعال است.

ممنوع:

```php
get_template_part( 'iran-lms/course' );
```

به عنوان تنها روش Rendering.

---

# 82. Theme Compatibility

Theme باید بتواند:

```text
Colors
Typography
Layout
Spacing
Templates
```

را کنترل کند، بدون اینکه Business Logic Plugin تغییر کند.

---

# 83. Plugin Deactivation Safety

اگر Theme یا Integration خاصی غیرفعال شد:

```text
Iran LMS Core
```

نباید Crash کند.

Feature وابسته باید Gracefully Disable شود.

---

# 84. Optional Module Safety

اگر Module مثل Certificate فعال نیست:

```text
Certificate UI
Certificate Hooks
Certificate Assets
Certificate Queries
```

نباید بی‌دلیل اجرا شوند.

---

# 85. Privacy

Iran LMS داده آموزشی و User Data تولید می‌کند.

بنابراین باید Privacy Architecture WordPress را در نظر بگیرد.

در صورت نگهداری Personal Data، امکانات مربوط به:

```text
Personal Data Exporter
Personal Data Eraser
Privacy Policy Integration
```

باید بررسی شوند. Plugin Handbook این قابلیت‌ها را برای Pluginها پوشش می‌دهد. ([WordPress Developer Resources][2])

---

# 86. Logging

Log نباید شامل موارد حساس باشد:

```text
Passwords
Tokens
API Keys
Payment Secrets
Private Data
```

---

# 87. Debug Mode

Debug Code نباید در Production باقی بماند.

ممنوع:

```php
var_dump();
print_r();
die();
exit();
```

به عنوان Debug دائمی.

---

# 88. Error Handling

Errorها باید با API مناسب WordPress و Contractهای پروژه مدیریت شوند.

در API و Service Layer می‌توان از:

```text
WP_Error
```

در موارد مناسب استفاده کرد.

---

# 89. No `eval()`

استفاده از:

```php
eval();
```

ممنوع است.

WordPress PHP Coding Standards نیز `eval()` را ناامن و غیرقابل استفاده می‌داند. ([WordPress Developer Resources][3])

---

# 90. No `extract()`

استفاده از:

```php
extract();
```

در پروژه ممنوع است.

WordPress نیز استفاده از `extract()` را به دلیل کاهش خوانایی و دشوار کردن Debugging توصیه نمی‌کند. ([WordPress Developer Resources][3])

---

# 91. No Error Suppression

استفاده بی‌دلیل از:

```php
@
```

ممنوع است.

---

# 92. No Shell Execution

استفاده مستقیم و غیرضروری از Shell Commandها ممنوع است.

---

# 93. Documentation

Classها، Methodهای مهم، Hookها و Contractهای Public باید Documentation داشته باشند.

WordPress برای PHP و JavaScript Documentation Standards جداگانه دارد. ([WordPress Developer Resources][6])

---

# 94. PHP Documentation

برای موارد Public:

```text
Description
Parameters
Return
Since
Deprecated
Hooks
```

در صورت نیاز مستند شوند.

---

# 95. JavaScript Documentation

Functionها، Classها، Eventها و Objectهای مهم باید Documentation مناسب داشته باشند.

WordPress از JSDoc 3 برای JavaScript Documentation استفاده می‌کند. ([WordPress Developer Resources][10])

---

# 96. WordPress Coding Tools

برای بررسی Coding Standards می‌توان از ابزار رسمی WordPress Coding Standards مبتنی بر PHP_CodeSniffer استفاده کرد. ([WordPress Developer Resources][3])

در پروژه:

```text
PHP_CodeSniffer
+
WordPress Coding Standards
```

باید بخشی از Quality Gate توسعه باشد.

---

# 97. Automated Checks

قبل از Merge:

```text
PHP Coding Standards
JavaScript Lint
CSS Validation
PHP Syntax
Tests
Security Checks
```

بررسی شوند.

---

# 98. Development Rule

هر Code جدید باید:

```text
WordPress Compatible
+
Security Safe
+
Translation Ready
+
Accessible
+
Testable
```

باشد.

---

# 99. Architecture Boundary

استاندارد WordPress نباید باعث شود Business Logic پروژه به WordPress APIهای سطح پایین وابسته شود.

ساختار مطلوب:

```text
WordPress
   ↓
Adapter / Integration
   ↓
Application
   ↓
Domain / Services
   ↓
Repository
```

---

# 100. What WordPress Owns

WordPress باید مالک این موارد باقی بماند:

```text
Users
Authentication
Roles
Capabilities
Plugin Lifecycle
Hooks
REST Infrastructure
Media Infrastructure
Options
Cron
HTTP
Filesystem
```

مگر اینکه Architecture پروژه دلیل مشخصی برای Abstraction داشته باشد.

---

# 101. What Iran LMS Owns

Iran LMS مالک Business Domain خودش است:

```text
Courses
Lessons
Curriculum
Enrollments
Learning Progress
Assessments
Assignments
Certificates
Commerce Logic
Learning Notifications
Gamification
```

---

# 102. Separation

قاعده:

```text
WordPress
→ Platform

Iran LMS
→ LMS Domain
```

Theme:

```text
Presentation
```

---

# 103. Final Architecture

```text
                    WordPress
                        │
              ┌─────────┴─────────┐
              │                   │
           Platform            Theme
              │                   │
              │              Presentation
              │
         Iran LMS Plugin
              │
       ┌──────┴──────┐
       │             │
      Core         Modules
       │             │
       └──────┬──────┘
              │
           Services
              │
          Repositories
              │
           Database
              │
        ┌─────┴─────┐
        │           │
       REST        UI
        │           │
     Mobile     Frontend/Admin
```

---

# 104. Developer Checklist

قبل از Merge هر Feature:

```text
☐ WordPress Coding Standards
☐ WordPress API used where appropriate
☐ No Core modification
☐ Plugin independent from Theme
☐ Capability checked
☐ Nonce checked where applicable
☐ Input validated
☐ Input sanitized where appropriate
☐ Output escaped
☐ Translation-ready
☐ REST permissions checked
☐ SQL prepared
☐ $wpdb prefix respected
☐ Assets enqueued correctly
☐ No unnecessary global variables
☐ No debug code
☐ No sensitive data in logs
☐ Accessibility considered
☐ RTL compatible
☐ Documentation updated
☐ Tests pass
```

---

# 105. Final Rule

> **Iran LMS باید مثل یک شهروند استاندارد WordPress رفتار کند، نه اینکه WordPress را دور بزند.**

یعنی:

```text
Use WordPress APIs
        +
Respect WordPress Lifecycle
        +
Respect WordPress Security
        +
Respect WordPress Coding Standards
        +
Keep LMS Domain Independent
        +
Keep Theme Independent
        +
Keep Modules Extensible
```

این اصل باید مبنای تمام فایل‌های Developer بعدی قرار بگیرد.

**منبع اصلی استانداردهای WordPress:** [WordPress Developer – Coding Standards](https://developer.wordpress.org/coding-standards/?utm_source=chatgpt.com)
**Plugin Handbook:** [WordPress Plugin Developer Handbook](https://developer.wordpress.org/plugins/?utm_source=chatgpt.com) ([WordPress Developer Resources][1])

[1]: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/?utm_source=chatgpt.com "WordPress Coding Standards – Coding Standards Handbook | Developer.WordPress.org"
[2]: https://developer.wordpress.org/plugins/?utm_source=chatgpt.com "Plugin Handbook | Developer.WordPress.org"
[3]: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/?utm_source=chatgpt.com "PHP Coding Standards – Coding Standards Handbook | Developer.WordPress.org"
[4]: https://developer.wordpress.org/apis/security/?utm_source=chatgpt.com "Security – Common APIs Handbook | Developer.WordPress.org"
[5]: https://developer.wordpress.org/plugins/rest-api/?utm_source=chatgpt.com "REST API – Plugin Handbook | Developer.WordPress.org"
[6]: https://developer.wordpress.org/coding-standards/inline-documentation-standards/php/?utm_source=chatgpt.com "PHP Documentation Standards – Coding Standards Handbook | Developer.WordPress.org"
[7]: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/html/?utm_source=chatgpt.com "HTML Coding Standards – Coding Standards Handbook | Developer.WordPress.org"
[8]: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/?utm_source=chatgpt.com "JavaScript Coding Standards – Coding Standards Handbook | Developer.WordPress.org"
[9]: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/?utm_source=chatgpt.com "CSS Coding Standards – Coding Standards Handbook | Developer.WordPress.org"
[10]: https://developer.wordpress.org/coding-standards/inline-documentation-standards/javascript/?utm_source=chatgpt.com "JavaScript Documentation Standards – Coding Standards Handbook | Developer.WordPress.org"
