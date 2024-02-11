<?php

class Node {
    private $data;
    private $next;

    public function __construct(){
        $this->data = 0;
        $this->next = null;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function setNext($next){
        $this->next = $next;
    }

    public function getNext(){
        return $this->next;
    }
}

class Stack {
    private $top;
    private $bottom;
    private $length;

    public function __construct() {
        $this->top = null;
        $this->bottom = null;
        $this->length = 0;
    }

    public function push($data) {
        $newNode = new Node();
        $newNode->setData($data);

        if($this->length == 0) {
            $this->bottom = $newNode;
            $this->top = $newNode;
        } else {
            $holdingPointer = $this->top;
            $this->top = $newNode;
            $this->top->setNext($holdingPointer);
        }
        $this->length++;
        return $this;
    }

    public function pop() {
        if(!$this->top) {
            return;
        }
        if($this->top == $this->bottom) {
            $this->bottom = null;
        }

        $this->top = $this->top->getNext();
        $this->length--;

        return $this;
    } 

    public function peek() {
        return $this->top;
    }
}

$myStack = new Stack();
$myStack->push('google')->push('udemy')->push('discord');
$myStack->pop();
print_r($myStack); 
// print_r($myStack->peek());