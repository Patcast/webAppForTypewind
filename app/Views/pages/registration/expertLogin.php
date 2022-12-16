<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/expert/expertLogin.css">
    <!-- Google Login Authentication Js -->
    <script type="module" src="<?=base_url()?>/public/js/googleLoginAuth.js" defer></script>

    <title>Login with email</title>
</head>
<body>
    <div class="card">
        <?php $session=session();
        $session->set('isLoggedIn',False);
        ?>
        <h1>Login</h1>
        <p>Please log in with your email</p>
        <?php if(session()->getFlashdata('msg')):?>
            <div>
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>

        <form action="<?php echo base_url(); ?>/RegistrationController/loginExpert" method="post">
            <input id="googleJSOutput" type="email" name="email" placeholder="Email" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"]; ?>" >
            <button type="submit" class="button buttonPrimary buttonExpert">LOGIN</button>
        </form>
        <button id="REGISTER" onclick="window.location= '<?=base_url()?>/registration/register'" class="button buttonSecondary buttonExpert">REGISTER</button>
        ----------------------- OR -----------------------
        <p>Log in With Google</p>
        <button class="social-signin google" id="login">Log in with Google+</button>

    </div>

</body>
</html>