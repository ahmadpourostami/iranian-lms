# FileViewer

**Component:** Media
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Reusable File Viewing Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`FileViewer` یک کامپوننت عمومی برای نمایش فایل‌های آموزشی داخل Iran LMS است.

این کامپوننت زمانی استفاده می‌شود که کاربر باید بتواند یک فایل مرتبط با دوره یا درس را **مشاهده، بررسی یا باز کند** بدون اینکه الزاماً فایل را دانلود کند.

نمونه کاربردها:

* مشاهده فایل درس
* مشاهده جزوه
* مشاهده فایل آموزشی
* Preview فایل
* نمایش فایل ضمیمه
* نمایش سند در Lesson Player
* نمایش فایل در بخش Resources

در طراحی Lesson Player، بخش‌های `Resources` و `Attachments` به‌عنوان بخشی از تجربه درس در نظر گرفته شده‌اند.

---

# 2. Core Principle

`FileViewer` باید یک **کامپوننت عمومی نمایش فایل** باشد.

نباید مسئول منطق آموزشی یا تجاری باشد.

```text
Lesson
   ↓
Resource / Attachment
   ↓
FileViewer
   ↓
File
```

---

# 3. FileViewer Is Not a File Manager

این دو مفهوم باید جدا باشند.

`FileViewer`:

```text
Open
View
Preview
Navigate
Zoom
Close
```

را مدیریت می‌کند.

اما File Manager یا Media Manager مسئول:

```text
Upload
Delete
Rename
Move
Replace
Permissions
```

است.

---

# 4. Supported File Categories

در نسخه Foundation، FileViewer باید قابلیت نمایش فایل‌های قابل پشتیبانی را به‌صورت قابل توسعه داشته باشد.

دسته‌بندی پیشنهادی:

```text
Document
Image
PDF
Text
Video
Audio
Other
```

اما هر نوع فایل باید Renderer مناسب خودش را داشته باشد.

---

# 5. Renderer Architecture

معماری پیشنهادی:

```text
FileViewer
    │
    ├── ImageRenderer
    ├── PDFRenderer
    ├── VideoRenderer
    ├── AudioRenderer
    ├── TextRenderer
    └── UnsupportedRenderer
```

این معماری باعث می‌شود `FileViewer` به یک نوع فایل خاص وابسته نشود.

---

# 6. FileViewer vs Media Components

تفاوت مهم است.

```text
FileViewer
    ↓
تشخیص نوع نمایش
    ↓
Renderer
```

در مقابل:

```text
Video
Audio
Image
```

کامپوننت‌های تخصصی Media هستند.

بنابراین:

```text
FileViewer
    ├── Image → Image
    ├── Video → Video
    ├── Audio → Audio
    └── PDF → PDF Renderer
```

---

# 7. Why FileViewer Exists

وجود FileViewer باعث می‌شود والد مجبور نباشد برای هر نوع فایل شرط‌های متعدد بنویسد.

بد:

```text
if image
if pdf
if video
if audio
if text
```

بهتر:

```text
<FileViewer file={file} />
```

و خود FileViewer Renderer مناسب را انتخاب کند.

---

# 8. Main Use Case

نمونه در Lesson:

```text
┌─────────────────────────────────────┐
│ فایل‌های این درس                    │
├─────────────────────────────────────┤
│ 📄 جزوه جلسه اول.pdf                │
│                                     │
│             [ مشاهده ]              │
└─────────────────────────────────────┘
```

با انتخاب `مشاهده`:

```text
Resource
   ↓
FileViewer
```

باز می‌شود.

---

# 9. FileViewer Modes

FileViewer باید چند حالت نمایش داشته باشد.

## Inline

فایل مستقیماً داخل صفحه نمایش داده می‌شود.

```text
Lesson
  ↓
FileViewer
```

---

## Modal

فایل در یک Modal باز می‌شود.

```text
Lesson
  ↓
Resource
  ↓
Modal
  ↓
FileViewer
```

