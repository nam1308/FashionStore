@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', ['title' => 'Add Category Blog'])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Category Blog', 'link' => '/categoryBlog'],['label' => 'Add Category Blog']]])
        <div id="categoryBlog"></div>
    </div>

    <template id="create_categoryBlog">
        <div class="create_categoryBlog-content">
            <div class="create_categoryBlog-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="categoryBlog.name" class="form-control" :class="{border: categoryBlog.error?.name,'border-danger': categoryBlog.error?.name}">
                            <p v-if="categoryBlog.error?.name" class="text-danger">
                                @{{categoryBlog.error.name.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input v-model="categoryBlog.slug" class="form-control" :class="{border: categoryBlog.error?.slug,'border-danger': categoryBlog.error?.slug}">
                            <p v-if="categoryBlog.error?.slug" class="text-danger">
                                @{{categoryBlog.error.slug.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control editor"> </textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mr-2">Parent</label>
                                    <select v-model="categoryBlog.parent" class="form-control">
                                        <option value="0" selected>Root</option>
                                        <option v-for="item in parents" :key="item.id" :value="item.id" >
                                            @{{ item.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Lang</label>
                                    <select v-model="categoryBlog.lang" class="form-control">
                                        <option value="vi" selected>VI</option>
                                        <option value="en">EN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input v-model="categoryBlog.sort_order" type="number" min="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mr-2">Show home</label>
                                    <select v-model="categoryBlog.show_home" class="form-control">
                                        <option value="1" selected>Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Thumbnail Url</label>--}}
                        {{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Banner Url</label>--}}
                        {{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="create_blog-footer">
                <a href="{{ url('admin/categoryBlog') }}" type="button" class="btn btn-secondary mr-4">Come back</a>
                <button type="button" class="btn btn-primary" @click.prevent="handleSubmit">Save changes</button>
            </div>
        </div>
    </template>

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
            template: "#create_categoryBlog",
            data(){
                return {
                    data: null,
                    categoryBlog: {
                        name: '',
                        slug: '',
                        description: '',
                        parent: 0,
                        thumbnail_url: '',
                        banner_url: '',
                        lang: 'vi',
                        sort_order: null,
                        show_home: 0,
                        error: null,
                    },
                    parents: [],
                }
            },
            async mounted() {
                PLUGIN.INIT();
                this.parents = @json($categoryBlogs);
                PLUGIN.EDITOR('');
            },
            methods:{
                async handleSubmit(){
                    this.categoryBlog.description = PLUGIN.GETCONTENT();
                    try {
                        await API.CATEGORY_BLOG.STORE(this.categoryBlog);
                        MESSAGE.SUCCESS('Create blog success');
                        window.location.replace('{{ url('admin/categoryBlog') }}')
                    } catch (e) {
                        console.log(e);
                        this.categoryBlog.error = e.response.data;
                    }
                }
            },
        }).mount('#categoryBlog')
    </script>

    <style scoped>
        .note-editing-area{ background: #fff}
        .thumb-item{ background: #fff; }
        select.form-control{ height: auto !important;}
    </style>
@endpush
