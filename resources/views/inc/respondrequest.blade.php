<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pubrecords.store', $req->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="_email" class="col-form-label">Recipient:</label>
                        <input type="text" name="email" id="_email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="_petname" class="col-form-label">Pet Name:</label>
                        <input type="text" name="petname" id="_petname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="_reqrec" class="col-form-label">Record:</label>
                        <input class="form-control" name="filerecord" type="file" id="_reqrec">
                    </div>
                    <input type="text" name="status" id="_status" class="invisible" value="attended">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send Response</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var email = button.getAttribute('data-bs-email')
        var petname = button.getAttribute('data-bs-petname')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')
        var modalName = exampleModal.querySelector('#_email')
        var modalPetName = exampleModal.querySelector('#_petname')

        modalName.value=email
        modalPetName.value=petname
    })
</script>