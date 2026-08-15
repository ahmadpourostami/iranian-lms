# `08-Developer/PHP-Standards.md`

**Project:** Iran LMS
**Type:** WordPress LMS Plugin
**Section:** Developer
**Version:** 1.0
**Status:** Development Standard

> این فایل استانداردهای اختصاصی **PHP** برای توسعه Iran LMS است.
> `WordPress-Standards.md` مشخص می‌کند کد چگونه با WordPress تعامل کند؛ این فایل مشخص می‌کند **خود PHP پروژه چگونه نوشته شود**.

---

# 1. هدف

هدف این سند ایجاد یک استاندارد واحد برای:

* خوانایی PHP
* امنیت
* Maintainability
* تست‌پذیری
* سازگاری با WordPress
* جلوگیری از Technical Debt
* توسعه Moduleها و Serviceها
* جلوگیری از وابستگی‌های نامناسب

است.

---

# 2. اصل پایه

Iran LMS یک WordPress Plugin است.

بنابراین PHP پروژه باید همزمان دو استاندارد را رعایت کند:

```text
PHP Best Practices
        +
WordPress Coding Standards
```

در مواردی که استاندارد عمومی PHP با Convention رسمی WordPress متفاوت باشد، برای بخش WordPress-facing پروژه، **WordPress Coding Standards اولویت دارد**.

---

# 3. PHP Version

نسخه PHP مورد پشتیبانی Plugin باید در یک Release Policy مشخص شود.

نسخه PHP نباید بدون دلیل داخل Code فرض شود.

مثلاً:

```php
if ( PHP_VERSION_ID < $minimum_version ) {
	// Handle unsupported environment.
}
```

نسخه دقیق Minimum PHP باید در Release Documentation پروژه نهایی شود.

---

# 4. Modern PHP

در بخش‌هایی که با Minimum PHP پروژه سازگار هستند، استفاده از قابلیت‌های Modern PHP مجاز است.

مانند:

```text
Typed Properties
Type Declarations
Return Types
Anonymous Classes
Generators
Exceptions
Namespaces
Interfaces
Traits
Enums
```

اما Compatibility با WordPress و نسخه PHP هدف همیشه اولویت دارد.

---

# 5. Strict Types

در صورت تصمیم معماری پروژه برای استفاده از Strict Types، این موضوع باید به‌صورت Consistent در کل Codebase اعمال شود.

مثال:

```php
<?php

declare( strict_types=1 );
```

نباید بخشی از پروژه Strict Types داشته باشد و بخش دیگر بدون تصمیم مشخص.

---

# 6. Indentation

مطابق WordPress Coding Standards از **Tab** برای Indentation استفاده شود.

صحیح:

```php
if ( $course ) {
	$title = $course->get_title();
}
```

نه:

```php
if ( $course ) {
    $title = $course->get_title();
}
```

---

# 7. Line Length

خطوط باید تا حد امکان خوانا و قابل بررسی باشند.

اگر یک Expression طولانی شد، آن را به چند خط منطقی تقسیم کنید.

بد:

```php
$result = $this->enrollment_service->create_enrollment( $user_id, $course_id, $source, $metadata, $options );
```

بهتر:

```php
$result = $this->enrollment_service->create_enrollment(
	$user_id,
	$course_id,
	$source,
	$metadata,
	$options
);
```

---

# 8. Braces

برای:

```text
if
else
foreach
while
for
function
class
method
```

از Braces استفاده شود.

بد:

```php
if ( $course )
	$course->publish();
```

صحیح:

```php
if ( $course ) {
	$course->publish();
}
```

---

# 9. Conditions

شرط‌ها باید خوانا باشند.

بد:

```php
if($course&&$course->is_active()){...}
```

صحیح:

```php
if ( $course && $course->is_active() ) {
	// ...
}
```

---

# 10. Yoda Conditions

در مقایسه‌های PHP-facing مطابق WordPress Coding Standards از Conventionهای WordPress استفاده شود.

