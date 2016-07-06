<?php

namespace App\Lib\Binary\Academy\Computer;

class Computer {
    protected $hardware;
    protected $periphery;

/*    *
     * @param Hardware $hw
     * @param Periphery $p
     */
    public function __construct(Hardware $hw, Periphery $p)
    {
        $this->hardware  = $hw;
        $this->periphery = $p;
    }
}
