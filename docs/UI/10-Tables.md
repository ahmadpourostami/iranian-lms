# Tables

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Table System used throughout the Iran LMS platform.

Tables present structured datasets in a consistent, accessible, and scalable manner.

Every module displaying tabular information should use the shared Table System.

---

# 2. Goals

The Table System should be:

* Consistent
* Responsive
* Accessible
* Scalable
* Performant
* Easy to Scan

Tables should help users analyze data efficiently.

---

# 3. Design Philosophy

Tables are designed for data exploration and management.

Users should quickly understand:

* What the data represents
* What actions are available
* How to sort, search, and filter the data

Information density should never reduce readability.

---

# 4. Table Architecture

The Table System consists of several layers.

```text id="u2w9hd"
Table

↓

Header

↓

Rows

↓

Cells

↓

Actions

↓

Pagination
```

Each layer has a clearly defined responsibility.

---

# 5. Table Types

Supported table types

```text id="7t5brn"
Simple Table

Data Table

Selectable Table

Expandable Table

Grouped Table

Tree Table
```

Each type extends the same foundation.

---

# 6. Header

The header defines the structure of the dataset.

Headers may include:

* Column Title
* Sort Indicator
* Filter
* Tooltip
* Select All Checkbox

Headers should remain visible while scrolling when appropriate.

---

# 7. Rows

Each row represents a single business entity.

Examples include:

* Course
* Student
* Instructor
* Quiz
* Order
* Certificate
* Organization

Rows should maintain consistent height.

---

# 8. Cells

Cells display structured information.

Typical content includes:

* Text
* Number
* Badge
* Avatar
* Status
* Progress Bar
* Icon
* Button
* Link

Cell content should remain concise.

---

# 9. Actions Column

Common row actions include:

* View
* Edit
* Delete
* Duplicate
* Publish
* Archive
* Export

Destructive actions should require confirmation.

---

# 10. Sorting

Supported sorting

* Ascending
* Descending
* Multi-column (Future)

Users should always know which column is currently sorted.

---

# 11. Filtering

Tables may support:

* Text Filters
* Category Filters
* Status Filters
* Date Filters
* Instructor Filters
* Price Filters

Filtering behavior should remain consistent across modules.

---

# 12. Search

Large datasets should provide:

* Instant Search
* Keyword Search
* Highlighted Matches

Search should integrate naturally with filtering.

---

# 13. Selection

Selectable tables support:

* Single Selection
* Multiple Selection
* Select All

Bulk actions become available after selection.

---

# 14. Bulk Actions

Examples

* Delete
* Publish
* Archive
* Assign
* Export
* Change Status

Bulk actions should clearly indicate the number of selected items.

---

# 15. Pagination

Large datasets should support pagination.

Pagination behavior follows the Pagination Design Standard.

The current page should always remain visible.

---

# 16. Empty State

When no records exist, the table should display:

* Clear Explanation
* Suggested Next Action
* Optional Create Button

Empty tables should never appear broken.

---

# 17. Loading State

During loading, tables should display:

* Skeleton Rows
* Placeholder Cells
* Stable Layout

Layout shifts should be avoided.

---

# 18. Responsive Behavior

Tables adapt across:

* Desktop
* Tablet
* Mobile

On smaller screens, strategies may include:

* Horizontal Scrolling
* Column Prioritization
* Card Transformation
* Expandable Rows

Critical information should remain accessible.

---

# 19. Accessibility

Tables must support:

* Keyboard Navigation
* Screen Readers
* Focus Indicators
* Accessible Headers
* Row Selection Announcements

Tables should comply with WCAG 2.2 AA.

---

# 20. Performance

Large datasets should support:

* Virtual Scrolling
* Lazy Loading
* Server-side Pagination
* Server-side Sorting
* Server-side Filtering

Performance should remain stable with large datasets.

---

# 21. Design Tokens

Examples

```text id="ow9vxp"
table-row-height

table-header-height

table-cell-padding

table-border

table-radius

table-hover-color
```

Tables should consume shared design tokens.

---

# 22. CSS Variables

Examples

```css id="b6yl5m"
--table-row-height
--table-header-height
--table-cell-padding
--table-border
--table-hover-background
--table-radius
```

Implementation should avoid hardcoded values.

---

# 23. Reusable Components

Tables should reuse existing components such as:

* Button
* Badge
* Avatar
* Checkbox
* Dropdown
* Tooltip
* Progress Bar
* Status Chip

Tables should compose components rather than recreate them.

---

# 24. Future Expansion

The Table System supports:

* Infinite Scrolling
* AI-powered Search
* Saved Views
* Custom Columns
* User-defined Layouts
* Mobile Applications

Future enhancements should preserve the existing interaction model.

---

# 25. Design Principles

Tables should always remain:

* Readable
* Predictable
* Accessible
* Responsive
* Data-Oriented
* Efficient

Users should focus on understanding data—not learning how the table works.

---

# 26. Design Decision

Iran LMS follows a **Data Table Architecture**.

```text id="fj0w1s"
Dataset

↓

Table

↓

Rows

↓

Cells

↓

Reusable Components

↓

User Actions
```

Business modules provide data, while the Table System controls presentation and interaction.

---

# 27. Strategic Vision

The Table System provides a unified foundation for presenting structured data across the Iran LMS ecosystem.

Whether managing courses, enrollments, assessments, certificates, commerce, organizations, or reports, every table follows the same visual language and interaction model.

This consistency enables users to work efficiently with large datasets while reducing development complexity and ensuring a scalable, enterprise-ready user experience.
