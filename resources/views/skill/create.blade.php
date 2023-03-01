<form action="{{ route('skill.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="name" class="form-control"></div>
    </div>


    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">percentage</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="percentage" placeholder="percentage" class="form-control"></div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" >
            <i class="fa fa-dot-circle-o"></i> Add
        </button>

    </div>
</form>
