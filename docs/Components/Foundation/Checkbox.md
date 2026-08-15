# Checkbox

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Form Control
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The Checkbox component represents an independent boolean choice or a selectable item within a group of options.

In Iran LMS, Checkbox is primarily used for:

* Course filters
* Assignment filters
* Category filters
* Permission settings
* User preferences
* Notification settings
* Course configuration
* Assessment configuration
* Bulk selection
* Terms acceptance
* Feature activation
* Admin settings

The Checkbox must remain a reusable UI control and must not contain LMS business logic.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Checkbox must be:

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

The component should work consistently in both:

```text
Frontend
WordPress Admin
```

without being coupled to either one.

---

# 3. Native HTML

Checkbox should use the native HTML element whenever possible:

```html
<input type="checkbox">
```

Native browser behavior provides:

* Keyboard interaction
* Focus behavior
* Form submission
* Screen reader semantics
* Checked state
* Disabled state

A custom visual layer may be applied, but the underlying semantic control should remain accessible.

---

# 4. LMS Use Cases

Examples:

```text
☑ همه دوره‌ها

☐ در حال یادگیری

☐ تکمیل شده

☐ توقف شده
```

This pattern is already used in the LMS course filtering experience.

Other examples:

```text
☐ دریافت اعلان‌های دوره

☐ دریافت ایمیل‌های آموزشی

☑ نمایش دوره‌های رایگان

☐ فعال‌سازی گواهینامه
```

---

# 5. Anatomy

A Checkbox normally consists of:

```text
Checkbox
    +
Label
    +
Optional Description
```

Example:

```text
┌───┐
│ ✓ │  دوره‌های تکمیل‌شده
└───┘
      دوره‌هایی که قبلاً به پایان رسانده‌اید
```

The actual input should remain associated with its label.

---

# 6. Checkbox vs Switch

Checkbox represents a choice.

Switch represents an immediate on/off setting.

Use Checkbox:

```text
☑ برنامه‌نویسی
☐ طراحی
☐ بازاریابی
```

Use Switch:

```text
اعلان‌ها

[ فعال ●──── ]
```

Do not use Switch for multi-selection.

---

# 7. Checkbox vs Radio

Checkbox:

```text
Multiple values can be selected.
```

Radio:

```text
Only one value can be selected.
```

Example:

```text
☑ برنامه‌نویسی
☑ طراحی
☐ بازاریابی
```

versus:

```text
○ مبتدی
○ متوسط
● پیشرفته
```

If only one option is allowed, Checkbox is the wrong component.

---

# 8. States

Checkbox supports:

```text
Unchecked
Checked
Indeterminate
Hover
Focus
Disabled
Error
Loading
```

Not every context requires every state.

---

# 9. Unchecked

Default state:

```text
┌───┐
│   │  اعلان‌های ایمیلی
└───┘
```

The unchecked state must remain clearly visible against the surrounding background.

---

# 10. Checked

Checked state:

```text
┌───┐
│ ✓ │  اعلان‌های ایمیلی
└───┘
```

The check indicator must remain distinguishable in:

* Light Mode
* Dark Mode
* High Contrast

Do not rely only on background color.

---

# 11. Indeterminate

Indeterminate represents a partially selected group.

Example:

```text
┌────┐
│ —  │  همه دسته‌ها
└────┘
```

Example hierarchy:

```text
☐ همه دوره‌ها

    ☑ برنامه‌نویسی
    ☑ طراحی
    ☐ بازاریابی
```

The parent may become indeterminate.

This state is especially useful for bulk-selection interfaces.

---

# 12. Group Selection

When multiple related options exist, Checkbox groups should be used.

Example:

```text
وضعیت دوره

☑ همه دوره‌ها
☐ در حال یادگیری
☐ تکمیل شده
☐ توقف شده
```

The parent feature owns the selection logic.

Checkbox only reports its value.

---

# 13. Select All

Select-all is a common LMS pattern.

Recommended behavior:

