# Admin Content Management System

This document provides a comprehensive guide to the Golden Bee admin dashboard for managing website content including testimonials, services, and portfolio items.

## 🎯 **Overview**

The admin system provides complete content management capabilities:
- **Testimonials Management**: Customer reviews and ratings
- **Services Management**: Service offerings with pricing
- **Portfolio Management**: Project showcase with images
- **Image Gallery**: Downloaded images from goldenbee.sa
- **Admin Authentication**: Secure login system

## 📊 **Content Types**

### **Testimonials**
Customer reviews and testimonials with:
- **Client Information**: Name, position, company
- **Content**: Testimonial text
- **Rating**: 1-5 star rating system
- **Image**: Optional client photo
- **Status**: Featured/Active toggles
- **Order**: Custom display ordering

### **Services**
Service offerings with comprehensive details:
- **Basic Info**: Title, slug, description
- **Pricing**: Fixed, hourly, or project-based pricing
- **Features**: List of service features
- **Media**: Service image and icon
- **Content**: Detailed service description
- **Status**: Featured/Active toggles
- **Order**: Custom display ordering

### **Portfolio**
Project showcase with rich media:
- **Project Info**: Title, client, completion date
- **Content**: Detailed project description
- **Media**: Multiple images and thumbnail
- **Technologies**: List of technologies used
- **Project URL**: Live project link
- **Category**: Project categorization
- **Status**: Featured/Active toggles
- **Order**: Custom display ordering

## 🚀 **Getting Started**

### **1. Database Setup**
```bash
# Run migrations
php artisan migrate

# Seed with sample data
php artisan db:seed
```

### **2. Access Admin Panel**
- **URL**: `http://your-app/admin`
- **Login**: Use admin credentials
- **Default Admin**: 
  - Email: `admin@goldenbee.com`
  - Password: `password`

### **3. Build Assets**
```bash
npm run build
npm run dev  # For development
```

## 📁 **File Structure**

```
├── app/Http/Controllers/Admin/
│   ├── TestimonialController.php    # Testimonials CRUD
│   ├── ServiceController.php        # Services CRUD
│   └── PortfolioController.php      # Portfolio CRUD
├── app/Models/
│   ├── Testimonial.php              # Testimonial model
│   ├── Service.php                  # Service model
│   └── Portfolio.php                # Portfolio model
├── database/migrations/
│   ├── 2026_04_04_000001_create_testimonials_table.php
│   ├── 2026_04_04_000002_create_services_table.php
│   └── 2026_04_04_000003_create_portfolios_table.php
├── database/seeders/
│   ├── TestimonialSeeder.php        # Sample testimonials
│   ├── ServiceSeeder.php            # Sample services
│   └── PortfolioSeeder.php          # Sample portfolio items
├── resources/views/admin/
│   ├── layouts/app.blade.php        # Admin layout
│   ├── dashboard.blade.php          # Admin dashboard
│   ├── testimonials/                 # Testimonial views
│   ├── services/                    # Service views
│   └── portfolios/                  # Portfolio views
└── routes/web.php                   # Admin routes
```

## 🎨 **Admin Interface**

### **Navigation Structure**
```
Golden Bee Admin
├── Dashboard
├── Content Management
│   ├── Testimonials
│   ├── Services
│   ├── Portfolio
│   └── Image Gallery
└── System
    ├── Users
    ├── Contact Messages
    ├── Settings
    └── View Website
```

### **Dashboard Features**
- **Statistics Cards**: Content counts and overview
- **Quick Actions**: Direct links to create content
- **Content Overview**: Detailed statistics by type
- **Recent Activity**: Latest content updates

## 📝 **Content Management**

### **Testimonials Management**

#### **Creating Testimonials**
1. Navigate to `Admin → Testimonials`
2. Click "Add Testimonial"
3. Fill in client information:
   - Name (required)
   - Position & Company (optional)
   - Testimonial content (required)
   - Rating (1-5 stars)
   - Client image (optional)
   - Featured/Active status
   - Display order
