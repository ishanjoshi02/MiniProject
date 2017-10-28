var jsmediatags = window.jsmediatags
var player
var icon, heading
var likeButton

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
    
    player = new Player(songList)

    files.sort()
    player.initPlayer()

    var container = document.getElementById("container")
    var playPauseButton = document.getElementById("play_pause_button")

    icon = document.getElementById("play_pause_icon")
    heading = document.getElementById('song_title')
    heading.innerText = player.currentSong()

    likeHighlight(player.getCurrentSongObject())

    addToLibrary(player.getCurrentSongObject())

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
                player.playSong(element)
                heading.innerText = player.currentSong()
                icon.className = "glyphicon glyphicon-pause"
                likeHighlight(element)
                addToLibrary(element)

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
    likeHighlight(player.currentSong)

}

function playPreviousSong() {

    player.previous()
    heading.innerText = player.currentSong()
    icon.className = "glyphicon glyphicon-pause"
    likeHighlight(player.currentSong)
    
}

function likeHighlight(element) {
        
        var likeSpan = document.getElementById('like_span')

        if (element.Liked) {
            likeSpan.className = "glyphicon glyphicon-heart"
        } else {
            likeSpan.className = "glyphicon glyphicon-heart-empty"
        }

        var likeButton = document.getElementById('like_button')
        likeButton.onclick = function() {

            element.Liked = !element.Liked
            if (element.Liked) {
                likeSpan.className = "glyphicon glyphicon-heart"
            } else {
                likeSpan.className = "glyphicon glyphicon-heart-empty"
            }


            var form = $('<form></form>')
            form.attr("method", "post")
            form.attr("action", "Php/like_song.php")

            var field = $('<input></input>')
            field.attr("type", "hidden")
            field.attr("name", "Liked")
            field.attr("value", element.Liked.toString())

            form.append(field)
            var field = $('<input></input>')
            field.attr("type", "hidden")
            field.attr("name", "SongID")
            field.attr("value", element.SongID)

            form.append(field)

            $(document.body).append(form)
            form.submit()
        }
}

function addToLibrary(element) {

    console.log(element)
    
    var librarySpan = document.getElementById('library_span')

    if (element.Added) {
        librarySpan.className = "glyphicon glyphicon-ok"
    } else {
        librarySpan.className = "glyphicon glyphicon-plus-sign"
    }

    var addButton = document.getElementById('library_button')
    addButton.onclick = function() {

        element.Added = !element.Added

        var form = $('<form></form>')
        form.attr("method", "post")
        form.attr("action", "Php/add_to_library.php")

        var field = $('<input></input>')
        field.attr("type", "hidden")
        field.attr("name", "Added")
        field.attr("value", element.Added.toString())

        form.append(field)
        var field = $('<input></input>')
        field.attr("type", "hidden")
        field.attr("name", "SongID")
        field.attr("value", element.SongID)

        form.append(field)

        $(document.body).append(form)
        form.submit()
    }
}