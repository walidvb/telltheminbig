<?php 

require_once 'firebase-php/firebaseLib.php';

require_once 'secret.php';

// Defaults
$message = "Tell Them in BIG";
$color1 = "#111111";
$color2 = "#FFFFFF";
$speed = 100;

if(isset($_GET['q']) && $_GET['q'] != '')
{
  $message = $_GET['q'];
}
if(isset($_GET['color1']) && isset($_GET['color2']) && $_GET['color2'] != '' && $_GET['color1'] != '')
{
  $color1 = $_GET['color1'];
  $color2 = $_GET['color2'];
}

if(isset($_GET['speed']) && is_int(intval($_GET['speed']))){
  $speed = $_GET['speed'];
}

$query = '?';
foreach($_GET as $key => $value){
  $val = rawurlencode($value);
  $query .= "$key=$value";
}

if($message != "Tell Them in BIG")
{
  $firebase = new Firebase('https://telltheminbig.firebaseio.com/', $token);
  $firebase->push("/list/" . urlencode($message), array(
      'message' => $message,
      'color1' => $color1,
      'color2' => $color2,
      'speed' => $speed
    ));
}
?>


<html><head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, minimal-ui"}</meta>
<meta name="description" content="Some things are simply better told in BIG"></meta>
<meta property="og:description" content="<?php print $message ?> | Some things are simply better told in BIG"></meta>
<meta property="og:site_name" content="Tell Them in BIG"></meta>
<meta property="og:image" content="http://telltheminbig.com/big.png"></meta>
<meta property="og:url" content= "http://telltheminbig.com"></meta>
<meta property="og:type" content="website"></meta>
<meta property="og:title" content="<?php print $message ?>, in BIG"></meta>
<title><?php print $message ?></title>
<script src="/jscolor.js"></script>
<style type="text/css">
  marquee{
    
    font-weight: bold;
    text-transform: uppercase;
    background-color: <?php print $color1?>;
    color: <?php print $color2?>
  }
  marquee.color2{
    color: <?php print $color1?>;
    background-color: <?php print $color2?>;
  }
  body{
    font-family: Helvetica;
    margin: 0;
    height: 100%;
    overflow: hidden;
  }
  .iframe .sharing{
    display: none;
  }
  .iframe-info{
    display: none;
  }
  .iframe .iframe-info{
    display: block;
    position: fixed;
    opacity: 0;
    right: 0px;
    bottom: 0px;
    padding: 5px;
    font-size: 12px;
    background: rgba(0,0,0,0.6);
    border-radius: 3px 0px 0px 0px;
    color: #2ECC40;
    transition: all 0.3s 0.3s;
    -webkit-transition: all 0.3s 0.3s;
  }
  .iframe:hover .iframe-info{
    opacity: 1;
    transition: all 0.3s;
    -webkit-transition: all 0.3s ;
  }
  .sharing{ 
    box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.15);
    background-color: #232323;
    position: fixed;
    bottom: 0px;
    left: 0px;
    width: 100%;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    padding-left: 10px;
    padding-right: 10px;
    -webkit-transition: box-shadow 450ms;
    -moz-transition: box-shadow 450ms;
    -ms-transition: box-shadow 450ms;
    -o-transition: box-shadow 450ms;
    transition: box-shadow 450ms;
    overflow: hidden;
  }
  .text{
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    font-weight: 300;
    top: -9px;
    position: relative;
    font-size: 15px;
    color: #fff;
    top: 7px;
  }
  @media (min-width:767px) {
    .sharing{
      font-size: 13px;
    }
  }

  .sharing:hover{
    box-shadow: 0px 0px 0px 4px #2ECC40;
  }
  a, #make-your-own i{
    color:  #2ECC40;
    text-decoration: none;
  }
  a:hover, #make-your-own i:hover{
    text-decoration: underline;
  }

  iframe{
    float: right;
    margin: 5px;
  }
  .fb-share-button{
    float: right;
    margin-right:10px;
  }

  #thelink{
    padding-left: 10px;
  }
  #make-your-own i{
    display: auto;
    cursor: pointer;
    
  }
  #make-your-own.open i{
    display: none;
  }

  #make-your-own-form input{
    -webkit-transition: all 0.3s  forwards;
    -moz-transition: all 0.3s forwards;
    width: 80px;
    display: none;
  }

  #make-your-own #thelink{
    opacity: 0;
    transition: all 0.2s;
  }
  #make-your-own.open #thelink{
    display: inline-block;
  }
  .open #make-your-own-form input{
    display: inline-block;
  }
  @media (max-width:767px){
    #make-your-own-form input{
      width: 100%!important;
    }    
  }
  .open #text{
    width: 300px;
  }
  #embed{
    float: right;
    margin: 5px;
  }
  .button {
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.01, #666666), color-stop(1, #333333) );
  background:-moz-linear-gradient( center top, #666666 5%, #333333 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#666666', endColorstr='#333333');
  background-color:#666666;
  -webkit-border-top-left-radius:3px;
  -moz-border-radius-topleft:3px;
  border-top-left-radius:3px;
  -webkit-border-top-right-radius:3px;
  -moz-border-radius-topright:3px;
  border-top-right-radius:3px;
  -webkit-border-bottom-right-radius:3px;
  -moz-border-radius-bottomright:3px;
  border-bottom-right-radius:3px;
  -webkit-border-bottom-left-radius:3px;
  -moz-border-radius-bottomleft:3px;
  border-bottom-left-radius:3px;
  text-indent:0;
  padding: 4px 3px;
  display:inline-block;
  color:#2ECC40;
  font-family:Arial;
  font-size:11px;
  font-style:normal;
  text-decoration:none;
  text-align:center;
  font-weight: light;
}
a:hover{
  text-decoration: none;
}
#embed span{
  color: white;
}
#embed-code{
  display: none;
}
.open #embed-code{
  display: inline;
}
.open#embed a{
  display: none;
}
</style>






