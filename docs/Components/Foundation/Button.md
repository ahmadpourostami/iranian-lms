# Button

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable UI Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The Button component is the primary interactive control used to trigger actions throughout the Iran LMS WordPress Plugin.

Buttons may be used to:

* Submit forms
* Navigate to LMS pages
* Start lessons
* Continue learning
* Start exams
* Submit assignments
* Purchase courses
* Enroll in courses
* Download certificates
* Save settings
* Filter data
* Open dialogs
* Open menus
* Trigger AJAX actions
* Perform administrative actions

The Button component must provide a consistent interaction model across the plugin.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore the Button component must be:

```text
Reusable
    ↓
Theme Independent
    ↓
WordPress Compatible
    ↓
RTL Ready
    ↓
Accessible
    ↓
Responsive
    ↓
Token Driven
```

The component must not depend on a specific WordPress Theme.

---

# 3. WordPress Context

Buttons may appear in:

```text
Frontend

Student Dashboard

Instructor Dashboard

Admin Pages

Course Management

Lesson Player

Assignments

Quizzes

Certificates

Notifications

Settings

Modal / Dialog

Shortcodes

Blocks
```

The same Button component should maintain consistent behavior across these contexts.

---

# 4. LMS Use Cases

Common Iran LMS examples:

```text
مشاهده دوره‌ها

ثبت‌نام در دوره

ادامه یادگیری

شروع آزمون

ارسال تکلیف

مشاهده نتیجه

دانلود گواهینامه

افزودن به سبد خرید

خرید دوره

ذخیره تغییرات

ویرایش دوره

انتشار دوره

مشاهده جزئیات

تلاش مجدد

انصراف
```

The exact label is determined by the parent feature.

---

# 5. Anatomy

A Button may contain:

```text
┌────────────────────────────┐
│ Icon   Label   Loading      │
└────────────────────────────┘
```

Possible elements:

```text
Icon

Label

Loading Indicator

Badge

Dropdown Indicator
```

Not every Button requires all elements.

---

# 6. Button Types

The component supports semantic variants rather than page-specific styles.

Recommended variants:

```text
Primary

Secondary

Outline

Ghost

Destructive

Success

Link
```

---

# 7. Primary

Primary Button represents the main action within a context.

Examples:

```text
شروع یادگیری

ثبت‌نام در دوره

ذخیره تغییرات

انتشار دوره

خرید دوره
```

Only one action should normally receive primary emphasis within a focused area.

---

# 8. Secondary

Secondary Button represents an important but supporting action.

Examples:

```text
مشاهده جزئیات

ویرایش

مشاهده همه
```

Secondary actions should visually remain below the primary action.

---

# 9. Outline

Outline Buttons are suitable for secondary actions where a stronger visual boundary is useful.

Examples:

```text
لغو

دانلود

مشاهده گواهینامه
```

Outline should not become the default style for every action.

---

# 10. Ghost

Ghost Buttons are low-emphasis controls.

Examples:

```text
بستن

بازگشت

مشاهده بیشتر
```

They are particularly useful inside toolbars, cards, and compact interfaces.

---

# 11. Destructive

Destructive Buttons represent actions that may remove or permanently alter data.

Examples:

```text
حذف دوره

حذف درس

حذف فایل

لغو ثبت‌نام
```

Destructive actions should not be used merely for visual emphasis.

---

# 12. Success

Success Buttons may represent a positive completion action.

Examples:

```text
تأیید

تکمیل

فعال‌سازی
```

Success should not replace Primary for normal actions.

---

# 13. Link Button

Link Buttons are used when the interaction behaves like navigation but requires Button semantics or styling.

Examples:

```text
مشاهده همه دوره‌ها

مشاهده جزئیات

بازگشت
```

When the action is actual navigation, prefer a semantic `<a>` element rather than a JavaScript Button.

---

# 14. Button vs Link

This distinction is important.

Use:

```html
<a>
```

when the user navigates to another URL.

Use:

```html
<button>
```

when the user performs an action.

Examples:

```text
مشاهده دوره
→ Link

ذخیره دوره
→ Button

حذف دوره
→ Button

رفتن به صفحه گواهینامه
→ Link

باز کردن Modal
→ Button
```

This improves accessibility and WordPress compatibility.

---

# 15. Sizes

