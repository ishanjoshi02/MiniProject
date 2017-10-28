function Song(Song) {

    this.SongID = Song['SongID']
    this.SongTitle = Song['SongTitle'];
    this.SongReleaseDate = Song['SongReleaseDate'];
    this.SongAlbum = Song['SongAlbum'];
    this.SongGenre = Song['SongGenre'];
    this.SongArtist = Song['SongArtist'];
    this.FilePath = Song['FilePath'];
    this.Liked = Song['Liked'];
    this.Added = Song['Added']

    this.getFilePath = function() {
        return "Php/" + this.FilePath;
    } 
    this.getSongTitle = function() {
        return this.SongTitle;
    }
    this.getSongAlbum = function() {
        return this.SongAlbum;
    }
    this.getSongArtist = function() {
        return this.SongArtist;
    }
    this.getSongGenre = function() {
        return this.SongGenre;
    }
    this.getReleaseDate = function() {
        return this.SongReleaseDate;
    }
    // this.getLiked = function() {
    //     return this.Liked;
    // }
}