<?php

Autoloader::namespaces(array(
    'Profile' => Bundle::path('profile').'models',
));

Autoloader::directories(array(
    Bundle::path('profile').'models',
));