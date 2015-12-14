

    <div class="col-md-6 col-md-offset-3">

        @include('partials.forms')

        <form method="post" action="{{ route('admin.login.post') }}" >
            {!! csrf_field() !!}
            <input type="hidden" name="login" value="login">
            <div class="form-group">

                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">

            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="form-group" >
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>

    </div>
