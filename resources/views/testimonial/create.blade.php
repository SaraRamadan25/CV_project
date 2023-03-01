<form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="name" class="form-control"></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">description</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" placeholder="description" class="form-control"></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">role</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="role" placeholder="role" class="form-control"></div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3"></div>
        <div class="col-12 col-md-9"><input type="file" name="image" placeholder="image" class="form-control"></div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" name="add">
            <i class="fa fa-dot-circle-o"></i> Add
        </button>

    </div>
</form>
