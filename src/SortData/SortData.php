<?php 

namespace SortData;

class SortData
{
	private $sorts;
	private $source;
	private $field;
	private $data;
	private $isRand;

	public function __construct(array $sorts, array $source, $field='name') 
	{
		$this->sorts = $sorts;
		$this->source = $source;
		$this->field = $field;
		$this->data = [];
		$this->isRand = false;		
	}

	public function rand()
	{
		$this->isRand = true;
		return $this;
	}

	public function search()
	{
		foreach($this->source as $key => $value) {
			foreach($this->sorts as $i => $search) {
				if(preg_match("/$search/is", $value[$this->field])) {
					$this->addData($i, $value);
					unset($this->source[$key]);
				}
			}
		}
		return $this;	
	}

	protected function addData($index, $value)
	{
		$this->data[$index][] = $value;
	}	
	
	public function getDataSort()
	{
    	$result = [];
      	foreach($this->data as $d) {
      		$result = array_merge($result, $d);
      	}
      
      	if ($this->isRand) {
        	shuffle($result);
      	}
     
      	return $result;
	}

	public function getResults()
	{

		return array_merge($this->getDataSort(), $this->source);
	}

}