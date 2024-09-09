<?php

 
$file=($_FILES['file']);

uploadFile($file);


function uploadFile($file){

for ($i=0; $i < count($file['name']) ; $i++) { 
   


    $name = $file['name'][$i];

$ext = explode('.',$name);

if(count($ext)>0){
    $ext = $ext[count($ext)-1];
}
echo $ext.'<br>';
$accessExt = ['png','jpg','jpeg','webp'];
if(!in_array($ext,$accessExt)){
    die('Icaze Yoxdur');
}


$name = time().'-'.rand(0,999999);

$fullName = './uploads/'.$name.'.'.$ext;

if(move_uploaded_file($file['tmp_name'][$i],$fullName)){
    echo 'Yuklendi';

} 
else{
    echo 'Yuklenen Zaman Xeta Bas Verdi';
}

}
    
}







?>