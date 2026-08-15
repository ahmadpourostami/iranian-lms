# Textarea

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Form Control
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The Textarea component is the standard multi-line text control used when users need to enter, edit, or review longer text within the Iran LMS WordPress Plugin.

It is intended for content such as:

* Course descriptions
* Lesson descriptions
* Assignment instructions
* Quiz explanations
* Instructor bios
* Student messages
* Notes
* Feedback
* Internal descriptions
* Settings
* Administrative content

Textarea is a low-level UI component and must remain independent from LMS business logic.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Textarea must be:

```text
Reusable
    ↓
Theme Independent
    ↓
WordPress Compatible
    ↓
RTL First
    ↓
Accessible
    ↓
Responsive
    ↓
Token Driven
```

The component defines the control's structure, behavior, states, and accessibility.

The Theme may customize its visual appearance through the project's token and styling system.

---

# 3. WordPress Context

Textarea may be used in:

```text
Frontend Forms
Student Dashboard
Instructor Dashboard
Course Editor
Lesson Editor
Assignment Editor
Quiz Editor
Profile
Settings
WordPress Admin
Plugin Admin Pages
Modal
Drawer
Shortcode
Block
```

The component must not assume that it is always rendered in the frontend.

---

# 4. LMS Use Cases

Typical examples include:

```text
توضیحات دوره

توضیحات درس

دستورالعمل تکلیف

توضیحات آزمون

توضیحات سؤال

معرفی مدرس

پیام به مدرس

نظر دانشجو

یادداشت شخصی

توضیحات گواهینامه

توضیحات تنظیمات
```

The parent feature determines the semantic meaning of the content.

---

# 5. Anatomy

A standard Textarea may contain:

```text
Label
    ↓
Textarea Container
    ↓
Textarea
    ↓
Helper Text / Error
```

Optional elements:

```text
Character Counter
Leading / Trailing Actions
Resize Handle
Loading Indicator
```

Example:

```text
توضیحات دوره

┌────────────────────────────────────┐
│ توضیحات دوره را وارد کنید...      │
│                                    │
│                                    │
│                                    │
└────────────────────────────────────┘

حداکثر ۱۰۰۰ کاراکتر
```

---

# 6. Native HTML

The base implementation should use the native HTML element:

```html
<textarea></textarea>
```

Do not replace a normal multiline text field with a `contenteditable` element unless a genuinely different editing experience is required.

Rich text editing belongs to a separate Editor component.

---

# 7. Textarea vs Rich Text Editor

Textarea is intended for plain text.

Use a separate Rich Text Editor when users need:

* Bold
* Italic
* Links
* Lists
* Headings
* Media
* Formatting
* Rich HTML content

Do not turn Textarea into a hidden Rich Text Editor.

---

# 8. Sizes

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

Size may affect:

* Minimum Height
* Padding
* Font Size
* Border Radius

Textarea height should primarily be controlled by content requirements rather than arbitrary visual sizing.

---

# 9. Rows

The component may support a configurable initial row count.

Example:

```html
<textarea rows="5">
```

The default row count should be determined by the context.

Suggested usage:

```text
Short message
→ 3–4 rows

Description
→ 5–8 rows

Long content
→ Larger adaptive area
```

---

# 10. Resize Behavior

Supported resize modes may include:

```text
Vertical
Horizontal
Both
None
```

Default recommendation:

```text
Vertical
```

Vertical resizing is generally preferred because it preserves the surrounding layout.

---

# 11. States

Textarea supports:

```text
Default
Hover
Focus
Filled
Disabled
Readonly
Loading
Error
Success
```

Only relevant states should be presented.

---

# 12. Default State

The default Textarea should provide:

* Clear boundary
* Comfortable writing area
* Readable text
* Appropriate placeholder when needed
* Sufficient contrast

Example:

```text
┌────────────────────────────────┐
│ توضیحات را وارد کنید...        │
│                                │
│                                │
└────────────────────────────────┘
```

---

# 13. Hover State

Hover may subtly change:

* Border
* Background
* Shadow

Hover must not be required to understand the control.

Touch devices do not have a reliable hover state.

---

# 14. Focus State

Focus must be clearly visible.

Recommended:

```text
Textarea
    ↓
Focused Border
+
Focus Ring
```

The focus indication must work in:

* Light Mode
* Dark Mode
* RTL
* Frontend
* WordPress Admin

---

# 15. Filled State

When the user enters content, the value should remain clearly readable.

Placeholder text must disappear naturally when content exists.

