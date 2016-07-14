<?php

/**
 * Student extends WP_LIST_Table
 *
 */

	if (!class_exists( 'WP_List_Table' )) {
		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	}
	
	/**
	 * Register Custom admin Menu Page
	 *
	 */
	add_action( 'admin_menu', 'student_menu_data' );

	function student_menu_data() {
	    add_menu_page( 'Student List', 'Students List', 'edit_posts', 'student_list_page', 'render_student_list_page', 'dashicons-list-view' );
	}

	/**
	 * Custom admin Menu Page Callback function
	 *
	 */
	function render_student_list_page() {
		$student_list_table = new Student_List();
		echo '<div class="wrap"><h2>Students Table</h2><hr>'; 
		$student_list_table->student_get_info(); 
		$student_list_table->display();
		echo '</div>'; 
	}
	
	/**
	 * Student List Class extends WP_LIST_TABLE to retrieve student data
	 *
	 */
	class Student_List extends WP_List_Table {
		
		private $student;

		public function student_get_info() {
			$columns 						= $this->get_columns();
			$hidden 						= array();
			$sortable 						= $this->get_sortable_columns();
			$this->_column_headers 			= array($columns, $hidden, $sortable);
			$this->student = array();
			$args = array('post_type' 		=> 'student', 'post_status' => 'publish', 'posts_per_page' => -1);
			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();
				$this->student[] = array(
					'ID' 			=> get_the_ID(),
					'title' 		=> get_the_title(),
					'about' 		=> get_the_excerpt(),
					'year' 			=> get_post_meta(get_the_ID(), 'student_year', true),
					'section' 		=> get_post_meta(get_the_ID(), 'student_section', true),
					'address' 		=> get_post_meta(get_the_ID(), 'student_address', true),
					'student_id' 	=> get_post_meta(get_the_ID(), 'student_id', true),
					'date' 			=> get_the_date('l, F j, Y g:i a')
				);
			endwhile;
			$this->items = $this->student;
		}
		/**
		 * Register Header Title
		 *
		 */
		public function get_columns() {
			$columns = array(
				'cb'			=> 'cb',
				'title' 		=> 'Student Name',
				'about'   		=> 'About',
				'year' 			=> 'Year',
				'section' 		=> 'Section',
				'address' 		=> 'Address',
				'student_id' 	=> 'Student ID',
				'date' 			=> 'Date'
			);
			return $columns;
		}
		/**
		 * Sortable Columns
		 *
		 */
		public function get_sortable_columns() {
		  $sortable = array(
								'title' 	 => array( 'title', true ),
								'student_id' => array( 'student_id', false ),
								'date' 		 => array( 'date', false)
							);
		  return $sortable;
		}
		/**
		 * Populate Header
		 *
		 */
		function column_default( $data, $column_name ) {
			switch( $column_name ) {
				case 'title':
				case 'about':
				case 'year':
				case 'section':
				case 'address':
				case 'student_id':
				case 'date':
					return $data[ $column_name ];
				break;	
				default:
					return print_r( $data, true );
				break;
			}
		}
	}

