# Switch

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Boolean Control
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

The Switch component represents an immediate or persistent **on/off state**.

It is intended for settings and features where the user is deciding whether something is:

```text
ON
یا
OFF
```

Typical Iran LMS use cases:

* Enable/disable notifications
* Enable/disable certificates
* Enable/disable course features
* Focus Mode settings
* Visibility settings
* Automatic behaviors
* Student preferences
* Instructor preferences
* Plugin settings
* Admin configuration

The Switch must remain a reusable UI component and must not contain LMS business logic.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Switch must be:

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

The component must work consistently in:

```text
Frontend
Student Dashboard
Instructor Dashboard
WordPress Admin
Plugin Settings
```

---

# 3. Switch vs Checkbox

This distinction is critical.

### Switch

Use when the setting represents an active/inactive state.

```text
اعلان‌ها

[ ●──── ] فعال
```

### Checkbox

Use when the user is selecting one or more options.

```text
☑ برنامه‌نویسی
☑ طراحی
☐ بازاریابی
```

A Switch normally represents **one boolean setting**.

A Checkbox normally represents **selection within a form or group**.

---

# 4. Switch vs Button

A Switch represents state.

A Button represents an action.

Correct:

```text
اعلان‌ها
[ ON ]
```

Incorrect:

```text
[ فعال‌سازی ]
```

The second example is an action and should use Button.

---

# 5. Switch vs Select

Switch:

```text
فعال‌سازی گواهینامه
[ ON ]
```

Select:

```text
نوع گواهینامه
[ استاندارد ▼ ]
```

Use Switch only when the domain value is genuinely boolean.

---

# 6. Native Implementation

For a boolean form control, the underlying semantic element should preferably be:

```html
<input type="checkbox">
```

The visual presentation can be styled as a switch.

Conceptually:

```text
Native Checkbox
      ↓
Switch Presentation
      ↓
Boolean State
```

This preserves native form and accessibility behavior.

---

# 7. Why Not Use a `<div>`?

Avoid implementing a Switch as:

```html
<div class="switch"></div>
```

without an accessible control.

This causes problems with:

* Keyboard interaction
* Screen readers
* Forms
* Focus
* State semantics
* Accessibility

The visual Switch should be backed by a semantic control.

---

# 8. Anatomy

A standard Switch consists of:

```text
Label
Description
Switch Control
```

Example:

```text
اعلان‌های دوره
اعلان‌های مهم مربوط به دوره برای شما ارسال شود.

                         [ ●──── ]
```

The exact visual arrangement must follow the global RTL component rules.

---

# 9. Basic Structure

Conceptually:

```text
┌─────────────────────────────────────┐
│ فعال‌سازی اعلان‌ها          [ ●── ] │
│ دریافت اعلان‌های مهم دوره           │
└─────────────────────────────────────┘
```

The label and description explain what the state controls.

The Switch controls only the boolean value.

---

# 10. States

Supported states:

```text
OFF
ON
HOVER
FOCUS
DISABLED
LOADING
ERROR
```

A Switch does not need an indeterminate state.

If partial selection is required, use Checkbox instead.

---

# 11. OFF State

Example:

```text
اعلان‌های ایمیلی

[ ───● ] خاموش
```

The inactive state must be visually distinguishable.

Do not rely solely on a very subtle color difference.

---

# 12. ON State

Example:

```text
اعلان‌های ایمیلی

[ ●─── ] روشن
```

The active state should communicate that the feature is enabled.

Color may be used as an additional signal, but not the only signal.

---

# 13. Hover State

Hover may modify:

* Track color
* Thumb color
* Background
* Shadow

Hover must not be required to understand the state.

---

# 14. Focus State

Keyboard focus must be clearly visible.

Example:

```text
[ ●─── ]
   ↑
Focus Ring
```

Focus must remain visible in:

* Light Mode
* Dark Mode
* RTL
* WordPress Admin
* Frontend

