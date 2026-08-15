# Checkout.md

**Component:** Commerce / Checkout
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Type:** UI Component + Commerce Interaction Surface
**Version:** 1.0
**Status:** Foundation

> این فایل برای **افزونه WordPress ایران LMS** نوشته شده است؛ بنابراین Checkout بخشی از `Commerce Module` افزونه است و نباید با منطق Theme یا WooCommerce گره بخورد.

راهنمای UI پروژه، طراحی را بر پایه **Modern SaaS، RTL کامل فارسی، Component-Based، WordPress Friendly و Modular Architecture** تعریف کرده است. 
در تصاویر مرجع نیز CTAهایی مثل «افزودن به سبد خرید» و نمایش قیمت برای Course وجود دارد. 

---

# 1. Purpose

`Checkout` مرحله‌ای است که کاربر بعد از Cart، اطلاعات لازم برای تکمیل خرید را بررسی و سفارش را نهایی می‌کند.

جریان اصلی:

```text
Product
   ↓
Pricing
   ↓
Cart
   ↓
Checkout
   ↓
Order
   ↓
Payment
   ↓
Enrollment
```

Checkout نباید مستقیماً Enrollment ایجاد کند.

---

# 2. Core Principle

```text
Checkout
=
Review + Validate + Confirm Purchase
```

نه:

```text
Checkout
=
Payment Gateway
```

و نه:

```text
Checkout
=
Enrollment System
```

---

# 3. Responsibilities

Checkout مسئول:

* نمایش اقلام خرید
* نمایش قیمت‌ها
* نمایش تخفیف
* دریافت اطلاعات موردنیاز
* دریافت Coupon در صورت نیاز
* انتخاب روش پرداخت
* نمایش Total
* نمایش قوانین خرید
* Validation اولیه فرم
* ارسال درخواست ایجاد Order
* انتقال به Payment

است.

---

# 4. Non-Responsibilities

Checkout نباید مسئول:

```text
✗ ایجاد Enrollment مستقیم
✗ صدور Certificate
✗ محاسبه Client-side قیمت نهایی
✗ اعتبارسنجی نهایی Coupon
✗ پردازش مستقیم کارت بانکی
✗ ذخیره اطلاعات حساس کارت
✗ دسترسی مستقیم به Database
```

باشد.

---

# 5. Architecture

```text
Cart
 ↓
Checkout UI
 ↓
Checkout Application Service
 ↓
Server Validation
 ↓
Order
 ↓
Payment
 ↓
Payment Result
 ↓
Enrollment
```

---

# 6. Page Structure

پیشنهاد Desktop:

```text
┌─────────────────────────────────────────────────────┐
│ Checkout                                             │
├─────────────────────────────────────────────────────┤
│                                                     │
│  اطلاعات خریدار                 خلاصه سفارش         │
│  ┌──────────────────────┐       ┌───────────────┐   │
│  │ نام                  │       │ دوره React    │   │
│  │ ایمیل                │       │ 1,490,000     │   │
│  │ موبایل               │       │               │   │
│  └──────────────────────┘       │ تخفیف         │   │
│                                 │ -300,000      │   │
│  روش پرداخت                     │───────────────│   │
│  ┌──────────────────────┐       │ قابل پرداخت   │   │
│  │ ○ درگاه پرداخت       │       │ 1,190,000     │   │
│  │ ○ کیف پول            │       │               │   │
│  └──────────────────────┘       │ [ پرداخت ]    │   │
│                                 └───────────────┘   │
└─────────────────────────────────────────────────────┘
```

---

# 7. RTL Layout

Checkout باید کاملاً RTL باشد:

```text
سمت اصلی
    ↓
فرم Checkout

سمت مقابل
    ↓
Order Summary
```

جهت Layout باید از Design System پروژه پیروی کند.

---

# 8. Checkout Sections

```text
Checkout
│
├── Contact Information
├── Billing Information
├── Order Items
├── Coupon
├── Payment Method
├── Terms
└── Order Summary
```

