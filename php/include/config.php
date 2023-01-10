<?php
class Database
{

  const USERNAME = "kabirpropertymanagement@gmail.com";
  const PASSWORD = "asexdmzziovffjai";

  private string $host = "localhost";
  private string $user = "root";
  private string $pass = "";
  private string $dbname = "kpm";

  protected PDO $dbh;
  private $error;

  public function __construct()
  {
    // Set DSN
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
    // Set options
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    // Create a new PDO instanace
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (PDOException $e) {
      // Catch any errors
      $this->error = $e->getMessage();
    }
  }
  function test_input($data): string
  {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
  }

  function showMessage($type, $message): string
  {

    return '<div class="alert alert-'.$type.' alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong class="text-center">'.$message.'</strong>
</div>';

  }
}
