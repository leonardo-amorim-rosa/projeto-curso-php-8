<?php

namespace sistema\Nucleo;

/**
 * Classe de métodos utilitários
 * @author Léo Rosa
 */
class Helpers
{
    /**
     * Valida CPF
     * @param string $cpf
     * @return bool
     */
    public static function validaCpf(string $cpf): bool
    {
        // Remove todos os caracteres especiais
        $cpf = self::limpaNumero($cpf);

        // Verifica se o CPF tem 11 dígitos
        if (mb_strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais (ex: 111.111.111-11)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }
            $digitoVerificador = ($soma * 10) % 11;
            if ($digitoVerificador == 10 || $digitoVerificador == 11) {
                $digitoVerificador = 0;
            }
            if ($cpf[$t] != $digitoVerificador) {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove todos os caracteres especiais do número em string
     * @param string $numero
     * @return string
     */
    public static function limpaNumero(string $numero): string
    {
        return preg_replace('/[^0-9]/', '', $numero);
    }

    /**
     * Transforma texto em urls amigáveis (slugs)
     * @param string $string
     * @return string
     */
    public static function slug(string $string): string
    {
        // converte para minusculas
        $slug = strtolower($string);

        $slug = transliterator_transliterate('Any-Latin; Latin-ASCII', $slug);

        // Substitui espaços e caracteres não alfanuméricos por hífens
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);

        // Remove hífens extras nas extremidades
        $slug = trim($slug, '-');

        return $slug;
    }

    /**
     * Retorna a data atual no formato do windows
     * @return string
     */
    public static function dataAtual(): string
    {
        $diaMes = date('d');
        $diaSemana = date('w');
        $mes = date('n') - 1;
        $ano = date('Y');

        $nomesDiasDaSemana = ["domingo", "segunda-feira", "terça-feira",
            "quarta-feira", "quinta-feira", "sexta-feira", "sábado"];

        $nomeMeses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio",
            "Junho", "Julho", "Agosto", "Setembro", "Outubro",
            "Novembro", "Dezembro"];

        $dataFormatada = "$nomesDiasDaSemana[$diaSemana], $diaMes de $nomeMeses[$mes] de $ano";
        return $dataFormatada;
    }

    /**
     * Devolve o endereço completo de acordo com o ambiente e concatena a url
     * passada no parâmetro
     * @param string $url
     * @return string
     */
    public static function url(string $url): string
    {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        $ambiente = $servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO;

        if (str_starts_with($url, '/')) {
            return $ambiente . $url;
        }

        return $ambiente . '/' . $url;
    }

    /**
     * Devolve um texto resumido de acordo com o limite passado,
     * substituindo o restante por tres pontos
     * @param string $texto
     * @param int $limite
     * @return string
     */
    public static function resumirTexto(string $texto, int $limite): string
    {
        if (strlen($texto) > $limite) {
            return mb_substr($texto, 0, $limite) . '...';
        }
        
        return $texto;
    }
    
    /**
     * Verifica se o sistema está em ambiente de desenvolvimento
     * @return bool
     */
    public static function localhost(): bool
    {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        if ($servidor == 'localhost') {
            return true;
        }
        return false;
    }

    /**
     * Valida um string como url
     * @param string $url
     * @return bool
     */
    public static function validarUrl(string $url = null): bool
    {
        if (mb_strlen($url) < 10) {
            return false;
        }

        if (!str_contains($url, ".")) {
            return false;
        }

        if (str_contains($url, "http://")
                or str_contains($url, "https://")) {
            return true;
        }
        return false;
    }

    /**
     * Valida um string como url
     * @param string $url
     * @return bool
     */
    public static function validarUrlComFiltro(string $url = null): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Valida uma string para email
     * @param string $email
     * @return bool
     */
    public static function validarEmail(string $email = null): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Conta o tempo de uma data comparando com a atual
     * @param string $data
     * @return string
     */
    public static function contarTempo(string $data): string
    {
        $agora = strtotime(date("Y-m-d H:i:s"));
        $tempo = strtotime($data);
        $diferenca = $agora - $tempo;

        $segundos = $diferenca;
        $minutos = round($diferenca / 60);
        $horas = round($diferenca / 3600);
        $dias = round($diferenca / 86400);
        $semanas = round($diferenca / 604800);
        $meses = round($diferenca / 2419200);
        $anos = round($diferenca / 29030400);

        if ($segundos <= 60) {
            return "agora";
        } else if ($minutos <= 60) {
            return $minutos == 1 ? "há 1 minuto" : "há " . $minutos . " minutos";
        } else if ($horas <= 24) {
            return $horas == 1 ? "há 1 hora" : "há " . $horas . " horas";
        } else if ($dias <= 7) {
            return $dias == 1 ? "há 1 dia" : "há " . $dias . " dias";
        } else if ($semanas <= 4) {
            return $semanas == 1 ? "há 1 semana" : "há " . $semanas . " semanas";
        } else if ($meses <= 12) {
            return $meses == 1 ? "há 1 mês" : "há " . $meses . " meses";
        } else {
            return $anos == 1 ? "há 1 ano" : "há " . $anos . " anos";
        }
    }

    /**
     * Formata valores com casas decimais no formato real
     * @param int $valor
     * @return string
     */
    public static function formatarValor(float $valor = null): string
    {
        return number_format($valor, 2, ",", ".");
    }

    /**
     * Formata um número inteiro adicionando casas decimais
     * @param int $numero
     * @return string
     */
    public static function formatarNumero(int $numero = null): string
    {
        return number_format($numero, 0, ".", ".");
    }

    /**
     * Exibe um texto de saudação de acordo com o horário
     * @return string
     */
    public static function saudacao(): string
    {
        $hora = date('H');

//    if ($hora >= 0 and $hora < 5) {
//        return "Boa madrugada";
//    } else if ($hora >= 5 and $hora < 12) {
//        return "Bom dia";
//    } else if ($hora >= 12 and $hora <= 18) {
//        return "Boa tarde";
//    } else {
//        return "Boa noite";
//    }
//    $saudacao = null;
//    switch ($hora) {
//        case $hora >= 0 and $hora < 5:
//            $saudacao = "Boa madrugada";
//            break;
//        case $hora >= 5 and $hora < 12:
//            $saudacao = "Bom dia";
//            break;
//        case $hora >= 12 and $hora < 18:
//            $saudacao = "Boa tarde";
//            break;
//        default:
//            $saudacao = "Boa noite";
//    }

        $saudacao = match (true) {
            $hora >= 0 and $hora < 5 => "Boa madrugada",
            $hora >= 5 and $hora < 12 => "Bom dia",
            $hora >= 12 and $hora < 18 => "Boa tarde",
            default => "Boa noite"
        };

        return $saudacao;
    }
}
