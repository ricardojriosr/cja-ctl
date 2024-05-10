<?php
function hueman_add_meta_tags() {
    global $post;
    if ( is_singular() ) {
        $des_post = strip_tags( $post->post_content );
        $des_post = strip_shortcodes( $post->post_content );
        $des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
        $des_post = mb_substr( $des_post, 0, 300, 'utf8' );
        echo '<meta name="description" content="' . $des_post . '" />' . "\n";
    }
    if ( is_home() ) {
        echo '<meta name="description" content="' . get_bloginfo( "description" ) . '" />' . "\n";
    }
    if ( is_category() ) {
        $des_cat = strip_tags(category_description());
        echo '<meta name="description" content="' . $des_cat . '" />' . "\n";
    }
}

//add_action( 'wp_head', 'hueman_add_meta_tags');

function hueman_phone_format($phoneNumber, $formatNumber = "0") {

    /*
    0 = (123) 456-7890
    1 = 123.456.7890
    2 = 123-456-7890
    */

    $str = $phoneNumber;
    $chars = str_split($str);
    $response = '';

    $theNumber = "";
    if ($formatNumber == 0) {
        $theNumber = "(";
    } elseif ($formatNumber == 1) {
        $theNumber = "";
    } elseif ($formatNumber == 2) {
        $theNumber = "";
    } else {
        $theNumber = "";
    }
    foreach ($chars as $index => $char) {
        if ($formatNumber == 0) {
            if ($index == 2) {
                $theNumber = $theNumber . $char . ") ";
            } elseif ($index == 5) {
                $theNumber = $theNumber . $char . "-";
            } else {
                $theNumber = $theNumber . $char;
            }            
        } elseif ($formatNumber == 1) {
            if ($index == 2) {
                $theNumber = $theNumber . $char . ".";
            } elseif ($index == 5) {
                $theNumber = $theNumber . $char . ".";
            } else {
                $theNumber = $theNumber . $char;
            } 
        } elseif ($formatNumber == 2) {
            if ($index == 2) {
                $theNumber = $theNumber . $char . "-";
            } elseif ($index == 5) {
                $theNumber = $theNumber . $char . "-";
            } else {
                $theNumber = $theNumber . $char;
            }
        } else {
            $theNumber = $theNumber . $char;
        }
    }
    
    $response = $theNumber;
    return $response;
}

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = implode(",",$rgb);
        }

        //Return rgb(a) color string
        return $output;
}

//Insert HTML after half of the paragraphs in a post
add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
    $ad_code = '<div id="form-container-bg" class="no-home mobile-only additional-form">
    <div id="form-container">
        <h2 class="uppercase f-white">Request Free <span class="f-red">Consultation</span></h2>
        <span class="f-white">To get answers to questions about your injury, contact Catalano Law for a FREE case evaluation. We’ll assess your case, explain your legal options, and recommend the next steps at no cost. We’re here when you need us.</span>
        <div id="form-container-inside-2"></div>
    </div>
    </div>';
    if ( is_single(99999999999) ) {
        return prefix_insert_after_paragraph( $ad_code, $content );
    }
    return $content;
}


// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    $paragraph_id = round(count($paragraphs) / 4);
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}
?>

