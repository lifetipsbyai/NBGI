# WordPress Deployment Guide - Noble Genius Institute

## Overview
This guide provides step-by-step instructions for deploying the Noble Genius Institute WordPress website from development to production.

## Prerequisites
- WordPress hosting account (recommended: SiteGround, Bluehost, or similar)
- Domain name configured
- FTP/SFTP access or hosting file manager
- Database access (MySQL/MariaDB)

## Step 1: Hosting Setup

### Recommended Hosting Providers
1. **SiteGround** (Recommended)
   - WordPress optimized hosting
   - Free SSL certificates
   - Daily backups
   - 24/7 support
   - Starting at $3.99/month

2. **Bluehost**
   - Official WordPress recommended host
   - One-click WordPress installation
   - Free domain for first year
   - Starting at $2.95/month

3. **WP Engine** (Premium option)
   - Managed WordPress hosting
   - Advanced security features
   - Staging environments
   - Starting at $20/month

### Domain Configuration
1. Point domain nameservers to hosting provider
2. Configure DNS records (A record, CNAME if needed)
3. Set up SSL certificate (usually automatic with modern hosts)

## Step 2: WordPress Installation

### Option A: One-Click Installation (Recommended)
1. Log into hosting control panel (cPanel/Plesk)
2. Find "WordPress" or "One-Click Install" option
3. Select domain and directory (usually root)
4. Create admin username and password
5. Complete installation

### Option B: Manual Installation
1. Download WordPress from wordpress.org
2. Upload files via FTP to web root
3. Create MySQL database and user
4. Configure wp-config.php with database details
5. Run WordPress installation script

## Step 3: Theme Installation

### Upload Custom Theme
1. **Via FTP/File Manager:**
   ```
   /public_html/wp-content/themes/ngist-theme/
   ```
   Upload all theme files from `wordpress-site/wp-content/themes/ngist-theme/`

2. **Via WordPress Admin:**
   - Zip the theme folder
   - Go to Appearance > Themes > Add New > Upload Theme
   - Upload and activate

### Theme Files to Upload
```
ngist-theme/
├── style.css
├── index.php
├── header.php
├── footer.php
├── functions.php
├── page.php
├── single.php
├── assets/
│   ├── css/
│   ├── js/
│   │   └── theme.js
│   └── images/
│       ├── logo.png
│       ├── hero_campus.jpg
│       ├── lab_image.jpg
│       ├── tech_background.jpg
│       └── graduation.jpg
├── template-parts/
├── templates/
│   ├── template-about.php
│   ├── template-programs.php
│   └── template-contact.php
```

## Step 4: Essential Plugin Installation

### Required Plugins

1. **Yoast SEO** (Free)
   - Search engine optimization
   - XML sitemaps
   - Meta descriptions
   - Installation: Plugins > Add New > Search "Yoast SEO"

2. **Wordfence Security** (Free)
   - Firewall protection
   - Malware scanning
   - Login security
   - Installation: Plugins > Add New > Search "Wordfence"

3. **UpdraftPlus** (Free)
   - Automated backups
   - Cloud storage integration
   - Easy restoration
   - Installation: Plugins > Add New > Search "UpdraftPlus"

4. **WP Rocket** (Premium - $59/year)
   - Page caching
   - Image optimization
   - Database cleanup
   - Alternative: W3 Total Cache (Free)

5. **Gravity Forms** (Premium - $59/year)
   - Contact forms
   - Application forms
   - Form builder
   - Alternative: Contact Form 7 (Free)

6. **The Events Calendar** (Free)
   - Event management
   - Calendar display
   - RSVP functionality
   - Installation: Plugins > Add New > Search "Events Calendar"

### Optional Plugins

7. **LearnDash** (Premium - $199/year)
   - Learning Management System
   - Course creation
   - Student progress tracking

8. **Mailchimp for WordPress** (Free)
   - Newsletter integration
   - Email marketing
   - Subscriber management

9. **Smash Balloon Social Photo Feed** (Free)
   - Social media integration
   - Instagram/Facebook feeds
   - Social proof

10. **MonsterInsights** (Free/Premium)
    - Google Analytics integration
    - Traffic insights
    - User behavior tracking

## Step 5: Content Setup

### Create Essential Pages
1. **Home Page**
   - Set as static front page
   - Use default template (index.php handles homepage)

2. **About Page**
   - Create new page
   - Assign "About Page" template
   - Add content about the institute

3. **Programs Page**
   - Create new page
   - Assign "Programs Page" template
   - Add program descriptions

4. **Contact Page**
   - Create new page
   - Assign "Contact Page" template
   - Add contact information

5. **Privacy Policy & Terms**
   - Create pages for legal compliance
   - Link in footer

### Configure Menus
1. Go to Appearance > Menus
2. Create "Primary Menu"
3. Add pages: Home, About, Programs, Admissions, News & Events, Contact
4. Assign to "Primary Menu" location

### Set Up Custom Post Types
The theme automatically creates:
- Programs
- Faculty
- Events
- Publications

Add sample content for each post type.

## Step 6: Customization

### Theme Customizer
1. Go to Appearance > Customize
2. Configure:
   - Site Identity (logo, title, tagline)
   - Hero Section (title, subtitle, background image)
   - Contact Information (phone, email, address)
   - Colors (if needed)

