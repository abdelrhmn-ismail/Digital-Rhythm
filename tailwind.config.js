/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        // Primary Blue - Brand Color
        'primary': {
          DEFAULT: 'var(--color-primary, #01194A)', // Map to CSS variable
          foreground: '#FFFFFF',
          50: '#E3F2FD',
          100: '#CBE5FB',
          200: '#9BCEF7',
          300: '#6AB6F3',
          400: '#3A9EEF',
          500: '#0087CE', // Secondary Blue
          600: '#006CA5',
          700: '#00517C',
          800: '#003652',
          900: '#01194A', // Primary Blue
        },
        // Background Colors
        'background': {
          DEFAULT: 'var(--color-background, #F8F9FA)', // Map to CSS variable
          light: '#F3F4F6',
          lighter: '#F9FAFB',
        },
        // Card/Surface Colors
        'surface': {
          DEFAULT: 'var(--color-surface, #FFFFFF)', // Map to CSS variable
          elevated: '#0F0F12',
          overlay: 'rgba(10, 10, 12, 0.8)',
        },
        // Text Colors
        'foreground': {
          DEFAULT: 'var(--color-text, #333333)', // Map to CSS variable
          muted: '#6B7280', // gray-500
          subtle: '#9CA3AF', // gray-400
        },
        // Secondary Colors
        'secondary': {
          DEFAULT: 'var(--color-secondary, #1E293B)', // Map to CSS variable
          foreground: '#F9FAFB',
        },
        // Accent (Purple)
        'accent': {
          DEFAULT: 'var(--color-accent, #7800A8)',
          foreground: '#FFFFFF',
        },
        // Destructive/Error
        'destructive': {
          DEFAULT: '#DC2626', // hsl(0 84% 60%)
          foreground: '#F9FAFB',
        },
        // Border & Input
        'border': {
          DEFAULT: '#1E293B',
          light: '#2D3748',
        },
        'input': {
          DEFAULT: '#1E293B',
          focus: 'var(--color-primary)',
        },
        'ring': {
          DEFAULT: 'var(--color-primary)',
        },
        // Muted/Subtle
        'muted': {
          DEFAULT: '#1A202C',
          foreground: '#A0AEC0',
        },
        // Extended Brand Palette for Gradients
        'brand': {
          50: '#E3F2FD',
          100: '#CBE5FB',
          200: '#9BCEF7',
          300: '#6AB6F3',
          400: '#3A9EEF',
          500: '#0087CE',
          600: '#006CA5',
          700: '#00517C',
          800: '#003652',
          900: '#01194A',
        },
        // Zinc Palette (Tailwind defaults)
        'zinc': {
          50: '#FAFAFA',
          100: '#F4F4F5',
          200: '#E4E4E7',
          300: '#D4D4D8',
          400: '#A1A1AA',
          500: '#71717A',
          600: '#52525B',
          700: '#3F3F46',
          800: '#27272A',
          900: '#18181B',
          950: '#09090B',
        },
      },
      fontFamily: {
        // English: Inter
        'sans': ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
        // Arabic: Alexandria
        'arabic': ['Alexandria', 'Inter', 'system-ui', 'sans-serif'],
        // Mono for code/technical
        'mono': ['Fira Code', 'ui-monospace', 'monospace'],
      },
      fontSize: {
        // Hero headlines
        'hero': ['clamp(2.5rem, 6vw, 5rem)', { lineHeight: '1.1', letterSpacing: '-0.02em', fontWeight: '900' }],
        'hero-sm': ['clamp(2rem, 4vw, 3.5rem)', { lineHeight: '1.2', letterSpacing: '-0.01em', fontWeight: '900' }],
        // Section headers
        'section': ['clamp(1.875rem, 3vw, 3rem)', { lineHeight: '1.2', letterSpacing: '-0.01em', fontWeight: '900' }],
        'section-sm': ['clamp(1.5rem, 2.5vw, 2.25rem)', { lineHeight: '1.3', fontWeight: '800' }],
        // Badge/label text
        'badge': ['0.6875rem', { lineHeight: '1', letterSpacing: '0.2em', fontWeight: '900' }],
        'label': ['0.75rem', { lineHeight: '1', letterSpacing: '0.15em', fontWeight: '700' }],
      },
      fontWeight: {
        'light': '300',
        'normal': '400',
        'medium': '500',
        'semibold': '600',
        'bold': '700',
        'extrabold': '800',
        'black': '900',
      },
      letterSpacing: {
        'tighter': '-0.05em',
        'tight': '-0.025em',
        'normal': '0em',
        'wide': '0.025em',
        'wider': '0.05em',
        'widest': '0.1em',
        'ultra': '0.2em',
      },
      lineHeight: {
        'tight': '1.1',
        'snug': '1.25',
        'normal': '1.5',
        'relaxed': '1.625',
        'loose': '2',
      },
      spacing: {
        // Custom spacing for consistent design
        '18': '4.5rem',
        '22': '5.5rem',
        '26': '6.5rem',
      },
      borderRadius: {
        'none': '0',
        'sm': '0.25rem',
        'md': '0.375rem',
        'lg': '0.5rem',
        'xl': '0.75rem',
        '2xl': '1rem',
        '3xl': '1.5rem',
        'full': '9999px',
      },
      boxShadow: {
        // Gold glow effects
        'gold': '0 0 20px rgba(245, 158, 11, 0.3)',
        'gold-lg': '0 0 40px rgba(245, 158, 11, 0.4)',
        'gold-xl': '0 0 60px rgba(245, 158, 11, 0.5)',
        // Card shadows
        'card': '0 2px 8px rgba(0, 0, 0, 0.3)',
        'card-lg': '0 4px 16px rgba(0, 0, 0, 0.4)',
        // Overlay shadows
        'overlay': '0 8px 32px rgba(0, 0, 0, 0.6)',
        // Subtle elevation
        'subtle': '0 1px 3px rgba(0, 0, 0, 0.2)',
        // Glass morphism
        'glass': '0 8px 32px rgba(0, 0, 0, 0.1)',
      },
      backdropBlur: {
        'xs': '2px',
        'sm': '4px',
        'md': '8px',
        'lg': '12px',
        'xl': '16px',
        '2xl': '24px',
        '3xl': '40px',
      },
      animation: {
        // Counter animation
        'counter': 'counter 2s ease-out forwards',
        // Fade in up
        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
        // Fade in down
        'fade-in-down': 'fadeInDown 0.6s ease-out forwards',
        // Scale in
        'scale-in': 'scaleIn 0.3s ease-out forwards',
        // Slide in from right
        'slide-in-right': 'slideInRight 0.3s ease-out forwards',
        // Pulse glow
        'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
        // Shimmer
        'shimmer': 'shimmer 3s linear infinite',
        // Float
        'float': 'float 3s ease-in-out infinite',
        // Rotate
        'rotate': 'rotate 20s linear infinite',
        // Marquee (for partners)
        'marquee': 'marquee 30s linear infinite',
        'marquee-reverse': 'marqueeReverse 30s linear infinite',
      },
      keyframes: {
        counter: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeInDown: {
          '0%': { opacity: '0', transform: 'translateY(-30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        scaleIn: {
          '0%': { opacity: '0', transform: 'scale(0.9)' },
          '100%': { opacity: '1', transform: 'scale(1)' },
        },
        slideInRight: {
          '0%': { opacity: '0', transform: 'translateX(100%)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
        pulseGlow: {
          '0%, 100%': { boxShadow: '0 0 20px rgba(0, 135, 206, 0.3)' },
          '50%': { boxShadow: '0 0 40px rgba(0, 135, 206, 0.6)' },
        },
        shimmer: {
          '0%': { backgroundPosition: '-200% 0' },
          '100%': { backgroundPosition: '200% 0' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        rotate: {
          '0%': { transform: 'rotate(0deg)' },
          '100%': { transform: 'rotate(360deg)' },
        },
        marquee: {
          '0%': { transform: 'translateX(0%)' },
          '100%': { transform: 'translateX(-100%)' },
        },
        marqueeReverse: {
          '0%': { transform: 'translateX(-100%)' },
          '100%': { transform: 'translateX(0%)' },
        },
      },
      backgroundImage: {
        // Gradient for text
        'gradient-primary': 'linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%)',
        'gradient-secondary': 'linear-gradient(135deg, #E3F2FD 0%, #00BCD4 100%)', // Inner Cube Light Faces
        'gradient-purple': 'linear-gradient(135deg, #7800A8 0%, #4B0082 100%)', // Purple Face Gradient
        // Background gradients
        'gradient-dark': 'linear-gradient(180deg, var(--color-background) 0%, var(--color-surface) 100%)',
        'gradient-card': 'linear-gradient(180deg, var(--color-surface) 0%, var(--color-background) 100%)',
        // Radial gradients for glows
        'radial-primary': 'radial-gradient(circle, var(--color-primary) 0%, transparent 70%)',
        'radial-primary-strong': 'radial-gradient(circle, var(--color-primary) 0%, transparent 60%)',
        // Mesh gradient (subtle background)
        'gradient-mesh': 'radial-gradient(at 0% 0%, var(--color-primary) 0px, transparent 50%), radial-gradient(at 100% 100%, var(--color-secondary) 0px, transparent 50%)',
      },
      transitionDuration: {
        'default': '150ms',
        'slow': '300ms',
        'slower': '500ms',
        'slowest': '700ms',
      },
      transitionTimingFunction: {
        'default': 'cubic-bezier(0.4, 0, 0.2, 1)',
        'in': 'cubic-bezier(0.4, 0, 1, 1)',
        'out': 'cubic-bezier(0, 0, 0.2, 1)',
        'bounce': 'cubic-bezier(0.68, -0.55, 0.265, 1.55)',
      },
      zIndex: {
        '10': '10',
        '20': '20',
        '30': '30',
        '40': '40',
        '50': '50',
        '90': '90',
        '100': '100',
        '1000': '1000',
        '1100': '1100',
        '9998': '9998',
        '9999': '9999',
        '10000': '10000',
        '10001': '10001',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
