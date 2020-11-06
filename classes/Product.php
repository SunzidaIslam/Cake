<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>

<?php
class Product
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function productInsert($data, $files){
		$productName = $this->fm->validation($data['productName']);
		$catId = $this->fm->validation($data['catId']);
		$body = $this->fm->validation($data['body']);
		$price = $this->fm->validation($data['price']);
		$size = $this->fm->validation($data['size']);

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$size = mysqli_real_escape_string($this->db->link, $data['size']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
   		 $file_name = $files['image']['name'];
   		 $file_size = $files['image']['size'];
    	 $file_temp = $files['image']['tmp_name'];

    	 $div = explode('.', $file_name);
   		 $file_ext = strtolower(end($div));
   		 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    	 $uploaded_image = "uploads/".$unique_image;

    	 if ($productName == "" || $catId == 0 || $body == "" || $price == "" || $size == "") {
    	 	$msg = "<span class='error'>Fields Must Not Inserted.</span>";
				return $msg;
    	 }
    	 elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) == false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    	 else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_product(productName, catId, body, price, image, size) 
    VALUES('$productName','$catId','$body','$price','$uploaded_image','$size')";
    $productinsert = $this->db->insert($query);
			if ($productinsert) {
				$msg = "<span class='success'>Product Inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Inserted.</span>";
				return $msg;
			}
		}
		}
		public function getAllProduct(){
		$query = "SELECT tbl_product.*, tbl_category.catName
					FROM tbl_product
					JOIN tbl_category
					ON tbl_product.catId = tbl_category.catId
		 			ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
		}
		public function getAllProduct2(){
		$query = "SELECT *
					FROM tbl_product
					ORDER BY productId DESC";
		$result = $this->db->select($query);
		return $result;
		}
		public function getAllProduct3(){
		$query = "SELECT *
					FROM tbl_product
					ORDER BY productId DESC LIMIT 9";
		$result = $this->db->select($query);
		return $result;
		}
		public function getSingleProduct($id){
			$query = "SELECT p.*, c.catName
					FROM tbl_product as p, tbl_category as c
					WHERE p.catId = c.catId AND p.productId = '$id'";
		$result = $this->db->select($query);
		return $result;
		}
		public function productByCat($id){
			$catId = mysqli_real_escape_string($this->db->link, $id);
			$query = "SELECT *
					FROM tbl_product
					WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
		}

		public function getProductById($id) {
				$query = "SELECT *
					FROM tbl_product
					WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
		}

		public function productUpdate($data, $files, $id){
		$productName = $this->fm->validation($data['productName']);
		$catId = $this->fm->validation($data['catId']);
		$body = $this->fm->validation($data['body']);
		$price = $this->fm->validation($data['price']);
		$size = $this->fm->validation($data['size']);

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$size = mysqli_real_escape_string($this->db->link, $data['size']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
   		 $file_name = $files['image']['name'];
   		 $file_size = $files['image']['size'];
    	 $file_temp = $files['image']['tmp_name'];

    	 $div = explode('.', $file_name);
   		 $file_ext = strtolower(end($div));
   		 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    	 $uploaded_image = "uploads/".$unique_image;

    	 if ($productName == "" || $catId == 0 || $body == "" || $price == "" || $size == "") {
    	 	$msg = "<span class='error'>Fields Must Not Inserted.</span>";
				return $msg;
    	 } else {

    	 	if (!empty($file_name)) {

    	 if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) == false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    	 else{
    move_uploaded_file($file_temp, $uploaded_image);

    $query = "UPDATE tbl_product
    			SET
    			productName = '$productName',
    			catId       = '$catId',
    			body        = '$body',
    			price       = '$price',
    			image       = '$uploaded_image',
    			size = '$size'
    			WHERE productId = '$id'
    ";

    $productupdate = $this->db->update($query);
			if ($productupdate) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
			}
		}
	} else{
    $query = "UPDATE tbl_product
    			SET
    			productName = '$productName',
    			catId       = '$catId',
    			body        = '$body',
    			price       = '$price',
    			size        = '$size'
    			WHERE productId = '$id'
    ";

    $productupdate = $this->db->update($query);
			if ($productupdate) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
			}
	}
		}
	}
public function delProductById($id){
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$getData = $this->db->select($query);
		if ($getData) {
			while ($delImg = $getData->fetch_assoc()) {
				$dellink = $delImg['image'];
				unlink($dellink);
			}
		}

		$delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
		$deldata = $this->db->delete($delquery);
		if ($deldata) {
				$msg = "<span class='success'>Product Deleted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Deleted.</span>";
				return $msg;
			}
	}

}
?>
