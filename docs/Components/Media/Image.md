# Image

**Component:** Media
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Reusable Media Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Image is the foundational media component for displaying visual content inside Iran LMS.

It is used for:

* Course thumbnails
* Instructor avatars
* Student avatars
* Certificate previews
* Course preview images
* Lesson resources
* Achievement graphics
* Category illustrations
* Empty states
* Promotional media
* User-generated media where supported

The Iran LMS design system is based on a modern SaaS interface, RTL Persian UI, component-based architecture and WordPress compatibility.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Image must be:

```text id="p3z6c1"
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

Image must remain a presentation component.

It must not contain course, enrollment, user, payment or learning business logic.

---

# 3. Image Is Not Avatar

Image is a general-purpose media component.

Avatar is a specialized component for people.

Use:

```text id="v9h7sl"
Image → Course Thumbnail
Avatar → Instructor / Student
```

Do not duplicate Avatar behavior inside Image.

---

# 4. Image Is Not Background

Use Image when the image represents actual content.

Use CSS background when the image is purely decorative.

Example:

```text id="8e6t2q"
Course Thumbnail
→ Image

Decorative Gradient
→ CSS Background
```

Do not use an Image component for decorative gradients or visual effects.

---

# 5. Main Use Cases

The Image component should support:

```text id="m1c3z7"
Course
Instructor
Student
Certificate
Category
Achievement
Lesson
Resource
Article-like external media if supported by the host theme
Promotional media
```

The plugin itself must not assume that article, podcast or shop functionality exists inside the LMS plugin.

---

# 6. Course Thumbnail

Course cards frequently require a thumbnail.

Example:

```text id="k6j2bx"
┌──────────────────────────┐
│                          │
│       COURSE IMAGE       │
│                          │
└──────────────────────────┘
│ آموزش جامع React         │
```

The My Courses design uses course thumbnails together with progress information, instructor data and course actions.

Image owns only the visual media.

Course Card owns:

* Title
* Instructor
* Progress
* Actions
* Metadata

---

# 7. Course Hero Image

Course Detail pages may use a large visual preview.

The design guide includes a large video/preview area with course imagery and an overlaid play action.

Architecture:

```text id="d3p8xk"
Course Detail
    ↓
Media Container
    ↓
Image
    +
Play Button
```

Image does not own the Play Button.

---

# 8. Instructor Image

Instructor images should normally use the Avatar component.

Example:

```text id="y1f8s2"
[ Avatar ] علی احمدی
```

Use Image directly only when the media is a larger instructor profile/cover image.

---

# 9. Certificate Image

Certificate previews may use Image.

Example:

```text id="m8d4qp"
┌──────────────────────┐
│  CERTIFICATE         │
│                      │
│  React جامع          │
│                      │
└──────────────────────┘
```

The Certificate component owns:

* Certificate metadata
* Course name
* Issue date
* Download
* Verification

Image owns the preview.

---

# 10. Achievement Image

Gamification may use image-based badges.

Example:

```text id="a5f0kw"
[ 🏆 ]
استاد زمان
```

If the badge is a real uploaded graphic, use Image.

If it is a symbolic UI icon, use Icon.

---

# 11. Category Image

Course categories may use visual illustrations or icons.

The Course Categories design uses visual category symbols inside cards.

Architecture:

```text id="c0k9q1"
Category Card
    ↓
Icon / Image
    ↓
Category Name
    ↓
Course Count
```

Use Image only when the category asset is actual media.

---

# 12. Lesson Media

Lesson content may include images inside the lesson body.

Examples:

```text id="v4y2pd"
Screenshot
Diagram
Code Screenshot
Educational Illustration
```

The Image component should provide rendering and accessibility.

The Lesson module owns the lesson content.

---

# 13. Resource Images

If a lesson resource is an image:

```text id="w3e9cz"
Resources
    ↓
Image Resource
```

The resource system owns:

* File metadata
* Download
* Permissions
* Ownership

Image owns display.

---

# 14. Image Source

Image should support approved sources such as:

```text id="r1q5az"
WordPress Media Library
Plugin-managed uploads
Remote URL when explicitly supported
Generated asset
```

The component must not blindly trust arbitrary URLs.

---

# 15. WordPress Media Library

When an image comes from WordPress Media Library, the implementation should use WordPress attachment information where possible.

Typical data:

```text id="q2y7mv"
Attachment ID
URL
Alt Text
Width
Height
Mime Type
```

Do not duplicate WordPress media metadata unnecessarily.

---

# 16. Attachment ID

Recommended API support:

```text id="h7m1pc"
attachmentId
```

Example:

```text id="x4z8kn"
<Image
    attachmentId={123}
