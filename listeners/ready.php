<?php

use App\Listener\Create;

Create::new('ready', function () {
    echo "Ready!";
});
