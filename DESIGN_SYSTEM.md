# Golden Bee Marketing - Design System Documentation

## 📐 Overview
This document contains the complete design system extracted from goldenbee.sa for pixel-perfect replication.

---

## 🎨 1. COLOR PALETTE

### Primary Brand Colors (Gold/Amber)
```
Primary (Main Gold):     #F59E0B  hsl(38 92% 50%)
Primary Light:           #FBBF24  hsl(38 92% 60%)
Primary Dark:            #D97706  hsl(38 92% 40%)

Extended Gold Scale:
50:  #FFFBEB  (Lightest - backgrounds)
100: #FEF3C7
200: #FDE68A
300: #FCD34D
400: #FBBF24  (Light accent)
500: #F59E0B  (PRIMARY BRAND COLOR)
600: #D97706  (Dark accent)
700: #B45309
800: #92400E
900: #78350F  (Darkest - text on gold)
```

### Background Colors
```
Background (Base):       #050506  hsl(240 10% 2%)  - Ultra dark base
Background Light:        #0A0A0C  hsl(240 10% 4%)  - Cards/surfaces
Background Lighter:      #0F0F12  hsl(240 8% 6%)   - Elevated elements
```

### Text Colors
```
Foreground (Primary):    #F9FAFB  hsl(210 40% 98%) - Main text (near white)
Foreground Muted:        #A1A1AA  hsl(215 20% 65%) - Secondary text
Foreground Subtle:       #71717A  hsl(215 15% 50%) - Tertiary text
```

### Surface Colors
```
Card:                    #0A0A0C  hsl(240 10% 4%)
Surface:                 #0F0F12  hsl(240 8% 6%)
Surface Overlay:         rgba(10, 10, 12, 0.8)  - Glassmorphism
```

### Secondary & Accent
```
Secondary:               #1E293B  hsl(217 33% 17%) - Cards, inputs
Secondary FG:            #F9FAFB  - Text on secondary
Accent:                  #F59E0B  - Same as primary
Destructive:             #DC2626  hsl(0 84% 60%)   - Errors/destructive
```

### Border & Input
```
Border:                  #1E293B  hsl(217 33% 17%)
Border Light:            #2D3748  hsl(217 33% 22%)
Input:                   #1E293B  hsl(217 33% 17%)
Ring (Focus):            #F59E0B  hsl(38 92% 50%)  - Gold focus ring
```

### Zinc Palette (Neutral Grays)
```
Zinc 50:   #FAFAFA  (Lightest)
Zinc 100:  #F4F4F5
Zinc 200:  #E4E4E7
Zinc 300:  #D4D4D8
Zinc 400:  #A1A1AA  (Muted text)
Zinc 500:  #71717A  (Subtle text)
Zinc 600:  #52525B
Zinc 700:  #3F3F46
Zinc 800:  #27272A
Zinc 900:  #18181B
Zinc 950:  #09090B  (Darkest)
```

---

## 🔤 2. TYPOGRAPHY

### Font Families
```css
English: 'Inter', system-ui, -apple-system, sans-serif
Arabic:  'Alexandria', 'Inter', system-ui, sans-serif
Mono:    'Fira Code', ui-monospace, monospace
```

### Font Sizes (Responsive with clamp())
```css
Hero Headline:     clamp(2.5rem, 6vw, 5rem)      /* 40px - 80px */
Hero Small:        clamp(2rem, 4vw, 3.5rem)      /* 32px - 56px */
Section Header:    clamp(1.875rem, 3vw, 3rem)    /* 30px - 48px */
Section Small:     clamp(1.5rem, 2.5vw, 2.25rem) /* 24px - 36px */

Standard Scale:
text-xs:   0.75rem    (12px)
text-sm:   0.875rem   (14px)
text-base: 1rem       (16px)
text-lg:   1.125rem   (18px)
text-xl:   1.25rem    (20px)
text-2xl:  1.5rem     (24px)
text-3xl:  1.875rem   (30px)
text-4xl:  2.25rem    (36px)
text-5xl:  3rem       (48px)
text-6xl:  3.75rem    (60px)
text-7xl:  4.5rem     (72px)
text-8xl:  6rem       (96px)
text-9xl:  8rem       (128px)
```

### Font Weights
```css
Light:      300
Normal:     400
Medium:     500
Semibold:   600
Bold:       700
Extra Bold: 800
Black:      900
```

### Letter Spacing
```css
Tighter:  -0.05em  (Hero headlines)
Tight:    -0.025em (Section headers)
Normal:   0em      (Body text)
Wide:     0.025em  (Small labels)
Wider:    0.05em   (Buttons, CTAs)
Widest:   0.1em    (Badges)
Ultra:    0.2em    (Section badges like "OUR CAPABILITIES")
```

