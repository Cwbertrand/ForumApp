<?php

$users = $result["data"]['users'];

?>

    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>liste d'Utilisateur</h1>
            </div>
            <div class="head">
                <div class="authors">Index</div>
                <div class="content">Utilisateur</div>
                <div class="authors">Email</div>
                <div class="authors">Role</div>
            </div>
            <?php foreach($users as $user ){ ?>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                    <?= $user->getId() ;?>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="index.php?ctrl=forum&action=listSubject&id=<?= $user->getId() ;?>"><?= $user->getPseudo(); ?></a></h4>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><?= $user->getemail(); ?></a></h4>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><?= $user->showRole(); ?></a></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>