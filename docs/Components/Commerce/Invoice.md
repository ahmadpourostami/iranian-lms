# Invoice.md

**Component:** Commerce / Invoice
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Module:** Commerce
**Type:** UI Component + Financial Document Surface
**Version:** 1.0
**Status:** Foundation

> این فایل برای **افزونه WordPress ایران LMS** طراحی شده است؛ بنابراین Invoice بخشی از `Commerce Module` است و نباید به Theme، WooCommerce یا یک درگاه پرداخت خاص وابسته باشد.

راهنمای رسمی UI پروژه، معماری را **Component-Based، WordPress Friendly، Modular و RTL فارسی** تعریف کرده و برای قابلیت‌هایی مثل WooCommerce، Wallet و Certificate نیز رویکرد ماژولار در نظر گرفته است. 

---

# 1. Purpose

`Invoice` سند مالی/خرید مربوط به یک `Order` است.

جریان اصلی:

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
Invoice
```

Invoice نباید جایگزین Order یا Payment باشد.

---

# 2. Core Principle

```text
Invoice
=
Financial Representation of an Order
```

یعنی Invoice باید بر اساس اطلاعات ثبت‌شده در Order ساخته شود.

نه:

```text
Invoice
=
Live Product Price
```

---

# 3. Responsibilities

Invoice مسئول نمایش:

* شماره فاکتور
* شماره سفارش
* تاریخ صدور
* وضعیت
* اطلاعات خریدار
* اطلاعات فروشنده
* اقلام سفارش
* قیمت واحد
* تخفیف
* مالیات در صورت فعال بودن
* مبلغ نهایی
* ارز
* اطلاعات پرداخت
* اطلاعات تکمیلی مالی
* امکان چاپ
* امکان دریافت PDF در صورت فعال بودن قابلیت
* وضعیت پرداخت

است.

---

# 4. Non-Responsibilities

Invoice نباید:

```text
✗ Payment را پردازش کند
✗ Order را تغییر دهد
✗ قیمت Product را دوباره محاسبه کند
✗ Coupon را Validate کند
✗ Enrollment ایجاد کند
✗ Certificate ایجاد کند
✗ مستقیماً به Database دسترسی داشته باشد
✗ به Gateway خاص وابسته باشد
```

---

# 5. Architecture

```text
                  Commerce
                     │
                  Product
                     │
                   Cart
                     │
                 Checkout
                     │
                   Order
                     │
             ┌───────┴───────┐
             ↓               ↓
          Payment         Invoice
             │               │
             ↓               ↓
        Payment Status   Financial View
```

---

# 6. Invoice vs Order

این دو نباید یکی در نظر گرفته شوند.

### Order

نماینده Transaction/Commerce Record است:

```text
Order
├── Items
├── Pricing
├── Customer
├── Status
└── Payment
```

### Invoice

نماینده سند مالی قابل ارائه به کاربر است:

```text
Invoice
├── Invoice Number
├── Order Number
├── Issued At
├── Customer
├── Seller
├── Line Items
├── Totals
└── Payment Information
```

---

# 7. Invoice Number

هر Invoice باید شناسه قابل نمایش داشته باشد.

مثلاً:

```text
INV-1405-001284
```

یا:

```text
فاکتور #1405001284
```

Invoice Number نباید صرفاً ID داخلی Database باشد.

---

# 8. Order Number

Invoice باید شماره Order مرتبط را نیز نمایش دهد:

```text
شماره فاکتور:
INV-1405-001284

