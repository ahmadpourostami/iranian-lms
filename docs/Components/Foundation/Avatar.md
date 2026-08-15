# Avatar

**Component:** Core
**Project:** Iran LMS
**Platform:** WordPress
**Type:** Reusable Identity Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Avatar is a reusable component for representing a user, instructor, student, organization, or other identifiable entity through an image, initials, or fallback icon.

In Iran LMS, Avatar is primarily used for:

* Student identity
* Instructor identity
* User profile
* Course instructor
* Discussion participants
* Comments
* Notifications
* Messages
* Activity feeds
* Leaderboards
* Tables
* Dashboards
* Reviews
* Certificates
* Admin user management

Avatar is a presentation component. It does not own user identity, permissions, authentication, or profile data.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Avatar must be:

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

The component must work consistently across:

```text
Frontend
Student Dashboard
Instructor Dashboard
WordPress Admin
Course Pages
Learning Pages
Communication
Reports
```

---

# 3. Avatar Is Not a Profile

Avatar represents identity visually.

It does not represent the complete user profile.

Correct:

```text
[ 👤 ]  احمد پوررستمی
        مدرس
```

The Avatar is only:

```text
[ 👤 ]
```

The surrounding component owns:

* Name
* Role
* Biography
* Statistics
* Actions

---

# 4. Supported Sources

Avatar may receive its image from:

```text
WordPress User
Gravatar
Media Library
Custom User Meta
Remote Image URL
Generated Initials
Fallback Icon
```

The source should be resolved by the user/profile layer.

Avatar should simply render the provided source.

---

# 5. WordPress User Integration

For WordPress users, the Avatar may use the user's profile image or avatar source.

Conceptually:

```text
WP_User
   ↓
Avatar URL
   ↓
Avatar Component
```

The Avatar must not directly query the database during rendering.

Data retrieval belongs to the appropriate Users/Profile service.

---

# 6. Gravatar

Iran LMS may receive an avatar from WordPress/Gravatar where available.

However, the component must not depend exclusively on Gravatar.

If no usable image exists:

```text
Image
 ↓
Fallback
```

should be used.

---

# 7. Image Avatar

Basic image:

```text
   ╭──────╮
  │  👤  │
   ╰──────╯
```

Example:

```text
[ تصویر مدرس ]
سارا رضایی
```

The image should represent the intended user.

---

# 8. Initials Avatar

When no image is available, initials may be used.

Example:

```text
┌────┐
│ ا پ │
└────┘
```

For:

```text
احمد پوررستمی
```

the fallback may display:

```text
ا پ
```

Initial generation should respect Persian names and the project's localization rules.

---

# 9. Fallback Icon

If neither image nor usable initials are available:

```text
┌────┐
│ 👤 │
└────┘
```

A generic person icon is preferable to an empty visual area.

---

# 10. Fallback Priority

Recommended resolution:

```text
Provided Avatar
      ↓
WordPress User Avatar
      ↓
Gravatar
      ↓
Initials
      ↓
Default User Icon
```

The exact priority may be configured by the user/profile system.

---

# 11. Image Loading

Avatar images should use normal browser image loading behavior.

For large lists, lazy loading may be appropriate.

Example:

```html
<img
    src="..."
    alt="..."
    loading="lazy"
>
```

However, avatars that appear immediately in critical above-the-fold content should not be unnecessarily delayed.

---

# 12. Image Error

If an image fails:

```text
Broken Image
      ↓
Fallback Initials
      ↓
Fallback Icon
```

Do not leave a broken image icon visible.

---

# 13. Image Cropping

Avatar images should normally use:

```text
object-fit: cover;
```

This creates a consistent visual shape.

Faces should remain centered where possible.

The image-processing layer may provide a cropped version optimized for avatars.

---

# 14. Aspect Ratio

Avatar should remain square:

```text
1 : 1
```

before applying the visual shape.

Supported shapes may include:

```text
Circle
Rounded Square
Square
```

Circle is the default for people.

---

# 15. Sizes

Recommended sizes:

```text
XS
SM
MD
LG
XL
2XL
```

Suggested semantic usage:

```text
XS → dense tables / metadata
SM → comments / lists
MD → default
LG → instructor cards
XL → profile header
2XL → profile page / hero
```

The exact pixel values must come from Design Tokens.

---

# 16. Default Size

The default Avatar size should be:

```text
MD
```

unless the surrounding component defines another size.

Avoid creating page-specific arbitrary dimensions.

---

# 17. Avatar in Instructor Profile

Instructor identity is a major LMS use case.

Example:

```text
        ┌────────┐
        │        │
        │ Avatar │
        │        │
        └────────┘

سارا رضایی
مدرس طراحی رابط کاربری
```

