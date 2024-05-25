<?php
// I made Model as a trait because i don't need Model to be instantiable.
trait Model
{
    use Database;

    protected $limit = 10;
    
    // offset: Specifies the number of rows to skip before fetching the results.
    protected $offset = 0;

    protected $order_type = 'ASC';
    protected $order_column = 'name';


    public function getAll(){
        $qry = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit  OFFSET $this->offset";
        return $this->query($qry);
    }

    public function get($data)
    {
       $keys = array_keys($data);

        $qry = "SELECT * FROM $this->table WHERE ";

        $idx = 0;

        foreach($keys as $key){
            $qry .= $key . " = :" . $key;
            if($idx != count($data)-1)
               $qry .= " AND ";
            $idx += 1;
        }
        $qry .= "ORDER BY $this->order_column $this->order_type LIMIT $this->limit  OFFSET $this->offset";

        // echo($qry);

        return $this->query($qry,$data);
    }

    public function insert($data)
    {
          // remove the unwanted data

          if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key, $this->allowedColumns)){
                    // remove item with $key key from the array
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $qry = "INSERT INTO ". $this->table ." (" . implode(",",$keys) . ") VALUES (:".implode(",:",$keys).")";

        // echo $qry;

        $this->query($qry,$data);
    }

    public function update($id,$data)
    {


        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

        $data['id'] = $id;

        $keys = array_keys($data);

        $qry = "UPDATE ". $this->table ." SET ";

        $idx = 0;

        foreach($keys as $key){
            $qry .= $key . " = :" . $key;
            if($idx != count($data)-1)
               $qry .= ", ";
            $idx += 1;
        }

        $qry .= " WHERE id = :id"; 

        echo($qry);

        $this->query($qry,$data);
    }

    public function delete($id)
    {

        $data['id'] = $id;

        $qry = "DELETE  FROM ". $this->table ." WHERE id = :id";


        // echo($qry);

        return $this->query($qry,$data);
    }
}
