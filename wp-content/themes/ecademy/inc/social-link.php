<?php
/**
 * Social Link
 * @package WordPress
 * @subpackage eCademy
*/

if ( ! function_exists( 'ecademy_social_link' ) ) :
    function ecademy_social_link(){
        global $ecademy_opt;

        if( isset( $ecademy_opt['ecademy_social_target'] ) ) {
            $target = $ecademy_opt['ecademy_social_target'];
        }else {
            $target = '_blank';
        }
        ?>
        <ul class="social-link">
            <?php if (isset($ecademy_opt['twitter_url'] ) && $ecademy_opt['twitter_url']) { ?>
                <li>
                    <a class="d-block twitter" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['twitter_url']);?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path opacity="1" fill="#1E3050" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
                </li>
            <?php  } ?>


            <?php if (isset($ecademy_opt['facebook_url'] ) && $ecademy_opt['facebook_url']) { ?>
                <li>
                    <a class="d-block facebook" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['facebook_url']); ?>"> <i class="bx bxl-facebook"></i></a>
                </li>
            <?php  } ?>

            <?php if (isset($ecademy_opt['instagram_url'] ) && $ecademy_opt['instagram_url'] ) { ?>
                <li>
                    <a class="d-block instagram" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['instagram_url']); ?>"> <i class="bx bxl-instagram"></i></a>
                </li>
            <?php  } ?>

            <?php
            if (isset($ecademy_opt['linkedin_url'] ) && $ecademy_opt['linkedin_url'] ) { ?>
            <li>
                <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['linkedin_url']);?>" > <i class="bx bxl-linkedin"></i></a>
            </li>
            <?php  } ?>

            <?php
            if (isset($ecademy_opt['pinterest_url'] ) && $ecademy_opt['pinterest_url'] ) { ?>
            <li>
                <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($ecademy_opt['pinterest_url']);?>" > <i class="bx bxl-pinterest"></i></a>
            </li>
            <?php  } ?>

            <?php if (isset($ecademy_opt['dribbble_url'] ) && $ecademy_opt['dribbble_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($ecademy_opt['dribbble_url']);?>" > <i class="bx bxl-dribbble"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($ecademy_opt['tumblr_url'] ) && $ecademy_opt['tumblr_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['tumblr_url']);?>" > <i class="bx bxl-tumblr"></i></a>
                </li>
            <?php } ?>

            <?php
            if (isset($ecademy_opt['youtube_url'] ) && $ecademy_opt['youtube_url'] ) { ?>
            <li>
                <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['youtube_url']);?>" > <i class="bx bxl-youtube"></i></a>
            </li>
            <?php  } ?>

            <?php if (isset($ecademy_opt['flickr_url'] ) && $ecademy_opt['flickr_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['flickr_url']);?>" > <i class="bx bxl-flickr"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($ecademy_opt['behance_url'] ) && $ecademy_opt['behance_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['behance_url']);?>" > <i class="bx bxl-behance"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($ecademy_opt['github_url'] ) &&  $ecademy_opt['github_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['github_url']);?>" > <i class="bx bxl-github"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($ecademy_opt['skype_url'] ) && $ecademy_opt['skype_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['skype_url']);?>" > <i class="bx bxl-skype"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($ecademy_opt['rss_url'] ) && $ecademy_opt['rss_url'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['rss_url']);?>" > <i class="fas fa-rss"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($ecademy_opt['custom_url_1'] ) && $ecademy_opt['custom_url_1'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['custom_url_1']);?>" > <i class="<?php echo esc_attr($ecademy_opt['custom_icon_1']); ?>"></i></a>
                </li>
            <?php } ?>
            <?php if (isset($ecademy_opt['custom_url_2'] ) && $ecademy_opt['custom_url_2'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['custom_url_2']);?>" > <i class="<?php echo esc_attr($ecademy_opt['custom_icon_2']); ?>"></i></a>
                </li>
            <?php } ?>
            <?php if (isset($ecademy_opt['custom_url_3'] ) && $ecademy_opt['custom_url_3'] ) { ?>
                <li>
                    <a class="d-block" target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($ecademy_opt['custom_url_3']);?>" > <i class="<?php echo esc_attr($ecademy_opt['custom_icon_3']); ?>"></i></a>
                </li>
            <?php } ?>
        </ul>
    <?php
    }
endif; ?>