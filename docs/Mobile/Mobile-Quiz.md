# Mobile-Quiz.md

**Path:** `07-Mobile/Mobile-Quiz.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Scope:** Mobile Quiz Experience
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد طراحی و رفتار **Quiz در موبایل** را برای افزونه WordPress **Iran LMS** تعریف می‌کند.

Quiz یک زیرمجموعه تخصصی از Assessment است:

```text
Assessment
└── Quiz
```

بنابراین Quiz نباید منطق مستقل و جدا از Assessment Domain داشته باشد؛ بلکه باید از قوانین مشترک Assessment استفاده کند و فقط تجربه و قابلیت‌های اختصاصی Quiz را ارائه دهد.

---

# 2. Scope

این فایل موارد زیر را پوشش می‌دهد:

```text
Quiz Introduction
Quiz Rules
Question Navigation
Question Types
Answering
Timer
Auto Save
Mark for Review
Review
Submit
Result
Retry
Feedback
Mobile UX
Accessibility
RTL
WordPress Plugin Integration
```

---

# 3. Plugin Boundary

Quiz بخشی از افزونه Iran LMS است:

```text
WordPress
   ↓
Iran LMS Plugin
   ↓
Assessment Module
   ↓
Quiz
   ↓
Mobile Quiz UI
```

Quiz UI نباید به Theme خاصی وابسته باشد.

---

# 4. Relationship With Assessment

ساختار مفهومی:

```text
Assessment
│
├── Quiz
├── Exam
├── Practice
└── Other Assessment Types
```

موارد مشترک:

```text
Attempt
Timer
Question
Answer
Submission
Grade
Result
Retry Policy
```

باید از زیرساخت Assessment استفاده کنند.

---

# 5. Quiz Entry Points

کاربر ممکن است Quiz را از این مسیرها باز کند:

```text
Course
  ↓
Lesson
  ↓
Quiz

یا

Dashboard
  ↓
Assessments
  ↓
Quiz

یا

Course Curriculum
  ↓
Quiz
```

UI باید Context فعلی را حفظ کند.

---

# 6. Quiz States

Quiz می‌تواند:

```text
Locked
Available
Not Started
In Progress
Submitted
Passed
Failed
Expired
```

باشد.

---

# 7. Quiz Intro Screen

صفحه شروع:

```text
┌─────────────────────────────┐
│ ← آزمون                     │
├─────────────────────────────┤
│ آزمون فصل اول               │
│                             │
│ ۱۰ سؤال                     │
│ ۱۵ دقیقه                    │
│ حداقل نمره: ۷۰٪             │
│                             │
│ تلاش مجاز: ۲ بار            │
│                             │
│ [ شروع آزمون ]              │
└─────────────────────────────┘
```

---

# 8. Quiz Information

حداقل اطلاعات:

```text
Title
Question Count
Duration
Passing Score
Attempts
```

در صورت وجود:

```text
Start Date
End Date
Randomization
Negative Marking
```

نیز نمایش داده شوند.

---

# 9. Quiz Instructions

اگر Quiz دارای قوانین است:

```text
قوانین آزمون

• زمان آزمون ۱۵ دقیقه است.
• پس از ارسال امکان ویرایش وجود ندارد.
• حداقل نمره قبولی ۷۰٪ است.
```

قوانین باید قبل از Start قابل مشاهده باشند.

---

# 10. Start Quiz

CTA:

```text
[ شروع آزمون ]
```

پس از Start:

```text
Not Started
↓
In Progress
```

تغییر State باید توسط Quiz/Assessment Domain انجام شود.

---

# 11. Quiz Header

در زمان انجام:

```text
← آزمون فصل اول       ⏱ 12:45
```

Header باید Minimal باشد.

---

# 12. Exit Quiz

اگر کاربر Back بزند:

```text
خروج از آزمون؟

پاسخ‌های شما ذخیره شده‌اند.
می‌توانید بعداً ادامه دهید.

