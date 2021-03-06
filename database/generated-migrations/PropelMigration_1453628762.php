<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1453628762.
 * Generated on 2016-01-24 10:46:02 
 */
class PropelMigration_1453628762
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

ALTER TABLE `log`

  DROP `location`;

ALTER TABLE `users`

  CHANGE `RegDate` `RegDate` INTEGER(11) NOT NULL,

  CHANGE `LastLogin` `LastLogin` INTEGER(11) DEFAULT 0 NOT NULL;

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

ALTER TABLE `log`

  ADD `location` VARCHAR(100) NOT NULL AFTER `id`;

ALTER TABLE `users`

  CHANGE `RegDate` `RegDate` INTEGER NOT NULL,

  CHANGE `LastLogin` `LastLogin` INTEGER DEFAULT 0 NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}