
<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","exercise", time()+36000, "/");?>

<link rel="stylesheet" href="<?=base_url()?>/public/CSS/keyboard.css">

<div class="grid-container_exercise">
    <!--breadcrumb-->
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>" class="one">Exercises</a>
            <?php foreach ($exercises as $ex):?>
                <?php  if ($ex->idExercises==$idExercises):?>
                    <li><?= $ex->name?></li>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
    </div>
    <?php
    foreach ($exercises as $ex):?>
    <?php  if ($ex->idExercises==$idExercises):?>

    <!--title-->
    <div class="container">
        <div class="title">
            <h1><?= $ex->name?></h1>
            <input type="hidden"  class="button buttonSecondary buttonChild" id="muteSoundsBtn" value="Spel geluiden" onclick="muteSounds();">
            <input type="hidden"  class="button buttonSecondary buttonChild" id="muteSpeakBtn" value="Verteller" onclick="muteSpeak();">
            <form action="<?php echo base_url('kids/intro/'.$idExercises);?>" class="inline">
                <button id="stopButton" class="button buttonSecondary buttonChild two" >STOP & EXIT</button>
            </form>
        </div>
    </div>

    <div hidden id="textInput"><?=$ex->text?></div>
    <div hidden id="idExercise_fkDB"><?=$ex->idExercises?></div>
    <div hidden id="idStudent_fkDB"><?=$idStudents?></div>
<?php endif;?>
<?php endforeach;?>
<div hidden id="handSelection"><?=$handSelection?></div>

    <?php if  (($voiceCopy==1)):?>
    <div hidden id="voiceCopy">1</div>
<?php else :?>
    <div hidden id="voiceCopy">0</div>
<?php endif;?>

    <?php if  (($feedbackCopy==1)):?>
    <div hidden id="feedbackCopy">1</div>
<?php else :?>
    <div hidden id="feedbackCopy">0</div>
<?php endif;?>

    <!--Image and text bar-->
    <div class="exercise" style="zoom: 80%">
        <div id="myProgress" class="myProgress">
            <div id="myBar" class="myBar"></div>
        </div>
        <div id="imageContainer"></div>
        <div id="feedback"></div>
        <audio id="soundContainer"></audio>
        <audio id="soundContainerStart"></audio>
       <div class="textBox" id="textBox">
           <div class="textContainer " id="movableExerciseBoxText"></div>
        </div>
    </div>

<?php if  (($showKeyboard==1)):?>
    <div class="keyboard-base" id="keyboard">
        <div class="key" id="Backquote"></div>
        <div class="key blue" id="Digit1">1</div>
        <div class="key blue" id="Digit2">2</div>
        <div class="key yellow" id="Digit3">3</div>
        <div class="key green" id="Digit4">4</div>
        <div class="key red" id="Digit5">5</div>
        <div class="key red" id="Digit6">6</div>
        <div class="key red" id="Digit7">7</div>
        <div class="key red" id="Digit8">8</div>
        <div class="key green" id="Digit9">9</div>
        <div class="key yellow" id="Digit0">0</div>
        <div class="key blue" id="Minus"></div>
        <div class="key" id="Equal"></div>
        <div class="key delete" id="Backspace"></div>

        <div class="key tab" id="Tab"></div>
        <div class="key blue" id="KeyQ">A</div>
        <div class="key yellow" id="KeyW">Z</div>
        <div class="key green" id="KeyE">E</div>
        <div class="key red" id="KeyR">R</div>
        <div class="key red" id="KeyT">T</div>
        <div class="key red" id="KeyY">Y</div>
        <div class="key red" id="KeyU">U</div>
        <div class="key green" id="KeyI">I</div>
        <div class="key yellow" id="KeyO">O</div>
        <div class="key blue" id="KeyP">P</div>
        <div class="key" id="BracketLeft"></div>
        <div class="key" id="BracketRight"></div>
        <div class="key backslash"></div>

        <div class="key capslock" id="CapsLock"></div>
        <div class="key blue" id="KeyA">Q</div>
        <div class="key yellow" id="KeyS">S</div>
        <div class="key green" id="KeyD">D</div>
        <div class="key red" id="KeyF">F</div>
        <div class="key red" id="KeyG">G</div>
        <div class="key red" id="KeyH">H</div>
        <div class="key red" id="KeyJ">J</div>
        <div class="key green" id="KeyK">K</div>
        <div class="key yellow" id="KeyL">L</div>
        <div class="key blue" id="Semicolon">M</div>
        <div class="key" id="Quote"></div>
        <div class="key return" id="Enter"></div>

        <div class="key leftshift" id="ShiftLeft"></div>
        <div class="key blue" id="KeyZ">W</div>
        <div class="key yellow" id="KeyX">X</div>
        <div class="key green" id="KeyC">C</div>
        <div class="key red" id="KeyV">V</div>
        <div class="key red" id="KeyB">B</div>
        <div class="key red" id="KeyN">N</div>
        <div class="key red" id="KeyM">,</div>
        <div class="key green" id="Comma">;</div>
        <div class="key yellow" id="Period">:</div>
        <div class="key blue" id="Slash">=</div>
        <div class="key rightshift" id="ShiftRight"></div>
        <div class="key leftctrl" id="ControlLeft"></div>
        <div class="key" id="MetaLeft"></div>
        <div class="key command" id="AltLeft"></div>
        <div class="key space" id="Space"></div>
        <div class="key command" id="AltRight"></div>
        <div class="key"></div>
        <div class="key" id="ControlRight"></div>
        <div class="key"></div>
    </div>
<?php endif;?>



    <form id="form" action="<?php echo base_url('kids/feedback/'.$idExercises);?>" method="post">
        <input type="hidden" id="idStudentFk" name="idStudentFk" value="<?=$idStudents ?>">
        <input type="hidden" id="idExerciseFk" name="idExerciseFk" value="<?=$idExercises ?>">
        <input type="hidden" id="score" name="score" value="">
        <input type="hidden" id="date" name="date" value="">
    </form>
</div>
<script  src="<?=base_url()?>/public/js/exercise_view.js"></script>
<?= $this->endSection() ?>
