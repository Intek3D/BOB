<?php

namespace Intek3D\session;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

use Intek3D\session\SessionLoader;

class SessionPlayer implements SessionLoader {
  
  
  public function onPlayerJoinEvent(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getNameTag();
    
    
  }
}