---

## Fullscreen

Viewer می‌تواند وارد حالت تمام صفحه شود.

```text
FileViewer
    ↓
Fullscreen
```

---

## New Window

در موارد خاص می‌توان فایل را در پنجره/تب جدید باز کرد.

این حالت باید اختیاری باشد.

---

# 10. Preview Mode

برای فایل‌هایی که کاربر فقط باید آن‌ها را بررسی کند:

```text
[ مشاهده فایل ]
```

باید امکان Preview وجود داشته باشد.

Preview نباید الزاماً به معنی Download باشد.

---

# 11. File Metadata

FileViewer باید اطلاعات استاندارد فایل را دریافت کند.

نمونه:

```text
id
name
title
url
mimeType
size
extension
thumbnail
downloadable
```

---

# 12. WordPress Attachment

در WordPress بهتر است بتوان فایل را با Attachment ID مشخص کرد.

مثال:

```text
<FileViewer
    attachmentId={123}
/>
```

سیستم می‌تواند اطلاعات فایل را از Media Library دریافت کند.

---

# 13. Attachment vs URL

FileViewer می‌تواند با دو مدل کار کند:

```text
Attachment ID
```

یا:

```text
Approved URL
```

اما URLهای خارجی یا ناشناس نباید بدون کنترل امنیتی مستقیماً پذیرفته شوند.

---

# 14. Protected Files

برخی فایل‌های آموزشی فقط برای دانشجویان مجاز قابل مشاهده هستند.

معماری صحیح:

```text
User
 ↓
Authorization
 ↓
Enrollment / Learning
 ↓
Media Access
 ↓
FileViewer
```

FileViewer نباید خودش Enrollment را بررسی کند.

---

# 15. Authorization Boundary

غلط:

```text
FileViewer
 ↓
Is user enrolled?
 ↓
Show file
```

صحیح:

```text
Access Layer
 ↓
Access Granted
 ↓
FileViewer
```

---

# 16. Signed URLs

برای فایل‌های خصوصی می‌توان از URL موقت استفاده کرد.

```text
Backend
 ↓
Signed URL
 ↓
FileViewer
```

FileViewer فقط URL مجاز را مصرف می‌کند.

نباید:

* Secret Key
* Storage Key
* Private Token

را در خود کامپوننت نگهداری کند.

---

# 17. File Type Detection

نوع فایل می‌تواند از موارد زیر مشخص شود:

```text
MIME Type
Extension
Backend Metadata
Provider Metadata
```

اولویت باید با MIME Type معتبر و metadata مورد اعتماد باشد.

---

# 18. MIME Type

نمونه:

```text
application/pdf
image/jpeg
image/png
video/mp4
audio/mpeg
text/plain
```

FileViewer باید بر اساس MIME Type، Renderer مناسب را انتخاب کند.

---

# 19. Extension

Extension می‌تواند به‌عنوان fallback استفاده شود.

مثلاً:

```text
.pdf
.jpg
.png
.mp4
.mp3
.txt
```

اما Extension به‌تنهایی معیار امنیتی مناسبی نیست.

---

# 20. Unsupported Files

اگر نوع فایل قابل نمایش نیست:

```text
┌──────────────────────────────────┐
│              📄                  │
│                                  │
│      این فایل قابل نمایش نیست    │
│                                  │
│          [ دانلود فایل ]          │
└──────────────────────────────────┘
```

البته Download فقط در صورت مجاز بودن نمایش داده شود.

---

# 21. File Download

FileViewer نباید خودش تصمیم بگیرد که فایل قابل دانلود است یا خیر.

والد باید وضعیت را تعیین کند:

```text
downloadable = true
```

یا:

```text
downloadable = false
```

---

# 22. Download Boundary

صحیح:

```text
Permission
 ↓
downloadable
 ↓
FileViewer
 ↓
Download Button
```

غلط:

```text
FileViewer
 ↓
Decide Permission
 ↓
Download
```

---

# 23. File Name

