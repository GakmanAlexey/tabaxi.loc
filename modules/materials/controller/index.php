<?php

namespace Modules\Materials\Controller;

Class Index extends \Modules\Abs\Controller{

    public function index(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);  
        $mater = new \Modules\Materials\Modul\Materialrepository;
        $this->data_view["materials"] =$mater->findAllActive();
        $this->list_file[] = APP_ROOT."/modules/core/view/breadcrumbs.php";
        $this->list_file[] = APP_ROOT."/modules/materials/view/index.php";
        $this->show();
        $this->cashe_end();
    }

    public function openMaterial(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);  
        $mater = new \Modules\Materials\Modul\Materialopen;
        $this->data_view["materialOpenData"] =$mater->start();
        $this->list_file[] = APP_ROOT."/modules/core/view/breadcrumbs.php";
        $this->list_file[] = APP_ROOT."/modules/materials/view/openmaterial.php";
        $this->show();
        $this->cashe_end();
    }


    public function openTest(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);    
        $this->list_file[] = APP_ROOT."/modules/core/view/breadcrumbs.php";
        $this->list_file[] = APP_ROOT."/modules/materials/view/opentest.php";
        $this->show();
        $this->cashe_end();
    }

    public function openTest2(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);    
        $this->list_file[] = APP_ROOT."/modules/core/view/breadcrumbs.php";
        $this->list_file[] = APP_ROOT."/modules/materials/view/opentest2.php";
        $this->show();
        $this->cashe_end();
    }

}
