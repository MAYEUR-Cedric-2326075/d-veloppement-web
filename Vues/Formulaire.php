<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Tenrac</title>
    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        
        <form action="???.php" method="post">
		<input type="nom"  name="nom" size="20" />
		<input type="email"  name="email" size="20" />
		<input type="telephone"  name="telephone" size="20" />
		<input type="addresse"  name="addresse" size="20" />
		<input type="submit" value="Submit" />
		<input type="reset" value="Reset" />
		</form>
		
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>
