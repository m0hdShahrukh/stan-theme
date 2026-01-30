# 🚀 Stan SEO Agency WordPress Theme
## 🛠 Quick Start Guide

### 1. Installation

Choose the method that works best for your workflow:

| Method | Steps |
| --- | --- |
| **Option A: ZIP (Recommended)** | Download ZIP → `Appearance` > `Themes` > `Add New` > `Upload` |
| **Option B: FTP** | Extract ZIP → Upload to `/wp-content/themes/` → `Activate` |

### 2. Initial Setup (5 Minutes)

Follow these steps to get your site running exactly like the demo:

1. **Create Home Page:** Go to `Pages` > `Add New`. Create a page named **Home**.
2. **Set Navigation:** Go to `Appearance` > `Menus`. Create a "Primary Menu" and assign it to the **Primary Menu** location.
3. **Configure Reading:** Go to `Settings` > `Reading`. Set "Your homepage displays" to **A static page** and select **Home**.
4. **Branding:** Go to `Appearance` > `Customize` > `Site Identity` to upload your logo.

---

## 🎨 Theme Customization

All visual settings are centralized in the **WordPress Customizer** (`Appearance` > `Customize`).

### Section Controls

* **🎯 Hero Section:** Modify titles, descriptions, and the primary chart image.
* **📊 Statistics:** Live-edit counters (e.g., "120k+", "98%") and labels.
* **🎨 Typography:** Granular control over H1-H6, body text, line heights, and letter spacing.
* **💼 Content Sections:** Toggle and edit titles for Services, Testimonials, and Case Studies.

---

## 📝 Content Management

We use **Custom Post Types (CPTs)** to keep your content organized and easy to edit.

### How to add content:

* **Services:** `Services` > `Add New`. Use the **Featured Image** as the service icon.
* **Case Studies:** `Case Studies` > `Add New`.
* *Meta Fields:* Enter Growth %, Subtitle, and Category.


* **Testimonials:** `Testimonials` > `Add New`.
* *Meta Fields:* Select Star Rating (1-5) and enter Client Position.


* **Client Logos:** `Client Logos` > `Add New`. Upload the logo as the **Featured Image**.

---

## 🏗 Architectural Decisions

*Why the theme is built this way:*

> [!IMPORTANT]
> **Separation of Concerns:** We keep HTML in templates, functionality in `functions.php`, and styling in Tailwind. This makes the theme lightweight and incredibly hard to "break" during updates.

* **Customizer vs. Plugins:** We chose the Native Customizer over ACF to ensure a zero-plugin dependency for core features.
* **Tailwind CSS:** Used for a mobile-first, utility-driven design that reduces CSS bloat.
* **Centralized Logic:** `functions.php` handles CPTs, Meta Boxes, and Theme Support for easier maintenance.

---

## ⏱️ Development Insights

**Total Build Time:** 10-12 Hours

| Phase | Duration | Focus |
| --- | --- | --- |
| **Setup** | 3 Hours | File structure & Tailwind integration |
| **Templating** | 4 Hours | Converting static HTML to dynamic PHP |
| **Features** | 3 Hours | CPTs, Meta Boxes, & Customizer API |
| **Polish** | 2 Hours | QA, responsiveness, and bug fixes |

**Why this timeframe?** The project focused on **Complete Dynamicity**. Every single section—from the hero chart to the testimonial star ratings—is editable via the admin dashboard.

---

## 🎯 Key Design Choices

* **No Heavy Plugins:** Faster load times and better security.
* **Simple Meta Boxes:** Designed for non-technical users to update content easily.
* **Minimal JS:** Only essential interactions included to maintain high Core Web Vitals scores.

