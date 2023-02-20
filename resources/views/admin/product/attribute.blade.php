@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Product list'
    ])
@stop
@section('content')
<div class="container-fluid p-0">
    @include('admin.inc.breadcrumb', ['items' => [['label' => 'Product', 'link' => '/products'],['label' => 'Attributes']]])
    <div id="attribute"></div>
</div>
<template id="template">
    <div class="row">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Attributes</div>
                    <div class="d-flex align-items-center">
                        <input v-model="search" type="text" class="border border-dark rounded p-1" placeholder="Search">
                        <button  @click="handleSearch" class="ml-2 btn btn-sm">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                </div>
                <div class="ibox-body">
                    <button
                    @click="showCreate"
                    class="btn btn-sm btn-success"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="ti-plus"></i>
                    </button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Variations</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item,index in data" :key="item.id">
                                <td>@{{index}}</td>
                                <td>@{{item.name}}</td>
                                <td>@{{item.slug}}</td>
                                <td>
                                    <a :href="'/admin/products/attribute/variation/' + item.id">View variations</a>
                                </td>
                                <td>
                                    <button
                                    @click="showEdit"
                                    :data-id="item.id"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    class="btn btn-sm">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button
                                    @click="handleDelete($event,item)"
                                    class="ml-3 btn btn-sm">
                                        <i class="ti-trash"></i>
                                    </button>
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
    </div>

    <Teleport to="body">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@{{titleModel}}</h5>
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
                                disabled
                                :class="{border: error?.slug,'border-danger': error?.slug}">
                                <p v-if="error?.slug" class="text-danger">@{{error.slug.join(' ')}}</p>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea v-model="description" class="form-control"
                                :class="{border: error?.description,'border-danger': error?.description}"></textarea>
                                <p v-if="error?.description" class="text-danger">@{{error.description.join(' ')}}</p>
                            </div>
                        </div>
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
</template>


@stop

@push('vue')
    <script src="{{asset('backend/vendors/bootbox/bootbox.min.js')}}"></script>
@endpush

@push('vue')
    <script>

        const app = Vue.createApp({
            template: '#template',
            data(){
                return {
                    id: 0,
                    data: [],
                    error: null,
                    name: '',
                    slug: '',
                    description: '',
                    search: '',
                    page: 1,
                    length: 10,
                    countPage: 0,
                    titleModel: 'Create Attribute'
                }
            },
            methods: {
                showCreate(e){
                    this.id = 0,
                    this.titleModel = 'Create Attribute'
                },
                async getData(query){
                    const start = (this.page - 1) * this.length
                    const res = await API.PRODUCT_ATTRIBUTE.SEARCH(query,start,this.length)
                    this.data = res.data.data
                    this.countPage = Math.ceil(res.data.total / this.length)
                },
                async showEdit(e){
                    try {
                        const id = e.target.closest('button').dataset.id
                        this.id = id
                        this.titleModel = 'Edit Attribute'
                        const res = await API.PRODUCT_ATTRIBUTE.SHOW(id)
                        this.name = res.data.name
                        this.slug = res.data.slug
                        this.description = res.data.description
                    } catch (error) {
                        MESSAGE.ERROR(error)
                    }

                },
                generateSlug(e){
                    this.slug = this.name.split(' ').join('-').toLowerCase()
                },
                resetData(){
                    this.name = ''
                    this.slug = ''
                    this.description = ''
                    this.error = null
                },
                async handleSubmit(e){
                    try {
                        const data = {
                            name: this.name,
                            slug: this.slug,
                            description: this.description,
                            parent: 0
                        }
                        let res = undefined
                        if (this.id){
                            res = await API.PRODUCT_ATTRIBUTE.UPDATE(this.id,data)
                        }
                        else{
                            res = await API.PRODUCT_ATTRIBUTE.STORE(data)
                        }
                        MESSAGE.SUCCESS(res.data.mess)
                        $('#exampleModal').modal('hide');
                        this.getData('')
                    } catch (error) {
                        this.error = error.response.data
                    }

                },
                handleDelete(e,item){
                    const that = this
                    bootbox.confirm(`Do you delete attribute ${item.name}?`, function(result){
                        if (result){
                            API.PRODUCT_ATTRIBUTE.DESTROY(item.id).then(res => {
                                MESSAGE.SUCCESS(res.data.mess)
                                that.getData();
                            }).catch((error) => {
                                MESSAGE.ERROR(error.message);
                            })
                        }
                    })
                },
                handleSearch(e){
                    this.page = 1
                    this.getData(this.search)
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
                            if (this.page === 1){
                                return;
                            }
                            this.page = 1
                            break;
                        case 'last':
                            if (this.page === this.countPage){
                                return;
                            }
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
            mounted(){
                const that = this
                $('#exampleModal').on('hidden.bs.modal',function (e) {
                    that.resetData();
                })
                this.getData('');
            },
            watch: {
                async page(newValue,oldValue){
                    try {
                        console.log(newValue,this.countPage);
                        const start = (newValue-1) * this.length
                        const length = this.length
                        const response = await API.PRODUCT_ATTRIBUTE.SEARCH(this.search,start,length);
                        console.log(response);
                        this.data = response.data.data
                    } catch (error) {
                        MESSAGE.ERROR(error.message)
                    }

                }
            }
        })


        app.mount('#attribute')
    </script>
@endpush
