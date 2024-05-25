<?php

trait Database
{
    private function connect()
    {

        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;

        $con =  new PDO($string, DBUSER, DBPASS);

        // show($con);

        return $con;
    }

    public function query($query, $data = [])
    {
        $con = $this->connect();

        $stmt = $con->prepare($query);

        // print_r($stmt);

        $keys = array_keys($data);

        foreach ($keys as $key) {
            $x = ":" . $key;
            $stmt->bindValue($x, $data[$key]);
        }

        // print_r($stmt);


        $check = $stmt->execute();

        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        return false;
    }
}
