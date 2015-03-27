<?php
  //Add custom taxonomy for boards
  add_action('init', 'add_boards_taxonomy');
  function add_boards_taxonomy() {
    $args = array(
      'labels' => array(
        'name' => 'カテゴリ',
        'singular_name' => 'カテゴリ',
        'menu_name' => 'カテゴリ',
        'all_items' => 'すべての項目',
        'edit_item' => '項目を編集',
        'view_item' => '項目を表示',
        'update_item' => '項目を更新',
        'add_new_item' => '新しい項目を追加',
        'new_item_name' => '新しい項目の名前',
        'parent_item' => '親の項目',
        'parent_item_colon' => '親の項目:',
        'search_items' => '項目を検索',
        'popular_items' => '人気の項目',
        'separate_items_with_commas' => '項目をコンマで区切ってください',
        'add_or_remove_items' => '項目の追加または削除',
        'choose_from_most_used' => 'よく使われている項目から選択',
        'not_found' => '項目がありません'
      ),
      'public' => true,
      'show_admin_column' => true,
      'hierarchical' => true
    );
    register_taxonomy('boards_taxonomy', 'board', $args);
  }







 ?>
