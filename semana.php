<?php

header('Content-type: text/html; charset=utf-8');

set_time_limit(0);

include_once 'Connection.php';

$pdo = Connection::getInstance();
$pdo->exec('SET CHARACTER SET utf8');

date_default_timezone_set('America/Sao_Paulo');

$sql = "SELECT idClube, total, nome FROM v2_total_semana INNER JOIN v2_clube ON clube = idClube ORDER BY dia_base DESC, total DESC LIMIT 32";
$query = $pdo->query($sql);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$data = array();

foreach ($result as $item) {

    $data[$item['idClube']] = array('total' => $item['total'], 'nome' => $item['nome']);
}

arsort($data);

$seriesData = array();
$categories = array();

$cont = 0;
$echo = "<div class=\"content-box-title\"><p class=\"left-title\">Ranking Sócio-Torcedor Semana</p><p class=\"right-title\">Fonte: futebolmelhor.com.br</p><div class=\"clear\"></div></div>";
foreach ($data as $id => $item) {

    $cont++;
    
    $nome = $item['nome'];
    $quantidade = $item['quantidade'];
    
    if ($id == 25) {
        
        $nomeImagem = 'AmericaMG';
    } else if ($id == 10) {
        
        $nomeImagem = 'AtleticoMG';
    } else if ($id == 26) {
        
        $nomeImagem = 'Avai';
    } else if ($id == 14) {
        
        $nomeImagem = 'Ceara';
    } else if ($id == 22) {
        
        $nomeImagem = 'Ferroviario';
    } else if ($id == 23) {
        
        $nomeImagem = 'GremioOsasco';
    } else if ($id == 2) {
        
        $nomeImagem = 'Gremio';
    } else if ($id == 20) {
        
        $nomeImagem = 'Nautico';
    } else if ($id == 17) {
        
        $nomeImagem = 'PontePreta';
    } else if ($id == 11) {
        
        $nomeImagem = 'SantaCruz';
    } else if ($id == 8) {
        
        $nomeImagem = 'SaoPaulo';
    } else if ($id == 18) {
        
        $nomeImagem = 'Vitoria';
    } else if ($id == 33) {
        
        $nomeImagem = 'AmericaRN';
    } else {
        
        $nomeImagem = $nome;
    }

    if ($quantidade != 0) {

        $echo .= "<div class=\"files-box\"><img class=\"replace-2x file-image\" src=\"images/clubes/{$nomeImagem}.png\"><p class=\"file-title\">{$nome}</p><a href=\"#\" class=\"file-href file-open\">{$cont}º colocado</a><a href=\"#\" class=\"file-href\">{$quantidade}</a><div class=\"clear\"></div></div><div class=\"files-decoration\"></div>";
    }
}

$echo .= "</tbody></table>";

echo $echo;
