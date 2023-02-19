<form action="{{ route('about.update', $user->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @method('patch')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="name" value="{{ $user->name }}" class="form-control"></div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">excerpt</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="excerpt" value="{{ $user->excerpt }}" placeholder="role" class="form-control"></div>
    </div>


    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">description</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" value="{{ $user->description }}" placeholder="description" class="form-control"></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">email</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" value="{{ $user->email }}" placeholder="email" class="form-control"></div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" name="add">
            <i class="fa fa-dot-circle-o"></i> Add
        </button>

    </div>
</form>