همه بخش‌ها الزامی نیستند.

---

# 9. Guest Checkout

اگر Business Rule اجازه دهد:

```text
Guest
 ↓
Checkout
 ↓
Purchase
 ↓
Account Creation / Login
 ↓
Enrollment
```

اگر Course نیازمند حساب کاربری باشد، Checkout باید قبل از Enrollment کاربر را احراز هویت کند.

---

# 10. Authenticated Checkout

برای کاربر Login شده:

```text
نام
ایمیل
شماره موبایل
```

می‌تواند از Profile پر شود.

مثلاً:

```text
نام و نام خانوادگی
علی محمدی

ایمیل
ali@example.com

شماره موبایل
0912...
```

---

# 11. Contact Information

نمونه:

```text
اطلاعات خریدار

نام و نام خانوادگی *
[ علی محمدی                ]

ایمیل *
[ ali@example.com          ]

شماره موبایل *
[ 0912...                  ]
```

---

# 12. Billing Information

برای محصولات آموزشی دیجیتال ممکن است اطلاعات Billing محدود باشد.

اما Architecture باید برای آینده قابل توسعه باشد.

```text
Billing Information
├── Name
├── Email
├── Phone
├── Address (optional)
└── Company / Tax Info (future)
```

---

# 13. Digital Product

برای Course دیجیتال معمولاً:

```text
Address
```

ضروری نیست.

Checkout باید بر اساس نوع Product تصمیم بگیرد.

---

# 14. Physical Product

اگر Commerce در آینده Product فیزیکی را پشتیبانی کند:

```text
Shipping Address
```

نیاز خواهد بود.

این قابلیت نباید Core Checkout را بشکند.

---

# 15. Course Purchase

برای خرید Course:

```text
Course
   ↓
Offer
   ↓
Cart
   ↓
Checkout
```

اطلاعات Course می‌تواند شامل:

```text
عنوان دوره
مدرس
مدت
قیمت
```

باشد.

---

# 16. Order Items

نمونه:

```text
┌─────────────────────────────┐
│ آموزش جامع React            │
│ پلن استاندارد               │
│ ۱ × ۱٬۴۹۰٬۰۰۰ تومان         │
└─────────────────────────────┘
```

---

# 17. Price Source

Checkout نباید قیمت را از UI دریافت کند.

```text
Checkout UI
     ↓
Checkout Service
     ↓
Pricing Service
     ↓
Server Price
```

---

# 18. Price Revalidation

قبل از ایجاد Order:

```text
Cart Price
     ↓
Revalidate
     ↓
Current Price
```

اگر قیمت تغییر کرده باشد:

```text
قیمت تغییر کرده است.
```

و کاربر باید دوباره تأیید کند.

---

# 19. Price Changed State

```text
قیمت سفارش تغییر کرده است.

قیمت قبلی:
۱٬۴۹۰٬۰۰۰ تومان

قیمت جدید:
۱٬۶۹۰٬۰۰۰ تومان

[ بررسی سفارش ]
```

---

# 20. Discount

```text
قیمت اصلی       ۱٬۹۸۰٬۰۰۰
تخفیف            -۴۹۰٬۰۰۰
────────────────────────
قابل پرداخت      ۱٬۴۹۰٬۰۰۰
```

محاسبه باید Server-side باشد.

---

# 21. Coupon

اگر Coupon فعال باشد:

```text
کد تخفیف دارید؟

[ وارد کردن کد             ]
[ اعمال ]
```

---

# 22. Coupon Validation

Flow:

```text
Coupon
 ↓
Checkout Service
 ↓
Server
 ↓
Validate
 ↓
Recalculate
 ↓
Updated Total
```

---

# 23. Coupon Success

```text
✓ کد تخفیف اعمال شد.

تخفیف:
۳۰۰٬۰۰۰ تومان
```

---

# 24. Coupon Error

```text
کد تخفیف معتبر نیست.
```

