<?php
require_once './Validator.php';

if (isset($_POST) && count($_POST) > 0) {
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
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($data['name'] ?? '', ENT_QUOTES); ?>">
                <?php if (isset($errors['name'])) { ?>
                    <small id="nameHelp" class="form-text text-muted"><?php echo implode(', ', $errors['name']); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="surname">Last Name</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo htmlspecialchars($data['surname'] ?? '', ENT_QUOTES); ?>">
                <?php if (isset($errors['surname'])) { ?>
                    <small id="surnameHelp" class="form-text text-muted"><?php echo implode(', ', $errors['surname']); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($data['username'] ?? '', ENT_QUOTES); ?>">
                <?php if (isset($errors['username'])) { ?>
                    <small id="usernameHelp" class="form-text text-muted"><?php echo implode(', ', $errors['username']); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email'] ?? '', ENT_QUOTES); ?>">
                <?php if (isset($errors['email'])) { ?>
                    <small id="emailHelp" class="form-text text-muted"><?php echo implode(', ', $errors['email']); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($data['age'] ?? '', ENT_QUOTES); ?>">
                <?php if (isset($errors['age'])) { ?>
                    <small id="ageHelp" class="form-text text-muted"><?php echo implode(', ', $errors['age']); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="1" <?php echo (isset($data['gender']) && $data['gender'] == '1') ? 'selected' : ''; ?>>Male</option>
                    <option value="2" <?php echo (isset($data['gender']) && $data['gender'] == '2') ? 'selected' : ''; ?>>Female</option>
                </select>
                <?php if (isset($errors['gender'])) { ?>
                    <small id="genderHelp" class="form-text text-muted"><?php echo implode(', ', $errors['gender']); ?></small>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
