<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
    <script  src="<?=base_url()?>/public/js/balloons.js" ></script>
<?php setcookie("currentPage","studentHome", time()+36000, "/");?>

<div id="balloon-container">
</div>
<div class="home_content">
    <h1 style="color:var(--blueNeutral);" class="two"> Welcome back</h1>
    <h1 style="color:var(--blueNeutral); text-transform: capitalize; ">
        <?php
        $session = session();
        echo $session->firstname; echo "!";
        ?>
    </h1>



    <!--    <div class="start_ex_button">-->
        <?php foreach ($exercises as $ex):
            $found =0;
            foreach ($scores as $sc):
                if ($ex->idExercises== $sc->idExerciseFk):
                    $found=1;
                    break;
                endif;
            endforeach;

            if($found == 0 && $ex->lesson!=0 ): ?>
                <div class="card_home_child">
                    <h3 class="three"> Your next exercise is waiting for you!</h3>
                    <div class="start_ex_button">
                                <h4 class="exercise_name" style="color:var(--primary-dark); text-transform: none;"> <span style="text-transform: none;" class="six">Lesson: </span> <?=$ex->lesson;?></h4>
                                <h4 class="exercise_name" style="color:var(--primary-dark); text-transform: none;"> <span style="text-transform: none;" class="seven">Exercise:  </span> <?=$ex->name;?></h4>
                        </div>
                        <form action="<?php echo base_url('/kids/intro/'.$ex->idExercises);?>" class="start_ex_button" >
                            <button class="button buttonPrimary buttonChild four" >Start new exercise</button>
                        </form>
                        <?php break;
            elseif($found == 0 && $ex->lesson==0):?>
                <div class="card_home_child">
                    <h3 class="three"> Your next exercise is waiting for you!</h3>
                    <div class="start_ex_button">
                        <h4 class="exercise_name" style="color:var(--primary-dark); text-transform: none;"> <span style="text-transform: none;" class="six">Lesson: </span>Custom exercises</h4>
                        <h4 class="exercise_name" style="color:var(--primary-dark); text-transform: none;"> <span style="text-transform: none;" class="seven">Exercise:  </span> <?=$ex->name;?></h4>
                    </div>
                    <form action="<?php echo base_url('/kids/intro/'.$ex->idExercises);?>" class="start_ex_button" >
                        <button class="button buttonPrimary buttonChild four" >Start new exercise</button>
                    </form>
                    <?php break;
            endif;
            $found =1;
        endforeach;
            if($found ==1): ?>
                <div class="card_home_child">
                    <h3> Congratulations!</h3>
                    <h3> You finished the game</h3>
            <?php endif;?>
    <!--    </div>-->
    </div>
</div>







<?= $this->endSection() ?>