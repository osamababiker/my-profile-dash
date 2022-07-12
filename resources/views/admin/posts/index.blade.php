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
              <h5 class="card-title">Posts DataTable</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Summery</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Keep kissing your product</td>
                    <td>Designe</td>
                    <td>
                        <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#basicModal" >
                            <i class="bi bi-three-dots"></i>
                        </a>
                    </td>
                    <td>2022-07-06</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Timy project</td>
                    <td>Mobile app</td>
                    <td>
                        <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#basicModal" >
                            <i class="bi bi-three-dots"></i>
                        </a>
                    </td>
                    <td>2022-07-06</td>
                  </tr>
                </tbody>
              </table>
              

              <!-- Post Summery Modal -->
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Post summery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div><!-- End Post Summery Modal-->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin/components/footer')