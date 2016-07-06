<?php

namespace App\Lib\Binary\Academy\Smartphone;

class Smartphone {
    protected $name = "Sony Xperia";
    // protected $cpu = array(
    //         "vendor" => "Qualcomm 5555",
    //         "cores"  => 4
    //     );
    // protected $display = array(
    //         "resolution" => "480x320"
    //     );
    protected $camera;
    protected $cpu;
    protected $display;
    protected $battery;
    // /**
    //  * @param Hardware $hw
    //  * @param Periphery $p
    //  */
    // public function __construct(Camera $cam)
    // {
    //     $this->camera  = $cam;
    // }
    public function __construct(Camera $cam, Cpu $cpu, Display $disp, Battery $bat)
    {
        $this->camera = $cam;
        $this->cpu = $cpu;
        $this->display = $disp;
        $this->battery = $bat;

    }
    //Apple iPhone, Qualcomm 5555 2 cores, 480x320 display, 8 megapixels camera, battery capacity 1234 mAh.
    public function getInfo(){
        $infoArray = array(
            'name' => $this->name,
            'battery' => $this->battery->capacity,
            'display' => $this->display->resolution,
            'procVendor'=> $this->cpu->vendor,
            'procCores'=> $this->cpu->cores,
            'camera' => $this->camera->mpixels
            );
        return $infoArray;
        //return array('test' => '11111qweqwe');
    }
}
