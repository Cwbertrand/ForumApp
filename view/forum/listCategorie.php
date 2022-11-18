<?php

$categories = $result["data"]['categories'];

?>

    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>liste Categories</h1>
                <?php if (\App\Session::isAdmin()) { ?>
                    <div class="comment">
                    <button class="addCategorie" onclick="showComment()">Ajoute Categorie</button>
                </div>

                <?php }?>
                
            </div>
            <!-- CREATE A CATEGORY-->
            <form method="POST" action="index.php?ctrl=forum&action=insertCategorie">
                <div class="comment-area hide" id="comment-area">
                    <input type="text" name="categorie" class="categorie">
                    <input type="submit" name="submit" value="ADD">
                </div>
            </form>

            
            
            
            <?php foreach($categories as $categorie ){ ?>

                <!-- EDIT A CATEGORY-->
                <form method="POST" action="index.php?ctrl=forum&action=modifierCategorie&id=<?= $categorie->getId() ;?>">
                    <div class="comment-area hide" id="reply-area">
                        <input type="text" name="newNomCategorie">
                        <input type="submit" name="submit" value="Sauguader">
                    </div>
                </form>
                
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa fa-car center"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="index.php?ctrl=forum&action=listSubject&id=<?= $categorie->getId() ;?>"><?= $categorie->getNomCategorie() ?></a></h4>
                    </div>
                    <?php if (\App\Session::isAdmin()) { ?>
                        <div class="subforum-description subforum-column">
                            <div class="comment btn-unlock">
                                <a onclick="showReply()" style="cursor: pointer;"> Modifier </a>
                            </div>
                        </div>

                        <div class="subforum-description subforum-column">
                            <a href="index.php?ctrl=forum&action=deleteCategorie&id=<?= $categorie->getId() ;?>" class="btn-lock">Supprimer</a>
                        </div>
                    <?php }?>
                </div>
            <?php } ?>
        </div>
    </div>



