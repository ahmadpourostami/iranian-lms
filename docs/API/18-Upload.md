# 18-Upload.md

# File Upload API

**Version:** 1.0
**Status:** Draft

---

# 1. Purpose

This document defines the file upload architecture for the Iran LMS API.

The Upload API provides a centralized service for uploading, validating, storing, and managing all user-generated files across the platform.

All modules must use this service instead of implementing custom upload logic.

---

# 2. Goals

The upload system should:

* Be secure
* Support large files
* Be storage-independent
* Support resumable uploads
* Optimize media delivery
* Scale horizontally

---

# 3. Supported Resources

The Upload API supports:

* Course Thumbnails
* Lesson Videos
* Lesson Attachments
* Downloadable Resources
* Assignment Files
* Student Submissions
* Profile Avatars
* Instructor Avatars
* Certificate Assets
* Badge Images
* Organization Logos

Future modules may reuse the same service.

---

# 4. Base Endpoint

```text
/api/v1/uploads
```

---

# 5. Authentication

Uploads require authentication.

```text
Bearer Token
```

Public uploads are not supported unless explicitly configured.

---

# 6. Supported File Types

Images

```text
jpg

jpeg

png

webp

svg
```

Documents

```text
pdf

docx

xlsx

pptx

zip
```

Videos

```text
mp4

mov

webm
```

Audio

```text
mp3

wav

ogg
```

Administrators may extend supported types.

---

# 7. Upload Limits

Example defaults

| Type     | Maximum Size |
| -------- | -----------: |
| Image    |        10 MB |
| Document |        50 MB |
| Audio    |       200 MB |
| Video    |         5 GB |
| Archive  |       500 MB |

Limits should be configurable.

---

# 8. Upload Endpoint

```http
POST /uploads
```

Content-Type

```text
multipart/form-data
```

Example Response

```json
{
  "success": true,
  "data": {
    "file_uuid": "01J...",
    "status": "uploaded"
  }
}
```

---

# 9. Chunk Upload

Large files may be uploaded in chunks.

Workflow

```text
Create Upload Session

↓

Upload Chunks

↓

Verify Chunks

↓

Assemble File

↓

Completed
```

Recommended for videos larger than 100 MB.

---

# 10. Upload Session

Create upload session

```http
POST /uploads/session
```

Response

```json
{
  "upload_uuid": "...",
  "chunk_size": 5242880
}
```

---

# 11. Upload Chunk

```http
PUT /uploads/session/{uuid}
```

Headers

```text
Content-Range

Upload-Offset
```

Each chunk is validated independently.

---

# 12. Complete Upload

```http
POST /uploads/session/{uuid}/complete
```

The server verifies:

* Missing chunks
* Checksum
* File integrity

Event

```text
UploadCompleted
```

---

# 13. File Metadata

Every uploaded file stores:

* UUID
* Original Filename
* MIME Type
* Extension
* Size
* Width (Images)
* Height (Images)
* Duration (Audio/Video)
* Checksum
* Uploaded By
* Uploaded At
* Storage Provider

---

# 14. File Retrieval

Metadata

```http
GET /uploads/{uuid}
```

Download

```http
GET /uploads/{uuid}/download
```

Preview

```http
GET /uploads/{uuid}/preview
```

Authorization is checked before access.

---

# 15. Image Processing

Images may automatically generate:

* Thumbnail
* Medium
* Large
* Original

Additional processing may include:

* Compression
* Orientation Correction
* Format Conversion
* Metadata Cleanup

---

# 16. Video Processing

Video pipeline may include:

* Metadata Extraction
* Thumbnail Generation
* Duration Detection
* Resolution Detection
* Transcoding (Future)
* Adaptive Streaming (Future)

Processing should occur asynchronously.

---

# 17. Storage Providers

Supported providers:

* Local Storage
* Amazon S3
* Cloudflare R2
* Google Cloud Storage
* Azure Blob Storage
* MinIO
* FTP/SFTP (Optional)

The API remains storage-agnostic.

---

# 18. Security

Every uploaded file must be validated.

Validation includes:

* MIME Type
* File Extension
* File Signature (Magic Bytes)
* Maximum Size
* Virus Scan (Optional)
* Malware Detection (Future)

Executable files should be rejected by default.

---

# 19. Access Control

Files may have one of the following visibility levels:

```text
Private

Protected

Public
```

Protected files require authorization before download.

Course videos should use Protected visibility by default.

---

# 20. Expiring Download URLs

Temporary download links may be generated.

Example

```http
POST /uploads/{uuid}/temporary-url
```

Response

```json
{
  "url": "...",
  "expires_at": "2026-08-04T12:00:00Z"
}
```

Temporary URLs improve security for private assets.

---

# 21. Upload Status

Possible states

```text
Pending

Uploading

Processing

Completed

Failed

Cancelled
```

---

# 22. Validation Errors

Examples

```text
FILE_TOO_LARGE

FILE_TYPE_NOT_ALLOWED

INVALID_CHECKSUM

UPLOAD_NOT_FOUND

UPLOAD_INCOMPLETE

UPLOAD_SESSION_EXPIRED
```

Validation errors return HTTP 422.

---

# 23. Performance Rules

The upload system should:

* Stream uploads
* Avoid loading entire files into memory
* Support resumable uploads
* Process media asynchronously
* Compress images
* Cache metadata

Large uploads should never block web requests.

---

# 24. Mobile Considerations

Mobile applications should:

* Resume interrupted uploads
* Retry failed chunks
* Compress images before upload
* Upload in the background
* Display upload progress

Chunk uploads are recommended for unstable networks.

---

# 25. Events

The Upload service publishes:

```text
UploadStarted

UploadChunkReceived

UploadCompleted

UploadProcessingStarted

UploadProcessingCompleted

UploadDeleted
```

Other modules may subscribe to these events.

---

# 26. Future Expansion

The upload architecture supports:

* AI Content Moderation
* Automatic Subtitle Generation
* OCR for Documents
* Speech-to-Text
* Video Transcoding
* HLS/DASH Streaming
* CDN Integration
* Multi-Region Storage

These capabilities should not require breaking API changes.

---

# 27. Design Principles

The upload system must remain:

* Secure
* Reliable
* Storage Independent
* Scalable
* Event-Driven
* Extensible
* Backward Compatible

All media handling should be centralized within the Upload service.

---

# 28. Upload Lifecycle

```text
Client

↓

Authentication

↓

Validation

↓

Upload Session

↓

Chunk Upload

↓

Integrity Verification

↓

Storage

↓

Media Processing

↓

Metadata Extraction

↓

Event Publishing

↓

Available for Use
```

This lifecycle ensures consistency for every uploaded file, regardless of its type or storage provider.

---

# 29. File References

Business entities should reference uploaded files by UUID rather than physical paths.

Example

```json
{
  "thumbnail_uuid": "01JABCDEF...",
  "video_uuid": "01JXYZ123..."
}
```

This abstraction allows files to move between storage providers without affecting application logic or API consumers.
