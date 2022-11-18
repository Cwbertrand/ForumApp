
        public function modifierSubject($id){
            $messageManager = new MessageManager();
            $subjectManager = new SubjectManager();

            $editSubject = filter_input(INPUT_POST, 'editSubject', FILTER_SANITIZE_SPECIAL_CHARS);
            $editMessage = filter_input(INPUT_POST, 'editMessage', FILTER_SANITIZE_SPECIAL_CHARS);
            $editStatus = filter_input(INPUT_POST, 'editStatus', FILTER_SANITIZE_NUMBER_INT);
            if($editSubject && $editMessage && $editStatus){
                $subjectManager->editSubject($id, $editSubject, $editStatus);
                $messageManager->editMessage($id, $editMessage);
                var_dump($editSubject); die();
            }
            $this->redirectTo('forum', 'listSubject');
        }


                            <!---- EDIT SUBJECT AND MESSAGE  ---->
                                <div class="container">
                                    <form method="POST" action="index.php?ctrl=forum&action=modifierSubject&id=<?= $subject->getId() ;?>">
                                        <div class="addmess_title hide" id="reply-area">
                                            <label class="label">Sujet</label>
                                            <input type="text" name="editText" class="subject">

                                            <label class="label">Status</label>
                                                <select name="editStatus">
                                                    <option value="">Select</option>
                                                    <option value="0">Don't Publish</option>
                                                    <option value="1">Publish</option>
                                                </select>
                                            <div class="comment-area" id="comment-area">
                                                <label class="label">Message</label>
                                                <textarea class="message" type="text" name="editMessage"></textarea>
                                            </div>
                                            <input type="submit" name="submit" value="Submit" class="btn_subject">
                                        </div>
                                    </form>
                                </div>
                            <!---- EDIT SUBJECT AND MESSAGE ENDS ---->



                    <div class="subforum-description subforum-column">
                                <div class="comment btn-unlock">
                                    <a onclick="showReply()" style="cursor: pointer;">Modifier</a>
                                </div>
                            </div>



                            public function editSubject($id, $editSubject, $editStatus){
            $sql = "UPDATE ".$this->tableName."
                    SET theme = :editSubject
                    SET statusPost = :editStatus
                    WHERE id_subject = :id";
                    
            return $this->getOneOrNullResult(
                DAO::update($sql, [
                    'editSubject' => $editSubject,
                    'editStatus' => $editStatus,
                    'id' => $id
                ]),$this->className
            );
        }




        public function editMessage($id, $editMessage){
            $sql = "UPDATE ".$this->tableName."
                    SET message = :editmessage
                    WHERE id_subject = :id";
                    
            return $this->getOneOrNullResult(
                DAO::update($sql, [
                    'editmessage' => $editMessage,
                    'id' => $id
                ]),$this->className
            );
        }