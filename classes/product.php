<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$files)
    {
        $productName = $this->fm->validation($data['productName']);
        $productDes  = $this->fm->validation($data['productDes']);
        $content     = $this->fm->validation($data['content']);
        $price       = $this->fm->validation($data['productPrice']);
        $quantity    = $this->fm->validation($data['productQuantity']);
        $cateid      = $this->fm->validation($data['cateid']);
        $brandid     = $this->fm->validation($data['brandid']);
        $productSlug = $this->fm->to_slug($productName);
        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $cateid      = mysqli_real_escape_string($this->db->link, $cateid);
        $brandid     = mysqli_real_escape_string($this->db->link, $brandid);
        $des         = mysqli_real_escape_string($this->db->link, $productDes);
        $price       = mysqli_real_escape_string($this->db->link, $price);
        $content     = mysqli_real_escape_string($this->db->link, $content);
        $quantity    = mysqli_real_escape_string($this->db->link, $quantity);
        $productSlug    = mysqli_real_escape_string($this->db->link, $productSlug);
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../admin/uploads/products/".$unique_image;
        
        

        if (empty($productName)||empty($cateid)||empty($brandid)||empty($des)||empty($price)||empty($content)||empty($quantity)) {
            $alert = "Fields must be not empty";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(productName,cateid,brandid,productDescription,content,productQuantity,productPrice,img,productSlug) 
            VALUES ('$productName','$cateid','$brandid','$des','$content','$quantity','$price','$unique_image','$productSlug')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success' style = 'color:green; font-weight:bold'>Thêm " . $productName . " thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
                return $alert;
            }
        }
    }
    public function show_product()
    {
        //  $query = "SELECT * FROM tbl_product.*,tbl_category.cateName,tbl_brand.brandName FROM tbl_product 
        //  INNER JOIN tbl_category ON tbl_product.cateid=tbl_category.cateid
        //  INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.brandid 
        //  ORDER BY tbl_product.productid desc";
        $query = "SELECT * FROM tbl_product order by productid desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productid ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data,$files, $id)
    {
        $productName = $this->fm->validation($data['productName']);
        $productDes  = $this->fm->validation($data['productDes']);
        $content     = $this->fm->validation($data['content']);
        $price       = $this->fm->validation($data['productPrice']);
        $quantity    = $this->fm->validation($data['productQuantity']);
        $cateid      = $this->fm->validation($data['cateid']);
        $brandid     = $this->fm->validation($data['brandid']);
        $productSlug = $this->fm->to_slug($productName);
        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $cateid      = mysqli_real_escape_string($this->db->link, $cateid);
        $brandid     = mysqli_real_escape_string($this->db->link, $brandid);
        $des         = mysqli_real_escape_string($this->db->link, $productDes);
        $price       = mysqli_real_escape_string($this->db->link, $price);
        $content     = mysqli_real_escape_string($this->db->link, $content);
        $quantity    = mysqli_real_escape_string($this->db->link, $quantity);
        $productSlug    = mysqli_real_escape_string($this->db->link, $productSlug);
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../admin/uploads/products".$unique_image;

        if (empty($productName)||empty($cateid)||empty($brandid)||empty($des)||empty($price)||empty($content)||empty($quantity)) {
            $alert = "Fields must be not empty";
            return $alert;
        }
         else {
            if(!empty($file_name)) {
                if($file_size>20480000){
                    $alert = "<span class='error'>Image size shoult be less than 2MB!</span>";
                    return $alert; 
                }
                elseif(in_array($file_ext,$permited)==false){
                    $alert = "<span class='error'>You can upload only:".implode(',',$permited)." </span>";
                    return $alert;
                }
                else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product SET 
                productName = '$productName',
                cateid = '$cateid',
                brandid = '$brandid',
                productPrice = '$price',
                img = '$unique_image',
                productQuantity = '$quantity',
                content = '$content',
                productDescription = '$des',
                productSlug = '$productSlug'
    
                WHERE productid ='$id'";"
                ";
                }
                
            }
            else{
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                cateid = '$cateid',
                brandid = '$brandid',
                productPrice = '$price',
                productQuantity = '$quantity',
                content = '$content',
                productDescription = '$des',
                productSlug = '$productSlug'
    
                WHERE productid ='$id'";"
                ";
            }
           
        }
        $result = $this->db->update($query);

        if ($result) {
            $alert = "<span class='success' style = 'color:green; font-weight:bold'>Sửa " . $productName . " thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
            return $alert;
        }
    }
    public function delete_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productid ='$id'";
        $result = $this->db->delete($query);
        
        if ($result) {
            $alert = "<span class='success' style = 'color:green; font-weight:bold'>Xoá thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
            return $alert;
        }
    }
    // FRONT END
    public function show_related_product(){
        $query = "SELECT * FROM tbl_product  ORDER BY productid DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = "SELECT p.*,c.cateName,b.brandName FROM tbl_product as p, tbl_category as c, tbl_brand as b 
        WHERE p.cateid = c.cateid AND p.brandid = b.brandid AND p.productid = '$id' ORDER BY p.productid desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_new_product()
    {
        $query = "SELECT * FROM tbl_product order by productid desc LIMIT 10";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_topselling()
    {
        $query = "SELECT * FROM tbl_product WHERE productQuantity <= 100 LIMIT 10";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_by_category($cateslug){
        $query1 = "SELECT * FROM tbl_category WHERE categorySlug = '$cateslug'";
        $result1 = $this->db->select($query1);
        if ($result1){
            $cateid = $result1->fetch_assoc();
            $a = $cateid['cateid'];
            $query2 = "SELECT * FROM tbl_product WHERE cateid = '$a'";
            $result2 = $this->db->select($query2);
            return $result2;
        }
    }
    public function show_single_product($productslug){
        $query = "SELECT * FROM tbl_product WHERE productSlug = '$productslug'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>