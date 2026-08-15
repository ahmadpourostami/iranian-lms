# Input

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Form Control
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The Input component is the primary single-line text control used for collecting user information throughout the Iran LMS WordPress Plugin.

It is used in:

* Student Forms
* Instructor Forms
* Course Management
* Search
* Filtering
* Settings
* Authentication
* Profile
* Checkout
* Assignments
* Admin Pages
* LMS Configuration

The component must provide a consistent and accessible form-control experience across the plugin.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore the Input component must be:

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

The component must not depend on a specific Theme.

---

# 3. WordPress Context

Input may be rendered in:

```text
Frontend

Student Dashboard

Instructor Dashboard

WordPress Admin

Plugin Admin Pages

Course Editor

Settings

Search

Filter Panels

Modal

Drawer

Shortcode

Block
```

The same Input contract should work across these contexts.

---

# 4. LMS Use Cases

Common examples:

```text
جستجوی دوره‌ها

جستجوی درس‌ها

عنوان دوره

نام مدرس

نام کاربری

ایمیل

شماره موبایل

قیمت دوره

کد تخفیف

نام دسته‌بندی

عنوان درس

توضیحات کوتاه

نام گواهینامه

مبلغ کیف پول

فیلتر نتایج
```

For example, the LMS search UI uses inputs for course and category searching.

---

# 5. Anatomy

A standard Input may consist of:

```text
Label
    ↓
Input Container
    ├── Leading Icon
    ├── Input
    └── Trailing Action
    ↓
Helper Text / Error
```

Example:

```text
عنوان دوره

┌──────────────────────────────────┐
│ عنوان دوره را وارد کنید          │
└──────────────────────────────────┘

عنوان دوره باید حداقل ۵ کاراکتر باشد.
```

The Label and supporting text belong to the Form Field pattern when the Input is used inside a complete form.

---

# 6. Input Types

Supported HTML input types may include:

```text
text

email

password

search

tel

url

number

date

time

datetime-local

month

week
```

Only use an input type when it accurately represents the data.

---

# 7. Text Input

Default single-line text control.

Use for:

* Course title
* Category name
* Student name
* Instructor name
* Username

Example:

```html
<input type="text">
```

---

# 8. Email Input

Use:

```html
<input type="email">
```

for email addresses.

Example:

```text
ایمیل

┌──────────────────────────────────┐
│ example@email.com                │
└──────────────────────────────────┘
```

The browser's native validation may provide an initial validation layer, but server-side validation remains mandatory.

---

# 9. Password Input

Password inputs should obscure entered characters.

Possible controls:

```text
نمایش رمز

مخفی کردن رمز
```

The visibility toggle should use the shared `Icon` component and provide an accessible label.

---

# 10. Search Input

Search is a common LMS use case.

Example:

```text
┌──────────────────────────────────┐
│ 🔍  جستجوی دوره‌ها، درس‌ها...    │
└──────────────────────────────────┘
```

Search inputs may include:

* Search Icon
* Clear Button
* Loading State
* Result Count

Search UI is visible in the project's LMS dashboard designs.

---

# 11. Number Input

Use for numeric values such as:

```text
قیمت

ظرفیت

درصد

مدت زمان

امتیاز

مبلغ کیف پول
```

The component must distinguish between numeric data and formatted currency.

---

# 12. Telephone Input

Use:

```html
<input type="tel">
```

for phone numbers.

Do not assume that every telephone number has the same format.

Validation and normalization should be handled by the relevant application layer.

---

# 13. URL Input

Use:

```html
<input type="url">
```

for URLs such as:

* Website
* Instructor Profile
* External Resource
* Webinar URL

The value must still be validated and sanitized server-side.

---

# 14. Date and Time

Date/time Inputs may be used for:

* Course Start Date
* Assignment Deadline
* Exam Schedule
* Webinar Start
* Certificate Date

WordPress and browser support should be considered when choosing native date/time controls.

For complex Persian calendar requirements, a dedicated DatePicker component may be preferable.

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

Size affects:

* Height
* Padding
* Font Size
* Icon Size
* Border Radius

The Input should remain visually compatible with the Button and Select components.

---

# 16. States

Supported states:

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

Only applicable states should be visually represented.

---

# 17. Default State

The default Input should provide:

* Clear boundary
* Readable text
* Appropriate placeholder when necessary
* Sufficient contrast
* Consistent height

Example:

```text
┌──────────────────────────────┐
│ عنوان دوره                   │
└──────────────────────────────┘
```

