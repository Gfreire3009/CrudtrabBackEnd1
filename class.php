// projeto em desenvolvimento
// desenvolvido com base em cursos...



<?php
date_default_timezone_get('America/Sao_Paulo');


abstract class BancoDados{
  
   const host = 'localhost';
   const dbname =  'crud_trab';
   const user = 'root';
   const password = '';

   stat function conectar() {
    try {
        $pdo = new PDO("mysql: 
        host=".self::host.";
        dbname=".self::dbname.";
        charset=utf8",
        self::user,
        self::password );
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
        
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
   }

}
 abstract class CadastroPets {
     static function cadastro ($nome, $email, $pet, $cor, $raça $idade, $Obs);{
         try {
           $conexao = BancoDados::conectar();
           $inserir = $conexao->prepare('INSERT INTO cadastro (nome, email, pet, cor, raca, idade, Obs) VALUES(:nome, :emial, :email, :pet, :cor, :raça, :idade, :Obs )');
           $inserir->binValue(":nome", $nome);
           $inserir->binValue(":email", $email);
           $inserir->binValue(":pet", $pet);
           $inserir->binValue("cor", $cor);
           $inserir->binValue(":raca", $raca);
           $inserir->binValue(":idade", $idade);
           $inserir->binValue(":Obs", $Obs);
            $inserir-> execute();
            return  $inserir; 

         } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
     }
 }

 abstract class Lista {
     static function Pets(){
     try {
         $conexao = BancoDados::conectar();
         $lista = $conexao->prepare(SELECT * FROM `cadastro`);
         $lista->execute();
         $lista = $lista->fetchAll(PDO::FETCH_OBJ);
        return list;
     } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
     }
 }

abstract class  Ateracao{
    static function Animal( $id,$pet, $cor, $raça,$idade, $Obs){

        try {
            $conexao = BancoDados::conectar();

            $altera = $conexao -> prepare("UPDATE cadastro SET id = :id, pet = :pet, cor= :cor, idade = :idade, Obs= :Obs WHERE id = :id");
            $altera->binValue(":id", $id);
            $altera->binValue(":pet", $pet);
            $altera->binValue("cor", $cor);
            $altera->binValue(":raca", $raca);
            $altera->binValue(":idade", $idade);
            $altera->binValue(":Obs", $Obs);
            $altera-> execute();
              
            return  $altera; 

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }

    }
    
}


abstract class  Delete{
    static function Animal( $id){

        try {
            $conexao = BancoDados::conectar();
            $delete = $conexao->prepare('DELETE FROM cadastro WHERE id =:id');
            $delete->binValue(":id", $id);
            $delete->execute();
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
}