یا:

```text
این کد تخفیف منقضی شده است.
```

---

# 25. Payment Methods

Checkout باید Payment Method را به‌صورت قابل توسعه نمایش دهد:

```text
○ درگاه پرداخت آنلاین

○ کیف پول

○ اعتبار حساب
```

اما روش‌های واقعی باید از Payment Module دریافت شوند.

---

# 26. Payment Provider

UI نباید به یک Gateway خاص وابسته باشد.

```text
Checkout
    ↓
Payment Method
    ↓
Payment Service
    ↓
Provider
```

بنابراین امکان Providerهای مختلف وجود دارد.

---

# 27. Payment Method Model

مثلاً:

```js
{
    id: "gateway_1",
    title: "پرداخت آنلاین",
    description: "پرداخت امن از طریق درگاه",
    enabled: true
}
```

---

# 28. Payment Selection

نمونه:

```text
روش پرداخت

┌────────────────────────────────┐
│ ◉ پرداخت آنلاین                │
│   پرداخت امن با کارت بانکی     │
└────────────────────────────────┘

┌────────────────────────────────┐
│ ○ کیف پول                      │
│   موجودی: ۸۵۰٬۰۰۰ تومان        │
└────────────────────────────────┘
```

---

# 29. Wallet

Wallet یک قابلیت اختیاری Commerce است.

اگر فعال نباشد:

```text
Wallet
```

نباید در Checkout نمایش داده شود.

این موضوع با معماری Modular پروژه هماهنگ است؛ راهنمای UI نیز بر حذف ماژول‌های غیرفعال بدون شکستن Layout تأکید دارد. 

---

# 30. Terms

قبل از Purchase:

```text
☐ قوانین و شرایط خرید را مطالعه کرده‌ام و می‌پذیرم.
```

اگر الزام قانونی/Business وجود داشته باشد، Checkbox باید Required باشد.

---

# 31. Terms Link

```text
☐ قوانین و شرایط خرید را می‌پذیرم.
                    مشاهده قوانین
```

---

# 32. Order Summary

Summary:

```text
خلاصه سفارش

آموزش جامع React
۱٬۴۹۰٬۰۰۰ تومان

تخفیف
-۳۰۰٬۰۰۰ تومان

مالیات
۰ تومان

──────────────────

قابل پرداخت
۱٬۱۹۰٬۰۰۰ تومان

[ پرداخت و تکمیل خرید ]
```

---

# 33. Tax

Tax نباید داخل Component محاسبه شود.

```text
Tax Service
 ↓
Checkout Summary
```

اگر Tax غیرفعال باشد:

```text
Tax Row
```

می‌تواند حذف شود.

---

# 34. Total

Total باید از Server دریافت شود:

```js
{
    subtotal: {},
    discount: {},
    tax: {},
    total: {}
}
```

---

# 35. Currency

Currency باید از Commerce Pricing Model بیاید.

برای ایران:

```text
۱٬۱۹۰٬۰۰۰ تومان
```

ولی Component نباید فقط برای تومان طراحی شود.

---

# 36. Free Course

اگر Total:

```text
0
```

باشد:

```text
رایگان
```

بهتر است به جای:

```text
۰ تومان
```

نمایش داده شود.

CTA:

```text
[ ثبت‌نام رایگان ]
```

نه:

```text
[ پرداخت ]
```

---

# 37. Zero Payment Order

برای Free Course:

```text
Checkout
 ↓
Order
 ↓
Payment Not Required
 ↓
Enrollment
```

این حالت باید در Architecture پشتیبانی شود.

---

# 38. Already Purchased

اگر User قبلاً Course را خریداری کرده:

```text
این دوره قبلاً برای شما فعال شده است.

[ ورود به دوره ]
```

نباید دوباره Payment انجام شود.

---

# 39. Enrollment Conflict

قبل از Order نهایی:

```text
Course
 ↓
Access Check
 ↓
Already Enrolled
```

