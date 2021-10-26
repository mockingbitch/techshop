<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login($username,$pass){
        $username = $this->fm->validation($username);
        $userpass = $this->fm->validation($pass);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $userpass = mysqli_real_escape_string($this->db->link, $userpass);
        $userpass = md5($userpass);
        if(empty($username)||empty($userpass)){
            $alert = "ID or password must be not empty";
            return $alert;
        }
        else{
            echo  $username, $userpass;
            $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password  = '$userpass' LIMIT 1";
            $result = $this->db->select($query);
            var_dump($result);
            if($result){
                echo "aas";
                $value = $result->fetch_assoc();
                Session::set('userlogin',true);
                Session::set('userid',$value['userid']);
                Session::set('username',$value['username']);
                Session::set('password',$value['password']);
                Session::set('usermail',$value['usermail']);
                Session::set('phone',$value['phone']);
                Session::set('fullname',$value['fullname']);
//                $_SESSION['user'] = $value;
                header('location:index.php');
                $alert = "Success";
                return $alert;
            }
            else{
                $alert = "Wrong user or password";
                return $alert;
            }
        }
    }
}
?>