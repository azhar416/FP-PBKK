<form action="{{ $action }}">
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="{{__('search.msg') }}" name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">{{ __('search.button') }}</button>
            </div>
        </div>
    </div>
</form>