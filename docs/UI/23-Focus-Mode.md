# Focus Mode

**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

This document defines the Focus Mode experience used throughout the Iran LMS platform.

Focus Mode is a distraction-free learning environment designed to maximize concentration during educational activities such as watching lessons, reading course materials, completing quizzes, and participating in live classes.

Focus Mode is one of the core learning experiences of Iran LMS.

---

# 2. Goals

The Focus Mode System should be:

* Distraction-Free
* Immersive
* Comfortable
* Accessible
* Responsive
* Performance-Oriented

Everything on the screen should support learning.

---

# 3. Design Philosophy

Learning requires attention.

The interface should remove unnecessary elements while keeping essential learning tools within immediate reach.

The learner should feel that the content—not the interface—is the center of attention.

---

# 4. Focus Mode Architecture

Focus Mode consists of:

```text id="kp4v6s"
Learning Content

↓

Essential Controls

↓

Learning Tools

↓

Progress Tracking

↓

Minimal Navigation
```

Every visible element should directly support the learning process.

---

# 5. Supported Learning Types

Focus Mode supports:

```text id="6r8qyo"
Video Lessons

Text Lessons

Interactive Lessons

Quizzes

Assignments

Live Classes

SCORM

xAPI Learning Experiences
```

The interface adapts according to the lesson type.

---

# 6. Layout

Focus Mode uses a simplified layout.

Main areas include:

* Lesson Content
* Compact Header
* Optional Sidebar
* Bottom Learning Controls

All unnecessary interface elements should be removed.

---

# 7. Minimal Header

The header should remain compact.

Examples

* Course Name
* Lesson Title
* Progress Indicator
* Exit Focus Mode

The header may auto-hide during video playback.

---

# 8. Learning Area

The learning area is the primary visual focus.

Depending on lesson type, it may display:

* Video Player
* Reading Content
* Interactive Exercise
* Live Classroom
* Assessment

The content area should receive the highest visual priority.

---

# 9. Learning Sidebar

The sidebar is optional.

It may include:

* Course Curriculum
* Lesson List
* Bookmarks
* Notes
* Resources

Users should be able to collapse or expand it at any time.

---

# 10. Bottom Controls

Bottom controls may include:

* Previous Lesson
* Next Lesson
* Mark as Complete
* Playback Controls
* Lesson Progress

Controls should remain easy to access without obscuring content.

---

# 11. Progress Tracking

Progress should remain visible.

Examples

* Lesson Completion
* Course Completion
* Watch Percentage
* Reading Progress
* Quiz Progress

Progress updates should occur automatically.

---

# 12. Notes

Learners should be able to create notes without leaving Focus Mode.

Supported features:

* Timestamped Notes
* Text Notes
* Personal Notes
* Quick Highlight

Notes should synchronize automatically.

---

# 13. Bookmarks

Learners may bookmark:

* Videos
* Paragraphs
* Pages
* Lessons

Bookmarks should be accessible from the sidebar.

---

# 14. Learning Resources

Supporting resources may include:

* Downloads
* Attachments
* Source Files
* External Links

Resources should never interrupt the learning flow.

---

# 15. Video Experience

Video lessons should support:

* Full Screen
* Picture-in-Picture (where supported)
* Playback Speed
* Captions
* Quality Selection
* Resume Playback

Video controls should disappear when inactive.

---

# 16. Reading Experience

Reading lessons should support:

* Comfortable Width
* Adjustable Typography
* Reading Progress
* Smooth Scrolling

Long content should remain easy to read.

---

# 17. Quiz Experience

During quizzes:

* Navigation should remain minimal.
* Progress should remain visible.
* Distractions should be eliminated.

Learners should remain focused on answering questions.

---

# 18. Live Classes

Focus Mode supports:

* Live Video
* Chat Panel
* Participant List
* Shared Screen
* Presentation Mode

Panels should be collapsible.

---

# 19. Keyboard Shortcuts

Supported shortcuts may include:

* Space — Play / Pause
* ← → Previous / Next
* F — Full Screen
* N — Notes
* B — Bookmark
* Esc — Exit Full Screen

Keyboard navigation should remain intuitive.

---

# 20. Notifications

Only high-priority notifications should appear.

Examples

* Connection Lost
* Assignment Submitted
* Instructor Message

Routine notifications should be postponed until Focus Mode ends.

---

# 21. Responsive Behavior

Focus Mode supports:

* Desktop
* Tablet
* Mobile

The learning experience should remain optimized regardless of device.

---

# 22. Accessibility

Focus Mode must support:

* Screen Readers
* Keyboard Navigation
* High Contrast
* Reduced Motion
* Captions
* Adjustable Text Size

Accessibility remains fully available without disrupting immersion.

---

# 23. Dark Mode

Focus Mode fully supports:

* Light Theme
* Dark Theme
* System Theme

Theme changes should occur seamlessly.

---

# 24. Design Tokens

Examples

```text id="xz8jkp"
focus-header-height

focus-sidebar-width

focus-content-width

focus-control-height

focus-progress-size

focus-gap
```

Focus Mode should consume dedicated design tokens.

---

# 25. CSS Variables

Examples

```css id="8u7dte"
--focus-header-height
--focus-sidebar-width
--focus-content-width
--focus-control-height
--focus-gap
--focus-overlay
```

Components should rely on theme variables rather than fixed values.

---

# 26. Performance

Focus Mode should prioritize:

* Fast Rendering
* Smooth Video Playback
* Lazy Loading
* Background Synchronization
* Stable Memory Usage

Performance directly impacts learning quality.

---

# 27. Future Expansion

Focus Mode supports:

* AI Tutor
* AI Lesson Summary
* AI Note Generation
* Live Translation
* Voice Commands
* VR / AR Learning
* Multi-Monitor Learning

Future capabilities should integrate without disrupting the distraction-free experience.

---

# 28. Design Principles

Focus Mode should always remain:

* Calm
* Minimal
* Immersive
* Accessible
* Fast
* Learning-Centered

The interface should disappear into the background, allowing educational content to become the user's primary focus.

---

# 29. Design Decision

Iran LMS follows an **Immersive Learning Architecture**.

```text id="ujr9cv"
Learning Content

↓

Essential Learning Tools

↓

Progress Tracking

↓

Contextual Actions

↓

Distraction-Free Experience
```

Every element displayed in Focus Mode must have a direct educational purpose.

---

# 30. Strategic Vision

Focus Mode represents the signature learning experience of the Iran LMS ecosystem.

Rather than functioning as a simple lesson viewer, it creates an immersive environment where learners can watch videos, read content, participate in live classes, complete assessments, take notes, bookmark key moments, and monitor their progress—all without unnecessary distractions.

The long-term objective is to establish Focus Mode as a premium learning workspace capable of supporting AI-assisted education, advanced multimedia experiences, offline learning, and future immersive technologies while preserving clarity, performance, and learner concentration.
