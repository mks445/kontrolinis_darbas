<!DOCTYPE html>
<html>
<head>
    <title>Contact form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
            integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'message.php'; ?>

<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
<div class="container">
    <?php
    $mysqli = new mysqli('localhost', 'root', 'password', 'kontrolinis') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM contact_form") or die($mysqli->error);

    ?>



    <div class="row justify-content-center">
        <form action="message.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="<?php echo $name; ?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname"
                       value="<?php echo $surname; ?>" class="form-control" placeholder="Enter your surname">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email"
                       value="<?php echo $email; ?>" class="form-control" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone"
                       value="<?php echo $phone; ?>" class="form-control" placeholder="Enter your phone">
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject"
                       value="<?php echo $subject; ?>" class="form-control" placeholder="Subject">
            </div>

            <div class="form-group">
                <label>Message</label>
                <input type="text" name="message"
                       value="<?php echo $message; ?>" class="form-control" placeholder="Enter message">
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-primary" name="save">Save</button>

            </div>
        </form>
    </div>
</div>
</body>