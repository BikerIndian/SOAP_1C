<?php
/*
  # ***********************************************
  #  Soap TEST Server
  #  Date: 07.09.2017
  #  v1.00
  #  Authors:
  #  Vladimir Svishch (IndianBiker)  <mail:5693031@gmail.com>
  #  https://github.com/BikerIndian/SOAP_1C
  # ***********************************************
 */
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>TEST Soap</title>
    </head>
    <body>


        <?php
        error_reporting(E_ALL);
        echo "<h1>SOAP</h1>";

        $url = "https://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL";
        ?>
        <form method="POST">
            <input name="url" type="text" size="60"  value="<?= isset($_REQUEST['url']) ? $_REQUEST['url'] : $url; ?>"/>
            <br>
            <input type="submit" value="TEST">

        </form>
        <br>
        <?php
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        ini_set('soap.wsdl_cache', 0);
        if (isset($_REQUEST['url'])) {
            $url = $_REQUEST['url'];
            soap_load($url);
        }
        ?> 
        <br>
        <table border=0 align="center"> 
            <tr>
                <td><a href="https://github.com/BikerIndian/SOAP_1C">GitHub Project</a>
                </td>
            </tr>            
            <tr align="center">
                <td>Vladimir Svishch, 2017, mail:  <a href="mailto:5693031@gmail.com" class="in_link">5693031@gmail.com</a>
                </td>
            </tr>

        </table>
    </body>
</html>

<?php

function soap_load($url) {
    $client = new SoapClient($url);

    echo "<table border=1> ";
    echo "<tr><td>";
    echo "__getTypes";
    echo "</td><td>";
    print "<pre>";
    print_r($client->__getTypes());
    print "</pre>";
    echo "</td>";

    echo "<tr><td>";
    echo "__getFunctions \n";
    echo "</td><td>";
    print "<pre>";
    print_r($client->__getFunctions());
    print "</pre>";
    echo "</td>";

    echo "<tr><td>";
    echo "__getLastRequestHeaders \n";
    echo "</td><td>";
    print "<pre>";
    print_r($client->__getLastRequestHeaders());
    print "</pre>";
    echo "</td>";

    echo "<tr><td>";
    echo "__getLastRequests \n";
    echo "</td><td>";
    print "<pre>";
    print_r($client->__getLastRequest());
    print "</pre>";
    echo "</td>";

    echo "<tr><td>";
    echo "__getLastResponseHeaders \n";
    echo "</td><td>";
    print "<pre>";
    print_r($client->__getLastResponseHeaders());
    print "</pre>";
    echo "</td>";

    echo "<tr><td>";
    echo "__getLastResponse \n";
    echo "</td><td>";
    print "<pre>";
    print_r($client->__getLastResponse());
    print "</pre>";
    echo "</td>";

    echo "</tr>";
    echo "</table>";
}
