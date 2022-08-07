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
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories DataTable</h5>
              @if(session()->has('feedback'))
                <div class="alert alert-success alert-dismissible" id="successAlert" role="alert">
                    <div class="alert-message">
                        <strong> {{session()->get('feedback')}}
                    </div>
                </div>
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Posts Number</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->enName }}</td>
                    <td>{{ $category->posts->count() }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete_{{ $category->id }}" >
                        <i class="bi bi-trash-fill"></i>
                      </a>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#update_{{ $category->id }}" >
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </td>
                  </tr>
                  @include('admin/categories/modals/edit')
                  @include('admin/categories/modals/delete')
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin/components/footer')