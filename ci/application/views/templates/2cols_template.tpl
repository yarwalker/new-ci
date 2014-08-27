<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{page_title}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- bootstrap MAIN css -->
    <link href="{SITEURL}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap css for dynamic page width -->
    <link href="{SITEURL}/assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap css for mega icons class viewing -->
    <link href="{SITEURL}/assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- customized js -->
    <link href="{SITEURL}/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Just paginator for javascript data (may later be replaced with http://datatables.net/blog/Twitter_Bootstrap_2)-->
    <link href="{SITEURL}/assets/css/jPages.css" rel="stylesheet" type="text/css" />

    <link href="{SITEURL}/assets/css/animate.css" rel="stylesheet" type="text/css" />

    <link href="{SITEURL}/assets/css/prettify.css" rel="stylesheet" type="text/css" />

    <link href="{SITEURL}/assets/css/wysiwyg-color.css" rel="stylesheet" type="text/css" />
    <link href="{SITEURL}/assets/css/daterangepicker.css" rel="stylesheet" type="text/css" />

    <!-- ?????? ? ????????? -->
    <link href="{SITEURL}/assets/css/datatables/DT_bootstrap.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="{SITEURL}/assets/js/respond.min.js"></script>
    <![endif]-->

    <link href="{SITEURL}/assets/css/custom-icamp.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script type="text/javascript" src="{SITEURL}/assets/js/jquery/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/jPages.min.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/bootstrap.min.js"></script>
    <!-- The basic File Upload plugin -->
    <script type="text/javascript" src="{SITEURL}/assets/js/jquery/jquery.fileupload.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/jquery/jquery.iframe-transport.js"></script>

    <script type="text/javascript" src="{SITEURL}/assets/js/prettify.js"></script>

    <script type="text/javascript" src="{SITEURL}/assets/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/datatables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/custom.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/ietest7.js"></script>

    <script type="text/javascript" src="{SITEURL}/assets/js/tinymce/tinymce.min.js"></script>

    <script type="text/javascript" src="{SITEURL}/assets/js/date.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/daterangepicker.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/shop.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="{SITEURL}/assets/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

    <link rel="stylesheet" type="text/css" href="{SITEURL}/assets/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

</head>
<body>
    <div class="modal hide fade" id="ModalDefault" tabindex="-1" role="dialog" aria-labelledby="ModalDefault" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
            <h3 id="myModalLabel"><i class="icon-info-sign"></i> {modal_info}</h3>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">{modal_btn_close}</button>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            if (window.location.hash.length > 1) {
                $(window.location.hash).modal('show')
            }
            $("a[rel=gallery]").fancybox({
                'transitionIn'    : 'none',
                'transitionOut'   : 'none',
                'titlePosition'   : 'over',
                'titleFormat'     : function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });
            $(".item_fotos").click(function(){
                return false;
            });
        })
    </script>

    <div class="page-wrapper">
        <div class="container main-wrapper">
            
            {HEADER}
            
            <div class="row" style="padding-top:40px;">
                <script type="text/javascript">
                    $(function() {
                        if (window.location.hash.length > 1) {
                        //var id  = window.location.hash.replace(/^#/, '');
                            $(window.location.hash).show();
                        }
                    })
                </script>
                <div class="span9 main">
                    <div class="alert alert-success" id="register_success" style="display:none;"><?php echo lang('ci_main.register_success')?></div>
                    <div class="alert alert-success" id="feedback_success" style="display:none;"><?php echo lang('ci_main.feedback_success')?></div>
                    <div class="alert alert-success" id="feedback_errors"  style="display:none;"><?php echo lang('ci_main.feedback_errors')?></div>
                    <div class="alert alert-success" id="invite_success"  style="display:none;"><?php echo lang('ci_main.invite_success')?></div>
                    <div class="alert alert-success" id="account_success"  style="display:none;"><?php echo lang('ci_main.account_success')?></div>
                    <div class="alert alert-success" id="new_password_success"  style="display:none;"><?php echo lang('ci_main.new_password_success')?></div>
                    <div class="row">
                        <div class="span9">
                            {CONTENT}

                        </div>
                    </div>
                </div>

                <div class="span3 <?=((uri_string() == '' || uri_string() == language_code()) ? 'side-bar' : 'side-bar2');?>">
                    <script type="text/javascript">
                        $(function(){
                            $('body').tooltip({
                                selector: "[rel=tooltip]",
                                placement: "bottom" 
                            });
                        });
                    </script>

                    {SIDEBAR}
                    
                    
                </div>    
            </div>    


        </div> <!-- /div.container.main-wrapper -->
        <div class="buffer"></div>
    </div>

    {FOOTER}

</body>
</html>