[ ادامه آزمون ]
[ خروج ]
```

رفتار واقعی بر اساس Attempt Policy تعیین می‌شود.

---

# 13. Timer

Timer باید واضح باشد:

```text
⏱ 12:45
```

در Quiz زمان‌دار:

```text
Timer
↓
Warning
↓
Critical
↓
Expired
```

---

# 14. Timer Warning

مثلاً در ۵ دقیقه آخر:

```text
⏱ 05:00
```

Feedback باید علاوه بر رنگ شامل متن/آیکون باشد.

---

# 15. Timer Expiration

اگر Policy اجازه دهد:

```text
00:00
↓
Auto Submit
```

در غیر این صورت:

```text
Quiz Expired
```

نمایش داده شود.

---

# 16. Question Counter

نمایش:

```text
سؤال ۴ از ۱۰
```

در بالای Question.

---

# 17. Progress Bar

```text
████████░░
```

Progress می‌تواند بر اساس تعداد سؤال پاسخ داده‌شده باشد.

اما:

```text
Question Progress
≠
Learning Progress
```

است.

---

# 18. Question Navigator

برای Quiz کوتاه:

```text
سؤال ۴ از ۱۰
```

کافی است.

برای Quiz طولانی:

```text
سؤالات
✓ ۱
✓ ۲
● ۳
○ ۴
🔖 ۵
...
```

داخل Bottom Sheet نمایش داده شود.

---

# 19. Question Status

```text
Answered
Unanswered
Current
Marked
Skipped
```

هر State باید قابل تشخیص باشد.

---

# 20. Mark for Review

کاربر می‌تواند Question را علامت‌گذاری کند:

```text
🔖 برای مرور
```

State:

```text
🔖 علامت‌گذاری شد
```

این State نباید به معنی Answered باشد.

---

# 21. Question Structure

```text
Question Number
Question Text
Media
Answer Input
Question Actions
```

مثال:

```text
سؤال ۴

کدام گزینه صحیح است؟

○ React
○ Vue
○ Angular
○ Svelte

🔖 علامت‌گذاری برای مرور
```

---

# 22. Single Choice

```text
○ گزینه اول
○ گزینه دوم
○ گزینه سوم
○ گزینه چهارم
```

با انتخاب یک گزینه، انتخاب قبلی حذف می‌شود.

---

# 23. Multiple Choice

```text
☐ React
☐ Vue
☐ Angular
☐ Svelte
```

کاربر می‌تواند چند گزینه انتخاب کند.

در صورت وجود:

```text
حداقل ۲ گزینه را انتخاب کنید.
```

نمایش داده شود.

---

# 24. True / False

```text
○ درست
○ نادرست
```

---

# 25. Short Answer

```text
┌──────────────────────────┐
│ پاسخ خود را وارد کنید... │
└──────────────────────────┘
```

---

# 26. Long Answer

برای پاسخ تشریحی:

```text
┌──────────────────────────┐
│ پاسخ خود را بنویسید...   │
│                          │
│                          │
└──────────────────────────┘
```

---

# 27. Question Media

Question می‌تواند شامل:

```text
Image
Audio
Video
Code
Diagram
```

باشد.

Media باید قبل از Answer و با Hierarchy مشخص نمایش داده شود.

---

# 28. Image Question

Image باید:

```text
Responsive
Zoomable
Accessible
```

باشد.

اگر Image برای Answer ضروری است، نباید Lazy Loading باعث تأخیر آزاردهنده شود.

---

# 29. Audio Question

Audio Player:

```text
▶ ─────── 02:34
```

حداقل:

```text
Play
Pause
Progress
Duration
```

را داشته باشد.

---

# 30. Video Question

Video باید:

```text
Responsive
Touch Friendly
Caption Ready
```

باشد.

---

# 31. Code Question

برای Quizهای برنامه‌نویسی:

```text
const user = ...
```

باید:

```text
Horizontal Scroll
Copy
Readable Typography
```

پشتیبانی شود.

---

# 32. Ordering Question

برای مرتب‌سازی:

```text
☰ نصب Node.js
☰ ایجاد پروژه
☰ اجرای پروژه
```

Touch Drag می‌تواند استفاده شود.

Fallback:

```text
↑
↓
```

باید در نظر گرفته شود.

---

# 33. Matching Question

برای Mobile بهتر است از Select استفاده شود:

```text
React
[ انتخاب پاسخ ▼ ]

