<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
<script  src="<?=base_url()?>/public/js/intro.js"></script>

<?php setcookie("currentPage","intro", time()+36000, "/");?>

<div class = "grid-container_intro">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>" class="one">Exercises</a></li>
            <li class="two">Introduction</li>
        </ul>
    </div>

    <div class="title">
        <?php foreach ($exercises as $ex):?>
            <?php  if ($ex->idExercises==$idExercises):?>
                <h1 style="color: var(--blueNeutral);"><?= $ex->name?></h1>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <div class="grid_cards">
            <div class="card_intro">
                <h4 style="color: var(--blueNeutral-dark); margin-bottom: 1.5625rem" class="three">How do you want to play the game?</h4>
                <div class="switches">
                    <label class="switch">
                        <input type="checkbox" id="keyboardShow" name="keyboard"  onchange="sliders()" checked>
                        <span class="slider"></span>
                    </label>
                    <label for="keyboardShow" style="color: var(--blueNeutral-dark); font: var(--bodyExText);" class="four">Show keyboard</label>
                    <br>
                    <label class="switch">
                        <input type="checkbox" id="voice" name="voice"  onchange="sliders()" checked>
                        <span class="slider"></span>
                    </label>
                    <label for="voice" style="color: var(--blueNeutral-dark); font: var(--bodyExText)" class="nine">Read letters out loud</label>
                    <br>
                    <label class="switch">
                        <input type="checkbox" id="feedback" name="keyboard"  onchange="sliders()" checked>
                        <span class="slider"></span>
                    </label>
                    <label for="feedback" style="color: var(--blueNeutral-dark); font: var(--bodyExText)" class="ten">Have audio feedback when typing</label>
                </div>
            </div>

            <div class="card_intro">

                <h4 style="color: var(--blueNeutral-dark); margin-bottom: 1.5625rem" class="five">Press start and earn some stars.<br> Good luck!</h4>
                <?php foreach ($exercises as $ex):?>
                    <?php  if ($ex->idExercises==$idExercises):?>

                        <form action="<?php echo base_url('kids/exercise/'.$ex->idExercises);?>" class="intro_ex_button" method="post">
                                <button class="button buttonPrimary buttonChild seven">Start</button>
                                <input type="checkbox" id="keyboardShowCopy" name="keyboardShowCopy" hidden checked>
                                <input type="checkbox" id="voiceCopy" name="voiceCopy" hidden checked>
                                <input type="checkbox" id="feedbackCopy" name="feedbackCopy" hidden checked>
                            </form>
                            <form action="<?php echo base_url();?>/kids/exercises" class="intro_ex_button">
                                <button class="button buttonSecondary buttonChild eight">Go back to exercises</button>
                            </form>


                    <?php endif;?>
                <?php endforeach;?>
            </div>
    </div>
</div>
<?= $this->endSection() ?>