نام فایل باید قابل خواندن باشد.

بد:

```text
lesson_final_v12_edited_2.pdf
```

در UI بهتر است title انسانی نمایش داده شود:

```text
جزوه جلسه اول
```

در صورت نیاز نام واقعی فایل می‌تواند در metadata نمایش داده شود.

---

# 24. File Size

اندازه فایل می‌تواند نمایش داده شود:

```text
2.4 MB
```

این اطلاعات مخصوصاً در Resource List مفید است.

---

# 25. File Extension

در صورت نیاز:

```text
PDF
DOCX
PNG
MP4
```

می‌تواند به‌صورت Badge نمایش داده شود.

---

# 26. Preview Thumbnail

برای فایل‌هایی که thumbnail دارند:

```text
FileViewer
    ↓
Thumbnail
    ↓
Open
```

thumbnail باید از سیستم Image استفاده کند.

---

# 27. Image Preview

برای تصاویر:

```text
FileViewer
 ↓
ImageRenderer
 ↓
Image
```

Image Component مسئول:

* Loading
* Responsive image
* Placeholder
* Error
* Alt text

است.

---

# 28. PDF Preview

برای PDF:

```text
FileViewer
 ↓
PDFRenderer
 ↓
PDF Viewer
```

PDF Renderer مسئول:

* Page navigation
* Zoom
* Search
* Fullscreen

است.

---

# 29. Video Preview

برای Video:

```text
FileViewer
 ↓
VideoRenderer
 ↓
Video
```

کامپوننت Video مسئول playback است.

FileViewer نباید منطق Video Player را دوباره پیاده‌سازی کند.

---

# 30. Audio Preview

برای Audio:

```text
FileViewer
 ↓
AudioRenderer
 ↓
Audio
```

Audio مسئول:

* Playback
* Progress
* Volume
* Speed

است.

---

# 31. Text Preview

برای فایل‌های متنی:

```text
FileViewer
 ↓
TextRenderer
```

باید:

* متن را نمایش دهد
* از overflow جلوگیری کند
* در صورت امکان Syntax Highlighting را به‌صورت جداگانه پشتیبانی کند

---

# 32. Security for Text Files

فایل Text نباید بدون sanitization به‌صورت HTML رندر شود.

مثلاً محتوای:

```html
<script>
```

نباید اجرا شود.

Text باید به‌صورت plain text نمایش داده شود.

---

# 33. Loading State

هنگام بارگذاری:

```text
┌─────────────────────────────┐
│                             │
│             ◌               │
│       در حال بارگذاری       │
│                             │
└─────────────────────────────┘
```

از Loader/Spinner سیستم استفاده شود.

---

# 34. Error State

اگر فایل باز نشد:

```text
┌─────────────────────────────┐
│             ⚠               │
│                             │
│    نمایش فایل ممکن نیست     │
│                             │
│        [ تلاش مجدد ]         │
└─────────────────────────────┘
```

پیام باید کاربرپسند باشد.

---

# 35. Error Types

نمونه خطاها:

```text
File Not Found
Network Error
Authorization Error
Expired URL
Unsupported Type
Corrupted File
Renderer Error
Unknown Error
```

جزئیات فنی نباید مستقیماً به کاربر نمایش داده شود.

---

# 36. Retry

در خطاهای موقت:

```text
[ تلاش مجدد ]
```

نمایش داده شود.

Retry باید دوباره فایل یا metadata را دریافت کند.

---

# 37. Empty State

اگر FileViewer هیچ فایلی دریافت نکرد:

```text
┌─────────────────────────────┐
│             📄              │
│                             │
│      فایلی انتخاب نشده      │
└─────────────────────────────┘
```

این وضعیت با Error متفاوت است.

---

# 38. Access Denied

اگر دسترسی قبلاً توسط سیستم Authorization رد شده باشد:

```text
┌─────────────────────────────┐
│             🔒              │
│                             │
│    دسترسی به فایل ندارید    │
└─────────────────────────────┘
```

