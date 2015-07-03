<?php
    function check_wafer_status2($party_number, $wafer_number)
    {
        $link = mysql_connect('localhost', 'user4', 'user4pass')
                or die('Не удалось соединиться: ' . mysql_error());
        mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $link);
        mysql_select_db('db_wafers') or die('Не удалось выбрать базу данных');

        $query = "SELECT * FROM tb_materials WHERE parcel_number = ' . party_number . '";
        $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
        $num_rows = mysql_num_rows($result);

        $retval = "";
        if ($num_rows > 0)
        {
            $retval = "Существует";
        }
        else
        {
            $retval = "Не существует";
        }
        mysql_free_result($result);
        mysql_close($link);

        return $retval;
    }

    function check_wafer_status()
    {
        echo "Hello!";
    }
?>