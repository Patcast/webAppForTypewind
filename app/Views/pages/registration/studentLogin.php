<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/kids/login_child.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>
    <!-- Translation file -->
    <script  src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <?php setcookie("currentPage","studentLogin", time()+36000, "/");?>

    <title>Welcome page</title>
</head>
<body>

<div class = "grid-container_login_child">
    <div class="centering">
        <div class="card_login_child">
            <?php $session=session();
            $session->set('isLoggedIn',False);
            ?>
            <div>
                <h1>Login</h1>
                <h2 class ="one" style="color: var(--blueNeutral)">and have fun typing!</h2>
            </div>
            <p class ="two" style="font: var(--bodyText); margin:30px;">Let's get logged in with your email</p>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="errorMessage">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <form action="<?php echo base_url(); ?>/RegistrationController/loginStudent" method="post">
                <input type="email" name="email" placeholder="Email" value="<?php if (isset($_COOKIE["studentEmail"])) echo $_COOKIE["studentEmail"]; ?>" required>

                <div class="continue_w_email_button">
                    <button type="submit" class="button buttonPrimary buttonChild three" style="font: var(--buttonLabel);">continue with my email</button>
                </div>
            </form>
        </div>

        <div class="langWrap menuSubHeader language" >
            <a id="<?php if(isset($_COOKIE["nederlandsActief"])) echo $_COOKIE["nederlandsActief"];?>" href="#" data-language="nederlands" class="active">NED</a> |
            <a id="<?php if(isset($_COOKIE["englishActive"]))echo $_COOKIE["englishActive"];?>" href="#" data-language="english" >ENG</a>
        </div>
    </div>
</div>
<img src="/public/assets/general/typwind_logo_white.svg" alt="Typwind Logo" class="logo">
</body>
</html>