شماره سفارش:
#10482
```

---

# 9. Invoice Identity

مدل پیشنهادی:

```js
{
    id: "inv_1284",
    number: "INV-1405-001284",
    orderId: "order_10482",
    status: "paid",
    issuedAt: "2026-08-04T10:30:00",
    currency: "IRR"
}
```

---

# 10. Invoice Status

Statusهای پیشنهادی:

```text
draft
issued
paid
partially_paid
unpaid
void
cancelled
refunded
```

همه این Statusها الزاماً در نسخه اول فعال نیستند.

---

# 11. Paid Invoice

برای سفارش موفق:

```text
┌─────────────────────────────────────┐
│ ✓ پرداخت شده                        │
│                                     │
│ شماره فاکتور: INV-1405-001284       │
│ شماره سفارش: #10482                 │
└─────────────────────────────────────┘
```

---

# 12. Unpaid Invoice

اگر Invoice صادر شده ولی پرداخت نشده:

```text
وضعیت:
در انتظار پرداخت
```

CTA در صورت پشتیبانی:

```text
[ پرداخت فاکتور ]
```

---

# 13. Cancelled Invoice

```text
وضعیت:
لغو شده
```

نباید CTA پرداخت فعال باشد.

---

# 14. Refunded

اگر Order به‌صورت کامل Refund شده:

```text
وضعیت:
مسترد شده
```

اطلاعات Refund می‌تواند نمایش داده شود:

```text
مبلغ پرداختی:
۱٬۴۹۰٬۰۰۰ تومان

مبلغ بازگشتی:
۱٬۴۹۰٬۰۰۰ تومان
```

---

# 15. Invoice Header

ساختار پیشنهادی:

```text
┌──────────────────────────────────────────────┐
│ ایران LMS                         فاکتور     │
│ سیستم مدیریت آموزشی                         │
│                                              │
│ شماره فاکتور: INV-1405-001284                │
│ شماره سفارش: #10482                         │
│ تاریخ صدور: ۱۴۰۵/۰۵/۱۳                       │
└──────────────────────────────────────────────┘
```

نام و Branding باید از تنظیمات سایت/Plugin دریافت شود.

---

# 16. Seller Information

اطلاعات فروشنده:

```text
ایران LMS
نام کسب‌وکار
شماره تماس
ایمیل
آدرس
شناسه مالیاتی در صورت فعال بودن
```

این اطلاعات نباید Hard-code شوند.

---

# 17. Customer Information

```text
خریدار

نام:
علی محمدی

ایمیل:
ali@example.com

شماره موبایل:
0912...
```

---

# 18. Billing Information

در صورت فعال بودن Billing:

```text
اطلاعات صورتحساب

نام:
علی محمدی

کد ملی:
***********

آدرس:
...
```

اطلاعات حساس فقط در صورت نیاز Business و با رعایت Privacy ذخیره شود.

---

# 19. Digital Course Invoice

برای Course معمولاً اطلاعاتی مانند:

```text
نام دوره
نام مدرس
Offer / Plan
تعداد
قیمت
```

کافی است.

مثال:

```text
آموزش جامع React
پلن استاندارد
۱
۱٬۴۹۰٬۰۰۰ تومان
```

---

# 20. Invoice Items

جدول:

```text
┌──────────────────────┬────┬────────────┬────────────┐
│ محصول                │تعداد│ قیمت واحد  │ مبلغ       │
├──────────────────────┼────┼────────────┼────────────┤
│ آموزش جامع React     │ ۱  │ ۱٬۴۹۰٬۰۰۰  │ ۱٬۴۹۰٬۰۰۰  │
│ Next.js پیشرفته      │ ۱  │ ۹۹۰٬۰۰۰    │ ۹۹۰٬۰۰۰    │
└──────────────────────┴────┴────────────┴────────────┘
```

---

# 21. Line Item Snapshot

Invoice نباید عنوان و قیمت فعلی Product را دوباره از Product بگیرد.

باید Snapshot داشته باشد:

```text
Invoice Item
├── Product ID
├── Product Title Snapshot
├── Offer ID
├── Offer Title Snapshot
├── Quantity
├── Unit Price
├── Discount
└── Line Total
```

این موضوع برای حفظ سابقه مالی ضروری است.

---

# 22. Price History

مثلاً اگر امروز:

```text
React Course
1,490,000
```

و ماه آینده:

```text
React Course
1,990,000
```

شود، Invoice قدیمی نباید تغییر کند.

```text
Old Invoice
=
Historical Snapshot
```

---

# 23. Subtotal

```text
جمع جزء:
۲٬۴۸۰٬۰۰۰ تومان
```

---

# 24. Discount

```text
تخفیف:
-۳۰۰٬۰۰۰ تومان
```

در صورت وجود Coupon:

```text
کد تخفیف:
WELCOME30
```

می‌تواند نمایش داده شود.

---

# 25. Tax

اگر Tax Module فعال باشد:

```text
مالیات:
۲۷۰٬۰۰۰ تومان
```

اگر فعال نباشد:

```text
Tax Row
```

نباید Layout را خراب کند.

این با معماری Modular پروژه که قابلیت‌های غیرفعال را بدون شکستن Layout حذف می‌کند، سازگار است. 

---

# 26. Final Total

```text
────────────────────────────
جمع جزء              ۲٬۴۸۰٬۰۰۰
تخفیف                 -۳۰۰٬۰۰۰
مالیات                  ۲۷۰٬۰۰۰
────────────────────────────
مبلغ نهایی            ۲٬۴۵۰٬۰۰۰
```

---

# 27. Currency

Invoice باید Currency را از Commerce Pricing دریافت کند:

```js
{
    amount: 2450000,
    currency: "IRR"
}
```

یا:

```text
۲٬۴۵۰٬۰۰۰ تومان
```

نمایش UI باید از Formatter مرکزی استفاده کند.

---

# 28. IRR vs تومان

Database بهتر است Currency Code استاندارد داشته باشد:

```text
IRR
```

و UI:

```text
تومان
```

را بر اساس Currency Formatter نمایش دهد.

---

# 29. Zero Amount

برای سفارش رایگان:

```text
مبلغ نهایی:
رایگان
```

بهتر از:

```text
۰ تومان
```

است.

---

# 30. Free Course Invoice

در صورت Business Rule:

```text
Order
 ↓
