<?php 

require_once 'models/Aluno.php';


class AlunoDaoMysql implements AlunoDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    
    public function add(Aluno $a){

        $sql = $this->pdo->prepare("INSERT INTO alunos(nome, email, telefone, datanascimento, modalidade, datainicio, mensalidade) VALUES (:nome, :email, :telefone, :datanascimento, :modalidade, :datainicio, :mensalidade)");

        $sql->bindValue(':nome', $a->getNome());
        $sql->bindValue(':email', $a->getEmail());
        $sql->bindValue(':telefone', $a->getTelefone());
        $sql->bindValue(':datanascimento', $a->getDatanascimento());
        $sql->bindValue(':modalidade', $a->getModalidade());
        $sql->bindValue(':datainicio', $a->getDatainicio());
        $sql->bindValue(':mensalidade', $a->getMensalidade());
        $sql->execute();


        $a->setId( $this->pdo->lastInsertId() );
        return $a;

    }

    public function findAll(){
        $array = [];
        
        $sql = $this->pdo->query("SELECT * FROM alunos");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $a = new Aluno();
                $a->setId($item['id']);
                $a->setNome($item['nome']);
                $a->setEmail($item['email']);
                $a->setTelefone($item['telefone']);
                $a->setDatanascimento($item['datanascimento']);
                $a->setModalidade($item['modalidade']);
                $a->setDatainicio($item['datainicio']);
                $a->setMensalidade($item['mensalidade']);

                $array[] = $a;
            }
        }

        return $array;
    }

    public function findById($id){

        $sql = $this->pdo->prepare("SELECT * FROM alunos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $a = new Aluno();
            $a->setId($data['id']);
            $a->setNome($data['nome']);
            $a->setEmail($data['email']);
            $a->setTelefone($data['telefone']);
            $a->setDatanascimento($data['datanascimento']);
            $a->setModalidade($data['modalidade']);
            $a->setDatainicio($data['datainicio']);
            $a->setMensalidade($data['mensalidade']);

            return $a;
        }else{
            return false;
        }   
    }

    public function findByEmail($email){
        
        $sql = $this->pdo->prepare("SELECT * FROM alunos WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $a = new Aluno();
            $a->setNome($data['nome']);
            $a->setEmail($data['email']);
            $a->setTelefone($data['telefone']);
            $a->setDatanascimento($data['datanascimento']);
            $a->setModalidade($data['modalidade']);
            $a->setDatainicio($data['datainicio']);
            $a->setMensalidade($data['mensalidade']);

            return $a;
        }else{
            return false;
        }
    }

    public function update(Aluno $a){

        
        $sql = $this->pdo->prepare("UPDATE alunos SET nome = :nome, email = :email, telefone = :telefone, datanascimento = :datanascimento, modalidade = :modalidade, datainicio = :datainicio, mensalidade = :mensalidade WHERE id = :id");
        $sql->bindValue(':nome', $a->getNome());
        $sql->bindValue(':email', $a->getEmail());
        $sql->bindValue(':telefone', $a->getTelefone());
        $sql->bindValue(':datanascimento', $a->getDatanascimento());
        $sql->bindValue(':modalidade', $a->getModalidade());
        $sql->bindValue(':datainicio', $a->getDatainicio());
        $sql->bindValue(':mensalidade', $a->getMensalidade());
        $sql->bindValue(':id', $a->getId());
        $sql->execute();

        return true;

    }

    public function delete($id){

        $sql = $this->pdo->prepare("DELETE FROM alunos WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();

    }
}