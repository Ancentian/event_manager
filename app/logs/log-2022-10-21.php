<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-21 12:29:15 --> 404 Page Not Found: Reports/productReports
ERROR - 2022-10-21 12:32:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`farmerID`, `shop_sales`.`itemID`, SUM(shop_sales.qty) as totQty, SUM(shop_s...' at line 1 - Invalid query: SELECT `inventory`.*, `shop_sales`.`id` as `salesID`, `shop_sales`.`date` `shop_sales`.`farmerID`, `shop_sales`.`itemID`, SUM(shop_sales.qty) as totQty, SUM(shop_sales.amount) as totAmount
FROM `inventory`
JOIN `shop_sales` ON `shop_sales`.`itemID` = `inventory`.`id`
GROUP BY `inventory`.`id`
ORDER BY SUM(shop_sales.qty) DESC
ERROR - 2022-10-21 12:32:30 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Reports_model.php 63
ERROR - 2022-10-21 15:53:34 --> Severity: error --> Exception: Too few arguments to function Reports::collection_centerReports(), 0 passed in C:\xampp\htdocs\maziwa\html\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\html\app\controllers\Reports.php 26
