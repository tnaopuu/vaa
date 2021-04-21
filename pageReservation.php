<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page de réservation</title>
        <link href="style.css" rel="stylesheet" /> 
       <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
        
    <body>
        <h1>Choix adhérents</h1>
            <div class="row">
                <div class="col-3">
                    <p>DATE</p>
                    <input type="date" name="date">
                </div>
            </div>

            <div class="container"> 
                <div class="row">
                    <div class="col-2">
                        <p>1 - FA'AHORO</p>
                    </div>
                    <div class="col-2">
                        <p>2 - MONO FA'AHORO</p>
                    </div>
                    <div class="col-2">
                        <p>3 - TARE</p>
                    </div>
                    <div class="col-2">
                        <p>4 - TURAI</p>
                    </div>
                    <div class="col-2">
                        <p>5 - MONO PEPERU</p>
                    </div>
                    <div class="col-2">
                        <p>6 - PEPERU</p>
                    </div>
                </div>
            </div>

        <!-- on inclut jQuery via CDN -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

        <?php
        while ($donnees = $req->fetch()) {
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

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>