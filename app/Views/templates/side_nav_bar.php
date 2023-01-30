
<div class="menu_grid-container">
    <div class="menuHeader">
        <img id ="typewindLogo" src="<?=base_url()?>/public/assets/general/typwind_logo.svg" alt="Typewind Logo">
    </div>

    <div class="langWrap menuSubHeader language" >
        <a id="<?php if(isset($_COOKIE["nederlandsActief"])) echo $_COOKIE["nederlandsActief"];?>" href="#" data-language="nederlands" class="active">NED</a><span class="bar"> | </span>
       <a id="<?php if(isset($_COOKIE["englishActive"]))echo $_COOKIE["englishActive"];?>" href="#" data-language="english" >ENG</a>
    </div>

    <div class="menuItems" >
        <?php if (! empty($menu_items)) :?>
            <?php foreach ($menu_items as $menu): ?>
                <a href="<?=base_url($menu['link'])?>" class="<?=$menu['className']?>">
                    <img  src="<?=base_url($menu['image'])?>" alt="<?=$menu['className']?>">
                    <p class ="<?=$menu['name']?>"><?=$menu['name']?></p>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div >
    <div  class="menuFooter">
        <a href="<?=base_url()?>/registration/welcome">
            <img src="<?=base_url()?>/public/assets/icons/log_out_icon.svg" alt="logout">
            <p class="logout">Log out</p>
        </a>
    </div>
</div>

