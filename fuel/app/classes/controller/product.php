<?php

class Controller_Product extends Controller_Base
{

    // Menote: handle special action for page (action get of page index)
    // readmore: http://fuelphp.com/docs/general/controllers/base.html#/http_method_prefixed_actions
    // public function get_index()
    // {
    //     return "Here is function get index";
    // }

	public function action_index()
	{
        $this->template->title = 'Product &raquo; Index';
        $this->template->content = Presenter::forge('product/index');
    }

    public function action_create()
    {
		$this->template->title = 'Product &raquo; Create';
        $data['subnav'] = array('create'=> 'active' );

        $val_product = Model_Product::validate('create');
        if ($val_product->run())
        {
           if (Model_Product::createProduct(new Input)) {
                Session::set_flash('success', 'Create success !!!');
                Response::redirect('product');
             } else {
                Session::set_flash('error', 'Create error !!!');
                Response::redirect('tweet/create');
             }
        } else
        {
            Session::set_flash('error', $val_product->error());
        }
		$this->template->content = View::forge('product/create', $data);
    }

    public function action_view($id = null)
    {
        $data["subnav"] = array('view'=> 'active' );

        $data["product"] = (is_null($id)) ? Response::redirect('tweet') : Model_Product::find($id);

        $this->template->title = 'Product &raquo; View';
        $this->template->content = View::forge('product/view', $data);
    }

}