4. Click "Create Testimonial"

#### **Managing Testimonials**
- **Edit**: Click edit icon to modify
- **Feature**: Star icon to toggle featured status
- **Activate**: Eye icon to toggle active status
- **Delete**: Trash icon to remove (with confirmation)

#### **Features**
- **Search**: Filter by name, company, or content
- **Status Filters**: Featured/Active/Inactive
- **Pagination**: Handle large numbers of testimonials
- **Bulk Actions**: Toggle multiple items

### **Services Management**

#### **Creating Services**
1. Navigate to `Admin → Services`
2. Click "Add Service"
3. Fill in service details:
   - Title & Slug (auto-generated)
   - Description & Detailed content
   - Pricing & Price type
   - Service features (dynamic list)
   - Image & Icon
   - Featured/Active status
   - Display order
4. Click "Create Service"

#### **Service Features**
- **Dynamic Feature List**: Add/remove features
- **Pricing Types**: Fixed, hourly, or project-based
- **Rich Content**: Detailed service descriptions
- **Media Support**: Images and Material Icons

#### **Managing Services**
- **Edit**: Full CRUD operations
- **Feature**: Toggle featured status
- **Activate**: Toggle active status
- **Delete**: Remove with confirmation
- **Search**: By title, description, or content

### **Portfolio Management**

#### **Creating Portfolio Items**
1. Navigate to `Admin → Portfolio`
2. Click "Add Portfolio"
3. Fill in project details:
   - Title & Slug (auto-generated)
   - Client & Completion date
   - Project URL
   - Description & Content
   - Technologies (dynamic list)
   - Multiple images
   - Thumbnail image
   - Category selection
   - Featured/Active status
   - Display order
4. Click "Create Portfolio"

#### **Portfolio Features**
- **Multiple Images**: Upload multiple project images
- **Thumbnail**: Main project image
- **Technologies**: Dynamic technology list
- **Categories**: Pre-defined project categories
- **Project Links**: Live project URLs

#### **Managing Portfolio**
- **Edit**: Full CRUD operations
- **Feature**: Toggle featured status
- **Activate**: Toggle active status
- **Delete**: Remove with image cleanup
- **Category Filters**: Filter by project type

## 🔧 **Technical Details**

### **Database Schema**

#### **Testimonials Table**
```sql
- id (primary)
- name (string, required)
- position (string, nullable)
- company (string, nullable)
- content (text, required)
- image (string, nullable)
- rating (decimal, 2,1, default 5.0)
- featured (boolean, default false)
- active (boolean, default true)
- order (integer, default 0)
- timestamps
```

#### **Services Table**
```sql
- id (primary)
- title (string, required)
- slug (string, unique)
- description (text, required)
- content (longtext, nullable)
- image (string, nullable)
- icon (string, nullable)
- features (json, nullable)
- price (decimal, 10,2, nullable)
- price_type (enum: fixed, hourly, project)
- featured (boolean, default false)
- active (boolean, default true)
- order (integer, default 0)
- timestamps
```

#### **Portfolios Table**
```sql
- id (primary)
- title (string, required)
- slug (string, unique)
- description (text, required)
- content (longtext, nullable)
- client (string, nullable)
- completed_date (date, nullable)
- project_url (string, nullable)
- technologies (json, nullable)
- images (json, nullable)
- thumbnail (string, nullable)
- category (string, nullable)
- featured (boolean, default false)
- active (boolean, default true)
- order (integer, default 0)
- timestamps
```

### **Model Relationships & Scopes**

#### **Testimonial Model**
```php
// Scopes
Testimonial::active()        // Active testimonials
Testimonial::featured()      // Featured testimonials
Testimonial::ordered()       // By order and date

// Accessors
$testimonial->image_url     // Full image URL
```

