<?php
class Doctors
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function addDoctor($email, $password, $name, $phone, $Specialization, $Governorate)
    {
        if (isset($name) && isset($email) && isset($password) && isset($phone) && isset($Specialization) && isset($Governorate)) {
            $sqll = "SELECT * FROM doctors WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {
                $this->db->con->query("INSERT INTO doctors(email, password, name, phone, Specialization, Governorate) VALUES($email, $password, $name, $phone, $Specialization, $Governorate)");
            }
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM doctors");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteDoctors($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM doctors WHERE id={$item_id}");
        }
    }
    public function signIn($email, $password)
    {
        if ($this->db->con != null) {
            if (isset($email) && isset($password)) {
                $sql = "SELECT * FROM doctors WHERE email=$email AND password=$password";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['doctor_id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];

                    header("Location: dashboard/doctorDashboard.php");
                } else {
                    echo "<script>alert('Woops! email or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function updatePass($item_id = null, $password)
    {
        if ($item_id != null) {

            $this->db->con->query("UPDATE doctors SET password={$password} WHERE id={$item_id}");
        }
    }
    public function updatedoctors($item_id = null, $email, $name, $phone, $Specialization, $Governorate)
    {
        if ($item_id != null) {

                $this->db->con->query("UPDATE doctors SET email={$email},name={$name},phone={$phone},Specialization={$Specialization},Governorate={$Governorate} WHERE id={$item_id}");
        }
    }
}
