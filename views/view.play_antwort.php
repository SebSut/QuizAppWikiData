<style>
    progress{
          background-image:
  -webkit-linear-gradient(left, forestgreen,yellow, firebrick);
    }
 progress:not([value]) {

}
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  
  /* Get rid of default border in Firefox. */
  border: none;
  
  /* Dimensions */
  width: 100%;
  max-width: 266px;
  height: 20px;
}
progress[value] {
  width: 100%;
  max-width: 266px;
  height: 20px;
}
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
   appearance: none;

  width: 100%;
  max-width: 266px;
  height: 20px;
}
@-webkit-keyframes animate-stripes {
   100% { background-position: -100px 0px; }
}

@keyframes animate-stripes {
   100% { background-position: -100px 0px; }
}




progress[value]::-webkit-progress-bar {
  /* background-color:  #eee; */
  background-image:
  -webkit-linear-gradient(left, forestgreen,yellow, firebrick);
  border-radius: 2px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
   
}

progress[value]::-webkit-progress-value {
    background-color: #22aadd; 
   background-image:
	   -webkit-linear-gradient(-45deg, 
	                           transparent 33%, rgba(0, 0, 0, .2) 33%, 
	                           rgba(0,0, 0, .2) 66%, transparent 66%),
	   -webkit-linear-gradient(top, 
	                           rgba(255, 255, 255, .25), 
	                           rgba(0, 0, 0, .25));
	 

    border-radius: 2px; 
   /*  background-size: 35px 20px, 100% 100%, 100% 100%;*/
    -webkit-animation: animate-stripes 5s linear infinite;
        animation: animate-stripes 5s linear infinite;
}

progress[value]::-webkit-progress-value::before {
  content: '80%';
  position: absolute;
  right: 0;
  top: -125%;
}
progress[value]::-webkit-progress-value::after {
  content: '';
  width: 6px;
  height: 6px;
  position: absolute;
  border-radius: 100%;
  right: 7px;
  top: 7px;
  background-color: white;
}



progress[value]::-moz-progress-bar { 
 

    
    background-image:
    -moz-linear-gradient(
      135deg, 
      transparent 33%, 
      rgba(0, 0, 0, 0.2) 33%, 
      rgba(0, 0, 0, 0.2) 66%, 
      transparent 66% 
    ),
    -moz-linear-gradient(
      top, 
      rgba(255, 255, 255, 0.25), 
      rgba(0, 0, 0, 0.25)
    ),
    -moz-linear-gradient(
      left, 
     #ffcc00, 
      orange    
    );

  border-radius: 2px; 
  background-size: 35px 20px, 100% 100%, 100% 100%; 
}


#lastResult .info{
    width: 128px;
    height: 75px;
    text-align: center;
    vertical-align: middle;
     display: table-cell;
   border-radius: .3125em;
    
    padding: 2px;
    margin: 3px;
      font-size: 0.75em;
}
#lastResult .richtig{
    background-color: #ffcc00;
    color: #af1818;
    
  animation-name: erichtig;
  animation-duration: 2s;
}
#lastResult .falsch{
    
     background-color: #ffcc00;
 animation-name: efalsch;
  animation-duration: 2s;
}
#lastResult .zuspaet{
   
     background-color: #ffcc00;
     animation-name: ezuspaet;
  animation-duration: 2s;
}

 /* The animation code */
@keyframes erichtig {
  from {background-color: #ffcc00;}
  to {background-color: #00cc00 }
}
@keyframes efalsch {
  from {background-color: #ffcc00;}
  to {background-color: #af1818;}
}
@keyframes ezuspaet {
  from {background-color: #ffcc00;}
  to {background-color: #832583;}
}

/* The element to apply the animation to */
/* #lastresult {

  background-color: #ffcc00;;
  animation-name: example;
  animation-duration: 4s;
} */









    </style>
    

<?php
  /* @var $frage Frage */
  /* @var $runde Runde */
  /* @var $spiel Spiel */
  /* @var $antwortKorrekt Antwort */
//$antworten=Core::$view->$antworten;
$frage=Core::$view->Frage;
$runde=Core::$view->runde;
$spiel=Core::$view->Spiel;
$eigeneAntwort=Core::$view->eigeneAntwort;
$antwortKorrekt= Core::$view->korrekteAntwort;
$Ergebnis=  Core::$view->Ergebnis;

if($spiel->wait){
    $weiter="Auf Gegnerantwort warten";
}else{
    $weiter="weiter";
}
  /* @var $frage Frage */
/* @var $item Antwort */?>
<div id="lastResult">
<?php
    if($Ergebnis=="richtig"){
    ?>
    <div class= "richtig ui-btn ui-corner-all <?php if($Ergebnis=="richtig") echo"ui-btn-active";?>">RICHTIG</div>
    <div><?=$runde->Zeit?> Sekunden => <?=$runde->TP?> TP</div>
    <?php
}if($Ergebnis=="zu spät"){
    ?>
    <div class= "zuspaet ui-btn ui-corner-all ui-btn-inactive">ZU SPÄT</div>
    Die richtige Antwort lautet
    <div class= "ui-btn ui-corner-all ui-btn-active"><?=$antwortKorrekt->Antworttext;?></div>
    
    
    <?php
}
 if($Ergebnis=="falsch"){
      ?>
    <div class= "falsch ui-btn-active ui-btn ui-corner-all ui-btn-inactive">FALSCH</div>
    Die richtige Antwort lautet
    <div class= "ui-btn-active ui-btn ui-corner-all"><?=$antwortKorrekt->Antworttext;?></div>
   
   
    <?php
    
    
}
    
  ?>
    
    
    
</div>
    <?php
    if($spiel->status0!=2){
    ?>
<form name="formstart" id="start" action="?task=play2&id=<?=$spiel->m_oid?>" data-ajax="false" method="post">
 <button type="submit" name="start" id="start" value="1" <?php if($spiel->wait)echo'disabled="disabled"';?>><?=$weiter?></button>
    
</form> 
    <?php
    }
    ?>
  <a href="?task=home" data-role="button"  class="ui-link ui-btn ui-icon-back ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all ">Zurück</a>


