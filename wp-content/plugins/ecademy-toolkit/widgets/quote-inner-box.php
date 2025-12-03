<?php
/**
 * Quote Box Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Quote_Box extends Widget_Base {

	public function get_name() {
        return 'eCademy_Quote_Box';
    }

	public function get_title() {
        return esc_html__( 'Quote Box', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-blockquote';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Quote_Box_Area',
			[
				'label' => esc_html__( 'Quote Box Controls', 'ecademy-toolkit' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'section_style',
                [
                    'label' => esc_html__( 'Section Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'              => esc_html__( 'Style One', 'ecademy-toolkit' ),
                        '2'              => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'icon',
                [
                    'label'		=> esc_html__('Icon Image', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );

			$this->add_control(
				'content',
				[
					'label' 	=> esc_html__( 'Content', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__('The artist world is limitless. It can be found anywhere, far from where he lives or a few feet away. It is always on his doorstep.', 'ecademy-toolkit'),
					'dynamic' => [
						'active' => true,
					],
				]
			);

            $this->add_control(
				'name',
				[
					'label' 	=> esc_html__( 'Name', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Paul Strand', 'ecademy-toolkit'),
					'dynamic' => [
						'active' => true,
					],
				]
			);

            $this->add_control(
                'fimage',
                [
                    'label'		=> esc_html__('Feature Image', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

			$this->add_control(
                'shape1',
                [
                    'label'		=> esc_html__('Shape Image One', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

        $this->end_controls_section();

        $this->start_controls_section(
			'style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'bg_color',
                [
                    'label' => esc_html__( 'Card Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .oa-quote-inner-box, {{WRAPPER}} .instructor-quote-inner-box' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .oa-quote-content p, {{WRAPPER}} .instructor-quote-inner-box p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .oa-quote-content p, {{WRAPPER}} .instructor-quote-inner-box p',
                ]
            );

            $this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Name Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .oa-quote-content span, {{WRAPPER}} .instructor-quote-content span' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Name Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .oa-quote-content span, {{WRAPPER}} .instructor-quote-content span',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;
		?>
        <?php if($settings['section_style'] == '2'): ?>
            <div class="instructor-quote-area ptb-100">
                <div class="container">
                    <div class="instructor-quote-inner-box">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="oa-quote-image">
                                    <?php if( $settings['fimage']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr__( 'Feedback Area', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr__( 'Feedback Area', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12">
                                <div class="instructor-quote-content">
                                    <?php if( $settings['icon']['url'] != '' ): ?>
                                        <img src="<?php echo esc_url( $settings['icon']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>

                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <?php if($settings['name']): ?>
                                        <span><?php echo wp_kses_post( $settings['name'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php if( $settings['shape1']['url'] != '' ): ?>
                            <div class="quote-shape">
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="oa-quote-area ptb-100">
                <div class="container">
                    <div class="oa-quote-inner-box">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="oa-quote-image">
                                    <?php if( $settings['fimage']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr__( 'Feedback Area', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr__( 'Feedback Area', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12">
                                <div class="oa-quote-content">
                                    <?php if( $settings['icon']['url'] != '' ): ?>
                                        <img src="<?php echo esc_url( $settings['icon']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>

                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <?php if($settings['name']): ?>
                                        <span><?php echo wp_kses_post( $settings['name'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php if( $settings['shape1']['url'] != '' ): ?>
                            <div class="quote-shape">
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Quote_Box );