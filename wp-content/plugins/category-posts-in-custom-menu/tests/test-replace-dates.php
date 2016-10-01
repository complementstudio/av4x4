<?php

class ReplaceDatesTests extends WP_UnitTestCase 
{
	////////////////////////////////////////////////////////////////////////
	// Invalid parameters
	////////////////////////////////////////////////////////////////////////
	
	function test_post_null_returns_empty_string() 
	{
		// Arrange

		// Act
		$result = replace_dates(NULL, "");

		// Assert
		$this->assertEquals("", $result);
	}

	function test_string_null_returns_empty_string()
	{
		// Arrange
		$post = $this->factory->post->create_and_get( array( 'post_title' => 'Test Post' ) );

		// Act
		$result = replace_dates($post, NULL);

		// Assert
		$this->assertEquals("", $result);
	}

	function test_string_empty_returns_empty_string()
	{
		// Arrange
		$post = $this->factory->post->create_and_get( array( 'post_title' => 'Test Post' ) );

		// Act
		$result = replace_dates($post, "");

		// Assert
		$this->assertEquals("", $result);
	}	

	function test_string_whitespace_returns_whitespace()
	{
		// Arrange
		$post_id = $this->factory->post->create_and_get( array( 'post_title' => 'Test Post' ) );
		$post = $this->factory->post->get_object_by_id($post_id);

		// Act
		$result = replace_dates($post, "  ");

		// Assert
		$this->assertEquals("  ", $result);
	}

	////////////////////////////////////////////////////////////////////////
	// post_date_gmt
	////////////////////////////////////////////////////////////////////////

	function test_string_post_date_gmt_returns_unformatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2016-01-13 1:15:00', 
				'post_date' => '2000-01-01 0:00:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date_gmt");

		// Assert
		$this->assertEquals("2016-01-13 01:15:00", $result);
	}

	function test_string_post_date_gmt_function_returns_default_formatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2016-01-13 1:15:00', 
				'post_date' => '2000-01-01 0:00:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date_gmt()"); // brackets added

		// Assert
		$this->assertEquals("January 13th, 2016", $result);
	}

	// wordpress.org/support/topic/post_date
	function test_string_post_date_gmt_customformatting_returns_formatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2016-01-13 1:15:00', 
				'post_date' => '2000-01-01 0:00:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date_gmt(l jS \of F Y, h:i:s A)");

		// Assert
		$this->assertEquals("Wednesday 13th of January 2016, 01:15:00 AM", $result);
	}

	// wordpress.org/support/topic/post_date
	function test_string_post_date_gmt_formattingwithslashes_returns_formatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2016-01-13 1:15:00', 
				'post_date' => '2000-01-01 0:00:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date_gmt(Y/m/d)");

		// Assert
		$this->assertEquals("2016/01/13", $result);
	}

	////////////////////////////////////////////////////////////////////////
	// post_date
	////////////////////////////////////////////////////////////////////////

	function test_string_post_date_returns_unformatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2000-01-01 0:00:00', 
				'post_date' => '2016-01-13 1:15:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date");

		// Assert
		$this->assertEquals("2016-01-13 01:15:00", $result);
	}

	function test_string_post_date_function_returns_default_formatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2000-01-01 0:00:00', 
				'post_date' => '2016-01-13 1:15:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date()"); // brackets added

		// Assert
		$this->assertEquals("January 13th, 2016", $result);
	}

	// wordpress.org/support/topic/post_date
	function test_string_post_date_customformatting_returns_formatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2000-01-01 0:00:00', 
				'post_date' => '2016-01-13 1:15:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date(l jS \of F Y, h:i:s A)");

		// Assert
		$this->assertEquals("Wednesday 13th of January 2016, 01:15:00 AM", $result);
	}

	// wordpress.org/support/topic/post_date
	function test_string_post_date_formattingwithslashes_returns_formatted_time()
	{
		// Arrange
		$post = $this->factory->post->create_and_get(
			array(
				'post_title' => 'Test Post', 
				'post_date_gmt' => '2000-01-01 0:00:00', 
				'post_date' => '2016-01-13 1:15:00' )
			);

		// Act
		$result = replace_dates($post, "%post_date(Y/m/d)");

		// Assert
		$this->assertEquals("2016/01/13", $result);
	}
}
