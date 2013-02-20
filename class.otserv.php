<?PHP
/*===========================================*\
|| # OTServ Status 1.0                     # ||
|| # -----------------------------------   # ||
|| # Developed by Robson Dias (aka v0id5)  # ||
|| # https://github.com/v0id5/OTServStatus # ||
\*===========================================*/

class OTServStatus {
	
	function Connect($host, $port) {

		$Socket = fsockopen($host, $port, $errno, $errstr, 5);

		if(!$Socket) {
			return false;
		} else {

			stream_set_timeout($Socket, 1);
			stream_set_blocking($Socket, false);

			$SocketData = '';
			fwrite($Socket, chr(6).chr(0).chr(255).chr(255).'info');
			while(!feof($Socket)) {
				$SocketData .= fgets($Socket, 8192);
			}
			$this->SocketData = $SocketData;
			fclose($Socket);

			preg_match('/players online="(\d+)" max="(\d+)"/', $SocketData, $matches);
			$this->PlayersOnline = $matches[1];
			$this->MaxPlayers = $matches[2];

			preg_match('/uptime="(\d+)"/', $SocketData, $matches);
			$this->UptimeHour = floor($matches[1] / 3600);
			$this->UptimeMinutes = floor(($matches[1] - $this->UptimeHour * 3600) / 60);

			preg_match('/monsters total="(\d+)"/', $SocketData, $matches);
			$this->Monsters = $matches[1];

			preg_match('#server="(.*?)" version="(.*?)"#s', $SocketData, $matches);
			$this->ServerSoftware = $matches[1];
			$this->ServerVersion = $matches[2];

			preg_match('#npcs total="(.*?)"#s', $SocketData, $matches);
			$this->NPCs = $matches[1];

			preg_match('#width="(.*?)" height="(.*?)"#s', $SocketData, $matches);
			$this->MapWidth = $matches[1];
			$this->MapHeight = $matches[1];

			preg_match('#servername="(.*?)"#s', $SocketData, $matches);
			$this->ServerName = $matches[1];

			preg_match('#client="(.*?)"#s', $SocketData, $matches);
			$this->ClientVersion = $matches[1];

			return true;
		}
	}
	
	function ServerVersion() {
		return "{$this->ServerSoftware} {$this->ServerVersion}";
	}
	
	function ServerName() {
		return $this->ServerName;
	}
	
	function ClientVersion() {
		return $this->ClientVersion;
	}
	
	function Monsters() {
		$Monsters = (int) $this->Monsters;
		return (!$Monsters ? 0 : $Monsters);
	}
	
	function NPCs() {
		$NPCs = (int) $this->NPCs;
		return (!$NPCs ? 0 : $NPCs);
	}
	
	function UptimeHours() {
		$UptimeHour = (int) $this->UptimeHour;
		return (!$UptimeHour ? 0 : $UptimeHour);
	}
	
	function UptimeMinutes() {
		$UptimeMinutes = (int) $this->UptimeMinutes;
		return (!$UptimeMinutes ? 0 : $UptimeMinutes);
	}
	
	function Players() {
		$Players = (int) $this->PlayersOnline;
		return (!$Players ? 0 : $Players);
	}
	
	function MaxPlayers() {
		$MaxPlayers = (int) $this->MaxPlayers;
		return (!$MaxPlayers ? 0 : $MaxPlayers);
	}
	
	function MapWidth() {
		$MapWidth = (int) $this->MapWidth;
		return (!$MapWidth ? 0 : $MapWidth);
	}
	
	function MapHeight() {
		$MapHeight = (int) $this->MapHeight;
		return (!$MapHeight ? 0 : $MapHeight);
	}

}