<?php declare(strict_types = 1);

/**
 * Returns an array of routes available to the application
 * [Routes] => Array
 *  (
 *    [Route] => Array
 *      (
 *          [Request Type] = Ex. GET, POST,
 *          [RouteURI] = String,
 *          [Request Info] = Array
 *            (
 *              [Namespaced Classname] = String,
 *              [Method] = String
 *            )                      
 *      )  
 *  )
 */
return [
  ['GET', '/', ['Finances\Controllers\Homepage', 'show']],
  ['GET', '/{slug}', ['Finances\Controllers\Page', 'show']],
];