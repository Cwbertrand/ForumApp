<?php

//$subjects = $result["data"]['subjects'];
//$idcategorie = $result["data"]['idcategorie'];
    
?>

    <div class="container">
        <form method="POST" action="index.php?ctrl=forum&action=modifierSubject&id=">
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
    </div>



