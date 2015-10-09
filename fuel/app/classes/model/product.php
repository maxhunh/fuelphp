<?php

class Model_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'price',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'products';

    public static function validate($product)
    {
        $val = Validation::forge($product);
        $val->add_field('name', 'Name', 'required|max_length[255]');
        $val->add_field('description', 'Description', 'required|max_length[255]');
        $val->add_field('price', 'Price', 'required');
        return $val;
    }

    public static function createProduct($input = null)
    {
         if ($input::method() == 'POST')
         {
            $product = Model_Product::forge(array(
                'name' => $input::post('name'),
                'description' => $input::post('description'),
                'price' => $input::post('price')
                ));

            if ($product and $product->save()) {
                return 1;
            } else {
                return 0;
            }
        }
    }

}
