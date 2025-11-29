<?php

namespace Modules\Serv\Controller;

Class Items extends \Modules\Abs\Controller{

    public function items(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);  
        $mater = new \Modules\Materials\Modul\Materialrepository;
        $this->data_view["materials"] =$mater->findAllActive();
        $bc = new \Modules\Core\Modul\Breadcrumb;
        $this->data_view["bc"] = $bc->show($bc->start());
        $this->list_file[] = APP_ROOT."/modules/core/view/breadcrumbs.php";
        $this->list_file[] = APP_ROOT."/modules/serv/view/items.php";
        $this->show();
        $this->cashe_end();
    }

    public function itemsOpen(){   
        $this->cashe_start();
        if($this->cache_isset) return ;
        \Modules\Core\Modul\Head::load();
        $this->type_show = "default";
        \Modules\Core\Modul\Resource::load_conf($this->type_show);  
        $mater = new \Modules\Materials\Modul\Materialrepository;
        $this->data_view["materials"] =$mater->findAllActive();
        $bc = new \Modules\Core\Modul\Breadcrumb;
        $this->data_view["bc"] = $bc->show($bc->start());
        $this->list_file[] = APP_ROOT."/modules/core/view/breadcrumbs.php";
        $this->list_file[] = APP_ROOT."/modules/serv/view/index.php";
        $this->show();
        $this->cashe_end();
    }

}
