<?php

namespace Intek3D\session;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\level\sound\GhastShootSound;

use Intek3D\session\SessionLoader;
use Inten3D\BOB;

class SessionPlayer implements SessionLoader {
  
  
  public function onPlayerJoinEvent(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getNameTag();
    $config = BOB::getInstance()->getConfig();
    $mensaje = str_replace("{nick}", $nick, $config->get("player-join"));
    $event->setJoinMessage($mensaje);
    $player->sendTitle($config->get("join-title"));
    $player->sendMessage($config->get("welcome-message"));
    $player->setFood(20);
    $player->setHealth(20);
    $player->getLevel()->addSound(new GhastShootSound($player));
    $player->teleport($this->getServer()->getDefaultLevel()->getSafeSpawn());
  }
  public function onPlayerQuitEvent(PlayerQuitEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getNameTag();
    $config = BOB::getInstance()->getConfig();
    $mensaje = str_replace("{nick}", $nick, $config->get("player-leave"));
    $event->setQuitMessage($mensaje);
    
  }
}