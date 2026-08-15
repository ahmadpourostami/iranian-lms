# Forms

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Form System used throughout the Iran LMS platform.

Forms are the primary interface for creating, editing, validating, and managing data.

A consistent form system improves usability, accessibility, development speed, and user confidence.

---

# 2. Goals

The Form System should be:

* Consistent
* Accessible
* Responsive
* Predictable
* Reusable
* Easy to Validate

Every form should follow the same interaction principles.

---

# 3. Design Philosophy

Forms should reduce effort.

Users should focus on entering information rather than understanding the interface.

Good forms prevent mistakes before they happen.

---

# 4. Form Architecture

The Form System consists of several layers.

```text id="e2v8qa"
Form

↓

Section

↓

Field Group

↓

Field

↓

Validation

↓

Submission
```

Each layer has a clearly defined responsibility.

---

# 5. Form Components

Supported components include:

* Text Input
* Textarea
* Password Input
* Number Input
* Email Input
* Phone Input
* Search Input
* Select
* Multi Select
* Checkbox
* Radio Button
* Toggle Switch
* Date Picker
* Time Picker
* File Upload
* Image Upload
* Rich Text Editor
* Tags Input
* Color Picker (Admin)
* Slider
* Rating Input

New controls should integrate into the same architecture.

---

# 6. Field Structure

Every field should contain:

* Label
* Input Control
* Optional Description
* Validation Message
* Optional Helper Text

Field structure should remain consistent across all modules.

---

# 7. Labels

Labels should:

* Clearly describe the field
* Remain visible
* Avoid abbreviations
* Stay outside the input

Placeholder text should never replace labels.

---

# 8. Placeholder Text

Placeholders provide examples, not instructions.

They disappear once users begin typing.

Critical information should never rely on placeholders.

---

# 9. Required Fields

Required fields should be clearly identified.

The indication method must remain consistent throughout the platform.

---

# 10. Optional Fields

Optional fields should be explicitly identified when appropriate.

Users should immediately understand which information is mandatory.

---

# 11. Helper Text

Helper text explains:

* Expected Format
* Input Rules
* Recommendations
* Limits

Helper text should prevent user errors.

---

# 12. Validation

Validation should occur:

* During Input (when appropriate)
* After Leaving a Field
* Before Submission

Validation should help users recover quickly.

---

# 13. Error Messages

Error messages should:

* Explain the problem
* Identify the affected field
* Suggest a solution

Messages should never blame the user.

---

# 14. Success Feedback

Successful operations should provide immediate confirmation.

Examples

* Saved
* Updated
* Uploaded
* Submitted

Feedback should appear without interrupting the workflow.

---

# 15. Form Layout

Forms should be organized into logical sections.

Examples

```text id="7ly6me"
General Information

Course Details

Pricing

SEO

Publishing
```

Large forms should be divided into meaningful groups.

---

# 16. Multi-Step Forms

Complex workflows may use step-based forms.

Examples

* Course Creation
* Instructor Registration
* Checkout
* Organization Setup

Users should always know their current progress.

---

# 17. Inline Editing

Simple data may be edited inline.

Examples

* Course Title
* Lesson Name
* Profile Information

Inline editing should reduce unnecessary navigation.

---

# 18. File Upload

Upload fields should support:

* Drag & Drop
* Click to Upload
* Progress Indicator
* Preview
* Replace
* Remove

Upload status should always be visible.

---

# 19. Rich Text Editing

Rich text editors should support:

* Headings
* Lists
* Links
* Images
* Tables
* Code Blocks

Advanced formatting should not overwhelm users.

---

# 20. Search Fields

Search inputs should provide:

* Instant Feedback
* Keyboard Support
* Clear Button
* Suggestions (when available)

Search should feel responsive.

---

# 21. Responsive Behavior

Forms adapt to:

* Desktop
* Tablet
* Mobile

Fields should stack naturally on smaller screens.

---

# 22. Accessibility

Forms must support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* Error Announcements
* Accessible Labels

Forms should comply with WCAG 2.2 AA.

---

# 23. Design Tokens

Examples

```text id="2oq1rj"
form-gap

field-height

field-radius

field-padding

label-spacing

validation-spacing
```

Form components should consume shared design tokens.

---

# 24. CSS Variables

Examples

```css id="d9lqvf"
--field-height
--field-radius
--field-padding
--field-gap
--label-gap
--input-transition
```

Implementation should avoid fixed values.

---

# 25. Loading States

Forms should indicate background activity.

Examples

* Saving
* Uploading
* Processing
* Validating

Users should never wonder whether the system is working.

---

# 26. Auto Save

Long forms may support automatic saving.

Examples

* Course Builder
* Lesson Editor
* Quiz Builder
* Settings

Auto Save should never interrupt user input.

---

# 27. Future Expansion

The Form System supports:

* AI Assisted Forms
* Dynamic Fields
* Conditional Logic
* Form Templates
* Mobile Applications
* Voice Input

Future enhancements should reuse the existing architecture.

---

# 28. Design Principles

Forms should always remain:

* Simple
* Predictable
* Accessible
* Error-Tolerant
* Responsive
* User-Friendly

Good forms reduce friction and increase completion rates.

---

# 29. Design Decision

Iran LMS follows a **Field-Based Form Architecture**.

```text id="z5y8cm"
Form

↓

Sections

↓

Field Groups

↓

Fields

↓

Validation

↓

Submission
```

Each field is an independent reusable component, allowing forms to be composed consistently across all modules.

---

# 30. Strategic Vision

The Form System provides a unified data-entry experience across the entire Iran LMS ecosystem.

Whether users are enrolling in a course, creating lessons, configuring an organization, managing assessments, or updating their profile, every form follows the same visual language, validation behavior, and interaction model.

The ultimate objective is to make data entry effortless, reliable, and consistent—allowing users to focus on teaching and learning instead of interacting with complex interfaces.
