<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

date_default_timezone_set('America/Sao_Paulo');//or change to whatever timezone you want
$hostname_conexao = "localhost";
$database_conexao = "emersonp_emerson";
$username_conexao = "emersonp_user";
$password_conexao = "123456";
$conexao = mysqli_connect($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);
$URL = "https://www.emersonpenalva.com.br/";
?>
