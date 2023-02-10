<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertExercises", time()+36000, "/");?>
<script>
    $(document).ready(function(){
        let lessonsList = <?php echo $exercises; ?>;
        const lessonsMap = new Map();
        for (let i = 0; i < lessonsList.length; i++) {
            if(lessonsMap.has(lessonsList[i].lesson)){
                lessonsMap.get(lessonsList[i].lesson).push(lessonsList[i])
            }
            else{
                lessonsMap.set(lessonsList[i].lesson,[])
                lessonsMap.get(lessonsList[i].lesson).push(lessonsList[i])
            }
        }
        for (const lessonId of lessonsMap.keys()) {
            const lessonNumber= parseInt(lessonId);
            let lessonGroup = lessonsMap.get(lessonId)
            if (typeof lessonGroup !== 'undefined') {
                console.log(lessonGroup)

                if(lessonNumber!==0){
                    exercisesText = "<div class='card lessonCard'> <h2>" + "Les " + lessonId + "</h2>"
                }
                else
                {
                    exercisesText = "<div class='card lessonCard'> <h2>" + "Aangepaste oefeningen" + "</h2>"
                }
                lessonGroup.forEach(element => exercisesText = exercisesText+ "<a href="+ getCookie("baseURL") +"/experts/exerciseContentPage/"+ element.idExercises +">" + "<h4 class='exerciseField'>" + element.name + "</h4>" + "</a>");
                exercisesText = exercisesText + "</div>"
                $(".exerciseContainer").append(exercisesText);
            }
            console.log("LESSON")
        }
    });
</script>

<h1 class="one">Exercises</h1>

<!-- Add new exercise -->
<a class="addNew two" href=<?php echo base_url('experts/addExercisePage/');?>>Add New Exercise</a>

<div class="exerciseContainer">
</div>

<?php
$_SESSION["selectedExercise"] = 2; // @loic you need to set this variable in the session to select the correct exercise!
?>

<?= $this->endSection() ?>
