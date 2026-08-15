# Video

**Component:** Media
**Project:** Iran LMS
**Platform:** WordPress Plugin
**Type:** Reusable Media Component
**Version:** 1.0
**Status:** Foundation

---

# 1. Purpose

Video is the foundational media component for displaying and playing educational video content inside Iran LMS.

It is primarily used for:

* Course lessons
* Lesson previews
* Course promotional videos
* Instructor videos
* Video-based resources
* Video attachments
* Focus Mode
* Course introduction videos

Video is a reusable presentation component and must remain independent from LMS business logic.

---

# 2. Core Principle

Iran LMS is a WordPress LMS Plugin.

Therefore Video must be:

```text
Reusable
    ↓
Theme Independent
    ↓
WordPress Compatible
    ↓
RTL First
    ↓
Accessible
    ↓
Responsive
    ↓
Token Driven
```

Video must not directly own:

* Enrollment
* Course progress
* Permissions
* Payments
* Lesson completion
* Certificates
* User roles

These belong to the relevant LMS modules.

---

# 3. Video Is Not the Lesson Player

This distinction is important.

`Video` is the media primitive.

`Lesson Player` is a higher-level LMS component.

Architecture:

```text
Lesson
  ↓
Lesson Player
  ↓
Video
  +
Controls
  +
Progress
  +
Lesson Navigation
```

Video must not become responsible for the complete learning experience.

---

# 4. Primary Use Case

The primary use case is educational lesson playback.

Example:

```text
┌────────────────────────────────────────┐
│                                        │
│               VIDEO                    │
│                                        │
│                                        │
├────────────────────────────────────────┤
│ ▶  ━━━━━━━━━━━━━━━  12:35 / 24:10     │
│                         🔊  ⚙  ⛶       │
└────────────────────────────────────────┘
```

The Video component owns playback.

The Lesson Player owns the surrounding LMS experience.

---

# 5. Supported Video Sources

The component should be designed to support approved sources such as:

```text
HTML5 Video
WordPress Media
Self-hosted MP4
WebM
External Video Provider
Signed/Protected URL
```

Support for each source should be determined by the media architecture.

---

# 6. HTML5 Video

The baseline implementation should support the browser's native HTML5 video capabilities.

Conceptually:

```html
<video>
    <source />
</video>
```

The component may provide a custom UI on top of the native media element where required.

---

# 7. WordPress Media

Video may reference a WordPress attachment.

Recommended data:

```text
attachmentId
url
mimeType
duration
poster
```

Example:

```text
<Video
    attachmentId={123}
/>
```

The exact frontend API depends on the plugin architecture.

---

# 8. External Providers

Future integrations may include external video platforms.

The Video abstraction should allow provider-specific implementations without forcing the rest of the LMS to understand provider details.

Architecture:

```text
Video
  ↓
Provider Adapter
  ├── HTML5
  ├── External Provider A
  └── External Provider B
```

The parent component should interact with a consistent API.

---

# 9. Protected Video

Educational content may require access restrictions.

For example:

```text
Student Enrolled
      ↓
Access Granted
      ↓
Video URL
      ↓
Playback
```

However, the Video component must not implement enrollment logic.

The Learning/Enrollment module should determine whether the user may access the media.

---

# 10. Signed URLs

For protected media, the backend may provide temporary URLs.

Example:

```text
API
 ↓
Signed Video URL
 ↓
Video
```

Video simply consumes the approved URL.

It must not generate authentication tokens itself.

---

# 11. Authorization Boundary

The correct architecture is:

```text
User
 ↓
Authorization
 ↓
Learning / Enrollment
 ↓
Media Access
 ↓
Video
```

Not:

```text
Video
 ↓
Check enrollment
 ↓
Check payment
 ↓
Check permissions
```

This keeps the component reusable.

---

# 12. Poster Image

Video should support a poster image.

Example:

```text
┌──────────────────────────────────────┐
│                                      │
│           POSTER IMAGE               │
│                                      │
│                 ▶                    │
│                                      │
└──────────────────────────────────────┘
```

The poster is displayed before playback begins.

---

# 13. Poster Source

Poster may come from:

```text
WordPress Attachment
Course Thumbnail
Generated Preview
Video Provider
Custom Image
```

The parent component determines the appropriate source.

---

# 14. Poster and Image Component

The poster should use the project's Image primitive where appropriate.

Architecture:

```text
Video
 ├── Poster
 │    └── Image
 └── Player
```

Do not duplicate image loading/fallback logic inside Video unnecessarily.

