
<div class="tut_001_container scale-container">
        <section class="tut_001_second_section">
            <div class="tut_001_cards_container">
            <?php
foreach($this->data_view["repoService"] as $itemService){
    echo '
                <a class="tut_001_card appearance-effect" href="'.$itemService->getWebsiteUrl().'">
                    <img src="'.\Modules\Serv\Modul\Servicemove::takeImg($itemService).'" alt="'.$itemService->getName().'" class="tut_001_card_image">
                    <div class="tut_001_card_overlay">
                        <div class="tut_001_card_content">
                            <h3 class="tut_001_card_title">'.$itemService->getName().'</h3>
                        </div>
                    </div>
                </a>';
}
            ?>
                
            </div>
        </section>    
    </div>