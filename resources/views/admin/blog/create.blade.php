@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', ['title' => 'Add Blog'])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Blog', 'link' => '/blog'],['label' => 'Add Blog']]])
        <div id="blog"></div>
    </div>

    <template id="create_blog">
        <div class="create_blog-content">
            <div class="create_blog-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="blog.name" class="form-control" :class="{border: blog.error?.name,'border-danger': blog.error?.name}">
                            <p v-if="blog.error?.name" class="text-danger">
                                @{{blog.error.name.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input v-model="blog.slug" class="form-control" :class="{border: blog.error?.slug,'border-danger': blog.error?.slug}">
                            <p v-if="blog.error?.slug" class="text-danger">
                                @{{blog.error.slug.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Short description</label>
                            <textarea v-model="blog.excerpt" class="form-control" :class="{border: blog.error?.excerpt,'border-danger': blog.error?.excerpt}"></textarea>
                            <p v-if="blog.error?.excerpt" class="text-danger">
                                @{{blog.error.excerpt.join(' ')}}
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mr-2">Parent</label>
                                    <select v-model="blog.parent" class="form-control">
                                        <option value="0" selected>Root</option>
                                        <option v-for="item in parents" :key="item.id" :value="item.id" >
                                            @{{ item.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mr-2">Status</label>
                                    <select v-model="blog.status" class="form-control">
                                        <option value="1" selected>Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input v-model="blog.sort_order" type="number" min="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Is Popular</label>
                                    <select v-model="blog.is_popular" class="form-control">
                                        <option value="0" selected>Unpopular</option>
                                        <option value="1">Popular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Lang</label>
                                    <select v-model="blog.lang" class="form-control">
                                        <option value="vi" selected>VI</option>
                                        <option value="en">EN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Author</label>
                                    <input type="text" :value="blog.author" class="form-control" readonly="readonly">
                                </div>
                            </div>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Image</label>--}}
{{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control editor"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="create_blog-footer">
                <a href="{{ url('admin/blog') }}" type="button" class="btn btn-secondary mr-4">Come back</a>
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
            template: "#create_blog",
            data(){
                return {
                    data: null,
                    blog: {
                        name: '',
                        slug: '',
                        excerpt: '',
                        image: null,
                        content: '',
                        sort_order: 1,
                        status: 1,
                        parent: 0,
                        is_popular: 0,
                        author: '',
                        lang: 'vi',
                        error: null,
                    },
                    parents: [],
                }
            },
            mounted() {
                PLUGIN.INIT();
                this.parents = @json($category_blog);
                this.blog.author = JSON.parse(localStorage.getItem('user')).username;
                PLUGIN.EDITOR('');
            },
            methods:{
                async handleSubmit(){
                    this.blog.content = PLUGIN.GETCONTENT();
                    try {
                        await API.BLOG.CREATE(this.blog);
                        console.log(this.blog);
                        MESSAGE.SUCCESS('Create blog success');
                        window.location.replace('{{ url('admin/blog') }}')
                    } catch (e) {
                        this.blog.error = e.response.data;
                    }
                }
            },
        }).mount('#blog')
    </script>

    <style scoped>
        .note-editing-area{ background: #fff}
        .thumb-item{ background: #fff; }
        select.form-control{ height: auto !important;}
    </style>
@endpush
