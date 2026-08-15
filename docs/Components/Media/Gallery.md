# Gallery

**Component:** Media
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Reusable Media Gallery Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Gallery` یک کامپوننت برای نمایش مجموعه‌ای از تصاویر یا Media Itemهای مرتبط در Iran LMS است.

کاربردهای اصلی:

* گالری تصاویر یک دوره
* گالری پروژه‌های دانشجویان
* گالری تصاویر مدرس
* تصاویر منابع آموزشی
* گالری داخل محتوای دوره
* نمایش چند تصویر در یک Resource
* Preview مجموعه تصاویر

در طراحی Course Detail پروژه، بخشی با عنوان «نمونه پروژه‌های دانشجویان» به‌صورت گالری افقی نمایش داده شده است.

---

# 2. Core Principle

Gallery باید فقط مسئول **نمایش مجموعه Media** باشد.

نباید مسئول:

* Course Logic
* Enrollment
* Permission
* خرید
* Progress
* Student Project Logic
* Upload
* حذف فایل

باشد.

معماری:

```text
Course / Resource / Project
          ↓
        Gallery
          ↓
      Media Items
          ↓
        Viewer
```

---

# 3. Gallery Is Not Media Manager

Gallery با Media Manager متفاوت است.

### Gallery

```text
Display
Navigate
Preview
Open
Select
```

### Media Manager

```text
Upload
Delete
Replace
Rename
Organize
Manage Permissions
```

---

# 4. Main Use Cases

Gallery باید برای سناریوهای مختلف قابل استفاده باشد:

```text
Course Gallery
Student Projects
Instructor Gallery
Lesson Images
Resource Gallery
Certificate Gallery
Portfolio
Image Collection
```

---

# 5. Student Projects Gallery

یکی از مهم‌ترین کاربردهای Gallery در UI پروژه، نمایش پروژه‌های دانشجویان است.

نمونه:

```text
نمونه پروژه‌های دانشجویان

┌────────────┐ ┌────────────┐ ┌────────────┐
│  Project   │ │  Project   │ │  Project   │
│   Image    │ │   Image    │ │   Image    │
├────────────┤ ├────────────┤ ├────────────┤
│ فروشگاه    │ │ مدیریت     │ │ شبکه       │
│ آنلاین     │ │ وظایف      │ │ اجتماعی    │
└────────────┘ └────────────┘ └────────────┘

              ‹        ›
```

این الگو در طراحی Course Detail نیز استفاده شده است.

---

# 6. Gallery Types

Gallery باید چند حالت نمایش داشته باشد.

```text
Grid
Masonry
Carousel
Horizontal Scroll
List
Thumbnail Strip
```

هر نوع باید از یک API مشترک استفاده کند.

---

# 7. Grid Gallery

برای نمایش مجموعه‌ای از تصاویر:

```text
┌──────────┐ ┌──────────┐ ┌──────────┐
│          │ │          │ │          │
│ Image 1  │ │ Image 2  │ │ Image 3  │
│          │ │          │ │          │
└──────────┘ └──────────┘ └──────────┘

┌──────────┐ ┌──────────┐ ┌──────────┐
│ Image 4  │ │ Image 5  │ │ Image 6  │
└──────────┘ └──────────┘ └──────────┘
```

---

# 8. Carousel Gallery

برای تعداد کم تصاویر یا نمایش افقی:

```text
‹  [Image 1] [Image 2] [Image 3] [Image 4]  ›
```

این حالت برای پروژه‌های دانشجویان بسیار مناسب است.

---

# 9. Horizontal Gallery

در موبایل می‌توان از Horizontal Scroll استفاده کرد:

```text
┌────────┐ ┌────────┐ ┌────────┐
│ Image  │ │ Image  │ │ Image  │ →
└────────┘ └────────┘ └────────┘
```

کاربر با Swipe حرکت می‌کند.

---

# 10. Thumbnail Gallery

برای یک Media اصلی و چند Preview:

```text
┌────────────────────────────┐
│                            │
│       Main Image           │
│                            │
└────────────────────────────┘

[ 1 ] [ 2 ] [ 3 ] [ 4 ] [ 5 ]
```

با انتخاب Thumbnail، Media اصلی تغییر می‌کند.

---

# 11. Gallery and Viewer

Gallery نباید Viewer را دوباره پیاده‌سازی کند.

معماری:

```text
Gallery
   ↓
Selected Item
   ↓
FileViewer / Image Viewer
```

---

# 12. Lightbox

برای تصاویر، Gallery می‌تواند با Lightbox باز شود:

```text
Gallery
   ↓