Vue
[ انتخاب پاسخ ▼ ]
```

به جای Drag پیچیده.

---

# 34. Answer Auto Save

در صورت فعال بودن:

```text
پاسخ ذخیره شد ✓
```

نمایش داده شود.

Save نباید UI را متوقف کند.

---

# 35. Save Failure

```text
پاسخ ذخیره نشد.

[ تلاش دوباره ]
```

پاسخ محلی باید تا حد امکان حفظ شود.

---

# 36. Offline / Poor Network

اگر اتصال قطع شود:

```text
اتصال قطع شد

پاسخ‌های شما روی دستگاه حفظ شده‌اند.
```

اما نباید ادعا شود که پاسخ روی Server ذخیره شده است.

پس از اتصال:

```text
Syncing...
↓
Synced ✓
```

---

# 37. Navigation Actions

پایین Quiz:

```text
[ قبلی ]       [ بعدی ]
```

در اولین سؤال:

```text
قبلی = Disabled
```

---

# 38. Last Question

در آخرین سؤال:

```text
[ مرور پاسخ‌ها ]
```

به جای Next نمایش داده شود.

---

# 39. Review Screen

ساختار:

```text
مرور آزمون

۱۰ سؤال
۸ پاسخ داده شده
۲ بدون پاسخ
۱ علامت‌گذاری شده
```

سپس:

```text
۱ ✓
۲ ✓
۳ ○
۴ 🔖
۵ ✓
```

---

# 40. Review Navigation

Tap روی Question باید کاربر را مستقیماً به همان Question ببرد.

---

# 41. Unanswered Questions

اگر پاسخ خالی باشد:

```text
⚠ بدون پاسخ
```

نمایش داده شود.

---

# 42. Submit Warning

اگر سؤال بدون پاسخ وجود دارد:

```text
۲ سؤال بدون پاسخ دارید.

آیا می‌خواهید آزمون را ارسال کنید؟
```

Actions:

```text
[ بازگشت ]
[ ارسال ]
```

---

# 43. Final Submit

Confirmation:

```text
ارسال آزمون

بعد از ارسال، امکان تغییر پاسخ‌ها وجود ندارد.

[ لغو ]
[ ارسال آزمون ]
```

---

# 44. Submit Loading

```text
در حال ارسال آزمون...
```

در این State:

```text
Submit = Disabled
```

و از Double Submit جلوگیری شود.

---

# 45. Submit Success

```text
✓ آزمون با موفقیت ارسال شد.
```

سپس:

```text
[ مشاهده نتیجه ]
```

---

# 46. Quiz Result

اگر Auto Grading فعال باشد:

```text
آزمون فصل اول

85٪

17 پاسخ صحیح
3 پاسخ غلط

✓ قبول شدید
```

---

# 47. Pending Result

اگر نیاز به بررسی دستی باشد:

```text
پاسخ‌های شما ثبت شد.

نتیجه پس از بررسی مدرس منتشر خواهد شد.
```

---

# 48. Passed

```text
🎉 تبریک!

نمره شما:
85٪

حداقل نمره:
70٪

[ ادامه دوره ]
```

---

# 49. Failed

```text
این بار موفق نشدید.

نمره:
52٪

حداقل نمره:
70٪

