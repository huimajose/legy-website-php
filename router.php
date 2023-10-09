<?php
// Inclua o arquivo de configuração das rotas
include('config/routes.php');

// Get the requested page name from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define o caminho para a pasta de páginas
$pages_path = __DIR__ . '/pages/';

// Verifique se a página solicitada existe nas rotas definidas
if (array_key_exists($page, $routes)) {
    $file_to_include = $routes[$page];
    if (file_exists($pages_path . $file_to_include)) {
        // Se a página existe, inclua-a
        include($pages_path . $file_to_include);
    } else {
        // Se a página não existe, mostre um erro 404
        header('HTTP/1.0 404 Not Found');
        echo 'Error 404: Page not found';
    }
} else {
    // Se a página solicitada não estiver nas rotas definidas, mostre um erro 404
    header('HTTP/1.0 404 Not Found');
    echo 'Error 404: Page not found';
}
?>
