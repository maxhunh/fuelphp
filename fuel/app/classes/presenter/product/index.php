<?php

class Presenter_Product_Index extends Presenter
{
	public function view()
	{
        $this->subnav = array('index'=> 'active' );
        $this->products = Model_Product::find('all');
	}
}