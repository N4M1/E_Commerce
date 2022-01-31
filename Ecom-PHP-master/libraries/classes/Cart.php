<?php

class Cart
{
    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array();
        }
    }

}