---

# 15. Disabled State

Disabled means the user cannot currently change the state.

Example:

```text
گواهینامه خودکار

[ ───● ] غیرفعال

این قابلیت توسط مدیر سیستم کنترل می‌شود.
```

Disabled controls must remain readable.

---

# 16. Loading State

Loading is useful when changing the Switch triggers an asynchronous operation.

Example:

```text
فعال‌سازی اعلان‌ها

[ ◌──── ]
در حال ذخیره...
```

The loading state should prevent conflicting interactions.

---

# 17. Error State

If changing the Switch fails:

```text
فعال‌سازی اعلان‌ها

[ ●─── ]

ذخیره تنظیمات انجام نشد.
لطفاً دوباره تلاش کنید.
```

The parent feature owns the error handling.

The Switch exposes the current state.

---

# 18. Label

Every Switch should have a meaningful accessible label.

Good:

```text
فعال‌سازی اعلان‌ها
```

Bad:

```text
[ ●─── ]
```

without an accessible name.

---

# 19. Description

Settings often need a short description.

Example:

```text
مسدود کردن اعلان‌ها

اعلان‌ها در حین Focus Mode خاموش می‌شوند.

[ ●─── ]
```

The description should explain the consequence of enabling the setting.

The Focus Mode UI specifically contains settings such as blocking notifications, locking the course, automatic breaks, and dark background.

---

# 20. Immediate State Change

A Switch generally implies that the state changes immediately after interaction.

Typical flow:

```text
User clicks
    ↓
State changes
    ↓
UI updates
    ↓
Optional persistence request
```

This differs from a Checkbox inside a form that may require a separate Submit action.

---

# 21. Persistence

A Switch may represent:

```text
Local UI State
User Preference
Course Setting
Plugin Setting
Database Setting
```

The component does not decide where the value is stored.

---

# 22. Data Flow

Recommended:

```text
Application State
      ↓
Switch
      ↓
User Interaction
      ↓
onChange
      ↓
Application State
      ↓
Persistence Layer
```

Persistence may use:

```text
WordPress Settings API
REST API
AJAX
Form POST
Custom Database
```

---

# 23. WordPress Settings

Switch is particularly suitable for plugin settings.

Examples:

```text
فعال‌سازی اعلان‌ها          [ ON ]

فعال‌سازی گواهینامه         [ ON ]

فعال‌سازی Gamification      [ OFF ]

فعال‌سازی کیف پول           [ OFF ]
```

The Settings module owns:

* Default value
* Validation
* Permission
* Storage
* Migration

---

# 24. Course Settings

Possible settings:

```text
فعال بودن دوره              [ ON ]

نمایش گواهینامه             [ ON ]

فعال‌سازی نظرات             [ OFF ]

فعال‌سازی پیش‌نیاز           [ ON ]

ثبت‌نام خودکار               [ OFF ]
```

The Courses module owns the business rules.

---

# 25. Lesson Settings

Possible lesson settings:

```text
قابل تکمیل بودن درس         [ ON ]

نمایش رایگان                [ OFF ]

اجباری بودن درس             [ ON ]

فعال بودن درس               [ ON ]
```

The Switch only represents the setting.

---

# 26. Assessment Settings

Examples:

```text
فعال بودن آزمون             [ ON ]

نمایش پاسخ صحیح             [ OFF ]

محدودیت تعداد تلاش          [ ON ]

نیاز به نمره قبولی          [ ON ]
```

Assessment logic belongs to the Assessment module.

---

# 27. Notification Settings

Switch is highly appropriate for notification preferences.

Example:

```text
تنظیمات اعلان‌ها

تکالیف                      [ ON ]
آزمون‌ها                     [ ON ]
پیام‌ها                      [ ON ]
جلسات زنده                  [ ON ]
اعلان‌های سیستم             [ OFF ]
خبرنامه و پیشنهادها         [ OFF ]
```

