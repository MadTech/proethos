<?php
 /**
  * Admin Menu
  * @author Rene Faustino Gabriel Junior  (Analista-Desenvolvedor)
  * @copyright Copyright (c) 2012 - sisDOC.com.br
  * @access public
  * @version v0.13.46
  * @package ProEthos-Admin
  * @subpackage protocols
 */
require("cab.php");
require('_class/_class_cep.php');

$tp = new message;
//$tp->language_set('pt_BR');


global $acao,$dd,$cp,$tabela;
require($include.'cp2_gravar.php');
require($include.'sisdoc_colunas.php');
require($include.'sisdoc_form2.php');
require($include.'sisdoc_debug.php');

	$clx = new cep;
	$tabela = $clx->tabela;
	
	$label = msg("protocols");
	$http_edit = troca(page(),'.php','_ed.php'); 
	$http = page();
	$editar = True;
	
	$http_redirect = page();
	
	//$http_ver = 'cliente_ver.php';
	$clx->row();	
	$busca = true;
	$offset = 20;
	//$pre_where = " e_mailing = '".$cl->mail_codigo."' ";
	
	
	
	echo '<h1>'.msg('cep').'</h1>';
	echo '<TABLE width="'.$tab_max.'" align="center"><TR><TD>';

	require($include.'sisdoc_row.php');
	
	echo '</table>';	
	echo '</div>';

echo $hd->foot();		
?> 
<script>
	
</script>