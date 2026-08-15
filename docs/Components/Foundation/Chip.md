# Chip

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Compact Interaction Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Chip is a compact component used to represent:

* Tags
* Filters
* Selected values
* Categories
* Attributes
* Short metadata
* Removable selections
* Search criteria

Chip is especially useful when the user needs to recognize or manipulate a compact piece of information.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Chip must be:

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

Chip must not contain business logic.

---

# 3. Chip vs Badge

This distinction is important.

### Badge

Primarily communicates information:

```text
[ تکمیل شده ]
[ جدید ]
[ ۷۲٪ ]
```

### Chip

Usually represents a value that can be:

* Selected
* Removed
* Filtered
* Managed

Example:

```text
[ React × ]
[ طراحی UI × ]
```

A Chip may be interactive.

A Badge normally is not.

---

# 4. Chip vs Button

Chip represents a compact value.

Button performs an action.

Correct:

```text
[ React × ]
```

Incorrect:

```text
[ ذخیره فیلتر ]
```

The second is a Button.

---

# 5. Common LMS Usage

Chip may be used for:

```text
Course Categories
Course Tags
Search Filters
Selected Filters
Skills
Topics
Course Features
User Interests
Assessment Tags
Content Tags
```

---

# 6. Anatomy

Basic Chip:

```text
┌──────────────┐
│ React     ×  │
└──────────────┘
```

Possible anatomy:

```text
Icon
+
Label
+
Optional Remove Action
```

Example:

```text
[ ⚛ React × ]
```

---

# 7. Basic Chip

Non-removable Chip:

```text
[ React ]
```

Useful for:

* Tags
* Categories
* Metadata
* Skills

---

# 8. Selectable Chip

A selectable Chip represents a state.

Example:

```text
[ React ]
[ ✓ طراحی UI ]
[ JavaScript ]
```

Selected state:

```text
[ ✓ طراحی UI ]
```

The surrounding control owns the selection state.

---

# 9. Removable Chip

A removable Chip includes a clear/remove action.

Example:

```text
[ React × ]
```

Typical use:

```text
فیلترهای فعال

[ React × ]
[ مبتدی × ]
[ رایگان × ]
```

---

# 10. Chip Remove Action

The remove action must be a real interactive control.

Do not make the entire Chip responsible for removal if that creates ambiguous interaction.

Conceptually:

```text
Chip
 ├── Label
 └── Remove Button
```

The remove button must have an accessible name.

Example:

```text
حذف فیلتر React
```

---

# 11. Clickable Chip

A Chip may be clickable when it represents a selectable value.

Example:

```text
[ React ]
```

Click:

```text
[ ✓ React ]
```

Use a semantic Button or appropriate interactive element.

---

# 12. Non-Interactive Chip

When Chip is only metadata:

```text
[ React ]
```

it should not receive keyboard focus.

---

# 13. Search Filters

One of the main Iran LMS use cases is filtering course results.

Example:

```text
فیلترهای فعال:

[ طراحی رابط کاربری × ]
[ مبتدی × ]
[ رایگان × ]
```

The Search module owns:

* Filter logic
* Query state
* Result updates

Chip only represents the selected filter.

---

# 14. Category Chip

Course categories may be represented as Chips:

```text
[ برنامه‌نویسی ]
[ طراحی ]
[ کسب‌وکار ]
```

If the category is navigational, use a link or surrounding navigation component.

Do not make a static Chip responsible for routing.

---

# 15. Tag Chip

Example:

```text
[ React ]
[ Next.js ]
[ WordPress ]
[ UI/UX ]
```

Useful for:

* Course tags
* Lesson tags
* Instructor skills
* Content metadata

---

# 16. Skill Chip

Instructor profile:

```text
مهارت‌ها

[ UI/UX ]
[ Figma ]
[ WordPress ]
[ React ]
```

The profile owns the skill data.

Chip renders the compact representation.

---

# 17. Topic Chip

Course or lesson:

```text
موضوعات:

[ Flexbox ]
[ Grid ]
[ Responsive ]
```

Topic taxonomy should come from the appropriate domain.

---

# 18. Filter Chip

Filter Chip is a specialized usage pattern.

Example:

```text
فیلترها:

[ سطح: مقدماتی × ]
[ قیمت: رایگان × ]
[ مدرس: سارا رضایی × ]
```

