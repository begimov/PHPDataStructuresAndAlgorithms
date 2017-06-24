<?php

class ListNode
{
    public $data = NULL;
    public $next = NULL;

    public function __construct(string $data = NULL)
    {
        $this->data = $data;
    }
}

class LinkedList {
    private $_firstNode = NULL;
    private $_totalNodes = 0;

    public function insert(string $data = NULL) {
        $newNode = new ListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== NULL) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->_totalNodes++;
        return TRUE;
    }

    public function insertAtFirst(string $data = NULL)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === NULL) {
            $this->_firstNode = $newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = $newNode;
            $newNode->next = $currentFirstNode;
        }
        $this->_totalNodes++;
        return TRUE;
    }

    public function display()
    {
        echo "Total nodes: {$this->_totalNodes}<br>";
        $currentNode = $this->_firstNode;
        while($currentNode !== NULL) {
            echo "{$currentNode->data}<br>";
            $currentNode = $currentNode->next;
        }
    }

    public function search(string $data = NULL)
    {
        if ($this->_totalNodes) {
            $currentNode = $this->_firstNode;
            while($currentNode !== NULL) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return FALSE;
    }
}

$linkedList = new LinkedList();
$linkedList->insert('One');
$linkedList->insert('Two');
$linkedList->insertAtFirst('OneOne');
$linkedList->display();
var_dump($linkedList->search('Two'));
