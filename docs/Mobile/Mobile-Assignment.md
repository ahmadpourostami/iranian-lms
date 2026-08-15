# Mobile-Assessment.md

**Path:** `07-Mobile/Mobile-Assessment.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile Assessment Experience
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد تجربه **Assessment در Mobile** را برای افزونه WordPress **Iran LMS** تعریف می‌کند.

Assessment شامل بخش‌هایی مانند:

```text
Quiz
Exam
Question
Attempt
Answer
Result
Grade
```

است.

هدف این است که کاربر بتواند در موبایل:

```text
Assessment
↓
Start
↓
Answer
↓
Review
↓
Submit
↓
Result
```

را بدون پیچیدگی و خطای ناخواسته طی کند.

---

# 2. Plugin Boundary

این UI متعلق به **افزونه Iran LMS** است، نه Theme.

بنابراین:

```text
Theme
    ↓
Presentation Context

Iran LMS
    ↓
Assessment Domain
    ↓
Assessment UI
```

است.

UI نباید مستقیماً با:

```text
$wpdb
Quiz Tables
Attempt Tables
Grade Tables
```

کار کند.

---

# 3. Assessment Types

سیستم باید قابلیت پشتیبانی از:

```text
Quiz
Exam
Practice
Final Exam
Midterm
Short Quiz
Assignment Assessment
```

را داشته باشد.

نوع Assessment باید از Domain دریافت شود.

---

# 4. Mobile Assessment Structure

```text
┌─────────────────────────────┐
│ ← آزمون             ⋮       │
├─────────────────────────────┤
│ آزمون نهایی React           │
│ ۱۰ سؤال • ۳۰ دقیقه          │
├─────────────────────────────┤
│ سؤال ۳ از ۱۰               │
│ ███████░░░                  │
├─────────────────────────────┤
│ Question                    │
│                             │
│ Answer Options              │
│                             │
├─────────────────────────────┤
│ قبلی              بعدی      │
└─────────────────────────────┘
```

---

# 5. Assessment Header

Header باید شامل:

```text
Back
Assessment Title
More
```

باشد.

در Assessment در حال انجام، Back نباید بدون هشدار کاربر را خارج کند.

---

# 6. Attempt State

Attempt می‌تواند:

```text
Not Started
In Progress
Submitted
Passed
Failed
Expired
Cancelled
```

باشد.

---

# 7. Start Screen

قبل از شروع:

```text
آزمون نهایی React

۱۰ سؤال
۳۰ دقیقه
حداقل نمره قبولی: ۷۰٪

[ شروع آزمون ]
```

نمایش داده شود.

---

# 8. Assessment Rules

قبل از Start، قوانین مهم نمایش داده شوند:

```text
زمان آزمون
تعداد سوال
تعداد دفعات مجاز
حداقل نمره
امکان برگشت
زمان انقضا
```

اطلاعات غیرضروری نباید صفحه را شلوغ کند.

---

# 9. Timer

Timer در Assessment زمان‌دار باید همیشه قابل مشاهده باشد:

```text
⏱ 24:36
```

ترجیحاً در Header یا یک Sticky Status Bar.

---

# 10. Timer States

```text
Normal
Warning
Critical
Expired
```

مثلاً:

```text
24:36
↓
05:00
↓
00:30
↓
00:00
```

تغییر وضعیت باید فقط با رنگ منتقل نشود.

---

# 11. Timer Expiration

در پایان زمان:

```text
Timer
↓
Expired
↓
Auto Submit
```

در صورتی که Assessment Policy این رفتار را تعریف کرده باشد.

UI نباید مستقل از Domain تصمیم بگیرد.

---

# 12. Question Progress

Progress:

```text
سؤال ۳ از ۱۰
```

همراه با Progress Bar نمایش داده شود.

```text
██████░░░░
```

---

# 13. Question Navigator

برای آزمون‌های طولانی، Navigator می‌تواند به صورت Bottom Sheet باز شود:

```text
سؤالات

