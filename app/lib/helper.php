<?php

namespace PHPMVC\LIB;

trait Helper
{
    public  function  redirect($input)
    {
        session_write_close();
        header('Location : '. $input);

    }

    public  function  redirect_3($input)
    {
        session_write_close();
        header("refresh:2; url=".$input);

    }




}