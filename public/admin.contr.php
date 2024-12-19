<?php 

class RoutingNumberContr extends RoutingNumber{
    private $routeNo;

    public function __construct($routeNo)
    {
        $this->routeNo = $routeNo;
    }

    public function noUpdate(){
        $this->updateNo($this->routeNo);
    }
}