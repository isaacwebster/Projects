CREATE TABLE `IP Location` (
`ip_from` INT(10) NOT NULL,
`ip_to` INT(10) NOT NULL,
`country_code` CHAR(2) NOT NULL,
`country_name` VARCHAR(64) NOT NULL,
`region_name` VARCHAR(128) NOT NULL,
`city_name` VARCHAR(128) NOT NULL,
INDEX `idx_ip_from` (`ip_from`),
INDEX `idx_ip_from_to` (`ip_from`, `ip_to`),
INDEX `idx_ip_to` (`ip_to`),
INDEX `idx_cc_rn` (`country_code`, `region_name`),
INDEX `idx_cc_rn_cn` (`country_code`, `region_name`, `city_name`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