✓ ۱
✓ ۲
● ۳
○ ۴
○ ۵
🔖 ۶
○ ۷
...
```

Stateها باید مشخص باشند:

```text
Answered
Current
Unanswered
Marked
Skipped
```

---

# 14. Question Card

ساختار:

```text
سؤال ۳

کدام گزینه صحیح است؟

○ گزینه اول

○ گزینه دوم

○ گزینه سوم

○ گزینه چهارم
```

Question Card نباید بیش از حد Decoration داشته باشد.

---

# 15. Question Types

حداقل:

```text
Single Choice
Multiple Choice
True / False
Short Answer
Long Answer
Matching
Ordering
```

در صورت پشتیبانی Assessment Domain.

---

# 16. Single Choice

```text
○ React
○ Vue
○ Angular
○ Svelte
```

فقط یک گزینه قابل انتخاب است.

---

# 17. Multiple Choice

```text
☐ React
☐ Vue
☐ Angular
☐ Svelte
```

می‌تواند چند انتخاب داشته باشد.

---

# 18. True / False

```text
○ درست
○ نادرست
```

باید با Label واضح نمایش داده شود.

---

# 19. Text Answer

برای پاسخ کوتاه:

```text
پاسخ خود را وارد کنید...
```

Input باید:

```text
Auto Grow
RTL
Accessible
```

باشد.

---

# 20. Long Answer

برای پاسخ تشریحی:

```text
┌──────────────────────────┐
│ پاسخ خود را بنویسید...   │
│                          │
│                          │
└──────────────────────────┘
```

حداقل ارتفاع مناسب داشته باشد.

---

# 21. Matching

Matching در Mobile باید به جای Drag پیچیده، امکان انتخاب ساده داشته باشد.

مثلاً:

```text
React
[ انتخاب کنید ▼ ]

Vue
[ انتخاب کنید ▼ ]
```

این روش برای Touch مناسب‌تر است.

---

# 22. Ordering

برای Ordering:

```text
☰  نصب Node.js
☰  ایجاد پروژه
☰  اجرای پروژه
☰  ساخت Component
```

Drag & Drop در صورت پشتیبانی Touch استفاده شود.

Fallback باید وجود داشته باشد:

```text
بالا
پایین
```

---

# 23. Question Media

Question ممکن است شامل:

```text
Image
Audio
Video
Code
PDF
```

باشد.

Media باید Responsive باشد.

---

# 24. Code Question

برای برنامه‌نویسی:

```text
Code Block
```

باید:

```text
Horizontal Scroll
Copy
Readable Font
```

را داشته باشد.

---

# 25. Answer Persistence

پاسخ کاربر باید تا حد امکان:

```text
Save
↓
Server / Attempt State
```

شود.

در آزمون‌های طولانی نباید صرفاً در Frontend نگهداری شود.

---

# 26. Auto Save

در صورت فعال بودن:

```text
ذخیره شد ✓
```

نمایش داده شود.

در صورت خطا:

```text
ذخیره نشد
[ تلاش دوباره ]
```

---

# 27. Navigation

پایین صفحه:

```text
[ قبلی ]             [ بعدی ]
```

باشد.

Next باید Priority بالاتری داشته باشد.

---

# 28. Last Question

در آخرین سؤال:

```text
[ بررسی پاسخ‌ها ]
```

به جای Next نمایش داده شود.

---

# 29. Review Before Submit

صفحه Review:

```text
مرور آزمون

۱۰ سؤال
✓ ۸ پاسخ داده شده
○ ۲ بدون پاسخ

[ بازگشت به سؤال‌ها ]
[ ارسال آزمون ]
```

---

# 30. Unanswered Warning

اگر سؤال بدون پاسخ وجود دارد:

```text
۲ سؤال بدون پاسخ دارید.

آیا مطمئن هستید که می‌خواهید آزمون را ارسال کنید؟
```

Actions:

```text
[ بازگشت ]
[ ارسال ]
```

---

# 31. Submit Confirmation

Submit نهایی باید Confirmation داشته باشد.

```text
ارسال آزمون

پس از ارسال امکان ویرایش پاسخ‌ها وجود ندارد.

