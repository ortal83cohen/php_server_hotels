<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/8/2016
 */
class MySql
{// if I had more time I would replace this class with DAL framework

    private $db;

    /**
     * MySql constructor.
     */
    public function __construct()
    {
        $this->db = new \DB\SQL('mysql:host=sql2.freemysqlhosting.net;port=3306;dbname=sql2106079', 'sql2106079', "vS6%gG3!");
    }

    public function insertClick($id, $vendor)
    {
        $this->db->exec('INSERT INTO tbl_clicks(id, count ,vendor)  VALUES(:id,1,:vendor)  ON DUPLICATE KEY UPDATE count = count+1', array(":id" => $id, ":vendor" => $vendor));
    }
}