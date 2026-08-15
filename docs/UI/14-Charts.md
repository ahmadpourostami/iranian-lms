# Charts

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Chart System used throughout the Iran LMS platform.

Charts transform complex data into clear visual insights, helping users monitor progress, evaluate performance, and make informed decisions.

Charts should explain data—not decorate dashboards.

---

# 2. Goals

The Chart System should be:

* Consistent
* Accessible
* Responsive
* Interactive
* Performant
* Easy to Understand

Visualizations should simplify information rather than increase complexity.

---

# 3. Design Philosophy

Every chart should answer a specific question.

Examples

* How is learning progressing?
* Which course performs best?
* How has revenue changed?
* What requires attention?

If a chart does not support decision-making, it should not exist.

---

# 4. Chart Architecture

Every chart consists of:

```text
Dataset

↓

Transformation

↓

Visualization

↓

Interaction

↓

Insights
```

Business modules provide data.

The Design System controls presentation.

---

# 5. Chart Categories

Supported chart types

```text
Line Chart

Bar Chart

Area Chart

Pie Chart

Donut Chart

Stacked Bar

Horizontal Bar

Scatter Plot

Heatmap

Radar Chart

Progress Ring

Sparkline

Timeline
```

Each visualization should match the nature of the data.

---

# 6. Line Charts

Use line charts for:

* Learning Progress
* Revenue Trends
* Daily Activity
* Student Growth
* Course Performance Over Time

Line charts should emphasize trends rather than exact values.

---

# 7. Bar Charts

Bar charts compare values.

Examples

* Course Sales
* Student Count
* Lesson Views
* Quiz Attempts

Bars should begin from a zero baseline whenever appropriate.

---

# 8. Area Charts

Area charts emphasize cumulative change.

Examples

* Learning Hours
* Revenue Growth
* Active Users

Area opacity should remain subtle.

---

# 9. Pie & Donut Charts

Use only for simple proportional data.

Examples

* Course Categories
* Enrollment Sources
* User Roles

Avoid excessive slices.

Prefer fewer than six categories.

---

# 10. Progress Charts

Progress visualizations include:

* Progress Ring
* Progress Bar
* Completion Circle

Progress should always be easy to interpret.

---

# 11. Timeline Charts

Timeline visualizations display events such as:

* Learning Journey
* Assignment History
* Certification Timeline
* Course Updates

Time should always move in a consistent direction.

---

# 12. Dashboard Charts

Dashboard charts should:

* Highlight important trends
* Support quick scanning
* Avoid unnecessary detail

Dashboards are for monitoring, not deep analysis.

---

# 13. Analytics Charts

Analytics pages may include advanced visualizations.

Examples

* Cohort Analysis
* Revenue Analysis
* Student Retention
* Engagement Trends

Advanced charts should support filtering and exploration.

---

# 14. Color Usage

Charts should consume semantic color tokens.

Examples

* Primary
* Success
* Warning
* Danger
* Neutral

Color should support interpretation—not decoration.

---

# 15. Legends

Legends should:

* Clearly identify datasets
* Remain readable
* Support interaction when applicable

Legends should not overwhelm the visualization.

---

# 16. Axes

Axes should remain:

* Simple
* Readable
* Properly Labeled

Units should always be displayed.

---

# 17. Tooltips

Tooltips may display:

* Exact Value
* Date
* Category
* Comparison
* Additional Context

Tooltips should appear quickly and disappear naturally.

---

# 18. Empty Charts

When data is unavailable, charts should display:

* Friendly Empty State
* Explanation
* Suggested Action

Empty visualizations should never appear broken.

---

# 19. Loading States

Charts should use skeleton placeholders while loading.

Large datasets should load asynchronously.

---

# 20. Responsive Behavior

Charts adapt to:

* Desktop
* Tablet
* Mobile

Small screens may simplify:

* Legends
* Labels
* Axis Details

Information hierarchy should remain intact.

---

# 21. Accessibility

Charts must support:

* Keyboard Navigation
* Screen Readers
* High Contrast
* Alternative Data Tables
* Color-Independent Interpretation

Charts should never rely solely on color.

---

# 22. Performance

Charts should support:

* Lazy Loading
* Incremental Rendering
* Data Virtualization
* Efficient Updates

Rendering should remain smooth even with large datasets.

---

# 23. Design Tokens

Examples

```text
chart-primary

chart-success

chart-warning

chart-danger

chart-grid

chart-axis

chart-tooltip

chart-radius
```

Charts should consume shared design tokens.

---

# 24. CSS Variables

Examples

```css
--chart-primary
--chart-success
--chart-warning
--chart-grid
--chart-tooltip
--chart-radius
```

Visualization styling should avoid fixed values.

---

# 25. Future Expansion

The Chart System supports:

* AI Insights
* Predictive Analytics
* Real-Time Dashboards
* Organization Reports
* White Label Themes
* Mobile Applications

New visualizations should inherit the existing design language.

---

# 26. Design Principles

Charts should always remain:

* Informative
* Minimal
* Accurate
* Accessible
* Interactive
* Consistent

Users should understand the message within a few seconds.

---

# 27. Design Decision

Iran LMS follows a **Semantic Data Visualization Architecture**.

```text
Business Data

↓

Transformation

↓

Chart Type

↓

Design Tokens

↓

Visualization

↓

User Insight
```

Visualization components remain independent of business logic and reuse the shared design system.

---

# 28. Strategic Vision

The Chart System provides a unified approach to data visualization across the Iran LMS ecosystem.

Whether users analyze student engagement, instructor performance, financial reports, learning progress, or organizational analytics, every chart follows the same visual language, accessibility standards, and interaction patterns.

The long-term objective is to transform raw educational and business data into actionable insights while maintaining clarity, consistency, and scalability across web, mobile, and future AI-powered analytics experiences.
