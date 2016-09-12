<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title>NASFAT Membership Portal</title>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?php $css = array('common/bootstrap/css/bootstrap.min',
    'common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min',
    'common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min',
    'common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2',
    'common/theme/scripts/plugins/forms/select2/select2',
    'common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy',
    'common/theme/scripts/plugins/notifications/notyfy/themes/default',
    'common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter',
    'common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min',
    'common/theme/css/glyphicons',
    'common/theme/css/font-awesome/css/font-awesome.min',
    'common/bootstrap/extend/bootstrap-select/bootstrap-select',
    'common/bootstrap/extend/bootstrap-switch/static/stylesheets/bootstrap-switch',
    'common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default',
    'common/theme/scripts/plugins/other/google-code-prettify/prettify',
    'common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors',
    'common/theme/css/style.css?1382104445'); ?>
    <?php echo $this->Html->css($css); ?>
    <?php $js = array('common/theme/scripts/plugins/system/jquery-1.8.2.min',
                       'common/theme/scripts/plugins/system/modernizr.custom.76094',
                       'common/theme/scripts/plugins/system/less-1.3.3.min',
                       'common/theme/scripts/plugins/other/excanvas/excanvas',
                       'common/theme/scripts/plugins/other/json2'
                    ); ?>
    <?php echo $this->Html->script($js); ?>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57c97bbc52bbe76938dbee2b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</head>
<body>

<!-- Start Content -->
<div class="first-container container fluid">

<div class="navbar main hidden-print">


    <a href="/" class="appbrand"><span>NASFAT <span>Membership Portal</span></span></a>

    <!-- Menu Toggle Button -->
    <button type="button" class="btn btn-navbar">
        <span class="glyphicons show_lines toggle"></span>
    </button>
    <?php if($logged_user !== 'guest'){ ?>
    <!-- // Menu Toggle Button END -->
    <?php echo $this->element('navigations/top_right_menu'); ?>
    <?php } ?>

</div>

<div id="wrapper">
    <?php if($logged_user !== 'guest'){ ?>
    <?php echo $this->element('navigations/side_menu'); ?>
    <?php } ?>
    <div id="content" 	>
        <div class="alert alert-success"><?php 	echo $this->Session->flash(); ?></div>
    <?php
            echo $this->fetch('content');
    ?>
</div>
<!-- Sticky Footer -->
<div id="footer" class="visible-desktop hidden-print">
    <div class="wrap">
        <ul>
            <li class="dropdown dropup">
                <span data-toggle="dropdown" class="dropdown-toggle glyphicons settings text" title=""><i></i><span class="hidden-phone">Contact Us</span></span>
                <ul class="dropdown-menu pull-left">
                    <li class="active"><a href="#" data-menuPosition="left-menu" title="">07037737504</a></li>
                    <li><a href="#" data-menuPosition="right-menu" title="">08080764159</a></li>
                    <li><a href="#" data-menuPosition="right-menu" title="">ict@nasfat.org</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

</div>