---

# 15. Play Button

The Play Button is part of the video interaction layer.

Example:

```text
┌───────────────────────┐
│                       │
│          ▶            │
│                       │
└───────────────────────┘
```

Use the project's Button/Icon system.

Do not create an unrelated custom button style specifically for Video.

---

# 16. Video Controls

Depending on the implementation, controls may include:

```text
Play / Pause
Progress
Current Time
Duration
Volume
Mute
Playback Speed
Quality
Fullscreen
Picture-in-Picture
Settings
```

Not every video needs every control.

The interface should remain simple.

---

# 17. Minimum Controls

For standard educational playback:

```text
Play / Pause
Progress
Time
Volume
Settings
Fullscreen
```

should generally be sufficient.

Additional controls should be introduced only when useful.

---

# 18. Focus Mode

Focus Mode is a key Iran LMS use case.

The lesson design intentionally minimizes distractions and provides a large video area with compact controls.

Video should therefore support a compact presentation suitable for:

```text
Focus Mode
```

without requiring the video component to own Focus Mode itself.

---

# 19. Focus Mode Architecture

```text
Focus Mode
   ↓
Lesson Player
   ↓
Video
```

Focus Mode controls:

* Layout
* Sidebar visibility
* Navigation
* Notes
* Lesson context

Video controls playback.

---

# 20. Fullscreen

Video should support fullscreen where browser/device capabilities permit.

The fullscreen action should be accessible from the controls.

When fullscreen is active:

```text
Video
 ↓
Fullscreen Container
```

The component should maintain usable controls and readable content.

---

# 21. Picture-in-Picture

Where supported by the browser, Picture-in-Picture may be offered.

It should be treated as an optional capability.

Do not assume every browser/device supports it.

---

# 22. Playback Speed

Educational video commonly benefits from speed control.

Recommended options:

```text
0.5×
0.75×
1×
1.25×
1.5×
1.75×
2×
```

The default should normally be:

```text
1×
```

The available range may be configurable.

---

# 23. Playback Speed Persistence

If the LMS later supports user playback preferences, the setting may be persisted.

Architecture:

```text
Video Preference
      ↓
User Settings
      ↓
Video
```

Video should not directly implement user-profile persistence.

---

# 24. Quality Selection

If multiple video qualities exist:

```text
Auto
1080p
720p
480p
360p
```

may be offered.

The available qualities should come from the media provider.

Do not display unavailable quality options.

---

# 25. Adaptive Streaming

Future support may include:

```text
HLS
DASH
```

The Video component should be architected so streaming protocols can be introduced without changing the Lesson module API.

---

# 26. Progress

Video playback position is different from LMS learning progress.

Video can expose:

```text
currentTime
duration
percentage
```

The Learning module decides how those values affect course progress.

---

# 27. Learning Progress Boundary

Correct:

```text
Video
 ↓
currentTime = 15:32
 ↓
Lesson Module
 ↓
Progress = 64%
```

Incorrect:

```text
Video
 ↓
markLessonCompleted()
```

Video must not directly complete lessons.

---

# 28. Lesson Completion

The LMS may determine completion based on:

```text
Video watched percentage
Video completed
Required duration
Manual completion
Assessment requirement
```

This logic belongs to Learning/Assessment configuration.

---

# 29. Event System

Video should expose useful playback events.

Examples:

```text
onPlay
onPause
onEnded
onTimeUpdate
onLoadedMetadata
onError
onVolumeChange
onFullscreenChange
onPlaybackRateChange
```

These events allow higher-level LMS modules to react without coupling Video to business logic.

---

# 30. Progress Tracking Events

For LMS integration:

```text
onProgress
```

may provide:

```text
currentTime
duration
percentage
```

The Learning module may then decide when to persist progress.

---

# 31. Progress Persistence

Do not send an API request on every tiny time update.

Bad:

```text
Every 0.1 second
 ↓
API request
```

Better:

```text
Playback
 ↓
Throttled progress event
 ↓
Learning Module
 ↓
Persistence
```

The exact interval should be controlled by the Learning architecture.

---

# 32. Network Resilience

Video playback may encounter:

```text
Network interruption
Slow connection
Temporary server error
Expired signed URL
Provider failure
```

The component should provide a stable error state.

---

# 33. Error State

Example:

```text
┌───────────────────────────────────┐
│                                   │
│              [ ⚠ ]                │
│       پخش ویدیو ممکن نیست         │
│                                   │
│          [ تلاش مجدد ]            │
│                                   │
└───────────────────────────────────┘
```

