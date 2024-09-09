<?php
class ExistsValidator implements ValidatorInterface
{
    public $table;
    public $column;
    public $dbConnection;

    public function __construct($params)
    {
        [$this->table, $this->column] = explode(',', $params);
        $this->dbConnection();
    }

    private function dbConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user";

        try {
            $this->dbConnection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function passes($value)
    {
        $sql = "SELECT $this->column FROM $this->table WHERE $this->column = :value";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        return $stmt->rowCount() > 0; 
    }

    public function messages($field)
    {
        return strtoupper($field) . " does not exist in the database!";
    }
}

?>