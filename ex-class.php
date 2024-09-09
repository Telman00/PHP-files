<?php
require_once './exists.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $rules = [
        'name' => ['required', 'min:5', 'max:50'],
        'surname' => ['required', 'min:5', 'max:10'],
        'age' => ['required', 'integer'],
        'email' => ['required', 'email', 'unique:users,email'],
        'username' => ['required', 'exists:users,username'],
        'gender' => ['required', 'in:1,2']
    ];

    Validator::make($data, $rules);

    if (Validator::fails()) {
        $errors = Validator::errors();
    } else {
        
        echo "Form məlumatları uğurla daxil edildi.";
        
    }
}
?>
