# ProductCard.md

**Component:** Commerce / ProductCard
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Type:** UI Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`ProductCard` کامپوننت نمایش یک محصول قابل خرید در بخش Commerce افزونه Iran LMS است.

نکته مهم:

> این کامپوننت برای **Commerce داخل افزونه LMS** طراحی می‌شود، نه برای یک فروشگاه عمومی WordPress.

بنابراین Product می‌تواند در آینده مواردی مثل:

```text
Course
Bundle
Learning Package
Digital Product
Subscription
```

باشد.

اما در Foundation بهتر است Component به نوع خاصی از Product وابسته نشود.

---

# 2. Core Principle

```text
ProductCard
    ↓
Product Summary
    ↓
Product Details
    ↓
Price
    ↓
Purchase Action
```

ProductCard فقط Presentation Layer است.

نباید منطق:

```text
Payment
Order
Cart
Discount Calculation
Access Granting
```

را خودش انجام دهد.

---

# 3. Architecture Boundary

```text
Commerce Module
│
├── Product
├── Cart
├── Order
├── Payment
├── Coupon
└── ProductCard
```

اما:

```text
ProductCard
   ↓
Product Read Model / DTO
```

و نه:

```text
ProductCard
   ↓
Database
```

---

# 4. ProductCard Responsibilities

ProductCard مسئول نمایش:

* تصویر محصول
* عنوان
* نوع محصول
* توضیح کوتاه
* قیمت
* قیمت قبلی
* تخفیف
* وضعیت محصول
* وضعیت خرید کاربر
* CTA

است.

---

# 5. ProductCard Does Not Handle

ProductCard نباید مسئول:

```text
Create Order
Process Payment
Calculate Final Price
Validate Coupon
Grant Enrollment
Create Transaction
```

باشد.

---

# 6. Basic Structure

```text
┌──────────────────────────────┐
│                              │
│        Product Image         │
│                              │
│  [Course]             [٪20]  │
├──────────────────────────────┤
│ آموزش جامع React             │
│ یادگیری React از پایه...     │
│                              │
│ 1,250,000 تومان              │
│ 1,500,000 تومان              │
│                              │
│ [ مشاهده دوره ]              │
└──────────────────────────────┘
```

---

# 7. Product Types

Foundation:

```text
course
```

Future:

```text
bundle
package
subscription
digital
```

مثلاً:

```json
{
  "type": "course"
}
```

ProductCard نباید برای هر نوع Product یک Component کاملاً جدا داشته باشد.

---

# 8. Product DTO

UI بهتر است یک Read Model دریافت کند:

```js
{
    id,
    title,
    slug,
    type,
    image,
    shortDescription,
    price,
    regularPrice,
    currency,
    discount,
    status,
    purchasable,
    purchased
}
```

---

# 9. Product ID

```text
productId
```

باید شناسه Product Domain باشد.

نباید Component فرض کند:

```text
productId === WordPress post ID
```

این موضوع باید توسط Repository/Application Layer مدیریت شود.

---

# 10. Product Image

تصویر محصول:

```text
┌──────────────────────────────┐
│                              │
│         Thumbnail            │
│                              │
└──────────────────────────────┘
```

Ratio پیشنهادی:

```text
16:9
```

برای Course معمولاً مناسب است.

---

# 11. Image Fallback

اگر تصویر وجود نداشت:

```text
┌──────────────────────────────┐
│                              │
│           📚                 │
│       بدون تصویر             │
│                              │
└──────────────────────────────┘
```

نباید Layout شکسته شود.

---

# 12. Image Loading

تصویر باید:

```text
lazy-load
```

شود، مگر اینکه ProductCard در بخش Hero یا بالای صفحه باشد.

---

# 13. Image Accessibility

Alt:

```text
آموزش جامع React
```

نه:

```text
image123.jpg
```

اگر تصویر صرفاً تزئینی باشد:

```text
alt=""
```

---

# 14. Product Type Badge

مثلاً:

```text
[ دوره ]
```

یا:

```text
[ پکیج ]
```

Badge باید از `Badge.md` استفاده کند.

---

# 15. Discount Badge

اگر تخفیف وجود داشته باشد:

```text
[ 20٪ تخفیف ]
```

نمایش داده شود.

اگر تخفیفی وجود ندارد:

```text
```

هیچ فضای اضافی برای Badge رزرو نشود.

---

# 16. Title

عنوان Product:

```text
آموزش جامع React و Next.js
```

حداکثر:

```text
2 lines
```

