<?php
function is_valid_order($take_out_orders, $dine_in_orders, $served_orders) {
    $combined_orders = array_merge($take_out_orders, $dine_in_orders);
    $index = 0;
    foreach ($served_orders as $order) {
        while ($index < count($combined_orders) && $combined_orders[$index] != $order) {
            $index++;
        }
        if ($index >= count($combined_orders)) {
            return false;
        }
        $index++;
    }
    return true;
}

// Contoh penggunaan
$take_out_orders = [1, 3, 5];
$dine_in_orders = [2, 4, 6];
$served_orders = [1, 2, 4, 6, 5, 3];

echo is_valid_order($take_out_orders, $dine_in_orders, $served_orders) ? 'Valid' : 'Not Valid';  // Output: Not Valid

$take_out_orders = [17, 8, 24];
$dine_in_orders = [12, 19, 2];
$served_orders = [17, 8, 12, 19, 24, 2];

echo is_valid_order($take_out_orders, $dine_in_orders, $served_orders) ? 'Valid' : 'Not Valid';  // Output: Valid
?>
