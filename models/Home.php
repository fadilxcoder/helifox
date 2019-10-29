<?php

/*
 *  +------------------------------------------+
 *  ¦                 |\__/|                   ¦
 *  ¦                / - - \                   ¦
 *  ¦               /_.~ ~,_\                  ¦
 *  ¦                  \@/                     ¦
 *  ¦------------------------------------------¦
 *  ¦           HELIFOX PHP FRAMEWORK          ¦
 *  ¦------------------------------------------¦
 *  ¦      www.facebook.com/fadil.xcoder       ¦
 *  +------------------------------------------+
 *
 *  HELIFOX MVC FRAMEWORK
 *
 *  A Light & Cunning MVC Framework, built for PHP developers to create web apps.
 *
 * Copyright (c) Wednesday, 13 September 2017 ~ DAY OF THE PROGRAMMER ~ Fadil Rosun-Mungur ~ FADILXCODER
 *
*/

namespace Models;

use \Library\Model as Model;

class Home extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    /*  takes in an 2 variables as parameter
        - query = $query ( SQL to QUERY) .
        - type  = 'ARRAY_CON' / 'OBJECT_CON'

        $this->convertor($query, 'ARRAY_CON');
    */
    private function convertor($query, $type)
    {
        $arr = array();
        if($type == 'ARRAY_CON'):
            while( $data = $query->fetch_array(MYSQLI_ASSOC)):
                $arr[] = $data;
            endwhile;
        elseif($type == 'OBJECT_CON'):
            while( $data = $query->fetch_object()):
                $arr[] = $data;
            endwhile;
        else:
            $arr = 'Invalid Parameters';
        endif;
        return $arr;
    }

    /* Function insert - takes in 2 parameters - table_name, array of data to insert in database then return inserted ID */
    public function insert($tbl, $data)
    {
        foreach( array_keys($data) as $key )
        {
            $fields[] = "`$key`";
            $values[] = "'" .$data[$key] . "'";
        }
        $fields = implode(",", $fields);
        $values = implode(",", $values);
        $sql = "INSERT INTO `$tbl`($fields) VALUES ($values)";
        $this->db->set_charset("utf8"); // UTF8 settings
        $this->db->query($sql);
        return $this->db->insert_id;;
    }

    /* Function update - takes in an Array as parameter
        - tbl       = Table Name .
        - column    = column e.g : id , _id , unique_id , ...
        - value     = The value of the variable id .

        $arr = array();
        $arr['tbl'] = 'news';
        $arr['column'] = 'id';
        $arr['value'] = 5;
        $this->hm->update($arr);
    */
    public function update($array)
    {
        $sql = "UPDATE ".$array['tbl']." SET ";
        foreach($array as $key => $value)
        {
            $sql .= $key."='". $value."', ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE `".$array['column']."` = '".$array['value']."' ";
        $this->db->query($sql);
    }


    /*  Function selectAll - takes in 2 parameters
        - table_name
        - type  = 'ARRAY_CON' / 'OBJECT_CON'
    */
    public function selectAll($tbl, $type)
    {
        $sql = "SELECT * FROM `$tbl`";
        $query = $this->db->query($sql);
        $arr = $this->convertor($query, $type);
        return $arr;
    }

    /* Function first - takes in an Array as parameter
        - tbl       = Table Name .
        - column    = column e.g : id , _id , unique_id , ...
        - value        = The value of the variable id .
        - type      = Return type, only 2 type accepted : 'object' / 'array'

        $arr = array();
        $arr['tbl'] = 'news';
        $arr['column'] = 'id';
        $arr['value'] = 5;
        $arr['type'] = 'object';
        $this->hm->first($arr);
    */
    public function first($array)
    {
        $sql = "SELECT * FROM ".$array['tbl']." WHERE `".$array['column']."` = '".$array['value']."' ";
        $query = $this->db->query($sql);

        if($array['type'] == 'array'):
            $data_obj = $query->fetch_array(MYSQLI_ASSOC);
        elseif($array['type'] == 'object'):
            $data_obj = $query->fetch_object();
        else:
            $data_obj = 'Invalid Parameters';
        endif;
        return $data_obj;
    }

    /*
    *   Your personal SQL queries go below..
    */

}
