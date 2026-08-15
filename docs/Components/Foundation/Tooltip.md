# Tooltip

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Contextual Feedback Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Tooltip is a lightweight contextual component used to provide additional information about an interface element without permanently occupying layout space.

In Iran LMS, Tooltip is primarily useful for:

* Icon-only actions
* Abbreviated labels
* Secondary explanations
* Additional context
* Compact dashboard controls
* Table actions
* Navigation items in collapsed Sidebar
* Unfamiliar icons
* Truncated UI labels

Tooltip should be treated as **supplementary information**, not as the primary way to communicate essential content.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Tooltip must be:

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

Tooltip must not contain business logic.

---

# 3. Tooltip Is Not a Notification

Tooltip:

```text
Provides contextual information
```

Notification:

```text
Communicates an event or state
```

Example Tooltip:

```text
[ ⚙ ]
   ↓
تنظیمات حساب کاربری
```

Example Notification:

```text
🔔
تکلیف جدید برای شما ثبت شد.
```

The second belongs to the Notification/Feedback system.

---

# 4. Tooltip Is Not a Modal

Tooltip should contain short contextual information.

Good:

```text
[ ↗ ]
مشاهده در پنجره جدید
```

Bad:

```text
[ ↗ ]
مشاهده دوره

عنوان دوره
مدرس
قیمت
توضیحات کامل
دکمه ثبت‌نام
...
```

The second should use a Popover, Dialog, or another appropriate component.

---

# 5. Tooltip Is Not a Replacement for Labels

Do not hide essential information inside Tooltip.

Bad:

```text
[ 📝 ]
```

where the user must hover to discover that it means:

```text
تکالیف
```

If the interface has enough space, show:

```text
[ 📝 ] تکالیف
```

Tooltip may supplement the label.

---

# 6. Primary Use Case

The most important use case in Iran LMS is **icon-only controls**.

Example:

```text
[ 🔔 ]
```

Tooltip:

```text
اعلان‌ها
```

The underlying Button must still have an accessible name.

Tooltip is visual/contextual assistance.

---

# 7. Icon-Only Actions

Examples:

```text
[ ✏ ] → ویرایش
[ 🗑 ] → حذف
[ 👁 ] → مشاهده
[ ⬇ ] → دانلود
[ 🔗 ] → کپی لینک
[ ⋮ ] → گزینه‌های بیشتر
```

Tooltip can identify these actions.

---

# 8. Collapsed Sidebar

When Sidebar is collapsed:

```text
[ 🏠 ]
[ 📚 ]
[ 📝 ]
[ 🎓 ]
[ ⚙ ]
```

Tooltip can expose the navigation label:

```text
داشبورد
دوره‌های من
تکالیف
گواهینامه‌ها
تنظیمات
```

This is an important LMS use case because the Sidebar may switch between expanded and collapsed states.

---

# 9. Tooltip and Navigation

The Navigation component owns:

* Route
* Active state
* Permissions
* Menu structure

Tooltip only provides the hidden label when necessary.

Architecture:

```text
Sidebar
   ↓
Navigation Item
   ↓
Icon
   +
Tooltip
```

---

# 10. Table Actions

Tooltip is useful for compact table actions.

Example:

```text
دوره React
────────────────────
[ 👁 ] [ ✏ ] [ 🗑 ]
```

Tooltips:

```text
مشاهده
ویرایش
حذف
```

The actual actions remain owned by the surrounding Button/Menu components.

---

# 11. Dashboard Metrics

Tooltip can explain unfamiliar metrics.

Example:

```text
پیشرفت کلی   [?]
```

Tooltip:

```text
درصد تکمیل تمام دوره‌های فعال شما
```

This is especially useful for analytics and progress widgets.

---

# 12. Course Information

Course statistics may use Tooltip for additional context.

Example:

```text
۴.۸ ⭐
```

Tooltip:

```text
میانگین امتیاز بر اساس ۲۴۳ نظر
```

