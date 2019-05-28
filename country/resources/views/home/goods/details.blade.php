@extends('home.layout.index')
@section('header') 
    <!-- Header Bottom --> 
    <div class="header-bottom"> 
     <div class="container"> 
      <div class="row">

       <!-- 分类处标记 -->
       <div class="col-md-3 col-sm-6 col-xs-12 "> 
        <div class="responsive so-megamenu "> 
         <div class="so-vertical-menu no-gutter compact-hidden"> 
          <nav class="navbar-default"> 
           <div class="container-megamenu vertical open"> 
            <div id="menuHeading"> 
             <div class="megamenuToogle-wrapper"> 
              <div class="megamenuToogle-pattern"> 
               <div class="container"> 
                <div> 
                 <span></span> 
                 <span></span> 
                 <span></span> 
                </div> 所有分类 

                <i class="fa pull-right arrow-circle fa-chevron-circle-up"></i> 
               </div> 
              </div> 
             </div> 
            </div> 
            <div class="navbar-header"> 
             <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt"> </button> 所有分类 
            </div> 
            <div class="vertical-wrapper"> 
             <span id="remove-verticalmenu" class="fa fa-times"></span> 
             <div class="megamenu-pattern"> 
              <div class="container"> 
               <ul class="megamenu">
                 @foreach($arr as $k=>$v) 
                <li class="item-vertical style1 with-sub-menu hover"> <p class="close-menu"></p> <a target="_blank" href="/home/goods/list/{{ $v->id }}" class="clearfix"> 
                  <span class="fa fa-home"></span> <span>{{ $v->cname }}</span> </a> 
                 <div class="sub-menu" data-subwidth="100" style="width: 900px; display: none; right: 0px;"> 
                  <div class="content" style="display: none;"> 
                   <div class="row"> 
                    <div class="col-sm-12"> 
                     <div class="row">
                       @foreach($v->sub as $kk=>$vv) 
                      <div class="col-md-4 static-menu"> 
                       <div class="menu"> 
                        <ul> 
                         <li> <a target="_blank" href="/home/goods/list/{{ $vv->id }}" class="main-menu">{{ $vv->cname }}</a> 
                          <ul>
                            @foreach($vv->sub as $kkk=>$vvv) 
                           <li> <a target="_blank" href="/home/goods/list/{{ $vvv->id }}">{{ $vvv->cname }}</a>
                           </li>
                           <li> 
                           	@endforeach 
                           </li>
                          </ul> 
                      </li> 
                        </ul> 
                       </div> 
                      </div>
                       @endforeach 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
             </li>
              @endforeach 
               </ul> 
              </div> 
             </div> 
            </div> 
           </div> 
          </nav> 
         </div> 
        </div> 
       </div> 
       <!-- 结束分类 -->

       <!-- Main menu --> 
       <div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-12 "> 
        <div class="responsive so-megamenu "> 
         <nav class="navbar-default"> 
          <div class=" container-megamenu  horizontal"> 
           <div class="navbar-header"> 
            <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> Navigation 
           </div> 
           <div class="megamenu-wrapper"> 
            <span id="remove-megamenu" class="fa fa-times"></span> 
            <div class="megamenu-pattern"> 
             <div class="container"> 
              <ul class="megamenu " data-transition="slide" data-animationtime="250"> 
               <li class="home hover"> <a href="index.html">Home <b class="caret"></b></a> 
                <div class="sub-menu" style="width:100%;"> 
                 <div class="content"> 
                  <div class="row"> 
                   <div class="col-md-3"> 
                    <a href="index.html" class="image-link"> <span class="thumbnail"> <img class="img-responsive img-border" src="/home/image/demo/feature/home-1.jpg" alt="" /> <span class="btn btn-default">Read More</span> </span> <h3 class="figcaption">Home page - (Default)</h3> </a> 
                   </div> 
                   <div class="col-md-3"> 
                    <a href="#" class="image-link"> <span class="thumbnail"> <img class="img-responsive img-border" src="/home/image/demo/feature/home-2.jpg" alt="" /> <span class="btn btn-default">Read More</span> </span> <h3 class="figcaption">Home page - Layout 2</h3> </a> 
                   </div> 
                   <div class="col-md-3"> 
                    <a href="#" class="image-link"> <span class="thumbnail"> <img class="img-responsive img-border" src="/home/image/demo/feature/home-3.jpg" alt="" /> <span class="btn btn-default">Read More</span> </span> <h3 class="figcaption">Home page - Layout 3</h3> </a> 
                   </div> 
                   <div class="col-md-3"> 
                    <a href="#" class="image-link"> <span class="thumbnail"> <img class="img-responsive img-border" src="/home/image/demo/feature/home-4.jpg" alt="" /> <span class="btn btn-default">Read More</span> </span> <h3 class="figcaption">Home page - Layout 4</h3> </a> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="with-sub-menu hover"> <p class="close-menu"></p> <a href="#" class="clearfix"> <strong>Features</strong> <span class="label"> Hot</span> <b class="caret"></b> </a> 
                <div class="sub-menu" style="width: 100%; right: auto;"> 
                 <div class="content"> 
                  <div class="row"> 
                   <div class="col-md-3"> 
                    <div class="column"> 
                     <a href="#" class="title-submenu">Listing pages</a> 
                     <div> 
                      <ul class="row-list"> 
                       <li><a href="category.html">Category Page 1 </a></li> 
                       <li><a href="#">Category Page 2</a></li> 
                       <li><a href="#">Category Page 3</a></li> 
                      </ul> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-3"> 
                    <div class="column"> 
                     <a href="#" class="title-submenu">Product pages</a> 
                     <div> 
                      <ul class="row-list"> 
                       <li><a href="product.html">Image size - big</a></li> 
                       <li><a href="#">Image size - medium</a></li> 
                       <li><a href="#">Image size - small</a></li> 
                      </ul> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-3"> 
                    <div class="column"> 
                     <a href="#" class="title-submenu">Shopping pages</a> 
                     <div> 
                      <ul class="row-list"> 
                       <li><a href="#">Shopping Cart Page</a></li> 
                       <li><a href="#">Checkout Page</a></li> 
                       <li><a href="#">Compare Page</a></li> 
                       <li><a href="#">Wishlist Page</a></li> 
                      </ul> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-3"> 
                    <div class="column"> 
                     <a href="#" class="title-submenu">My Account pages</a> 
                     <div> 
                      <ul class="row-list"> 
                       <li><a href="login.html">Login Page</a></li> 
                       <li><a href="register.html">Register Page</a></li> 
                       <li><a href="#">My Account</a></li> 
                       <li><a href="#">Order History</a></li> 
                       <li><a href="#">Order Information</a></li> 
                       <li><a href="#">Product Returns</a></li> 
                       <li><a href="#">Gift Voucher</a></li> 
                      </ul> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="with-sub-menu hover"> <p class="close-menu"></p> <a href="#" class="clearfix"> <strong>Pages</strong> <span class="label"> Hot</span> <b class="caret"></b> </a> 
                <div class="sub-menu" style="width: 40%; "> 
                 <div class="content"> 
                  <div class="row"> 
                   <div class="col-md-6"> 
                    <ul class="row-list"> 
                     <li><a class="subcategory_item" href="#">FAQ</a></li> 
                     <li><a class="subcategory_item" href="#">Typography</a></li> 
                     <li><a class="subcategory_item" href="#">Site Map</a></li> 
                     <li><a class="subcategory_item" href="#">Contact us</a></li> 
                     <li><a class="subcategory_item" href="#">Banner Effect</a></li> 
                    </ul> 
                   </div> 
                   <div class="col-md-6"> 
                    <ul class="row-list"> 
                     <li><a class="subcategory_item" href="#">About Us 1</a></li> 
                     <li><a class="subcategory_item" href="#">About Us 2</a></li> 
                     <li><a class="subcategory_item" href="#">About Us 3</a></li> 
                     <li><a class="subcategory_item" href="#">About Us 4</a></li> 
                    </ul> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="with-sub-menu hover"> <p class="close-menu"></p> <a href="#" class="clearfix"> <strong>Categories</strong> <span class="label"></span> <b class="caret"></b> </a> 
                <div class="sub-menu" style="width: 100%; display: none;"> 
                 <div class="content"> 
                  <div class="row"> 
                   <div class="col-sm-12"> 
                    <div class="row"> 
                     <div class="col-md-3 img img1"> 
                      <a href="#"><img src="/home/image/demo/cms/img1.jpg" alt="banner1" /></a> 
                     </div> 
                     <div class="col-md-3 img img2"> 
                      <a href="#"><img src="/home/image/demo/cms/img2.jpg" alt="banner2" /></a> 
                     </div> 
                     <div class="col-md-3 img img3"> 
                      <a href="#"><img src="/home/image/demo/cms/img3.jpg" alt="banner3" /></a> 
                     </div> 
                     <div class="col-md-3 img img4"> 
                      <a href="#"><img src="/home/image/demo/cms/img4.jpg" alt="banner4" /></a> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                  <div class="row"> 
                   <div class="col-md-3"> 
                    <a href="#" class="title-submenu">Automotive</a> 
                    <div class="row"> 
                     <div class="col-md-12 hover-menu"> 
                      <div class="menu"> 
                       <ul> 
                        <li><a href="#" class="main-menu">Car Alarms and Security</a></li> 
                        <li><a href="#" class="main-menu">Car Audio &amp; Speakers</a></li> 
                        <li><a href="#" class="main-menu">Gadgets &amp; Auto Parts</a></li> 
                        <li><a href="#" class="main-menu">More Car Accessories</a></li> 
                       </ul> 
                      </div> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-3"> 
                    <a href="#" class="title-submenu">Electronics</a> 
                    <div class="row"> 
                     <div class="col-md-12 hover-menu"> 
                      <div class="menu"> 
                       <ul> 
                        <li><a href="#" class="main-menu">Battereries &amp; Chargers</a></li> 
                        <li><a href="#" class="main-menu">Headphones, Headsets</a></li> 
                        <li><a href="#" class="main-menu">Home Audio</a></li> 
                        <li><a href="#" class="main-menu">Mp3 Players &amp; Accessories</a></li> 
                       </ul> 
                      </div> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-3"> 
                    <a href="#" class="title-submenu">Jewelry &amp; Watches</a> 
                    <div class="row"> 
                     <div class="col-md-12 hover-menu"> 
                      <div class="menu"> 
                       <ul> 
                        <li><a href="#" class="main-menu">Earings</a></li> 
                        <li><a href="#" class="main-menu">Wedding Rings</a></li> 
                        <li><a href="#" class="main-menu">Men Watches</a></li> 
                       </ul> 
                      </div> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-3"> 
                    <a href="#" class="title-submenu">Bags, Holiday Supplies</a> 
                    <div class="row"> 
                     <div class="col-md-12 hover-menu"> 
                      <div class="menu"> 
                       <ul> 
                        <li><a href="#" class="main-menu">Gift &amp; Lifestyle Gadgets</a></li> 
                        <li><a href="#" class="main-menu">Gift for Man</a></li> 
                        <li><a href="#" class="main-menu">Gift for Woman</a></li> 
                        <li><a href="#" class="main-menu">Lighter &amp; Cigar Supplies</a></li> 
                       </ul> 
                      </div> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="with-sub-menu hover"> <p class="close-menu"></p> <a href="#" class="clearfix"> <strong>Accessories</strong> <b class="caret"></b> </a> 
                <div class="sub-menu" style="width: 100%; display: none;"> 
                 <div class="content" style="display: none;"> 
                  <div class="row"> 
                   <div class="col-md-8"> 
                    <div class="row"> 
                     <div class="col-md-6 static-menu"> 
                      <div class="menu"> 
                       <ul> 
                        <li> <a href="#" class="main-menu">Automotive</a> 
                         <ul> 
                          <li><a href="#">Car Alarms and Security</a></li> 
                          <li><a href="#">Car Audio &amp; Speakers</a></li> 
                          <li><a href="#">Gadgets &amp; Auto Parts</a></li> 
                         </ul> </li> 
                        <li> <a href="#" class="main-menu">Smartphone &amp; Tablets</a> 
                         <ul> 
                          <li><a href="#">Accessories for i Pad</a></li> 
                          <li><a href="#">Apparel</a></li> 
                          <li><a href="#">Accessories for iPhone</a></li> 
                         </ul> </li> 
                       </ul> 
                      </div> 
                     </div> 
                     <div class="col-md-6 static-menu"> 
                      <div class="menu"> 
                       <ul> 
                        <li> <a href="#" class="main-menu">Sports &amp; Outdoors</a> 
                         <ul> 
                          <li><a href="#">Camping &amp; Hiking</a></li> 
                          <li><a href="#">Cameras &amp; Photo</a></li> 
                          <li><a href="#">Cables &amp; Connectors</a></li> 
                         </ul> </li> 
                        <li> <a href="#" class="main-menu">Electronics</a> 
                         <ul> 
                          <li><a href="#">Battereries &amp; Chargers</a></li> 
                          <li><a href="#">Bath &amp; Body</a></li> 
                          <li><a href="#">Outdoor &amp; Traveling</a></li> 
                         </ul> </li> 
                       </ul> 
                      </div> 
                     </div> 
                    </div> 
                   </div> 
                   <div class="col-md-4"> 
                    <span class="title-submenu">Bestseller</span> 
                    <div class="col-sm-12 list-product"> 
                     <div class="product-thumb"> 
                      <div class="image pull-left"> 
                       <a href="#"><img src="/home/image/demo/shop/product/35.jpg" width="80" alt="Filet Mign" title="Filet Mign" class="img-responsive" /></a> 
                      </div> 
                      <div class="caption"> 
                       <h4><a href="#">Filet Mign</a></h4> 
                       <div class="rating-box"> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                       </div> 
                       <p class="price">$1,202.00</p> 
                      </div> 
                     </div> 
                    </div> 
                    <div class="col-sm-12 list-product"> 
                     <div class="product-thumb"> 
                      <div class="image pull-left"> 
                       <a href="#"><img src="/home/image/demo/shop/product/W1.jpg" width="80" alt="Dail Lulpa" title="Dail Lulpa" class="img-responsive" /></a> 
                      </div> 
                      <div class="caption"> 
                       <h4><a href="#">Dail Lulpa</a></h4> 
                       <div class="rating-box"> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                       </div> 
                       <p class="price">$78.00</p> 
                      </div> 
                     </div> 
                    </div> 
                    <div class="col-sm-12 list-product"> 
                     <div class="product-thumb"> 
                      <div class="image pull-left"> 
                       <a href="#"><img src="/home/image/demo/shop/product/141.jpg" width="80" alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive" /></a> 
                      </div> 
                      <div class="caption"> 
                       <h4><a href="#">Canon EOS 5D</a></h4> 
                       <div class="rating-box"> 
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                       </div> 
                       <p class="price"> <span class="price-new">$60.00</span> <span class="price-old">$145.00</span> </p> 
                      </div> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class=""> <p class="close-menu"></p> <a href="#" class="clearfix"> <strong>Blog</strong> <span class="label"></span> </a> </li> 
               <li class="hidden-md"> <p class="close-menu"></p> <a href="#" class="clearfix"> <strong>Buy Theme!</strong> </a> </li> 
              </ul> 
             </div> 
            </div> 
           </div> 
          </div> 
         </nav> 
        </div> 
       </div> 
       <!-- //end Main menu --> 
      </div> 
     </div> 
    </div>
