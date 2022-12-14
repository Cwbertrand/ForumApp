<?php 
    use App\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/csS/style.css">
    
    <title>FORUM</title>
</head>
<body>
    <div id="wrapper"> 
        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
                <nav class="navbar-home">
                    <div id="nav-left" class="navbar-left">
                        <a href="index.php?ctrl=home&action=/">Accueil</a>
                        <a href="index.php?ctrl=forum&action=listCategorie">Forums</a>

                        <?php
                        //var_dump($_SESSION['user']['role']); die();
                        if(App\Session::isAdmin()){
                            
                            ?>
                            <a href="index.php?ctrl=home&action=users">Voir la liste des gens</a>
                        
                            <?php
                        }
                        ?>
                    </div>
                    <div id="nav-right" class="navbar-right">
                    <?php
                        
                        if(App\Session::getUser()){
                            //var_dump($_SESSION['user']); die();
                            ?>
                            <a href="index.php?ctrl=forum&action=profilePage"><span class="fas fa-user"> &nbsp;&nbsp;</span>Compte&nbsp;<!--(= $_SESSION['user']['pseudo']; ?>)--></a>
                            <a href="\PROJECT%20IN%20PROGRESS/Forum/index.php?ctrl=security&action=logout">Déconnexion</a>
                            
                            <?php
                        }
                        else{
                            
                            ?>
                            <a href="./view/security/login.php">Connexion</a>
                            <a href="./view/security/register.php">Inscription</a>

                            <!--NavBar Section-->
                            <div class="navbar">
                                <div class="brand">My Forum</div>
                            </div>

                            <!--SearchBox Section-->
                            <div class="search-box">
                                <div>
                                    <select name="" id="">
                                        <option value="Everything">Everything</option>
                                        <option value="Titles">Titles</option>
                                        <option value="Descriptions">Descriptions</option>
                                    </select>
                                    <input type="text" name="q" placeholder="search ...">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        <?php
                        }
                
                        
                    ?>
                    </div>
                </nav>
            </header>
            
            <main id="forum">
                <?= $page ?>
            </main>
        </div>
        <footer>
            <p>&copy; 2022 - Forum CDA - <a href="/home/forumRules.html">Règlement du forum</a> - <a href="">Mentions légales</a></p>
            <!--<button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois-->
        </footer>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="<?= PUBLIC_DIR ?>/js/main.js"></script>
    
    <script>

        // $(document).ready(function(){
        //     $(".message").each(function(){
        //         if($(this).text().length > 0){
        //             $(this).slideDown(500, function(){
        //                 $(this).delay(3000).slideUp(500)
        //             })
        //         }
        //     })
        //     $(".delete-btn").on("click", function(){
        //         return confirm("Etes-vous sûr de vouloir supprimer?")
        //     })
        //     tinymce.init({
        //         selector: '.post',
        //         menubar: false,
        //         plugins: [
        //             'advlist autolink lists link image charmap print preview anchor',
        //             'searchreplace visualblocks code fullscreen',
        //             'insertdatetime media table paste code help wordcount'
        //         ],
        //         toolbar: 'undo redo | formatselect | ' +
        //         'bold italic backcolor | alignleft aligncenter ' +
        //         'alignright alignjustify | bullist numlist outdent indent | ' +
        //         'removeformat | help',
        //         content_css: '//www.tiny.cloud/css/codepen.min.css'
        //     });
        // })

        

        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
</body>
</html>