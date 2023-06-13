<?php

namespace Intek3D;

use Intek3D\session\SessionLoader;

use pocketmine\Server;
use pocketmine\plugin\PluginBase; 
use pocketmine\utils\SingletonTrait;

class BOB extends PluginBase {
  
 use SingletonTrait;
 
 protected function onLoad(): void {
   self::setInstance($this);
    }
 public function onEnable(): void {
   $config = BOB::getInstance()->getConfig();
   $this->getLogger()->info("§aTodo Funcionando Correctamente!");
   $this->saveResource("config.yml");
   $this->getServer()->getNetwork()->setName($config->get("motd-server"));
   SessionLoader::load();
  }
  public function onDisable(): void {
    $this->getLogger()->info("§cTodo fue guardado correctamente!");
  }
  public static function getInstance() : BOB {

        return self::$instance;
   }
 }