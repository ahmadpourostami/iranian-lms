# Select

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Form Control
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The Select component is a reusable form control for choosing one or more predefined options within the Iran LMS WordPress Plugin.

Typical uses include:

* Course filtering
* Course sorting
* Category selection
* Instructor selection
* Status selection
* Course level
* Course type
* Assignment status
* Exam status
* Pagination size
* Settings
* User roles
* Permissions
* Administrative configuration

The Select component must provide predictable behavior across Frontend, Student Dashboard, Instructor Dashboard, and WordPress Admin.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Select must be:

```text id="g6qf3d"
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

The component must not depend on a particular WordPress Theme.

---

# 3. Native Select vs Custom Select

Iran LMS should prefer the native HTML `<select>` whenever the required interaction is simple.

Native:

```html id="l4y7yq"
<select>
    <option>جدیدترین</option>
    <option>قدیمی‌ترین</option>
</select>
```

Use a custom Select only when the interface requires capabilities that native Select cannot provide adequately.

Examples:

```text id="1u7i0e"
Custom icons
Rich option descriptions
Advanced keyboard behavior
Searchable options
Complex visual states
Multi-select
```

The project must not introduce custom JavaScript merely to recreate a basic native Select.

---

# 4. Select vs Dropdown

These components are related but not interchangeable.

### Select

Used to choose a value.

```text id="x1n0tr"
مرتب‌سازی:

[ جدیدترین        ▼ ]
```

### Dropdown

Used primarily to expose actions or navigation.

```text id="3b0y3a"
[ عملیات ▼ ]

ویرایش
حذف
مشاهده
```

Do not use Dropdown for a simple form value selection.

---

# 5. Select vs Autocomplete

Select is appropriate when the available options are known and reasonably manageable.

Autocomplete is better when:

* There are hundreds or thousands of options.
* The user needs to search.
* Options are loaded dynamically.
* The user selects an entity such as a student or instructor.

Example:

```text id="7p7x5n"
Select

سطح دوره:
[ مقدماتی ▼ ]
```

versus:

```text id="prjv8n"
Autocomplete

مدرس:
[ جستجوی مدرس... ]
```

---

# 6. WordPress Context

Select may appear in:

```text id="2f9l0v"
Frontend
Student Dashboard
Instructor Dashboard
Course Editor
Course Search
Filters
Admin Pages
Plugin Settings
Modal
Drawer
Forms
Shortcodes
Blocks
```

The same component contract should work across these contexts.

---

# 7. LMS Use Cases

Examples:

```text id="q2y4wq"
مرتب‌سازی دوره‌ها
→ جدیدترین

سطح دوره
→ مقدماتی / متوسط / پیشرفته

نوع دوره
→ رایگان / پولی

وضعیت دوره
→ پیش‌نویس / منتشر شده

تعداد آیتم در صفحه
→ ۵ / ۱۰ / ۲۰

وضعیت تکلیف
→ همه / ارسال نشده / بررسی شده

نوع آزمون
→ کوتاه / میان‌ترم / پایانی
```

## The existing LMS designs explicitly use dropdown-style controls for sorting and pagination size.

# 8. Anatomy

A standard Select consists of:

```text id="u2cmx8"
Label
    ↓
Select Trigger
    ↓
Selected Value
    ↓
Indicator
    ↓
Helper / Error
```

For native Select:

```text id="jj4wbb"
Label
Select
```

For custom Select:

```text id="h4t8la"
Label

┌──────────────────────────────┐
│ جدیدترین                 ▼   │
└──────────────────────────────┘
```

---

# 9. Label

A Select should normally have a visible Label.

Example:

```html id="d4r67p"
<label for="course-sort">
    مرتب‌سازی
</label>

<select id="course-sort">
```

The Label must be programmatically associated with the control.

---

# 10. Placeholder

A Select may use a placeholder when no value has been selected.

Example:

```text id="y9w0m8"
انتخاب سطح دوره
```

A placeholder is not a real option.

When appropriate, the initial state should represent:

```text id="c7o1lw"
No selection
```

rather than silently selecting an unintended value.

---

# 11. Default Value

If a default is appropriate, it must be explicitly defined by the parent feature.

Example:

```text id="2r3bjd"
مرتب‌سازی:
[ جدیدترین ▼ ]
```

The Select component should not invent business defaults.

---

# 12. Option Structure

Each option should have:

```text id="5h4f9n"
Value
Label
```

Optional metadata may exist for custom Select implementations.

Example:

```text id="i9v0x5"
Value:
advanced

