@include('components.head')

<body>

  <!-- ======= Header ======= -->
  @include('components.nav')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('components.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Post new blog</h5>
            <!-- General Form Elements -->
            <form>
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                <div class="col-sm-10">
                <input id="title" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Post Category</label>
                <div class="col-sm-10">
                <select id="category" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="summery" class="col-sm-2 col-form-label">Post Summery</label>
                <div class="col-sm-10">
                <textarea id="summery" class="form-control" style="height: 100px"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="summery" class="col-sm-2 col-form-label">Post Summery</label>
                <div class="col-sm-10">
                <textarea class="tinymce-editor">
                    
                </textarea>
                </div>
            </div>

            <div class="row mb-3 mt-4">
                <label class="form-check-label col-sm-2" for="published">Published</label>
                <div class="col-sm-10 form-check form-switch">
                    <input class="form-check-input" name="published" type="checkbox" id="published" checked>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit Post</button>
                </div>
            </div>

            </form><!-- End General Form Elements -->

        </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('components/footer')