/>
```

The exact implementation depends on the plugin's frontend architecture.

---

# 17. URL

Direct URLs may be supported:

```text id="v7c2dm"
<Image
    src="..."
/>
```

However, external URLs should be validated according to the project's security and content rules.

---

# 18. Alt Text

Every meaningful image should have an appropriate alternative text.

Example:

```text id="q9a1sf"
alt="تصویر دوره آموزش React"
```

Avoid:

```text id="2p6xhd"
alt="image"
```

or:

```text id="8n4wqa"
alt="photo"
```

---

# 19. Decorative Image

If an image provides no meaningful information:

```text id="r7m2zk"
alt=""
```

or the implementation should expose an equivalent decorative mode.

Example:

```text id="3v5bqc"
Decorative background illustration
```

must not create unnecessary screen-reader noise.

---

# 20. Image Accessibility

Image accessibility should distinguish between:

```text id="p8r3ay"
Meaningful
Decorative
Interactive
Informational
```

The component must not automatically generate bad alt text from filenames.

---

# 21. Never Use Filename as Alt

Avoid:

```text id="f7d2kw"
react-course-final-v3-1280x720.jpg
```

as accessible text.

The filename is technical metadata, not a description.

---

# 22. Image With Link

When Image is inside a Link:

```text id="j3c7vm"
<Link>
    <Image />
</Link>
```

the surrounding link must provide an accessible name.

If the image is the only content of the link, its alt text may contribute to that name.

---

# 23. Image With Button

When an image is inside a clickable action:

```text id="s6k1hp"
<Button>
    <Image />
</Button>
```

the Button must have an accessible name.

Image should not be responsible for the action.

---

# 24. Image Loading

Images should support:

```text id="e9f5bv"
Lazy
Eager
Auto
```

Recommended default for below-the-fold media:

```text id="k2d7xq"
lazy
```

Above-the-fold critical images may use eager loading.

---

# 25. Loading State

Image should support a loading state.

Example:

```text id="v6m9tw"
┌──────────────────┐
│                  │
│   Skeleton       │
│                  │
└──────────────────┘
```

The dedicated Skeleton component should preferably handle the visual loading state.

---

# 26. Error State

When an image cannot load:

```text id="b8q3zf"
┌──────────────────┐
│       [ 🖼 ]      │
│ تصویر موجود نیست │
└──────────────────┘
```

The fallback should be visually stable.

Do not allow broken-image icons to distort the layout.

---

# 27. Fallback

Image API should support an optional fallback.

Example:

```text id="z4c6ms"
fallback="default-course-thumbnail"
```

Fallback may be:

```text id="p3h8nx"
Image
Icon
Initials
Placeholder
```

depending on the use case.

---

# 28. Course Fallback

If a course has no thumbnail:

```text id="d7r2wy"
[ Course Placeholder ]
آموزش React
```

The placeholder should follow the Design System.

Do not display an arbitrary external stock image.

---

# 29. User Image Fallback

For people, Avatar should normally handle the fallback:

```text id="q6t9av"
Photo
   ↓
Initials
   ↓
Default Avatar
```

Image should not recreate Avatar behavior.

---

# 30. Aspect Ratio

Image should support controlled aspect ratios.

Recommended presets:

```text id="n3q8wk"
1:1
4:3
16:9
3:2
auto
```

The final available tokens should be defined centrally.

---

# 31. Course Thumbnail Ratio

Course thumbnails should generally use:

```text id="x7v2pd"
16:9
```

or the ratio defined by the Course Card component.

This maintains consistent card height.

---

# 32. Avatar Ratio

Avatar uses:

```text id="m5k8qa"
1:1
```

but Avatar remains responsible for shape and sizing.

---

# 33. Certificate Ratio

Certificate previews may use:

```text id="w2p6zs"
landscape
```

with the actual ratio based on the generated certificate format.

---

# 34. Object Fit

Image should support:

```text id="a7m3kd"
cover
contain
fill
none
scale-down
```

Default for visual card thumbnails:

```text id="x8p2vl"
cover
```

---

# 35. Cover

Use `cover` when the visual must completely fill its container.

Example:

```text id="k1f6sq"
Course Card Thumbnail
```

Cropping is acceptable if the design intentionally controls the focal point.

---

# 36. Contain

Use `contain` when the entire image must remain visible.

Example:

```text id="u4x9zc"
Certificate
Logo
Partner Mark
Document Preview
```

---

# 37. Object Position

For important images, Image may support:

```text id="q8b2mv"
objectPosition
```

Examples:

```text id="t3z6pn"
center
top
center top
50% 30%
```

This is useful when course thumbnails have important subjects that should remain visible.

---

# 38. Border Radius

Image should support design-system radius tokens.

Recommended common values:

```text id="g4m8xs"
sm
md
lg
xl
full
```

The Iran LMS visual language uses rounded cards and approximately 16px corner radii.

---

# 39. Radius Ownership

Image should not always decide its own radius.

The parent component may control the clipping behavior.

Example:

```text id="e7q1nc"
<Card>
    <Image />
