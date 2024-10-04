<?php require_once 'includes/header.inc.php' ?>
<?php require_once 'includes/redirect_to_dashboard.inc.php' ?>

<div class="wrapper">
    <div class="container">
        <a class="back-btn" href="index.php">Go Home</a>
        <h1>Login</h1>
        <?php if (isset($_SESSION['status_error'])): ?>
            <div class="alert alert-error">
                <?=$_SESSION['status_error']?>
            </div>
        <?php endif;?>
        <form action="actions/login_user.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>

            <label for="password">Password</label>
            <input name="password" type="password" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Login">
        </form>
        <?php clearErrors(); ?>
    </div>
</div>

<?php require_once 'includes/footer.inc.php' ?>