برای جلوگیری از اختلاف ارتفاع Cardها.

---

# 17. Description

توضیح کوتاه:

```text
یادگیری React از پایه تا ساخت پروژه واقعی
```

حداکثر:

```text
2–3 lines
```

---

# 18. Price

قیمت فعلی باید برجسته باشد:

```text
1,250,000 تومان
```

---

# 19. Regular Price

اگر تخفیف وجود دارد:

```text
1,500,000 تومان
```

با حالت Strikethrough:

```text
~~1,500,000~~
```

---

# 20. Free Product

اگر محصول رایگان است:

```text
رایگان
```

به‌جای:

```text
0 تومان
```

نمایش داده شود.

---

# 21. Price Formatting

PriceCard نباید خودش Currency Formatting پیچیده انجام دهد.

بهتر:

```text
Commerce
 ↓
Price Formatter
 ↓
Formatted Price
 ↓
ProductCard
```

---

# 22. Currency

Foundation باید Currency را از Commerce دریافت کند:

```js
{
    amount: 1250000,
    currency: "IRR"
}
```

یا:

```js
{
    formatted: "۱٬۲۵۰٬۰۰۰ تومان"
}
```

UI نباید فرض کند همه محصولات تومان هستند.

---

# 23. CTA

CTA بسته به وضعیت Product تغییر می‌کند.

### خرید

```text
[ خرید دوره ]
```

### مشاهده

```text
[ مشاهده ]
```

### خریداری شده

```text
[ ورود به دوره ]
```

### رایگان

```text
[ شروع یادگیری ]
```

---

# 24. Product States

```text
draft
published
private
sold_out
unavailable
archived
```

UI فقط State قابل نمایش را دریافت می‌کند.

---

# 25. Purchase States

```text
not_purchased
purchased
in_cart
processing
unavailable
```

---

# 26. Purchased Product

اگر کاربر قبلاً Product را خریداری کرده:

```text
┌──────────────────────────────┐
│ آموزش React                  │
│                              │
│ ✓ خریداری شده                │
│                              │
│ [ ورود به دوره ]             │
└──────────────────────────────┘
```

برای Course، CTA می‌تواند:

```text
ادامه یادگیری
```

باشد.

---

# 27. In Cart

اگر Product داخل Cart باشد:

```text
[ در سبد خرید ✓ ]
```

بهتر است CTA دوباره Order ایجاد نکند.

---

# 28. Login State

اگر کاربر Guest باشد:

```text
[ خرید ]
```

با کلیک:

```text
Login
 ↓
Return To Product
 ↓
Continue Checkout
```

این Flow متعلق به Auth/Commerce است، نه ProductCard.

---

# 29. ProductCard Variants

```text
default
compact
horizontal
featured
dashboard
checkout
mobile
```

---

# 30. Default

```text
┌──────────────────────┐
│      Image           │
│                      │
├──────────────────────┤
│ Title                │
│ Description          │
│ Price                │
│ [ خرید ]             │
└──────────────────────┘
```

---

# 31. Compact

برای لیست:

```text
[Image]  Product Title
         1,250,000 تومان
         [ مشاهده ]
```

---

# 32. Horizontal

```text
┌────────────────────────────────┐
│ Image │ Product Title           │
│       │ Description             │
│       │ Price      [ خرید ]     │
└────────────────────────────────┘
```

---

# 33. Featured

برای Product برجسته:

```text
[پیشنهاد ویژه]

Product Image

آموزش جامع...
★★★★☆

1,250,000 تومان

[ مشاهده جزئیات ]
```

---

# 34. Dashboard Variant

در Dashboard دانشجو:

```text
┌──────────────────────────────┐
│ Image                        │
│ React Advanced               │
│ 72٪ پیشرفت                   │
│                              │
│ [ ادامه یادگیری ]            │
└──────────────────────────────┘
```

در این حالت ProductCard نباید با CourseCard یکی فرض شود.

---

# 35. ProductCard vs CourseCard

این تفکیک مهم است:

```text
ProductCard
=
Commerce

CourseCard
=
Learning
```

یک Course می‌تواند:

```text
Learning Course
       +
Commerce Product
```

باشد.

---

# 36. Product → Course Relation

ممکن است:

```text
Product #100
   ↓
Course #25
```

ProductCard فقط Product را نمایش می‌دهد.

CourseCard اطلاعات Learning را نمایش می‌دهد.

---

# 37. Cart Integration

CTA می‌تواند:

```text
Add to Cart
```

باشد.

