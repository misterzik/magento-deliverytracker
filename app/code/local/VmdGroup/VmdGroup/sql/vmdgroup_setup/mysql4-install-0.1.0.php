<?php
/**
 * /\/\!st3rZ!k
 * SQL Automatic Installation,
 * After script is activated
 *
 * Note: Script is Activated on default :)
 */

$installer = $this;
$installer->startSetup();

/**
 * Feel free to make any changes to the DB being created.
 * Things to keep in mind, This will create a table called
 * mealdelivery, and inside we will have two tables Tablename_id
 * with auto-increment and Name which is a basic varchar with regular
 * text.
 *
 */

$sql=<<<SQLTEXT
create table mealdelivery(date_id int not null auto_increment, name int not null, primary key(date_id));
    insert into mealdelivery values(1,'12272017');
    insert into mealdelivery values(2,'12282017');
		
SQLTEXT;

$installer->run($sql);

/**
 * SingleTon Model, In the case we do not want to use
 * Models.
 * Mage::getModel('core/url_rewrite')->setId(null);
 *
 * With <3 mrZ.
 */

$installer->endSetup();
	 