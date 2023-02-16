@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Blog list'
    ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'All Blog']]])
        <div id="blog"></div>
    </div>
    <template id="blog-template">
        <div class="row">
            <div class="col">
                <div class="ibox">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Blog list</h4>
                        <input type="text" class="border border-dark rounded p-1" v-model="search"
                               placeholder="Search ..."/>
                    </div>
                    <div class="ibox-body">
                        <a href="{{ url('admin/blog/create') }}" type="button" class="my-2 btn btn-success">
                            <i class="ti-plus"></i>
                        </a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="100">Action</th>
                            </tr>
                            </thead>
                            <tbody v-if="data">
                            <tr v-for="(item,index) in data" :key="item.id">
                                <td>@{{ index + 1 }}</td>
                                <td>@{{ item.name }}</td>
                                <td>@{{ item.slug }}</td>
                                <td>@{{ item.status }}</td>
                                <td>@{{ item.create_at }}</td>
                                <td class="d-flex justify-content-around">
                                    <a :href="item.edit" class="btn btn-sm mr-3">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <button @click="handleDelete($event,item)" class="btn btn-sm mr-3">
                                        <i class="ti-trash"></i>
                                    </button>
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
            template: "#blog-template",
            style: '#style',
            data() {
                return {
                    data: null,
                    name: '',
                    slug: '',
                    excerpt: '',
                    image: '',
                    content: '',
                    sort_order: 1,
                    status: 1,
                    parent: null,
                    is_popular: 0,
                    author: '',
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
            async mounted() {
                PLUGIN.INIT();
                const that = this
                $('#exampleModal').on('hidden.bs.modal', function (e) {
                    that.resetData();
                });
                await this.rederBlog();
            },
            watch: {
                search: {
                    immediate: true,
                    handler(newValue, oldValue) {
                        this.page = 1;
                        const start = (this.page - 1) * this.countItem;
                        const length = this.countItem;
                        const response = API.BLOG.SEARCH(newValue, start, length);
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
                    const response = API.BLOG.INDEX(start, length);
                    response.then(res => {
                        this.data = res.data.data;
                    })
                }
            },
            methods: {
                resetData() {
                    this.data = null
                    this.name = ''
                    this.slug = ''
                    this.excerpt = ''
                    this.image = ''
                    this.content = ''
                    this.sort_order = 1
                    this.status = 1
                    this.parent = null
                    this.is_popular = 0
                    this.author = ''
                },
                async rederBlog() {
                    const dataRender = await API.BLOG.INDEX(0, 10);
                    this.data = dataRender.data.data.map((item => ({...item, edit: `/admin/blog/${item.id}/edit`})));
                    return this.data;
                },
                async handleDelete(e, item) {
                    try {
                        const isConf = confirm(`Do you delete blog ${item.name}?`);
                        isConf && await API.BLOG.DELETE(item.id);
                        await this.rederBlog()
                    } catch (e) {
                        MESSAGE.ERROR(e.message)
                    }
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
        }).mount('#blog');
    </script>
@endpush
