<?php
class DbConnect
{

  private $hostname = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "courserepo";
  public $conn = "";

  function __construct()
  {
    $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);

    if (mysqli_connect_errno()) {
      die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
  }

  function closeConnection()
  {
    mysqli_close($this->conn);
  }
}

?>