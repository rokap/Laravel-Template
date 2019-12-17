<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{route('dashboard')}}">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="{{asset('images/logo.png')}}" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Rokap Inc</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived">
                <a class="sidebar-link " href="{{route('dashboard')}}">
                        <span class="icon-holder">
                          <i class="ti-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('projects.index')}}">
                        <span class="icon-holder">
                          <i class="fa fa-gears"></i>
                        </span>
                    <span class="title">Projects</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="ti-shopping-cart"></i></span>
                    <span class="title">Sales</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('sales.estimates.index')}}">Estimates</a></li>
                    <li><a class='sidebar-link' href="{{route('sales.invoices.index')}}">Invoices</a></li>
                    <li><a class='sidebar-link' href="{{route('sales.payments.index')}}">Payments</a></li>
                    <li><a class='sidebar-link' href="{{route('sales.deposits.index')}}">Deposits</a></li>
                    <li><a class='sidebar-link' href="{{route('sales.customers.index')}}">Customers</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="ti-money"></i></span>
                    <span class="title">Expenses</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('expenses.purchases.index')}}">Purchase Orders</a></li>
                    <li><a class='sidebar-link' href="{{route('expenses.bills.index')}}">Bills</a></li>
                    <li><a class='sidebar-link' href="{{route('expenses.checks.index')}}">Checks</a></li>
                    <li><a class='sidebar-link' href="{{route('expenses.vendors.index')}}">Vendors</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="ti-package"></i></span>
                    <span class="title">Inventory</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('inventory.categories.index')}}">Categories</a></li>
                    <li><a class='sidebar-link' href="{{route('inventory.items.index')}}">Items</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="ti-user"></i></span>
                    <span class="title">Workers</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('workers.payroll.index')}}">Payroll</a></li>
                    <li><a class='sidebar-link' href="{{route('workers.employees.index')}}">Employees</a></li>
                    <li><a class='sidebar-link' href="{{route('workers.contractors.index')}}">Contractors</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="fa fa-bank"></i></span>
                    <span class="title">Banking</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('banking.feeds.index')}}">Feeds</a></li>
                    <li><a class='sidebar-link' href="{{route('banking.rules.index')}}">Rules</a></li>
                    <li><a class='sidebar-link' href="{{route('banking.receipts.index')}}">Receipts</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="fa fa-balance-scale"></i></span>
                    <span class="title">Taxes</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('taxes.sales.index')}}">Sales Tax</a></li>
                    <li><a class='sidebar-link' href="{{route('taxes.payroll.index')}}">Payroll Tax</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="ti-archive"></i></span>
                    <span class="title">Accounting</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class='sidebar-link' href="{{route('accounting.chartOfAccounts.index')}}">Chart of Accounts</a></li>
                    <li><a class='sidebar-link' href="{{route('accounting.reconcile.index')}}">Reconcile</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('reports.index')}}">
                        <span class="icon-holder">
                          <i class="ti-pie-chart"></i>
                        </span>
                    <span class="title">Reports</span>
                </a>
            </li>
        </ul>
    </div>
</div>