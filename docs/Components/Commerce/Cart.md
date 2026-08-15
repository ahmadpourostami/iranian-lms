# Cart.md

**Component:** Commerce / Cart
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Type:** UI Component + Commerce Interaction Surface
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

`Cart` رابط نمایش و مدیریت اقلامی است که کاربر قصد خرید آن‌ها را دارد.

در Iran LMS، Cart باید بین:

```text
Product
Pricing
Order
Checkout
Payment
```

مرزبندی مشخص داشته باشد.

Cart خودش Order نیست و Payment را انجام نمی‌دهد.

---

# 2. Important Project Boundary

Iran LMS یک **افزونه WordPress برای مدیریت سیستم آموزشی** است.

بنابراین Cart باید به‌عنوان بخشی از **Commerce Module افزونه** طراحی شود، نه به‌عنوان یک فروشگاه مستقل.

```text
Iran LMS Plugin
│
├── Learning
├── Enrollment
├── Assessment
├── Certificate
├── Communication
├── Gamification
└── Commerce
     │
     ├── Product
     ├── Pricing
     ├── Cart
     ├── Order
     └── Payment
```

---

# 3. Core Principle

```text
Product
   ↓
Add to Cart
   ↓
Cart
   ↓
Price Validation
   ↓
Checkout
   ↓
Order
   ↓
Payment
```

Cart نباید این مسیر را دور بزند.

---

# 4. Responsibilities

Cart مسئول:

* نمایش اقلام
* افزایش/کاهش تعداد در صورت پشتیبانی
* حذف Item
* نمایش قیمت
* نمایش تخفیف
* نمایش جمع
* نمایش وضعیت
* Apply Coupon در صورت فعال بودن
* انتقال به Checkout
* نمایش Empty State
* نمایش Loading/Error State

است.

---

# 5. Non-Responsibilities

Cart نباید:

```text
✗ Payment
✗ Order Creation
✗ Enrollment
✗ Certificate Generation
✗ Course Access Grant
✗ Final Payment Authorization
```

را انجام دهد.

---

# 6. Cart Model

Cart باید یک مدل مستقل داشته باشد:

```js
{
    id: "cart_123",
    items: [],
    totals: {},
    currency: "IRR"
}
```

---

# 7. Cart Item

هر Item:

```js
{
    id: "cart_item_1",
    productId: "product_25",
    offerId: "offer_101",
    title: "آموزش جامع React",
    quantity: 1,
    unitPrice: {},
    totalPrice: {},
    image: "",
    purchasable: true
}
```

---

# 8. Product vs Cart Item

نباید فرض شود:

```text
Product = Cart Item
```

زیرا ممکن است یک Product با یک Offer مشخص وارد Cart شود.

```text
Product
   ↓
Offer
   ↓
Cart Item
```

---

# 9. Basic Layout

```text
┌─────────────────────────────────────────────┐
│ سبد خرید من                                 │
│                                             │
│ ┌─────────────────────────┐ ┌─────────────┐ │
│ │ Product                 │ │ خلاصه سبد   │ │
│ │                         │ │             │ │
│ │ Image                   │ │ جمع جزء     │ │
│ │ Title                   │ │ تخفیف       │ │
│ │ Price                   │ │ مالیات      │ │
│ │ Quantity                │ │─────────────│ │
│ │ Remove                  │ │ قابل پرداخت │ │
│ └─────────────────────────┘ │             │ │
│                             │ [پرداخت]    │ │
│                             └─────────────┘ │
└─────────────────────────────────────────────┘
```

---

# 10. RTL Layout

در حالت RTL:

```text
سمت راست
    ↓
Product Information

سمت چپ
    ↓
Quantity / Price / Actions
```

اما ساختار باید با Grid System پروژه هماهنگ باشد.

---

# 11. Cart Header

عنوان:

```text
سبد خرید
```

می‌تواند تعداد Items را نیز نمایش دهد:

```text
سبد خرید (۳)
```

تعداد باید تعداد Itemهای واقعی Cart باشد، نه الزاماً تعداد Quantity.

---

# 12. Cart Item

نمونه:

```text
┌────────────────────────────────────┐
│ [Image] آموزش جامع React           │
│         علی احمدی                  │
│         ۱٬۴۹۰٬۰۰۰ تومان            │
│                                    │
│         تعداد: ۱      حذف           │
└────────────────────────────────────┘
```

---

# 13. Course Product

برای Course:

```text
[تصویر]
آموزش جامع React
مدرس: علی احمدی
۱٬۴۹۰٬۰۰۰ تومان
```