```text
None selected
→ unchecked

Some selected
→ indeterminate

All selected
→ checked
```

Example:

```text
☐ انتخاب همه

☑ دوره ۱
☑ دوره ۲
☐ دوره ۳
```

The Checkbox component should expose the state.

The selection algorithm belongs to the parent component.

---

# 14. Label

Every Checkbox should normally have a meaningful label.

Example:

```html
<label>
    <input type="checkbox">
    دوره‌های تکمیل‌شده
</label>
```

The label should provide enough information to understand the choice without requiring visual context.

---

# 15. Description

A Checkbox may include secondary explanatory text.

Example:

```text
☐ دریافت اعلان‌های ایمیلی

    اطلاعیه‌های مهم دوره از طریق ایمیل ارسال می‌شوند.
```

Descriptions should remain concise.

---

# 16. Required Checkbox

For legal or mandatory agreement fields:

```text
☐ قوانین و شرایط را می‌پذیرم
```

The parent form may use:

```html
required
```

The server must also validate the submitted state.

---

# 17. Terms and Conditions

For acceptance controls:

```text
☐ قوانین و شرایط استفاده از دوره را می‌پذیرم.
```

Do not automatically check acceptance.

The user must explicitly perform the action unless there is a legally and technically valid reason otherwise.

---

# 18. Disabled

Disabled Checkbox indicates that the option cannot currently be changed.

Example:

```text
☑ گواهینامه خودکار

    این قابلیت توسط مدیر سیستم غیرفعال شده است.
```

Disabled state should remain readable.

---

# 19. Permission-Based Options

Some settings may depend on user permissions.

Example:

```text
☐ انتشار خودکار دوره
```

The frontend may hide or disable unavailable options.

However:

**UI restrictions are not security controls.**

The server must still enforce permissions.

---

# 20. Hover

Hover may subtly change:

* Background
* Border
* Label color

Hover should not be the only indication of interactivity.

---

# 21. Focus

Checkbox must have a visible keyboard focus state.

Example:

```text
☐  دوره‌های من
   └── visible focus ring
```

Focus must work in:

* Frontend
* Admin
* Light Mode
* Dark Mode
* RTL

---

# 22. Error State

Checkbox may become invalid.

Example:

```text
☐ قوانین و شرایط را می‌پذیرم

لطفاً برای ادامه، پذیرش قوانین را تأیید کنید.
```

Error indication must not depend solely on color.

---

# 23. Loading State

A Checkbox may temporarily become unavailable while an asynchronous operation is processing.

Example:

```text
◌ ذخیره تنظیمات اعلان
```

However, loading behavior belongs primarily to the parent feature.

Do not add unnecessary loading behavior to simple local Checkbox interactions.

---

# 24. RTL

Iran LMS is RTL-first.

Checkbox must support:

* RTL labels
* Logical spacing
* Persian text
* Logical alignment
* RTL-aware groups

The physical position of the Checkbox should follow the project's RTL component rules.

---

# 25. Checkbox Position

In RTL layouts, the Checkbox and label should follow a consistent project-wide convention.

For example:

```text
┌───┐
│ ✓ │  دریافت اعلان
└───┘
```

or the reverse arrangement if defined by the final Design System.

The important requirement is consistency across the entire product.

Do not create page-specific Checkbox alignment.

---

# 26. Mixed Direction Labels

Labels may contain English technical terms.

Example:

```text
☐ فعال‌سازی REST API
```

The overall layout remains RTL while embedded technical terms retain appropriate direction.

---

# 27. Size

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

* Checkbox dimensions
* Label typography
* Spacing
* Focus ring
* Description spacing

---

# 28. Touch Target

The clickable area should be larger than the visual checkbox itself when possible.

Recommended interaction model:

```text
[ Checkbox + Label + Description ]
          ↓
      Clickable Area
```

The user should not have to click precisely on the small square.

---

# 29. Keyboard Interaction

Native Checkbox behavior should be preserved.

Expected:

```text
Tab
↓
Focus
```

