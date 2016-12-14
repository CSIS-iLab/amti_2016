# Hero Menu
An easy to use WordPress plugin that allows you to display featured menu items as a hero in your site's homepage.

## Installation ##
1. Download plugin files and upload to your site's `wp-content/plugins` directory.
2. Using a text editor, open your theme's `header.php` file and insert `<?php putHeroMenu(); ?>` where you would like the menu to appear in your site's layout.
3. Save and upload the edited `header.php` file.
4. Edit the plugin's settings at Settings -> Hero Menu.
5. Create a new menu or assign an existing menu to use the "Hero Menu" location.

## Plugin Options ##
- Fallback Image: If no item in the menu has a featured image, fallback to this image.
- Fallback Background Color: If no item in the menu has a featured image and a fallback image is not defined, use this color as the background for the menu.
- Default Call to Action Text: The default text to show in the call to action box below the featured menu item.
- Include featured item on side menu?: If checked, the featured menu item will also be listed in the side menu.
- Display menu on: Choose from either All Pages or Front Page Only.
- Menu Layout Style: Featured Item with Side Menu displays a featured menu item with call to action box and a separate overlaying menu of other menu items. Single Featured Item displays just the featured menu item with no side menu.
- Custom CSS: Customize the look of the menu.