# 07-Commerce-API.md

# Commerce API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

The Commerce API provides all endpoints required to manage commercial operations within Iran LMS.

It is responsible for:

* Orders
* Checkout
* Payments
* Wallet
* Coupons
* Discounts
* Subscriptions
* Memberships
* Refunds
* Invoices

The Commerce API is independent of any specific payment gateway or e-commerce plugin.

---

# 2. Base Endpoint

```text
/api/v1/commerce
```

---

# 3. Resources

The Commerce API manages:

* Orders
* Order Items
* Checkout
* Payments
* Wallet
* Wallet Transactions
* Coupons
* Discount Rules
* Subscriptions
* Memberships
* Refunds
* Invoices

---

# 4. Authentication

All endpoints require authentication unless explicitly stated otherwise.

```text
Bearer Token
```

---

# 5. Permissions

Examples

```text
commerce.view

commerce.checkout

commerce.payment

commerce.wallet

commerce.refund

commerce.manage
```

---

# 6. Checkout

## Create Checkout

```http
POST /commerce/checkout
```

Example Request

```json
{
    "items": [
        {
            "course_uuid": "..."
        }
    ],
    "coupon": "SUMMER2026"
}
```

Response

```json
{
    "success": true,
    "data": {
        "checkout_uuid": "...",
        "total": 120,
        "currency": "IRT"
    }
}
```

Event

```text
CheckoutCreated
```

---

# 7. Orders

## List Orders

```http
GET /commerce/orders
```

Returns paginated orders.

---

## Get Order

```http
GET /commerce/orders/{uuid}
```

---

## Create Order

```http
POST /commerce/orders
```

Creates a pending order.

Event

```text
OrderCreated
```

---

## Cancel Order

```http
POST /commerce/orders/{uuid}/cancel
```

Event

```text
OrderCancelled
```

---

# 8. Payments

## Payment Gateways

```http
GET /commerce/gateways
```

Returns enabled payment gateways.

---

## Create Payment

```http
POST /commerce/payments
```

Example

```json
{
    "order_uuid": "...",
    "gateway": "zarinpal"
}
```

---

## Payment Callback

```http
POST /commerce/payments/callback
```

This endpoint is called by payment gateway adapters.

Event

```text
PaymentSucceeded

PaymentFailed
```

---

# 9. Wallet

## Wallet Balance

```http
GET /commerce/wallet
```

---

## Wallet Transactions

```http
GET /commerce/wallet/transactions
```

---

## Deposit

```http
POST /commerce/wallet/deposit
```

---

## Withdraw

```http
POST /commerce/wallet/withdraw
```

Wallet operations are transactional.

---

# 10. Coupons

## Validate Coupon

```http
POST /commerce/coupons/validate
```

---

## Apply Coupon

```http
POST /commerce/coupons/apply
```

---

## Remove Coupon

```http
DELETE /commerce/coupons/{code}
```

---

# 11. Subscriptions

## List Plans

```http
GET /commerce/subscriptions/plans
```

---

## Subscribe

```http
POST /commerce/subscriptions
```

---

## Cancel Subscription

```http
POST /commerce/subscriptions/{uuid}/cancel
```

---

## Subscription Status

```http
GET /commerce/subscriptions/{uuid}
```

---

# 12. Memberships

```http
GET /commerce/memberships

POST /commerce/memberships
```

---

# 13. Refunds

## Create Refund

```http
POST /commerce/refunds
```

Example

```json
{
    "order_uuid": "...",
    "reason": "Duplicate purchase"
}
```

Event

```text
RefundRequested
```

---

## Refund Status

```http
GET /commerce/refunds/{uuid}
```

---

# 14. Invoices

## List Invoices

```http
GET /commerce/invoices
```

---

## Download Invoice

```http
GET /commerce/invoices/{uuid}/download
```

---

# 15. Filtering

Supported filters

```text
status

gateway

payment_status

subscription

created_at

currency
```

---

# 16. Sorting

Supported

```text
created_at

updated_at

total

status
```

---

# 17. Business Rules

Examples

Only paid orders create enrollments.

Coupons are validated before checkout.

Wallet balance cannot become negative unless explicitly allowed.

Refunds follow configurable business policies.

Each payment callback must be idempotent.

Invoices remain immutable after issuance.

---

# 18. Events

```text
CheckoutCreated

OrderCreated

OrderCancelled

PaymentSucceeded

PaymentFailed

WalletCharged

WalletDebited

CouponApplied

SubscriptionActivated

SubscriptionCancelled

RefundRequested

RefundCompleted

InvoiceIssued
```

---

# 19. Error Codes

Examples

```text
ORDER_NOT_FOUND

PAYMENT_FAILED

INVALID_COUPON

INSUFFICIENT_WALLET_BALANCE

SUBSCRIPTION_NOT_FOUND

REFUND_NOT_ALLOWED

INVOICE_NOT_FOUND
```

---

# 20. Performance Notes

The Commerce API should:

* Use transactional database operations.
* Prevent duplicate payments.
* Queue invoice generation.
* Cache pricing rules.
* Optimize checkout calculations.
* Guarantee idempotent payment callbacks.

Financial operations must always prioritize consistency over speed.

---

# 21. Mobile Considerations

Mobile applications should support:

* Native checkout
* Wallet management
* Purchase history
* Subscription management
* Invoice download
* Coupon redemption

The same endpoints must be shared across web and mobile clients.

---

# 22. Future Expansion

The Commerce API is designed to support:

* Installment Payments
* Multi-currency
* Gift Cards
* Store Credit
* Affiliate Programs
* Instructor Revenue Sharing
* Corporate Billing
* Organization Licenses
* Tax Calculation Engine
* Marketplace Payments

These capabilities should integrate without breaking existing API contracts.
