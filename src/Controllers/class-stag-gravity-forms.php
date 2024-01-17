<?php
/**
 * Gravity Forms Controller
 *
 * @package Stag_Starter_Theme
 */

namespace stag_theme\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'STAG_Gravity_Forms' ) ) {
	/**
	 * The Gravity_Forms class handles Gravity Forms related functionality.
	 *
	 * @since 1.0.0
	 */
	class STAG_Gravity_Forms {

		/**
		 * Class constructor.
		 *
		 * Initializes the Gravity Forms controller.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_filter( 'gform_field_value_service_list', array( $this, 'populate_your_service_list' ) );
			add_filter( 'gform_field_value_email_replay', array( $this, 'populate_your_email_replay' ) );
		}

		/**
		 * Populate the service list field with the selected services.
		 *
		 * @since 1.0.0
		 *
		 * @param string $value The value of the field.
		 *
		 * @return string
		 */
		public function populate_your_service_list( $value ) {
			// split the $value into an array.
			$service_ids = explode( ',', $value );

			if ( ! empty( $service_ids ) ) {
				$value = '';

				foreach ( $service_ids as $i => $service ) {
					// get the service object.
					$service = get_post( $service );

					$value .= ( $i + 1 ) . '. ' . $service->post_title . "\n";
				}
			}

			return $value;
		}

		/**
		 * Populate the email replay field with the selected email.
		 *
		 * @since 1.0.0
		 *
		 * @param string $value The value of the field.
		 *
		 * @return string
		 */
		public function populate_your_email_replay( $value ) {
			// check if $_GET['service_list'] is set.
			if ( isset( $_GET['service_list'] ) ) { //phpcs:ignore

				// split the $value into an array.
				$service_ids = explode( ',', $_GET['service_list'] ); //phpcs:ignore

				if ( ! empty( $service_ids ) ) {
					$value = '';

					foreach ( $service_ids as $i => $id ) {
						// get the service object.
						$service = get_post( $id );
						if ( '' === get_field( 'opis_pripreme_pacijenta', $id ) ) {
							$patient_preparation = pll__( 'Није потребна посебна припрема.' );
						} else {
							$patient_preparation = wp_strip_all_tags( get_field( 'opis_pripreme_pacijenta', $id ) );
						}
						error_log( 'STAMPA:' . var_export( $patient_preparation, true ) );

						$value .= ( $i + 1 ) . '. ' . $service->post_title . "\n";
						$value .= "--------------------------- \n";
						$value .= pll__( 'У наставку Вам достављамо упутство за припрему пацијената за одабрану анализу:' ) . "\n";
						$value .= $patient_preparation . "\n";
						$value .= "--------------------------- \n";
						$value .= "\n";
					}
				}
			}

			return $value;
		}
	}

	new STAG_Gravity_Forms();
}