Recommended sizes:

```text
Small

Medium

Large
```

Default:

```text
Medium
```

Examples:

```text
Small

Toolbar / Compact UI

Medium

Default LMS UI

Large

Primary CTA / Hero
```

Size should affect:

* Height
* Horizontal Padding
* Icon Size
* Typography
* Border Radius

---

# 16. Icon Buttons

A Button may contain only an icon.

Examples:

```text
Edit

Delete

Close

More

Search

Play
```

Icon-only buttons must have an accessible name.

Example:

```html
<button aria-label="حذف درس">
```

An icon alone is not sufficient accessible labeling.

---

# 17. Icon Position

Because Iran LMS is RTL-first, icon placement must support RTL correctly.

Example:

```text
ادامه یادگیری  →
```

or visually according to the RTL layout rules.

The component should not hard-code physical `left` and `right` assumptions.

Prefer logical layout properties.

---

# 18. Loading State

Buttons may enter a loading state during asynchronous operations.

Example:

```text
┌──────────────────────┐
│  ◌  در حال ذخیره...  │
└──────────────────────┘
```

During loading:

```text
Button remains visible

↓

Action is temporarily disabled

↓

Loading indicator appears

↓

Operation completes
```

The button should preserve its approximate dimensions to prevent layout shift.

---

# 19. Loading Behavior

When loading:

* Prevent duplicate submissions.
* Preserve the action label when useful.
* Display a loading indicator.
* Maintain button dimensions.
* Prevent accidental repeated clicks.

Example:

```text
Normal

[ ذخیره تغییرات ]

Loading

[ ◌ ذخیره تغییرات ]

Success

[ ذخیره شد ]
```

---

# 20. Disabled State

Disabled Buttons indicate that an action cannot currently be performed.

Examples:

```text
No permission

Required field missing

Action unavailable

Processing state
```

Disabled state must not be used merely to make an action visually weaker.

---

# 21. Disabled vs Loading

These states are different.

```text
Disabled

Action cannot currently be performed.
```

```text
Loading

Action has already been triggered and is processing.
```

A loading Button may technically be disabled temporarily to prevent duplicate actions, but the UI should communicate that processing is occurring.

---

# 22. Focus State

Every interactive Button must have a visible focus state.

Focus should remain clearly distinguishable in:

```text
Light Mode

Dark Mode

RTL

Admin UI

Frontend
```

Focus must not depend solely on color.

---

# 23. Hover State

Hover may provide subtle visual feedback.

Examples:

```text
Background change

Border change

Elevation

Icon movement
```

Hover effects must remain lightweight.

Touch devices should not depend on hover.

---

# 24. Active State

Active state communicates that the Button is currently being pressed or activated.

The transition should be subtle and fast.

Avoid excessive scaling or movement.

---

# 25. Selected State

Some Button groups may support a selected state.

Examples:

```text
View Mode

Filter

Toggle Group

Editor Controls
```

Selected state should be visually distinct from hover and active states.

---

# 26. Button Group

Buttons may be grouped when actions are closely related.

Example:

```text
[ ذخیره ] [ لغو ]
```

or:

```text
[ Grid ] [ List ]
```

Button groups should preserve logical spacing in RTL.

---

# 27. Split Button

A Split Button may combine:

```text
Primary Action

+

Additional Actions
```

Example:

```text
┌───────────────────────┬───┐
│       انتشار دوره     │ ▼ │
└───────────────────────┴───┘
```

The secondary menu should use the shared `Dropdown` component.

---

# 28. Full Width

Buttons may occupy the full width of their container.

Use cases:

```text
Mobile CTA

Login Form

Checkout

Course Enrollment
```

Example:

```text
┌──────────────────────────────┐
│        ادامه یادگیری         │
└──────────────────────────────┘
```

Full-width behavior should normally be controlled by the parent layout.

---

# 29. Responsive Behavior

### Desktop

Use the standard component dimensions.

### Tablet

Buttons may expand according to available layout space.

### Mobile

Primary actions may become full-width where appropriate.

Touch targets must remain sufficiently large.

Do not create separate mobile-only Button components.

---

# 30. RTL Behavior

Iran LMS is RTL-first.

The Button must support:

* RTL text
* Logical icon placement
* Logical padding
* Logical alignment
* RTL-aware animation
* RTL-aware grouped actions

