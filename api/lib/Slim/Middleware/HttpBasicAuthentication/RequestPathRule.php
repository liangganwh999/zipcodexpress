<?php /** 
* Generated by
* 
*      _____ _          __  __      _     _
*     / ____| |        / _|/ _|    | |   | |
*    | (___ | | ____ _| |_| |_ ___ | | __| | ___ _ __
*     \___ \| |/ / _` |  _|  _/ _ \| |/ _` |/ _ \ '__|
*     ____) |   < (_| | | | || (_) | | (_| |  __/ |
*    |_____/|_|\_\__,_|_| |_| \___/|_|\__,_|\___|_|
*
* The code generator that works in many programming languages
*
*			https://www.skaffolder.com
*
*
* You can generate the code from the command-line
*       https://npmjs.com/package/skaffolder-cli
*
*       npm install -g skaffodler-cli
*
*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
*
* To remove this comment please upgrade your plan here: 
*      https://app.skaffolder.com/#!/upgrade
*
* Or get up to 70% discount sharing your unique link:
*       https://beta.skaffolder.com/#!/register?friend=5ca2bb79cba8d50d7d63ba4e
*
* You will get 10% discount for each one of your friends
* 
*/
?>
<?php

/*
 * This file is part of Slim HTTP Basic Authentication middleware
 *
 * Copyright (c) 2013-2015 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/slim-basic-auth
 *
 */

namespace Slim\Middleware\HttpBasicAuthentication;

class RequestPathRule implements RuleInterface
{
    protected $options = array(
        "path" => "/",
        "passthrough" => array()
    );

    public function __construct($options = array())
    {
        $this->options = array_merge($this->options, $options);
    }

    public function __invoke(\Slim\Slim $app)
    {
        /* If request path matches passthrough should not authenticate. */
        foreach ($this->options["passthrough"] as $passthrough) {
            $passthrough = rtrim($passthrough, "/");
            if (!!preg_match("@^{$passthrough}(/.*)?$@", $app->request->getResourceUri())) {
                return false;
            }
        }

        /* Otherwise check if path matches and we should authenticate. */
        $path = rtrim($this->options["path"], "/");
        return !!preg_match("@^{$path}(/.*)?$@", $app->request->getResourceUri());
    }
}