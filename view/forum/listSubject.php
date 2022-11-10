<?php

$subjects = $result["data"]['subjects'];
$idcategorie = $result["data"]['idcategorie'];
    
?>

    <div class="container">
        <!--Navigation-->
        <div class="navigate">
            <span><a href="">MyForum - Categorie</a> >> <a href="">les Subjects</a></span>
        </div>
        <!--Display posts table-->
            <div class="posts-table">
                <div class="table-head">
                    <div class="status">Status</div>
                    <div class="subjects">Subjects</div>
                    <div class="last-reply">Date de création et par Qui</div>
                    <div class="last-reply">Readable or Not</div>
                </div>
                <?php foreach($subjects as $subject ){ ?>
                    <div class="table-row">
                        <div class="status"><span><?= $subject->showStatusPost() ;?></span></div>
                        <div class="subjects">
                            <a href="index.php?ctrl=forum&action=listMessage&id=<?= $subject->getId() ;?>"><?= $subject->getTheme() ?></a>
                        </div>

                        <div class="last-reply">
                            <?php echo $subject->getDatePost() ?>
                            <br>Commercé par <b><a href=""><?php echo $subject->getUser()->getPseudo() ?></a></b>
                        </div>

                        <div class="last-reply">
                            <?php if ($subject->getStatusPost() === true) { ?>
                                <a href="index.php?ctrl=forum&action=listMessage&id=<?= $subject->getId() ;?>">this is open</a>
                            <?php } ?>
                            <br>Commercé par <b><a href=""><?php echo $subject->getUser()->getPseudo() ?></a></b>
                        </div>
                    </div>
                <?php } ?>

                <form method="POST" action="index.php?ctrl=forum&action=insertSubject&id=<?= $idcategorie ?>">
                <div class="">
                    <label class="">Sujet</label>
                    <input type="text" name="subject">
                    <label class="">Message</label>
                    <textarea class="" type="text" name="message"></textarea>
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
                
                <!--ends here-->
            </div>
        <!--Pagination starts-->
            <div class="pagination">
                pages: <a href="">1</a><a href="">2</a><a href="">3</a>
            </div>
        <!--pagination ends-->
    </div>



