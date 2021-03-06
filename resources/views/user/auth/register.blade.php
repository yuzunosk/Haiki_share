@extends('layouts.user.app')

@section('content')

<form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_register__container u_font__default u_text--space">

        <div class="l_register--title  u_display--center  u_font__lage--text">{{ __('User Register') }}</div>

        <!-- 入力フォーム枠 -->
        <div class="l_register__user__container l_profile--main">

            <!-- 名前     -->

            <div class="l_register--name   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="name" class="">{{ __('User Name') }}</label>
                    @error('name')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                    <input class="l_profile--form c_input--default" id="name" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name' ) }}" autofocus>
            </div>
            <!-- 名前 END  -->


            <!-- email     -->

            <div class="l_register--email   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="email" class="">{{ __('Email') }}</label>
                    @error('email')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="l_profile--form c_input--default" id="email" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
            </div>
            <!-- email END  -->


            <!-- パスワード     -->

            <div class="l_register--pass   l_profile__form--unit">
                <div class="l_profile--text">
                    <label class="u_ds--block" for="password" class="">{{ __('Password') }}</label>
                    @error('password')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="l_profile--form c_input--default" id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" autofocus>
            </div>
            <!-- パスワード  END   -->

            <!-- パスワード確認 -->
            <div class="l_register--re_pass l_profile__form--unit">
                <div class="l_profile--text">
                    <label for="password-confirm" class="u_ds--block">{{ __('Confirm Password') }}</label>
                    @error('re_pass')
                    <span class="c_input--error-msg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <input class="l_profile--form c_input--default" id="password-confirm" type="password" name="password_confirmation">
            </div>
            <!-- パスワード確認 END -->


        </div>





        <div class="l_register--foot u_display--center">
            <button class="btn-3 btn--white" type="submit">
                <p class="btn--text--blk">{{ __('Register') }}</p>
            </button>
        </div>
        <!-- 入力フォーム枠 END -->

        {{-- submit return --}}
        <div id="js-click-return-top" class="l_login--submit  u_display--center">
            <button class="btn__reverse btn--green" type="button" >
                <p class="btn--text--reverse">{{ __('Return') }}</p>
            </button>
        </div>
        {{-- submit return END--}}



    </div>
</form>
@endsection