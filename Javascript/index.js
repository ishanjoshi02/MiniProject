var jsmediatags = window.jsmediatags
var player = new Player(files)
player.initPlayer()
var icon, heading

$(document).ready(function() {

    var container = document.getElementById("container")
    var playPauseButton = document.getElementById("play_pause_button")

    icon = document.getElementById("play_pause_icon")
    heading = document.getElementById('song_title')
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

    files.forEach(function(element) {
        var para = document.createElement("p")
        para.onclick = function() {
            player.audio.pause()
            player.playSong(element)
            heading.innerText = player.currentSong()
            icon.className = "glyphicon glyphicon-pause"
        }
        para.innerText = element.replace("/MiniProject/Php/music/", "").replace(".mp3", "")
        container.appendChild(para)
    }, this);

})

