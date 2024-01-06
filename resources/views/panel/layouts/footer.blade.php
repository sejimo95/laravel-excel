{{--toast--}}
<div class="position-fixed bottom-1 end-1" style="z-index: 1055;">
    <div id="messageToast" class="toast fade p-2 mt-2 bg-gradient-info hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">notifications</i>
            <span class="me-auto text-white font-weight-bold">Notifications</span>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
        </div>
        <hr class="horizontal light m-0">
        <div id="toast-body-message" class="toast-body text-white"></div>
    </div>
</div>

{{--footer--}}
<footer class="footer py-4  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>
                    made with <i class="fa fa-heart"></i> by Sajad Mohamadi
                </div>
            </div>
        </div>
    </div>
</footer>
