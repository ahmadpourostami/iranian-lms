# 09-Commerce.md

# Commerce Module

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Commerce module manages all financial operations within Iran LMS.

It is responsible for product purchases, orders, payments, invoices, subscriptions, wallets, discounts, coupons, refunds, and financial reporting.

The module acts as the financial engine of the platform.

It never manages educational content or learning progress.

---

# 2. Responsibilities

The Commerce module is responsible for:

* Orders
* Payments
* Transactions
* Wallet
* Invoices
* Coupons
* Discounts
* Taxes
* Refunds
* Subscriptions
* Payment Gateways
* Financial Reports

---

# 3. Business Boundaries

The Commerce module owns:

* Orders
* Payments
* Wallet
* Coupons
* Refunds
* Transactions
* Invoices
* Subscription Records

The module does **not** own:

* Courses
* Enrollments
* Certificates
* Learning Progress

Successful purchases trigger enrollment through domain events.

---

# 4. Commerce Aggregate

```text
Commerce
│
├── Orders
├── Payments
├── Wallet
├── Transactions
├── Coupons
├── Discounts
├── Refunds
├── Invoices
└── Subscriptions
```

---

# 5. Order Lifecycle

```text
Created

↓

Pending Payment

↓

Paid

↓

Completed

↓

Cancelled

↓

Refunded
```

Every state transition publishes a domain event.

---

# 6. Order Entity

Each order includes:

* UUID
* Order Number
* Customer UUID
* Status
* Currency
* Total Price
* Discount Amount
* Tax Amount
* Final Amount
* Payment Status
* Created At
* Updated At

---

# 7. Products

Commerce does not own products.

Products are provided by other modules.

Examples

```text
Course

Bundle

Subscription

License

Future Digital Products
```

Products expose a common pricing contract.

---

# 8. Payments

Supported payment methods

```text
Online Gateway

Wallet

Bank Transfer

Manual Payment

Coupon

Gift Code (Future)
```

Payment providers remain replaceable.

---

# 9. Transactions

Every financial action creates a transaction.

Examples

* Payment
* Refund
* Wallet Deposit
* Wallet Withdrawal
* Subscription Renewal

Transactions are immutable.

---

# 10. Wallet

Wallet capabilities

* Deposit
* Withdrawal
* Internal Transfer
* Purchase
* Refund Credit

Wallet balance is derived from transactions.

---

# 11. Coupons

Coupons may support:

* Percentage Discount
* Fixed Amount
* Expiration Date
* Usage Limit
* User Limit
* Product Restriction

Coupon validation occurs before payment.

---

# 12. Discounts

Supported discounts

```text
Campaign

Seasonal

Instructor

Bundle

Subscription

Flash Sale
```

Discount rules remain configurable.

---

# 13. Taxes

Supported tax strategies

* Inclusive
* Exclusive
* Country Based
* Organization Based

Tax calculations should be configurable.

---

# 14. Refunds

Refund workflow

```text
Refund Requested

↓

Approved

↓

Processed

↓

Completed
```

Refunds generate financial transactions.

---

# 15. Subscriptions

Supported subscription types

* Monthly
* Yearly
* Lifetime

Subscriptions may automatically create enrollments.

---

# 16. Invoices

Invoices include:

* Invoice Number
* Customer
* Products
* Tax
* Discounts
* Payment Details
* Status

Invoices are immutable after issuance.

---

# 17. Payment Gateways

Supported gateways

```text
Stripe

PayPal

ZarinPal

IDPay

NextPay

Custom Gateway
```

All gateways implement a common payment interface.

---

# 18. Events

Published events

```text
OrderCreated

PaymentSucceeded

PaymentFailed

RefundCompleted

WalletCharged

CouponApplied

SubscriptionRenewed
```

Other modules consume these events.

---

# 19. Validation

Examples

```text
PAYMENT_FAILED

ORDER_NOT_FOUND

COUPON_INVALID

INSUFFICIENT_WALLET_BALANCE

REFUND_NOT_ALLOWED
```

Errors follow the global API specification.

---

# 20. Performance

The Commerce module should:

* Queue payment callbacks
* Cache pricing rules
* Optimize order queries
* Minimize gateway latency

Financial integrity takes priority over speed.

---

# 21. Mobile Considerations

Mobile applications should support:

* Secure Payments
* Wallet Management
* Purchase History
* Invoice Download
* Subscription Renewal

Sensitive payment information must never be stored on the device.

---

# 22. Future Expansion

The module supports:

* Marketplace
* Revenue Sharing
* Affiliate System
* Gift Cards
* Installment Payments
* Organization Billing
* Multi-Currency
* Crypto Payments

Future features should integrate without redesigning the financial model.

---

# 23. Internal Components

```text
Commerce
│
├── Order Manager
├── Payment Manager
├── Gateway Manager
├── Wallet Manager
├── Transaction Manager
├── Coupon Manager
├── Discount Engine
├── Refund Manager
├── Invoice Manager
├── Subscription Manager
└── Commerce API
```

Each component has a single responsibility.

---

# 24. Module Dependencies

The Commerce module depends on:

```text
Core

Users
```

Optional integrations

```text
Courses

Enrollments

Notifications
```

Commerce never directly grants access to courses.

Instead, it publishes events consumed by the Enrollments module.

---

# 25. Ownership Boundaries

| Data        | Owner Module |
| ----------- | ------------ |
| Course      | Courses      |
| User        | Users        |
| Enrollment  | Enrollments  |
| Order       | Commerce     |
| Payment     | Commerce     |
| Wallet      | Commerce     |
| Transaction | Commerce     |

Financial records belong exclusively to the Commerce module.

---

# 26. Commerce Workflow

```text
Customer Creates Order

↓

Payment Started

↓

Payment Verified

↓

Payment Succeeded

↓

EnrollmentCreated Event

↓

Enrollment Module Grants Access
```

Commerce does not interact directly with the Learning module.

---

# 27. Financial Integrity

The Commerce module must guarantee:

* Immutable Transactions
* Accurate Accounting
* Atomic Payments
* Auditability
* Duplicate Payment Protection
* Gateway Callback Verification

Every financial operation must be traceable.

---

# 28. Design Principles

The Commerce module must remain:

* Financially Accurate
* Event-Driven
* Auditable
* Extensible
* Secure
* Gateway Independent
* Backward Compatible

The module is responsible for **money**, while other modules are responsible for **education**.

---

# 29. Revenue Reports

Commerce produces financial reports such as:

* Daily Revenue
* Monthly Revenue
* Product Sales
* Refund Statistics
* Gateway Performance
* Wallet Activity
* Subscription Revenue

Reports are generated from immutable transaction records.

---

# 30. Design Decision

The Commerce module is intentionally designed as a **generic financial platform**, not a course-selling module.

It has no knowledge of educational business rules.

Instead, it processes financial events and publishes business events such as:

```text
PaymentSucceeded

↓

OrderCompleted

↓

EnrollmentCreated (handled by Enrollments)
```

This architecture allows the same financial engine to support future products including themes, plugins, digital assets, subscriptions, marketplace items, and enterprise licensing without requiring structural changes.