[ لغو ]
[ ارسال آزمون ]
```

---

# 32. Submission Loading

هنگام Submit:

```text
در حال ارسال پاسخ‌ها...
```

CTA باید Disabled شود.

از Double Submit جلوگیری شود.

---

# 33. Submission Success

```text
✓ آزمون با موفقیت ارسال شد.
```

سپس:

```text
[ مشاهده نتیجه ]
```

یا در صورت عدم نمایش فوری:

```text
نتیجه پس از بررسی مدرس منتشر خواهد شد.
```

---

# 34. Result Screen

Result:

```text
آزمون نهایی React

85٪

✓ قبول شدید

پاسخ صحیح: 17
پاسخ غلط: 3
```

---

# 35. Result States

```text
Passed
Failed
Pending
Not Published
Expired
```

---

# 36. Passed

```text
🎉
آزمون را با موفقیت گذراندید.

نمره:
85٪

[ مشاهده پاسخ‌ها ]
[ ادامه دوره ]
```

---

# 37. Failed

```text
این بار حداقل نمره لازم را کسب نکردید.

نمره:
52٪

حداقل نمره:
70٪

[ مشاهده پاسخ‌ها ]
[ تلاش مجدد ]
```

البته Retry فقط در صورت وجود Attempt مجاز است.

---

# 38. Pending

برای Assessment دستی:

```text
پاسخ‌های شما ثبت شد.

نتیجه پس از بررسی مدرس منتشر خواهد شد.
```

---

# 39. Answer Review

اگر Policy اجازه دهد:

```text
سؤال ۱
✓ صحیح

سؤال ۲
✕ غلط

سؤال ۳
✓ صحیح
```

کاربر می‌تواند پاسخ‌ها را مشاهده کند.

---

# 40. Correct Answer

در صورت مجاز بودن:

```text
پاسخ شما:
React

پاسخ صحیح:
React

توضیح:
...
```

نمایش داده شود.

---

# 41. Explanation

Explanation باید بعد از پاسخ قرار گیرد و با Answer اشتباه نشود.

```text
توضیح پاسخ
```

---

# 42. Score

Score می‌تواند شامل:

```text
Percentage
Raw Score
Grade
Passing Status
```

باشد.

---

# 43. Assessment Dashboard

اگر کاربر وارد بخش Assessmentهای خود شود:

```text
آزمون‌ها

[ همه ] [ در حال انجام ] [ تکمیل شده ]

آزمون نهایی React
85٪
تکمیل شده
```

---

# 44. Assessment Card

```text
┌─────────────────────────────┐
│ آزمون نهایی React           │
│ React جامع                  │
│                             │
│ ✓ تکمیل شده      85٪       │
│ 90 دقیقه                    │
│                             │
│ [ مشاهده نتیجه ]            │
└─────────────────────────────┘
```

---

# 45. Assessment List States

```text
Upcoming
In Progress
Completed
Expired
Locked
```

---

# 46. Upcoming Assessment

```text
آزمون میان‌ترم

۲۸ خرداد
18:00

۶۰ دقیقه

[ مشاهده جزئیات ]
```

---

# 47. In Progress

```text
آزمون میان‌ترم

در حال انجام

25:30 باقی‌مانده

[ ادامه آزمون ]
```

---

# 48. Completed

```text
✓ تکمیل شده

نمره:
85٪

[ مشاهده نتیجه ]
```

---

# 49. Locked

```text
🔒 آزمون قفل است