@stop
@section('lunbo')
@stop		
@section('body')

<div class="main-container container"> 
    <ul class="breadcrumb"> 
     <li><a href="#"><i class="fa fa-home"></i></a></li> 
     <li><a href="#">Smartphone &amp; Tablets</a></li> 
     <li><a href="#">Bint Beef</a></li> 
    </ul> 
    <div class="row"> 
     <!--Middle Part Start--> 
     <div id="content" class="col-md-12 col-sm-12"> 
     	<!-- 整个商品详情 -->

     
      <div class="product-view row"> 
       <div class="left-content-product col-lg-10 col-xs-12"> 
        <div class="row"> 
         <div class="content-product-left class-honizol col-sm-6 col-xs-12 "> 
          <div class="large-image" >
           <!-- 放大镜 -->
           <img itemprop="image" class="product-image-zoom" src="/public/images{{ $data->images }}" data-zoom-image="/public/images{{ $data->images }}" title="{{ $data->gname }}" alt="Bint Beef" onclick="img()" />
            <!-- 放大镜结束 -->
            <script>
            	function img(even)
            	{
            		event.stopPropagtion();//阻止事件冒泡
            		// return false;
            	}
            </script>
          </div> 
          <!-- <a class="thumb-video pull-left" href="javascript:;"><i class="fa fa-youtube-play"></i></a> --> 
          <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
			<!-- 版本图片 -->
			@foreach($data->versions as $k=>$v)
			@foreach($v->goods_details as $kk=>$vv)
           <a data-index="0" class="img thumbnail " data-image="/public/images{{ $data->images }}" title="Bint Beef"> 
           	<img src="/home/image/demo/shop/product/J9.jpg" title="Bint Beef" alt="Bint Beef" /> 
           </a> 
            @endforeach
            @endforeach
          </div> 
         </div> 
         <div class="content-product-right col-sm-6 col-xs-12"> 
          <div class="title-product"> 
           <h1>商品参数</h1> 
          </div> 
          <!-- Review ----> 
          <div class="box-review form-group"> 
           <div class="ratings"> 
            <div class="rating-box"> 
             <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
             <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
             <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
             <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
             <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
            </div> 
           </div> 
           <a class="reviews_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">累计评论 0</a> | 
           <a class="write_review_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">去看评论</a> 
          </div> 
          <div class="product-label form-group"> 
           <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer"> 
            <span class="price-new" itemprop="price">￥{{ $data->price }}</span> 
            <span class="price-old">￥122.00</span> 
           </div> 
           <div class="stock">
            <span>可用性:</span> 
            <span class="status-stock">库存</span>
           </div> 
          </div> 
          <div class="product-box-desc"> 
           <div class="inner-box-desc"> 
            <div class="price-tax">
             <span>降价前:</span> ￥{{ ($data->price) + 100 }}
            </div> 
            <div class="reward">
             <span>奖励积分价格:</span> 400
            </div> 
            <div class="brand">
             <span>品牌:</span>
             <a href="#">Apple</a> 
            </div> 
            <div class="model">
             <span>产品编号:</span> {{ $data->num }}
            </div> 
            <div class="reward">
             <span>奖励积分:</span> {{ ($data->price) / 100 }}
            </div> 
           </div> 
          </div> 
          <div id="product"> 
           <h4>选择版本</h4> 
           <div class="image_option_type form-group required"> 
            <label class="control-label">颜色</label> 
            <ul class="product-options clearfix" id="input-option231"> 
             <li class="radio"> <label> <input class="image_radio" type="radio" name="option[231]" value="33" /> <img src="/home/image/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color" /> <i class="fa fa-check"></i> <label> </label> </label> </li> 
             <li class="radio"> <label> <input class="image_radio" type="radio" name="option[231]" value="34" /> <img src="/home/image/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color" /> <i class="fa fa-check"></i> <label> </label> </label> </li> 
             <li class="radio"> <label> <input class="image_radio" type="radio" name="option[231]" value="35" /> <img src="/home/image/demo/colors/green.jpg" data-original-title="green +$12.00" class="img-thumbnail icon icon-color" /> <i class="fa fa-check"></i> <label> </label> </label> </li> 
             <li class="selected-option"> </li> 
            </ul> 
           </div> 
           <div class="box-checkbox form-group required"> 
            <label class="control-label">可分期</label> 
            <div id="input-option232"> 
             <div class="checkbox"> 
              <label for="checkbox_1"><input type="checkbox" name="option[232][]" value="36" id="checkbox_1" /> ￥12.00起 分12期</label> 
             </div> 
             <div class="checkbox"> 
              <label for="checkbox_2"><input type="checkbox" name="option[232][]" value="36" id="checkbox_2" /> ￥24.00起 分8期</label> 
             </div> 
             <div class="checkbox"> 
              <label for="checkbox_3"><input type="checkbox" name="option[232][]" value="36" id="checkbox_3" /> ￥36.00起 分6期</label> 
             </div> 
             <div class="checkbox"> 
              <label for="checkbox_4"><input type="checkbox" name="option[232][]" value="36" id="checkbox_4" /> ￥48.00起 分4期</label> 
             </div> 
            </div> 
           </div>

           <form action="javascript:;" method=""> 
           <div class="form-group box-info-product"> 
            <div class="option quantity"> 
             <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;"> 
              <label>数量</label> 
              <input class="form-control" type="text" name="quantity" value="1"  gid="{{ $data->id }}"/> 
              <input type="hidden" name="product_id" value="50" /> 
              <span class="input-group-addon product_quantity_down">−</span> 
              <span class="input-group-addon product_quantity_up">+</span> 
             </div> 
            </div> 
            <div class="cart" style="margin-left:7px"> 
            	<!-- <a href="/home/goods" class="btn btn-mega btn-warning btn-lg" title="添加到购物车" data-original-title="添加到购物车" style="height:42px;"><h3>加入购物车</h3></a> -->
             <input type="button" data-toggle="tooltip" title="添加到购物车" value="添加到购物车" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" data-original-title="添加到购物车"  /> 
             <script>
				$('#button-cart').click(function(){
					var quantity = $('input[name=quantity]').val();
					var gid = $('input[name=quantity]').attr('gid');
					//alert(gid);
					$.post('/home/goods/cart',{
						'_token':"{{ csrf_token() }}",
						'id':gid,
						'number':quantity
						},function(mag){
						
						if(mag == 'success'){
							alert('成功添加到购物车!');
							//重新设置 数量的值
							 $('input[name=quantity]').val(1);
						}else if(mag == 'error'){
							alert('添加购物车失败!');
						}
					},'html');
				});
             	
             </script>
            </div> 
            <div class="add-to-links wish_comp"> 
             <ul class="blank list-inline"> 
              <li class="wishlist"> <a class="icon" data-toggle="tooltip" title="" onclick="wishlist.add('50');" data-original-title="添加到收藏"><i class="fa fa-heart"></i> </a> </li> 
              <li class="compare"> <a class="icon" data-toggle="tooltip" title="" onclick="compare.add('50');" data-original-title="添加到关注"><i class="fa fa-exchange"></i> </a> </li> 
             </ul> 
            </div> 
           </div>
           </form>


          </div> 
          <!-- end box info product --> 
         </div> 
        </div> 
       </div> 
       <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products"> 
        <div class="module col-sm-12 four-block"> 
         <div class="modcontent clearfix"> 
          <div class="policy-detail"> 
           <div class="banner-policy"> 
            <div class="policy policy1"> 
             <a href="#"> <span class="ico-policy">&nbsp;</span> 90 day <br /> money back </a> 
            </div> 
            <div class="policy policy2"> 
             <a href="#"> <span class="ico-policy">&nbsp;</span> In-store exchange </a> 
            </div> 
            <div class="policy policy3"> 
             <a href="#"> <span class="ico-policy">&nbsp;</span> lowest price guarantee </a> 
            </div> 
            <div class="policy policy4"> 
             <a href="#"> <span class="ico-policy">&nbsp;</span> shopping guarantee </a> 
            </div> 
           </div> 
          </div> 
         </div> 
        </div> 
       </section> 
      </div> 
		

      <!-- 整个商品详情结束 -->
      <!-- Product Tabs --> 
      <div class="producttab "> 
       <div class="tabsslider  vertical-tabs col-xs-12"> 
        <ul class="nav nav-tabs col-lg-2 col-sm-3"> 
         <li class="active"><a data-toggle="tab" href="#tab-1">描述</a></li> 
         <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">评论</a></li> 
         <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">标签</a></li> 
         <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">自定义</a></li> 
        </ul> 
        <div class="tab-content col-lg-10 col-sm-9 col-xs-12"> 
         <div id="tab-1" class="tab-pane fade active in"> 
          <p>Lorem ipstua.</p> 
          <p>At vero eos et adolores et ea rebum. Stet cua. </p> 
          <p>At vero eos etakimata sanctus est Loreem ipsum dolor sit amet. <br /> </p> 
         </div> 
         <div id="tab-review" class="tab-pane fade"> 
          <form> 
           <div id="review"> 
            <table class="table table-striped table-bordered"> 
             <tbody> 
              <tr> 
               <td style="width: 50%;"><strong>Super Administrator</strong></td> 
               <td class="text-right">29/07/2015</td> 
              </tr> 
              <tr> 
               <td colspan="2"> <p>Best this product opencart</p> 
                <div class="ratings"> 
                 <div class="rating-box"> 
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
                  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
                 </div> 
                </div> </td> 
              </tr> 
             </tbody> 
            </table> 
            <div class="text-right"></div> 
           </div> 
           <h2 id="review-title">Write a review</h2> 
           <div class="contacts-form"> 
            <div class="form-group"> 
             <span class="icon icon-user"></span> 
             <input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}" /> 
            </div> 
            <div class="form-group"> 
             <span class="icon icon-bubbles-2"></span> 
             <textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea> 
            </div> 
            <span style="font-size: 11px;"><span class="text-danger">Note:</span> HTML is not translated!</span> 
            <div class="form-group"> 
             <b>Rating</b> 
             <span>Bad</span>&nbsp; 
             <input type="radio" name="rating" value="1" /> &nbsp; 
             <input type="radio" name="rating" value="2" /> &nbsp; 
             <input type="radio" name="rating" value="3" /> &nbsp; 
             <input type="radio" name="rating" value="4" /> &nbsp; 
             <input type="radio" name="rating" value="5" /> &nbsp;
             <span>Good</span> 
            </div> 
            <div class="buttons clearfix">
             <a id="button-review" class="btn buttonGray">Continue</a>
            </div> 
           </div> 
          </form> 
         </div> 
         <div id="tab-4" class="tab-pane fade"> 
          <a href="#">Monitor</a>, 
          <a href="#">Apple</a> 
         </div> 
         <div id="tab-5" class="tab-pane fade"> 
          <p>Lorem ipsum  diam voluptua. </p> 
          <p>At verolitr.</p> 
          <p>Sedet.</p> 
         </div> 
        </div> 
       </div> 
      </div> 
      <!-- //Product Tabs --> 
      <!-- Related Products --> 
      <div class="related titleLine products-list grid module "> 
       <h3 class="modtitle">相似商品</h3> 
       <div class="releate-products "> 
        <div class="product-layout">
         <!-- 开始 -->


         <div class="product-item-container"> 
          <div class="left-block"> 
           <div class="product-image-container second_img "> 
            <img src="/home/image/demo/shop/product/e11.jpg" title="Apple Cinema 30&quot;" class="img-responsive" /> 
            <img src="/home/image/demo/shop/product/e12.jpg" title="Apple Cinema 30&quot;" class="img_0 img-responsive" /> 
           </div> 
           <!--Sale Label--> 
           <span class="label label-sale">Sale</span> 
           <!--full quick view block--> 
           <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="#"> Quickview</a> 
           <!--end full quick view block--> 
          </div> 
          <div class="right-block"> 
           <div class="caption"> 
            <h4><a href="product.html">Apple Cinema 30&quot;</a></h4> 
            <div class="ratings"> 
             <div class="rating-box"> 
              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> 
              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> 
             </div> 
            </div> 
            <div class="price"> 
             <span class="price-new">$74.00</span> 
             <span class="price-old">$122.00</span> 
             <span class="label label-percent">-40%</span> 
            </div> 
            <div class="description item-desc hidden"> 
             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p> 
            </div> 
           </div> 
           <div class="button-group"> 
            <button class="addToCart" type="button" data-toggle="tooltip" title="添加到购物车" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">添加到购物车</span></button> 
            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button> 
            <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button> 
           </div> 
          </div>
          <!-- right block --> 
         </div>
			<!-- 结束 -->
        </div> 



        
       </div> 
      </div> 
      <!-- end Related  Products--> 
     </div> 
    </div> 
    <!--Middle Part End--> 
   </div> 


@stop			