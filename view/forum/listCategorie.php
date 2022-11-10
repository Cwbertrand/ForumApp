<?php

$categories = $result["data"]['categories'];

?>

    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>liste Categories</h1>
                <div class="comment">
                    <button onclick="showComment()">Ajoute Categorie</button>
                </div>
            </div>
            <!--Comment Area-->
        <form method="POST" action="index.php?ctrl=forum&action=insertCategorie">
            <div class="comment-area hide" id="comment-area">
                <input type="text" name="categorie">
                <input type="submit" name="submit" value="ADD">
            </div>
        </form>
            
            <?php foreach($categories as $categorie ){ ?>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        <i class="fa fa-car center"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="index.php?ctrl=forum&action=listSubject&id=<?= $categorie->getId() ;?>"><?= $categorie->getNomCategorie() ?></a></h4>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span>12 Topics</span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <p>  </p>



