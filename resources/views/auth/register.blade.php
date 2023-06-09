@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') ? \Carbon\Carbon::createFromFormat('Y-m-d', old('date_of_birth'))->format('d-m-Y') : '' }}" required autocomplete="date_of_birth">

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="speeches">Speeches</label>
                            <select id="speeches" name="speeches[]" multiple>
                                @foreach ($speeches as $speech)
                                    <option value="{{ $speech }}">{{ $speech }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row mb-3">
                        <label for="experiences">Expert_in</label>
                            <select id="experiences" name="expert_in[]" multiple>
                                @foreach ($expert_in as $experience)
                                    <option value="{{ $experience }}">{{ $experience }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row mb-3">
                            <label for="excerpt" class="col-md-4 col-form-label text-md-end">{{ __('Excerpt') }}</label>

                            <div class="col-md-6">
                                <input id="excerpt" type="text" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" value="{{ old('excerpt') }}" required >

                                @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required >

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="freelance" class="col-md-4 col-form-label text-md-end">{{ __('Freelance') }}</label>
<div> enter 1 if you are available, if you aren't, enter 0</div>
                            <div class="col-md-6">
                                <input id="freelance" type="text" class="form-control @error('freelance') is-invalid @enderror" name="freelance" value="{{ old('freelance') }}" required >

                                @error('freelance')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"></div>
                            <div class="col-12 col-md-9"><input type="file" name="image" placeholder="image" class="form-control"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
