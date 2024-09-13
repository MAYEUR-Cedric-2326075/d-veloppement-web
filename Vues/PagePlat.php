<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Tenrac</title>
    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        
        <?php
        $link = mysqli_connect('localhost', 'mysql_username', 'mysql_passwd')
		 or die('Probleme de connexion au serveur: ' . mysqli_connect_error());
		mysqli_select_db($link, 'my_dbname') or die ('Probleme de sélection BD : ' . mysqli_error($link));
		$query = 'SELECT nom FROM tentac WHERE id = 1';
		$result = mysqli_query($link, $query);
		if (!$result)
		{
		 echo 'Impossible d\'exécuter la requête ', $query, ' : ', mysqli_error($link);
		}
		else
		{
		 if (mysqli_num_rows($result) != 0)
		 {
		 while ($row = mysqli_fetch_assoc($result))
		 {
		 echo $row['username'];
		 }
		 }
		}
		?>
		
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>