Click Image
   ↓
Lightbox
   ↓
Large Image
```

Lightbox باید یک کامپوننت Overlay مستقل باشد.

---

# 13. Gallery vs Lightbox

### Gallery

مسئول:

```text
Collection
Layout
Navigation
Selection
```

### Lightbox

مسئول:

```text
Overlay
Large Preview
Close
Navigation
Fullscreen
```

---

# 14. Gallery Item

هر Item می‌تواند شامل:

```text
id
type
src
thumbnail
title
alt
caption
description
```

باشد.

---

# 15. Example Data

```js
[
    {
        id: 1,
        type: "image",
        src: "...",
        thumbnail: "...",
        title: "فروشگاه آنلاین",
        alt: "تصویر پروژه فروشگاه آنلاین",
        caption: "ساخته شده توسط محمد رضایی"
    }
]
```

---

# 16. Title

Title باید قابل خواندن باشد.

مثال:

```text
فروشگاه آنلاین
اپلیکیشن مدیریت وظایف
داشبورد مدیریت محتوا
```

Title نباید الزاماً برابر نام فایل باشد.

---

# 17. Caption

Caption برای اطلاعات تکمیلی مناسب است.

مثلاً:

```text
فروشگاه آنلاین
ساخته شده توسط محمد رضایی
```

---

# 18. Alt Text

هر تصویر باید Alt مناسب داشته باشد.

مثلاً:

```text
تصویر رابط کاربری پروژه فروشگاه آنلاین
```

نه:

```text
image_123.jpg
```

---

# 19. Decorative Images

اگر تصویر صرفاً تزئینی باشد:

```text
alt=""
```

استفاده شود.

---

# 20. Image Component Integration

Gallery نباید Image Rendering را دوباره بسازد.

معماری:

```text
Gallery
   ↓
GalleryItem
   ↓
Image
```

Image مسئول:

* Loading
* Error
* Responsive Image
* Placeholder
* Alt

است.

---

# 21. Responsive Images

برای تصاویر بزرگ باید در صورت امکان از:

```text
srcset
sizes
thumbnail
optimized source
```

استفاده شود.

Gallery نباید همیشه Original Image را برای Thumbnail دانلود کند.

---

# 22. Lazy Loading

تصاویر خارج از viewport بهتر است Lazy Load شوند.

مثلاً:

```text
Gallery
 ├── Visible Image → Load
 ├── Visible Image → Load
 ├── Offscreen → Lazy
 └── Offscreen → Lazy
```

---

# 23. First Image

اولین تصویر در viewport می‌تواند eager load شود، مخصوصاً اگر بخشی از محتوای اصلی صفحه باشد.

---

# 24. Loading State

قبل از آماده شدن تصویر:

```text
┌──────────────┐
│      ◌       │
│              │
└──────────────┘
```

از Skeleton یا Spinner سیستم استفاده شود.

---

# 25. Image Error

در صورت خطا:

```text
┌──────────────┐
│      ⚠       │
│ تصویر موجود  │
│    نیست      │
└──────────────┘
```

نباید Layout شکسته شود.

---

# 26. Empty Gallery

اگر هیچ Media وجود ندارد:

```text
┌──────────────────────────────┐
│              🖼              │
│                              │
│       تصویری وجود ندارد      │
└──────────────────────────────┘
```

Empty State باید با کامپوننت عمومی `EmptyState` هماهنگ باشد.

---

# 27. Maximum Items

Gallery می‌تواند تعداد مشخصی Item نمایش دهد.

مثلاً:

```text
۶ تصویر
```

و سپس:

```text
مشاهده همه
```

---

# 28. Show More

نمونه:

```text
نمونه پروژه‌های دانشجویان       مشاهده همه
```

در طراحی‌های موجود پروژه نیز چنین الگوی `مشاهده همه` برای گالری پروژه‌ها استفاده شده است.

---

# 29. Gallery Count

می‌توان تعداد تصاویر را نمایش داد:

```text
۱۲ تصویر
```

یا:

```text
+۸ تصویر دیگر
```

---

# 30. Overlay Count

در Grid:

```text
┌──────────┐
│ Image    │
│          │
│ +۸       │
└──────────┘
```

با کلیک، Gallery کامل باز می‌شود.

---

# 31. Navigation

Carousel می‌تواند:

```text
Previous
Next
```

داشته باشد.

در RTL جهت حرکت UI باید با منطق تجربه فارسی سازگار باشد.

---

# 32. RTL

Gallery باید RTL-first باشد.

مثلاً:

```text
‹  پروژه قبلی
پروژه بعدی  ›
```

اما خود تصویر نباید Mirror شود.

---

# 33. RTL and Image

RTL فقط روی UI اعمال می‌شود:

```text
UI → RTL
Image → Original Direction
```

---

# 34. Mobile Gallery

در موبایل:

```text
Horizontal Scroll
Swipe
Touch Targets
Compact Controls
```

اولویت دارند.

---

# 35. Mobile Grid

Grid موبایل می‌تواند:

```text
2 columns
```

باشد.

اما تعداد ستون باید از Responsive System گرفته شود و hard-code نشود.

---

# 36. Desktop Grid

در Desktop:

```text
3 columns
4 columns
```

بسته به Container و context قابل استفاده است.

---

# 37. Gallery Gap

فاصله بین Itemها باید از Spacing Token سیستم استفاده کند.

مثلاً:

```text
gap-sm
gap-md
gap-lg
```

نه مقدارهای پراکنده.

---

# 38. Aspect Ratio

Gallery باید امکان تعیین نسبت تصویر را داشته باشد.

مثلاً:

```text
1:1
4:3
16:9
3:2
auto
```

---

# 39. Object Fit

برای Thumbnail:

```text
cover
```

معمولاً مناسب است.

اما برای تصاویر آموزشی که نباید Crop شوند:

```text
contain
```

بهتر است.

---

# 40. Crop Strategy

نباید همه تصاویر به‌صورت اجباری Crop شوند.

نوع محتوا تعیین می‌کند:

```text
Project Screenshot → cover
Certificate → contain
Diagram → contain
Photo → cover
```

---

# 41. Border Radius

Gallery Item باید از Radius سیستم استفاده کند.

در پروژه، طراحی کلی بر پایه Cardهای Rounded و UI مدرن SaaS تعریف شده است.

---

# 42. Hover State

Desktop می‌تواند هنگام Hover:

```text
Image
   ↓