The profile page owns the complete identity presentation.

Avatar only renders the identity image.

---

# 18. Avatar in Course Card

Example:

```text
┌─────────────────────────────┐
│ Course Thumbnail             │
│                             │
│ طراحی UI/UX                 │
│                             │
│ [Avatar] سارا رضایی         │
└─────────────────────────────┘
```

Avatar should remain compact and not dominate the course information.

---

# 19. Avatar in Comments

Example:

```text
[Avatar] احمد پوررستمی
        آموزش بسیار مفیدی بود.
```

Recommended size:

```text
SM
```

---

# 20. Avatar in Discussions

For discussion threads:

```text
[Avatar] علی رضایی
        ۲ ساعت پیش

        سؤال من درباره درس سوم...
```

Avatar helps establish identity and scanability.

---

# 21. Avatar in Messages

Example:

```text
[Avatar] سارا رضایی
        پیام جدید درباره دوره UI
```

Avatar may be combined with:

```text
Unread Badge
Timestamp
Online Indicator
```

---

# 22. Avatar in Notifications

Notifications may display:

```text
[Avatar] مدرس دوره یک پیام جدید ارسال کرد
```

For system-generated notifications where no person is involved, use an icon/avatar-like system identity instead.

---

# 23. Avatar in Tables

In dense tables:

```text
[Av] احمد پوررستمی
     مدرس
```

Recommended:

```text
XS
SM
```

Do not use large avatars inside dense data tables.

---

# 24. Avatar in Leaderboards

Leaderboard example:

```text
1  [Avatar] احمد پوررستمی      980 XP
2  [Avatar] سارا رضایی         920 XP
3  [Avatar] علی محمدی           870 XP
```

Avatar supports identity recognition but must not replace the ranking information.

---

# 25. Avatar Group

Multiple users may be represented using an Avatar Group.

Example:

```text
[ A ][ S ][ M ][ +4 ]
```

Use for:

* Course participants
* Team members
* Assignment reviewers
* Discussion participants
* Collaborative learning

---

# 26. Avatar Group Limit

A group should show only a limited number of individual avatars.

Example:

```text
[ A ][ S ][ M ][ +12 ]
```

The `+12` indicator communicates additional users.

Do not render dozens of avatars simultaneously.

---

# 27. Avatar Group Overflow

Overflow count may be displayed as:

```text
[ +8 ]
```

The number should represent the users not currently displayed.

If interactive, the surrounding component may open:

```text
Popover
Drawer
Modal
```

Avatar itself remains presentation-only.

---

# 28. Online Indicator

Avatar may optionally include an online/offline status indicator.

Example:

```text
   ┌──────┐
   │ 👤   │●
   └──────┘
```

Possible states:

```text
Online
Offline
Busy
Away
```

The indicator must have a semantic meaning defined by the Communication/Users system.

---

# 29. Online Indicator Is Not a Badge

The status dot is a specialized visual indicator.

Do not use a full Badge inside every Avatar.

Keep the identity representation compact.

---

# 30. Verification Indicator

Instructor or organization profiles may display a verification indicator.

Example:

```text
[Avatar] سارا رضایی ✓
```

The verification state must come from the authoritative user/profile system.

The visual indicator does not grant verification.

---

# 31. Role Indicator

Avatar may be accompanied by a role:

```text
[Avatar] سارا رضایی
         مدرس
```

or:

```text
[Avatar] احمد
         دانشجو
```

Do not place the role inside the Avatar unless the design explicitly requires it.

---

# 32. Accessibility

Avatar accessibility depends on whether the image is informative or decorative.

If the Avatar identifies a person:

```html
alt="سارا رضایی"
```

is appropriate.

If the adjacent text already identifies the person:

```html
alt=""
```

may be preferable to avoid duplicate screen-reader announcements.

---

# 33. Decorative Avatar

Example:

```text
[Avatar] سارا رضایی
```

If the name is already immediately available, the image may be decorative.

Do not force screen readers to hear:

```text
سارا رضایی، تصویر سارا رضایی
```

unnecessarily.

---

# 34. Accessible Name

Avatar itself should not automatically receive:

```text
aria-label
```

in every situation.

Accessibility should be determined by context.

If Avatar is interactive:

```text
aria-label="مشاهده پروفایل سارا رضایی"
```

may be appropriate.

---

# 35. Interactive Avatar

Avatar may become interactive when used as:

```text
Profile Link
User Menu Trigger
Profile Navigation
Participant Selector
```

Example:

```text
[Avatar]
   ↓
مشاهده پروفایل
```

If interactive, use a semantic element such as:

```html
<a>
```

or:

```html
<button>
```

