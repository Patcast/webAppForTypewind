<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertEditProfile", time()+36000, "/");?>

    <h1 class="one">My Profile</h1>
    <div class="center">
        <div class="user">
            <div class="roundProfilePic">
                <img src="/public/assets/avatars/teacher.svg" alt="User Icon">
            </div>
            <h2>
                <?php $session = session();
                echo $session->firstname; echo " "; echo $session->lastname;?>
            </h2>
        </div>
        <?php if(isset(session()->validation)):?>
            <div class="errorMessage">
                <p>
                    <?= session()->validation->listErrors() ?>
                </p>
            </div>
        <?php endif;?>
        <h3 class="two">General Information</h3>
        <form action="<?php echo base_url('ExpertController/storeProfile');?>" method="post">
            <!-- <input type="hidden" id="password" name="password" value="<?$person->password?>"> -->

            <div class="field">
                <label class="three" for="firstname">First name:</label><br>
                <input type="text" id="firstname" name="firstname" value="<?=session()->firstname?>" ><br>
                <label class="four" for="lastname">Surname:</label><br>
                <input type="text" id="lastname" name="lastname" value="<?=session()->lastname?>" ><br>
                <label class="five" for="email">Email:</label><br>
                <input type="text" id="email" name="email" value="<?=session()->email?>" ><br>
                <label class="six" for="active">Active</label>

                <label class="switch">
                    <?php if (session()->isActive==1):?>
                        <input type="checkbox" id="active" name="active" value="1" checked>
                    <?php else:?>
                        <input type="checkbox" id="active" name="active">
                    <?php endif;?>
                    <span class="slider"></span>
                </label>
            </div>
            <div class="bottomBar space">
                <button type="button" onclick='document.location.href="<?php echo base_url('experts/profile');?>"' class="button buttonSecondary buttonExpert">BACK</button>
                <input id="seven" class="button buttonPrimary buttonExpert" type="submit" value="Save">
            </div>
        </form>

    </div>
<?php session()->remove("validation") ?>

<?= $this->endSection() ?>