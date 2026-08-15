# Quiz

**Component:** Assessment / Learning
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Core Assessment Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Quiz` کامپوننت اصلی تجربه آزمون در افزونه WordPress ایران LMS است.

این کامپوننت باید امکان اجرای یک آزمون را برای دانشجو فراهم کند:

* نمایش اطلاعات آزمون
* شروع آزمون
* نمایش سؤال‌ها
* انتخاب پاسخ
* جابه‌جایی بین سؤال‌ها
* نمایش وضعیت پاسخ‌ها
* مدیریت زمان
* ذخیره موقت پاسخ‌ها
* ارسال آزمون
* نمایش نتیجه
* نمایش نمره
* نمایش وضعیت قبولی
* نمایش Feedback در صورت فعال بودن

طبق UI Guide، Quiz Card حداقل شامل **Start Button، Question Count، Time و Passing Score** است.

---

# 2. Core Principle

`Quiz` یک UI Component برای اجرای Assessment است؛ مالک منطق اصلی ارزیابی نیست.

```text
Assessment Domain
       ↓
Assessment Application Layer
       ↓
Quiz View Model
       ↓
Quiz UI
```

بنابراین Quiz نباید خودش:

* نمره را تعیین کند
* پاسخ صحیح را تصمیم بگیرد
* Attempt را مستقیماً در Database ذخیره کند
* Permission را تعیین کند
* Passing Score را محاسبه کند

---

# 3. Plugin Boundary

Quiz متعلق به افزونه Iran LMS است:

```text
Iran LMS
   ↓
Assessment Module
   ↓
Quiz
```

و نباید به Theme وابسته باشد.

---

# 4. Architecture

```text
Quiz
│
├── QuizIntro
├── QuizHeader
├── QuizTimer
├── QuestionNavigator
├── QuestionRenderer
├── AnswerInput
├── QuizFooter
├── SubmitConfirmation
└── QuizResult
```

---

# 5. Quiz Lifecycle

چرخه اصلی:

```text
Not Started
     ↓
Started
     ↓
In Progress
     ↓
Submitted
     ↓
Graded
     ↓
Result
```

در آزمون‌های دستی ممکن است:

```text
Submitted
     ↓
Pending Grading
     ↓
Graded
```

وجود داشته باشد.

---

# 6. Quiz States

Stateهای اصلی:

```text
locked
available
not_started
in_progress
submitted
grading
graded
passed
failed
expired
```

---

# 7. Quiz Intro

قبل از شروع آزمون باید اطلاعات اصلی نمایش داده شود.

```text
┌──────────────────────────────┐
│ آزمون فصل دوم                │
│                              │
│ 10 سؤال                      │
│ زمان: 20 دقیقه               │
│ حد نصاب قبولی: 70٪           │
│                              │
│ [ شروع آزمون ]               │
└──────────────────────────────┘
```

این ساختار مستقیماً با Quiz Card در UI Guide هماهنگ است.

---

# 8. Quiz Metadata

اطلاعات قابل نمایش:

```text
Question Count
Time Limit
Passing Score
Attempts
Difficulty
Estimated Time
```

موارد Optional هستند.

---

# 9. Question Count

مثلاً:

```text
10 سؤال
```

یا:

```text
سؤال 1 از 10
```

---

# 10. Time Limit

مثلاً:

```text
20 دقیقه
```

اگر آزمون بدون محدودیت زمانی باشد:

```text
بدون محدودیت زمانی
```

---

# 11. Passing Score

مثلاً:

```text
حد نصاب قبولی: 70٪
```

Passing Score از Assessment Module می‌آید.

---

# 12. Attempts

اگر محدودیت Attempt فعال باشد:

```text
تلاش‌های مجاز: 3
تلاش‌های باقی‌مانده: 2
```

Quiz فقط این اطلاعات را نمایش می‌دهد.

---

# 13. Start Quiz

Action اصلی:

```text
[ شروع آزمون ]
```

بعد از Start:

```text
Quiz Intro
    ↓
Start Attempt
    ↓
Quiz Session
```

---

# 14. Attempt

هر اجرای آزمون باید یک Attempt مستقل باشد.

```text
Quiz
 ├── Attempt 1
 ├── Attempt 2
 └── Attempt 3