Subtle Overlay
   ↓
View Icon
```

نمایش دهد.

Hover نباید برای عملکرد اصلی ضروری باشد.

---

# 43. Selected State

اگر Gallery قابلیت انتخاب داشته باشد:

```text
Selected
   ↓
Border
   ↓
Focus / Active Indicator
```

نمایش داده شود.

---

# 44. Keyboard Navigation

Gallery باید با Keyboard قابل استفاده باشد.

حداقل:

```text
Tab
Enter
Space
Arrow Left
Arrow Right
Escape
```

در صورت وجود Lightbox، Escape باید آن را ببندد.

---

# 45. Focus

Focus Indicator باید واضح باشد.

نباید فقط به تغییر رنگ وابسته باشد.

---

# 46. Screen Reader

هر Gallery باید Label قابل دسترس داشته باشد.

مثلاً:

```text
گالری پروژه‌های دانشجویان
```

و Itemها:

```text
تصویر پروژه فروشگاه آنلاین
```

---

# 47. Gallery Role

در صورت نیاز می‌توان از semantics مناسب استفاده کرد.

اما نباید بدون دلیل ARIA Roleهای پیچیده اضافه شوند.

HTML semantics باید اولویت داشته باشد.

---

# 48. Lightbox Accessibility

اگر Lightbox استفاده شود:

```text
Open
 ↓
Focus → Lightbox
 ↓
Close
 ↓
Focus → Trigger
```

Focus باید مدیریت شود.

---

# 49. Gallery Controls

کنترل‌های عمومی:

```text
Previous
Next
View
Fullscreen
Close
```

همگی باید optional باشند.

---

# 50. Download

Download یک قابلیت Gallery نیست.

اگر Media اجازه دانلود داشته باشد:

```text
Permission
 ↓
Downloadable
 ↓
Gallery
 ↓
Download Action
```

---

# 51. Delete

Gallery نباید Delete داشته باشد.

حذف Media متعلق به Media Management است.

---

# 52. Upload

Gallery نباید Upload را مدیریت کند.

در صورت نیاز:

```text
Media Manager
 ↓
Upload
 ↓
Gallery
```

---

# 53. Reordering

اگر Gallery قابل مرتب‌سازی باشد:

```text
Drag
 ↓
Reorder
 ↓
Parent Module
```

ترتیب باید در سیستم والد ذخیره شود.

Gallery صرفاً UI مربوط به آن را ارائه می‌دهد.

---

# 54. Student Project Gallery

برای پروژه‌های دانشجویان بهتر است Metadata اختیاری باشد:

```text
Title
Student
Course
Thumbnail
Project URL
```

اما Gallery نباید Student Entity را مدیریت کند.

---

# 55. Project Card

نمونه:

```text
┌─────────────────────────┐
│                         │
│       Screenshot        │
│                         │
├─────────────────────────┤
│ فروشگاه آنلاین          │
│ ساخته شده توسط سارا     │
└─────────────────────────┘
```

---

# 56. Gallery in Course Detail

در Course Detail:

```text
Instructor
     ↓
