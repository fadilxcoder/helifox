<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UsersMigration extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $sql = '
            CREATE TABLE `users` (
            `id_user` int(11) NOT NULL AUTO_INCREMENT,
            `uuid` varchar(255) NOT NULL,
            `username` varchar(45) DEFAULT NULL,
            `name` varchar(255) DEFAULT NULL,
            `password` varchar(255) DEFAULT NULL,
            `last_login` datetime DEFAULT NULL,
            PRIMARY KEY (`id_user`)
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ';
        
        $this->execute($sql);
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $sql = '
            DROP TABLE IF EXISTS `hfx_users`;
        ';
        
        $this->execute($sql);
    }
}
