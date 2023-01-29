<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","avatar", time()+36000, "/");?>

<script  src="<?=base_url()?>/public/js/avatarShop.js" defer></script>
<link rel="stylesheet" href='<?=base_url()?>/public/CSS/kids/avatarEffects.css'>

    <h1>Avatar shop</h1>

    <div class="avatarContent" id ="mainAvatar">
            <div class="roundProfilePic currentPic">
                <?php if (! empty($idOfSelectedAvatar)):?>
                <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
                <?php endif;?>
            </div>
            <div class="coins" id ="currentCoins">
                <h3 class="one">My Coins</h3>
                <span class="coin"><?=(!empty(session()->coins))? session()->coins:0;?></span>
            </div>

              <div class="card avatarCard">
            <?php if (! empty($avatars) && is_array($avatars)):
                foreach ($avatars as $avatar):?>
                    <div class="<?= $avatar['classCSS']?> " id =<?= $avatar['idAvatars']?> >
                        <div class="pyro">
                            <div class="before"></div>
                            <div class="after"></div>
                        </div>
                        <div class="roundProfilePic">
                            <img src="/public/assets/avatars/<?= $avatar ['idAvatars']?>.svg" alt="User Icon">
                        </div>
                        <span class="coin"><?= $avatar['price']?></span>
                        <span class="errorMessage two">Not enough coins</span>
                    </div>
                <?php endforeach;
            endif;?>

            </div>
    </div>

<?= $this->endSection() ?>






