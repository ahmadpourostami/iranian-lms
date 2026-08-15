# Audio

**Component:** Media
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Reusable Media Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Audio is the reusable media component for displaying and playing audio content inside Iran LMS.

Primary use cases:

* Audio lessons
* Audio resources
* Voice explanations
* Downloadable audio lessons
* Instructor audio content
* Audio attachments
* Future podcast-like educational media if supported by the host product

The current LMS design specification explicitly identifies media types such as video, PDF, quiz, assignment and webinar inside the lesson curriculum.

Audio should therefore be implemented as a generic media primitive, without introducing unrelated podcast/business functionality into the LMS plugin.

---

# 2. Core Principle

Audio is a **presentation and playback component**.

It must not own LMS business logic.

Architecture:

```text id="a8k3qm"
Lesson / Resource
        ↓
    Audio Player
        ↓
       Audio
```

The parent component owns the educational meaning.

Audio owns playback.

---

# 3. Audio Is Not a Lesson

Do not put lesson logic inside Audio.

Incorrect:

```text id="n4p7cx"
Audio
 ↓
Check Enrollment
 ↓
Mark Lesson Complete
```

Correct:

```text id="q2m8vs"
Enrollment
 ↓
Access
 ↓
Lesson
 ↓
Audio
```

---

# 4. Main Use Cases

Audio may be used for:

```text id="f7k2wd"
Audio Lesson
Audio Resource
Voice Explanation
Instructor Recording
Pronunciation Material
Course Supplement
```

The actual availability of each feature is controlled by the relevant LMS module.

---

# 5. Audio Lesson

Example:

```text id="y6r3pn"
┌─────────────────────────────────────┐
│  ▶  درس صوتی: مقدمه                  │
│     ━━━━━━━━━━━━━━━━                 │
│     08:35 / 21:40             🔊     │
└─────────────────────────────────────┘
```

The player should remain compact and easy to use.

---

# 6. Audio Resource

An audio file may appear inside the lesson resources.

Example:

```text id="m3x9qa"
فایل‌های درس
────────────────
🎧 توضیحات تکمیلی.mp3
   08:35
   [پخش]
```

The Resource component owns:

* Filename
* File metadata
* Download
* Permissions

Audio owns playback.

---

# 7. WordPress Media

Audio should support WordPress media attachments where appropriate.

Possible metadata:

```text id="v8q2mk"
attachmentId
url
mimeType
duration
title
```

Example:

```text id="w4p6cz"
<Audio
    attachmentId={123}
/>
```

The exact API depends on the plugin frontend architecture.

---

# 8. HTML5 Audio

The baseline implementation should support browser-native HTML5 audio.

Conceptually:

```html id="t5m7sx"
<audio>
    <source />
</audio>
```

A custom Iran LMS player may be placed above the native media engine.

---

# 9. Supported Formats

Common formats may include:

```text id="c9z4np"
audio/mpeg
audio/wav
audio/ogg
audio/mp4
audio/webm
```

Actual browser and codec support must be respected.

Do not guarantee playback for formats unsupported by the user's browser.

---

# 10. External Audio

Future integrations may provide remote audio URLs.

Architecture:

```text id="p2k8wy"
Audio Source
    ↓
Provider / URL
    ↓
Audio Component
```

The component should not assume that all audio is hosted inside WordPress.

---

# 11. Protected Audio

Some audio lessons may require course enrollment.

The correct architecture is:

```text id="h6v3qs"
User
 ↓
Authorization
 ↓
Learning / Enrollment
 ↓
Media Access
 ↓
Audio
```

Audio must not independently determine whether a user is enrolled.

---

# 12. Signed URLs

Protected audio may use temporary URLs.

Example:

```text id="r7m2xp"
API
 ↓
Signed Audio URL
 ↓
Audio
```

The Audio component simply consumes the authorized URL.

It must not contain private credentials.

---

# 13. Controls

Basic controls should include:

```text id="z4q8mn"
Play / Pause
Progress
Current Time
Duration
Volume
Mute
```

Optional controls:

```text id="b7p2vx"
Playback Speed
Download
Settings
```

Only show controls that are relevant to the current use case.

---

# 14. Compact Player

For lesson resources, a compact player is preferred.

Example:

