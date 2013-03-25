<?php

Autoloader::namespaces(array(
    'Login' => Bundle::path('login').'models',
    'Profile' => Bundle::path('profile').'models',
));

Autoloader::directories(array(
    Bundle::path('login').'models',
));