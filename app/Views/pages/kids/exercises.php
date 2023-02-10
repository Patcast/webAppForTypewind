<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","studentExercises", time()+36000, "/");?>

<input type="hidden" id="URL" name="URL" value="<?php echo base_url();?>/kids/intro/">

<script>
    var URL = document.getElementById("URL").value;
    $(document).ready(function(){

        let lessonsList = <?php echo json_encode($exercises); ?>;

        let scores = <?php echo json_encode($scores); ?>;


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

                if(lessonNumber!==0){
                    exercisesText = "<div class='card lessonCardChild'> <h2>"+"Lesson "+lessonId +"</h2>";
                }
                else{
                    exercisesText = "<div class='card lessonCardChild'> <h2>" + "Custom exercises" + "</h2>"
                }


                for (let i = 0; i < lessonGroup.length; i++) {
                    exercisesText =
                    exercisesText
                    + "<a style = 'text-decoration: none;'href= \"" + URL + lessonGroup[i].idExercises + "\">"
                    +"<button class='exerciseButton'>"+ lessonGroup[i].name
                    for (let j = 0; j < scores.length; j++) {
                        if(scores[j].idExerciseFk === lessonGroup[i].idExercises)
                        {
                            if(0<= scores[j].score && scores[j].score<0.2)
                            {
                                exercisesText=exercisesText+ "<div class = 'stars_on_exercise'>"
                                    +"<div class = 'wrapper_for_stars'>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"</div>"
                                    +"</div>";
                            }
                            if(0.2<= scores[j].score && scores[j].score<0.4)
                            {
                                exercisesText=exercisesText+ "<div class = 'stars_on_exercise'>"
                                    +"<div class = 'wrapper_for_stars'>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"</div>"
                                    +"</div>";
                            }
                            if(0.4<= scores[j].score && scores[j].score<0.6)
                            {
                                exercisesText=exercisesText+ "<div class = 'stars_on_exercise'>"
                                    +"<div class = 'wrapper_for_stars'>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"</div>"
                                    +"</div>";
                            }
                            if(0.6<= scores[j].score && scores[j].score<0.8)
                            {
                                exercisesText=exercisesText+ "<div class = 'stars_on_exercise'>"
                                    +"<div class = 'wrapper_for_stars'>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"</div>"
                                    +"</div>";
                            }
                            if(0.8<= scores[j].score && scores[j].score<1)
                            {
                                exercisesText=exercisesText+ "<div class = 'stars_on_exercise'>"
                                    +"<div class = 'wrapper_for_stars'>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='unchecked_stars small'></div>"
                                    +"</div>"
                                    +"</div>";
                            }
                            if(scores[j].score==1)
                            {
                                exercisesText=exercisesText+ "<div class = 'stars_on_exercise'>"
                                    +"<div class = 'wrapper_for_stars'>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"<div class ='checked_stars small'></div>"
                                    +"</div>"
                                    +"</div>";
                            }
                        }
                    }
                    exercisesText=exercisesText
                        +"</button>"
                        + "</a>"};
                exercisesText = exercisesText + "</div>";

                $(".exerciseContainer").append(exercisesText);
            }
            console.log("LESSON")
        }
    });
</script>

<h1 style="user-select: none;" class="one">Exercises</h1>
<div class="card_and_button">


    <button class="button round" style=" user-select: none;" onclick="document.querySelector('.exerciseContainer').scrollBy(0, -100)"><img alt="Arrow Up Icon" src="/public/assets/icons/up.svg"></button>

    <div class="exerciseContainer">
    </div>

    <button class="button round" style="user-select: none; " onclick="document.querySelector('.exerciseContainer').scrollBy(0, 100)"><img alt="Arrow Down Icon" src="/public/assets/icons/down.svg"></button>

</div>


<?= $this->endSection() ?>
