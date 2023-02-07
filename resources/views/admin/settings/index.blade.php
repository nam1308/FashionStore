@extends('admin.layouts.main')

@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Setting' ])
@stop

@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Settings']]])
        <div id="settings"></div>
    </div>
    <template id='template'>
        <div class="row">
            <div class="col-4">
                <div class="menu">
                    <div class="menu-header">
                        <h5 class="menu-title">Add Menu</h5>
                        <custom-button class-custom="btn btn-light">
                            Save menu
                        </custom-button>
                    </div>
                    <div class="menu-body">
                        <ul id="metismenu">
                            <li class="menu-item">
                                <a href="#">
                                    <i class="arrow ti-angle-right"></i>
                                    Trang tĩnh
                                </a>
                                <ul class="sub-menu">
                                    <li :key="item.id" v-for="item in staticPage" class="form-check group-checkbox">
                                        <input type="checkbox" value="" :id="item.id">
                                        <label class="form-check-label" :for="item.id">
                                            @{{item.label}}
                                        </label>
                                    </li>
                                    <li>
                                        <custom-button :handle="handleAddMenu" class-custom="btn btn-sm btn-primary">
                                            Add to menu
                                        </custom-button>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="#">
                                    <i class="arrow ti-angle-right"></i>
                                    Danh mục bài viết
                                </a>
                                <ul class="sub-menu">
                                    ...
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="#">
                                    <i class="arrow ti-angle-right"></i>
                                    Danh mục sản phẩm
                                </a>
                                <ul class="sub-menu">
                                    ...
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="#">
                                    <i class="arrow ti-angle-right"></i>
                                    Custom link
                                </a>
                                <ul class="sub-menu">
                                    <li class="wrap-custom">
                                        <div class="form-group">
                                            <label for="label">Label</label>
                                            <input type="text" class="form-control" id="label">
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="url" class="form-control" id="url" placeholder="http(s)://">
                                        </div>
                                        <custom-button :handle="handleAddMenu" class-custom="btn btn-sm btn-primary">
                                            Add to menu
                                        </custom-button>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="menu-detail">
                    <div class="menu-header">
                        <h5 class="menu-title">Add Menu</h5>
                        <custom-button :handle="handleSaveMenu" class-custom="btn btn-primary">
                            Save menu
                        </custom-button>
                    </div>
                    <div class="menu-body">
                        <div class="dd">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle">Item 1</div>
                                </li>
                                <li class="dd-item" data-id="2">
                                    <div class="dd-handle">Item 2</div>
                                </li>
                                <li class="dd-item" data-id="3">
                                    <div class="dd-handle">Item 3</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">Item 4</div>
                                        </li>
                                        <li class="dd-item" data-id="5">
                                            <div class="dd-handle">Item 5</div>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <style id="style" scoped>
        .menu{
            background-color: #fff;
        }

        .menu-header{
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #cacaca;
        }

        .menu-header .menu-title{
            margin: 0;
        }

        .menu-body{
            margin-top: 12px;
            padding: 12px;
        }

        #metismenu{
            list-style: none;
            padding: 0;
            border: 1px solid #cacaca;
            border-bottom: none;
        }

        #metismenu a{
            display: block;
            color: black;
            padding: 16px;
            border-bottom: 1px solid #cacaca;
        }

        #metismenu a:hover, #metismenue a:focus{
            color: black;
        }

        #metismenu .arrow{
            display: inline-block;
            transition: all 0.2s ease;
            margin-right: 8px;
        }

        #metismenu .active .arrow{
            transform: rotate(90deg);
        }

        .sub-menu:first-child {
            margin-top: ;
        }

        .group-checkbox:first-child{
            margin-top: 0.5rem;
        }

        .sub-menu{
            border-bottom: 1px solid #cacaca;
            list-style: none;
            padding-left: 0;
        }

        .sub-menu li{
           padding: 6px 12px 6px 24px;
        }

        .menu-detail{
            background-color: #fff;
        }

        .menu-detail .menu-body{
            padding-left: 24px;
        }

        /* clearfix */

        .menu-detail .menu-body::after{
            content: "";
            display: block;
            clear: both;
        }
    </style>
@stop

@push('styles')
    <link rel="stylesheet" href="{{asset('css/nested.css')}}"></link>
@endpush

@push('vue')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js" integrity="sha512-a3kqAaSAbp2ymx5/Kt3+GL+lnJ8lFrh2ax/norvlahyx59Ru/1dOwN1s9pbWEz1fRHbOd/gba80hkXxKPNe6fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('vue')
    <script>
        const STATIC_PAGE = [
            {
                label: 'Trang tĩnh',
                id: 'static-page',
                value: '/'
            },
            {
                label: 'Liên hệ',
                id: 'contact',
                value: '/lien-he'
            },
            {
                label: 'Giỏ hàng',
                id: 'cart',
                value: '/gio-hang'
            },
            {
                label: 'Đăng ký',
                id: 'sign-up',
                value: '/lien-he'
            },
            {
                label: 'Đăng nhập',
                id: 'login',
                value: '/dang-nhap'
            }
        ]

        const CustomButton = {
            template: `<button @click="handle" :class="classCustom"><slot/></button>`,
            props: {
                handle: Function,
                classCustom: String
            },
        }

        const app = Vue.createApp({
            data(){
                return {
                    list: [],
                    staticPage: STATIC_PAGE
                }
            },
            methods: {
                handleAddMenu(){
                    console.log('added to menu!');
                },
                handleSaveMenu(){
                    console.log('saved!');
                }
            },
            template: '#template',
            mounted(){
                $("#metismenu").metisMenu();
                $('.dd').nestable({
                    maxDepth: 3
                })
            },
            components:{
                CustomButton
            }
        })
        app.mount('#settings')
    </script>
@endpush