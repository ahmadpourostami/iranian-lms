# `08-Developer/Architecture.md`

**Project:** Iran LMS
**Type:** WordPress LMS Plugin
**Section:** Developer
**Version:** 1.0
**Status:** Foundation Architecture

> **مرجع این فایل:** این سند باید در امتداد Architecture، Database، API، Modules، UI، Components و Mobile پروژه خوانده شود. فایل UI پروژه صراحتاً روی **WordPress Friendly، Component Based و Modular Architecture** تأکید دارد. 
> جزئیات لایه‌های PHP و ساختار دقیق Runtime در فایل مرجع فعلی مشخص نشده‌اند؛ بنابراین بخش‌های اجرایی این سند به‌عنوان **Architecture پیشنهادی برای پیاده‌سازی افزونه** تعریف می‌شوند، نه ادعا درباره تصمیم‌های قبلی پروژه.

---

# 1. هدف

هدف این فایل تعریف معماری فنی Iran LMS است؛ به شکلی که افزونه:

```text
WordPress-Compatible
Modular
Maintainable
Extensible
Secure
Testable
Theme-Independent
```

باشد.

معماری باید اجازه دهد قابلیت‌های جدید بدون بازنویسی Core به سیستم اضافه شوند.

---

# 2. اصل بنیادین

Iran LMS یک **Plugin برای WordPress** است.

بنابراین:

```text
Iran LMS
    ↓
WordPress Plugin
    ↓
WordPress Runtime
```

و نه:

```text
Iran LMS
    ↓
Standalone Application
```

Theme فقط مسئول Presentation سایت است و نباید مالک Business Logic مربوط به LMS باشد.

---

# 3. Architecture Overview

معماری پیشنهادی:

```text
                           WordPress
                               │
                ┌──────────────┴──────────────┐
                │                             │
              Theme                         Plugins
                │                             │
                │                       ┌─────┴─────┐
                │                       │ Iran LMS  │
                │                       └─────┬─────┘
                │                             │
                │                    ┌────────┼────────┐
                │                    │        │        │
                │                   Core    Modules   API
                │                    │        │        │
                │                    └────────┼────────┘
                │                             │
                │                           Services
                │                             │
                │                         Repositories
                │                             │
                │                          Database
                │
                └──────────── UI / Rendering ────────────
```

---

# 4. Architectural Layers

لایه‌های اصلی پیشنهادی:

```text
01. WordPress Integration
02. Core
03. Domain / Business Logic
04. Modules
05. Application Services
06. API
07. Data / Repository
08. UI / Components
09. Admin
10. Frontend
```

همه این لایه‌ها الزاماً به صورت پوشه مستقل پیاده‌سازی نمی‌شوند؛ **Layer مفهومی است** و ساختار نهایی Code باید بر اساس آن طراحی شود.

---

# 5. WordPress Integration Layer

این Layer مرز بین Iran LMS و WordPress است.

وظایف:

```text
Hooks
Filters
REST Registration
Admin Registration
Scripts
Styles
Capabilities
Cron
WordPress APIs
```

Business Logic نباید در این Layer قرار بگیرد.

---

# 6. Core

Core شامل قابلیت‌هایی است که سیستم LMS برای اجرای پایه خود به آن‌ها نیاز دارد.

نمونه:

```text
Core
├── Bootstrap
├── Configuration
├── Container
├── Events
├── Hooks
├── Permissions
├── Logging
└── Utilities
```

Core نباید به Moduleهای اختیاری وابسته باشد.

---

# 7. Bootstrap

Bootstrap نقطه شروع Plugin است.

مسیر مفهومی:

```text
WordPress loads Plugin
        ↓
Plugin Bootstrap
        ↓
Environment Check
        ↓
Core Initialization
        ↓
Module Registration
        ↓
API / Admin / Frontend Registration
```

---

# 8. Plugin Bootstrap

Bootstrap باید سبک باقی بماند.

نباید تمام منطق سیستم در فایل اصلی Plugin نوشته شود.

بد:

```text
iran-lms.php
├── Database
├── Course Logic
├── User Logic
├── API
├── Rendering
└── Payments
```

بهتر:

```text
iran-lms.php
      ↓
Bootstrap
      ↓
Application / Core
```

---

# 9. Domain / Business Logic

Business Logic باید از WordPress UI و Template جدا باشد.

مثلاً:

```text
Course
Lesson
Enrollment
Progress
Quiz
Assignment
Certificate
```

قوانین این بخش نباید داخل HTML یا View قرار بگیرند.

---

# 10. Service Layer

Service محل اجرای Use Caseها و Business Operationها است.

مثلاً:

```text
CourseService
EnrollmentService
ProgressService
QuizService
AssignmentService
CertificateService
```

---

# 11. Service Example

برای ثبت‌نام:

```text
Student
   ↓
Enrollment Controller
   ↓
Enrollment Service
   ↓
Enrollment Repository
   ↓
Database
```

Service تصمیم می‌گیرد:

```text
آیا ثبت‌نام مجاز است؟
آیا Course قابل ثبت‌نام است؟
آیا قبلاً ثبت‌نام شده؟
وضعیت Enrollment چیست؟
```

---

# 12. Repository Layer

Repository مسئول دسترسی به داده است.

مثلاً:

```text
CourseRepository
LessonRepository
EnrollmentRepository
QuizRepository
AssignmentRepository
```

Repository نباید Business Rule پیچیده داشته باشد.

---

# 13. Database Boundary

هیچ UI Component نباید مستقیماً Database را Query کند.

صحیح:

```text
Component
   ↓
Controller / Application
   ↓
Service
   ↓
Repository
   ↓
Database
```

---

# 14. Data Flow

مسیر کلی Read:

```text
Database
   ↓
Repository
   ↓
Service
   ↓
Controller
   ↓
View / API
   ↓
Component
```

مسیر Write:

```text
User
   ↓
UI
   ↓
Controller / API
   ↓
Validation
   ↓
Authorization
   ↓
Service
   ↓
Repository
   ↓
Database
```

---

# 15. API Layer

API مرز ارتباط External Clientها با Plugin است.

مثلاً:

```text
Web Frontend
Mobile App
External Integration
Admin Client
        ↓
     REST API
        ↓
     Services
```

این ساختار برای هدف آینده پروژه که امکان اتصال Mobile App به LMS را فراهم کند، مناسب است.

---

# 16. API نباید Business Logic باشد

بد:

```text
REST Endpoint
├── SQL
├── Business Rules
├── Validation
├── Enrollment
└── Response
```

صحیح:

```text
REST Endpoint
      ↓
Request Validation
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

# 17. Admin Layer

WordPress Admin بخشی از Plugin است.

```text
Admin
├── Courses
├── Lessons
├── Users
├── Enrollments
├── Assessments
├── Certificates
├── Reports
└── Settings
```

Admin UI نباید مستقیماً Business Logic را پیاده‌سازی کند.

---

# 18. Frontend Layer

Frontend مربوط به تجربه کاربر LMS است.

```text
Frontend
├── Course
├── Learning
├── Dashboard
├── Lesson
├── Quiz
├── Assignment
├── Certificate
└── Profile
```

---

# 19. UI Layer

UI باید Component-Based باشد.

اصل پروژه نیز Component Based بودن UI را مشخص کرده است. 

مثلاً:

```text
Button
Input
Modal
Card
Badge
Table
Tabs
Notification
CourseCard
LessonPlayer
Quiz
```

---

# 20. Component Boundary

Component فقط باید مسئول نمایش و Interaction خودش باشد.

مثلاً:

```text
CourseCard
```

می‌تواند:

```text
Display title
Display progress
Display instructor
Trigger continue action
```

اما نباید:

```text
Calculate enrollment rules
Execute raw SQL
Create certificate
```

را انجام دهد.

---

# 21. UI → Service

UI باید از Contract استفاده کند.

```text
UI
 ↓
Action
 ↓
