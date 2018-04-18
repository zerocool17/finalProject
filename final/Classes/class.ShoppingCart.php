<?php

Class ShoppingCart implements iterator {

	public $items = array();

	public function addToCart($isbn, $qty) {
		$this->items[$isbn] = $qty;
		//$cart=array($isbn=>$items);
		//return $cart;
	}

	/*Iterator Methods */
	public function rewind() {
		reset($this->items);
	}

	public function current() {
		$var = current($this->items);
		return $var;
	}

	public function key() {
		$var = key($this->items);
		return $var;
	}

	public function next() {
		$var = next($this->items);
		return $var;
	}

	public function valid() {
		$var = valid($this->items);
		$var = ($key !== NULL && $key !== FALSE);
		return $var;
	}

}

?>