The exact wording may depend on localization.

---

# 34. Error Types

Possible categories:

```text
Network Error
Media Error
Unsupported Format
Authorization Error
Expired URL
Provider Error
Unknown Error
```

The UI should avoid exposing technical errors directly to learners.

---

# 35. Retry

A retry action may be provided:

```text
[ تلاش مجدد ]
```

The Video component can retry playback/loading.

Authentication or authorization failures should be handled by the appropriate higher-level module.

---

# 36. Loading State

Before metadata or media becomes available:

```text
┌───────────────────────────────────┐
│                                   │
│              Spinner              │
│                                   │
└───────────────────────────────────┘
```

Use the project's Loader/Spinner components where appropriate.

---

# 37. Poster During Loading

If a poster exists, it should preferably remain visible until the video is ready.

This avoids an empty black rectangle.

---

# 38. Skeleton vs Video Loader

Skeleton is suitable for:

```text
Page loading
Media container placeholder
```

Loader/Spinner is more suitable for:

```text
Playback preparation
Buffering
Retry
```

Do not use Skeleton for every playback state.

---

# 39. Buffering

During buffering:

```text
Video
   ↓
Buffering
   ↓
Small Loader
```

Avoid covering the entire screen unless playback is completely unavailable.

---

# 40. Autoplay

Autoplay should generally be disabled unless there is a specific product requirement.

Educational videos should not unexpectedly start with sound.

If autoplay is used:

```text
muted
```

may be required by browser policies.

---

# 41. Muted Autoplay

A valid use case may be:

```text
Course Preview
   ↓
Muted Autoplay
   ↓
User can enable sound
```

This should be explicitly configured.

---

# 42. Mobile Autoplay

Mobile browsers impose additional restrictions.

Do not rely on autoplay for core functionality.

The user should always be able to start playback manually.

---

# 43. Accessibility

Video must support:

```text
Keyboard
Screen Reader
Captions
Audio descriptions where available
Focus visibility
Accessible controls
```

---

# 44. Captions

Educational video should support captions whenever available.

Example:

```text
[ CC ]
```

Caption tracks may be:

```text
Persian
English
Other languages
```

---

# 45. Caption Format

Where supported:

```text
WebVTT
```

is a suitable standard for browser-native captions.

The media system should manage caption files.

---

# 46. Caption Selection

Example:

```text
زیرنویس
────────────
خاموش
فارسی
English
```

The available tracks should come from the video metadata.

---

# 47. Caption Accessibility

Captions should not be treated as merely decorative.

They improve:

* Accessibility
* Comprehension
* Searchability
* Learning
* Use in noisy environments

---

# 48. Keyboard Controls

Common keyboard actions may include:

```text
Space / K → Play/Pause
Arrow Left → Seek Back
Arrow Right → Seek Forward
M → Mute
F → Fullscreen
```

Exact shortcuts should be documented and must not conflict with browser/assistive technology behavior.

---

# 49. Focus Management

Video controls must have visible keyboard focus.

Do not remove outlines without providing an equivalent accessible focus indicator.

Use the project's Focus Ring tokens.

---

# 50. Touch Controls

On mobile:

```text
Tap → Play/Pause
Tap controls → Show/Hide controls
Swipe / Drag → Seek where supported
```

Controls should remain sufficiently large for touch interaction.

---

# 51. Touch Target

Interactive controls should follow the project's minimum touch target rules.

Avoid tiny icons such as:

```text
[•]
```

that are difficult to tap.

---

# 52. RTL

Video controls should support RTL layouts.

However, media semantics should not be incorrectly mirrored.

For example:

```text
Progress Timeline
```

may remain time-based according to the player convention.

The surrounding labels and menus should respect RTL.

---

# 53. Seeking in RTL

The player should carefully distinguish:

```text
UI direction
```

from:

```text
Time progression
```

RTL does not automatically mean video time should run from right to left.

Playback semantics must remain intuitive.

---

# 54. Typography

Video control typography should use the global typography tokens.

Examples:

```text
12:35
1×
720p
فارسی
```

must remain readable at compact sizes.

---

# 55. Colors

Video controls should use semantic Design Tokens.

Recommended conceptual layers:

```text
Video Surface
Control Surface
Control Icon
Control Text
Active State
Focus State
Progress Track
Progress Fill
```

Do not hard-code colors inside the component.

---

# 56. Dark Interface

Video players often benefit from a dark control surface even inside a light LMS page.

However, the exact player appearance should follow the product's visual language.