Application / Controller
 ↓
Service
```

نه:

```text
UI
 ↓
Database
```

---

# 22. Theme Independence

یکی از اصول مهم معماری:

> **Iran LMS نباید به یک Theme خاص وابسته باشد.**

Theme می‌تواند ظاهر را تغییر دهد، اما Core LMS نباید برای اجرای خود به فایل‌های یک Theme خاص نیاز داشته باشد.

---

# 23. Plugin → Theme Boundary

صحیح:

```text
Theme
   ↓
Render / Style
   ↓
Iran LMS
```

اما Business Logic باید داخل Plugin باقی بماند.

```text
Theme
   ✕
Course Business Logic
```

---

# 24. Template Independence

نباید فرض کنیم Theme دارای فایل‌هایی مثل:

```text
single-course.php
single-lesson.php
course.php
lesson.php
```

است.

Plugin باید مکانیزم Rendering خودش را داشته باشد و در صورت نیاز امکان Override کنترل‌شده ارائه دهد.

---

# 25. Modular Architecture

Iran LMS باید Modular باشد.

فایل UI پروژه نیز Modular Architecture را به عنوان اصل طراحی مشخص کرده است. 

نمونه Moduleها:

```text
Courses
Learning
Enrollment
Assessment
Certificate
Commerce
Communication
Gamification
```

---

# 26. Optional Modules

قابلیت‌هایی که وجودشان برای Core ضروری نیست، باید قابل فعال/غیرفعال شدن باشند.

مثلاً:

```text
Certificate
Wallet
Gamification
SMS
Webinar
Forum
Survey
Attendance
```

در Design Guide نیز این موارد به‌عنوان قابلیت‌های Modular مطرح شده‌اند. 

---

# 27. Module Isolation

هر Module باید تا حد امکان:

```text
Independent
Encapsulated
Discoverable
Disableable
```

باشد.

---

# 28. Module Registration

الگوی مفهومی:

```text
Plugin Bootstrap
       ↓
Module Registry
       ↓
Enabled Modules
       ↓
Initialize
```

Module غیرفعال نباید منابع غیرضروری خود را Register کند.

---

# 29. Core Dependency Rule

قانون:

```text
Optional Module
       ↓
     Core
```

مجاز است.

اما:

```text
Core
  ↓
Optional Module
```

نباید برای قابلیت‌های اصلی رخ دهد.

---

# 30. Module-to-Module Dependency

Dependency بین Moduleها باید صریح باشد.

مثلاً:

```text
Certificate
    ↓
Learning
```

اگر Certificate به Learning نیاز دارد، این Dependency باید مشخص باشد.

---

# 31. Integration Architecture

Integrationهای خارجی باید Adapter داشته باشند.

مثلاً:

```text
PaymentService
      ↓
PaymentGatewayInterface
      ↓
┌───────────────┬───────────────┐
│               │               │
ZarinPal      IDPay          Other
Adapter       Adapter         Adapter
```

---

# 32. Media Architecture

Media باید یک Layer مشترک داشته باشد.

```text
Media
├── Image
├── Video
├── Audio
├── Document
└── Attachment
```

Moduleهای مختلف نباید برای Media سیستم‌های کاملاً جدا بسازند.

---

# 33. Learning Architecture

Learning یکی از بخش‌های اصلی سیستم است.

```text
Course
   ↓
Curriculum
   ↓
Section
   ↓
Lesson
   ↓
Learning Activity
   ↓
Progress
```

Lesson می‌تواند انواع مختلف داشته باشد:

```text
Video
PDF
Quiz
Assignment
Webinar
```

این مدل با UI طراحی‌شده Lesson Player و Curriculum پروژه هماهنگ است؛ در Design Guide نیز Curriculum، Video/PDF/Quiz/Assignment/Webinar و Progress در Lesson Player دیده می‌شوند. 

---

# 34. Progress Architecture

Progress باید یک Source of Truth داشته باشد.

```text
Lesson Activity
      ↓
Progress Service
      ↓
