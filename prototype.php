<?php

interface IClonable
{
	public function clone();
}

class Human implements IClonable
{
	private $name;
	private $age;
	
	public function __construct(string $name, int $age)
	{
		$this->name = $name;
		$this->age = $age;
	}
	
	public function clone()
	{
		return new self($this->name, $this->age);
	}
}

$alex = new Human('Alexander', 20);

$arr = [2,1,5];
asort($arr);
d($alex, $alex->clone(), $arr);

class Arr
{
	protected $arr;
	public function __construct($arr)
	{
		$this->arr = $arr;
	}
	
	public function sort()
	{
		sort($this->arr);
		return $this->arr;
	}
}

class A extends Arr
{
	public function mysort()
	{
		arsort($this->arr);
		return $this->arr;
	}
}

class Interpreter
{
	public static function interpret(string $expr)
	{
		$expr = str_replace(' ', '', $expr);
		
		// array 
		if (preg_match('/^\[.*\]$/', $expr)) {
			$expr = trim($expr, '[]');
			if (preg_match('/,{2,}/', $expr)) {
				throw new Exception('Syntax error: number expects "," given');
			} elseif (preg_match('/,$/', $expr)) {
				throw new Exception('Syntax error: unexpected "," in end expression');
			}
			$expr = explode(',', $expr);
			$expr = array_map(function($item){
				return (int)$item;
			}, $expr);
			return new A($expr);
		} 
		
		// string
		else {
			return $expr;
		}
	}
}

$arr = Interpreter::interpret('[2, 1, 5]');
d($arr->sort());
d($arr->mysort());