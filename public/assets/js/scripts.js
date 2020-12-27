/* By fadilxcoder */

var timerStart = Date.now();

if (document.querySelectorAll('#helifox-landing-page').length > 0) {
    document.addEventListener('DOMContentLoaded', function() {
        var lt = document.getElementById("loading-time");
        
        var time = Date.now() - timerStart;
        lt.innerText = 'Loading Time : ' + time + ' ms';
    });
}
