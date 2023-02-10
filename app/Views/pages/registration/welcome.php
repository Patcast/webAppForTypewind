<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/welcome.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>

    <!-- Translation file -->
    <script  src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <?php if(session()->BaseURL)
        session()->destroy();?>
    <?php setcookie("currentPage","welcome", time()+36000, "/");?>

    <title class="one">Welcome page</title>
</head>
<body>

<div class = "grid-container_welcome">
    <div class="centering">
        <div class = "card_welcome_page">
            <img src="/public/assets/general/typwind_logo.svg" alt="Typwind logo" style="width:13.8125rem;height:4.8125rem;">
            <h1 class="two" style="color:var(--blueNeutral); margin-bottom: 0.9375rem;">Welcomes you!</h1>
            <h3 class="three" style="color:var(--primary-darkest);">Are you a student or a teacher?</h3>

            <div class="teacher_student_buttons">
                <button class="button buttonExpert buttonPrimary four" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" >TEACHER</button>
                <button class="button buttonExpert buttonPrimary five" onclick="window.location= '<?=base_url()?>/registration/studentLogin'" >STUDENT</button>
            </div>
        </div>

        <div class="langWrap menuSubHeader language" >
            <a id="<?php if(isset($_COOKIE["nederlandsActief"]))echo $_COOKIE["nederlandsActief"];?>" href="#" data-language="nederlands" class="active">NED</a> |
            <a id="<?php if(isset($_COOKIE["englishActive"]))echo $_COOKIE["englishActive"];?>" href="#" data-language="english" >ENG</a>
        </div>
    </div>
</div>

</body>
</html>