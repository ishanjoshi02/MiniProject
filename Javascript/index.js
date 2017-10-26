var jsmediatags = window.jsmediatags
var player = new Player(files)
var icon, heading

$(document).ready(function() {

    files.sort()
    player.initPlayer()

    var container = document.getElementById("container")
    var playPauseButton = document.getElementById("play_pause_button")

    icon = document.getElementById("play_pause_icon")
    heading = document.getElementById('song_title')
    heading.innerText = player.currentSong()

    playPauseButton.onclick = function() { 

        play_or_pause()

    }

    next = document.getElementById("nextButton")
    next.onclick = function() {

        playNextSong()
    
    }

    previousButton = document.getElementById('prevButton')
    previousButton.onclick = function() {

        playPreviousSong()

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

    document.addEventListener('keypress', function(event) {
        

        if (event.key == ' ') {
            play_or_pause()
        } else if (event.key == 'ArrowRight') {
            playNextSong()
        } else if (event.key == 'ArrowLeft') {
            playPreviousSong()
        }

    })

})

function play_or_pause() {
    if (player.isPlaying()) {
        
        icon.className = "glyphicon glyphicon-play"
        player.pausePlay()
        
    } else {
        
            icon.className = "glyphicon glyphicon-pause"
            player.pausePlay()
        
    }
    
}


function playNextSong() {

    player.next()
    heading.innerText = player.currentSong()
    icon.className = "glyphicon glyphicon-pause"

}

function playPreviousSong() {

    player.previous()
    heading.innerText = player.currentSong()
    icon.className = "glyphicon glyphicon-pause"
    
}