Do not introduce unrelated styling.

---

# 57. Border Radius

Video containers should normally use the same radius system as surrounding cards.

The project visual language uses rounded surfaces, with approximately 16px radii common in major containers.

---

# 58. Aspect Ratio

Default educational video ratio:

```text
16:9
```

should be supported.

Other ratios may include:

```text
4:3
1:1
9:16
auto
```

---

# 59. Responsive Video

Video must scale with its container.

Conceptually:

```text
Desktop
    ↓
Tablet
    ↓
Mobile
```

The player must not overflow horizontally.

---

# 60. Mobile Video

On mobile:

* Video should remain responsive.
* Controls should be touch-friendly.
* Text should remain readable.
* Fullscreen should be easy to access.
* Captions should remain usable.
* Important LMS navigation should not be hidden accidentally.

---

# 61. Lesson Page

The Lesson page may contain:

```text
Video
Lesson Title
Lesson Description
Resources
Notes
Navigation
Progress
```

Video owns only the media area.

---

# 62. Focus Mode Lesson Page

Focus Mode may reduce the surrounding interface:

```text
┌─────────────────────────────────────┐
│              VIDEO                  │
│                                     │
│                                     │
├─────────────────────────────────────┤
│ Lesson Controls                     │
└─────────────────────────────────────┘
```

The Lesson Player controls the layout.

---

# 63. Course Preview

Course Detail may use a preview video:

```text
Course
 ↓
Preview Video
 ↓
Course Information
```

The preview may have restricted playback.

The Course module controls preview eligibility.

---

# 64. Free Preview

If a lesson is publicly available:

```text
Visitor
 ↓
Preview Access
 ↓
Video
```

Video should not determine whether the lesson is free.

---

# 65. Locked Video

For a locked lesson:

```text
┌─────────────────────────────┐
│                             │
│           🔒                │
│      این درس قفل است        │
│                             │
│      [ ثبت‌نام در دوره ]     │
└─────────────────────────────┘
```

This is not the Video component's business logic.

A parent access/lesson state component should render the locked state.

---

# 66. Video Placeholder

When access exists but the video is not loaded:

```text
Video Container
 ↓
Poster / Placeholder
 ↓
Play
```

The container should maintain its intended aspect ratio.

---

# 67. Video and Image

Architecture:

```text
Video
├── Poster → Image
├── Player
└── Controls
```

Do not duplicate Image functionality.

---

# 68. Video and Button

Use the project's Button/Icon components for:

```text
Play
Mute
Fullscreen
Settings
Picture-in-Picture
```

Do not create unrelated button implementations.

---

# 69. Video and Tooltip

Tooltip can be used for compact controls:

```text
[ ⚙ ]
   ↓
تنظیمات پخش
```

The Tooltip component owns contextual explanation.

Video owns the action.

---

# 70. Video and Popover

Use Popover for richer settings:

```text
Settings
────────────
Playback Speed
Quality
Captions
```

Do not put a large settings panel inside Tooltip.

---

# 71. Video and Modal

Modal may be used for:

```text
Video Library
Quality Details
Transcript
```

where the content requires a larger interaction surface.

Video should not implement Modal behavior.

---

# 72. Transcript

Future versions may support transcript content.

Architecture:

```text
Video
 +
Transcript Panel
```

Transcript should be a separate component.

---

# 73. Transcript Synchronization

A future Transcript component may react to:

```text
currentTime
```

and highlight the active section.

The Video component only exposes playback time.

---

# 74. Analytics

Video may emit playback events useful for analytics.

Possible events:

```text
video_started
video_paused
video_completed
video_seeked
video_progress
video_speed_changed
video_fullscreen
```

The Analytics module owns event collection.

Video should not directly depend on analytics storage.

---

# 75. Privacy

Do not collect unnecessary viewing data.

If analytics are enabled, follow the project's privacy and consent architecture.

---

# 76. Security

Never expose sensitive media credentials in client-side source when avoidable.

Do not place private storage keys directly inside:

```text
HTML
JavaScript
Data attributes
```

Protected media access should be handled by the backend/media architecture.

---

# 77. Nonce and Authorization

WordPress authorization mechanisms may be required when requesting protected media metadata or signed URLs.

The Video component should consume authorized responses rather than implementing WordPress permission rules itself.

---

# 78. File Types

Common supported formats may include:

```text
video/mp4
video/webm
video/ogg
```

Actual browser/provider support must be checked.

Do not promise playback for unsupported codecs.

---

# 79. Unsupported Format

Example:

