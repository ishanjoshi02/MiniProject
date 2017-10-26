var jsmediatags = window.jsmediatags
var player = new Player(files)
player.initPlayer()

$(document).ready(function() {

    var container = document.getElementById("container")
    var playPauseButton = document.getElementById("play_pause_button")
    var icon = document.getElementById("play_pause_icon")
    var heading = document.getElementById('song_title')
    heading.innerText = player.currentSong()

    playPauseButton.onclick = function() {

        if (player.isPlaying()) {

            icon.className = "glyphicon glyphicon-play"
            player.pausePlay()

        } else {

            icon.className = "glyphicon glyphicon-pause"
            player.pausePlay()

        }

    }

    next = document.getElementById("nextButton")
    next.onclick = function() {

        player.next()
        heading.innerText = player.currentSong()
        icon.className = "glyphicon glyphicon-pause"

    }

    previousButton = document.getElementById('prevButton')
    previousButton.onclick = function() {

        player.previous()
        heading.innerText = player.currentSong()
        icon.className = "glyphicon glyphicon-pause"

    }

})