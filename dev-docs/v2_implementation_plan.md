# Dynamic Public Layout & Admin Panel Setup

This plan outlines the steps to make the newly recreated HTC Pajak layout dynamic by connecting it to your existing database tables, and setting up an admin panel to manage the content.

## User Review Required

> [!IMPORTANT]
> **Admin Panel Choice:** How would you like the admin panel to be built?
> 1. **Filament PHP (Recommended):** A very fast, modern, and powerful admin panel builder for Laravel. It will automatically generate beautiful CRUD interfaces for all your tables.
> 2. **Laravel Breeze / UI (Manual):** A traditional admin panel where I build standard HTML/Blade forms for every single table.
>
> *Please reply with your preference.*

## Proposed Changes

### 1. Eloquent Models Generation
I will generate Laravel Eloquent models for the tables defined in your migration:
- `Berita` (News)
- `Kategori` (Categories)
- `Agenda`
- `Album` (Photos/Gallery)
- `Identitas` (Website settings)
- `Banner`
- `Menu`

### 2. HomeController & Dynamic Public Views
I will create a `HomeController` to fetch real data from the database and pass it to your views.

#### [MODIFY] [routes/web.php](file:///c:/laragon/www/newhtc/routes/web.php)
- Point the `/` route to `HomeController@index`.

#### [MODIFY] [app.blade.php](file:///c:/laragon/www/newhtc/resources/views/layouts/app.blade.php)
- Fetch the dynamic date.
- Fetch the dynamic "BREAKING NEWS" ticker from the `Berita` table (e.g., latest news with `headline = 'Y'`).
- (Optional) Fetch dynamic menus if `Menu` table is populated.

#### [MODIFY] [welcome.blade.php](file:///c:/laragon/www/newhtc/resources/views/welcome.blade.php)
- **Center Slider:** Fetch latest `Berita` with images for the carousel.
- **Berita Terbaru:** Loop through the latest `Berita` records.
- **Berita Populer:** Loop through `Berita` ordered by `dibaca` (most read).
- **Foto Terbaru:** Fetch from the `Album` table.
- **Agenda/Video:** Fetch from respective tables.

### 3. Admin Panel Installation
Depending on your choice (Filament or Manual), I will:
- Install the required packages.
- Set up authentication (Login/Logout for admin).
- Generate CRUD resources (Create, Read, Update, Delete) for News, Categories, Albums, etc.

## Verification Plan
1. **Database:** Ensure tables exist and can be seeded with dummy data.
2. **Public View:** Verify the homepage loads data dynamically from the database without errors.
3. **Admin Panel:** Verify the admin login works and we can add a new "Berita" and see it instantly appear on the public homepage.
