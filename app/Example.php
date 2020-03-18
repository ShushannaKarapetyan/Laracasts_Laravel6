<?php


namespace App;


class Example
{
    /*protected $foo;

    public function go(){
        dd("It Works!");
    }

    public function __construct($foo){
        $this->foo = $foo;
    }*/

    protected $collaborator;
    protected $foo;

    /*public function __construct(Collaborator $collaborator, $foo){
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }*/

    public function handle(){
        die('it works');
    }


}
