@csrf

<div class="Form-group row">
    <label for="judul" class="col-md-2 col-Form-label text-md-right">{{ __('Judul') }}</label>

    <div class="col-md-6">
            
            {!! Form::text('judul', null, ['class'=>"Form-control",'required','autofocus']); !!}

            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

<div class="Form-group row">
    <label for="kategori_artikel_id" class="col-md-2 col-Form-label text-md-right">{{ __('KategoriArtikel') }}</label>

    <div class="col-md-6">
            {!! Form::select('kategori_artikel_id',$KategoriArtikel,null,["class"=>"Form-control","required"]) !!}

            @error('kategori_artikel_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

<div class="Form-group row">
    <label for="isi" class="col-md-2 col-Form-label text-md-right">{{ __('Isi') }}</label>

    <div class="col-md-10">
            {!! Form::textarea('isi', null,['class'=>'form-control']); !!}

            @error('isi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

{!! Form::hidden('users_id',Auth::id() ); !!}

<div class="Form-group row mb-0">
    <div class="col-md-0 offset-md-2">
         <button type="submit" class="btn btn-primary">
            {{ __('Simpan Data') }}
         </button>
         <a href="{!! route('artikel.index') !!}" class="btn btn-danger">
            {{ __('Batal') }}
         </a>
    </div>
</div>