اگر کاربر دسترسی دارد:

```text
این دوره در حساب شما فعال است.
```

---

# 40. Cart Changed

اگر Cart در Tab دیگری تغییر کرده باشد:

```text
سبد خرید شما تغییر کرده است.

[ بروزرسانی سفارش ]
```

---

# 41. Item Removed

اگر یک Item دیگر موجود نباشد:

```text
این محصول دیگر در سبد خرید موجود نیست.
```

---

# 42. Stock / Availability

برای Course معمولاً Stock مطرح نیست.

اما Product Policy می‌تواند:

```text
available
unavailable
sold_out
```

داشته باشد.

Checkout باید وضعیت را از Server دریافت کند.

---

# 43. Expired Offer

اگر Offer منقضی شده:

```text
این پیشنهاد منقضی شده است.

قیمت جدید:
۱٬۶۹۰٬۰۰۰ تومان
```

---

# 44. Loading State

هنگام Checkout:

```text
[ در حال بررسی سفارش... ]
```

یا Skeleton.

از الگوی `Skeleton.md` پروژه استفاده شود.

---

# 45. Payment Loading

بعد از کلیک:

```text
[ در حال انتقال به درگاه... ]
```

Button باید Disable شود تا Double Submit رخ ندهد.

---

# 46. Double Submit Prevention

```text
Click
 ↓
Disable CTA
 ↓
Create Order
 ↓
Payment
```

نباید:

```text
Click
Click
Click
```

سه Order ایجاد کند.

---

# 47. Checkout Error

```text
خطایی در تکمیل سفارش رخ داد.

[ تلاش مجدد ]
```

پیام نباید اطلاعات فنی حساس را نمایش دهد.

---

# 48. Validation Error

مثلاً:

```text
ایمیل *
[ ali@ ]

⚠ لطفاً یک ایمیل معتبر وارد کنید.
```

Validation باید هم Client-side و هم Server-side باشد.

---

# 49. Server Validation

Client Validation کافی نیست.

```text
Browser Validation
       ↓
Server Validation
       ↓
Order
```

---

# 50. Security

Checkout یکی از حساس‌ترین بخش‌های Commerce است.

نباید اعتماد شود به:

```text
Client Price
Client Discount
Client Total
Client Coupon Result
Client Product ID تنها
```

Server باید همه را دوباره بررسی کند.

---

# 51. Sensitive Payment Data

Checkout نباید:

```text
Card Number
CVV
PIN
```

را در Database افزونه ذخیره کند.

Payment Gateway باید مسئول اطلاعات حساس پرداخت باشد.

---

# 52. Order Creation

Flow:

```text
Checkout Submit
       ↓
Validate User
       ↓
Validate Cart
       ↓
Validate Pricing
       ↓
Validate Coupon
       ↓
Calculate Final Total
       ↓
Create Order
       ↓
Create Payment
```

---

# 53. Order Snapshot

Order باید قیمت زمان خرید را Snapshot کند.

```text
Order
├── Product
├── Offer
├── Unit Price
├── Discount
├── Tax
└── Final Total
```

تغییر قیمت آینده نباید Order قدیمی را تغییر دهد.

---

# 54. Checkout vs Order

```text
Checkout
=
Process / UI Before Order Completion
```

```text
Order
=
Persistent Commerce Record
```

---

# 55. Checkout vs Payment

```text
Checkout
   ↓
Payment Request
```

Checkout Payment Gateway نیست.

---

# 56. Payment Result

بعد از Payment:

```text
Payment
├── success
├── failed
├── cancelled
└── pending
```

---

# 57. Success

```text
پرداخت با موفقیت انجام شد.

شماره سفارش:
#10482

[ مشاهده دوره ]
```

برای Course موفق:

```text
Payment Success
 ↓
Enrollment
 ↓
Course Access
```

---

# 58. Pending

```text
پرداخت در حال بررسی است.

پس از تأیید پرداخت، دسترسی شما فعال خواهد شد.
```

