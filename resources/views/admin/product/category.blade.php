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
                    </div>
                    <div class="ibox-body">
                        <button type="button" class="my-2 btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="ti-plus"></i>
                        </button>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="100">Action</th>
                            </tr>
                            </thead>
                            <tbody v-if="data && data.length">
                                <tr v-for="item,index in data">
                                    <td>@{{index}}</td>
                                    <td>@{{item.name}}</td>
                                    <td>@{{item.show_home ? 'Show' : 'Hide'}}</td>
                                    <td>@verbatim
                                        {{new Date(item.created_at).toLocaleDateString('vi-VN',{month: '2-digit',day: '2-digit',year: 'numeric'})}}
                                    @endverbatim</td>
                                    <td class="d-flex justify-content-around ">
                                        <button @click="getCategory" :data-id="item.id" type="button" data-target="#exampleModal" data-toggle="modal" class="btn btn-sm mr-3"><i class="ti-pencil"></i></button>
                                        <button class="btn btn-sm mr-3"><i class="ti-trash"></i></button>
                                        <button class="btn btn-sm mr-3"><i class="ti-search"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                                        <input v-model="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input v-model="slug" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-2">Parents</label>
                                        <select v-model="parent" class="form-control">
                                            <option value="0">Parent category</option>
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
                                        <textarea v-model="description" class="form-control"></textarea>
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
                        API.CATEGORY.UPDATE(id,category)
                    }
                    else{
                        API.CATEGORY.CREATE(category)
                    }
                    this.getData()
                    $('#exampleModal').modal('hide');
                },
                getCategory(e){
                    console.dir(e.target.closest('button').dataset.id);
                    const id = e.target.closest('button').dataset.id;
                    this.$refs.id.value = id
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
                    API.CATEGORY.INDEX().then(res => {
                        that.data = res.data
                    })
                }
                getParent(id){
                    return this.data && this.data[id].parent;
                }
            },
            computed() {
                console.log("COMPUTED")
                parent(){
                    that.getParent(parseInt(that.$refs('id').value));
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
        }).mount('#categories')
    </script>
@endpush
