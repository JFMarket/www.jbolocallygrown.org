<?php
/*  Copyright 2013 MarvinLabs (contact@marvinlabs.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

require_once( CUAR_INCLUDES_DIR . '/core-classes/addon-content-page.class.php' );

require_once( dirname(__FILE__) . '/widget-private-file-categories.class.php' );
require_once( dirname(__FILE__) . '/widget-private-file-dates.class.php' );
require_once( dirname(__FILE__) . '/widget-private-files.class.php' );

if (!class_exists('CUAR_CustomerPrivateFilesAddOn')) :

/**
 * Add-on to put private files in the customer area
*
* @author Vincent Prat @ MarvinLabs
*/
class CUAR_CustomerPrivateFilesAddOn extends CUAR_AbstractContentPageAddOn {
	
	public function __construct() {
		parent::__construct( 'customer-private-files', '4.0.0' );
		
		$this->set_page_parameters( 510, array(
					'slug'					=> 'customer-private-files',
					'parent_slug'			=> 'customer-private-files-home',
					'friendly_post_type'	=> 'cuar_private_file',
					'friendly_taxonomy'		=> 'cuar_private_file_category',
					'required_capability'	=> 'cuar_view_files'
				)
			);
		
		$this->set_page_shortcode( 'customer-area-private-files' );
	}
	
	public function get_label() {
		return __( 'Private Files - Owned', 'cuar' );
	}
	
	public function get_title() {
		return __( 'My files', 'cuar' );
	}		
		
	public function get_hint() {
		return __( 'Page to list the files a customer owns.', 'cuar' );
	}	

	public function run_addon( $plugin ) {
		parent::run_addon( $plugin );		
		$this->pf_addon = $plugin->get_addon( 'private-files' );
		
		// This page can also list archive for private content
		$this->enable_content_archives_permalinks();
		$this->enable_single_private_content_permalinks();
		
		// Widget area for our sidebar
		if ( $this->pf_addon->is_enabled() ) {
			$this->enable_sidebar( array( 'CUAR_PrivateFileCategoriesWidget', 'CUAR_PrivateFileDatesWidget', 'CUAR_PrivateFilesWidget' ), true );
		}
		
		if ( is_admin() ) { 
			$this->enable_settings( 'cuar_private_files' );
		} 
	}	

	protected function get_page_addon_path() {
		return CUAR_INCLUDES_DIR . '/core-addons/customer-private-files';
	}

	protected function get_category_archive_page_subtitle( $category ) {
		return sprintf( __( 'Files under %1$s', 'cuar' ), $category->name );
	}
	
	protected function get_date_archive_page_subtitle( $year, $month=0 ) {
		if ( isset( $month ) && ( (int)($month)>0 ) ) {
			$month_name = date_i18n( "F", mktime( 0, 0, 0, (int)$month, 10 ) );
			$page_subtitle = sprintf( __( 'Files published in %2$s %1$s', 'cuar' ), $year, $month_name );
		} else {
			$page_subtitle = sprintf( __( 'Files published in %1$s', 'cuar' ), $year );
		}
	
		return $page_subtitle;
	}
	
	protected function get_default_page_subtitle() {
		return __( 'Recent Files', 'cuar' );
	}
	
	protected function get_default_dashboard_block_title() {
		return __( 'Recent Files', 'cuar' );
	}
	
	protected function print_default_widgets() {
		$default_widget_args = $this->get_default_widget_args();

		$w = new CUAR_PrivateFileCategoriesWidget();
		$w->widget( $default_widget_args, array(
				'title'	=> __( 'Categories', 'cuar' ),
		) );
		
		$w = new CUAR_PrivateFileDatesWidget();
		$w->widget( $default_widget_args, array(
				'title'	=> __( 'Archives', 'cuar' ),
		) );
	}
	
	/** @var CUAR_PrivateFileAddOn */
	private $pf_addon;
}

// Make sure the addon is loaded
new CUAR_CustomerPrivateFilesAddOn();

endif; // if (!class_exists('CUAR_CustomerPrivateFilesAddOn')) 
