<?php

    return [

        \App\Core\Route::get ('|^review/?$|','Review','home'),
        \App\Core\Route::post('|^register/user/?$|','Main','home'),
        App\Core\Route::get ('|^.*$|','Main','home')

    ];