<?php
class CJ_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

		if ($item->description != '') {
			array_push($item->classes, 'has-description');
		}

		if (is_array($item->classes)) {
			$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
		} else {
			$output .= "<li class='" .  $item->classes . "'>";
		}		
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

		if ($item->description != '') {
			$output .= '<span class="sub">';
			$output .= $item->description;
			$output .= '</span>';
		}
        if (isset($args->walker)) {
            if ($args->walker->has_children) {
                $output .= '<i class="fa fa-caret-down menu-mobile-option"></i>';
            }
        }
		
	}
}
?>