مثلاً:

```php
if ( 'completed' === $status ) {
	// ...
}
```

به جای:

```php
if ( $status === 'completed' ) {
	// ...
}
```

هدف اصلی جلوگیری از Assignment اشتباهی در شرط‌ها و هماهنگی با WordPress Standards است.

---

# 11. Naming Variables

Variableها:

```php
$course_id;
$lesson_id;
$user_progress;
$completion_status;
```

و نه:

```php
$courseId;
$lessonId;
$userProgress;
```

---

# 12. Naming Functions

Functionهای WordPress-facing:

```php
get_course();
get_course_progress();
calculate_course_progress();
```

از:

```text
lowercase
+
underscore
```

استفاده کنند.

---

# 13. Naming Classes

Classهای پروژه باید نام واضح و Domain-oriented داشته باشند.

مثلاً:

```text
Course_Service
Enrollment_Service
Progress_Service
Certificate_Service
Course_Repository
```

اگر Namespace نهایی پروژه استفاده شود، Naming باید با Convention انتخاب‌شده برای Namespace هماهنگ شود.

---

# 14. Constants

Constantها باید برای مقادیر واقعاً ثابت استفاده شوند.

مثلاً:

```php
const VERSION = '1.0.0';
```

یا Constantهای Plugin-level مطابق Convention پروژه.

برای Configurationهای قابل تغییر، Constant مناسب نیست.

---

# 15. Avoid Magic Numbers

بد:

```php
if ( $progress >= 80 ) {
	// ...
}
```

بهتر:

```php
if ( $progress >= self::COMPLETION_THRESHOLD ) {
	// ...
}
```

اگر `80` واقعاً یک Business Rule ثابت باشد.

---

# 16. Avoid Magic Strings

بد:

```php
if ( 'completed' === $status ) {
	// ...
}
```

در صورتی که `completed` یک Domain State رسمی و تکرارشونده باشد، بهتر است یک Contract/Constant/Enum مناسب داشته باشیم.

---

# 17. Type Declarations

در صورت سازگاری با Minimum PHP پروژه، Type Declaration ترجیح داده می‌شود.

مثلاً:

```php
public function get_course( int $course_id ): ?Course {
	// ...
}
```

این کار باید با Compatibility هدف پروژه هماهنگ باشد.

---

# 18. Parameter Types

پارامترها در Serviceهای Domain تا حد امکان Type مشخص داشته باشند.

مثلاً:

```php
public function enroll(
	int $user_id,
	int $course_id
): Enrollment {
	// ...
}
```

---

# 19. Return Types

Methodهای جدید باید در صورت امکان Return Type مشخص داشته باشند.

```php
public function is_completed(): bool {
	return $this->completed;
}
```

---

# 20. Nullable Types

وقتی یک Method واقعاً ممکن است چیزی برنگرداند، این موضوع باید در Contract مشخص باشد.

```php
public function find( int $id ): ?Course {
	// ...
}
```

بهتر از Return مبهم است.

---

# 21. Boolean Naming

Boolean Methodها بهتر است با نام قابل فهم شروع شوند:

```text
is_
has_
can_
should_
```

مثلاً:

```php
$is_completed = $course->is_completed();

if ( $course->has_certificate() ) {
	// ...
}
```

---

# 22. Single Responsibility

هر Class باید مسئولیت مشخصی داشته باشد.

بد:

```text
CourseManager
├── Database
├── Payment
├── Email
├── Certificate
├── Rendering
└── Validation
```

بهتر:

```text
CourseService
CourseRepository
PaymentService
NotificationService
CertificateService
CourseRenderer
```

---

# 23. Service Classes

Service برای Use Case و Business Operation استفاده می‌شود.

مثلاً:

```php
final class Enrollment_Service {

	public function enroll(
		int $user_id,
		int $course_id
	) {
		// Business operation.
	}
}
```

---

# 24. Repository Classes

Repository مسئول Data Access است.