rather than making a generic `div` clickable.

---

# 36. Avatar + Link

Recommended:

```text
<a href="/instructor/...">
    <Avatar />
    <span>سارا رضایی</span>
</a>
```

The link owns navigation.

Avatar remains a visual identity component.

---

# 37. Avatar + Button

For account menus:

```text
[Avatar ▼]
```

The surrounding Button/Menu component owns the interaction.

Avatar should not implement menu logic.

---

# 38. RTL

Iran LMS is RTL-first.

Avatar should support:

```text
RTL Text
Persian Names
Mixed Persian/English Names
Logical Spacing
RTL Lists
```

The image itself has no directional dependency.

---

# 39. Avatar + Name in RTL

Example:

```text
[Avatar] سارا رضایی
```

or the reverse arrangement where defined by the global component system.

The project must use one consistent convention.

Do not create page-specific spacing.

---

# 40. Spacing

Avatar spacing must use Design Tokens.

Prefer:

```css
gap: var(--...)
```

over manual directional margins.

Avoid:

```css
margin-left: ...
margin-right: ...
```

when logical spacing can be used.

---

# 41. Dark Mode

Avatar must remain visible in Dark Mode.

Consider:

```text
Image
Initials
Fallback Icon
Status Indicator
Verification
```

The fallback background and text must have sufficient contrast.

Do not assume the image itself will always provide sufficient contrast.

---

# 42. Design Tokens

Recommended tokens:

```text
avatar-size-xs
avatar-size-sm
avatar-size-md
avatar-size-lg
avatar-size-xl
avatar-size-2xl

avatar-radius

avatar-border

avatar-background

avatar-fallback-color

avatar-status-size

avatar-status-border

avatar-group-overlap

avatar-focus-ring
```

The source of truth is:

```text
05-UI/28-Design-Tokens.md
```

---

# 43. Border

A subtle border may be used when necessary.

Examples:

```text
Image Avatar
→ subtle border

Initials Avatar
→ background + contrast

Avatar Group
→ separation border
```

Do not add heavy borders by default.

---

# 44. Avatar Group Overlap

When avatars overlap:

```text
[ A ]
   [ S ]
      [ M ]
```

the overlap should be controlled by a token.

The group should remain readable in both RTL and LTR.

---

# 45. Z-Index

Overlapping avatars should use predictable stacking order.

Example:

```text
Avatar 1
Avatar 2
Avatar 3
```

The active/hovered avatar may temporarily appear above others.

Do not introduce arbitrary global z-index values.

---

# 46. Hover

Hover may:

* Increase contrast.
* Show tooltip.
* Raise the Avatar in an Avatar Group.
* Reveal the user's name.

Hover must not be necessary to identify the person when adjacent text is absent.

---

# 47. Focus

Interactive Avatar must have a visible focus state.

Example:

```text
[Avatar]
  ╰── Focus Ring
```

Focus must work with keyboard navigation.

Non-interactive Avatar should not receive unnecessary focus.

---

# 48. Tooltip

Tooltip may be useful for compact Avatar-only interfaces.

Example:

```text
[Avatar]
```

Tooltip:

```text
سارا رضایی
مدرس
```

Do not use Tooltip when the name is already visible nearby.

---

# 49. Loading State

Avatar may require loading behavior when user identity data is being fetched.

Preferred:

```text
Skeleton Avatar
```

Example:

```text
[ ○○○ ]
```

Use the shared Skeleton component rather than creating a custom Avatar loading animation.

---

# 50. Missing User

If a user was removed or unavailable:

```text
[ 👤 ] کاربر حذف‌شده
```

The application should determine the display label.

Avatar should simply render the fallback.

---

# 51. Privacy

Do not expose private user information through Avatar.

Avatar URLs and profile information must respect the application's privacy rules.

For users who should not expose profile images, the system may provide:

```text
Initials
Default Icon
Anonymous Avatar
```

---

# 52. Remote Images

Remote avatar URLs may introduce:

* Privacy concerns
* Availability issues
* Performance issues
* Mixed-content problems
* Tracking concerns

Where appropriate, WordPress/media infrastructure should provide controlled image sources.

---

# 53. Security

Avatar is presentation-only.

It must not determine:

```text
Role
Permission
Authentication
Ownership
Enrollment
Instructor Status
```

For example:

```text
[Avatar] [مدرس]
```

does not mean the user has instructor privileges.

Authorization must come from the backend.

---

# 54. Dynamic Content

Avatar data may come from:

```text
WordPress User
REST API
Database
User Meta
Course Data
Enrollment
Communication
```

Dynamic values must be escaped correctly.

Never inject raw user-controlled HTML into Avatar content.

---

