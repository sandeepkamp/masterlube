# MasterLube — Laravel CMS

A fully admin-manageable Laravel 12 CMS rebuild of the MasterLube marketing site (automatic lubrication systems for racing, marine, street rod, classic/exotic cars, motorcycle, commercial, and aviation applications).

## Tech Stack

- Laravel 12, PHP 8.2+
- MySQL/MariaDB (production and local dev)
- Blade + Bootstrap 5.3 (matching the supplied HTML design)
- Vite for asset compilation
- Hand-rolled admin panel (no CMS/admin package dependency)

## 1. Local Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials (see §2), then:

```bash
php artisan migrate
php artisan storage:link
php artisan db:seed
npm run build      # or `npm run dev` while developing
php artisan serve
```

Visit `http://127.0.0.1:8000`. Admin panel: `http://127.0.0.1:8000/admin/login`.

## 2. Environment Configuration

Copy `.env.example` to `.env` and configure:

| Variable | Purpose |
|---|---|
| `APP_URL` | Full base URL **including any subfolder** (see §6) — used to generate all asset/route/storage URLs |
| `APP_ENV` / `APP_DEBUG` | Set `APP_ENV=production` and `APP_DEBUG=false` before going live |
| `DB_*` | MySQL/MariaDB connection |
| `MAIL_*` | SMTP credentials for enquiry notification emails |
| `ADMIN_EMAIL` / `ADMIN_PASSWORD` | Initial super-admin account created by `AdminUserSeeder`. If `ADMIN_PASSWORD` is left blank, a random password is generated and printed once to the console during seeding — **do not commit real credentials to `.env`** |
| `QUEUE_CONNECTION` | `database` — enquiry notification emails are queued, not sent synchronously (see §5) |

## 3. Database Setup

```bash
php artisan migrate --force
php artisan db:seed --force
```

Seeding is idempotent (uses `updateOrCreate`) and can be re-run safely. It creates:
- The initial super-admin user
- Site settings, navigation, and all content seeded verbatim from the supplied HTML design (industries, testimonials, FAQs, accessories, dealers, partner links, magazines, install gallery, car clubs, CMS pages)

## 4. Admin Panel

- Login: `/admin/login`
- Roles: `super_admin` (full access, including Settings and Admin Users) and `admin` (all content modules and Enquiries)
- Every content module (Industries, Accessories, Testimonials, Dealers, Partner Links, Magazines, News, Install Gallery, Car Clubs, FAQs, CMS Pages, Enquiries, and all static pages) is manageable from the sidebar — nothing described above is hardcoded in Blade templates.

To create additional admin users, use `php artisan tinker`:

```php
App\Models\User::create([
    'name' => 'Jane Admin',
    'email' => 'jane@example.com',
    'password' => 'a-strong-password',
    'role' => App\Enums\UserRole::Admin, // or ::SuperAdmin
]);
```

## 5. Storage & Media

Uploaded images are stored on the `public` disk (`storage/app/public`) and organized by module (`industries/`, `accessories/`, `magazines/`, etc.). The design assets ported from the original HTML live under `storage/app/public/site/`.

**Symlink note:** `php artisan storage:link` creates the conventional `public/storage` symlink. On shared hosts where this symlink can't be created or doesn't survive a zip-upload deployment, Laravel's built-in disk-serving route (`config/filesystems.php` → `'public' => ['serve' => true, ...]`) automatically serves the same files at the same `/storage/...` URLs as a fallback — no extra configuration needed, and no application code changes required if the symlink is later restored.

**Mail queue:** enquiry notification emails are queued (`QUEUE_CONNECTION=database`), not sent synchronously, so a slow SMTP server never blocks the visitor's form submission — and if the mail send fails, the enquiry is still saved (it's written to the database before the mail is dispatched). On shared hosting without a persistent worker process, add a cron entry:

```
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```

and register a scheduled `queue:work --stop-when-empty` call in `routes/console.php`, or run `php artisan queue:work` as a persistent process on a VPS.

## 6. Deployment

### VPS / dedicated server (recommended default)

Point the web server's document root directly at the `public/` folder. This is the simplest and most standard Laravel deployment — no special configuration needed beyond the `.env` values above.

### Shared hosting (cPanel) — document root can be set to `public/`

Most modern cPanel hosts let you set a subdomain or addon domain's document root to any folder. Point it at this project's `public/` directory. Everything works exactly as on a VPS.

### Shared hosting — document root CANNOT be changed (project lives in `public_html/`)

If the host forces the domain's document root to be `public_html/` and the Laravel project must be uploaded as a subfolder of it (e.g. `public_html/masterlube/`), add two files at `public_html/` (the actual document root):

**`public_html/index.php`:**
```php
<?php
require __DIR__.'/masterlube/public/index.php';
```

**`public_html/.htaccess`** (rewrites everything else into the app's own `public/` folder so CSS/JS/images resolve correctly):
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/masterlube/public/
    RewriteRule ^(.*)$ /masterlube/public/$1 [L]
</IfModule>
```

Replace `masterlube` with the actual folder name you uploaded the project into. Set `APP_URL` in `.env` to the site's real public URL (e.g. `https://example.com`, not `https://example.com/masterlube`).

### Subfolder deployment (site lives at `https://example.com/masterlube/`)

1. Set the subdomain/addon domain's document root to `.../masterlube/public/` if the host allows it (preferred — no rewrite tricks needed).
2. Set `APP_URL=https://example.com/masterlube` in `.env` — every `route()`, `asset()`, and `Storage::url()` call in the app derives from this, so nothing is hardcoded to the domain root.
3. If the document root cannot be changed, use the `public_html/index.php` + `.htaccess` recipe above, adjusted so the rewrite rule targets `/masterlube/public/`.

### Production checklist

- [ ] `APP_ENV=production`, `APP_DEBUG=false`
- [ ] `APP_URL` set to the real, final URL (including subfolder if applicable)
- [ ] Real `DB_*` credentials, database created, `php artisan migrate --force` run
- [ ] `ADMIN_EMAIL`/`ADMIN_PASSWORD` set to real values **before** running `db:seed` in production (don't rely on the auto-generated password over an unencrypted channel)
- [ ] Real `MAIL_*` SMTP credentials configured and tested (submit a test enquiry)
- [ ] `php artisan storage:link` run (or confirmed the disk-serving fallback works, §5)
- [ ] `php artisan config:cache && php artisan route:cache && php artisan view:cache` for production performance
- [ ] `npm run build` run so `public/build/` contains the compiled, versioned assets referenced by `@vite(...)`
- [ ] File upload limits (`upload_max_filesize`, `post_max_size` in PHP) checked — magazine/gallery uploads are the largest files admins will submit
- [ ] Queue worker or cron (§5) confirmed running so enquiry emails actually send
- [ ] Full walkthrough: submit both enquiry forms, log into admin, edit a page, upload an image, confirm it appears on the live site

## 7. Project-Specific Notes

- The root `html-design/index.html` is an unrelated, unused design concept (different CSS/JS/images, no header/nav) and was intentionally **not** migrated — only `html-design/Masterlube-homepage/` was rebuilt.
- Several known quirks from the source design were preserved verbatim per an explicit content-fidelity decision made during development: the "Staff" nav item actually links to an accessories catalog, "Custom House" is a typo for "Custom Hose", several nav/footer links are intentionally dead (`href="#"`/`href=""`), and `faq.html`'s one duplicate question was kept as-is. All of this is editable through the admin panel — the seeded content simply matches the source's current state rather than "fixing" it silently.