Learning Progress
```

Dashboard، Course Card و Mobile نباید Progress را مستقل محاسبه کنند.

---

# 35. Assessment Architecture

Assessment باید بتواند انواع ارزیابی را پشتیبانی کند.

```text
Assessment
├── Quiz
├── Assignment
└── Future Assessment Types
```

---

# 36. Certificate Architecture

Certificate نباید به UI وابسته باشد.

```text
Course Completion
       ↓
Certificate Eligibility
       ↓
Certificate Service
       ↓
Certificate Record
       ↓
Certificate UI / PDF / API
```

---

# 37. Commerce Architecture

Commerce باید از Learning جدا ولی قابل اتصال باشد.

```text
Commerce
├── Product
├── Pricing
├── Cart
├── Checkout
├── Invoice
└── Coupon
```

و:

```text
Commerce
     ↓
Enrollment
```

مثلاً خرید موفق می‌تواند باعث Enrollment شود.

---

# 38. Communication Architecture

Notification و Message نباید در هر Module سیستم جداگانه داشته باشند.

```text
Event
 ↓
Communication
 ├── Notification
 ├── Email
 ├── SMS Adapter
 └── Message
```

---

# 39. Event-Driven Communication

برای ارتباط بین Moduleها می‌توان از Event/Action استفاده کرد.

مثلاً:

```text
CourseCompleted
      ↓
Certificate
      ↓
Notification
      ↓
Email
```

به این ترتیب Certificate نباید مستقیماً Notification UI را کنترل کند.

---

# 40. WordPress Hooks Boundary

WordPress Hooks باید در Integration Layer مدیریت شوند.

Domain Logic نباید در همه جای خود مستقیماً به Hookهای WordPress وابسته شود.

---

# 41. UI Events vs Domain Events

این دو نباید با هم اشتباه شوند.

```text
UI Event
→ UserClickedButton
```

در مقابل:

```text
Domain Event
→ LessonCompleted
```

---

# 42. Mobile Architecture

Mobile یک سیستم جدا از Plugin نیست.

```text
Core
 ↓
API / UI Contract
 ↓
Responsive Frontend
 ↓
Mobile
```

فایل‌های `07-Mobile/` باید رفتار Mobile را بر اساس همین Architecture تعریف کنند.

---

# 43. Future Mobile App

برای آینده:

```text
WordPress
   │
Iran LMS Plugin
   │
 REST API
   │
Mobile App
```

Mobile App نباید مستقیماً به Database WordPress متصل شود.

---

# 44. Focus Mode

Focus Mode بخشی از Learning / Lesson Player است، نه یک Module مستقل.

```text
Lesson Player
      │
      └── Focus Mode
```

در Design Guide نیز Focus Mode به عنوان حالت کم‌حواس‌پرتی Lesson Player تعریف شده است. 

---

# 45. Security Boundary

Security باید در چند Layer اعمال شود:

```text
Request
 ↓
Authentication
 ↓
Authorization
 ↓
Validation
 ↓
Service
 ↓
Database
```

هیچ Layer نباید فرض کند Layer قبلی همیشه همه چیز را امن کرده است.

---

# 46. Data Ownership

هر Aggregate/Module باید مالک داده‌های خودش باشد.

مثلاً:

```text
Course
→ Course Data

Enrollment
→ Enrollment Data

Assessment
→ Assessment Data

Certificate
→ Certificate Data
```

Module دیگر نباید مستقیماً داده داخلی آن را دستکاری کند مگر از طریق Contract تعریف‌شده.

---

# 47. Public Contracts

ارتباط بین Moduleها باید از Contractهای مشخص استفاده کند.

مثلاً:

```text
EnrollmentService
PaymentInterface
CertificateService
NotificationService
```

---

# 48. Avoid Direct Database Coupling

بد:

```text
Certificate
 ↓
Direct SQL
 ↓
Enrollment Tables
```

بهتر:

```text
Certificate
 ↓
Enrollment Contract
 ↓
