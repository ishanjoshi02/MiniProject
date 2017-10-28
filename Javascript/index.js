var jsmediatags = window.jsmediatags
var player
var icon, heading

$(document).ready(function() {

    var newSongList = []
    songList.forEach(function(element) {
        newSongList.push(
            new Song(element)
        )
    }, this);

    songList = newSongList

    var fileslist = []

    songList.forEach(function(element) {

        fileslist.push(element.getFilePath())

    }, this)

    files = fileslist
    
    player = new Player(files)

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

    if (songList.length >= 1) {

        var table = document.createElement('table')
        table.className = 'table'

        var i = 0

        var header = table.createTHead()
        var row = header.insertRow(i)
        var songTitleCell = row.insertCell(0);
        var songReleaseDateCell = row.insertCell(1);
        var songAlbumCell = row.insertCell(2);
        var songGenreCell = row.insertCell(3);
        var songArtistCell = row.insertCell(4)

        songTitleCell.innerHTML = '<b>Song</b>'
        songReleaseDateCell.innerHTML = '<b>Release Date</b>'
        songAlbumCell.innerHTML = '<b>Song Album</b>'
        songGenreCell.innerHTML = "<b>Genre</b>"
        songArtistCell.innerHTML = "<b>Artist</b>" 

        i++
        songList.forEach(function(element) {
            
            var row = table.insertRow(i)
            var songTitleCell = row.insertCell(0);
            var songReleaseDateCell = row.insertCell(1);
            var songAlbumCell = row.insertCell(2);
            var songGenreCell = row.insertCell(3);
            var songArtistCell = row.insertCell(4)

            songTitleCell.innerText = element.getSongTitle()
            songReleaseDateCell.innerText = element.getReleaseDate()
            songAlbumCell.innerText = element.getSongAlbum()
            songGenreCell.innerText = element.getSongGenre()
            songArtistCell.innerText = element.getSongArtist() 

            row.onclick = function() {

                player.audio.pause()
                player.playSong(element.getFilePath())
                heading.innerText = player.currentSong()
                icon.className = "glyphicon glyphicon-pause"

            }

            i++

        }, this);

        container.appendChild(table)
    }

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