```

Attempt متعلق به Assessment Domain است.

---

# 15. Attempt ID

Quiz UI می‌تواند یک Attempt ID دریافت کند:

```js
{
    attemptId: "attempt_123"
}
```

اما تولید و اعتبارسنجی آن متعلق به Backend است.

---

# 16. Quiz Header

Header در زمان اجرای آزمون:

```text
┌─────────────────────────────────────┐
│ آزمون فصل دوم       سؤال 3 از 10    │
│                    زمان باقی‌مانده  │
└─────────────────────────────────────┘
```

---

# 17. Timer

Timer باید زمان باقی‌مانده را نمایش دهد.

مثلاً:

```text
19:42
```

---

# 18. Timer Boundary

Timer نباید مرجع امنیتی زمان آزمون باشد.

غلط:

```text
Browser Timer
    ↓
Submit Allowed
```

صحیح:

```text
Server Attempt
    ↓
Server Time
    ↓
Expiration Validation
```

Browser فقط UI Timer است.

---

# 19. Timer Warning

در زمان نزدیک شدن به پایان:

```text
02:00
```

می‌توان Warning State نمایش داد.

مثلاً:

```text
زمان آزمون رو به پایان است.
```

---

# 20. Expiration

اگر زمان تمام شود:

```text
Timer
 ↓
Expired
 ↓
Auto Submit / Lock
```

رفتار دقیق باید توسط Assessment Module تعیین شود.

---

# 21. Question Navigator

در کنار سؤال‌ها می‌توان Navigator داشت:

```text
1 ✓
2 ✓
3 ●
4 ○
5 ○
6 ?
7 ○
```

Stateها:

```text
answered
current
unanswered
marked
```

---

# 22. Current Question

سؤال فعلی باید کاملاً مشخص باشد:

```text
سؤال 3 از 10
```

---

# 23. Answered Question

مثلاً:

```text
✓ 1
✓ 2
```

یعنی کاربر برای آن سؤال پاسخ انتخاب کرده است.

---

# 24. Unanswered Question

```text
○ 5
```

یعنی هنوز پاسخ انتخاب نشده است.

---

# 25. Mark for Review

در صورت فعال بودن:

```text
[ علامت‌گذاری برای بررسی ]
```

کاربر می‌تواند سؤال را برای بازبینی علامت بزند.

---

# 26. Question Model

View Model پیشنهادی:

```js
{
    id,
    type,
    title,
    content,
    points,
    required,
    options,
    media,
    order
}
```

---

# 27. Question Types

نسخه پایه می‌تواند این Question Typeها را پشتیبانی کند:

```text
single_choice
multiple_choice
true_false
short_answer
long_answer
```

Typeهای پیشرفته می‌توانند بعداً اضافه شوند:

```text
matching
ordering
fill_blank
file_upload
code
```

---

# 28. Question Renderer

Quiz نباید برای هر نوع سؤال UI جداگانه و غیرقابل توسعه بسازد.

معماری:

```text
Question
   ↓
Question Type
   ↓
Renderer
```

مثلاً:

```text
SingleChoiceRenderer
MultipleChoiceRenderer
TrueFalseRenderer
ShortAnswerRenderer
LongAnswerRenderer
```

---

# 29. Single Choice

نمونه:

```text
کدام گزینه صحیح است؟

○ React یک Database است.
○ React یک UI Library است.
○ React یک Operating System است.
○ React یک Browser است.
```

فقط یک گزینه قابل انتخاب است.

---

# 30. Multiple Choice

نمونه:

```text
کدام موارد زبان برنامه‌نویسی هستند؟

☐ PHP
☐ HTML
☐ Python
☐ JavaScript
```

چند گزینه می‌تواند انتخاب شود.

---

# 31. True / False

```text
React یک زبان برنامه‌نویسی است.

○ درست
○ نادرست
```

---

# 32. Short Answer

```text
نام کتابخانه مورد استفاده در سؤال چیست؟

