var AcceptCookie = document.getElementsByClassName("boutonCookie")[0];
var contenerCookie = document.getElementById("cookie");
AcceptCookie.addEventListener("click",function (){
contenerCookie.style.visibility = 'hidden';
createCookie("rgpd","ok",3)
});

if(readCookie("rgpd")!="ok")
{
  contenerCookie.style.visibility = "visible";
}
else

/*---------------------Cookie--------------------*/

function createCookie(name,value,min) {
  // permet de créer un cookie
if (days) {
      // si le nombre de jour est renseigné, on le transforme en millieme de seconde
  var date = new Date();
  date.setTime(date.getTime()+(min*60*1000));
  var expires = "expires="+date.toGMTString();
}
  else var expires = "";
  //le cookie doit contenir  clé=valeur;expires=temps;path=nomDomaine
document.cookie = name+"="+value+"; " + expires+"; path=/";
}

function readCookie(name) {
  // on récupère tous les cookies du site en une fois, séparé par ; 
  // on range dans un tableau chaque cookie
  var listeCookies = document.cookie.split(';');
for(let i=0;i < listeCookies.length;i++) {
      // pour chaque cookie, on sépare en tableau la clé et la valeur
      var unCookie = listeCookies[i].split("=");
      // si la clé correspond au cookie cherché, on renvoi la valeur
  if (unCookie[0]==name) return unCookie[1];
}
return null;
}

function eraseCookie(name) {
  // pour supprimer un cookie, on le périme
createCookie(name,"",-1);
}

/*-----------------------Fin Cookie---------------------------*/

/*----------------------API YOUTUBE---------------------------*/

// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '360',
    width: '640',
    videoId: 'M7lc1UVf-VE',
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    setTimeout(stopVideo, 6000);
    done = true;
  }
}
function stopVideo() {
  player.stopVideo();
}

/*--------------------------FIN API YOUTUBE-----------------------*/