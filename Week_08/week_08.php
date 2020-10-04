<?php

/**
 * 146. LRU缓存机制
 * Class LRUCache
 */
class LRUCache
{
    protected $capacity;
    protected $hash;
    protected $used;
    /**
     * @param Integer $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->hash = [];
        $this->used = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    public function get($key)
    {
        if (isset($this->hash[$key])) {
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->used[] = $key;
            return $this->hash[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put($key, $value)
    {
        if (isset($this->hash[$key])) {
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->hash[$key] = $value;
            $this->used[] = $key;
        } else {
            if (count($this->hash) == $this->capacity) {
                $k = reset($this->used);
                array_shift($this->used);
                unset($this->hash[$k]);
            }

            $this->used[] = $key;
            $this->hash[$key] = $value;
        }
    }
}

//56. 合并区间
function merge($intervals) {
    if(count($intervals)<1) return [];
    // 默认二维数组排序，是根据一维数组的第一个值进行排序的
    sort($intervals);
    $j = 0;
    $ans[$j] = $intervals[0];
    for($i=1;$i<count($intervals);$i++){
        $start = $intervals[$i][0];
        $end = $intervals[$i][1];
        if($start<=$ans[$j][1]){//说明可以合并
            $ans[$j] = [$ans[$j][0],max($ans[$j][1],$end)];
        }else{
            $j++;
            $ans[$j] = $intervals[$i];
        }
    }
    return $ans;
}