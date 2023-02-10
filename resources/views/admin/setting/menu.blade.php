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
                            Create menu
                        </custom-button>
                    </div>
                    <div class="menu-body">
                        <ul class="static-page" id="metismenu">
                            <li class="menu-item">
                                <a href="#">
                                    <i class="arrow ti-angle-right"></i>
                                    Trang tĩnh
                                </a>
                                <ul class="sub-menu">
                                    <li :key="item.id" v-for="item in staticPage" class="form-check group-checkbox">
                                        <input type="checkbox" :data-name="item.label" :value="item.value"
                                               :id="item.id">
                                        <label class="form-check-label" :for="item.id">
                                            @{{item.label}}
                                        </label>
                                    </li>
                                    <li>
                                        {{-- custom button --}}
                                        <custom-button :handle="handleAddMenu" type="static-page"
                                                       class-custom="btn btn-sm btn-primary">
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
                                    <div class="product-category">
                                        {{-- custom select input --}}
                                        <custom-select url='{{route('product-category.search')}}'></custom-select>
                                        {{-- custom button --}}
                                        <custom-button
                                            :handle="handleAddMenu"
                                            type="product-category"
                                            class="btn btn-sm btn-primary mt-3"
                                        >Add to menu
                                        </custom-button>
                                    </div>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="#">
                                    <i class="arrow ti-angle-right"></i>
                                    Custom link
                                </a>
                                <ul class="sub-menu">
                                    <form id="custom-form">
                                        <li class="wrap-custom">
                                            <div class="form-group">
                                                <label for="label">Label <span class="text-danger">(*)</span></label>
                                                <input type="text"
                                                       data-rule-required="true"
                                                       v-model="customLink.label"
                                                       name="label" class="form-control" id="label">
                                            </div>
                                            <div class="form-group">
                                                <label for="url">URL<span class="text-danger">(*)</span></label>
                                                <input type="url" data-rule-required="true"
                                                       name="url"
                                                       v-model="customLink.url"
                                                       class="form-control" id="url" placeholder="http(s)://">
                                            </div>
                                            <p>Field <span class="text-danger">(*)</span> is require</p>
                                            {{-- custom button --}}
                                            <custom-button :handle="handleAddMenu" type='custom-link'
                                                           class-custom="btn btn-sm btn-primary">
                                                Add to menu
                                            </custom-button>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="menu-detail">
                    <div class="menu-header">
                        <h5 class="menu-title">Menu</h5>
                        <custom-button :handle="handleSaveMenu" class-custom="btn btn-primary">
                            Save menu
                        </custom-button>
                    </div>
                    <div class="menu-body">
                        <div class="dd">
                            {{-- component menu recursion --}}
                            <custom-menu v-if="list.length" :data="list"></custom-menu>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <template id="template-menu">
        <ol class="dd-list metisMenu">
            <li :key="item.id" v-for="item in data" class="dd-item dd3-item menu-item"
                :data-name="item.name"
                :data-url="item.url"
                :data-id="item.id">
                <div class="dd-handle dd3-handle"></div>
                <a href="#" class="dd3-content content-row">
                    @{{item.name}}
                    <custom-button class="btn btn-sm btn-danger ti-trash" :handle="handleRemove"></custom-button>
                </a>
                <ul class="sub-menu">
                    <li class="form-group sub-menu-item">
                        <label for="@{{'name' + item.id}}">Tên hiển thị</label>
                        <input type="text" id="@{{'name' + item.id}}"
                               v-model="item.name" class="form-control form-control-sm">
                    </li>
                    <li class="form-group sub-menu-item">
                        <label for="@{{'url' + item.id}}">Đường dẫn</label>
                        <input type="text" v-model="item.url"
                               class="form-control form-control-sm" id="@{{'url' + item.id}}" placeholder="http(s)://">
                    </li>
                </ul>
                <custom-menu v-if="item?.children" :data="item.children"></custom-menu>
            </li>
        </ol>
    </template>

    <template id="template-select">
        <select class="product-category__list">
        </select>
    </template>

    <style id="style" scoped>
        ul {
            list-style: none;
        }

        .menu {
            background-color: #fff;
        }

        .menu-header {
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #cacaca;
        }

        .menu-header .menu-title {
            margin: 0;
        }

        .menu-body {
            margin-top: 12px;
            padding: 12px;
        }

        #metismenu {
            list-style: none;
            padding: 0;
            border: 1px solid #cacaca;
            border-bottom: none;
        }

        #metismenu a {
            display: block;
            color: black;
            padding: 16px;
            border-bottom: 1px solid #cacaca;
        }

        #metismenu a:hover, #metismenue a:focus {
            color: black;
            background-color: #eaeaea;
        }

        #metismenu .arrow {
            display: inline-block;
            transition: all 0.2s ease;
            margin-right: 8px;
        }

        #metismenu .active .arrow {
            transform: rotate(90deg);
        }

        #metismenu .sub-menu:first-child {
            margin-top: ;
        }

        #metismenu .group-checkbox:first-child {
            margin-top: 0.5rem;
        }

        #metismenu .sub-menu {
            border-bottom: 1px solid #cacaca;
            list-style: none;
            padding-left: 0;
        }

        #metismenu .sub-menu li {
            padding: 6px 12px 6px 24px;
        }

        .menu-detail {
            background-color: #fff;
        }

        .menu-detail .menu-body {
            padding-left: 24px;
        }

        /* clearfix */

        .menu-detail .menu-body::after {
            content: "";
            display: block;
            clear: both;
        }

        .dd3-content.content-row {
            cursor: pointer;
        }

        .dd3-content.content-row button {
            float: right;
        }

        .dd3-content.content-row i:hover {
            transform: scale(1.2);
        }

        .metisMenu .sub-menu {
            border: 1px solid #cacaca;
            padding-right: 16px;
        }

        .metisMenu .sub-menu-item:first-child {
            margin-top: 8px;
        }

        /* css error */
        .form-control.error {
            border: 1px solid red
        }

        label.error {
            color: red;
        }

        .product-category {
            padding: 16px;
        }

    </style>
