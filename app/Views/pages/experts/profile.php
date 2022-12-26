<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <h1>My Profile</h1>
    <div class="center">
        <div class="roundProfilePic">
            <img src="/public/assets/avatars/teacher.svg" alt="User Icon">
        </div>
        <h2>
            <?php $session = session();
            echo $session->firstname; echo " "; echo $session->lastname;?>
        </h2>
        <h3>General Information</h3>
        <p>
            <b>First name:</b>&nbsp&nbsp&nbsp<?php echo $session->firstname;?><br>
            <b>Surname:</b>&nbsp&nbsp&nbsp<?php echo $session->lastname;?><br>
            <b>Email:</b>&nbsp&nbsp&nbsp<?php echo $session->email;?><br>

            <?php if (session()->isActive==1):?>
                <b>Active:</b>&nbsp&nbsp&nbspCurrently active
            <?php endif;?>

            <?php if (session()->isActive==0):?>
                <b>Active:</b>&nbsp&nbsp&nbspCurrently not active
            <?php endif;?>
        </p>
    </div>

    <div class="bottomBar">
        <a href="<?php echo base_url('experts/editProfilePage/'.session()->id);?>">
            <button class="button buttonPrimary buttonExpert">EDIT</button>
        </a>
    </div>

<?= $this->endSection() ?>