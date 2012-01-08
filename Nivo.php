<?php /*
    Copyright (C) Nathanael Schaeffer

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once('./settings.inc.php');

 ?>
<html>
<head>
<title>Meta-Skirando : Nivoses et M�t�o dans les Alpes.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="description" content="Le moteur de recherche du Ski de Rando. Les nivoses de m�t�o france et les bulletins d'avalanche. Pr�visions m�t�o montagne dans les Alpes" />
<meta name="keywords" content="ski de rando, ski alpinisme, ski extr�me, pente raide, alpes, pyr�n�es, neige, m�t�o" />
</head>
<body>

<?php include 'menu.inc'; ?>

<h1>Nivologie et pr�cautions</h1>

<p>
<b>En ski de rando, on s'expose � des risques.</b> Une bonne exp�rience de la montagne, de la neige et un �quipement sp�cial (Arva/Pelle/Sonde) sont n�cessaires pour �voluer avec un minimum de s�curit�.
Consultez les conseils pratiques et le petit trait� de nivologie de l'<a href="http://www.anena.org/">Anena</a>.<br>
Le site camptocamp.org a regroup� beaucoup d'infos sur la neige et les avalanches, en particulier des <a href="http://www.camptocamp.org/articles/107439/fr/neige-et-avalanches-les-ressources-du-net">t�moignages d'accidents</a>.<br>
N'h�sitez pas � sortir avec des organismes sp�cialis�s (comme le CAF), qui vous formeront � �tre autonomes.<br>
</p>

<h1><a name='meteo'></a>Pr�visions et Observations</h1>

<ul>
<li>Bulletins d'avalanches de M�t�o France
<?php
	function bra_link_list($deps) {
		foreach ($deps as $dep) {
			if ($dep[0] != 'A') {
				$dep_code = "DEPT$dep";
			} else $dep_code = "ANDORRE";
			echo "<a href=\"http://france.meteofrance.com/france/MONTAGNE?MONTAGNE_PORTLET.path=montagnebulletinneige%2F$dep_code#bulletinNeigeMontagne\">$dep</a> ";
		}
	}
?>
<ul><li>Alpes : <?php bra_link_list(array('04','05','06','38','73','74')); ?></li>
<li>Pyr�n�es : <?php bra_link_list(array('09','31','64','65','66','Andorre')); ?></li>
<li>Corse : <?php bra_link_list(array('2A','2B')); ?></li>
</ul>
<li>Bulletins d'avalanches <a href="http://www.slf.ch/laworg/tab.html">ailleurs en europe</a></li>
<li>Pr�visions m�t�o : <a href="http://geo.hmg.inpg.fr/caplain/meteo/mto38.shtml">Caplain</a>, <a href="http://www.meteo-alpes.fr/">Alpes</a>, <a href="http://meteo.chamonix.com/MetPre.php3">Chamonix</a>,
	<a href="http://www.inln.cnrs.fr/meteo.php3">INLN</a>
 et <a href="http://www.meteofrance.com/FR/index.jsp">MeteoCrash.fr</a>. D'autres liens m�t�o sur <a href="http://www.meteo-chamonix.org/">meteo-chamonix.org</a>.
</li>
<li>Observations M�t�o en temps r�el : <a href="http://www.meteociel.fr/">M�t�ociel</a> et <a href="http://www.infoclimat.fr/accueil/">infoclimat</a>.
</li>
<!--
<li>Pr�cipitations sur les reliefs (brut de M�t�o France, 1mm d'eau correspond � 1cm de neige environ) :
<ul>
<li>Alpes : <a href="http://www.meteo.fr/temps/scm/images/alp/ws06p00xxalp.gif">J-1</a>, <a href="http://www.meteo.fr/temps/scm/images/alp/ws06p24xxalp.gif">J</a>, <a href="http://www.meteo.fr/temps/scm/images/alp/ws06p48xxalp.gif">J+1</a></li>
<li>Pyr�n�es : <a href="http://www.meteo.fr/temps/scm/images/pyr/ws06p00xxpyr.gif">J-1</a>, <a href="http://www.meteo.fr/temps/scm/images/pyr/ws06p24xxpyr.gif">J</a>, <a href="http://www.meteo.fr/temps/scm/images/pyr/ws06p48xxpyr.gif">J+1</a></li>
</ul>
</li>
<li>Enneigement dans <a href="http://www.meteo.fr/temps/scm/wcalpa.htm">les Alpes</a> et dans <a href="http://www.meteo.fr/temps/scm/wcpyra.htm">les Pyr�n�es</a>, compar�s aux moyennes (brut de M�t�o France)
</li>
-->
</ul>

<h1><a name='nivo'></a>Stations automatiques</h1>

Les stations automatiques de M�t�o France sont diss�min�es dans les montagnes et donnent de pr�cieuses informations sur les chutes de neige, les temp�ratures et le vent, en diff�rents endroits :
<ul>
<li><b>Autour de Grenoble</b> : <a href="#Bel">Belledonne</a>, <a href="#Ecr">Ecrins</a>, <a href="#Ver">Vercors</a>, <a href="#Cha">Chartreuse</a></li>
<li><b>Alpes du Nord</b> : <a href="#Aig">Aiguilles Rouges</a>, <a href="#Bau">Bauges</a>, <a href="#Bea">Beaufortain</a>, <a href="#Van">Vanoise</a>, <a href="#Mau">Haute-Maurienne</a>, <a href="#Tar">Haute-Tarentaise</a>, <a href="#Tha">Thabor</a></li>
<li><b>Alpes du Sud</b> : <a href="#Ech">Champsaur</a>, <a href="#Que">Queyras</a>, <a href="#Par">Parpaillon</a>, <a href="#Uba">Ubaye</a>, <a href="#Mer">Mercantour</a></li>
<li><b>Pyr�n�es</b> : <a href="#PyE">Orientales</a>, <a href="#PyC">Centrales</a>, <a href="#Big">Haute Bigorre</a>, <a href="#PyW">Occidentales</a></li>
<li><b>Corse</b> : <a href="#Cor">Cinto-Rotondo</a></li>
</ul>

<?php
// Parsing mf data.
	$links = file($SETTINGS['odir'] . '/nivo_links.web');
	ereg('(niv7j_[^"]+)',$links[0],$regs); $img_porte[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[0],$regs); $img_porte[1] = $regs[1];
	ereg('(niv7j_[^"]+)',$links[1],$regs); $img_bauges[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[1],$regs); $img_bauges[1] = $regs[1];
	ereg('(niv7j_[^"]+)',$links[2],$regs); $img_merc[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[2],$regs); $img_merc[1] = $regs[1];
	ereg('(niv7j_[^"]+)',$links[3],$regs); $img_parp[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[3],$regs); $img_parp[1] = $regs[1];
	ereg('(niv7j_[^"]+)',$links[4],$regs); $img_puig[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[4],$regs); $img_puig[1] = $regs[1];
	ereg('(niv7j_[^"]+)',$links[5],$regs); $img_hosp[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[5],$regs); $img_hosp[1] = $regs[1];
	ereg('(niv7j_[^"]+)',$links[6],$regs); $img_aig[0] = $regs[1];
	ereg('(niv_[^"]+)',$links[6],$regs); $img_aig[1] = $regs[1];
?>

<center>
<p><a name='Bel' href='http://www.meteo.fr/temps/france/nivose/pics/DUPINS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/DUPINS.gif' width='396'></a>
<br><b>Belledonne</b>, sur le Plat du Pin, au-dessus du Rivier d'Allemont, en montant vers le Pic de la Belle Etoile. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/DUPIN.gif">6 mois</a> ]
</p>
<p><a name='Ecr' href='http://www.meteo.fr/temps/france/nivose/pics/ECRINS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/ECRINS.gif' width='396'></a><a href='http://www.meteo.fr/temps/france/nivose/pics/MEIJES.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/MEIJES.gif' width='396'></a>
<br><b>Ecrins</b>, sur la morraine du glacier de Bonnepierre, non-loin du d�me des Ecrins. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/ECRIN.gif">6 mois</a> ] + dans les vallons de la Meije, au-dessus de la Grave (?) [ <a href="http://www.meteo.fr/temps/france/nivose/pics/MEIJE.gif">6 mois</a> ]
</p>
<p><a name='Ver' href='http://www.meteo.fr/temps/france/nivose/pics/LEGUAS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/LEGUAS.gif' width='396'></a><br>
<b>Vercors</b>, commune de Le Gua (� c�t� du couloir des Sultanes) [ <a href="http://www.meteo.fr/temps/france/nivose/pics/LEGUA.gif">6 mois</a> ]
</p>
<p><a name='Cha' href='http://www.meteo.fr/temps/france/nivose/pics/STHILS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/STHILS.gif' width='396'></a><a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_porte[0] ?>"><img border='1' src="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_porte[0] ?>" width='396'></a>
<br>
<b>Chartreuse</b>, commune de St-Hilaire du Touvet (1700m) [ <a href="http://www.meteo.fr/temps/france/nivose/pics/STHIL.gif">6 mois</a> ] + Col de Porte - Centre d'Etude de la Neige (1325m) [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_porte[1] ?>">6 mois</a> ]
</p>

<p><a name='Bau' href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_bauges[0] ?>"><img border='1' src="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_bauges[0] ?>" width='396'></a><br>
<b>Bauges</b>, plan de la Limace (1630m). [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_bauges[1] ?>">6 mois</a> ]
</p>

<p><a name='Aig' href='http://www.meteo.fr/temps/france/nivose/pics/AIGRGS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/AIGRGS.gif' width='396'></a><br>
<b>Aiguilles Rouges</b>, En face du Mont Blanc. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/AIGRG.gif">6 mois</a> ]
</p>
<p><a name='Bea' href='http://www.meteo.fr/temps/france/nivose/pics/SAISIS.gif' title='#IM7'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/SAISIS.gif' width='396'></a><br>
<b>Beaufortain</b>, les Saisies ? [ <a href="http://www.meteo.fr/temps/france/nivose/pics/SAISI.gif">6 mois</a> ]
</p>
<p><a name='Van' href='http://www.meteo.fr/temps/france/nivose/pics/BELLES.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/BELLES.gif' width='396'></a><br>
<b>Vanoise</b>, La Plagne [ <a href="http://www.meteo.fr/temps/france/nivose/pics/BELLE.gif">6 mois</a> ]
</p>
<p><a name='Mau' href='http://www.meteo.fr/temps/france/nivose/pics/BONNES.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/BONNES.gif' width='396'></a><br>
<b>Haute-Maurienne</b>, Bonneval-sur-Arc. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/BONNE.gif">6 mois</a> ]
</p>
<p><a name='Tar' href='http://www.meteo.fr/temps/france/nivose/pics/CHEVRS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/CHEVRS.gif' width='396'></a><br>
<b>Haute Tarentaise</b>, lac du Chevril ? [ <a href="http://www.meteo.fr/temps/france/nivose/pics/CHEVR.gif">6 mois</a> ]
</p>
<p><a name='Tha' href='http://www.meteo.fr/temps/france/nivose/pics/ROCHIS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/ROCHIS.gif' width='396'></a><br>
<b>Thabor</b>, les Rochilles ? [ <a href="http://www.meteo.fr/temps/france/nivose/pics/ROCHI.gif">6 mois</a> ]
</p>

<p><a name='Ech' href='http://www.meteo.fr/temps/france/nivose/pics/ORCIES.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/ORCIES.gif' width='396'></a><br>
<b>Champsaur</b>, Orci�res. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/ORCIE.gif">6 mois</a> ]
</p>
<p><a name='Que' href='http://www.meteo.fr/temps/france/nivose/pics/AGNELS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/AGNELS.gif' width='396'></a><br>
<b>Queyras</b>, col Agnel. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/AGNEL.gif">6 mois</a> ]
</p>
<p><a name='Par' href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_parp[0] ?>"><img border='1' src="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_parp[0] ?>" width='396'></a><br>
<b>Parpaillon</b> - Embrunais. [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_parp[1] ?>">6 mois</a> ]
</p>
<p><a name='Uba' href='http://www.meteo.fr/temps/france/nivose/pics/RESTES.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/RESTES.gif' width='396'></a><br>
<b>Ubaye</b>, Restefond. [ <a href="http://www.meteo.fr/temps/france/nivose/pics/RESTE.gif">6 mois</a> ]
</p>
<p><a name='Mer' href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_merc[0] ?>"><img border='1' src="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_merc[0] ?>" width='396'></a><br>
<b>Mercantour</b>, Lac des Millefonts. [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_merc[1] ?>">6 mois</a> ]
</p>

<p><a name='PyE' href='http://www.meteo.fr/temps/france/nivose/pics/CANIGS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/CANIGS.gif' width='396'></a>
<a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_puig[0] ?>"><img border='1' src="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_puig[0] ?>" width='396'></a>
<br>
<b>Pyr�n�es Orientales</b>, Canigou [ <a href="http://www.meteo.fr/temps/france/nivose/pics/CANIG.gif">6 mois</a> ] + Puigmal [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_puig[1] ?>">6 mois</a> ].
</p>

<p>
<a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_hosp[0] ?>"><img border='1' src='http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_hosp[0] ?>' width='396'></a>
<a href='http://www.meteo.fr/temps/france/nivose/pics/PAULAS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/PAULAS.gif' width='396'></a>
<br>
<b>Pyr�n�es Orientales</b>, Hospitalet [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_hosp[1] ?>">6 mois</a> ] + Couserans (Port d'Aula) [ <a href="http://www.meteo.fr/temps/france/nivose/pics/PAULA.gif">6 mois</a> ].
</p>


<p><a name='PyC' href='http://www.meteo.fr/temps/france/nivose/pics/MAUPAS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/MAUPAS.gif' width='396'></a><br>
<b>Pyr�n�es Centrales</b>, Luchonnais (Maupas)[ <a href="http://www.meteo.fr/temps/france/nivose/pics/MAUPA.gif">6 mois</a> ].
</p>

<p>
<a name='Big' href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_aig[0] ?>"><img border='1' src='http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_aig[0] ?>' width='396'></a>
<a href='http://www.meteo.fr/temps/france/nivose/pics/LARDIS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/LARDIS.gif' width='396'></a>
<br>
<b>Haute Bigorre (Pyr�n�es)</b>, Tunnel de Bielsa (Aiguillettes) [ <a href="http://france.meteofrance.com/generated/integration/img/produits/mont/<?php echo $img_aig[1] ?>">6 mois</a> ] + Lac d'Ardiden [ <a href="http://www.meteo.fr/temps/france/nivose/pics/LARDI.gif">6 mois</a> ].
</p>

<p><a name='PyW' href='http://www.meteo.fr/temps/france/nivose/pics/SOUMCS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/SOUMCS.gif' width='396'></a><br>
<b>Pyr�n�es Occidentales</b>, Aspe-Ossau (Soum Couy). [ <a href="http://www.meteo.fr/temps/france/nivose/pics/SOUMC.gif">6 mois</a> ]
</p>

<p><a name='Cor' href='http://www.meteo.fr/temps/france/nivose/pics/SPONDS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/SPONDS.gif' width='396'></a><a href='http://www.meteo.fr/temps/france/nivose/pics/MANICS.gif'><img border='1' src='http://www.meteo.fr/temps/france/nivose/pics/MANICS.gif' width='396'></a><br>
<b>Corse (Cinto-Rotondo)</b>, Sponde [ <a href="http://www.meteo.fr/temps/france/nivose/pics/SPOND.gif">6 mois</a> ] + Maniccia [ <a href="http://www.meteo.fr/temps/france/nivose/pics/MANIC.gif">6 mois</a> ] 
</p>

</center>

<?php include 'bottom.inc'; ?>

</body></html>
