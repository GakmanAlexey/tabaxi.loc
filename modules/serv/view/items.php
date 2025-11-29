

<?php  

$array = [];
$array[] = ["img","id","name","price","weight","rary","url"];  
$array[] = ["img","id","name","price","weight","rary","url"];  
 $tableArray = $array;
        echo '
     <div class="tut_006_container scale-container">
        <div class="tut_006_content" id="">
            <section class="tut_006_section" id="">
                <table class="tut_006_vertical_table tut_006_vertical_table_w70">';
                 $countTR=0;
                    foreach($tableArray as $tableItem){                        
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