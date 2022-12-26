<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
            <li><?=$person->firstname?><?=$person->lastname?></li>
        </ul>

        <h1><?=$person->firstname?><?=$person->lastname?></h1>

        <div class="scroller">
            <form class="studentContainer" action="<?php echo base_url('experts/editStudent/'.$person->idStudents);?>" method="post">
                <div class="general card">
                    <h3>General Information</h3>
                    <div class="roundProfilePic">
                        <img src="/public/assets/avatars/1.svg" alt="User Icon">
                    </div>

                    <p>
                        <input type="hidden" id="email" name="email" value="<?=$person->email?>">
                        <input type="hidden" id="password" name="password" value="<?=$person->password?>">
                        <input type="hidden" id="reminder" name="reminder" value="<?=$person->reminder?>">
                        <input type="hidden" id="coins" name="coins" value=<?=$person->coins?>>
                        <input type="hidden" id="streak" name="streak" value=<?=$person->streak?>>

                        <label for="firstname"><b>First name:</b></label>
                        <input type="text" id="firstname" name="firstname" value="<?=$person->firstname?>" required><br>
                        <label for="lastname"><b>Surname:</b></label>
                        <input type="text" id="lastname" name="lastname" value="<?=$person->lastname?>" required><br>
                        <label for="lastname"><b>Email:</b></label>
                        <input type="text" id="email" name="email" value="<?=$person->email?>" required><br>
                        <label for="gender"><b>Gender:</b></label>
                        <select name="gender" id="gender" required>
                        <?php if ($person->gender==1):?>
                            <option selected="selected" value="male">Male</option>
                            <option value="female">Female</option>
                        <?php else:?>
                            <option value="male">Male</option>
                            <option selected="selected" value="female">Female</option>
                        <?php endif;?>
                        </select><br>
                        <label for="birthday"><b>Birthday:</b></label>
                        <input type="date" id="birthday" name="birthday" value="<?=$person->birthday?>" required><br>
                        <label for="teachers"><b>Teacher:</b></label>
                        <select name="teachers" id="teachers" value="<?=$person->teacherFirstname?>" required>
                            <?php foreach ($teachers as $teacher):?>
                                <?php if ($person->teacherFirstname==$teacher->firstname):?>
                                    <option selected="selected" value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                                <?php else:?> <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>?>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                        <br>
                        <label for="handSelection"><b>Hand Selection:</b></label>
                        <select name="handSelection" id="handSelection" required>
                        <?php if ($person->handSelection==1):?>
                            <option selected="selected" value="right">Right hand</option>
                            <option value="left">Left Hand</option>
                            <option value="both">Both Hands</option>
                        <?php endif;?>
                        <?php if ($person->handSelection==2):?>
                            <option value="right">Right Hand</option>
                            <option selected="selected" value="left">Left Hand</option>
                            <option value="both">Both Hands</option>
                        <?php endif;?>
                        <?php if ($person->handSelection==0):?>
                            <option value="right">Right Hand</option>
                            <option value="left">Left Hand</option>
                            <option selected="selected" value="both">Both Hands</option>
                        <?php endif;?>
                        </select>
                        <br>
                        <label for="active"><b>Active</b></label>&nbsp;
                        <label class="switch">
                        <?php if ($person->isActive==1):?>
                            <input type="checkbox" id="active" name="active" value="1"checked>
                        <?php else:?>
                            <input type="checkbox" id="active" name="active">
                        <?php endif;?>
                            <span class="slider"></span>
                        </label>
                    </p>

                    <?php if ($person->handSelection==1):?>
                        <img class="hands" src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">
                    <?php endif;?>
                    <?php if ($person->handSelection==2):?>
                        <img class="hands" src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">
                    <?php endif;?>
                    <?php if ($person->handSelection==0):?>
                        <img class="hands" src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">
                    <?php endif;?>
                </div>

                <div class="noteCard card">
                    <label for="notes"><h3>Notes</h3></label>
                    <textarea id="notes" name="notes" rows="17"><?= $person->notes?></textarea>
                </div>

                <div class="bottomBar">
                    <input type="submit" value="Save" class="button buttonPrimary buttonExpert">
                </div>
            </form>
        </div>

    <?php endif;?>
<?php endforeach;?>


<?= $this->endSection() ?>
