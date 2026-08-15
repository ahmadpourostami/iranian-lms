# 05-Assessment-API.md

# Assessment API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Assessment API manages all learner assessment activities.

It provides endpoints for quizzes, assignments, submissions, grading, attempts, feedback, and assessment results.

Assessment is responsible for evaluating learner performance.

Learning content remains the responsibility of the Learning Aggregate.

---

# 2. Base Endpoint

```text id="x3c4kp"
/api/v1/assessments
```

---

# 3. Resources

The Assessment API manages:

* Quizzes
* Questions
* Quiz Attempts
* Assignments
* Assignment Submissions
* Manual Reviews
* Automatic Grading
* Assessment Results
* Instructor Feedback

---

# 4. Authentication

All endpoints require authentication.

```text id="hf89uq"
Bearer Token
```

---

# 5. Permissions

Examples

```text id="0mpz2e"
assessment.view

assessment.start

assessment.submit

assessment.review

assessment.grade

assessment.manage
```

---

# 6. Endpoints

## List Assessments

```http id="7trg5r"
GET /assessments
```

Returns available assessments for the authenticated learner.

Supports filtering by:

* Course
* Lesson
* Type
* Status

---

## Get Assessment

```http id="ls69ud"
GET /assessments/{uuid}
```

Returns assessment details.

---

## Start Quiz

```http id="rbgzjy"
POST /assessments/quizzes/{uuid}/start
```

Creates a new quiz attempt.

Event

```text id="dlmk3w"
QuizStarted
```

---

## Submit Quiz

```http id="i3abca"
POST /assessments/quizzes/{uuid}/submit
```

Example Request

```json id="6i6mln"
{
  "attempt_uuid": "...",
  "answers": [
    {
      "question_uuid": "...",
      "answer": "..."
    }
  ]
}
```

Event

```text id="yptn6t"
QuizSubmitted
```

---

## Get Quiz Result

```http id="3m3pxw"
GET /assessments/quizzes/{uuid}/results/{attempt_uuid}
```

Returns:

* Score
* Correct Answers
* Wrong Answers
* Passing Status
* Feedback

---

## Assignment Details

```http id="bte98u"
GET /assessments/assignments/{uuid}
```

Returns assignment information.

---

## Submit Assignment

```http id="tqsyf0"
POST /assessments/assignments/{uuid}/submit
```

Supports:

* Text Submission
* File Upload
* External URL

Example Request

```json id="n9ll7x"
{
  "text": "...",
  "attachments": []
}
```

Event

```text id="3ly90z"
AssignmentSubmitted
```

---

## Update Assignment Submission

```http id="mttb1k"
PUT /assessments/submissions/{uuid}
```

Allowed only before the submission deadline unless configured otherwise.

---

## Review Assignment

```http id="8r5d3k"
POST /assessments/submissions/{uuid}/review
```

Instructor submits:

* Grade
* Feedback
* Status

Event

```text id="qtnhho"
AssignmentReviewed
```

---

## Get Submission

```http id="ab9dja"
GET /assessments/submissions/{uuid}
```

Returns learner submission details.

---

## My Results

```http id="u3ptio"
GET /assessments/results
```

Returns all assessment results for the authenticated learner.

---

# 7. Filtering

Supported filters

```text id="b3vvzm"
course

lesson

type

status

passed

graded

review_required
```

---

# 8. Sorting

Supported

```text id="hfvg4i"
created_at

submitted_at

score

deadline
```

---

# 9. Business Rules

Examples

Quiz attempts must respect the configured attempt limit.

Assignments cannot be submitted after the deadline unless late submission is enabled.

Automatic grading applies immediately where supported.

Manual grading requires instructor review.

Results become visible according to assessment settings.

Learners may only access their own submissions.

---

# 10. Events

```text id="n7qej2"
QuizStarted

QuizSubmitted

QuizGraded

AssignmentSubmitted

AssignmentUpdated

AssignmentReviewed

AssessmentPassed

AssessmentFailed

AssessmentCompleted
```

---

# 11. Error Codes

Examples

```text id="r5tpy9"
ASSESSMENT_NOT_FOUND

QUIZ_ATTEMPT_LIMIT_REACHED

SUBMISSION_CLOSED

ASSESSMENT_ALREADY_SUBMITTED

GRADE_NOT_AVAILABLE

ASSESSMENT_ACCESS_DENIED
```

---

# 12. Performance Notes

The Assessment API should:

* Autosave quiz progress.
* Queue grading operations when appropriate.
* Cache assessment metadata.
* Optimize large question sets.
* Prevent duplicate submissions.
* Support resumable attempts.

Assessment processing should remain reliable under high concurrency.

---

# 13. Mobile Considerations

Mobile applications should support:

* Offline answer drafting (where applicable)
* Automatic submission retry
* Background upload for assignment files
* Timed quizzes
* Progress recovery after connectivity loss

The assessment experience should remain consistent across devices.

---

# 14. Future Expansion

The Assessment API is designed to support:

* Question Bank
* Randomized Question Pools
* Coding Assessments
* Peer Review
* Oral Examinations
* AI-assisted Grading
* Plagiarism Detection
* Rubric-based Evaluation
* Proctored Exams
* External Assessment Providers

These capabilities should integrate without requiring breaking API changes.
