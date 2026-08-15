# Empty State

**Component:** Data Display
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Empty State component informs users when no content, data, or results are available and guides them toward the next appropriate action.

Rather than displaying a blank screen, Empty States provide clarity, reduce confusion, and encourage meaningful user interaction.

---

# 2. Component Type

**Category**

Data Display Component

**Role**

Empty Content Feedback

---

# 3. Usage

The Empty State component is used for:

* No Courses
* No Lessons
* No Students
* No Instructors
* No Organizations
* Empty Search Results
* Empty Notifications
* Empty Messages
* Empty Reports
* Empty Dashboard Widgets
* Empty AI Results
* Empty Media Library

Every empty dataset should provide meaningful guidance.

---

# 4. Anatomy

An Empty State consists of:

```text id="m8q4pk"
Illustration / Icon

↓

Title

↓

Description

↓

Primary Action

↓

Secondary Action (Optional)
```

Each element should support the user's next step.

---

# 5. Empty State Types

Supported types:

```text id="v5r8qc"
First-Time Empty

No Results

No Data

Permission Restricted

Offline

Error Recovery
```

Each type should communicate a different context.

---

# 6. Illustration

Illustrations may include:

* Custom Illustration
* Icon
* Mascot
* Simple Graphic

Illustrations should reinforce the message without distracting from it.

---

# 7. Title

The title should clearly explain the situation.

Examples:

```text id="k3n7tx"
No Courses Yet

No Search Results

Nothing Here
```

Titles should be short and reassuring.

---

# 8. Description

Descriptions should:

* Explain why the area is empty.
* Suggest what users can do next.

Example:

```text id="r9m2wy"
Create your first course to start teaching students.
```

Descriptions should remain concise.

---

# 9. Primary Action

Examples:

* Create Course
* Add Student
* Upload File
* Search Again
* Refresh
* Connect Organization

The primary action should help users recover from the empty state.

---

# 10. Secondary Action

Optional actions may include:

* Learn More
* View Documentation
* Contact Support
* Go Back

Secondary actions should never compete with the primary action.

---

# 11. Variants

Supported variants:

```text id="u6v4qa"
Centered

Inline

Card

Full Page

Dashboard Widget
```

The chosen variant should match the surrounding layout.

---

# 12. Empty Categories

Common categories include:

* Empty Collection
* Empty Search
* Empty Dashboard
* Empty History
* Empty Timeline
* Empty Table
* Empty Chart
* Empty Notifications

Each category should use appropriate messaging.

---

# 13. Search Empty State

Example:

```text id="p4k9mc"
No results found.

Try different keywords or remove filters.
```

Search-related guidance should encourage refinement rather than restarting.

---

# 14. Permission Empty State

Example:

```text id="y2r8pv"
You don't have permission to view this content.
```

Permission issues should clearly distinguish access restrictions from missing data.

---

# 15. Offline Empty State

Example:

```text id="n7q3tw"
You're currently offline.

Reconnect to continue.
```

Offline states should provide recovery guidance.

---

# 16. Loading vs Empty

Never confuse:

* Loading State
* Empty State

Loading indicates that data is still being retrieved.

Empty indicates that retrieval has completed and no content exists.

---

# 17. Responsive Behavior

Desktop

* Large illustration.
* Comfortable spacing.

Tablet

* Medium illustration.

Mobile

* Compact layout.
* Smaller illustrations.
* Large touch-friendly actions.

The message should remain readable on every screen size.

---

# 18. Accessibility

The Empty State component must support:

* WCAG 2.2 AA
* Screen Readers
* Keyboard Navigation
* High Contrast Mode

Illustrations should not contain essential information that is unavailable in text.

---

# 19. Animation

Recommended animations:

* Fade In
* Floating Illustration (Optional)
* Gentle Icon Animation

Animations should remain subtle and respect the user's **Reduced Motion** preference.

---

# 20. Tone of Voice

Messages should be:

* Friendly
* Helpful
* Positive
* Action-Oriented

Avoid technical or alarming language.

---

# 21. Design Tokens

Examples

```text id="t5m7qx"
empty-icon-size

empty-title-color

empty-text-color

empty-spacing

empty-max-width
```

All visual properties should consume Design Tokens.

---

# 22. CSS Variables

Examples

```css id="f8v2kr"
--empty-icon-size
--empty-title-color
--empty-text-color
--empty-spacing
--empty-max-width
```

Implementation should remain token-driven.

---

# 23. Do

Recommended practices:

* Explain why the area is empty.
* Offer a clear next step.
* Keep messages concise.
* Use supportive illustrations.
* Prioritize the primary action.

---

# 24. Don't

Avoid:

* Blank screens.
* Generic error messages.
* Excessive text.
* Humorous messages that reduce clarity.
* Dead ends without recovery actions.

Every empty state should help users move forward.

---

# 25. Common Use Cases

Examples include:

* No Courses
* No Students
* No Lessons
* No Search Results
* Empty Reports
* Empty Dashboard Widgets
* Empty Notifications
* Empty Timeline
* Empty AI Results
* Empty Media Library

Empty States improve usability across every area of the application.

---

# 26. Component Properties (Props)

Typical configurable properties include:

```text id="q3w8pn"
variant

icon

illustration

title

description

primaryAction

secondaryAction

size

responsive

animation
```

Additional properties may be introduced while preserving backward compatibility.

---

# 27. Future Expansion

Future enhancements may include:

* AI Recovery Suggestions
* Personalized Empty States
* Context-Aware Recommendations
* Smart Onboarding
* Dynamic Illustrations
* Organization Branding

Future capabilities should extend the existing architecture.

---

# 28. Related Components

This component integrates with:

* Button
* Illustration
* Icon
* Card
* Search
* Table
* Chart
* Timeline
* List

Together they provide complete feedback for empty content scenarios.

---

# 29. Design Principles

The Empty State component should always remain:

* Encouraging
* Informative
* Accessible
* Responsive
* Helpful
* Action-Oriented

Users should immediately understand why content is unavailable and what to do next.

---

# 30. Design Decision

Iran LMS follows a **Guided Recovery Architecture**.

```text id="h6n4rv"
No Data

↓

Explanation

↓

Suggested Action

↓

User Progress
```

Empty States reduce user frustration by transforming missing content into meaningful guidance.

---

# 31. Strategic Vision

The Empty State component provides consistent guidance whenever content is unavailable across the Iran LMS ecosystem. Whether users encounter an empty course list, search results, reports, notifications, AI outputs, or organizational data, every empty state follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve Empty States into intelligent guidance experiences capable of offering AI-powered recommendations, personalized onboarding, contextual recovery actions, and adaptive assistance while maintaining clarity, encouragement, and usability.
