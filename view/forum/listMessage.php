<?php

$messages = $result["data"]['messages'];
$idtopic = $result["data"]['idtopic'];
?>

<h1>liste messages</h1>

    <div class="container">
        <!--Navigation-->
        <div class="navigate">
            <span> <a href="index.php?ctrl=forum&action=listSubject&id=<?= $idtopic ;?>">les Subjects</a> >> <a href="index.php?ctrl=forum&action=listCategorie">MyForum - Categorie</a> >> <a href="">les Subjects</a></span>
        </div>
        <!--Topic Section-->
        <div class="topic-container">
            <!--Original thread-->
            <div class="head">
                <div class="authors">Author</div>
                <div class="content">Topic: random topic</div>
            </div>

            <?php foreach($messages as $message){ ?>
                <div class="body">
                    <div class="authors">
                        <div class="username"><a href=""><?= $message->getUser()->getPseudo() ?></a></div>
                        <div>Role</div>
                        <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                        <div>Points: <u>4586</u></div>
                    </div>
                    <div class="content">
                        <div>Date posté:   <u><?= $message->getCreateAt(); ?></u></div>
                        <p> <?= $message->getMessage() ?> </p>
                    </div>
                    <div class="subforum-description subforum-column">
                        <div class="comment btn-unlock">
                            <a href="index.php?ctrl=forum&action=editmessage&id=<?= $message->getId() ?>" style="cursor: pointer;"> Modifier </a>
                        </div>
                    </div>
        </div>
            <?php } ?>

        </div>

        <!--Comment Area-->
        <form method="POST" action="index.php?ctrl=forum&action=insertMessage&id=<?= $idtopic ?>">
            <div class="comment-area" id="comment-area">
                <textarea name="comment" id="" placeholder="comment here ... "></textarea>
                <input type="submit" name="submit" value="Comment">
            </div>
        </form>
    </div>




