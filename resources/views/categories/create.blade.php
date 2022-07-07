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
            <h5 class="card-title">Post new category</h5>
            <!-- General Form Elements -->
            <form>
            <div class="row mb-3">
                <label for="arName" class="col-sm-2 col-form-label">Category Arabic Name</label>
                <div class="col-sm-10">
                <input id="arName" name="arName" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="enName" class="col-sm-2 col-form-label">Category English Name</label>
                <div class="col-sm-10">
                <input id="enName" name="enName" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="subOf" class="col-sm-2 col-form-label">Parent Category</label>
                <div class="col-sm-10">
                <select id="subOf" name="subOf" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit Category</button>
                </div>
            </div>

            </form><!-- End General Form Elements -->

        </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('components/footer')