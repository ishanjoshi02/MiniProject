function Player(playlist) {

    this.currentSongIndex = 0
    this.playlist = playlist

    this.audio

    console.log(this.playlist)

    this.playing = false


    this.getLibrary = function() {

        var library = []

        return library

    }

    this.playSong = function(songURL) {

        this.currentSongIndex = this.playlist.indexOf(songURL)
        this.audio = new Audio(songURL)
        this.audio.load()

        this.audio.addEventListener('ended', function() {
            this.next()
        })


        this.audio.play()
        this.playing = true

        
        console.log(this.audio)
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


        return this.playlist[this.currentSongIndex].replace("Php/music/", "").replace(".mp3", "")
        
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