Flow:

```text
ProductCard
 ↓
Add To Cart
 ↓
Cart Service
 ↓
Cart Updated
 ↓
UI Feedback
```

---

# 38. Do Not Create Cart Locally

اشتباه:

```text
ProductCard
 ↓
localStorage
 ↓
Cart
```

Cart باید متعلق به Commerce Domain باشد.

---

# 39. Add to Cart Loading

پس از Click:

```text
[ در حال افزودن... ]
```

و Button موقتاً Disabled شود.

---

# 40. Add to Cart Success

Toast:

```text
✓ محصول به سبد خرید اضافه شد.
```

می‌تواند نمایش داده شود.

CTA:

```text
[ مشاهده سبد خرید ]
```

---

# 41. Add to Cart Error

```text
✕ افزودن محصول به سبد خرید انجام نشد.

[ تلاش مجدد ]
```

---

# 42. Price Change

اگر قیمت در Server تغییر کرده باشد، ProductCard نباید قیمت Client-side را Source of Truth فرض کند.

در Checkout:

```text
Server Price
```

باید دوباره Validate شود.

---

# 43. Coupon

ProductCard نباید Coupon را محاسبه کند.

مثلاً:

```text
Product
1,500,000

Coupon
-200,000
```

این محاسبه متعلق به Pricing/Cart/Order است.

---

# 44. Tax

اگر Tax در آینده وجود داشته باشد:

```text
Base Price
+
Tax
=
Final Price
```

این منطق داخل ProductCard نیست.

---

# 45. Subscription

در آینده Product ممکن است Subscription باشد:

```text
299,000 تومان / ماه
```

ProductCard باید بتواند Price Model را نمایش دهد ولی منطق Subscription در Commerce باشد.

---

# 46. Bundle

Bundle:

```text
[ پکیج ]

3 دوره
+
2 فایل
+
1 آزمون
```

ProductCard فقط Summary را نمایش می‌دهد.

---

# 47. Product Availability

اگر Product قابل خرید نیست:

```text
[ فعلاً قابل خرید نیست ]
```

CTA Disabled باشد.

---

# 48. Access State

اگر User به Product دسترسی دارد:

```text
[ ورود ]
```

اگر دسترسی ندارد:

```text
[ خرید ]
```

این State باید از Commerce/Learning Application Layer دریافت شود.

---

# 49. Permission

ProductCard نباید خودش بررسی کند:

```php
current_user_can(...)
```

به‌عنوان منطق اصلی.

بهتر:

```text
Application Layer
 ↓
canPurchase
canAccess
 ↓
ProductCard
```

---

# 50. WordPress Architecture

```text
ProductCard
      ↓
Commerce Application Service
      ↓
Product Read Model
      ↓
Product Repository
      ↓
Database
```

---

# 51. WordPress Post Type

اگر Product در WordPress با CPT پیاده‌سازی شده باشد:

```text
ProductCard
```

نباید مستقیماً به CPT وابسته شود.

مثلاً:

```text
wp_posts
```

نباید Contract UI باشد.

---

# 52. API

API پیشنهادی:

```text
GET /products
GET /products/{id}
```

برای Cart:

```text
POST /cart/items
```

برای Access:

```text
GET /products/{id}/access
```

ساختار دقیق باید با API Standards پروژه هماهنگ شود.

---

# 53. Product Response

```json
{
  "id": "100",
  "title": "آموزش جامع React",
  "type": "course",
  "image": "...",
  "shortDescription": "یادگیری React از پایه",
  "price": {
    "amount": 1250000,
    "currency": "IRR",
    "formatted": "۱٬۲۵۰٬۰۰۰ تومان"
  },
  "regularPrice": {
    "amount": 1500000,
    "currency": "IRR",
    "formatted": "۱٬۵۰۰٬۰۰۰ تومان"
  },
  "discount": {
    "type": "percentage",
    "value": 20
  },
  "purchasable": true,
  "purchased": false
}
```

---

# 54. Security

هیچ قیمت نهایی یا دسترسی‌ای نباید صرفاً بر اساس داده Client پذیرفته شود.

```text
UI
 ↓
Request
 ↓
Server Validation
 ↓
Pricing
 ↓
Cart
 ↓
Order
 ↓
Payment
```

---

# 55. Product URL

ProductCard باید URL محصول را از Backend/Router دریافت کند:

```text
productUrl
```

و خودش URL را با حدس‌زدن ساختار WordPress تولید نکند.

---

# 56. Link Semantics