Free Checkout
 ↓
Order
 ↓
Invoice
```

Invoice می‌تواند صادر شود، اما:

```text
Payment:
رایگان / بدون پرداخت
```

باشد.

---

# 31. Payment Information

برای Invoice پرداخت‌شده:

```text
روش پرداخت:
پرداخت آنلاین

وضعیت:
پرداخت شده

تاریخ پرداخت:
۱۴۰۵/۰۵/۱۳

شناسه پرداخت:
PAY-938421
```

---

# 32. Payment Reference

شناسه پرداخت باید Reference باشد، نه اطلاعات حساس کارت.

مجاز:

```text
Transaction ID
Payment Reference
Gateway Reference
```

غیرمجاز برای Invoice:

```text
CVV
PIN
Full Card Number
```

---

# 33. Masked Card

اگر Gateway اطلاعات Masked Card را برگرداند:

```text
کارت:
**** **** **** ۴۲۱۸
```

می‌تواند نمایش داده شود.

---

# 34. Invoice Actions

Actions اصلی:

```text
[ چاپ فاکتور ]
[ دریافت PDF ]
```

و در صورت نیاز:

```text
[ اشتراک‌گذاری ]
```

---

# 35. Print

Invoice باید برای چاپ بهینه شود.

نسخه Print:

```text
بدون:
✗ Sidebar
✗ Top Navigation
✗ Footerهای غیرضروری
✗ CTAهای اپلیکیشن
```

و فقط سند مالی نمایش داده شود.

---

# 36. Print Layout

```text
┌────────────────────────────────────┐
│ Logo             Invoice           │
│                                    │
│ Seller             Customer        │
│                                    │
│ ────────────────────────────────   │
│ Items                              │
│                                    │
│ ────────────────────────────────   │
│ Totals                             │
│                                    │
│ Payment Information                │
│                                    │
│ Footer / Legal Information         │
└────────────────────────────────────┘
```

---

# 37. PDF

اگر PDF Module فعال باشد:

```text
[ دریافت PDF ]
```

نمایش داده شود.

PDF باید از همان Invoice Data تولید شود.

```text
Invoice Data
   ├── Web View
   ├── Print View
   └── PDF View
```

سه منبع متفاوت نباید برای اطلاعات مالی ایجاد شود.

---

# 38. PDF Responsibility

Component UI نباید PDF تولید کند.

```text
Invoice UI
      ↓
Invoice Service
      ↓
PDF Generator
```

---

# 39. PDF Not Available

اگر PDF Module فعال نباشد:

```text
Download PDF
```

نباید نمایش داده شود.

---

# 40. Email

در آینده:

```text
Invoice
 ↓
