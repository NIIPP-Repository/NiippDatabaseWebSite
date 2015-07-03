<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NIIPP Database WebSite</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header" style="margin-bottom: 40px;">
        <ul class="nav nav-pills">
            <li class="active"><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php
            		$link = mysql_connect('localhost', 'user4', 'user4pass')
            			or die('Не удалось соединиться: ' . mysql_error());
            		mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $link);

            		mysql_select_db('db_wafers') or die('Не удалось выбрать базу данных');
            		$query = 'SELECT * FROM tb_people_hardware_address';
            		$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
            		echo '<table class = "table table-bordered">';

            		echo '<tr style = "background-color: #FFDEAD;">';
            		echo "\t\t<td><b>#</b></td>\n";
					echo "\t\t<td><b>Фамилия и имя сотрудника</b></td>\n";
					echo "\t\t<td><b>Mac-адрес компьютера</b></td>\n";
					echo "\t</tr>\n";

					$num = 0;
            		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            			$num = $num + 1;
                        $curr_color = '';
                        if ( ($num % 2) == 0)
                        {
                            $curr_color = ' style = "background-color: #FAEBD7;"';
                        }
                        echo "\t<tr$curr_color>\n";

                        echo "\t\t<td>$num</td>\n";
            			foreach ($line as $col_value) {
            				echo "\t\t<td>$col_value</td>\n";
            			}
            			echo "\t</tr>\n";
            		}
            		echo "</table>\n";
            		mysql_free_result($result);
            		mysql_close($link);
            ?>
        </div>
    </div>

    <div class="footer">
        <p>&copy; NIIPP 41 lab 2015</p>
    </div>

</div> <!-- /container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