FileViewer فقط state را نمایش می‌دهد.

تصمیم دسترسی جای دیگری انجام شده است.

---

# 39. Expired URL

برای فایل‌های Protected:

```text
Signed URL
    ↓
Expired
    ↓
FileViewer
```

می‌تواند پیام:

```text
لینک فایل منقضی شده است.
```

و سپس:

```text
[ تلاش مجدد ]
```

را نمایش دهد.

---

# 40. Responsive Behavior

FileViewer باید در:

```text
Desktop
Tablet
Mobile
```

کار کند.

هیچ فایل یا Viewer نباید باعث overflow ناخواسته صفحه شود.

---

# 41. Mobile

در موبایل:

* Toolbar باید فشرده شود.
* کنترل‌های کم‌اهمیت وارد Menu شوند.
* Touch Targetها مناسب باشند.
* Fullscreen قابل دسترسی باشد.
* فایل در عرض صفحه قرار بگیرد.

---

# 42. RTL

FileViewer باید با RTL سازگار باشد.

نمونه:

```text
مشاهده فایل
دانلود
بستن
صفحه
بزرگ‌نمایی
```

اما محتوای فایل نباید صرفاً به دلیل RTL بودن سایت Mirror شود.

---

# 43. File Direction vs UI Direction

باید بین این دو تفاوت قائل شد:

```text
UI Direction = RTL
```

اما:

```text
File Content Direction
```

باید مطابق خود فایل باقی بماند.

---

# 44. Accessibility

FileViewer باید:

```text
Keyboard Accessible
Screen Reader Friendly
Focus Managed
High Contrast Compatible
```

باشد.

تمام کنترل‌ها باید Label قابل دسترس داشته باشند.

---

# 45. Focus Management

اگر FileViewer در Modal باز شود:

```text
Open
 ↓
Focus → Viewer
 ↓
Close
 ↓
Focus → Trigger
```

Focus نباید گم شود.

---

# 46. Keyboard

حداقل باید موارد زیر در نظر گرفته شود:

```text
Escape → Close
Tab → Navigate Controls
Enter → Activate
Space → Activate
```

کلیدهای اختصاصی Renderer باید توسط همان Renderer مدیریت شوند.

---

# 47. Fullscreen

FileViewer می‌تواند قابلیت Fullscreen داشته باشد.

```text
[ تمام صفحه ]
```

این قابلیت باید optional باشد.

---

# 48. Toolbar

Toolbar عمومی می‌تواند شامل:

```text
File Name
File Type
Download
Fullscreen
Close
More
```

باشد.

کنترل‌های تخصصی باید توسط Renderer اضافه شوند.

---

# 49. Toolbar Architecture

```text
FileViewer Toolbar
      │
      ├── Common Actions
      │
      └── Renderer Actions
             ├── PDF
             ├── Image
             ├── Video
             └── Audio
```

---

# 50. Common Actions

Actions عمومی:

```text
Download
Fullscreen
Close
Open in New Tab
```

هستند.

اما availability آن‌ها باید configurable باشد.

---

# 51. FileViewer in Lesson

نمونه:

```text
Lesson
 ├── Title
 ├── Description
 ├── FileViewer
 ├── Notes
 ├── Bookmark
 └── Lesson Navigation
```

در این ساختار FileViewer فقط فایل را نمایش می‌دهد.

---

# 52. FileViewer in Resources

```text
Resources
   ↓
File
   ↓
[ مشاهده ]
   ↓
FileViewer
```

این یکی از مهم‌ترین کاربردهای FileViewer در LMS است.

---

# 53. FileViewer in Attachments

در Lesson Player، فایل‌ها و Attachments بخشی از محتوای درس هستند.

ساختار:

```text
Attachments
   ├── PDF
   ├── Image
   ├── Video
   └── Other
```

کاربر با انتخاب فایل می‌تواند FileViewer را باز کند.

---

# 54. FileViewer and Modal