The visible UI should still communicate the essential metric.

---

# 13. Lesson Player

Tooltip is useful for compact media controls:

```text
[ ▶ ] [ 🔊 ] [ ⛶ ] [ ⚙ ]
```

Examples:

```text
پخش
صدا
تمام‌صفحه
تنظیمات پخش
```

The Lesson Player owns the controls.

Tooltip only provides contextual labels.

---

# 14. Focus Mode

Focus Mode should minimize distractions.

Therefore Tooltip can be particularly valuable for compact controls:

```text
[ ← ] [ 📝 ] [ 🔖 ] [ ⚙ ]
```

instead of permanently displaying labels.

The Focus Mode design guide emphasizes hiding sidebars and keeping only essential navigation and notes.

---

# 15. Tooltip in Focus Mode

Recommended:

```text
[ 🔖 ]
  ↓
ذخیره نشانک
```

Avoid:

```text
[ 🔖 ] ذخیره نشانک
```

when the interface is intentionally operating in a compact distraction-free state.

---

# 16. Tooltip Trigger

Tooltip may be triggered by:

```text
Hover
Focus
```

For touch devices, hover does not exist reliably.

Therefore mobile behavior must be explicitly defined.

---

# 17. Hover Trigger

Desktop:

```text
Mouse enters trigger
        ↓
Small delay
        ↓
Tooltip appears
```

Avoid showing Tooltip instantly on every mouse movement.

---

# 18. Focus Trigger

Keyboard users must be able to access Tooltip.

Example:

```text
Tab
 ↓
[ ⚙ ]
 ↓
Tooltip appears
```

This is essential for accessibility.

Tooltip must never be hover-only.

---

# 19. Touch Devices

On mobile and touch devices, traditional hover-based Tooltip is unreliable.

Possible strategies:

```text
Touch
 ↓
Use accessible label
```

or:

```text
Touch
 ↓
Use Popover when richer interaction is required
```

Do not require long-press to access essential information.

---

# 20. Tooltip Timing

Recommended behavior:

```text
Initial delay:
~300–500ms

Hide:
Immediately or with very short delay
```

The exact values should be centralized in Design Tokens.

Avoid excessive delays.

---

# 21. Moving Between Tooltips

When moving between nearby tooltip triggers, the system may use a shorter delay.

Example:

```text
[ 👁 ] [ ✏ ] [ 🗑 ]

     ↓ mouse movement

[مشاهده]
         [ویرایش]
                [حذف]
```

Tooltips should not feel sluggish.

---

# 22. Tooltip Position

Supported positions:

```text
Top
Bottom
Start
End
```

The implementation should determine the best position based on available viewport space.

---

# 23. Preferred Position

Default:

```text
Top
```

Example:

```text
       Tooltip
          ↓
       [ ⚙ ]
```

If insufficient space exists, the Tooltip should automatically flip.

---

# 24. RTL Positioning

Iran LMS is RTL-first.

Do not hard-code physical directions.

Use logical concepts:

```text
Start
End
```

instead of assuming:

```text
Left
Right
```

Example:

```text
placement="start"
```

must resolve appropriately in RTL/LTR contexts.

---

# 25. Collision Detection

Tooltip should avoid leaving the viewport.

Conceptually:

```text
Requested:
Top

If insufficient space:
    ↓

Bottom

If still insufficient:
    ↓

Start / End
```

The positioning engine should calculate available space.

---

# 26. Tooltip Arrow

Tooltip may optionally display an arrow:

```text
       ┌──────────────┐
       │ تنظیمات      │
       └──────┬───────┘
              ▼
            [ ⚙ ]
```

The arrow should point toward the trigger.

---

# 27. Arrow Rules

Arrow should:

* Remain visually connected to Tooltip.
* Respect placement.
* Follow RTL positioning.
* Use the same background as Tooltip.
* Not create unnecessary visual noise.

---

# 28. Tooltip Width

Tooltip should normally be compact.

Recommended:

```text
Minimum width:
auto

Maximum width:
~240px
```

The exact value belongs to the Design Token system.

---

# 29. Long Tooltip Content

If content becomes too long:

```text
Tooltip
    ↓
Popover / Dialog / Help
```

Do not turn Tooltip into a paragraph container.

Recommended guideline:

```text
1 short sentence
```

or:

```text
1–2 short lines
```

---

# 30. Tooltip Text

Good:

```text
مشاهده نتیجه آزمون
```

Good:

```text
درصد پیشرفت این دوره
```

Bad:

```text
اینجا کلیک کنید تا بتوانید نتیجه آزمون خود را مشاهده کنید و اطلاعات بیشتری درباره عملکرد خود در این آزمون دریافت کنید.
```

The last example should use a richer contextual component.

---

# 31. Typography

Tooltip typography should use the global typography system.

Recommended:

```text
Small text
Medium weight
High readability
```

For Persian UI, the project typography system should use the approved Persian fonts.

The design guide identifies Vazirmatn/Estedad as the project typography direction.

---

# 32. Color

Tooltip should use a strong neutral surface.

Typical structure:

```text
Background:
Dark Neutral

Text:
High Contrast
```

The actual colors must come from semantic Design Tokens.

Do not hard-code:

```css
background: #000;
```

inside the component.

---

# 33. Dark Mode

Tooltip must work in:

```text
Light Mode
Dark Mode
```

Do not simply invert the colors.

The contrast relationship should remain intentional in both modes.

---

# 34. Semantic Variants

Tooltip should generally remain neutral.

Avoid turning Tooltip into:

```text
Success Tooltip
Danger Tooltip
Warning Tooltip
```

unless a concrete use case requires it.

Semantic status should normally be communicated by the parent component.

---

# 35. Tooltip With Danger Action

Example:

```text
[ 🗑 ]
```

Tooltip:

```text
حذف دوره
```

The Tooltip itself does not need to become red.

The Delete Button owns the danger semantics.

---

# 36. Accessibility Principle

Tooltip must follow this rule:

> Essential information must never exist only inside Tooltip.

If removing the Tooltip causes the interface to become incomprehensible, the design is probably incorrect.

---

# 37. ARIA

Tooltip may use:

```text
role="tooltip"
```

when appropriate.

The trigger may reference it through:

```text
aria-describedby
```

for supplementary content.

---

# 38. Accessible Name vs Description

This distinction is important.

For:

```text
[ 🗑 ]
```

the Button needs an accessible name:

```text
حذف
```

Tooltip may provide supplementary information:

```text
حذف این دوره از لیست
```

Do not rely on `aria-describedby` as a substitute for the Button's accessible name.

---

# 39. Keyboard

Keyboard users must be able to:

```text
Tab → focus trigger
```

and receive the Tooltip when it provides supplementary context.

Tooltip must not trap keyboard focus.

---

# 40. Escape Key

If Tooltip behaves as a transient contextual surface, Escape may dismiss it where appropriate.

However, Tooltip should not behave like a Dialog.

It must not create a keyboard focus trap.

---

# 41. Screen Reader

Screen readers may announce Tooltip content as a description when correctly connected.

However, avoid excessive tooltip text because it can make navigation verbose.

---

# 42. Tooltip and Disabled Controls

A native disabled Button may not receive hover/focus events consistently.

Example:

```text
[ دانلود ]  ← disabled
```

If explanation is necessary:

```text
      Tooltip
         ↓
[ container ]
    [ دانلود ]
```

The wrapper may own the Tooltip trigger.

The disabled control itself should remain semantically disabled.

---

# 43. Disabled Explanation

Example:

```text
[ دریافت گواهینامه ]
```

Disabled.

Tooltip:

```text
ابتدا تمام درس‌های دوره را تکمیل کنید.
```

This is useful because the user understands why the action is unavailable.

---

# 44. Tooltip and Loading

During loading:

```text
[ ⟳ ]
```

