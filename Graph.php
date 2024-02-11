<?php

// We want to build undirected, unweighted graph using adjacency list, and for adjacency list we are going to use hash table

class Graph
{
    public $numberOfNodes;
    public $adjacentList;

    public function __construct()
    {
        $this->numberOfNodes = 0;
        $this->adjacentList = []; // We are going to use associative array /hash map , because if we use array here
        // shifting and unshifting of graph nodes are going to be really expensive
    }

    public function addVertex($node)
    {
        $this->adjacentList[$node] = [];
        $this->numberOfNodes++;
        return $this;
    }

    public function addEdge($node1, $node2)
    {
        $this->adjacentList[$node1][] = $node2;
        $this->adjacentList[$node2][] = $node1;
        return $this;
    }

    public function showConnections()
    {
        $nodes = array_keys($this->adjacentList);

        foreach ($nodes as $node) {
            $nodeConnections = $this->adjacentList[$node];
            $connections = "";
            foreach ($nodeConnections as $nodeConnection) {
                $connections .= $nodeConnection . " ";
            }
            echo $node . "-->" . $connections . "\n";
        }
    }
}

$myGraph = new Graph();
$myGraph->addVertex(0);
$myGraph->addVertex(1);
$myGraph->addVertex(2);
$myGraph->addVertex(3);
$myGraph->addVertex(4);
$myGraph->addVertex(5);
$myGraph->addVertex(6);
$myGraph->addEdge(3, 1);
$myGraph->addEdge(3, 4);
$myGraph->addEdge(4, 2);
$myGraph->addEdge(4, 5);
$myGraph->addEdge(1, 2);
$myGraph->addEdge(1, 0);
$myGraph->addEdge(0, 2);
$myGraph->addEdge(6, 5);
print_r($myGraph->showConnections());
