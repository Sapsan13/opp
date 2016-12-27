<?php include "init.php" ?>

<?php

class Db_object
{

    public static function find_all()
    {
        return static::findQuery("SELECT * FROM " . static::$table . " ");
    }

    public static function findById($id)
    {

        $resultArray = static::findQuery("SELECT * FROM " . static::$table . " WHERE id= $id LIMIT 1 ");

        return !empty ($resultArray) ? array_shift($resultArray) : false;
    }

    public static function findQuery($sql)
    {
        global $database;

        $resultSet = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($resultSet)) {

            $the_object_array[] = static:: instantiation($row);
        }
        return $the_object_array;
    }


    public static function instantiation($the_record)
    {
        $calling_class = get_called_class();

        $object = new $calling_class;



        foreach ($the_record as $theAttribute => $value) {

            if ($object->has_the_attribute($theAttribute)) {

                $object->$theAttribute = $value;
            }

        }


        return $object;
    }

    private function has_the_attribute($theAttribute)
    {

        $object_properties = get_object_vars($this);

        return array_key_exists($theAttribute, $object_properties);
    }

    protected function clean_prop()
    {
        global $database;

        $clean_prop = array();

        foreach ($this->properties() as $key => $value) {

            $clean_prop[$key] = $database->escape_string($value);

        }
        return $clean_prop;

    }


    ////Delete Create Update


    public function create()
    {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . static::$table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";
        if ($database->query($sql)) {

            $this->id = $database->the_insert_id();

            return true;

        } else {

            return false;

        }

    }

    public function update()
    {
        $properties = $this->properties();
        $prop_pairs = array();
        global $database;
        foreach ($properties as $key => $value) {


            $prop_pairs[] = "{$key}='{$value}'";


        }

        $sql = "UPDATE " . static::$table . " SET ";
        $sql .= implode(",", $prop_pairs);
        $sql .= " WHERE id=" . $database->escaprString($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function delete()
    {
        global $database;

        $sql = "DELETE FROM " . static::$table . " ";
        $sql .= " WHERE id=" . $database->escaprString($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }




//    public function save()
//    {
//
//        return isset ($this->id) ? $this->update() : $this->create();
//    }
//
    protected function properties()
    {

        //return get_object_vars($this);
        $properties = array();

        foreach (static::$db_table_fields as $db_field) {

            if (property_exists($this, $db_field)) {

                $properties[$db_field] = $this->$db_field;

            }

        }
        return $properties;
    }

}