@stop

@push('styles')
    <link rel="stylesheet" href="{{asset('css/nested.css')}}"></link>
@endpush

@push('vue')
    <script src="{{asset('backend/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"
            integrity="sha512-a3kqAaSAbp2ymx5/Kt3+GL+lnJ8lFrh2ax/norvlahyx59Ru/1dOwN1s9pbWEz1fRHbOd/gba80hkXxKPNe6fg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('vue')
    <script>
        const ELEMENT = {
            MENU_ITEM: $('.dd-list.metisMenu')
        }
        const table = new Map()

        const STATIC_PAGE = [
            {
                label: 'Trang chủ',
                id: 'home',
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
                value: '/dang-ky'
            },
            {
                label: 'Đăng nhập',
                id: 'login',
                value: '/dang-nhap'
            }
        ]

        const CustomButton = {
            template: `
                <button @click="handle($event,type)" :class="classCustom">
                <slot/>
                </button>`,
            props: {
                handle: Function,
                classCustom: String,
                type: String
            },
        }

        const CustomMenu = {
            name: 'CustomMenu',
            template: '#template-menu',
            props: {
                data: Object
            },
            methods: {
                handleRemove(e) {
                    console.log(e);
                    e.stopPropagation();
                    //select button expand and collapse
                    const container = e.target.closest('.dd-list')
                    e.target.closest('li.dd-item').remove();
                    if (!container.children.length) {
                        const containerBtn = container.parentNode
                        const btnControls = containerBtn.querySelectorAll(':scope > button[data-action]');
                        btnControls.forEach(item => item.remove());
                    }
                    // delete elem form map
                    table.delete(e.target.closest('li.dd-item').dataset.id)
                }
            },
            components: {
                CustomButton
            }
        }

        const CustomSelect = {
            name: 'CustomSelect',
            props: {
                url: String,
            },
            template: '#template-select',
            mounted() {
                const that = this
                $('.product-category__list').select2({
                    placeholder: 'Danh mục sản phẩm',
                    allowClear: true,
                    width: '100%',
                    ajax: {
                        url: that.url,
                        headers: {
                            "Authorization": "Bearer " + localStorage.getItem("token"),
                            "Content-Type": "application/json",
                        },
                        delay: 500,
                        data: function (params) {
                            return {
                                search: params.term,
                            }
                        },
                        processResults: function (res) {
                            const items = res.data.slice(0, 6).map(item => {
                                return {
                                    id: item.slug,
                                    text: item.name,
                                }
                            })
                            return {
                                results: items
                            }
                        }
                    },
                });
            }
        }
        let person = {
            name: 'Thang',
            age: 24
        }
        person.address = '123123123';
        console.log("Person", person);
        person = {...person, name: 'DADADA'}

        /**
         * API.GET().then().error ....
         *
         * try{
         *
         * }catch(e){
         *
         * }
         * const response = await API...
         * const api2 = await API...
         * then then then
         */

        const app = Vue.createApp({
            data() {
                return {
                    list: [],
                    customLink: {
                        label: '',
                        url: ''
                    },
                    staticPage: STATIC_PAGE
                }
            },
            methods: {
                handleAddMenu(e, type) {
                    const that = this
                    e.preventDefault();
                    switch (type) {
                        case 'static-page':
                            const checkedPages = [...document.querySelectorAll('.static-page input[type="checkbox"]')]
                            checkedPages.forEach((item, index) => {
                                if (item.checked && !table.has(`static-page-${index}`)) {
                                    that.list.push({
                                        id: `static-page-${index}`,
                                        name: item.dataset.name,
                                        url: item.value
                                    })
                                    table.set(`static-page-${index}`, true)
                                }
                            })
                            break;
                        case 'custom-link':
                            $('#custom-form').validate()
                            this.list.push({
                                id: `custom-link-${Date.now()}`,
                                name: that.customLink.label,
                                url: that.customLink.url
                            })
                            break;
                        case 'product-category':
                            const curentSelect = $('.product-category__list').find(':selected');
                            if (!table.has(curentSelect.val())) {
                                this.list.push({
                                    id: `product-category-${curentSelect.val()}`,
                                    name: curentSelect.text(),
                                    url: 'danh-muc/' + curentSelect.val()
                                })
                                table.set(curentSelect.val(), true)
                            }
                            break;
                        default:
                            break;
                    }
                },
                handleSaveMenu() {
                    const data = {
                        key: 'menu-header',
                        value: $('.dd').nestable('serialize')
                    };
                    API.SETTING.SAVE(data).then(
                        (res) => toastr.success(res.data.mess),
                        (res) => toastr.error(res.data.mess)
                    )
                },
                async getMenu() {
                    const response = await API.SETTING.SHOW({key: 'menu-header'});
                    this.list = response.data.value
                }
            },
            template: '#template',
            mounted() {
                this.getMenu();
                $("#metismenu").metisMenu();
                $('.dd').nestable({
                    maxDepth: 3,
                })
            },
            updated() {
                console.log('updated');
                ELEMENT.MENU_ITEM.metisMenu();
                ELEMENT.MENU_ITEM.metisMenu('dispose');
                ELEMENT.MENU_ITEM.metisMenu();
            },
            components: {
                CustomButton,
                CustomMenu,
                CustomSelect
            }
        })
        app.mount('#settings')
    </script>
@endpush