```php
final class Course_Repository {

	public function find( int $course_id ) {
		// Database access.
	}
}
```

Repository نباید UI را Render کند.

---

# 25. Controllers

Controller فقط باید Request را مدیریت و به Service منتقل کند.

```text
Request
 ↓
Controller
 ↓
Service
 ↓
Repository
```

Business Logic پیچیده داخل Controller ممنوع.

---

# 26. Models / Entities

Entity باید وضعیت و رفتار Domain خودش را نگهداری کند.

مثلاً:

```php
$course->is_published();
$course->is_free();
$course->get_title();
```

به جای پخش کردن همه Business Rules در Templateها.

---

# 27. DTO

برای انتقال داده بین Layerها در موارد مناسب می‌توان از DTO استفاده کرد.

مثلاً:

```text
Course_Data
Enrollment_Data
Quiz_Result
Certificate_Data
```

DTO نباید Business Logic سنگین داشته باشد.

---

# 28. Interfaces

وقتی چند Implementation ممکن است وجود داشته باشد، Interface استفاده شود.

مثلاً:

```php
interface Payment_Gateway_Interface {

	public function charge(
		int $amount,
		array $data
	);
}
```

سپس:

```text
Payment Gateway Interface
       │
       ├── ZarinPal
       ├── IDPay
       └── Future Gateway
```

---

# 29. Dependency Injection

Class نباید Dependencyهای مهم خود را داخل خودش بسازد.

بد:

```php
class Course_Service {

	public function __construct() {
		$this->repository = new Course_Repository();
	}
}
```

بهتر:

```php
class Course_Service {

	public function __construct(
		Course_Repository $repository
	) {
		$this->repository = $repository;
	}
}
```

این کار Testability را افزایش می‌دهد.

---

# 30. Dependency Direction

Dependency باید در جهت مشخص حرکت کند:

```text
Controller
    ↓
Service
    ↓
Repository
    ↓
Infrastructure
```

نه برعکس.

---

# 31. Avoid Global State

استفاده بی‌دلیل از Global Variable ممنوع.

تنها در جایی که WordPress API الزام می‌کند، مانند `$wpdb`، استفاده کنترل‌شده مجاز است.

---

# 32. `$wpdb`

در Repositoryهای WordPress Database:

```php
global $wpdb;
```

فقط در همان Scope مورد نیاز استفاده شود.

Business Logic نباید به `$wpdb` وابسته شود.

---

# 33. SQL

SQL باید در Repository/Data Layer باشد.

ممنوع:

```text
Template
 ↓
SQL
```

صحیح:

```text
Template
 ↓
Service
 ↓
Repository
 ↓
SQL
```

---

# 34. Prepared Queries

هیچ User Input نباید مستقیماً داخل SQL قرار گیرد.

صحیح:

```php
$query = $wpdb->prepare(
	"SELECT * FROM {$table} WHERE id = %d",
	$course_id
);
```

---

# 35. Database Table Names

نام Tableها باید از Prefix واقعی WordPress استفاده کند.

```php
$table = $wpdb->prefix . 'iran_lms_courses';
```

نباید فرض شود Prefix همیشه:

```text
wp_
```

است.

---

# 36. Input Validation

هر Input باید بر اساس Domain خودش Validate شود.

مثلاً:

```text
Course ID → Integer
Email → Email validation
Status → Allowed values
Price → Numeric constraints
Date → Date validation
```

---

# 37. Sanitization

Sanitize متناسب با نوع داده.

مثلاً:

```php
$title = sanitize_text_field( $title );
```

اما Sanitization نباید جای Validation را بگیرد.

---

# 38. Output Escaping

Output باید در Context مناسب Escape شود.

مثلاً:

```php
echo esc_html( $course_title );
```

برای Attribute:

```php
echo esc_attr( $course_id );
```

برای URL:

```php
echo esc_url( $course_url );
```

---

# 39. Escape Late

داده را در زمان Output Escape کنید، نه خیلی زود.

