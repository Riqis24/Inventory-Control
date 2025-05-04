<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item  {{ Route::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- <li class="sidebar-item  {{ Route::is('Transaction.*') ? 'active' : '' }}">
            <a href="{{ route('Transaction.index') }}" class="sidebar-link">
                <i class="bi bi-coin"></i>
                <span>Transaction</span>
            </a>
        </li> --}}
        <li
            class="sidebar-item has-sub {{ ((Route::is('Transaction.*') ? 'active' : '' || Route::is('ExpenseTransaction.*')) ? 'active' : '' || Route::is('ReceivablePayment.*')) ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-coin"></i>
                <span>Transaction</span>
            </a>

            <ul
                class="submenu {{ ((Route::is('Transaction.*') ? 'active' : '' || Route::is('ExpenseTransaction.*')) ? 'active' : '' || Route::is('ReceivablePayment.*')) ? 'active' : '' }}">
                <li class="submenu-item {{ Route::is('Transaction.*') ? 'active' : '' }}">
                    <a href="{{ route('Transaction.index') }}" class="submenu-link">
                        Sales Transaction</a>
                </li>
                <li class="submenu-item {{ Route::is('ExpenseTransaction.*') ? 'active' : '' }}">
                    <a href="{{ route('ExpenseTransaction.index') }}" class="submenu-link">Expense Transaction</a>
                </li>
                <li class="submenu-item {{ Route::is('ReceivablePayment.*') ? 'active' : '' }}">
                    <a href="{{ route('ReceivablePayment.index') }}" class="submenu-link">Receivable Payment</a>
                </li>
            </ul>
        </li>

        <li
            class="sidebar-item has-sub {{ (((Route::is('CustTransaction.*') ? 'active' : '' || Route::is('StockTransaction.*')) ? 'active' : '' || Route::is('Stock.*')) ? 'active' : '' || Route::is('FinancialRecord.*')) ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-journals"></i>
                <span>Report</span>
            </a>

            <ul class="submenu {{ Route::is('CustTransaction.*') ? 'active' : '' }}">
                <li class="submenu-item {{ Route::is('CustTransaction.*') ? 'active' : '' }}">
                    <a href="{{ route('CustTransaction.index') }}" class="submenu-link">Cust Transaction</a>
                </li>
                <li class="submenu-item {{ Route::is('StockTransaction.*') ? 'active' : '' }}">
                    <a href="{{ route('StockTransaction.index') }}" class="submenu-link">Stock Transaction</a>
                </li>
                <li class="submenu-item {{ Route::is('Stock.*') ? 'active' : '' }}">
                    <a href="{{ route('Stock.index') }}" class="submenu-link">Stock</a>
                </li>
                <li class="submenu-item {{ Route::is('FinancialRecord.*') ? 'active' : '' }}">
                    <a href="{{ route('FinancialRecord.index') }}" class="submenu-link">Financial Record</a>
                </li>
            </ul>
        </li>

        {{-- @role(['Super Admin', 'Admin']) --}}
        <li
            class="sidebar-item has-sub {{ ((Route::is('ProductMstr.*') ? 'active' : '' || Route::is('MeasurementMstr.*')) ? 'active' : '' || Route::is('CustMstr.*')) ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-boxes"></i>
                <span>Master</span>
            </a>

            <ul
                class="submenu {{ (((Route::is('ProductMstr.*') ? 'active' : '' || Route::is('MeasurementMstr.*')) ? 'active' : '' || Route::is('MeasurementMstr.*')) ? 'active' : '' || Route::is('CustMstr.*')) ? 'active' : '' }}">
                <li class="submenu-item {{ Route::is('ProductMstr.*') ? 'active' : '' }}">
                    <a href="{{ route('ProductMstr.index') }}" class="submenu-link">Product Master</a>
                </li>
                <li class="submenu-item {{ Route::is('MeasurementMstr.*') ? 'active' : '' }}">
                    <a href="{{ route('MeasurementMstr.index') }}" class="submenu-link">Measurement Master</a>
                </li>
                <li class="submenu-item  {{ Route::is('CustMstr.*') ? 'active' : '' }}">
                    <a href="{{ route('CustMstr.index') }}" class="submenu-link">Customer Master</a>
                </li>
                <li class="submenu-item  {{ Route::is('PriceMstr.*') ? 'active' : '' }}">
                    <a href="{{ route('PriceMstr.index') }}" class="submenu-link">Price Master</a>
                </li>
            </ul>
        </li>
        {{-- @endrole --}}

        {{-- @role('Super Admin') --}}
        <li
            class="sidebar-item has-sub {{ ((Route::is('UserMstr.*') ? 'active' : '' || Route::is('RoleMstr.*')) ? 'active' : '' || Route::is('PermissionMstr.*')) ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear"></i>
                <span>Config</span>
            </a>

            <ul
                class="submenu {{ ((Route::is('UserMstr.*') ? 'd-block' : '' || Route::is('RoleMstr.*')) ? 'active' : '' || Route::is('PermissionMstr.*')) ? 'active' : '' }}">
                @can('user.view')
                    <li class="submenu-item {{ Route::is('UserMstr.*') ? 'active' : '' }}">
                        <a href="{{ route('UserMstr.index') }}" class="submenu-link">User Master</a>
                    </li>
                @endcan
                <li class="submenu-item {{ Route::is('RoleMstr.*') ? 'active' : '' }}">
                    <a href="{{ route('RoleMstr.index') }}" class="submenu-link">Role Master</a>
                </li>
                <li class="submenu-item {{ Route::is('PermissionMstr.*') ? 'active' : '' }}">
                    <a href="{{ route('PermissionMstr.index') }}" class="submenu-link">Permissions</a>
                </li>
            </ul>
        </li>
        {{-- @endrole --}}


    </ul>
    <div class="p-3 border-top w-100" style="text-align:center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</div>
