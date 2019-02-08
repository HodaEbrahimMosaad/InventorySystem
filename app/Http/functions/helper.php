<?php
if(!function_exists('aurl'))
{
    function aurl($path = null )
    {
        return url("admin/" . $path);
    }
}
if(!function_exists('aiurl'))
{
    function aiurl($path = null )
    {
        return url("admin/inventory/" . $path);
    }
}
if(!function_exists('amurl'))
{
    function amurl($path = null )
    {
        return url("admin/manager/" . $path);
    }
}
if(!function_exists('admin'))
{
    function admin()
    {
        return auth()->guard('admin');
    }
}
if(!function_exists('murl'))
{
    function murl($path = null )
    {
        return url("manager/" . $path);
    }
}if(!function_exists('surl'))
{
    function surl($path = null )
    {
        return url("supplier/" . $path);
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