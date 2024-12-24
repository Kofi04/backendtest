<x-guest-layout>


<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
                                <div class="form-body ">
                                    <h3 class="fw-bold text-primary text-center">Inscription</h3>
    <form method="POST" action="{{ route('register') }}" class="row g-3">
        @csrf
       
        <!-- Name -->
        <div>
            <label for="name"  class="form-label">{{ __('Name') }} </label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <span class="mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="form-label" >{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <span class="mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control"type="password" name="password" required autocomplete="new-password">
            @error('password')
                <span class="mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation"class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <span class="mt-2">{{ $message }}</span>
            @enderror
        </div>

         <!-- Role Selection -->
         <div class="mt-4">
            <label for="role" class="form-label">{{ __('Choissisez votre type de compte') }}</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="roles_id" value="1" id="role_client">
                <label class="form-check-label" for="role_client">
                    {{ __('Client') }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="roles_id" value="2" id="role_vendeur">
                <label class="form-check-label" for="role_vendeur">
                    {{ __('Vendeur') }}
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            
            <button type="submit"class="btn btn-primary">
                {{ __('Inscription') }}
            </button>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</x-guest-layout>
