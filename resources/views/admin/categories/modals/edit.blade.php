<!-- Message Modal -->
<div class="modal fade" id="update_{{ $category->id }}" tabindex="-1">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update {{ $category->enName }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
       <form id="update_form_{{ $category->id }}" action="{{ route('categories.update') }}" method="post">
          @csrf 
          <input type="hidden" name="categoryId" value="{{ $category->id }}">
          <div class="row mb-3">
              <label for="arName" class="col-form-label">Category Arabic Name</label>
              <div class="col-sm-12">
              <input id="arName" value="{{ $category->arName }}" name="arName" type="text" class="form-control">
              </div>
          </div>
          <div class="row mb-3">
              <label for="enName" class="col-form-label">Category English Name</label>
              <div class="col-sm-12">
              <input id="enName" value="{{ $category->enName }}" name="enName" type="text" class="form-control">
              </div>
          </div>
          <div class="row mb-3">
              <label for="subOf" class="col-form-label">Parent Category</label>
              <div class="col-sm-12">
              <select id="subOf" name="subOf" class="form-select" aria-label="Default select example">
                  <option value="{{ $category->subOf }}" selected></option>
                  @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->arName }}</option>
                  @endforeach
              </select>
              </div>
          </div>
       </form>
    </div>
    <div class="modal-footer">
        <button type="submit" form="update_form_{{ $category->id }}" class="btn btn-success">Update Category</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div><!-- End Message Modal-->