The notification dashboard design uses exactly this pattern of independent toggle settings.

---

# 28. Focus Mode

Focus Mode is another important use case.

Example:

```text
تنظیمات فوکوس

مسدود کردن اعلان‌ها
اعلان‌ها در حین تمرکز خاموش می‌شوند.
[ ON ]

قفل کردن دوره
خروج از دوره تا پایان جلسه غیرفعال است.
[ ON ]

شروع خودکار وقفه
بعد از هر جلسه، وقفه کوتاه شروع شود.
[ OFF ]

پس‌زمینه تیره
برای کاهش خستگی چشم.
[ OFF ]
```

These settings correspond directly to the existing Focus Mode concept.

---

# 29. Category Filters

Switch may be used when a filter represents a true binary condition.

Example:

```text
نمایش فقط دسته‌های دارای دوره

[ ON ]
```

This pattern is already present in the category UI.

However, category selections such as:

```text
☑ فارسی
☑ انگلیسی
☐ سایر
```

should remain Checkboxes.

---

# 30. Filter Semantics

Use Switch for:

```text
نمایش فقط دوره‌های رایگان
[ ON ]
```

Use Checkbox for:

```text
زبان دوره

☑ فارسی
☐ انگلیسی
☐ سایر
```

Use Select for:

```text
مرتب‌سازی
[ جدیدترین ▼ ]
```

This creates a predictable filtering system.

---

# 31. Boolean Contract

Internally, the component should represent:

```text
true
false
```

Transport formats may be:

```text
1
0
```

or:

```text
true
false
```

depending on the API.

The Switch should not dictate database representation.

---

# 32. Server-Side Validation

The server must validate all important Switch changes.

Example:

```text
User
 ↓
enable_certificate = true
 ↓
Permission Check
 ↓
Feature Check
 ↓
Business Rule
 ↓
Save
```

A user manipulating the request must not gain access to a restricted feature.

---

# 33. Security

The Switch is not a security mechanism.

For privileged settings, validate:

```text
Nonce
Capability
Permission
Resource Ownership
Allowed Value
Business Rules
```

Example:

```text
فعال‌سازی انتشار خودکار دوره
[ ON ]
```

must not allow an unauthorized instructor to bypass publishing permissions.

---

# 34. AJAX

A Switch may save its state through AJAX.

Recommended flow:

```text
OFF
 ↓
User clicks
 ↓
ON
 ↓
Saving
 ↓
Success
```

On failure:

```text
ON
 ↓
Request fails
 ↓
Rollback to OFF
 ↓
Show Error
```

The exact persistence strategy belongs to the parent feature.

---

# 35. REST API

A Switch may update a REST resource.

Example:

```text
PATCH /course/123
```

with:

```json
{
  "certificate_enabled": true
}
```

The endpoint must validate permissions and values server-side.

The Switch does not communicate directly with the database.

---

# 36. Optimistic Updates

Optimistic UI may be used for low-risk settings.

Example:

```text
OFF
 ↓
Click
 ↓
ON
 ↓
Request
```

If the request fails:

```text
ON
 ↓
Failure
 ↓
OFF
```

The user must receive clear feedback.

---

# 37. Confirmation

A Switch normally should not require a confirmation dialog for ordinary reversible settings.

For destructive or high-impact changes, confirmation may be appropriate.

Example:

```text
فعال‌سازی حذف خودکار اطلاعات
```

may require confirmation.

Do not make every Switch interaction unnecessarily heavy.

---

# 38. Confirmation vs Switch

If an action is irreversible:

```text
[ ON ]
```

may be a poor interaction model.

Consider:

```text
[ فعال‌سازی ]
```

followed by confirmation.

Switch is best for reversible state.

---

# 39. RTL

Iran LMS is RTL-first.

The Switch must support:

* RTL labels
* RTL descriptions
* Logical spacing
* Consistent alignment
* Persian typography

The direction of the Switch itself should remain visually understandable regardless of text direction.

