<!DOCTYPE html>

<html>
<head>
<title>TIMECALC</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/ilw/resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/ilw/resources/css/bootstrap-responsive.min.css">
</head>
<body>

<center>
<h1>Your timetable has been generated!</h1>
<h3>Click <a href="Lectures\Timetable.ics">here</a> to download.</h3>

<?PHP

$code1 = escapeshellcmd($_GET['code1']);
$code2 = escapeshellcmd($_GET['code2']);
$code3 = escapeshellcmd($_GET['code3']);
$code4 = escapeshellcmd($_GET['code4']);
$code5 = escapeshellcmd($_GET['code5']);
$code6 = escapeshellcmd($_GET['code6']);

//print($code1);
chdir('Lectures');
$command = 'coursesToIcal.py ' . $code1 . ' ' . $code2 . ' ' . $code3 . ' ' . $code4 . ' ' . $code5 . ' ' . $code6;
//print($command);
$temp = exec($command, $output);


?>
</center>
</div>
</body>
</html>