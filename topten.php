<!doctype html>
<html>

<head>
    <title>SMT MOVIE RENTAL</title>
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="
    sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
</head>

<body>
    <?php 
    //* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

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
    $searchTitle = $searchGenre = $searchRating = $searchYear = "";?>
    <div class="container">
        <div class="header justify-content-center">
        <?php require_once 'include/inc_logo.php';?></div>
        <div class="nav justify-content-center">
        <?php require_once 'include/inc_nav_topten.php';?></div>
        <div class="content"><?php require_once 'include/inc_topten.php';?></div>
        <div class="footer"><?php require_once 'include/inc_footer.php';?></div>
    </div>
    <script 
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/
        X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>
    <script src="
        https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-
        UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
        crossorigin="anonymous"></script>
    <script 
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-
        JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
        crossorigin="anonymous"></script>
</body>

</html>