### Widget Areas
Configure sidebar and footer widgets:
1. Appearance > Widgets
2. Add widgets to:
   - Sidebar
   - Footer Widget Area 1-3

## Step 7: SEO Configuration

### Yoast SEO Setup
1. Run Yoast configuration wizard
2. Set up:
   - Site type: Educational Organization
   - Organization details
   - Social media profiles
   - XML sitemaps

### Google Services
1. **Google Analytics**
   - Create GA4 property
   - Install tracking code via MonsterInsights

2. **Google Search Console**
   - Verify website ownership
   - Submit XML sitemap
   - Monitor search performance

3. **Google My Business**
   - Create business listing
   - Add location and contact info
   - Encourage reviews

## Step 8: Security Hardening

### Wordfence Configuration
1. Run security scan
2. Configure firewall rules
3. Set up login security
4. Enable two-factor authentication

### Additional Security Measures
1. **Strong Passwords**
   - Use complex admin passwords
   - Require strong user passwords

2. **User Permissions**
   - Limit admin access
   - Create editor/author roles as needed

3. **File Permissions**
   - Set correct file permissions (644 for files, 755 for folders)
   - Protect wp-config.php

4. **Hide WordPress Version**
   - Remove version info from head
   - Use security plugins

## Step 9: Performance Optimization

### Caching Setup
1. Install WP Rocket or W3 Total Cache
2. Configure:
   - Page caching
   - Browser caching
   - GZIP compression
   - Minification

### Image Optimization
1. Optimize existing images
2. Set up automatic optimization
3. Use WebP format when possible
4. Implement lazy loading

### Database Optimization
1. Remove unused plugins/themes
2. Clean up revisions and spam
3. Optimize database tables
4. Schedule regular cleanups

## Step 10: Backup Strategy

### UpdraftPlus Configuration
1. Set backup schedule (daily recommended)
2. Configure cloud storage:
   - Google Drive
   - Dropbox
   - Amazon S3

3. Test backup restoration
4. Set up email notifications

### Additional Backup Methods
1. **Hosting Backups**
   - Enable automatic hosting backups
   - Verify backup retention policy

2. **Manual Backups**
   - Download files via FTP
   - Export database regularly

## Step 11: Testing

### Pre-Launch Checklist
- [ ] All pages load correctly
- [ ] Forms submit successfully
- [ ] Mobile responsiveness works
- [ ] Images display properly
- [ ] Navigation functions correctly
- [ ] Contact information is accurate
- [ ] SSL certificate is active
- [ ] Search functionality works
- [ ] Social media links work
- [ ] Analytics tracking is active

### Browser Testing
Test on:
- Chrome
- Firefox
- Safari
- Edge
- Mobile browsers (iOS Safari, Chrome Mobile)

### Performance Testing
1. **Page Speed**
   - Google PageSpeed Insights
   - GTmetrix
   - Pingdom

2. **Mobile Testing**
   - Google Mobile-Friendly Test
   - Responsive design checker

## Step 12: Launch

### DNS Propagation
1. Update nameservers if needed
2. Wait for DNS propagation (24-48 hours)
3. Test from different locations

### Post-Launch Tasks
1. Submit sitemap to search engines
2. Set up monitoring alerts
3. Configure uptime monitoring
4. Create social media accounts
5. Start content marketing

## Step 13: Maintenance Schedule

### Daily Tasks
- Monitor website uptime
- Check for security alerts
- Review contact form submissions

### Weekly Tasks
- Update plugins and themes
- Review analytics data
- Check backup status
- Monitor site speed

### Monthly Tasks
- Security scan
- Database optimization
- Content audit
- SEO performance review
- Backup testing

### Quarterly Tasks
- Full security audit
- Performance optimization
- Content strategy review
- User experience testing

## Troubleshooting

### Common Issues

1. **White Screen of Death**
   - Check error logs
   - Deactivate plugins
   - Switch to default theme
   - Increase memory limit

2. **Plugin Conflicts**
   - Deactivate all plugins
   - Activate one by one
   - Check error logs

3. **Slow Loading**
   - Check hosting resources
   - Optimize images
   - Enable caching
   - Review plugins

4. **SSL Issues**
   - Force HTTPS in WordPress
   - Update internal links
   - Check mixed content

### Support Resources
- WordPress.org Support Forums
- Theme documentation
- Hosting provider support
- Plugin developer support

## Cost Breakdown

### Annual Costs (Estimated)
- **Hosting**: $50-$240/year
- **Domain**: $10-$15/year
- **SSL Certificate**: $0-$100/year (often free)
- **Premium Plugins**: $200-$500/year
- **Maintenance**: $500-$2000/year (if outsourced)

### Total First Year: $760-$2855

## Conclusion

This deployment guide provides a comprehensive roadmap for launching the Noble Genius Institute WordPress website. Following these steps ensures a secure, optimized, and maintainable website that serves the institution's needs effectively.

For additional support or customization needs, consider hiring a WordPress developer or agency specializing in educational websites.

---

**Last Updated**: November 2024  
**Version**: 1.0  
**Contact**: ngisatedu@gmail.com