Enrollment Service
```

---

# 49. Configuration

Configuration باید از Business Logic جدا باشد.

```text
Configuration
   ↓
Core
   ↓
Modules
```

Hardcode کردن Settingهای قابل تغییر در Classها ممنوع.

---

# 50. Settings

تنظیمات Plugin باید از یک Settings Architecture مشخص استفاده کنند.

```text
Settings
├── General
├── Learning
├── Commerce
├── Notifications
├── Integrations
└── Advanced
```

---

# 51. Caching Boundary

Cache نباید در Business Logic پراکنده شود.

ترجیحاً:

```text
Service
 ↓
Cache Layer
 ↓
Repository
```

یا Contract مشابه.

---

# 52. Queue / Background Tasks

کارهای سنگین در صورت نیاز نباید در Request اصلی اجرا شوند.

مثلاً:

```text
Certificate Generation
Bulk Email
Reports
Large Imports
Media Processing
```

می‌توانند در آینده به Background Processing منتقل شوند.

---

# 53. Cron

برای کارهای زمان‌بندی‌شده از WordPress Cron یا abstraction مناسب استفاده شود.

---

# 54. Logging Architecture

Logging باید Centralized باشد.

```text
Module
 ↓
Logger
 ↓
Log Storage
```

نه اینکه هر Module سیستم Log کاملاً متفاوت داشته باشد.

---

# 55. Error Architecture

Error باید قابل تشخیص و مدیریت باشد:

```text
Error
├── Code
├── Message
├── Context
└── Status
```

و Error داخلی نباید بدون کنترل به کاربر نمایش داده شود.

---

# 56. API Versioning

API باید از ابتدا قابلیت Versioning داشته باشد.

مثلاً:

```text
/wp-json/iran-lms/v1/
```

ساختار دقیق Endpointها در `03-API/` تعیین می‌شود.

---

# 57. Database Migration

تغییر Schema باید Versioned باشد.

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

# 58. Activation

Activation فقط باید Initializationهای لازم را انجام دهد.

```text
Activate
 ↓
Environment Check
 ↓
Database Setup
 ↓
Capabilities
 ↓
Module Registration
```

---

# 59. Deactivation

Deactivation نباید به معنی حذف داده باشد.

```text
Deactivate
≠
Delete User Data
```

---

# 60. Uninstall

حذف داده باید یک فرآیند جدا و صریح باشد.

---

# 61. Dependency Management

اگر Module یا Integration وابستگی داشته باشد:

```text
Dependency Check
      ↓
Available?
 ┌────┴────┐
Yes        No
 ↓          ↓
Enable    Disable
```

---

# 62. Performance Architecture

Performance باید از ابتدا در Architecture دیده شود.

تمرکز روی:

```text
Database Queries
Caching
Asset Loading
API Requests
DOM Size
Media
Background Tasks
```

---

# 63. Asset Architecture

Assets باید Contextual Load شوند.

```text
Dashboard
 → Dashboard Assets

Course
 → Course Assets

Lesson
 → Player Assets

Quiz
 → Quiz Assets
```

---

# 64. Accessibility Architecture

Accessibility بخشی از Architecture است، نه Feature جانبی.

```text
Component
 ↓
Semantic HTML
 ↓
Keyboard
 ↓
Focus
 ↓
ARIA
 ↓
Screen Reader
```

---

# 65. RTL Architecture

RTL باید حالت First-Class سیستم باشد.

```text
Iran LMS
 ↓
RTL UI
 ↓
Responsive Layout
```

فایل UI پروژه نیز Full RTL Persian را به‌عنوان اصل Design System مشخص می‌کند. 

---

# 66. Theme Override

در آینده می‌توان امکان Override کنترل‌شده برای Theme فراهم کرد.

اما:

```text
Theme Override
≠
Business Logic Override
```

Theme باید بتواند Presentation را تغییر دهد، نه قوانین LMS را.

---

# 67. Extensibility

معماری باید اجازه دهد Developerهای دیگر:

```text
Add Module
Add Integration
Add Hook
Add Filter
Extend Component
Consume API
```

را بدون تغییر مستقیم Core انجام دهند.

---

# 68. Plugin Extension Model

مدل کلی:

```text
Iran LMS Core
      │
      ├── Official Modules
      │
      └── Third-Party Extensions
