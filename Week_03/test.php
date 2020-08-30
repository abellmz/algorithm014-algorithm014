<?php
/**
 * 236. 二叉树的最近公共祖先
 * @param TreeNode $root
 * @param TreeNode $p
 * @param TreeNode $q
 * @return TreeNode
 */
function lowestCommonAncestor($root, $p, $q) {
    if ($root === null) return null;
    if ($root->val === $p->val || $root->val === $q->val) return $root;
    $left = $this->lowestCommonAncestor($root->left, $p, $q);
    $right = $this->lowestCommonAncestor($root->right, $p, $q);
    if ($left === null) return $right;
    if ($right === null) return $left;
    if ($left !== null && $right !== null) return $root;
    return null;
}
/**
 * 105. 从前序与中序遍历序列构造二叉树
 * @param Integer[] $preorder
 * @param Integer[] $inorder
 * @return TreeNode
 */
function buildTree($preorder, $inorder) {
    if (empty($preorder)) {
        return null;
    }
    $preRootValue = $preorder[0];
    $root = new TreeNode($preRootValue);
    $inRootIndex = array_search($preRootValue, $inorder);
    // 用于构造左子树的中序遍历序列
    $leftInOrder = array_slice($inorder, 0, $inRootIndex);
    // 用于构造右子树的中序遍历序列
    $rightInOrder = array_slice($inorder, $inRootIndex+1);
    // 用于构造左子树的先序遍历序列
    $leftPreOrder = array_slice($preorder, 1, $inRootIndex);
    // 用于构造右子树的先序遍历序列
    $rightPreOrder = array_slice($preorder, $inRootIndex+1);
    // 构造左子树
    $root->left = $this->buildTree($leftPreOrder, $leftInOrder);
    // 构造右子树
    $root->right = $this->buildTree($rightPreOrder, $rightInOrder);
    return $root;
}
