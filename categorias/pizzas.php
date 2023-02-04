<?php
include "../model/query.php";

$dados = getPizzas($conexao);
echo $dados;