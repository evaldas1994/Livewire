<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('home') }}">
            <span class="sidebar-brand-text align-middle">
                Dineta
                <sup><small class="badge bg-primary text-uppercase">web</small></sup>
            </span>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                     <img src="https://eu.ui-avatars.com/api/?name={{ auth()->user()->f_id }}&background=random" class="avatar img-fluid rounded me-1" alt="{{ auth()->user()->f_id }}" />
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        {{ auth()->user()->f_id }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="{{ route('user-params.index') }}"><i class="align-middle me-1" data-feather="user"></i>@lang('nav.user_params')</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('system-params.index') }}"><i class="align-middle me-1" data-feather="settings"></i>@lang('nav.system_params')</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="align-middle me-1" data-feather="log-out"></i>@lang('nav.log_out')</a>
                    </div>

                    <div class="sidebar-user-subtitle">{{ auth()->user()->f_post }}</div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">@lang('nav.dashboard')</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#system" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">@lang('nav.system.index')</span>
                </a>
                <ul id="system" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.system.users')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.system.user_settings')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.system.system_settings')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('bank-account-systems.index')}}">@lang('nav.system.bank_accounts')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('counters.index') }}">@lang('nav.system.counters')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('blank-numbers.index') }}">@lang('nav.system.blank_numbers')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('periods.index') }}">@lang('nav.system.periods')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('messages.index') }}">@lang('nav.system.messages')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('message-groups.index') }}">@lang('nav.system.message_groups')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#registers" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="server"></i> <span class="align-middle">@lang('nav.registers.index')</span>
                </a>
                <ul id="registers" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('accounts.index') }}">
                            <span class="align-middle">@lang('nav.registers.accounts')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('stocks.index') }}">
                            <span class="align-middle">@lang('nav.registers.stocks')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('barcodes.index') }}">
                            <span class="align-middle">@lang('nav.registers.barcodes')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('production-cards.index') }}">
                            <span class="align-middle">@lang('nav.registers.production_cards')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('partners.index') }}">
                            <span class="align-middle">@lang('nav.registers.partners')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#groups" data-bs-toggle="collapse" class="sidebar-link collapsed">@lang('nav.registers.groups.index')</a>
                        <ul id="groups" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('account-groups.index') }}">@lang('nav.registers.groups.account_groups')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('stock-groups.index') }}">@lang('nav.registers.groups.stock_groups')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('partner-groups.index') }}">@lang('nav.registers.groups.partner_groups')</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#additional-registers" data-bs-toggle="collapse" class="sidebar-link collapsed">@lang('nav.registers.additional_registers.index')</a>
                        <ul id="additional-registers" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers1.index') }}">@lang('nav.registers.additional_registers.register1')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers2.index') }}">@lang('nav.registers.additional_registers.register2')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers3.index') }}">@lang('nav.registers.additional_registers.register3')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers4.index') }}">@lang('nav.registers.additional_registers.register4')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers5.index') }}">@lang('nav.registers.additional_registers.register5')</a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers6.index') }}">@lang('nav.registers.additional_registers.register6')</a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers7.index') }}">@lang('nav.registers.additional_registers.register7')</a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('registers8.index') }}">@lang('nav.registers.additional_registers.register8')</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('departments.index') }}">@lang('nav.registers.additional_registers.departments')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('persons.index') }}">@lang('nav.registers.additional_registers.persons')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('projects.index') }}">@lang('nav.registers.additional_registers.projects')</a>
                            </li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('stores.index') }}">
                            <span class="align-middle">@lang('nav.registers.stores')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('units.index') }}">
                            <span class="align-middle">@lang('nav.registers.units')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('disch.index') }}">
                            <span class="align-middle">@lang('nav.registers.discounts')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('discountsh.index') }}">
                            <span class="align-middle">@lang('nav.registers.discounts_pos')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('vats.index') }}">
                            <span class="align-middle">@lang('nav.registers.vat')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('markups.index') }}">
                            <span class="align-middle">@lang('nav.registers.markup')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('loyalty-points.index') }}">
                            <span class="align-middle">@lang('nav.registers.loyalty_points')</span>
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('banks.index') }}">
                            <span class="align-middle">@lang('nav.registers.banks')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('currencies.index') }}">
                            <span class="align-middle">@lang('nav.registers.currencies')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('discount-coupons.index') }}">
                            <span class="align-middle">@lang('nav.registers.discount_coupons')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">
                            <span class="align-middle">@lang('nav.registers.second_price')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('templates.index') }}">
                            <span class="align-middle">@lang('nav.registers.templates')</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="sidebar-item">
                <a data-bs-target="#assets" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="paperclip"></i> <span class="align-middle">@lang('nav.assets.index')</span>
                </a>
                <ul id="assets" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.assets.index')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('asset-groups.index') }}">@lang('nav.assets.asset_groups')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.assets.asset_operations')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#resources" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">@lang('nav.resources.index')</span>
                </a>
                <ul id="resources" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('stock-operation-groups.index') }}">@lang('nav.resources.stock_op_groups')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.resources.stock_in')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.resources.stock_out')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.resources.stock_move')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('production-groups.index') }}">@lang('nav.resources.production_groups')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('productionsh.index') }}">@lang('nav.resources.production')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.resources.inventory')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.resources.stock_quant')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#purchases" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="corner-left-down"></i> <span class="align-middle">@lang('nav.purchases.index')</span>
                </a>
                <ul id="purchases" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.purchases.purchase')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.purchases.purchase_return')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#sales" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="corner-left-up"></i> <span class="align-middle">@lang('nav.sales.index')</span>
                </a>
                <ul id="sales" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('sales.index') }}">@lang('nav.sales.sale')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.sales.sale_return')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.sales.periodic_sales')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#payments" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="bi bi-tag" data-feather="dollar-sign"></i> <span class="align-middle">@lang('nav.payments.index')</span>
                </a>
                <ul id="payments" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('payment-groups.index') }}">@lang('nav.payments.payment_groups')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.payments.payments_in')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.payments.payments_out')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.payments.payment')</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.payments.bank_import')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#salaries" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="target"></i> <span class="align-middle">@lang('nav.salaries.index')</span>
                </a>
                <ul id="salaries" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('salariesh.index') }}">@lang('nav.salaries.index')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('employees.index') }}">@lang('nav.salaries.employees')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('calendars.index') }}">@lang('nav.salaries.holiday_calendar')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('work-shedule-templates.index') }}">@lang('nav.salaries.work_schedule_templates')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#ledger" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="shield"></i> <span class="align-middle">@lang('nav.ledger.index')</span>
                </a>
                <ul id="ledger" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('ledger-groups.index') }}">@lang('nav.ledger.operation_groups')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.ledger.operations')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('budgets.index') }}">@lang('nav.ledger.budget')</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#vmi" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">@lang('nav.vmi.index')</span>
                </a>
                <ul id="vmi" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.vmi.packages')</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">@lang('nav.vmi.cargo_waybills')</a></li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
