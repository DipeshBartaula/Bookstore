<?php
setcookie('username',$_POST['username']);
$submitted = !empty($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
</head>
<body>
<?php if ($submitted): ?>
    <p>Your login info is</p>
    <ul>
        <li><b>username</b>: <?php echo $_POST['username']; ?></li>
        <li><b>password</b>: <?php echo $_POST['password']; ?></li>
    </ul>
 <?php else: ?>
    <p>You did not submit anything.</p>
 <?php endif; ?>
</body>
</html>