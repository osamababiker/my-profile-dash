@include('components/head')

<body>

  <!-- ======= Header ======= -->
  @include('components/nav')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('components/sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories DataTable</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Posts Number</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Markiting</td>
                    <td>3</td>
                    <td>2022-07-06</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Programming</td>
                    <td>31</td>
                    <td>2022-07-06</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('components/footer')