برای دسترسی باید درس‌های قبلی را تکمیل کنید.
```

---

# 50. Expired

```text
آزمون منقضی شده است.
```

در صورت Retry:

```text
[ شروع مجدد ]
```

---

# 51. Mobile Bottom Actions

در Assessment، Actionهای اصلی می‌توانند Sticky باشند:

```text
┌─────────────────────────────┐
│ [ قبلی ]      [ بعدی ]      │
└─────────────────────────────┘
```

برای Review:

```text
┌─────────────────────────────┐
│ [ بازگشت ]    [ ارسال ]     │
└─────────────────────────────┘
```

---

# 52. Safe Area

Sticky Actions باید Safe Area موبایل را در نظر بگیرند.

مخصوصاً در:

```text
iOS
Android Gesture Navigation
```

---

# 53. Keyboard Behavior

در Questionهای Text:

```text
Keyboard Open
↓
Sticky Actions
↓
Remain Accessible
```

نباید Input را بپوشانند.

---

# 54. Orientation

Assessment در Portrait اولویت دارد.

Landscape فقط برای:

```text
Code Question
Media Question
Large Table
```

در صورت نیاز پشتیبانی شود.

---

# 55. Dark Mode

تمام Assessment UI باید Dark Mode را پشتیبانی کند:

```text
Question
Options
Timer
Progress
Review
Result
```

---

# 56. RTL

Assessment به صورت پیش‌فرض RTL است.

اما مواردی مانند:

```text
Code
URL
Email
Programming Syntax
```

می‌توانند LTR باشند.

---

# 57. Accessibility

```text
☐ Semantic Questions
☐ Keyboard Navigation
☐ Screen Reader Labels
☐ Focus Management
☐ Accessible Timer
☐ Touch Targets
☐ Contrast
☐ Error Messages
```

باید رعایت شود.

---

# 58. Focus Management

بعد از Next:

```text
Next Question
↓
Focus Question Heading
```

و نه صرفاً تغییر محتوا بدون اطلاع Screen Reader.

---

# 59. Error Handling

خطاهای اصلی:

```text
Load Error
Save Answer Error
Network Error
Submit Error
Permission Error
Attempt Expired
```

باید State مناسب داشته باشند.

---

# 60. Network Error

مثلاً:

```text
اتصال به سرور قطع شد.

پاسخ شما هنوز ارسال نشده است.

[ تلاش دوباره ]
```

---

# 61. Submit Error

اگر Submit شکست خورد:

```text
ارسال آزمون انجام نشد.

پاسخ‌های شما حفظ شده‌اند.

[ تلاش دوباره ]
```

---

# 62. Attempt Expired

```text
زمان آزمون به پایان رسیده است.

در حال ثبت پاسخ‌های ذخیره‌شده...
```

سپس Domain تصمیم می‌گیرد Auto Submit انجام شود یا خیر.

---

# 63. Loading

Loading State باید برای:

```text
Assessment
Question
Answer Save
Submit
Result
```

مجزا باشد.

---

# 64. Skeleton

Skeleton باید شبیه ساختار واقعی Question باشد:

```text
سؤال ███████████████

████████████████████

○ ███████████
○ █████████████
○ ████████

