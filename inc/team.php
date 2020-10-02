<?php
$user_query = new WP_User_Query( array( 'role' => 'Editor','meta_key'=>'title' ) );
//dd($user_query->total_users);

