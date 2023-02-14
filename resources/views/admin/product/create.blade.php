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
                }
            },
            async mounted() {
                PLUGIN.INIT();
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
                }
            },
        }).mount('#product')
    </script>

    <style scoped>
        .note-editing-area{ background: #fff}
        .thumb-item{ background: #fff; }
        select.form-control{ height: auto !important;}
    </style>
@endpush
