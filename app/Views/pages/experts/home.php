<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertHome", time()+36000, "/");?>

    <div class="user">
        <div class="roundProfilePic">
            <img src="/public/assets/avatars/teacher.svg" alt="User Icon">
        </div>
        <h1 class="one">Welcome Back,</h1>
        <p>
            <?php
            $session = session();
            echo $session->firstname; echo " "; echo $session->lastname . "<br>"
            ?>

        </p>
    </div>

<?= $this->endSection() ?>
