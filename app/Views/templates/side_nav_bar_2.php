

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Typwind</h3>
        <div class="langWrap">
            <a type="submit" id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
            |
            <a type="submit" id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
        </div>
    </div>

    <ul class="list-unstyled components">
        <li><a href="<?=base_url()?>/kids/home" title="Go home" class="home" >Home</a></li>
        <li><a href="<?=base_url()?>/kids/exercises" title="Go to exercises" class="exercises">Exercises</a></li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li><a href="<?=base_url()?>/registration/welcome" title="Log Out" class="download">Log Out</a></li>
    </ul>
</nav>