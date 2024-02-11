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

class Queue {
    private $first;
    private $last;
    private $length;

    public function __construct () {
        $this->first = null;
        $this->last = null;
        $this->length = 0;
    }

    public function enqueue($data) {
        $newNode = new Node();
        $newNode->setData($data);

        if($this->length == 0) {
            $this->first = $newNode;
            $this->last = $newNode;
        } else {
            $this->last->setNext($newNode);
            $this->last = $newNode;    
        }

        $this->length++;
        return $this;
    }

    public function dequeue() {
        if(!$this->first) {
            return $this;
        }

        if($this->first == $this->last) {
            $this->last = null;
            $this->first = null;
        }
        $this->first = $this->first->getNext();

        $this->length--;
        return $this;
    }

    public function peek() {
        return $this->first;
    }
}

$queue = new Queue();
$queue->enqueue('google')->enqueue('udemy')->enqueue('discord');
// print_r($queue->peek());
$queue->dequeue();
print_r($queue);

