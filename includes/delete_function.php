<?php
include("../../includes/db.php");
$query = "DELETE FROM tournament WHERE name={$_POST['usn']} LIMIT 1";
mysql_query ($query);

if (mysqli_affected_rows() == 1) {
?>

            <strong>Contact Has Been Deleted</strong><br /><br />

<?php
 } else {
?>

            <strong>Deletion Failed</strong><br/><br/>


<?php
}
?>