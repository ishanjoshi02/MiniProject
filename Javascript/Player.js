function Player(playlist) {

    this.currentSongIndex = 0
    if (playlist) {
        this.playlist = playlist
    } else {

        this.playlist = getLibrary()

    }

    this.audio

    console.log(this.playlist)

    this.playing = false


    this.getLibrary = function() {

        var library = []

        return library

    }

    this.playSong = function() {

        

    }

    this.next = function() {

        this.audio.pause()

        this.currentSongIndex += 1
        if (this.currentSongIndex == this.playlist.length) {

            this.currentSongIndex = this.playlist.length - 1 

        }

        this.audio = new Audio(this.playlist[this.currentSongIndex])
        this.audio.play()
        this.playing = true

    }

    this.previous = function() {
        
        this.audio.pause()
        this.currentSongIndex -= 1
        if (this.currentSongIndex < 0) {
            this.currentSongIndex = 0    
        }
        
        this.audio = new Audio(this.playlist[this.currentSongIndex])
        this.audio.play()
        this.playing = true
        
    }

    this.initPlayer = function() {

        this.audio = new Audio(this.playlist[this.currentSongIndex])

    }

    this.currentSong = function() {

        var returnString = this.playlist[this.currentSongIndex]

        return this.playlist[this.currentSongIndex].replace("/MiniProject/Php/music/", "").replace(".mp3", "")
        
    }

    this.pausePlay = function(pauseButton) {

        if (!this.playing) {

            this.audio.play()

        } else {

            this.audio.pause()

        }

        this.playing = !this.playing

    }


    this.isPlaying = function() { return this.playing }

}