<ul class="breadcrumb">
    <li><a href="/" class="glyphicons home"> NASFAT Membership Portal</a></li>
    <li class="divider"></li>
    <li>Dashboard</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
    <h3 class="glyphicons display"> Dashboard</h3>
    <div class="buttons pull-right">
        <a href="" class="btn btn-default btn-icon glyphicons edit"> Edit</a>
    </div>
    <div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator bottom"></div>

<div class="menubar">
    <ul>
        <li><a href="">Button 1</a></li>
        <li><a href="">Button 2</a></li>
        <li class="divider"></li>
        <li><a href="">Export</a></li>
    </ul>
</div>

<div class="innerLR">
    <div class="row">
        <div class="col-md-4">
            <div class="widget widget-4 margin-none">
                <div class="widget-head">
                    <h4 class="heading">Activity</h4>
                    <a href="" class="details pull-right">view all</a>
                </div>
                <div class="widget-body list">
                    <ul>
                        <li>
                            <span>Sales today</span>
                            <span class="count">&euro;5,900</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"></span>
                        <span class="txt"><strong>20</strong>signups</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"></span>
                        <span class="txt"><strong>20</strong>signups</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"></span>
                        <span class="txt"><strong>20</strong>signups</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="separator bottom"></div>

<div class="widget widget-2 widget-tabs widget-tabs-2">
    <div class="widget-head">
        <ul>
            <li class="active"><a class="glyphicons cardio" href="#website-traffic-tab" data-toggle="tab">Website Traffic</a></li>
            <li><a class="glyphicons cardio" href="#website-traffic-tab2" data-toggle="tab">Secondary Tab</a></li>
        </ul>
    </div>
    <div class="widget-body">
        <div class="tab-pane active" id="website-traffic-tab">
            <div class="btn-group separator bottom pull-right">
                <button id="websiteTraffic24Hours" class="btn btn-small btn-default">24 Hours</button>
                <button id="websiteTraffic7Days" class="btn btn-small btn-default">7 Days</button>
                <button id="websiteTraffic14Days" class="btn btn-small btn-default">14 Days</button>
                <button id="websiteTrafficClear" class="btn btn-small btn-default" disabled="disabled">Clear</button>
            </div>
            <div class="clearfix" style="clear: both;"></div>
            <div id="placeholder" style="height: 200px;"></div>
            <div id="overview" style="height: 40px;"></div>
        </div>
    </div>
</div>

<div class="innerLR">
    <div class="row">
        <div class="col-md-6">
            <div class="widget widget-4">
                <div class="widget-head">
                    <h4 class="heading">Overview</h4>
                </div>
                <div class="widget-body list">
                    <ul>
                        <li><span class="count">350,254 <span class="sparkline"></span></span> Visits</li>
                        <li><span class="count">120,103 <span class="sparkline"></span></span> Visitors</li>
                        <li><span class="count">5,156,392 <span class="sparkline"></span></span> Pageviews</li>
                    </ul>
                </div>
            </div>
            <div class="widget widget-4">
                <div class="widget-head">
                    <h4 class="heading">Interest</h4>
                </div>
                <div class="widget-body list">
                    <ul>
                        <li><span class="count">00:01:59 <span class="sparkline"></span></span> avg.time</li>
                        <li><span class="count">48% <span class="sparkline"></span></span> returning</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget widget-4">
                <div class="widget-head">
                    <h4 class="heading">Traffic sources</h4>
                </div>
                <div class="widget-body">
                    <div id="pie" style="height: 220px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="well">
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-2 widget-tabs">
                <div class="widget-head">
                    <ul>
                        <li class="active"><a class="glyphicons coffe_cup" href="#dataTableSourcesTab" data-toggle="tab">Traffic sources</a></li>
                        <li><a class="glyphicons share_alt" href="#dataTableRefferingTab" data-toggle="tab">Referrals</a></li>
                    </ul>
                </div>
                <div class="widget-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="dataTableSourcesTab">
                            <div id="dataTableSources"></div>
                        </div>
                        <div class="tab-pane" id="dataTableRefferingTab">
                            <div id="dataTableReffering"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <a href="" class="btn btn-block btn-icon right btn-inverse glyphicon cardio" style="margin-bottom: 20px;"> Full Analytics</a> -->
        </div>
    </div>
</div>

<h4 class="heading-arrow">Recent Activity</h4>
<div class="innerLR">
    <div class="widget-activity">
        <ul class="filters">
            <li>Filter by</li>
            <li class="glyphicons user_add"></li>
            <li class="glyphicons shopping_cart active"></li>
            <li class="glyphicons envelope"></li>
            <li class="glyphicons link"></li>
            <li class="glyphicons camera"></li>
        </ul>
        <div class="clearfix"></div>
        <ul class="activities">
            <li class="highlight">
                <span class="glyphicons activity-icon shopping_cart"></span>
                <a href="">Client name</a> bought 10 items worth of &euro;50 (<a href="">order #2301</a>)
            </li>
            <li>
                <span class="glyphicons activity-icon shopping_cart"></span>
                <a href="">Client name</a> bought 10 items worth of &euro;50 (<a href="">order #2302</a>)
            </li>
            <li>
                <span class="glyphicons activity-icon shopping_cart"></span>
                <a href="">Client name</a> bought 10 items worth of &euro;50 (<a href="">order #2303</a>)
            </li>
        </ul>
    </div>
</div>
<div class="separator bottom"></div>

<div class="innerLR">
    <div class="row">
        <div class="col-md-12">
            <h4 class="glyphicons clock"> Activity</h4>

            <div class="row">
                <div class="col-md-6">

                    <div class="btn-group btn-group-vertical block">
                        <a class="btn btn-icon btn-default btn-block glyphicons group count"> <span>5,986</span>Total users</a>
                        <a class="btn btn-icon btn-default btn-block glyphicons user_add count"> <span>98</span>New users</a>
                        <a class="btn btn-icon btn-default btn-block glyphicons shopping_cart count"> <span>305</span>Products</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-group btn-group-vertical block">
                        <a class="btn btn-icon btn-default btn-block glyphicons cargo count"> <span>687</span>Total orders</a>
                        <a class="btn btn-icon btn-default btn-block glyphicons download count"> <span>15</span>Pending orders</a>
                        <a class="btn btn-icon btn-default btn-block glyphicons download count"> <span>3</span>Pending delivery</a>
                        <a class="btn btn-icon btn-primary btn-block glyphicons fire count"> <span>5</span>Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator bottom"></div>
    <!-- End Content -->
</div>