<script type="text/javascript">

  function fit(){     
    var h = window.innerHeight;
    document.querySelector('marquee').style['fontSize'] = h;
    document.querySelector('marquee').style['lineHeight'] = h+"px";
  }

  window.onresize = function() {
   fit();
  }

 document.addEventListener('DOMContentLoaded', function(){
  if(window.top != window){
    document.body.classList.add('iframe');
  }
  setInterval(function(){
    document.querySelector('marquee').classList.toggle('color2');
  }, 1000);
  fit();

  document.querySelector('#make-your-own').onclick = function(e){
    e.cancelBubble = true
    e.stopPropagation();
  }
  document.querySelector('#make-your-own i').onclick = function(e){
    showForm();
  };

  document.querySelector('main').onclick = hideForm;

  document.querySelector('#text').onkeyup = function(){
    var value = this.value;
    if(value != '')
    {
      document.querySelector('#thelink').style.opacity = 1;
      update();
    }
    else{
      document.querySelector('marquee').innerText = "<?php print $message ?>";
      document.querySelector('#thelink').style.opacity = 0;
    }
  }
  document.querySelector('#color1').onchange = update;
  document.querySelector('#color2').onchange = update;
  document.querySelector('#speed').onchange = update;
  
  document.querySelector('#text').onblur = updateSocial;
  document.querySelector('#color1').onblur = updateSocial;
  document.querySelector('#color2').onblur = updateSocial;
  document.querySelector('#speed').onblur = updateSocial;

  document.querySelector('marquee').onclick = function(e){
    document.querySelector('#embed').classList.remove('open');

  }
  document.querySelector('#embed a').onclick = function(e){
    e.preventDefault();
    document.querySelector('#embed').classList.add('open');
  }
  document.querySelector('#embed-code').readOnly = true;
  document.querySelector('#embed-code').onclick = function(){
    this.select();
  }
});


function update(){
  
  s = getValues();
  var marquee = document.querySelector('marquee');
  marquee.innerText = s.value;
  marquee.setAttribute('scrollamount', s.speed);
  document.title = s.value;


 
  document.styleSheets[0].cssRules[0].style.color = s.color1;
  document.styleSheets[0].cssRules[0].style.backgroundColor = s.color2;
  document.styleSheets[0].cssRules[1].style.backgroundColor = s.color1;
  document.styleSheets[0].cssRules[1].style.color = s.color2;

  var query = makeParams(s);
  var href = 'http://'+location.host+'/' + query;
  document.querySelector('#thelink').href =  href;
  window.history.replaceState(null, null, query);

}
  
