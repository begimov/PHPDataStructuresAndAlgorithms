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

    public function insertBefore(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);
        $firstNode = $this->_firstNode;

        if (!$firstNode) {
            $this->_firstNode = $newNode;
            $this->_totalNodes++;
            return true;
        }

        if ($firstNode->data === $query) {
            $newNode->next = $firstNode;
            $this->_firstNode = $newNode;
            $this->_totalNodes++;
            return true;
        }

        $iter = function ($previous, $current) use ($query, &$newNode, &$iter)
        {
            if (!$current) {
                return false;
            }

            if ($current->data === $query) {
                $newNode->next = $current;
                $previous->next = $newNode;
                $this->_totalNodes++;
                return true;
            }
            return $iter($current, $current->next);
        };
        return $iter($firstNode, $firstNode->next);
    }

    public function insertAfter(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);
        $firstNode = $this->_firstNode;

        if (!$firstNode) {
            $this->_firstNode = $newNode;
            $this->_totalNodes++;
            return true;
        }

        if ($firstNode->data === $query) {
            $newNode->next = $firstNode->next;
            $firstNode->next = $newNode;
            $this->_totalNodes++;
            return true;
        }

        $nextNode = NULL;
        $currentNode = $this->_firstNode;
        while ($currentNode !== NULL) {
          if ($currentNode->data === $query) {
              if($nextNode !== NULL) {
                  $newNode->next = $nextNode;
              }
              $currentNode->next = $newNode;
              $this->_totalNode++;
              break;
          }
          $currentNode = $currentNode->next;
        $nextNode = $currentNode->next;
        }
    }

    public function deleteFirst()
    {
        $firstNode = $this->_firstNode;

        if (!$firstNode) {
            return false;
        }
        $this->_firstNode = $firstNode->next;
        $this->_totalNodes--;
        return true;
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
$linkedList->insertBefore('TwoTwo', 'Two');
$linkedList->insertAfter('Three', 'Two');
$linkedList->display();
var_dump($linkedList->search('Two'));
$linkedList->deleteFirst();
$linkedList->display();
