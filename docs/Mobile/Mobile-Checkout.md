# `Mobile-Checkout.md`

**Path:** `07-Mobile/Mobile-Checkout.md`
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Scope:** Mobile Checkout Experience
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

این فایل استاندارد تجربه **Checkout در موبایل** را برای افزونه WordPress **Iran LMS** تعریف می‌کند.

Checkout بخشی از Commerce است و وظیفه آن تبدیل سبد خرید به سفارش و هدایت کاربر به فرآیند پرداخت است.

معماری UI باید با رویکرد **WordPress-friendly** و **Modular** پروژه هماهنگ باشد. 

---

# 2. Checkout Flow

مسیر اصلی:

```text
Course
   ↓
Cart
   ↓
Checkout
   ↓
Customer Information
   ↓
Payment Method
   ↓
Order Review
   ↓
Payment
   ↓
Order Result
```

---

# 3. Plugin Boundary

Checkout متعلق به افزونه Iran LMS است:

```text
WordPress
   ↓
Iran LMS
   ↓
Commerce Module
   ↓
Checkout
```

UI نباید مستقیماً مسئول:

```text
Payment Processing
Order Creation
Price Calculation
Coupon Validation
Tax Calculation
```

باشد.

---

# 4. Commerce Integration

راهنمای UI پروژه، WooCommerce را به عنوان یکی از Integrationهای ماژولار در نظر گرفته است. 

بنابراین Checkout باید طوری طراحی شود که بتواند:

```text
Iran LMS Commerce
       │
       ├── Native Commerce
       │
       └── WooCommerce Integration
```

را پشتیبانی کند.

UI نباید به API یا UI یک Theme خاص وابسته شود.

---

# 5. Mobile Layout

ساختار پیشنهادی:

```text
┌─────────────────────────────┐
│ ← تکمیل خرید                │
├─────────────────────────────┤
│ دوره انتخاب‌شده             │
│                             │
│ اطلاعات خریدار              │
│                             │
│ روش پرداخت                  │
│                             │
│ خلاصه سفارش                 │
│                             │
│ کد تخفیف                    │
├─────────────────────────────┤
│ مجموع: ۱,۲۹۰,۰۰۰ تومان      │
│ [ پرداخت و تکمیل خرید ]     │
└─────────────────────────────┘
```

---

# 6. Checkout Header

Header:

```text
← تکمیل خرید
```

باید ساده باشد.

در Checkout نباید Navigation اصلی سایت فضای زیادی اشغال کند.

---

# 7. Step Indicator

برای Checkout چندمرحله‌ای:

```text
اطلاعات
  ●────○────○
       پرداخت  تأیید
```

در Mobile بهتر است فقط مرحله فعلی و مراحل اصلی نمایش داده شوند.

---

# 8. Checkout Models

سیستم می‌تواند یکی از این دو مدل را استفاده کند:

### Single Page

```text
Information
↓
Payment
↓
Review
```

همه در یک صفحه.

### Step-by-Step

```text
Step 1
Information

Step 2
Payment

Step 3
Confirmation
```

انتخاب مدل باید با UX و قابلیت‌های Commerce هماهنگ باشد.

---

# 9. Order Summary

در ابتدای Checkout خلاصه سفارش:

```text
خلاصه سفارش

دوره جامع React
۱ × ۱,۲۹۰,۰۰۰ تومان

جمع جزء:
۱,۲۹۰,۰۰۰ تومان

تخفیف:
۱۵۰,۰۰۰ تومان

مبلغ قابل پرداخت:
۱,۱۴۰,۰۰۰ تومان
```

---

# 10. Course/Product Item

هر محصول:

```text
┌─────────────────────────────┐
│ [Thumbnail]                 │
│ دوره جامع React             │
│ ۱ × ۱,۲۹۰,۰۰۰ تومان         │
└─────────────────────────────┘
```

در صورت وجود چند محصول، هر مورد جداگانه نمایش داده شود.

---

# 11. Customer Information

فرم اطلاعات خریدار باید حداقل شامل فیلدهای مورد نیاز Commerce باشد.

مثلاً:

