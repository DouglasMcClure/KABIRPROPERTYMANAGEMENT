<?php

require_once '../include/config.php';

class Auth extends Database
{
  //Register New User
  public function register($name, $email, $password): bool
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'pass' => $password]);

    return true;
  }

  //Check if user already registered
  public function user_exist($email)
  {
    $sql = "SELECT email FROM users WHERE  email = :email";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  //Login Existing User
  public function login($email)
  {
    $sql = "SELECT email, password FROM users WHERE email = :email AND deleted != 0";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
  }

  //Current User In Session
  public function currentUser($email)
  {
    $sql = "SELECT * FROM users WHERE email= :email AND deleted != 0";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
  }

  //Forgot Password
  public function forgot_password($token, $email): bool
  {
    $sql = "UPDATE users SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['token' => $token, 'email' => $email]);

    return true;
  }

  //Reset Password User Auth
  public function reset_pass_auth($email, $token)
  {
    $sql = "SELECT id FROM users WHERE email = :email AND token = :token AND token != '' AND token_expire > NOW() AND deleted != 0";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['email' => $email, 'token' => $token]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
  }

  //Update New Password
  public function update_new_pass($pass, $email): bool
  {
    $sql = "UPDATE users SET token = '', password = :pass WHERE email = :email AND deleted != 0";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['pass' => $pass, 'email' => $email]);

    return true;
  }

  //Create New Work Order
  public function create_new_work_order($uid, $subject, $details): bool
  {
    $sql = "INSERT INTO work_orders (uid, subject, details) VALUES (:uid, :subject, :details)";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['uid' => $uid, 'subject' => $subject, 'details' => $details]);
    return true;
  }

  //Fetch All Orders Of An User
  public function get_orders($uid): bool|array
  {
    $sql = "SELECT * FROM work_orders WHERE uid = :uid";
    $stmt = $this->dbh->prepare($sql);
    $stmt ->execute(['uid'=>$uid]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  //Edit Order Of An User
  public function edit_order($id){
    $sql = "SELECT * FROM work_orders WHERE id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt ->execute(['id'=>$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //Update Order Of An User
  public function update_order($id, $subject, $details): bool
  {
    $sql = "UPDATE work_orders SET subject = :subject, details = :details, update_at = NOW() WHERE id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['subject' => $subject, 'details' => $details, 'id'=>$id]);
    return true;
  }

  //Delete Order Of An User
  public function delete_order($id): bool
  {
    $sql = "DELETE FROM work_orders WHERE id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }
}