Avoid using directional CSS that assumes LTR.

Prefer:

```css
margin-inline-start
margin-inline-end

padding-inline-start
padding-inline-end
```

instead of physical directional properties where appropriate.

---

# 31. Accessibility

The Button component must follow:

* WCAG 2.2 AA
* Semantic HTML
* Keyboard Navigation
* Visible Focus
* Accessible Name
* Screen Reader Compatibility
* Reduced Motion

Use native `<button>` behavior whenever the control performs an action.

---

# 32. Keyboard Interaction

Native Button behavior should be preserved.

Expected interactions:

```text
Tab

↓

Focus Button
```

```text
Enter / Space

↓

Activate Button
```

Do not replace native keyboard behavior with custom JavaScript unless required.

---

# 33. Form Behavior

Buttons inside forms must explicitly define their type when necessary.

Examples:

```html
<button type="submit">
```

```html
<button type="button">
```

```html
<button type="reset">
```

Avoid accidental form submission caused by missing `type`.

---

# 34. WordPress Security

Button actions that trigger privileged operations must be protected by WordPress security mechanisms.

Examples:

```text
Delete Course

Publish Course

Change Settings

Refund Payment

Manage Users
```

Relevant protections may include:

```text
Nonce Verification

Capability Checks

Permission Checks
```

The Button itself does not provide security.

Security belongs to the underlying WordPress action.

---

# 35. AJAX Actions

Buttons may trigger AJAX operations.

Recommended flow:

```text
User Click

↓

Button Loading

↓

AJAX Request

↓

Success / Error

↓

Button Restored
```

The UI must handle failure gracefully.

---

# 36. REST API Actions

Buttons may also trigger WordPress REST API requests.

Example:

```text
Button

↓

REST Request

↓

Loading

↓

Response

↓

Success / Error
```

Authentication and permission handling belong to the API layer.

---

# 37. Error Handling

If an action fails:

```text
Button

↓

Loading

↓

Error

↓

Button Available Again
```

The Button should not remain permanently disabled after an unsuccessful request unless the action is genuinely unavailable.

Error feedback may be provided through:

* Alert
* Toast
* Snackbar
* Inline Error

depending on the context.

---

# 38. Success Handling

After a successful operation, the Button may:

* Return to normal.
* Change temporarily to a success state.
* Navigate to another page.
* Trigger a success notification.

The behavior belongs to the parent feature.

---

# 39. Permission State

Some Buttons may only be visible or enabled for users with appropriate permissions.

Examples:

```text
Student

View Course

Instructor

Edit Course

Administrator

Delete Course
```

Permission checks must occur server-side.

Hiding a Button is not a security mechanism.

---

# 40. Design Tokens

Button styling should consume the shared Design Token system.

Relevant tokens include:

```text
button-height

button-padding-inline

button-radius

button-font-size

button-font-weight

button-icon-size

button-gap

button-transition

button-primary-background

button-primary-text

button-secondary-background

button-border

button-focus-ring
```

The exact token names must follow:

```text
05-UI/28-Design-Tokens.md
```

---

# 41. CSS Architecture

Button styles should be scoped to Iran LMS.

Avoid global WordPress selectors such as:

```css
button {
}
```

Prefer plugin-scoped selectors:

```css
.iran-lms-button {
}
```

or the project's finalized component naming convention.

The component must not unintentionally overwrite Theme or WordPress Admin buttons.

---

# 42. JavaScript

The Button component should require JavaScript only when behavior cannot be achieved with native HTML.

Possible JS responsibilities:

```text
Loading State

Async Action

Dropdown Trigger

Dialog Trigger

Prevent Duplicate Submission
```

Simple navigation should not require JavaScript.

---

# 43. PHP Rendering

The Button may be rendered through:

```text
PHP Template

Template Part

Render Function

Shortcode

Block

Admin UI

REST Response
```

Business logic should remain outside the Button renderer.

Example conceptual architecture:

```text
LMS Business Logic

↓

Prepared Button Data

↓

Button Renderer

↓

HTML
```

---

# 44. Component API

Recommended properties:

```text
variant

size

label

icon

iconPosition

type

disabled

loading

fullWidth

selected

ariaLabel

href
```

Not every property is valid in every context.

