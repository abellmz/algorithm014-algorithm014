<?php
//242. 有效的字母异位词
function isAnagram($s, $t) {
    $length = strlen($s);
    if ($length != strlen($t)) {
        return false;
    }
    $hash = [];
    for ($i = 0; $i < $length; $i++) {
        $hash[$s[$i]] = ($hash[$s[$i]] ?? 0) + 1;
    }
    for ($i = 0; $i < $length; $i++) {
        if (isset($hash[$t[$i]]) && --$hash[$t[$i]] == 0) {
            unset($hash[$t[$i]]);
        }
    }
    return $hash == [];
}
//49. 字母异位词分组
function groupAnagrams($strs) {
    $map = [];
    foreach($strs as $str){
        $tmp_str = $this->formatAtoZ($str);
        $map[$tmp_str][] = $str;
    }
    return $map;
}

function formatAtoZ($str){
    $arr = str_split($str);
    sort($arr);
    return implode("",$arr);
}
//429. N叉树的层序遍历
function levelOrder($root) {
    if($root === null){
        return [];
    }
    $res = [];
    $queue = new \SplQueue();
    $queue->enqueue($root);
    while(!$queue->isEmpty()){
        $len = $queue->count();
        $tmp = [];
        //当前层
        for ($i = 0; $i < $len; $i++) {
            $node = $queue->dequeue();
            $tmp[] = $node->val;
            //入队
            foreach ($node->children as $child) {
                $queue->enqueue($child);
            }
        }
        $res[] = $tmp;
    }
    return $res;
}