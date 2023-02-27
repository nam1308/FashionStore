@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Testimonial'
    ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Testimonial']]])
        <div id="testimonial"></div>
    </div>

    <template id="testimonial-template">
        <div class="row">
            <div class="col-4">
                <div class="ibox pt-4 pb-4 pl-2 pr-2">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Add Testimonials</h4>
                    </div>
                    <div class="ibox-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input v-model="testimonials.title" class="form-control" :class="{border: testimonials.error?.title,'border-danger': testimonials.error?.title}">
                            <p v-if="testimonials.error?.title" class="text-danger">
                                @{{  testimonials.error.title.join(' ') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Sub Title</label>
                            <input v-model="testimonials.sub_title" class="form-control" :class="{border: testimonials.error?.sub_title,'border-danger': testimonials.error?.sub_title}">
                            <p v-if="testimonials.error?.sub_title" class="text-danger">
                                @{{  testimonials.error.sub_title.join(' ') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea v-model="testimonials.content" class="form-control"> </textarea>
                            <p v-if="testimonials.error?.content" class="text-danger">
                                @{{  testimonials.error.content.join(' ') }}
                            </p>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Avatar</label>--}}
{{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Lang</label>
                            <select v-model="testimonials.lang" class="form-control">
                                <option value="vi" selected>VI</option>
                                <option value="en">EN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input v-model="testimonials.sort_order" type="number" min="1" class="form-control">
                        </div>
                    </div>
                    <div class="footer d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-4" style="margin-bottom: 18px;" @click.prevent="handleSubmit">Save</button>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="ibox pt-4 pb-4 pl-2 pr-2">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Testimonials list</h4>
                        <div class="d-flex align-center justify-content-end">
                            <select v-model="testimonials.lang" class="form-control">
                                <option value="vi" selected>Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                            <input type="text" class="border border-dark rounded p-1 ml-3" v-model="search" placeholder="Search ..."/>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Avatar</th>
                                <th>Sub Title</th>
                                <th>Content</th>
                                <th width="100" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody v-if="data">
                            <tr v-for="(item, index) in data" :key="item.id">
                                <td>@{{ item.title }}</td>
                                <td>
                                    <div class="img">
                                        <img src="" href="">
                                    </div>
                                </td>
                                <td>@{{ item.sub_title }}</td>
                                <td>@{{ item.content }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button @click="getTestimonial" :data-id="item.id" type="button" data-target="#exampleModal" data-toggle="modal" class="btn btn-sm mr-3">
                                            <i class="ti-pencil"></i>
                                        </button>
                                        <button title="Remove" @click="handleDelete($event,item)" class="btn btn-sm">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end d-flex">
                                <li @click="gotoPage($event,'prev')" class="page-item" :class="{disabled: page===1}">
                                    <a class="page-link" href="#">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li v-for="i in getCountPage(page,7)" :key="i" class="page-item"
                                    :class="{active: page===i}" @click="gotoNumPage">
                                    <a class="page-link" href="#">@{{ i }}</a>
                                </li>
                                <li @click="gotoPage($event,'next')" class="page-item"
                                    :class="{disabled: page===getCountPage(page,7)}">
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Testimonials</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input v-model="testimonialsEdit.title" class="form-control" :class="{border: testimonialsEdit.error?.title,'border-danger': testimonialsEdit.error?.title}">
                                <p v-if="testimonialsEdit.error?.title" class="text-danger">
                                    @{{testimonialsEdit.error.title.join(' ')}}
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input v-model="testimonialsEdit.sub_title" class="form-control" :class="{border: testimonialsEdit.error?.sub_title,'border-danger': testimonialsEdit.error?.sub_title}">
                                <p v-if="testimonialsEdit.error?.sub_title" class="text-danger">
                                    @{{testimonialsEdit.error.sub_title.join(' ')}}
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea v-model="testimonialsEdit.content" class="form-control"> </textarea>
                                <p v-if="testimonialsEdit.error?.content" class="text-danger">
                                    @{{testimonialsEdit.error.content.join(' ')}}
                                </p>
                            </div>
                            {{--                        <div class="form-group">--}}
                            {{--                            <label>Avatar</label>--}}
                            {{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
                            {{--                        </div>--}}
                            <div class="form-group">
                                <label>Lang</label>
                                <select v-model="testimonialsEdit.lang" class="form-control">
                                    <option value="vi" selected>VI</option>
                                    <option value="en">EN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sort Order</label>
                                <input v-model="testimonialsEdit.sort_order" type="number" min="1" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click.prevent="handleUpdate">Save changes</button>
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
            template: '#testimonial-template',
            style: '#style',
            data() {
                return {
                    data: null,
                    testimonials: {
                        title: '',
                        sub_title: '',
                        content: '',
                        avatar: '',
                        lang: 'vi',
                        sort_order: null,
                        error: null,
                    },
                    search: '',
                    page: 1,
                    length: 1,
                    countPage: 0,
                    countItem: 7,
                    testimonialsEdit:{
                        id: null,
                        title: '',
                        sub_title: '',
                        content: '',
                        avatar: '',
                        lang: 'vi',
                        sort_order: null,
                        error: null,
                    },
                }
            },
            async mounted(){
                PLUGIN.INIT();
                const that = this
                $('#exampleModal').on('hidden.bs.modal',function (e) {
                    // that.resetData();
                })
                await this.renderTestimonial();
            },
            watch: {
                search: {
                    immediate: true,
                    handler(newValue, oldValue) {
                        this.page = 1;
                        const start = (this.page - 1) * this.countItem;
                        const length = this.countItem;
                        const response = API.TESTIMONIAL.SEARCH(newValue, start, length);
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
                    const response = API.TESTIMONIAL.LIST(start, length);
                    response.then(res => {
                        this.data = res.data.data;
                    })
                }
            },
            methods: {
                resetData() {
                    this.data = null
                    this.testimonials = {
                        title: '',
                        sub_title : '',
                        content : '',
                        avatar : '',
                        lang : 'vi',
                        sort_order : null,
                    }
                    this.testimonialsEdit = {
                        id: null,
                        title: '',
                        sub_title: '',
                        content: '',
                        avatar: '',
                        lang: 'vi',
                        sort_order: null,
                        error: null,
                    }
                },

                async renderTestimonial(){
                    const dataRender = await API.TESTIMONIAL.LIST(0,7);
                    this.data = dataRender.data.data;
                    this.countPage = dataRender.data.total;
                    return this.data;
                },

                async handleSubmit(){
                    try {
                        await API.TESTIMONIAL.CREATE(this.testimonials);
                        MESSAGE.SUCCESS('Create products success');
                        this.resetData();
                        this.renderTestimonial();
                    } catch (e) {
                        this.testimonials.error = e.response.data;
                    }
                },

                async getTestimonial(e){
                    const id = e.target.closest('button').dataset.id;
                    const respone = await API.TESTIMONIAL.SHOW(id);
                    this.testimonialsEdit = respone.data;
                    console.log(this.testimonialsEdit);
                },

                async handleUpdate(){
                    try {
                        await API.TESTIMONIAL.UPDATE(this.testimonialsEdit.id,this.testimonialsEdit);
                        $('#exampleModal').modal('hide');
                        MESSAGE.SUCCESS('Update testimonial success');
                        this.resetData();
                        this.renderTestimonial();
                    } catch (e) {
                        this.testimonialsEdit.error = e.response.data;
                    }
                },

                async handleDelete(e, item) {
                    try {
                        const isConf = confirm(`Do you delete blog ${item.name}?`);
                        isConf && await API.TESTIMONIAL.DELETE(item.id);
                        await this.renderTestimonial()
                    } catch (e) {
                        MESSAGE.ERROR(e.message)
                    }
                },

                gotoPage(e, action) {
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
        }).mount('#testimonial')
    </script>
@endpush
