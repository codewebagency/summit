<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1452844909.
 * Generated on 2016-01-15 09:01:49 
 */
class PropelMigration_1452844909
{
    public $comment = '';

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `log`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `server_id` INTEGER NOT NULL,
    `url` VARCHAR(300) NOT NULL,
    `time` DATETIME NOT NULL,
    `request_info` VARCHAR(500) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `log_fi_12beab` (`server_id`),
    CONSTRAINT `log_fk_12beab`
        FOREIGN KEY (`server_id`)
        REFERENCES `server` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `server`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ip` CHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `password` VARCHAR(60) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `log`;

DROP TABLE IF EXISTS `server`;

DROP TABLE IF EXISTS `user`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}