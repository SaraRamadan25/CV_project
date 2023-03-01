<label for="experience">experience</label>
<form action="{{ route('experience.update',$experience->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @method('PATCH')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name"  value="{{ $experience->name }}" placeholder="name" class="form-control"></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="duration" class=" form-control-label">duration</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="duration" value="{{ $experience->duration }}" placeholder="duration" class="form-control"></div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">description</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" value="{{ $experience->description }}" placeholder="description" class="form-control"></div>
    </div>



    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" >
            <i class="fa fa-dot-circle-o"></i> Add
        </button>

    </div>
</form>


