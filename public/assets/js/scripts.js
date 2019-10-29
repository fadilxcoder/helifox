/* By fadilxcoder */
if("serviceWorker" in navigator){navigator.serviceWorker.register("offline.js")};
var timerStart = Date.now();
if($('#helifox-landing-page').length > 0){
    $(document).ready(function(){
        console.log("Loading time : ", Date.now()-timerStart, " ms");
    });
}
