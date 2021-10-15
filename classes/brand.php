<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($data)
    {
        $brandName = $this->fm->validation($data['brandName']);
        $brandDes = $this->fm->validation($data['brandDes']);
        $brandSlug = $this->fm->to_slug($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $brandDes = mysqli_real_escape_string($this->db->link, $brandDes);
        $brandSlug = mysqli_real_escape_string($this->db->link, $brandSlug);
        $status = mysqli_real_escape_string($this->db->link, $data['active']);
        if (empty($brandName)) {
            $alert = "category name must be not empty";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_brand(brandName,brandDescription,brandSlug,status) 
            VALUES ('$brandName','$brandDes','$brandSlug','$status')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success' style = 'color:green; font-weight:bold'>Thêm " . $brandName . " thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
                return $alert;
            }
        }
    }
    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brandid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyId($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandid ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($data, $id)
    {
        $brandName = $this->fm->validation($data['brandName']);
        $brandDes = $this->fm->validation($data['brandDes']);
        $brandSlug = $this->fm->to_slug($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $brandDes = mysqli_real_escape_string($this->db->link, $brandDes);
        $brandSlug = mysqli_real_escape_string($this->db->link, $brandSlug);

        if (empty($brandName)) {
            $alert = "brand name must be not empty";
            return $alert;
        } else {
            $query = "UPDATE tbl_brand SET brandName = '$brandName', brandDescription = '$brandDes',brandSlug = '$brandSlug' WHERE brandid = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success' style = 'color:green; font-weight:bold'>Sửa " . $brandName . " thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
                return $alert;
            }
        }
    }
    public function delete_brand($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brandid ='$id'";
        $result = $this->db->delete($query);
        
        if ($result) {
            $alert = "<span class='success' style = 'color:green; font-weight:bold'>Xoá thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
            return $alert;
        }
    }
    public function activate($id)
    {
        $query = "UPDATE tbl_brand SET status = '1' WHERE brandid = '$id'";
        $result = $this->db->update($query);
        $alert = "Đã kích hoạt";
        return $alert;
    }
    public function deactivate($id)
    {
        $query = "UPDATE tbl_brand SET status = '0' WHERE brandid = '$id'";
        $result = $this->db->update($query);
        $alert = "Đã huỷ kích hoạt";
        return $alert;
    }


}

?>