اطلاعات Course باید از Learning Read Model بیاید.

---

# 14. Bundle Product

برای Bundle:

```text
پکیج توسعه Frontend

شامل ۵ دوره

۲٬۹۹۰٬۰۰۰ تومان
```

Cart نباید خودش محتویات Bundle را محاسبه کند.

---

# 15. Quantity

برای Course معمولاً:

```text
quantity = 1
```

چون یک Course معمولاً قابل خرید چندباره در یک Cart نیست.

بنابراین برای Course:

```text
[-] 1 [+]
```

لزوماً نباید نمایش داده شود.

---

# 16. Quantity Rules

Quantity باید بر اساس Product Policy تعیین شود:

```js
{
    min: 1,
    max: 1,
    adjustable: false
}
```

یا:

```js
{
    min: 1,
    max: 10,
    adjustable: true
}
```

---

# 17. Remove

Action:

```text
حذف
```

یا Icon Button:

```text
🗑
```

باید Accessible Label داشته باشد:

```text
حذف آموزش جامع React از سبد خرید
```

---

# 18. Remove Confirmation

برای حذف یک Item معمولاً Confirmation Modal لازم نیست، مگر حذف دارای پیامد جدی باشد.

بهتر:

```text
حذف
 ↓
Immediate Remove
 ↓
Toast
 ↓
Undo
```

---

# 19. Undo

مثلاً:

```text
آموزش React از سبد خرید حذف شد.

[ بازگردانی ]
```

---

# 20. Empty Cart

اگر Cart خالی باشد:

```text
┌──────────────────────────────┐
│                              │
│            🛒                │
│                              │
│       سبد خرید خالی است      │
│                              │
│ دوره‌ای برای خرید انتخاب     │
│ نکرده‌اید.                   │
│                              │
│ [ مشاهده دوره‌ها ]           │
│                              │
└──────────────────────────────┘
```

Empty State از `EmptyState.md` استفاده کند.

---

# 21. Cart Summary

Summary باید شامل:

```text
جمع اقلام
تخفیف
مالیات
هزینه‌های اضافی
قابل پرداخت
```

باشد.

مثال:

```text
جمع جزء                 ۱٬۸۰۰٬۰۰۰
تخفیف                    -۳۰۰٬۰۰۰
مالیات                         ۰
────────────────────────────────
قابل پرداخت             ۱٬۵۰۰٬۰۰۰
```

---

# 22. Pricing Responsibility

Cart نباید قیمت را از:

```text
ProductCard
```

کپی کند.

قیمت Cart باید از Commerce Server/Cart Service بیاید.

---

# 23. Price Source of Truth

```text
ProductCard Price
       ↓
Display

Cart Price
       ↓
Server Cart

Checkout Price
       ↓
Server Revalidation
```

---

# 24. Price Changed

اگر قیمت تغییر کرده باشد:

```text
قیمت این محصول تغییر کرده است.
```

مثلاً:

```text
قیمت قبلی:
۱٬۲۵۰٬۰۰۰

قیمت جدید:
۱٬۴۹۰٬۰۰۰
```

کاربر باید قبل از Checkout از تغییر مطلع شود.

---

# 25. Product Unavailable

اگر Product دیگر قابل خرید نیست:

```text
این محصول در حال حاضر قابل خرید نیست.
```

Action:

```text
[ حذف از سبد ]
```

---

# 26. Product Removed

اگر Product از سیستم حذف شده:

```text
این محصول دیگر در دسترس نیست.
```

Cart باید بتواند آن را مشخص کند.

---

# 27. Already Purchased

اگر کاربر قبلاً Course را خریداری کرده:

```text
این دوره را قبلاً خریداری کرده‌اید.
```

و:

```text
[ ورود به دوره ]
```

یا:

```text
[ حذف از سبد ]
```

نمایش داده شود.

---

# 28. Enrollment Conflict

ممکن است Course در Cart باشد ولی User قبلاً Enrollment فعال داشته باشد.

```text
Cart
 ↓
Access Check
 ↓
Already Enrolled
```

این مورد باید توسط Application Layer تعیین شود.

---

# 29. Coupon

در صورت فعال بودن Coupon:

```text
کد تخفیف دارید؟

[ وارد کردن کد ]
[ اعمال ]
```

---

# 30. Coupon State

```text
idle
loading
applied
invalid
expired
removed
```

---

# 31. Coupon Success

```text
✓ کد تخفیف با موفقیت اعمال شد.
```

مثلاً:

```text
تخفیف:
-۳۰۰٬۰۰۰ تومان
```