نباید در این حالت فوراً Enrollment قطعی ایجاد شود مگر Architecture پرداخت صریحاً چنین Stateای را مجاز کرده باشد.

---

# 59. Failed

```text
پرداخت ناموفق بود.

مبلغی از حساب شما کسر نشده است.
```

اگر واقعاً وضعیت از Payment Provider تأیید شده باشد.

CTA:

```text
[ تلاش مجدد ]
```

---

# 60. Cancelled

```text
پرداخت لغو شد.

سفارش شما همچنان در دسترس است.
```

---

# 61. Retry Payment

```text
Order
 ↓
Retry Payment
```

نباید برای Retry الزاماً Order جدید ساخته شود، مگر Business Rule پروژه چنین چیزی را تعیین کند.

---

# 62. Guest to Account

اگر Guest Checkout مجاز باشد:

```text
Checkout
 ↓
Payment
 ↓
Create / Link Account
 ↓
Enrollment
```

جزئیات این فرآیند باید با Auth Module هماهنگ باشد.

---

# 63. Mobile Layout

در Mobile:

```text
┌───────────────────────────┐
│ تکمیل خرید                │
├───────────────────────────┤
│ اطلاعات خریدار            │
│                           │
│ نام                       │
│ [.....................]   │
│                           │
│ ایمیل                     │
│ [.....................]   │
│                           │
│ روش پرداخت                │
│ ○ پرداخت آنلاین           │
│ ○ کیف پول                 │
│                           │
│ خلاصه سفارش               │
│ ۱٬۱۹۰٬۰۰۰ تومان           │
│                           │
│ [ پرداخت و تکمیل خرید ]   │
└───────────────────────────┘
```

---

# 64. Sticky Payment CTA

در Mobile می‌توان CTA را Sticky کرد:

```text
┌───────────────────────────┐
│ ۱٬۱۹۰٬۰۰۰ تومان            │
│ [ پرداخت و تکمیل خرید ]   │
└───────────────────────────┘
```

نباید روی فرم یا خطای Validation را بپوشاند.

---

# 65. Desktop Sticky Summary

در Desktop:

```text
Order Summary
```

می‌تواند Sticky باشد.

اما فقط در محدوده Checkout.

---

# 66. Accessibility

Checkout باید:

* Label واقعی برای Input داشته باشد.
* Error را به Input مرتبط کند.
* Focus State مشخص داشته باشد.
* Keyboard Navigation کامل داشته باشد.
* Radio/Checkbox قابل استفاده با Keyboard باشد.
* تغییر Total برای Screen Reader قابل اعلام باشد.
* CTA وضعیت Loading را اعلام کند.

---

# 67. Focus Management

بعد از Submit:

```text
Submit
 ↓
Validation Error
 ↓
Focus First Invalid Field
```

در موفقیت:

```text
Payment Redirect
```

---

# 68. Error Announcement

مثلاً:

```text
۳ خطا در فرم وجود دارد.
```

و سپس:

```text
نام و نام خانوادگی الزامی است.
ایمیل معتبر نیست.
روش پرداخت انتخاب نشده است.
```

---

# 69. RTL Typography

راهنمای UI پروژه استفاده از Typography فارسی مانند:

```text
Vazirmatn
Estedad
```

را پیشنهاد می‌کند. 

Checkout باید از Typography Tokenهای Design System استفاده کند، نه Font مستقل.

---

# 70. Visual Style

طبق Design Guide:

```text
Modern SaaS
RTL
Soft Shadows
16px Radius
Blue + Purple Accent
Component Based
WordPress Friendly
Modular
```



---

# 71. Dark Mode

Tokenهای پیشنهادی:

```text
checkout-surface
checkout-card
checkout-border
checkout-text
checkout-muted
checkout-price
checkout-discount
checkout-error
checkout-success
checkout-cta
```

---

# 72. Component Composition

