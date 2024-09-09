<?php

// public $user; // property

// public function getUser() 
// {} //method

class User{

    public $firstName;
    public $lastName;
    
    
    
    public function __construct($firstName,$lastName)
    {
        $this->firstName = strtoupper($firstName);
        $this->lastName = strtoupper($lastName);
    
    }
    
    public function sayHello($firstName=null)
    {
       if(!is_null($firstName)){
        $this->firstName = strtoupper($firstName);
       }
    
    return 'Xos gelmisen: ' . $this->firstName . ' ' . $this->lastName;
    }
    
    // public function getName()
    // {
    // return $this->firstName.' '.$this->lastName;
    // }
     // method to get the full name
    
    }
    
    $user = new User('telman','abidov'); 
    
    echo $user->sayHello('urfan');
    // echo $user->getName();

    //------------------------------------------------------------------------//

?>


<?php


class User{

    public $firstName;
    protected $lastName;
    protected $role;
    private $age;
    
    public function __construct($firstName,$lastName,$role)
    {
        $this->firstName = strtoupper($firstName);
        $this->lastName = strtoupper($lastName);
        $this->role = strtoupper($role);
        $this->age = 20;
    
    }
    
   public function getLastName(){
   $a = 'Age: '.$this->age.'Adi :'.$this->lastName;
    return $a;
   }
   
   public function getName(){
    
    return $this->firstName;
   
    }
    protected function getUSERAge(){
    
    return $this->age;
   
    }
}
    
class Admin extends User {

    public function getRole(){
        return $this->role;
    }
    public function getAge(){
    
        return $this->getUSERAge();
       
        }

}

    $user = new Admin('telman','abidov','admin'); 
    
    echo $user->getAge();
//------------------------------------------------------------------------------------------//
?>


<?php


class User{

    public function createOrder($amount,$userId)
     $array = [];
     $res = $this->sendResponsive($array);
    $this->saveDb($res);
    $this->callBackPayment();
    {


    }
    private function sendResponsive($data){
        // sorgu kapital atacaq
    }

    private function saveDb(){

    }
    private function callBackPayment(){
       
}

}

$payment = (new Payment())->createOrder(100,10);

//------------------------------------------------------------------------------------------//
?>

<?php

class Database {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;
    public $mainSql;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->connectDB();
    }

    private function connectDB() {
        try {
           
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function select($table,$columns = []) {
   $column = '*';
        if(count($columns)>0){
    $column = implode(',',$columns);
   }
   
        $this->mainSql = "SELECT $column FROM $table";
        return $this;

    }


    public function limit($limit){
        $this->mainSql.= " LIMIT $limit";
        return $this;
    }



    public function getSql(){
        return $this->mainSql;
    }

    public function get(){
       $stmt = $this->connection->prepare($this->mainSql);
       $stmt->execute();
       return $data->fetchAll();

    }
}





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boya"; 

$db = new Database($servername, $dbname, $username, $password);

$users = $db->select('users')->limit(10)->getSql()->get();


?>