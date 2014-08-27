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