---

# 32. Coupon Error

```text
کد تخفیف معتبر نیست.
```

یا:

```text
این کد تخفیف منقضی شده است.
```

پیام باید از Server دریافت شود.

---

# 33. Coupon Security

Cart نباید خودش اعتبار Coupon را بررسی کند.

```text
Coupon Code
   ↓
Server
   ↓
Validation
   ↓
Pricing
   ↓
Cart Totals
```

---

# 34. Checkout CTA

CTA اصلی:

```text
[ ادامه و پرداخت ]
```

یا:

```text
[ ادامه به تسویه حساب ]
```

بهتر است با Terminology نهایی Checkout پروژه یکسان باشد.

---

# 35. Disabled Checkout

اگر Cart مشکل داشته باشد:

```text
[ ادامه به پرداخت ]
```

Disabled شود.

مثلاً:

```text
Product unavailable
Price invalid
Cart loading
Checkout unavailable
```

---

# 36. Guest Cart

در صورت پشتیبانی:

```text
Guest
 ↓
Temporary Cart
```

پس از Login:

```text
Guest Cart
+
User Cart
↓
Merge
```

---

# 37. Cart Persistence

معماری می‌تواند:

```text
Guest
→ Browser / Temporary Identifier

Authenticated User
→ Server-side Cart
```

باشد.

اما UI نباید مسئول Persistence باشد.

---

# 38. WordPress Context

Cart باید با WordPress Plugin Architecture سازگار باشد.

نباید مستقیماً به:

```php
$_SESSION
```

وابسته شود مگر اینکه در Architecture پروژه صریحاً چنین تصمیمی گرفته شود.

WordPress به‌صورت Native سیستم Session عمومی مثل PHP Session ندارد.

بنابراین Cart باید از یک Storage Strategy مشخص استفاده کند.

---

# 39. Recommended Cart Storage

برای User Login شده:

```text
User
 ↓
Cart Repository
 ↓
Database
```

برای Guest:

```text
Guest Identifier
 ↓
Temporary Cart
```

Implementation دقیق باید در Commerce Architecture مشخص شود.

---

# 40. Database Boundary

UI نباید:

```text
$wpdb
```

را مستقیماً صدا بزند.

```text
Cart UI
 ↓
Application Service
 ↓
Cart Repository
 ↓
Database
```

---

# 41. Cart API

نمونه API:

```text
GET    /cart
POST   /cart/items
PATCH  /cart/items/{id}
DELETE /cart/items/{id}
POST   /cart/coupon
DELETE /cart/coupon
```

نام و ساختار نهایی باید با `Commerce API` پروژه هماهنگ شود.

---

# 42. Add Item

Flow:

```text
ProductCard
 ↓
Add To Cart
 ↓
Cart Service
 ↓
Server Validation
 ↓
Cart Updated
 ↓
UI Update
```

---

# 43. Update Item

برای Productهایی که Quantity دارند:

```text
PATCH /cart/items/{id}
```

با:

```json
{
    "quantity": 2
}
```

---

# 44. Remove Item

```text
DELETE /cart/items/{id}
```

پس از موفقیت:

```text
Cart State Updated
```

---

# 45. Cart State

UI State:

```text
idle
loading
updating
success
error
empty
```

---

# 46. Loading State

هنگام بارگذاری:

```text
┌──────────────────────────────┐
│ ░░░░░░░░░░░                  │
│ ███████░░░                  │
│ ░░░░░░░░░░░                  │
└──────────────────────────────┘
```

از `Skeleton.md` استفاده شود.

---

# 47. Item Updating

هنگام حذف/Update:

```text
Item
 ↓
Loading Overlay
```

یا:

```text
Quantity
[-]  [در حال بروزرسانی]  [+]
```

---

# 48. Optimistic UI

برای Cart می‌توان Optimistic Update داشت، اما:

```text
Client State
```

باید پس از پاسخ Server Sync شود.

اگر Server رد کرد:

```text
Rollback
+
Error Feedback
```

---

# 49. Error State

```text
سبد خرید بارگذاری نشد.

[ تلاش مجدد ]
```

---

# 50. Network Error

```text
ارتباط با سرور برقرار نشد.

[ تلاش مجدد ]
```

Cart نباید اطلاعات جعلی نمایش دهد.

---

# 51. Cart Count

Header می‌تواند:

```text
🛒 ۳
```

نمایش دهد.

Cart Count باید از Cart State بیاید.

---

# 52. Count Semantics

دو مقدار ممکن است وجود داشته باشد:

```text
itemCount
totalQuantity
```

