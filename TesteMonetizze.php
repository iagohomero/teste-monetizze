<?php

class TesteMonetizze
{
    private $quantidadeDezenas;
    private $resultado;
    private $totalJogos;
    private $jogos;

    public function __construct($quantidadeDezenas, $totalJogos)
    {
        $this->setQuantidadeDezenas($quantidadeDezenas);
        $this->setTotalJogos($totalJogos);
    }

    public function setQuantidadeDezenas($quantidadeDezenas)
    {
        if ($quantidadeDezenas > 5 && $quantidadeDezenas < 11){
            $this->quantidadeDezenas = $quantidadeDezenas;
        }
        else
            throw new Exception('A quantidade de dezenas deve estar entre 6 e 10');
    }

    public function getQuantidadeDezenas()
    {
        return $this->quantidadeDezenas;
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function setTotalJogos($totalJogos)
    {
        $this->totalJogos = $totalJogos;
    }

    public function getTotalJogos()
    {
        return $this->totalJogos;
    }

    public function setJogos($jogos)
    {
        $this->jogos = $jogos;
    }

    public function getJogos()
    {
        return $this->jogos;
    }

    private function getDezenas(){
        return array_rand(range(1, 60), $this->getQuantidadeDezenas());
    }

    public function setJogosDezenas(){
        $listaDezenas = array();
        for($i = 0; $i < $this->getTotalJogos(); $i++){
            array_push($listaDezenas, $this->getDezenas());
        }
        $this->setJogos($listaDezenas);
    }

    public function sorteiaResultado(){
        $this->setResultado($this->getDezenas());
    }

    public function getJogoHtml(){
        $this->setJogosDezenas();
        $this->sorteiaResultado();
        $html = '<table><thead><tr><th colspan='.$this->getQuantidadeDezenas().'>Jogos</th><th>Acertos</th></tr></thead><tbody>';
        foreach ($this->getJogos() as $jogos) {
            $html .= '<tr>';
            foreach ($jogos as $dezena) {
                $html .= '<td>'.$dezena.'</td>';
            }
            $html .= '<td>'.count(array_intersect($jogos, $this->getResultado())).'</td></tr>';
        }
        $html .= '</tbody></table>';
        return $html;
    }
}

?>