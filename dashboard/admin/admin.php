<?php
class Admin
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function addAdmin($email, $password, $name, $avatar)
    {
        if (isset($name) && isset($email) && isset($password)  && isset($avatar)) {
            $sqll = "SELECT * FROM admin WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {
                function img($imgg)
                {
                    if (isset($imgg) && $imgg["error"] == 0) {
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        $filename = rand(0, 1000) . $imgg["name"];
                        $filetype = $imgg["type"];
                        $filesize = $imgg["size"];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        $maxsize = 5 * 1024 * 1024 * 1024;
                        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                        if (in_array($filetype, $allowed)) {
                            if (file_exists("../../uploads/admin/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/admin/" . $filename);
                            }
                        } else {
                            echo "Error: There was a problem uploading your file. Please try again.";
                        }
                        if ($result) {
                            return "'" . $filename . "'";
                        } else {
                            echo "Error: " . $imgg["error"];
                        }
                    }
                }
                $avatar = img($avatar);
                $this->db->con->query("INSERT INTO admin(email, password, name, avatar) VALUES($email, $password, $name, $avatar)");
            }
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM admin");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteAdmin($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM admin WHERE id={$item_id}");
        }
    }
    public function signIn($email, $password)
    {
        if ($this->db->con != null) {
            if (isset($email) && isset($password)) {
                $sql = "SELECT * FROM admin WHERE email=$email AND password=$password";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['avatar'] = $row['avatar'];

                    header("Location: dashboard/dashboard.php");
                } else {
                    echo "<script>alert('Woops! email or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function updatePass($item_id = null, $password)
    {
        if ($item_id != null) {

            $this->db->con->query("UPDATE admin SET password={$password} WHERE id={$item_id}");
        }
    }
    public function updateAdmin($item_id = null, $email, $name, $avatar)
    {
        if ($item_id != null) {
            if(isset($avatar['name'])){
                function img($imgg)
                {
                    if (isset($imgg) && $imgg["error"] == 0) {
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        $filename = rand(0, 1000) . $imgg["name"];
                        $filetype = $imgg["type"];
                        $filesize = $imgg["size"];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        $maxsize = 5 * 1024 * 1024 * 1024;
                        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                        if (in_array($filetype, $allowed)) {
                            if (file_exists("../../uploads/admin/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/admin/" . $filename);
                            }
                        } else {
                            echo "Error: There was a problem uploading your file. Please try again.";
                        }
                        if ($result) {
                            return "'" . $filename . "'";
                        } else {
                            echo "Error: " . $imgg["error"];
                        }
                    }
                }
                $avatar = img($avatar);
                $this->db->con->query("UPDATE admin SET email={$email},name={$name},avatar={$avatar} WHERE id={$item_id}");

            }else{
                $this->db->con->query("UPDATE admin SET email={$email},name={$name} WHERE id={$item_id}");

               
            }

        }
    }
}
