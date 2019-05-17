         <select
            class='buscador__input'
            name='buscar_cat'
            id='buscar_cat'
            value='<?php echo $search; ?>'
         >
            <option value=''>Todas las categorías</option>
            <?php
            $cat_array = $categorias->result_array();
            foreach ($cat_array as $cat_libro) {
               printf("
                  <option value='%s' %s>%s</option>
                  ",
                  $cat_libro['id_categoriaLibro'],
                  $search_cat == $cat_libro['id_categoriaLibro'] ? 'selected' : '',
                  $cat_libro['categoria']
               );
            }
            ?>
         </select>