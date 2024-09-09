<?php
$where = [
    [
        
    'id','>', 5,'OR'
    ], 

    ];
 



function delete ($table,$where)
{

 try{
    $host = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new PDO ("mysql:host;dbname=$dbname",$username,$password);
$sql = "DELETE  FROM  currencies  WHERE  ";
$subSQL = "";
$tokes = [];

if(count($where)<2 and isset($where[0][3])){
unset($where[0][3]);
}
foreach ($where as $wk=>$whereQuery) {
    if(is_array($whereQuery)){
        foreach($whereQuery as $key=>$detailQuery){
             if($key!=2){
                 
                 $subSQL.=' '. $detailQuery;
             }
             else{
                $subSQL.= ' :'. $whereQuery[0].$wk;
                $tokes[$whereQuery[0].$wk] = $detailQuery;
             }
        }
    }
}
$sql.=$subSQL;
$stmt = $conn->prepare($sql);
$stmt -> execute($tokes);

// return true;
 
}catch(PDOException $e){
    print_r($e->getMessage());
   
 }   

}

print_r(delete('currencies', $where));




?>