```text
این مرورگر از این فرمت ویدیو پشتیبانی نمی‌کند.
```

Provide an alternative when available.

---

# 80. Network Optimization

Use appropriate:

```text
Compression
Bitrate
Resolution
Adaptive Streaming
Caching
CDN
```

where supported by the infrastructure.

The plugin should not assume that every WordPress installation has a CDN.

---

# 81. Preload

Possible values:

```text
none
metadata
auto
```

Recommended default:

```text
metadata
```

or the value most appropriate for the product's performance strategy.

Avoid downloading large video files before the user requests playback.

---

# 82. Performance

Important performance principles:

```text
Do not preload huge videos unnecessarily.
Use poster images.
Load metadata intelligently.
Use responsive media.
Throttle progress events.
Avoid unnecessary re-renders.
Avoid excessive API requests.
```

---

# 83. API

Recommended component API:

```text
Video
    src
    poster
    width
    height
    aspectRatio
    controls
    autoplay
    muted
    loop
    preload
    playbackRate
    captions
    volume
    objectFit
    className
```

---

# 84. LMS Integration API

Optional events:

```text
onPlay
onPause
onEnded
onProgress
onError
onReady
onDurationChange
onPlaybackRateChange
onVolumeChange
onFullscreenChange
```

---

# 85. Controlled Playback

Advanced consumers may need:

```text
play()
pause()
seek(time)
setVolume(value)
setPlaybackRate(value)
```

These capabilities should be exposed through a controlled/ref-based API where appropriate.

---

# 86. Component Boundary

Video owns:

```text
Playback
Media State
Controls
Captions
Fullscreen
Buffering
Media Errors
Playback Events
```

Video does not own:

```text
Enrollment
Course Completion
Lesson Completion
Payment
Permissions
Certificate
User Progress Persistence
Analytics Storage
```

---

# 87. Do

* Keep Video reusable.
* Separate Video from Lesson Player.
* Support HTML5 video.
* Support poster images.
* Support captions.
* Support responsive layout.
* Support keyboard controls.
* Support fullscreen.
* Provide useful playback events.
* Handle buffering and errors.
* Keep progress tracking throttled.
* Respect accessibility.
* Support RTL UI.
* Use design tokens.
* Keep authorization outside Video.

---

# 88. Don't

Avoid:

* Putting enrollment logic inside Video.
* Calling completion APIs directly from Video.
* Storing private media credentials in the frontend.
* Autoplaying videos with sound unexpectedly.
* Loading full-resolution videos unnecessarily.
* Using Tooltip for complex settings.
* Making Video responsible for Lesson navigation.
* Hard-coding colors.
* Using arbitrary z-index values.
* Assuming every browser supports every codec.
* Making Video dependent on a specific Theme.

---

# 89. Testing Requirements

## Playback

```text
Play
Pause
Seek
Mute
Volume
Speed
Fullscreen
Picture-in-Picture
```

## Media

```text
MP4
WebM
Invalid URL
Missing Source
Slow Network
Expired URL
Unsupported Format
```

## States

```text
Loading
Ready
Playing
Paused
Buffering
Ended
Error
Locked
```

## Accessibility

```text
Keyboard
Screen Reader
Captions
Focus
Accessible Labels
Reduced Motion
```

## Responsive

```text
Desktop
Tablet
Mobile
Fullscreen
Portrait
Landscape
```

## RTL

```text
Persian UI
English UI
Mixed Persian/English
```

## WordPress

```text
Classic Theme
Block Theme
Frontend
Admin
Media Library
Plugin Conflict
```

---

# 90. Architecture Decision

Iran LMS follows a **Layered Video Architecture**:

```text
                 LMS
                  │
          ┌───────┴────────┐
          │                │
       Lesson          Course Preview
          │                │
          └───────┬────────┘
                  ↓
             Lesson Player
                  ↓
                Video
          ┌───────┼────────┐
          ↓       ↓        ↓
       Poster   Controls  Events
          ↓
        Image
```

This architecture keeps the Video component reusable while allowing the LMS to build richer learning experiences around it.

---

# 91. Strategic Vision

Video is one of the most important media primitives in Iran LMS because learning content is frequently video-based.

The long-term goal is a **high-performance, accessible, secure, responsive and Theme-independent video system** that can serve:

* Course lessons
* Lesson previews
* Focus Mode
* Course previews
* Video resources
* Future streaming providers
* Future transcript systems
* Future analytics integrations

The component should remain a media engine, while all LMS-specific meaning and business rules stay in the appropriate modules.