```text id="n8m4zc"
┌────────────────────────────────────┐
│ ▶  توضیحات صوتی       04:32        │
│    ━━━━━━━━━━━━━━━━━━━━━━━         │
└────────────────────────────────────┘
```

The player should not consume unnecessary vertical space.

---

# 15. Large Audio Player

For a dedicated audio lesson, a larger presentation may be used:

```text id="k3v9sq"
┌─────────────────────────────────────┐
│                                     │
│             🎧                      │
│       درس صوتی شماره ۳              │
│                                     │
│       12:35 / 24:10                 │
│                                     │
│            ▶                        │
│                                     │
└─────────────────────────────────────┘
```

The parent Lesson component determines the layout.

---

# 16. Artwork

Audio may optionally have artwork.

Example:

```text id="p5w7ax"
┌──────────────┐
│              │
│    IMAGE     │
│              │
└──────────────┘
```

Artwork should use the project's Image component where possible.

---

# 17. Artwork Is Optional

Audio playback must work without artwork.

If artwork is unavailable:

```text id="x9m2kv"
[ Audio Icon ]
```

may be displayed.

Use the project's Icon component rather than an arbitrary image.

---

# 18. Image and Audio

Architecture:

```text id="c4q8sp"
Audio Player
├── Artwork → Image
├── Controls
└── Audio Engine
```

Image handles media rendering.

Audio handles playback.

---

# 19. Playback Speed

Educational audio may benefit from speed control.

Recommended values:

```text id="u6p3mz"
0.75×
1×
1.25×
1.5×
1.75×
2×
```

Default:

```text id="g8r5nc"
1×
```

The exact available values may be configurable.

---

# 20. Playback Progress

Audio should expose:

```text id="v2m7qa"
currentTime
duration
percentage
```

The Learning module may use these values to calculate learning progress.

---

# 21. Learning Progress Boundary

Audio should not directly mark a lesson complete.

Correct:

```text id="d5q9wy"
Audio
 ↓
onProgress
 ↓
Learning Module
 ↓
Progress Persistence
```

Incorrect:

```text id="f8m3px"
Audio
 ↓
completeLesson()
```

---

# 22. Playback Events

Audio should expose useful events.

Recommended:

```text id="s7c4kn"
onPlay
onPause
onEnded
onTimeUpdate
onLoadedMetadata
onError
onVolumeChange
onPlaybackRateChange
```

These events allow higher-level modules to integrate with the player.

---

# 23. Progress Tracking

Do not persist every tiny time update.

Bad:

```text id="m8q2zr"
Every 0.1 second
 ↓
API Request
```

Better:

```text id="p4v7ks"
Playback
 ↓
Throttled Event
 ↓
Learning Module
 ↓
Persistence
```

The exact persistence strategy belongs to Learning.

---

# 24. Loading State

While audio metadata or source is loading:

```text id="y3k8mc"
▶  در حال بارگذاری...
```

Use the project's Loader/Spinner component when appropriate.

---

# 25. Buffering

During buffering:

```text id="c6p2vz"
▶  [Loading]
```

The player should communicate that playback is temporarily waiting.

Avoid blocking the entire page.

---

# 26. Error State

Example:

```text id="r9m4wx"
┌─────────────────────────────────┐
│ ⚠ پخش فایل صوتی ممکن نیست       │
│                                 │
│          [ تلاش مجدد ]           │
└─────────────────────────────────┘
```

Use localized, user-friendly messaging.

Do not expose raw browser errors.

---

# 27. Error Types

Potential errors:

```text id="q5n8yd"
Network Error
Media Error
Unsupported Format
Authorization Error
Expired URL
Missing Source
Unknown Error
```

The component may normalize these into a consistent UI state.

---

# 28. Retry

A retry action may be provided:

```text id="x2m7pc"
[ تلاش مجدد ]
```

Retry should reattempt media loading.

Authentication problems should be handled by the authorization layer.

---

# 29. Download

Some audio resources may be downloadable.

Example:

```text id="z8q3nv"
🎧 توضیحات جلسه
08:35

[ پخش ]   [ دانلود ]
```

Download availability is not determined by Audio.

The Resource/Media access layer decides whether download is allowed.

---

# 30. Download Boundary

Correct:

```text id="j4c8mx"
Resource Permission
      ↓
Download Allowed
      ↓
Download Action
```

Audio should only render a download action if instructed to do so.

---

# 31. Autoplay

Autoplay should generally be disabled.

