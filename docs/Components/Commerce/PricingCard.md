# PricingCard.md

**Component:** Commerce / PricingCard
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Type:** UI Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`PricingCard` برای نمایش **قیمت و شرایط خرید یک Product یا Offer** در Commerce افزونه Iran LMS استفاده می‌شود.

این Component باید بتواند اطلاعاتی مانند:

* قیمت اصلی
* قیمت تخفیف‌خورده
* درصد تخفیف
* نوع قیمت
* دوره پرداخت
* وضعیت خرید
* CTA
* مزیت‌های Offer

را نمایش دهد.

نکته مهم:

> PricingCard مسئول **نمایش Pricing** است، نه محاسبه قیمت.

---

# 2. Core Principle

```text
Pricing Domain
      ↓
Price / Offer Read Model
      ↓
PricingCard
      ↓
User Action
```

نه:

```text
PricingCard
      ↓
Calculate Price
      ↓
Apply Coupon
      ↓
Create Order
```

---

# 3. Domain Boundary

```text
Commerce
│
├── Product
├── Pricing
├── Cart
├── Order
├── Coupon
├── Payment
└── PricingCard
```

`PricingCard` فقط Presentation Layer است.

---

# 4. Responsibilities

PricingCard مسئول نمایش:

```text
✓ Current Price
✓ Regular Price
✓ Discount
✓ Currency
✓ Billing Period
✓ Price Label
✓ Offer Features
✓ Purchase State
✓ CTA
```

---

# 5. Non-Responsibilities

PricingCard نباید مسئول:

```text
✗ Price Calculation
✗ Coupon Validation
✗ Tax Calculation
✗ Payment
✗ Order Creation
✗ Cart Calculation
✗ Enrollment
```

باشد.

---

# 6. Basic Structure

```text
┌──────────────────────────────┐
│                              │
│       پلن حرفه‌ای            │
│                              │
│  مناسب برای یادگیری کامل     │
│                              │
│   ۱٬۲۵۰٬۰۰۰ تومان            │
│   ~~۱٬۵۰۰٬۰۰۰~~              │
│                              │
│  ✓ دسترسی کامل به دوره       │
│  ✓ آزمون‌ها                   │
│  ✓ گواهینامه                  │
│                              │
│      [ خرید ]                │
│                              │
└──────────────────────────────┘
```

---

# 7. Pricing Model

PricingCard باید یک Read Model دریافت کند.

مثلاً:

```js
{
    price: {
        amount: 1250000,
        currency: "IRR",
        formatted: "۱٬۲۵۰٬۰۰۰ تومان"
    },
    regularPrice: {
        amount: 1500000,
        currency: "IRR",
        formatted: "۱٬۵۰۰٬۰۰۰ تومان"
    },
    discount: {
        type: "percentage",
        value: 20
    }
}
```

---

# 8. Price Ownership

قیمت متعلق به Commerce Domain است.

```text
Commerce
   ↓
Pricing Service
   ↓
Price
   ↓
PricingCard
```

Component نباید از:

```php
get_post_meta()
```

یا:

```php
$wpdb
```

برای پیدا کردن قیمت استفاده کند.

---

# 9. Current Price

قیمت نهایی فعلی باید برجسته باشد:

```text
۱٬۲۵۰٬۰۰۰ تومان
```

این مهم‌ترین اطلاعات Card است.

---

# 10. Regular Price

اگر تخفیف وجود داشته باشد:

```text
قیمت اصلی:

~~۱٬۵۰۰٬۰۰۰ تومان~~
```

قیمت اصلی باید از Current Price بصری ضعیف‌تر باشد.

---

# 11. No Discount

اگر تخفیف وجود ندارد:

```text
۱٬۵۰۰٬۰۰۰ تومان
```

نباید Regular Price دوباره نمایش داده شود.

---

# 12. Free Pricing

برای Product رایگان:

```text
رایگان
```

بهتر از:

```text
۰ تومان
```

است.

---

# 13. Discount

نمونه:

```text
[۲۰٪ تخفیف]
```

یا:

```text
صرفه‌جویی ۲۵۰٬۰۰۰ تومان
```

نوع نمایش باید از Pricing Read Model تعیین شود.

---

# 14. Discount Calculation

PricingCard نباید این کار را انجام دهد:

```text
1,500,000 - 1,250,000
```

یا:

```text
(250,000 / 1,500,000) × 100
```

این منطق متعلق به Pricing Service است.

---

# 15. Currency

PricingCard نباید فرض کند Currency همیشه تومان است.

مثلاً:

```js
{
    amount: 1250000,
    currency: "IRR"
}
```

یا در آینده:

