<?php

interface ValidatorInterface
{
    public function passes($value);
    public function messages($field);
}

class RequiredValidator implements ValidatorInterface
{
    public function passes($value)
    {
        $value = trim($value);
        return strlen($value) > 0;
    }

    public function messages($field)
    {
        return strtoupper($field) . " field is required!";
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

    public function messages($field)
    {
        return strtoupper($field) . " minimum length $this->params characters!";
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
        return strlen($value) <= $this->params;
    }

    public function messages($field)
    {
        return strtoupper($field) . " maximum length $this->params characters!";
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
        $sql = "SELECT $this->column FROM $this->table WHERE $this->column = :value";
        $run = $this->dbConnection->prepare($sql);
        $run->bindParam(':value', $value);
        $run->execute();
        return $run->rowCount() === 0; 
    }

    public function messages($field)
    {
        return strtoupper($field) . " value already exists!";
    }
}

class IntegerValidator implements ValidatorInterface
{
    public function passes($value)
    {    
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function messages($field)
    {
        return strtoupper($field) . " tam ədəd olmalıdır!";
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
                [$validatorName, $params] = explode(':', $validator) + [1 => null];
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
