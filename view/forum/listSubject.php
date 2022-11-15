<?php

$subjects = $result["data"]['subjects'];
$idcategorie = $result["data"]['idcategorie'];
    
?>

    <div class="container">
        <!--Navigation-->

        <?php if (\App\Session::isAdmin() || \App\Session::getUser()) { ?>
            <div class="navigate">
                <span><a href="index.php?ctrl=forum&action=listCategorie">MyForum - Categorie</a> >> <a href="">les Subjects</a></span>
            </div>
            <!--Display posts table-->
            <div class="posts-table">
                <div class="table-head">
                    <div class="status">Status</div>
                    <div class="subjects">Subjects</div>
                    <div class="last-reply">Date de création et par Qui</div>
                    <div class="last-reply">Readable or Not</div>

                    <?php if (\App\Session::isAdmin()) { ?>
                        <div class="last-reply">Modifier</div>
                        <div class="last-reply">Supprimer</div>
                    <?php }?>

                </div>

                <?php foreach($subjects as $subject ){ ?>
                    <div class="table-row">
                        <div class="status"><span><?= $subject->showStatusPost() ;?></span></div>
                        <div class="subjects">
                            <?php if ($subject->getStatusPost() === true) { ?>
                                <a href="index.php?ctrl=forum&action=listMessage&id=<?= $subject->getId() ;?>"><?= $subject->getTheme() ?></a>
                            <?php }else{ ?>
                                <a ><?= $subject->getTheme() ?></a>
                            <?php } ?>
                        </div>

                        <div class="last-reply">
                            <?php echo $subject->getDatePost() ?>
                            <br>Commercé par <b><a href=""><?php echo $subject->getUser()->getPseudo() ?></a></b>
                        </div>

                        <div class="last-reply">
                            <?php if ($subject->getStatusPost() === true) { ?>
                                <a class="btn-unlock" href="index.php?ctrl=forum&action=listMessage&id=<?= $subject->getId() ;?>">Open</a>
                            <?php }else{ ?>
                                <a class="btn-lock">Lock</a>
                            <?php } ?>
                        </div>

                        <?php if (\App\Session::isAdmin()) { ?>
                            <div class="last-reply">
                                <a class="btn-unlock" href="index.php?ctrl=forum&action=modifierSubject">Modifier</a>
                            </div>

                            <div class="last-reply">
                                <a class="btn-lock" href="index.php?ctrl=forum&action=deleteSubject&id=<?= $subject->getId() ;?>">Supprimer</a>
                            </div>
                        <?php }?>
                        
                    </div>
                <?php } ?>
                <!--ends here-->
            </div>

            <?php if (\App\Session::isAdmin()) { ?>
                <form method="POST" action="index.php?ctrl=forum&action=insertSubject&id=<?= $idcategorie ?>">
                    <div class="addmess_title">
                        <label class="label">Sujet</label>
                        <input type="text" name="subject" class="subject">

                        <label class="label">Status</label>
                            <select name="status">
                                <option value="">Select</option>
                                <option value="0">Don't Publish</option>
                                <option value="1">Publish</option>
                            </select>
                        <div class="comment-area" id="comment-area">
                            <label class="label">Message</label>
                            <textarea class="message" type="text" name="message"></textarea>
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn_subject">
                    </div>
                </form>
            <?php }?>

            <!--Pagination starts-->
            <div class="pagination">
                pages: <a href="">1</a><a href="">2</a><a href="">3</a>
            </div>
            <!--pagination ends-->
        <?php } else { ?>
            <h4> Si vous voulez voir les subjet et message, <a href="./view/security/register.php">inscrire vous ici</a></h4>
        <?php } ?>
    </div>