Student Projects
     ↓
Gallery
```

این الگو در Mockupهای Course Detail پروژه نیز دیده می‌شود.

---

# 57. Gallery in Instructor Profile

در آینده ممکن است Gallery برای:

```text
Instructor Portfolio
Teaching Materials
Featured Projects
```

استفاده شود.

این قابلیت باید بدون تغییر API پایه قابل پیاده‌سازی باشد.

---

# 58. Gallery in Resource

یک Resource ممکن است چند تصویر داشته باشد:

```text
Resource
 ↓
Gallery
 ↓
Image 1
Image 2
Image 3
```

---

# 59. Gallery in Lesson

در Lesson می‌توان تصاویر مرتبط با محتوا را نمایش داد:

```text
Lesson
 ├── Content
 ├── Gallery
 ├── Resources
 └── Attachments
```

---

# 60. Gallery and FileViewer

اگر یک Gallery شامل انواع مختلف فایل باشد:

```text
Gallery
   ↓
Selected Item
   ↓
FileViewer
```

بنابراین Gallery و FileViewer مکمل یکدیگر هستند.

---

# 61. Mixed Media Gallery

در آینده ممکن است Gallery شامل:

```text
Image
PDF
Video
Audio
```

باشد.

در این حالت:

```text
Gallery
   ↓
Media Type
   ↓
Appropriate Viewer
```

---

# 62. Media Type Badge

برای Mixed Gallery می‌توان Badge نمایش داد:

```text
PDF
Video
Audio
Image
```

اما Badge باید فقط زمانی نمایش داده شود که تشخیص نوع برای کاربر مفید باشد.

---

# 63. Gallery API

API پیشنهادی:

```jsx
<Gallery
    items={items}
    layout="grid"
    columns={3}
    gap="md"
    aspectRatio="16/9"
    lightbox
/>
```

---

# 64. Item API

هر Item:

```js
{
    id,
    type,
    src,
    thumbnail,
    title,
    alt,
    caption
}
```

---

# 65. Layout API

مقادیر پیشنهادی:

```text
grid
carousel
masonry
horizontal
thumbnails
```

---

# 66. Behavior API

```text
selectable
lightbox
fullscreen
downloadable
navigation
lazyLoad
```

همگی باید optional باشند.

---

# 67. Events

Gallery می‌تواند eventهای زیر را expose کند:

```text
onItemClick
onItemSelect
onNext
onPrevious
onOpen
onClose
onLoad
onError
```

---

# 68. Performance Events

برای Media سنگین:

```text
onImageLoad
onImageError
```

می‌تواند در سطح Item مدیریت شود.

---

# 69. WordPress Integration

Gallery باید بتواند با WordPress Media Library کار کند.

مثلاً:

```text
Attachment IDs
      ↓
Media Resolver
      ↓
Gallery Items
      ↓
Gallery
```

---

# 70. Media Resolver

بهتر است تبدیل WordPress Attachment به Gallery Item خارج از UI انجام شود.

```text
WP Attachment
      ↓
Media Resolver
      ↓
Gallery Item
```

این کار باعث کاهش وابستگی UI به WordPress API می‌شود.

---

# 71. Theme Independence

Gallery نباید به Theme خاصی وابسته باشد.

نباید فرض کند:

```text
Bootstrap
Tailwind
Elementor
Specific Theme CSS
```

در سایت وجود دارد.

---

# 72. CSS Scope

استایل‌ها باید scoped باشند.

بد:

```css
img {}
.gallery {}
```

بهتر:

```css
.iran-lms-gallery {}
.iran-lms-gallery__item {}
```

نام‌گذاری نهایی باید با CSS architecture پروژه هماهنگ باشد.

---

# 73. Design Tokens

Gallery باید از:

```text
Color
Spacing
Radius
Typography
Shadow
Motion
Breakpoint
```

Tokenهای Design System استفاده کند.

---

# 74. Dark Mode

Gallery باید در Dark Mode نیز درست نمایش داده شود.

اما خود تصاویر نباید invert شوند.

```text
Dark UI
   ↓
Dark Gallery Chrome
   ↓