```text
Space
↓
Toggle
```

Do not require mouse interaction.

---

# 30. Form Submission

Checkbox values may be submitted using standard HTML forms.

Example:

```html
<input
    type="checkbox"
    name="enable_certificate"
    value="1"
>
```

The backend must account for the fact that an unchecked checkbox may not submit a value at all.

---

# 31. WordPress Form Handling

Checkbox values may arrive through:

```text
POST
GET
AJAX
REST API
```

The feature handling the request must normalize the value before applying business logic.

Do not assume:

```text
missing value = explicit false
```

without considering the specific form contract.

---

# 32. WordPress Settings

Checkbox is especially useful in WordPress plugin settings.

Examples:

```text
☑ فعال‌سازی اعلان‌ها

☑ فعال‌سازی گواهینامه

☐ فعال‌سازی کیف پول

☑ فعال‌سازی Gamification
```

The Settings module owns:

* Storage
* Defaults
* Validation
* Permissions

Checkbox only represents the setting.

---

# 33. Course Settings

Possible course-level settings:

```text
☐ نمایش گواهینامه

☑ فعال بودن دوره

☐ نیاز به تأیید مدرس

☐ نمایش پیشرفت

☑ اجازه ثبت دیدگاه
```

These values must map to domain rules defined by the Courses module.

---

# 34. Lesson Settings

Possible lesson settings:

```text
☑ درس منتشر شده

☐ نمایش به صورت رایگان

☑ قابل تکمیل

☐ نیازمند تکمیل درس قبلی
```

Again, the Checkbox is not responsible for enforcing these rules.

---

# 35. Assessment Settings

Examples:

```text
☑ فعال بودن آزمون

☐ نمایش پاسخ صحیح

☑ محدودیت تعداد تلاش

☐ نمره قبولی اجباری
```

The Assessment module owns the actual behavior.

---

# 36. Notification Settings

Checkboxes can represent notification preferences:

```text
اعلان‌ها

☑ اعلان دوره‌ها

☑ اعلان آزمون‌ها

☐ اعلان تکالیف

☑ اعلان گواهینامه‌ها
```

This aligns with the project's notification settings concept.

---

# 37. Filtering

Checkbox groups are suitable for filtering.

Example:

```text
فیلتر دوره‌ها

وضعیت

☑ همه دوره‌ها
☐ در حال یادگیری
☐ تکمیل شده
☐ توقف شده
```

The selected state should update the parent filter state.

---

# 38. URL-Based Filters

If Checkbox filters are reflected in the URL:

```text
?status=learning
?status=completed
```

the Checkbox should receive its checked state from the current filter state.

It should not manipulate routing directly.

---

# 39. Bulk Actions

Checkbox is useful for selecting multiple records.

Example:

```text
☑ انتخاب همه

☑ دوره React
☐ دوره PHP
☑ دوره WordPress
```

Then:

```text
[ حذف انتخاب‌شده‌ها ]
```

The bulk-action system owns:

* Selection
* Validation
* Authorization
* Execution

---

# 40. Security

Checkbox does not enforce security.

A malicious request can submit arbitrary values regardless of the UI.

For privileged actions, server-side checks must include:

```text
Nonce
Capability
Permission
Resource Ownership
Business Rules
```

Example:

```text
☑ انتشار دوره
```

does not grant the user permission to publish.

---

# 41. Server-Side Validation

All important Checkbox values should be validated on the server.

Example:

```text
Submitted:
enable_certificate = 1

↓

Is this option valid?

↓

Does the user have permission?

↓

Is this feature enabled?

↓

Save
```

The server remains authoritative.

---

# 42. Sanitization

Checkbox values should be normalized according to the expected application contract.

For example:

```text
0
1
true
false
```

should not be interpreted inconsistently across different modules.

Iran LMS should define a consistent boolean normalization strategy.

---

# 43. Boolean Contract

Recommended internal representation:

```text
true
false
```

Transport formats such as:

```text
1
0
```

may be used where required by WordPress or API contracts.