```text
نام
نام خانوادگی
ایمیل
شماره موبایل
```

فیلدهای غیرضروری نباید به صورت پیش‌فرض نمایش داده شوند.

---

# 12. Logged-in User

اگر کاربر وارد حساب شده باشد:

```text
حساب کاربری

احمد پوررستمی
email@example.com

[ ویرایش اطلاعات ]
```

نباید اطلاعات را دوباره بدون نیاز درخواست کرد.

---

# 13. Guest Checkout

اگر Commerce اجازه خرید مهمان را بدهد:

```text
خرید بدون ورود
```

می‌تواند فعال باشد.

اما اگر محصول یا سایت نیازمند حساب کاربری است:

```text
برای دسترسی به دوره، ورود یا ثبت‌نام الزامی است.
```

---

# 14. Login During Checkout

برای کاربر Guest:

```text
قبلاً حساب دارید؟
[ ورود ]
```

می‌تواند نمایش داده شود.

Login نباید باعث از بین رفتن Cart یا Checkout State شود.

---

# 15. Email Validation

Email باید قبل از Submit اعتبارسنجی شود:

```text
example@email.com
```

خطا:

```text
لطفاً یک ایمیل معتبر وارد کنید.
```

---

# 16. Mobile Number

شماره موبایل در پروژه فارسی بهتر است با UI مناسب RTL نمایش داده شود.

مثلاً:

```text
شماره موبایل
[ ۰۹۱۲۱۲۳۴۵۶۷ ]
```

Validation باید توسط Application/Commerce Layer نیز انجام شود.

---

# 17. Billing Information

اگر Billing Information مورد نیاز باشد:

```text
اطلاعات صورتحساب
```

نمایش داده شود.

فیلدهای مورد نیاز باید Dynamic باشند.

---

# 18. Shipping

برای دوره‌های دیجیتال معمولاً Shipping وجود ندارد.

بنابراین در محصول دیجیتال:

```text
Shipping
= Hidden
```

باشد.

اگر Commerce در آینده محصول فیزیکی را پشتیبانی کند، Shipping می‌تواند فعال شود.

---

# 19. Coupon

بخش Coupon:

```text
کد تخفیف دارید؟

[ وارد کردن کد        ] [اعمال]
```

---

# 20. Coupon Success

```text
✓ کد تخفیف اعمال شد.

تخفیف:
۱۵۰,۰۰۰ تومان
```

---

# 21. Coupon Error

```text
کد تخفیف معتبر نیست.
```

یا:

```text
این کد تخفیف منقضی شده است.
```

پیام باید از Commerce Service دریافت شود.

---

# 22. Price Breakdown

قیمت‌ها باید واضح باشند:

```text
قیمت دوره             ۱,۲۹۰,۰۰۰
تخفیف                  -۱۵۰,۰۰۰
مالیات                  ۰
--------------------------------
مبلغ نهایی             ۱,۱۴۰,۰۰۰
```

---

# 23. Price Source

UI نباید قیمت را خودش محاسبه کند.

```text
Product Price
       ↓
Commerce
       ↓
Discount
       ↓
Tax
       ↓
Final Total
       ↓
Checkout UI
```

---

# 24. Payment Methods

روش‌های پرداخت باید Dynamic باشند.

مثلاً:

```text
روش پرداخت

◉ درگاه بانکی
○ کیف پول
○ پرداخت از اعتبار
```

اگر روش پرداختی فعال نباشد، نباید UI آن نمایش داده شود.

---

# 25. WooCommerce Gateway

در صورت استفاده از WooCommerce:

```text
Iran LMS
   ↓
WooCommerce
   ↓
Payment Gateway
```

Checkout نباید درگاه خاصی را Hard-code کند.

---

# 26. Wallet

اگر Wallet Module فعال باشد:

```text
موجودی کیف پول:
۳۵۰,۰۰۰ تومان

☐ استفاده از کیف پول
```

در صورت کافی نبودن موجودی:

```text
موجودی کیف پول برای پرداخت کامل کافی نیست.
```

Wallet یکی از Integrationهای قابل فعال‌سازی در طراحی پروژه است. 