این کار باعث می‌شود Data برای استفاده در Contextهای مختلف قابل مدیریت باقی بماند.

---

# 40. User Input Flow

الگوی استاندارد:

```text
Input
 ↓
Validation
 ↓
Sanitization
 ↓
Authorization
 ↓
Business Logic
 ↓
Storage
 ↓
Escape on Output
```

ترتیب دقیق ممکن است بر اساس Context تغییر کند، اما هیچ مرحله‌ای نباید بدون دلیل حذف شود.

---

# 41. Exceptions

Exception باید برای شرایط واقعاً Exceptional استفاده شود.

مثلاً:

```text
Unexpected Infrastructure Failure
Invalid State
External Service Failure
```

نباید Exception را برای هر Branch عادی Business Logic استفاده کنیم.

---

# 42. `WP_Error`

در WordPress-facing APIها و Contractهایی که با Conventionهای WordPress کار می‌کنند، `WP_Error` می‌تواند ابزار مناسب Error Handling باشد.

مثلاً:

```php
if ( ! $course ) {
	return new WP_Error(
		'course_not_found',
		__( 'Course not found.', 'iran-lms' )
	);
}
```

---

# 43. Error Codes

Error Codeها باید ثابت و قابل تشخیص باشند.

مثلاً:

```text
course_not_found
course_not_published
enrollment_exists
payment_failed
invalid_quiz_attempt
```

---

# 44. Error Messages

Error Messageهای User-Facing باید Translation-ready باشند.

بد:

```php
return new WP_Error(
	'course_not_found',
	'Course does not exist.'
);
```

بهتر:

```php
return new WP_Error(
	'course_not_found',
	__( 'Course does not exist.', 'iran-lms' )
);
```

---

# 45. Avoid Silent Failures

این الگو ممنوع:

```php
try {
	// ...
} catch ( Exception $e ) {
	// Nothing.
}
```

اگر Error قابل Recovery نیست، باید Log یا Propagate مناسب داشته باشد.

---

# 46. Logging

Logging باید از یک Logger مرکزی پروژه استفاده کند.

```text
Service
 ↓
Logger
 ↓
Log Handler
```

نه `error_log()` پراکنده در کل Plugin.

---

# 47. Sensitive Data

هیچ‌وقت موارد زیر را Log نکنید:

```text
Passwords
API Keys
Tokens
Payment Secrets
Authentication Cookies
Sensitive Personal Data
```

---

# 48. Translation

تمام متن‌های User-Facing باید از Translation Functions استفاده کنند.

```php
__( 'Course', 'iran-lms' );
_e( 'Course', 'iran-lms' );
esc_html__( 'Course', 'iran-lms' );
```

---

# 49. Text Domain

Text Domain ثابت:

```text
iran-lms
```

است.

نباید در بخش‌های مختلف Plugin Text Domainهای متفاوت ایجاد شود.

---

# 50. Comments

Comment باید دلیل و Intent را توضیح دهد، نه چیزی که Code واضحاً نشان می‌دهد.

بد:

```php
// Increment count.
$count++;
```

بهتر:

```php
// Increment the attempt count before calculating the final score.
$count++;
```

---

# 51. PHPDoc

Classها و Methodهای Public باید Documentation مناسب داشته باشند.

مثلاً:

```php
/**
 * Finds a course by ID.
 *
 * @param int $course_id Course ID.
 * @return Course|null Course entity or null when not found.
 */
public function find( int $course_id ): ?Course {
	// ...
}
```

---

# 52. `@since`

برای APIهای Public پروژه:

```php
/**
 * @since 1.0.0
 */
```

در صورت نیاز ثبت شود.

---

# 53. `@deprecated`

APIهای قدیمی نباید ناگهانی حذف شوند.

```php
/**
 * @deprecated 1.2.0 Use get_course_progress() instead.
 */
```

سپس طبق Deprecation Policy پروژه مدیریت شوند.

---

# 54. Backward Compatibility

تغییرات Public API باید با دقت انجام شوند.

