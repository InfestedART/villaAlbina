         <select
            class='buscador__input'
            name='buscar_cat'
            id='buscar_cat'
            value='<?php echo $search; ?>'
         >
            <option value=''>Todas las áreas</option>
            <?php
            $areas_array = $areas->result_array();
            foreach ($areas_array as $area) {
               printf("
                  <option value='%s' %s>%s</option>
                  ",
                  $area['id_area'],
                  $search_cat == $area['id_area'] ? 'selected' : '',
                  $area['area']
               );
            }
            ?>
         </select>