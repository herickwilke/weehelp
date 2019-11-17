<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('meus_chamado_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-ticket-alt">

                        </i>
                        <span>{{ trans('cruds.meusChamado.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('chamado_access')
                            <li class="{{ request()->is('admin/chamados') || request()->is('admin/chamados/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.chamados.index") }}">
                                    <i class="fa-fw far fa-envelope-open">

                                    </i>
                                    <span>{{ trans('cruds.chamado.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('finalizado_access')
                            <li class="{{ request()->is('admin/finalizados') || request()->is('admin/finalizados/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.finalizados.index") }}">
                                    <i class="fa-fw fas fa-check-double">

                                    </i>
                                    <span>{{ trans('cruds.finalizado.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li class="{{ request()->is('admin/time-projects') || request()->is('admin/time-projects/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-projects.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeProject.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('time_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-clock">

                        </i>
                        <span>{{ trans('cruds.timeManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('time_entry_access')
                            <li class="{{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-entries.index") }}">
                                    <i class="fa-fw fas fa-user-clock">

                                    </i>
                                    <span>{{ trans('cruds.timeEntry.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li class="{{ request()->is('admin/time-reports') || request()->is('admin/time-reports/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.timeReport.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('setor_access')
                            <li class="{{ request()->is('admin/setors') || request()->is('admin/setors/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.setors.index") }}">
                                    <i class="fa-fw fas fa-archway">

                                    </i>
                                    <span>{{ trans('cruds.setor.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('administrador_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-user-cog">

                        </i>
                        <span>{{ trans('cruds.administrador.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                            
                        @can('administrador_access')
                            <li class="{{ request()->is('admin/parametros') || request()->is('admin/parametros/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.parametros.edit", 1) }}">
                                    <i class="fa-fw fas fa-cog">

                                    </i>
                                    <span>Parâmetros</span>
                                </a>
                            </li>
                        @endcan
                        @can('status_chamado_access')
                            <li class="{{ request()->is('admin/status-chamados') || request()->is('admin/status-chamados/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.status-chamados.index") }}">
                                    <i class="fa-fw fas fa-spinner">

                                    </i>
                                    <span>{{ trans('cruds.statusChamado.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('prioridade_chamado_access')
                            <li class="{{ request()->is('admin/prioridade-chamados') || request()->is('admin/prioridade-chamados/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.prioridade-chamados.index") }}">
                                    <i class="fa-fw fas fa-stopwatch">

                                    </i>
                                    <span>{{ trans('cruds.prioridadeChamado.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_work_type_access')
                            <li class="{{ request()->is('admin/time-work-types') || request()->is('admin/time-work-types/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-work-types.index") }}">
                                    <i class="fa-fw fas fa-clipboard-list">

                                    </i>
                                    <span>{{ trans('cruds.timeWorkType.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="{{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>