موارد حساس:

```text
Public Classes
Public Methods
Hooks
Filters
REST Endpoints
Database Schema
Stored Data
```

---

# 55. Hooks as Public API

Hookهای عمومی باید مستند و Stable باشند.

مثلاً:

```text
iran_lms_course_completed
```

نباید بدون دلیل Rename شود.

---

# 56. Hook Documentation

برای Hook:

```php
/**
 * Fires after a course is completed.
 *
 * @since 1.0.0
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

---

# 57. Closures

Closureها در موارد مناسب قابل استفاده‌اند.

اما برای Hookهایی که نیاز به Remove شدن دارند، Callback قابل Reference ترجیح داده شود.

---

# 58. Anonymous Functions

Anonymous Function نباید صرفاً برای کوتاه‌تر کردن Code استفاده شود.

اگر Logic پیچیده شد، آن را به Method/Class منتقل کنید.

---

# 59. Static Methods

Static Method فقط زمانی استفاده شود که واقعاً Stateless و مستقل باشد.

از تبدیل تمام Serviceها به Static Class خودداری شود.

بد:

```php
Course_Service::create();
Course_Service::update();
Course_Service::delete();
```

به عنوان الگوی عمومی.

---

# 60. Singleton

Singleton نباید الگوی پیش‌فرض Plugin باشد.

مخصوصاً:

```text
Singleton Everywhere
Global Service Locator
Static Global State
```

از این الگوها پرهیز شود.

---

# 61. Dependency Container

اگر پروژه از Container استفاده کند:

```text
Container
 ↓
Service Resolution
 ↓
Dependency Injection
```

Container نباید تبدیل به Global Service Locator شود.

---

# 62. Final Classes

`final` در جاهایی که Class نباید Extend شود قابل استفاده است.

مثلاً:

```php
final class Course_Repository {
	// ...
}
```

اما استفاده از `final` نباید مانع Extensibility مورد نیاز Plugin شود.

---

# 63. Traits

Trait فقط برای رفتار مشترک واقعی استفاده شود.

ممنوع:

```text
God Trait
Utility Trait
Everything Trait
```

---

# 64. Interfaces vs Traits

Interface:

```text
Contract
```

Trait:

```text
Reusable Implementation
```

این دو نباید با هم اشتباه شوند.

---

# 65. Enums

اگر Minimum PHP پروژه اجازه دهد و Domain به Stateهای محدود نیاز داشته باشد، Enum می‌تواند مناسب باشد.

مثلاً:

```text
draft
published
archived
```

اما در بخش‌هایی که باید با WordPress Data و Backward Compatibility هماهنگ باشند، باید با دقت استفاده شود.

---

# 66. Arrays

Array باید ساختار مشخص داشته باشد.

بد:

```php
$data = array(
	1,
	'course',
	true,
	'anything',
);
```

بهتر:

```php
$course_data = array(
	'id'     => $course_id,
	'title'  => $title,
	'status' => $status,
);
```

---

# 67. Associative Arrays

Keyها باید واضح و Stable باشند.

```php
$course = array(
	'id'          => 10,
	'title'       => 'PHP',
	'is_published' => true,
);
```

---

# 68. Null Handling

`null` باید معنی مشخص داشته باشد.

مثلاً:

```text
null
→ Course not found
```

نباید یک جا به معنی Not Found و جای دیگر به معنی Error باشد.

---

# 69. Boolean Handling

از Booleanهای مبهم پرهیز شود.

بد:

```php
$course->set_status( true );
```

بهتر:

```php
$course->set_published( true );
```

---

# 70. Avoid Deep Nesting

بد:

```php
if ( $user ) {
	if ( $course ) {
		if ( $course->is_active() ) {
			if ( $user->can_access( $course ) ) {
				// ...
			}
		}
	}
}
```

بهتر:

```php
if ( ! $user ) {
	return;
}

if ( ! $course ) {
	return;
}

if ( ! $course->is_active() ) {
	return;
}