Label:
پیشرفته
```

The stored value should be stable and machine-readable.

The visible label may be localized.

---

# 13. Option Values

Prefer stable semantic values.

Good:

```text id="v8czl6"
beginner
intermediate
advanced
```

Avoid using translated labels as database identifiers:

```text id="j4xj40"
مقدماتی
متوسط
پیشرفته
```

The UI label may change while the internal value remains stable.

---

# 14. Sizes

Recommended sizes:

```text id="4o3t1a"
Small
Medium
Large
```

Default:

```text id="t7t4g8"
Medium
```

Size affects:

* Height
* Padding
* Font Size
* Icon Size
* Border Radius

---

# 15. States

Supported states:

```text id="6w6x24"
Default
Hover
Focus
Open
Selected
Disabled
Readonly-like
Loading
Error
```

Note:

Native HTML Select does not have a true `readonly` state.

If a value cannot be changed, use `disabled` or render a non-editable presentation according to the context.

---

# 16. Default State

Example:

```text id="4g7o8f"
سطح دوره

┌──────────────────────────────┐
│ انتخاب سطح دوره          ▼   │
└──────────────────────────────┘
```

The control must clearly indicate that it is interactive.

---

# 17. Hover State

Hover may subtly modify:

* Border
* Background
* Shadow

Hover must not be the only indicator of interactivity.

---

# 18. Focus State

Focus must have a visible focus indicator.

Example:

```text id="l8aqg3"
Select
    ↓
Focus Ring
+
Focused Border
```

Focus must work in:

* RTL
* Light Mode
* Dark Mode
* Frontend
* WordPress Admin

---

# 19. Open State

For custom Select implementations, the open state displays the option list.

Example:

```text id="mltq6v"
┌──────────────────────────────┐
│ جدیدترین                 ▲   │
├──────────────────────────────┤
│ جدیدترین                     │
│ قدیمی‌ترین                   │
│ محبوب‌ترین                   │
└──────────────────────────────┘
```

The popup must remain associated with the trigger.

---

# 20. Selected Option

The selected option must be clearly identifiable.

For example:

```text id="qq2v6o"
✓ جدیدترین
```

Selection should not depend solely on color.

---

# 21. Disabled State

Disabled Select indicates that the user cannot currently change the value.

Examples:

```text id="4v0f2d"
Dependent field
Permission restriction
Unavailable configuration
Temporary processing
```

---

# 22. Loading State

Loading may be necessary when options are fetched dynamically.

Example:

```text id="89v0n6"
مدرس

┌──────────────────────────────┐
│ در حال بارگذاری...       ◌  │
└──────────────────────────────┘
```

During loading:

* Prevent conflicting interaction.
* Preserve layout dimensions.
* Communicate the current state.

---

# 23. Error State

Example:

```text id="7m2b6h"
نوع دوره

┌──────────────────────────────┐
│ انتخاب کنید              ▼   │
└──────────────────────────────┘

لطفاً نوع دوره را انتخاب کنید.
```

The error must be communicated visually and semantically.

---

# 24. Required Select

For required fields:

```html id="r6d6z3"
<select required>
```

The label may visually indicate required status:

```text id="q2qz4v"
نوع دوره *
```

The required state should also be accessible.

---

# 25. Helper Text

Example:

```text id="0pm5gq"
سطح دوره

[ متوسط ▼ ]

سطح دوره را بر اساس محتوای آموزشی انتخاب کنید.
```

Helper text should remain short and useful.

---

# 26. Error Message

An error should explain what needs to be corrected.

Good:

```text id="3z6o4f"
لطفاً سطح دوره را انتخاب کنید.
```

Avoid technical implementation messages.

---

# 27. Searchable Select

For large option sets, a searchable Select may be appropriate.

Example:

```text id="q9qv4n"
انتخاب مدرس

┌──────────────────────────────┐
│ 🔍 جستجوی مدرس...            │
├──────────────────────────────┤
│ علی احمدی                    │
│ سارا رضایی                   │
│ محمد کریمی                   │
└──────────────────────────────┘
```

However, if searching is central to the interaction, the component should be modeled as an Autocomplete rather than extending the basic Select indefinitely.

---

# 28. Multi-Select

The base Select should support single selection first.

Multi-select may be implemented as a specialized component:

```text id="o2r7sh"
MultiSelect
```

Example:

```text id="4f3qpi"
دسته‌بندی‌ها

