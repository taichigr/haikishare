@csrf
<div class="c-form__control">
    <label for="name" class="c-form__label">商品名</label>

    <div class="c-form__inputContainer">
        <input id="name" type="text" class="c-form__input  @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name">

        @error('name')
        @include('../../components/error_message')
        @enderror
    </div>
</div>

<div class="c-form__control">
    <label for="category_id" class="c-form__label">商品カテゴリー</label>

    <div class="c-form__inputContainer">
        <select name="category_id" id="category_id" class="c-form__select @error('name') is-invalid @enderror">
            <option value="" class="c-form__option">選択してください</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" class="c-form__option" @if(old('category_id')==$category->
                id)
                selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>

        @error('category_id')
        @include('../../components/error_message')
        @enderror
    </div>
</div>

<div class="c-form__control">
    <label for="price" class="c-form__label">価格</label>

    <div class="c-form__inputContainer">
        <input id="price" type="number" class="c-form__inputNumber  @error('price') is-invalid @enderror" name="price"
            value="{{ old('price') }}" required autocomplete="price">
        円
        @error('price')
        @include('../../components/error_message')
        @enderror
    </div>
</div>

<div class="c-form__control">
    <label for="image" class="c-form__label">画像</label>
    <div class="c-form__inputContainer">
        <input id="image" type="file" class="c-form__input  @error('image') is-invalid @enderror" name="image"
            value="{{ old('image') }}" autocomplete="image">
        @error('image')
        @include('../../components/error_message')
        @enderror
    </div>
</div>

<div class="c-form__control">
    <label for="stock" class="c-form__label">個数</label>
    <div class="c-form__inputContainer">
        <input id="stock" type="number" class="c-form__inputNumber  @error('stock') is-invalid @enderror" name="stock"
            value="{{ old('stock') }}" required autocomplete="stock">
        個
        @error('stock')
        @include('../../components/error_message')
        @enderror
    </div>
</div>

<div class="c-form__buttonArea">
    <button type="submit" class="c-button__default">
        商品登録
    </button>
</div>
</form>