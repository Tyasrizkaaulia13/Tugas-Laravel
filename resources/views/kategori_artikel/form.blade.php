@csrf

<div class="Form-group row">
    <label for="nama" class="col-md-4 col-Form-label text-md-right">{{ __('nama') }}</label>

    <div class="col-md-6">

            {!! Form::text('nama', null, ['class'=>"Form-control",'required','autofocus']); !!}

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

{!! Form::hidden('users_id',Auth::id() ); !!}

<div class="Form-group row mb-0">
    <div class="col-md-0 offset-md-4">
         <button type="submit" class="btn btn-primary">
            {{ __('Simpan Data') }}
         </button>
         <a href="{!! route('kategori_artikel.index') !!}" class="btn btn-danger">
            {{ __('Batal') }}
         </a>
    </div>
</div>