---

# 18. Hover State

Hover may subtly change:

* Border
* Background
* Shadow

Hover must not be the only indication of interactivity.

Touch devices should not depend on hover.

---

# 19. Focus State

Focus must be clearly visible.

Recommended:

```text
Input

↓

Focused Border

+

Focus Ring
```

Focus must remain visible in:

* Light Mode
* Dark Mode
* RTL
* WordPress Admin
* Frontend

---

# 20. Filled State

After the user enters a value:

```text
Label

┌──────────────────────────────┐
│ React                        │
└──────────────────────────────┘
```

The value must remain clearly distinguishable from placeholder text.

---

# 21. Disabled State

Disabled Inputs cannot be edited.

Use when:

* Data is unavailable.
* The field depends on another selection.
* The current user lacks permission.
* The operation is temporarily unavailable.

Disabled fields should remain readable.

---

# 22. Readonly State

Readonly is different from Disabled.

```text
Readonly

User can select/copy the value
but cannot edit it.
```

Example:

```text
شماره سفارش

┌──────────────────────────────┐
│ #12456                       │
└──────────────────────────────┘
```

Use `readonly` when the value is relevant to the user but must not be changed.

---

# 23. Error State

When validation fails:

```text
عنوان دوره

┌──────────────────────────────┐
│ abc                          │
└──────────────────────────────┘

عنوان دوره باید حداقل ۵ کاراکتر باشد.
```

Error state should include:

* Visual indication
* Error message
* Accessible association

Do not rely only on red color.

---

# 24. Success State

Success may be used after successful validation or processing.

Example:

```text
کد تخفیف

┌──────────────────────────────┐
│ IRAN20                    ✓  │
└──────────────────────────────┘

کد تخفیف با موفقیت اعمال شد.
```

Success should be used sparingly.

---

# 25. Loading State

Inputs may display a loading state when validating or fetching data.

Examples:

```text
Checking username...

Validating discount code...

Searching courses...
```

The Input should remain structurally stable during loading.

---

# 26. Placeholder

Placeholders should provide short examples or hints.

Good:

```text
مثلاً: آموزش React
```

Bad:

```text
لطفاً در این قسمت عنوان دوره‌ای که می‌خواهید ایجاد کنید را وارد نمایید...
```

Placeholder must not replace the actual Label.

---

# 27. Label

Meaningful Inputs should normally have a visible Label.

Example:

```text
عنوان دوره

[________________________]
```

The label should be programmatically associated with the Input.

Example:

```html
<label for="course-title">
عنوان دوره
</label>

<input
    id="course-title"
    type="text"
>
```

---

# 28. Required Fields

Required fields should be clearly communicated.

Example:

```text
عنوان دوره *
```

or with an accessible required state.

HTML should use:

```html
required
```

when appropriate.

The UI should not depend only on an asterisk to communicate required status.

---

# 29. Helper Text

Helper text provides additional context.

Example:

```text
نام کاربری

┌──────────────────────────────┐
│ ahmad                        │
└──────────────────────────────┘

فقط حروف انگلیسی، عدد و _ مجاز است.
```

Helper text should remain concise.

---

# 30. Error Message

Error messages should explain:

* What is wrong.
* How the user can fix it.

Good:

```text
ایمیل واردشده معتبر نیست.
```

Better:

```text
لطفاً یک آدرس ایمیل معتبر وارد کنید.
```

Avoid technical error messages.

---

# 31. Leading Icon

Inputs may include a leading icon.

Examples:

```text
🔍 جستجوی دوره‌ها

✉ ایمیل

🔒 رمز عبور
```

Icons should communicate meaning rather than exist purely for decoration.

---

# 32. Trailing Action

Inputs may contain a trailing action.

Examples:

```text
Password

[••••••••••••       👁]
```

```text
Search

[React              ×]
```

Trailing actions must be keyboard accessible.

---

# 33. RTL Behavior

Iran LMS is RTL-first.

Input components must support:

* RTL text
* RTL labels
* Logical padding
* Logical icon placement
* Logical alignment

Do not force text direction blindly.

---

# 34. Direction of Input Value

Not every value should necessarily follow RTL.

Examples:

```text
Persian Name
→ RTL

Email
→ LTR

URL
→ LTR

Username
→ LTR

Phone Number
→ Usually LTR

Persian Text
→ RTL
```

The component should allow semantic direction where necessary.

---

# 35. Numeric Alignment