---

# 40. ON/OFF Semantics in RTL

Do not assume that the physical left/right position alone communicates state.

For example:

```text
[ ●──── ]
```

should not be interpreted solely through thumb position.

The component should use:

* Visual contrast
* Accessible state
* Optional text
* Consistent project convention

---

# 41. Accessible State

The control must expose its state programmatically.

For native checkbox-based implementations, the checked state is naturally exposed.

For custom implementations, appropriate ARIA semantics must be provided.

Do not rely solely on CSS classes.

---

# 42. Keyboard Interaction

Expected behavior:

```text
Tab
↓
Focus Switch
```

```text
Space
↓
Toggle
```

The interaction must work without a mouse.

Do not invent custom keyboard behavior unnecessarily.

---

# 43. Screen Readers

A screen reader should communicate:

```text
فعال‌سازی اعلان‌ها
Switch
On
```

or equivalent semantic information.

The accessible name should describe the controlled setting.

---

# 44. Error Accessibility

If a Switch has an associated error:

```text
aria-invalid="true"
```

may be used where appropriate.

The error message should be programmatically associated with the control.

---

# 45. Touch Target

The effective touch target should be comfortable on mobile.

Prefer making the entire setting row interactive where appropriate:

```text
┌──────────────────────────────────┐
│ اعلان‌ها                    [ON] │
│ دریافت اعلان‌های مهم             │
└──────────────────────────────────┘
```

The actual Switch remains the semantic control.

---

# 46. Mobile

On mobile:

```text
Label + Description
        ↓
Switch
```

may stack if horizontal space is limited.

Long Persian descriptions should wrap naturally.

Avoid excessively small controls.

---

# 47. Dark Mode

Switch must use the shared Dark Mode token system.

Required states:

```text
OFF
ON
FOCUS
DISABLED
ERROR
LOADING
```

The active and inactive states must remain clearly distinguishable.

---

# 48. Design Tokens

Recommended tokens:

```text
switch-width

switch-height

switch-thumb-size

switch-track-radius

switch-thumb-radius

switch-gap

switch-off-background

switch-on-background

switch-off-border

switch-on-border

switch-thumb

switch-focus-ring

switch-disabled

switch-error

switch-transition
```

The source of truth is:

```text
05-UI/28-Design-Tokens.md
```

---

# 49. Animation

Switch state changes should use a short transition.

Example:

```text
OFF
 ↓
Thumb moves
 ↓
ON
```

Recommended animation characteristics:

```text
Short
Subtle
Predictable
Interruptible
```

Avoid exaggerated motion.

The component should respect reduced-motion preferences.

---

# 50. Reduced Motion

When the user has requested reduced motion:

```text
@media (prefers-reduced-motion: reduce)
```

the transition should be reduced or removed.

State changes must remain understandable without animation.

---

# 51. Component API

Recommended properties:

```text
id

name

label

description

checked

defaultChecked

disabled

required

loading

error

size

onChange

ariaLabel

ariaDescribedBy
```

The exact API depends on the implementation layer.

---

# 52. Controlled State

For application-driven interfaces:

```text
checked
```

should be controlled by the parent state.

Example:

```text
Application State
      ↓
checked=true
      ↓
Switch
```

The Switch should not silently maintain a second source of truth.

---

# 53. Uncontrolled State

Simple forms may use an uncontrolled native checkbox.

Example:

```html
<input
    type="checkbox"
    name="enable_notifications"
/>
```

This is appropriate when no immediate application-state synchronization is required.

---

# 54. Component Boundary

Switch owns:

```text
Visual Presentation
Interaction
Focus
Accessibility
State Representation
```

Switch does not own:

```text
Database
Permissions
Course Logic
Enrollment
Payment
Assessment Rules
Notification Delivery
API Authorization
```

---

# 55. WordPress Admin

When used inside WordPress Admin:

* Scope CSS.
* Avoid globally overriding WordPress controls.
* Preserve admin accessibility.
* Avoid conflicts with existing plugins.
* Keep the component isolated.

Avoid:

```css
input[type="checkbox"] {
}
```

as a global rule.

Prefer:

```css
.iran-lms-switch {
}
```

or the project's final component naming convention.

---

# 56. Theme Compatibility

Iran LMS is a plugin and must not assume a particular Theme.

Switch should work with:

```text
Block Themes
Classic Themes
Custom Themes
RTL Themes
Dark Themes
Light Themes
```

The component should rely on Iran LMS tokens rather than Theme-specific CSS.

---

# 57. Module Independence

Switch may be consumed by:

```text
Core
Courses
Learning
Assessments
Certificates
Communication
Gamification
Settings
Notifications
Focus Mode
```

None of these modules should fork the base Switch implementation.

---

# 58. Do

* Use Switch for boolean state.
* Prefer native checkbox semantics.
* Make state accessible.
* Support keyboard interaction.
* Support RTL.
* Support Dark Mode.
* Use shared Design Tokens.
* Keep business logic outside the component.
* Validate server-side.
* Support loading/error feedback where necessary.
* Respect reduced motion.
* Keep Theme independence.

---

# 59. Don't

Avoid:

* Using Switch for multi-selection.
* Using Switch as a Button.
* Using a `<div>` as the only interactive element.
* Relying solely on color.
* Relying solely on thumb position.
* Adding confirmation to every toggle.
* Trusting client-side state for permissions.
* Globally styling all WordPress checkboxes.
* Coupling Switch directly to database queries.
* Creating separate RTL and LTR components.

---

# 60. Common LMS Examples

### Notification

```text
اعلان‌های دوره
دریافت اطلاعیه‌های مهم دوره

[ ON ]
```

### Certificate

```text
صدور گواهینامه
پس از تکمیل دوره، گواهینامه صادر شود.

[ ON ]
```

### Focus Mode

```text
مسدود کردن اعلان‌ها
اعلان‌ها در حین تمرکز خاموش شوند.

[ ON ]
```

### Category Filter

```text
نمایش فقط دسته‌های دارای دوره

[ ON ]
```

### Course Setting

```text
فعال بودن دوره

[ ON ]
```

---

# 61. Related Components

Switch integrates with:

```text
Checkbox
Radio
Select
Input
Button
FormField
Alert
Toast
Modal
Drawer
SettingsPanel
FilterPanel
```

Important compositions:

```text
Switch + Settings
Switch + Form
Switch + Card
Switch + Drawer
Switch + Modal
Switch + Notification
```

---

# 62. Testing Requirements

Test:

```text
OFF
ON
Hover
Focus
Disabled
Loading
Error
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
Accessible Name
Checked State
Focus Visibility
Keyboard Interaction
Screen Reader
Disabled State
Error Association
```

Persistence:

```text
Local State
Form Submit
AJAX
REST
Successful Save
Failed Save
Rollback
Permission Failure
```

Motion:

```text
Normal Motion
Reduced Motion
```

---

# 63. Architecture Decision

Iran LMS follows a **Semantic Boolean Switch Architecture**:

```text
Native Checkbox
      ↓
Switch Presentation
      ↓
Boolean State
      ↓
Application State
      ↓
Persistence
      ↓
Server Validation
      ↓
Business Logic
```

This keeps the component lightweight while allowing it to serve the entire LMS.

---

# 64. Strategic Vision

Switch is one of the most important controls for the Iran LMS settings ecosystem.

It should provide a consistent way to control boolean features across:

* Student Preferences
* Instructor Settings
* Course Configuration
* Assessment Configuration
* Notification Settings
* Focus Mode
* Plugin Settings
* WordPress Admin

The long-term goal is a **WordPress-native, RTL-first, accessible, responsive and Theme-independent Switch component** that behaves like a true boolean control rather than a visually styled button.
