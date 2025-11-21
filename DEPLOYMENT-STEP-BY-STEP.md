# Step-by-Step Production Deployment Guide
## Noble Genius Institute WordPress Website

This guide will walk you through deploying your WordPress website from development to production, step by step.

---

## 🚀 PHASE 1: Choose and Set Up Hosting (Day 1)

### Step 1: Select a Hosting Provider
**Recommended Options:**

**Option A: SiteGround (Recommended)**
- Go to [siteground.com](https://siteground.com)
- Choose "StartUp" plan ($3.99/month)
- Includes: 10GB storage, free SSL, daily backups
- Click "Get Plan" → Enter your domain name

**Option B: Bluehost**
- Go to [bluehost.com](https://bluehost.com)
- Choose "Basic" plan ($2.95/month)
- Includes: 50GB storage, free domain, free SSL
- Click "Get Started" → Enter your domain name

### Step 2: Domain Setup
1. **If you have a domain:**
   - Enter your existing domain name
   - You'll need to update nameservers later

2. **If you need a domain:**
   - Choose a domain name (e.g., ngisatedu.com)
   - Complete the registration process

### Step 3: Complete Hosting Purchase
1. Fill in your account information
2. Choose billing cycle (12 months recommended for discounts)
3. Add-ons (optional):
   - Domain Privacy (recommended)
   - SiteLock Security (optional)
4. Complete payment

### Step 4: Access Your Hosting Account
1. Check your email for login credentials
2. Log into your hosting control panel (cPanel)
3. Note down your hosting details:
   - Server IP address
   - FTP credentials
   - Database information

---

## 🔧 PHASE 2: Install WordPress (Day 1-2)

### Step 5: One-Click WordPress Installation
**For SiteGround:**
1. Log into your SiteGround account
2. Go to "Websites" → "New Website"
3. Choose "Start New Website"
4. Select "WordPress"
5. Choose your domain
6. Fill in:
   - Site Title: "Noble Genius Institute of Science and Technology"
   - Admin Username: (choose a secure username)
   - Admin Password: (use a strong password)
   - Admin Email: ngisatedu@gmail.com
7. Click "Continue" and wait for installation

**For Bluehost:**
1. Log into your Bluehost account
2. Go to "My Sites" → "Create Site"
3. Choose "WordPress"
4. Select your domain
5. Fill in site details (same as above)
6. Click "Create Site"

### Step 6: Access WordPress Admin
1. Go to yourdomainname.com/wp-admin
2. Log in with your admin credentials
3. You should see the WordPress dashboard

---

## 📁 PHASE 3: Upload Your Custom Theme (Day 2)

### Step 7: Download Theme Files
From this repository, you need these files:
```
wordpress-site/wp-content/themes/ngist-theme/
├── style.css
├── functions.php
├── header.php
├── footer.php
├── index.php
├── page.php
├── single.php
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── templates/
│   ├── template-about.php
│   ├── template-programs.php
│   └── template-contact.php
```

### Step 8: Upload Theme via WordPress Admin
1. **Zip the theme folder:**
   - Create a ZIP file of the entire `ngist-theme` folder
   - Name it `ngist-theme.zip`

2. **Upload via WordPress:**
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New" → "Upload Theme"
   - Choose your `ngist-theme.zip` file
   - Click "Install Now"
   - Click "Activate" when installation completes

### Step 9: Verify Theme Installation
1. Visit your website (yourdomainname.com)
2. You should see the Noble Genius Institute homepage
3. If you see errors, check the error logs in cPanel

---

## 🔌 PHASE 4: Install Essential Plugins (Day 2-3)

### Step 10: Install Security Plugin
1. Go to Plugins → Add New
2. Search for "Wordfence Security"
3. Install and activate
4. Go to Wordfence → Dashboard
5. Run your first scan
6. Follow the setup wizard

### Step 11: Install SEO Plugin
1. Search for "Yoast SEO"
2. Install and activate
3. Go to SEO → General
4. Run the configuration wizard:
   - Site type: "Organization"
   - Organization name: "Noble Genius Institute of Science and Technology"
   - Logo: Upload your logo
   - Social profiles: Add your social media links

### Step 12: Install Backup Plugin
1. Search for "UpdraftPlus"
2. Install and activate
3. Go to Settings → UpdraftPlus Backups
4. Click "Settings" tab
5. Choose backup schedule: "Daily"
6. Select backup storage (Google Drive recommended)
7. Save settings and run first backup

### Step 13: Install Performance Plugin
**Option A: WP Rocket (Premium - $59/year)**
1. Purchase from wp-rocket.me
2. Download the plugin
3. Upload via Plugins → Add New → Upload Plugin

**Option B: W3 Total Cache (Free)**
1. Search for "W3 Total Cache"
2. Install and activate
3. Go to Performance → General Settings
4. Enable Page Cache and Browser Cache

### Step 14: Install Contact Form Plugin
1. Search for "Contact Form 7"
2. Install and activate
3. Go to Contact → Contact Forms
4. Edit the default form or create new ones

---

## 📄 PHASE 5: Create Essential Pages (Day 3-4)

### Step 15: Create Main Pages
1. **About Page:**
   - Go to Pages → Add New
   - Title: "About Us"
   - Page Template: "About Page"
   - Add content about the institute
   - Publish

2. **Programs Page:**
   - Title: "Academic Programs"
   - Page Template: "Programs Page"
   - Add program descriptions
   - Publish

3. **Contact Page:**
   - Title: "Contact Us"
   - Page Template: "Contact Page"
   - Add contact information
   - Publish

4. **Privacy Policy:**
   - Title: "Privacy Policy"
   - Add privacy policy content
   - Publish

### Step 16: Set Up Navigation Menu
1. Go to Appearance → Menus
2. Create a new menu called "Primary Menu"
3. Add pages:
   - Home (link to homepage)
   - About Us
   - Academic Programs
   - Admissions (create this page)
   - News & Events (create this page)
   - Contact Us
4. Assign to "Primary Menu" location
5. Save menu

### Step 17: Configure Homepage
1. Go to Settings → Reading
2. Select "A static page"
3. Homepage: Select "Home" (or create a homepage)
4. Posts page: Select "News" (or create a blog page)
5. Save changes

---

## 🎨 PHASE 6: Customize Your Site (Day 4-5)

### Step 18: Upload Your Logo and Images
1. Go to Media → Library
2. Upload your logo and other images
3. Go to Appearance → Customize
4. Site Identity → Logo: Select your uploaded logo
5. Publish changes

### Step 19: Configure Theme Settings
1. In Customizer, configure:
   - Site Title and Tagline
   - Colors (if needed)
   - Header settings
   - Footer settings
2. Publish all changes

### Step 20: Add Sample Content
1. **Create Program Posts:**
   - Go to Programs → Add New
   - Add details for each program (Computer Science, Engineering, etc.)
   - Add featured images
   - Publish

2. **Create Faculty Posts:**
   - Go to Faculty → Add New
   - Add faculty member details
   - Add photos
   - Publish

3. **Create News Posts:**
   - Go to Posts → Add New
   - Add news articles and announcements
   - Publish

---

## 🔒 PHASE 7: Security and Performance (Day 5-6)

### Step 21: SSL Certificate Setup
1. **SiteGround:** SSL is automatic
2. **Bluehost:** Go to cPanel → SSL/TLS → Let's Encrypt
3. **Force HTTPS:**
   - Go to Settings → General
   - Change both URLs to https://
   - Save changes

### Step 22: Security Hardening
1. **Strong Passwords:**
   - Change admin password to something very strong
   - Use a password manager

2. **User Permissions:**
   - Go to Users → All Users
   - Remove unnecessary admin accounts
   - Create editor accounts for content managers

3. **File Permissions:**
   - In cPanel File Manager, set:
   - Folders: 755
   - Files: 644
   - wp-config.php: 600

### Step 23: Performance Optimization
1. **Enable Caching:**
   - Configure your caching plugin
   - Test page load speeds

2. **Image Optimization:**
   - Install "Smush" plugin
   - Optimize existing images
   - Enable automatic optimization

3. **Database Cleanup:**
   - Use UpdraftPlus to clean database
   - Remove unused plugins and themes

---

## 📊 PHASE 8: SEO and Analytics (Day 6-7)

### Step 24: Google Analytics Setup
1. Create Google Analytics account
2. Install "MonsterInsights" plugin
3. Connect your Analytics account
4. Verify tracking is working

### Step 25: Google Search Console
1. Go to search.google.com/search-console
2. Add your website
3. Verify ownership (via Analytics or HTML file)
4. Submit your sitemap (yoursite.com/sitemap_index.xml)

### Step 26: SEO Optimization
1. **Yoast SEO Configuration:**
   - Complete the SEO wizard
   - Set up social media integration
   - Configure XML sitemaps

2. **Content Optimization:**
   - Add meta descriptions to all pages
   - Optimize page titles
   - Add alt text to images

---

## 🧪 PHASE 9: Testing (Day 7)

### Step 27: Functionality Testing
Test these features:
- [ ] All pages load correctly
- [ ] Navigation menu works
- [ ] Contact forms submit
- [ ] Images display properly
- [ ] Mobile responsiveness
- [ ] Search functionality
- [ ] Social media links

### Step 28: Performance Testing
1. **Speed Test:**
   - Use Google PageSpeed Insights
   - Test both mobile and desktop
   - Aim for scores above 80

2. **Cross-Browser Testing:**
   - Test in Chrome, Firefox, Safari, Edge
   - Test on mobile devices

### Step 29: Security Testing
1. Run Wordfence security scan
2. Check for malware
3. Test login security
4. Verify SSL certificate

---

## 🚀 PHASE 10: Go Live (Day 7-8)

### Step 30: DNS Configuration
**If you have an existing domain:**
1. Log into your domain registrar
2. Update nameservers to your hosting provider's:
   - SiteGround: ns1.siteground.com, ns2.siteground.com
   - Bluehost: ns1.bluehost.com, ns2.bluehost.com
3. Wait 24-48 hours for propagation

### Step 31: Final Checks
1. Test website from different locations
2. Check email functionality
3. Verify all forms work
4. Test backup restoration
5. Monitor for any errors

### Step 32: Launch Announcement
1. Update social media profiles
2. Notify stakeholders
3. Submit to search engines
4. Start content marketing

---

## 📋 POST-LAUNCH CHECKLIST (Week 2)

### Immediate Tasks (First Week)
- [ ] Monitor website uptime
- [ ] Check for any errors or issues
- [ ] Respond to contact form submissions
- [ ] Monitor security alerts
- [ ] Check backup status daily

### Ongoing Tasks (Monthly)
- [ ] Update WordPress core, themes, and plugins
- [ ] Review security scans
- [ ] Check website performance
- [ ] Review analytics data
- [ ] Update content regularly

---

## 🆘 TROUBLESHOOTING COMMON ISSUES

### Issue 1: White Screen of Death
**Solution:**
1. Check error logs in cPanel
2. Deactivate all plugins
3. Switch to default theme temporarily
4. Increase PHP memory limit

### Issue 2: Plugin Conflicts
**Solution:**
1. Deactivate all plugins
2. Activate one by one to identify the problem
3. Check plugin compatibility
4. Contact plugin support

### Issue 3: Slow Loading Website
**Solution:**
1. Enable caching
2. Optimize images
3. Remove unused plugins
4. Check hosting resources

### Issue 4: SSL Issues
**Solution:**
1. Force HTTPS in WordPress settings
2. Update internal links
3. Check for mixed content
4. Contact hosting support

---

## 💰 ESTIMATED COSTS

### Year 1 Costs:
- **Hosting:** $50-120
- **Domain:** $10-15
- **Premium Plugins:** $200-400 (optional)
- **SSL Certificate:** $0 (included with hosting)
- **Total:** $260-535

### Ongoing Annual Costs:
- **Hosting renewal:** $50-240
- **Domain renewal:** $10-15
- **Plugin renewals:** $200-400
- **Total:** $260-655

---

## 📞 SUPPORT CONTACTS

### Technical Support:
- **Hosting Support:** Your hosting provider's support team
- **WordPress Support:** wordpress.org/support
- **Plugin Support:** Individual plugin developers

### Emergency Contacts:
- **Gilbert Chidiebere Nnamdi:** ngisatedu@gmail.com
- **Phone:** 08065758399

---

## ✅ SUCCESS METRICS

Your website is successfully deployed when:
- [ ] Website loads in under 3 seconds
- [ ] All pages display correctly
- [ ] Contact forms work
- [ ] Mobile version is responsive
- [ ] SSL certificate is active
- [ ] Search engines can crawl the site
- [ ] Analytics tracking is working
- [ ] Backups are running automatically

---

**🎉 Congratulations! Your Noble Genius Institute website is now live!**

For ongoing support and maintenance, refer to the maintenance plan document or contact the development team.

---

*Last Updated: November 2024*  
*Version: 1.0*  
*Contact: ngisatedu@gmail.com*