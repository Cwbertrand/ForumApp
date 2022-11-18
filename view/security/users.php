<?php

$users = $result["data"]['users'];

?>

    <div class="container">
            <div class="posts-table">
                <div class="table-head">
                    <div class="status">Index</div>
                    <div class="subjects">Email</div>
                    <div class="last-reply">Utilisateur</div>
                    <div class="last-reply">Role</div>
                    <div class="last-reply">Banned</div>
                    <div class="last-reply">Unbanned</div>
                </div>


                <?php foreach($users as $user ){ ?>
                    <div class="table-row">
                        <div class="status"><span><?= $user->getId() ;?></span></div>
                        <div class="subjects">
                            <h4><?= $user->getemail(); ?></a></h4>
                        </div>

                        <div class="last-reply">
                        <h4><a href="index.php?ctrl=forum&action=listSubject&id=<?= $user->getId() ;?>"><?= $user->getPseudo(); ?></a></h4>
                        </div>
                        <div class="last-reply">
                            <h4><?= $user->showRole(); ?></a></h4>
                        </div>
                        <div class="subforum-description subforum-column">
                            <div class="comment  ">
                                <a href="" class="btn-lock" style="cursor: pointer;"> Banned </a>
                            </div>
                        </div>
                        <div class="last-reply">
                            <a class="btn-unlock" href="inde">Unbanned</a>
                        </div>
                    </div>
                <?php } ?>

                <!--ends here-->
            </div>

    </div>