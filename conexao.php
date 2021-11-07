<?php 
$a = 'localhost';
$b ='mckscqmc_gf';
$c ='@senhaforte';
$d = 'mckscqmc_gf';
$comm = new mysqli($a, $b, $c, $d);
if(!$comm){
    alert("Erro Ao Conectar com o Banco de dados");
}
function newUser($nome,$email,$senha){
    $validacao = md5($nome.date('d'));
    $sql = 'INSERT INTO tb_usuario VALUES(null,
    "'.$nome.'","'.$email.'","'.$senha.'","img/semfoto.png","'.$validacao.'")';
    $resultado = $GLOBALS['comm']->query($sql);
    if($resultado){
        $msg = 'Para Finalizar o Cadastro Confime o codigo abaixo:';
        $msg.= $validacao;
        if(mail($email, "GESTOR-FINANCEIRO[ativar conta]", $msg)){
            alert("Para ativar sua conta acesse seu email e resgate o código!");
        }else{
            alert("Falha ao enviar codigo de confimação");
        }
    }else{
        alert("Erro ao cadastrar");
    }
}

function alert($msg){
    echo '<script>alert("'.$msg.'")</script>';
}
function validar($token){
    $sql =  'UPDATE tb_usuario SET status ="1" WHERE status="'.$token.'"';
    $resultado = $GLOBALS['comm']->query($sql);
    if($resultado){
        alert("Conta Ativada meu chefe");
        header('location:index.html');
    }else{
        alert("Codigo Invalido ou Ja ultilizado");
    }
}

?>