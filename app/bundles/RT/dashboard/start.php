<?php

Autoloader::namespaces(array(
    'Dashboard' => Bundle::path('dashboard').'models',
));

Autoloader::directories(array(
    Bundle::path('dashboard').'models',
));