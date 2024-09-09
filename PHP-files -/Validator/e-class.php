<?php
require_once './email.php';

if (isset($_POST) && count($_POST) > 0) {
    $data = $_POST;
    $rules = [
        'email' => ['required', 'email']
       
    ];

    Validator::make($data, $rules);
    if (Validator::fails()) {
        $errors = Validator::errors();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>" name="name" aria-describedby="name">
                <?php if (isset($errors['name'])): ?>
                    <?php foreach ($errors['name'] as $error): ?>
                        <small id="nameHelp" class="form-text text-muted"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></small>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="surname">Last Name</label>
                <input type="text" class="form-control" id="surname" value="<?php echo htmlspecialchars($_POST['surname'] ?? '', ENT_QUOTES); ?>" name="surname" aria-describedby="surname">
                <?php if (isset($errors['surname'])): ?>
                    <?php foreach ($errors['surname'] as $error): ?>
                        <small id="surnameHelp" class="form-text text-muted"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></small>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" name="username" aria-describedby="username">
                <?php if (isset($errors['username'])): ?>
                    <?php foreach ($errors['username'] as $error): ?>
                        <small id="usernameHelp" class="form-text text-muted"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></small>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <?php if(isset($errors['email'])): ?>
        <small class="form-text text-muted"><?php echo implode('<br>', $errors['email']); ?></small>
    <?php endif; ?>
</div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" value="<?php echo htmlspecialchars($_POST['age'] ?? '', ENT_QUOTES); ?>" name="age" aria-describedby="age">
                <?php if (isset($errors['age'])): ?>
                    <?php foreach ($errors['age'] as $error): ?>
                        <small id="ageHelp" class="form-text text-muted"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></small>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

