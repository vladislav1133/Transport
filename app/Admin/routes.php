<?php

Route::get('', ['as' => 'admin.dashboard', function () {
    $user = Auth::user();
	$content = 'Добро пожаловать '. $user->name;

	return AdminSection::view($content, 'Административная панель');
}]);

//Route::get('information', ['as' => 'admin.information', function () {
//	$content = '    Define your information here.';
//	return AdminSection::view($content, 'Information');
//}]);