اگر فایل در Modal باز شود:

```text
Button
 ↓
Modal
 ↓
FileViewer
```

Modal مسئول:

* Overlay
* Position
* Close
* Focus Trap

است.

FileViewer مسئول فایل است.

---

# 55. FileViewer and Drawer

Drawer می‌تواند برای نمایش فایل در موبایل استفاده شود.

```text
Resource
 ↓
Drawer
 ↓
FileViewer
```

اما FileViewer نباید Drawer را مدیریت کند.

---

# 56. FileViewer and Popover

Popover برای FileViewer مناسب نیست مگر برای کنترل‌های کوچک.

مثلاً:

```text
[ ⋮ ]
   ↓
Download
Open
Share
```

خود Viewer نباید Popover را مدیریت کند.

---

# 57. Share

Share قابلیت پایه FileViewer نیست.

اگر محصول در آینده Share را اضافه کند:

```text
FileViewer
 ↓
Share Action
 ↓
Share Module
```

پیاده‌سازی شود.

---

# 58. Bookmark

Bookmark نیز متعلق به LMS است، نه FileViewer.

مثلاً:

```text
PDF Page 12
 ↓
Bookmark
 ↓
Learning Module
```

FileViewer فقط می‌تواند event یا current page را ارائه دهد.

---

# 59. Learning Progress

برای فایل‌هایی که قابلیت position دارند، ممکن است اطلاعاتی مانند:

```text
Current Page
Current Time
Scroll Position
```

در اختیار Learning قرار گیرد.

اما ذخیره progress وظیفه FileViewer نیست.

---

# 60. Event System

FileViewer می‌تواند eventهای عمومی ارائه دهد:

```text
onOpen
onClose
onReady
onError
onDownload
onFullscreenChange
onTypeDetected
```

Rendererها نیز می‌توانند event تخصصی داشته باشند.

---

# 61. Renderer Events

مثلاً PDF:

```text
onPageChange
onZoomChange
```

Video:

```text
onPlay
onPause
onProgress
onEnded
```

Audio:

```text
onPlay
onPause
onProgress
onEnded
```

FileViewer نباید این eventها را مصنوعی و دوباره‌کاری کند؛ فقط در صورت نیاز آن‌ها را expose می‌کند.

---

# 62. Component API

API پایه پیشنهادی:

```text
<FileViewer
    file={file}
    mode="inline"
    controls
    downloadable
    fullscreen
/>
```

---

# 63. File Object

نمونه ساختار:

```text
{
    id,
    title,
    name,
    url,
    mimeType,
    extension,
    size,
    thumbnail
}
```

اطلاعات بیشتر در صورت نیاز قابل اضافه شدن است.

---

# 64. Viewer Modes

```text
mode="inline"
mode="modal"
mode="fullscreen"
```

ممکن است در نسخه‌های آینده modeهای بیشتری اضافه شوند.

---

# 65. Renderer Selection

FileViewer باید بتواند Renderer را انتخاب کند.

مثلاً:

```text
application/pdf
        ↓
PDFRenderer
```

یا:

```text
image/png
        ↓
ImageRenderer
```

---

# 66. Custom Renderer

برای آینده بهتر است امکان ثبت Renderer سفارشی وجود داشته باشد.

مثلاً:

```text
FileViewer
 ↓
Renderer Registry
 ↓
Custom Renderer
```

این موضوع برای یک افزونه WordPress بسیار مهم است چون Add-onها ممکن است نوع فایل جدید اضافه کنند.

---

# 67. WordPress Extensibility

ساختار باید اجازه دهد Add-onها یا ماژول‌های آینده Renderer جدید اضافه کنند.

مثلاً:

```text
SCORM Package
Office Document
Interactive HTML
Custom Provider
```

این قابلیت باید از طریق معماری Plugin Extension انجام شود.

---

# 68. Security

FileViewer نباید صرفاً به Extension اعتماد کند.

بد:

```text
file.exe
renamed to
file.pdf
```

