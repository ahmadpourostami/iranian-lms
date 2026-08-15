# Typography

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the typography system of Iran LMS.

Typography is one of the most important elements of the learning experience. It directly affects readability, comprehension, accessibility, and user comfort during long learning sessions.

The typography system establishes a consistent visual hierarchy across the entire platform.

---

# 2. Goals

The typography system should be:

* Readable
* Consistent
* Accessible
* Responsive
* Scalable
* Localization Ready

Typography should help users consume educational content effortlessly.

---

# 3. Typography Philosophy

Reading is the primary activity in an LMS.

Typography should reduce cognitive load rather than attract attention.

The interface should support long reading sessions without causing visual fatigue.

---

# 4. Typography Architecture

The typography system consists of three layers.

```text
Font Families
        ↓
Typography Tokens
        ↓
Text Styles
```

Each layer has a distinct responsibility.

---

# 5. Font Families

The platform defines font roles rather than fixed font names.

Examples

```text
Primary Font

Secondary Font

Monospace Font
```

Actual font selection may vary by language or deployment.

---

# 6. Typography Tokens

Typography Tokens define reusable values.

Examples

```text
Font Size

Font Weight

Line Height

Letter Spacing

Paragraph Spacing
```

Components should consume typography tokens instead of fixed values.

---

# 7. Text Hierarchy

Every text element belongs to a predefined hierarchy.

```text
Display

Heading

Title

Subtitle

Body

Caption

Label

Button

Code
```

Hierarchy communicates importance through typography.

---

# 8. Display Styles

Display styles are reserved for marketing pages and landing pages.

They should rarely appear inside the learning experience.

---

# 9. Heading Styles

Headings organize content.

Supported levels

```text
H1

H2

H3

H4

H5

H6
```

Heading hierarchy should never be skipped.

---

# 10. Body Text

Body text is the primary reading style.

It should prioritize:

* Readability
* Comfortable Line Height
* Appropriate Line Length
* High Contrast

Body text should remain visually calm.

---

# 11. Labels

Labels identify interface elements.

Examples include:

* Form Labels
* Menu Items
* Navigation
* Tabs
* Chips

Labels should remain concise.

---

# 12. Button Text

Button typography should:

* Be readable
* Be concise
* Use consistent weight
* Avoid decorative styling

Buttons communicate actions.

---

# 13. Code Typography

Code snippets use a dedicated monospace font.

Examples

* API Keys
* Commands
* Code Samples
* JSON
* URLs

Code should remain visually distinct from body text.

---

# 14. Numbers

Numeric values should remain aligned and readable.

Examples include:

* Scores
* Progress
* Prices
* Statistics
* Reports

Consistent numeric formatting improves scanning.

---

# 15. Reading Experience

Educational content should optimize:

* Reading Speed
* Reading Comfort
* Information Retention

Long paragraphs should remain easy to scan.

---

# 16. Responsive Typography

Typography adapts to:

* Desktop
* Tablet
* Mobile

Font scaling should preserve hierarchy rather than simply shrinking text.

---

# 17. Accessibility

Typography should support:

* Large Text
* High Contrast
* Screen Readers
* Zoom
* Keyboard Navigation

Typography should comply with WCAG 2.2 AA recommendations.

---

# 18. RTL Support

The typography system must fully support RTL languages.

Alignment, spacing, punctuation, and text flow should remain natural.

---

# 19. Localization

Different languages may require:

* Different Fonts
* Different Line Heights
* Different Letter Spacing
* Different Font Weights

Localization should not break the visual hierarchy.

---

# 20. Text Truncation

When text exceeds available space, the system should:

* Preserve readability
* Prevent layout breaking
* Use consistent truncation behavior

Critical information should never be truncated.

---

# 21. Line Length

Reading areas should maintain comfortable line lengths.

Very long lines reduce comprehension.

Very short lines reduce reading efficiency.

Layout should balance readability across screen sizes.

---

# 22. Font Loading

The typography system should:

* Minimize font downloads
* Use optimized font formats
* Avoid layout shifts
* Provide fallback fonts

Performance is part of typography.

---

# 23. Typography Tokens

Examples

```text
font-family-primary

font-family-secondary

font-family-monospace

font-size-body

font-size-heading

font-weight-bold

line-height-body

letter-spacing-normal
```

Token names should remain implementation-independent.

---

# 24. CSS Variables

Typography should be exposed through CSS Variables.

Example

```css
--font-family-primary
--font-size-body
--font-size-heading
--font-weight-semibold
--line-height-body
```

Components should consume variables instead of fixed values.

---

# 25. Mobile Applications

Mobile applications should reuse the same typography tokens.

Only platform-specific implementation details may differ.

Typography should remain visually consistent across devices.

---

# 26. Future Expansion

The typography system supports:

* Dark Mode
* Dynamic Font Scaling
* Accessibility Preferences
* Multiple Languages
* White Label Deployments

Future typography changes should require only token updates.

---

# 27. Design Principles

Typography should always remain:

* Readable
* Consistent
* Accessible
* Responsive
* Predictable
* Minimal

Decorative typography should be avoided in learning interfaces.

---

# 28. Design Decision

Iran LMS follows a **Token-Based Typography Architecture**.

```text
Font Families

↓

Typography Tokens

↓

Text Styles

↓

UI Components

↓

Pages
```

Business modules never define typography directly.

All typography decisions originate from reusable tokens.

---

# 29. Strategic Vision

The Typography System provides a unified reading experience across the entire Iran LMS ecosystem.

By separating font families, typography tokens, and text styles, the platform can support multiple languages, responsive layouts, accessibility requirements, and future branding needs without redesigning existing interfaces.

The ultimate goal is simple:

**Users should spend their attention reading and learning—not adapting to inconsistent typography.**