</Card>
```

The Card may define the final visual clipping.

---

# 40. Image Border

Images generally should not have an arbitrary border.

If a border is required:

```text id="z6k3yp"
Use Design Token
```

rather than:

```css id="u9x1bd"
border: 1px solid #ddd;
```

---

# 41. Shadow

Image itself should normally not own a shadow.

The parent Card/Container should own elevation.

This avoids inconsistent visual hierarchy.

---

# 42. Image Overlay

Images may have overlays.

Examples:

```text id="r8k4sz"
Play
Progress
Duration
Badge
Favorite
```

Architecture:

```text id="y5m2xk"
Media Container
├── Image
├── Overlay
├── Badge
└── Action
```

Image remains independent.

---

# 43. Course Preview Overlay

Example:

```text id="w8p4cd"
┌───────────────────────┐
│                       │
│       COURSE IMAGE    │
│          [ ▶ ]        │
│                       │
│                 12:45 │
└───────────────────────┘
```

The Image renders the visual.

Play Button and Duration Badge are separate components.

---

# 44. Progress Overlay

Course cards may show progress over the thumbnail:

```text id="n9f3qw"
┌───────────────────────┐
│               [ 60% ] │
│       IMAGE           │
│                       │
└───────────────────────┘
```

The Badge/Progress component owns the progress indicator.

---

# 45. Bookmark Overlay

Example:

```text id="c5v8rt"
┌───────────────────────┐
│              [ ♡ ]    │
│       IMAGE           │
│                       │
└───────────────────────┘
```

Bookmark action belongs to the Course/Card system.

---

# 46. Image and Icon

Use Icon for:

```text id="u3f8mz"
Play
Favorite
Download
Zoom
Expand
```

Use Image for:

```text id="j6q2vb"
Actual visual media
```

Do not use an image file for a simple UI icon.

---

# 47. Image and Video

Image may act as a poster/preview for Video.

Architecture:

```text id="v1k7px"
Video
├── Poster Image
├── Play Button
└── Controls
```

Image owns the poster.

Video component owns playback.

---

# 48. Image and Lesson Player

The Lesson Player design includes a large video area and supporting media/resources.

The Image component should therefore support:

```text id="r9m4sk"
Video Poster
Resource Preview
Content Image
```

without taking ownership of the player.

---

# 49. Responsive Images

Image should support responsive rendering where possible.

Recommended concepts:

```text id="s2q8fv"
src
srcSet
sizes
```

This allows WordPress to provide appropriate image sizes.

---

# 50. WordPress Image Sizes

The plugin should prefer appropriate WordPress-generated image sizes rather than always loading the original full-resolution file.

Conceptually:

```text id="k5z9ra"
Original
   ↓
WordPress Image Sizes
   ↓
Responsive Image
```

This reduces unnecessary bandwidth.

---

# 51. Retina / High-Density Screens

Where appropriate, responsive images should support high-density displays without loading unnecessarily huge files.

Do not automatically request the largest image.

---

# 52. Performance

Image performance is especially important because LMS pages may contain:

* Many course cards
* Multiple instructor avatars
* Certificate cards
* Achievement graphics
* Lesson resources

Use:

```text id="x2c7nv"
Lazy Loading
Responsive Sizes
Optimized Formats
Correct Dimensions
Caching
```

where supported by the WordPress environment.

---

# 53. Prevent Layout Shift

Image should ideally know its dimensions or aspect ratio before loading.

Example:

```text id="m6q1xs"
width
height
```

or:

```text id="d8p3kv"
aspect-ratio
```

This prevents content from jumping after the image loads.

---

# 54. Image Dimensions

The component should support:

```text id="z7n4cy"
width
height
```

when known.

For dynamic media, use an aspect-ratio container.

---

# 55. Broken Image Prevention

Do not allow:

```text id="x5q9rm"
broken image
→ container collapses
→ card layout shifts
```

Instead:

```text id="p1v7ds"
Image Failure
      ↓
