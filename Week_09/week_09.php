<?php
//8. 字符串转换整数 (atoi)
class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        preg_match('/^[\+\-]?\d+/',trim($str),$strval);
        if(count($strval)==0) return 0;
        $intval = (Integer) $strval[0];
        if($intval>=2147483647) return 2147483647;
        if($intval<=-2147483648) return -2147483648;
        return $intval;
    }
}
//91. 解码方法
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        $len = strlen($s);;
        $dp[$len] = 1;
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($s{$i} == 0) {
                $dp[$i] = 0;
            } else {
                $dp[$i] = $dp[$i + 1] + (($s{$i} * 10 + $s{$i + 1} < 27) ? $dp[$i + 2] : 0);
            }
        }
        return $dp[0];
    }
}