Email Service
 ↓
Customer
```

ممکن است Invoice به Email پیوست شود.

این قابلیت متعلق به Communication Module است، نه Invoice UI.

---

# 41. Email Relation

```text
Invoice
    │
    └── Invoice Data
            ↓
      Communication
            ↓
         Email
```

Invoice نباید مستقیماً Mail ارسال کند.

---

# 42. User Invoice List

در Dashboard:

```text
فاکتورهای من
```

می‌تواند شامل:

```text
┌──────────────────────────────────────────────┐
│ شماره       سفارش      تاریخ       مبلغ      │
├──────────────────────────────────────────────┤
│ INV-1284    #10482      امروز      1.49M     │
│ INV-1283    #10481      دیروز      990K      │
└──────────────────────────────────────────────┘
```

---

# 43. Invoice Filters

در آینده:

```text
همه
پرداخت شده
در انتظار پرداخت
لغو شده
مسترد شده
```

---

# 44. Invoice Search

Search می‌تواند بر اساس:

```text
Invoice Number
Order Number
```

باشد.

---

# 45. Invoice Detail

Route پیشنهادی:

```text
/account/invoices/{invoice}
```

یا در WordPress:

```text
my-account/invoices/{invoice}
```

مسیر نهایی باید با Routing پروژه هماهنگ شود.

---

# 46. Authorization

کاربر نباید بتواند Invoice کاربر دیگری را ببیند.

```text
Request
 ↓
Authentication
 ↓
Authorization
 ↓
Invoice Access
```

---

# 47. Admin Access

Admin/Manager در صورت Permission:

```text
Invoice
 ↓
Admin
```

می‌تواند Invoice را مشاهده کند.

Permission باید از Capability سیستم WordPress استفاده کند.

---

# 48. WordPress Capability

نباید صرفاً:

```php
is_admin()
```

برای دسترسی مالی کافی باشد.

باید Capability مناسب تعریف شود.

مثلاً:

```text
view_invoices
manage_invoices
```

نام دقیق Capability باید با Permission Architecture پروژه هماهنگ شود.

---

# 49. Database Boundary

UI نباید:

```php
$wpdb
```

را مستقیم صدا بزند.

معماری:

```text
Invoice UI
    ↓
Invoice Application Service
    ↓
Invoice Repository
    ↓
Database
```

---

# 50. WordPress Storage

Invoice می‌تواند در معماری نهایی از Storage اختصاصی Commerce استفاده کند.

برای اطلاعات مالی پیچیده، بهتر است ساختار داده مستقل و قابل Query باشد و UI مستقیماً به Post Meta وابسته نشود.

---

# 51. Invoice Immutability

پس از صدور:

```text
issued
```

اطلاعات مالی اصلی نباید بدون فرآیند رسمی تغییر کند.

```text
Issued Invoice
      ↓
Immutable Financial Snapshot
```

---

# 52. Correction

اگر اشتباهی رخ دهد، بهتر است:

```text
Original Invoice
      ↓
Void / Cancel
      ↓
Corrected Invoice
```

به‌جای اینکه Invoice قبلی silently تغییر کند.

---

# 53. Refund

Refund نباید Invoice را به‌صورت مخفی تغییر دهد.

```text
Payment
 ↓
Refund
 ↓
Invoice Status
 ↓
Refund Record
```

---

# 54. Partial Refund

اگر سیستم Partial Refund دارد:

```text
مبلغ فاکتور:
۲٬۰۰۰٬۰۰۰

مبلغ بازگشتی:
۵۰۰٬۰۰۰

مانده:
۱٬۵۰۰٬۰۰۰
```

این قابلیت باید با Order/Payment Architecture هماهنگ شود.

---

# 55. Course Refund

اگر Course Refund شود:

```text
Payment
 ↓
Refund
 ↓
