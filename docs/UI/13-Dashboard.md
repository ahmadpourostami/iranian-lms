# Dashboard

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Dashboard System used throughout the Iran LMS platform.

Dashboards provide users with an overview of their activities, progress, tasks, and important information.

Every dashboard should deliver relevant insights while minimizing cognitive load.

---

# 2. Goals

The Dashboard System should be:

* Personalized
* Informative
* Modular
* Responsive
* Accessible
* Action-Oriented

Users should immediately understand what matters most.

---

# 3. Design Philosophy

A dashboard is not a report.

It is a decision-making interface.

Every widget should help users:

* Understand
* Monitor
* Continue
* Act

If a widget does not support one of these goals, it should not exist.

---

# 4. Dashboard Architecture

Every dashboard follows the same structure.

```text
Dashboard

↓

Header

↓

Quick Actions

↓

Widgets

↓

Insights

↓

Recent Activities
```

Each section has a clear responsibility.

---

# 5. Dashboard Types

Iran LMS supports multiple dashboards.

```text
Student Dashboard

Instructor Dashboard

Administrator Dashboard

Organization Dashboard

Commerce Dashboard

Analytics Dashboard
```

Each dashboard inherits the same layout principles.

---

# 6. Header

The dashboard header may include:

* Welcome Message
* User Name
* Current Role
* Organization
* Date
* Search

The header should immediately establish context.

---

# 7. Quick Actions

Quick Actions provide shortcuts to common tasks.

Examples

* Continue Learning
* Create Course
* Add Lesson
* View Reports
* Manage Students
* Publish Course

Quick actions should reflect the user's role.

---

# 8. Widgets

Widgets are the primary building blocks.

Examples

* Statistics
* Progress
* Charts
* Calendar
* Notifications
* Tasks
* Recent Courses
* Revenue
* Activity Feed

Widgets should remain independent and reusable.

---

# 9. Statistics Widgets

Statistics display key metrics.

Examples

* Total Courses
* Students
* Revenue
* Lessons
* Certificates
* Completion Rate

Statistics should emphasize trends rather than raw numbers alone.

---

# 10. Progress Widgets

Progress widgets display ongoing learning.

Examples

* Current Course
* Lesson Progress
* Weekly Goal
* Learning Streak
* Completion Percentage

Progress should encourage continued learning.

---

# 11. Activity Feed

Recent Activity may include:

* Lesson Completed
* Assignment Submitted
* Quiz Passed
* Certificate Earned
* New Enrollment
* Course Published

Activities should appear in chronological order.

---

# 12. Notifications

The dashboard should surface important notifications.

Examples

* Deadlines
* Announcements
* Instructor Feedback
* Payment Status
* System Updates

Notifications should be actionable whenever possible.

---

# 13. Calendar

Calendar widgets may display:

* Live Classes
* Assignment Deadlines
* Quiz Dates
* Meetings
* Scheduled Lessons

Calendar events should link directly to related pages.

---

# 14. Charts

Charts summarize trends.

Examples

* Learning Progress
* Revenue
* Student Growth
* Course Performance
* Engagement

Charts should support quick interpretation.

---

# 15. Task List

Users should easily identify pending work.

Examples

* Finish Lesson
* Review Quiz
* Grade Assignments
* Publish Draft
* Approve Enrollment

Tasks should prioritize urgency.

---

# 16. Personalization

Dashboards may personalize content based on:

* User Role
* Permissions
* Activity
* Learning History
* Organization

Different users should see different priorities.

---

# 17. Widget Customization

Users may:

* Reorder Widgets
* Hide Widgets
* Resize Widgets
* Pin Favorites

Personal preferences should be remembered.

---

# 18. Responsive Behavior

Dashboards adapt across:

* Desktop
* Tablet
* Mobile

Widgets should stack naturally while preserving information hierarchy.

---

# 19. Accessibility

Dashboards must support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast
* Responsive Zoom

Charts should provide accessible alternatives.

---

# 20. Empty Dashboard

New users may initially have little or no data.

The dashboard should provide:

* Welcome Message
* Onboarding Guidance
* Recommended Actions
* Educational Tips

An empty dashboard should feel encouraging rather than incomplete.

---

# 21. Loading States

Widgets should load independently.

Loading indicators should preserve layout stability using skeleton placeholders.

---

# 22. Design Tokens

Examples

```text
dashboard-gap

widget-gap

widget-radius

widget-padding

widget-header-height

dashboard-max-width
```

Widgets should consume shared design tokens.

---

# 23. CSS Variables

Examples

```css
--dashboard-gap
--widget-gap
--widget-padding
--widget-radius
--widget-shadow
--widget-transition
```

Implementation should avoid hardcoded values.

---

# 24. Future Expansion

The Dashboard System supports:

* AI Insights
* Smart Recommendations
* Organization Analytics
* White Label Themes
* Mobile Applications
* Plugin Widgets

Future widgets should integrate without redesigning the dashboard architecture.

---

# 25. Design Principles

Dashboards should always remain:

* Focused
* Modular
* Personalized
* Actionable
* Accessible
* Scalable

The dashboard should guide users toward their next meaningful action.

---

# 26. Design Decision

Iran LMS follows a **Widget-Based Dashboard Architecture**.

```text
Dashboard

↓

Sections

↓

Widgets

↓

Reusable Components

↓

Business Data
```

Widgets are independent modules that can be reused across different dashboards.

---

# 27. Strategic Vision

The Dashboard System serves as the operational home of every user in the Iran LMS ecosystem.

Rather than presenting static information, dashboards provide personalized insights, actionable tasks, and meaningful progress indicators tailored to each role.

By using a modular widget architecture, the platform can evolve with new features, AI-powered recommendations, organization-specific analytics, and future products while maintaining a consistent, intuitive, and scalable user experience.
