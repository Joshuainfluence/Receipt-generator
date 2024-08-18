<?php 
class ReceiptContr extends Receipt{
    private $order_id;
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }
    public function receiptShow(){
        if ($this->order_id == null) {          
            exit();
        }
       
        $data = $this->showReceipt($this->order_id);
        return $data;
       
    }
}