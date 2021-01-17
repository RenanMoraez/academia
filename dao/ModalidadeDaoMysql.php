<?php 

require_once 'models/Modalidade.php';


class ModalidadeDaoMysql implements ModalidadeDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    
    public function add(Modalidade $m){

        $sql = $this->pdo->prepare("INSERT INTO modalidade (nome) VALUES (:nome)");
        $sql->bindValue(':nome', $m->getNome());
        $sql->execute();


        $m->setId( $this->pdo->lastInsertId() );
        return $m;

    }

    public function findAll(){
        $array = [];
        
        $sql = $this->pdo->query("SELECT * FROM modalidade");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $m = new Modalidade();
                $m->setId($item['id']);
                $m->setNome($item['nome']);
                $array[] = $m;
            }
        }

        return $array;
    }

    public function findById($id){

        $sql = $this->pdo->prepare("SELECT * FROM modalidade WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $m = new Modalidade();
            $m->setId($data['id']);
            $m->setNome($data['nome']);
            return $m;

        }else{
            return false;
        }   
    }


    public function findByNome($nome){

                
        $sql = $this->pdo->prepare("SELECT * FROM modalidade WHERE nome = :nome");
        $sql->bindValue(':nome', $nome);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $m = new Modalidade();
            $m->setNome($data['nome']);


            return $m;
        }else{
            return false;
        }

    }

    public function update(Modalidade $m){

        
        $sql = $this->pdo->prepare("UPDATE modalidade SET nome = :nome WHERE id = :id");
        $sql->bindValue(':nome', $m->getNome());
        $sql->bindValue(':id', $m->getId());
        $sql->execute();

        return true;

    }

    public function delete($id){

        $sql = $this->pdo->prepare("DELETE FROM modalidade WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();

    }
}