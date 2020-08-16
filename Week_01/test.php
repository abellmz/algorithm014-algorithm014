<?php
//26删除排序数组中的重复项   双指针法
function removeDuplicates(&$nums) {
    $len=count($nums);
    $slow=0;
    for($faste=1;$faste<$len;++$faste){
        if($nums[$faste]!=$nums[$slow]){
            $slow++;
            if($slow != $faste){
                $nums[$slow]=$nums[$faste];
            }
        }
    }
    return $slow+1;
}
//189旋转数组
function rotate(&$nums, $k) {
    $len=count($nums);
    for($i=0;$i<$len;$i++){
        $arr[($i+$k)%$len]=$nums[$i];
    }
    ksort($arr);
    $nums=$arr;
    return $nums;
}

//21合并两个有序链表
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $temp = new ListNode(null);
        $cur = $temp;// 这是head节点
        while($l1 && $l2){
            // 已是有序链表，考虑合并即可
            if($l1->val > $l2->val){
                $cur->next = $l2;
                $l2 = $l2->next;
            }else{
                $cur->next = $l1;
                $l1 = $l1->next;
            }
            $cur = $cur->next;
        }

        $l1 && $cur->next = $l1;
        $l2 && $cur->next = $l2;
        return $temp->next;
    }
}

//88合并两个有序数组
function merge(&$nums1, $m, $nums2, $n) {
    for($i=0;$i<$n;$i++){
        $nums1[$m+$i]=$nums2[$i];
    }
    sort($nums1);
}

//1两数之和
function twoSum($nums, $target) {
    $result=[];
    foreach($nums as $k=>$v){
        $value=$target-$v;
        if(array_keys($nums,$value) && array_keys($nums,$value)[0]!=$k){
            $result=[$k,array_keys($nums,$value)[0]];
            return $result;
        }
    }
}

//283 移动零 双指针法
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $len = count($nums);
        if ($len <= 1) {
            return;
        }

        $slow = 0;
        for ($fast = 0; $fast < $len; ++$fast) {
            if ($nums[$fast] != 0) {
                if ($slow < $fast && $nums[$slow] == 0) {
                    $nums[$slow] = $nums[$fast];
                    $nums[$fast] = 0;
                }
                $slow++;
            }
        }
    }
}

//66加一   这题一开始自己做发现有个科学计数法的问题没法绕过去，看题解了
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    public function plusOne($digits) {
        $p = --count($digits);
        $arrRes = $this->checkData($digits, $p);
        return $arrRes;
    }

    /**
     * @param Integer[] $digits
     * @param Integer $p
     * @return Integer[]
     */
    public function checkData($digits, $p) {
        if($digits[$p] === 9) {
            $digits[$p] = 0;
            if($p > 0) {
                $digits = $this->checkData($digits, --$p);
            } else {
                array_unshift($digits, 1);
            }
        } else {
            ++$digits[$p];
        }
        return $digits;
    }
}
//641.设计循环双端队列（中）

//42接雨水（难）

