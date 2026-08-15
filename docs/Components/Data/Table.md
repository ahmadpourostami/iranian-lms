# Table

**Component:** Data Display
**Version:** 1.0
**Status:** Stable

---

# 1. Purpose

The Table component displays structured datasets in rows and columns, allowing users to efficiently browse, compare, filter, sort, and manage large amounts of information.

Tables are the primary component for administrative interfaces throughout the Iran LMS ecosystem.

---

# 2. Component Type

**Category**

Data Display Component

**Role**

Structured Data Presentation

---

# 3. Usage

The Table component is used for:

* Students
* Instructors
* Courses
* Lessons
* Organizations
* Orders
* Payments
* Certificates
* Reports
* Logs
* API Keys
* Notifications
* Media Library
* Quiz Results

Tables should be used whenever users need to scan or manipulate structured data.

---

# 4. Anatomy

A Table consists of:

```text id="t7q2kr"
Toolbar (Optional)

↓

Header

↓

Rows

↓

Cells

↓

Footer (Optional)

↓

Pagination (Optional)
```

Each section has a clearly defined responsibility.

---

# 5. Table Types

Supported table types:

```text id="g3m8pt"
Basic Table

Data Table

Interactive Table

Tree Table

Grouped Table

Virtualized Table

Responsive Table
```

Interactive Data Tables are recommended for administration panels.

---

# 6. Structure

The standard structure is:

```text id="v5n4qx"
Header

↓

Body

↓

Footer
```

The footer may be omitted when unnecessary.

---

# 7. Columns

Each column may support:

* Label
* Icon
* Sorting
* Filtering
* Width
* Alignment
* Visibility
* Resizing

Columns should remain configurable.

---

# 8. Rows

Rows may contain:

* Text
* Numbers
* Badges
* Avatars
* Progress
* Buttons
* Menus
* Checkboxes
* Status Indicators

Rows should remain visually lightweight.

---

# 9. Cell Types

Supported cells include:

```text id="k6w9mc"
Text

Number

Date

Currency

Badge

Avatar

Button

Progress

Switch

Checkbox

Tag

Image

Rating

Status
```

Cells should always display the most appropriate presentation.

---

# 10. Row States

Supported states:

```text id="r4p7vz"
Default

Hover

Selected

Focused

Expanded

Disabled
```

Hover should improve readability without distracting users.

---

# 11. Selection

Supported selection modes:

```text id="m2t8qa"
Single

Multiple

Select All
```

Bulk actions should appear only when rows are selected.

---

# 12. Sorting

Columns may support:

* Ascending
* Descending
* None

Only sortable columns should display sorting controls.

---

# 13. Filtering

Supported filters:

* Text
* Number
* Date
* Status
* Category
* Multi Select
* Range
* Boolean

Filters should remain independent from sorting.

---

# 14. Search

Tables may provide:

* Global Search
* Column Search

Searching should preserve active filters whenever possible.

---

# 15. Pagination

Large datasets should support:

* Page Navigation
* Page Size
* Result Summary

Example:

```text id="j8m5wy"
Showing 21–40 of 527 results
```

---

# 16. Column Resize

Optional support:

* Drag Resize
* Double Click Auto Size

Column resizing should preserve usability.

---

# 17. Column Visibility

Users may hide or show columns.

Hidden columns should persist between sessions when appropriate.

---

# 18. Sticky Header

Large datasets should keep the header visible while scrolling.

Sticky headers improve readability.

---

# 19. Sticky Columns

Important columns such as:

* Selection
* Name
* Actions

may remain fixed while horizontally scrolling.

---

# 20. Expandable Rows

Rows may reveal additional information.

Examples:

* Course Details
* Student Activity
* Payment History
* Quiz Attempts

Expanded content should remain visually separated.

---

# 21. Row Actions

Common actions include:

* View
* Edit
* Duplicate
* Archive
* Delete
* Download

Actions should be grouped inside an overflow menu whenever appropriate.

---

# 22. Bulk Actions

Bulk operations may include:

* Delete
* Export
* Archive
* Assign
* Publish

Bulk actions should only appear after selection.

---

# 23. Empty State

Empty tables should display:

* Illustration
* Friendly Message
* Primary Action

Example:

```text id="u9k4nt"
No courses found.
```

---

# 24. Loading State

Tables should use:

* Skeleton Rows
* Loading Spinner
* Placeholder Cells

Layout shifts should be minimized.

---

# 25. Error State

When loading fails:

Display:

* Error Message
* Retry Button

Errors should not remove the table layout.

---

# 26. Responsive Behavior

Desktop

* Full table layout.

Tablet

* Horizontal scrolling.

Mobile

* Card-based responsive layout or horizontal scroll.

Critical information should always remain visible.

---

# 27. Accessibility

The Table component must support:

* WCAG 2.2 AA
* Keyboard Navigation
* Screen Readers
* Focus Indicators
* High Contrast Mode

Headers should be properly associated with data cells.

---

# 28. Keyboard Interaction

Supported keyboard actions:

* Tab → Navigate interactive elements
* Arrow Keys → Move between cells (optional)
* Space → Select Row
* Enter → Open Details

Keyboard navigation should remain efficient.

---

# 29. Animation

Recommended animations:

* Row Expand
* Row Selection
* Fade Loading

Animations should remain lightweight and respect the user's **Reduced Motion** preference.

---

# 30. Design Tokens

Examples

```text id="f5q8mr"
table-row-height

table-border

table-header-bg

table-hover-bg

table-selected-bg

table-radius
```

All visual properties should consume Design Tokens.

---

# 31. CSS Variables

Examples

```css id="c7v3pk"
--table-row-height
--table-border
--table-header-bg
--table-hover-bg
--table-selected-bg
--table-radius
```

Implementation should remain token-driven.

---

# 32. Do

Recommended practices:

* Keep rows concise.
* Support sorting and filtering.
* Use sticky headers for long datasets.
* Preserve user preferences.
* Clearly indicate selected rows.

---

# 33. Don't

Avoid:

* Extremely dense layouts.
* Inconsistent row heights.
* Too many inline actions.
* Hidden critical information.
* Horizontal scrolling on desktop unless necessary.

Tables should optimize readability before density.

---

# 34. Common Use Cases

Examples include:

* Course Management
* Student Management
* Instructor Management
* Orders
* Certificates
* Reports
* Media Files
* Organizations
* Quiz Results
* AI Logs

Tables are the primary component for structured administration interfaces.

---

# 35. Component Properties (Props)

Typical configurable properties include:

```text id="p3m9qt"
columns

rows

sortable

filterable

searchable

pagination

selectable

expandable

stickyHeader

stickyColumns

loading

empty

responsive
```

Additional properties may be introduced while preserving backward compatibility.

---

# 36. Future Expansion

Future enhancements may include:

* Virtual Scrolling
* Infinite Loading
* AI Column Suggestions
* Smart Filters
* Collaborative Editing
* Real-Time Updates
* Spreadsheet Mode
* Export Templates

Future capabilities should extend the existing architecture.

---

# 37. Related Components

This component integrates with:

* Pagination
* Search
* Filter
* Badge
* Avatar
* Progress
* Menu
* Checkbox
* Skeleton
* Empty State

Together they provide a complete enterprise data management experience.

---

# 38. Design Principles

The Table component should always remain:

* Readable
* Accessible
* Efficient
* Scalable
* Responsive
* Data-Oriented

Users should manage large datasets quickly with minimal cognitive effort.

---

# 39. Design Decision

Iran LMS follows an **Enterprise Data Grid Architecture**.

```text id="n6r2wc"
Dataset

↓

Table

↓

Filtering

↓

Sorting

↓

Selection

↓

Actions

↓

Result
```

The Table component serves as the foundation for structured data management across the platform.

---

# 40. Strategic Vision

The Table component is the central data management interface within the Iran LMS ecosystem. Whether administrators manage students, instructors, organizations, reports, certificates, payments, or AI-generated records, every table follows a consistent, accessible, and token-driven architecture.

The long-term objective is to evolve the Table into an enterprise-grade Data Grid capable of supporting real-time collaboration, AI-powered filtering, advanced analytics, virtualization, and millions of records while preserving performance, clarity, and exceptional usability.
