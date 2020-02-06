<br>
<h1 style="text-align:center;">Movie Search</h1>
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
$nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["inputsearchTitle"])) {
        $searchTitle = "";
    } else {
        $searchTitle = Test_input($_POST["inputsearchTitle"]);
    }
    if (empty($_POST["inputSearchGenre"])) {
        $searchGenre = "";
    } else {
        $searchGenre = Test_input($_POST["inputSearchGenre"]);
    }
    if (empty($_POST["inputSearchRating"])) {
        $searchRating = "";
    } else {
        $searchRating = Test_input($_POST["inputSearchRating"]);
    }
    if (empty($_POST["inputSearchYear"])) {
        $searchYear = "";
    } else {
        $searchYear = Test_input($_POST["inputSearchYear"]);
    }
}

/**
 * Tests the data from input
 *
 * @param string $data the string to quote
 *
 * @return string the integer of the set mode used. FALSE if foo
 *             foo could not be set.
 *
 * @access     public
 * @static
 * @see        Net_Sample::$foo, Net_Other::someMethod()
 * @since      Method available since Release 1.2.0
 * @deprecated Method deprecated in Release 2.0.0
 */
function Test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <div class="form-group row">
        <label for="searchTitle" class="col-sm-2 col-form-label">Search Term:</label>
        <div class="col-sm-10">
            <input class="form-control" id="inputsearchTitle" name="inputsearchTitle"
                placeholder="Please Enter A Search Term">
        </div>
    </div>
    <div class="form-group row">
        <label for="searchGenre" class="col-sm-2 col-form-label">Search Genre:
        </label>
        <div class="col-sm-10">
            <input class="form-control" id="inputSearchGenre" name="inputSearchGenre"
                placeholder="Please Enter A Search Genre">
        </div>
    </div>
    <div class="form-group row">
        <label for="searchRating" class="col-sm-2 col-form-label">Search Rating :
        </label>
        <div class="col-sm-10">
            <input class="form-control" id="inputSearchRating" 
            name="inputSearchRating" placeholder="Please Enter A Search Rating">
        </div>
    </div>
    <div class="form-group row">
        <label for="searchYear" class="col-sm-2 col-form-label">Search Year:</label>
        <div class="col-sm-10">
            <input class="form-control" id="inputSearchYear" name="inputSearchYear"
                placeholder="Please Enter A Search Year">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