The label should clearly communicate what will be removed.

---

# 19. Filter Label Structure

For complex filters:

```text
[ سطح: مقدماتی × ]
```

is preferable to:

```text
[ مقدماتی × ]
```

when the meaning would otherwise be ambiguous.

---

# 20. Multiple Chips

Multiple Chips may appear in a horizontal group:

```text
[ React × ] [ Next.js × ] [ رایگان × ]
```

The group should support wrapping when necessary.

---

# 21. Chip Group

Recommended structure:

```text
ChipGroup
 ├── Chip
 ├── Chip
 ├── Chip
 └── Chip
```

ChipGroup may control:

* Gap
* Wrapping
* Alignment
* Keyboard navigation where applicable

---

# 22. Wrapping

Unlike Badge, Chips may wrap.

Example:

```text
[ React × ] [ Next.js × ]
[ WordPress × ] [ UI/UX × ]
```

This is especially important on mobile.

---

# 23. Mobile

On mobile:

* Chips may wrap.
* Long labels should remain readable.
* Remove actions must remain touch-friendly.
* Chip groups must not cause horizontal page overflow.

Avoid forcing all Chips into a single non-scrollable row.

---

# 24. Horizontal Scroll

For selected use cases, a horizontally scrollable Chip group may be appropriate.

Example:

```text
[ React ] [ Next.js ] [ WordPress ] →
```

Use this only when the interaction model clearly benefits from horizontal scrolling.

For filter panels, wrapping is usually preferable.

---

# 25. Chip Sizes

Recommended:

```text
Small
Medium
Large
```

Default:

```text
Medium
```

Usage:

```text
Small
→ dense tables / metadata

Medium
→ filters / tags / standard UI

Large
→ prominent selection interfaces
```

---

# 26. Chip Shape

Default shape:

```text
Pill
```

Example:

```text
╭────────────╮
│ React   ×  │
╰────────────╯
```

A rounded rectangle variant may be supported where required by the Design System.

---

# 27. Semantic Variants

Recommended variants:

```text
Neutral
Primary
Info
Success
Warning
Danger
```

However, semantic color should be used only when it communicates meaningful state.

For ordinary tags, Neutral is usually sufficient.

---

# 28. Selected State

Selected Chip should have a clear visual state.

Example:

```text
Normal
[ React ]

Selected
[ ✓ React ]
```

Do not rely only on color.

---

# 29. Disabled State

Disabled Chip:

```text
[ React ]
```

with reduced emphasis.

Disabled means:

* It cannot currently be interacted with.
* Its value remains visible.

Disabled Chips should not be used simply because the application wants a visually muted tag.

---

# 30. Focus State

Interactive Chips must have a visible focus state.

Example:

```text
[ React ]
  └── Focus Ring
```

Focus must be visible in:

* Light Mode
* Dark Mode
* RTL
* Keyboard navigation

---

# 31. Hover State

Clickable Chips may have a subtle hover state.

Avoid large transformations.

Recommended:

```text
Hover
→ background adjustment

Pressed
→ stronger state

Focus
→ visible focus ring
```

---

# 32. Pressed State

For selectable Chips:

```text
Normal
Hover
Pressed
Selected
Disabled
Focus
```

must be distinguishable.

---

# 33. Icon

Chip may contain an icon.

Example:

```text
[ ⚛ React ]
```

The icon should reinforce the label.

Do not use decorative icons that create unnecessary visual noise.

---

# 34. Remove Icon

The remove icon should be visually recognizable.

Typical:

```text
×
```

or:

```text
Close
```

The exact icon comes from the global Icon system.

---

# 35. Remove Button Size

The remove action must have an adequate touch target.

The visual icon can remain small while the actual interactive area is larger.

This is particularly important on mobile.

---

# 36. Accessibility

Interactive Chip must be accessible.

Requirements:

* Keyboard accessible
* Visible focus
* Accessible name
* Clear selected state
* Clear disabled state
* Touch-friendly remove action
* No color-only semantics

---

# 37. ARIA Selected

For selection interfaces, use the appropriate semantic pattern.

Depending on the surrounding control, this may be:

```text
aria-selected
```

or:

```text
aria-pressed
```

Do not automatically add both.

The parent interaction pattern determines the correct semantics.

---

