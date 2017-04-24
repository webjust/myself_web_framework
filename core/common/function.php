<?php
function p($val)
{
    if (is_bool($val)) {
        var_dump($val);
    } elseif (is_null($val)) {
        var_dump(NULL);
    } else {
        echo "<pre style='border:1px solid #ddd; padding: 10px; border-radius: 5px; background-color: #fafafa; opacity: 0.8;'>" . print_r($val, true) . "</pre>";
    }
}
