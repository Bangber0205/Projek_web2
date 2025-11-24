# Task: Improve Card Layout and Spacing for Branch, Sales Report, and Stock Report Pages

## Overview
Refactor card layout and spacing in the following pages to match the clean and well-spaced style of dashboard cards, ensuring consistent visual appearance and spacing of image/icons and text.

## Tasks

### 1. Branch List Page - app/Views/superAdmin/branches/index.php
- Replace existing table-based list with card-based list.
- Use styling similar to dashboard cards (e.g., card-action or card-stats styles).
- Ensure card size, padding, margin, and image/text gap match dashboard cards.
- Keep all branch data content unchanged.
- Cards should have proper spacing between image/icon and text (e.g., use flex with gap).

### 2. Sales Report Page - app/Views/superAdmin/sales_report.php
- Update stat cards at top of page to use dashboard card styles/components for consistent size and spacing.
- Optionally improve spacing and layout of detailed sales per branch list.
- Keep content and data unchanged.

### 3. Stock Report Page - app/Views/superAdmin/stock_report.php
- Update stat cards at top to use dashboard card styles/components.
- Keep detailed stock list table but align styling with card sizes.
- Preserve existing content.

### 4. Use Existing Components and Styles
- Utilize existing components from app/Views/components like card-action.php and card-stats.php for consistency.
- Add or update classes like flex, gap, padding, rounded borders, shadows, as per dashboard card style.
- Avoid content changes, only visual/spatial improvements.

## Follow-Up
- After implementation, test each page on browser and verify uniform card size and spacing.
- Verify images/icons and text in cards have adequate gap matching dashboard style.
- Confirm no content/data is altered.

---

Proceeding to implement step 1 now: refactor branch list page to use cards with proper spacing.