#### **Service Model**
```php
// Scopes
Service::active()           // Active services
Service::featured()         // Featured services
Service::ordered()          // By order and date

// Accessors
$service->image_url        // Full image URL
$service->formatted_price  // Formatted price string
```

#### **Portfolio Model**
```php
// Scopes
Portfolio::active()         // Active portfolios
Portfolio::featured()       // Featured portfolios
Portfolio::ordered()        // By order and date
Portfolio::byCategory($cat) // Filter by category

// Accessors
$portfolio->thumbnail_url   // Thumbnail URL
$portfolio->images_urls    // All image URLs
$portfolio->formatted_date // Formatted completion date
```

### **Controller Features**

#### **Common Features**
- **CRUD Operations**: Create, Read, Update, Delete
- **Search & Filtering**: Dynamic search and status filters
- **Toggle Actions**: AJAX-powered status toggles
- **File Upload**: Image handling with validation
- **Pagination**: Large dataset handling
- **Validation**: Comprehensive form validation

#### **AJAX Endpoints**
```php
POST /admin/testimonials/{id}/toggle-featured
POST /admin/testimonials/{id}/toggle-active
POST /admin/services/{id}/toggle-featured
POST /admin/services/{id}/toggle-active
POST /admin/portfolios/{id}/toggle-featured
POST /admin/portfolios/{id}/toggle-active
```

## 🎨 **Frontend Integration**

### **Using Content in Frontend**

#### **Displaying Testimonials**
```blade
@foreach(\App\Models\Testimonial::active()->featured()->ordered()->get() as $testimonial)
    <div class="testimonial-card">
        <img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}">
        <blockquote>{{ $testimonial->content }}</blockquote>
        <cite>{{ $testimonial->name }}, {{ $testimonial->position }}</cite>
        <div class="rating">
            @for($i = 1; $i <= 5; $i++)
                <span class="star {{ $i <= $testimonial->rating ? 'filled' : '' }}"></span>
            @endfor
        </div>
    </div>
@endforeach
```

#### **Displaying Services**
```blade
@foreach(\App\Models\Service::active()->featured()->ordered()->get() as $service)
    <div class="service-card">
        @if($service->image)
            <img src="{{ $service->image_url }}" alt="{{ $service->title }}">
        @endif
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->description }}</p>
        @if($service->features)
            <ul>
                @foreach($service->features as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
        @endif
        <div class="price">{{ $service->formatted_price }}</div>
    </div>
@endforeach
```

#### **Displaying Portfolio**
```blade
@foreach(\App\Models\Portfolio::active()->featured()->ordered()->get() as $portfolio)
    <div class="portfolio-item">
        <img src="{{ $portfolio->thumbnail_url }}" alt="{{ $portfolio->title }}">
        <h3>{{ $portfolio->title }}</h3>
        <p>{{ $portfolio->description }}</p>
        @if($portfolio->technologies)
            <div class="technologies">
                @foreach($portfolio->technologies as $tech)
                    <span class="tech-tag">{{ $tech }}</span>
                @endforeach
            </div>
        @endif
    </div>
@endforeach
```

## 🔄 **Sample Data**

### **Seeded Content**
The system includes comprehensive sample data:

#### **Testimonials (6 items)**
- Various clients from different industries
- 4.6-5.0 star ratings
- Realistic testimonial content
- Featured and regular items

#### **Services (6 items)**
- Digital Marketing, Web Development, Creative Production
- Brand Identity, Content Strategy, Social Media
- Different pricing types and features
- Professional service descriptions

#### **Portfolio (6 items)**
- Diverse project types (Branding, Web Dev, Marketing, etc.)
- Multiple categories and technologies
- Realistic project descriptions
- Client information and completion dates

## 🚀 **API Endpoints**

