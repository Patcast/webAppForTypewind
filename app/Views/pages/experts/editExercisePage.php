<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertEditExercise", time()+36000, "/");?>

<?php $exercises =json_decode(session()->exercises);?>

<?php foreach ($exercises as $exercise):?>
<?php  if ($exercise->idExercises==$idExercises):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/exercises');?>" class="one">Exercises</a></li>
            <li class="one2">Exercise</li>
        </ul>

<h1 class="two headerOne">Edit Exercise</h1>

<div class="scroller">
    <form class="exerciseContainer" action= "<?php echo base_url('experts/editExercise/'.$exercise->idExercises);?>" method="post">
    <div class="infoContainer">
        <div class="generalContainer">
            <h3 class="three">General Information</h3>
            <div class="general">
                <p>
                    <label for="title"><b class="four">Title Exercise:</b></label>
                    <input type="text" id="title" name="title" value="<?=$exercise->name?>"><br>
                </p>
            </div>

            <div class="content">
                <label for="content"><h3 class="five">Content</h3></label>
                <textarea id="content" name="content" rows="12" maxlength="1000"><?=$exercise->text?></textarea>
            </div>
        </div>
    </div>
        <div class="bottomBar space">
            <a href="<?php echo base_url('experts/exerciseContentPage/'.$exercise->idExercises);?>">
                <button type="button" class="button buttonSecondary buttonExpert nine2">BACK</button>
            </a>
            <a>
                <button class="button buttonPrimary buttonExpert seven">save</button>
            </a>
        </div>
    </form>
</div>

    <?php endif;?>
<?php endforeach;?>

<?= $this->endSection() ?>

