<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>BTS SIO 2 !</h1>
 
        
        <?php
        while ($donnees = $req->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($donnees['nom']); ?>
                <?= htmlspecialchars($donnees['prenom']); ?>                
            </h3>                   
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>