### Line Heights
```css
Tight:    1.1   (Hero headlines)
Snug:     1.25  (Section headers)
Normal:   1.5   (Body text)
Relaxed:  1.625 (Long paragraphs)
Loose:    2     (Special cases)
```

---

## 📏 3. SPACING SYSTEM

### Base Scale (Multiples of 4px)
```
1:  0.25rem  (4px)
2:  0.5rem   (8px)
3:  0.75rem  (12px)
4:  1rem     (16px)
5:  1.25rem  (20px)
6:  1.5rem   (24px)
8:  2rem     (32px)
10: 2.5rem   (40px)
12: 3rem     (48px)
16: 4rem     (64px)
20: 5rem     (80px)
24: 6rem     (96px)
```

### Section Spacing
```
Mobile:  4rem (64px) padding
Tablet:  6rem (96px) padding
Desktop: 8rem (128px) padding
```

---

## 🔲 4. BORDER RADIUS

```css
None:   0
Small:  0.25rem  (4px)
Medium: 0.375rem (6px)
Large:  0.5rem   (8px)
XL:     0.75rem  (12px) - Cards
2XL:    1rem     (16px)
3XL:    1.5rem   (24px)
Full:   9999px   (Pill shape - buttons)
```

---

## 🌈 5. GRADIENTS

### Gold Gradients
```css
/* Primary Gold Gradient */
background: linear-gradient(135deg, #F59E0B 0%, #D97706 50%, #B45309 100%);

/* Light Gold Gradient */
background: linear-gradient(135deg, #FBBF24 0%, #F59E0B 50%, #D97706 100%);
```

### Background Gradients
```css
/* Dark Background Gradient */
background: linear-gradient(180deg, #050506 0%, #0A0A0C 100%);

/* Card Background */
background: linear-gradient(180deg, #0A0A0C 0%, #0F0F12 100%);
```

### Radial Gradients (Glows)
```css
/* Subtle Gold Glow */
background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);

/* Strong Gold Glow */
background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, transparent 60%);
```

---

## ✨ 6. SHADOWS

### Gold Glow Shadows
```css
Gold:      0 0 20px rgba(245, 158, 11, 0.3)
Gold Large:  0 0 40px rgba(245, 158, 11, 0.4)
Gold XL:     0 0 60px rgba(245, 158, 11, 0.5)
```

### Card Shadows
```css
Card:      0 2px 8px rgba(0, 0, 0, 0.3)
Card Large:  0 4px 16px rgba(0, 0, 0, 0.4)
```

### Overlay Shadows
```css
Overlay: 0 8px 32px rgba(0, 0, 0, 0.6)
```

---

## 🎭 7. ANIMATIONS

### Keyframe Animations
```css
/* Fade In From Bottom */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Fade In From Top */
@keyframes fadeInDown {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Scale In */
@keyframes scaleIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

/* Pulse Glow */
@keyframes pulseGlow {
  0%, 100% { box-shadow: 0 0 20px rgba(245, 158, 11, 0.3); }
  50% { box-shadow: 0 0 40px rgba(245, 158, 11, 0.6); }
}

/* Marquee (Partners Carousel) */
@keyframes marquee {
  from { transform: translateX(0%); }
  to { transform: translateX(-100%); }
}

/* Float */
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
```

### Transition Timings
```css
Fast:   150ms cubic-bezier(0.4, 0, 0.2, 1)
Base:   300ms cubic-bezier(0.4, 0, 0.2, 1)
Slow:   500ms cubic-bezier(0.4, 0, 0.2, 1)
Slower: 700ms cubic-bezier(0.4, 0, 0.2, 1)
```

---

## 🃏 8. COMPONENT PATTERNS

### Buttons
```css
/* Primary Button */
.btn-primary {
  padding: 0.75rem 2rem;
  background: #F59E0B;
  color: #050506;
  font-weight: 900;
  font-size: 0.875rem;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  border-radius: 9999px;
  box-shadow: 0 0 25px rgba(245, 158, 11, 0.2);
  transition: all 300ms;
}

.btn-primary:hover {
  transform: scale(1.05);
  box-shadow: 0 0 35px rgba(245, 158, 11, 0.3);
}

/* Outline Button */
.btn-outline {
  padding: 0.75rem 2rem;
  background: transparent;
  color: #F9FAFB;
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 9999px;
  transition: all 300ms;
}

.btn-outline:hover {
  border-color: #F59E0B;
  color: #F59E0B;
  transform: scale(1.05);
}
```

