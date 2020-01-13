<?php
namespace App\Core;

class Model extends Database
{
    protected $model = '';
    protected $table_name = '';

    public function all()
    {
        $sql = 'SELECT * FROM ' . $this->table_name . ';';
        return $this->custom_query($sql);
    }

    public function get($id)
    {
        $sql = 'SELECT * FROM ' . $this->table_name . ' WHERE id =' . $id . ' ;';
        return $this->custom_query($sql);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM ' . $this->table_name . ' WHERE id =' . $id . ' ;';
        return $this->custom_query($sql);
    }


}