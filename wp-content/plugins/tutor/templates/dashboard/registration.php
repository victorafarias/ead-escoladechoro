<?php
/**
 * Tutor registration template
 *
 * @package Tutor\Templates
 * @subpackage Dashboard
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.4.3
 */

?>

<?php if ( ! get_option( 'users_can_register', false ) ) : ?> 
	<?php
		$args = array(
			'image_path'  => tutor()->url . 'assets/images/construction.png',
			'title'       => __( 'Oooh! Access Denied', 'tutor' ),
			'description' => __( 'You do not have access to this area of the application. Please refer to your system  administrator.', 'tutor' ),
			'button'      => array(
				'text'  => __( 'Go to Home', 'tutor' ),
				'url'   => get_home_url(),
				'class' => 'tutor-btn',
			),
		);
		tutor_load_template( 'feature_disabled', $args );
		?>
<?php else : ?>

	<div id="tutor-registration-wrap">

		<?php do_action( 'tutor_before_student_reg_form' ); ?>

		<form method="post" enctype="multipart/form-data" id="tutor-registration-form">
			<input type="hidden" name="tutor_course_enroll_attempt" value="<?php echo isset( $_GET['enrol_course_id'] ) ? (int) $_GET['enrol_course_id'] : ''; ?>">
			<?php do_action( 'tutor_student_reg_form_start' ); ?>

			<?php wp_nonce_field( tutor()->nonce_action, tutor()->nonce ); ?>
			<input type="hidden" value="tutor_register_student" name="tutor_action"/>


			<?php
			$validation_errors = apply_filters( 'tutor_student_register_validation_errors', array() );
			if ( is_array( $validation_errors ) && count( $validation_errors ) ) :
				?>
				<div class="tutor-alert tutor-warning tutor-mb-12">
					<ul class="tutor-required-fields">
						<?php foreach ( $validation_errors as $validation_error ) : ?>
							<li>
								<?php echo esc_html( $validation_error ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="tutor-form-row">
				<div class="tutor-form-col-6">
					<div class="tutor-form-group">
						<label>
							<?php esc_html_e( 'First Name', 'tutor' ); ?>
						</label>

						<input type="text" name="first_name" value="<?php echo esc_attr( tutor_utils()->input_old( 'first_name' ) ); ?>" placeholder="<?php esc_attr_e( 'First Name', 'tutor' ); ?>" required autocomplete="given-name">
					</div>
				</div>

				<div class="tutor-form-col-6">
					<div class="tutor-form-group hide-lastname">
						<label>
							<?php esc_html_e( 'Last Name', 'tutor' ); ?>
						</label>

						<input type="hidden" name="user_login" value="">
					</div>
				</div>

			</div>
			
            <!--edição para igual email e nome de usuário -->
			<div class="tutor-form-row">
				<div class="tutor-form-col-6">
					<div class="tutor-form-group hide-username">
						<label>
							<?php esc_html_e( 'User Name', 'tutor' ); ?>
						</label>
                        <!-- Deixe o campo user_login editável, mas preencha com PHP -->
                        <input type="text" name="user_login" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" placeholder="<?php esc_html_e( 'User Name', 'tutor' ); ?>" autocomplete="username">
						
					</div>
				</div>
                
				<div class="tutor-form-col-6">
					<div class="tutor-form-group">
						<label>
							<?php esc_html_e( 'E-Mail', 'tutor' ); ?>
						</label>

						<input type="text" name="email" value="<?php echo esc_attr( tutor_utils()->input_old( 'email' ) ); ?>" placeholder="<?php esc_html_e( 'E-Mail', 'tutor' ); ?>" required autocomplete="email">
					</div>
				</div>

			</div>

			<div class="tutor-form-row">
				<div class="tutor-form-col-6">
					<div class="tutor-form-group">
						<div class="tutor-password-strength-checker">
							<div class="tutor-password-field">
								<label>
									<?php esc_html_e( 'Password', 'tutor' ); ?>
								</label>

								<input class="password-checker" id="tutor-new-password" type="password" name="password" value="<?php echo esc_attr( tutor_utils()->input_old( 'password' ) ); ?>" placeholder="<?php esc_html_e( 'Password', 'tutor' ); ?>" required autocomplete="new-password" style="margin-bottom: 0;">
								<span class="show-hide-btn"></span>
							</div>

							<div class="tutor-password-strength-hint">
								<div class="indicator">
									<span class="weak"></span>
									<span class="medium"></span>
									<span class="strong"></span>
								</div>
								<div class="text tutor-fs-7 tutor-color-muted"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="tutor-form-col-6">
					<div class="tutor-form-group">
						<label>
							<?php esc_html_e( 'Password confirmation', 'tutor' ); ?>
						</label>

						<div class="tutor-form-wrap">
							<span class="tutor-validation-icon tutor-icon-mark tutor-color-success tutor-form-icon tutor-form-icon-reverse" style="display: none;"></span>
							<input type="password" name="password_confirmation" value="<?php echo esc_attr( tutor_utils()->input_old( 'password_confirmation' ) ); ?>" placeholder="<?php esc_html_e( 'Password Confirmation', 'tutor' ); ?>" required autocomplete="new-password" style="margin-bottom: 0;">
						</div>
					</div>
				</div>
			</div>

			<!--Iguala o nome de usuário ao email -->
			<?php
            if (isset($_POST['tutor_action']) && $_POST['tutor_action'] === 'tutor_register_student') {
                if (!empty($_POST['email']) && empty($_POST['user_login'])) {
                    $_POST['user_login'] = sanitize_user($_POST['email']);
                }
            }
            ?>


			<div class="tutor-form-row">
				<div class="tutor-form-col-12">
					<div class="tutor-form-group">
					<?php
						// providing register_form hook.
						do_action( 'tutor_student_reg_form_middle' );
						do_action( 'register_form' );
					?>
					</div>
				</div>
			</div>    

			<?php do_action( 'tutor_student_reg_form_end' ); ?>

			<?php
				$tutor_toc_page_link = tutor_utils()->get_toc_page_link();
			?>
			<?php if ( null !== $tutor_toc_page_link ) : ?>
				<div class="tutor-mb-24">
					<?php esc_html_e( 'By signing up, I agree with the website\'s', 'tutor' ); ?> <a target="_blank" href="<?php echo esc_url( $tutor_toc_page_link ); ?>" title="<?php esc_html_e( 'Terms and Conditions', 'tutor' ); ?>"><?php esc_html_e( 'Terms and Conditions', 'tutor' ); ?></a>
				</div>
			<?php endif; ?>
			

			<div>
				<button type="submit" name="tutor_register_student_btn" value="register" class="tutor-btn tutor-btn-primary tutor-btn-block"><?php esc_html_e( 'Register', 'tutor' ); ?></button>
			</div>
			
			<?php do_action( 'tutor_after_register_button' ); ?>
			
			<!--Chamda do js que iguala o nome de usuário ao email -->
            <?php
            wp_enqueue_script('copiar-email-usuario', plugin_dir_url(__FILE__) . '/copiar-email-usuario.js', array('jquery'), '1.0', true);
            ?>
			
		</form>
		
		<?php do_action( 'tutor_after_registration_form_wrap' ); ?>
		
	</div>
	<?php do_action( 'tutor_after_student_reg_form' ); ?>
<?php endif; ?>