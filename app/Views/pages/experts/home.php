<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <div class="user">
        <div class="roundProfilePic">
            <img src="/public/assets/avatars/teacher.svg" alt="User Icon">
        </div>
        <h1>Welcome Back,</h1>
        <p>
            <?php
            $session = session();
            echo $session->firstname; echo " "; echo $session->lastname . "<br>"
            ?>

        </p>
    </div>

<?= $this->endSection() ?>