Original Image
```

---

# 75. Animation

Animation باید subtle باشد:

```text
Hover
Open
Close
Slide
Fade
```

از Animation سنگین جلوگیری شود.

---

# 76. Reduced Motion

در صورت فعال بودن:

```text
prefers-reduced-motion
```

Animationهای غیرضروری باید کاهش یابند.

---

# 77. Security

Gallery نباید URL ناشناس را بدون بررسی نمایش دهد.

مخصوصاً برای:

```text
Protected Media
External URLs
Signed URLs
User Generated Content
```

---

# 78. User Generated Content

اگر تصاویر پروژه‌های دانشجویان نمایش داده می‌شوند:

```text
Student Upload
 ↓
Validation
 ↓
Authorization
 ↓
Gallery
```

Gallery نباید فایل خام User را بدون کنترل امنیتی مصرف کند.

---

# 79. SVG

SVGهای User Generated باید با دقت بیشتری کنترل شوند.

SVG ناشناس نباید بدون Sanitization اجرا شود.

---

# 80. External Images

برای External Image:

```text
Approved Source
 ↓
Image
```

استفاده شود.

Gallery نباید مسئول اعتماد به هر URL باشد.

---

# 81. Empty State

اگر گالری خالی است:

```text
هنوز تصویری برای نمایش وجود ندارد.
```

و در پنل مدیریت، اگر کاربر permission داشته باشد:

```text
[ افزودن تصویر ]
```

اما دکمه Upload متعلق به Parent/Media Manager است، نه Gallery پایه.

---

# 82. Testing Requirements

## Layout

```text
Grid
Carousel
Masonry
Horizontal
Thumbnail
```

## Media

```text
Single Image
Multiple Images
Mixed Media
Large Image
Broken Image
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## Interaction

```text
Click
Swipe
Keyboard
Previous
Next
Lightbox
Fullscreen
```

## Accessibility

```text
Alt
Focus
Keyboard
Screen Reader
Reduced Motion
```

## WordPress

```text
Media Library
Attachment ID
Theme Compatibility
RTL
Dark Mode
```

---

# 83. Do

* Gallery را reusable نگه دار.
* Image را از طریق Image Component نمایش بده.
* Viewer را از Gallery جدا کن.
* Lightbox را مستقل نگه دار.
* از WordPress Media Library پشتیبانی کن.
* Lazy Loading داشته باش.
* Responsive باش.
* RTL-first باش.
* Accessibility را رعایت کن.
* از Design Tokens استفاده کن.
* CSS را scope کن.
* Gallery را برای Add-onها قابل توسعه نگه دار.

---

# 84. Don't

از این موارد اجتناب شود:

* Upload داخل Gallery پایه
* Delete داخل Gallery پایه
* Enrollment Logic
* Permission Logic
* Course Logic
* Student Logic
* وابستگی به Theme
* Global CSS
* اعتماد به URLهای ناشناس
* Crop اجباری همه تصاویر
* اجرای SVG ناشناس
* وابستگی مستقیم Gallery به یک Viewer خاص

---

# 85. Architecture Decision

معماری نهایی:

```text
                    Gallery
                       │
              ┌────────┴────────┐
              │                 │
          Collection          Layout
              │                 │
              │        ┌────────┼─────────┐
              │        │        │         │
              │       Grid   Carousel  Horizontal
              │
              ↓
         Gallery Item
              │
        ┌─────┼──────┐
        ↓     ↓      ↓
      Image  Video   File
        │     │      │
        └─────┴──────┘
                ↓
             Viewer
```

---

# 86. LMS Integration

Gallery می‌تواند در بخش‌های مختلف Iran LMS استفاده شود:

```text
Course
   ↓
Student Projects
   ↓
Gallery
```

یا:

```text
Lesson
   ↓
Resources
   ↓
Gallery
```

یا:

```text
Instructor
   ↓
Portfolio
   ↓
Gallery
```

---

# 87. Strategic Vision

`Gallery` باید یک Primitive عمومی Media در Iran LMS باشد؛ نه یک کامپوننت مخصوص Course Detail.

هدف:

```text
Any Media Collection
        ↓
      Gallery
        ↓
Consistent Presentation
        ↓
Viewer / Lightbox
```

این معماری اجازه می‌دهد در آینده قابلیت‌هایی مثل:

```text
Student Portfolio
Course Projects
Instructor Portfolio
Image Resources
Mixed Media
Interactive Media
```

بدون بازطراحی هسته UI اضافه شوند.

`Gallery` در نهایت باید **سبک، قابل توسعه، RTL-first، WordPress-friendly، Theme-independent و هماهنگ با Media Architecture افزونه** باقی بماند.
