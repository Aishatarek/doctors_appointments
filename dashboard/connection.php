<?php
class DBController{
  protected  $server = "localhost";
  protected  $user = "root";
  protected  $pass = "";
  protected $database = "healthcare";
  public $conn=null;

  public function __construct(){
    $this->con = mysqli_connect($this->server, $this->user, $this->pass, $this->database);  
    if ($this->con->connect_error) {
        echo "fail".$this->con->connect_error;
    }
    // echo "connected successfully";
  }
  public function __destruct()
  {
      $this->closeConnection();  
  }
  protected function closeConnection(){
    if ($this->con!=null) {
       $this->con->close();
       $this->con=null;
    }

  }
}