The component should not decide the storage representation.

---

# 44. Accessibility

Checkbox must support:

* WCAG 2.2 AA
* Native semantics
* Keyboard Navigation
* Visible Focus
* Accessible Label
* Required State
* Invalid State
* Disabled State
* Screen Readers

---

# 45. Accessible Label

Avoid:

```text
☐
```

without a meaningful accessible name.

Prefer:

```text
☐ فعال‌سازی گواهینامه
```

For icon-only or visually unusual implementations, an accessible name must still be provided.

---

# 46. Error Accessibility

When invalid:

```html
aria-invalid="true"
```

may be used.

The error message should be associated with the Checkbox using:

```text
aria-describedby
```

Example:

```html
<input
    type="checkbox"
    id="terms"
    aria-invalid="true"
    aria-describedby="terms-error"
>
```

---

# 47. Group Accessibility

When a group contains multiple related Checkbox controls, the group should have a meaningful accessible label.

Conceptually:

```text
وضعیت دوره

☐ در حال یادگیری
☐ تکمیل شده
☐ توقف شده
```

The group should communicate its purpose to assistive technology.

---

# 48. Fieldset and Legend

For semantic groups, native HTML may be preferable:

```html
<fieldset>
    <legend>وضعیت دوره</legend>

    ...
</fieldset>
```

This is especially useful for form groups.

---

# 49. Custom Checkbox

A custom visual Checkbox may be used to achieve the Iran LMS visual language.

However:

```text
Visual Layer
    ↓
Native Input
    ↓
Semantic State
```

should remain the preferred architecture.

Do not replace the input with a non-semantic `<div>` merely for styling.

---

# 50. CSS Architecture

Avoid global rules such as:

```css
input[type="checkbox"] {
}
```

if they could affect unrelated Theme or WordPress controls.

Prefer scoped selectors:

```css
.iran-lms-checkbox {
}
```

The final class naming convention must follow the project's CSS architecture.

---

# 51. Design Tokens

Relevant tokens may include:

```text
checkbox-size

checkbox-radius

checkbox-border

checkbox-background

checkbox-checked-background

checkbox-checked-icon

checkbox-focus-ring

checkbox-disabled

checkbox-error

checkbox-gap

checkbox-label-color

checkbox-description-color
```

The source of truth is:

```text
05-UI/28-Design-Tokens.md
```

---

# 52. Dark Mode

Checkbox must support the shared Dark Mode system.

The following states must remain distinguishable:

```text
Unchecked
Checked
Indeterminate
Disabled
Focus
Error
```

Do not rely on hard-coded light-theme colors.

---

# 53. Responsive Behavior

Checkbox should remain usable at:

```text
Desktop
Tablet
Mobile
```

On mobile:

* Increase effective touch area.
* Avoid overly small labels.
* Allow long Persian labels to wrap naturally.
* Preserve logical spacing.

---

# 54. Long Labels

Long labels should wrap without breaking the checkbox layout.

Example:

```text
☐ با فعال‌سازی این گزینه، دانشجو پس از تکمیل تمام
   درس‌های دوره گواهینامه دریافت خواهد کرد.
```

The checkbox itself should remain aligned with the first line or according to the project's established alignment rule.

---

# 55. Text Wrapping

Do not force:

```text
white-space: nowrap;
```

on every Checkbox label.

Persian text may naturally require multiple lines.

---

# 56. State Synchronization

When the Checkbox is controlled by application state:

```text
Application State
      ↓
checked
      ↓
Checkbox
      ↓
User Interaction
      ↓
onChange
      ↓
Application State
```

The component should not maintain a competing business state.

---

# 57. React / JavaScript Consideration

Iran LMS is a WordPress Plugin and should not assume that every UI is React-based.

Therefore the Checkbox contract should be framework-independent.

Possible implementations include:

```text
PHP + HTML
Vanilla JS
WordPress Blocks
React
Other frontend layer
```

The semantic component behavior must remain consistent.

---