---

# 27. Payment Amount

قبل از پرداخت باید مبلغ نهایی مشخص باشد:

```text
مبلغ قابل پرداخت

۱,۱۴۰,۰۰۰ تومان
```

و همان مبلغ باید به Payment Layer ارسال شود.

---

# 28. Order Review

قبل از پرداخت:

```text
مرور سفارش

محصول:
دوره جامع React

مبلغ:
۱,۱۴۰,۰۰۰ تومان

روش پرداخت:
درگاه بانکی
```

---

# 29. Terms & Conditions

در صورت فعال بودن قوانین:

```text
☐ قوانین و شرایط خرید را می‌پذیرم.
```

بدون پذیرش:

```text
لطفاً قوانین و شرایط را بپذیرید.
```

---

# 30. Main CTA

CTA اصلی:

```text
[ پرداخت و تکمیل خرید ]
```

باید Sticky باشد اما نباید محتوا را بپوشاند.

---

# 31. Sticky Checkout Bar

```text
┌─────────────────────────────┐
│ مبلغ نهایی                  │
│ ۱,۱۴۰,۰۰۰ تومان              │
│ [ پرداخت و تکمیل خرید ]     │
└─────────────────────────────┘
```

در Mobile این الگو برای کاهش Scroll مناسب است.

---

# 32. Submit State

هنگام ارسال:

```text
در حال ایجاد سفارش...
```

دکمه:

```text
Disabled
```

شود.

---

# 33. Double Submit Protection

کاربر نباید بتواند چند سفارش مشابه ایجاد کند:

```text
Submit
 ↓
Loading
 ↓
Disabled
 ↓
Order Created
```

---

# 34. Payment Redirect

در صورت نیاز به انتقال به درگاه:

```text
در حال انتقال به درگاه پرداخت...
```

نمایش داده شود.

---

# 35. Payment Processing

بعد از بازگشت از Gateway:

```text
Payment
↓
Verification
↓
Order Status
```

تعیین می‌شود.

UI نباید صرفاً بر اساس Redirect موفق، پرداخت را موفق فرض کند.

---

# 36. Payment Success

```text
✓ پرداخت موفق بود

شماره سفارش:
#۱۲۴۵۶

مبلغ:
۱,۱۴۰,۰۰۰ تومان
```

CTA:

```text
[ شروع یادگیری ]
```

---

# 37. Payment Failed

```text
پرداخت ناموفق بود.

مبلغی از حساب شما کسر نشد
```

یا در صورت نیاز:

```text
در صورت کسر وجه، مبلغ طبق فرآیند بازگشت وجه پیگیری خواهد شد.
```

پیام دقیق باید از Payment/Commerce Layer بیاید.

---

# 38. Payment Cancelled

```text
پرداخت لغو شد.

سفارش شما هنوز تکمیل نشده است.
```

CTA:

```text
[ بازگشت به پرداخت ]
```

---

# 39. Pending Payment

```text
پرداخت در حال بررسی است.

لطفاً چند لحظه صبر کنید.
```

Order Status باید از Server دریافت شود.

---

# 40. Order Created

پس از ایجاد سفارش:

```text
Order
   ↓
Payment
   ↓
Verification
   ↓
Enrollment
```

در صورت موفقیت خرید دوره، Enrollment باید توسط Commerce/Learning Integration ایجاد شود.

---

# 41. Enrollment Integration

Checkout نباید مستقیماً Enrollment را ایجاد کند.

```text
Payment Success
       ↓
Commerce Event
       ↓
Enrollment Service
       ↓
Course Access
```

---

# 42. Course Access

پس از خرید موفق:

```text
خرید موفق

دوره به حساب شما اضافه شد.

[ شروع یادگیری ]
```

---

# 43. Cart Preservation

اگر Checkout شکست خورد:

```text
Cart
↓
Checkout Error
↓
Cart Preserved
```

محصول نباید بدون دلیل حذف شود.

---

# 44. Validation Errors

خطاهای فرم باید نزدیک همان فیلد نمایش داده شوند:

```text
شماره موبایل
[ 0912... ]

⚠ شماره موبایل معتبر نیست.
```

