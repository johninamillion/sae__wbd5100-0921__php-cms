<?php

namespace Application;

abstract class Session {

    public static function start() : void {
        session_start();
    }

}