---

# 16. Disabled State

Disabled Textareas cannot be edited.

Examples:

```text
User does not have permission
Field is unavailable
Feature is disabled
Data is locked
```

Disabled state must remain visually understandable.

---

# 17. Readonly State

Readonly allows the user to view and potentially copy content without modifying it.

Example:

```text
توضیحات دوره

┌────────────────────────────────┐
│ محتوای تولیدشده توسط سیستم... │
│                                │
└────────────────────────────────┘
```

Use `readonly` rather than `disabled` when the content remains useful to the user.

---

# 18. Error State

Textarea may become invalid after validation.

Example:

```text
توضیحات دوره

┌────────────────────────────────┐
│ abc                            │
└────────────────────────────────┘

توضیحات دوره باید حداقل ۵۰ کاراکتر باشد.
```

Error presentation must not rely only on color.

---

# 19. Success State

Success may indicate that content has passed validation or has been successfully processed.

Example:

```text
توضیحات

┌────────────────────────────────┐
│ توضیحات معتبر                  │
└────────────────────────────────┘

توضیحات با موفقیت ذخیره شد.
```

Success state should be used only when it adds useful information.

---

# 20. Loading State

Textarea may enter a loading state when content is being:

* Generated
* Validated
* Saved
* Loaded
* Processed

Example:

```text
در حال ذخیره...
```

The component should avoid unnecessary layout shifts.

---

# 21. Label

Textarea should normally have a visible label.

Example:

```html
<label for="course-description">
    توضیحات دوره
</label>

<textarea id="course-description"></textarea>
```

The label must be programmatically associated with the control.

---

# 22. Required State

Required Textareas should communicate that input is required.

Example:

```text
توضیحات دوره *
```

and, where applicable:

```html
<textarea required>
```

The required state must also be exposed accessibly.

---

# 23. Placeholder

Placeholder text should be short and helpful.

Good:

```text
مثلاً: در این دوره با مفاهیم پایه React آشنا می‌شوید...
```

Avoid long instructional paragraphs inside placeholders.

Placeholder must not replace the label.

---

# 24. Helper Text

Helper text may explain constraints or expected content.

Example:

```text
توضیحات دوره

┌────────────────────────────────┐
│                                │
└────────────────────────────────┘

حداقل ۵۰ و حداکثر ۱۰۰۰ کاراکتر.
```

Helper text should remain concise.

---

# 25. Character Counter

Textarea may provide a character counter when a content limit matters.

Example:

```text
┌────────────────────────────────┐
│ متن شما...                     │
└────────────────────────────────┘

۲۴۰ / ۱۰۰۰
```

The counter should update as the user types.

It should not become visually dominant.

---

# 26. Maximum Length

When a strict maximum is required, HTML may use:

```html
maxlength="1000"
```

However, the backend must still validate the submitted value.

Client-side restrictions are not security controls.

---

# 27. Minimum Length

When appropriate:

```html
minlength="50"
```

may communicate the expected minimum length to the browser.

Server-side validation remains authoritative.

---

# 28. Word Count

Some LMS contexts may require word counting.

Examples:

```text
Assignment Response
Essay
Student Feedback
```

Word count should be treated as an optional feature rather than a responsibility of the base Textarea.

---

# 29. Autosave

Some LMS features may require autosaving.

Example:

```text
Student writes assignment
        ↓
Content changes
        ↓
Autosave
        ↓
Saved
```

Autosave is a feature-level behavior.

The Textarea should only expose the necessary value/state hooks.

It should not own the autosave business logic.

---

# 30. AJAX / REST Integration

Textarea may participate in asynchronous operations.

Example:

```text
User edits content
        ↓
Save
        ↓
Loading
        ↓
AJAX / REST
        ↓
Success / Error
```

The component displays the state.

The parent feature owns the request.

---

# 31. WordPress Integration

Textarea may be used with:

```text
WordPress Forms
Settings API
Post Meta
User Meta
Custom Tables
AJAX
REST API
Shortcodes
Blocks
Admin Pages
Frontend Templates
```

The component should receive prepared values rather than directly querying WordPress data.

---

# 32. WordPress Security

The Textarea component does not provide security.

Server-side processing must handle:

```text
Sanitization
Validation
Authorization
Capability Checks
Nonce Verification
Output Escaping
```

The exact security mechanism depends on the feature using the component.

---

# 33. Plain Text vs HTML

A Textarea normally represents plain text.

If the content is later stored as HTML, the relevant feature must explicitly define:

* Allowed HTML
* Sanitization
* Storage rules
* Rendering rules

Do not assume arbitrary Textarea content is safe HTML.

---

# 34. RTL Behavior

Iran LMS is RTL-first.

Textarea must support:

* RTL labels
* RTL interface
* Logical padding
* RTL Persian text
* Mixed-direction content

However, the direction of the actual value may depend on the data.

---

# 35. Mixed Direction Content

Some fields naturally contain mixed-direction content.

Examples:

```text
Course description with English terms
Code snippets
URLs
Email addresses
Technical terminology
```

The component must not blindly force every character to RTL.

For technical or directional values, the parent feature may specify an appropriate direction.

---

# 36. Code and Technical Content

A standard Textarea may be used for plain technical text, but code editing should normally use a dedicated code editor component when advanced features are required.

Examples:

```text
PHP
CSS
JavaScript
JSON
SQL
```

Do not overload Textarea with syntax highlighting or code-editor functionality.

---

# 37. Accessibility

Textarea must support:

* WCAG 2.2 AA
* Semantic HTML
* Label Association
* Keyboard Navigation
* Visible Focus
* Screen Readers
* Required State
* Invalid State
* Error Association
* Disabled State
* Readonly State

---

# 38. Error Accessibility

When invalid:

```html
aria-invalid="true"
```

may be used.

The error message should be connected using:

```html
aria-describedby
```

Example:

```html
<textarea
    id="description"
    aria-invalid="true"
    aria-describedby="description-error"
></textarea>

<p id="description-error">
    توضیحات دوره کوتاه است.
</p>
```

---

# 39. Keyboard Interaction

Native textarea behavior should be preserved.

Expected:

```text
Tab
↓
Focus
```

```text
Typing
↓
Text Entry
```

```text
Enter
↓
New Line
```

```text
Shift + Tab
↓
Previous Control
```

Do not override native keyboard behavior unnecessarily.

---

# 40. Mobile Behavior

On mobile:

* Textarea should normally use the available width.
* Text should remain readable.
* Touch targets around associated controls must remain usable.
* The keyboard must not make the control unusable.
* Resize behavior should be tested carefully.

Avoid extremely tall default Textareas on small screens.

---

# 41. Responsive Behavior

### Desktop

Use the contextual width and recommended minimum height.

### Tablet

Allow flexible width.

### Mobile

Prefer full available width.

Height should remain comfortable without consuming the entire screen.

---

# 42. Dark Mode

Textarea must use the shared Dark Mode tokens.

Avoid hard-coded colors.

Dark Mode should modify semantic properties such as:

```text
Background
Text
Border
Placeholder
Focus
Error
Success
```

---

# 43. WordPress Admin

When used in WordPress Admin:

* Styles must be scoped.
* Native WordPress controls must not be globally overridden.
* Keyboard behavior must remain native.
* Admin layout constraints must be respected.

Example:

```text
.iran-lms-textarea
```

should not globally style every:

```text
textarea
```

on the WordPress Admin page.

---

# 44. Frontend Theme Compatibility

The component must coexist with the active WordPress Theme.

It must not assume:

* Bootstrap
* Tailwind
* Elementor
* A specific Theme
* A specific CSS reset

The plugin provides stable component hooks and semantic tokens.

---

# 45. CSS Architecture

Avoid:

```css
textarea {
}
```

because it may modify unrelated Theme and WordPress controls.

Prefer scoped selectors:

```css
.iran-lms-textarea {
}
```

The exact naming convention should follow the finalized project CSS architecture.

---

# 46. Design Tokens

Relevant tokens may include:

```text
textarea-min-height

textarea-padding-inline

textarea-padding-block

textarea-radius

textarea-border

textarea-background

textarea-text

textarea-placeholder

textarea-focus-border

textarea-focus-ring

textarea-error

textarea-success

textarea-disabled

textarea-font-size

textarea-line-height

textarea-transition
```

The source of truth is:

```text
05-UI/28-Design-Tokens.md
```

---

# 47. Component API

Recommended properties:

```text
id
name
value
label
placeholder
helperText
error
success
disabled
readonly
required
rows
resize
maxlength
minlength
autocomplete
spellcheck
dir
characterCount
```

Not every Textarea requires every property.

---

# 48. Component Boundary

Textarea owns:

```text
Markup
Visual States
Text Input Interaction
Accessibility
Character Count Presentation
Basic Validation State
```

Textarea does not own:

```text
Database Queries
Business Logic
Autosave Logic
Course Logic
Assignment Logic
Authentication
Authorization
API Requests
```

Those belong to the relevant application layer.

---

# 49. Data Flow

Recommended architecture:

```text
User
 ↓
Textarea
 ↓
Form / LMS Feature
 ↓
Client Validation
 ↓
WordPress / REST / AJAX
 ↓
Server Validation
 ↓
Business Logic
 ↓
Response
 ↓
Feedback
```

The Textarea remains independent from business logic.

---

# 50. Form Integration

Textarea should work naturally inside native HTML forms.

Example:

```html
<form method="post">

    <label for="course-description">
        توضیحات دوره
    </label>

    <textarea
        id="course-description"
        name="course_description"
        rows="6"
    ></textarea>

    <button type="submit">
        ذخیره
    </button>

</form>
```

WordPress security and validation must be implemented by the form handler.

---

# 51. Autosave Integration

If an LMS feature supports autosave:

```text
Textarea
   ↓
Input Event
   ↓
Debounce
   ↓
Autosave Service
   ↓
WordPress / REST API
   ↓
Saved State
```

The Textarea itself should not implement the autosave service.

---

# 52. Content Persistence

Textarea may display persisted values from:

```text
Post Meta
User Meta
Custom Tables
Options
REST Response
Form Submission
```

The component should not care where the value originated.

---

# 53. Performance

Textarea should remain lightweight.

Avoid:

* Heavy JavaScript
* Unnecessary DOM
* Large dependencies
* Continuous polling
* Expensive input handlers

For large content or advanced editing requirements, use a dedicated editor component.

---

# 54. Do

* Use native `<textarea>`.
* Provide a visible label.
* Associate errors accessibly.
* Support RTL.
* Support mixed-direction content.
* Use Design Tokens.
* Scope CSS.
* Preserve native keyboard behavior.
* Validate server-side.
* Keep business logic outside the component.
* Support WordPress Admin and Frontend.

---

# 55. Don't

Avoid:

* Using placeholder instead of label.
* Turning Textarea into a Rich Text Editor.
* Globally styling all `textarea` elements.
* Relying only on client-side validation.
* Storing sensitive content unnecessarily.
* Forcing RTL on technical content.
* Embedding database queries inside the component.
* Implementing autosave directly inside the component.
* Creating separate RTL and LTR Textarea components.

---

# 56. Common LMS Examples

```text
توضیحات دوره
[                                        ]

توضیحات درس
[                                        ]

دستورالعمل تکلیف
[                                        ]

پیام به مدرس
[                                        ]

بازخورد آزمون
[                                        ]

معرفی مدرس
[                                        ]
```

These should all use the same foundational Textarea architecture while adapting their labels, validation, and business rules to the parent feature.

---

# 57. Related Components

Textarea integrates with:

```text
Input
Select
Checkbox
Switch
Button
FormField
Alert
Tooltip
Modal
Drawer
Toast
```

Potential advanced relationships:

```text
Textarea
    ↓
Character Counter

Textarea
    ↓
Autosave

Textarea
    ↓
Rich Text Editor
```

These are compositions or specialized components rather than changes to the basic Textarea contract.

---

# 58. Testing Requirements

Test the component in:

```text
Default
Hover
Focus
Filled
Disabled
Readonly
Loading
Error
Success
RTL
LTR
Mobile
Tablet
Desktop
Dark Mode
WordPress Admin
Frontend
```

Accessibility tests:

```text
Keyboard
Screen Reader
Label Association
Error Association
Required State
Invalid State
```

Content tests:

```text
Persian Text
English Text
Mixed Text
Long Text
Empty Value
Maximum Length
Minimum Length
New Lines
```

---

# 59. Architecture Decision

Iran LMS follows a **Native Multiline Form Control Architecture**.

```text
User
 ↓
Native Textarea
 ↓
LMS Form
 ↓
Validation
 ↓
WordPress / REST / AJAX
 ↓
Business Logic
 ↓
Feedback
```

The component remains simple, semantic, reusable, and independent.

---

# 60. Strategic Vision

Textarea is a foundational form component of Iran LMS.

It must support the content-entry requirements of:

* Students
* Instructors
* Administrators
* Course Authors
* Course Managers

while remaining independent from:

* A specific Theme
* A specific LMS module
* A specific storage layer
* A specific API implementation

The long-term goal is a **WordPress-native, RTL-first, accessible, responsive, Theme-independent multiline text control** that can serve the entire Iran LMS component architecture.
