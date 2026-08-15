# Pagination

**Component:** Navigation
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Pagination component enables users to navigate through large collections of data by dividing content into multiple pages.

It improves performance, readability, and navigation while preventing users from being overwhelmed by excessive information.

---

# 2. Component Type

**Category**

Navigation Component

**Role**

Page Navigation

---

# 3. Usage

The Pagination component is used for:

* Course Listings
* Student Lists
* Instructor Lists
* Reports
* Orders
* Certificates
* Notifications
* Search Results
* Transactions
* Audit Logs

Pagination should be used whenever datasets become too large to display efficiently on a single page.

---

# 4. Anatomy

A Pagination component consists of:

```text id="m8v3pk"
Previous Button

↓

Page Numbers

↓

Current Page

↓

Next Button

↓

Optional First / Last Buttons
```

The current page should always be visually distinguished.

---

# 5. Pagination Types

Supported types:

```text id="q4r7nx"
Standard Pagination

Compact Pagination

Simple Pagination

Load More

Infinite Scroll (Optional)
```

Standard Pagination is the recommended default for administrative interfaces.

---

# 6. Navigation Elements

Supported controls:

* Previous
* Next
* First
* Last
* Page Numbers
* Ellipsis (...)

Controls should appear only when appropriate.

---

# 7. Page Numbers

Recommended behavior:

* Always display the current page.
* Show nearby page numbers.
* Collapse distant pages using ellipsis.

Example:

```text id="w6t2my"
1

2

3

...

12

13

14

...

25
```

The number of visible pages should adapt to available space.

---

# 8. Active State

The active page should display:

* Active Background
* Active Border
* Active Text Color

Only one page can be active at a time.

---

# 9. Disabled State

Buttons should become disabled when unavailable.

Examples:

* Previous disabled on Page 1
* Next disabled on Final Page

Disabled controls should remain visible but non-interactive.

---

# 10. Ellipsis

Ellipsis (`...`) should appear when:

* Large page ranges exist.
* Hidden pages separate visible ranges.

Ellipsis is not interactive.

---

# 11. Page Size Selector

Optional page size controls may include:

```text id="p3k8zc"
10

25

50

100
```

Changing page size should reset the view to the first page unless configured otherwise.

---

# 12. Result Summary

Pagination may display:

```text id="n5q4ta"
Showing 21–40 of 356 results
```

Result summaries help users understand the current context.

---

# 13. Jump to Page

Optional input:

```text id="y8m6pr"
Go to Page
```

Users may directly enter a page number for faster navigation.

---

# 14. Responsive Behavior

Desktop

* Display full controls.

Tablet

* Reduce visible page numbers.

Mobile

* Previous / Current / Next
* Optional simplified controls

Pagination should remain easy to use on small screens.

---

# 15. Accessibility

The Pagination component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Each page button should include an accessible label.

---

# 16. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate controls
* Enter / Space → Activate page
* Arrow Keys (optional) → Navigate page numbers

Keyboard interaction should remain predictable.

---

# 17. Performance

Pagination should:

* Request only required data.
* Minimize unnecessary API calls.
* Preserve filters and sorting.
* Maintain scroll position when appropriate.

Efficient pagination improves overall application performance.

---

# 18. Design Tokens

Examples

```text id="u2r9kw"
pagination-size

pagination-radius

pagination-gap

pagination-active-color

pagination-border

pagination-padding
```

All visual properties should consume Design Tokens.

---

# 19. CSS Variables

Examples

```css id="f7v3qa"
--pagination-size
--pagination-radius
--pagination-gap
--pagination-active
--pagination-border
--pagination-padding
```

Implementation should remain token-driven.

---

# 20. Do

Recommended practices:

* Clearly highlight the current page.
* Keep navigation predictable.
* Preserve filters when changing pages.
* Display total result counts.
* Support keyboard navigation.

---

# 21. Don't

Avoid:

* Showing hundreds of page numbers.
* Hiding current page information.
* Resetting filters unexpectedly.
* Removing navigation history.
* Infinite scrolling for administrative tables by default.

Standard pagination is preferable for large data management interfaces.

---

# 22. Common Use Cases

Examples include:

* Courses
* Students
* Instructors
* Organizations
* Orders
* Certificates
* Reports
* Notifications
* Transactions
* Audit Logs

Pagination improves navigation across large datasets.

---

# 23. Component Properties (Props)

Typical configurable properties include:

```text id="k4n8xb"
currentPage

totalPages

pageSize

totalItems

showFirstLast

showSummary

showPageSize

showJumpToPage

disabled

responsive
```

Additional properties may be introduced while preserving backward compatibility.

---

# 24. Future Expansion

Future enhancements may include:

* AI Smart Pagination
* Predictive Page Loading
* Infinite Hybrid Navigation
* Personalized Page Size
* Workspace-Aware Pagination
* Virtualized Large Data Navigation

Future capabilities should extend the existing architecture.

---

# 25. Related Components

This component integrates with:

* Table
* Search
* Filter
* Sort
* Data Grid
* Card List
* Report Viewer

Together they provide scalable navigation for large collections of information.

---

# 26. Design Principles

The Pagination component should always remain:

* Predictable
* Accessible
* Efficient
* Responsive
* Consistent
* Performance-Oriented

Users should always understand where they are within a dataset and navigate efficiently between pages.

---

# 27. Design Decision

Iran LMS follows a **Scalable Data Navigation Architecture**.

```text id="r9m5vc"
Dataset

↓

Pagination

↓

Current Page

↓

Visible Records

↓

User Navigation
```

Pagination balances performance and usability by exposing only the information users need at any given time.

---

# 28. Strategic Vision

The Pagination component provides scalable navigation across the Iran LMS ecosystem. Whether browsing courses, managing students, reviewing reports, viewing certificates, or analyzing enterprise data, every pagination experience follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve Pagination into an intelligent data navigation system capable of supporting AI-assisted browsing, predictive preloading, adaptive page sizes, and enterprise-scale datasets while maintaining clarity, speed, and exceptional user experience.
