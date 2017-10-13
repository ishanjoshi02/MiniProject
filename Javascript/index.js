var jsMediaTags = window.jsmediatags

$(document).ready(function() {
    var container = document.getElementById("container")
    var audio = new Audio(files[0])

    files.forEach(function(file) {
        jsMediaTags.read(file, {
            onSuccess: function(tag) {
                console.log(tag)
            },
            onError: function(error) {
                console.log(error)
            }
        })
    }, this);

})