Enrollment Policy
```

تغییر Enrollment باید توسط Enrollment/Commerce Business Logic انجام شود، نه Invoice UI.

---

# 56. Invoice Status Badge

نمونه:

```text
✓ پرداخت شده
```

```text
◷ در انتظار پرداخت
```

```text
× لغو شده
```

```text
↩ مسترد شده
```

از `Badge.md` استفاده شود.

---

# 57. Alert

برای وضعیت‌های مهم:

```text
فاکتور شما هنوز پرداخت نشده است.
```

از `Alert.md` استفاده شود.

---

# 58. Toast

برای Actionها:

```text
فاکتور چاپ آماده شد.
```

یا:

```text
فایل PDF آماده دریافت است.
```

از `Toast.md` استفاده شود.

---

# 59. Loading

هنگام دریافت Invoice:

```text
Invoice Skeleton
```

از `Skeleton.md` استفاده شود.

---

# 60. Error

```text
امکان دریافت فاکتور وجود ندارد.

[ تلاش مجدد ]
```

---

# 61. Not Found

اگر Invoice وجود نداشته باشد:

```text
فاکتور موردنظر پیدا نشد.
```

اگر کاربر Permission نداشته باشد، نباید وجود Invoice کاربر دیگر را افشا کند.

---

# 62. Empty State

برای لیست:

```text
هنوز فاکتوری ندارید.
```

CTA:

```text
[ مشاهده دوره‌ها ]
```

---

# 63. Mobile

در Mobile، Invoice باید به جای جدول عریض از Card/Stack استفاده کند:

```text
┌─────────────────────────────┐
│ فاکتور #INV-001284          │
│ پرداخت شده ✓                │
│                             │
│ آموزش جامع React            │
│ ۱٬۴۹۰٬۰۰۰ تومان              │
│                             │
│ جمع: ۱٬۴۹۰٬۰۰۰ تومان         │
│                             │
│ [ مشاهده ]                  │
│ [ دریافت PDF ]              │
└─────────────────────────────┘
```

---

# 64. Responsive Invoice Detail

Desktop:

```text
Header
Seller / Customer
Items Table
Totals
Payment
Actions
```

Mobile:

```text
Header
Customer
Items Cards
Totals
Payment
Actions
```

---

# 65. Accessibility

Invoice باید:

* Headingهای منطقی داشته باشد.
* Table Header واقعی داشته باشد.
* Statusها فقط با رنگ مشخص نشوند.
* Buttonها Label مناسب داشته باشند.
* Print Button Accessible باشد.
* Download Button Accessible باشد.
* Focus State داشته باشد.
* RTL صحیح باشد.

---

# 66. Screen Reader

مثلاً:

```text
وضعیت فاکتور:
پرداخت شده
```

نه فقط:

```text
🟢
```

---

# 67. Color

Status باید علاوه بر Color، Text/Icon داشته باشد:

```text
✓ پرداخت شده
```

نه صرفاً:

```text
[ سبز ]
```

---

# 68. Dark Mode

Invoice Web View:

```text
invoice-surface
invoice-card
invoice-border
invoice-text
invoice-muted
invoice-price
invoice-success
invoice-warning
invoice-danger
```

اما Print/PDF باید از Theme Dark مستقل باشد و خروجی خوانا داشته باشد.

---

# 69. Typography

Invoice باید از Typography مرکزی پروژه استفاده کند.

راهنمای UI پروژه برای Persian UI استفاده از فونت‌هایی مانند Vazirmatn/Estedad را در نظر گرفته است. 

برای Print/PDF نیز Font باید به شکلی انتخاب شود که نمایش فارسی را بدون مشکل تضمین کند.

---

# 70. Invoice Component Composition

```text
Invoice
│
├── InvoiceHeader
├── InvoiceMeta
├── SellerInfo
├── CustomerInfo
├── InvoiceItems
├── InvoiceTotals
├── PaymentInfo
├── InvoiceStatus
├── InvoiceActions
└── InvoiceFooter
```

---

# 71. Reusable Components

Invoice باید از Components موجود استفاده کند:

```text
Card
Badge
Button
Table
Divider
Icon
Alert
Toast
Skeleton
EmptyState
```

نه اینکه برای هرکدام Component اختصاصی تکراری ایجاد کند.

---

# 72. API Boundary

نمونه:

```text
GET /invoices
GET /invoices/{id}
GET /invoices/{id}/pdf
```

در صورت پشتیبانی:

```text
POST /invoices/{id}/send
```

Endpointهای نهایی باید با استانداردهای API پروژه هماهنگ شوند.

---

# 73. Invoice API Response

نمونه:

```json
{
  "id": "inv_1284",
  "number": "INV-1405-001284",
  "order_id": "10482",
  "status": "paid",
  "issued_at": "2026-08-04T10:30:00",
  "currency": "IRR",
  "items": [],
  "totals": {},
  "payment": {}
}
```

---

# 74. API Security

Endpoint:

```text
GET /invoices/{id}
```

باید Authorization داشته باشد.

نباید صرفاً داشتن Invoice ID برای دسترسی کافی باشد.

---

# 75. Caching

Invoice Data بعد از صدور می‌تواند Cache شود، اما اطلاعات حساس و Authorization باید همچنان رعایت شود.

PDF نیز می‌تواند Cache شود، به شرطی که دسترسی به فایل کنترل شده باشد.

---

# 76. Download Security

نباید:

```text
/invoices/1284.pdf
```

به شکلی باشد که با تغییر ID بتوان Invoice شخص دیگری را دریافت کرد.

---

# 77. Invoice URL

بهتر است URL عمومی و قابل حدس نباشد یا حداقل Authorization قوی داشته باشد.

---

# 78. Legal Footer

در صورت نیاز Business:

```text
این فاکتور به صورت الکترونیکی صادر شده است.
```

یا:

```text
این سند توسط سیستم مدیریت آموزشی ایران LMS تولید شده است.
```

متن حقوقی واقعی باید از تنظیمات/Policy سیستم دریافت شود، نه Hard-code.

---

# 79. Seller Branding

Logo:

```text
ایران LMS
```

نباید در Component ثابت باشد.

```js
{
    logo: "...",
    businessName: "...",
    contact: "..."
}
```

---

# 80. Module Independence

اگر قابلیت‌های زیر خاموش باشند:

```text
Wallet
Tax
WooCommerce Integration
PDF
Email
Refund
```

Invoice باید همچنان قابل استفاده باشد.

راهنمای UI صراحتاً Modular Features را بخشی از معماری می‌داند و می‌گوید قابلیت‌های غیرفعال نباید Layout را خراب کنند. 

---

# 81. WooCommerce Integration

Invoice نباید ذاتاً WooCommerce Invoice باشد.

اگر Integration اضافه شود:

```text
Iran LMS Commerce
       ↓
