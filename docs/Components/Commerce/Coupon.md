# Coupon.md

**Component:** Commerce / Coupon
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Type:** UI Component + Discount Interaction
**Version:** 1.0
**Status:** Foundation

> این فایل برای **افزونه WordPress ایران LMS** نوشته شده است. Coupon بخشی از `Commerce Module` است و نباید به Theme، WooCommerce یا یک Payment Gateway خاص وابسته باشد.

راهنمای UI پروژه بر **Modern SaaS، RTL کامل فارسی، Component-Based، WordPress Friendly و Modular Architecture** تأکید دارد. همچنین قابلیت‌هایی مانند WooCommerce و Wallet باید ماژولار باشند و غیرفعال‌شدنشان Layout را خراب نکند. 

---

# 1. Purpose

`Coupon` مسئول مدیریت و اعمال کدهای تخفیف روی خرید است.

جریان اصلی:

```text
Product
   ↓
Pricing
   ↓
Cart
   ↓
Coupon
   ↓
Checkout
   ↓
Order
```

Coupon فقط **Discount Rule** را تعریف/اعمال می‌کند.

---

# 2. Core Principle

```text
Coupon
=
Discount Rule
```

نه:

```text
Coupon
=
Price
```

و نه:

```text
Coupon
=
Payment
```

---

# 3. Responsibilities

Coupon مسئول:

* ورود کد تخفیف
* نمایش وضعیت Coupon
* اعتبارسنجی اولیه UI
* ارسال Coupon به Server
* نمایش مقدار تخفیف
* نمایش دلیل رد شدن Coupon
* حذف Coupon
* نمایش شرایط Coupon
* نمایش تاریخ انقضا در صورت نیاز
* نمایش محدودیت استفاده در صورت نیاز

است.

---

# 4. Non-Responsibilities

Coupon نباید:

```text
✗ قیمت نهایی را خودش محاسبه کند
✗ Order ایجاد کند
✗ Payment انجام دهد
✗ Enrollment ایجاد کند
✗ مستقیماً به Database دسترسی داشته باشد
✗ قیمت Product را تغییر دهد
✗ به WooCommerce وابسته باشد
```

---

# 5. Architecture

```text
                 Commerce
                    │
                  Pricing
                    │
                   Cart
                    │
                    ↓
                 Coupon
                    │
                    ↓
                 Checkout
                    │
                    ↓
                  Order
                    │
                    ↓
                 Payment
```

---

# 6. Coupon Flow

```text
User enters code
       ↓
Apply Coupon
       ↓
Server Validation
       ↓
Eligibility Check
       ↓
Discount Calculation
       ↓
Cart Recalculation
       ↓
Updated Total
```

---

# 7. Source of Truth

Coupon UI نباید تصمیم نهایی بگیرد.

```text
Browser
   ↓
Coupon Service
   ↓
Commerce Domain
   ↓
Pricing Engine
```

Source of Truth:

```text
Server
```

---

# 8. Basic UI

```text
کد تخفیف دارید؟

┌───────────────────────────────┐
│ کد تخفیف را وارد کنید         │
└───────────────────────────────┘

[ اعمال ]
```

در Checkout می‌تواند زیر Order Summary قرار گیرد.

---

# 9. Applied State

بعد از موفقیت:

```text
✓ کد تخفیف اعمال شد

WELCOME30

تخفیف:
۳۰۰٬۰۰۰ تومان

[ حذف ]
```

---

# 10. Coupon Input Component

ساختار:

```text
CouponField
├── Label
├── Input
├── Apply Button
├── Status
└── Remove Action
```

از `Input.md` و `Button.md` پروژه استفاده شود.

---

# 11. Input

```text
کد تخفیف

[ WELCOME30                  ]
```

Input باید:

* RTL باشد.
* Focus State داشته باشد.
* Error State داشته باشد.
* Loading State داشته باشد.
* Keyboard-friendly باشد.

---

# 12. Uppercase / Lowercase

نباید صرفاً در UI تصمیم گرفته شود که Coupon حتماً Uppercase باشد.

مثلاً:

```text
welcome30
WELCOME30
Welcome30
```

