<?php
if(isset($_POST['price_range'])){

    //Include database configuration file
    include 'dbh.inc.php';

    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    $priceRange = $_POST['price_range'];
    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $whereSQL = "WHERE h_budget BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $orderSQL = " ORDER BY h_budget ASC ";
    }else{
        $orderSQL = " ORDER BY hotel_name DESC ";
    }

    //get product rows
    $query = $conn->query("SELECT * FROM hotel $whereSQL $orderSQL");

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
    ?>
    <div class="dgallery">
<img src="<?php print $row["image"]; ?>" height="200" width="300">
<div class="desc"><?php echo $row["hotel_name"]; ?> <br> Location: <?php echo $row["h_location"]; ?> <br> Contact-Info: <?php echo $row["contact_info"];  ?> <br> Price:<?php echo $row["h_budget"]; ?> </div>
</div>
    <?php }
    }else{
        echo 'Places not founded on the database';
    }
}
?>
