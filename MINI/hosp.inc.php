<html>
<?php
include_once('header.php');
?>
<head>
<style>
.container{padding: 20px;}
.filter-panel{width:100%;}
.filter-panel p{margin-right: 30px;float: left;}
#productContainer{float: left;width: 100%;}
.list-item{
  float: left;
  width: 15%;
  height: 80px;
  padding: 10px;
  border: 2px solid #cacaca;
  margin: 10px 10px 10px 0px;
}
.list-item h2{margin: 0;}
</style>
<link rel="stylesheet" href="jquery.range.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="jquery.range.js"></script>
<script>
function filterProducts() {
  var price_range = $('.price_range').val();
  $.ajax({
      type: 'POST',
      url: 'hos.php',
      data:'price_range='+price_range,
      beforeSend: function () {
          $('.container').css("opacity", ".5");
      },
      success: function (html) {
          $('#productContainer').html(html);
          $('.container').css("opacity", "");
      }
  });
}
</script>
</head>
<body>
  <div class="container">
  <div class="filter-panel">
      <p><input type="hidden" class="price_range" value="0,10000" /></p>
      <input type="button" onclick="filterProducts()" value="FILTER" />
  </div>
  <div id="productContainer">
<?php
if (isset($_POST['find'])){
   include_once('dbh.inc.php');
    $hosp = mysqli_real_escape_string($conn,$_POST['hosp']);
    if (empty($hosp)){
     header("Location: hosp.php?hosp=empty");
    exit();
   }
   else{

     $y= "SELECT DISTINCT h_name,location,contact_info,image,budget FROM district,hosp WHERE district.d_id=hosp.d_id and district.d_name LIKE '%$hosp%'";
     $result=mysqli_query($conn,$y);
     $resultCheck=mysqli_num_rows($result);
     if($resultCheck < 1){
       header("Location: hosp.php?hosp=invalid");
       exit();
     }
   else{
    while ($row =mysqli_fetch_array($result))
     { ?>      <div class="dgallery">
     <img src="<?php print $row["image"]; ?>" height="200" width="300">
     <div class="desc"><?php echo $row["h_name"]; ?> <br> Location: <?php echo $row["location"]; ?> <br> Contact-Info: <?php echo $row["contact_info"]  ?> <br> Price:<?php echo $row["budget"]; ?> </div>
     </div>
     <?php
   }
    }
  }
     }

   ?>
 </div>
 </div>
 <script>
 $('.price_range').jRange({
    from: 0,
    to: 10000,
    step: 50,
    format: '%s INR',
    width: 1150,
    showLabels: true,
    isRange : true
 });
 </script>
 </body>

 </html>