### **Admin API Routes**
```
GET    /admin/testimonials           # List testimonials
GET    /admin/testimonials/create    # Create form
POST   /admin/testimonials           # Store testimonial
GET    /admin/testimonials/{id}      # Edit form
PUT    /admin/testimonials/{id}      # Update testimonial
DELETE /admin/testimonials/{id}      # Delete testimonial
POST   /admin/testimonials/{id}/toggle-featured  # Toggle featured
POST   /admin/testimonials/{id}/toggle-active    # Toggle active

GET    /admin/services               # List services
GET    /admin/services/create        # Create form
POST   /admin/services               # Store service
GET    /admin/services/{id}          # Edit form
PUT    /admin/services/{id}          # Update service
DELETE /admin/services/{id}          # Delete service
POST   /admin/services/{id}/toggle-featured     # Toggle featured
POST   /admin/services/{id}/toggle-active       # Toggle active

GET    /admin/portfolios             # List portfolios
GET    /admin/portfolios/create      # Create form
POST   /admin/portfolios             # Store portfolio
GET    /admin/portfolios/{id}        # Edit form
PUT    /admin/portfolios/{id}        # Update portfolio
DELETE /admin/portfolios/{id}        # Delete portfolio
POST   /admin/portfolios/{id}/toggle-featured   # Toggle featured
POST   /admin/portfolios/{id}/toggle-active     # Toggle active
```

## 🛠 **Development**

### **Adding New Content Types**
1. Create migration: `php artisan make:migration create_new_content_table`
2. Create model: `php artisan make:model NewContent`
3. Create controller: `php artisan make:controller Admin/NewContentController`
4. Create views in `resources/views/admin/new-content/`
5. Add routes to `routes/web.php`
6. Update admin navigation

### **Customizing Fields**
- **Add Fields**: Update migration and fillable array
- **Validation**: Add rules in controller validate() method
- **Views**: Update form fields and table columns
- **Accessors**: Add custom attribute accessors to model

### **File Upload Configuration**
```php
// config/filesystems.php
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL').'/storage',
    'visibility' => 'public',
],

# Create symbolic link
php artisan storage:link
```

## 📱 **Security Features**

### **Authentication**
- **Admin-only Access**: All admin routes protected by auth middleware
- **CSRF Protection**: All forms include CSRF tokens
- **Session Security**: Secure session management

### **File Upload Security**
- **File Validation**: Image type and size restrictions
- **Safe Storage**: Files stored in secure public directory
- **Cleanup**: Automatic file deletion on content removal

### **Input Validation**
- **Form Validation**: Comprehensive validation rules
- **Sanitization**: Proper input sanitization
- **SQL Injection**: Parameterized queries via Eloquent

## 🔧 **Troubleshooting**

### **Common Issues**

#### **Migration Errors**
```bash
# Check migration status
php artisan migrate:status

# Fresh migration
php artisan migrate:fresh --seed
```

#### **File Upload Issues**
```bash
# Create storage link
php artisan storage:link

# Check permissions
chmod -R 775 storage/
```

#### **Route Issues**
```bash
# Clear route cache
php artisan route:clear

# List routes
php artisan route:list
```

#### **Asset Issues**
```bash
# Build assets
npm run build

# Clear cache
php artisan cache:clear
php artisan view:clear
```

### **Debug Mode**
Enable debug in `.env`:
```env
APP_DEBUG=true
APP_LOG_LEVEL=debug
```

## 📋 **Best Practices**

### **Content Management**
- **Use Featured**: Highlight important content
- **Maintain Order**: Keep logical content ordering
- **Optimize Images**: Compress images before upload
- **Regular Cleanup**: Remove unused content and images

### **Security**
- **Regular Updates**: Keep Laravel and dependencies updated
- **Backups**: Regular database backups
- **Access Control**: Limit admin access to authorized users
- **Audit Trail**: Monitor content changes

### **Performance**
- **Caching**: Cache frequently accessed content
- **Lazy Loading**: Implement for large content lists
- **Image Optimization**: Use appropriate image sizes
- **Database Indexing**: Proper indexes for search fields

---

**Last Updated**: 2026-04-04  
**Version**: 1.0.0  
**Status**: ✅ Complete and Tested
