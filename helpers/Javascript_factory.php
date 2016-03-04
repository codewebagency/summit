<?php
namespace Helpers;
use Helpers\Javascript;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Factory class that creates an object of the Javascript class
 *
 * @author hossein
 */
class Javascript_factory {
    /**
     * 
     * @return \Javascript
     */
    public static function create()
    {
        return new Javascript();
    }
}
