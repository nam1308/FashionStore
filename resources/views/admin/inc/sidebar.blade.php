<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

$menus = Config::get('menu.admin');
?>

<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('backend/img/admin-avatar.png')}}" width="45px"/>
            </div>
            <div class="admin-info">
                <div class="font-strong">Admin</div>
                <small>supper admin</small></div>
        </div>
        <ul class="side-menu metismenu">
            @if(!empty($menus))
                @foreach($menus as $menu)
                    @if(Arr::get($menu, 'label'))
                        <li class="heading">{{Arr::get($menu, 'name')}}</li>
                    @else
                        @if(!empty(Arr::get($menu, 'items')))
                            <li>
                                <a href="javascript:;"><i class="sidebar-item-icon fa {{Arr::get($menu, 'icon')}}"></i>
                                    <span class="nav-label">{{Arr::get($menu, 'name')}}</span><i
                                        class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-2-level collapse">
                                    @foreach($menu['items'] as $item)
                                        <li>
                                            <a href="/admin{{Arr::get($item, 'link')}}">{{Arr::get($item, 'name')}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a class="active" href="/admin{{Arr::get($menu, 'link')}}">
                                    <i class="sidebar-item-icon fa {{Arr::get($menu, 'icon')}}"></i>
                                    <span class="nav-label">{{Arr::get($menu, 'name')}}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach

            @endif

        </ul>
    </div>
</nav>
