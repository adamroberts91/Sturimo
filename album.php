<?php include("includes/header.php");

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
}
else {
    echo "<script type='text/javascript'>
              alert('Id not set. Please try again');
              window.location.replace('index.php');
          </script>";

}

//Query DB for selected album and assign to variable
$albumQuery = mysqli_query($con, "SELECT * from albums WHERE id='$albumId'");
$album = mysqli_fetch_array($albumQuery);

//Take id of album artist
$artistId = $album['artist'];

//Use Id to query DB for album artist
$artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistId'");
$artist = mysqli_fetch_array($artistQuery);

echo $artist['name'];
?>



<?php include("includes/footer.php") ?>