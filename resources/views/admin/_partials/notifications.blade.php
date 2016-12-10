@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        ×
    </button>
    <h4>
        <i class="icon fa fa-check">
        </i>
        Success!
    </h4>
    {{ Session::get('success') }}
</div>
@endif
@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        ×
    </button>
    <h4>
        <i class="icon fa fa-close">
        </i>
        Error!
    </h4>
    {{ Session::get('danger') }}
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        ×
    </button>
    @foreach ($errors->all() as $error)
        {{ $error }}
    <br/>
    @endforeach
</div>
@endif
