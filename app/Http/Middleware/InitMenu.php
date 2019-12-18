<?php

namespace App\Http\Middleware;

use App\MenuGenerator;
use Closure;

class InitMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Make Menu Array
        $mainMenu = new MenuGenerator();
        $mainMenu->AddLink('Dashboard', route('dashboard'), 'ti-home');
        $mainMenu->AddLink('Projects', route('projects.index'), 'fa fa-gears');

        $mainMenu->AddLink('Sales', 'javascript:void(0);', 'ti-shopping-cart');
        $mainMenu->AddLink('Estimates', route('sales.estimates.index'), null, 'Sales');
        $mainMenu->AddLink('Invoices', route('sales.invoices.index'), null, 'Sales');
        $mainMenu->AddLink('Payments', route('sales.payments.index'), null, 'Sales');
        $mainMenu->AddLink('Deposits', route('sales.deposits.index'), null, 'Sales');
        $mainMenu->AddLink('Customers', route('sales.customers.index'), null, 'Sales');

        $mainMenu->AddLink('Expenses', 'javascript:void(0);', 'ti-money');
        $mainMenu->AddLink('Purchases', route('expenses.purchases.index'), null, 'Expenses');
        $mainMenu->AddLink('Bills', route('expenses.bills.index'), null, 'Expenses');
        $mainMenu->AddLink('Checks', route('expenses.checks.index'), null, 'Expenses');
        $mainMenu->AddLink('Vendors', route('expenses.vendors.index'), null, 'Expenses');

        $mainMenu->AddLink('Inventory', 'javascript:void(0);', 'ti-package');
        $mainMenu->AddLink('Categories', route('inventory.categories.index'), null, 'Inventory');
        $mainMenu->AddLink('Items', route('inventory.items.index'), null, 'Inventory');

        $mainMenu->AddLink('Workers', 'javascript:void(0);', 'ti-user');
        $mainMenu->AddLink('Payroll', route('workers.payroll.index'), null, 'Workers');
        $mainMenu->AddLink('Employees', route('workers.employees.index'), null, 'Workers');
        $mainMenu->AddLink('Contractors', route('workers.contractors.index'), null, 'Workers');

        $mainMenu->AddLink('Banking', 'javascript:void(0);', 'fa fa-bank');
        $mainMenu->AddLink('Feeds', route('banking.feeds.index'), null, 'Banking');
        $mainMenu->AddLink('Rules', route('banking.rules.index'), null, 'Banking');
        $mainMenu->AddLink('Receipts', route('banking.receipts.index'), null, 'Banking');

        $mainMenu->AddLink('Taxes', 'javascript:void(0);', 'fa fa-balance-scale');
        $mainMenu->AddLink('Sales Tax', route('taxes.sales.index'), null, 'Taxes');
        $mainMenu->AddLink('Payroll Tax', route('taxes.payroll.index'), null, 'Taxes');

        $mainMenu->AddLink('Accounting', 'javascript:void(0);', 'ti-archive');
        $mainMenu->AddLink('Chart of Accounts', route('accounting.chartOfAccounts.index'), null, 'Accounting');
        $mainMenu->AddLink('Reconcile', route('accounting.reconcile.index'), null, 'Accounting');

        $mainMenu->AddLink('Reports', route('reports.index'), 'ti-pie-chart');

        $mainMenu = $mainMenu->Prepare();


        view()->share('mainMenu', $mainMenu);
        return $next($request);
    }
}