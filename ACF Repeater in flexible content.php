<?php
// check if the flexible content field has rows of data
if( have_rows('contenuto') ):

     // loop through the rows of data
    while ( have_rows('contenuto') ) : the_row();

        if( get_row_layout() == 'testo' ):

            $content = get_sub_field('blocco_di_testo');

            echo '<div class="text-block"> ' . $content . ' </div>';

            elseif( get_row_layout() == 'video' ): 

                $video = get_sub_field('blocco_video');
                
                echo '<div class="embed-video"> '. $video . ' </div>';

            elseif( get_row_layout() == 'slider' ):

                echo '<div class="bxslider">';
                
                // check if the nested repeater field has rows of data
                if( have_rows('blocco_slider') ):
                
                     // loop through the rows of data
                    while ( have_rows('blocco_slider') ) : the_row();
                
                        $image = get_sub_field('slide');
                        $caption = get_sub_field('didascalia');
                
                        echo '<div><img src="' . $image['url'] . '" alt="' . $image['alt'] . '" /> <div class="image-caption"> ' . $caption .' </div></div>';
                
                    endwhile;
                    
                    echo '</div>';

                endif;
        endif;
    endwhile;
else :

    // no layouts found

endif;
?>
