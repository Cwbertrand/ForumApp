<?php

$messages = $result["data"]['messages'];
    //var_dump($messages); die;

?>

    <div class="container">
        <form method="POST"  action="index.php?ctrl=forum&action=modifierMessage&id=<?= $messages->getId() ;?>">
                <div class="comment-area" id="comment-area">
                    <label class="label">Message</label>
                    <textarea class="message" type="text" name="editmessage"><?= $messages->getMessage() ;?></textarea>
                </div>
                <input type="submit" value="Save Edit">
            </div>
        </form>
    </div>



