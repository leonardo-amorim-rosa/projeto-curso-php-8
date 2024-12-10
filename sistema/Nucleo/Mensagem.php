<?php

namespace sistema\Nucleo;

/**
 * Classe de Mensagens do sistema
 *
 * @author leoam
 */
class Mensagem
{

    private $texto;
    private $css;

    /**
     * Cria uma mensagem de sucesso
     * @param string $mensagem
     * @return Mensagem
     */
    public function sucesso(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-success';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    /**
     * Cria uma mensagem de erro
     * @param string $mensagem
     * @return Mensagem
     */    
    public function erro(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-danger';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    /**
     * Cria uma mensagem de alerta
     * @param string $mensagem
     * @return Mensagem
     */    
    public function alerta(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-warning';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    /**
     * Cria uma mensagem de informação
     * @param string $mensagem
     * @return Mensagem
     */    
    public function informa(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-primary';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    /**
     * Rendereza o texto da mensagem
     * @return string
     */
    public function renderizar(): string
    {
        return "<div class='{$this->css}' role='alert'>{$this->texto}</div>";
    }

    /**
     * Remove quaisquer caracteres especiais do texto
     * @param string $mensagem
     * @return string
     */
    private function filtrar(string $mensagem): string
    {
        return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    /**
     * Converte o objeto Mensagem em string
     * @return string
     */
    public function __toString(): string
    {
        return $this->renderizar();
    }
}
