<?php

// Padrao do CI para não acessar a Classe direto pelo Browser
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Layout Class
 *
 * @package hooks
 * @description Implementa as views do tipo layout no framework.
 */

class Layout
{

public $base_url;

/**
* Metodo que executa as implementacoes.
* Este metodo e chamado atraves do arquivo hooks.php
* na pasta config.
*
* @return
*/
public function init()
{
// Instancia do CI.
$CI =& get_instance();

// Definindo o base_url.
$this->base_url = $CI->config->slash_item('base_url');

// Pegando a saida que o CI gera normalmente.
$output = $CI->output->get_output();

// Pegando o valor de title, se definido no controller.
$title = (isset($CI->title)) ? $CI->title : '';

// Links CSS definidos no controlador.
$css = (isset($CI->css)) ? $this->createCSSLinks($CI->css) : '';

// Links JS definidos no controlador.
$js = (isset($CI->js)) ? $this->createJSLinks($CI->js) : '';

// Se layout estiver definido e a regexp nao bater.
if (isset($CI->layout) && !preg_match('/(.+).php$/', $CI->layout))
{
$CI->layout .= '.php';
}
else
{
$CI->layout = 'default.php';
}

// Definindo caminho completo do layout.
$layout = __LAYOUT__ . $CI->layout;

// Se o layout for diferente do default, e o arquivo nao existir.
if ($CI->layout !== 'default.php' && !file_exists($layout))
{
// Exibe a mensagem, se o layout for diferente de '.php'.
if ($CI->layout != '.php') show_error("You have specified a invalid layout: " . $CI->layout);
}


// Se o arquivo layout existir.
if (file_exists($layout))
{
// Carrega o conteudo do  arquivo.
$layout = $CI->load->file($layout, true);

// Substitui o texto {content_for_layout} pelo valor de output em layout.
$view = str_replace('{content_for_layout}', $output, $layout);

// Substitui o texto {title_for_layout} pelo valor de title em view.
$view = str_replace('{title_for_layout}', $title, $view);

// Links CSS.
$view = str_replace('{css_for_layout}', $css, $view);

// Links JS.
$view = str_replace('{js_for_layout}', $js, $view);


}
else
{
$view = $output;
}

echo $view;
}

/**
* Gera os links CSS utilizados no layout.
*
* @return void
*/
private function createCSSLinks($links)
{
$html = "";

for ($i = 0; $i < count($links); $i++)
{
$html .= "<link rel='stylesheet' type='text/css' href='" . $this->base_url . CSSPATH . $links[$i] . ".css' media='screen' />";
}

return $html;

}

/**
* Gera os links JS utilizados no layout.
*
* @return void
*/
private function createJSLinks($links)
{
$html = "";

for ($i = 0; $i < count($links); $i++)
{
$html .= "<script type='text/javascript' src='" . $this->base_url . JSPATH . $links[$i] . ".js'></script>";
}

return $html;
}

}
