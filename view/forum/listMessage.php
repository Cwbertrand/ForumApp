<?php

$messages = $result["data"]['messages'];
$idtopic = $result["data"]['idtopic'];
?>

<h1>liste messages</h1>

    <div class="container">
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
                        <div class="username"><a href=""><?= $message->getUser() ?></a></div>
                        <div>Role</div>
                        <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                        <div>Points: <u>4586</u></div>
                    </div>
                    <div class="content">
                        <div>Date posté:   <u><?= $message->getCreateAt(); ?></u></div>
                        <p> <?= $message->getMessage() ?> </p>
                    </div>
                </div>
            <?php } ?>

        </div>

        <!--Comment Area-->
        <form method="POST" action="index.php?ctrl=forum&action=insertMessage&id=<?= $idtopic ?>">
            <div class="comment-area" id="comment-area">
                <textarea name="comment" id="" placeholder="comment here ... "></textarea>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>




