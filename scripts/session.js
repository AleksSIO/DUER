window.addEventListener('beforeunload', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'destroy_session.php', true);
    xhr.send();
});