[                    ]
```

---

# 33. Long Answer

برای پاسخ تشریحی:

```text
[                                    ]
[                                    ]
[                                    ]
```

می‌توان از `Textarea` سیستم استفاده کرد.

---

# 34. Question Media

Question می‌تواند Media داشته باشد:

```text
Image
Audio
Video
PDF
Code
```

مثلاً:

```text
Question
 ↓
Image
 ↓
Answer
```

---

# 35. Image Question

برای سؤال تصویری:

```text
┌─────────────────────┐
│      Image          │
└─────────────────────┘

این تصویر چه چیزی را نشان می‌دهد؟
```

Media باید از Media Module استفاده کند.

---

# 36. Code Question

برای آزمون برنامه‌نویسی:

```text
Question
 ↓
Code Editor
 ↓
Answer
```

Code Editor نباید داخل Quiz هاردکد شود.

---

# 37. Question Points

هر سؤال می‌تواند امتیاز داشته باشد:

```text
2 امتیاز
```

نمایش آن اختیاری است.

---

# 38. Required Question

اگر سؤال اجباری باشد:

```text
*
```

یا:

```text
پاسخ به این سؤال الزامی است.
```

---

# 39. Question Navigation

پایین سؤال:

```text
[ سؤال قبلی ]       [ سؤال بعدی ]
```

---

# 40. Previous Button

اگر سؤال اول باشد:

```text
Previous = Disabled
```

---

# 41. Next Button

اگر سؤال آخر باشد:

```text
Next = Submit Flow
```

---

# 42. Save Answer

انتخاب پاسخ باید بتواند به صورت موقت ذخیره شود:

```text
Answer
 ↓
Client State
 ↓
Autosave
 ↓
Attempt
```

---

# 43. Autosave

در آزمون‌های طولانی پیشنهاد می‌شود پاسخ‌ها Auto Save شوند.

مثلاً:

```text
✓ پاسخ ذخیره شد
```

---

# 44. Autosave Boundary

Autosave نباید باعث Request برای هر تغییر کوچک شود.

بهتر است:

* Debounce
* Batch
* Explicit Save

استفاده شود.

---

# 45. Offline / Connection Loss

اگر اتصال قطع شد:

```text
اتصال اینترنت قطع شده است.
پاسخ‌های ذخیره‌نشده ممکن است ارسال نشده باشند.
```

پس از اتصال:

```text
Retry
```

---

# 46. Submit Quiz

در پایان:

```text
[ ارسال آزمون ]
```

نباید بلافاصله بدون Confirmation انجام شود، مخصوصاً اگر سؤال بدون پاسخ وجود دارد.

---

# 47. Submit Confirmation

مثلاً:

```text
آیا مطمئن هستید؟

10 سؤال
8 پاسخ داده شده
2 سؤال بدون پاسخ

[ بازگشت ]
[ ارسال آزمون ]
```

---

# 48. Unanswered Warning

اگر سؤال بدون پاسخ وجود داشته باشد:

```text
2 سؤال بدون پاسخ مانده است.
```

این Warning باید قبل از Submit نمایش داده شود.

---

# 49. Submission Boundary

```text
Quiz UI
   ↓
Submit Attempt
   ↓
Assessment API
   ↓
Validation
   ↓
Grading
```

---

# 50. Security

Submit باید Server-side Validation شود.

Client نباید بتواند:

* نمره را تعیین کند
* Passing Status را تغییر دهد
* Correct Answer را ارسال کند
* Time Limit را دور بزند

---

# 51. Correct Answer

Correct Answer نباید در Frontend قابل مشاهده باشد.

غلط:

```js
{
    answer: "B"
}
```

در Client برای آزمون فعال.

---

# 52. Grading

Auto-Grading:

```text
Submit
 ↓
Assessment Engine
 ↓
Score
```

Manual Grading:

```text
Submit
 ↓
Pending Grading
 ↓
Instructor
 ↓
