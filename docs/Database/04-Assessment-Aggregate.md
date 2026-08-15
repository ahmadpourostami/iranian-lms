# 04-Assessment-Aggregate.md

# Assessment Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Assessment Aggregate is responsible for evaluating student learning.

It provides a unified architecture for all assessment types, including quizzes, assignments, practical exams, coding challenges, surveys, and future assessment methods.

The aggregate measures learning outcomes but does not determine course access or certification directly.

---

# 2. Responsibilities

The Assessment Aggregate is responsible for:

* Quiz Management
* Assignment Management
* Student Attempts
* Submission Workflow
* Auto Grading
* Manual Review
* Assessment Results
* Passing Rules
* Assessment History
* Assessment Analytics

---

# 3. Aggregate Root

```text
Assessment
```

Every assessment belongs to exactly one lesson or course.

---

# 4. Entities

```text
Assessment

AssessmentQuestion

AssessmentOption

AssessmentAttempt

AssessmentAnswer

AssessmentSubmission

AssessmentReview

AssessmentResult

AssessmentFeedback

AssessmentAttachment
```

---

# 5. Relationships

```text
Course

│

Lesson

│

Assessment

│

├── Questions

├── Attempts

├── Results

├── Reviews

└── Feedback
```

---

# 6. Assessment Types

Supported types:

* Quiz
* Assignment
* Coding Challenge
* Essay
* Practical Task
* Survey
* Oral Exam (Future)
* Interactive Assessment (Future)

Every assessment follows the same lifecycle.

---

# 7. Lifecycle

```text
Draft

↓

Published

↓

Available

↓

In Progress

↓

Submitted

↓

Reviewed

↓

Completed

↓

Archived
```

---

# 8. Database Tables

```text
ilms_assessments

ilms_assessment_questions

ilms_assessment_options

ilms_assessment_attempts

ilms_assessment_answers

ilms_assessment_submissions

ilms_assessment_reviews

ilms_assessment_results

ilms_assessment_feedback

ilms_assessment_attachments
```

---

# 9. Assessment Entity

Core fields:

```text
ID

UUID

Course ID

Lesson ID

Type

Title

Description

Passing Score

Maximum Score

Time Limit

Attempts Limit

Shuffle Questions

Shuffle Answers

Status

Created At

Updated At
```

---

# 10. Attempt Rules

Supported rules:

* Unlimited Attempts
* Fixed Attempts
* Timed Attempt
* Scheduled Attempt
* Manual Start
* Automatic Submission

Each assessment defines its own rules.

---

# 11. Grading

Supported grading methods:

* Automatic
* Manual
* Hybrid

Future support:

* AI-assisted Review
* Peer Review

---

# 12. Business Rules

Examples:

A student cannot start an unavailable assessment.

Expired assessments cannot receive submissions.

Attempt limits must be enforced.

Scores cannot exceed the maximum score.

Assignments requiring review remain in a pending state until evaluated.

---

# 13. Events

```text
AssessmentCreated

AssessmentPublished

AssessmentStarted

AssessmentSubmitted

AssessmentReviewed

AssessmentPassed

AssessmentFailed

AttemptCreated

AttemptCompleted

FeedbackAdded
```

Other aggregates consume these events.

---

# 14. API Ownership

```text
GET /assessments

GET /assessments/{id}

POST /assessments/{id}/start

POST /assessments/{id}/submit

POST /assessments/{id}/review

GET /students/{id}/results
```

---

# 15. Permissions

Permissions include:

* Create Assessment
* Edit Assessment
* Delete Assessment
* Review Submission
* View Results
* Override Grade
* Manage Attempts

---

# 16. Performance Strategy

Assessment operations should:

* Save answers incrementally.
* Auto-save long submissions.
* Cache assessment definitions.
* Load questions lazily.
* Process grading asynchronously where possible.

---

# 17. Mobile Considerations

Supported capabilities:

* Timed assessments
* Auto-save
* Resume interrupted attempts
* Offline draft submissions (Future)
* Touch-friendly question navigation

---

# 18. Integration Points

The Assessment Aggregate integrates with:

* Course Aggregate
* Learning Aggregate
* Enrollment Aggregate
* Certificate Aggregate
* Communication Aggregate
* Gamification Aggregate

Assessment results should never modify other modules directly. All communication occurs through events or services.

---

# 19. Future Expansion

Future assessment capabilities:

* AI-generated questions
* Question Bank
* Random Question Pools
* Adaptive Exams
* Coding Sandbox
* File Comparison
* Plagiarism Detection
* Webcam Proctoring
* Secure Browser
* AI-assisted Feedback

---

# 20. Design Principles

The Assessment Aggregate must remain:

* Independent
* Secure
* Extensible
* Event-driven
* API-first
* Fair
* Auditable

Every assessment must be reproducible, traceable, and reviewable.