[ مشاهده پاسخ‌ها ]
[ تلاش مجدد ]
```

---

# 50. Retry

Retry فقط در صورت:

```text
canRetry = true
```

نمایش داده شود.

UI نباید خودش Attempt Count را محاسبه کند.

---

# 51. Attempts

مثلاً:

```text
تلاش:
2 از 3
```

و اگر تمام شده:

```text
تمام تلاش‌های مجاز استفاده شده است.
```

---

# 52. Randomized Questions

اگر Quiz Randomization فعال باشد:

```text
سؤالات به‌صورت تصادفی نمایش داده می‌شوند.
```

UI نباید فرض کند Question ID ترتیب ثابتی دارد.

---

# 53. Randomized Options

اگر گزینه‌ها Randomized باشند، ترتیب نمایش صرفاً Presentation Order است.

---

# 54. Negative Marking

اگر فعال باشد:

```text
نمره منفی:
دارد
```

قبل از Start اطلاع داده شود.

بعد از Quiz می‌توان نمایش داد:

```text
نمره خام
کسر نمره
نمره نهایی
```

---

# 55. Quiz Feedback

Feedback می‌تواند:

```text
Correct
Incorrect
Explanation
```

باشد.

اما Feedback فوری فقط اگر Quiz Policy اجازه دهد.

---

# 56. Immediate Feedback

در Practice Quiz:

```text
✓ پاسخ صحیح است.
```

می‌تواند بلافاصله بعد از Answer نمایش داده شود.

---

# 57. Delayed Feedback

در Exam:

```text
Answer
↓
No Feedback
↓
Submit
↓
Result
```

---

# 58. Quiz Review Policy

Policy باید مشخص کند آیا کاربر می‌تواند:

```text
View Correct Answers
View Explanation
View Own Answers
Review Question
```

را انجام دهد یا خیر.

---

# 59. Lesson Integration

اگر Quiz داخل Lesson باشد:

```text
Lesson
↓
Quiz
↓
Result
↓
Lesson Completion
```

Completion Lesson باید طبق Completion Rule عمل کند.

مثلاً:

```text
Quiz Passed
↓
Lesson Completed
```

اما این تصمیم متعلق به Learning Domain است.

---

# 60. Course Progress

Quiz می‌تواند روی Course Progress اثر بگذارد.

اما:

```text
Quiz UI
≠
Course Progress Calculator
```

Progress باید توسط Learning Domain محاسبه شود.

---

# 61. Certificate Integration

اگر Quiz شرط Certificate باشد:

```text
Quiz Passed
↓
Course Requirements
↓
Certificate Eligibility
```

Quiz UI نباید Certificate را مستقیماً صادر کند.

---

# 62. Gamification

در صورت فعال بودن:

```text
+20 XP
🏆 Quiz Completed
```

می‌تواند بعد از Result نمایش داده شود.

---

# 63. Notification

Result Notification توسط Notification Module مدیریت شود.

مثلاً:

```text
نتیجه آزمون شما منتشر شد.
```

---

# 64. Mobile Sticky Actions

Actions اصلی می‌توانند Sticky باشند:

```text
┌─────────────────────────────┐
│ [ قبلی ]          [ بعدی ]  │
└─────────────────────────────┘
```

اما نباید Question Content را بپوشانند.

---

# 65. Safe Area

Sticky Footer باید Safe Area موبایل را در نظر بگیرد.

---

# 66. Keyboard

هنگام پاسخ Text:

```text
Keyboard
↓
Scroll Question
↓
Input Visible
```

باید حفظ شود.

Sticky Actions نباید Input را بپوشانند.

---

# 67. Orientation

Portrait حالت اصلی است.

Landscape می‌تواند برای:

```text
Code
Video
Large Diagram
```

فعال باشد.

---

# 68. Dark Mode

Quiz باید در Dark Mode کامل کار کند:

```text
Header
Question
Options
Timer
Progress
Review
Result
```

---

# 69. RTL

UI به صورت RTL است.

اما:

```text
Code
URL
Email
Programming Syntax
```

می‌توانند LTR باشند.

---

# 70. Accessibility

Quiz باید:

```text
☐ Keyboard Navigation
☐ Screen Reader
☐ Focus Management
☐ Accessible Timer
☐ Accessible Radio
☐ Accessible Checkbox
☐ Visible Focus
☐ Contrast
```

را رعایت کند.

---

# 71. Radio Accessibility

برای Single Choice از Semantic Radio استفاده شود.

```text
<label>
  <input type="radio">
  گزینه
