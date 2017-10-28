function Player(playlist) {

    this.currentSongIndex = 0
    this.playlist = playlist

    this.audio

    this.playing = false

    this.playSong = function(song) {

        this.currentSongIndex = this.playlist.indexOf(song)
        this.audio = new Audio("Php/" + song.FilePath)
        this.audio.load()

        this.audio.addEventListener('ended', function() {
            this.next()
        })


        this.audio.play()
        this.playing = true

    }

    this.next = function() {

        this.audio.pause()

        this.currentSongIndex += 1
        if (this.currentSongIndex == this.playlist.length) {

            this.currentSongIndex = this.playlist.length - 1 

        }

        this.playSong(this.playlist[this.currentSongIndex])

    }

    this.previous = function() {
        
        this.audio.pause()
        this.currentSongIndex -= 1
        if (this.currentSongIndex < 0) {
            this.currentSongIndex = 0    
        }
        
        this.playSong(this.playlist[this.currentSongIndex])
        
    }

    this.initPlayer = function() {

        this.playSong(this.playlist[this.currentSongIndex])
        this.pausePlay()

    }

    this.currentSong = function() {


        return this.playlist[this.currentSongIndex].SongTitle
        
        
    }

    this.pausePlay = function() {

        if (!this.playing) {

            this.audio.play()

        } else {

            this.audio.pause()

        }

        this.playing = !this.playing

    }


    this.isPlaying = function() { return this.playing }

}