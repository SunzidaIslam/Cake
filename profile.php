<?php
include 'inc/header.php';
?>
<div class="main">
 <div class="row">
  <div class="col-lg-10" style="padding: 10%">
 <h6 style="color:black; font-size: 30px; font:bold;">Personal Information</h6>
 <h3 align="right" "><a href="editprofile.php" style="color:black; font:bold;">Edit Details</a></h3>
  <div class="thumbnail">
<?php
$id = Session::get("cmrId");
$getdata = $cmr->getCustomerData($id);
  if ($getdata) {
    while ($result = $getdata->fetch_assoc()) {
                                 
                    ?>
<table id="customers">
  <tr>
    <td width="20%">Name :</td>
    <td><?php echo $result['name'];?></td>
  </tr>
   <tr>
    <td>Address :</td>
    <td><?php echo $result['address'];?></td>
  </tr>
   <tr>
    <td>City :</td>
    <td><?php echo $result['city'];?></td>
  </tr>
   <tr>
    <td>Country :</td>
    <td><?php echo $result['country'];?></td>
  </tr>
   <tr>
    <td>Zip-Code :</td>
    <td><?php echo $result['zip'];?></td>
  </tr>
   <tr>
    <td>Phone:</td>
    <td><?php echo $result['phone'];?></td>
  </tr>
   <tr>
    <td>Email :</td>
    <td><?php echo $result['email'];?></td>
  </tr>
</table>
<?php } } ?>
</div>
</div>
</div>
</div>

<?php
include 'inc/footer.php';
?>
