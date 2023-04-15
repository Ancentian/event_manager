<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    
        <div class="scrollbar-sidebar" style="overflow-y:auto;">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu"> 
                    <li class="app-sidebar__heading">Events</li>
                    <li>
                        <a href="#">
                            <i style="font-size: 1.5rem; color: Tomato;" class="pe-7s-server"></i>&nbsp;
                            Events
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>requests/index">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Requests
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url() ?>requests/addRequest">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Add Request
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url() ?>events/index">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Events
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>events/addEvent">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Add Event
                                </a>
                            </li> 
                            <li >
                                <a href="<?php echo base_url() ?>inventory/returnedItems">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Returns
                                </a>
                            </li>
                            <li hidden>
                                <a href="<?php echo base_url() ?>production/addPayment">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Add Payment
                                </a>
                            </li>   
                        </ul>
                    </li>
                    <li class="app-sidebar__heading">Inventory</li>
                    <li>
                        <a href="#">
                            <i style="font-size: 1.5rem; color: Tomato;" class="pe-7s-server"></i>&nbsp;
                            Inventory
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul> 
                            <li>
                                <a href="<?php echo base_url() ?>inventory/index">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Inventory
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>inventory/add">
                                    <i class="metismenu-icon pe-7s-mouse">
                                    </i>Add Items
                                </a>
                            </li>   
                        </ul>
                    </li>

                    <li class="app-sidebar__heading">HRM</li>
                    <li>
                        <a href="#">
                            <i style="font-size: 1.5rem; color: Tomato;" class="pe-7s-users"></i>&nbsp;
                            HRM
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                            <li>
                                <a href="<?php echo base_url() ?>employee/addstaff">
                                    <i class="metismenu-icon pe-7s-add-user"></i>
                                    Add Staff
                                </a>
                            </li>      
                            <li>
                                <a href="<?php echo base_url() ?>employee/employees">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    Staff List
                                </a>
                            </li> 
                        <?php }?>
                            <li>
                                <a href="<?php echo base_url() ?>customers/addCustomer">
                                    <i class="metismenu-icon pe-7s-add-user"></i>
                                    Add Customer
                                </a>
                            </li>      
                            <li>
                                <a href="<?php echo base_url() ?>customers/index">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    Customer List
                                </a>
                            </li> 

                        </ul>
                    </li>
                    <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == 'finance'){ ?>
                    <li class="app-sidebar__heading">Reports</li>
                    <li>
                        <a href="#">
                            <i style="font-size: 1.5rem; color: Tomato;" class="pe-7s-users"></i>&nbsp;
                            Reports
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>reports/requestReports">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    Request Reports
                                </a>
                            </li> 
                            <li >
                                <a href="<?php echo base_url() ?>reports/paymentReports">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    Payment Reports
                                </a>
                            </li> 
                            <li >
                                <a href="<?php echo base_url() ?>reports/inventoryReport">
                                    <i class="metismenu-icon pe-7s-graph3"></i>
                                    Inventory Reports
                                </a>
                            </li>  
                            <li hidden>
                                <a href="<?php echo base_url() ?>reports/dueReport">
                                    <i class="metismenu-icon pe-7s-graph3"></i>
                                    Due Reports
                                </a>
                            </li>
                            <li hidden>
                                <a href="<?php echo base_url() ?>reports/collectionReport">
                                    <i class="metismenu-icon pe-7s-graph3"></i>
                                    Collection Reports
                                </a>
                            </li>  
                            <li hidden>
                                <a href="<?php echo base_url() ?>reports/bestSeller">
                                    <i class="metismenu-icon pe-7s-graph3"></i>
                                    Best Seller
                                </a>
                            </li>   
                        </ul>
                    </li>
                <?php }?>
                    <?php if ($this->session->userdata('user_aob')->role == 'admin' || $this->session->userdata('user_aob')->role == ''){ ?>
                    <li class="app-sidebar__heading" >Settings</li>
                    <li>
                        <a href="<?php echo base_url() ?>employee/setAdmin">
                            <i class="metismenu-icon pe-7s-graph3">
                            </i>SMS API Settings
                        </a>
                    </li>
                <?php }?>
                </ul>
            </div>
        </div>
    </div> 