```text
USD
EUR
```

نیز ممکن است وجود داشته باشد.

---

# 16. Billing Type

PricingCard باید برای انواع مختلف Pricing قابل توسعه باشد:

```text
one_time
subscription
installment
free
```

---

# 17. One-Time Pricing

```text
۱٬۲۵۰٬۰۰۰ تومان

پرداخت یک‌باره
```

---

# 18. Subscription Pricing

```text
۲۹۹٬۰۰۰ تومان

/ ماه
```

یا:

```text
۲٬۴۹۹٬۰۰۰ تومان

/ سال
```

---

# 19. Installment

در آینده:

```text
۵۰۰٬۰۰۰ تومان
× ۳ قسط
```

PricingCard فقط اطلاعات ارائه‌شده توسط Pricing Domain را نمایش می‌دهد.

---

# 20. Price Label

ممکن است Label وجود داشته باشد:

```text
قیمت دوره
```

یا:

```text
شروع از
```

یا:

```text
ماهانه
```

---

# 21. Price Range

برای Productهایی با چند Offer:

```text
شروع از

۲۹۹٬۰۰۰ تومان
```

PricingCard نباید خودش Lowest Price را محاسبه کند.

---

# 22. Multiple Offers

ممکن است یک Product چند Offer داشته باشد:

```text
Product
│
├── Basic
├── Pro
└── Premium
```

در این حالت PricingCard می‌تواند نماینده یک Offer باشد.

---

# 23. PricingCard vs ProductCard

این دو Component متفاوت هستند:

```text
ProductCard
=
Product Summary
```

```text
PricingCard
=
Price / Offer Summary
```

ممکن است:

```text
ProductCard
   └── PricingCard
```

باشد.

---

# 24. Example

```text
┌──────────────────────────────┐
│ آموزش React                  │
│                              │
│ ۱٬۲۵۰٬۰۰۰ تومان              │
│ ~~۱٬۵۰۰٬۰۰۰ تومان~~          │
│                              │
│ [۲۰٪ تخفیف]                  │
│                              │
│ [ خرید دوره ]                │
└──────────────────────────────┘
```

---

# 25. PricingCard Variants

```text
default
compact
featured
comparison
checkout
subscription
mobile
```

---

# 26. Default

```text
┌──────────────────────────┐
│ قیمت دوره                │
│                          │
│ ۱٬۲۵۰٬۰۰۰ تومان          │
│ ~~۱٬۵۰۰٬۰۰۰~~            │
│                          │
│ [ خرید ]                 │
└──────────────────────────┘
```

---

# 27. Compact

برای Sidebar:

```text
قیمت:

۱٬۲۵۰٬۰۰۰ تومان

[ خرید ]
```

---

# 28. Featured

```text
┌──────────────────────────────┐
│ ★ پیشنهاد ویژه               │
│                              │
│ پلن حرفه‌ای                  │
│                              │
│ ۱٬۲۵۰٬۰۰۰ تومان              │
│                              │
│ ✓ دسترسی کامل                │
│ ✓ گواهینامه                  │
│ ✓ پشتیبانی                   │
│                              │
│ [ انتخاب پلن ]               │
└──────────────────────────────┘
```

---

# 29. Comparison

برای مقایسه چند Offer:

```text
┌──────────────┐
│ Basic        │
│              │
│ 499,000      │
│              │
│ ✓ 10 Lessons │
│              │
│ [ انتخاب ]   │
└──────────────┘

┌──────────────┐
│ Pro          │
│              │
│ 999,000      │
│              │
│ ✓ 30 Lessons │
│              │
│ [ انتخاب ]   │
└──────────────┘
```

---

# 30. Featured Plan

در Comparison ممکن است یک Offer:

```text
recommended: true
```

داشته باشد.

UI:

```text
[ محبوب‌ترین ]
```

اما تعیین محبوب‌ترین Plan وظیفه UI نیست.

---

# 31. Features

PricingCard می‌تواند Features را نمایش دهد:

```text
✓ دسترسی کامل به دوره
✓ تمام آزمون‌ها
✓ گواهینامه
✓ پشتیبانی
```

Features باید از Offer دریافت شوند.

---

# 32. Feature Limit

اگر Feature زیاد باشد:

```text
۳ مورد اصلی
+
مشاهده همه امکانات
```

---

# 33. CTA

CTA باید State-aware باشد.

### خرید

```text
[ خرید ]
```

### انتخاب

```text
[ انتخاب پلن ]
```

### خریداری شده

```text
[ ورود ]
```

### فعال

```text
[ پلن فعلی ]
```

### ناموجود

```text
[ فعلاً در دسترس نیست ]
```