عنوان و تصویر می‌توانند به Product Detail متصل شوند:

```html
<a href="...">
```

اما CTA خرید باید Button باشد.

---

# 57. Accessibility

ProductCard باید:

* عنوان قابل دسترسی داشته باشد.
* تصویر Alt مناسب داشته باشد.
* CTA قابل Keyboard باشد.
* Focus واضح داشته باشد.
* قیمت برای Screen Reader قابل فهم باشد.
* Statusها فقط با Color منتقل نشوند.

---

# 58. Keyboard

ترتیب منطقی:

```text
Image/Title Link
 ↓
Favorite/Bookmark
 ↓
CTA
```

نباید Elementهای تزئینی وارد Tab Order شوند.

---

# 59. Bookmark

اگر ProductCard Bookmark داشته باشد:

```text
🔖
```

می‌تواند به Bookmark Component متصل شود.

اما:

```text
ProductCard
≠
Bookmark Logic
```

---

# 60. Favorite

اگر Commerce در آینده Favorite داشته باشد:

```text
ProductCard
 ↓
Favorite Button
```

اما Favorite و Bookmark باید جدا باشند.

---

# 61. Loading State

قبل از دریافت Product:

```text
┌──────────────────────────────┐
│ ░░░░░░░░░░░░░░░░             │
│                              │
│ ░░░░░░░░░░                   │
│ ░░░░░░░░                    │
│ ███████░░                   │
└──────────────────────────────┘
```

Skeleton باید از `Skeleton.md` استفاده کند.

---

# 62. Error State

```text
┌──────────────────────────────┐
│        خطا                   │
│                              │
│ محصول بارگذاری نشد.          │
│                              │
│ [ تلاش مجدد ]                │
└──────────────────────────────┘
```

---

# 63. Empty State

ProductCard خودش Empty State ندارد.

اگر لیست محصولات خالی باشد:

```text
ProductGrid
 ↓
EmptyState
```

---

# 64. Responsive

Desktop:

```text
3–4 Cards
```

Tablet:

```text
2 Cards
```

Mobile:

```text
1 Card
```

تعداد دقیق Columnها باید توسط Grid System تعیین شود.

---

# 65. Mobile

Mobile Card:

```text
┌────────────────────────┐
│       Image            │
├────────────────────────┤
│ آموزش React            │
│ یادگیری پروژه‌محور     │
│                        │
│ 1,250,000 تومان        │
│                        │
│ [ خرید دوره ]          │
└────────────────────────┘
```

---

# 66. RTL

ترتیب اطلاعات باید با RTL سازگار باشد:

```text
عنوان
توضیح
قیمت
CTA
```

Iconهای directional باید طبق `Icon.md` مدیریت شوند.

---

# 67. Dark Mode

از Token استفاده شود:

```text
card-surface
card-border
text-primary
text-secondary
price-primary
price-muted
badge-surface
```

---

# 68. Hover

Desktop:

```text
Card Hover
 ↓
Subtle elevation
 ↓
Image / CTA emphasis
```

نباید Hover باعث تغییر Layout شود.

---

# 69. Focus

Keyboard Focus:

```text
┌──────────────────────────────┐
│ Product                      │
│                              │
│ [ مشاهده ] ← Focus           │
└──────────────────────────────┘
```

Focus باید از Design System پیروی کند.

---

# 70. Animation

Animation باید محدود باشد:

```text
transform
opacity
shadow
```

و نباید باعث Layout Shift شود.

---

# 71. Product Status Badge

مثلاً:

```text
[ جدید ]
[ تخفیف ]
[ محبوب ]
[ ناموجود ]
```

اما Statusها نباید با Badgeهای متعدد Card را شلوغ کنند.

---

# 72. Rating

در صورت وجود Rating:

```text
★★★★☆
4.8
```

Rating Domain نباید داخل ProductCard محاسبه شود.

---

# 73. Metadata

در صورت نیاز:

```text
👥 1,250 دانشجو
⏱ 12 ساعت
📚 28 درس
```

برای Course Product می‌تواند نمایش داده شود.

اما این اطلاعات باید از Learning Read Model بیاید.

---

# 74. ProductCard + Learning

اگر Product مربوط به Course باشد:

```text
Product
 ├── Product Information
 └── Course Summary
```

مثلاً:

```text
آموزش React
────────────────
28 درس
12 ساعت
سطح متوسط
```

این Integration باید از طریق DTO انجام شود.

---

# 75. ProductCard + Enrollment

اگر User خریداری کرده و Enrollment فعال دارد:

```text
[ ادامه یادگیری ]
```

در غیر این صورت:

```text
[ خرید دوره ]
```

Enrollment منطق خودش را دارد.

---

# 76. ProductCard + Order

ProductCard فقط Order State را نمایش می‌دهد:

```text
not_purchased
purchased
```

Order creation در:

```text
Checkout
```

انجام می‌شود.

---

# 77. ProductCard + Payment

ProductCard نباید Payment Gateway را بشناسد.

```text
ProductCard
    ↓
Cart
    ↓
Checkout
    ↓
Payment
```

---

# 78. ProductCard + Coupon

Coupon:

```text
Checkout
```

نه:

```text
ProductCard
```

---

# 79. ProductCard + Notification

پس از خرید موفق:

```text
✓ خرید با موفقیت انجام شد.
```

Notification/Toast توسط Application Flow مدیریت شود.

---

# 80. ProductCard + Analytics

Eventهای پیشنهادی:

```text
product_viewed
product_clicked
add_to_cart_clicked
```

مثلاً:

```js
{
    productId: "100",
    source: "course_listing"
}
```

Analytics نباید در UI منطق کسب‌وکار ایجاد کند.

---

# 81. Testing

## Rendering

```text
Title
Image
Price
Discount
Badge
CTA
```

## States

```text
Available
Purchased
In Cart
Free
Unavailable
Discounted
```

## Interaction

```text
View
Add To Cart
Retry
Bookmark
```

## Responsive

```text
Desktop
Tablet
Mobile
```

## Accessibility

```text
Keyboard
Screen Reader
Focus
Contrast
RTL
```

---

# 82. Do

* ProductCard را Commerce-specific نگه دار.
* Product و Course را از نظر Domain تفکیک کن.
* Price را از Backend دریافت کن.
* Final Price را Client-side Source of Truth نکن.
* Access State را از Application Layer بگیر.
* Cart را خارج از Component مدیریت کن.
* Payment را خارج از Component مدیریت کن.
* از Read Model استفاده کن.
* Skeleton و Error State داشته باش.
* RTL و Mobile را پشتیبانی کن.
* Accessibility را رعایت کن.
* ProductCard را Theme-independent نگه دار.

---

# 83. Don't

* مستقیماً به `$wpdb` متصل نشو.
* مستقیماً به `wp_posts` وابسته نشو.
* قیمت نهایی را فقط در Frontend محاسبه نکن.
* Order ایجاد نکن.
* Payment را از Card اجرا نکن.
* Enrollment را مستقیماً ایجاد نکن.
* Coupon را داخل Card محاسبه نکن.
* Permission را فقط در Frontend بررسی نکن.
* CourseCard و ProductCard را یکی نکن.

---

# 84. Responsibility Map

```text
Commerce
│
├── Product
│    └── ProductCard
│
├── Pricing
│
├── Cart
│
├── Order
│
└── Payment
```

Integration:

```text
Learning
    ↓
Course Data

Enrollment
    ↓
Access State

Commerce
    ↓
Price / Purchase State

UI
    ↓
ProductCard
```

---

# 85. Final Architecture

```text
                    Product Domain
                           │
                    Product Read Model
                           │
                    Commerce Application
                           │
                           ↓
                     ProductCard
                           │
          ┌────────────────┼────────────────┐
          ↓                ↓                ↓
      Product Info      Pricing         Access State
          │                │                │
          └────────────────┼────────────────┘
                           ↓
                         CTA
                           │
                ┌──────────┴──────────┐
                ↓                     ↓
             Cart                 Course Access
                │                     │
             Checkout             Enrollment
                │
             Payment
```

---

# 86. Final Principle

در Iran LMS، `ProductCard` باید **ویترین Commerce** باشد، نه موتور Commerce.

مرزبندی نهایی:

```text
ProductCard
   ≠
Product Domain

ProductCard
   ≠
Cart

ProductCard
   ≠
Order

ProductCard
   ≠
Payment

ProductCard
   ≠
Enrollment
```

و رابطه صحیح:

```text
Product
   ↓
Product Read Model
   ↓
ProductCard
   ↓
User Action
   ↓
Commerce Application
   ↓
Cart / Checkout / Order / Payment
```

این ساختار اجازه می‌دهد یک **Course در Iran LMS هم یک Learning Entity باشد و هم از طریق Commerce به‌عنوان Product قابل فروش**، بدون اینکه این دو Domain به هم وابسته و درهم‌تنیده شوند.
