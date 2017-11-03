<?php
$application_settings = $this->config->item('application_settings');
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="main#entity/list">
                    <i class="fa fa-briefcase"></i> <span>Entity</span>
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-at"></i><span>Accounts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="main#accounts/list">
                            <i class="fa fa-at"></i><span>Manage Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#account_opening_balance/list">
                            <i class="fa fa-rupee"></i><span>Opening Balances</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#group/list">
                            <i class="fa fa-users"></i><span>Group</span>
                        </a>
                    </li>
                    <li>
                        <a href="#voucher_types/list">
                            <i class="fa fa-tags"></i><span>Voucher Types</span>
                        </a>
                    </li>
                    <?php if ($application_settings['trading_groups']) { ?>
                        <li>
                            <a href="main#trading_groups/list">
                                <i class="fa fa-group"></i><span>Trading Groups</span>
                            </a>
                        </li>
                        <?php
                    }
                    if ($application_settings['allow_stock_in_out']) {
                        ?>
                        <li>
                            <a href="main#voucher_relationship/list">
                                <i class="fa fa-exchange"></i><span>Voucher Relationship</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-exchange"></i><span>Transaction</span> 
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="main#transaction/list">
                            <i class="fa fa-exchange"></i> <span>Transaction</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#sales_invoice/list">
                            <i class="fa fa-angle-right"></i><span>Sales Invoice</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#sales_return/list">
                            <i class="fa fa-angle-right"></i><span>Sales Return</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#supplementary_credit_note/list">
                            <i class="fa fa-angle-right"></i><span>S. Credit Note</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#purchase_invoice/list">
                            <i class="fa fa-angle-right"></i><span>Purchase Invoice</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#purchase_return/list">
                            <i class="fa fa-angle-right"></i><span>Purchase Return</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#supplementary_debit_note/list">
                            <i class="fa fa-angle-right"></i><span>S. Debit Note</span>
                        </a>
                    </li>
                    <?php if ($application_settings['allow_stock_in_out']) { ?>
                        <li>
                            <a href="main#stock_in/list">
                                <i class="fa fa-angle-right"></i><span>Stock In</span>
                            </a>
                        </li>
                        <li>
                            <a href="main#stock_out/list">
                                <i class="fa fa-angle-right"></i><span>Stock out</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="main#stock_journal/list">
                            <i class="fa fa-exchange"></i> <span>Stock Journal</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-list"></i><span>Reports</span> 
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#trading/list">
                            <i class="fa fa-angle-right"></i><span>Trading Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#profit_loss/list">
                            <i class="fa fa-angle-right"></i><span>Profit & Loss</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#balance_sheet/list">
                            <i class="fa fa-angle-right"></i><span>Balance Sheet</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#trial_balance/list/without_transaction">
                            <i class="fa fa-angle-right"></i><span>Trial Balance</span>
                        </a>
                    </li>
                    <li>
                        <a href="#ledger_report/list">
                            <i class="fa fa-angle-right"></i><span>Ledger Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#stock_summary/list">
                            <i class="fa fa-list"></i> <span>Stock Reports</span>
                        </a>
                    </li>
                    <?php if ($application_settings['allow_stock_in_out']) { ?>
                        <li>
                            <a href="main#stock_in_out_reports/list">
                                <i class="fa fa-retweet"></i> <span>Stock In Out Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="main#stock_in_out_relationship_reports/list">
                                <i class="fa fa-retweet"></i> <span>Stock In Out Relationship Reports</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sellsy"></i><span>Stock Master</span> 
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="main#stock_unit/list">
                            <i class="fa fa-angle-right"></i><span>Stock Unit</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#stock_group/list">
                            <i class="fa fa-group"></i><span>Stock Group</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#stock_location/list">
                            <i class="fa fa-angle-right"></i><span>Stock Location</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#stock_item/list">
                            <i class="fa fa-angle-right"></i><span>Stock Item</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-angle-right"></i><span>Master</span> 
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="main#company_master/list">
                            <i class="fa fa-building-o"></i><span>Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="main#service_master/list">
                            <i class="fa fa-building-o"></i><span>Service Master</span>
                        </a>
                    </li>
                    <?php if ($application_settings['allow_bank_statement_upload']) { ?>
                        <li>
                            <a href="main#bank_statement/list">
                                <i class="fa fa-tasks"></i><span>Bank Statement</span>
                            </a>
                        </li>
                        <?php
                    }
                    if ($application_settings['allow_bank_reconciliation']) {
                        ?>
                        <li>
                            <a href="main#bank_reconciliation/list">
                                <i class="fa fa-university"></i><span>Bank Reconciliation</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->