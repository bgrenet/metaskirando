<?php
/*
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
	extract($_COOKIE);
	extract($_POST);

	$time = time();
	$tsave = $time + 30*24*3600;
	$tdel = $time - 1000;

// Rajoute une r�gion.
	if (!empty($_POST['new_name']))
	{
		if (!empty($_POST['filtA']))
			$new_filter = implode('|',$filtA);
		if (!empty($new_filter))
		{
			setcookie("region[$new_name]", $new_filter, $tsave);
			$region[$new_name] = $new_filter;
		}
	}

// Met � jour les filtres
	if (isset($_POST['region']))
	{
		foreach ( $_POST['region'] as $name => $filter )
		{
			$region[$name] = $filter;
			setcookie("region[$name]", '', $tdel);
			setcookie("region[$name]", $filter, $tsave);
		}
	}

// Efface une valeur.
	if (isset($_GET['delete']))
	{
		$delete = $_GET['delete'];
		setcookie("region[$delete]", '', $tdel);
		unset($region[$delete]);
	}

	if (isset($_POST['save']))
	{
// Pente raide ?
		if (isset($_POST['raide'])) {
			setcookie('raide', 'on', $tsave);
		} else {
			setcookie('raide', '', $tdel);
		}
// MyRegs only ?
		if (isset($_POST['myregs'])) {
			setcookie('myregs', 'only', $tsave);
		} else {
			setcookie('myregs', '', $tdel);
		}
	}

	require 'sites.inc.php';
	load_All($sorties);
	$regs = make_region_list($sorties);
?>
<html>
<head>
<title>Meta-Skirando : Mes pr�f�rences</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php include 'menu.inc'; ?>

<h2>Mes R�gions :</h2>

<p><i>Pour d�finir une r�gion, il faut lui donner un nom et sp�cifier un filtre. Le filtre
est une expression r�guli�re, qui n'a pas besoin d'�tre un mot complet. Pour rechercher plusieurs r�gion, il suffit de les s�parer par "</i>|<i>".
Le point "</i>.<i>" d�signe n'importe quel caract�re et est recommand� � la place de caract�res accentu�s.<br>
Exemples:</i><br>
<i>* On peut d�finir la r�gion "</i>Dauphin�<i>" avec pour filtre "</i>Belledonne|D.voluy|Vercors|Chartreuse|Taillefer|.crins<i>".</i><br>
<i>* Pour le Beaufortain, �tant donn� les multiples orthographes, le filtre "</i>Beaufort<i>" fait l'affaire.</i><br>
<i>Les r�gions sont enregistr�es dans des cookies pour �tre disponible lors de vos prochaines visites. On peut tester les filtres avant de les enregistrer � l'aide de la recherche "Kick Zeurch".</i>
</p>

<form method='post'>
<center>
<table style='padding:5px'>
<tr class='new'><td><b>Nom de la r�gion</b></td><td><b>Filtre correspondant</b></td><td></td></tr>

<?php
	if (isset($region))	{
		foreach ( $region as $name => $filter )
		{
			echo "<tr class='new'><td>$name</td><td><input type=text size=40 name=\"region[$name]\" value=\"$filter\"></td><td><a href='prefs.php?delete=$name'>supprimer</a></td></tr>\n";
		}
	}
?>

<tr class="new"><td valign='top'><input typr=text size=20 name='new_name'></td>
	<td><input typr=text size=40 name='new_filter'><br>
	ou cr�rer � partir de r�gion existantes :<br>
<select size="8" name="filtA[]" multiple="multiple">
<?php	
	if (isset($_COOKIE['region']))
	{
		foreach ( $_COOKIE['region'] as $nom => $key )
			echo "<option value=\"$key\">* $nom </option>\n";
	}
	$r = count($regs);
	for ($i=0;$i<$r;$i++)
	{
		$nom = $regs[$i]['nom'];
		$key = $regs[$i]['key'];
		echo "<option value=\"$key\">$nom </option>\n";
	}
?>
</select><br>(<i>selection multiple avec la touche ctrl</i>)
	</td> <td></td></tr>
</table>
</center>

<h2>Pr�f�rences :</h2>

<center>
<table>
<tr><td>
	<input type=checkbox name="raide" <?php if (isset($raide)) echo 'checked'; ?>>
</td><td>
	Afficher uniquement la pente raide par d�faut (<i>� partir de la difficult� 4.1 ou D-, et volopress.fr</i>).
</td></tr>
<tr><td>
	<input type=checkbox name="myregs" <?php if (isset($myregs)) echo 'checked'; ?>>
</td><td>
	Afficher les derni�res sorties uniquement dans mes r�gions <i>et ne soyez plus parasit� par les sorties de Nouvelle Z�lande ou du Pakistan ;-)</i>
</td></tr>
</table>
<br>
<INPUT TYPE=submit NAME="save" VALUE="Oui, c'est �a !">
</center>
</form>


<?php include 'bottom.inc'; ?>

</body></html>