# 38. Remove Accessibility

Example:

```text
[ React × ]
```

The remove button should have an accessible name such as:

```text
حذف React
```

not simply:

```text
×
```

for screen readers.

---

# 39. RTL

Iran LMS is RTL-first.

Chip must support:

```text
Persian
Arabic
English
Mixed Content
RTL
LTR
```

Logical spacing must be used.

Avoid hard-coded:

```css
margin-left
margin-right
```

when logical layout properties can be used.

---

# 40. Icon Direction

Some icons are directional.

For example:

```text
Arrow
Chevron
Navigation Icon
```

Their direction should respect RTL when appropriate.

The remove icon itself is generally direction-neutral.

---

# 41. Persian Text

Chip labels should support Persian text naturally:

```text
[ برنامه‌نویسی ]
[ طراحی رابط کاربری ]
[ وردپرس ]
```

Avoid forcing English typography rules onto Persian labels.

---

# 42. Numeric Values

Chips may contain values:

```text
[ ۱۲ جلسه ]
[ ۸ ساعت ]
[ ۷۲٪ ]
```

Formatting should follow the global localization system.

---

# 43. Long Labels

Chip labels should remain concise.

Good:

```text
[ طراحی UI ]
```

Avoid:

```text
[ دوره‌های پیشرفته طراحی رابط کاربری برای کاربران حرفه‌ای ]
```

For long descriptions, use Text or another content component.

---

# 44. Truncation

If truncation is unavoidable:

```text
[ طراحی تجربه کار... × ]
```

provide a way to access the complete value.

However, for filter Chips, shortening the visible label may make the selected filter ambiguous.

Prefer better labels over aggressive truncation.

---

# 45. Tooltip

Tooltip can provide additional information.

Example:

```text
[ طراحی تجربه... ]
```

Tooltip:

```text
طراحی تجربه کاربری
```

Do not use Tooltip as a replacement for essential accessible information.

---

# 46. Chip Group Accessibility

A Chip Group should have a meaningful accessible structure.

For example:

```text
فیلترهای فعال
```

can label the group.

Avoid making every Chip independently announce excessive context.

---

# 47. Search Results

Example:

```text
جستجو: React

فیلترهای فعال:

[ سطح: متوسط × ]
[ دسته: برنامه‌نویسی × ]
[ مدرس: احمد × ]

۱۲ دوره یافت شد
```

The search system owns the query and result count.

Chips only represent active filters.

---

# 48. Course Detail

Example:

```text
مهارت‌ها:

[ React ]
[ TypeScript ]
[ Next.js ]
```

These are informational Chips.

If they navigate to a taxonomy page, use a semantic link.

---

# 49. Instructor Profile

Example:

```text
مهارت‌ها

[ UI/UX ]
[ Figma ]
[ WordPress ]
[ طراحی سیستم ]
```

This pattern is especially useful for compact instructor metadata.

---

# 50. Assessment

Possible assessment tags:

```text
[ آزمون ]
[ پایانی ]
[ میان‌ترم ]
```

If the information is a fixed status rather than a user-manageable value, Badge may be more appropriate.

Choose based on semantics, not appearance.

---

# 51. Certificate

Certificate metadata could use:

```text
[ React ]
[ Advanced ]
```

but state information such as:

```text
[ معتبر ]
[ منقضی شده ]
```

should generally use Badge.

---

# 52. Commerce

Products or course purchases may use:

```text
[ تخفیف ]
[ ویژه ]
```

However, promotional labels are often better represented by Badge.

Chip should be used only when the value is part of an interactive/filtering context.

---

# 53. Component Boundary

Chip owns:

```text
Label Rendering
Icon Rendering
Selection Visual State
Remove Action UI
Hover
Focus
Pressed
Disabled
Size
Variant
```

Chip does not own:

```text
Filtering Logic
Search Logic
Taxonomy Queries
Database Queries
Navigation Logic
Permission
Business Rules
```

---

# 54. Component API

Recommended properties:

```text
label
icon
variant
size
selected
disabled
removable
onRemove
onClick
type
ariaLabel
className
```

The exact implementation may vary.

---

# 55. Example API

Basic:

```text
Chip
    label="React"
```

Removable:

```text
Chip
    label="React"
    removable=true
```

Selected:

```text
Chip
    label="React"
    selected=true
```