سیستم باید MIME Type و metadata معتبر را بررسی کند.

---

# 69. XSS Protection

محتوای فایل‌هایی که به HTML تبدیل می‌شوند باید sanitize شوند.

خصوصاً:

```text
HTML
SVG
Text
Embedded Content
```

نباید بدون کنترل اجرا شوند.

---

# 70. Iframe Security

اگر Renderer از iframe استفاده کند، باید:

* URL کنترل شود.
* Sandbox در صورت امکان استفاده شود.
* Permissionها محدود باشند.
* محتوا از منبع قابل اعتماد باشد.

از CSS یا iframe global استفاده نشود.

---

# 71. Performance

FileViewer باید از بارگذاری غیرضروری جلوگیری کند.

اصول:

```text
Lazy Load
Thumbnail First
Renderer On Demand
Avoid Duplicate Requests
Cache Metadata
```

---

# 72. Lazy Loading

فایلی که هنوز مشاهده نشده نباید الزاماً بلافاصله بارگذاری شود.

مثلاً:

```text
Resources
 ↓
File Card
 ↓
User clicks "مشاهده"
 ↓
FileViewer loads
```

---

# 73. Large Files

برای فایل‌های بزرگ:

```text
Do not preload unnecessarily.
Show loading state.
Use streaming where supported.
Use progressive loading where supported.
```

---

# 74. Cache

Metadata فایل می‌تواند در سطح مناسب cache شود.

اما فایل‌های Protected نباید به شکلی cache شوند که دسترسی غیرمجاز ایجاد کند.

---

# 75. Theme Independence

FileViewer باید با Themeهای مختلف WordPress کار کند.

نباید فرض کند Theme دارای:

* Bootstrap
* Tailwind
* jQuery UI
* Specific CSS Framework

است.

---

# 76. CSS Scope

از CSS عمومی مانند:

```css
iframe {}
img {}
video {}
```

استفاده نشود.

استایل‌ها باید namespace شده باشند.

مثلاً:

```css
.iran-lms-file-viewer {}
```

---

# 77. Design Tokens

FileViewer باید از Design System پروژه استفاده کند:

```text
Color Tokens
Spacing Tokens
Radius Tokens
Typography Tokens
Shadow Tokens
Motion Tokens
```

در طراحی Iran LMS، ساختار کلی بر پایه UI مدرن SaaS، RTL کامل، Component-Based و WordPress-Friendly تعریف شده است.

---

# 78. Border Radius

Container اصلی باید از Radiusهای سیستم استفاده کند.

از مقدار اختصاصی و غیرقابل استفاده مجدد جلوگیری شود.

---

# 79. Shadows

Shadow باید از سیستم طراحی استفاده کند.

برای Viewer معمولاً:

```text
Subtle Shadow
```

کافی است.

---

# 80. Dark Mode

FileViewer باید در Dark Mode نیز کار کند.

Toolbar و container از semantic tokens استفاده کنند.

محتوای اصلی فایل نباید بدون دلیل invert شود.

---

# 81. Mobile Fullscreen

در موبایل Fullscreen می‌تواند تجربه بهتری برای:

* PDF
* Image
* Video

ایجاد کند.

در خروج از Fullscreen باید context کاربر حفظ شود.

---

# 82. Error Recovery

در صورت خطا، کاربر نباید مجبور شود صفحه درس را Refresh کند.

ترتیب پیشنهادی:

```text
Error
 ↓
Retry
 ↓
Reload Source
 ↓
Fallback
```

در صورت عدم امکان نمایش:

```text
Download
```

در صورت مجاز بودن ارائه شود.

---

# 83. Fallback Strategy

اگر Renderer تخصصی در دسترس نبود:

```text
Specialized Renderer
       ↓
Fallback Renderer
       ↓
Download / Open
```

مثلاً اگر Preview ممکن نبود، سیستم می‌تواند گزینه دانلود را نمایش دهد؛ البته فقط در صورت مجاز بودن.

