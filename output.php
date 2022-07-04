<!DOCTYPE html>
<head>
    <title>PHP CRUD</title>

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
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a href="message.php?delete=<?php echo $row['id']; ?>"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>


</body>