---

# 45. Network Error

```text
ارتباط با سرور برقرار نشد.

اطلاعات Checkout شما حفظ شده است.

[ تلاش دوباره ]
```

---

# 46. Order Error

```text
ایجاد سفارش انجام نشد.

لطفاً دوباره تلاش کنید.
```

---

# 47. Empty Cart

اگر Cart خالی باشد:

```text
سبد خرید شما خالی است.

برای ادامه ابتدا یک دوره انتخاب کنید.

[ مشاهده دوره‌ها ]
```

کاربر نباید بتواند وارد Checkout بدون Order Item شود.

---

# 48. Expired Cart

در صورت تغییر قیمت یا اعتبار محصول:

```text
برخی از اطلاعات سفارش تغییر کرده‌اند.

لطفاً سفارش را بررسی کنید.
```

---

# 49. Price Changed

اگر قیمت تغییر کرده:

```text
قیمت این دوره تغییر کرده است.

قیمت جدید:
۱,۳۹۰,۰۰۰ تومان
```

کاربر باید قبل از پرداخت قیمت جدید را تأیید کند.

---

# 50. Out of Availability

برای محصولی که دیگر قابل خرید نیست:

```text
این محصول در حال حاضر قابل خرید نیست.
```

برای دوره‌های دیجیتال می‌تواند به دلایلی مانند:

```text
Disabled
Private
Archived
Registration Closed
```

باشد.

---

# 51. Discount Expired

```text
کد تخفیف شما منقضی شده است.
```

Total باید مجدداً از Commerce دریافت شود.

---

# 52. Security

Checkout از حساس‌ترین بخش‌های Commerce است.

Frontend نباید مسئول اعتبارسنجی نهایی:

```text
Price
Coupon
Payment
Order
Permission
```

باشد.

---

# 53. Payment Security

اطلاعات حساس پرداخت نباید در UI یا Storage سمت کاربر ذخیره شود.

```text
Payment Data
↓
Secure Payment Layer
```

---

# 54. No Direct Database Access

Componentهای UI مانند:

```text
CheckoutForm
PaymentMethod
OrderSummary
CouponField
```

نباید مستقیماً با `$wpdb` کار کنند.

---

# 55. View Model

نمونه:

```text
CheckoutViewModel
├── cart
├── customer
├── billing
├── items
├── coupon
├── discounts
├── taxes
├── paymentMethods
├── totals
├── terms
└── permissions
```

---

# 56. Order View Model

```text
OrderViewModel
├── id
├── number
├── status
├── items
├── subtotal
├── discount
├── tax
├── total
├── currency
├── paymentMethod
└── createdAt
```

---

# 57. Business Logic Boundary

UI نباید خودش تصمیم بگیرد:

```text
Can Buy?
Final Price?
Coupon Valid?
Payment Valid?
Order Valid?
Enrollment Allowed?
```

این تصمیم‌ها باید توسط Commerce/Application Layer انجام شوند.

---

# 58. Modular Architecture

از آنجا که پروژه معماری Modular دارد، Checkout باید قابلیت حذف یا غیرفعال شدن Integrationها را داشته باشد.

راهنمای اصلی پروژه نیز تأکید می‌کند که ماژول‌های غیرفعال باید بدون خراب کردن Layout از UI حذف شوند. 

مثلاً:

```text
Wallet Disabled
↓
Wallet Section Hidden
↓
Checkout Still Works
```

---

# 59. Optional Modules

در صورت فعال بودن:

```text
WooCommerce
Wallet
Coupon
Tax
Invoice
SMS
Notification
```

می‌توانند در Checkout Integration داشته باشند.

در صورت غیرفعال بودن، UI نباید Placeholder خالی ایجاد کند.

---

# 60. Invoice Integration

پس از پرداخت موفق:

```text
فاکتور
شماره:
#۱۲۴۵۶
```

و در صورت فعال بودن Invoice Module:

```text
[ مشاهده فاکتور ]
```

---

# 61. Notification Integration

پس از موفقیت:

```text
سفارش شما با موفقیت ثبت شد.
```

