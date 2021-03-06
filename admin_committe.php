<?
/**
 * Admin Menu
 * @author Rene Faustino Gabriel Junior  (Analista-Desenvolvedor)
 * @copyright © Pan American Health Organization, 2013. All rights reserved.
 * @access public
 * @version v0.13.46
 * @package ProEthos-Admin
 * @subpackage committee
 */
 
/* Add Styles */
$style_add = array('proethos_form.css');
require ("cab.php");

/* Admin Common */
$ok = (($perfil -> valid('#ADM')) or ($perfil -> valid('#SCR')) or ($perfil -> valid('#COO')));
if ($ok==0) {
	redirecina('main.php');
}

/* Form Library */
require ($include . '_class_form.php');
$form = new form;
require("form_css.php");

/* Committee Library */
require_once ("_class/_class_committee.php");
$cm = new committee;
$cp = $cm -> cp();

/* Recover ID */
if ($cm -> config_exist()) { $dd[0] = $cm -> id;
}

$tabela = "_committee";
echo '<h2>' . msg("configuration_committe") . '</h2>';
$tela = $form -> editar($cp, $tabela);

if ($form -> saved > 0) {
	$cm -> save_arq();
	echo '<h3>' . msg('saved') . '</h3>';
	redirecina('contact.php');
} else {
	echo $tela;
}

echo '</div>';

echo $hd -> foot();
?>