<?php
/**
 * Plugin Name:          WooCommerce Delete All Orders
 * Plugin URI:           https://github.com/lukecav/Woocommerce-delete-all-orders
 * Description:          Delete all your Woocommerce orders with this script.
 * Version:              1.0.0
 * Author:               Luke Cavanagh
 * Author URI:           https://github.com/lukecav
 * License:              GPL2
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * WC requires at least: 3.0.0
 * WC tested up to:      3.3.0-beta.1
 *
 * @package WooCommerce_Delete_All_Orders
 * @author  Luke Cavanagh
 */

// By default wp_ for standard WP-installations
$prefix = 'wp_';

// Database infos here
$host = 'localhost';
$username = 'user';
$password = 'password';
$db = 'dbname';

$conn = new mysqli($host, $username, $password, $db);


if ($conn->connect_error) {
    die('Whoops: '.$conn->connect_error);
}


$sql = 'DELETE FROM '.$prefix.'woocommerce_order_itemmeta';

if ($conn->query($sql) === true) {
    echo 'Deleted woocommerce_order_itemmeta '.PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}



$sql = 'DELETE FROM '.$prefix.'woocommerce_order_items';

if ($conn->query($sql) === true) {
    echo 'Deleted woocommerce_order_items'.PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}



$sql = 'DELETE FROM '.$prefix."posts WHERE post_type = 'shop_order'";

if ($conn->query($sql) === true) {
    echo "Deleted posts where post_type = 'shop_order'".PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}

echo 'Fixed! Your woocommerce orders should be empty! :-)';
