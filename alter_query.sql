-- Changes made in the database, should be mentioned here.
-- After altering anything in database, copy the query generated by MySQL and paste it here along with date, user name and database name
-- For e.g.
-- 2021-09-30 Name DB-Name
-- ALTER TABLE....

-- 2021-11-10 Ketan scheduledown
ALTER TABLE `invoice_items` ADD `item_tax_rate` VARCHAR(255) NULL AFTER `appointment_services_id`, ADD `item_tax_amount` VARCHAR(255) NULL AFTER `item_tax_rate`;

ALTER TABLE `inventory_products` ADD `average_price` FLOAT NULL DEFAULT '0' AFTER `initial_stock`;

ALTER TABLE `inventory_order_logs` ADD `average_price` FLOAT NULL DEFAULT '0' AFTER `stock_on_hand`;

ALTER TABLE `invoice_items` ADD `item_tax_id` INT(11) NOT NULL DEFAULT '0' AFTER `appointment_services_id`;

--2021-12-09 Jay 
--ALTER TABLE `settings` ADD `telnyx_username` VARCHAR(255) NULL AFTER `telnyx_number`, ADD `telnyx_token` VARCHAR(255) NULL AFTER `telnyx_username`;

ALTER TABLE `users`  ADD `telnyx_username` VARCHAR(255) NULL DEFAULT NULL  AFTER `is_admin`,  ADD `telnyx_token` VARCHAR(255) NULL DEFAULT NULL  AFTER `telnyx_username`,  ADD `telnyx_api_key` VARCHAR(255) NULL DEFAULT NULL  AFTER `telnyx_token`,  ADD `sms_service_type` TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0-Admin, 1-user'  AFTER `telnyx_api_key`;