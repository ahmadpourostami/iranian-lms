# SCORM.md

# SCORM Module

**Version:** 1.0
**Status:** Future Architecture

---

# 1. Purpose

The SCORM module enables Iran LMS to import, launch, track, and report SCORM-compliant learning content.

It provides compatibility with industry-standard e-learning packages while integrating seamlessly with the platform's learning, reporting, certificates, and analytics systems.

The module supports enterprise customers that require standardized digital learning content.

---

# 2. Vision

SCORM support is not simply a file upload feature.

It is a complete runtime environment that allows externally authored learning content to behave as native learning activities within Iran LMS.

The architecture is designed to support future e-learning standards beyond SCORM.

---

# 3. Responsibilities

The SCORM module is responsible for:

* SCORM Package Import
* Package Validation
* SCORM Runtime
* Learning Progress Tracking
* Attempt Management
* Completion Tracking
* Score Synchronization
* Runtime Communication
* Reporting Integration
* Package Versioning

---

# 4. Business Boundaries

The SCORM module owns:

* SCORM Packages
* Runtime Sessions
* Attempts
* Runtime Data
* Package Metadata
* Launch Configuration

The module does **not** own:

* Courses
* Users
* Certificates
* Reports
* Learning Progress

Business modules reference SCORM activities through SCORM Package IDs.

---

# 5. SCORM Aggregate

```text id="ke8vfs"
SCORM
│
├── Package
├── Manifest
├── Runtime
├── Attempts
├── Progress
├── Scores
├── Sessions
└── Reports
```

Every imported package has an independent lifecycle.

---

# 6. Supported Standards

Supported specifications

```text id="7zbkpi"
SCORM 1.2

SCORM 2004 2nd Edition

SCORM 2004 3rd Edition

SCORM 2004 4th Edition
```

The architecture allows future standards to be added without redesign.

---

# 7. Package Entity

Each package contains:

* UUID
* Title
* Version
* Standard
* Manifest
* Launch URL
* Organization
* Status
* Created At
* Updated At

The package is immutable after publication except for metadata.

---

# 8. Package Import Workflow

```text id="w1qvhe"
Upload Package

↓

Validate Archive

↓

Extract Files

↓

Read Manifest

↓

Store Assets

↓

Register Package

↓

Ready
```

Invalid packages are rejected before publication.

---

# 9. Manifest Processing

The module parses:

* Course Structure
* Organizations
* SCOs
* Assets
* Metadata
* Navigation Rules
* Launch Information

Manifest parsing follows SCORM specifications.

---

# 10. Runtime Environment

The runtime provides:

* SCORM API Adapter
* Data Persistence
* Progress Tracking
* Session State
* Error Handling
* Resume Support

Runtime behavior should comply with the selected SCORM version.

---

# 11. Runtime Data

Tracked data includes:

* Lesson Status
* Completion Status
* Success Status
* Score
* Session Time
* Total Time
* Bookmark
* Suspend Data

Runtime data is stored independently from course data.

---

# 12. Attempts

Supported attempt policies

```text id="k7ymbd"
Single Attempt

Unlimited Attempts

Instructor Limited

Organization Policy
```

Attempts are configurable per package.

---

# 13. Completion Rules

Completion may be determined by:

* Runtime Status
* Score Threshold
* Completion Threshold
* Instructor Approval
* Organization Policy

Rules integrate with the Learning module.

---

# 14. Score Synchronization

The module synchronizes:

* Raw Score
* Maximum Score
* Minimum Score
* Passing Score
* Final Score

Scores are published through domain events.

---

# 15. Events

Consumed events

```text id="4y9h4n"
EnrollmentCreated

CourseStarted

LessonOpened
```

Published events

```text id="9d3ozu"
ScormPackageImported

ScormAttemptStarted

ScormAttemptCompleted

ScormProgressUpdated

ScormScoreUpdated
```

Other modules consume these events.

---

# 16. Validation

Examples

```text id="e5fjq9"
INVALID_SCORM_PACKAGE

INVALID_MANIFEST

UNSUPPORTED_VERSION

LAUNCH_FAILED

RUNTIME_ERROR

ATTEMPT_NOT_FOUND
```

Validation follows global API standards.

---

# 17. Performance

The SCORM module should:

* Cache manifests
* Optimize runtime communication
* Support large packages
* Minimize launch latency
* Queue package extraction

Runtime performance should remain predictable.

---

# 18. Mobile Considerations

Mobile applications should support:

* SCORM Launch
* Progress Synchronization
* Resume Learning
* Offline Progress Queue (Future)
* Session Recovery

The runtime should adapt to mobile environments whenever possible.

---

# 19. Future Expansion

The architecture supports:

* xAPI (Tin Can API)
* cmi5
* LTI Integration
* Interactive Simulations
* Offline Learning Packages
* VR Learning Content
* AI-assisted Content Analysis

Future standards should integrate through the same abstraction layer.

---

# 20. Internal Components

```text id="keb8dy"
SCORM
│
├── Package Manager
├── Manifest Parser
├── Runtime Engine
├── Session Manager
├── Attempt Manager
├── Progress Tracker
├── Validation Engine
├── SCORM API
└── Event Publisher
```

Each component has a single responsibility.

---

# 21. Module Dependencies

The SCORM module depends on:

```text id="v95xjx"
Core

Media

Learning

Courses
```

Optional integrations

```text id="o92szq"
Reports

Certificates

Organizations

AI
```

Business modules remain independent of SCORM internals.

---

# 22. Ownership Boundaries

| Data              | Owner Module |
| ----------------- | ------------ |
| Course            | Courses      |
| Lesson            | Courses      |
| Learning Progress | Learning     |
| Media Files       | Media        |
| SCORM Package     | SCORM        |
| Runtime Session   | SCORM        |
| SCORM Attempt     | SCORM        |

Only the SCORM module owns runtime-specific data.

---

# 23. Learning Workflow

```text id="jbxgdx"
Enroll

↓

Launch SCORM

↓

Runtime Session

↓

Progress Tracking

↓

Completion

↓

Score

↓

Learning Updated

↓

Certificate (Optional)
```

SCORM content integrates naturally into the learner journey.

---

# 24. Security

The SCORM module should provide:

* Package Validation
* File Type Verification
* Sandbox Execution
* Runtime Isolation
* Asset Authorization
* Audit Logging

Imported packages must never compromise platform security.

---

# 25. Analytics

Collected metrics include:

* Package Launches
* Completion Rate
* Average Score
* Time Spent
* Runtime Errors
* Attempt Count
* Package Popularity

Analytics are consumed by the Reports module.

---

# 26. Design Principles

The SCORM module must remain:

* Standards-Compliant
* Runtime-Isolated
* Event-Driven
* Scalable
* Secure
* Extensible
* Backward Compatible

SCORM support should integrate naturally without changing the core learning model.

---

# 27. Standards Abstraction

The module introduces a learning content abstraction.

```text id="tbm3hn"
Learning Content

↓

Native Lesson

SCORM

xAPI

cmi5

Future Formats
```

Business modules interact with **Learning Content**, not directly with SCORM.

This abstraction allows additional learning standards to be introduced without modifying course or learning logic.

---

# 28. Design Decision

The SCORM module follows a **Runtime Adapter Pattern**.

```text id="tgwc2t"
Course

↓

Learning Activity

↓

Runtime Adapter

↓

SCORM Runtime

↓

Progress Events
```

The Learning module communicates with a generic runtime interface, while the SCORM module implements the protocol-specific behavior.

This keeps the core LMS independent of any single e-learning standard.

---

# 29. Enterprise Readiness

The architecture supports enterprise learning requirements, including:

* Large SCORM repositories
* Multi-organization deployments
* High-volume concurrent sessions
* Compliance reporting
* Historical attempt tracking
* Enterprise content libraries
* Standards evolution
* High-availability runtime services

These capabilities allow Iran LMS to support universities, corporations, government agencies, and enterprise training providers that rely on standardized e-learning content.

---

# 30. Strategic Vision

The SCORM module is the first step toward a **Universal Learning Content Platform**.

Rather than treating SCORM as a special case, Iran LMS introduces a unified learning content architecture where native lessons, SCORM packages, xAPI experiences, cmi5 activities, simulations, and future educational formats coexist under a single extensible framework.

This approach ensures long-term compatibility with evolving e-learning standards while preserving a clean and maintainable platform architecture.
