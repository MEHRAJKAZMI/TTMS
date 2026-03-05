# Teacher Training Management System (TTMS)

A Laravel 12 architecture blueprint for a production-grade **Teacher Training Management System** with AdminLTE UI, RBAC, class lifecycle management, attendance, assessments, certificates, DMC generation, reporting, and audit logs.

## Key Capabilities

- **Secure Auth + RBAC** using Spatie Permissions with roles:
  - Admin
  - Trainer
  - Teacher
  - Editor
- **Training Program Management** with preconfigured categories:
  - AT, CT, DM, PET, PST, QARI / QARIA, SST variants, TT
- **Class Operations**
  - Trainer assignment
  - Teacher enrollment + progress
  - Attendance tracking
  - Assessment & result entry
- **Certificates & DMC**
  - Training completion certificate (PDF)
  - Detailed Marks Certificate (DMC)
- **Reports**
  - Class summary PDF export
  - Extensible Excel export service
- **Auditability**
  - Service-based audit logging for critical actions

## Architecture

- **MVC + RESTful controllers** under `app/Http/Controllers`
- **Validation** via FormRequests
- **Authorization** via role middleware and permissions
- **Service layer** for certificate generation, reporting, and audit logs
- **Database** with normalized schema, constraints, and indexes

## Important Files

- Routes: `routes/web.php`, `routes/api.php`
- Domain models: `app/Models/*`
- Enums: `app/Enums/*`
- Services:
  - `app/Services/AuditLogService.php`
  - `app/Services/Certificates/CertificateGenerator.php`
  - `app/Services/Reports/ReportExportService.php`
- Migrations: `database/migrations/*`
- Seeders: `database/seeders/*`
- AdminLTE Layout: `resources/views/layouts/app.blade.php`

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Notes

- This repository intentionally focuses on a **clean, scalable Laravel 12 structure** and core feature implementation.
- For production: add queues for bulk certificate exports, storage policies, CI, advanced test coverage, and tenancy/sharding if needed for very large institutional data.
