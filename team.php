<div class="clearfix"></div>
<!--Start Team Section-->
<div id="team-wrapper">
    <div class="container">
        <div id="team-header">
            <div class="team-logo">
                <img src="<?php echo get_template_directory_uri().'/img/7learn.png'; ?>" alt="">
            </div>
            <div class="team-title">
                <h3>تیم حرفه ای سون لرن</h3>
            </div>
        </div>
        <div id="team-members">
            <?php $team_query = new WP_User_Query( array( 'role' => 'Editor' ) ); ?>
            <?php foreach($team_query->results as $user): ?>
                <!--start team member-->
                <div class="team-member">
                    <div class="avatar">
                        <?php echo get_avatar($user->ID); ?>
                    </div>
                    <h3><?php echo $user->display_name; ?></h3>

                    <p><?php echo get_user_meta($user->ID,'title',true); ?></p>

                    <div class="team-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!--end team member-->
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!--End Team Section-->