رفتار باید طبق Policy سیستم مشخص شود.

اگر Case-insensitive است، Server مسئول Normalization باشد.

---

# 13. Whitespace

کدهای زیر در صورت Policy مناسب می‌توانند یکسان در نظر گرفته شوند:

```text
WELCOME30
 WELCOME30
WELCOME30 
```

Normalization باید Server-side انجام شود.

---

# 14. Apply Button

Default:

```text
[ اعمال ]
```

Loading:

```text
[ در حال بررسی... ]
```

Disabled:

```text
[ اعمال ]
```

---

# 15. Loading State

بعد از کلیک:

```text
کد تخفیف:
[ WELCOME30 ]

[ در حال بررسی... ]
```

Button باید Disable شود.

---

# 16. Success State

```text
✓ کد تخفیف با موفقیت اعمال شد.

WELCOME30
۳۰٪ تخفیف
```

همزمان Summary باید Update شود.

---

# 17. Invalid Coupon

```text
کد تخفیف نامعتبر است.
```

---

# 18. Expired Coupon

```text
این کد تخفیف منقضی شده است.
```

---

# 19. Not Started

اگر Coupon هنوز فعال نشده:

```text
این کد تخفیف هنوز فعال نشده است.
```

---

# 20. Usage Limit

اگر سقف استفاده پر شده:

```text
ظرفیت استفاده از این کد تخفیف تکمیل شده است.
```

---

# 21. User Usage Limit

اگر هر User فقط یک‌بار مجاز باشد:

```text
شما قبلاً از این کد تخفیف استفاده کرده‌اید.
```

---

# 22. Minimum Cart Value

مثلاً:

```text
حداقل مبلغ خرید برای استفاده از این کد:
۱٬۰۰۰٬۰۰۰ تومان
```

اگر Cart کمتر باشد:

```text
حداقل مبلغ سفارش برای این کد تخفیف
۱٬۰۰۰٬۰۰۰ تومان است.
```

---

# 23. Product Restriction

Coupon ممکن است فقط برای بعضی محصولات فعال باشد.

مثلاً:

```text
این کد تخفیف برای محصول انتخاب‌شده قابل استفاده نیست.
```

---

# 24. Course Restriction

در LMS ممکن است Coupon فقط برای Courseهای خاص باشد:

```text
Coupon
   ↓
Allowed Courses
```

مثلاً:

```text
دوره React
✓ قابل استفاده

دوره Photoshop
✗ غیرقابل استفاده
```

---

# 25. Category Restriction

Coupon می‌تواند به Category متصل باشد:

```text
Coupon
 ↓
Category
 ↓
Eligible Courses
```

مثلاً:

```text
دسته:
برنامه‌نویسی

دوره‌های این دسته:
✓ مشمول تخفیف
```

---

# 26. Instructor Restriction

در نسخه‌های پیشرفته می‌توان Coupon را به Instructor محدود کرد:

```text
Coupon
 ↓
Instructor
 ↓
Courses
```

این قابلیت باید Optional باشد.

---

# 27. Offer Restriction

اگر Commerce دارای Offer/Plan باشد:

```text
Coupon
 ↓
Offer
```

مثلاً:

```text
Basic Plan
✓

Premium Plan
✗
```

---

# 28. Coupon Types

Coupon می‌تواند چند نوع Discount داشته باشد:

```text
percentage
fixed
```

در آینده:

```text
free_shipping
```

فقط در صورتی که Shipping در Commerce فعال شود.

---

# 29. Percentage Discount

مثلاً:

```text
Price:
۱٬۵۰۰٬۰۰۰

Discount:
۲۰٪

Amount:
۳۰۰٬۰۰۰

Final:
۱٬۲۰۰٬۰۰۰
```

---

# 30. Fixed Discount

مثلاً:

```text
Price:
۱٬۵۰۰٬۰۰۰

Discount:
۲۰۰٬۰۰۰ تومان

Final:
۱٬۳۰۰٬۰۰۰ تومان
```

---

# 31. Maximum Discount

برای Percentage Coupon می‌توان سقف تعیین کرد:

```text
Discount:
۳۰٪

Maximum:
۵۰۰٬۰۰۰ تومان
```

پس:

```text
Price = 3,000,000
30% = 900,000

Actual Discount:
500,000
```

---

# 32. Minimum Discount

در صورت نیاز:

```text
Minimum Order:
۱٬۰۰۰٬۰۰۰ تومان
```

---

# 33. Coupon Model

مدل پیشنهادی:

```js
{
    id: "coupon_102",
    code: "WELCOME30",
    type: "percentage",
    value: 30,
    maxDiscount: 500000,
    minOrderAmount: 1000000,
    status: "active"
}
```

---

# 34. Coupon Status

```text
draft
scheduled
active
expired
disabled
exhausted
```

---

# 35. Date Range

Coupon می‌تواند:

```text
startsAt
expiresAt
```

داشته باشد.

مثلاً:

```text
شروع:
۱۴۰۵/۰۵/۱۰

پایان:
۱۴۰۵/۰۵/۲۰
```

---

# 36. Expiration

بعد از:

```text
expiresAt
```

Coupon دیگر نباید توسط Server قبول شود.

حتی اگر UI هنوز آن را نشان دهد.

---

# 37. Server Validation

Flow:

```text
Coupon Code
    ↓
Find Coupon
    ↓
Status Check
    ↓
Date Check
    ↓
User Check
    ↓
Cart Check
    ↓
Product Check
    ↓
Usage Check
    ↓
Discount Calculation
```

---

# 38. Cart Recalculation

پس از Apply:

```text
Cart
 ↓
Coupon
 ↓
Recalculate
 ↓
Subtotal
 ↓
Discount
 ↓
Tax
 ↓
Total
```

---

# 39. Coupon Must Not Mutate Product Price

اشتباه:

```text
Product Price
1,500,000
      ↓
Coupon
      ↓
Product Price = 1,200,000
```

درست:

```text
Product Price
1,500,000

Coupon Discount
-300,000

Cart Total
1,200,000
```

---

# 40. Price Snapshot

Order باید نتیجه Discount را Snapshot کند:

```text
Order
├── Original Total
├── Discount
├── Coupon
└── Final Total
```

---

# 41. Order Relation

```text
Order
   └── Coupon Reference
```

مثلاً:

```json
{
  "coupon_id": "coupon_102",
  "coupon_code": "WELCOME30",
  "discount_amount": 300000
}
```

---

# 42. Historical Coupon Code

حتی اگر بعداً Coupon حذف یا تغییر کند، Order قدیمی باید بتواند نشان دهد:

```text
کد تخفیف:
WELCOME30

تخفیف:
۳۰۰٬۰۰۰ تومان
```

بنابراین Coupon Code نیز باید Snapshot شود.

---

# 43. Coupon Deletion

نباید حذف Coupon باعث خراب‌شدن Orderهای قبلی شود.

```text
Coupon
   ↓
Deleted
```

اما:

```text
Old Order
   ↓
couponCodeSnapshot
```

همچنان باقی می‌ماند.

---

# 44. Coupon Removal

کاربر می‌تواند Coupon را حذف کند:

```text
WELCOME30
[ حذف ]
```

Flow:

```text
Remove
 ↓
Recalculate Cart
 ↓
Restore Original Pricing
```

---

# 45. Remove Coupon

بعد از حذف:

```text
کد تخفیف حذف شد.

جمع سفارش:
۱٬۵۰۰٬۰۰۰ تومان
```

---

# 46. Multiple Coupons

برای نسخه Foundation پیشنهاد:

```text
One Cart
=
One Coupon
```

چون Stacking قوانین پیچیده‌ای ایجاد می‌کند.

---

# 47. Future Coupon Stacking

در آینده می‌توان:

```text
Coupon Stacking
```

را اضافه کرد.

اما باید Rule Engine مشخص داشته باشد:

```text
Coupon A
+
Coupon B
=
Allowed / Not Allowed
```

این قابلیت را فعلاً در UI پایه وارد نکنیم.

---

# 48. Coupon Priority

اگر چند Rule وجود داشته باشد، Commerce می‌تواند Priority داشته باشد:

```text
Priority
1 → Campaign
2 → Coupon
3 → Automatic Discount
```

این موضوع باید در Pricing Engine تعیین شود، نه Coupon UI.

---

# 49. Automatic Discount

Coupon با Automatic Discount فرق دارد:

```text
Coupon
=
User enters code
```

```text
Automatic Discount
=
System applies rule
```

---

# 50. Coupon vs Promotion

```text
Promotion
=
Campaign / Marketing Rule
```

```text
Coupon
=
Redeemable Discount Code
```

---

# 51. Checkout Integration

در Checkout:

```text
خلاصه سفارش

جمع جزء:
۲٬۰۰۰٬۰۰۰

کد تخفیف:
[ WELCOME30 ] [ اعمال ]

تخفیف:
-۶۰۰٬۰۰۰

قابل پرداخت:
۱٬۴۰۰٬۰۰۰
```

راهنمای Course UI نیز در Purchase Card نمایش قیمت اصلی، درصد تخفیف و قیمت فعلی را به‌عنوان بخشی از تجربه خرید نشان می‌دهد. 

---

# 52. Cart Integration

Coupon می‌تواند در Cart نیز اعمال شود:

```text
Cart
├── Items
├── Coupon
└── Summary
```

کاربر نباید مجبور باشد فقط در Checkout Coupon وارد کند.

---

# 53. Product Page

در Product/Course Page معمولاً Coupon Input نباید نمایش داده شود مگر Campaign مشخصی داشته باشیم.

به‌جای آن:

```text
۳۵٪ تخفیف
```

در Purchase Card نمایش داده شود.

نمونه UI پروژه نیز تخفیف و قیمت قبلی/جدید را در کارت خرید Course نمایش می‌دهد. 

---

# 54. Coupon Campaign Badge

اگر Coupon Campaign فعال باشد:

```text
ویژه شما
۳۰٪ تخفیف
```

اما نباید Coupon Secret را در UI عمومی لو بدهد.

---

# 55. Private Coupon

Coupon ممکن است فقط برای User خاص باشد:

```text
Coupon
 ↓
User ID
```

در این حالت:

```text
User A
✓

User B
✗
```

---

# 56. Role Restriction

در آینده می‌توان:

```text
Student
Instructor
Organization
```

را در Eligibility استفاده کرد.

ولی Role باید از Permission/Identity سیستم خوانده شود.

---

# 57. First Purchase Coupon

Rule:

```text
first_order_only
```

مثلاً:

```text
WELCOME30
```

فقط برای اولین Order معتبر باشد.

---

# 58. Per User Limit

```text
usageLimitPerUser = 1
```

Server باید بر اساس Orderهای معتبر بررسی کند.

---

# 59. Global Usage Limit

مثلاً:

```text
usageLimit = 100
```

پس از 100 استفاده:

```text
exhausted
```

---

# 60. Race Condition

دو User ممکن است همزمان آخرین Coupon را مصرف کنند.

بنابراین:

```text
Validate
```

به تنهایی کافی نیست.

در زمان ثبت Order باید Usage نیز به شکل Transaction-safe مدیریت شود.

---

# 61. Security

Coupon یکی از بخش‌های حساس Commerce است.

نباید:

```text
✗ Discount Amount از Client پذیرفته شود
✗ Coupon Validity از Client پذیرفته شود
✗ Usage Count از Client پذیرفته شود
✗ Final Total از Client پذیرفته شود
```

---

# 62. Client Request

Client می‌تواند فقط:

```json
{
  "code": "WELCOME30"
}
```

ارسال کند.

Server خودش:

```text
Coupon
Eligibility
Discount
Total
```

را محاسبه کند.

---

# 63. Coupon API

پیشنهاد:

```text
POST /cart/coupon
DELETE /cart/coupon
```

یا:

```text
POST /checkout/coupon
DELETE /checkout/coupon
```

انتخاب نهایی باید با API Architecture پروژه هماهنگ شود.

---

# 64. API Response

موفق:

```json
{
  "success": true,
  "coupon": {
    "code": "WELCOME30",
    "type": "percentage"
  },
  "discount": {
    "amount": 300000
  },
  "cart": {
    "subtotal": 1500000,
    "discount": 300000,
    "total": 1200000
  }
}
```

---

# 65. Error Response

مثلاً:

```json
{
  "success": false,
  "code": "COUPON_EXPIRED",
  "message": "این کد تخفیف منقضی شده است."
}
```

Error Code برای Frontend مهم است.

---

# 66. Error Codes

پیشنهاد:

```text
COUPON_NOT_FOUND
COUPON_EXPIRED
COUPON_NOT_STARTED
COUPON_DISABLED
COUPON_EXHAUSTED
COUPON_USER_LIMIT
COUPON_MIN_ORDER
COUPON_PRODUCT_RESTRICTED
COUPON_CATEGORY_RESTRICTED
COUPON_NOT_ELIGIBLE
```

---

# 67. WordPress Boundary

Coupon UI نباید:

```php
get_post_meta()
$wpdb
update_option()
```

را مستقیماً استفاده کند.

معماری:

```text
Coupon UI
   ↓
Coupon Application Service
   ↓
Coupon Domain
   ↓
Coupon Repository
   ↓
Storage
```

---

# 68. WordPress Admin

در آینده Admin باید بتواند Coupon ایجاد کند:

```text
Commerce
└── Coupons
    ├── All Coupons
    ├── Add New
    ├── Edit
    └── Reports
```

---

# 69. Admin Coupon Form

```text
عنوان Coupon
[ Welcome Campaign ]

کد
[ WELCOME30 ]

نوع
[ درصدی ▼ ]

مقدار
[ 30 ]

حداقل خرید
[ 1,000,000 ]

حداکثر تخفیف
[ 500,000 ]

شروع
[ تاریخ ]

پایان
[ تاریخ ]

محدودیت استفاده
[ 100 ]
```

---

# 70. Product Restrictions

```text
محصولات مجاز

☑ React
☑ Next.js
☐ Photoshop
```

---

# 71. Category Restrictions

```text
دسته‌های مجاز

☑ برنامه‌نویسی
☑ توسعه وب
☐ طراحی
```

---

# 72. User Restrictions

```text
کاربران مجاز

○ همه
○ کاربران انتخاب‌شده
○ کاربران جدید
○ اولین خرید
```

---

# 73. Admin Table

```text
┌──────────────────────────────────────────────┐
│ کد       نوع      مقدار     وضعیت    استفاده │
├──────────────────────────────────────────────┤
│WELCOME30 درصدی    ۳۰٪       فعال     42/100  │
│NEWUSER  ثابت      200K      فعال     18/50   │
└──────────────────────────────────────────────┘
```

از `Table.md` و `Badge.md` استفاده شود.

---

# 74. Coupon Analytics

در آینده:

```text
تعداد استفاده
مجموع تخفیف
مجموع فروش
تعداد کاربران
Conversion
```

اما Analytics بخشی از Reporting است، نه Coupon UI Foundation.

---

# 75. Coupon Detail

```text
WELCOME30

وضعیت:
فعال

نوع:
درصدی

مقدار:
۳۰٪

استفاده:
۴۲ / ۱۰۰

شروع:
۱۴۰۵/۰۵/۰۱

پایان:
۱۴۰۵/۰۵/۳۰
```

---

# 76. Responsive

### Desktop

```text
Coupon Input
        ↓
[ Input ] [ Apply ]
```

### Mobile

```text
کد تخفیف

[ کد تخفیف            ]

[ اعمال ]
```

Button در Mobile می‌تواند Full Width باشد.

---

# 77. Accessibility

Coupon باید:

* Label واقعی داشته باشد.
* Error به Input متصل باشد.
* Loading State اعلام شود.
* Success فقط با رنگ نشان داده نشود.
* Keyboard قابل استفاده باشد.
* Focus واضح باشد.
* RTL صحیح باشد.

---

# 78. Screen Reader

Success:

```text
کد تخفیف WELCOME30 با موفقیت اعمال شد.
مبلغ تخفیف ۳۰۰ هزار تومان است.
```