Grade
```

---

# 53. Result State

نتیجه می‌تواند:

```text
Passed
Failed
Pending
```

باشد.

---

# 54. Result Screen

مثلاً:

```text
┌──────────────────────────────┐
│ آزمون به پایان رسید          │
│                              │
│ امتیاز شما                   │
│ 82 از 100                    │
│                              │
│ ✓ قبول شدید                  │
│                              │
│ [ مشاهده پاسخ‌ها ]           │
│ [ بازگشت به دوره ]            │
└──────────────────────────────┘
```

---

# 55. Score

Score باید از Assessment API دریافت شود.

مثلاً:

```text
82 / 100
```

---

# 56. Percentage

```text
82٪
```

---

# 57. Passing Status

```text
✓ قبول شدید
```

یا:

```text
✕ حد نصاب قبولی را کسب نکردید.
```

---

# 58. Passing Score Display

مثلاً:

```text
نمره شما: 82٪
حد نصاب: 70٪
```

---

# 59. Result Feedback

در صورت فعال بودن:

```text
عملکرد شما بسیار خوب بود.
```

Feedback باید از Assessment Engine یا Instructor Configuration بیاید.

---

# 60. Answer Review

اگر Policy اجازه دهد:

```text
سؤال 1
✓ پاسخ صحیح

سؤال 2
✕ پاسخ اشتباه
```

---

# 61. Correct Answer Visibility

نمایش Correct Answer باید Configuration داشته باشد:

```text
showCorrectAnswers: true
```

ممکن است:

```text
afterSubmit
afterGrading
never
```

باشد.

---

# 62. Explanation

در صورت فعال بودن:

```text
توضیح پاسخ

...
```

نمایش داده شود.

---

# 63. Attempt History

اگر چند Attempt مجاز باشد:

```text
تلاش 1    68٪
تلاش 2    82٪
تلاش 3    75٪
```

---

# 64. Best Attempt

در صورت وجود Policy:

```text
بهترین نتیجه: 82٪
```

اما انتخاب Best Attempt متعلق به Assessment Policy است.

---

# 65. Retry

اگر مجاز باشد:

```text
[ تلاش مجدد ]
```

---

# 66. Retry Rules

Quiz باید State را دریافت کند:

```js
{
    canRetry: true,
    remainingAttempts: 2
}
```

---

# 67. Attempts Exhausted

```text
تعداد تلاش‌های مجاز شما به پایان رسیده است.
```

---

# 68. Course Integration

Quiz می‌تواند به عنوان Item داخل Curriculum قرار بگیرد:

```text
فصل دوم
 ├── Lesson
 ├── Lesson
 └── 📝 آزمون فصل دوم
```

Curriculum فقط Quiz Item را نمایش می‌دهد.

---

# 69. LessonPlayer Integration

در LessonPlayer:

```text
Bottom Tabs
 ├── درس
 ├── فایل‌ها
 ├── تمرین
 └── آزمون
```

Quiz می‌تواند داخل Tab آزمون نمایش داده شود.

UI Guide نیز Tab آزمون را برای Lesson Player تعریف کرده است.

---

# 70. Full Page Variant

Quiz می‌تواند مستقل از LessonPlayer نیز اجرا شود:

```text
/course/...
      ↓
Quiz
```

---

# 71. Embedded Variant

در LessonPlayer:

```text
LessonPlayer
   ↓
Quiz
```

---

# 72. Quiz Card Variant

برای نمایش قبل از Start:

```text
QuizCard
 ├── Title
 ├── Question Count
 ├── Time
 ├── Passing Score
 └── Start
```

---

# 73. Quiz Runner Variant

بعد از Start:

```text
QuizRunner
 ├── Header
 ├── Timer
 ├── Navigator
 ├── Question
 └── Footer
```

---

# 74. Quiz Result Variant

بعد از Submit:

```text
QuizResult
 ├── Score
 ├── Status
 ├── Feedback
 ├── Review
 └── Retry
```

---

# 75. Mobile Layout

در Mobile:

```text
Header
 ↓
Timer
 ↓
Question
 ↓
Answer
 ↓
