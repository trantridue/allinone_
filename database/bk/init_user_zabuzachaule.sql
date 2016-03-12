INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Quản Trị'),
(2, 'editor', 'Nhập Liệu'),
(3, 'employee', 'Nhân Viên');

INSERT INTO `user_role` (`id`, `role_id`, `description`, `user_id`) VALUES
(1, 1, NULL, 1);

INSERT INTO `configuration` (`id`, `name`, `value`, `label`) VALUES
(1, 'import_number_row', '21', 'IMPORT ROW'),
(2, 'export_number_row', '8', 'EXPORT_ROW'),
(3, 'default_row_product_return', '5', 'NBR ROW IMPORT RETURN'),
(4, 'default_password', '123456', 'DEFAULT PASSWORD'),
(5, 'is_sale_for_all', '1', 'SALE ON/OFF'),
(6, 'default_number_line_spend', '5', 'NBR ROW SPEND'),
(7, 'listExportDefault_nbr_day_limit', '0', 'NBR DAY EXPORT'),
(8, 'nbr_day_default_export_returned', '0', 'NBR DAY EXPORT RETURN'),
(9, 'default_nbr_days_load_export', '10', 'NBR DAY EXPORT DEFAULT'),
(10, 'bonus_ratio', '100', 'BONUS RATIO'),
(11, 'init_money', '500', 'AMOUNT INIT'),
(12, 'timeout', '21600', 'SYSTEM TIMEOUT'),
(13, 'limit_default_customer_after_search', '100', 'NBR ROW CUS AFTER'),
(14, 'limit_default_customer_before_search', '10', 'NBR ROW CUS BEFORE'),
(15, 'nbr_customer_by_group_csv', '250', 'NBR CUSTOMER BY GROUP'),
(16, 'nbr_news_default', '20', 'NBR NEWS DEFAULT'),
(17, 'max_width_upload_img', '800', 'max_width_upload_img'),
(18, 'max_height_upload_img', '600', 'max_height_upload_img'),
(19, 'upload_img_quality', '1', 'upload_img_quality'),
(20, 'max_img_size_upload', '2000000', 'max_img_size_upload'),
(21, 'default_nbr_days_load_import', '5', 'default_nbr_days_load_import'),
(22, 'sale_all_taux', '10', 'SALE TAUX'),
(23, 'start_time_backup', '8', 'START TIME_BACK_UP'),
(24, 'end_time_backup', '24', 'END TIME_BACK_UP');