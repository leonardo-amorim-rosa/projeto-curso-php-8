<?php

namespace mx8sistemas\Core;

/**
 * Classe de Mensagens do sistema
 *
 * @author leoam
 */
class AlertMessage
{

    private $texto;
    private $css;

    /**
     * Cria uma mensagem de sucesso
     * @param string $mensagem
     * @return AlertMessage
     */
    public function success(string $mensagem): AlertMessage
    {
        $this->css = 'alert alert-success';
        $this->texto = $this->filter($mensagem);
        return $this;
    }

    /**
     * Cria uma mensagem de erro
     * @param string $mensagem
     * @return AlertMessage
     */    
    public function error(string $mensagem): AlertMessage
    {
        $this->css = 'alert alert-danger';
        $this->texto = $this->filter($mensagem);
        return $this;
    }

    /**
     * Cria uma mensagem de alerta
     * @param string $mensagem
     * @return AlertMessage
     */    
    public function warning(string $mensagem): AlertMessage
    {
        $this->css = 'alert alert-warning';
        $this->texto = $this->filter($mensagem);
        return $this;
    }

    /**
     * Cria uma mensagem de informação
     * @param string $mensagem
     * @return AlertMessage
     */    
    public function info(string $mensagem): AlertMessage
    {
        $this->css = 'alert alert-primary';
        $this->texto = $this->filter($mensagem);
        return $this;
    }

    /**
     * Rendereza o texto da mensagem
     * @return string
     */
    public function render(): string
    {
        return "<div class='{$this->css}' role='alert'>{$this->texto}</div>";
    }

    /**
     * Remove quaisquer caracteres especiais do texto
     * @param string $mensagem
     * @return string
     */
    private function filter(string $mensagem): string
    {
        return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    /**
     * Converte o objeto Mensagem em string
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
