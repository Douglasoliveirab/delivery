<?php
include "../models/query.php";

$dados = getPizzas($conexao);
echo $dados;