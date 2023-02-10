<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","feedback", time()+36000, "/");?>

<div class = "grid-container_feedback">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>" class="one">Exercises</a>
            <li class="two">Feedback</li>
        </ul>
    </div>
    <div class="title" style="color: var(--blueNeutral)">
        <?php foreach ($exercises as $ex):?>
            <?php  if ($ex->idExercises==$idExercises):?>
                <h1><?= $ex->name?></h1>
            <?php endif;
            $idLastExercise = 0;
            if($ex->idExercises>$idLastExercise):
                $idLastExercise=$ex->idExercises;
            endif;
        endforeach;?>
    </div>

    <div class="content_feedback" style="zoom: 85%">
        <h3 style="color: var(--primary-darkest)" class="one2"> Finished exercise! </h3>
        <div>
        <?php if(0<=$score & $score<0.2): ?>
            <?php setcookie("feedbackCookie","one", time()+36000, "/");?>
            <h3 style="color: var(--primary-darkest)" class="seven">Congrats, you completed an exercise!</h3><h3 style="color: var(--primary-darkest)" class="twelve">Try again to earn more stars :)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.2<=$score & $score<0.4): ?>
        <?php setcookie("feedbackCookie","two", time()+36000, "/");?>
        <h3 style="color: var(--primary-darkest)" class="seven">Congrats, you completed an exercise!</h3><h3 style="color: var(--primary-darkest)" class="twelve">Try again to earn more stars :)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.4<=$score & $score<=0.6): ?>
    <?php setcookie("feedbackCookie","three", time()+36000, "/");?>
    <h3 style="color: var(--primary-darkest)" class="eight">You earned 2 stars already!</h3><h3 style="color: var(--primary-darkest)" class="twelve">Try again to earn more stars :)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.6<=$score & $score<0.8): ?>
            <?php setcookie("feedbackCookie","four", time()+36000, "/");?>
            <h3 style="color: var(--primary-darkest)" class="nine">3 Stars! Well done!</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.8<=$score & $score<1): ?>
            <?php setcookie("feedbackCookie","five", time()+36000, "/");?>
            <h3 style="color: var(--primary-darkest)" class="ten">Wow 4 Stars!</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if($score ==1): ?>
            <?php setcookie("feedbackCookie","six", time()+36000, "/");?>
            <h3 style="color: var(--primary-darkest)" class="eleven">Perfect score! You are a pro!</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
            </div>
        <?php endif;?>

        <span class="coin">+ <?=(!empty($coins))? $coins:0;?></span>

        <div class="card_buttons">

            <?php  if ($idExerciseFk==94):
                $idNext = 1;
            elseif($idExerciseFk==41):
                $idNext = 62;
            elseif ($idExerciseFk>=96 && $idExerciseFk<$idLastExercise):
                foreach ($exercises as $ex):
                    if ($ex->idExercises > $idExerciseFk):
                        $idNext = $ex->idExercises;
                        break;
                    endif;
                endforeach;

            elseif($idExerciseFk==$idLastExercise):
                $idNext = 1;
            else:
                $idNext = $idExerciseFk+1;
            endif;?>

            <form action="<?php echo base_url('/kids/intro/'.$idNext);?>" class="feedback_ex_button">
                <button class="button buttonPrimary buttonChild four">Start next exercise</button>
            </form>

            <form action="<?php echo base_url('/kids/intro/'.$idExerciseFk);?>" class="feedback_ex_button">
                <button class="button buttonSecondary buttonChild five">Replay exercise</button>
            </form>

            <form action="<?php echo base_url('/kids/exercises');?>" class="feedback_ex_button">
                <button class="button buttonSecondary buttonChild six">Back to exercises</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