---

# 34. Purchase State

```text
not_purchased
in_cart
purchased
active
expired
unavailable
```

---

# 35. Active Subscription

برای Subscription:

```text
✓ پلن فعال
```

و CTA:

```text
[ مدیریت اشتراک ]
```

---

# 36. Expired Subscription

```text
اشتراک منقضی شده

۲۹۹٬۰۰۰ تومان / ماه

[ تمدید اشتراک ]
```

---

# 37. Login State

Guest:

```text
[ خرید ]
```

کاربر Login شده:

```text
[ خرید دوره ]
```

اما Authentication Flow خارج از Component است.

---

# 38. Cart State

اگر Offer در Cart باشد:

```text
[ در سبد خرید ✓ ]
```

---

# 39. Loading

هنگام دریافت Pricing:

```text
┌──────────────────────────┐
│ ░░░░░░░░                 │
│ ███████░░░              │
│ ░░░░░░░░                 │
└──────────────────────────┘
```

از `Skeleton.md` استفاده شود.

---

# 40. Pricing Error

```text
قیمت در دسترس نیست.

[ تلاش مجدد ]
```

نباید:

```text
۰ تومان
```

نمایش داده شود.

---

# 41. Price Unavailable

اگر Pricing Service قیمت نداشته باشد:

```text
قیمت فعلاً در دسترس نیست
```

---

# 42. Price Updated

اگر قیمت هنگام Checkout تغییر کرده باشد:

```text
PricingCard
      ↓
Checkout
      ↓
Server Revalidation
```

قیمت Server باید Source of Truth باشد.

---

# 43. Coupon

PricingCard می‌تواند قیمت Discounted فعلی را نمایش دهد.

اما Coupon Input متعلق به:

```text
Cart
Checkout
```

است.

مثلاً:

```text
قیمت: 1,500,000
Coupon: LMS20
Final: 1,200,000
```

این محاسبه در PricingCard انجام نمی‌شود.

---

# 44. Tax

مالیات نیز:

```text
Pricing Domain
```

یا Pricing/Checkout Service است.

PricingCard فقط مقدار نهایی مورد نیاز UI را نمایش می‌دهد.

---

# 45. Final Price

اگر Backend مقدار:

```json
{
  "finalPrice": {
    "amount": 1200000,
    "formatted": "۱٬۲۰۰٬۰۰۰ تومان"
  }
}
```

را برگرداند، Card همان را نمایش می‌دهد.

---

# 46. Price Breakdown

در نسخه‌های بعد:

```text
قیمت پایه
۱٬۵۰۰٬۰۰۰

تخفیف
-۳۰۰٬۰۰۰

مالیات
+۰

قابل پرداخت
۱٬۲۰۰٬۰۰۰
```

این حالت بیشتر برای Checkout مناسب است.

---

# 47. PricingCard vs Checkout Summary

```text
PricingCard
=
Offer Presentation
```

```text
Checkout Summary
=
Transaction Pricing
```

این دو نباید یکی شوند.

---

# 48. Product Relation

PricingCard می‌تواند برای:

```text
Course Product
Bundle Product
Subscription Product
```

استفاده شود.

اما ProductCard اطلاعات کلی Product را مدیریت می‌کند.

---

# 49. Course Relation

برای Course:

```text
Course
   ↓
Commerce Product
   ↓
Offer
   ↓
PricingCard
```

---

# 50. Enrollment Relation

پس از خرید:

```text
PricingCard
   ↓
Checkout
   ↓
Order
   ↓
Payment
   ↓
Enrollment
```

PricingCard مستقیماً Enrollment ایجاد نمی‌کند.

---

# 51. WordPress Boundary

PricingCard نباید مستقیماً:

```php
get_post_meta()
update_post_meta()
$wpdb
wc_get_product()
```

را صدا بزند.

خصوصاً:

```text
WooCommerce
```

نباید Dependency اجباری Iran LMS باشد، مگر اینکه در Architecture پروژه به‌صورت صریح تصمیم گرفته شود.

---

# 52. Application Boundary

```text
PricingCard
    ↓
Commerce Application Layer
    ↓
Pricing Service
    ↓
Pricing Repository
```

---

# 53. Read Model

نمونه کامل‌تر:

```js
{
    id: "offer_101",

    productId: "product_25",

    title: "پلن حرفه‌ای",

    price: {
        amount: 1250000,
        currency: "IRR",
        formatted: "۱٬۲۵۰٬۰۰۰ تومان"
    },

    regularPrice: {
        amount: 1500000,
        currency: "IRR",
        formatted: "۱٬۵۰۰٬۰۰۰ تومان"
    },

    discount: {
        type: "percentage",
        value: 20,
        formatted: "۲۰٪ تخفیف"
    },

    billing: {
        type: "one_time"
    },

    purchasable: true,

    purchased: false,

    recommended: true
}
```

