<?php

class Controller_Product extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Product &raquo; Index';
		$this->template->content = View::forge('product/index', $data);
	}

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Product &raquo; Create';
		$this->template->content = View::forge('product/create', $data);
	}

}
