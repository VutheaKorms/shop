<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>168myshop.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link id="callCss" rel="stylesheet" href="/frontend/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" href="/bower_components/angular-loading-bar/build/loading-bar.min.css">

    <link href="/frontend/themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="/frontend/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="/frontend/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="/frontend/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="/frontend/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/frontend/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/frontend/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/frontend/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/frontend/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
    <link href="/css/pagination.css" rel="stylesheet" media="screen"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>

    <script src="/bower_components/angular/angular.min.js"></script>
    <script src="/frontend/scripts/app.js"></script>
    <script src="/frontend/scripts/home.controller.js"></script>
    <script src="/frontend/scripts/detail.controller.js"></script>
    <script src="/frontend/scripts/unique.js"></script>
    <script src="/backend/app/packages/dirPagination.js"></script>
    <script src="/backend/app/services/myServices.js"></script>
    <script src="/backend/app/helper/myHelper.js"></script>

    <script src="/bower_components/angular-encode-uri/dist/angular-encode-uri.min.js"></script>
    <script src="/bower_components/angular-loading-bar/build/loading-bar.min.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.3.0.js"></script>
    <script src="/bower_components/angular-translate/angular-translate.min.js"></script>

</head>
<body ng-app="app" ng-controller="IdDetailController">
<div id="loading-bar-container"></div>
<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6"><span translate="Welcome"></span><strong></strong></div>
            <div class="span6">
                <div class="pull-right">
                    <span class="btn btn-mini" ng-click="changeLanguage('en')" translate="BUTTON_LANG_EN" class="ng-scope"></span>
                    <span class="btn btn-mini" ng-click="changeLanguage('de')" translate="BUTTON_LANG_DE" class="ng-scope"></span>
                </div>
            </div>
        </div>
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                {{--<a class="brand" href="index.html"><img src="frontend/themes/images/logo.png" alt="Bootsshop"/></a>--}}
                <a class="brand" href="/">168myshop.com</a>
                <form class="form-inline navbar-search" method="post" >
                    <input class="srchTxt" ng-model="searchText" type="text" placeholder="search..."/>
                    <select ng-model="selectedBrands" ng-options="item.id as item.name for item in brands">
                        <option value="" translate="Select"></option>
                    </select>
                    <button type="button" id="submitButton" class="btn btn-primary" ng-click="filterByBrandID(selectedBrands)"><span translate="Go"></span></button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="/"><span translate="Home"></span></a></li>
                    <li class=""><a href="/about.html"><span translate="About_Menu"></span></a></li>
                    <li class=""><a href="/contact.html"><span translate="Contact_Menu"></span></a></li>
                    <li class="">
                        <a href="/admin" role="button"  style="padding-right:0"><span class="btn btn-large btn-success"><span translate="Post_Item"></span></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small">
                    <small translate="Brand_Type"></small>
                </div>
                <accordion>
                    <accordion-group heading="[[group.name]]" ng-click="getId(group.id)" ng-repeat="group in brands">
                        <ul>
                            <li><a class="active" href="" ng-click="getAll()"><i class="icon-chevron-right"></i> All </a></li>
                            <li ng-repeat="size in Category" value="[[size.id]]" ng-model="selectedprop" ng-click="searchDB1(size.id)"><a class="active" href=""><i class="icon-chevron-right"></i> [[size.name]]</a></li>
                        </ul>
                    </accordion-group>
                </accordion>
                <br/>
                <div class="thumbnail">
                    <img src="/frontend/themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
                    <div class="caption">
                        <h5 translate="Payment_Method"></h5>
                    </div>
                </div>
            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="/"><span translate="Home"></span></a> <span class="divider">/</span></li>
                    <li class="active" translate="Item_Detail"></li>
                </ul>
                <div class="row">
                    <div id="gallery" class="span3">
                        <a href="../../../{{$product_photo[0]->image}}" title="">
                            <img src="../../../{{$product_photo[0]->image}}" style="width:100%" alt=""/>
                        </a>
                        <div id="differentview" class="moreOptopm carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach ($product_photo as $object)
                                        <a href="../../../{{$object->image}}"> <img style="width:29%" src="../../../{{$object->image}}" alt=""/></a>
                                    @endforeach
                                </div>
                                <div class="item"></div>
                            </div>
                            {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>--}}
                            {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>--}}
                        </div>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <span class="btn"><i class="icon-envelope"></i></span>
                                <span class="btn" ><i class="icon-print"></i></span>
                                <span class="btn" ><i class="icon-zoom-in"></i></span>
                                <span class="btn" ><i class="icon-star"></i></span>
                                <span class="btn" ><i class=" icon-thumbs-up"></i></span>
                                <span class="btn" ><i class="icon-thumbs-down"></i></span>
                            </div>
                        </div>
                    </div>
                    @foreach ($product as $object)
                    <div class="span6">
                        <h3>{{ $object->product_name }}</h3>
                        {{--<small>- (14MP, 18x Optical Zoom) 3-inch LCD</small>--}}
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm">
                            <div class="control-group">
                                <label class="control-label"><span>$ {{ $object->price }} |
                                        <span ng-if="{{$object->product_type}} == New" style="color:orange" translate="Item_New"></span>
                                        <span ng-if="{{$object->product_type}} == Used" style="color:grey" translate="Item_Used"></span>
                                        <br /><br />
                                        <span ng-if="{{$object->status}} == 1" translate="Available"></span>
                                        <span ng-if="{{$object->status}} == 0" translate="Not_Available"></span>
                                    </span></label>
                                <div class="controls">
                                    <input type="number" class="span1" placeholder="Qty."/>
                                    <button type="submit" class="btn btn-large btn-primary pull-right"> <span translate="Add_To_Card"></span> <i class=" icon-shopping-cart"></i></button>
                                </div>
                            </div>
                        </form>

                        <hr class="soft"/>
                        <label class="control-label"><span translate="Color"></span> : <span>{{ $object->product_color }}</span></label>
                        {{--<h4>100 items in stock</h4>--}}
                        {{--<form class="form-horizontal qtyFrm pull-right">--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label"><span>Color</span></label>--}}
                                {{--<div class="controls">--}}
                                    {{--<select class="span2">--}}
                                        {{--<option>Black</option>--}}
                                        {{--<option>Red</option>--}}
                                        {{--<option>Blue</option>--}}
                                        {{--<option>Brown</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        <hr class="soft clr"/>
                        <p>
                            {{ $object->description }}
                        </p>
                        <a class="btn btn-small pull-right" href="#detail"><span translate="More_Detail"></span></a>
                        <br class="clr"/>
                        <a href="#" name="detail"></a>
                        <hr class="soft"/>
                    </div>
                    <div class="span9">
                        <ul id="productDetail" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab"><span translate="Item_Detail"></span></a></li>
                            <li><a href="#profile" data-toggle="tab"><span translate="Related_Item"></span></a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <h4 translate="Item_Information"></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr class="techSpecRow"><th colspan="2"><span translate="Item_Detail"></span></th></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Brand"></span></td><td class="techSpecTD2">{{ $object->brand_name }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Category"></span></td><td class="techSpecTD2">{{ $object->category_name }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Model"></span></td><td class="techSpecTD2">{{ $object->product_name }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Released_On"></span></td><td class="techSpecTD2">{{ $object->created_at }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Specification"></span></td><td class="techSpecTD2">{!! $object->specification !!}</td></tr>
                                    </tbody>
                                </table>

                                <h5 translate="Contact_Information"></h5>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr class="techSpecRow"><th colspan="2"><span translate="Contact_Detail"></span></th></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Name"></span></td><td class="techSpecTD2">{{ $object->contact_name }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Number"></span></td><td class="techSpecTD2">{{ $object->phone_number }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Email"></span></td><td class="techSpecTD2">{{ $object->email_address }}</td></tr>
                                    <tr class="techSpecRow"><td class="techSpecTD1"><span translate="Address"></span></td><td class="techSpecTD2">
                                            {{$object->location_name}}&nbsp;&nbsp;{{$object->state_name}}&nbsp;&nbsp;
                                            {{$object->country_name}}&nbsp;&nbsp;{{ $object->address1 }}&nbsp;&nbsp;{{ $object->address2 }}
                                        </td></tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="profile">
                                <form class="form-horizontal span6">
                                    <div class="control-group">
                                        <label class="control-label alignL"><span translate="Sort_By"></span></label>
                                        <select ng-model="sortExpression">
                                            <option value="" selected="selected" translate="Item_Name_A_Z"></option>
                                            <option value="price" translate="Item_Price_Low_Up"></option>
                                            <option value="category_id" translate="Item_Cate_Name_A_Z"></option>
                                        </select>
                                    </div>
                                </form>
                                <div id="myTab" class="pull-right">
                                    <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                                    <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                                </div>
                                <br class="clr"/>
                                <hr class="soft"/>
                                <div class="tab-content">
                                    <div class="tab-pane" id="listView">
                                        <div class="row" dir-paginate="value in data | itemsPerPage:6  | orderBy:mySortFunction" total-items="totalItems">
                                            <div class="span2">
                                                <img src="../../../../../[[value.photo_name]]" height="142" width="142">
                                            </div>
                                            <div class="span4">
                                                <h4>
                                                    <span style="color: orange" ng-if="value.product_type == 'New'" translate="Item_New"></span>
                                                    <span style="color: grey" ng-if="value.product_type == 'Used'" translate="Item_Used"></span>
                                                    |
                                                    <span ng-if="value.status == 1" translate="Available"></span>
                                                    <span ng-if="value.status == 0" translate="Not_Available"></span>
                                                </h4>

                                                <h5>[[ value.product_name ]] | [[value.category_name]] </h5>
                                                <p>
                                                    [[value.description]]
                                                </p>
                                                <a class="btn btn-small pull-right" href="/product_detail.html/[[ value.product_id]][[ 'bar&baz'  | encodeURIComponent ]]"><span translate="Button_View_Detail"></span></a>
                                                <br class="clr"/>
                                                <hr />
                                            </div>

                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> [[value.price | currency]]</h3>
                                                    {{--<label class="checkbox">--}}
                                                    {{--<input type="checkbox">  Adds product to compair--}}
                                                    {{--</label><br/>--}}

                                                    {{--<a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>--}}
                                                    <a href="/product_detail.html/[[ value.product_id]][[ 'bar&baz'  | encodeURIComponent ]]" class="btn btn-large"><i class="icon-zoom-in"></i></a>

                                                </form>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                    </div>
                                    <div class="tab-pane  active" id="blockView">
                                        <ul class="thumbnails">
                                            <li class="span3" dir-paginate="value in data | itemsPerPage:6  | orderBy:mySortFunction " total-items="totalItems">
                                                <div class="thumbnail">
                                                    <span ng-if="value.product_type == 'New'"><i class="tag"></i></span>
                                                    <b style="color: #120293;"> &nbsp; [[value.category_name]]</b>

                                                    <a href="/product_detail.html/[[ value.product_id]][[ 'bar&baz'  | encodeURIComponent ]]">
                                                        <img alt="" src="../../../../../[[value.photo_name]]" height="142" width="142"/>
                                                    </a>
                                                    <div class="caption">
                                                        <h5>[[ value.product_name ]]</h5>
                                                        <h4 style="text-align:center"><a class="btn" href="/product_detail.html/[[ value.product_id]][[ 'bar&baz'  | encodeURIComponent ]]">
                                                                <i class="icon-zoom-in"></i></a>
                                                            {{--<a class="btn" href="#">Add to--}}
                                                            {{--<i class="icon-shopping-cart"></i></a>--}}
                                                            <a class="btn btn-primary" href="/product_detail.html/[[ value.product_id]][[ 'bar&baz'  | encodeURIComponent ]]">[[value.price | currency]]</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr class="soft"/>
                                    </div>
                                </div>
                                <br class="clr">
                                <dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber)"
                                                         template-url="/frontend/scripts/dirPagination.html">
                                </dir-pagination-controls>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> </div>
</div>

<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="">YOUR ACCOUNT</a>
                <a href="">PERSONAL INFORMATION</a>
                <a href="">ADDRESSES</a>
                <a href="">DISCOUNT</a>
                <a href="">ORDER HISTORY</a>
            </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="">CONTACT</a>
                <a href="">REGISTRATION</a>
                <a href="">LEGAL NOTICE</a>
                <a href="">TERMS AND CONDITIONS</a>
                <a href="">FAQ</a>
            </div>
            <div class="span3">
                <h5>OUR OFFERS</h5>
                <a href="">NEW PRODUCTS</a>
                <a href="">TOP SELLERS</a>
                <a href="">SPECIAL OFFERS</a>
                <a href="">MANUFACTURERS</a>
                <a href="">SUPPLIERS</a>
            </div>
            <div id="socialMedia" class="span3 pull-right">
                <h5 translate="SOCIAL_MEDIA"></h5>
                <a href=""><img width="60" height="60" src="/frontend/themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href=""><img width="60" height="60" src="/frontend/themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href=""><img width="60" height="60" src="/frontend/themes/images/youtube.png" title="youtube" alt="youtube"/></a>
            </div>
        </div>
        <p class="pull-right">&copy; 168myshop.com</p>
    </div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="/frontend/themes/js/jquery.js" type="text/javascript"></script>
<script src="/frontend/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/frontend/themes/js/google-code-prettify/prettify.js"></script>

<script src="/frontend/themes/js/bootshop.js"></script>
<script src="/frontend/themes/js/jquery.lightbox-0.5.js"></script>


</body>
</html>