</label>
```

نه صرفاً یک `div` قابل کلیک.

---

# 72. Checkbox Accessibility

Multiple Choice باید Semantic Checkbox داشته باشد.

---

# 73. Focus After Navigation

بعد از رفتن به سؤال بعد:

```text
Next
↓
Question Heading Focus
```

شود.

---

# 74. Timer Accessibility

Timer باید برای Screen Reader قابل فهم باشد، اما نباید دائماً Announce شود و تجربه کاربر را مختل کند.

در وضعیت Critical:

```text
۵ دقیقه باقی مانده
```

می‌تواند Announcement شود.

---

# 75. Loading State

Loading برای:

```text
Quiz
Question
Save
Submit
Result
```

جدا باشد.

---

# 76. Skeleton

```text
████████████████
████████████

○ ███████████
○ █████████████
○ ████████

████████
```

---

# 77. Empty State

اگر Quiz وجود نداشته باشد:

```text
آزمونی برای این درس تعریف نشده است.
```

---

# 78. Locked State

```text
🔒 این آزمون هنوز در دسترس نیست.

ابتدا درس‌های قبلی را تکمیل کنید.
```

---

# 79. Expired State

```text
این آزمون منقضی شده است.
```

در صورت امکان:

```text
[ مشاهده نتیجه ]
```

---

# 80. Error States

Quiz باید خطاهای زیر را مدیریت کند:

```text
Quiz Load Error
Question Load Error
Answer Save Error
Network Error
Submit Error
Attempt Error
Permission Error
```

---

# 81. Security

Quiz یکی از بخش‌های حساس افزونه است.

Frontend نباید در حالت عادی اطلاعاتی مانند:

```text
Correct Answer
Answer Key
Private Question Data
```

را دریافت کند مگر اینکه Policy اجازه دهد.

---

# 82. Authorization

دسترسی:

```text
User
+
Enrollment
+
Quiz Permission
+
Attempt Policy
```

بررسی شود.

---

# 83. Attempt Integrity

هر Answer باید به Attempt مربوط باشد.

```text
User
 ↓
Enrollment
 ↓
Quiz
 ↓
Attempt
 ↓
Question
 ↓
Answer
```

---

# 84. View Model

نمونه:

```text
QuizViewModel
├── id
├── title
├── description
├── questionCount
├── duration
├── passingScore
├── attemptsAllowed
├── attemptsUsed
├── canStart
├── canRetry
├── randomizeQuestions
├── randomizeOptions
├── negativeMarking
└── currentAttempt
```

---

# 85. Attempt View Model

```text
QuizAttemptViewModel
├── id
├── status
├── startedAt
├── expiresAt
├── remainingTime
├── currentQuestion
├── answeredCount
├── markedCount
├── totalQuestions
└── canSubmit
```

---

# 86. Question View Model

```text
QuizQuestionViewModel
├── id
├── number
├── type
├── content
├── media
├── options
├── selectedAnswer
├── status
├── marked
└── explanation
```

---

# 87. Business Logic Boundary

UI نباید خودش محاسبه کند:

```text
Passing Score
Retry
Attempt Count
Timer Expiration
Correctness
Grade
Eligibility
```

این موارد باید از:

```text
Assessment Domain
Quiz Service
Attempt Service
Grading Service
```

بیایند.

---

# 88. WordPress Architecture

پیشنهاد:

```text
WordPress
   ↓
Iran LMS
   ↓
Assessment Module
   ↓
Quiz Application Service
   ↓
Quiz View Model
   ↓
Mobile Quiz UI
```

---

# 89. No Direct Database Access

Componentهایی مثل:

```text
QuizQuestion
AnswerOption
QuizTimer
QuizResult
```

نباید مستقیماً Query دیتابیس اجرا کنند.

---

# 90. REST/API

در صورت استفاده از API:

```text
Mobile Quiz UI
      ↓
