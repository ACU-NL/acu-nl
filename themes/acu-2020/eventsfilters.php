<div id="AgendaFilters">
<?php
    $args = array('hide_empty' => false);
    $terms = get_terms('event-categories', $args);
    $count = count($terms);
    if ( $count > 0 ){

        foreach ( $terms as $term ) {

            $termname = strtolower($term->name);
            $termname = str_replace(' ', '-', $termname);
            echo '<div class="filter ' . $termname . '"><a href="#filter=.'.$termname.'" title="" data-filter=".'.$termname.'"><span>'.$term->name.'</span></a></div>';
        }
    }
    echo '<div class="filter"><a href="#filter=*" title="" class="UnFilter">Show me everything!</a></div>';
?>
</div>