<?php $js_ = array(
                       'common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min',
                       'common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min',
                       'common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors',
                       'common/theme/scripts/plugins/forms/select2/select2',
                       'common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min',
                       'common/theme/scripts/demo/common.js?1382104445',
                       'common/theme/scripts/plugins/other/holder/holder',
                       'common/theme/scripts/demo/twitter',
                       'common/theme/scripts/plugins/system/jquery.cookie',
                       'common/theme/scripts/demo/themer',
                       'common/theme/scripts/demo/index',
                       'common/theme/scripts/plugins/charts/sparkline/jquery.sparkline',
                       'common/theme/scripts/plugins/charts/flot/jquery.flot',
                       'common/theme/scripts/plugins/charts/flot/jquery.flot.pie',
                       'common/theme/scripts/plugins/charts/flot/jquery.flot.tooltip',
                       'common/theme/scripts/plugins/charts/flot/jquery.flot.selection',
                       'common/theme/scripts/plugins/charts/flot/jquery.flot.resize',
                       'common/theme/scripts/plugins/charts/flot/jquery.flot.orderBars',
                       'common/theme/scripts/demo/charts.helper.js?1382104445',
                       'common/theme/scripts/plugins/other/jquery.ba-resize',
                       'common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min',
                       'common/bootstrap/js/bootstrap.min',
                       'common/bootstrap/extend/bootstrap-select/bootstrap-select',
                       'common/bootstrap/extend/bootstrap-switch/static/js/bootstrap-switch.min',
                       'common/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min',
                       'common/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min',
                       'common/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload',
                       'common/bootstrap/extend/bootbox',
                       'common/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min',
                       'common/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2',
                       'common/theme/scripts/demo/layout',
                       'common/theme/scripts/plugins/other/google-code-prettify/prettify',
                       'common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min',
                       'common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy',
                       'common/theme/scripts/plugins/other/jquery.ba-resize',
                       'common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min',
                       'common/theme/scripts/plugins/tables/DataTables/js/jquery.dataTables',
                       'common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/js/TableTools',
                       'common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/js/ZeroClipboard',
                       'common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/js/ZeroClipboard',
                       'common/theme/scripts/plugins/tables/DataTables/extras/ColVis/media/js/ColVis',
                       'common/theme/scripts/plugins/tables/DataTables/js/DT_bootstrap',
                       'common/theme/scripts/plugins/tables/DataTables/js/datatables.init'); ?>
<?php echo $this->Html->script($js_); ?>
<script>Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:9})</script>
<!-- Colors -->
<script>
    var primaryColor = '#4a8bc2',
            dangerColor = '#b55151',
            successColor = '#609450',
            warningColor = '#ab7a4b',
            inverseColor = '#45484d';
</script>
<!-- Themer -->
<script>
    var themerPrimaryColor = '#DA4C4C';
</script>
<!-- Global -->
<script>
    var basePath = '',
        commonPath = '../common/',
    // charts data
            charts_data = {
                // 24 hours
                graph24hours: {
                    from: 1381874400000,
                    to: 1381960800000			},
                // 7 days
                graph7days: {
                    from: 1381356000000,
                    to: 1381960800000			},
                // 14 days
                graph14days: {
                    from: 1380751200000,
                    to: 1381960800000			},
                // main dashboard graph - website traffic
                website_traffic: {
                    d1: [[1379455200000, 2173],[1379541600000, 2964],[1379628000000, 3048],[1379714400000, 2609],[1379800800000, 3731],[1379887200000, 2772],[1379973600000, 2677],[1380060000000, 2154],[1380146400000, 2749],[1380232800000, 2889],[1380319200000, 3293],[1380405600000, 3906],[1380492000000, 2573],[1380578400000, 3068],[1380664800000, 2709],[1380751200000, 3707],[1380837600000, 3018],[1380924000000, 3440],[1381010400000, 2842],[1381096800000, 2873],[1381183200000, 3623],[1381269600000, 2650],[1381356000000, 3825],[1381442400000, 2850],[1381528800000, 3707],[1381615200000, 2569],[1381701600000, 3999],[1381788000000, 3680],[1381874400000, 2852],[1381960800000, 2335]],
                    d2: [[1379455200000, 643],[1379541600000, 690],[1379628000000, 630],[1379714400000, 412],[1379800800000, 654],[1379887200000, 471],[1379973600000, 569],[1380060000000, 628],[1380146400000, 477],[1380232800000, 639],[1380319200000, 621],[1380405600000, 486],[1380492000000, 498],[1380578400000, 412],[1380664800000, 422],[1380751200000, 414],[1380837600000, 615],[1380924000000, 614],[1381010400000, 424],[1381096800000, 402],[1381183200000, 464],[1381269600000, 698],[1381356000000, 595],[1381442400000, 526],[1381528800000, 402],[1381615200000, 427],[1381701600000, 508],[1381788000000, 565],[1381874400000, 620],[1381960800000, 486]]
                }
            };
</script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    //Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['table', 'corechart']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
</script>

</body>
</html>