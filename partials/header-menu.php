<!--Start Main Menu-->
<div id="main-menu-wrapper">
    <div class="container">
        <div id="main-menu" class="menu">
            <?php if( has_nav_menu('header-menu') ): ?>
                <?php  wp_nav_menu(array('theme_location' =>'header-menu' ));  ?>
            <?php else: ?>
                <div class="top-bar-menu-no-item">لطفا برای این قسمت یک منو انتخاب کنید</div>
            <?php endif; ?>
        </div>
        <div id="top-search">
            <form action="" method="get">
                <div class="from-row">
                    <label for="search-input">
                        <i class="fa fa-search"></i>
                    </label>
                    <input id="search-input" name="s" type="text" placeholder="عبارت مورد نظر را وارد کنید">
                </div>
            </form>
        </div>
    </div>

</div>
<!--End Main Menu-->