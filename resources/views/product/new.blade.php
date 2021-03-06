@extends('layouts.store.app')

@section('content')

<form method="POST" action="{{ route('store.product.create') }}" enctype="multipart/form-data">
    @csrf

    <div class="l_input__container u_font__default u_text--space ">

        <div class="l_input__product--title  u_display--center u_font__lage--text">{{ __('Product New') }}</div>

        <!-- 名前     -->
        <div class="l_input__product--name  u_display--start--column">
            <label class="u_ds--block" for="name" class="">{{ __('Product Name') }}</label><br>
            @error('name')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

                <input class="c_input--default" id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
        <!-- 名前 END  -->


        <!-- カテゴリー -->
        <div class="l_input__product--category u_display--start--column">
            <label for="category" class="">{{ __('category') }}</label><br>
            @error('category')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

                <select class="c_input--default" name="category" id="category">
                    <option value="">-- 選択してください --</option>
                    <!-- ループ処理 -->
                    @foreach($categorys as $category)
                    <option value="{{ $category->name }}" @if(old('category')==$category->name) selected @endif">{{ $category->name }}</option>
                    @endforeach
                </select>

        </div>
        <!-- カテゴリー END -->


        
        
        <!-- 通常 価格 -->
        <div class="l_input__product--r_price u_display--start--column">
            <label for="regular_price" class="">{{ __('regular price') }}</label><br>

            @error('regular_price')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                <input class="c_input--default" id="regular_price" type="number" class=" @error('regular_price') is-invalid @enderror" name="regular_price" value="{{ old('regular_price') }}" autofocus min=0>
                <span>円</span>
        </div>
        <!-- 通常 価格 END -->


        <!-- 値段 -->

        <div class="l_input__product--price u_display--start--column">
            <label for="price" class="">{{ __('Sale price') }}</label><br>

            @error('price')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

                <input class="c_input--default" id="price" type="number" class=" @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autofocus min=0>
                <span>円</span>
        </div>

        <!-- 値段 END -->


        <!-- ストアID     -->
        <div class="l_input__product--store_id u_display--start--column">
            <label for="store_id" class="">{{ __('Product store_id') }}</label><br>
            @error('store_id')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

                <input class="c_input--default" id="store_id" type="text" class=" @error('store_id') is-invalid @enderror" name="store_id" value="{{ Auth::user()->id }}" readonly>

        </div>
        <!-- ストアID END  -->

        <!-- 賞味期限 -->

        <div class="l_input__product--sellby u_display--start--column">
            <label for="sellby" class="">{{ __('Product sellby') }}</label><br>
            @error('sellby')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

                <input class="c_input--default" id="sellby" type="date" class=" @error('sellby') is-invalid @enderror" name="sellby" value="{{ old('sellby') }}" autofocus>
        </div>

        <!-- 賞味期限 END -->



        <!-- 画像 -->
        <div class="l_input__product--pic u_display--start--column">
            <span>{{ __('pic') }} ドラッグ&ドロップ</span>
            @error('pic')
            <span class="c_input--error-msg" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label id="js-dropArea" class="u_parent--100 bg-gray<?php if (!empty($err_msg['pic'])) echo 'err'; ?>" style="z-index:3;">

                <input type="hidden" name="MAX_FILE_SIZE">
                <input id="js-changeFile" class="u_parent--100 opacity-0" type="file" name="pic" class="input-file">
                <img id="js-check-img" src="" alt="ドロップされた画像" class="c_input--prev-img u_display-n">


            </label>
        </div>

        <!--画像  END -->

{{-- submit save --}}
        <div class="l_input__product--submitB u_display--center">
            <button class="btn-3 btn--white" type="submit">
                <p class="btn--text--blk">{{ __('Register') }}</p>
            </button>
        </div>
{{-- submit save END--}}


{{-- submit return --}}
    <div id="js-click-return-home2" class="l_input__product--submitD u_display--center">
            <button class="btn__reverse btn--green" type="button" >
                <p class="btn--text--reverse">{{ __('Return') }}</p>
            </button>
    </div>
{{-- submit return END--}}
    </div>
</form>
@endsection