### Cards
```css
/* Standard Card */
.card {
  background: linear-gradient(180deg, #0A0A0C 0%, #0F0F12 100%);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 0.75rem;
  padding: 2rem;
  transition: all 300ms;
}

.card:hover {
  transform: translateY(-4px);
  border-color: rgba(245, 158, 11, 0.3);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4), 0 0 20px rgba(245, 158, 11, 0.1);
}

/* Gold Accent Card */
.card-gold {
  border: 1px solid rgba(245, 158, 11, 0.2);
}

.card-gold:hover {
  border-color: rgba(245, 158, 11, 0.5);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4), 0 0 30px rgba(245, 158, 11, 0.2);
}
```

### Glassmorphism
```css
.glass {
  background: rgba(10, 10, 12, 0.8);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.1);
}
```

---

## 🎯 9. USAGE EXAMPLES

### Hero Section
```html
<section class="min-h-[75vh] flex items-center justify-center section-padding">
  <div class="container-custom text-center">
    <span class="text-badge text-primary mb-6">Global Marketing Agency</span>
    <h1 class="text-hero mb-6">
      <span class="text-white block">TRANSLATE YOUR</span>
      <span class="text-gradient">VISION INTO REALITY</span>
    </h1>
    <p class="text-lg text-foreground-muted max-w-2xl mx-auto mb-10">
      Your premier creative partner specializing in digital dominance, bespoke branding, and global scale.
    </p>
    <div class="flex gap-4 justify-center">
      <a href="/contact" class="btn-primary">Get a Quote</a>
      <a href="/services" class="btn-outline">Explore Our Services</a>
    </div>
  </div>
</section>
```

### Service Card
```html
<div class="card-gold group">
  <div class="text-6xl font-black text-primary/20 mb-4">01</div>
  <h3 class="text-2xl font-bold text-white mb-3">Digital Marketing</h3>
  <p class="text-foreground-muted mb-6">
    Hyper-targeted advertising frameworks, SEO domination, and data-driven scaling strategies.
  </p>
  <a href="/services/digital-marketing" class="text-primary font-bold uppercase tracking-wide text-sm">
    Discover More →
  </a>
</div>
```

### Stat Counter
```html
<div class="text-center">
  <div class="text-5xl md:text-6xl font-black text-gradient mb-2 counter" data-target="7">0+</div>
  <div class="text-sm font-bold uppercase tracking-wider text-foreground-subtle">
    Years of Mastery
  </div>
</div>
```

---

## 📱 10. RESPONSIVE BREAKPOINTS

```css
Mobile:   0 - 639px    (default)
Tablet:   640px+       (sm)
Laptop:   768px+       (md)
Desktop:  1024px+      (lg)
Wide:     1280px+      (xl)
Ultra:    1536px+      (2xl)
```

---

## 🌍 11. RTL SUPPORT

For Arabic (RTL) layout:
- Font changes to 'Alexandria'
- Letter spacing normalized
- Layout direction reversed automatically by Tailwind RTL plugin
- Text alignment adjusted

```css
html[dir="rtl"] body {
  font-family: 'Alexandria', 'Inter', system-ui, sans-serif;
  letter-spacing: normal !important;
}
```

---

## 🎨 12. TAILWIND CONFIG HIGHLIGHTS

### Custom Colors (in tailwind.config.js)
```javascript
colors: {
  'primary': { DEFAULT: '#F59E0B', /* ...scale */ },
  'background': { DEFAULT: '#050506', light: '#0A0A0C' },
  'surface': { DEFAULT: '#0A0A0C', elevated: '#0F0F12' },
  'foreground': { DEFAULT: '#F9FAFB', muted: '#9CA3AF' },
  // ... more colors
}
```

### Custom Font Sizes
```javascript
fontSize: {
  'hero': ['clamp(2.5rem, 6vw, 5rem)', { lineHeight: '1.1', fontWeight: '900' }],
  'section': ['clamp(1.875rem, 3vw, 3rem)', { lineHeight: '1.2', fontWeight: '900' }],
  'badge': ['0.6875rem', { letterSpacing: '0.2em', fontWeight: '900' }],
}
```

---

## ✅ CHECKLIST FOR PHASE 1

- [x] Extract exact color palette with hex codes
- [x] Document typography system (fonts, sizes, weights)
- [x] Define spacing system
- [x] Document border radius values
- [x] Document gradient specifications
- [x] Document shadow values
- [x] Document animation specifications
- [x] Create Tailwind config with design tokens
- [x] Create custom CSS utilities
- [x] Document component patterns
- [x] Document responsive breakpoints
- [x] Document RTL support approach

---

## 📁 FILES CREATED

1. **tailwind.config.js** - Updated with complete design system
2. **public/css/goldenbee-custom.css** - Clean, maintainable CSS with utilities
3. **DESIGN_SYSTEM.md** - This documentation file

---

**Last Updated:** April 8, 2026  
**Status:** ✅ Phase 1 Complete - Design System Extracted & Documented
