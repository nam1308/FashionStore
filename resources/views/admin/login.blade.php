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
                <div style="display: flex">
                    <button class="btn btn-success" @click="onSubmit">Submit</button>
                    <div class="self-building-square-spinner m-2" v-if="isLoading" >
                        <div class="square"></div>
                        <div class="square"></div>
                        <div class="square"></div>
                        <div class="square clear"></div>
                        <div class="square"></div>
                        <div class="square"></div>
                        <div class="square clear"></div>
                        <div class="square"></div>
                        <div class="square"></div>
                    </div>
                </div>

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
                    isLoading: false,
                    user: {password: '123456', username: 'admin', _token: '{{csrf_token()}}'}
                }
            },
            methods: {
                showLoader () {
                    this.isLoading = true;
                },
                hideLoader () {
                    this.isLoading = false;
                },
                async onSubmit() {
                    this.showLoader();
                    // const response = await API.AUTH.LOGIN(this.user);
                    // console.log("RES", response);
                    // this.hideLoader();
                    try {
                        const response = await API.AUTH.LOGIN(this.user);
                        this.hideLoader();
                    } catch (error) {
                        alert(error);
                        this.hideLoader();
                    }
                }
            }
        }).mount('#login-content')
    </script>
    <style>
        .self-building-square-spinner, .self-building-square-spinner * {
            box-sizing: border-box;
        }

        .self-building-square-spinner {
            height: 40px;
            width: 40px;
            top: calc(-10px * 2 / 3);
        }

        .self-building-square-spinner .square {
            height: 10px;
            width: 10px;
            top: calc(-10px * 2 / 3);
            margin-right: calc(10px / 3);
            margin-top: calc(10px / 3);
            background: #ff1d5e;
            float: left;
            position: relative;
            opacity: 0;
            animation: self-building-square-spinner 6s infinite;
        }

        .self-building-square-spinner .square:nth-child(1) {
            animation-delay: calc(300ms * 6);
        }

        .self-building-square-spinner .square:nth-child(2) {
            animation-delay: calc(300ms * 7);
        }

        .self-building-square-spinner .square:nth-child(3) {
            animation-delay: calc(300ms * 8);
        }

        .self-building-square-spinner .square:nth-child(4) {
            animation-delay: calc(300ms * 3);
        }

        .self-building-square-spinner .square:nth-child(5) {
            animation-delay: calc(300ms * 4);
        }

        .self-building-square-spinner .square:nth-child(6) {
            animation-delay: calc(300ms * 5);
        }

        .self-building-square-spinner .square:nth-child(7) {
            animation-delay: calc(300ms * 0);
        }

        .self-building-square-spinner .square:nth-child(8) {
            animation-delay: calc(300ms * 1);
        }

        .self-building-square-spinner .square:nth-child(9) {
            animation-delay: calc(300ms * 2);
        }

        .self-building-square-spinner .clear {
            clear: both;
        }

        @keyframes self-building-square-spinner {
            0% {
                opacity: 0;
            }
            5% {
                opacity: 1;
                top: 0;
            }
            50.9% {
                opacity: 1;
                top: 0;
            }
            55.9% {
                opacity: 0;
                top: inherit;
            }
        }
    </style>
@endpush
