var body

$(document).ready(function() {

    body = document.getElementById("body")

    console.log("Ehloo")

    var songs = JSON.parse('<?= json_encode($results_array)?>')

    console.log(songs)

})