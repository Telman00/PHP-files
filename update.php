<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boya";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

function update($table,$where=[],$data){
    global $conn;

    $sql = "UPDATE $table SET name = :name, password = :password";

    foreach($data as $tokensKey=>$tokenValue){
$tokens[]= $tokenKey = :$tokenKey; 
    }



    $whereSql = '';

    foreach($where as $key => $val){
        $a.= "$key='$val',";
    }
    $sql.="WHERE whereSql";
    return $sql;  
}

$data = [
    'name' => 'test1',
    'password'=>'test1',
];
echo update('users',['id'=>1],$data);

 


















?>