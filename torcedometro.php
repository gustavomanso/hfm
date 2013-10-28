<?php

header('Content-type: text/html; charset=utf-8');

set_time_limit(0);

include_once 'Connection.php';

$pdo = Connection::getInstance();
$pdo->exec('SET CHARACTER SET utf8');

date_default_timezone_set('America/Sao_Paulo');

$sql = "SELECT idClube, quantidade, nome FROM v2_socio INNER JOIN v2_clube ON clube = idClube ORDER BY data DESC LIMIT 32";
$query = $pdo->query($sql);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$data = array();

foreach ($result as $item) {

    $data[$item['nome']] = $item['quantidade'];
}

arsort($data);

$seriesData = array();
$categories = array();

$cont = 0;
$echo = "";
foreach ($data as $nome => $quantidade) {

    $cont++;

    if ($cont == 1) {

    	$p = 100;
    	$primeiro = $quantidade;
    } else {

    	$p = round($quantidade * 100 / $primeiro, 0);
    }

    $echo .= "<div class=\"stat\"><p class=\"stat-left\">{$cont}º {$nome}</p><p class=\"stat-right\">{$quantidade}</p><div class=\"clear\"></div><span class=\"stat-background\"><span class=\"stat-cleaner\"></span><span class=\"percent yellow p{$p}\"></span></span></div>";

}

echo $echo;