<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<script type="text/javascript" src="<?=base_url()?>/public/js/avatarShop.js" defer></script>

    <h1>Avatars</h1>
    <div class="avatarContent" id ="mainAvatar">
            <div class="roundProfilePic currentPic">
                <?php if (! empty($idOfSelectedAvatar)):?>
                <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
                <?php endif;?>
            </div>
            <div class="coins">
                <h3>My Coins</h3>
                <span class="coin"><?=(!empty(session()->coins))? session()->coins:0;?></span>
            </div>

            <div class="card avatarCard">
            <?php if (! empty($avatars) && is_array($avatars)):
                foreach ($avatars as $avatar):?>
                    <div class="<?= $avatar['classCSS']?> " id =<?= $avatar['idAvatars']?> >
                        <div class="roundProfilePic">
                            <img src="/public/assets/avatars/<?= $avatar ['idAvatars']?>.svg" alt="User Icon">
                        </div>
                        <span class="coin"><?= $avatar['price']?></span>
                        <span class="errorMessage">Not enough money</span>
                    </div>
                <?php endforeach;
            endif;?>

            </div>
    </div>

<?= $this->endSection() ?>