[ برنامه‌نویسی × ] [ طراحی × ] [ + ]
```

Do not overload the basic Select API with unnecessary multi-select behavior.

---

# 29. Grouped Options

Options may be grouped when the dataset naturally contains categories.

Example:

```text id="6x7w2k"
برنامه‌نویسی
    React
    Vue
    Angular

طراحی
    UI/UX
    Figma
```

Native HTML can use:

```html id="6l3jbi"
<optgroup>
```

when appropriate.

---

# 30. Icons

Custom Select options may include icons when the icon adds semantic value.

Example:

```text id="e0az42"
🎥 ویدئو
📄 PDF
📝 آزمون
```

Avoid decorative icon overload.

---

# 31. Direction and RTL

Iran LMS is RTL-first.

The Select must support:

* RTL labels
* RTL option labels
* Logical padding
* Logical alignment
* Correct popup placement

Avoid physical `left` and `right` assumptions.

---

# 32. LTR Values Inside RTL

Some Select values may naturally be LTR.

Examples:

```text id="g3v7w4"
React
Next.js
WordPress
PHP
JavaScript
```

The UI may remain RTL while individual values preserve their natural direction.

---

# 33. Keyboard Accessibility

Native Select should retain browser-native keyboard behavior.

For custom Select, implement predictable keyboard interaction.

Recommended:

```text id="4l7t2a"
Tab
→ Focus

Enter / Space
→ Open

Arrow Up / Down
→ Move selection

Enter
→ Confirm

Escape
→ Close

Home / End
→ First / Last option
```

Exact behavior should remain consistent with established accessibility patterns.

---

# 34. Active Option

When the option list is open, the currently navigated option must have a visible active state.

Do not confuse:

```text id="q9q1pf"
Active
```

with:

```text id="0ym8m1"
Selected
```

An option can be active during keyboard navigation without becoming selected until confirmation.

---

# 35. Screen Reader Behavior

For native Select, prefer the browser's built-in semantics.

For custom Select, the implementation must provide appropriate ARIA semantics.

Do not create a custom Select without a complete keyboard and accessibility model.

---

# 36. Form Integration

Select should work naturally inside HTML forms.

Example:

```html id="8y1d5v"
<label for="course-level">
    سطح دوره
</label>

<select
    id="course-level"
    name="course_level"
>
    <option value="">انتخاب سطح</option>
    <option value="beginner">مقدماتی</option>
    <option value="intermediate">متوسط</option>
    <option value="advanced">پیشرفته</option>
</select>
```

---

# 37. WordPress Integration

Select may be used with:

```text id="r7j6pq"
Settings API
Admin Forms
Post Meta
User Meta
Custom Tables
AJAX
REST API
Shortcodes
Blocks
Frontend Forms
```

The Select component should not directly query WordPress data.

---

# 38. Dynamic Options

Options may come from:

```text id="k7j5p4"
Static Configuration
WordPress Taxonomy
Users
Courses
Lessons
Categories
Database Query
REST API
```

The data provider belongs to the parent feature.

The Select receives prepared options.

---

# 39. AJAX / REST Loading

For dynamic options:

```text id="5m9s6h"
Open / Trigger
    ↓
Request
    ↓
Loading
    ↓
Options
    ↓
Selection
```

Errors should result in a usable recovery state.

---

# 40. Security

The Select component does not provide authorization.

For example:

```text id="w6j5k1"
Course Status
```

may contain:

```text
draft
published
private
```

A malicious user must not gain permission to publish a course simply by manipulating the Select value.

The server must validate:

```text id="c6w2aj"
Nonce
Capability
Permission
Value
Business Rule
```

---

# 41. Server-Side Validation

All submitted Select values must be validated server-side.

For example:

```text id="g8r2e7"
Requested value:
advanced

↓

Is this value allowed?

↓

Does it exist?

↓

Does the user have permission?

↓

