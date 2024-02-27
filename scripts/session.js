window.addEventListener('unload', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'destroy_session.php', true);
    xhr.send();
});