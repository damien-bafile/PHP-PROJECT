<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */

/**
 * Prepairs statement
 */ 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dvds";
$result = 0;
$search = false;

if (($searchTitle != "") 
    || ($searchGenre != "") 
    || ($searchRating != "") 
    || ($searchYear != "")
) {
    try {
        /**
* Create Connection 
*/  
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
/**
 * Search Title 
*/
        if (($searchTitle != "") 
            && ($searchGenre == "") 
            && ($searchRating == "") 
            && ($searchYear == "")
        ) {   
            $sql = "SELECT * FROM movies WHERE Title LIKE '%" . $searchTitle . "%';";
            $search = true;
        } elseif
                    /**
 * Search Genre with Title
*/  
        (($searchTitle != "") 
            && ($searchGenre != "") 
            && ($searchRating == "") 
            && ($searchYear == "")
        ) {
            $sql = "SELECT * FROM movies WHERE `Title` LIKE '%" . $searchTitle . "%' AND `Genre` = '" . $searchGenre . "';";
            $search = true;
        } elseif 
        /**
* Search by Genre, Rating, Year
*/ 
            (($searchTitle == "") 
            && ($searchGenre != "") 
            && ($searchRating != "") 
            && ($searchYear != "")
        ) { 
            $sql = "SELECT * FROM movies WHERE `Genre` = '" . $searchGenre . "' AND 
            `Rating` = '" . $searchRating . "' AND `Year` = " . $searchYear . ";";
            $search = true;
        } else {

            echo "<h1>Sorry no movied found</h1>";
            echo "<p><h2>Search Options</h2>";
            echo "<ul class=\"list-group\">";
            echo "<li class=\"list-group-item\">Search movies by <b>Genre</b> 
            (Comedy or SciFi) with <b>Rating</b> (PG) in <b>Year</b> 1995<br>";
            echo "<li class=\"list-group-item\">Search by <b>Title</b></li>";
            echo "<li class=\"list-group-item\">Search by <b>Genre</b> with <b>Title</b></li>";

            echo "</ul></p><br>";
        }
        echo $sql;

        if ($search == true) {
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table class=\"table\">";
                echo "<thead class=\"thead-dark\">";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Title</th>";
                echo "<th>Studio</th>";
                echo "<th>Status</th>";
                echo "<th>Sound</th>";
                echo "<th>Versions</th>";
                echo "<th>RecRetPrice</th>";
                echo "<th>Rating</th>";
                echo "<th>Year</th>";
                echo "<th>Genre</th>";
                echo "<th>Aspect</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Title"] . 
                    "</td><td>" . $row["Studio"] . "</td><td>" . $row["Status"] . 
                    "</td><td>" . $row["Sound"] . "</td><td>" . $row["Versions"] . 
                    "</td><td>" . $row["RecRetPrice"] . " </td><td>" . 
                    $row["Rating"] . "</td><td>" . $row["Year"] . "</td><td>" . 
                    $row["Genre"] . "</td><td>" . $row["Aspect"] . 
                    "</td></tr>";
                    $sqlIncrement = "UPDATE `movies` SET numbOfSearches = 
                    numbOfSearches + 1 WHERE ID=" . $row["ID"] . ";";
                    $conn->query($sqlIncrement);
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<h1><b>0 Movies Found</b></h1>";
            }
            $conn->close();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
