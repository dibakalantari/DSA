<?php

// 10->5->16 

// What we want to create linked list class since we dont have linked list built in, in PHP
// I had problem making the one in the course work in php, so I implemented a little different

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

class LinkedList {
    private $head;

    public function __construct(){
        $this->head = null;
    }

    public function append($data) {
        $newNode = new Node();
        $newNode->setData($data);

        if($this->head == null) {
            $this->head = $newNode;
            return $this;
        }

        // We traverse linked list from the beginning
        $currentNode = $this->head;
        while($currentNode->getNext() !== null) {
            $currentNode = $currentNode->getNext();
        }

        $currentNode->setNext($newNode);
        return $this;
    }

    public function prepend($data) {
        $newNode = new Node();
        $newNode->setData($data);

        if($this->head !== null) {
            $newNode->setNext($this->head);
        }

        $this->head = $newNode;
        return $this;
    }

    public function insertAfterSpecificNode($data,  $target) {
        $newNode = new Node();
        $newNode->setData($data);

        if(!$this->head) {
            return;
        }

        $currentNode = $this->head;
        while($currentNode?->getData() !== $target && $currentNode->getNext()!== null) {
            $currentNode = $currentNode->getNext();
        }

        $newNode->setNext($currentNode->getNext());
        $currentNode->setNext($newNode);

        return $this;
    }

    public function deleteNode($target) {
        if(!$this->head) {
            return;
        }

        $shouldBeDeletedNode = $this->head;  
        while($shouldBeDeletedNode?->getData() !== $target && $shouldBeDeletedNode->getNext()!== null) {
            $previousNode = $shouldBeDeletedNode;
            $shouldBeDeletedNode = $shouldBeDeletedNode->getNext();
        }

        if(!$previousNode) {
            $this->head = $shouldBeDeletedNode->getNext();
        } else{
            $previousNode->setNext($shouldBeDeletedNode->getNext());
        }

        return $this;
    }

    public function reverse() {
        if($this->head == null) {
            return $this;
        }

        $length = 0;
        $nodes = [];
        $currentNode = $this->head;
        while($currentNode !== null) {
            $length++;
            $nodes[] = $currentNode->getData();
            $currentNode = $currentNode->getNext();
        }
        $newNode = new Node();
        $newNode->setData($nodes[$length-1]);

        $this->head = $newNode;
        $currentNode = $this->head;
        for($i = $length - 2;$i>=0; $i-- ) {
            $newNode = new Node();
            $newNode->setData($nodes[$i]);
            $currentNode->setNext($newNode);
            $currentNode = $newNode;
        }

        return $this;
    }

    public function theCorrectUdemyApproachToReverse() {
        if($this->head->getNext() == null) {
            return $this;
        }

        $first = $this->head;
        $second = $first->getNext();
        while($second) {
            $temp = $second->getNext();
            $second->setNext($first);
            $first = $second;
            $second = $temp;
        }

        $this->head->setNext(null); // 5 
        $this->head = $first;
        return $this;
    }
}

// $myLinkedList = new LinkedList();
// $myLinkedList->append(5)->append(6)->append(10);
// print_r($myLinkedList);

// $myLinkedList = new LinkedList();
// $myLinkedList->prepend(5)->prepend(6)->prepend(10);
// print_r($myLinkedList);

// $myLinkedList = new LinkedList();
// $myLinkedList->append(5)->append(6)->append(10);
// $myLinkedList->insertAfterSpecificNode(7, 6);
// print_r($myLinkedList);

// $myLinkedList = new LinkedList();
// $myLinkedList->append(5)->append(6)->append(10);
// $myLinkedList->insertAfterSpecificNode(7,6);
// $myLinkedList->deleteNode(5);
// print_r($myLinkedList);

// $myLinkedList = new LinkedList();
// $myLinkedList->append(5)->append(6)->append(10);
// $myLinkedList->reverse();
// print_r($myLinkedList);

$myLinkedList = new LinkedList();
$myLinkedList->append(5)->append(6)->append(10);
$myLinkedList->theCorrectUdemyApproachToReverse();
print_r($myLinkedList);

// ---------------------------------------------------------------------------------------

// The udemy version that doesnt work for me
// class LinkedList {
//  private $head;
//  private $tail;
//  private $length;

//  public function __construct(string $value) {
//     $this->head = [
//         'value' => $value,
//         'next' => null
//     ];
//     $this->tail = $this->head;
//     $this->length = 1;
//  }

//  function append($value) {
//     $newNode = [
//         'value' => $value, 
//         'next' => null,
//     ];
    
//     $this->tail['next'] = $newNode;
//     $this->tail = $newNode;
//     $this->length++;
//     return $this;
//  }
// }

// $myLinkedList = new LinkedList(10);
// $myLinkedList->append(5)->append(16);
// print_r($myLinkedList);