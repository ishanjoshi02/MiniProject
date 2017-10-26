var jsmediatags = window.jsmediatags

$(document).ready(function() {
    var container = document.getElementById("container")


    files.forEach(function(element) {
        var para = document.createElement('p')
        var temp = element.split('/MiniProject/Php/music/').join('')
        para.innerText = temp
        container.appendChild(para)
        container.appendChild(getAudio(element))
        container.appendChild(document.createElement('br'))
    }, this);

})


function getAudio(file) {

    var audio = document.createElement('audio')
    var source = document.createElement('source')
    source.src = file 
    source.type = 'audio/mpeg'
    audio.appendChild(source)
    audio.controls = true
    // audio.loop = true
    return audio
}

