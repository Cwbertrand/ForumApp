<?php

$subjects = $result["data"]['subjects'];
$idcategorie = $result["data"]['idcategorie'];
    //var_dump($subjects['theme']); die;
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
                    <div class="last-reply">Modifier</div>
                    <div class="last-reply">Supprimer</div>
                </div>

                <?php foreach($subjects as $subject ){ ?>

                    <div class="table-row">
                        <div class="status"><span><?= $subject->showStatusPost() ;?></span></div>
                        <div class="subjects">
                            <?php if ($subject->getStatusPost() == 1) { ?>
                                <a href="index.php?ctrl=forum&action=listMessage&id=<?= $subject->getId() ;?>"><?= $subject->getTheme() ?></a>
                            <?php }else{ ?>
                                <a href="index.php?ctrl=forum&action=lockSubject&id=<?= $subject->getId() ;?>"><?= $subject->getTheme() ?></a>
                            <?php } ?>
                        </div>

                        <div class="last-reply">
                            <?php echo $subject->getDatePost() ?>
                            <br>Commercé par <b><a href=""><?php echo $subject->getUser()->getPseudo() ?></a></b>
                        </div>
                        <?php if ($subject->getStatusPost() == 1 && $_SESSION['user']->getId() === $subject->getUser()->getId() || \App\Session::isAdmin()) { ?>
                            <div class="last-reply">
                                <a class="btn-unlock" href="index.php?ctrl=forum&action=unlockSubject&id=<?= $subject->getId() ;?>">Open</a>
                            </div>
                        <?php }else{ ?>
                            <div class="last-reply">
                                <a class="btn-lock" href="index.php?ctrl=forum&action=lockSubject&id=<?= $subject->getId() ;?>">Closed</a>
                            </div>
                        <?php } ?>

                        <?php if (\App\Session::isAdmin() || \App\Session::getUser()->getId() === $subject->getUser()->getId()) { ?>
                            <div class="subforum-description subforum-column">
                                <div class="comment btn-unlock">
                                    <a href="index.php?ctrl=forum&action=editSubject&id=<?= $subject->getId() ;?>" style="cursor: pointer;"> Modifier </a>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="subforum-description subforum-column">
                                    <div class="comment ">
                                    <a class="btn-lock" href="index.php?ctrl=forum&action=lockSubject&id=<?= $subject->getId() ;?>">Closed</a>
                                    </div>
                                </div>
                        <?php } ?>
                        <?php if (\App\Session::isAdmin() || \App\Session::getUser()->getId() === $subject->getUser()->getId()) { ?>
                            <div class="last-reply">
                                <a class="btn-lock" href="index.php?ctrl=forum&action=deleteSubject&id=<?= $subject->getId() ;?>">Supprimer</a>
                            </div>
                        <?php }else{ ?>
                            <div class="last-reply">
                                <a class="btn-lock" href="">Block</a>
                            </div>
                        <?php } ?>
                        
                    </div>
                <?php } ?>
                <!--ends here-->
            </div>


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

            <!--Pagination starts-->
            <div class="pagination">
                pages: <a href="">1</a><a href="">2</a><a href="">3</a>
            </div>
            <!--pagination ends-->
        <?php } else { ?>
            <h4> Si vous voulez voir les subjet et message, <a href="./view/security/register.php">inscrire vous ici</a></h4>
        <?php } ?>
    </div>



