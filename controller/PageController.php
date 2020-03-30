<?php
/**
 * 
 */
class PageController extends Controller{
	
	function index(){
		
	}

	function view(){
		$this->loadModel('Post');
	}
}