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
    $ad_code = '<br><div id="form-container-bg" class="no-home mobile-only additional-form">
    <div id="form-container">
        <h2 class="uppercase f-white">Request Free <span class="f-red">Consultation</span></h2>
        <div class="form-caption"><p class="text-white">To get answers to questions about your injury, contact Catalano Law for a FREE case evaluation. We’ll assess your case, explain your legal options, and recommend the next steps at no cost. We’re here when you need us.</p></div>
        <div id="form-container-inside"></div>
    </div>
    </div><br>';
    // echo do_shortcode('[gravityform id="1"]');
    
    if (( is_singular(array( 'practice-areas'))) && (catalanowins_detect_is_mobile())) {
        return prefix_insert_after_paragraph( $ad_code, $content );
    }
        
    return $content;
}


// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    $paragraph_id = round(count($paragraphs) / count($paragraphs));
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

function even($n) {
    if (!is_int($n)) {return 'n';}
    return !($n % 2);
}


function catalanowins_detect_is_mobile() {
    $response = false;
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
        $response = true;
    }
    return $response;
}

?>


