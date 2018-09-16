<?php
$resultat1="";
$resultat2="";
$resultat3="";
$resultat4="";
$resultat5="";
/////////////////////////////////////////////// NOM
function testNom($asSaisie, $asMotif) {
if(preg_match("/$asMotif/", $asSaisie)) $r = "nom OK";
else $r = "NOM KO";
return $r;
}
// -----------------------
if(null !==(filter_input(INPUT_GET, 'nom'))) {
$resultat1 = testNom(filter_input(INPUT_GET, 'nom'), "/^[A-Z \'-]+$/i");
}

////////////////////////////////////////////// PRENOM
function testPrenom($asSaisie, $asMotif) {
if(preg_match("/$asMotif/", $asSaisie)) $r = "prenom OK";
else $r = "PRENOM KO";
return $r;
}
// -----------------------
if(null !==(filter_input(INPUT_GET, 'prenom'))) {
$resultat2 = testPrenom(filter_input(INPUT_GET, 'prenom'), "/^[A-Z \'-]+$/i");
}

////////////////////////////////////////////// DATE NAISSANCE
function testDateN($asSaisie, $asMotif) {
if(preg_match("/$asMotif/", $asSaisie)) $r = "date OK";
else $r = "DATE KO";
return $r;
}
// -----------------------
if(null !==(filter_input(INPUT_GET, 'dateNaissance'))) {
$resultat3 = testDateN(filter_input(INPUT_GET, 'dateNaissance'), "	
^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[2][0]\d{2})$|^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[2][0]\d{2}\s([0-1]\d|[2][0-3])\:[0-5]\d\:[0-5]\d)$" );
}

////////////////////////////////////////////// EMAIL 1
function testMail1($asSaisie, $asMotif) {
if(preg_match("/$asMotif/", $asSaisie)) $r = "email OK";
else $r = "EMAIL KO";
return $r;
}
// -----------------------
if(null !==(filter_input(INPUT_GET, 'email'))) {
$resultat4 = testMail1(filter_input(INPUT_GET, 'email'), "^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$");
}

////////////////////////////////////////////// EMAIL 2
function testMail2($asSaisie, $asMotif) {
if(preg_match("/$asMotif/", $asSaisie)) $r = "email OK";
else $r = " RE-TYPE EMAIL KO";
return $r;
}
// -----------------------
if(null !==(filter_input(INPUT_GET, 'email2'))) {
$resultat5 = testMail2(filter_input(INPUT_GET, 'email2'), "^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$");
}










?>
<form action="" method="get">
<label>nom </label>
<input name="nom" value="" />
<br>
<label>prenom </label>
<input name="prenom" value="" />
<br>
<label>date N </label>
<input name="dateNaissance" value="" />
<br>
<label>email1 </label>
<input name="email1" value="" />
<br>
<label>email2 </label>
<input name="email2" value="" />


<input type="submit" />
<span id="resultat">&nbsp;<?php echo $resultat1;?></span>
<span id="resultat">&nbsp;<?php echo $resultat2;?></span>
<span id="resultat">&nbsp;<?php echo $resultat3;?></span>
<span id="resultat">&nbsp;<?php echo $resultat4;?></span>
<span id="resultat">&nbsp;<?php echo $resultat5;?></span>
</form>