function getValues(){
  var value = document.querySelector('#text').value;
  if(value == '')
  {
    value = "<?php print $message ?>";
  }
  return {
    value: value,
    color1: document.querySelector('#color1').value,
    color2: document.querySelector('#color2').value,
    speed: document.querySelector('#speed').value,
  }
}
function hideForm(){
  document.querySelector('#make-your-own').classList.remove('open');

}
function showForm(){
  document.querySelector('#make-your-own').classList.add('open');
  document.querySelector('#make-your-own input').focus();
}

function updateSocial(){
  var settings = getValues();
  fb = document.querySelector('.fb-share-button');
  try{
    fb.setAttribute('data-href', fb.attributes['data-href'].value+makeParams(settings));
    FB.XFBML.parse();
  }catch(e){console.log(e);}

  try{
    document.querySelector('.twitter-share-button').remove();
    var newTwitter = twitter.cloneNode();
    newTwitter.setAttribute('data-text', settings.value + ' | Some things are better told in BIG | #telltheminbig');
    newTwitter.setAttribute('data-url', "http://telltheminbig.com"+makeParams(settings))
    document.querySelector('.buttons').appendChild(newTwitter);
    twttr.widgets.load();
  }catch(e){}
  var embedCode = '<iframe src="//telltheminbig.com' + makeParams(settings) + '" width="100%" height="250px" frameborder="0" allowtransparency="true" scrolling="no" ></iframe>';
  document.querySelector('#embed-code').setAttribute('value', embedCode);
}

function makeParams(s) {
  var query = "?q="+encodeURIComponent(s.value);
  query += s.color1 != "<?php print $color1 ?>" ? "&color1=" + encodeURIComponent(s.color1) : '';
  query += s.color2 != "<?php print $color2 ?>" ? "&color2=" + encodeURIComponent(s.color2) : '';
  query += s.speed != <?php print $speed ?> ? "&speed=" + encodeURIComponent(s.speed) : '';
  return query
}


</script>


</head>
<body>
  <main>
    <marquee behavior="slide" width="100%" loop="1000" truespeed scrolldelay="0" scrollamount="<?php print $speed ?>"><?php print $message ?></marquee>
  </main>
  <div class="iframe-info">
    <a href="http://telltheminbig.com<?php print $query ?>">You too, tell them in big!</a>
  </div>
  <div class="sharing">

    <!-- Personal -->
    <span class="text">Some things are simply better <em><b>told in big</b></em> – by <a href="http://twitter.com/walidvb" target="_blank">@walidvb</a> – <span id="make-your-own" class="small" href="#">Got something to say? <i>Tell them in BIG!</i>
      <span id="make-your-own-form">
      <input id="text" placeholder="tell them in big">
      <input id="color1" class="color" name='color1' value='<?php print $color1?>' />
      <input id="color2" class="color" name='color2' value='<?php print $color2?>' />
      <input type="range" id="speed" min="20" max="130">
      <a id="thelink" href="http://telltheminbig.com/<?php print "?q=$message&color1=$color1&color2=$color2" ?>">Copy me!</a>
      </span></span></span>

    <span class="buttons">
      <!-- Embed -->
      <span id="embed"><a class="button" href="#">&lt;/&gt; <span>Embed</span></a><input id="embed-code" readOnly="true" value='<iframe src="//telltheminbig.com<?php print $query?>" width="100%" height="250px" frameborder="0" allowtransparency="true" scrolling="no" ></iframe>'></input></span>
      <!-- Facebook -->
      <div class="fb-share-button" data-href="https://telltheminbig.com<?php print $query ?>" data-type="button"></div>

      <!-- Twitter -->
      <a href="https://twitter.com/share" data-text="Some things are simply better told in big #telltheminbig" class="twitter-share-button" data-count="none" data-url="http://telltheminbig.com/<?php print $query ?>" data-lang="en" data-align="right" data-via="walidvb"></a>


    </span>
  </div>
<script>
  twitter = document.querySelector('.twitter-share-button').cloneNode();
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27024782-16', 'telltheminbig.com');
  ga('send', 'pageview');

</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=340748409396996&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>