<br>
<h1 style="text-align:center;">Top 10 Searched Movies</h1>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dvds";
$result = 0;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Title,numbOfSearches FROM `movies`
 ORDER BY numbOfSearches DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row['Title']] = $row['numbOfSearches'];
    }
}

$columns = count($data);
$width = 1070;
$height = 600;
$padding = 5;
$column_width = $width / $columns;
$font = 4;

$img = imagecreatetruecolor($width, $height);

$gray = imagecolorallocate($img, 0xcc, 0xcc, 0xcc);
$gray_lite = imagecolorallocate($img, 0xee, 0xee, 0xee);
$gray_dark = imagecolorallocate($img, 0x7f, 0x7f, 0x7f);
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 0xff, 0xff, 0xff);

imagefill($img, 0, 0, $white);

$max_values = max($data);

for ($i = 0; $i < $columns; $i++) {
    // set the column hieght for each value
    $currentValue = array_values($data)[$i];
    $currentKey = array_keys($data)[$i];

    $column_height = ($height / 100) * (($currentValue / $max_values) * 100) - 20;
    // now the coords
    $x1 = $i * $column_width;
    $y1 = $height - $column_height;
    $x2 = (($i + 1) * $column_width) - $padding;
    $y2 = $height;

    // write the columns over the background
    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $gray);

    // This gives the columns a little 3d effect
    imageline($img, $x1, $y1, $x1, $y2, $gray_lite);
    imageline($img, $x1, $y2, $x2, $y2, $gray_lite);
    imageline($img, $x2, $y1, $x2, $y2, $gray_dark);
    imagestring($img, $font, $x1 + ($column_width) - 20, $y1, $currentValue, $black);
    imagestringup(
        $img, $font, ($x1 + ImageFontWidth($font)),
        ($y2 - ImageFontHeight($font)), $currentKey, $black
    );
}

// Output the graph
imagepng($img, "./img/outputimage.png");
echo "<img src='./img/outputimage.png'>";
// Destroy the graph
imagedestroy($img);
?>
