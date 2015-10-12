<?php
class Controller_Tweet extends Controller_Base
{

	public function action_index()
	{
		$data['tweets'] = Model_Tweet::find('all');
        // Menote: try use Debug class of fuelphp
        // readmore: http://fuelphp.com/docs/classes/debug.html
        // Debug::dump($data['tweets']);
		$this->template->title = "Tweets";
		$this->template->content = View::forge('tweet/index', $data);

	}

	public function action_view($id = null)
	{
        // Menote: if id be null will redirect to /tweet
		Controller_Tweet::pre_process($id);

		if ( ! $data['tweet'] = Model_Tweet::find($id))
		{
			Session::set_flash('error', 'Could not find tweet #'.$id);
			Response::redirect('tweet');
		}

		$this->template->title = "Tweet";
		$this->template->content = View::forge('tweet/view', $data);

	}

	public function action_create()
	{
        // Menote: User class Input(Core) to handle input data
        // readmore: http://fuelphp.com/docs/classes/input.html
        if (Input::method() == 'POST')
        {

            $val = Model_Tweet::validate('create'); // Menote: view validate method in model/tweet.php

            if ($val->run())
            {
                // Menote: forge(create) obj tweet in Model_Tweet
                $tweet = Model_Tweet::forge(array(
                    'title' => Input::post('title'),
                    'body' => Input::post('body'),
                    'description' => Input::post('description'),
                ));

                // Menote: if it create success
				if ($tweet and $tweet->save())
				{
                    # Menote: set flash notify in view when create tweet success
                    # readmore: http://fuelphp.com/docs/classes/session/usage.html
					Session::set_flash('success', 'Added tweet #'.$tweet->id.'.');

					Response::redirect('tweet');
				}

				else
				{
					Session::set_flash('error', 'Could not save tweet.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
        }

		$this->template->title = "Tweets";
        $this->template->content = View::forge('tweet/create');

    }

    public function action_edit($id = null)
    {
        Controller_Tweet::pre_process($id);

        if ( ! $tweet = Model_Tweet::find($id))
        {
            Session::set_flash('error', 'Could not find tweet #'.$id);
            Response::redirect('tweet');
        }

        $val = Model_Tweet::validate('edit');

        if ($val->run())
        {
            $tweet->title = Input::post('title');
            $tweet->body = Input::post('body');
            $tweet->description = Input::post('description');

            if ($tweet->save())
            {
                Session::set_flash('success', 'Updated tweet #' . $id);

                Response::redirect('tweet');
            }

            else
            {
                Session::set_flash('error', 'Could not update tweet #' . $id);
            }
        }

        else
        {
            if (Input::method() == 'POST')
            {
                $tweet->title = $val->validated('title');
                $tweet->body = $val->validated('body');
                $tweet->description = $val->validated('description');

                Session::set_flash('error', $val->error());
            }
            // Menote: set global variable $tweet use views
            // readmore: http://fuelphp.com/docs/classes/view.html
            $this->template->set_global('tweet', $tweet, false);
        }

        $this->template->title = "Tweets";
        // Menote: create view obj for tweet/edit and append to $content of template.php
		$this->template->content = View::forge('tweet/edit');

	}

	public function action_delete($id = null)
	{
		Controller_Tweet::pre_process($id);

		if ($tweet = Model_Tweet::find($id))
		{
			$tweet->delete();

			Session::set_flash('success', 'Deleted tweet #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete tweet #'.$id);
		}

		Response::redirect('tweet');

	}

    public static function pre_process($id = null)
    {
        is_null($id) and Response::redirect('tweet');
    }

}
