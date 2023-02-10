<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/expert/expertLoginReg.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>
    <!-- Translation file -->
    <script  src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <?php setcookie("currentPage","register", time()+36000, "/");?>

    <title> Expert Registration</title>
</head>
<body>
    <div class="centering">
        <div class="card">
            <h1 class="one" >Register</h1>
            <p class="two">Register here if you don't have an account yet</p>
            <?php if(isset($validation)):?>
                <div class="errorMessage">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/RegistrationController/storeTeacher" method="post">
                <input id ="firstname" type="text" name="firstname" placeholder="Firstname" value="<?= set_value('name') ?>" required>
                <input id ="lastname" type="text" name="lastname" placeholder="Surname" value="<?= set_value('name') ?>" required >
                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                <input id ="password" type="password" name="password" placeholder="Password" required>
                <input id ="confirmpassword" type="password" name="confirmpassword" placeholder="Confirm Password" required >

                <button type="submit" class="button buttonPrimary buttonExpert three">REGISTER</button>
            </form>

            <button type="button" id="backToLogin" class="button buttonSecondary buttonExpert four" onclick="window.location= '<?=base_url()?>/registration/expertLogin'">BACK TO LOGIN</button>
        </div>

        <div class="langWrap menuSubHeader language" >
            <a id="<?php if(isset($_COOKIE["nederlandsActief"])) echo $_COOKIE["nederlandsActief"];?>" href="#" data-language="nederlands" class="active">NED</a> |
            <a id="<?php if(isset($_COOKIE["englishActive"]))echo $_COOKIE["englishActive"];?>" href="#" data-language="english" >ENG</a>
        </div>
    </div>
    <img src="/public/assets/general/typwind_logo_white.svg" alt="Typwind Logo" class="logo">
</body>
</html>