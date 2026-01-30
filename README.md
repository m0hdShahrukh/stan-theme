<!-- Instructions on how to run the project locally. -->
🚀 Quick Start Guide
1. Installation
Option A: Upload ZIP (Recommended)
Download the theme files as a ZIP folder
Go to WordPress Admin → Appearance → Themes → Add New → Upload Theme
Click "Choose File" and select the theme ZIP file
Click "Install Now" then "Activate"
Option B: Manual Upload via FTP
Extract the downloaded ZIP file
Upload the seo-agency-theme folder to: /wp-content/themes/
Go to WordPress Admin → Appearance → Themes
Find "SEO Agency Theme" and click "Activate"
2. Initial Setup (5 Minutes)
Step 1: Create Essential Pages
Go to Pages → Add New and create these pages:
✅ Home (Will automatically use the homepage template)
Step 2: Set Up Menus
Go to Appearance → Menus
Click "Create a new menu" and name it "Primary Menu"
Add your pages to the menu
Set "Display location" to "Primary Menu"
Click "Save Menu"
Step 3: Set Homepage
Go to Settings → Reading
Under "Your homepage displays", select "A static page"
Choose "Home" as your homepage
Click "Save Changes"
Step 4: Upload Logo
Go to Appearance → Customize → Site Identity
Click "Select Logo" and upload your logo
Adjust the logo size if needed
Click "Publish"
🎨 Theme Customization
1. Customizer Settings
Go to Appearance → Customize to access all settings:
🎯 Hero Section
Change hero title, subtitle, and description
Upload custom chart image
Customize button text
📊 Statistics
Edit stat numbers (120k+, 98%, 3.2M)
Change stat labels
💼 Services
Edit services title and subtitle
Services are managed as custom posts
👥 Testimonials
Edit testimonials section title
Testimonials are managed as custom posts
📈 Case Studies
Edit section title and description
Case studies are managed as custom posts
🎨 Typography Settings
Change fonts for body and headings
Adjust font sizes for all elements
Set line heights and letter spacing
Customize button and navigation typography
📝 Content Management
1. Services 
Go to Services → Add New
Enter service title and description
Upload featured image (appears as icon)
Click "Publish"
2. Case Studies 
Go to Case Studies → Add New
Enter case study title and content
Important: Fill these meta fields:
Growth Percentage: e.g., "340%"
Subtitle: Appears below percentage
Category: Shows as badge (E-commerce, SaaS, etc.)
Upload featured image
Click "Publish"
3. Testimonials 
Go to Testimonials → Add New
Enter client name as title
Add testimonial text in the editor
Important: Fill these meta fields:
Rating: 1-5 stars (select from dropdown)
Position/Company: e.g., "CEO, Tech Company"
Upload client photo as featured image
Click "Publish"
4. Client Logos
Go to Client Logos → Add New
Enter company name as title
Upload logo as Featured Image (required)
Optionally add website URL in meta box
Click "Publish"
🔧 Advanced Features
1. Dynamic Hero Chart
Upload your own chart image via Customizer
1. Client Logos Section
Logos automatically appear in hero section
Set opacity and grayscale effects in Customizer

<!-- A brief explanation of your architectural decisions (Why you structured the files the way you did). -->
1. Typography Control
Complete control over all typography:
Primary and heading fonts
All font sizes (H1-H6, body, buttons, etc.)
Line heights and letter spacing
Reason: Each major section is separate. This makes it easy to:
Edit one section without breaking others
Reuse sections on other pages
Find code quickly
2. Custom Post Types (CPTs)
Services – Manage SEO services
Case Studies – Show success stories
Testimonials – Display client reviews
Client Logos – Manage partner logos
Reason: Instead of hardcoding content, you can add/edit/delete content through WordPress admin like regular posts.
3. Everything in functions.php
Theme setup
Custom post types
Customizer settings
Meta boxes
Reason: One central file controls all functionality. Easy to maintain and find code.
4. Separation of Concerns
HTML/Design → Template files
Functionality → functions.php
Styling → Tailwind CSS
Content → WordPress admin
Reason: Clean separation makes the theme:
Easy to understand
Simple to modify
Hard to break
5. Mobile-First Approach
Tailwind CSS handles responsiveness
One codebase for all devices
No separate mobile theme needed
Reason: Saves time, ensures consistency, and improves performance.
⏱️ Total Development Time
Complete Build Time: 10-12 Hours
Breakdown:
Setup & Structure – 3 hours
Theme files, folders, basic setup
Template Creation – 4 hours
Converting HTML to WordPress templates
Making sections dynamic
Custom Features – 3 hours
Custom post types
Customizer settings
Meta boxes
Testing & Polish – 1-2 hours
Fixing bugs
Making everything work
Final checks

Why It Took This Long:
Complex Design – Layout had many unique sections
Complete Dynamicity – Every section can be edited in WordPress
Quality Focus – Clean code, good organization, no shortcuts
Thorough Testing – Making sure everything works perfectly
🎯 Key Design Choices
1. Used Tailwind CSS (Not Custom CSS)
Why: Quick, Responsive and easy
Benefit: Same design with less code
2. Customizer for Settings (Not ACF)
Why: Built into WordPress, no plugins needed
Benefit: Users familiar with WordPress can use it immediately
3. Simple Meta Boxes (Not Complex Fields)
Why: Easy to understand and use
Benefit: No learning curve for content editors
4. Minimal JavaScript
Why: Only for essential interactions
Benefit: Faster loading, more reliable
🚀 Result: A Professional, Maintainable Theme
What We Achieved:
✅ Same design as your HTML
✅ Fully dynamic content management
✅ Easy to use for non-technical users
✅ Clean, organized code
✅ Fast performance
✅ Mobile responsive