if ( ! $user->can_access( $course ) ) {
	return;
}
```

---

# 71. Early Returns

Early Return برای ساده‌تر شدن Logic توصیه می‌شود.

اما نباید Code را به مجموعه‌ای از Returnهای نامفهوم تبدیل کند.

---

# 72. Avoid God Classes

Classهایی مثل:

```text
LMS_Manager
Iran_LMS
Everything_Manager
```

نباید مالک تمام Business Logic شوند.

---

# 73. Domain Naming

Class و Method باید از اصطلاحات Domain پروژه استفاده کنند.

مثلاً:

```text
Enrollment
Lesson
Attempt
Certificate
Progress
Curriculum
```

نه نام‌های مبهم مثل:

```text
DataManager
ItemProcessor
Handler
Helper
```

مگر اینکه Scope آنها واقعاً عمومی باشد.

---

# 74. Avoid Generic Helpers

ساخت فایل‌هایی مثل:

```text
helpers.php
functions.php
utils.php
```

برای قرار دادن هر نوع Logic ممنوع است.

اگر Helper واقعاً لازم است، مسئولیت آن مشخص باشد.

---

# 75. File Organization

هر فایل باید مسئولیت واضح داشته باشد.

مثلاً:

```text
Course_Service.php
Course_Repository.php
Course_Controller.php
Course_Entity.php
```

نه:

```text
course.php
```

که همه چیز را شامل شود.

---

# 76. Autoloading

برای Classهای پروژه از Autoloading استاندارد استفاده شود.

ترجیح:

```text
Composer Autoloading
```

در صورتی که Architecture نهایی پروژه Composer را تأیید کند.

اگر Composer در نسخه نهایی Plugin استفاده نشود، Autoloader داخلی استاندارد باید مستند شود.

---

# 77. Composer

Dependencyهای PHP خارجی باید مدیریت‌شده باشند.

نباید Packageهای خارجی به صورت دستی و بدون Version Control وارد Plugin شوند.

---

# 78. Third-Party Dependencies

هر Dependency باید:

```text
Licensed
Versioned
Documented
Maintained
```

باشد.

---

# 79. WordPress Dependencies

اگر قابلیت مشابهی در WordPress وجود دارد، اول بررسی شود که آیا می‌توان از API رسمی WordPress استفاده کرد.

مثلاً:

```text
HTTP
Filesystem
Cron
Users
Options
Metadata
REST
```

---

# 80. PHP and WordPress Boundary

Business Logic:

```text
WordPress-independent as much as practical
```

اما Integration Layer:

```text
WordPress-aware
```

باشد.

---

# 81. Example Architecture

```text
REST Controller
      ↓
Enrollment Service
      ↓
Enrollment Repository
      ↓
WordPress Database Adapter
      ↓
$wpdb
```

این ساختار اجازه می‌دهد Business Logic از Database Implementation جدا بماند.

---

# 82. Example: Course Creation

```text
Admin Form
    ↓
Controller
    ↓
Validate
    ↓
Course Service
    ↓
Course Repository
    ↓
Database
```

---

# 83. Example: Enrollment

```text
User Request
    ↓
Authorization
    ↓
Enrollment Service
    ↓
Course Access Check
    ↓
Enrollment Repository
    ↓
Database
    ↓
Enrollment Created Event
```

---

# 84. Example: Course Completion

```text
Lesson Completion
      ↓
Progress Service
      ↓
Course Completion Check
      ↓
CourseCompleted Event
      ├── Certificate
      ├── Notification
      └── Gamification
