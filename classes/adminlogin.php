<?php
$filepath = realpath(dirname(__FILE__));
require_once '../lib/session.php';
Session::checkLogin();
require_once '../lib/database.php';
require_once '../helpers/format.php';
?>
<?php
class adminlogin 
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPass){
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
       
        if(empty($adminUser)||empty($adminPass)){
            $alert = "ID or password must be not empty";
            return $alert;
        }
        else{
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            
            if($result!=false){
                $value = $result->fetch_assoc();
                Session::set('login',true);
                Session::set('id',$value['id']);
                Session::set('adminUser',$value['adminUser']);
                Session::set('adminName',$value['adminName']);
                Session::set('permission',$value['permission']);
                header('Location:index.php');
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