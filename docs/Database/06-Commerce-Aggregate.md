# 06-Commerce-Aggregate.md

# Commerce Aggregate

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Commerce Aggregate is responsible for monetizing educational content.

It manages pricing, purchases, subscriptions, wallets, discounts, invoices, and commercial transactions.

Commerce is independent from any specific payment provider or e-commerce plugin.

WooCommerce is considered an integration layer, not part of the business logic.

---

# 2. Responsibilities

The Commerce Aggregate is responsible for:

* Product Pricing
* Orders
* Wallet
* Coupons
* Discounts
* Subscription Plans
* Memberships
* Refunds
* Invoices
* Payment Tracking
* Commercial Analytics

---

# 3. Aggregate Root

```text
Order
```

Every commercial operation begins with an Order.

Payments are attached to Orders.

Enrollments are created only after successful payment or another valid access source.

---

# 4. Entities

```text
Order

OrderItem

Invoice

Payment

Wallet

WalletTransaction

Coupon

DiscountRule

Subscription

Membership

Refund

Gateway

CommerceSettings
```

---

# 5. Relationships

```text
Student

│

Order

├── Order Items

├── Payments

├── Invoice

├── Refund

└── Enrollment
```

Commerce never grants learning access directly.

Successful commerce operations trigger Enrollment events.

---

# 6. Purchase Types

Supported purchase models:

* One-Time Purchase
* Free
* Subscription
* Membership
* Bundle
* Gift Purchase
* Corporate License
* Organization License

Future models should require no architectural changes.

---

# 7. Order Lifecycle

```text
Draft

↓

Pending Payment

↓

Paid

↓

Completed

↓

Refunded

↓

Cancelled
```

Future states:

* Failed
* Expired
* Partially Refunded

---

# 8. Database Tables

```text
ilms_orders

ilms_order_items

ilms_payments

ilms_invoices

ilms_wallets

ilms_wallet_transactions

ilms_coupons

ilms_discount_rules

ilms_subscriptions

ilms_memberships

ilms_refunds

ilms_gateways
```

---

# 9. Order Entity

Core fields:

```text
ID

UUID

Student ID

Status

Currency

Subtotal

Discount

Tax

Total

Gateway

Invoice ID

Created At

Updated At
```

---

# 10. Wallet

The Wallet module supports:

* Deposit
* Withdrawal
* Purchase
* Refund
* Bonus Credits
* Cashback
* Manual Adjustment

Wallet balance is derived from immutable transactions.

---

# 11. Payment Gateways

Supported gateways:

* WooCommerce
* ZarinPal
* NextPay
* IDPay
* Stripe
* PayPal

Future gateways should be added through adapters.

---

# 12. Coupons

Supported coupon types:

* Fixed Amount
* Percentage
* Free Course
* Bundle Discount
* Category Discount

Coupon rules may include:

* Expiration Date
* Usage Limit
* Student Limit
* Minimum Order
* Maximum Discount

---

# 13. Subscription

Subscription supports:

* Monthly
* Quarterly
* Yearly
* Unlimited

Subscriptions may grant access to:

* Individual Courses
* Categories
* Learning Paths
* Entire Platform

---

# 14. Refunds

Supported refund types:

* Full Refund
* Partial Refund
* Wallet Refund
* Gateway Refund

Refund processing should be auditable.

---

# 15. Business Rules

Examples:

Paid orders create enrollments.

Cancelled orders never grant access.

Refunded orders may revoke access according to policy.

Wallet transactions are immutable.

Invoices remain permanently available.

Coupons are validated before payment.

---

# 16. Events

```text
OrderCreated

OrderPaid

OrderCompleted

OrderCancelled

PaymentSucceeded

PaymentFailed

WalletCharged

WalletDebited

RefundIssued

CouponApplied

SubscriptionActivated

SubscriptionExpired
```

Other aggregates subscribe to these events.

---

# 17. API Ownership

```text
GET /orders

GET /orders/{id}

POST /checkout

POST /payments

POST /wallet/deposit

POST /wallet/withdraw

POST /coupons/apply

POST /refunds

GET /subscriptions
```

---

# 18. Permissions

Permissions include:

* Manage Orders
* View Orders
* Manage Wallet
* Manage Coupons
* Manage Payments
* Issue Refund
* Configure Gateways
* View Commerce Reports

---

# 19. Performance Strategy

Commerce operations should:

* Use transactional database operations.
* Prevent duplicate payments.
* Queue invoice generation.
* Cache pricing rules.
* Optimize checkout queries.
* Support idempotent payment callbacks.

---

# 20. Mobile Considerations

Mobile applications should support:

* Native Checkout
* Wallet Management
* Purchase History
* Subscription Management
* Invoice Download
* Coupon Redemption

The same commerce APIs must be shared across web and mobile clients.

---

# 21. Integration Points

The Commerce Aggregate integrates with:

* Course Aggregate
* Enrollment Aggregate
* Notification Aggregate
* Certificate Aggregate
* Reporting Aggregate

Commerce never modifies other aggregates directly.

Communication occurs through events and application services.

---

# 22. Future Expansion

Potential future capabilities:

* Installment Payments
* Corporate Billing
* Affiliate System
* Marketplace Revenue Sharing
* Instructor Commissions
* Tax Management
* Multi-currency Support
* Store Credit
* Gift Cards
* Promotional Campaign Engine

---

# 23. Design Principles

The Commerce Aggregate must remain:

* Financially Accurate
* Auditable
* Extensible
* Gateway Independent
* Event-driven
* API-first
* Secure
* Backward Compatible

Commercial logic must never depend on a specific payment provider or e-commerce plugin.