Error:

```text
کد تخفیف نامعتبر است.
```

---

# 79. Dark Mode

Tokenهای پیشنهادی:

```text
coupon-surface
coupon-border
coupon-text
coupon-muted
coupon-success
coupon-warning
coupon-error
coupon-accent
```

از Tokenهای اصلی Design System استفاده شود و Token اختصاصی فقط در صورت نیاز اضافه شود.

---

# 80. Typography

از Typography مرکزی پروژه استفاده شود.

راهنمای پروژه استفاده از فونت‌های فارسی مانند `Vazirmatn / Estedad` را در نظر گرفته است. 

---

# 81. Component Composition

```text
Coupon
│
├── CouponField
│   ├── Input
│   └── ApplyButton
│
├── CouponStatus
│
├── CouponDiscount
│
└── RemoveCoupon
```

---

# 82. Reusable Components

Coupon باید از Components موجود استفاده کند:

```text
Input
Button
Badge
Alert
Toast
Card
Icon
Loader
```

نباید Button/Input مخصوص Coupon دوباره ساخته شود.

---

# 83. Toast

بعد از موفقیت:

```text
✓ کد تخفیف اعمال شد.
```

بعد از حذف:

```text
کد تخفیف حذف شد.
```

از `Toast.md` استفاده شود.

---

# 84. Inline Error

برای خطاهای مرتبط با Input:

```text
کد تخفیف
[ ABC123 ]

⚠ این کد تخفیف معتبر نیست.
```

از Error State خود Input استفاده شود.

---

# 85. Empty Coupon State

نباید Coupon Section را به‌صورت Error نمایش داد.

```text
کد تخفیف دارید؟
```

یک State عادی است.

---

# 86. Disabled Coupon Module

اگر Coupon Module غیرفعال باشد:

```text
Coupon UI
```

باید کاملاً حذف شود.

نه:

```text
کد تخفیف
[                 ]
```

بدون عملکرد.

این دقیقاً با Modular Architecture پروژه هماهنگ است. 

---

# 87. WooCommerce Integration

Coupon ایران LMS نباید مستقیماً به WooCommerce Coupon وابسته باشد.

در صورت Integration:

```text
Iran LMS Coupon
       ↓
Commerce Adapter
       ↓
WooCommerce
```

می‌تواند Mapping انجام شود.

اما Domain اصلی:

```text
Iran LMS Commerce
```

باقی می‌ماند.

---

# 88. Coupon + Wallet

اگر Wallet فعال باشد:

```text
Coupon
 ↓
Discount
 ↓
Wallet Balance
 ↓
Final Payment
```

Coupon نباید مستقیماً Wallet را تغییر دهد.

---

# 89. Coupon + Tax

ترتیب محاسبه Tax باید توسط Pricing Policy مشخص شود.

مثلاً:

```text
Subtotal
 ↓
Discount
 ↓
Tax
 ↓
Total
```

یا Policy دیگری.

Coupon UI نباید این ترتیب را Hard-code کند.

---

# 90. Coupon + Refund

Refund:

```text
Order
 ↓
Payment
 ↓
Refund
```

Coupon نباید مستقیماً Refund ایجاد کند.

---

# 91. Coupon + Enrollment

Coupon فقط قیمت را تغییر می‌دهد:

```text
Coupon
 ↓
Discount
 ↓
Order
 ↓
Payment
 ↓
Enrollment
```

Coupon نباید Enrollment را ایجاد یا حذف کند.

---

# 92. Coupon + Free Course

اگر Coupon باعث شود:

```text
Final Total = 0
```

Flow می‌تواند:

```text
Coupon
 ↓
Discount
 ↓
Total = 0
 ↓
Free Order
 ↓
Enrollment
```

باشد.

در این حالت Payment Gateway ممکن است اصلاً فراخوانی نشود.

---

# 93. Full Example

```text
سبد خرید

آموزش React
۱٬۵۰۰٬۰۰۰ تومان

کد تخفیف دارید؟

[ WELCOME30                 ] [ اعمال ]

✓ کد تخفیف اعمال شد.

جمع جزء:
۱٬۵۰۰٬۰۰۰ تومان

تخفیف WELCOME30:
-۳۰۰٬۰۰۰ تومان

قابل پرداخت:
۱٬۲۰۰٬۰۰۰ تومان
```