[████] [████████]
```

---

# 65. Empty State

برای Assessment List:

```text
هنوز آزمونی برای شما وجود ندارد.
```

و در صورت وجود Course:

```text
مشاهده دوره‌ها
```

---

# 66. Module Awareness

Assessment UI باید با Moduleهای فعال هماهنگ باشد.

مثلاً:

```text
Certificate
Gamification
Gradebook
Notifications
```

می‌توانند بعد از Assessment نتیجه ایجاد کنند.

اما Assessment UI نباید مستقیماً مسئول آنها باشد.

---

# 67. Certificate Integration

اگر قبولی Assessment باعث فعال شدن Certificate شود:

```text
Passed
↓
Certificate Eligibility
↓
Certificate
```

UI Certificate باید از Certificate Domain بیاید.

---

# 68. Gamification Integration

در صورت فعال بودن:

```text
+50 XP
🏆 Quiz Master
```

می‌تواند بعد از Result نمایش داده شود.

این Feedback نباید نتیجه اصلی را تحت‌الشعاع قرار دهد.

---

# 69. Notifications

Notification:

```text
Assessment Result Published
```

باید توسط Notification Module مدیریت شود.

---

# 70. WordPress Integration

Assessment UI می‌تواند در:

```text
Shortcode
Block
Template
Plugin Route
REST-powered View
```

ارائه شود.

اما UI نباید به یک Theme خاص وابسته باشد.

---

# 71. REST / API Boundary

برای UI مدرن:

```text
Mobile UI
↓
Application/API Layer
↓
Assessment Service
↓
WordPress Data Layer
```

مناسب است.

Response باید View Model مناسب UI ارائه کند.

---

# 72. Assessment View Model

نمونه مفهومی:

```text
AssessmentViewModel
├── id
├── title
├── type
├── course
├── instructions
├── duration
├── questionCount
├── passingScore
├── attempts
├── currentAttempt
├── questions
├── progress
├── timer
├── permissions
└── result
```

---

# 73. Attempt View Model

```text
AttemptViewModel
├── id
├── status
├── startedAt
├── expiresAt
├── answeredCount
├── totalQuestions
├── currentQuestion
├── remainingTime
└── canSubmit
```

---

# 74. Question View Model

```text
QuestionViewModel
├── id
├── number
├── type
├── text
├── media
├── options
├── answer
├── marked
├── status
└── explanation
```

---

# 75. Business Logic Boundary

UI نباید خودش تصمیم بگیرد:

```text
Is Passed?
Is Attempt Valid?
Can Retry?
Can Submit?
Is Answer Correct?
```

این تصمیم‌ها باید از Domain/Application Layer بیایند.

---

# 76. Security

Assessment از بخش‌های حساس LMS است.

نباید:

```text
Correct Answer
Assessment Solution
Private Questions
```

در Frontend بدون نیاز ارسال شوند.

---

# 77. Authorization

قبل از نمایش Assessment باید Permission بررسی شود:

```text
User
+
Enrollment
+
Assessment Permission
+
Attempt Policy
```

---

# 78. Anti-Double Submit

پس از Submit:

```text
Submit
↓
Loading
↓
Disabled
```

و درخواست تکراری جلوگیری شود.

---

# 79. Data Integrity

Answerها باید با:

```text
User
Course
Assessment
Attempt
Question
```

مرتبط باشند.

UI فقط این ارتباط را مصرف می‌کند.

---

# 80. Performance

در Assessmentهای بزرگ:

```text
Lazy Question Loading
```

می‌تواند استفاده شود.

اما اگر Assessment Policy نیازمند دریافت همه Questionها باشد، باید از معماری مناسب استفاده شود.

---

# 81. No Theme Dependency

Assessment نباید به CSS عمومی Theme وابسته باشد.

پیشنهاد Naming:

```text
.iran-lms-assessment
.iran-lms-assessment__header
.iran-lms-assessment__question
.iran-lms-assessment__option
.iran-lms-assessment__actions
```

---

# 82. Component Architecture

```text
MobileAssessment
│
├── AssessmentHeader
├── AssessmentIntro
├── AssessmentTimer
├── AssessmentProgress
├── QuestionNavigator
├── QuestionCard
│   ├── QuestionContent
│   ├── QuestionMedia
│   └── AnswerInput
│
├── AssessmentActions
├── AssessmentReview
├── SubmitConfirmation
└── AssessmentResult
```

---

# 83. Definition of Done

```text
☐ Start Screen
☐ Assessment Rules
☐ Timer
☐ Question Progress
☐ Question Navigator
☐ Multiple Question Types
☐ Answer Persistence
☐ Auto Save
☐ Previous / Next
☐ Review Screen
☐ Submit Confirmation
☐ Result Screen
☐ Passed / Failed / Pending
☐ Retry Policy
☐ Error States
☐ Loading States
☐ Empty States
☐ Dark Mode
☐ RTL
☐ Accessibility
☐ Mobile Safe Area
☐ Keyboard Handling
☐ Theme Independence
☐ WordPress Plugin Boundary
☐ Domain Logic خارج از UI
☐ Module Awareness
```

---

# 84. Final Principle

تجربه Assessment در Mobile باید این مسیر را ایجاد کند:

```text
Understand
   ↓
Start
   ↓
Answer
   ↓
Review
   ↓
Submit
   ↓
Result
   ↓
Continue Learning
```

و اصل نهایی:

> **Assessment در Iran LMS باید یک تجربه مستقل، امن و قابل‌اعتماد داخل افزونه WordPress باشد؛ رابط کاربری فقط مسئول ارائه و تعامل است و تمام قوانین آزمون، Attempt، نمره، قبولی و دسترسی در لایه‌های Domain و Application کنترل می‌شوند.**
