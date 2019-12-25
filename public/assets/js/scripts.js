/* By fadilxcoder */

if ("serviceWorker" in navigator) { navigator.serviceWorker.register("offline.js") };
var timerStart = Date.now();

if (document.querySelectorAll('#helifox-landing-page').length > 0) {
    document.addEventListener('DOMContentLoaded', function(){
        console.log("Loading time : ", Date.now()-timerStart, " ms");
    });
}
