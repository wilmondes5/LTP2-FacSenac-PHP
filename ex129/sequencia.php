<?php

class Sequencia {
    private $inicio;
    private $fim;

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

    public function exibirTodos () {
        for ($i = $this->inicio; $i <= $this->fim; $i++){
            echo $i."<br>";
        }
    }

    public function exibirPares () {
        for ($i = $this->inicio; $i <= $this->fim; $i++){
            if ($i % 2 == 0){
                echo $i."<br>";
            }
        }
    }
    
    public function exibirImpares () {
        for ($i = $this->inicio; $i <= $this->fim; $i++){
            if ($i % 2 == 1){
                echo $i."<br>";
            }
        }
    }

}

?>