For example:

```text
href
```

should normally indicate that the component should render as a link rather than pretending that navigation is a Button action.

---

# 45. Semantic Rendering

The component should select the correct HTML element.

```text
Action

↓

<button>
```

```text
Navigation

↓

<a>
```

This semantic distinction is part of the component architecture.

---

# 46. Theme Integration

Themes may customize:

* Colors
* Typography
* Radius
* Shadows
* Spacing
* Brand styling

The plugin should provide stable semantic hooks/tokens.

Theme customization should not require editing plugin source files.

---

# 47. Dark Mode

Button variants must support the shared Dark Mode system.

Avoid hard-coded colors that only work in light mode.

Dark Mode should be achieved through semantic tokens.

---

# 48. Performance

The Button component should remain lightweight.

Avoid:

* Heavy JavaScript dependencies
* Unnecessary DOM nodes
* Large icon assets
* Complex animations
* Repeated inline styles

Native HTML should be preferred whenever possible.

---

# 49. Do

Recommended:

* Use semantic HTML.
* Use `<button>` for actions.
* Use `<a>` for navigation.
* Provide accessible names.
* Support keyboard interaction.
* Preserve RTL behavior.
* Use Design Tokens.
* Prevent duplicate submissions.
* Respect WordPress permissions.
* Keep component behavior Theme-independent.

---

# 50. Don't

Avoid:

* Using `<div>` as a Button.
* Using JavaScript for simple navigation.
* Globally overriding WordPress buttons.
* Hiding permission logic only in the frontend.
* Creating page-specific Button variants unnecessarily.
* Using color as the only state indicator.
* Using excessive animations.
* Hard-coding Theme colors.
* Creating separate LTR and RTL Button components.

---

# 51. Common LMS Examples

```text
[ مشاهده دوره ]

[ شروع یادگیری ]

[ ادامه یادگیری ]

[ ثبت‌نام در دوره ]

[ شروع آزمون ]

[ ارسال تکلیف ]

[ مشاهده نتیجه ]

[ دانلود گواهینامه ]

[ ذخیره تغییرات ]

[ انتشار دوره ]

[ ویرایش ]

[ حذف ]
```

These actions should use the same Button architecture while changing semantic variants according to context.

---

# 52. Related Components

Button integrates with:

```text
Icon

Spinner

Loader

Tooltip

Dropdown

Dialog

Modal

Drawer

Toast

Snackbar

Alert

Form

Card
```

Examples:

```text
Button + Spinner

↓

Loading Action
```

```text
Button + Dropdown

↓

Split / Menu Action
```

```text
Button + Dialog

↓

Confirmation Action
```

---

# 53. Component Boundary

The Button component should handle:

```text
Structure

Appearance

Interaction State

Accessibility

Basic Interaction
```

It should not handle:

```text
Business Logic

Permission Decisions

Database Operations

API Authentication

Course Logic

Enrollment Logic

Payment Logic
```

Those responsibilities belong to their respective modules.

---

# 54. Testing Requirements

Every Button variant should be tested for:

```text
Default

Hover

Focus

Active

Disabled

Loading

RTL

Mobile

Dark Mode
```

Interactive Buttons should additionally be tested for:

```text
Keyboard

Screen Reader

AJAX Failure

AJAX Success

Double Click

Permission Failure
```

---

# 55. Architecture Decision

Iran LMS follows a **Semantic Action Control Architecture**.

```text
User Intent
     ↓
Semantic Control
     ↓
┌───────────────┐
│               │
Action        Navigation
│               │
<button>        <a>
│               │
└───────┬───────┘
        ↓
LMS Feature
        ↓
WordPress / API
        ↓
Result
        ↓
Feedback
```

This prevents the UI component from becoming tightly coupled to LMS business logic.

---

# 56. Strategic Vision

The Button component is one of the foundational components of Iran LMS.

Because it appears throughout:

* Student Dashboard
* Instructor Dashboard
* Admin
* Course Pages
* Lesson Player
* Assessments
* Certificates
* Commerce
* Notifications
* Settings

its API and behavior must remain stable.

The long-term goal is to provide a **WordPress-native, accessible, RTL-first, Theme-independent Button system** that can be reused across all Iran LMS modules without duplicating implementation or creating page-specific UI rules.