Educational content should not unexpectedly start playing.

If autoplay is required:

```text id="w7p3qk"
autoplay
```

must be explicitly configured.

---

# 32. Muted Autoplay

Unlike video, muted autoplay is not generally the primary use case for educational audio.

Avoid autoplaying audio without an explicit user action.

---

# 33. Accessibility

Audio must support:

```text id="m5x8sp"
Keyboard
Screen Reader
Accessible Labels
Visible Focus
```

All interactive controls need accessible names.

---

# 34. Keyboard Controls

Common shortcuts may include:

```text id="k9q4vy"
Space / Enter → Play/Pause
Arrow Left → Seek Back
Arrow Right → Seek Forward
M → Mute
```

Exact shortcuts should be documented and should not interfere with browser or assistive technology behavior.

---

# 35. Focus

Every interactive control must have a visible focus state.

Do not remove browser focus indicators without providing an accessible replacement.

---

# 36. Touch

On mobile:

```text id="c3v7qm"
Play
Seek
Volume
Speed
```

must remain touch-friendly.

Controls should have adequate touch targets.

---

# 37. Mobile Layout

Audio should remain responsive.

Example:

```text id="n6p2xs"
Desktop
[ Artwork ][ Player Controls ]

Mobile
[ Artwork ]
[ Player Controls ]
```

The exact layout belongs to the parent component.

---

# 38. RTL

The UI must support Persian RTL.

Example:

```text id="b8m4qc"
پخش
سرعت
تنظیمات
دانلود
```

Text and menus follow RTL.

Playback time semantics remain chronological.

---

# 39. RTL Progress

RTL should not automatically reverse time progression.

The player must distinguish:

```text id="y2k7vz"
Interface Direction
```

from:

```text id="p6m3xn"
Playback Timeline
```

---

# 40. Typography

Audio controls should use the global typography tokens.

Examples:

```text id="r4q8mk"
08:35
1.25×
پخش
سرعت پخش
```

Avoid hard-coded font families.

---

# 41. Colors

Use semantic design tokens for:

```text id="w3p7cx"
Player Surface
Text
Icons
Progress Track
Progress Fill
Active State
Focus State
```

Do not hard-code arbitrary colors inside Audio.

---

# 42. Dark Mode

Audio must support both light and dark interfaces.

The player surface, controls and states should use semantic tokens.

The actual artwork should remain unchanged unless dedicated theme variants exist.

---

# 43. Border Radius

Audio player containers should follow the project's radius system.

The Iran LMS design system uses rounded surfaces and approximately 16px radii for major UI containers.

Do not introduce a separate radius system for Audio.

---

# 44. Lesson Integration

The Lesson Player can contain:

```text id="s9m2vx"
Video
or
Audio
or
PDF
or
Quiz
or
Assignment
or
Webinar
```

The source design explicitly identifies these lesson types in the curriculum.

Audio should therefore be one media/content implementation within the broader Lesson Player architecture.

---

# 45. Lesson Type

The parent lesson system may determine:

```text id="k7q3mp"
type = audio
```

Then:

```text id="c2v8zx"
Lesson
 ↓
Audio Lesson Renderer
 ↓
Audio
```

Audio itself should not determine the lesson type.

---

# 46. Course Progress

Audio playback can contribute to course progress.

Example:

```text id="v6m9qc"
Audio Duration = 20:00
Played = 15:00
        ↓
Learning Module
        ↓
75% playback
```

Whether 75% means lesson completion is a business rule outside Audio.

---

# 47. Analytics

Audio may emit events useful for analytics:

```text id="p4x8mk"
audio_started
audio_paused
audio_completed
audio_seeked
audio_progress
audio_speed_changed
```

Analytics storage belongs to the Analytics architecture.

Audio only emits events.

---

# 48. Privacy

Do not collect playback analytics unnecessarily.

If analytics are enabled:

```text id="q7m3vz"
Audio
 ↓
Event
 ↓
Analytics
```

must follow the project's privacy and consent strategy.

---

# 49. Security

Never expose private media credentials.

Avoid placing:

```text id="z5c8ny"
Private Storage Key
Secret Token
Signed Credential
```

directly in the frontend.

Protected URLs should be generated by the appropriate backend/media layer.

---

# 50. WordPress Compatibility

Audio must work within:

