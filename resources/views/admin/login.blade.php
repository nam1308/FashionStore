@extends('admin.layouts.empty')

@section('content')
    <div id="login-content"></div>
    <template id="Login">
        <div class="card">
            <div class="card-body">
                <h1>LOGIN FORM</h1>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" v-model="user.username"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" v-model="user.password"/>
                </div>
                <button class="btn btn-success" @click="onSubmit">Submit</button>
            </div>
        </div>
    </template>
@stop

@push('vue')
    <script>
        Vue.createApp({
            template: '#Login',
            data() {
                return {
                    user: {password: '123456', username: 'admin', _token: '{{csrf_token()}}'}
                }
            },
            methods: {
                async onSubmit() {
                    const response = await API.AUTH.LOGIN(this.user);
                    console.log("RES", response)
                }
            }
        }).mount('#login-content')
    </script>
@endpush
