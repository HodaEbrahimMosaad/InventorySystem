<?php
if(!function_exists('aurl'))
{
    function aurl($path = null )
    {
        return url("admin/" . $path);
    }
}

if(!function_exists('admin'))
{
    function admin()
    {
        return auth()->guard('admin');
    }
}
?>