می‌تواند توسط Notification Module ارسال شود.

---

# 62. Mobile Keyboard

فرم Checkout باید هنگام باز شدن Keyboard رفتار مناسب داشته باشد:

```text
Input
↓
Keyboard
↓
Scroll Into View
```

CTA نباید پشت Keyboard پنهان شود.

---

# 63. RTL

Checkout به صورت RTL طراحی می‌شود.

مواردی مانند:

```text
Email
Card Number
Transaction ID
Order ID
URL
```

می‌توانند LTR باشند.

---

# 64. Dark Mode

Checkout باید Dark Mode را پشتیبانی کند:

```text
Forms
Cards
Order Summary
Payment Methods
Errors
Success
Sticky CTA
```

---

# 65. Accessibility

حداقل:

```text
☐ Semantic Forms
☐ Labels
☐ Error Association
☐ Keyboard Navigation
☐ Visible Focus
☐ Screen Reader Support
☐ Touch Targets
☐ Contrast
☐ Loading Announcements
```

---

# 66. Loading

برای عملیات مختلف Loading State جدا داشته باشیم:

```text
Calculate Total
Apply Coupon
Create Order
Redirect Payment
Verify Payment
```

---

# 67. Skeleton

Skeleton فقط زمانی استفاده شود که ساختار Checkout از Server دریافت می‌شود.

```text
████████████████
████████

████████████
████████████

████████████████
████████
```

---

# 68. Component Architecture

```text
MobileCheckout
│
├── CheckoutHeader
├── CheckoutSteps
├── CustomerInformation
├── BillingInformation
├── OrderItems
├── CouponField
├── PaymentMethods
├── TermsCheckbox
├── OrderSummary
├── CheckoutErrors
├── StickyCheckoutBar
│
└── CheckoutResult
    ├── Success
    ├── Failed
    ├── Cancelled
    └── Pending
```

---

# 69. CSS Namespace

برای جلوگیری از تداخل با Theme:

```text
.iran-lms-checkout
.iran-lms-checkout__header
.iran-lms-checkout__form
.iran-lms-checkout__items
.iran-lms-checkout__payment
.iran-lms-checkout__summary
.iran-lms-checkout__actions
```

---

# 70. Performance

Checkout باید:

```text
☐ Lightweight
☐ Minimal JS
☐ No unnecessary API calls
☐ Fast validation
☐ Optimistic UI where safe
☐ Preserve form state
```

باشد.

---

# 71. Definition of Done

```text
☐ Checkout Entry
☐ Header
☐ Step Indicator
☐ Customer Information
☐ Billing Information
☐ Order Items
☐ Price Breakdown
☐ Coupon
☐ Payment Methods
☐ Wallet Integration
☐ Terms
☐ Order Review
☐ Sticky CTA
☐ Submit Loading
☐ Double Submit Protection
☐ Payment Redirect
☐ Payment Success
☐ Payment Failed
☐ Payment Cancelled
☐ Pending Payment
☐ Empty Cart
☐ Price Changed
☐ Coupon Error
☐ Network Error
☐ Order Error
☐ Invoice Integration
☐ Enrollment Integration
☐ Notification Integration
☐ RTL
☐ Dark Mode
☐ Accessibility
☐ Keyboard Handling
☐ Theme Independence
☐ WordPress Plugin Boundary
☐ Modular Architecture
☐ Domain Logic خارج از UI
```

---

# 72. Final Principle

مسیر نهایی Checkout:

```text
Cart
 ↓
Checkout
 ↓
Review
 ↓
Create Order
 ↓
Payment
 ↓
Verify
 ↓
Order Success
 ↓
Enrollment
 ↓
Start Learning
```

اصل مهم:

> **Checkout در Iran LMS فقط یک فرم پرداخت نیست؛ یک مرز بین Commerce، Payment و Learning است. UI موبایل باید این مسیر را ساده و قابل اعتماد کند، اما قیمت، تخفیف، سفارش، پرداخت و دسترسی به دوره باید توسط لایه‌های داخلی افزونه WordPress و Integrationهای Commerce کنترل شوند.**
