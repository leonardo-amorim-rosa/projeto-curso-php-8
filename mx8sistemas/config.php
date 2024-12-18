<?php

// Arquivo de configurações do sistema

// define o fuso horário padrão do sistem
date_default_timezone_set("America/Sao_Paulo");

// database settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

// informações do sistema
define('SITE_NOME', 'MX8');
define('SITE_DESCRICAO', 'MX8 - Sistemas');
define('DASHBOARD_NOME', 'MX8 - Dashboard');

// urls do sistema
define('URL_PRODUCAO', 'http://mx8sistemas.com.br');
define('URL_DESENVOLVIMENTO', 'http://localhost/blog');

define('URL_BASE', 'blog/');