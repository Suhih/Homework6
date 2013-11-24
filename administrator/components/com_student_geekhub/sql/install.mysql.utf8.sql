CREATE TABLE IF NOT EXISTS `#__student_geekhub_info` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`student_foto` VARCHAR(255)  NOT NULL ,
`student_name` VARCHAR(50)  NOT NULL ,
`date_of_birth` DATE NOT NULL ,
`student_gender` VARCHAR(255)  NOT NULL ,
`student_grupe` VARCHAR(255)  NOT NULL ,
`student_gpa` VARCHAR(2)  NOT NULL ,
`student_number` VARCHAR(10)  NOT NULL ,
`student_info` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;

