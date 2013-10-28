<?php

header('Content-type: text/html; charset=utf-8');

set_time_limit(0);

include_once 'Connection.php';

$pdo = Connection::getInstance();
$pdo->exec('SET CHARACTER SET utf8');

date_default_timezone_set('America/Sao_Paulo');

$sql = "SELECT total, nome FROM v2_total_dia INNER JOIN v2_clube ON clube = idClube ORDER BY dia_base DESC, total DESC LIMIT 32";
$query = $pdo->query($sql);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$data = array();

foreach ($result as $item) {

    $data[$item['nome']] = $item['total'];
}

arsort($data);

$seriesData = array();
$categories = array();

$cont = 0;
$echo = "<div class=\"content-box-title\"><p class=\"left-title\">Ranking Sócio-Torcedor Dia</p><p class=\"right-title\">Fonte: futebolmelhor.com.br</p><div class=\"clear\"></div></div>";
foreach ($data as $nome => $quantidade) {

    $cont++;

    if ($quantidade != 0) {

    	$echo .= "<div class=\"files-box\"><img class=\"replace-2x file-image\" src=\"images/clubes/{$nome}.png\"><p class=\"file-title\">{$nome}</p><a href=\"#\" class=\"file-href file-open\">{$cont}º colocado</a><a href=\"#\" class=\"file-href\">{$quantidade}</a><div class=\"clear\"></div></div><div class=\"files-decoration\"></div>";
    }

}

$echo .= "</tbody></table>";

echo $echo;

