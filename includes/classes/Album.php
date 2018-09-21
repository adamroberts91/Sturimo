<?php
Class Album {
    private $id;
    private $con;
    private $title;
    private $artistId;
    private $genre;
    private $artworkPath;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
        $albumQuery = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($albumQuery);
        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->artworkPath = $album['artworkPath'];

    }

    public function getTitle() {
        return $this->title;
    }

    public function getArtworkPath(){
        return $this->artworkPath;
    }

    public function getArtist() {
        return new Artist($this->con, $this->artistId);
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getNumberOfSongs() {
        $query = mysqli_query($this->con, "SELECT COUNT(*) as total FROM songs WHERE album='$this->id'");
        $result = mysqli_fetch_assoc($query);
        return $result['total'];
    }
}