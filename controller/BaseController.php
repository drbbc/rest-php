<?php
namespace Lazyphp\Controller;
use \Sokil\Mongo\Client;
class BaseController
{
    public function __construct()
    {
			$this->client = new Client("mongodb://127.0.0.1");
    }
}