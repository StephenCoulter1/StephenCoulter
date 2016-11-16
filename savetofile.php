<?php
$log = $_POST['log'];
$description = $_POST['description'];
$fp = fopen("input.txt", "c");
$savestring = $log ."\n". $description. "\n";
fwrite($fp, $savestring);
fclose($fp);

header('Location: thankyou.html');
/*
echo "<h1>Your data has been saved in a text file!</h1>"; */
exit;
?>
