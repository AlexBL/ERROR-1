<?php
  
 $installer = $this;
  
 $installer->startSetup();
  
 $installer->run("
  
-- DROP TABLE IF EXISTS {$this->getTable('<hello>')};
 CREATE TABLE {$this->getTable('<hello>')} (
   `<hello>_id` int(11) unsigned NOT NULL auto_increment,
   `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL default '',
   `status` smallint(6) NOT NULL default '0',
   `created_time` datetime NULL,
   `update_time` datetime NULL,
   PRIMARY KEY (`<hello>_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
     ");
  
 $installer->endSetup();