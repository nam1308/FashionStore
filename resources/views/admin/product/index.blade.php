@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Product list'
    ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Products']]])
        <div id="product"></div>
    </div>
    <template id="product-template">
        <div class="ibox">
            <div class="ibox-head">
                <h4 class="ibox-title">Products list</h4>
                <input type="text" class="border border-dark rounded p-1" v-model="search"
                       placeholder="Search ..."/>
            </div>
            <div class="ibox-body">
                <a href="{{ url('admin/products/create') }}" type="button" class="my-2 btn btn-success">
                    <i class="ti-plus"></i>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="data">
                        <tr v-for="(item, index) in data" :key="item.id">
                            <td>@{{ index + 1 }}</td>
                            <td>
                                <div class="img">
                                    <img src="" href="">
                                </div>
                            </td>
                            <td>@{{ item.name }}</td>
                            <td>@{{ item.regular_price }}</td>
                            <td>@{{ item.status }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a :href="item.edit" class="btn btn-sm mr-3">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <button title="Remove" @click="handleDelete($event,item)" class="btn btn-sm mr-3">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <button title="Duplicate" @click="onDuplicate(item.id)" class="btn btn-sm">
                                        <i class="ti-layers"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center d-flex">
                        <li @click="gotoPage($event,'first')" class="page-item" :class="{disabled: page===1}">
                            <a class="page-link" href="#">First</a>
                        </li>
                        <li @click="gotoPage($event,'prev')" class="page-item" :class="{disabled: page===1}">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li v-for="i in getCountPage(page,10)" :key="i" class="page-item"
                            :class="{active: page===i}" @click="gotoNumPage">
                            <a class="page-link" href="#">@{{ i }}</a>
                        </li>
                        <li @click="gotoPage($event,'next')" class="page-item"
                            :class="{disabled: page===countPage}">
                            <a class="page-link" href="#">Next</a>
                        </li>
                        <li @click="gotoPage($event,'last')" class="page-item"
                            :class="{disabled: page===countPage}">
                            <a class="page-link" href="#">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </template>

    <style id="style">
        select.form-control {
            height: auto !important;
        }
    </style>
@stop

@push('styles')
    <link rel='stylesheet' href="{{asset('backend/vendors/toastr/toastr.min.css')}}"/>
@endpush

@push('vue')
    <script src="{{asset("backend/vendors/bootbox/bootbox.min.js")}}"></script>
    <script src="{{asset("backend/vendors/toastr/toastr.min.js")}}"></script>
@endpush

@push('vue')
    <script type="text/javascript">
        Vue.createApp({
            template: '#product-template',
            style: '#style',
            data() {
                return {
                    data: null,
                    name: '',
                    description: '',
                    parent: 0,
                    status: 1,
                    regular_price: 0,
                    image: '',
                    is_hot: 0,
                    lang: 'vi',
                    error: null,
                    search: '',
                    page: 1,
                    length: 1,
                    countPage: 0,
                    countItem: 10,
                    link: [],
                }
            },
            async mounted(){
                PLUGIN.INIT();
                await this.renderProduct();
            },
            watch: {
                search: {
                    immediate: true,
                    handler(newValue, oldValue) {
                        this.page = 1;
                        const start = (this.page - 1) * this.countItem;
                        const length = this.countItem;
                        const response = API.PRODUCT.SEARCH(newValue, start, length);
                        const that = this;
                        response.then(res => {
                            this.data = res.data.data
                            this.countPage = Math.ceil(res.data.total / that.length);
                        })
                    }
                },
                page(newValue, oldValue) {
                    const start = (newValue - 1) * this.countItem;
                    const length = this.countItem;
                    const response = API.PRODUCT.LIST(start, length);
                    response.then(res => {
                        this.data = res.data.data;
                    })
                }
            },
            methods: {
                resetData() {
                    this.data = null
                    this.name = ''
                    this.description = ''
                    this.parent = 0
                    this.status = 1
                    this.regular_price = 0
                    this.image = ''
                    this.is_hot = 0
                    this.lang = 'vi'
                },

                async renderProduct(){
                    const dataRender = await API.PRODUCT.LIST(0,10);
                    this.data = dataRender.data.data.map((item => ({...item, edit: `/admin/products/${item.id}/edit`})));
                    return this.data;
                },

                async handleDelete(e, item) {
                    try {
                        const isConf = confirm(`Do you delete blog ${item.name}?`);
                        isConf && await API.PRODUCT.DELETE(item.id);
                        await this.renderProduct()
                    } catch (e) {
                        MESSAGE.ERROR(e.message)
                    }
                },

                onDuplicate: (productId) => {
                    window.location.replace(`/admin/products/${productId}/duplicate`);
                },

                gotoPage(e, action) {
                    //handle next and previous page
                    switch (action) {
                        case 'prev':
                            if (this.page === 1) {
                                return;
                            }
                            this.page--;
                            break;
                        case 'next':
                            if (this.page === this.countPage) {
                                return;
                            }
                            this.page++;
                            break;
                        case 'first':
                            if (this.page === 1) {
                                return;
                            }
                            this.page = 1;
                            break;
                        case 'last':
                            if (this.page === Math.floor(this.countPage / this.countItem) + 1) {
                                return;
                            }
                            this.page = Math.floor(this.countPage / this.countItem) + 1;
                            break;
                        default:
                            break;
                    }
                },
                gotoNumPage(e) {
                    this.page = parseInt(e.target.textContent);
                },
                getCountPage(currentPage, x) {
                    if (this.countPage === 0) {
                        return 1;
                    }
                    if (this.countPage % x === 0) {
                        return this.countPage / x;
                    }
                    if (this.countPage % x !== 0) {
                        return Math.floor(this.countPage / x) + 1;
                    }
                },
            }
        }).mount('#product')
    </script>
@endpush
