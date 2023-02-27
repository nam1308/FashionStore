@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', ['title' => 'Product list'])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Products', 'link' => '/products'],['label' => 'Add Product']]])
        <div id="product"></div>
    </div>

    <template id="create_product">
        <div class="create_product-content">
            <div class="create_product-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="products.name" class="form-control" :class="{border: products.error?.name,'border-danger': products.error?.name}">
                            <p v-if="products.error?.name" class="text-danger">
                                @{{products.error.name.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input v-model="products.slug" class="form-control" :class="{border: products.error?.slug,'border-danger': products.error?.slug}">
                            <p v-if="products.error?.slug" class="text-danger">
                                @{{products.error.slug.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea v-model="products.excerpt" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control editor"> </textarea>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mr-2">Parent</label>
                                    <select v-model="products.parent" class="form-control">
                                        <option value="0" selected>Root</option>
                                        <option v-for="item in parents" :key="item.id" :value="item.id" >
                                            @{{ item.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input v-model="products.sort_order" type="number" min="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mr-2">Status</label>
                                    <select v-model="products.status" class="form-control">
                                        <option value="1" selected>Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Regular Price</label>
                                    <input type="number" v-model="products.regular_price" class="form-control" :class="{border: products.error?.regular_price,'border-danger': products.error?.regular_price}">
                                    <p v-if="products.error?.regular_price" class="text-danger">
                                        @{{products.error.regular_price.join(' ')}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Is Hot</label>
                                    <select v-model="products.is_hot" class="form-control">
                                        <option value="0" selected>No Hot</option>
                                        <option value="1">Hot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Lang</label>
                                    <select v-model="products.lang" class="form-control">
                                        <option value="vi" selected>VI</option>
                                        <option value="en">EN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Avatar</label>--}}
                        {{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Albums</label>--}}
                        {{--                            <x-upload name="image[]" :values="$image" multiple="true" />--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea v-model="products.meta_description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input v-model="products.meta_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input v-model="products.meta_keyword" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="attribute">
                <div class="ibox">
                    <div class="ibox-head">
                        <h3 class="ibox-title">Attribute product</h3>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Attributes: </label>
                                <div class="col-sm-10">
                                    <div v-for="item,index in options"
                                     :key="index"
                                     class="attributes__content mb-3 p-3 border border-secondary">
                                        <button
                                        @click="removeAttribute"
                                        :data-id="index" type="button" class="btn btn-sm btn-danger float-right mb-2">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <label>Attribute</label>
                                        <select class="attribute-select form-control mb-2">
                                        </select>
                                        <label>Variation</label>
                                        <select class="variation-select form-control">
                                        </select>
                                    </div>
                                    {{-- <div class="attributes__content mb-3 p-3 border border-secondary">
                                        <label>Attribute</label>
                                        <select class="key form-control mb-2"></select>
                                        <label>Variation</label>
                                        <select class="value form-control"></select>
                                    </div> --}}
                                    <button type="button" @click="addAttribute" class="btn">Add attribute</button>
                                </div>
                            </div>
                            <div v-if="isShow" class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    <span class="text-danger">*</span>
                                    Price
                                </label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="number" value="0" min="1">
                                </div>
                            </div>
                            <div v-if="isShow"  class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    <span class="text-danger">*</span>
                                    Stock
                                </label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="number" value="0" min="0">
                                </div>
                            </div>
                            <div v-if="isShow"  class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    SKU
                                </label>
                                <div class="col-sm-2">
                                    <input class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="create_blog-footer">
                <a href="{{ url('admin/products') }}" type="button" class="btn btn-secondary mr-4">Come back</a>
                <button type="button" class="btn btn-primary" @click.prevent="handleSubmit">Save changes</button>
            </div>
        </div>
    </template>

@endsection

@push('styles')
    <link rel='stylesheet' href="{{asset('backend/vendors/toastr/toastr.min.css')}}"/>
@endpush

@push('vue')
    <script src="{{asset("backend/vendors/bootbox/bootbox.min.js")}}"></script>
    <script src="{{asset("backend/vendors/toastr/toastr.min.js")}}"></script>
@endpush

@push('vue')
    <script type="text/javascript">
        const table = new Set()

        Vue.createApp({
            template: "#create_product",
            data(){
                return {
                    data: null,
                    products: {
                        name: '',
                        slug: '',
                        description: '',
                        content: '',
                        parent: 0,
                        sort_order: 1,
                        status: 1,
                        regular_price: '',
                        image: '',
                        thumbs: ["/medias/1675648139.jpg", "/medias/1675648145.png"],
                        is_hot: 0,
                        meta_description: '',
                        meta_title: '',
                        meta_keyword: '',
                        lang: 'vi',
                        error: null,
                    },
                    parents: [],
                    options: [ //attribute_option
                        // {
                        //     variations: ['L','M','S'],
                        //     price: 0,
                        //     sku: '',
                        //     stock: 10,
                        //     thumb_url: ''
                        // },
                        // {
                        //     variations: ['Red','Blue'],
                        //     price: 0,
                        //     sku: '',
                        //     stock: 10,
                        //     thumb_url: ''
                        // },
                    ],
                    isShow: true //show price
                }
            },
            async mounted() {
                this.parents = @json($productCategories);
                PLUGIN.EDITOR('');
            },
            methods:{
                async handleSubmit(){
                    this.products.content = PLUGIN.GETCONTENT();
                    this.products.thumbs = this.products.thumbs.toString();
                    try {
                        await API.PRODUCT.CREATE(this.products);
                        MESSAGE.SUCCESS('Create products success');
                        window.location.replace('{{ url('admin/products') }}')
                    } catch (e) {
                        this.products.error = e.response.data;
                    }
                },
                addAttribute(){
                    this.isShow = false
                    this.options.push({
                        variations: [],
                        price: 0,
                        sku: '',
                        stock: 10,
                        thumb_url: ''
                    })
                },
                removeAttribute(e){
                    const id = e.target.closest('button').dataset.id
                    this.options.splice(id,1)
                    if (this.options.length == 0){
                        this.isShow = true
                    }
                },
                initSelector(selector,option){
                    PLUGIN.INIT(selector,option);
                    //su kien khi chon item
                    $('.attribute-select').on('select2:select',function name(e) {
                        const id = $(this).val()
                        $(this).data('prev',id)
                        table.add(id)
                        console.log(table);
                    })
                    //su kien khi bo chon
                    $('.attribute-select').on('select2:unselect',function name(e) {
                        const id = $(this).data('prev')
                        table.delete(id)
                    })
                }
            },
            updated(){
                this.initSelector('.attribute-select',{
                        placeholder: 'Attribute',
                        allowClear: true,
                        width: '100%',
                        minimumResultsForSearch: Infinity,
                        ajax: {
                            url: "{{route('attribute.filter')}}",
                            headers: {
                                "Authorization": "Bearer " + localStorage.getItem("token"),
                                "Content-Type": "application/json",
                            },
                            data: function (params) {
                                filter = []

                                for (item of table){
                                    filter.push(item);
                                }

                                return {
                                    filter
                                }
                            },
                            processResults: function (res) {
                                const items = res.map(item => {
                                    return {
                                        id: item.id,
                                        text: item.name,
                                    }
                                })
                                console.log(items);
                                return {
                                    results: items
                                }
                            }
                        },
                    })
            }
        }).mount('#product')
    </script>

    <style scoped>
        .note-editing-area{ background: #fff}
        .thumb-item{ background: #fff; }
        select.form-control{ height: auto !important;}
    </style>
@endpush
