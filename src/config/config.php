<?php

return [

  /**
   * Should we send errors to Airbrake
   */
  'enabled'             => false,

  /**
   * Airbrake API key
   */
  'api_key'             => '',

  /**
   * Should we send errors async
   */
  'async'               => false,

  /**
   * Which enviroments should be ingored? (ex. local)
   */
  'ignore_environments' => [],

  /**
   * Ignore these exceptions
   */
  'ignore_exceptions'   => [],

  /**
   * Connection to the airbrake server
   */
  'connection'          => [

    'host'      => 'api.airbrake.io',

    'port'      => '443',

    'secure'    => true,

    'verifySSL' => true
  ]

];