```text id="r3p6xw"
WordPress Frontend
Classic Themes
Block Themes
Custom Themes
RTL Themes
Dark Themes
```

The plugin must not globally modify the site's `<audio>` element styles.

---

# 51. CSS Scope

Avoid:

```css id="a8v2mn"
audio {
    ...
}
```

because it may affect the WordPress Theme.

Prefer scoped selectors:

```css id="c5q7zx"
.iran-lms-audio {
    ...
}
```

The final CSS naming strategy should follow the project's architecture.

---

# 52. Component API

Recommended API:

```text id="m8p3vq"
Audio
    src
    title
    artwork
    duration
    controls
    autoplay
    loop
    muted
    preload
    playbackRate
    volume
    downloadable
    className
```

Optional WordPress-specific properties:

```text id="x4k9ns"
attachmentId
size
```

---

# 53. Event API

Recommended:

```text id="q6v2mp"
onPlay
onPause
onEnded
onProgress
onReady
onError
onDurationChange
onVolumeChange
onPlaybackRateChange
```

---

# 54. Controlled API

Advanced consumers may need methods such as:

```text id="p7c3xz"
play()
pause()
seek(time)
setVolume(value)
setPlaybackRate(value)
```

These should be exposed through the project's preferred component/ref architecture.

---

# 55. Component Boundary

Audio owns:

```text id="w9m4ks"
Playback
Controls
Timeline
Volume
Speed
Buffering
Errors
Playback Events
Accessibility
```

Audio does not own:

```text id="d2x7pv"
Enrollment
Permissions
Lesson Completion
Course Progress Persistence
Payments
Certificates
Analytics Storage
Resource Authorization
```

---

# 56. Do

* Keep Audio reusable.
* Keep Audio independent of Lesson business logic.
* Support WordPress media attachments.
* Support HTML5 audio.
* Support responsive layouts.
* Support RTL.
* Support accessibility.
* Provide playback events.
* Handle buffering and errors.
* Support optional artwork.
* Support playback speed.
* Respect design tokens.
* Scope CSS.
* Keep authorization outside Audio.

---

# 57. Don't

Avoid:

* Checking enrollment inside Audio.
* Marking lessons complete directly.
* Storing private media credentials.
* Autoplaying unexpected audio.
* Hard-coding theme colors.
* Styling every global `<audio>` element.
* Making Audio responsible for downloads.
* Making Audio responsible for uploads.
* Making Audio responsible for course navigation.
* Coupling Audio to a specific WordPress Theme.

---

# 58. Testing Requirements

## Playback

```text id="u8m2qf"
Play
Pause
Seek
Volume
Mute
Speed
End
Replay
```

## Media

```text id="k4p7vz"
MP3
WAV
OGG
Invalid Source
Missing Source
Unsupported Format
Slow Network
Expired URL
```

## States

```text id="c9x3mn"
Loading
Ready
Playing
Paused
Buffering
Ended
Error
```

## Accessibility

```text id="m7q2sp"
Keyboard
Screen Reader
Focus
Accessible Labels
```

## Responsive

```text id="v5k8cx"
Desktop
Tablet
Mobile
```

## RTL

```text id="z3p6mw"
Persian
English
Mixed Persian/English
```

## WordPress

```text id="q8n4ys"
Media Library
Classic Theme
Block Theme
Frontend
Plugin Conflict
```

---

# 59. Architecture Decision

Iran LMS follows a **Layered Audio Architecture**:

```text id="r7m3kp"
LMS
 │
 ├── Lesson
 │     │
 │     └── Audio Lesson
 │              ↓
 │            Audio
 │         ┌────┼─────┐
 │         ↓    ↓     ↓
 │      Artwork Controls Events
 │         ↓
 │       Image
 │
 └── Resource
        ↓
      Audio
```

This allows the same Audio component to serve both lessons and resources.

---

# 60. Strategic Vision

Audio should remain a lightweight, reusable media primitive inside Iran LMS.

Its long-term purpose is to support:

* Audio lessons
* Supplementary lesson audio
* Voice explanations
* Audio resources
* Future educational audio formats

while remaining completely independent from:

* Enrollment
* Course completion
* Permissions
* Commerce
* Analytics
* Theme-specific behavior

The result should be a **WordPress-native, RTL-first, accessible, responsive and Theme-independent audio system** that can be reused throughout the LMS without turning the media component into a business-logic component.
