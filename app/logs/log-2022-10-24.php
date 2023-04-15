<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-24 11:52:49 --> Severity: error --> Exception: Too few arguments to function Payments::monthlyPayments(), 0 passed in C:\xampp\htdocs\maziwa\html\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 189
ERROR - 2022-10-24 11:56:06 --> Severity: error --> Exception: Too few arguments to function Payments::monthlyPayments(), 0 passed in C:\xampp\htdocs\maziwa\html\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 189
ERROR - 2022-10-24 12:17:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`=`
ORDER BY `payments`.`created_at` DESC' at line 7 - Invalid query: SELECT `payments`.*, `farmers_biodata`.`id` as `farID`, `farmers_biodata`.`fname`, `farmers_biodata`.`mname`, `farmers_biodata`.`lname`, `farmers_biodata`.`center_id`, `collection_centers`.`id` as `colID`, `collection_centers`.`centerName`, `users`.`id` as `userID`, `users`.`firstname`, `users`.`lastname`
FROM `payments`
JOIN `farmers_biodata` ON `farmers_biodata`.`farmerID` = `payments`.`farmerID`
JOIN `collection_centers` ON `collection_centers`.`id` = `farmers_biodata`.`center_id`
JOIN `users` ON `users`.`id` = `payments`.`created_by`
WHERE `payments`.`created_at` = '2022-10-21 12:01'
GROUP BY `payments`.`created_at` `=`
ORDER BY `payments`.`created_at` DESC
ERROR - 2022-10-24 12:17:26 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 269
ERROR - 2022-10-24 12:35:46 --> Severity: error --> Exception: Too few arguments to function Payments::monthlyPayments(), 0 passed in C:\xampp\htdocs\maziwa\html\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 189
ERROR - 2022-10-24 12:36:36 --> Severity: error --> Exception: Too few arguments to function Payments::monthlyPayments(), 0 passed in C:\xampp\htdocs\maziwa\html\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 189
