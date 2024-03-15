<?php
class database {
    private $pdo;
    private $host;
    private $username;
    private $password;
    private $dbname;

    public $empno;
    public $ename;
    public $sal;
    /**
    * Class constructor.
    */
    public function __construct()
    {
        // $conn = new PDO('mtsql:host = ;dbname= ; ')
        $conn = new PDO("sqlsrv:Server=localhost\LAB5SQL2019;Database=CSI206_65039089E", "sa", "123456789");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $conn;
    }

    public function read(){
        $sql = "select * from emp";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute()){
            $data = $stmt->fetchAll();
            return $data;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function read_condition(){
        $sql = "select * from emp where ename ='".$this->ename."'";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute()){
            $data = $stmt->fetchAll();
            return $data;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function insert(){
        $sql = "INSERT into emp(empno, ename, sal) Values(".$this->empno.",'".$this->ename."',".$this->sal.")";
        $stmt = $this->pdo->prepare($sql);
        // echo $sql;
        if($stmt->execute()){
            // $data = $stmt->fetchAll();
            return true;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function update(){
        $sql = "UPDATE emp set ename= '".$this->ename."', sal=".$this->sal." WHERE empno=".$this->empno." ";
        $stmt = $this->pdo->prepare($sql);
        // echo $sql;
        if($stmt->execute()){
            // $data = $stmt->fetchAll();
            return true;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
    public function delete(){
        $sql = "DELETE emp where empno=".$this->empno." ";
        $stmt = $this->pdo->prepare($sql);
        // echo $sql;
        if($stmt->execute()){
            // $data = $stmt->fetchAll();
            return true;
        }
        printf("Error : %s.\n", $stmt->error);
        return null;
    }
}
?>