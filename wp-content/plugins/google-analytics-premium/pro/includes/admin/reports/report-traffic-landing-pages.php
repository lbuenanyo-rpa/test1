<?php
/**
 * Traffic Landing Pages Report
 *
 * Ensures all the reports have a uniform class with helper functions.
 *
 * @since 8.17
 *
 * @package MonsterInsights
 * @subpackage Reports
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class MonsterInsights_Report_Traffic_Landing_Pages extends MonsterInsights_Report {

	public $class = 'MonsterInsights_Report_Traffic_Landing_Pages';
	public $name  = 'traffic_landing_pages';
	public $level = 'plus';

	protected $api_path = 'traffic-landing-pages';

	/**
	 * Primary class constructor.
	 */
	public function __construct() {
		$this->title = __( 'Landing Page Details', 'ga-premium' );

		parent::__construct();
	}

	/**
	 * Add necessary information to data for Vue reports.
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	public function prepare_report_data( $data ) {
		return apply_filters( 'monsterinsights_report_traffic_sessions_chart_data', $data, $this->start_date, $this->end_date );
	}

}
