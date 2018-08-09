<?php
   /**
   * 
   */
   class Database 
   {
   	public $con;
   	public function __construct()
   	{
   		$this->con = mysqli_connect("localhost", "root", "", "kesmas");
   		if(!$this->con)
   		{
         echo'Database connection error'.mysqli_connect_error($this->con);
   		}
   	}

   }

   /**
   * 
   */
   class DataOperation extends Database
   {
   	 

   	 //insert data
    public function insert_data($table, $data)
    {
      $string = "INSERT INTO ".$table." (";
      $string .= implode(",", array_keys($data)) . ') VALUES (';
      $string .= "'" . implode("','", array_values($data)) . "')";
      if(mysqli_query($this->con, $string))
      {
      	return true;
      }
      else
      {
      	echo mysqli_error($this->con);
      }
    }

    //tampil data
    public function show_data($table)
    {
    	$hasil = array();
    	$data = mysqli_query($this->con,"SELECT * FROM ".$table);
    	while($r = mysqli_fetch_assoc($data)){
    		$hasil[] = $r;
    	}
    	return $hasil;
    }
    
    //edit/pilih data
    public function select_data($table, $where){
    	$sql = "";
    	$kondisi = "";
    	foreach ($where as $key => $value) {
    		# code...
    		$kondisi .= $key . "='" . $value . "' AND ";
    	}
    	$kondisi = substr($kondisi, 0, -5);
    	$sql .= "SELECT * FROM ".$table." WHERE ".$kondisi;
    	$query = mysqli_query($this->con, $sql);
    	$row = mysqli_fetch_array($query);
    	return $row;
    }
    
    //update data
    public function update_data($table, $where, $data){
    	$sql = "";
    	$kondisi = "";
    	foreach ($where as $key => $value) {
        # code...
        $kondisi .= $key . "='" . $value . "' AND ";
      }
    	$kondisi = substr($kondisi, 0, -5);
    	foreach ($data as $key => $value) {
    		# code...
    		$sql .= $key . "='" .$value."', ";
    	}
    	$sql = substr($sql, 0,-2);
    	$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$kondisi;
    	if(mysqli_query($this->con, $sql))
    	{
    		return true;
    	}else{
        echo "error";
      }
    }

    //hapus data
    public function delete_data($table,$where){
      $sql='';
      $kondisi='';
     foreach ($where as $key => $value) {
        # code...
        $kondisi .= $key . "='" . $value . "' AND ";
      }
      $kondisi = substr($kondisi, 0, -5);
      $sql .= "DELETE FROM ".$table." WHERE ".$kondisi;
      if(mysqli_query($this->con, $sql))
      {
        return true;
      }else{
        echo"error";
      }
    }

   	 
   	 
   }
   $db = new DataOperation;

?>