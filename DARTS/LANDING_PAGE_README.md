# Landing Page Documentation

## Overview
A professional and responsive landing page built for your Laravel application. The page features a sticky header with navigation, a gradient body section, and a comprehensive footer.

## Page Structure

### 1. **Header Section**
Located at the top of the page with a sticky position.

**Components:**
- **Logo Placeholders (Left)**: Two image placeholder boxes styled with a purple-to-pink gradient
  - Replace the placeholder divs with actual `<img>` tags pointing to your logo images
  - Current size: 60x60px
  
- **Navigation Links (Middle)**: Four navigation items
  - Home
  - Services
  - Request
  - Track
  - Customize these links by modifying the `href` attributes in the `<nav>` element

- **Login Button (Right)**: A gradient button linking to your authentication route
  - Currently points to `{{ route('login') }}`
  - Customize the destination as needed

### 2. **Main Body Section**
Features a vertical gradient from purple to white, providing a visually appealing background.

**Styling:**
- Gradient: `linear-gradient(180deg, #8b5cf6 0%, #ffffff 100%)`
- Top Color: Purple (#8b5cf6)
- Bottom Color: White (#ffffff)
- Adjust the gradient ratio in `landing.css` or the inline `style` tag in `welcome.blade.php`

**Content Area:**
- **Hero Section**: Welcome message and subtitle
- **Content Sections**: Multiple white cards with content
  - Fully extensible - add as many `<section class="content-section">` elements as needed
  - Each section automatically extends the body vertically

### 3. **Footer Section**
A dark footer with multiple columns for different categories.

**Default Columns:**
- About
- Support
- Legal
- Follow Us

Each column contains sample links that you can customize.

## Customization Guide

### Replacing Logo Placeholders
Open [resources/views/welcome.blade.php](resources/views/welcome.blade.php) and replace:

```html
<div class="logo-placeholder">Logo 1</div>
<div class="logo-placeholder">Logo 2</div>
```

With actual images:
```html
<img src="{{ asset('images/logo1.png') }}" alt="Logo 1" class="logo-image">
<img src="{{ asset('images/logo2.png') }}" alt="Logo 2" class="logo-image">
```

Then add to [resources/css/landing.css](resources/css/landing.css):
```css
.logo-image {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: contain;
}
```

### Changing Navigation Links
In [resources/views/welcome.blade.php](resources/views/welcome.blade.php), modify the `<nav>` section:
```html
<nav class="nav-links">
    <a href="#your-route" class="nav-link">Link Text</a>
</nav>
```

### Adjusting the Gradient
**Option 1**: Modify the gradient in [resources/css/landing.css](resources/css/landing.css):
```css
.main-body {
    background: linear-gradient(180deg, #your-top-color 0%, #your-bottom-color 100%);
}
```

**Option 2**: Change the inline style in [resources/views/welcome.blade.php](resources/views/welcome.blade.php):
```html
<main class="main-body" style="background: linear-gradient(180deg, #8b5cf6 0%, #ffffff 100%);"></main>
```

### Adding New Content Sections
Simply add new sections with the class `content-section`:
```html
<section class="content-section">
    <h2>Your Section Title</h2>
    <p>Your content here...</p>
</section>
```

The page will automatically extend vertically.

### Customizing Footer
Modify the footer columns in [resources/views/welcome.blade.php](resources/views/welcome.blade.php):
```html
<div class="footer-section">
    <h4>Your Category</h4>
    <ul>
        <li><a href="#">Your Link</a></li>
    </ul>
</div>
```

## File Structure

```
resources/
├── views/
│   └── welcome.blade.php          # Main landing page view
├── css/
│   └── landing.css                # Landing page stylesheet
└── images/                         # (Create this folder for your images)
    ├── logo1.png
    └── logo2.png
```

## Responsive Breakpoints

The landing page is fully responsive with breakpoints at:
- **768px**: Tablet view
- **480px**: Mobile view

Header layout reorganizes on smaller screens:
- Logos stack at the top
- Navigation wraps below
- Login button centers on mobile

## Colors Used

| Element | Color | RGB/Hex |
|---------|-------|---------|
| Primary Gradient | Purple | #8b5cf6 |
| Secondary Gradient | White | #ffffff |
| Accent (Purple) | Vibrant | #667eea |
| Secondary Accent | Pink | #764ba2 |
| Footer Background | Dark | #1a1a2e |
| Text Primary | Dark Gray | #333333 |
| Text Secondary | Medium Gray | #666666 |

## Tips

1. **Image Optimization**: Use optimized images for logo placeholders (suggest 60x60px at max 5KB each)
2. **Content Loading**: The page is fully dynamic and will grow with added sections
3. **Navigation**: Add CSS classes for active states if you implement a router
4. **SEO**: Update meta tags in the `<head>` section for better SEO
5. **Mobile Testing**: Always test on mobile devices to ensure the responsive design works well

## Troubleshooting

**Gradient not showing properly?**
- Check that the colors are valid hex codes
- Ensure no uppercase values causing issues

**Images not displaying?**
- Verify the image path is correct
- Use `{{ asset() }}` helper for public directory images

**Layout breaking on mobile?**
- Check that CSS media queries are loaded
- Ensure `resources/css/landing.css` is being compiled

---

**Last Updated**: March 24, 2026
