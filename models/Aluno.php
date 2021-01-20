<?php 


class Aluno{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $datanascimento;
    private $modalidade;
    private $datainicio;
    private $mensalidade;
    private $vencimento;


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
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e){
        $this->email = strtolower(trim($e));
    }
    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($t){
        $this->telefone = trim($t);
    }
    public function getDatanascimento(){
        return $this->datanascimento;
    }

    public function setDatanascimento($d){
        $this->datanascimento =trim($d);  
    }
    public function getModalidade(){
        return $this->modalidade;
    }

    public function setModalidade($m){
        $this->modalidade = trim($m);
    }
    public function getDatainicio(){
        return $this->datainicio;
    }

    public function setDatainicio($di){
        $this->datainicio = trim($di);  
    }
    public function getMensalidade(){
        return $this->mensalidade;
    }

    public function setMensalidade($mm){
        $this->mensalidade = trim($mm);
    }

    public function getVencimento(){
        return $this->vencimento;
    }

    public function setVencimento($v){
        $this->vencimento = $v;
    }



}
    
interface AlunoDAO{

    public function add(Aluno $a);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Aluno $a);
    public function delete($id);
    public function vencimento();

}