# 55. Performance

Avatar is frequently repeated in:

* Tables
* Lists
* Notifications
* Comments
* Leaderboards
* Course cards

Therefore performance matters.

Recommended:

```text
Optimized image size
Proper image dimensions
Lazy loading when appropriate
Caching
Consistent thumbnail sizes
```

Avoid loading a full-resolution profile image when a small avatar is required.

---

# 56. Image Dimensions

Avatar images should ideally be requested at the display size.

For example:

```text
32px Avatar
→ approximately 32px asset

48px Avatar
→ approximately 48px asset
```

The image service may provide higher-density versions for high-DPI screens.

---

# 57. WordPress Media

When avatars originate from WordPress Media, the system should use appropriate image sizes rather than loading the original file unnecessarily.

The Media module owns image processing.

Avatar only receives the final source.

---

# 58. Component API

Recommended properties:

```text
src
alt
name
size
shape
fallback
status
verified
interactive
href
loading
className
```

Not every implementation requires every property.

---

# 59. Example API

Image:

```text
Avatar
    src="..."
    alt="سارا رضایی"
    size="md"
```

Initials:

```text
Avatar
    name="احمد پوررستمی"
    size="md"
```

Status:

```text
Avatar
    src="..."
    status="online"
```

Interactive:

```text
Avatar
    src="..."
    name="سارا رضایی"
    href="/instructor/123"
```

---

# 60. Component Boundary

Avatar owns:

```text
Image Rendering
Fallback Rendering
Size
Shape
Status Indicator
Accessibility Presentation
Visual States
```

Avatar does not own:

```text
User Fetching
Authentication
Authorization
Profile Editing
Database Queries
Enrollment
Course Ownership
Notification Logic
```

---

# 61. WordPress Admin

When used in WordPress Admin:

* Scope CSS.
* Avoid global `img` rules.
* Avoid overriding WordPress avatar styles globally.
* Preserve existing admin accessibility.
* Prevent conflicts with other plugins.

Avoid:

```css
.avatar {
}
```

as a global selector.

Prefer the final Iran LMS scoped naming convention.

---

# 62. Theme Independence

Avatar must work with:

```text
Classic Themes
Block Themes
Custom Themes
RTL Themes
Light Themes
Dark Themes
```

The plugin must not depend on a Theme's avatar implementation.

---

# 63. Module Usage

Avatar may be consumed by:

```text
Users
Courses
Learning
Enrollments
Assessments
Assignments
Communication
Notifications
Gamification
Certificates
Reports
```

All modules should use the same base component.

---

# 64. Do

* Keep Avatar presentation-focused.
* Support image and fallback states.
* Support initials.
* Support WordPress users.
* Support RTL.
* Support Dark Mode.
* Optimize image loading.
* Use accessible image semantics.
* Support Avatar Groups.
* Use Design Tokens.
* Keep authorization outside the component.

---

# 65. Don't

Avoid:

* Using Avatar as an authorization mechanism.
* Querying the database from the component.
* Loading full-resolution images unnecessarily.
* Making every Avatar interactive.
* Giving decorative Avatars redundant accessible labels.
* Creating page-specific Avatar sizes.
* Using global `.avatar` CSS.
* Embedding profile/business logic inside Avatar.
* Assuming every user has a profile image.

---

# 66. Testing Requirements

Test:

```text
Image
Initials
Fallback Icon
Broken Image
Missing Image
Loading
XS
SM
MD
LG
XL
2XL
Circle
Rounded
```

Context:

```text
Course Card
Instructor Profile
Student Dashboard
Comments
Messages
Notifications
Tables
Leaderboards
Avatar Group
```

Accessibility:

```text
Informative Image
Decorative Image
Interactive Avatar
Keyboard Focus
Screen Reader
Tooltip
Status Indicator
```

Responsive:

```text
Desktop
Tablet
Mobile
RTL
LTR
Light Mode
Dark Mode
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

Iran LMS follows a **Semantic Identity Avatar Architecture**:

```text
User/Profile Data
       ↓
Avatar Source Resolver
       ↓
Image / Initials / Fallback
       ↓
Avatar Component
       ↓
Context Component
       ↓
Design Tokens
```

The Avatar does not own identity data.

It represents identity data supplied by the application.

---

# 68. Strategic Vision

Avatar is a foundational identity component across Iran LMS.

It provides a consistent visual representation for:

* Students
* Instructors
* Administrators
* Course Participants
* Discussion Members
* Message Participants
* Achievement Users
* Leaderboard Users
* Verified Instructors

The long-term goal is a **WordPress-native, RTL-first, accessible, performant and Theme-independent Avatar system** that can represent user identity consistently across every Iran LMS module.
