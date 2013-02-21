<?PHP

$code1 = escapeshellcmd($_GET['code1']);
$code2 = escapeshellcmd($_GET['code2']);
$code3 = escapeshellcmd($_GET['code3']);
$code4 = escapeshellcmd($_GET['code4']);
$code5 = escapeshellcmd($_GET['code5']);
$code6 = escapeshellcmd($_GET['code6']);

print($code1);

$command = 'C:\xampp\htdocs\Timetable\Lectures\courseToIcalPrint.py ' . $code1 . $code2 . $code3 . $code4 . $code5 . $code6;
print($command);
$temp = system($command);
print_r($output);


?>