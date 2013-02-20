<?PHP
Include('class.otserv.php');

$OTServ = new OTServStatus();

$Connect = $OTServ->Connect('shadowcores.twifysoft.net', 7171);
if(!$Connect) {
	echo 'server offline';
} else {
	echo "{$OTServ->Players()} / {$OTServ->PlayersMax()}";
}
?>