Numeric values may benefit from consistent alignment.

Examples:

```text
Price

۱,۲۹۰,۰۰۰ تومان
```

```text
Course Capacity

۳۰
```

Numeric formatting should be handled by the relevant data layer or formatting utility.

---

# 36. Search Behavior

For search inputs:

```text
User Types

↓

Input State

↓

Search Request

↓

Loading

↓

Results
```

Debouncing may be used for live search.

The Input component itself should not own the search business logic.

---

# 37. AJAX / REST Validation

Some Inputs may trigger asynchronous validation.

Examples:

```text
Username Availability

Discount Code

Course Slug

Unique Course Identifier
```

Recommended flow:

```text
Input

↓

Validation Request

↓

Loading

↓

Valid / Invalid

↓

Feedback
```

The validation API belongs to the relevant LMS module.

---

# 38. WordPress Integration

Input may be used with:

```text
WordPress Forms

Admin Forms

Settings API

User Profile

Plugin Settings

Shortcodes

Blocks

AJAX

REST API
```

The Input component must not assume that the data source is always WordPress `post_meta` or `user_meta`.

---

# 39. Server-Side Validation

Client-side validation is not sufficient.

All important values must be validated server-side.

Examples:

```text
Course Title

Price

Email

User ID

Course ID

Settings

Permissions
```

The component provides UI validation feedback.

The server remains authoritative.

---

# 40. Sanitization

User-provided values must be sanitized according to their intended data type.

Examples may include WordPress functions such as:

```text
sanitize_text_field()

sanitize_email()

esc_url_raw()
```

The exact sanitization method belongs to the server-side implementation.

---

# 41. Security

Inputs may contain sensitive information.

Examples:

* Password
* API Key
* Secret Token

Sensitive data must not be unnecessarily:

* Logged
* Exposed in HTML
* Stored in browser storage
* Included in error messages

The Input component itself does not provide security.

---

# 42. Form Submission

Inputs may participate in:

```text
POST

GET

AJAX

REST API
```

The component must preserve normal browser form behavior wherever possible.

Do not require JavaScript for basic form submission.

---

# 43. Browser Autofill

Where appropriate, use semantic attributes such as:

```text
autocomplete="name"

autocomplete="email"

autocomplete="username"

autocomplete="current-password"

autocomplete="new-password"
```

This improves usability and accessibility.

---

# 44. Input Attributes

Useful attributes include:

```text
id

name

type

value

placeholder

required

disabled

readonly

autocomplete

min

max

step

maxlength

minlength

pattern

inputmode

aria-label

aria-describedby

aria-invalid
```

Only relevant attributes should be rendered.

---

# 45. Mobile Keyboard

The component should use suitable `inputmode` values where helpful.

Examples:

```text
Email
→ email

Phone
→ tel

Numeric
→ numeric

Decimal
→ decimal

URL
→ url
```

This allows mobile devices to present an appropriate keyboard.

---

# 46. Autocomplete

Autocomplete may be supported for LMS search and entity selection.

Examples:

```text
Course Search

Instructor Search

Student Search

Username
```

For complex suggestions, use a dedicated Autocomplete component rather than overloading the basic Input.

---

# 47. WordPress Admin

When used inside WordPress Admin:

* Scope styles carefully.
* Avoid overriding native WordPress controls.
* Respect admin spacing where necessary.
* Preserve keyboard navigation.
* Respect WordPress color schemes where applicable.

Iran LMS styles must not globally modify unrelated WordPress Admin inputs.

---

# 48. Frontend

On the frontend, the Input must coexist with the active Theme.

The plugin should not assume:

* A specific CSS framework
* A specific Theme
* Global typography
* Global form styling

The component should use Iran LMS semantic classes and Design Tokens.

---

# 49. CSS Architecture

Avoid:

```css
input {
}
```

because this can affect unrelated Theme and WordPress controls.

Prefer a scoped selector:

```css
.iran-lms-input {
}
```

or the project's finalized component naming convention.

---

# 50. Design Tokens

Relevant tokens may include:

```text
input-height

input-padding-inline

input-radius

input-border

input-background

input-text

input-placeholder

input-focus-border

input-focus-ring

input-error

input-success

input-disabled

input-icon-size

input-gap
```

The source of truth is:

```text
05-UI/28-Design-Tokens.md
```

---

# 51. Dark Mode

Input must support the project's Dark Mode system.

Light and Dark themes should use semantic tokens rather than separate hard-coded component implementations.

