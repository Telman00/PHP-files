<?php

interface ValidatorInterface
{
    public function passes($value);
    public function messages($field);
}

class ReqiredValidator implements ValidatorInterface
{
    public function passes($value)
    {
        $value= trim($value);
        return strlen($value) >1;
    }

    public function messages($filed)
    {
        return strtoupper($filed)." Field is required !";
    }
}

class MinValidator implements ValidatorInterface
{
    public $params;
    public function __construct($params)
    {
        $this->params = $params;
    }

    public function passes($value)
    {
        
        return strlen($value) >= $this->params;
    }

    public function messages($filed)
    {
        return strtoupper($filed)." Minimum Uzunluq $this->params Olmalıdır !";
    }
}

class MaxValidator implements ValidatorInterface
{
    public $params;
    public function __construct($params)
    {
        $this->params = $params;
    }

    public function passes($value)
    {
       
        return strlen($value) <= $this->params;;
    }

    public function messages($filed)
    {
        return strtoupper($filed)." Maksimum Uzunluq $this->params Olmalıdır !";
    }
}

class UniqueValidator implements ValidatorInterface
{
    public $params;
    public $dbConnection;
    public $table;
    public $column;
    public function __construct($params)
    {

        $params = explode(',', $params);

        [$this->table, $this->column] = $params;
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
       
        $sql = "SELECT $this->column FROM $this->table WHERE $this->column  = '$value'";
        $run = $this->dbConnection->prepare($sql);
        $run->execute();
        return !is_array($run->fetch(PDO::FETCH_ASSOC));
    }

    public function messages($filed)
    {
        return strtoupper($filed)." Deyer Movcuddur !";
    }
}


class Validator
{
    private static $errors = [];

    public static function make($data, $rules)
    {
        self::$errors = [];
        foreach ($rules as $field => $validators) {
            foreach ($validators as $validator) {
                $params = null;
                if (strpos($validator, ':') !== false) {
                    list($validatorName, $params) = explode(':', $validator, 2);
                } else {
                    $validatorName = $validator;
                }

                $validatorClass = ucfirst($validatorName) . 'Validator';
                if (class_exists($validatorClass)) {
                    $validatorInstance = new $validatorClass($params);
                    if (!$validatorInstance->passes($data[$field] ?? '')) {
                        self::$errors[$field][] = $validatorInstance->messages($field);
                    }
                }
            }
        }
    }

    public static function fails()
    {
        return !empty(self::$errors);
    }

    public static function errors()
    {
        return self::$errors;
    }
}




?>