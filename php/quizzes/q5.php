<?php
/**
* q5.txt
*
* Quiz 5 for your enjoyment
*
* @category    Quiz
* @package     Quiz 5
* @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
* @version     2019.10.03
* @grade        12 / 10
*/

// 1. (4pts) Define a simple class called Order.
// Your class should have a standard construct function, but it doesn't need to do anything yet.
// It should also have at least 3 private properties, one being order_id
class Order {
    private $order_id;
    private $order_name;
    private $date_ordered;
    public function __construct()
    {

    }
    function getOrderId() {
        return $this->order_id;
    }
    function setOrderId($id) {
        $this->order_id=$id;
    }
}


// 2. (4pts) Add a get and set function for one of your classes properties above (any one is fine, order_id recommended).
// Hint: A get function returns a property, a set function saves data into it.



// 3. (2pt) In a $myTransaction variable, create an instance of the class you created above.
$myTransaction=new Order();


// B. (2pt) Explain how someone would update and use an object like this.
// Can you use it in your project?
/*
 * Someone could you use this object to create new orders that the class would insert the queries necessary for that specific customer
 * Yes
 */
