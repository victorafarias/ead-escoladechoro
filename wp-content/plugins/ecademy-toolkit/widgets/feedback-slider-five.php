<?php
/**
 * Feedback Slider Five Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Feedback_Slider_Five extends Widget_Base {

	public function get_name() {
        return 'FeedbackSliderFive';
    }

	public function get_title() {
        return esc_html__( 'Feedback Slider Five', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-testimonial';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'image', [
                'label' => __( 'Section Image', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape', [
                'label' => __( 'Shape Image', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

		$repeater = new Repeater();

        $repeater->add_control(
            'image', [
                'label' => __( 'Image', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'name', [
                'label' => __( 'Name', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Olivar Lucy' , 'ecademy-toolkit' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'designation', [
                'label' => __( 'Designation', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Designer' , 'ecademy-toolkit' ),
            ]
        );

        $repeater->add_control(
            'feedback', [
                'label' => __( 'Feedback Content', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo viverra maecenas accumsan lacus vel facilisis lorem ipsum dolor sit amet' , 'ecademy-toolkit' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ecademy_feedback_items',
            [
                'label' => __( 'Slider Item', 'ecademy-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'name' => __( 'Olivar Lucy', 'ecademy-toolkit' ),
                        'designation' => __( 'Designer', 'ecademy-toolkit' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

    $this->end_controls_section();

    $this->start_controls_section(
        'style',
        [
            'label' => __( 'Style', 'ecademy-toolkit' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

        $this->add_control(
            'feedback_color',
            [
                'label' => esc_html__( 'Feedback Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oa-single-feedback-item p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'feedback_typography',
                'label' => __( 'Feedback Typography', 'ecademy-toolkit' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oa-single-feedback-item p',
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Name Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oa-single-feedback-item .client-info .title h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => __( 'Name Typography', 'ecademy-toolkit' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oa-single-feedback-item .client-info .title h3',
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oa-single-feedback-item .client-info .title span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => __( 'Designation Typography', 'ecademy-toolkit' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oa-single-feedback-item .client-info .title span',
            ]
        );


    $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $slider = $settings['ecademy_feedback_items'];

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');

        $count = 0;
        foreach ($slider as $items => $counts):
            $count++;
        endforeach;
        ?>
        <div class="container">
            <div class="row justify-content-center align-items-center oa-feedback-area">
                <div class="col-lg-7 col-md-12">
                    <div class="oa-feedback-slides owl-carousel owl-theme">
                        <?php foreach ($slider as $key => $value): ?>
                            <div class="oa-single-feedback-item">
                                <div class="client-info d-flex align-items-center">
                                    <?php if( $value['image']['url'] != '' ): ?>
                                        <img src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" class="rounded-circle">
                                    <?php endif; ?>  
                                    <div class="title">
                                        <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                        <span><?php echo esc_html( $value['designation'] ); ?></span>
                                    </div>
                                </div>
                                <p><?php echo wp_kses_post( $value['feedback'] ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if($settings['image']['url']): ?>
                    <div class="col-lg-5 col-md-12">
                        <div class="oa-feedback-image">
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr__('Feedback Image', 'ecademy-toolkit'); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if($settings['shape']['url']): ?>
                <div class="oa-funfacts-and-feedback-arrow-shape">
                    <img src="<?php echo esc_url($settings['shape']['url']); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit'); ?>">
                </div>
            <?php endif; ?>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Feedback_Slider_Five );