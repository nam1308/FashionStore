@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Banner'
    ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Banner']]])
        <div id="banner"></div>
    </div>

    <template id="banner-template">
        <div class="row">
            <div class="col-12">
                <div class="ibox pt-4 pb-4 pl-2 pr-2">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Banner list</h4>
                        <div class="d-flex">
                            <input type="text" class="border border-dark rounded p-1 ml-3" v-model="search" placeholder="Search ..."/>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <button
                            @click="showCreate"
                            type="button"
                            data-target="#exampleModal"
                            data-toggle="modal"
                            class="btn btn-sm btn-success"
                        >
                            <i class="ti-plus"></i>
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Title</th>
                                    <th>Avatar</th>
                                    <th>Status</th>
                                    <th width="100" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="data">
                                <tr v-for="(item, index) in data" :key="item.id">
                                    <td>@{{ index }}</td>
                                    <td>@{{ item.title }}</td>
                                    <td>
                                        <div class="img">
                                            <img src="" href="">
                                        </div>
                                    </td>
                                    <td>@{{ item.status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button
                                                @click="showEdit"
                                                :data-id="item.id"
                                                type="button"
                                                data-target="#exampleModal"
                                                data-toggle="modal"
                                                class="btn btn-sm mr-3"
                                            >
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <button
                                                @click="handleDelete($event,item)"
                                                class="btn btn-sm"
                                            >
                                                <i class="ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end d-flex">
                                <li @click="gotoPage($event,'prev')"
                                    class="page-item"
                                    :class="{disabled: page===1}"
                                >
                                    <a class="page-link" href="#">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li v-for="i in getCountPage(page,7)"
                                    :key="i"
                                    class="page-item"
                                    :class="{active: page===i}"
                                    @click="gotoNumPage"
                                >
                                    <a class="page-link" href="#">@{{ i }}</a>
                                </li>
                                <li @click="gotoPage($event,'next')"
                                    class="page-item"
                                    :class="{disabled: page===getCountPage(page,7)}"
                                >
                                    <a class="page-link" href="#">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <Teleport to="body">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                @{{ titleModel }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input v-model="banner.title" class="form-control" :class="{border: banner.error?.title,'border-danger': banner.error?.title}">
                                <p v-if="banner.error?.title" class="text-danger">
                                    @{{  banner.error.title.join(' ') }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input v-model="banner.sub_title" class="form-control" :class="{border: banner.error?.sub_title,'border-danger': banner.error?.sub_title}">
                                <p v-if="banner.error?.sub_title" class="text-danger">
                                    @{{  banner.error.sub_title.join(' ') }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Href</label>
                                <input v-model="banner.href" class="form-control" :class="{border: banner.error?.href,'border-danger': banner.error?.href}">
                                <p v-if="banner.error?.href" class="text-danger">
                                    @{{  banner.error.href.join(' ') }}
                                </p>
                            </div>
                            {{--                        <div class="form-group">--}}
                            {{--                            <label>Image</label>--}}
                            {{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
                            {{--                        </div>--}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Sort Order</label>
                                        <input v-model="banner.sort_order" type="number" min="1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select v-model="banner.status" class="form-control">
                                            <option value="0" selected>Hidden</option>
                                            <option value="1">Visible</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Lang</label>
                                        <select v-model="banner.lang" class="form-control">
                                            <option value="vi" selected>VI</option>
                                            <option value="en">EN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="id-banner" ref='id'>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click.prevent="handleSubmit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </Teleport>
    </template>

    <style id="style">
        select.form-control {
            height: auto !important;
        }
        .modal-dialog{ max-width: 800px;}
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
            template: '#banner-template',
            style: '#style',
            data() {
                return {
                    data: null,
                    banner: {
                        title: '',
                        sub_title: '',
                        href: '',
                        image: '/medias/1675648139.jpg',
                        sort_order: null,
                        status: 0,
                        lang: 'vi',
                        error: null,
                    },
                    search: '',
                    page: 1,
                    length: 1,
                    countPage: 0,
                    countItem: 7,
                    titleModel: '',
                }
            },
            async mounted(){
                PLUGIN.INIT();
                await this.renderBanner();
            },
            watch: {
                search: {
                    immediate: true,
                    handler(newValue, oldValue) {
                        this.page = 1;
                        const start = (this.page - 1) * this.countItem;
                        const length = this.countItem;
                        const response = API.BANNER.SEARCH(newValue, start, length);
                        const that = this;
                        response.then(res => {
                            this.data = res.data.data;
                            this.countPage = Math.ceil(res.data.total / that.length);
                        })
                    }
                },
                page(newValue, oldValue) {
                    const start = (newValue - 1) * this.countItem;
                    const length = this.countItem;
                    const response = API.BANNER.LIST(start, length);
                    response.then(res => {
                        this.data = res.data.data;
                    })
                }
            },
            methods: {
                resetData(){
                    this.data = null
                    this.banner = {
                        title: '',
                        sub_title: '',
                        href: '',
                        image: '/medias/1675648139.jpg',
                        sort_order: null,
                        status: 0,
                        lang: 'vi',
                        error: null,
                    }
                },

                async renderBanner(){
                    const dataRender = await API.BANNER.LIST(0,7);
                    this.data = dataRender.data.data;
                    this.countPage = dataRender.data.total;
                    return this.data;
                },

                async handleSubmit(){
                    const id = parseInt(this.$refs.id.value);
                    try {
                        if(id){
                            await API.BANNER.UPDATE(id,this.banner);
                            $('#exampleModal').modal('hide');
                            MESSAGE.SUCCESS('Update banner success');
                        }else{
                            await API.BANNER.CREATE(this.banner);
                            $('#exampleModal').modal('hide');
                            MESSAGE.SUCCESS('Create banner success');
                        }
                        this.resetData();
                        await this.renderBanner();
                    }catch (e){
                        this.banner.error = e.response.data;
                    }
                },

                async showEdit(e){
                    const id = e.target.closest('button').dataset.id;
                    this.$refs.id.value = id;
                    this.error = null;
                    const response = await API.BANNER.SHOW(id);
                    this.banner = response.data;
                    this.titleModel = "Update " + this.banner.title;
                },

                showCreate(){
                    this.titleModel = "Create Banner";
                    this.$refs.id.value = 0;
                },

                async handleDelete(e, item){
                    try {
                        const isConf = confirm(`Do you delete blog ${item.title} ?`);
                        isConf && await API.BANNER.DELETE(item.id);
                        await this.renderBanner();
                    } catch (e) {
                        MESSAGE.ERROR(e.message)
                    }
                },

                gotoPage(e, action) {
                    switch (action) {
                        case 'prev':
                            if (this.page === 1) {
                                return false;
                            }
                            this.page--;
                            break;
                        case 'next':
                            if (this.page === this.getCountPage(this.page,7)) {
                                return false;
                            }
                            this.page++;
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
            },
        }).mount('#banner');
    </script>
@endpush