WooCommerce Adapter
       ↓
External Order / Payment
```

اما Component:

```text
Invoice UI
```

باید همچنان مستقل بماند.

---

# 82. Order Integration

Invoice باید Order را Reference کند:

```text
Invoice
  └── orderId
```

اما اطلاعات Snapshot خود را نگه دارد.

---

# 83. Payment Integration

```text
Invoice
   └── paymentReference
```

نه:

```text
Invoice
   └── Gateway Object
```

---

# 84. Enrollment Integration

Invoice صرفاً نشان می‌دهد بابت چه چیزی خرید انجام شده است.

```text
Invoice
   ↓
Order
   ↓
Payment
   ↓
Enrollment
```

Enrollment در Invoice Component وجود ندارد.

---

# 85. Example

```text
╔════════════════════════════════════════════════════╗
║                    ایران LMS                       ║
║               سیستم مدیریت آموزشی                 ║
║                                                    ║
║ فاکتور: INV-1405-001284       سفارش: #10482       ║
║ تاریخ صدور: ۱۴۰۵/۰۵/۱۳                            ║
╠════════════════════════════════════════════════════╣
║ فروشنده                    خریدار                  ║
║ ایران LMS                  علی محمدی               ║
║ support@example.com        ali@example.com         ║
╠════════════════════════════════════════════════════╣
║ محصول                  تعداد   قیمت       مبلغ     ║
║ آموزش جامع React         ۱    1,490,000  1,490,000 ║
║ Next.js پیشرفته           ۱      990,000    990,000 ║
╠════════════════════════════════════════════════════╣
║ جمع جزء                                  2,480,000 ║
║ تخفیف                                     -300,000 ║
║ مالیات                                      0      ║
║ ─────────────────────────────────────────────────  ║
║ مبلغ نهایی                               2,180,000 ║
╠════════════════════════════════════════════════════╣
║ وضعیت: ✓ پرداخت شده                               ║
║ روش پرداخت: پرداخت آنلاین                         ║
║ شناسه پرداخت: PAY-938421                          ║
╠════════════════════════════════════════════════════╣
║ [ چاپ فاکتور ]          [ دریافت PDF ]             ║
╚════════════════════════════════════════════════════╝
```

---

# 86. Testing

### Invoice

```text
✓ Invoice Number
✓ Order Number
✓ Issue Date
✓ Status
✓ Seller
✓ Customer
✓ Items
✓ Totals
✓ Payment
```

### Pricing

```text
✓ Subtotal
✓ Discount
✓ Tax
✓ Total
✓ Currency
✓ Free Order
```

### Status

```text
✓ Draft
✓ Issued
✓ Paid
✓ Unpaid
✓ Cancelled
✓ Refunded
```

### Security

```text
✓ Authorization
✓ User Ownership
✓ Admin Permission
✓ Secure PDF
✓ No Sensitive Payment Data
```

### Responsive

```text
✓ Desktop
✓ Tablet
✓ Mobile
✓ Print
```

### Accessibility

```text
✓ Keyboard
✓ Screen Reader
✓ Contrast
✓ Status Text
✓ Focus
✓ RTL
```

---

# 87. Do

* Invoice را زیر Commerce نگه دار.
* Invoice را به Order متصل کن.
* قیمت‌ها را Snapshot کن.
* Invoice صادرشده را Immutable در نظر بگیر.
* Payment Reference را نگه دار.
* اطلاعات حساس کارت را ذخیره نکن.
* PDF را از Invoice Data تولید کن.
* Print View مستقل داشته باش.
* Authorization جدی داشته باش.
* با WordPress Capabilityها کار کن.
* WooCommerce را Dependency اجباری نکن.
* Tax/Wallet/PDF/Email را Modular نگه دار.
* RTL و Mobile را از ابتدا پشتیبانی کن.

---

# 88. Don't

```text
✗ Invoice → $wpdb
✗ Invoice → get_post_meta()
✗ Invoice → Live Product Price
✗ Invoice → Payment Gateway مستقیم
✗ Invoice → Enrollment
✗ Invoice → Certificate
✗ Invoice → ذخیره CVV
✗ Invoice → ذخیره PIN
✗ Invoice → Full Card Number
✗ Invoice → تغییر مخفی Invoice صادرشده
✗ Invoice → وابستگی اجباری به WooCommerce
```

---

# 89. Responsibility Map

```text
Commerce
│
├── Product
├── Pricing
├── Cart
├── Checkout
├── Order
│
├── Payment
│
└── Invoice
     │
     ├── Invoice Number
     ├── Order Reference
     ├── Customer
     ├── Seller
     ├── Items Snapshot
     ├── Totals Snapshot
     ├── Payment Reference
     ├── Print
     └── PDF
```

---

# 90. Final Architecture

```text
                     Product
                        │
                        ↓
                       Cart
                        │
                        ↓
                    Checkout
                        │
                        ↓
                      Order
                    ↙       ↘
              Payment       Invoice
                 │             │
                 ↓             ↓
          Payment Status   Financial Record
                 │
                 ↓
             Enrollment
                 │
                 ↓
            Course Access
```

---

# 91. Final Principle

در Iran LMS:

```text
Order
=
Commerce Record
```

```text
Payment
=
Money Movement
```

```text
Invoice
=
Financial Document
```

و:

```text
Invoice
≠
Order

Invoice
≠
Payment

Invoice
≠
Enrollment
```

بنابراین مرزبندی نهایی Commerce ما:

```text
Product
   ↓
Cart
   ↓
Checkout
   ↓
Order
   ├── Payment
   └── Invoice
         ↓
      Print / PDF
```

این ساختار با رویکرد **Modular + WordPress-Friendly + Component-Based + RTL** پروژه هماهنگ است و اجازه می‌دهد در آینده قابلیت‌هایی مثل Wallet، Tax، PDF، Email و WooCommerce Integration بدون وابسته‌کردن هسته Invoice به آن‌ها اضافه یا حذف شوند. 
