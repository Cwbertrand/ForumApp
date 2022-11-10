<?php
$idcategorie = $result["data"]['idcategorie'];

?>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h3>Ajoutez un Nouveau Sujet et Ecrivez Votre Premiere message</h3>
            </div>
        </div>
        <!--Comment Area-->
        <form method="POST" action="index.php?ctrl=forum&action=addMessage&id=<?= $idcategorie ?>">
            <div class="margin">
                <label  class="form-label">Sujet</label>
                <input type="text" name="subject" class="form-control"  placeholder="tapez le sujet...">
            </div>
        
            <div class="margin">
                <label  class="form-label">Message</label>
                <textarea name="message" class="form-control" placeholder="ecrire votre premiere message..."></textarea>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
