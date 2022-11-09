<?php

$subjects = $result["data"]['subjects'];
    
?>

    <div class="container">
        <!--Navigation-->
        <div class="navigate">
            <span><a href="">MyForum - Categorie</a> >> <a href="">les Subjects</a></span>
        </div>
        <!--Display posts table-->
            <div class="posts-table">
                <div class="table-head">
                    <div class="status">Categorie</div>
                    <div class="subjects">Subjects</div>
                    <div class="last-reply">Date de création et par Qui</div>
                </div>
                <?php foreach($subjects as $subject ){ ?>
                    <div class="table-row">
                        <div class="status"><i class="fa fa-fire"></i><span><?= $subject->getCategorie()->getNomCategorie() ;?></span></div>
                        <div class="subjects">
                            <a href="index.php?ctrl=forum&action=listMessage&id=<?= $subject->getId() ;?>"><?= $subject->getTheme() ?></a>
                        </div>

                        <div class="last-reply">
                            <?php echo $subject->getDatePost() ?>
                            <br>Commercé par <b><a href=""><?php echo $subject->getUser()->getPseudo() ?></a></b>
                        </div>
                    </div>
                <?php } ?>
                
                <!--ends here-->
            </div>
        <!--Pagination starts-->
            <div class="pagination">
                pages: <a href="">1</a><a href="">2</a><a href="">3</a>
            </div>
        <!--pagination ends-->
    </div>