# 58. PHP Rendering

A PHP-rendered Checkbox may conceptually receive:

```text
label
name
value
checked
disabled
required
description
error
```

The renderer should escape output appropriately.

Business rules should remain outside the renderer.

---

# 59. AJAX / REST

Checkbox changes may trigger asynchronous operations.

Example:

```text
☑ فعال‌سازی اعلان‌ها
       ↓
Request
       ↓
Loading
       ↓
Saved
```

The request layer belongs to the parent feature.

The Checkbox only exposes the changed state.

---

# 60. Optimistic Updates

For low-risk settings, an interface may update immediately:

```text
User toggles
    ↓
UI updates
    ↓
Request
    ↓
Success
```

If the request fails:

```text
UI rollback
    ↓
Error feedback
```

This is a feature-level interaction pattern, not a requirement of the Checkbox component.

---

# 61. Do

* Use native checkbox semantics.
* Provide a meaningful label.
* Support keyboard interaction.
* Support indeterminate state where needed.
* Support RTL.
* Keep touch targets usable.
* Use Design Tokens.
* Scope CSS.
* Validate server-side.
* Keep business logic outside the component.
* Preserve Theme independence.

---

# 62. Don't

Avoid:

* Using Checkbox for single-choice selections.
* Using Checkbox where a Switch is semantically better.
* Replacing native input with a `<div>`.
* Relying only on color.
* Assuming unchecked values are always submitted.
* Trusting client-side checked state.
* Globally styling all checkboxes.
* Embedding database logic in the component.
* Creating separate RTL/LTR Checkbox components.

---

# 63. Common LMS Examples

```text
فیلتر دوره‌ها

☑ همه دوره‌ها
☐ در حال یادگیری
☐ تکمیل شده
☐ توقف شده
```

```text
تنظیمات اعلان

☑ اعلان دوره‌ها
☑ اعلان آزمون‌ها
☐ اعلان تکالیف
☑ اعلان گواهینامه‌ها
```

```text
تنظیمات دوره

☑ فعال بودن دوره
☐ نمایش رایگان
☑ صدور گواهینامه
☐ نیاز به تأیید مدرس
```

---

# 64. Related Components

Checkbox integrates with:

```text
Input
Textarea
Select
Switch
Radio
Button
FormField
Alert
Toast
Modal
Drawer
Table
Filter
```

Especially important compositions:

```text
Checkbox + Filter
Checkbox + Table
Checkbox + Form
Checkbox + Modal
Checkbox + Bulk Actions
```

---

# 65. Testing Requirements

Test:

```text
Unchecked
Checked
Indeterminate
Hover
Focus
Disabled
Error
Loading
RTL
LTR
Mobile
Tablet
Desktop
Dark Mode
WordPress Admin
Frontend
```

Keyboard:

```text
Tab
Space
Shift + Tab
```

Accessibility:

```text
Label Association
Accessible Name
Group Label
Required State
Invalid State
Focus Visibility
Screen Reader
```

Functional:

```text
Single Selection
Multiple Selection
Select All
Partial Selection
Form Submission
AJAX
REST
Validation Failure
Permission Failure
```

---

# 66. Architecture Decision

Iran LMS follows a **Native Semantic Checkbox Architecture**:

```text
Native Checkbox
      ↓
Visual Component
      ↓
Form / Filter / Setting
      ↓
Application State
      ↓
WordPress / REST / AJAX
      ↓
Server Validation
      ↓
Business Logic
```

The Checkbox remains a simple, reusable control.

---

# 67. Strategic Vision

Checkbox is a foundational component of Iran LMS and must support both simple form controls and more advanced LMS interactions such as:

* Course Filtering
* Bulk Selection
* Notification Preferences
* Course Settings
* Assessment Settings
* Permission-related UI
* Feature Configuration

The long-term goal is a **WordPress-native, RTL-first, accessible, responsive, Theme-independent Checkbox system** that preserves native browser semantics while remaining visually consistent with the Iran LMS Design System.
