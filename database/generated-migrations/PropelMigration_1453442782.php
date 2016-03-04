<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1453442782.
 * Generated on 2016-01-22 07:06:22 
 */
class PropelMigration_1453442782
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

ALTER TABLE `server`

  ADD `celery_username` VARCHAR(50) NOT NULL AFTER `ip`,

  ADD `celery_password` VARCHAR(60) NOT NULL AFTER `celery_username`;

ALTER TABLE `users`

  CHANGE `ID` `ID` INTEGER NOT NULL AUTO_INCREMENT,

  CHANGE `Activated` `Activated` TINYINT(1) DEFAULT 0 NOT NULL,

  CHANGE `RegDate` `RegDate` INTEGER(11) NOT NULL,

  CHANGE `LastLogin` `LastLogin` INTEGER(11) DEFAULT 0 NOT NULL,

  CHANGE `GroupID` `GroupID` INTEGER(2) DEFAULT 1 NOT NULL;

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

ALTER TABLE `server`

  DROP `celery_username`,

  DROP `celery_password`;

ALTER TABLE `users`

  CHANGE `ID` `ID` int(7) unsigned NOT NULL AUTO_INCREMENT,

  CHANGE `Activated` `Activated` tinyint(1) unsigned DEFAULT 0 NOT NULL,

  CHANGE `RegDate` `RegDate` int(11) unsigned NOT NULL,

  CHANGE `LastLogin` `LastLogin` int(11) unsigned DEFAULT 0 NOT NULL,

  CHANGE `GroupID` `GroupID` int(2) unsigned DEFAULT 1 NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}