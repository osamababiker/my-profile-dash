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
            <h5 class="card-title">Post new blog</h5> 
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
            <form>
            <div class="row mb-3">
                <label for="arTitle" class="col-form-label">Post Arabic Title</label>
                <div class="col-sm-12">
                <input id="arTitle" name="arTitle" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="enTitle" class="col-form-label">Post English Title</label>
                <div class="col-sm-12">
                <input id="enTitle" name="enTitle" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="subOf" class="col-form-label">Post Category</label>
                <div class="col-sm-12">
                <select id="subOf" class="form-select" aria-label="Default select example">
                    <option value=''></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->enName }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="poster" class="col-form-label">Post Poster</label>
                <div class="col-sm-12">
                    <input id="poster" class="form-control" name="poster" type="file">
                </div>
            </div>
            <div class="row mb-3">
                <label for="arSummery" class="col-form-label">Post Arabic Summery</label>
                <div class="col-sm-12">
                <textarea id="arSummery" name="arSummery" class="form-control" style="height: 100px"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="enSummery" class="col-form-label">Post English Summery</label>
                <div class="col-sm-12">
                <textarea id="enSummery" name="enSummery" class="form-control" style="height: 100px"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="arContent" class="col-form-label">Post Arabic Content</label>
                <div class="col-sm-12">
                <textarea id="arContent" name="arContent" class="tinymce-editor">
                    
                </textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="enContent" class="col-form-label">Post English Content</label>
                <div class="col-sm-12">
                <textarea id="enContent" name="enContent" class="tinymce-editor">
                    
                </textarea>
                </div>
            </div>

            <div class="row mb-3 mt-4">
                <label class="form-check-label" for="isPublished">Published</label>
                <div class="col-sm-12 form-check form-switch">
                    <input class="form-check-input" name="isPublished" type="checkbox" id="isPublished" checked>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-sm-12">
                <button type="button" id="submitPost" class="btn btn-primary">Submit Post</button>
                </div>
            </div>

            </form><!-- End General Form Elements -->

        </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <script type="text/javascript">var csrf_token = "<?= csrf_token() ?>";</script>
  <script src="{{ asset('assets/js/submitPost.js') }}"></script>
  @include('admin/components/footer')