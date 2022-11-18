<?php

$subjects = $result["data"]['subjects'];
    //var_dump($messages); die;
    //var_dump($subjects); die;

?>

    <div class="container">
        <form method="POST"  action="index.php?ctrl=forum&action=modifierSubject&id=<?= $subjects->getId() ;?>">
            <div class="addmess_title">
                <label class="label">Sujet</label>
                <input type="text" name="editsubject" class="subject" value="<?php echo $subjects->getTheme() ?>">

                <label class="label">Status</label>
                    <select name="editStatus">
                        <option value="">Select</option>
                        <option value="0">Don't Publish</option>
                        <option value="1">Publish</option>
                        
                    </select>
                    
                <input type="submit" value="Save Edit">
            </div>
        </form>
    </div>



