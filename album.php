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

//Create album and artist objects from id in GET
$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>" alt="<?php echo $album->getTitle(); ?>">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle() ?></h2>
        <p><?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs() . " songs" ?></p>

    </div>
</div>



<?php include("includes/footer.php") ?>