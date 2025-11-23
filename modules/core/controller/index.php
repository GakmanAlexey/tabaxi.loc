<?php

namespace Modules\Core\Controller;

Class Index extends \Modules\Abs\Controller{
    public function index(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        //$this->verify("auth");
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);        
        $this->list_file[] = APP_ROOT."/modules/core/view/hero.php";
        $this->list_file[] = APP_ROOT."/modules/core/view/blocks.php";
        $this->list_file[] = APP_ROOT."/modules/core/view/jsindex.php";
        $this->show();
        $this->cashe_end();
    }

}