Is it valid for this feature?
```

The server remains authoritative.

---

# 42. Sanitization

Submitted values should be sanitized according to their data type.

For simple scalar values, the relevant WordPress sanitization strategy should be used.

The component itself must not assume a universal sanitization function for every Select.

---

# 43. URL Parameters

Selects used for filtering or sorting may update URL parameters.

Example:

```text id="4g9tq2"
?sort=newest
?level=advanced
?category=programming
```

This is useful for:

* Search Results
* Course Catalog
* Filters
* Pagination

The Select component should not own URL routing logic.

---

# 44. Search and Filtering

The existing course-search UI uses:

```text id="4q8b1k"
مرتب‌سازی: جدیدترین
```

alongside filtering and grid/list controls.

Recommended architecture:

```text id="m7y1kq"
Select
 ↓
Filter State
 ↓
URL / Request State
 ↓
LMS Query
 ↓
Results
```

---

# 45. Pagination Size

Select can be used for page-size controls.

Example:

```text id="w1m0q4"
تکلیف در هر صفحه:

[ ۵ ▼ ]
```

This pattern already appears in the assignments dashboard.

---

# 46. Course Settings

Select can configure course properties such as:

```text id="7z3p8b"
Level

Course Type

Visibility

Status

Access Type

Certificate Availability
```

These values must map to stable domain values defined by the Courses module.

---

# 47. Assessment Settings

Select may be used for:

```text id="j7k4rx"
Exam Type

Question Type

Attempt Limit

Grading Method

Exam Status
```

The Assessment module owns the rules.

---

# 48. Responsive Behavior

### Desktop

Use the contextual width.

### Tablet

Allow flexible width according to layout.

### Mobile

The Select should generally occupy the available width when used in a form.

Touch interaction must remain comfortable.

---

# 49. Native Mobile Behavior

When using native `<select>`, mobile browsers may display their platform-native picker.

This is acceptable and often preferable.

Do not replace native mobile behavior solely for visual consistency.

---

# 50. Dark Mode

Select must use the shared Dark Mode token system.

Relevant properties include:

```text id="m8e5c2"
Background
Text
Border
Placeholder
Option State
Focus
Disabled
Error
```

Avoid separate hard-coded Dark Mode implementations.

---

# 51. WordPress Admin

When used inside WordPress Admin:

* Scope CSS.
* Avoid modifying every WordPress Select globally.
* Preserve admin interaction patterns.
* Respect keyboard accessibility.
* Avoid conflicts with WordPress native controls.

Avoid:

```css id="w4m2jb"
select {
}
```

Prefer:

```css id="6o2s6g"
.iran-lms-select {
}
```

---

# 52. Frontend Theme Compatibility

The Select must coexist with the active Theme.

It must not assume:

* Bootstrap
* Tailwind
* Elementor
* A specific CSS reset
* A specific Theme

Iran LMS should expose semantic classes and tokens.

---

# 53. Design Tokens

Relevant tokens may include:

```text id="3x5o9v"
select-height

select-padding-inline

select-radius

select-border

select-background

select-text

select-placeholder

select-focus-border

select-focus-ring

select-option-background

select-option-hover

select-option-selected

select-disabled

select-error

select-icon-size

select-gap
```

The source of truth is:

```text id="o9m6ah"
05-UI/28-Design-Tokens.md
```

---

# 54. Component API

Recommended properties:

```text id="4k9m0d"
id

name

label

value

options

placeholder

required

disabled

size

error

helperText

loading

multiple

searchable

clearable

direction

ariaLabel

ariaDescribedBy
```

The basic Select should remain simple.

Advanced properties such as:

```text id="q4h7yz"
searchable
multiple
clearable
```

should be implemented only when the project actually requires them.

---

# 55. Option API

A conceptual option structure:

```text id="m6y8y5"
{
    value,
    label,
    disabled
}
```

Optional metadata may be supported by specialized Select implementations.

The `value` should be stable.

The `label` should be localizable.

---

# 56. Component Boundary

Select owns:

```text id="e8r1py"
Markup
Visual States
Selection Interaction
Accessibility
Option Presentation
```

Select does not own:

```text id="x4b3wq"
Database Queries
Course Logic
Permission Logic
Enrollment Logic
Payment Logic
Assessment Rules
URL Routing
```

Those belong to the relevant application modules.

---

# 57. Data Flow

Recommended architecture:

```text id="x0z6f5"
Data Provider
    ↓
Prepared Options
    ↓
Select
    ↓
Selected Value
    ↓
Form / Feature
    ↓
Validation
    ↓
WordPress / REST / AJAX
    ↓
Business Logic
    ↓
Feedback
```

---

# 58. Empty Options

When no options are available, the Select should communicate this clearly.

Example:

```text id="4m5x9v"
مدرس

