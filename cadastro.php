<?php 
 include("conexao.php");
 if($_POST){
 	newUser($_POST['nome'],$_POST['email'],$_POST['senha']);
 }
 if(isset($_GET['ativar'])){
 	 validar($_GET['ativar']);
 }else{
?>
<meta charset="utf-8">
<form>
	Digite o seu codigo de validação:
	<input type="text" name="ativar">
	<button>Validar</button>
</form>
<?php
 }
?>