مثلاً:

```text
Course A × 1
Product B × 3
```

داریم:

```text
itemCount = 2
totalQuantity = 4
```

UI باید مشخص کند کدام را نمایش می‌دهد.

---

# 53. Mini Cart

در Header می‌توان Mini Cart داشت:

```text
┌─────────────────────────────┐
│ سبد خرید                    │
│                             │
│ React Course                │
│ 1,490,000                   │
│                             │
│ Bundle                      │
│ 2,490,000                   │
│                             │
│ جمع: 3,980,000              │
│                             │
│ [ مشاهده سبد ]              │
└─────────────────────────────┘
```

Mini Cart یک Variant از Cart است، نه Domain جدا.

---

# 54. Full Cart vs Mini Cart

```text
Cart
├── Full Cart
└── Mini Cart
```

Full Cart امکانات کامل‌تر دارد.

Mini Cart فقط Summary است.

---

# 55. Mobile Cart

در Mobile:

```text
┌────────────────────────────┐
│ سبد خرید (۲)               │
├────────────────────────────┤
│ Product                    │
│ 1,490,000 تومان            │
│ حذف                        │
├────────────────────────────┤
│ Product                    │
│ 990,000 تومان              │
│ حذف                        │
├────────────────────────────┤
│ جمع: 2,480,000             │
│                            │
│ [ ادامه به پرداخت ]        │
└────────────────────────────┘
```

---

# 56. Sticky Summary

در Mobile:

```text
┌────────────────────────────┐
│ ۲٬۴۸۰٬۰۰۰ تومان             │
│ [ ادامه به پرداخت ]        │
└────────────────────────────┘
```

می‌تواند Sticky باشد.

اما نباید محتوای صفحه را بپوشاند.

---

# 57. Desktop Layout

پیشنهاد:

```text
Content Width
│
├── Cart Items      2/3
│
└── Summary         1/3
```

Summary می‌تواند Sticky شود.

---

# 58. RTL

تمام:

```text
Text
Price
Actions
Breadcrumb
Forms
Coupon
```

باید RTL باشند.

---

# 59. Dark Mode

Tokenهای پیشنهادی:

```text
cart-surface
cart-item-surface
cart-border
cart-text
cart-muted
cart-price
cart-discount
cart-danger
cart-summary-surface
cart-cta
```

---

# 60. Accessibility

Cart باید:

* عنوان واضح داشته باشد.
* هر Item Label قابل دسترسی داشته باشد.
* Remove Button Label مناسب داشته باشد.
* Quantity Control قابل Keyboard باشد.
* Price برای Screen Reader قابل فهم باشد.
* Errorها قابل دسترسی باشند.
* Focus بعد از حذف مدیریت شود.

---

# 61. Focus Management

بعد از حذف Item:

```text
Remove
 ↓
Item Removed
 ↓
Focus
```

باید روی Element منطقی بعدی قرار گیرد.

مثلاً:

```text
Next Cart Item
```

یا اگر Cart خالی شد:

```text
Empty State CTA
```

---

# 62. Screen Reader Feedback

بعد از Update:

```text
سبد خرید بروزرسانی شد.
```

بعد از Remove:

```text
آموزش React از سبد خرید حذف شد.
```

---

# 63. Keyboard

برای Quantity:

```text
Tab
 ↓
Decrease
 ↓
Quantity
 ↓
Increase
 ↓
Remove
```

---

# 64. Animation

Animation فقط برای:

```text
Add
Remove
Update
Price Change
```

باشد.

از Animation شدید خودداری شود.

---

# 65. Product Card Relation

Cart Item می‌تواند از الگوی `ProductCard` استفاده کند، اما نباید الزاماً همان Component باشد.

```text
ProductCard
=
Catalog Presentation

CartItem
=
Cart Presentation
```

---

# 66. PricingCard Relation

Cart Summary می‌تواند از Pricing primitives استفاده کند، اما:

```text
PricingCard
≠
Cart Summary
```

چون Cart دارای:

```text
Subtotal
Discount
Tax
Total
```

است.

---

# 67. Order Relation

Cart هنوز Order نیست.

```text
Cart
   ↓
Checkout
   ↓
Order Draft / Order
```

Order بعد از فرآیند Checkout ایجاد یا نهایی می‌شود، طبق Architecture Commerce.

---

# 68. Payment Relation

```text
Cart
 ↓
Checkout
 ↓
Order
 ↓
Payment
```

Cart نباید Payment Gateway را بشناسد.

---

# 69. Enrollment Relation

برای Course:

```text
Payment Success
 ↓
Enrollment
 ↓
Course Access
```

Cart هیچ Enrollmentای ایجاد نمی‌کند.

---

# 70. Example Cart

```text
سبد خرید شما (۲)

┌───────────────────────────────────────────┐
│ [React]  آموزش جامع React                 │
│          علی احمدی                        │
│          ۱٬۴۹۰٬۰۰۰ تومان                  │
│          حذف                              │
└───────────────────────────────────────────┘

┌───────────────────────────────────────────┐
│ [Next]   Next.js از صفر تا پیشرفته       │
│          محمد رضایی                       │
│          ۱٬۲۹۰٬۰۰۰ تومان                  │
│          حذف                              │
└───────────────────────────────────────────┘

کد تخفیف؟
[ کد تخفیف             ] [ اعمال ]

──────────────────────────────

جمع جزء       ۲٬۷۸۰٬۰۰۰ تومان
تخفیف          -۳۰۰٬۰۰۰ تومان
قابل پرداخت   ۲٬۴۸۰٬۰۰۰ تومان

[ ادامه به پرداخت ]
```

نمونه‌های UI موجود پروژه نیز الگوی نمایش Cart با Badge تعداد و CTA «افزودن به سبد خرید» را نشان می‌دهند؛ این با معماری Commerce فوق سازگار است. 

---

# 71. Testing

## Rendering

```text
✓ Cart Header
✓ Cart Items
✓ Product Information
✓ Price
✓ Quantity
✓ Remove
✓ Summary
✓ Coupon
✓ CTA
```

## States

```text
✓ Empty
✓ Loading
✓ Updating
✓ Error
✓ Available
✓ Unavailable
✓ Already Purchased
```

## Interaction

```text
✓ Remove
✓ Quantity Update
✓ Coupon
✓ Retry
✓ Checkout
✓ Undo
```

## Responsive

```text
✓ Desktop
✓ Tablet
✓ Mobile
```

## Accessibility

```text
✓ Keyboard
✓ Screen Reader
✓ Focus
✓ Contrast
✓ RTL
```

---

# 72. Do

* Cart را بخشی از Commerce Module نگه دار.
* Cart State را از Application Layer دریافت کن.
* قیمت را Server-authoritative نگه دار.
* Product و Cart Item را جدا کن.
* Course را با Quantity ثابت پشتیبانی کن.
* Empty State داشته باش.
* Loading/Error State داشته باش.
* Coupon را Server-side اعتبارسنجی کن.
* Checkout را از Cart جدا نگه دار.
* Order را از Cart جدا نگه دار.
* Payment را از Cart جدا نگه دار.
* با WordPress Plugin Architecture سازگار باش.
* RTL و Mobile را از ابتدا پشتیبانی کن.

---

# 73. Don't

```text
✗ Cart → Payment
✗ Cart → Enrollment
✗ Cart → Database
✗ Cart → $wpdb
✗ Cart → get_post_meta()
✗ Cart → Price Calculation
✗ Cart → Coupon Validation
✗ Cart → Order Finalization
```

---

# 74. Responsibility Map

```text
Commerce
│
├── Product
│
├── Pricing
│
├── Cart
│    ├── Cart
│    ├── CartItem
│    └── CartTotals
│
├── Checkout
│
├── Order
│
└── Payment
```

UI:

```text
Product
   ↓
ProductCard
   ↓
Add To Cart
   ↓
Cart
   ↓
CartItem
   ↓
CartTotals
   ↓
Checkout
```

---

# 75. Final Architecture

```text
                    Commerce Module
                          │
                    Product / Offer
                          │
                          ↓
                     ProductCard
                          │
                    Add To Cart
                          │
                          ↓
                     Cart Service
                          │
                 ┌────────┴────────┐
                 ↓                 ↓
             Cart Items        Cart Totals
                 │                 │
                 └────────┬────────┘
                          ↓
                         Cart UI
                          │
                          ↓
                       Checkout
                          │
                          ↓
                        Order
                          │
                          ↓
                       Payment
                          │
                          ↓
                      Enrollment
```

---

# 76. Final Principle

در Iran LMS:

```text
Cart
=
Temporary Purchase State
```

نه:

```text
Cart
=
Order
```

و نه:

```text
Cart
=
Payment
```

مرزبندی نهایی:

```text
Product
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

این مرزبندی برای افزونه WordPress ما مهم است، چون باعث می‌شود **Commerce قابل توسعه باشد ولی منطق فروش، پرداخت و دسترسی آموزشی داخل UI Components مخلوط نشود**.