REST API
      ↓
Quiz Application Layer
      ↓
Domain
      ↓
Repository
```

---

# 91. Theme Independence

Quiz باید حتی با تغییر Theme همچنان کار کند.

برای CSS می‌توان Namespace اختصاصی داشت:

```text
.iran-lms-quiz
.iran-lms-quiz__header
.iran-lms-quiz__question
.iran-lms-quiz__option
.iran-lms-quiz__actions
```

---

# 92. Performance

برای Quizهای بزرگ:

```text
☐ Minimize API Calls
☐ Debounce Autosave
☐ Cache Static Question Content
☐ Avoid Heavy Animations
☐ Preserve Attempt State
```

---

# 93. Data Recovery

اگر App/Browser بسته شد:

```text
Open Quiz
↓
Existing Attempt
↓
Continue Quiz
```

در صورت اجازه Attempt Policy.

---

# 94. Interrupted Quiz

اگر کاربر دوباره وارد شود:

```text
یک آزمون ناتمام دارید.

زمان باقی‌مانده:
08:24

[ ادامه آزمون ]
```

---

# 95. Multiple Active Attempts

اگر سیستم اجازه یک Attempt همزمان را می‌دهد، UI نباید Attempt جدید ایجاد کند.

```text
Existing Attempt
↓
Continue
```

---

# 96. Confirmation Philosophy

Confirmation فقط برای Actionهای خطرناک:

```text
Exit
Submit
Delete / Reset
```

استفاده شود.

برای Next Question نباید Confirmation وجود داشته باشد.

---

# 97. Animation

Animation باید Minimal باشد.

مناسب:

```text
Progress Change
Answer Selection
Toast
Result Reveal
```

نامناسب:

```text
Full Screen Transitions
Heavy Question Animations
```

---

# 98. Component Architecture

```text
MobileQuiz
│
├── QuizHeader
├── QuizIntro
├── QuizTimer
├── QuizProgress
├── QuizQuestionNavigator
│
├── QuizQuestion
│   ├── QuestionContent
│   ├── QuestionMedia
│   └── AnswerControl
│
├── QuestionActions
├── QuizNavigation
├── QuizReview
├── QuizSubmitDialog
└── QuizResult
```

---

# 99. Definition of Done

```text
☐ Quiz Intro
☐ Quiz Rules
☐ Start Flow
☐ Timer
☐ Question Counter
☐ Progress
☐ Question Navigator
☐ Mark for Review
☐ Single Choice
☐ Multiple Choice
☐ True/False
☐ Short Answer
☐ Long Answer
☐ Matching
☐ Ordering
☐ Image
☐ Audio
☐ Video
☐ Code Question
☐ Auto Save
☐ Save Error
☐ Offline/Network Handling
☐ Review Screen
☐ Submit Confirmation
☐ Result
☐ Passed
☐ Failed
☐ Pending
☐ Retry
☐ Attempt Handling
☐ RTL
☐ Dark Mode
☐ Accessibility
☐ Safe Area
☐ Keyboard Handling
☐ Loading
☐ Error
☐ Empty
☐ Locked
☐ Expired
☐ Security
☐ Theme Independence
☐ WordPress Plugin Boundary
☐ Domain Logic خارج از UI
```

---

# 100. Final Principle

تجربه Mobile Quiz در Iran LMS باید:

```text
Start
  ↓
Understand
  ↓
Answer
  ↓
Save
  ↓
Review
  ↓
Submit
  ↓
Grade
  ↓
Learn
```

باشد.

اصل نهایی:

> **Quiz در Iran LMS یک تجربه تخصصی روی زیرساخت Assessment است؛ Mobile UI باید سریع، واضح و مقاوم در برابر خطا باشد، در حالی که Attempt، Grading، Retry، Timer، Security و تمام قوانین Quiz در لایه‌های داخلی افزونه WordPress مدیریت می‌شوند.**