Tooltip should not continuously appear as a substitute for a loading state.

Use Loader/Spinner for the actual loading state.

Tooltip can explain the control only when appropriate.

---

# 45. Tooltip and Truncated Text

Tooltip may expose the full value when text is visually truncated.

Example:

```text
آموزش جامع طراحی رابط کار...
```

Tooltip:

```text
آموزش جامع طراحی رابط کاربری با Figma
```

This is one of the legitimate uses of Tooltip for content discovery.

However, critical information should not be truncated without another accessible representation.

---

# 46. Tooltip and Table

Long table cells may use Tooltip carefully.

Example:

```text
عنوان دوره:
آموزش جامع React از...
```

Tooltip:

```text
آموزش جامع React از صفر تا پیشرفته
```

For important data, consider responsive table strategies instead of relying exclusively on Tooltip.

---

# 47. Tooltip and Avatar

Avatar may use Tooltip for identity when the surrounding UI intentionally hides the name.

Example:

```text
[ Avatar ]
```

Tooltip:

```text
علی محمدی
```

However, when the name is already visible:

```text
[ Avatar ] علی محمدی
```

Tooltip is unnecessary.

---

# 48. Tooltip and Badge

Badge may occasionally have a Tooltip explaining its meaning.

Example:

```text
[ ✓ ]
```

Tooltip:

```text
دوره با موفقیت تکمیل شده است.
```

But if the Badge already contains text:

```text
[ تکمیل شده ]
```

Tooltip is usually unnecessary.

---

# 49. Tooltip and Chip

Chip can use Tooltip when its label is truncated.

Example:

```text
[ طراحی تجربه کار... × ]
```

Tooltip:

```text
طراحی تجربه کاربری
```

The remove action must remain independently accessible.

---

# 50. Tooltip and Icon

Icon is one of the most common Tooltip triggers.

Architecture:

```text
Icon Button
    ↓
Icon
    +
Tooltip
```

The Icon component itself should not necessarily instantiate Tooltip automatically.

---

# 51. Tooltip and Button

Button may expose additional contextual information.

Example:

```text
[ انتشار ]
```

Tooltip:

```text
انتشار دوره برای دانشجویان
```

But if the Button label is already self-explanatory, Tooltip is unnecessary.

---

# 52. Tooltip and Focus Mode

Focus Mode should prioritize:

```text
Minimal UI
Clear controls
Low distraction
```

Tooltip should be used only for controls where the icon's meaning is not obvious.

Do not add Tooltip to every control.

---

# 53. Tooltip in Dashboard Charts

Chart points may display Tooltip data.

Example:

```text
●
 ↓
۶۵٪
پیشرفت کل
```

However, this is a specialized Chart Tooltip rather than the generic Tooltip component.

The Chart component should own chart-specific positioning and interaction.

---

# 54. Specialized Tooltips

The generic Tooltip should not be overloaded for:

```text
Chart Tooltip
Rich Product Preview
Course Preview
User Preview
Interactive Popover
Context Menu
```

Use the appropriate component instead.

---

# 55. Tooltip vs Popover

Use Tooltip for:

```text
Short
Supplementary
Non-interactive
Contextual
```

Use Popover for:

```text
Rich content
Interactive controls
Forms
Multiple actions
Longer explanations
```

---

# 56. Tooltip vs Dialog

Use Dialog for:

```text
Important decision
Confirmation
Long content
Critical information
```

Tooltip should never replace a Dialog.

---

# 57. Tooltip vs Toast

Toast communicates an event after an action.

Example:

```text
دوره با موفقیت ذخیره شد.
```

Tooltip explains an existing UI element.

They serve different purposes.

---

# 58. Tooltip API

Recommended API:

```text
Tooltip
    content
    placement
    trigger
    delay
    disabled
    arrow
    maxWidth
    offset
    className
```

Possible placements:

```text
top
bottom
start
end
```

---

# 59. Trigger API

Recommended:

```text
hover
focus
manual
```

Default:

```text
hover + focus
```

Avoid hover-only behavior.

---

# 60. Controlled Tooltip

For complex interfaces:

```text
open
onOpenChange
```

may be supported.

This allows parent components to control visibility when necessary.

---

# 61. Tooltip Content

Content should preferably be plain text.

Example:

```text
content="مشاهده دوره"
```

Avoid arbitrary HTML unless a specialized, explicitly documented use case exists.

This reduces:

* Accessibility complexity
* Security risks
* Styling conflicts

---

# 62. Security

Never inject unsanitized user-generated HTML into Tooltip.

Avoid:

```text
raw HTML
raw SVG
untrusted markup
```

Prefer safe text content.

If rich content is required, use a dedicated component with an explicit sanitization strategy.

---

# 63. WordPress Compatibility

Tooltip must work with:

```text
Classic Themes
Block Themes
Custom Themes
WordPress Admin
Plugin Frontend
```

The plugin must not depend on Theme-specific Tooltip styles.

---

# 64. CSS Scope

Never use generic global selectors such as:

```css
.tooltip {}
```

because another WordPress Theme or plugin may already use the same selector.

Use the project's scoped naming convention.

Conceptually:

```css
.iran-lms-tooltip {}
```

The final class naming convention must follow the project CSS architecture.

---

# 65. Positioning Strategy

Tooltip positioning should preferably use a dedicated positioning utility rather than manually calculating coordinates independently in every module.

Conceptually:

```text
Trigger
   ↓
Positioning Engine
   ↓
Viewport Collision Detection
   ↓
Tooltip
```

This prevents inconsistent behavior across modules.

---

# 66. Z-Index

Tooltip must appear above nearby content.

Use a global Layer/Z-Index system.

Do not assign random values such as:

```css
z-index: 999999;
```

to individual Tooltip instances.

Recommended architecture:

```text
Base
Dropdown
Sticky
Popover
Modal
Toast
Tooltip
```

The exact hierarchy must follow the global Layer system.

---

# 67. Portal

When required, Tooltip may be rendered outside the local stacking context.

Conceptually:

```text
Trigger
   ↓
Portal / Overlay Layer
   ↓
Tooltip
```

This helps prevent clipping caused by:

```text
overflow: hidden
transform
nested containers
```

---

# 68. Animation

Tooltip may use a short fade/scale animation.

Recommended:

```text
Opacity
+
Small translate
```

Avoid large movement.

---

# 69. Reduced Motion

Respect:

```text
prefers-reduced-motion
```

When reduced motion is enabled:

```text
Tooltip
→ appear/disappear without motion
```

---

# 70. Mobile Strategy

On mobile:

* Do not depend on hover.
* Keep text short.
* Avoid covering important content.
* Prefer accessible labels.
* Use Popover for interactive information.
* Ensure the Tooltip does not block critical controls.

---

# 71. RTL Testing

Test:

```text
RTL
LTR
Mixed Persian + English
```

Example:

```text
[ React ]
```

Tooltip:

```text
مشاهده دوره React
```

The placement and alignment must remain correct.

---

# 72. Dynamic Content

Tooltip content may come from:

```text
Course Data
User Data
Status
Permissions
Settings
API
```

Dynamic content must be escaped safely.

Do not assume Tooltip content is always static.

---

# 73. Module Examples

Tooltip may be used in:

```text
Core
Auth
Users
Courses
Learning
Enrollments
Assessments
Certificates
Commerce
Communication
Gamification
Media
Notifications
Search
Reports
Settings
```

Each module should use the same Tooltip component.

---

# 74. Course Module

Example:

```text
[ ❤️ ]
```

Tooltip:

```text
افزودن به علاقه‌مندی‌ها
```

The Course module owns the favorite state.

Tooltip only explains the action.

---

# 75. Assessment Module

Example:

```text
[ ⏱ ]
```

Tooltip:

```text
زمان باقی‌مانده آزمون
```

