@include('admin/components/head')

<body>

  <!-- ======= Header ======= -->
  @include('admin/components/nav')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin/components/sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
 
    <section class="section">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Post </h5> 
            @if(session()->has('feedback'))
                <div class="alert alert-success alert-dismissible" id="successAlert" role="alert">
                    <div class="alert-message">
                        <strong> {{session()->get('feedback')}}
                    </div>
                </div>
            @endif
            @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-warning">:message</div>')) !!}
            @endif
            <!-- General Form Elements -->
            <form >
                @csrf 
                <input type="hidden" name="postId" id="postId" value="{{ $post->id }}">
                <div class="row mb-3">
                        <label for="arTitle" class="col-sm-2 col-form-label">Post Arabic Title</label>
                        <div class="col-sm-10">
                        <input id="arTitle" name="arTitle" value="{{ $post->arTitle }}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="enTitle" class="col-sm-2 col-form-label">Post English Title</label>
                        <div class="col-sm-10">
                        <input id="enTitle" name="enTitle" value="{{ $post->enTitle }}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="subOf" class="col-sm-2 col-form-label">Post Category</label>
                        <div class="col-sm-10">
                        <select id="subOf" class="form-select" aria-label="Default select example">
                            <option value="{{ $post->subOf }}" selected></option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->enName }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="arSummery" class="col-sm-2 col-form-label">Post Arabic Summery</label>
                        <div class="col-sm-10">
                        <textarea id="arSummery" name="arSummery" class="form-control" style="height: 100px">{{ $post->arSummery }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="enSummery" class="col-sm-2 col-form-label">Post English Summery</label>
                        <div class="col-sm-10">
                        <textarea id="enSummery" name="enSummery" class="form-control" style="height: 100px">{{ $post->enSummery }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="arContent" class="col-sm-2 col-form-label">Post Arabic Content</label>
                        <div class="col-sm-10">
                        <textarea id="arContent" name="arContent" class="tinymce-editor">{{ $post->arContent }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="enContent" class="col-sm-2 col-form-label">Post English Content</label>
                        <div class="col-sm-10">
                        <textarea id="enContent" name="enContent" class="tinymce-editor">{{ $post->enContent }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3 mt-4">
                        <label class="form-check-label col-sm-2" for="isPublished">Published</label>
                        <div class="col-sm-10 form-check form-switch">
                            <input class="form-check-input" name="isPublished" type="checkbox" id="isPublished" @if($post->isPublished) checked @else '' @endif>
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-sm-12">
                        <button type="button" id="submitPost" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
            </form>

        </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <script src="{{ asset('assets/js/updatePost.js') }}"></script>
  @include('admin/components/footer')