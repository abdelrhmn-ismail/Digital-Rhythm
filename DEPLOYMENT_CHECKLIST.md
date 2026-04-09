# Deployment Checklist for Digital-Rhythm (Golden Bee)

## Pre-Deployment Checklist

### 1. Environment Configuration
- [ ] Copy `.env.example` to `.env`
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate new `APP_KEY` using `php artisan key:generate`
- [ ] Configure database credentials (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
- [ ] Set mail configuration (MAIL_MAILER, MAIL_HOST, etc.)
- [ ] Configure `APP_URL` to production URL

### 2. Security
- [ ] Ensure `.env` is in `.gitignore`
- [ ] Set proper file permissions:
  - `chmod 755 storage bootstrap/cache`
  - `chmod 644 .env`
- [ ] Remove development tools and debug packages
- [ ] Verify CSRF protection is enabled
- [ ] Check all form validations are in place
- [ ] Verify SQL injection prevention (Eloquent/Query Builder used)
- [ ] Check XSS prevention (Blade's {{ }} escaping)
- [ ] Verify file upload restrictions (max size, allowed types)

### 3. Database
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Run seeders: `php artisan db:seed --force` (if needed)
- [ ] Backup database before deployment
- [ ] Verify all foreign key constraints

### 4. Assets
- [ ] Install NPM dependencies: `npm install`
- [ ] Build production assets: `npm run build`
- [ ] Verify all CSS and JS files compile without errors
- [ ] Check all images are optimized

### 5. Storage & Cache
- [ ] Create storage link: `php artisan storage:link`
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Clear config cache: `php artisan config:clear`
- [ ] Clear route cache: `php artisan route:clear`
- [ ] Clear view cache: `php artisan view:clear`
- [ ] Cache configuration: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache views: `php artisan view:cache`

### 6. SEO
- [ ] Verify `sitemap.xml` is accessible at `/sitemap.xml`
- [ ] Verify `robots.txt` is accessible at `/robots.txt`
- [ ] Check all meta tags are present
- [ ] Verify Open Graph tags working
- [ ] Test canonical URLs
- [ ] Submit sitemap to Google Search Console

### 7. Testing
- [ ] Test all pages on production server
- [ ] Test all forms (contact, admin login, etc.)
- [ ] Test language switching (EN/AR)
- [ ] Test RTL layout for Arabic
- [ ] Test mobile responsiveness
- [ ] Test all admin CRUD operations
- [ ] Test file uploads
- [ ] Verify all animations working
- [ ] Check browser console for errors

### 8. Performance
- [ ] Enable OPcache for PHP
- [ ] Configure CDN (if using)
- [ ] Enable gzip/brotli compression
- [ ] Set proper cache headers
- [ ] Optimize images (use WebP format)
- [ ] Minimize CSS and JS
- [ ] Use lazy loading for images

### 9. Monitoring
- [ ] Set up error logging (logs/storage)
- [ ] Configure application monitoring
- [ ] Set up uptime monitoring
- [ ] Configure database backup schedule
- [ ] Set up SSL certificate auto-renewal

### 10. Admin Access
- [ ] Create admin user with strong password
- [ ] Change default admin credentials
- [ ] Test admin login
- [ ] Verify admin permissions
- [ ] Document admin URL and credentials (securely)

---

## Deployment Commands (Run in Order)

```bash
# 1. Navigate to project directory
cd /path/to/digital-rhythm

# 2. Pull latest code (if using Git)
git pull origin main

# 3. Install PHP dependencies
composer install --optimize-autoloader --no-dev

# 4. Install NPM dependencies
npm ci

# 5. Build production assets
npm run build -- --production

# 6. Set environment
cp .env.example .env
# Edit .env with production values

# 7. Generate app key
php artisan key:generate

# 8. Run migrations
php artisan migrate --force

# 9. Seed database (if needed)
php artisan db:seed --force

# 10. Create storage link
php artisan storage:link

# 11. Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 12. Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 13. Set permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# 14. Restart PHP-FPM (if applicable)
sudo systemctl restart php-fpm

# 15. Restart Nginx/Apache (if needed)
sudo systemctl restart nginx
```

---

## Post-Deployment Checklist

### Immediate Checks
- [ ] Homepage loads correctly
- [ ] All navigation links work
- [ ] Language switching works (EN/AR)
- [ ] Contact form submits successfully
- [ ] Admin panel accessible
- [ ] Admin CRUD operations work
- [ ] File uploads working
- [ ] All images load properly
- [ ] No console errors in browser

### SEO Verification
- [ ] Visit `/sitemap.xml` - should show XML sitemap
- [ ] Visit `/robots.txt` - should show allow rules
- [ ] Check page source for meta tags
- [ ] Verify Open Graph tags with Facebook Debugger
- [ ] Test with Google Mobile-Friendly Test

### Performance Testing
- [ ] Run Lighthouse audit (target: >90)
- [ ] Check page load time (<3 seconds)
- [ ] Verify image optimization
- [ ] Test on slow connections (3G)

### Security Verification
- [ ] Try accessing `/.env` - should return 404/403
- [ ] Try accessing `/storage` directly - should be restricted
- [ ] Test CSRF protection (submit form from external site)
- [ ] Verify HTTPS is working
- [ ] Check security headers with securityheaders.com

---

## Rollback Plan

If issues occur after deployment:

```bash
# 1. Rollback last migration
php artisan migrate:rollback --force

# 2. Restore previous code version
git checkout <previous-commit-hash>

# 3. Clear caches
php artisan cache:clear
php artisan config:clear

# 4. Restore database from backup
mysql -u username -p database_name < backup.sql

# 5. Restart services
sudo systemctl restart php-fpm
sudo systemctl restart nginx
```

---

## Ongoing Maintenance

### Weekly
- [ ] Check error logs
- [ ] Review contact messages
- [ ] Monitor uptime

### Monthly
- [ ] Update PHP dependencies: `composer update`
- [ ] Update NPM dependencies: `npm update`
- [ ] Review and optimize database
- [ ] Backup database
- [ ] Clear old cache entries

### Quarterly
- [ ] Review and update content
- [ ] Check for security updates
- [ ] Performance audit
- [ ] SEO audit
- [ ] User feedback review

---

## Support Contacts

- **Hosting Provider:** [Your hosting details]
- **Domain Registrar:** [Your registrar details]
- **SSL Certificate:** [Your SSL provider]
- **Backup Service:** [Your backup solution]

---

**Last Updated:** April 9, 2026
**Deployed By:** [Your Name]
**Version:** 1.0.0
