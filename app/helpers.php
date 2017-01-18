<?php

function currentUser() {
	return auth()->user();
}
function itemsMenu() {
	return $items = [
		'home' => ['url' => '/home'],
		'about' => ['title' => 'Who we are', 'url' => 'about-us', 'class' => 'uno'],
		'contact-us' => [
			'submenu' =>
			[
				'about' => [],
				'company' => ['submenu' =>
					[
						'about' => [],
						'company' => [],
					],
				],
			],
		],
		'file' => ['utl' => '/fiel'],
		'user' => ['title' => currentUser()->name,

			'submenu' =>
			[
				'logout' => ['title' => trans('validation.attributes.logout') . chr(15) . 's', 'url' => '#'],
				'company' => [],
			],

		],
	];
}