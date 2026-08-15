# Stepper

**Component:** Navigation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Stepper component guides users through a sequence of ordered steps required to complete a workflow.

It helps users understand where they are in the process, what has already been completed, and what remains.

---

# 2. Component Type

**Category**

Navigation Component

**Role**

Sequential Workflow Navigation

---

# 3. Usage

The Stepper component is used for:

* Course Creation Wizard
* Instructor Registration
* Student Enrollment
* Organization Setup
* Checkout Process
* Certificate Generation
* Import Wizard
* Installation Wizard
* AI Content Generation
* Multi-Step Forms

Steppers should only be used for processes with a clearly defined sequence.

---

# 4. Anatomy

A Stepper consists of:

```text id="x7m4pk"
Step Indicator

↓

Connector

↓

Step Label

↓

Optional Description

↓

Optional Status Icon
```

Each step represents one stage in the workflow.

---

# 5. Stepper Types

Supported types:

```text id="n3v8qa"
Horizontal Stepper

Vertical Stepper

Wizard Stepper

Compact Stepper
```

Horizontal Stepper is recommended for desktop workflows, while Vertical Stepper is better suited for mobile or lengthy processes.

---

# 6. Step States

Each step supports the following states:

```text id="m6r2wy"
Pending

Current

Completed

Error

Disabled

Optional
```

Only one step may be in the **Current** state at any time.

---

# 7. Step Indicators

Indicators may display:

* Step Number
* Check Icon
* Error Icon
* Custom Icon

Examples:

```text id="k5q9tr"
1

2

✓

!
```

Indicators should remain consistent throughout the application.

---

# 8. Labels

Each step should include a concise label.

Examples:

* Basic Information
* Curriculum
* Pricing
* Publish

Labels should clearly describe the purpose of each step.

---

# 9. Descriptions

Optional descriptions may provide additional guidance.

Example:

```text id="v2m7xc"
Add the basic details of your course.
```

Descriptions should remain brief.

---

# 10. Connectors

Connectors visually link adjacent steps.

Connector styles:

* Solid
* Dashed
* Progress Fill

Completed connectors should visually reinforce workflow progression.

---

# 11. Navigation Rules

Navigation behavior may be:

* Linear
* Non-linear

Linear mode prevents users from skipping required steps.

Non-linear mode allows revisiting completed steps.

---

# 12. Validation

Each step may require validation before continuing.

Examples:

* Required Fields
* File Upload
* Payment Confirmation
* Course Information

Validation errors should prevent progression until resolved.

---

# 13. Error State

When validation fails:

* Highlight the affected step.
* Display an error indicator.
* Preserve user input.

Errors should be easy to identify and resolve.

---

# 14. Optional Steps

Optional steps should be clearly identified.

Example:

```text id="u4p8kn"
(Optional)
```

Users should understand that these steps may be skipped.

---

# 15. Progress Feedback

The Stepper may display:

* Current Step
* Total Steps
* Completion Percentage

Example:

```text id="p8v5my"
Step 3 of 6
```

This helps users estimate remaining work.

---

# 16. Responsive Behavior

Desktop

* Horizontal layout.

Tablet

* Horizontal or vertical depending on available space.

Mobile

* Vertical layout recommended.
* Current step prioritized.
* Horizontal scrolling may be used for compact steppers.

The component should remain readable on all screen sizes.

---

# 17. Accessibility

The Stepper component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Each step should expose its current status to assistive technologies.

---

# 18. Keyboard Interaction

Supported keyboard actions:

* Tab → Focus Stepper
* Arrow Keys → Navigate Steps
* Enter / Space → Open Step (when permitted)

Keyboard navigation should remain intuitive.

---

# 19. Animation

Recommended animations:

* Connector Fill
* Step Transition
* Fade
* Checkmark Animation

Animations should be subtle and respect the user's **Reduced Motion** preference.

---

# 20. Design Tokens

Examples

```text id="r6k3pz"
stepper-height

step-size

step-radius

connector-color

step-active-color

step-completed-color
```

All visual properties should consume Design Tokens.

---

# 21. CSS Variables

Examples

```css id="f9w2qt"
--step-size
--step-radius
--step-color
--step-active
--step-completed
--connector-color
```

Implementation should remain token-driven.

---

# 22. Do

Recommended practices:

* Keep step labels concise.
* Validate before moving forward.
* Clearly distinguish completed and current steps.
* Preserve entered data.
* Allow returning to completed steps when appropriate.

---

# 23. Don't

Avoid:

* Too many steps in one workflow.
* Long descriptive labels.
* Hidden validation errors.
* Resetting completed steps unnecessarily.
* Allowing users to become lost in the process.

Steppers should simplify workflows rather than complicate them.

---

# 24. Common Use Cases

Examples include:

* Create Course
* Organization Registration
* Student Enrollment
* Checkout
* Instructor Verification
* Live Class Setup
* Import Students
* AI Course Generator
* Certificate Wizard
* Initial Platform Setup

Steppers improve clarity in multi-stage workflows.

---

# 25. Component Properties (Props)

Typical configurable properties include:

```text id="t3n8vc"
steps

currentStep

orientation

linear

showDescriptions

showProgress

validation

disabled

animation
```

Additional properties may be introduced while preserving backward compatibility.

---

# 26. Future Expansion

Future enhancements may include:

* AI Workflow Suggestions
* Adaptive Step Ordering
* Dynamic Step Generation
* Collaborative Wizards
* Enterprise Approval Flows
* Personalized Onboarding

Future capabilities should extend the existing architecture.

---

# 27. Related Components

This component integrates with:

* Progress
* Form
* Button
* Modal
* Notification
* Validation
* Card

Together they create structured multi-step experiences.

---

# 28. Design Principles

The Stepper component should always remain:

* Sequential
* Predictable
* Accessible
* Informative
* Responsive
* Goal-Oriented

Users should always know where they are, what they have completed, and what comes next.

---

# 29. Design Decision

Iran LMS follows a **Guided Workflow Architecture**.

```text id="c7q4mr"
Workflow

↓

Steps

↓

Validation

↓

Completion

↓

Success
```

The Stepper provides clear navigation through complex workflows while minimizing user confusion and reducing errors.

---

# 30. Strategic Vision

The Stepper component enables structured, guided workflows across the Iran LMS ecosystem. Whether creating courses, onboarding organizations, enrolling students, configuring integrations, or completing administrative tasks, every multi-step process follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Stepper into an intelligent workflow engine capable of supporting AI-assisted guidance, adaptive process flows, enterprise approval chains, and personalized onboarding while maintaining clarity, efficiency, and user confidence.
