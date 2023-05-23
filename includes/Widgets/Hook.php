<?php

namespace Widgets;

use Custom\Plugin;
use Custom\Widget;

class Hook extends Widget
{
    public function action()
    {
        Plugin::factory('includes/Widgets/Hook.php')->action($this);
    }
}
