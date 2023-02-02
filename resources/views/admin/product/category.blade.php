@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Products' ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Product', 'link' => '/products'],['label' => 'Categories']]])
        <div id="categories"></div>
    </div>
    <template id="category-template">
        <div class="row">
            <div class="col">
                <div class="ibox">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Categories list</h4>
                        <input type="text" class="border border-dark rounded p-1" v-model="search" placeholder="Search">
                    </div>
                    <div class="ibox-body">
                        <button @click="showCreate" type="button" class="my-2 btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="ti-plus"></i>
                        </button>
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
                            <tbody v-if="data && data.length">
                                <tr v-for="item,index in data" :key="item.id">
                                    <td>@{{index + 1}}</td>
                                    <td>@{{item.name}}</td>
                                    <td>@{{item.slug}}</td>
                                    <td>@{{item.show_home ? 'Show' : 'Hide'}}</td>
                                    <td>@verbatim
                                        {{new Date(item.created_at).toLocaleDateString('vi-VN',{month: '2-digit',day: '2-digit',year: 'numeric'})}}
                                    @endverbatim</td>
                                    <td class="d-flex justify-content-around ">
                                        <button @click="getCategory" :data-id="item.id" type="button" data-target="#exampleModal" data-toggle="modal" class="btn btn-sm mr-3"><i class="ti-pencil"></i></button>
                                        <button @click="handleDelete($event,item)" class="btn btn-sm mr-3"><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                              <li 
                              @click="gotoPage($event,'first')"
                              class="page-item" 
                              :class="{disabled: page===1}"><a class="page-link" href="#">First</a></li>
                              <li 
                              @click="gotoPage($event,'prev')"
                              class="page-item" 
                              :class="{disabled: page===1}"><a class="page-link" href="#">Previous</a></li>
                              <li 
                              :key="i" 
                              v-for="i in getCountPage(page)" 
                              class="page-item"
                              :class="{active: page===i}"
                              @click="gotoNumPage"
                              ><a class="page-link" href="#">@{{i}}</a></li>
                              <li class="page-item" 
                              :class="{disabled: page===countPage}"
                              @click="gotoPage($event,'next')"
                              ><a class="page-link" href="#">Next</a></li>
                              <li class="page-item" 
                              :class="{disabled: page===countPage}"
                              @click="gotoPage($event,'last')"
                              ><a class="page-link" href="#">Last</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <Teleport to="body">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input v-model="name" class="form-control" 
                                        :class="{border: error?.name,'border-danger': error?.name}"
                                        @input="generateSlug">
                                        <p v-if="error?.name" class="text-danger">@{{error.name.join(' ')}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input v-model="slug" class="form-control"
                                        :class="{border: error?.slug,'border-danger': error?.slug}">
                                        <p v-if="error?.slug" class="text-danger">@{{error.slug.join(' ')}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-2">Parents</label>
                                        <select v-model="parent" class="form-control">
                                            <option value="0">Root</option>
                                            <option v-for="item in parents" :key="item.id" :value="item.id" >
                                                @{{item.name}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-2">Status</label>
                                        <select v-model="show_home" class="form-control">
                                            <option value="1" selected>Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Order</label>
                                        <input v-model="sort_order" type="number" min="1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea v-model="description" class="form-control"
                                        :class="{border: error?.description,'border-danger': error?.description}"></textarea>
                                        <p v-if="error?.description" class="text-danger">@{{error.description.join(' ')}}</p>
                                    </div>
                                </div>
                                <input type="hidden" id="id-category" ref='id'>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click.prevent="handleSubmit">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
            </Teleport>
            
        </div>
    </template>

    <style id="style">
        select.form-control{
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
            template: '#category-template',
            style: '#style',
            data(){
                return {
                    data: null,
                    name: '',
                    slug: '',
                    parent: 0,
                    sort_order: 1,
                    description: '',
                    show_home: 1,
                    parents: null,
                    error: null,
                    search: '',
                    page: 1,
                    length: 1,
                    countPage: 0,
                }
            },
            methods: {
                resetData(){
                    this.name = ''
                    this.slug = ''
                    this.parent = 0
                    this.sort_order = 1
                    this.description = ''
                    this.show_home = 1
                    this.error = null
                },
                handleSubmit(){
                    const category = {
                        name: this.name,
                        slug: this.slug,
                        parent: this.parent,
                        sort_order: this.sort_order,
                        description: this.description,
                        show_home: this.show_home
                    }
                    console.log(category);

                    const id = parseInt(this.$refs.id.value)

                    if (id){
                        const that = this
                        const res = API.CATEGORY.UPDATE(id,category)
                        console.log(res);
                        res.then(res => {
                            toastr.success(res.data.message)
                            $('#exampleModal').modal('hide');
                        }, res => {
                            that.error = res.response.data
                        })
                    }
                    else{
                        const that = this
                        const res = API.CATEGORY.CREATE(category)
                        console.log(res);
                        res.then(res => {
                            toastr.success(res.data.message)
                            $('#exampleModal').modal('hide');
                        },res => {
                            that.error = res.response.data
                        })
                    }
                    this.getData()
                },
                getCategory(e){
                    console.dir(e.target.closest('button').dataset.id);
                    const id = e.target.closest('button').dataset.id;
                    this.$refs.id.value = id
                    this.parents = this.getParent();
                    this.error = null
                    API.CATEGORY.SHOW(id).then(res => {
                        this.name = res.data.name
                        this.slug = res.data.slug
                        this.parent = res.data.parent
                        this.sort_order = res.data.sort_order
                        this.description = res.data.description
                        this.show_home = res.data.show_home
                    })

                },
                getData(){
                    const that = this
                    try {
                        const start = (this.page - 1) * length
                        API.CATEGORY.INDEX(start,this.length).then(res => {
                            that.data = res.data.data
                            that.countPage = Math.ceil(res.data.total / that.length)
                        })
                    } catch (error) {
                        throw error
                    }
                },
                getParent(){
                    const id = parseInt(this.$refs.id.value)
                    console.log(id);
                    if (id){
                        return this.data.filter((item) => item.id!==id); 
                    }
                    return this.data
                },
                showCreate(){
                    this.$refs.id.value = 0
                    this.parents = this.getParent();
                },
                handleDelete(e,item){
                    const that = this
                    bootbox.confirm(`Do you delete category ${item.name}?`, function(result){
                        if (result){
                            API.CATEGORY.DESTROY(item.id).then(res => {
                                console.log(res.data);
                                that.getData();
                            }).catch((error) => {
                                console.error(error.message);
                            })
                        }
                    })
                },
                generateSlug(e){
                    const input = e.target;
                    this.slug = input.value && input.value.split(' ').join('-') + '-' + new Date().getTime()
                },
                gotoPage(e,action){
                    //handle next and previous page
                    switch (action) {
                        case 'prev':
                            if (this.page === 1){
                                return;
                            }
                            this.page--
                            break;
                        case 'next':
                            if (this.page === this.countPage){
                                return;
                            }
                            this.page++
                            break;
                        case 'first':
                            this.page = 1
                            break;
                        case 'last':
                            this.page = this.countPage
                            break;
                        default:
                            break;
                    }
                    
                },
                gotoNumPage(e){
                    this.page = parseInt(e.target.textContent)
                },
                getCountPage(currentPage) {
                    if (this.countPage < 6){
                        return this.countPage;
                    }

                    const res = []

                    if (currentPage - 2 <= 0 ){ // vs so luong trang hien thi la 5
                        for (let index = 1; index <= 5; index++) {
                            res.push(index);
                        }
                        return res;
                    }

                    if (currentPage + 2 >= this.countPage){
                        for (let index = this.countPage - 4; index <= this.countPage; index++) {
                            res.push(index);
                        }
                        return res;
                    }
                    
                    for (let index = currentPage - 2; index <= currentPage + 2; index++) {
                            res.push(index);
                    }
                    return res;
                }
            },
            mounted() {
                PLUGIN.INIT();
                const that = this
                $('#exampleModal').on('hidden.bs.modal',function (e) {
                    that.resetData();
                })

                this.getData()
            },
            watch: {
                search(newValue, oldValue) {
                    const response = API.CATEGORY.SEARCH(newValue);
                    response.then(res => {
                        console.log(res);
                        this.data = res.data
                    })
                },
                page(newValue,oldValue){
                    console.log(newValue,this.pageCount);
                    const start = (newValue-1) * this.length
                    const length = this.length
                    const response = API.CATEGORY.INDEX(start,length);
                    response.then(res => {
                        console.log(res);
                        this.data = res.data.data
                    })
                }
            },
        }).mount('#categories')
    </script>
@endpush

{{--todo: xu ly them giao dien validation --}}