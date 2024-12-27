# Donation Progress Bar Plugin

A WordPress plugin to display customizable progress bars for donation campaigns, shortcode support.

---

## Features

- **Custom Post Type:** Create and manage donation campaigns with title, goal amount, and amount raised.
- **Shortcode:** Use `[donation_progress id="<campaign-id>"]` to display a progress bar dynamically.
- **Dynamic Rendering:** Handles progress updates seamlessly with server-side rendering for dynamic content.
- **OOP Structure:** Built following SOLID principles for maintainable and scalable development.

---

## Installation

1. Download the plugin zip or clone this repository.
2. Place the plugin folder in your `wp-content/plugins/` directory.
3. Activate the plugin through the WordPress admin panel.

---

## Usage

### Shortcode

Use the shortcode to display a progress bar on any page or post:

```html
[donation_progress id="<campaign-id>"]</campaign-id>
```

### Setup

1. Navigate to the plugin folder.
2. Install dependencies:
   ```bash
   composer install
   ```

## License

This plugin is open-source and distributed under the MIT License.

---

## Author

Md Mostafizur Rahman
