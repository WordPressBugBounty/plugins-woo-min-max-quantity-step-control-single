# Documentation Folder

This folder contains documentation for bug fixes and updates to the WooCommerce Min Max Quantity & Step Control plugin.

## Structure

```
doc/
└── cart-page-update/
    ├── fix-details.md     # Detailed explanation of the cart page validation fix
    └── test-cases.md      # Comprehensive test cases for validation
```

## cart-page-update

This folder contains documentation for the cart page checkout validation fix implemented on December 3, 2025.

### Files:
- **fix-details.md** - Complete details about the bug, solution, and implementation (in Bengali and English)
- **test-cases.md** - Comprehensive test cases to verify the fix works correctly

### Quick Summary:
A critical bug in cart page step quantity validation was preventing proper enforcement of conditions. The bug was a syntax error (`== !0` instead of `!= 0`) that has been fixed.

---

For any questions or issues, please contact: codersaiful@gmail.com
