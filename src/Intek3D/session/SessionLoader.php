<?php

namespace Intek3D\session;

use Intek3D\session\SessionPlayer;
use Intek3D\BOB;

class SessionLoader {
  
  public static function load() : void {

        BOB::getInstance()->getServer()->getPluginManager()->registerEvents(new SessionPlayer(), BOB::getInstance());
  }
}