```

---

# 85. Testing

PHP Code باید Testable باشد.

حداقل:

```text
Unit Tests
Integration Tests
API Tests
```

و در صورت نیاز:

```text
End-to-End Tests
```

---

# 86. Unit Test Boundary

Business Logic باید تا حد امکان بدون WordPress UI قابل Test باشد.

مثلاً:

```text
EnrollmentService
ProgressService
CertificateService
```

---

# 87. Mocking

Dependencyها باید قابل Mock شدن باشند.

این یکی از دلایل استفاده از:

```text
Interfaces
Dependency Injection
Small Services
```

است.

---

# 88. Static Analysis

در صورت تثبیت Toolchain پروژه، Static Analysis برای PHP اضافه شود.

مثلاً:

```text
PHPStan
Psalm
```

انتخاب نهایی باید در Developer Tooling مشخص شود.

---

# 89. PHP_CodeSniffer

Quality Gate پروژه باید شامل WordPress Coding Standards باشد.

مثلاً:

```text
phpcs
+
WordPress Coding Standards
```

---

# 90. Formatting vs Architecture

PHP Formatter نمی‌تواند Architecture بد را اصلاح کند.

مثلاً:

```text
Correct indentation
≠
Correct architecture
```

بنابراین هر دو باید جداگانه بررسی شوند.

---

# 91. Security Checklist

قبل از Merge:

```text
☐ Input validated
☐ Input sanitized where appropriate
☐ Output escaped
☐ Capability checked
☐ Nonce checked
☐ SQL prepared
☐ No secrets committed
☐ No unsafe deserialization
☐ No eval()
☐ No arbitrary file execution
☐ External requests validated
```

---

# 92. Performance Checklist

```text
☐ No unnecessary queries
☐ No N+1 queries
☐ Heavy work not done unnecessarily
☐ Pagination used where required
☐ Cache considered
☐ Assets loaded conditionally
```

---

# 93. Code Review Checklist

هر PHP Pull Request:

```text
☐ Naming واضح
☐ Responsibility مشخص
☐ Dependencies کنترل‌شده
☐ WordPress Standards رعایت شده
☐ Security بررسی شده
☐ Translation بررسی شده
☐ Error Handling مشخص
☐ Tests اضافه/اصلاح شده
☐ Documentation به‌روز شده
```

---

# 94. ممنوعیت‌های اصلی

در Iran LMS این موارد ممنوع هستند:

```text
❌ eval()
❌ extract()
❌ Raw SQL در UI
❌ SQL بدون prepare
❌ Business Logic در Template
❌ Direct DB access از Component
❌ Hardcoded credentials
❌ Global State غیرضروری
❌ God Classes
❌ Generic Helper Dump
❌ Silent Exception
❌ Debug Code در Production
❌ تغییر WordPress Core
```

---

# 95. Definition of Done

یک فایل PHP زمانی Complete است که:

```text
☐ با PHP Version هدف سازگار است
☐ WordPress Coding Standards را رعایت می‌کند
☐ Naming استاندارد دارد
☐ مسئولیت مشخص دارد
☐ Dependencyهای آن کنترل شده‌اند
☐ Input امن است
☐ Output Escape شده
☐ Translation-ready است
☐ Error Handling مشخص دارد
☐ تست‌پذیر است
☐ Documentation مناسب دارد
☐ وابستگی غیرضروری به Theme ندارد
☐ Business Logic در Layer مناسب قرار دارد
```

---

# 96. Final Rule

> **PHP در Iran LMS باید WordPress-native باشد، اما Business Logic آن نباید به‌هم‌ریخته و وابسته به WordPress UI شود.**

مدل نهایی:

```text
              WordPress
                  │
          Integration Layer
                  │
             Controllers
                  │
              Services
                  │
               Domain
                  │
             Repositories
                  │
            Infrastructure
                  │
              Database
```

و برای هر Feature:

```text
Input
 ↓
Validate
 ↓
Authorize
 ↓
Service
 ↓
Repository
 ↓
Persist
 ↓
Event
 ↓
Output
 ↓
Escape
```

این فایل باید مرجع PHP تمام Moduleهای بعدی Iran LMS باشد؛ و همان‌طور که در `WordPress-Standards.md` مشخص کردیم، **WordPress Coding Standards بر Styleهای عمومی PHP اولویت دارد** تا افزونه واقعاً یک Plugin استاندارد WordPress باقی بماند.
