<html>
<?php
  include_once'header.php';
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
        url: 'places.php',
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
        <p><input type="hidden" class="price_range" value="0,5000" /></p>
        <input type="button" onclick="filterProducts()" value="FILTER" />
    </div>
    <div id="productContainer">
  <?php
  if (isset($_GET['submit'])) {
    include_once'dbh.inc.php';
    $search=mysqli_real_escape_string($conn, $_GET['name']);
    if (empty($search) ) {
      header("Location: index.php?search=empty");
      exit();

    }
    $sql = "SELECT  p_name,image,Budget,p_location,weather FROM place p,district d WHERE p.d_id = d.d_id AND d.d_name LIKE '%$search%'";
    $result=mysqli_query($conn, $sql);
    $queryresult=mysqli_num_rows($result);

    if($queryresult > 0){
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
           <div class="dgallery">
<img src="<?php print $row["image"]; ?>" height="200" width="300">
<div class="desc"><?php echo $row["p_name"]; ?>  <br> Location: <?php echo $row["p_location"]; ?>  <br> Climate: <?php echo $row["weather"]; ?>   <br> Budget: <?php echo $row["Budget"]; ?> </div>
</div>
        <?php
    }
  }
}else {
    header("Location: index.php?district=error");
    exit();
  }
   ?>
 </div>
</div>
<script>
$('.price_range').jRange({
    from: 0,
    to: 5000,
    step: 50,
    format: '%s INR',
    width: 1150,
    showLabels: true,
    isRange : true
});
</script>
</body>

</html>
