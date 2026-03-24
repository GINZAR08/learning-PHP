<?php
$input = array("jane", "john", "bunny", "shinji", "asuka","kaisen");
$input2 = array(" Leon Kennedy's jacket", " a canon r6 mark III"," a house","nope give it to charity",
"a nuke for this generation","idk") ;

if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
  header('Content-Type: application/json');
  $rand_keys = array_rand($input, 2);
  echo json_encode(['names' => [$input[$rand_keys[0]], $input[$rand_keys[1]]]]);
  exit;
}


$rand_keys = array_rand($input, 2);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="script2.js"></script>
    <title> GO ARRAY</title>

    <body>
    <h1>list them all well maybe</h1>

<button type="button" id="randbtn" data-names="<?php echo $input[$rand_keys[0]] . ',' . $input[$rand_keys[1]]; ?>">
  what name will you get?
</button>
<br>
 <?php echo "if i was a rich man" . " i would buy " . $input2[array_rand($input2)] . "."; ?>
    </body>
</html>