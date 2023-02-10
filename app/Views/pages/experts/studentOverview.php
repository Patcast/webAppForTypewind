<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertStudent", time()+36000, "/");?>

<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/studentsList');?>" class="one">Students</a></li>
            <li><?=$person->firstname?> <?=$person->lastname?></li>
        </ul>

        <h1><?=$person->firstname?> <?=$person->lastname?></h1>

        <div class="scroller">
            <div class="studentContainer">
                <div class="roundProfilePic">
                    <?php
                    $idOfSelectedAvatar=1;
                    if (!empty($avatars)):
                        foreach ($avatars as $avatar):
                            if($person->idStudents==$avatar->idStudentFk && $avatar->selected):
                                $idOfSelectedAvatar=$avatar->idAvatarFk;
                                break;
                            endif;
                        endforeach;
                    endif;?>
                    <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
                </div>
                <?php if ($person->handSelection==1):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==2):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==0):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">
                <?php endif;?>

                <div class="infoContainer">
                    <div class="general">
                        <h3 class="one2">General Information</h3>
                        <p>
                            <b class="two">First name:</b>&nbsp;&nbsp;<?= $person->firstname?><br>
                            <b class="three">Surname:</b>&nbsp;&nbsp;<?= $person->lastname?><br>
                            <b class="four">Email:</b>&nbsp;&nbsp;<?= $person->email?><br>
                            <b class="five">Gender:</b>&nbsp;&nbsp;
                            <?php if ($person->gender==1):?>
                                <span class="six">Male</span>
                            <?php endif;?>
                            <?php if ($person->gender==0):?>
                                <span class="seven">Female</span>
                            <?php endif;?>
                            <br>
                            <b class="eight">Birthday:</b>&nbsp;&nbsp;<?= $person->birthday?><br>
                            <b class="nine">Teacher:</b>&nbsp;&nbsp;<?= $person->teacherFirstname?><br>
                            <b class="ten">Hand Selection:</b>&nbsp;&nbsp;
                            <?php if ($person->handSelection==1):?>
                                <span class="eleven">Right Hand</span>
                            <?php endif;?>
                            <?php if ($person->handSelection==2):?>
                            <span class="twelve">Left Hand</span>
                            <?php endif;?>
                            <?php if ($person->handSelection==0):?>
                                <span class="thirteen">Both Hands</span>
                            <?php endif;?>
                            <br>
                            <b class="fourteen">Active:</b>&nbsp;&nbsp;
                            <?php if ($person->isActive==1):?>
                            <span class="fifteen">Currently active and following the Typwind course</span>
                            <?php endif;?>
                            <?php if ($person->isActive==0):?>
                                <span class="sixteen">Not active, stopped following the Typwind course</span>
                            <?php endif;?>
                            <br>
                        </p>
                    </div>

                    <?php if($person->notes == null || $person->notes == ""):?>
                        <div class="notes">
                            <h3>Notes</h3>
                            <span class="noNotes seventeen">This student does not have any notes.</span>
                        </div>
                    <?php else:?>
                        <div class="notes">
                            <h3 class="eighteen">Notes</h3>
                            <p class="noteText"><?=$person->notes ?></p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <div class="bottomBar space">
                <button onclick= 'document.location.href= "<?php echo base_url('experts/studentsList');?>"' class="button buttonSecondary buttonExpert nineteen">BACK</button>
                <button onclick= 'document.location.href= "<?php echo base_url('experts/editStudentPage/'.$person->idStudents);?>"' class="button buttonPrimary buttonExpert twenty">EDIT</button>
        </div>

    <?php endif;?>
<?php endforeach;?>

<?= $this->endSection() ?>