The Assessment module owns the timer.

---

# 76. Certificate Module

Example:

```text
[ ✓ ]
```

Tooltip:

```text
گواهینامه معتبر
```

The Certificate module owns certificate validation.

---

# 77. Notifications

Example:

```text
[ 🔔 ]
```

Tooltip:

```text
اعلان‌ها
```

The Notification module owns unread count and data.

---

# 78. Reports

Example:

```text
[ ? ]
```

Tooltip:

```text
این شاخص میانگین زمان مطالعه دانشجویان را نشان می‌دهد.
```

For complex analytical explanations, use Popover or Help content instead.

---

# 79. Design Tokens

Recommended tokens:

```text
tooltip-background
tooltip-text
tooltip-border
tooltip-radius
tooltip-shadow

tooltip-padding-inline
tooltip-padding-block

tooltip-font-size
tooltip-line-height

tooltip-max-width
tooltip-offset

tooltip-show-delay
tooltip-hide-delay

tooltip-arrow-size

tooltip-z-index
tooltip-focus-ring
```

All values must come from the global Design Token system.

---

# 80. Component Boundary

Tooltip owns:

```text
Positioning
Visibility
Delay
Arrow
Surface
Typography
Accessibility Relationship
Collision Handling
```

Tooltip does not own:

```text
Business Logic
Navigation
Course State
Enrollment
Permissions
Notifications
Form State
```

---

# 81. Do

* Use Tooltip for short supplementary information.
* Support hover and keyboard focus.
* Keep content concise.
* Support RTL.
* Support Dark Mode.
* Use semantic placement.
* Use centralized z-index tokens.
* Handle viewport collision.
* Scope CSS for WordPress.
* Use accessible labels for icon-only controls.
* Respect reduced motion.
* Prefer Popover for rich interactive content.

---

# 82. Don't

Avoid:

* Tooltip-only essential information.
* Hover-only interactions.
* Long paragraphs.
* Interactive forms inside Tooltip.
* Global `.tooltip` CSS.
* Random z-index values.
* Raw untrusted HTML.
* Using Tooltip as a Dialog.
* Using Tooltip as a Toast.
* Using Tooltip for every icon.
* Relying on color alone.
* Making Tooltip responsible for business logic.

---

# 83. Testing Requirements

Test triggers:

```text
Hover
Focus
Keyboard
Touch
Controlled
```

Positions:

```text
Top
Bottom
Start
End
```

Behavior:

```text
Collision
Viewport Edge
Scrolling
Overflow Hidden
Nested Containers
Portal
```

Content:

```text
Short Persian
Long Persian
English
Mixed Persian + English
Numbers
Dynamic Content
```

Accessibility:

```text
Keyboard
Screen Reader
aria-describedby
Accessible Name
Focus Visibility
Disabled Trigger
```

Themes:

```text
Light
Dark
RTL
LTR
```

Responsive:

```text
Desktop
Tablet
Mobile
```

WordPress:

```text
Frontend
Admin
Classic Theme
Block Theme
Plugin Conflict
```

---

# 84. Architecture Decision

Iran LMS follows a **Supplementary Contextual Tooltip Architecture**:

```text
Interactive / Informative Element
            ↓
        Tooltip Trigger
            ↓
     Positioning System
            ↓
         Tooltip
```

The Tooltip provides additional context but never becomes the source of essential information or business logic.

---

# 85. Strategic Vision

Tooltip is intentionally lightweight.

Its purpose is to make compact interfaces understandable without increasing visual clutter.

In Iran LMS it should primarily support:

* Icon-only controls
* Collapsed Sidebar
* Table actions
* Lesson controls
* Dashboard metrics
* Truncated labels
* Compact Focus Mode controls
* Contextual explanations

The long-term goal is a **minimal, accessible, RTL-first, Theme-independent and WordPress-safe Tooltip system** that improves discoverability while preserving the clean and distraction-free nature of the LMS interface.
