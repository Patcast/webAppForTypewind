<?= $this->extend('/templates/css_default') ?>

<?= $this->section('content') ?>
    <!--START OF PAGE CONTENT-->
    <!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->

    <!-- SYSTEM DESIGN + CARD + WAVE BACKGROUND -->
    <div class="card wave">
        <h1>Title</h1>
        <h2>Heading 1</h2>
        <h3>Heading 2</h3>
        <h4>Heading 4</h4>
        <p style="font:var(--smallText);">Small text</p> <!-- for illustration purposes, CSS should normally not be inline but in a separate file where you can also define colors -->
        <p style="font:var(--bodyText);">Body text</p>
        <p style="font:var(--bodyExText);">Body explanatory text</p>
        <p style="font:var(--emphasisText);">Emphasis text</p>
        <p style="font:var(--emphasisExText);">Emphasis explanatory text</p>
        <p style="font:var(--subtitle);">Subtitle</p>
        <p style="font:var(--navText);">Navigation text</p>
        <p style="font:var(--navEmphasisText);">Navigation emphasis text</p>
    </div>

<!--    <!-- BUTTONS -->-->
<!--    <button class="button buttonPrimary buttonExpert">Button Label</button>-->
<!--    <button class="button buttonSecondary buttonExpert">Button Label</button>-->
<!--    <button class="button buttonPrimary buttonChild">Button Label</button>-->
<!--    <button class="button buttonSecondary buttonChild">Button Label</button>-->
<!---->
<!--    <!-- BREADCRUMB -->-->
<!--    <ul class="breadcrumb">-->
<!--        <li><a href="#">Page 1</a></li>-->
<!--        <li><a href="#">Page 2</a></li>-->
<!--        <li><a href="#">Page 3</a></li>-->
<!--        <li>Page 4</li>-->
<!--    </ul>-->
<!---->
<!--    <!-- BOTTOM BAR -->-->
<!--    <div class="card"> <!-- As we can see for the big beige background where all content will be on, better not to have margin -->-->
<!--        <h3>Heading 2</h3>-->
<!--        <h4>Heading 3</h4>-->
<!--        <p style="font:var(--smallText);">Small text</p>-->
<!--        <p style="font:var(--bodyExText);">Body explanatory text</p>-->
<!--        <p style="font:var(--bodyText);">Body text</p>-->
<!--        <div class="bottomBar">-->
<!--            <button class="button buttonPrimary buttonExpert">Button Label</button>-->
<!--            <button class="button buttonSecondary buttonExpert">Button Label</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <!-- INPUT FIELD -->-->
<!--    <input type="text" placeholder="Type Here">-->
<!---->
<!--    <!-- SWITCH -->-->
<!--    <label class="switch">-->
<!--        <input type="checkbox">-->
<!--        <span class="slider"></span>-->
<!--    </label>-->
<!---->
<!--    <!-- HANDS -->-->
<!--    <img src="/public/assets/general/hands_both.svg" alt="Both hands">-->

    <!-- STUDENT -->
    <ul>
        <li class="studentListItem">
            <div class="roundProfilePic">
                <img src="/public/assets/avatars/1.svg" alt="User Icon">
            </div>
            <h4>FirstName<br>Surname</h4>
        </li>
    </ul>

    <!-- PROGRESS STEPS (STEPPER) -->
    <ol class="stepper">
        <li></li>
        <li></li>
        <li class="current"><p>Step</p></li>
        <li class="todo"></li>
    </ol>

    <!-- EXERCISE FIELD -->
    <h4 class="exerciseField">Exercise Name aaaaaaa hhhh hhhhhhhh hhhhh</h4>

    <!-- LESSON CARD -->
    <div class="card lessonCard">
        <h2>Lesson 1</h2>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name aaaaanh hubhbj hbjvb</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name</h4>
        <h4 class="exerciseField">Exercise Name2</h4>
    </div>

    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>