Filter:

```text
Chip
    label="سطح: مقدماتی"
    removable=true
```

---

# 56. WordPress Implementation

For frontend usage, the component may be rendered through:

```text
PHP
HTML
CSS
JavaScript
Gutenberg
REST-driven UI
```

The visual specification must remain independent from the rendering technology.

---

# 57. CSS Scope

Do not use:

```css
.chip {}
```

as a global plugin selector.

Use the final Iran LMS component namespace.

Conceptually:

```css
.iran-lms-chip {}
```

The exact naming convention must follow the project-wide CSS architecture.

---

# 58. Design Tokens

Recommended tokens:

```text
chip-height-sm
chip-height-md
chip-height-lg

chip-padding-inline-sm
chip-padding-inline-md
chip-padding-inline-lg

chip-gap
chip-radius

chip-font-size-sm
chip-font-size-md
chip-font-size-lg

chip-background
chip-text
chip-border

chip-hover-background
chip-selected-background
chip-disabled-opacity

chip-remove-size
chip-focus-ring
```

Semantic variants should consume the global color tokens rather than defining independent colors.

---

# 59. Dark Mode

Chip must support Dark Mode.

States must remain distinguishable:

```text
Neutral
Primary
Info
Success
Warning
Danger
Selected
Disabled
```

Do not simply invert colors.

---

# 60. Animation

Chip interactions should use subtle transitions.

Recommended:

```text
Hover
Focus
Pressed
Selected
Remove
```

Avoid:

```text
Continuous pulse
Large scale animations
Bouncing
```

Respect:

```text
prefers-reduced-motion
```

---

# 61. Removal Animation

When a Chip is removed:

```text
[ React × ]
     ↓
removed
```

A subtle transition may be used, but the application state must update immediately.

Do not delay state changes for animation.

---

# 62. Security

Chip is presentation-only.

Never use Chip state to determine:

```text
Permission
Access
Enrollment
Payment
Role
Course Ownership
```

The backend/application state remains authoritative.

---

# 63. Dynamic Data

Chip values may originate from:

```text
Taxonomies
Search API
Course API
User Profile
Assessment
Enrollment
REST API
WordPress Metadata
```

Dynamic content must be safely escaped.

Never inject unsanitized HTML into the label.

---

# 64. Do

* Use Chip for compact values.
* Use Badge for informational status.
* Keep labels short.
* Support removable selections.
* Support selected state.
* Support RTL.
* Use logical spacing.
* Use Design Tokens.
* Keep filtering logic outside the component.
* Make remove actions accessible.
* Support mobile wrapping.

---

# 65. Don't

Avoid:

* Using Chip as a Button for unrelated actions.
* Using Chip for long text.
* Using color as the only selection signal.
* Making every Chip removable.
* Creating page-specific Chip variants.
* Hard-coding colors.
* Using global CSS selectors.
* Embedding business logic.
* Using Chip to represent permissions.
* Creating separate RTL/LTR implementations.

---

# 66. Testing Requirements

Test:

```text
Basic
Selectable
Selected
Removable
Disabled
Icon
Icon + Remove
Long Label
Persian Label
English Label
Mixed Label
```

States:

```text
Hover
Focus
Pressed
Selected
Disabled
```

Responsive:

```text
Desktop
Tablet
Mobile
Wrapping
Horizontal Scroll
```

Accessibility:

```text
Keyboard
Screen Reader
Accessible Remove Action
Selected Semantics
Focus Visibility
Touch Target
```

Themes:

```text
Light Mode
Dark Mode
RTL
LTR
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

# 67. Architecture Decision

Iran LMS follows a **Semantic Selection Chip Architecture**:

```text
Domain Value
      ↓
Selection / Filter State
      ↓
Chip
      ↓
Interaction
      ↓
Application State
```

Chip represents a value and its interaction state.

It does not own the underlying domain logic.

---

# 68. Strategic Vision

Chip is a reusable compact interaction component across Iran LMS.

It provides a consistent visual language for:

* Search filters
* Course categories
* Tags
* Skills
* Topics
* Selected values
* User interests
* Assessment metadata

The long-term goal is a **Theme-independent, RTL-first, accessible and token-driven Chip system** that can be reused throughout the Iran LMS Plugin without duplicating interaction or visual logic.
