<?php

class Controller_Product extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );

        $data["products"] = Model_Product::find('all');

		$this->template->title = 'Product &raquo; Index';
		$this->template->content = View::forge('product/index', $data);
	}

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Product &raquo; Create';

        $val_product = Model_Product::validate('create');
        if ($val_product->run())
        {
            if (Input::method() == 'POST')
            {
                $product = Model_Product::forge(array(
                            'name' => Input::post('name'),
                            'description' => Input::post('description'),
                            'price' => Input::post('price')
                ));

                if ($product and $product->save()) {
                    Session::set_flash('success', 'Create success !!!');
                    Response::redirect('product');
                } else {
                    Session::set_flash('error', 'Create error !!!');
                    Response::redirect('tweet/create');
                }
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