```

Third-party Extension نباید Core را Hack کند.

---

# 69. Architecture Rules

قوانین اصلی:

```text
01. Core مستقل از Optional Modules
02. UI مستقل از Database
03. Theme مستقل از LMS Business Logic
04. API مستقل از Business Logic Implementation
05. Services مستقل از Presentation
06. Repository مسئول Data Access
07. Moduleها Contract مشخص دارند
08. Integrationها Adapter دارند
09. Mobile از API/Contracts استفاده می‌کند
10. Security در تمام Boundaryها اعمال می‌شود
```

---

# 70. Dependency Direction

جهت وابستگی باید کنترل‌شده باشد:

```text
Presentation
      ↓
Application
      ↓
Domain
      ↓
Infrastructure
```

در معماری WordPress، Infrastructure می‌تواند شامل Adapterهای WordPress باشد.

---

# 71. Infrastructure

Infrastructure شامل ارتباط با محیط خارجی است:

```text
WordPress
Database
Filesystem
HTTP
Email
Payment Gateway
Video Provider
SMS Provider
```

---

# 72. Domain Independence

Business Ruleهای اصلی مثل:

```text
Enrollment
Progress
Course Completion
Assessment
Certificate Eligibility
```

نباید به یک UI خاص وابسته باشند.

---

# 73. Example: Course Completion

```text
Lesson Completed
       ↓
Progress Service
       ↓
Course Completion Check
       ↓
CourseCompleted Event
       ├── Certificate Module
       ├── Notification Module
       └── Gamification Module
```

مزیت:

> اضافه شدن Certificate یا Gamification نباید Core Learning را تغییر دهد.

---

# 74. Example: Purchase

```text
Checkout
   ↓
Payment Gateway
   ↓
Payment Success
   ↓
Order Completed
   ↓
Enrollment Service
   ↓
Student Enrolled
   ↓
Notification
```

---

# 75. Example: Quiz

```text
Quiz UI
 ↓
Quiz API
 ↓
Quiz Service
 ↓
Attempt Repository
 ↓
Assessment Data
```

و محاسبه نتیجه نباید داخل UI انجام شود.

---

# 76. Example: Lesson Player

```text
Lesson Player
     │
     ├── Lesson Data
     ├── Curriculum
     ├── Progress
     ├── Notes
     ├── Bookmark
     ├── Resources
     └── Completion
```

این ساختار با طراحی Lesson Player فعلی پروژه هم‌راستا است که Curriculum، Progress، Resources، Notes، Bookmark و Mark Complete را در همین تجربه قرار می‌دهد. 

---

# 77. Testing Architecture

Architecture باید Testable باشد.

```text
Service
 ↓
Unit Test

Repository
 ↓
Integration Test

API
 ↓
API Test

UI
 ↓
UI / E2E Test
```

---

# 78. Observability

سیستم در آینده باید بتواند:

```text
Log
Monitor
Debug
Trace
```

شود، بدون اینکه اطلاعات حساس کاربران را افشا کند.

---

# 79. Backward Compatibility

Contractهای Public باید با احتیاط تغییر کنند:

```text
REST API
Hooks
Filters
Capabilities
Database
Public Services
```

---

# 80. Versioned Architecture

تغییر Architecture باید مستند باشد.

```text
Architecture v1
      ↓
Change Proposal
      ↓
Review
      ↓
Architecture v2
```

---

# 81. Architecture Decision Rule

اگر یک Feature جدید نیازمند تغییر معماری است:

```text
Feature Request
      ↓
Architecture Impact
      ↓
Decision
      ↓
Documentation
      ↓
