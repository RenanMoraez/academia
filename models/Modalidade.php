<?php 


class Modalidade{
    private $id;
    private $nome;



    public function getId(){
        return $this->id;
    }

    public function setId($i){
        $this->id = trim($i);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }
}
    
interface ModalidadeDAO{

    public function add(Modalidade $m);
    public function findAll();
    public function findById($id);
    public function update(Modalidade $m);
    public function delete($id);
}