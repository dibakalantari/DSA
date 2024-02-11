<?php

class Node
{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert($value)
    {
        $newNode = new Node($value);

        if (!$this->root) {
            $this->root = $newNode;
        } else {
            $currentNode = $this->root;
            while (true) {
                if ($value < $currentNode->value) {
                    if (!$currentNode->left) {
                        $currentNode->left = $newNode;
                        return $this;
                    }

                    $currentNode = $currentNode->left;
                } else {
                    if (!$currentNode->right) {
                        $currentNode->right = $newNode;
                        return $this;
                    }

                    $currentNode = $currentNode->right;
                }
            }
        }
    }

    public function lookup($value)
    {
        if (!$this->root) {
            return false;
        }

        $currentNode = $this->root;
        while ($currentNode) {
            if ($currentNode->value == $value) {
                return $currentNode;
            } elseif ($value < $currentNode->value) {
                $currentNode = $currentNode->left;
            } else {
                $currentNode = $currentNode->right;
            }
        }

        return false;
    }

    public function breadthFirstSearch() {
        $currentNode = $this->root;
        $list = [];
        $queue = [];
        $queue[] = $currentNode;

        while(count($queue) > 0) {
            $currentNode = array_shift($queue);
            
            if($currentNode->left) {
                $queue[] = $currentNode->left;
            }
            if($currentNode->right) {
                $queue[] = $currentNode->right;
            }

            $list[] = $currentNode->value; 
        }

        return $list;
    }

    public function breadthFirstSearchR($queue, $list) {
        // base case
        if(count($queue) == 0) {
            return $list;
        }

        $currentNode = array_shift($queue);
        if($currentNode->left) {
            $queue[] = $currentNode->left;
        }

        if($currentNode->right) {
            $queue[] = $currentNode->right;
        }

        $list[] = $currentNode->value;
        return $this->breadthFirstSearchR($queue, $list);
    }

    public function DFSInOrder() {
        $list = [];
        return $this->traverseInOrder($this->root, $list);
    }

    public function DFSPreOrder() {
        $list = [];
        return $this->traversePreOrder($this->root, $list);
    }

    public function DFSPostOrder() {
        $list = [];
        return $this->traversePostOrder($this->root, $list);
    }

    public function traverseInOrder($node, &$list) {
        if($node->left) {
            $this->traverseInOrder($node->left, $list);
        }

        $list[] = $node->value;
        if($node->right) {
            $this->traverseInOrder($node->right, $list);
        }

        return $list;
    }

    public function traversePreOrder($node, &$list) {
        $list[] = $node->value;
        if($node->left) {
            $this->traversePreOrder($node->left, $list);
        }

        if($node->right) {
            $this->traversePreOrder($node->right, $list);
        }

        return $list;
    }

    public function traversePostOrder($node, &$list) {
        if($node->left) {
            $this->traversePostOrder($node->left, $list);
        }
        if($node->right) {
            $this->traversePostOrder($node->right, $list);
        }
        $list[] = $node->value;

        return $list;
    }
}

//     9
//  4     20
//1  6  15  170

// BFS = [9, 4, 20, 1, 6, 15, 170]
// DFS = [9, 4, 1,6,20, 15, 170]
// DFS in order = [1, 4, 6, 9, 15, 20, 170]
// DFS Pre order = [9, 4, 1, 6, 20, 15, 170]
// DFS Post order = [1, 6, 4, 15, 170, 20, 9]

$tree = new BinarySearchTree();
$tree->insert(9);
$tree->insert(4);
$tree->insert(6);
$tree->insert(20);
$tree->insert(170);
$tree->insert(15);
$tree->insert(1);
// print_r($tree->breadthFirstSearchR([$tree->root], []));
print_r($tree->DFSPostOrder());