---

# 54. API

API پیشنهادی:

```text
GET /products/{id}/pricing
```

برای چند Offer:

```text
GET /products/{id}/offers
```

ساختار دقیق باید با `03-API/07-Commerce-API.md` هماهنگ باشد.

---

# 55. Security

قیمت Client-side قابل اعتماد نیست.

مثلاً کاربر نباید بتواند:

```json
{
    "amount": 1000
}
```

ارسال کند و Server آن را قبول کند.

قیمت Order باید Server-side تعیین شود.

---

# 56. Currency Formatting

برای ایران:

```text
۱٬۲۵۰٬۰۰۰ تومان
```

Formatting باید یک استاندارد واحد داشته باشد.

PricingCard نباید در هر جا Formatting متفاوت انجام دهد.

---

# 57. RTL

نمونه:

```text
عنوان پلن
قیمت
واحد پول
توضیحات
CTA
```

همه باید با RTL سازگار باشند.

---

# 58. Mobile

Mobile:

```text
┌────────────────────────────┐
│ پلن حرفه‌ای                │
│                            │
│ ۱٬۲۵۰٬۰۰۰ تومان             │
│ / ماه                       │
│                            │
│ ✓ دسترسی کامل              │
│ ✓ گواهینامه                 │
│                            │
│ [ انتخاب پلن ]              │
└────────────────────────────┘
```

CTA بهتر است Width مناسب داشته باشد.

---

# 59. Dark Mode

از Tokenهای Design System استفاده شود:

```text
pricing-card-surface
pricing-card-border
pricing-price
pricing-regular-price
pricing-discount
pricing-feature
pricing-cta
```

---

# 60. Accessibility

قیمت باید برای Screen Reader واضح باشد:

```text
پلن حرفه‌ای، قیمت یک میلیون و دویست و پنجاه هزار تومان، پرداخت یک‌باره.
```

---

# 61. Color

قیمت اصلی:

```text
Primary
```

قیمت قبلی:

```text
Muted
```

Discount:

```text
Success / Accent
```

اما معنی تخفیف نباید فقط با رنگ منتقل شود.

Badge باید Text داشته باشد.

---

# 62. Keyboard

ترتیب:

```text
Plan Title
 ↓
Features
 ↓
CTA
```

CTA باید Keyboard Accessible باشد.

---

# 63. Focus

Focus State باید واضح باشد:

```text
┌──────────────────────────────┐
│                              │
│ [ انتخاب پلن ] ← Focus       │
│                              │
└──────────────────────────────┘
```

---

# 64. Animation

تغییر Price یا Selected Plan می‌تواند Transition داشته باشد.

اما:

```text
Price Update
```

نباید باعث Layout Shift شدید شود.

---

# 65. Selected State

در Comparison:

```text
┌──────────────────────────────┐
│ ✓ پلن انتخاب‌شده             │
│                              │
│ ۹۹۹٬۰۰۰ تومان                │
│                              │
│ [ انتخاب شده ]               │
└──────────────────────────────┘
```

---

# 66. Recommended State

```text
┌──────────────────────────────┐
│ ⭐ پیشنهاد محبوب             │
│                              │
│ پلن حرفه‌ای                  │
│                              │
│ ۹۹۹٬۰۰۰ تومان                │
│                              │
│ [ انتخاب پلن ]               │
└──────────────────────────────┘
```

---

# 67. ProductCard Integration

در ProductCard:

```text
ProductCard
├── Image
├── Title
├── Description
└── PricingCard
```

یا در برخی Layoutها:

```text
ProductCard
└── Price Summary
```

در این حالت نباید دو PricingCard مستقل برای یک Product ایجاد شود.

---

# 68. Course Detail Integration

در Course Detail:

```text
┌─────────────────────────────┐
│ Course Information          │
│                             │
│ ┌─────────────────────────┐ │
│ │ PricingCard             │ │
│ │                         │ │
│ │ ۱٬۲۵۰٬۰۰۰ تومان         │ │
│ │ [ خرید دوره ]           │ │
│ └─────────────────────────┘ │
└─────────────────────────────┘
```

---

# 69. Checkout Integration

Checkout باید Pricing Snapshot خودش را داشته باشد.

```text
Product Price
      ↓
Checkout
      ↓
Price Validation
      ↓
Order Snapshot
```

PricingCard نباید Price Snapshot سفارش را مدیریت کند.

---

# 70. Order Snapshot