```text
Checkout
│
├── CheckoutHeader
│
├── ContactForm
│
├── BillingForm
│
├── CouponForm
│
├── PaymentMethodSelector
│
├── OrderItems
│
├── OrderSummary
│
├── Terms
│
└── CheckoutCTA
```

---

# 73. Reusable Components

Checkout نباید Componentهای مستقل جدید برای هر UI primitive بسازد.

باید از:

```text
Input
Select
Checkbox
Radio
Button
Card
Alert
Toast
Loader
Skeleton
```

پروژه استفاده کند.

---

# 74. API Boundary

نمونه Endpointها:

```text
GET  /cart
POST /checkout/validate
POST /checkout/order
POST /checkout/payment
```

ساختار دقیق Endpointها باید با `03-API` پروژه هماهنگ شود.

---

# 75. Recommended Checkout Flow

```text
GET /cart
     ↓
Render Checkout
     ↓
User fills information
     ↓
Select Payment Method
     ↓
Accept Terms
     ↓
Submit
     ↓
POST /checkout/validate
     ↓
Server validates
     ↓
Create Order
     ↓
Create Payment
     ↓
Redirect / Payment
```

---

# 76. Server as Source of Truth

اصل حیاتی:

```text
Browser
  ≠
Source of Truth
```

Source of Truth:

```text
Commerce Application
```

---

# 77. WordPress Boundary

Checkout نباید مستقیم از:

```php
get_post_meta()
update_post_meta()
$wpdb
```

استفاده کند.

ساختار:

```text
Checkout UI
     ↓
Application Service
     ↓
Commerce Domain
     ↓
Repository
     ↓
WordPress Database
```

---

# 78. WooCommerce Dependency

Checkout افزونه Iran LMS نباید ذاتاً وابسته به WooCommerce باشد.

اگر Integration با WooCommerce در آینده اضافه شود:

```text
Iran LMS Commerce
        ↕
WooCommerce Adapter
```

بهتر از این است که:

```text
Iran LMS Checkout
        ↓
WooCommerce API everywhere
```

باشد.

راهنمای پروژه نیز WooCommerce را در فهرست **Modular Features** قرار داده و تأکید می‌کند که ماژول‌های غیرفعال نباید Layout را خراب کنند. 

---

# 79. Module States

اگر Payment Module فعال نباشد:

```text
Checkout
 ↓
No Payment Provider
```

باید پیام مناسب نمایش دهد:

```text
در حال حاضر امکان پرداخت وجود ندارد.
```

نه اینکه Checkout شکسته شود.

---

# 80. Free Checkout

اگر Product رایگان باشد:

```text
Payment Method
```

می‌تواند حذف شود.

```text
Checkout
 ↓
Confirm
 ↓
Order
 ↓
Enrollment
```

CTA:

```text
[ ثبت‌نام و شروع یادگیری ]
```

---

# 81. Multi-Product Checkout

اگر Cart چند Product داشته باشد:

```text
Checkout
│
├── Course A
├── Course B
└── Bundle C
```

Summary باید همه را نمایش دهد.

---

# 82. Course Access

بعد از Payment موفق:

```text
Order
 ↓
Payment Success
 ↓
Enrollment Service
 ↓
Enrollment
 ↓
Course Access
```

Checkout خودش این کار را انجام نمی‌دهد.

---

# 83. Success Page

ساختار:

```text
┌──────────────────────────────┐
│             ✓                │
│                              │
│       پرداخت موفق بود        │
│                              │
│     سفارش #10482             │
│                              │
│  دوره برای شما فعال شد.      │
│                              │
│ [ شروع یادگیری ]             │
│                              │
└──────────────────────────────┘
```

---

# 84. Failed Payment Page

```text
┌──────────────────────────────┐
│             ×                │
│                              │
│       پرداخت ناموفق بود      │
│                              │
│      سفارش #10482            │
│                              │
│ [ تلاش مجدد ]                │
│ [ بازگشت به سبد خرید ]       │
└──────────────────────────────┘
```

---