Fallback
      ↓
Stable Container
```

---

# 56. Remote Images

Remote images should be treated as potentially unreliable.

Possible problems:

```text id="c6m2za"
404
Timeout
Hotlink protection
Slow server
Invalid SSL
CORS
```

A stable fallback must exist where appropriate.

---

# 57. Security

Do not allow arbitrary HTML inside Image.

The component should safely handle:

```text id="n7p3xy"
src
alt
dimensions
classes
loading
```

Any externally supplied URL must follow the project's validation/sanitization strategy.

---

# 58. SVG Images

SVG can be used as an image when it is trusted.

However, arbitrary user-uploaded SVG content should not automatically be rendered inline.

For untrusted SVG:

```text id="g8r2mk"
Sanitize
or
Treat as external image
```

according to WordPress security requirements.

---

# 59. Theme Independence

Image must work across:

```text id="u6x3pn"
Classic Theme
Block Theme
Custom Theme
Dark Theme
RTL Theme
```

The plugin should not assume the Theme's image classes or styles.

---

# 60. CSS Scope

Avoid generic selectors such as:

```css id="w2n7mq"
img {}
```

inside the plugin.

This could unintentionally affect the WordPress Theme.

Prefer scoped component classes.

Example:

```css id="y9c4kp"
.iran-lms-image {}
```

The final naming convention must follow the project CSS architecture.

---

# 61. Dark Mode

Image itself normally does not change in Dark Mode.

However:

* Placeholder backgrounds
* Borders
* Overlays
* Loading states
* Fallback surfaces

must adapt to Dark Mode.

Actual image content should remain unchanged unless a dedicated light/dark asset exists.

---

# 62. Light / Dark Asset

Some assets may require variants:

```text id="j4s7nc"
logo-light
logo-dark
```

This should be handled by a specialized responsive/media strategy rather than duplicating arbitrary Image logic throughout modules.

---

# 63. RTL

Images themselves do not normally mirror in RTL.

Do not automatically apply:

```text id="t7p2qm"
transform: scaleX(-1);
```

to images.

If an educational diagram is direction-dependent, the content owner must explicitly determine whether an RTL variant is needed.

---

# 64. Image Position in RTL

The surrounding layout determines placement.

Image should not assume:

```text id="e2m8vk"
left
right
```

unless the component explicitly requires it.

---

# 65. Crop and Focal Point

Course thumbnails may have important focal points.

Image may support:

```text id="p5y8sz"
focalPoint
```

or `objectPosition`.

Example:

```text id="s4d9qk"
focalPoint:
50% 35%
```

This is especially useful for course hero imagery.

---

# 66. Image Caption

Image may optionally be associated with a caption.

Example:

```text id="c8q2mw"
[ IMAGE ]

شکل ۱ — معماری سیستم احراز هویت
```

However, the caption should generally be owned by the content component.

---

# 67. Figure

When semantic content requires a caption:

```text id="x3v7bn"
<figure>
    <Image />
    <figcaption>...</figcaption>
</figure>
```

Image remains a child component.

---

# 68. Zoom

Generic Image should not automatically provide zoom.

For documents or educational diagrams where zoom is necessary:

```text id="k9m3wd"
Image
    ↓
Dedicated Image Viewer / Lightbox
```

The specialized viewer owns:

* Zoom
* Pan
* Close
* Keyboard
* Mobile gestures

---

# 69. Image Viewer

A future Image Viewer component may support:

```text id="u2f8px"
Zoom
Pan
Fullscreen
Download
Close
Previous
Next
```

Do not overload Image with these features.

---

# 70. Course Image Gallery

If Course Detail supports multiple preview images:

```text id="v5c1mz"
Gallery
├── Image
├── Image
├── Image
└── Image Viewer
```

The Gallery component owns selection.

Image remains reusable.

---

# 71. User-Generated Images

If the LMS eventually allows users to upload images:

```text id="z8q4ks"
Profile
Assignment
Discussion
Comment
```

Image rendering must be separated from upload/storage permissions.

The Upload component owns:

```text id="n4r6yx"
Selection
Validation
Upload
Progress
Errors
```

Image owns display.

---

# 72. Image Metadata

Image may expose metadata such as:

```text id="b2w9pc"
width
height
alt
mimeType
attachmentId
src
```

Do not expose unnecessary internal WordPress metadata to UI consumers.

---

# 73. Component API

Recommended API:

```text id="q4m8sv"
Image
    src
    alt
    width
    height
    aspectRatio
    objectFit
    objectPosition
    loading
    fallback
    decorative
    className
