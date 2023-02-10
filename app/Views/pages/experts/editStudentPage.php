<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertEditStudent", time()+36000, "/");?>
<input type="hidden" id="URL" name="URL" value="<?php echo base_url();?>/public/assets/general">
<script  src="<?=base_url()?>/public/js/editStudent.js"></script>

<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/studentsList');?>" class="one">Students</a></li>
            <li><?=$person->firstname?> <?=$person->lastname?></li>
        </ul>

        <h1><?=$person->firstname?> <?=$person->lastname?></h1>

        <div class="scroller">
            <form class="studentContainer" action="<?php echo base_url('ExpertController/storeStudent/'.$person->idStudents);?>" method="post">
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

                <div class="infoContainer">
                    <?php if(isset(session()->validation)):?>
                        <div class="errorMessage">
                            <p>
                                <?= session()->validation->listErrors() ?>
                            </p>
                        </div>
                    <?php endif;?>
                    <div class="general">
                        <h3 class="one2">General Information</h3>
                        <input type="hidden" id="coins" name="coins" value=<?=$person->coins?>>


                        <div class="generalFields">
                            <label for="firstname"><b class="two">First name:</b></label>
                            <input type="text" id="firstname" name="firstname" value="<?=$person->firstname?>" >
                            <label for="lastname"><b class="three">Surname:</b></label>
                            <input type="text" id="lastname" name="lastname" value="<?=$person->lastname?>" >
                            <label for="lastname"><b class="four">Email:</b></label>
                            <input type="text" id="email" name="email" value="<?=$person->email?>" >
                            <label for="gender"><b class="five">Gender:</b></label>
                            <select name="gender" id="gender">
                            <?php if ($person->gender==1):?>
                                <option selected="selected" value="male" class="six">Male</option>
                                <option value="female" class="seven">Female</option>
                            <?php else:?>
                                <option value="male" class="six">Male</option>
                                <option selected="selected" value="female" class="seven">Female</option>
                            <?php endif;?>
                            </select>
                            <label for="birthday"><b class="eight">Birthday:</b></label>
                            <input type="date" id="birthday" name="birthday" value="<?=$person->birthday?>" >
                            <label for="teachers"><b class="nine">Teacher:</b></label>
                            <select name="teachers" id="teachers">
                                <?php foreach ($teachers as $teacher):?>
                                    <?php if ($person->teacherFirstname==$teacher->firstname):?>
                                        <option selected="selected" value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                                    <?php else:?> <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                            <label class="explanation nine2">Which hand(s) will they be typing with?</label>
                            <label for="handSelection"><b class="ten">Hand Selection:</b></label>
                            <select name="handSelection" id="handSelection" onChange="handImage()">
                            <?php if ($person->handSelection==1):?>
                                <option selected="selected" value="right" class="eleven" >Right hand</option>
                                <option value="left" class="twelve">Left Hand</option>
                                <option value="both" class="thirteen">Both Hands</option>
                            <?php endif;?>
                            <?php if ($person->handSelection==2):?>
                                <option value="right" class="eleven">Right Hand</option>
                                <option selected="selected" value="left" class="twelve">Left Hand</option>
                                <option value="both" class="thirteen">Both Hands</option>
                            <?php endif;?>
                            <?php if ($person->handSelection==0):?>
                                <option value="right" class="eleven">Right Hand</option>
                                <option value="left" class="twelve">Left Hand</option>
                                <option selected="selected" value="both" class="thirteen">Both Hands</option>
                            <?php endif;?>
                            </select>
                            <label class="explanation thirteen2">Is the child currently following the Typwind course?</label>
                            <label for="active"><b class="fourteen">Active:</b></label>&nbsp;
                            <label class="switch">
                            <?php if ($person->isActive==1):?>
                                <input type="checkbox" id="active" name="active" value="1" checked>
                            <?php else:?>
                                <input type="checkbox" id="active" name="active">
                            <?php endif;?>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="notes">
                        <h3 class="eighteen">Notes</h3>
                        <p class="notesExplanation nineteen">Add some things you need to keep in mind about your student.</p>
                        <textarea id="notes" name="notes" rows="12" maxlength="1000" placeholder="Type here."><?= $person->notes?></textarea>
                        <div id="the-count">
                            <span id="current"></span>
                            <span id="maximum">/ 1000</span>
                        </div>
                    </div>

                </div>

                <?php if ($person->handSelection==1):?>
                    <img id="handImage" class="hands" src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==2):?>
                    <img id="handImage" class="hands" src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==0):?>
                    <img id="handImage" class="hands" src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">
                <?php endif;?>

                <div class="bottomBar space">
                    <button onclick='document.location.href="<?php echo base_url('experts/studentOverview/'.$person->idStudents);?>"' type="button" class="button buttonSecondary buttonExpert twenty">BACK</button>
                    <button class="button buttonPrimary buttonExpert nineteen2">save</button>
                </div>
            </form>
        </div>

    <?php endif;?>
<?php endforeach;?>

<script>
    $('textarea').keyup(function () {

        var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            theCount = $('#the-count');


        current.text(characterCount);

        if (characterCount < 167) {
            current.css('color', '#023047');
        }
        if (characterCount > 167 && characterCount < 334) {
            current.css('color', '#5F8090');
        }
        if (characterCount > 334 && characterCount < 500) {
            current.css('color', '#5F8090');
        }
        if (characterCount > 667 && characterCount < 834) {
            current.css('color', '#F37460');
        }
        if (characterCount > 834 && characterCount < 1000) {
            current.css('color', '#FC482C');
        }

        if (characterCount >= 1000) {
            maximum.css('color', '#DE1E00');
            current.css('color', '#DE1E00');
            theCount.css('font-weight', 'bold');
        } else {
            maximum.css('color', '#023047');
            theCount.css('font-weight', 'normal');
        }
    });
</script>
<?php session()->remove("validation") ?>

<?= $this->endSection() ?>