Navigation
```

Question Navigator می‌تواند Drawer یا Horizontal Scroll باشد.

---

# 76. Mobile Question Navigator

مثلاً:

```text
1 ✓  2 ✓  3 ●  4 ○  5 ○
```

با Horizontal Scroll.

---

# 77. Mobile Bottom Actions

می‌توان:

```text
[ قبلی ]      [ بعدی ]
```

را Sticky کرد.

---

# 78. Responsive Rules

Quiz نباید:

* Horizontal Overflow
* متن خیلی کوچک
* Buttonهای کوچک
* Timer خارج از View
* Answerهای فشرده

ایجاد کند.

---

# 79. RTL

Quiz باید RTL-native باشد.

اما:

* Code
* URLs
* Numeric expressions
* Mathematical notation

می‌توانند LTR باقی بمانند.

---

# 80. Accessibility

Quiz باید:

* Keyboard Accessible
* Screen Reader Compatible
* Focus Managed
* Semantic
* High Contrast

باشد.

---

# 81. Question Accessibility

Question باید Label واضح داشته باشد.

مثلاً:

```text
سؤال 3 از 10
```

---

# 82. Answer Accessibility

هر Answer باید Label قابل دسترس داشته باشد.

برای Radio:

```html
<label>
    <input type="radio">
    ...
</label>
```

---

# 83. Keyboard Navigation

حداقل:

```text
Tab
Shift + Tab
Space
Enter
Arrow Keys
```

برای کنترل‌های مناسب.

---

# 84. Focus Management

بعد از رفتن به سؤال بعد:

```text
Next
 ↓
Question Changed
 ↓
Focus → Question Heading
```

---

# 85. Loading State

هنگام دریافت Quiz:

```text
Quiz Skeleton
Question Skeleton
Answer Skeleton
```

از `Skeleton` استفاده شود.

---

# 86. Error State

```text
بارگذاری آزمون انجام نشد.

[ تلاش مجدد ]
```

---

# 87. Locked State

اگر دسترسی وجود نداشته باشد:

```text
🔒
این آزمون برای شما قابل دسترسی نیست.
```

---

# 88. Expired State

اگر Attempt منقضی شده:

```text
زمان آزمون به پایان رسیده است.
```

---

# 89. Empty State

اگر Quiz سؤال نداشته باشد:

```text
این آزمون هنوز سؤال ندارد.
```

برای Student نباید امکان Start وجود داشته باشد.

---

# 90. Dark Mode

Quiz باید از Design Tokens پروژه استفاده کند.

```text
surface
surface-elevated
text-primary
text-secondary
border
accent
success
warning
danger
```

---

# 91. Visual Style

طبق UI Guide:

* Modern SaaS
* RTL
* Rounded Cards
* Soft Shadows
* 16px Radius
* Purple/Blue Accent
* Component Based
* WordPress Friendly
* Modular Architecture

استفاده شود.

---

# 92. Micro Interactions

می‌توان برای:

* Answer Selection
* Question Change
* Submit
* Result
* Timer Warning

Transitionهای کوتاه استفاده کرد.

---

# 93. No Excessive Animation

Quiz محیط ارزیابی است.

Animation نباید:

* تمرکز را مختل کند
* Timer را مخفی کند
* تغییر Question را مبهم کند

---

# 94. Data Contract

View Model پیشنهادی:

```js
{
    id,
    title,
    description,
    questionCount,
    timeLimit,
    passingScore,
    attempts,
    status,
    questions,
    settings
}
```

---

# 95. Attempt Contract

```js
{
    id,
    quizId,
    startedAt,
    expiresAt,
    status,
    currentQuestionId,
    answers,
    remainingTime
}
```

---

# 96. Result Contract

```js
{
    attemptId,
    score,
    percentage,
    passed,
    graded,
    feedback,
    canRetry,
    remainingAttempts
}
```

---

# 97. Settings Contract

مثلاً:

```js
{
    shuffleQuestions,
    shuffleAnswers,
    showCorrectAnswers,
    allowReview,
    allowBackNavigation,
    autosave,
    showTimer
}
```

---

# 98. Shuffle

اگر سؤال‌ها Shuffle شوند:

```text
Question Order
```

باید از Server/Attempt دریافت شود.

Client نباید Order امنیتی آزمون را تعیین کند.

---

# 99. Answer Shuffle

همین اصل برای Answerها نیز برقرار است.

---

# 100. Randomization

Randomization باید قابل Reproduce یا Server Controlled باشد تا Attempt معتبر باقی بماند.

---

# 101. API Boundary

Quiz UI نباید مستقیماً:

```text
wpdb
WP_Query
get_post()
```

را اجرا کند.

معماری:

```text
Assessment API
      ↓
