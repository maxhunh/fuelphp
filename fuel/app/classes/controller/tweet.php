<?php
class Controller_Tweet extends Controller_Template
{

	public function action_index()
	{
		$data['tweets'] = Model_Tweet::find('all');
		$this->template->title = "Tweets";
		$this->template->content = View::forge('tweet/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('tweet');

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
		if (Input::method() == 'POST')
		{
			$val = Model_Tweet::validate('create');

			if ($val->run())
			{
				$tweet = Model_Tweet::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
					'description' => Input::post('description'),
				));

				if ($tweet and $tweet->save())
				{
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
		is_null($id) and Response::redirect('tweet');

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

			$this->template->set_global('tweet', $tweet, false);
		}

		$this->template->title = "Tweets";
		$this->template->content = View::forge('tweet/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('tweet');

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

}
