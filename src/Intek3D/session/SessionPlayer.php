<?php

namespace Intek3D\session;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\world\sound\BlazeShootSound;

use Intek3D\session\SessionLoader;
use Intek3D\BOB;

class SessionPlayer implements Listener {
  
  
  public function onPlayerJoinEvent(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getName();
    $world = $player->getWorld();
    $config = BOB::getInstance()->getConfig();
    $mensaje = str_replace("{nick}", $nick, $config->get("player-join"));
    $event->setJoinMessage($mensaje);
    $title = str_replace("{nick}", $nick, $config->get("player-title"));
    $player->sendTitle($title);
    $player->sendMessage($config->get("welcome-message"));
    $player->setHealth(20);
    $player->getWorld()->addSound($player->getPosition(), new BlazeShootSound());
    $player->teleport(Server::getInstance()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
  }
  public function onPlayerQuitEvent(PlayerQuitEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getName();
    $config = BOB::getInsfixtance()->getConfig();
    $mensaje = str_replace("{nick}", $nick, $config->get("player-leave"));
    $event->setQuitMessage($mensaje);
    
  }
}