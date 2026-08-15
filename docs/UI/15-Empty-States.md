# Empty States

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Empty State System used throughout the Iran LMS platform.

Empty States guide users when no data is available, helping them understand the situation and encouraging the next meaningful action.

An empty screen should never feel like an error.

---

# 2. Goals

The Empty State System should be:

* Informative
* Encouraging
* Action-Oriented
* Accessible
* Consistent
* Context-Aware

Every empty state should reduce uncertainty.

---

# 3. Design Philosophy

An Empty State is an opportunity to educate users.

Instead of showing "nothing," the interface should explain:

* Why the page is empty
* What users can do next
* How to achieve their goal

Every empty state should move the user forward.

---

# 4. Empty State Architecture

Every empty state consists of:

```text id="gx7nmb"
Illustration / Icon

↓

Title

↓

Description

↓

Primary Action

↓

Secondary Action (Optional)

↓

Helpful Resources (Optional)
```

Every layer has a specific purpose.

---

# 5. Empty State Categories

Supported categories

```text id="8v0mhi"
First Use

No Data

No Search Results

No Permissions

Offline

Filtered Results

Archived Content

Completed Workflow
```

Each category communicates a different context.

---

# 6. First-Time Experience

First-use screens introduce new users.

Examples

* No Courses Yet
* No Students
* No Lessons
* No Organization

The interface should encourage onboarding.

---

# 7. No Data

No data indicates that nothing has been created yet.

Examples

* No Courses
* No Assignments
* No Certificates
* No Orders

A clear call-to-action should be provided.

---

# 8. No Search Results

When search returns no results:

The interface should:

* Explain that nothing matched
* Suggest changing keywords
* Offer to clear filters
* Recommend popular content

Users should never feel stuck.

---

# 9. Empty Filters

Filtering may temporarily remove all visible data.

The interface should offer:

* Clear Filters
* Reset Filters
* View All

Filter-related empty states should never imply data loss.

---

# 10. No Notifications

Examples

* You're all caught up.
* No new notifications.
* Nothing requires your attention.

Positive language is preferred.

---

# 11. Learning Empty States

Examples

* No Courses Enrolled
* No Lessons Started
* No Notes Yet
* No Bookmarks

Encourage learners to begin learning.

---

# 12. Instructor Empty States

Examples

* No Published Courses
* No Students Yet
* No Assignments
* No Reviews

Provide shortcuts to create content.

---

# 13. Commerce Empty States

Examples

* No Orders
* Empty Cart
* No Products
* No Transactions

Suggest meaningful next actions.

---

# 14. Reports

Reports may temporarily contain no data.

Possible reasons include:

* New Account
* Selected Date Range
* Applied Filters

Explain the reason whenever possible.

---

# 15. Offline State

When connectivity is unavailable:

The interface should:

* Explain the issue
* Offer Retry
* Preserve user progress whenever possible

Offline should never resemble an application error.

---

# 16. Permission Empty State

Some users may not have access to specific resources.

Examples

* Restricted Reports
* Organization Settings
* Administration Pages

Explain the restriction without exposing sensitive information.

---

# 17. Completed Workflows

After completing a workflow:

Examples

* Quiz Submitted
* Certificate Earned
* Assignment Completed

The next recommended action should be clearly presented.

---

# 18. Illustrations

Illustrations should:

* Support understanding
* Remain lightweight
* Match the design language

Illustrations should never distract from the message.

---

# 19. Actions

Every empty state should include:

* One Primary Action

Optional additions:

* Secondary Action
* Help Link
* Documentation
* Tutorial

Actions should always be relevant.

---

# 20. Responsive Behavior

Empty states adapt across:

* Desktop
* Tablet
* Mobile

Content should remain centered and easy to scan.

---

# 21. Accessibility

Empty states must support:

* Screen Readers
* Keyboard Navigation
* High Contrast
* Meaningful Alternative Text

Illustrations should never contain essential information.

---

# 22. Design Tokens

Examples

```text id="g3m0yj"
empty-gap

empty-icon-size

empty-title-spacing

empty-description-width

empty-action-gap
```

Empty states should consume shared design tokens.

---

# 23. CSS Variables

Examples

```css id="yjbc5o"
--empty-gap
--empty-icon-size
--empty-title-spacing
--empty-description-width
--empty-action-gap
```

Implementation should avoid fixed values.

---

# 24. Future Expansion

The Empty State System supports:

* AI Recommendations
* Personalized Suggestions
* Organization Branding
* White Label Themes
* Mobile Applications

Future enhancements should preserve the same structure.

---

# 25. Writing Guidelines

Messages should be:

* Positive
* Clear
* Concise
* Encouraging
* Human

Avoid technical language.

Avoid blaming the user.

---

# 26. Design Principles

Empty states should always remain:

* Helpful
* Friendly
* Actionable
* Minimal
* Informative
* Encouraging

Every empty state should help users move forward.

---

# 27. Design Decision

Iran LMS follows a **Guided Empty State Architecture**.

```text id="u6y6bo"
Context

↓

Explanation

↓

Suggested Action

↓

User Progress
```

Every empty state should guide the user toward a meaningful next step instead of simply indicating the absence of content.

---

# 28. Strategic Vision

The Empty State System transforms moments without data into opportunities for guidance and engagement.

Whether a learner has not enrolled in a course, an instructor has not published content, or an administrator has no reports to review, every empty state provides clear explanations and actionable recommendations.

The objective is to eliminate dead ends, reduce user frustration, and ensure that every screen in the Iran LMS ecosystem remains purposeful, informative, and aligned with the overall learning experience.
