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
            <h5 class="card-title">Post new category</h5>
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
            <form method="post" action="{{ route('categories.store') }}">
                @csrf
            <div class="row mb-3">
                <label for="arName" class="col-form-label">Category Arabic Name</label>
                <div class="col-sm-12">
                <input id="arName" name="arName" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="enName" class="col-form-label">Category English Name</label>
                <div class="col-sm-12">
                <input id="enName" name="enName" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="subOf" class="col-form-label">Parent Category</label>
                <div class="col-sm-12">
                <select id="subOf" name="subOf" class="form-select" aria-label="Default select example">
                    <option value='' selected>Select Parent Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->arName }}</option>
                    @endforeach
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
  @include('admin/components/footer')