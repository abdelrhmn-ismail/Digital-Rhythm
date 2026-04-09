# Golden Bee Marketing Website

Modern marketing agency website built with Laravel 12, Blade, and Tailwind CSS.
> **Project Rules:** Always review `DEVELOPMENT_RULES.md` before coding or planning; Codex must reopen it each session.

## Setup
```bash
composer install
npm install
npm run build
php artisan serve
```

- Copy `.env.example` to `.env` and set `MAIL_CONTACT_RECIPIENT` to the inbox that should receive website inquiries.

## Features
- Responsive design with golden theme
- Multiple pages (Home, About, Services, Portfolio, Contact)
- Tailwind CSS without Vite
- Alpine.js interactions

## Structure
- `resources/views/` - Blade templates
- `resources/css/app.css` - Custom styles
- `tailwind.config.js` - Tailwind config
