<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Request a Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reqrecords.make', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="_req" class="col-form-label">Request a record for..</label>
                        <select name="recreq" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="_req">
                            <option value="consultation">Consultation Records</option>
                            <option value="grooming">Grooming Records</option>
                            <option value="health">Health Records</option>
                            <option value="surgical">Surgical Records</option>
                            <option value="vax">Vaccine Records</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="_pet" class="col-form-label">Pet Name</label>
                        <input type="text" name="petname" id="_pet" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send Request</button>
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
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')
    })
</script>