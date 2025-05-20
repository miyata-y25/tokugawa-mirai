<?php
/**
 *  CSVインポートプラグインのACF対応
 */
function really_simple_csv_importer_save_meta_acf($meta, $post, $isUpdate)
{
    global $wpdb;
    // acf-fieldを取得するためのクエリ
    $sqlNormal = "SELECT post_name
    FROM wp_posts
    WHERE post_type = 'acf-field' AND post_excerpt = '%s' LIMIT 1";

    $metaResult = [];
    // 各値をacfで登録した場合と同じになるようにメタデータに追加
    foreach ($meta as $key => $value) {

        /*
         * acfのフィールドは"acf_"を先頭に付ける。
         * acf以外はそのまま何もしない。
         */
        if (strpos($key, "acf_") === false) {
            $metaResult[$key] = $value;
            continue;
        }

        // acf_の文字列を取り除く
        $acfKey = preg_replace('/^acf_(.*)/', '$1', $key);
        $metaResult[$acfKey] = $value;


        // 繰り返しフィールド対応
        $keyStr = $acfKey;
        preg_match('/^(.*)_[0-9]{1,}_(.*)/', $acfKey, $keyMatches);
        if (isset($keyMatches[2])) {
            $keyStr = $keyMatches[2];
        }

        // フィールドキー対応
        $prepared = $wpdb->prepare($sqlNormal, esc_sql($keyStr));
        $fieldKey = $wpdb->get_col($prepared);
        // アンダーバー＋キー名にフィールドキーの値を当てる
        if($fieldKey) {
            $metaResult["_" . $acfKey] = $fieldKey[0];
        }
    }
    return $metaResult;
}

add_filter('really_simple_csv_importer_save_meta', 'really_simple_csv_importer_save_meta_acf', 10, 3);


function custom_or_search($search) {
    return str_replace(')) AND ((', ')) OR ((', $search);
}
add_filter('posts_search', 'custom_or_search');

//検索全角スペース対応
function empty_search( $query ) {
    if ( $query->is_main_query() && $query->is_search && ! $query->is_admin ) {
    $s = $query->get( 's' );
    $s = str_replace('　',' ', $s );
    $query->set( 's', $s );
    }
}
add_action( 'pre_get_posts', 'empty_search' );

//Event Organiserのイベント開始月を検索対象に追加
function filter_events_by_month($query) {
    if ($query->is_main_query() && is_post_type_archive('event')) {
        $selected_month = isset($_GET['event_month']) ? intval($_GET['event_month']) : false;

        if ($selected_month !== false) {
            $meta_query = array(
                array(
                    'key'     => '_event_start_date',
                    'value'   => array(date('Y-m-01', strtotime("+$selected_month months")), date('Y-m-t', strtotime("+$selected_month months"))),
                    'compare' => 'BETWEEN',
                    'type'    => 'DATE',
                ),
            );

            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'filter_events_by_month');