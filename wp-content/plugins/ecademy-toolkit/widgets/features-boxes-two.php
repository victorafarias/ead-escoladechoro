<?php
/**
 * Features Boxes Two Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Features_Boxe_Two extends Widget_Base {

	public function get_name() {
        return 'eCademy_Features_Box_Two';
    }

	public function get_title() {
        return esc_html__( 'Features Two', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-star-o';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'ecademy_features_boxes_controls',
			[
				'label' => esc_html__( 'Features Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'columns',
                [
                    'label' => esc_html__( 'Choose Columns', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'col-lg-12 col-sm-12'   => esc_html__( '1', 'ecademy-toolkit' ),
                        'col-lg-6 col-sm-6'   => esc_html__( '2', 'ecademy-toolkit' ),
                        'col-lg-4 col-sm-6'   => esc_html__( '3', 'ecademy-toolkit' ),
                        'col-lg-3 col-sm-6'   => esc_html__( '4', 'ecademy-toolkit' ),
                    ],
                    'default' => '4',
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'image', [
                    'label'     => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'     => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Latest Skills', 'ecademy-toolkit'),
					'dynamic' => [
						'active' => true,
					],
                ]
            );
            $repeater->add_control(
                'content', [
                    'label'     => __( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet, consecteur adipiscing elit, sed do eiusmod tempor.', 'ecademy-toolkit'),
                ]
            );
            $this->add_control(
                'card_item',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'features_boxes_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .oa-features-card h3',
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .oa-features-card h3' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .oa-features-card p',
                ]
            );

            $this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .oa-features-card p' => 'color: {{VALUE}}',
					],
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
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <?php 
                foreach( $settings['card_item'] as $item ):
                    $img = $item['image']['url'];
                    ?>
                    <div class="<?php echo esc_attr($settings['columns']); ?>">
                        <div class="oa-features-card">
                            <?php if( $img != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo wp_kses_post( $item['content'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new eCademy_Features_Boxe_Two );