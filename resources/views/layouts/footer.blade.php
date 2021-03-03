</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            {{-- <span>Copyright &copy; Your Website 2020</span> --}}
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('public/assets/vendor/jquery/jquery.min.js
    ')}}"></script>
  <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js
    ')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('public/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('public/assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page Datatable plugins -->
  <script src="{{asset('public/assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('public/assets/js/demo/datatables-demo.js')}}"></script>
  <!--  Call the dataTables jQuery plugin -->
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
  <!--  Call the PrintFunction -->
  {{-- <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
    </script> --}}
  @include('sweetalert::alert')


</body>

</html>
