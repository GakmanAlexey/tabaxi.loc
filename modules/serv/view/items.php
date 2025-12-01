

<?php  
        echo '
     <div class="tut_006_container scale-container">
        <div class="tut_006_content" id="">
            <section class="tut_006_section" id="">
                <table class="tut_006_vertical_table ">';
                 $countTR=0;
                    foreach($this->data_view["itemList"] as $tableItem){                        
                        echo '<tr>';  
                        foreach($tableItem as $item){
                            if($countTR == 0){ 
                            echo '<th>'.$item.'</th>';
                            }else{
                            echo '<td>'.$item.'</td>';
                            }
                        }                         
                        $countTR++;
                    }
        echo '    
                </table>
            </section>
        </div>
    </div>';
    ?>