<?php
class database {
    private $pdo;
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname ="CSI400";

    public $empno;
    public $ename;
    public $sal;
    /**
    * Class constructor.
    */
    public function __construct()
    {
        //mysql connect db
        $dsn = "mysql:host=$this->host; dbname=$this->dbname;";
        $conn = new PDO($dsn,$this->username,$this->password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $conn;
    }

    public function showAll(){
        $sql = "select * from emp";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute()){
            $data = $stmt->fetchAll();
            return $data;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function search(){
        $sql = "select * from emp where empno = ".$this->empno." ";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute()){
            $data = $stmt->fetchAll();
            return $data;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function insert(){
        $sql = "INSERT INTO EMP(empno, ename, sal) Values(:empno, :ename, :sal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":empno", $this->empno);
        $stmt->bindParam(":ename", $this->ename);
        $stmt->bindParam(":sal", $this->sal);
        if($stmt->execute()){
            return true;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function update(){
        $sql = "UPDATE emp set ename=:ename , sal=:sal WHERE empno=:empno ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":ename", $this->ename);
        $stmt->bindParam(":sal", $this->sal);
        $stmt->bindParam(":empno", $this->empno);
        if($stmt->execute()){
            return true;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function delete(){
        $sql = "DELETE FROM EMP WHERE empno = :empno ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":empno", $this->empno);
        if($stmt->execute()){
            return true;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
}
?>