<div class="row">
    <div class="span8">
        <div class="logo">
            <a href=""><img src="{SITEURL}/assets/img/t-logo.gif" border="0"/></a>
        </div>

    </div>
    <div class="header-right-row span4">
        <ul class="locale-changer">
            {language_links}
        </ul><br/><br/>
        <div class="i-link"><i class="t-yellow-arrow"></i><a href="/">{promo_link}</a></div>
    </div>
</div>
<!--navbar-->
<div class="navbar navbar-inverse <?php echo (isset($header['navbarfixed']) ? $header['navbarfixed'] : "" )?>">
<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse">
            {menu}
            {user_menu}
            
        </div><!-- /.nav-collapse -->
    </div>
    <?php if (isset($header['menuactive'])) :?>
    <script type="text/javascript">
        var active_link = $('.navbar').find('a[rel=<?php echo $header['menuactive'];?>]');
        active_link.parent('li').attr('class','active');
    </script>
    <?php endif; ?>
</div><!-- /navbar-inner -->
</div>
<!-- /navbar-->