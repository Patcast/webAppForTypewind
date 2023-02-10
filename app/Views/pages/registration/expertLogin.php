<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/expert/expertLoginReg.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>
    <!-- Translation file -->
    <script  src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <?php setcookie("currentPage","expertLogin", time()+36000, "/");?>

    <title >Login with email</title>
</head>

<body>
    <div class="centering">
        <div class="card">
            <?php $session=session();
            $session->set('isLoggedIn',False);
            ?>
            <h1>Login</h1>
            <p class="one">Please log in with your email</p>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="errorMessage">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <form action="<?php echo base_url(); ?>/RegistrationController/loginExpert" method="post">
                <input type="email" name="email" placeholder="Email" value="<?php if (isset($_COOKIE["expertEmail"])) echo $_COOKIE["expertEmail"]; ?>" required>
                <input id="JSPass" type="password" name="password" placeholder="Password" value="">
                <button type="submit" class="button buttonPrimary buttonExpert">LOGIN</button>
            </form>
            <button id="REGISTER" onclick="window.location= '<?=base_url()?>/registration/register'" class="button buttonSecondary buttonExpert two">REGISTER</button>
        </div>

        <div class="langWrap menuSubHeader language" >
            <a id="<?php if(isset($_COOKIE['nederlandsActief'])) echo $_COOKIE["nederlandsActief"];?>" href="#" data-language="nederlands" class="active">NED</a> |
            <a id="<?php if(isset($_COOKIE["englishActive"]))echo $_COOKIE["englishActive"];?>" href="#" data-language="english" >ENG</a>
        </div>
    </div>
    <img src="/public/assets/general/typwind_logo_white.svg" alt="Typwind Logo" class="logo">
</body>
</html>