---

# 84. Do

* FileViewer را عمومی و reusable نگه دار.
* Rendererها را از Viewer جدا کن.
* از WordPress Media Library پشتیبانی کن.
* MIME Type را جدی بگیر.
* Authorization را خارج از Viewer نگه دار.
* Download permission را از والد دریافت کن.
* RTL را رعایت کن.
* Accessibility را رعایت کن.
* CSS را scope کن.
* Lazy Loading داشته باش.
* Renderer قابل توسعه طراحی کن.
* Theme Independence را حفظ کن.

---

# 85. Don't

از موارد زیر اجتناب شود:

* قرار دادن Enrollment Logic داخل FileViewer
* قرار دادن Permission Logic داخل FileViewer
* ذخیره Secret Key
* اعتماد صرف به Extension
* اجرای مستقیم HTML ناشناس
* استفاده از Global CSS
* وابستگی به Theme
* وابستگی مستقیم به یک PDF Engine
* بارگذاری همه فایل‌ها قبل از درخواست کاربر
* تبدیل FileViewer به File Manager

---

# 86. Testing Requirements

## File Types

```text
PDF
Image
Video
Audio
Text
Unsupported
```

## WordPress

```text
Media Library
Attachment ID
Frontend
Classic Theme
Block Theme
```

## Access

```text
Authorized
Unauthorized
Expired URL
Protected File
```

## States

```text
Loading
Ready
Error
Empty
Unsupported
Access Denied
```

## Actions

```text
Open
Close
Download
Fullscreen
Retry
```

## Accessibility

```text
Keyboard
Screen Reader
Focus
Labels
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## RTL

```text
Persian
English
Mixed Content
```

---

# 87. Architecture Decision

معماری نهایی پیشنهادی:

```text
                         FileViewer
                             │
                  ┌──────────┴──────────┐
                  │                     │
             File Metadata          Viewer Shell
                  │                     │
                  │             ┌───────┴────────┐
                  │             │                │
                  │          Toolbar          Content
                  │                              │
                  │                     ┌────────┼─────────┐
                  │                     │        │         │
                  │                   Image     PDF      Video
                  │                     │        │         │
                  │                   Audio     Text     Other
                  │
                  ↓
             Renderer Registry
```

---

# 88. LMS Integration

FileViewer در Iran LMS می‌تواند از چند نقطه مصرف شود:

```text
Lesson
  ↓
Lesson Player
  ↓
Resource
  ↓
FileViewer
```

یا:

```text
Course
  ↓
Resources
  ↓
FileViewer
```

یا:

```text
Student Dashboard
  ↓
Attachment
  ↓
FileViewer
```

---

# 89. Separation of Concerns

ساختار مسئولیت‌ها:

```text
Media Module
    ↓
File Access / Metadata

FileViewer
    ↓
File Presentation

Renderer
    ↓
Type-specific Presentation

Learning Module
    ↓
Learning Progress

Enrollment
    ↓
Access Permission

Resource Module
    ↓
Resource Meaning

Analytics
    ↓
Tracking
```

این جداسازی برای آینده افزونه بسیار مهم است.

---

# 90. Strategic Vision

`FileViewer` باید به یکی از primitiveهای اصلی Media در Iran LMS تبدیل شود؛ نه یک Viewer محدود به PDF یا یک فایل خاص.

هدف معماری این است:

```text
Any Supported File
        ↓
   FileViewer
        ↓
 Appropriate Renderer
        ↓
 Consistent LMS Experience
```

در نتیجه، اضافه شدن قابلیت‌هایی مثل:

```text
SCORM
Office Documents
Interactive Documents
External Media Providers
Custom Educational Formats
```

در آینده نباید نیازمند بازنویسی Lesson Player باشد.

`FileViewer` باید یک **لایه نمایش فایل، قابل توسعه، WordPress-Friendly، RTL-First و مستقل از منطق کسب‌وکار LMS** باقی بماند.