[ مدرسی یافت نشد ▼ ]
```

For dynamic Selects:

```text id="3s6z9c"
No results
```

must not be confused with:

```text id="x8v7z3"
Loading
```

or:

```text id="m3c5p9"
Request Error
```

---

# 59. Error Loading Options

If options fail to load:

```text id="j5n4q0"
مدرس

[ خطا در دریافت مدرس‌ها ]

[ تلاش مجدد ]
```

The recovery action may use the shared Button component.

---

# 60. Empty State

If a valid dataset contains no options:

```text id="5g7j0x"
هیچ گزینه‌ای موجود نیست.
```

Do not show a fake option that looks selectable.

---

# 61. Loading vs Empty vs Error

These states must remain distinct:

```text id="2v9k4b"
Loading
→ در حال بارگذاری...

Empty
→ گزینه‌ای وجود ندارد.

Error
→ دریافت گزینه‌ها با خطا مواجه شد.

Success
→ Options available
```

This distinction is especially important for dynamic LMS entities.

---

# 62. Do

* Prefer native `<select>`.
* Use custom Select only when necessary.
* Provide a visible label.
* Preserve RTL.
* Keep values stable.
* Support keyboard navigation.
* Validate values server-side.
* Scope CSS.
* Use Design Tokens.
* Keep business logic outside the component.
* Preserve Theme independence.

---

# 63. Don't

Avoid:

* Replacing every native Select with JavaScript.
* Using Dropdown as a Select.
* Using Select for huge datasets without search.
* Using translated labels as database identifiers.
* Trusting submitted values without server validation.
* Globally styling every `<select>`.
* Creating custom Select without keyboard accessibility.
* Forcing RTL on LTR technical values.
* Coupling Select directly to WordPress database queries.

---

# 64. Common LMS Examples

```text id="c8f0e4"
مرتب‌سازی
[ جدیدترین ▼ ]

سطح دوره
[ متوسط ▼ ]

نوع دوره
[ پولی ▼ ]

وضعیت دوره
[ منتشر شده ▼ ]

تکلیف در هر صفحه
[ ۵ ▼ ]

نوع آزمون
[ پایانی ▼ ]
```

## These patterns fit the existing Iran LMS UI direction, where sorting, filtering, pagination size, and assessment states are presented as compact selection controls.

# 65. Related Components

Select integrates with:

```text id="h3q8n5"
Input
Textarea
Checkbox
Switch
Button
Badge
Tooltip
Dropdown
Popover
Modal
Drawer
Alert
Toast
```

Specialized relationships:

```text id="e4m7w9"
Select
 ↓
MultiSelect

Select
 ↓
Autocomplete

Select
 ↓
Filter System
```

These should remain separate components when their interaction model becomes substantially different.

---

# 66. Testing Requirements

Test the Select in:

```text id="f6m0z2"
Default
Hover
Focus
Open
Selected
Disabled
Loading
Error
Empty
No Results
RTL
LTR
Mobile
Tablet
Desktop
Dark Mode
WordPress Admin
Frontend
```

Keyboard tests:

```text id="h4n5j8"
Tab
Enter
Space
Arrow Up
Arrow Down
Home
End
Escape
```

Accessibility tests:

```text id="b8w4n1"
Label Association
Accessible Name
Focus Visibility
Selected State
Keyboard Navigation
Screen Reader
Error Association
Required State
```

Dynamic tests:

```text id="r7q2m5"
Loading Options
Successful Request
Empty Response
Failed Request
Retry
```

---

# 67. Architecture Decision

Iran LMS follows a **Progressive Select Architecture**:

```text id="a7f3x9"
Simple Selection
      ↓
Native <select>
      ↓
Need richer UI?
      ↓
Custom Select
      ↓
Need search?
      ↓
Autocomplete
      ↓
Need multiple values?
      ↓
MultiSelect
```

This prevents unnecessary complexity in the core component system.

---

# 68. Strategic Vision

Select is a foundational form component for Iran LMS.

Its architecture must remain simple enough for ordinary WordPress forms while being extensible enough to support:

* Course Filters
* Course Settings
* Assessment Configuration
* Pagination
* Instructor Selection
* Category Selection
* Administrative Configuration

The long-term goal is a **WordPress-native, RTL-first, accessible, responsive, Theme-independent selection system** that uses native browser behavior whenever possible and introduces custom interaction only when the LMS genuinely requires it.
