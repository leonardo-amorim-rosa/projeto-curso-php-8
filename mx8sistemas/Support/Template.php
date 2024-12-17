<?php

namespace mx8sistemas\Support;

use Twig\Lexer;
use mx8sistemas\Core\Helpers;

/**
 * Description of Template
 *
 * @author leoam
 */
class Template
{

    private \Twig\Environment $twig;

    public function __construct(string $diretorio)
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio);

        $this->twig = new \Twig\Environment($loader);

        $lexer = new Lexer($this->twig, [
            $this->helpers()
        ]);

        $this->twig->setLexer($lexer);
    }

    public function render(string $view, array $dados): string
    {
        return $this->twig->render($view, $dados);
    }

    private function helpers(): void
    {
        $this->twig->addFunction(new \Twig\TwigFunction('url', function (string $url) {
                            return Helpers::url($url);
                        }));

        $this->twig->addFunction(new \Twig\TwigFunction('saudacao', function () {
                            return Helpers::saudacao();
                        }));

        $this->twig->addFunction(new \Twig\TwigFunction('resumirTexto', function ($texto, $limite) {
                            return Helpers::resumirTexto($texto, $limite);
                        }));
    }
}
