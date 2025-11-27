<?php

namespace Modules\Core\Modul;

class Breadcrumb{
    public function start(){
        $breadcrumb = [];
        $pdo = \Modules\Core\Modul\Sql::connect();
        $array_url = \Modules\Router\Modul\Router::$url["d_array"];
        array_pop($array_url);
        $url_list = [];
        $url = "";
        foreach($array_url as $item){
            $url = $url.$item."/";
            $url_list[] = $url;
        }
        $breadcrumb["url"] = $url_list;

        $name_list = [];
        foreach($url_list as $item){
            $sth1 = $pdo->prepare("SELECT * FROM `".\Modules\Core\Modul\Env::get("DB_PREFIX")."heads` WHERE `url` = ? LIMIT 1");
            $sth1->execute(array($item));
            $res = $sth1->fetch(\PDO::FETCH_ASSOC);
            if(isset($res["name_q"]) and ($res["name_q"] != "")){
                $name_list[] = $res["name_q"];
            }else{
                $name_list[] = "Страница без названия";
            }
        }
        $breadcrumb["name"] = $name_list;
        return $breadcrumb;
    }

    public function show($breadcrumb){
        $i = 0;
        $text ="";
        foreach($breadcrumb["url"] as $item){
            if($i == (count($breadcrumb["url"] )-1)){
            $text .= '   <div class="tut_breadcrumbs_007_item">
                            <span class="tut_breadcrumbs_007_current">'.$breadcrumb["name"][$i].'</span>
                        </div>
                    ';

            }else{
            $text .= '   <div class="tut_breadcrumbs_007_item">
                            <a href="'.$breadcrumb["url"][$i].'" class="tut_breadcrumbs_007_link">'.$breadcrumb["name"][$i].'</a>
                            <span class="tut_breadcrumbs_007_separator">/</span>
                        </div>
                    ';

            }
            $i++;
        }
        return $text ;
    }
}