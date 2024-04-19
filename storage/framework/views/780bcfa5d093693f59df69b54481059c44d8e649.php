<div id="sidebarMain" class="d-none">
    <aside
        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
        class="bg-white js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between side-logo">
                    <!-- Logo -->
                    <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard.index')); ?>" aria-label="Front">
                        <img onerror="this.src='<?php echo e(asset('public/assets/back-end/img/900x400/img1.jpg')); ?>'"
                             class="navbar-brand-logo-mini for-web-logo max-h-30"
                             src="<?php echo e(asset("storage/app/public/company/$e_commerce_logo")); ?>" alt="Logo">
                    </a>
                    <!-- Navbar Vertical Toggle -->
                    <button type="button"
                            class="d-none js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->

                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                           data-placement="right" title="" data-original-title="Collapse"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                           data-template="<div class=&quot;tooltip d-none d-sm-block&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                           data-toggle="tooltip" data-placement="right" title="" data-original-title="Expand"></i>
                    </button>
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <!-- Search Form -->
                    <div class="sidebar--search-form pb-3 pt-4">
                        <div class="search--form-group">
                            <button type="button" class="btn"><i class="tio-search"></i></button>
                            <input type="text" class="js-form-search form-control form--control" id="search-bar-input"
                                   placeholder="<?php echo e(translate('search_menu')); ?>...">
                        </div>
                    </div>
                    <!-- End Search Form -->
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/dashboard')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               title="<?php echo e(translate('dashboard')); ?>"
                               href="<?php echo e(route('admin.dashboard.index')); ?>">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('dashboard')); ?>

                                </span>
                            </a>
                        </li>
                        <!-- End Dashboards -->

                         <!-- POS -->
                         <?php if(\App\CPU\Helpers::module_permission_check('pos_management')): ?>
                         <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/pos*') && !Request::is('admin/posts*') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   title="<?php echo e(translate('POS')); ?>" href="<?php echo e(route('admin.pos.index')); ?>">
                                    <i class="tio-shopping nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('POS')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- End POS -->
      <!-- Posts -->
      <?php if(\App\CPU\Helpers::module_permission_check('posts_management')): ?>
      <li class="nav-item <?php echo e((Request::is('admin/posts*'))?'scroll-here':''); ?>">
          <small class="nav-subtitle"
              title=""><?php echo e(translate('posts_management')); ?></small>
          <small class="tio-more-horizontal nav-subtitle-replacer"></small>
      </li>
      <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/posts*') ?'active':''); ?>">
          <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
          href="javascript:" title="<?php echo e(translate('posts')); ?>">
              <i class="tio-filter-list nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                  <?php echo e(translate('posts')); ?>

              </span>
          </a>
          <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
              style="display: <?php echo e((Request::is('admin/posts*'))?'block':''); ?>">
              <li class="nav-item <?php echo e(Request::is('admin/posts/add-new')?'active':''); ?>">
                  <a class="nav-link " href="<?php echo e(route('admin.posts.add-new')); ?>"
                     title="<?php echo e(translate('add_posts')); ?>">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate"><?php echo e(translate('add_posts')); ?></span>
                  </a>
              </li>
              <li class="nav-item <?php echo e(Request::is('admin/posts/list')?'active':''); ?>">
                  <a class="nav-link " href="<?php echo e(route('admin.posts.list')); ?>"
                     title="<?php echo e(translate('list_posts')); ?>">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate"><?php echo e(translate('list_posts')); ?></span>
                  </a>
              </li>
            
              <li class="nav-item <?php echo e(Request::is('admin/posts/post-type/view')?'active':''); ?>">
                  <a class="nav-link " href="<?php echo e(route('admin.posts.view_post_type')); ?>"
                     title="<?php echo e(translate('add_post_type')); ?>">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate"><?php echo e(translate('add_post_type')); ?></span>
                  </a>
              </li>
        
          </ul>
        
      </li>
  <?php endif; ?>
  <!-- End Posts -->
                        <!-- Order Management -->
                        <?php if(\App\CPU\Helpers::module_permission_check('order_management')): ?>
                            <li class="nav-item <?php echo e(Request::is('admin/orders*')?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(translate('order_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Order -->
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/orders*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:void(0)" title="<?php echo e(translate('orders')); ?>">
                                    <i class="tio-shopping-cart-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('orders')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/order*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/all')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.orders.list',['all'])); ?>"
                                           title="<?php echo e(translate('all')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('all')); ?>

                                                <span class="badge badge-soft-info badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/pending')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['pending'])); ?>"
                                           title="<?php echo e(translate('pending')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('pending')); ?>

                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'pending'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/confirmed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>"
                                           title="<?php echo e(translate('confirmed')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('confirmed')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where(['order_status'=>'confirmed'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/processing')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['processing'])); ?>"
                                           title="<?php echo e(translate('packaging')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('packaging')); ?>

                                                <span class="badge badge-soft-warning badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where(['order_status'=>'processing'])->count()); ?>

                                                </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/out_for_delivery')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>"
                                           title="<?php echo e(translate('out_for_delivery')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('out_for_delivery')); ?>

                                                <span class="badge badge-soft-warning badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where(['order_status'=>'out_for_delivery'])->count()); ?>

                                                </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/delivered')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['delivered'])); ?>"
                                           title="<?php echo e(translate('delivered')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('delivered')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where(['order_status'=>'delivered'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/returned')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['returned'])); ?>"
                                           title="<?php echo e(translate('returned')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('returned')); ?>

                                                    <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where('order_status','returned')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/failed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['failed'])); ?>"
                                           title="<?php echo e(translate('failed')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('failed_to_Deliver')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where(['order_status'=>'failed'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/canceled')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['canceled'])); ?>"
                                           title="<?php echo e(translate('canceled')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('canceled')); ?>

                                                    <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Model\Order::where(['order_status'=>'canceled'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/refund-section/refund/*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('refund_Requests')); ?>">
                                    <i class="tio-receipt-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('refund_Requests')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/refund-section/refund*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/list/pending')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['pending'])); ?>"
                                           title="<?php echo e(translate('pending')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('pending')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Model\RefundRequest::where('status','pending')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/list/approved')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['approved'])); ?>"
                                           title="<?php echo e(translate('approved')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(translate('approved')); ?>

                                                <span class="badge badge-soft-info badge-pill ml-1">
                                                    <?php echo e(\App\Model\RefundRequest::where('status','approved')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/list/refunded')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['refunded'])); ?>"
                                           title="<?php echo e(translate('refunded')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(translate('refunded')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(\App\Model\RefundRequest::where('status','refunded')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/list/rejected')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['rejected'])); ?>"
                                           title="<?php echo e(translate('rejected')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(translate('rejected')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Model\RefundRequest::where('status','rejected')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <!--Order Management Ends-->

                        <!--Product Management -->
                        <?php if(\App\CPU\Helpers::module_permission_check('product_management')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/brand*') || Request::is('admin/category*') || Request::is('admin/sub*') || Request::is('admin/attribute*') || Request::is('admin/product*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle"
                                       title=""><?php echo e(translate('product_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Pages -->
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('category_Setup')); ?>">
                                    <i class="tio-filter-list nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('category_Setup')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*'))?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.category.view')); ?>"
                                           title="<?php echo e(translate('categories')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('categories')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-category.view')); ?>"
                                           title="<?php echo e(translate('sub_Categories')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('sub_Categories')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-sub-category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-sub-category.view')); ?>"
                                           title="<?php echo e(translate('sub_Sub_Categories')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(translate('sub_Sub_Categories')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/brand*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('brands')); ?>">
                                    <i class="tio-star nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('brands')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/brand*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/add-new')?'active':''); ?>"
                                        title="<?php echo e(translate('add_new')); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.add-new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/list')?'active':''); ?>"
                                        title="<?php echo e(translate('list')); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('list')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/attribute*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.attribute.view')); ?>"
                                   title="<?php echo e(translate('product_Attributes')); ?>">
                                    <i class="tio-category-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('product_Attributes')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/product/list/in_house') || Request::is('admin/product/bulk-import') || (Request::is('admin/product/add-new')) || (Request::is('admin/product/view/*')) || (Request::is('admin/product/barcode/*')))?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('in-Hous_Products')); ?>">
                                    <i class="tio-shop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <span class="text-truncate"><?php echo e(translate('in-house_Products')); ?></span>
                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/product/list/in_house') || (Request::is('admin/product/stock-limit-list/in_house')) || (Request::is('admin/product/bulk-import')) || (Request::is('admin/product/add-new')) || (Request::is('admin/product/view/*')) || (Request::is('admin/product/barcode/*')))?'block':''); ?>">
                                    <li class="nav-item <?php echo e((Request::is('admin/product/list/in_house') || (Request::is('admin/product/view/*')) || (Request::is('admin/product/barcode/*')))?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.list',['in_house', ''])); ?>"
                                           title="<?php echo e(translate('Product_List')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('Product_List')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/add-new') ? 'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.add-new')); ?>"
                                           title="<?php echo e(translate('add_New_Product')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('add_New_Product')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/bulk-import')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.bulk-import')); ?>"
                                           title="<?php echo e(translate('bulk_import')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('bulk_import')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/product/list/seller*')||Request::is('admin/product/updated-product-list')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:"
                                   title="<?php echo e(translate('seller_Products')); ?>">
                                    <i class="tio-airdrop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('seller_Products')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/product/list/seller*')||Request::is('admin/product/updated-product-list')?'block':''); ?>">
                                    <li class="nav-item <?php echo e(str_contains(url()->current().'?status='.request()->get('status'),'/admin/product/list/seller?status=0')==1?'active':''); ?>">
                                        <a class="nav-link"
                                           title="<?php echo e(translate('new_Products_Requests')); ?>"
                                           href="<?php echo e(route('admin.product.list',['seller', 'status'=>'0'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(translate('new_Products_Requests')); ?> </span>
                                        </a>
                                    </li>
                                    <?php if(\App\CPU\Helpers::get_business_settings('product_wise_shipping_cost_approval')==1): ?>
                                        <li class="nav-item <?php echo e(Request::is('admin/product/updated-product-list')?'active':''); ?>">
                                            <a class="nav-link" title="<?php echo e(translate('product_Updated_Requests')); ?>"
                                               href="<?php echo e(route('admin.product.updated-product-list')); ?>">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span
                                                    class="text-truncate"><?php echo e(translate('product_Updated_Requests')); ?> </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item <?php echo e(str_contains(url()->current().'?status='.request()->get('status'),'/admin/product/list/seller?status=1')==1?'active':''); ?>">
                                        <a class="nav-link"
                                           title="<?php echo e(translate('approved_Products')); ?>"
                                           href="<?php echo e(route('admin.product.list',['seller', 'status'=>'1'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(translate('approved_Products')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(str_contains(url()->current().'?status='.request()->get('status'),'/admin/product/list/seller?status=2')==1?'active':''); ?>">
                                        <a class="nav-link"
                                           title="<?php echo e(translate('denied_Products')); ?>"
                                           href="<?php echo e(route('admin.product.list',['seller', 'status'=>'2'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(translate('denied_Products')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <!--Product Management Ends-->

                        <?php if(\App\CPU\Helpers::module_permission_check('promotion_management')): ?>
                        <!--promotion management start-->
                        <li class="nav-item <?php echo e((Request::is('admin/banner*') || (Request::is('admin/coupon*')) || (Request::is('admin/notification*')) || (Request::is('admin/deal*')))?'scroll-here':''); ?>">
                            <small class="nav-subtitle" title=""><?php echo e(translate('promotion_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/banner*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.banner.list')); ?>" title="<?php echo e(translate('banners')); ?>">
                                <i class="tio-photo-square-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('banners')); ?></span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/coupon*') || Request::is('admin/deal*')) ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('offers_&_Deals')); ?>">
                                <i class="tio-users-switch nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('offers_&_Deals')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('admin/coupon*') || Request::is('admin/deal*'))?'block':'none'); ?>">
                                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*')?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.coupon.add-new')); ?>"
                                       title="<?php echo e(translate('coupon')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span
                                            class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('coupon')); ?></span>
                                    </a>
                                </li>
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/deal/flash') || (Request::is('admin/deal/update*')))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.deal.flash')); ?>"
                                       title="<?php echo e(translate('flash_Deals')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span
                                            class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('flash_Deals')); ?></span>
                                    </a>
                                </li>
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/deal/day') || (Request::is('admin/deal/day-update*')))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.deal.day')); ?>"
                                       title="<?php echo e(translate('deal_of_the_day')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('deal_of_the_day')); ?>

                                        </span>
                                    </a>
                                </li>
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/deal/feature') || Request::is('admin/deal/edit*'))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.deal.feature')); ?>"
                                       title="<?php echo e(translate('featured_Deal')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('featured_Deal')); ?>

                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/notification*') ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('notifications')); ?>">
                                <i class="tio-users-switch nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('notifications')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('admin/notification*') || Request::is('admin/business-settings/fcm-index')) ? 'block':'none'); ?>">
                                <li class="navbar-vertical-aside-has-menu <?php echo e(!Request::is('admin/notification/push') && Request::is('admin/notification*')?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.notification.add-new')); ?>"
                                       title="<?php echo e(translate('send_notification')); ?>">
                                        <img src="<?php echo e(asset('public/assets/back-end/img/icons/send-notification.svg')); ?>" alt="Send Notification.svg" width="15" class="mr-2">
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('Send_Notification')); ?>

                                        </span>
                                    </a>
                                </li>
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/business-settings/fcm-index') || Request::is('admin/notification/push'))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                    href="<?php echo e(route('admin.notification.push')); ?>"
                                    title="<?php echo e(translate('Push_Notification')); ?>">
                                        <img src="<?php echo e(asset('public/assets/back-end/img/icons/push-notification.svg')); ?>" alt="Push Notification.svg" width="15" class="mr-2">
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('Push_Notification')); ?>

                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/announcement')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.business-settings.announcement')); ?>"
                               title="<?php echo e(translate('announcements')); ?>">
                                <i class="tio-mic-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('announcements')); ?>

                                </span>
                            </a>
                        </li>
                        <!--promotion management end-->
                        <?php endif; ?>

                        <?php if(\App\CPU\Helpers::module_permission_check('system_settings')): ?>
                            <?php if(count(config('get_theme_routes')) > 0): ?>
                                <!-- Theme Menu Start-->
                                <li class="nav-item <?php echo e((Request::is('admin/banner*') || (Request::is('admin/coupon*')) || (Request::is('admin/notification*')) || (Request::is('admin/deal*')))?'scroll-here':''); ?>">
                                    <small class="nav-subtitle" title=""><?php echo e(config('get_theme_routes')['name']); ?> <?php echo e(translate('Menu')); ?></small>
                                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                                </li>

                                <?php $__currentLoopData = config('get_theme_routes')['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is($route['path']) || Request::is($route['path'].'*')) ? 'active':''); ?> <?php $__currentLoopData = $route['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e((Request::is($sub_route['path']) || Request::is($sub_route['path'].'*')) ? 'active':''); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link <?php echo e(count($route['route_list']) > 0 ? 'nav-link-toggle':''); ?>"
                                           href="<?php echo e(count($route['route_list']) > 0 ? 'javascript:':$route['url']); ?>" title="<?php echo e(translate('offers_&_Deals')); ?>">
                                            <?php echo $route['icon']; ?>

                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate($route['name'])); ?></span>
                                        </a>

                                        <?php if(count($route['route_list']) > 0): ?>
                                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                                style="display: <?php $__currentLoopData = $route['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e((Request::is($sub_route['path']) || Request::is($sub_route['path'].'*')) ? 'block':'none'); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                                <?php $__currentLoopData = $route['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is($sub_route['path']) || Request::is($sub_route['path'].'*')) ? 'active':''); ?>">
                                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                                           href="<?php echo e($sub_route['url']); ?>"
                                                           title="<?php echo e(translate($sub_route['name'])); ?>">
                                                            <span class="tio-circle nav-indicator-icon"></span>
                                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate($sub_route['name'])); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- Theme Menu End-->
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- end refund section -->
                        <?php if(\App\CPU\Helpers::module_permission_check('support_section')): ?>
                        <li class="nav-item <?php echo e((Request::is('admin/support-ticket*') || Request::is('admin/contact*'))?'scroll-here':''); ?>">
                            <small class="nav-subtitle"
                                   title=""><?php echo e(translate('help_&_support')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/contact*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.contact.list')); ?>" title="<?php echo e(translate('messages')); ?>">
                                <i class="tio-messages nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <span class="position-relative">
                                    <?php echo e(translate('messages')); ?>

                                    <?php ($message=\App\Model\Contact::where('seen',0)->count()); ?>
                                    <?php if($message!=0): ?>
                                        <span
                                            class="btn-status btn-xs-status btn-status-danger position-absolute top-0 menu-status"></span>
                                    <?php endif; ?>
                                </span>
                            </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/support-ticket*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.support-ticket.view')); ?>"
                               title="<?php echo e(translate('support_Ticket')); ?>">
                                <i class="tio-chat nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <span class="position-relative">
                                    <?php echo e(translate('support_Ticket')); ?>

                                    <?php if(\App\Model\SupportTicket::where('status','open')->count()>0): ?>
                                        <span
                                            class="btn-status btn-xs-status btn-status-danger position-absolute top-0 menu-status"></span>
                                    <?php endif; ?>
                                </span>
                            </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <!--support section ends here-->

                        <!--Reports & Analytics section-->
                        <?php if(\App\CPU\Helpers::module_permission_check('report')): ?>
                        <li class="nav-item <?php echo e((Request::is('admin/report/earning') || Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-report') || Request::is('admin/report/earning') || Request::is('admin/transaction/list') || Request::is('admin/refund-section/refund-list') || Request::is('admin/stock/product-in-wishlist') || Request::is('admin/reviews*') || Request::is('admin/stock/product-stock') || Request::is('admin/transaction/wallet-bonus') || Request::is('admin/report/order')) ? 'scroll-here':''); ?>">
                            <small class="nav-subtitle" title="">
                                <?php echo e(translate('reports_&_Analysis')); ?>

                            </small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/report/admin-earning') || Request::is('admin/report/seller-earning') || Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-report') || Request::is('admin/report/earning') || Request::is('admin/transaction/order-transaction-list') || Request::is('admin/transaction/expense-transaction-list') || Request::is('admin/transaction/refund-transaction-list') || Request::is('admin/transaction/wallet-bonus')) ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('sales_&_Transaction_Report')); ?>">
                                <i class="tio-chart-bar-4 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('sales_&_Transaction_Report')); ?>

                            </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('admin/report/admin-earning') || Request::is('admin/report/seller-earning') || Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-report') || Request::is('admin/report/earning') || Request::is('admin/transaction/order-transaction-list') || Request::is('admin/transaction/expense-transaction-list') || Request::is('admin/transaction/refund-transaction-list') || Request::is('admin/transaction/wallet-bonus')) ?'block':'none'); ?>">
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/report/admin-earning') || Request::is('admin/report/seller-earning'))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.report.admin-earning')); ?>"
                                       title="<?php echo e(translate('Earning_Reports')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                       <?php echo e(translate('Earning_Reports')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/report/inhoue-product-sale')?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.report.inhoue-product-sale')); ?>"
                                       title="<?php echo e(translate('inhouse_Sales')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                        <?php echo e(translate('inhouse_Sales')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/report/seller-report')?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.report.seller-report')); ?>"
                                       title="<?php echo e(translate('seller_Sales')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize">
                                        <?php echo e(translate('seller_Sales')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/transaction/order-transaction-list') || Request::is('admin/transaction/expense-transaction-list') || Request::is('admin/transaction/refund-transaction-list') || Request::is('admin/transaction/wallet-bonus'))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.transaction.order-transaction-list')); ?>"
                                       title="<?php echo e(translate('transaction_Report')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                     <?php echo e(translate('transaction_Report')); ?>

                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/report/all-product') ||Request::is('admin/stock/product-in-wishlist') || Request::is('admin/stock/product-stock')) ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.report.all-product')); ?>" title="<?php echo e(translate('product_Report')); ?>">
                                <i class="tio-chart-bar-4 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <span class="position-relative">
                                <?php echo e(translate('product_Report')); ?>

                            </span>
                        </span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/order')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.report.order')); ?>"
                               title="<?php echo e(translate('order_Report')); ?>">
                                <i class="tio-chart-bar-1 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                             <?php echo e(translate('Order_Report')); ?>

                            </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <!--Reports & Analytics section End-->

                        <!--User management-->
                        <?php if(\App\CPU\Helpers::module_permission_check('user_section')): ?>
                        <li class="nav-item <?php echo e((Request::is('admin/customer/list') ||Request::is('admin/sellers/subscriber-list')||Request::is('admin/sellers/seller-add') || Request::is('admin/sellers/seller-list') || Request::is('admin/delivery-man*'))?'scroll-here':''); ?>">
                            <small class="nav-subtitle" title=""><?php echo e(translate('user_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/customer/wallet*') || Request::is('admin/customer/list') || Request::is('admin/customer/view*') || Request::is('admin/reviews*') || Request::is('admin/customer/loyalty/report'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('customers')); ?>">
                                <i class="tio-wallet nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('customers')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('admin/customer/wallet*') || Request::is('admin/customer/list') || Request::is('admin/customer/view*') || Request::is('admin/reviews*') || Request::is('admin/customer/loyalty/report'))?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/customer/list') || Request::is('admin/customer/view*')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.customer.list')); ?>"
                                       title="<?php echo e(translate('Customer_List')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('customer_List')); ?> </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/reviews*')?'active':''); ?>">
                                    <a class="nav-link"
                                       href="<?php echo e(route('admin.reviews.list')); ?>"
                                       title="<?php echo e(translate('customer_Reviews')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('customer_Reviews')); ?>

                                </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/customer/wallet/report')?'active':''); ?>">
                                    <a class="nav-link" title="<?php echo e(translate('wallet')); ?>"
                                       href="<?php echo e(route('admin.customer.wallet.report')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                        <?php echo e(translate('wallet')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/customer/wallet/bonus-setup')?'active':''); ?>">
                                    <a class="nav-link" title="<?php echo e(translate('wallet_Bonus_Setup')); ?>"
                                       href="<?php echo e(route('admin.customer.wallet.bonus-setup')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                        <?php echo e(translate('wallet_Bonus_Setup')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/customer/loyalty/report')?'active':''); ?>">
                                    <a class="nav-link" title="<?php echo e(translate('loyalty_Points')); ?>"
                                       href="<?php echo e(route('admin.customer.loyalty.report')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                        <?php echo e(translate('loyalty_Points')); ?>

                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/seller*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('sellers')); ?>">
                                <i class="tio-users-switch nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('sellers')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/seller*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/sellers/seller-add')?'active':''); ?>">
                                    <a class="nav-link" title="<?php echo e(translate('add_New_Seller')); ?>"
                                       href="<?php echo e(route('admin.sellers.seller-add')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                        <?php echo e(translate('add_New_Seller')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/sellers/seller-list') ||Request::is('admin/sellers/view*') ?'active':''); ?>">
                                    <a class="nav-link" title="<?php echo e(translate('seller_List')); ?>"
                                       href="<?php echo e(route('admin.sellers.seller-list')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                        <?php echo e(translate('seller_List')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/sellers/withdraw_list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.sellers.withdraw_list')); ?>"
                                       title="<?php echo e(translate('withdraws')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('withdraws')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e((Request::is('admin/sellers/withdraw-method/list') || Request::is('admin/sellers/withdraw-method/*'))?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.sellers.withdraw-method.list')); ?>"
                                       title="<?php echo e(translate('withdrawal_Methods')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('withdrawal_Methods')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/delivery-man*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('delivery-man')); ?>">
                                <i class="tio-user nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('delivery-man')); ?>

                            </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/delivery-man*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/delivery-man/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.delivery-man.add')); ?>"
                                       title="<?php echo e(translate('add_new')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('add_new')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/delivery-man/list')|| Request::is('admin/delivery-man/edit*')  || Request::is('admin/delivery-man/earning-statement*') || Request::is('admin/delivery-man/order-history-log*') || Request::is('admin/delivery-man/order-wise-earning*')?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.delivery-man.list')); ?>"
                                       title="<?php echo e(translate('list')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('list')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/delivery-man/chat')?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.delivery-man.chat')); ?>"
                                       title="<?php echo e(translate('chat')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('chat')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/delivery-man/withdraw-list') || Request::is('admin/delivery-man/withdraw-view*')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.delivery-man.withdraw-list')); ?>"
                                       title="<?php echo e(translate('withdraws')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('withdraws')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/delivery-man/emergency-contact')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.delivery-man.emergency-contact.index')); ?>"
                                       title="<?php echo e(translate('emergency_contact')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('Emergency_Contact')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php if(auth('admin')->user()->admin_role_id==1): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/employee*') || Request::is('admin/custom-role*'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('employees')); ?>">
                                <i class="tio-user nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('employees')); ?>

                            </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/employee*') || Request::is('admin/custom-role*')?'block':'none'); ?>">
                                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*')?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.custom-role.create')); ?>"
                                       title="<?php echo e(translate('employee_Role_Setup')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('employee_Role_Setup')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e((Request::is('admin/employee/list') || Request::is('admin/employee/add-new') || Request::is('admin/employee/update*'))?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.employee.list')); ?>"
                                       title="<?php echo e(translate('employees')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('employees')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer/subscriber-list')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.customer.subscriber-list')); ?>"
                                   title="<?php echo e(translate('subscribers')); ?>">
                                    <span class="tio-user nav-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('subscribers')); ?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!--User management end-->

                        <!--System Settings-->
                        <?php if(\App\CPU\Helpers::module_permission_check('system_settings')): ?>
                        <li class="nav-item <?php echo e((Request::is('admin/business-settings/social-media') || Request::is('admin/business-settings/web-config/app-settings') || Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/page*') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list') || Request::is('admin/business-settings/fcm-index') || Request::is('admin/business-settings/mail')|| Request::is('admin/business-settings/web-config/login-url-setup') || Request::is('admin/business-settings/web-config/db-index')||Request::is('admin/business-settings/web-config/environment-setup') || Request::is('admin/business-settings/web-config') || Request::is('admin/business-settings/cookie-settings') || Request::is('admin/business-settings/otp-setup') || Request::is('admin/system-settings/software-update') || Request::is('admin/business-settings/web-config/theme/setup') || Request::is('admin/business-settings/delivery-restriction') || Request::is('admin/addon')) ? 'scroll-here' : ''); ?>">
                            <small class="nav-subtitle"
                                   title=""><?php echo e(translate('system_Settings')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/business-settings/web-config') || Request::is('admin/product-settings/inhouse-shop') || Request::is('admin/business-settings/seller-settings') || Request::is('admin/customer/customer-settings') || Request::is('admin/business-settings/delivery-man-settings') || Request::is('admin/refund-section/refund-index') || Request::is('admin/business-settings/shipping-method/setting') || Request::is('admin/business-settings/order-settings/index') || Request::is('admin/product-settings') || Request::is('admin/business-settings/web-config/delivery-restriction') || Request::is('admin/business-settings/delivery-restriction'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.business-settings.web-config.index')); ?>"
                               title="<?php echo e(translate('business_Setup')); ?>">
                                <i class="tio-globe nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('business_Setup')); ?>

                            </span>
                            </a>
                        </li>









                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/business-settings/mail') || Request::is('admin/business-settings/sms-module') || Request::is('admin/business-settings/captcha') || Request::is('admin/social-login/view') || Request::is('admin/social-media-chat/view') || Request::is('admin/business-settings/map-api') || Request::is('admin/business-settings/payment-method') || Request::is('admin/business-settings/payment-method/offline-payment*'))?'active':''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>"
                               title="<?php echo e(translate('3rd_party')); ?>">
                                <span class="tio-key nav-icon"></span>
                                <span class="text-truncate"><?php echo e(translate('3rd_party')); ?></span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/page*') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list') || Request::is('admin/business-settings/social-media') || Request::is('admin/file-manager*') || Request::is('admin/business-settings/features-section') ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:" title="<?php echo e(translate('Pages_&_Media')); ?>">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('Pages_&_Media')); ?>

                            </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/page*') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list') || Request::is('admin/business-settings/social-media') || Request::is('admin/file-manager*') || Request::is('admin/business-settings/features-section')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e((Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/page*') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list')|| Request::is('admin/business-settings/features-section'))?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.business-settings.terms-condition')); ?>"
                                       title="<?php echo e(translate('pages')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                      <?php echo e(translate('pages')); ?>

                                    </span>
                                    </a>
                                </li>
                                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/social-media')?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.business-settings.social-media')); ?>"
                                       title="<?php echo e(translate('social_Media_Links')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('social_Media_Links')); ?>

                                </span>
                                    </a>
                                </li>

                                <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/file-manager*')?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                       href="<?php echo e(route('admin.file-manager.index')); ?>"
                                       title="<?php echo e(translate('gallery')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('gallery')); ?>

                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/business-settings/web-config/environment-setup') || Request::is('admin/business-settings/web-config/mysitemap') || Request::is('admin/business-settings/analytics-index') || Request::is('admin/currency/view') || Request::is('admin/business-settings/web-config/db-index') || Request::is('admin/business-settings/language*') || Request::is('admin/business-settings/web-config/theme/setup')  || Request::is('admin/system-settings/software-update') || Request::is('admin/business-settings/cookie-settings') || Request::is('admin/business-settings/otp-setup') || Request::is('admin/business-settings/web-config/app-settings') || Request::is('admin/addon'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               title="<?php echo e(translate('system_Setup')); ?>"
                               href="<?php echo e(route('admin.business-settings.web-config.environment-setup')); ?>">
                                <i class="tio-labels nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('system_Setup')); ?>

                            </span>
                            </a>
                        </li>

                        <?php if(count(config('addon_admin_routes'))>0): ?>
                            <li class="navbar-vertical-aside-has-menu
                                <?php $__currentLoopData = config('addon_admin_routes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(strstr(Request::url(), $route['path'])?'active':''); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('Pages_&_Media')); ?>">
                                    <i class="tio-puzzle nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('addon_Menus')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display:
                                    <?php $__currentLoopData = config('addon_admin_routes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e(strstr(Request::url(), $route['path'])?'block':''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    ">
                                    <?php $__currentLoopData = config('addon_admin_routes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="navbar-vertical-aside-has-menu <?php echo e(strstr(Request::url(), $route['path'])?'active':''); ?>">

                                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                                   href="<?php echo e($route['url']); ?>" title="<?php echo e(translate($route['name'])); ?>">
                                                    <span class="tio-circle nav-indicator-icon"></span>
                                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                                        <?php echo e(translate($route['name'])); ?>

                                                    </span>
                                                </a>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>































                        <?php endif; ?>
                        <!--System Settings end-->

                        <li class="nav-item pt-5">
                        </li>
                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(window).on('load' , function() {
            if($(".navbar-vertical-content li.active").length) {
                $('.navbar-vertical-content').animate({
                    scrollTop: $(".navbar-vertical-content li.active").offset().top - 150
                }, 10);
            }
        });

        //Sidebar Menu Search
        var $rows = $('.navbar-vertical-content .navbar-nav > li');
        $('#search-bar-input').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });

    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\xampp\htdocs\long-an\resources\views/layouts/back-end/partials/_side-bar.blade.php ENDPATH**/ ?>