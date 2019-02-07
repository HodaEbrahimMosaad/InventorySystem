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
if(!function_exists('get_session'))
{
    function get_session($session)
    {
        if (session()->has($session))
        {
            return
                "<div class=\"alert alert-success\">"
                . session()->get($session)
                . "</div>";
        } else {
            return "";
        }
    }
}
?>