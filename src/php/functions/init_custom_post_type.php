<?php
  // Add custom post type ToDo
  add_action('init', 'add_todo_post_type');
  function add_todo_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'ToDo',
        'add_new' => '新規追加',
        'add_new_item' => 'ToDoの新規追加',
        'edit_item'=> 'ToDoを編集する',
        'new_item' => '新規ToDo',
        'view_item' => 'ToDoを表示する',
        'serch_items' => 'ToDoを検索',
        'not_found' => 'ToDoが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内にToDoが見つかりませんでした'
      ),
      'description' => 'ToDoリスト用投稿',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-editor-ul',
      'hierarchical' => false,
      // デフォルトの親子関係は固定ページなどで数ページ分行うことを想定して作られている。
      // 大量の親子関係を処理するようにはできていないので
      // この項目で大量に親子関係を設定してしまうと管理画面でフリーズするおそれがある。
      // そこで今回は親子関係をカスタムフィールドのほうで実装する。
      'supports' => array(
        'title',
        'editor',
        'author',
        'custom-fields'
      )
    );
    register_post_type('todo', $args);
  }


  // Add custom post type Event
  add_action('init', 'add_event_post_type');
  function add_event_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'イベント',
        'add_new' => '新規追加',
        'add_new_item' => 'イベントの新規追加',
        'edit_item'=> 'イベントを編集する',
        'new_item' => '新規イベント',
        'view_item' => 'イベントを表示する',
        'serch_items' => 'イベントを検索',
        'not_found' => 'イベントが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内にイベントが見つかりませんでした'
      ),
      'description' => 'イベント用投稿タイプ',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-calendar',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'author',
        'excerpt',
        'custom-fields'
      )
    );
    register_post_type('event', $args);
  }


  // Add custom post type Project
  add_action('init', 'add_project_post_type');
  function add_project_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'プロジェクト',
        'add_new' => '新規追加',
        'add_new_item' => 'プロジェクトの新規追加',
        'edit_item'=> 'プロジェクトを編集する',
        'new_item' => '新規プロジェクト',
        'view_item' => 'プロジェクトを表示する',
        'serch_items' => 'プロジェクトを検索',
        'not_found' => 'プロジェクトが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内にプロジェクトが見つかりませんでした'
      ),
      'description' => 'プロジェクト用投稿タイプ',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-index-card',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'author',
        'excerpt',
        'custom-fields'
      )
    );
    register_post_type('project', $args);
  }


  // Add custom post type board
  add_action('init', 'add_board_post_type');
  function add_board_post_type() {
    $args = array(
      'labels' => array(
        'name' => '掲示板',
        'add_new' => '新規追加',
        'add_new_item' => '掲示板の新規追加',
        'edit_item'=> '掲示板を編集する',
        'new_item' => '新規掲示板',
        'view_item' => '掲示板を表示する',
        'serch_items' => '掲示板を検索',
        'not_found' => '掲示板が見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内に掲示板が見つかりませんでした'
      ),
      'description' => '掲示板用投稿タイプ',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-feedback',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'author',
        'excerpt',
        'custom-fields'
      )
    );
    register_post_type('board', $args);
  }


  // Add custom post type board_item
  add_action('init', 'add_board_item_post_type');
  function add_board_item_post_type() {
    $args = array(
      'labels' => array(
        'name' => '掲示板レス',
        'add_new' => '新規追加',
        'add_new_item' => '掲示板レスの新規追加',
        'edit_item'=> '掲示板レスを編集する',
        'new_item' => '新規掲示板レス',
        'view_item' => '掲示板レスを表示する',
        'serch_items' => '掲示板レスを検索',
        'not_found' => '掲示板レスが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内に掲示板レスが見つかりませんでした'
      ),
      'description' => '掲示板レス用投稿タイプ',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-exerpt-view',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'author',
        'custom-fields'
      )
    );
    register_post_type('board_item', $args);
  }


  // Add custom post type chatroom
  add_action('init', 'add_chatroom_post_type');
  function add_chatroom_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'チャットルーム',
        'add_new' => '新規追加',
        'add_new_item' => 'チャットルームの新規追加',
        'edit_item'=> 'チャットルームを編集する',
        'new_item' => '新規チャットルーム',
        'view_item' => 'チャットルームを表示する',
        'serch_items' => 'チャットルームを検索',
        'not_found' => 'チャットルームが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内にチャットルームが見つかりませんでした'
      ),
      'description' => 'チャットルーム用投稿タイプ',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-format-chat',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'author',
        'excerpt',
        'custom-fields'
      )
    );
    register_post_type('chatroom', $args);
  }


  // Add custom post type chat
  add_action('init', 'add_chat_post_type');
  function add_chat_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'チャット',
        'add_new' => '新規追加',
        'add_new_item' => 'チャットの新規追加',
        'edit_item'=> 'チャットを編集する',
        'new_item' => '新規チャット',
        'view_item' => 'チャットを表示する',
        'serch_items' => 'チャットを検索',
        'not_found' => 'チャットが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱内にチャットが見つかりませんでした'
      ),
      'description' => 'チャット用投稿タイプ',
      'public' => true,
      'has_archive' => false,
      'exclude_form_search' => false,
      'menu_icon' => 'dashicons-testimonial',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'author',
        'custom-fields'
      )
    );
    register_post_type('chat', $args);
  }
?>
