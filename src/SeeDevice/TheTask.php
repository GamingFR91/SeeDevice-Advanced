<?php
namespace SeeDevice;
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\Player;
class TheTask extends Task{
	public function __construct(Plugin $plugin){
		$this->api = $plugin;
	}

	public function onRun($currentTick){
		foreach(Server::getInstance()->getOnlinePlayers() as $player){
			$player->setNameTagVisible();
			$player->setScoreTag("§f\n[§c".$player->getHealth()."§f/" . $player->getMaxHealth() . "]\n§5".$this->api->getUos($player));
		}
	}
}