Implementation
```

نه اینکه Developer ابتدا کدنویسی کند و بعد Architecture را تطبیق دهد.

---

# 82. Forbidden Dependencies

این موارد نباید رخ دهند:

```text
❌ UI → Database
❌ Theme → LMS Core Database
❌ Core → Optional Module
❌ Service → Specific Payment Vendor
❌ Component → Raw SQL
❌ REST Controller → Complex Business Logic
❌ Template → Business Rules
```

---

# 83. Recommended Dependencies

```text
Component
   ↓
Application / Controller
   ↓
Service
   ↓
Repository
   ↓
Infrastructure
```

و:

```text
Module
   ↓
Public Contract
   ↓
Core / Other Module
```

---

# 84. Architecture Map

```text
                         IRAN LMS
                            │
                  ┌─────────┴─────────┐
                  │                   │
                CORE                MODULES
                  │                   │
        ┌─────────┼─────────┐    ┌────┼────┐
        │         │         │    │    │    │
      Users     Courses   Learning Cert Commerce
        │         │         │
        └─────────┼─────────┘
                  │
              SERVICES
                  │
            REPOSITORIES
                  │
              DATABASE
                  │
        ┌─────────┴─────────┐
        │                   │
       API                 UI
        │                   │
   Mobile App          Frontend/Admin
```

---

# 85. Relation With Project Documentation

این فایل نباید جایگزین سایر Documentationها شود.

ارتباط اسناد:

```text
01-Architecture/
       ↓
02-Database/
       ↓
03-API/
       ↓
04-Modules/
       ↓
05-UI/
       ↓
06-Components/
       ↓
07-Mobile/
       ↓
08-Developer/
```

هر بخش قرارداد خودش را دارد و `08-Developer/Architecture.md` نحوه اتصال این قراردادها در Implementation را توضیح می‌دهد.

---

# 86. Important Boundary

**UI Design Guide** مشخص می‌کند سیستم از نظر تجربه و ساختار UI باید Component-Based، WordPress-Friendly، RTL و Modular باشد. 

این فایل مشخص می‌کند این اصول در سطح Developer چگونه به مرزبندی‌های:

```text
Core
Module
Service
Repository
API
UI
WordPress
```

تبدیل شوند.

---

# 87. Definition of Done

معماری زمانی قابل قبول است که:

```text
☐ Plugin مستقل از Theme باشد
☐ Core مستقل از Optional Modules باشد
☐ Business Logic از UI جدا باشد
☐ Database Access متمرکز باشد
☐ API از Service استفاده کند
☐ Moduleها Contract مشخص داشته باشند
☐ Integrationها قابل تعویض باشند
☐ Mobile بتواند از API استفاده کند
☐ UI Component-Based باشد
☐ RTL از ابتدا در معماری لحاظ شده باشد
☐ Security در Boundaryها اعمال شود
☐ Architecture قابل Test باشد
☐ Migration و Versioning قابل کنترل باشد
```

---

# 88. Final Architecture Principle

> **Iran LMS باید یک WordPress Plugin ماژولار باشد که Core، Business Logic، API، Database، UI و Integrationها را از یکدیگر جدا نگه می‌دارد؛ Theme فقط Presentation را کنترل می‌کند و Moduleهای اختیاری بدون وابسته کردن Core به خودشان به سیستم متصل می‌شوند.**

```text
WordPress Plugin
       +
Modular Core
       +
Separated Business Logic
       +
Stable Contracts
       +
Component-Based UI
       +
Theme Independence
       +
API-Ready Architecture
       +
Mobile-Ready Architecture
       =
Iran LMS Architecture
```

**نکته:** در این نسخه عمداً ساختار دقیق Namespace، نام نهایی کلاس‌ها، Autoloader، پوشه‌های PHP و قراردادهای جزئی REST را قطعی نکردم؛ چون فایل مرجع موجود چنین تصمیم‌هایی را مشخص نمی‌کند. این موارد باید در فایل‌های تخصصی بعدی (`Plugin-Structure`, `WordPress-Standards`, `API`, `Modules` و غیره) تثبیت شوند، تا بعداً مجبور به بازنویسی معماری نشویم.