```

Optional WordPress-specific:

```text id="d7c2xn"
attachmentId
size
```

---

# 74. Example

Course thumbnail:

```text id="k8p4zs"
<Image
    attachmentId={123}
    size="medium_large"
    alt="تصویر دوره آموزش React"
    aspectRatio="16/9"
    objectFit="cover"
    loading="lazy"
/>
```

---

# 75. Decorative Example

```text id="n2y6qc"
<Image
    src="..."
    alt=""
    decorative
/>
```

Use only when the image has no informational value.

---

# 76. Fallback Example

```text id="r5v8mk"
<Image
    src="..."
    alt="تصویر دوره آموزش React"
    fallback="course-placeholder"
/>
```

---

# 77. WordPress Example

Conceptually:

```text id="w3q7bn"
<Image
    attachmentId={course.thumbnailId}
    size="medium_large"
    alt={course.thumbnailAlt}
/>
```

The Course module provides the media reference.

Image remains unaware of Course business logic.

---

# 78. Component Boundary

Image owns:

```text id="a4x7pc"
Rendering
Sizing
Aspect Ratio
Object Fit
Loading
Fallback
Accessibility
Responsive Source
```

Image does not own:

```text id="m6z2qy"
Course Data
Enrollment
Progress
Favorite State
Permissions
Upload
Download
Payment
Navigation
```

---

# 79. Do

* Use WordPress Media Library when appropriate.
* Use responsive image sizes.
* Provide meaningful alt text.
* Support decorative images.
* Prevent layout shift.
* Support fallback states.
* Support lazy loading.
* Use aspect-ratio containers.
* Keep image behavior theme-independent.
* Scope CSS.
* Separate Image from Avatar.
* Separate Image from Video.
* Separate Image from upload logic.

---

# 80. Don't

Avoid:

* Global `img` CSS.
* Using Image for every icon.
* Embedding business logic.
* Loading original full-size images unnecessarily.
* Using filenames as alt text.
* Automatically mirroring images in RTL.
* Injecting arbitrary SVG.
* Allowing broken images to collapse layout.
* Making Image responsible for downloads.
* Making Image responsible for uploads.
* Making Image responsible for navigation.

---

# 81. Testing Requirements

Test:

```text id="c7m2px"
Course Thumbnail
Hero Image
Certificate
Resource Image
Category Image
Fallback
Broken Image
Loading
```

Ratios:

```text id="p4z8kn"
1:1
4:3
16:9
Auto
```

Object Fit:

```text id="x6q2mv"
cover
contain
fill
```

Accessibility:

```text id="b8y3rs"
Meaningful Alt
Decorative
Interactive Parent
Screen Reader
```

Performance:

```text id="m1v7qc"
Lazy Loading
Responsive Source
Correct Dimensions
Layout Shift
Large Images
```

Themes:

```text id="z4k8pd"
Light
Dark
RTL
LTR
```

WordPress:

```text id="n6c2wx"
Media Library
Classic Theme
Block Theme
Frontend
Admin
Plugin Conflict
```

---

# 82. Architecture Decision

Iran LMS follows a **Media-First, Presentation-Only Image Architecture**:

```text id="j8p3kv"
WordPress Media / Approved Source
              ↓
          Image Data
              ↓
        Image Component
              ↓
       Parent UI Component
```

The parent component owns the domain meaning.

For example:

```text id="r2m7xy"
Course Card
    ↓
Image
```

not:

```text id="q5c8vn"
Image
    ↓
Course Card Logic
```

---

# 83. Strategic Vision

Image is a foundational media primitive, not a business component.

The long-term goal is a **responsive, accessible, performant, WordPress-native and Theme-independent Image system** that can safely serve every Iran LMS module while remaining simple enough to reuse across:

* Courses
* Learning
* Assessments
* Certificates
* Users
* Gamification
* Media
* Dashboard
* Resources

The component should provide the visual foundation while keeping domain behavior outside the Image itself.
