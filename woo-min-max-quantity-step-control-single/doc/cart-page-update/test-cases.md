# Test Cases for Cart Page Validation Fix

## Test Environment Setup
1. Install and activate the "Min Max Control" plugin
2. Ensure WooCommerce is active and configured
3. Create a test product

## Test Case 1: Step Quantity Validation

### Setup
1. Navigate to WooCommerce → Min Max Control Settings
2. Go to Cart Page Conditions section
3. Set Step Quantity = 5

### Test Steps
1. Add a product to cart with quantity = 7 (not a multiple of 5)
2. Go to cart page
3. Click "Proceed to Checkout" button

### Expected Result
- ❌ Should NOT proceed to checkout
- ✅ Error message should appear
- ✅ User should remain on cart page

### Actual Result (Before Fix)
- ❌ Could proceed to checkout (BUG)
- ❌ No error message shown

### Actual Result (After Fix)
- ✅ Cannot proceed to checkout
- ✅ Error message displayed
- ✅ User stays on cart page

---

## Test Case 2: Valid Step Quantity

### Setup
Same as Test Case 1

### Test Steps
1. Add a product to cart with quantity = 10 (multiple of 5)
2. Go to cart page
3. Click "Proceed to Checkout" button

### Expected Result
- ✅ Should proceed to checkout
- ✅ No error message

### Actual Result
- ✅ Proceeds to checkout correctly
- ✅ No error message

---

## Test Case 3: Minimum Quantity Validation

### Setup
1. Set Cart Quantity Min = 5

### Test Steps
1. Add product to cart with quantity = 3
2. Try to checkout

### Expected Result
- ❌ Cannot checkout
- ✅ Error message: "Your cart item's total quantity must be equal to or more than 5"

---

## Test Case 4: Maximum Quantity Validation

### Setup
1. Set Cart Quantity Max = 10

### Test Steps
1. Add product to cart with quantity = 15
2. Try to checkout

### Expected Result
- ❌ Cannot checkout
- ✅ Error message: "Your cart item's total quantity must be equal to or less than 10"

---

## Test Case 5: Price Validation

### Setup
1. Set Cart Price Min = $50
2. Set Cart Price Max = $200

### Test Steps - Min Price
1. Add products totaling $30
2. Try to checkout

### Expected Result
- ❌ Cannot checkout
- ✅ Error message about minimum price

### Test Steps - Max Price
1. Add products totaling $250
2. Try to checkout

### Expected Result
- ❌ Cannot checkout
- ✅ Error message about maximum price

---

## Test Case 6: Product Exclude

### Setup
1. Set Product Exclude = [Product ID 123]
2. Set Cart Quantity Min = 5

### Test Steps
1. Add only Product ID 123 with quantity 3
2. Try to checkout

### Expected Result
- ✅ Should checkout (excluded product doesn't count toward limits)

---

## Test Case 7: Product Include

### Setup
1. Set Product Include = [Product ID 456]
2. Set Cart Quantity Min = 5

### Test Steps
1. Add Product ID 456 with quantity 3
2. Add other products with quantity 10
3. Try to checkout

### Expected Result
- ❌ Cannot checkout
- ✅ Only Product ID 456 counts (quantity = 3, needs min 5)

---

## Test Case 8: Combined Conditions

### Setup
1. Set Cart Quantity Min = 5
2. Set Cart Quantity Max = 20
3. Set Step Quantity = 5
4. Set Cart Price Min = $50

### Test Steps - All Valid
1. Add products: quantity = 10, price = $100
2. Try to checkout

### Expected Result
- ✅ Should checkout successfully

### Test Steps - Invalid Step
1. Add products: quantity = 12, price = $100
2. Try to checkout

### Expected Result
- ❌ Cannot checkout
- ✅ Error about step quantity

---

## Edge Cases

### Edge Case 1: Empty Cart
- Expected: Can proceed (no validation needed)

### Edge Case 2: Step = 0 or not set
- Expected: No step validation applied

### Edge Case 3: Multiple Products
- Expected: Total quantity validated across all products

---

## Notes
- All tests should be run with the fixed code
- Error messages should be clear and helpful
- Validation should happen before redirect to checkout
- Cart should not be modified by validation, only checkout should be blocked