پس از ایجاد Order:

```text
Order
├── Product
├── Unit Price
├── Discount
├── Tax
└── Final Price
```

این اطلاعات باید مستقل از PricingCard ذخیره شوند.

---

# 71. Price History

در آینده Pricing ممکن است تاریخچه داشته باشد:

```text
Price
 ↓
Price History
 ↓
Current Price
```

PricingCard فقط Current Price را نمایش می‌دهد.

---

# 72. Scheduled Pricing

در آینده:

```text
Sale Starts
Sale Ends
```

ممکن است وجود داشته باشد.

مثلاً:

```text
تخفیف تا ۲۴ ساعت آینده
```

Timer منطق خودش را دارد و PricingCard فقط داده را نمایش می‌دهد.

---

# 73. Future Pricing Features

در آینده امکان توسعه برای:

```text
○ Coupon
○ Tax
○ Subscription
○ Installment
○ Scheduled Sale
○ Price History
○ Currency Conversion
○ Regional Pricing
○ Membership Pricing
○ Student Pricing
```

وجود داشته باشد.

---

# 74. Testing

### Price

```text
Regular
Discounted
Free
Zero
Unavailable
```

### Billing

```text
One-time
Monthly
Yearly
Installment
```

### State

```text
Available
Purchased
Active
Expired
In Cart
```

### UI

```text
Loading
Error
Success
Selected
Recommended
```

### Responsive

```text
Desktop
Tablet
Mobile
```

### Accessibility

```text
Keyboard
Screen Reader
Focus
Contrast
RTL
Reduced Motion
```

---

# 75. Do

* PricingCard را فقط Presentation Layer نگه دار.
* قیمت را از Commerce Domain دریافت کن.
* Final Price را Server-side معتبر بدان.
* Product و Offer را تفکیک کن.
* Subscription را برای آینده قابل توسعه نگه دار.
* Free Product را پشتیبانی کن.
* Discount را واضح نمایش بده.
* Billing Period را جدا نمایش بده.
* Stateهای Purchased و Active را پشتیبانی کن.
* از Design Tokens استفاده کن.
* RTL و Mobile را از ابتدا در نظر بگیر.
* Accessibility را رعایت کن.

---

# 76. Don't

* قیمت را داخل UI محاسبه نکن.
* Coupon را داخل PricingCard اعمال نکن.
* Tax را داخل Component محاسبه نکن.
* Order ایجاد نکن.
* Payment انجام نده.
* Enrollment ایجاد نکن.
* مستقیماً به Database متصل نشو.
* مستقیماً به WordPress Post Meta وابسته نشو.
* قیمت Client را Source of Truth ندان.
* PricingCard و Checkout Summary را یکی نکن.

---

# 77. Responsibility Map

```text
Commerce
│
├── Product
│
├── Pricing
│    ├── Price
│    ├── Offer
│    ├── Discount
│    └── Billing
│
├── Cart
│
├── Order
│
└── Payment
```

UI:

```text
Pricing
   ↓
Pricing Read Model
   ↓
PricingCard
```

---

# 78. Final Architecture

```text
                    Commerce Domain
                          │
                    Pricing Service
                          │
                    Offer / Price
                          │
                    Read Model / DTO
                          │
                          ↓
                     PricingCard
                          │
             ┌────────────┼────────────┐
             ↓            ↓            ↓
          Price        Discount      Billing
             │            │            │
             └────────────┼────────────┘
                          ↓
                         CTA
                          │
                ┌─────────┴─────────┐
                ↓                   ↓
              Cart              Checkout
                                    │
                                  Order
                                    │
                                 Payment
                                    │
                                Enrollment
```

---

# 79. Final Principle

در Iran LMS:

```text
PricingCard
=
Price & Offer Presentation
```

نه:

```text
PricingCard
=
Pricing Engine
```

مرزبندی نهایی:

```text
PricingCard
   ≠
Pricing Service

PricingCard
   ≠
Cart

PricingCard
   ≠
Order

PricingCard
   ≠
Payment

PricingCard
   ≠
Enrollment
```

و جریان صحیح:

```text
Product
   ↓
Offer
   ↓
Pricing Service
   ↓
Price Read Model
   ↓
PricingCard
   ↓
User Action
   ↓
Cart / Checkout
   ↓
Order
   ↓
Payment
   ↓
Enrollment
```

این مرزبندی باعث می‌شود **Commerce افزونه Iran LMS** از ابتدا برای Course، Bundle، Subscription و Offerهای آینده قابل توسعه باشد، بدون اینکه UI به منطق قیمت‌گذاری یا زیرساخت WordPress وابسته شود.
