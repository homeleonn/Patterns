<?php

class Context
{
	private $sortStrategy;
	public $arr = [2, 6, 1, 5, 7, 11];
	
	public function setSortStrategy(ISortable $sortStrategy): void
	{
		$this->sortStrategy = $sortStrategy;
		d(get_class($this->sortStrategy));
	}

	/**
	 * @return array
	 * @throws Exception
	 */
	public function sort(): array
	{
		if (!$this->sortStrategy) {
			throw new Exception('Sort strategy is undefined');
		}
		
		return $this->sortStrategy->sort($this->arr);
	}
}

interface ISortable
{
	public function sort(array $arr): array;
}

class sortBubbles implements ISortable
{
	public function sort(array $arr): array
	{
		for ($i = 0; $i < count($arr) - 1; $i++) {
			for ($j = $i + 1; $j < count($arr); $j++) {
				if ($arr[$j] > $arr[$i]) {
					$tmp = $arr[$i];
					$arr[$i] = $arr[$j];
					$arr[$j] = $tmp;
				}
			}
		}
		
		return $arr;
	}
}

class sortSelection implements ISortable
{
	public function sort(array $arr): array
	{
		for ($i = 0; $i < count($arr) - 1; $i++) {
			$currentMax = $arr[$i];
			$k = $i;
			for ($j = $i + 1; $j < count($arr); $j++) {
				if ($arr[$j] > $currentMax) {
					$currentMax = $arr[$j];
					$k = $j;
				}
			}
			if ($k != $i) {
				$tmp = $arr[$i];
				$arr[$i] = $currentMax;
				$arr[$k] = $tmp;
			}
		}
		
		return $arr;
	}
}

class Mysort implements ISortable
{
    public function sort(array $arr): array
    {
        return [];
    }
}

$context = new Context();
$context->setSortStrategy(new sortSelection());
try {
	d($context->sort());
} catch (Exception $e) {
}

d($context->arr);

$context->setSortStrategy(new sortBubbles());
try {
	d($context->sort());
} catch (Exception $e) {
}

$context->setSortStrategy(new Mysort());
try {
	d($context->sort());
} catch (Exception $e) {
}

$data = [
	'title' => 'Strategy',
];