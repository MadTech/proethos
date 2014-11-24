<?
require("db.php");
global $messa;

require('_class/_class_ged.php');
$ged = new ged;

require('_class/_class_cep.php');
$cep = new cep;

require('_class/_class_dictamen.php');
$dict = new dictamen;

/* Mensagens do sistema */
require("_class/_class_message.php");
$edit_mode = round($_SESSION['editmode']);
$file = 'messages/msg_'.$LANG.'.php';
$LANG = $lg->language_read();
if (file_exists($file)) { require($file); } else { echo 'message not found '.$file; }

if (strlen($acao) > 0)
	{			
 		$ok = $dict->dictamen_save($dd);
		//echo '==>'.$ok;
		//exit;
		if ($ok == 2)
			{
				$proto = $dd[1];
				$caae = $dd[1];
				$cep->caae = $caae;
				$cep->protocolo = $proto;
				$cep->status = 'D';
				
				$cep->cep_historic_append('PAE',msg('emited_dictamen'));
				$dict->protocol = $proto;
				
				$dict->create_pdf($proto);
				$dict->ged_delete_old($proto);
				$dict->save_ged();
				
				$cep->protocolo = $proto;
				$cep->caae = $dd[1];
				
				$cep->cep_status_alter('E');
			}
		echo '</A>';			
		echo '
			<script>
				$(window.location).attr(\'href\', \'protocolo_detalhe.php\');
			</script>
		';			
		exit;
	} else {
		$dict->dictamen_recupera($dd);
	}
echo $dict->dictamen_form();
?>
