<?php

class Node {
    private $data;
    private $next;
    private $previous;

    public function __construct(){
        $this->data = 0;
        $this->next = null;
        $this->previous = null;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setNext($next){
        $this->next = $next;
    }

    public function getNext(){
        return $this->next;
    }

    public function setPrevious($previous){
        $this->previous = $previous;
    }

    public function getPrevious(){
        return $this->previous;
    }
}

class DoublyLinkedList {
    private $head;

    public function __construct(){
        $this->head = null;
    } 

    public function append($data) {
        $newNode = new Node();
        $newNode->setData($data);

        if(!$this->head) {
            $this->head = $newNode;
            return $this;
        }

        $currentNode = $this->head;
        // We have to find the last node,
        // make this new node the next node of the last one, 
        // and the previos pointer of the new node should point to the last node
        while($currentNode->getNext() !== null) {
            $currentNode = $currentNode->getNext();
        }

        $currentNode->setNext($newNode);
        $newNode->setPrevious($currentNode);

        return $this;
    }
}

$myLinkedList = new DoublyLinkedList();
$myLinkedList->append(5)->append(6);
print_r($myLinkedList);
