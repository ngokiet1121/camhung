<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;
	public $sale = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQuantity = $oldCart->totalQuantity;
			$this->totalPrice = $oldCart->totalPrice;
			$this->sale = $oldCart->sale;
		}
	}
	public function add($item,$id){
		$storedItem = ['quantity' => 0, 'price' => $item->price, 'sale' => $item->sale, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['quantity']++;
		$storedItem['price'] = ($item->price - $item->price * $item->sale/100) * $storedItem['quantity'];
		$this->items[$id] = $storedItem;
		$this->totalPrice += $item->price - $item->price * $item->sale/100;
		$this->totalQuantity++;
	}
	public function sub($id){
		$this->items[$id]['quantity']--;
		$this->items[$id]['price'] -= ($this->items[$id]['item']['price'] - $this->items[$id]['item']['price']*$this->items[$id]['item']['sale']/100);
		$this->totalQuantity--;
		$this->totalPrice -= ($this->items[$id]['item']['price'] - $this->items[$id]['item']['price']*$this->items[$id]['item']['sale']/100);


		if($this->items[$id]['quantity'] <= 0){
			unset($this->items[$id]);
		}
	}
	public function removeItem($id){
		$this->totalQuantity -= $this->items[$id]['quantity'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}	
}