---

# 52. Responsive Behavior

### Desktop

Use the standard Input dimensions.

### Tablet

Allow flexible width based on parent layout.

### Mobile

Inputs should generally use the available container width.

Touch interaction must remain comfortable.

---

# 53. Accessibility

The Input component must support:

* WCAG 2.2 AA
* Semantic HTML
* Label association
* Keyboard Navigation
* Visible Focus
* Screen Readers
* Error Association
* Required State
* Disabled State
* Readonly State

---

# 54. Error Accessibility

When invalid, use appropriate attributes such as:

```html
aria-invalid="true"
```

The error message should be associated with the Input using:

```html
aria-describedby
```

Example:

```html
<input
    id="course-title"
    aria-invalid="true"
    aria-describedby="course-title-error"
>
```

---

# 55. Keyboard Interaction

The Input should preserve native browser behavior.

Expected:

```text
Tab

↓

Focus Input
```

```text
Typing

↓

Update Value
```

```text
Shift + Tab

↓

Previous Control
```

Do not replace native text editing behavior with custom JavaScript.

---

# 56. Component API

Recommended properties:

```text
type

name

id

value

placeholder

label

helperText

error

success

disabled

readonly

required

size

icon

leadingIcon

trailingAction

autocomplete

inputMode

maxLength

minLength

min

max

step

direction
```

Not every Input requires every property.

---

# 57. Component Boundary

The Input component owns:

```text
Markup

Visual State

Input Interaction

Accessibility Attributes

Basic Validation State
```

It does not own:

```text
Database Queries

Business Logic

Authentication

Authorization

Course Logic

Enrollment Logic

Payment Logic
```

Those belong to their respective modules.

---

# 58. Validation Architecture

Recommended separation:

```text
Input
   ↓
Client Validation
   ↓
Request
   ↓
Server Validation
   ↓
Business Rule
   ↓
Response
   ↓
Input Feedback
```

This keeps presentation and business logic separate.

---

# 59. Do

* Use semantic HTML.
* Provide a Label.
* Use correct `type`.
* Use native browser capabilities.
* Support RTL.
* Support LTR values when required.
* Provide accessible errors.
* Validate important data server-side.
* Scope CSS.
* Use Design Tokens.
* Preserve Theme independence.

---

# 60. Don't

Avoid:

* Using placeholder instead of Label.
* Using JavaScript for basic text input.
* Globally styling all `<input>` elements.
* Relying only on client-side validation.
* Using color as the only error indicator.
* Forcing RTL on emails and URLs.
* Storing sensitive data unnecessarily.
* Coupling Input directly to an LMS module.
* Creating separate RTL/LTR Input components.

---

# 61. Common LMS Examples

```text
عنوان دوره
[ آموزش React ]

جستجوی دوره‌ها
[ 🔍 React ]

ایمیل
[ example@email.com ]

شماره موبایل
[ ۰۹۱۲... ]

کد تخفیف
[ IRAN20 ]

قیمت دوره
[ ۱۲۹۰۰۰۰ ]

نام مدرس
[ علی احمدی ]
```

## These patterns align with the existing LMS UI designs, which use search and form inputs throughout course, category, dashboard, and wallet interfaces.

# 62. Related Components

Input integrates with:

```text
Button

Textarea

Select

Checkbox

Switch

Badge

Tooltip

FormField

Modal

Drawer

Dropdown

Alert

Toast
```

For example:

```text
Input + Button
→ Search

Input + Tooltip
→ Additional Help

Input + Alert
→ Validation Feedback
```

---

# 63. Testing Requirements

Test the Input in:

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

Dark Mode

WordPress Admin

Frontend
```

Accessibility tests should include:

```text
Keyboard

Screen Reader

Label Association

Error Association

Required State

Invalid State
```

---

# 64. Architecture Decision

Iran LMS follows a **Semantic Form Control Architecture**.

```text
User
 ↓
Input
 ↓
Form / Feature
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

The Input remains a presentation and interaction component rather than becoming a business-logic component.

---

# 65. Strategic Vision

The Input component is one of the foundational controls of Iran LMS.

It must work consistently across:

* Student Forms
* Instructor Forms
* Course Management
* Search
* Filters
* Settings
* Profile
* Authentication
* Commerce
* WordPress Admin

The long-term goal is a **WordPress-native, RTL-first, accessible, Theme-independent form-control system** that can be reused across every Iran LMS module without introducing page-specific implementations.
