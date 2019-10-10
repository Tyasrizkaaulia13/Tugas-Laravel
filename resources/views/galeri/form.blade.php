@csrf

<div class="Form-group row">
    <label for="nama" class="col-md-2 col-Form-label text-md-right">{{ __('Nama') }}</label>

    <div class="col-md-10">

            {!! Form::text('nama', null, ['class'=>"Form-control",'required','autofocus']); !!}

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

<div class="Form-group row">
    <label for="keterangan" class="col-md-2 col-Form-label text-md-right">{{ __('Keterangan') }}</label>

    <div class="col-md-10">
            <input id="keterangan" type="keterangan" class="Form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autofocus>

            @error('keterangan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>

</div>
<div class="Form-group row">
    <label for="path" class="col-md-2 col-Form-label text-md-right">{{ __('Path') }}</label>

    <div class="col-md-10">
            <input id="path" type="text" class="Form-control @error('path') is-invalid @enderror" name="path" value="{{ old('path') }}" required autofocus>

            @error('path')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

<div class="Form-group row">
    <label for="kategori_galeri_id" class="col-md-2 col-Form-label text-md-right">{{ __('KategoriGaleri') }}</label>

    <div class="col-md-10">
            {!! Form::select('kategori_galeri_id',$KategoriGaleri,null,["class"=>"Form-control","required"]) !!}

            @error('kategori_galeri_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

{!! Form::hidden('users_id',Auth::id() ); !!}

<div class="Form-group row mb-0">
    <div class="col-md-6 offset-md-4">
         <button type="submit" class="btn btn-primary">
            {{ __('Simpan Data') }}
         </button>
         <a href="{!! route('galeri.index') !!}" class="btn btn-danger">
            {{ __('Batal') }}
         </a>
    </div>
</div>