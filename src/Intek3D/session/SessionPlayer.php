<?php

namespace Intek3D\session;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\world\sound\BlazeShootSound;

use Intek3D\session\SessionLoader;
use Inten3D\BOB;

class SessionPlayer implements Loader {
  
  
  public function onPlayerJoinEvent(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getNameTag();
    $world = $player->getWorld();
    $config = BOB::getInstance()->getConfig();
    $mensaje = str_replace("{nick}", $nick, $config->get("player-join"));
    $event->setJoinMessage($mensaje);
    $title = str_replace("{nick", $nick, $config->get("player-title"));
    $player->sendTitle($config->get($title));
    $player->sendMessage($config->get("welcome-message"));
    $player->setHealth(20);
    $player->getWorld()->addSound($player->getPosition(), new BlazeShootSound());
    $player->teleport($this->getServer()->getDefaultWorld()->getSafeSpawn());
  }
  public function onPlayerQuitEvent(PlayerQuitEvent $event){
    $player = $event->getPlayer();
    $nick = $player->getNameTag();
    $config = BOB::getInstance()->getConfig();
    $mensaje = str_replace("{nick}", $nick, $config->get("player-leave"));
    $event->setQuitMessage($mensaje);
    
  }
}