OTServStatus
============

PHP Class created to facilitate checking the status of your server. 

## How to use

```php
Include('class.otserv.php');

$OTServ = new OTServStatus();

$Connect = $OTServ->Connect('shadowcores.twifysoft.net', 7171);
if(!$Connect) {
  echo 'server offline';
} else {
	echo "{$OTServ->Players()} / {$OTServ->PlayersMax()}";
}
```