# 85. Testing

### Form

```text
✓ Valid Name
✓ Invalid Name
✓ Valid Email
✓ Invalid Email
✓ Phone
✓ Required Fields
```

### Pricing

```text
✓ Regular Price
✓ Discount
✓ Coupon
✓ Tax
✓ Free
✓ Price Changed
```

### Payment

```text
✓ Available
✓ Disabled
✓ Success
✓ Failed
✓ Cancelled
✓ Pending
```

### Cart

```text
✓ Empty
✓ One Item
✓ Multiple Items
✓ Item Removed
✓ Item Unavailable
✓ Already Purchased
```

### Security

```text
✓ Server Price Validation
✓ Coupon Validation
✓ Total Validation
✓ Double Submit Prevention
✓ Payment State Validation
```

### Accessibility

```text
✓ Keyboard
✓ Focus
✓ Screen Reader
✓ RTL
✓ Contrast
```

### Responsive

```text
✓ Desktop
✓ Tablet
✓ Mobile
```

---

# 86. Do

* Checkout را بخشی از Commerce Module نگه دار.
* قیمت را Server-side معتبر بدان.
* Cart را قبل از Order دوباره Validate کن.
* Payment Provider را Abstract نگه دار.
* Guest Checkout را قابل توسعه طراحی کن.
* Free Checkout را پشتیبانی کن.
* Coupon را Server-side Validate کن.
* Double Submit را جلوگیری کن.
* Payment Stateها را مشخص نگه دار.
* Enrollment را از Checkout جدا نگه دار.
* با WordPress Plugin Architecture سازگار باش.
* WooCommerce را Dependency اجباری نکن.
* RTL و Mobile را از ابتدا رعایت کن.
* از Componentهای موجود Design System استفاده کن.

---

# 87. Don't

```text
✗ Checkout → $wpdb
✗ Checkout → get_post_meta()
✗ Checkout → Enrollment مستقیم
✗ Checkout → Certificate
✗ Checkout → ذخیره Card Number
✗ Checkout → اعتماد به Client Total
✗ Checkout → اعتماد به Client Coupon
✗ Checkout → Payment Gateway مستقیم
✗ Checkout → وابستگی اجباری به WooCommerce
✗ Checkout → ساخت Order با هر کلیک
```

---

# 88. Responsibility Map

```text
Commerce
│
├── Product
├── Pricing
├── Cart
│
├── Checkout
│    ├── Contact
│    ├── Billing
│    ├── Coupon
│    ├── Payment Method
│    └── Order Summary
│
├── Order
├── Payment
└── Enrollment
```

---

# 89. Final Architecture

```text
                       Commerce
                          │
                       Product
                          │
                       Pricing
                          │
                         Cart
                          │
                          ↓
                      Checkout
                          │
              ┌───────────┼───────────┐
              ↓           ↓           ↓
         Contact       Pricing     Payment
          Data        Validation     Method
              │           │           │
              └───────────┼───────────┘
                          ↓
                   Checkout Service
                          │
                    Server Validation
                          │
                          ↓
                        Order
                          │
                          ↓
                       Payment
                          │
                ┌─────────┴─────────┐
                ↓                   ↓
             Success              Failed
                │
                ↓
           Enrollment
                │
                ↓
          Course Access
```

---

# 90. Final Principle

در Iran LMS:

```text
Cart
   ↓
Checkout
   ↓
Order
   ↓
Payment
   ↓
Enrollment
```

و مرزبندی:

```text
Checkout
≠ Cart

Checkout
≠ Order

Checkout
≠ Payment

Checkout
≠ Enrollment
```

**Checkout محل جمع‌کردن اطلاعات و تأیید خرید است؛ منبع حقیقت قیمت، Order و Payment همیشه لایه‌های Server-side Commerce هستند.**

این ساختار با Design Guide فعلی پروژه که روی **Component-Based، WordPress-Friendly و Modular Architecture** تأکید دارد هم‌راستاست. 
