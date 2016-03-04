<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1453638395.
 * Generated on 2016-01-24 15:56:35 by root
 */
class PropelMigration_1453638395
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

DROP TABLE IF EXISTS `Users`;

ALTER TABLE `log` DROP FOREIGN KEY `log_fk_12beab`;

DROP INDEX `log_fi_12beab` ON `log`;

ALTER TABLE `log`

  ADD `location` VARCHAR(100) NOT NULL AFTER `id`,

  DROP `server_id`;

CREATE TABLE `users`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(15) NOT NULL,
    `Password` VARCHAR(40) NOT NULL,
    `Email` VARCHAR(100) NOT NULL,
    `Activated` TINYINT(1) DEFAULT 0 NOT NULL,
    `Confirmation` CHAR(40) DEFAULT \'\' NOT NULL,
    `RegDate` INTEGER(11) NOT NULL,
    `LastLogin` INTEGER(11) DEFAULT 0 NOT NULL,
    `GroupID` INTEGER(2) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`ID`)
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

DROP TABLE IF EXISTS `users`;

ALTER TABLE `log`

  ADD `server_id` INTEGER NOT NULL AFTER `id`,

  DROP `location`;

CREATE INDEX `log_fi_12beab` ON `log` (`server_id`);

ALTER TABLE `log` ADD CONSTRAINT `log_fk_12beab`
    FOREIGN KEY (`server_id`)
    REFERENCES `server` (`id`);

CREATE TABLE `Users`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(15) NOT NULL,
    `Password` VARCHAR(40) NOT NULL,
    `Email` VARCHAR(100) NOT NULL,
    `Activated` TINYINT(1) DEFAULT 0 NOT NULL,
    `Confirmation` CHAR(40) DEFAULT \'\' NOT NULL,
    `RegDate` INTEGER NOT NULL,
    `LastLogin` INTEGER DEFAULT 0 NOT NULL,
    `GroupID` INTEGER(2) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}