Quiz DTO
      ↓
Quiz UI
```

---

# 102. WordPress Architecture

```text
WordPress
    ↓
Iran LMS
    ↓
Assessment Module
    ├── Quiz Domain
    ├── Attempt
    ├── Question
    ├── Answer
    ├── Grading
    └── API
            ↓
         Quiz UI
```

---

# 103. Security Boundary

```text
Browser
   ↓
REST API
   ↓
Authentication
   ↓
Authorization
   ↓
Attempt Validation
   ↓
Assessment Engine
```

Quiz Component نباید Security Layer باشد.

---

# 104. Nonce

اگر WordPress REST/AJAX استفاده شود، درخواست‌ها باید مطابق Authentication/Security Architecture افزونه محافظت شوند.

Nonce تنها نباید جایگزین Authorization باشد.

---

# 105. Attempt Validation

Server باید بررسی کند:

* Attempt معتبر است؟
* متعلق به User است؟
* متعلق به Quiz است؟
* منقضی نشده؟
* Submit قبلاً انجام نشده؟
* تعداد Attempts مجاز است؟

---

# 106. Correct Answer Protection

Correct Answer نباید در API مربوط به Active Attempt ارسال شود مگر Policy مشخصاً آن را لازم بداند.

---

# 107. Grading Boundary

```text
Quiz UI
    ↓
Submit
    ↓
Assessment Engine
    ↓
Auto Grade / Manual Grade
```

---

# 108. Manual Grading

برای سؤال‌های تشریحی:

```text
Submitted
 ↓
Pending
 ↓
Instructor
 ↓
Grade
 ↓
Result
```

Quiz باید Pending State را پشتیبانی کند.

---

# 109. Result Pending

```text
آزمون شما ارسال شد.
بخشی از پاسخ‌ها نیاز به بررسی مدرس دارد.
```

---

# 110. Notifications

پس از Grading می‌توان Notification ایجاد کرد:

```text
آزمون شما بررسی شد.
نمره: 82٪
```

Notification متعلق به Communication Module است.

---

# 111. Certificate

اگر Quiz شرط Certificate باشد:

```text
Quiz Passed
 ↓
Course Progress
 ↓
Certificate Eligibility
```

Quiz خودش Certificate صادر نمی‌کند.

---

# 112. Gamification

در صورت فعال بودن:

```text
Quiz Passed
 ↓
Gamification Event
 ↓
XP / Achievement
```

Quiz فقط Event مناسب را منتشر می‌کند.

---

# 113. Analytics

Eventهایی مثل:

```text
quiz_started
question_answered
quiz_submitted
quiz_completed
quiz_passed
quiz_failed
```

می‌توانند برای Analytics منتشر شوند.

Analytics نباید داخل Component ذخیره شود.

---

# 114. Performance

برای آزمون‌های بزرگ:

* همه Mediaها Lazy Load شوند.
* Questionهای غیرضروری Render نشوند.
* Answerهای سنگین Lazy Load شوند.
* Autosave Debounce شود.
* Requestهای تکراری حذف شوند.

---

# 115. Large Quiz

برای آزمون 100+ سؤال:

```text
100 Questions
```

نباید الزاماً 100 Question DOM همزمان ساخته شود.

---

# 116. Question Navigation Performance

Navigator می‌تواند فقط Metadata سؤال‌ها را دریافت کند:

```js
{
    id,
    order,
    answered,
    marked
}
```

و محتوای کامل سؤال فعلی را جدا دریافت کند.

---

# 117. Course Builder Boundary

ساخت Quiz متعلق به Admin/Instructor Builder است.

مثلاً:

```text
QuizBuilder
QuestionEditor
AnswerEditor
```

اینها با Student Quiz UI متفاوت هستند.

---

# 118. Quiz vs QuizBuilder

```text
Quiz
   → Execute

QuizBuilder
   → Create
   → Edit
   → Reorder
   → Configure
