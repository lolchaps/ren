<?php 

namespace App\Controllers;

class PagesController
{
	/**
	 * Show the home page.
	 */
	public function home() 
	{
		return view('pages.index');
	}

	/**
	 * Show the about page.
	 */
	public function about() 
	{
		return view('pages.about');
	}

	/**
	 * Show the contact page.
	 */
	public function contact() 
	{
		return view('pages.contact');
	}
}