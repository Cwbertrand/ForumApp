<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscrire</title>
    <link rel="stylesheet" href="../../public/css/registerlogin.css">
</head>

<body>
<div class="contain_register">
        <form class="register_page" method="post" action="\PROJECT%20IN%20PROGRESS/Forum/index.php?ctrl=security&action=register">
            <div class="pseudo column">
                <label>Pseudo</label>
                <input type="text" name="pseudo" placeholder="ecrire votre prénom..." required>
            </div>
            <div class="email column">
                <label>Email</label>
                <input type="email" name="email" placeholder="ecrire votre email..." required>
            </div>
            <div class="password column">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="ecrire votre mot de passe..." required>
            </div>
            <div class="comfirm_password column">
                <label>Confirmation de mot de passe</label>
                <input type="password" name="confirmPassword" placeholder="confirmez votre mot de passe..." required>
            </div>
            <button type="submit" class="btn-inscrire">Inscrirez Vous </button>
        </form>
        <p class="alreadyAcct">
            Vous avez déjà un compte?
            <span><a href="login.php">Connectez vous ici!</a></span>
        </p>
    </div>
</body>

</html>