<?php
session_start();
class Users
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function addUser($email, $password, $name, $phone, $address, $gender)
    {
        if (isset($name) && isset($email) && isset($password) && isset($phone) && isset($address) && isset($gender)) {
            $sqll = "SELECT * FROM patients WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {
                $this->db->con->query("INSERT INTO patients(email, password, name, phone, address, gender) VALUES($email, $password, $name, $phone, $address, $gender)");
            }
        }
    }
    public function Register($email, $password, $name, $phone, $address, $gender)
    {
        if (isset($name) && isset($email) && isset($password) && isset($phone) && isset($address) && isset($gender)) {
            $sqll = "SELECT * FROM patients WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {

                $this->db->con->query("INSERT INTO patients(email, password, name, phone, address, gender) VALUES($email, $password, $name, $phone, $address, $gender)");
                header("Refresh:0");
                $sqlll = "SELECT * FROM patients WHERE email=$email AND password=$password";
                $resulttt =  $this->db->con->query($sqlll);
                if ($resulttt->num_rows > 0) {
                    $row = mysqli_fetch_assoc($resulttt);
                    $_SESSION['name'] =  $row['name'];
                    $_SESSION['user_id'] =  $row['id'];

                    header("Location: index.php");
                }
            }
        }
    }
    public function signIn($email, $password)
    {
        if ($this->db->con != null) {
            if (isset($email) && isset($password)) {
                $sql = "SELECT * FROM patients WHERE email=$email AND password=$password";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];

                    header("Location: index.php");


                    // header("Location: dashboard/dashboard.php");
                } else {
                    echo "<script>alert('Woops! name or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM patients");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteUser($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM patients WHERE id={$item_id}");
        }
    }
    // public function updateUser($item_id = null, $name, $password, $store, $role)
    // {
    //     if ($item_id != null) {
    //         if (isset($name)  && isset($password)  && isset($role)) {
    //             if ($role == "'user'") {
    //                 $this->db->con->query("UPDATE patients SET username={$name},password={$password},store={$store},role={$role} WHERE id={$item_id}");
    //             } elseif ($role == "'spectator'") {
    //                 $store = '0';
    //                 $this->db->con->query("UPDATE patients SET username={$name},password={$password},store={$store},role={$role} WHERE id={$item_id}");
    //             }
    //         }
    //     }
    // }
}
