<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertEditExercise", time()+36000, "/");?>

<?php $exercises =json_decode(session()->exercises);?>
<script  src="<?=base_url()?>/public/js/editExercise.js"></script>

<?php foreach ($exercises as $exercise):?>
<?php  if ($exercise->idExercises==$idExercises):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/exercises');?>" class="one">Exercises</a></li>
            <li class="one2">Exercise</li>
        </ul>

<h1 class="two headerOne">Edit Exercise</h1>

<div class="scroller">
    <form class="exerciseContainer" action= "<?php echo base_url('expertController/storeExercise/'.$exercise->idExercises);?>" method="post">
    <div class="infoContainer">
        <div class="generalContainer">
            <?php if(isset(session()->validation)):?>
                <div class="errorMessage">
                    <p>
                        <?= session()->validation->listErrors() ?>
                    </p>
                </div><br>
            <?php endif;?>
            <h3 class="three">General Information</h3>
            <div class="general">
                <p>
                    <label for="title"><b class="four">Title Exercise:</b></label>
                    <input type="text" id="title" name="title" value="<?=$exercise->name?>"><br>
                </p>
            </div>

            <div class="content">
                <h3 class="five">Content</h3>
                <textarea id="content" name="content" rows="12" maxlength="1000"><?=$exercise->text?></textarea>
                <div id="the-count">
                    <span id="current">0</script></span>
                    <span id="maximum">/ 1000</span>
                </div>
            </div>
        </div>
    </div>
        <div class="bottomBar space">
                <button onclick='document.location.href="<?php echo base_url('experts/exerciseContentPage/'.$exercise->idExercises);?>"' type="button" class="button buttonSecondary buttonExpert nine2">BACK</button>
                <button class="button buttonPrimary buttonExpert seven">save</button>
        </div>
    </form>
</div>

    <?php endif;?>
<?php endforeach;?>
<?php session()->remove("validation") ?>

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