---

# 94. Testing

### Basic

```text
✓ Empty Input
✓ Valid Coupon
✓ Invalid Coupon
✓ Expired Coupon
✓ Disabled Coupon
```

### Eligibility

```text
✓ Minimum Order
✓ Product Restriction
✓ Category Restriction
✓ User Restriction
✓ First Order
```

### Usage

```text
✓ Global Limit
✓ Per User Limit
✓ Exhausted
✓ Concurrent Usage
```

### Pricing

```text
✓ Percentage
✓ Fixed
✓ Maximum Discount
✓ Zero Total
✓ Tax
```

### Cart

```text
✓ Apply
✓ Remove
✓ Recalculate
✓ Cart Changed
```

### Security

```text
✓ Server Validation
✓ Server Calculation
✓ Authorization
✓ No Client Discount Trust
✓ Race Condition Protection
```

### Responsive

```text
✓ Desktop
✓ Tablet
✓ Mobile
```

### Accessibility

```text
✓ Keyboard
✓ Focus
✓ Screen Reader
✓ RTL
✓ Error Announcement
```

---

# 95. Do

* Coupon را بخشی از Commerce Module نگه دار.
* Validation نهایی را Server-side انجام بده.
* Discount را Server-side محاسبه کن.
* Coupon Code را در Order Snapshot کن.
* Price را مستقیم تغییر نده.
* Apply و Remove را Idempotent طراحی کن.
* Usage Limit را Transaction-safe مدیریت کن.
* Coupon را از Payment و Enrollment جدا نگه دار.
* Coupon را با Pricing Engine هماهنگ کن.
* WooCommerce را Dependency اجباری نکن.
* Coupon Module را قابل Disable نگه دار.
* RTL و Mobile را از ابتدا در نظر بگیر.

---

# 96. Don't

```text
✗ اعتماد به Discount Amount ارسالی Client
✗ اعتماد به Final Total ارسالی Client
✗ تغییر Product Price
✗ تغییر مستقیم Order از UI
✗ دسترسی مستقیم به $wpdb
✗ دسترسی مستقیم به Database
✗ پردازش Payment
✗ ایجاد Enrollment
✗ وابستگی مستقیم به WooCommerce
✗ ذخیره Coupon فقط در Browser
✗ محاسبه Usage فقط در JavaScript
✗ اجازه چند Coupon بدون Rule Engine
```

---

# 97. Responsibility Map

```text
Commerce
│
├── Product
├── Pricing
├── Cart
│
├── Coupon
│   ├── Code
│   ├── Eligibility
│   ├── Discount Rule
│   ├── Usage
│   └── Restrictions
│
├── Checkout
├── Order
├── Payment
└── Invoice
```

---

# 98. Final Architecture

```text
                         Product
                            │
                            ↓
                           Cart
                            │
                  ┌─────────┴─────────┐
                  │                   │
                  ↓                   ↓
                Pricing            Coupon
                  │                   │
                  └─────────┬─────────┘
                            ↓
                       Recalculate
                            │
                            ↓
                         Checkout
                            │
                            ↓
                           Order
                         ↙       ↘
                    Payment     Invoice
                         │
                         ↓
                     Enrollment
```

---

# 99. Final Principle

در Iran LMS:

```text
Coupon
=
Discount Rule
```

و:

```text
Coupon
≠
Product Price
≠
Order
≠
Payment
≠
Enrollment
```

مرزبندی صحیح:

```text
User
 ↓
Coupon Code
 ↓
Coupon Service
 ↓
Eligibility
 ↓
Pricing Engine
 ↓
Discount
 ↓
Cart / Checkout
 ↓
Order
```

**Coupon فقط یک Rule برای کاهش مبلغ واجدشرایط است؛ تصمیم نهایی درباره اعتبار، مبلغ تخفیف، محدودیت استفاده و Total همیشه باید در Commerce سمت Server انجام شود.**