```

---

# 119. Do

* Quiz را بخشی از Assessment Module نگه دار.
* Quiz Card و Quiz Runner را از هم جدا کن.
* Attempt را Entity مستقل در نظر بگیر.
* Timer را فقط UI بدان.
* زمان را Server-side اعتبارسنجی کن.
* Question Rendererها را Modular کن.
* Correct Answer را در Active Attempt افشا نکن.
* Autosave را پشتیبانی کن.
* Mobile و RTL را از ابتدا طراحی کن.
* Accessibility را رعایت کن.
* Quiz را با Curriculum و LessonPlayer یکپارچه کن.
* Result را از Assessment Engine دریافت کن.
* قابلیت Retry را Configuration-driven کن.

---

# 120. Don't

* Correct Answer را داخل Frontend ارسال نکن.
* Score را داخل JavaScript محاسبه نکن.
* Passing Status را از Client قبول نکن.
* Timer مرورگر را مرجع امنیت قرار نده.
* Attempt را فقط در LocalStorage نگه ندار.
* Database Query داخل Component نداشته باش.
* QuizBuilder را با Quiz یکی نکن.
* Quiz را به WooCommerce وابسته نکن.
* Quiz را به Theme وابسته نکن.
* تمام Questionها را بدون نیاز Render نکن.
* سؤال‌های Assessment را با Lesson Entity یکی نکن.

---

# 121. Testing Requirements

## Quiz Intro

```text
Question Count
Time
Passing Score
Start
```

## Question Types

```text
Single Choice
Multiple Choice
True/False
Short Answer
Long Answer
```

## Navigation

```text
First
Middle
Last
Previous
Next
Navigator
```

## Timer

```text
Normal
Warning
Expired
```

## Attempts

```text
First Attempt
Retry
Attempts Exhausted
```

## Submission

```text
Confirmation
Unanswered Warning
Submit
Network Failure
```

## Results

```text
Passed
Failed
Pending
Retry
Review
```

## Access

```text
Locked
Available
Expired
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## Accessibility

```text
Keyboard
Screen Reader
Focus
ARIA
RTL
```

---

# 122. Final Architecture

```text
                         Assessment Module
                                │
             ┌──────────────────┼──────────────────┐
             ↓                  ↓                  ↓
           Quiz             Attempt            Question
             │                  │                  │
             ↓                  ↓                  ↓
        Quiz View          Attempt State       Question DTO
             │
     ┌───────┼────────┐
     ↓       ↓        ↓
   Intro   Runner   Result
             │
      ┌──────┼───────┐
      ↓      ↓       ↓
   Timer  Navigator  Renderer
                       │
             ┌─────────┼──────────┐
             ↓         ↓          ↓
         Single      Multiple    Text
         Choice      Choice      Answer
```

---

# 123. Final Responsibility Map

```text
Assessment Domain
    → Quiz Definition
    → Question Definition
    → Attempt
    → Grading
    → Assessment Rules

Assessment API
    → Quiz Data
    → Attempt Data
    → Submission
    → Result

Quiz UI
    → Intro
    → Question Display
    → Answer Interaction
    → Navigation
    → Timer Display
    → Submit Flow
    → Result Display

Curriculum
    → Quiz Item Navigation

LessonPlayer
    → Quiz Placement / Tab

Certificate
    → Eligibility

Gamification
    → XP / Achievements

Notifications
    → Result Notifications

Analytics
    → Quiz Events
```

---

# 124. Final Principle

`Quiz` در Iran LMS باید یک **Assessment Experience** باشد، نه یک فرم ساده.

معماری نهایی:

```text
Quiz Definition
      ↓
Assessment Engine
      ↓
Attempt
      ↓
Quiz UI
      ↓
Submission
      ↓
Grading
      ↓
Result
```

و مهم‌تر از همه:

```text
Quiz UI
   ≠
Assessment Engine
```

UI فقط تجربه آزمون را ارائه می‌کند؛ تمام منطق حساس مانند Attempt، زمان معتبر، پاسخ صحیح، نمره، قبولی و محدودیت تلاش‌ها باید در Backend و Assessment Module کنترل شود.

این تفکیک باعث می‌شود Quiz فعلی هم برای LessonPlayer و هم برای Dashboard قابل استفاده باشد و در آینده بتوان همان Assessment API را برای اپلیکیشن موبایل Iran LMS نیز استفاده کرد.
