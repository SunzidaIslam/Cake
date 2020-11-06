<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
	echo "<script>window.location = '404.php'; </script>";
}else{
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
}
?>
<div class="main">
    <div class="content">
    	<div class="row section group">
	        <div class="col-lg-2 rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
				<?php
					$getcat = $cat->getAlLCat();
					if ($getcat) {
						while ($result = $getcat->fetch_assoc()) {
				?>
			      <li><a href="productsbycat.php?catId=<?php echo $result['catId']?>"><?php echo $result['catName']?></a></li>
			      <?php } } ?>
				</ul>    
            </div>
            <div class="col-lg-8">
            	<div class="content">
	    		    <div class="heading">
	    		    <?php
					$getcat = $cat->getCatById($id);
					if ($getcat) {
						while ($result = $getcat->fetch_assoc()) {
				?>
	    		       <h3 href="productsbycat.php?catId=<?php echo $result['catId']?>">All From <?php echo $result['catName']?></h3>
	    		       <?php } } ?>
	    		    </div>
    		        <div class="clear"></div>
	    	    </div>
		        <div class="row section group">
		      		<?php
						$getPdB = $pd->productByCat($id);
						if ($getPdB) {
							while ($result = $getPdB->fetch_assoc()) {
							
					?>
						<div class="col-lg-3 grid_1_of_4 images_1_of_4 cake_snippet_width">
							 <a href="preview.php?proid=<?php echo $result['productId']?>"><img src="admin/<?php echo $result['image']?>" height="100px" width="100px" alt="" /></a>
							 <h2><?php echo $result['productName'];?> </h2>
							 <p><?php echo $fm->textShorten($result['body'],50);?></p>
							 <p><span class="price"><?php echo $result['price'];?> BDT/-</span></p>
						     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']?>" class="details">Details</a></span></div>
						</div>
				    <?php } } ?>
	            </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>