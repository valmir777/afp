<?php
/**
 * @package CityBook Add-Ons
 * @description A custom plugin for CityBook - Directory Listing WordPress Theme
 * @author CTHthemes - http://themeforest.net/user/cththemes
 * @date 25-07-2018
 * @version 1.2.2
 * @copyright Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license GNU General Public License version 3 or later; see LICENSE
 */



namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CTH_Hero_Section extends Widget_Base {

    /**
    * Get widget name.
    *
    * Retrieve alert widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'hero_section';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Hero Section', 'citybook-add-ons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'fa fa-trophy';
    }

    /**
    * Get widget categories.
    *
    * Retrieve the widget categories.
    *
    * @since 1.0.10
    * @access public
    *
    * @return array Widget categories.
    */
    public function get_categories() {
        return [ 'citybook-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'citybook-add-ons' ),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'citybook-add-ons' ),
                'type' => Controls_Manager::TEXTAREA, // WYSIWYG,
                'default' => '<h2>We will help you to find all</h2>
<h3>Find great places , hotels , restourants , shops.</h3>',
                'show_label' => false,
            ]
        );



        $this->add_control(
            'show_search',
            [
                'label' => __( 'Show Search Form', 'citybook-add-ons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'citybook-add-ons' ),
                'label_off' => __( 'Hide', 'citybook-add-ons' ),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'hide_text_field',
            [
                'label' => __( 'Hide Text Field', 'citybook-add-ons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __( 'Show', 'citybook-add-ons' ),
                'label_off' => __( 'Hide', 'citybook-add-ons' ),
                'return_value' => 'yes',
                'condition' => [
                    'show_search' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'use_pre_locs',
            [
                'label' => __( 'Use Added Locations', 'citybook-add-ons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __( 'Sim', 'citybook-add-ons' ),
                'label_off' => __( 'Não', 'citybook-add-ons' ),
                'return_value' => 'yes',
                'condition' => [
                    'show_search' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'content_after',
            [
                'label' => __( 'Content After Search', 'citybook-add-ons' ),
                'type' => Controls_Manager::TEXTAREA, // WYSIWYG,
                'default' => '',
                'show_label' => false,
            ]
        );

        $this->add_control(
            'cats',
            [
                'label' => __( 'Categories List', 'citybook-add-ons' ),
                'type' => Controls_Manager::SELECT2,
                'options' => citybook_addons_get_listing_categories_select2(),
                'multiple' => true,
                'label_block' => true,
                'default'   => ''
            ]
        );


        $this->add_control(
            'scroll_url',
            [
                'label' => __( 'Scroll button URL', 'citybook-add-ons' ),
                'type' => Controls_Manager::TEXT,
                'default' => '#sec2',

            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'section_background',
            [
                'label' => __( 'Background', 'citybook-add-ons' ),
            ]
        );

        $this->add_control(
            'bg_type',
            [
                'label' => __( 'Background Type', 'citybook-add-ons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__('Parallax Image', 'citybook-add-ons'),
                    'slideshow' => esc_html__('Slideshow Images', 'citybook-add-ons'),
                    'yt_video' => esc_html__('Youtube Video', 'citybook-add-ons'),
                    'vm_video' => esc_html__('Vimeo Video', 'citybook-add-ons'),
                    'ht_video' => esc_html__('Hosted Video', 'citybook-add-ons'),
                ],
                'default' => 'image',
                'separator' => 'before',
                // 'description' => esc_html__("Select how to sort retrieved posts. More at ", 'citybook-add-ons').'<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>.',
            ]
        );

        $this->add_control(
            'slideshow_imgs',
            [
                'label' => __( 'Slideshow Images', 'citybook-add-ons' ),
                'type' => Controls_Manager::GALLERY,
                'condition' => [
                    'bg_type' => 'slideshow',
                ],
            ]
        );

        $this->add_control(
            'video_id',
            [
                'label' => __( 'Youtube or Vimeo Video ID', 'citybook-add-ons' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'bg_type' => ['yt_video','vm_video'],
                ],
                'label_block' => true,
                'description' => __( 'Your Youtube or Vimeo video ID: Hg5iNVSp2z8', 'citybook-add-ons' ),
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Hosted Video URL', 'citybook-add-ons' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'bg_type' => ['ht_video'],
                ],
                'label_block' => true,
                'description' => __( 'Your hosted video URL (should be in.mp4 format)', 'citybook-add-ons' ),
            ]
        );


        $this->add_control(
            'bgimage',
            [
                'label' => __( 'Background Image', 'citybook-add-ons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'bg_type' => ['yt_video','vm_video','image','ht_video'],
                ],
                'description' => __( 'Background Image', 'citybook-add-ons' ),
            ]
        );
        $this->add_control(
            'overlay_opa',
            [
                'label' => __( 'Overlay Opacity', 'citybook-add-ons' ),
                'type' => Controls_Manager::TEXT,
                // 'default' => [
                //     'url' => Utils::get_placeholder_image_src(),
                // ],
                'description' => __( 'Overlay Opacity value 0.0 - 1. Default 0.5', 'citybook-add-ons' ),
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay Color', 'citybook-add-ons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overlay' => 'background-color: {{VALUE}};',
                ],
                // Set a value from the active color scheme as the default value returned by the control.
                // 'scheme' => [
                //     'type' => Scheme_Color::get_type(),
                //     'value' => Scheme_Color::COLOR_7,
                // ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render( ) {

        $settings = $this->get_settings();

        // get our input from the widget settings.

        // $custom_text = ! empty( $instance['some_text'] ) ? $instance['some_text'] : ' (no text was entered ) ';
        // $post_count = ! empty( $instance['posts_per_page'] ) ? (int)$instance['posts_per_page'] : 5;

        $bgimage = citybook_addons_get_attachment_thumb_link($settings['bgimage']['id'], 'bg-image');

        ?>
        <section class="scroll-con-sec hero-section elementor-hero-section" data-scrollax-parent="true">
            <?php
            if($settings['bg_type'] == 'image' && $bgimage != ''){ ?>
                <div class="hero-bg-wrap"><div class="bg" style="background-image:url(<?php echo esc_url( $bgimage );?>);"  data-bg="<?php echo esc_url( $bgimage );?>" data-scrollax="properties: { translateY: '200px' }"></div></div>
            <?php }elseif($settings['bg_type'] == 'slideshow'){ ?>
            <div class="slideshow-container-wrap">
                <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }" >
                    <?php
                    foreach ( $settings['slideshow_imgs'] as $image ) {
                        ?>
                        <!-- slideshow-item -->
                        <div class="slideshow-item">
                            <div class="bg" data-bg="<?php echo esc_url( citybook_addons_get_attachment_thumb_link($image['id'], 'bg-image') ); ?>"></div>
                        </div>
                        <!--  slideshow-item end  -->
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php }else{ ?>
            <div class="media-container-wrap">
                <div class="media-container video-parallax" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg mob-bg" data-bg="<?php echo esc_url( $bgimage );?>"></div>
                <?php
                    if($settings['bg_type'] == 'yt_video') :

                        $mute = '1';
                        $quality = 'highres'; // 'default','small','medium','large','hd720','hd1080'
                        $fittobackground = '1';
                        $pauseonscroll = '0';
                        $loop = '1';
                        // Hg5iNVSp2z8
                    ?>
                    <div  class="background-youtube-wrapper" data-vid="<?php echo esc_attr( $settings['video_id'] );?>" data-mt="<?php echo esc_attr( $mute );?>" data-ql="<?php echo esc_attr( $quality );?>" data-ftb="<?php echo esc_attr( $fittobackground );?>" data-pos="<?php echo esc_attr( $pauseonscroll );?>" data-rep="<?php echo esc_attr( $loop );?>"></div>
                <?php
                    elseif($settings['bg_type'] == 'vm_video') :
                        $dataArr = array();
                        $dataArr['video'] = $settings['video_id'];
                        $dataArr['quality'] = '1080p'; // '4K','2K','1080p','720p','540p','360p'
                        $dataArr['mute'] = '1';
                        $dataArr['loop'] = '1';
                        // 97871257
                        ?>
                    <div class="video-holder">
                        <div  class="background-vimeo" data-opts='<?php echo json_encode( $dataArr );?>'></div>
                    </div>
                <?php else :
                    $video_attrs = ' autoplay';
                    $video_attrs .=' muted';
                    $video_attrs .=' loop';

                    // http://localhost:8888/citybook/wp-content/uploads/2018/03/3.mp4
                ?>
                    <div class="video-container">
                        <video<?php echo esc_attr( $video_attrs );?> class="bgvid">
                            <source src="<?php echo esc_url( $settings['video_url'] );?>" type="video/mp4">
                        </video>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <?php } ?>
            <div class="overlay"<?php if(!empty($settings['overlay_opa'])) echo ' style="opacity:'.$settings['overlay_opa'].';"';?>></div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <?php
                    if(!empty($settings['content'])): ?>
                    <div class="intro-item fl-wrap">
                        <?php echo $settings['content'];?>
                    </div>
                    <?php
                    endif;?>
                    <?php if($settings['show_search'] == 'yes') citybook_addons_get_template_part('templates/hero_search_form', '', array('hide_text_field' => $settings['hide_text_field'], 'use_pre_locs' => $settings['use_pre_locs'] ) ); ?>

                    <?php
                    if(!empty($settings['content_after'])): ?>
                    <div class="intro-item-after fl-wrap">
                        <?php echo $settings['content_after'];?>
                    </div>
                    <?php
                    endif;?>

                    <?php
                    if(is_array($settings['cats']) && !empty($settings['cats'])){ ?>
                    <div class="box-cat-container  box-cat-new">
                    <?php
                        foreach ($settings['cats'] as $cat) {
                            $term = get_term( $cat, 'listing_cat');
                            if ( empty( $term ) || is_wp_error( $term ) ) continue;
                            $term_meta = get_term_meta( $term->term_id, P_META_PREFIX.'term_meta', true );

                        ?>
                        <!--box-cat-->
                        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="box-cat color-bg">
                            <?php if(isset($term_meta['icon_class'])) echo '<i class="'.$term_meta['icon_class'].'"></i>'; ?>
                            <h4><?php echo esc_html($term->name) ?></h4>
                        </a>
                        <!--box-cat end-->
                        <?php
                        } ?>
                    </div>
                    <!-- end box-cat-container -->
                    <?php
                    }


                    ?>
                </div>
            </div>
            <div class="bubble-bg"> </div>
            <?php
            if(!empty($settings['scroll_url'])): ?>
            <div class="header-sec-link">
                <a href="<?php echo $settings['scroll_url'];?>" class="custom-scroll-link"><?php _e( 'Let\'s Start',  'citybook-add-ons' );?></a>
            </div>
            <?php
            endif;?>
        </section>
        <?php



    }

    protected function _content_template() {

        ?>
        <section class="scroll-con-sec hero-section elementor-hero-section" data-scrollax-parent="true">
            <# if(settings.bg_type == 'image' && settings.bgimage.url){ #>
                <div class="hero-bg-wrap"><div class="bg" style="background-image:url({{settings.bgimage.url}});" data-bg="{{settings.bgimage.url}}" data-scrollax="properties: { translateY: '200px' }"></div></div>
            <# }else if(settings.bg_type == 'slideshow'){ #>
                <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }" >
                    <# _.each( settings.slideshow_imgs, function( image ) { #>
                        <!-- slideshow-item -->
                        <div class="slideshow-item">
                            <div class="bg" style="background-image:url({{image.url}});"  data-bg="{{ image.url }}"></div>
                        </div>
                        <!--  slideshow-item end  -->
                        <img src="{{ image.url }}">
                    <# }); #>
                </div>
            <# }else{ #>
                <div class="media-container video-parallax" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg mob-bg" style="background-image:url({{settings.bgimage.url}});" data-bg="{{settings.bgimage.url}}"></div>
                <# if(settings.bg_type == 'yt_video'){
                        var mute = '1';
                        var quality = 'highres'; // 'default','small','medium','large','hd720','hd1080'
                        var fittobackground = '1';
                        var pauseonscroll = '0';
                        var loop = '1';
                        // Hg5iNVSp2z8
                #>
                    <div  class="background-youtube-wrapper" data-vid="{{settings.video_id}}" data-mt="{{mute}}" data-ql="{{quality}}" data-ftb="{{fittobackground}}" data-pos="{{pauseonscroll}}" data-rep="{{loop}}"></div>
                <# }else if(settings.bg_type == 'vm_video') {
                        var dataobj = {
                            video: settings.video_id,
                            quality: '1080p',
                            mute: '1',
                            loop: '1',
                        }

                #>
                    <div class="video-holder">
                        <div  class="background-vimeo" data-opts='<# print(JSON.stringify(dataobj)) #>'></div>
                    </div>
                <# }else{
                    var video_attrs = ' autoplay muted loop'
                    // http://localhost:8888/citybook/wp-content/uploads/2018/03/3.mp4
                #>
                    <div class="video-container">
                        <video{{{video_attrs}}} class="bgvid">
                            <source src="{{settings.video_url}}" type="video/mp4">
                        </video>
                    </div>
                <# } #>
                </div>
            <# } #>
            <div class="overlay"<# if(settings.overlay_opa != ''){ #> style="opacity:{{settings.overlay_opa}};"<# } #>></div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <# if(settings.content){ #>
                    <div class="intro-item fl-wrap">
                        {{{settings.content}}}
                    </div>
                    <# } #>

                    <# if(settings.show_search == 'yes'){ #>

                    <?php citybook_addons_get_template_part('templates/hero_search_form', '', array('for_jstmpl' => 'yes') ); ?>

                    <# } #>

                    <# if(settings.content_after){ #>
                    <div class="intro-item-after fl-wrap">
                        {{{settings.content_after}}}
                    </div>
                    <# } #>

                </div>
            </div>
            <div class="bubble-bg"> </div>
            <# if(settings.scroll_url){ #>
            <div class="header-sec-link">
                <a href="{{settings.scroll_url}}" class="custom-scroll-link"><?php _e( 'Let\'s Start',  'citybook-add-ons' );?></a>
            </div>
            <# } #>
        </section>
        <?php

    }

}
