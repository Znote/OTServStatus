## How to use
Here you can view how to use this class, and fetch data from your server.

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

## Current Functions
* **$OTServ->Players()** = Returns total of players online.
* **$OTServ->PlayersMax()** = Returns max players online of server.
* **$OTServ->ServerVersion()** = Returns current distro version. (Ex: The Forgotten Server 0.4_DEV)
* **$OTServ->Monsters()** = Returns current total monsters on server.
* **$OTServ->NPCs()** = Returns current total number of npcs on server.
* **$OTServ->UptimeHours()** = Return current uptime hours.
* **$OTServ->UptimeMinutes()** = Returns current uptime minutes.
* **$OTServ->MapWidth()** = Returns server map width.
* **$OTServ->MapHeight()** = Returns server map height.
* **$OTServ->ServerName()** = Returns current server name.
* **$OTServ->ClientVersion()** = Returns current server client version (Ex: 8.62, 9.81)
