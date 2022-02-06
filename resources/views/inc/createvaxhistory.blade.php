<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="display-6">
            Add Vaccine History
        </div>
    </div>

    <div class="row justify-content-between mt-4">
        <form action="{{ route('vaxhistory.store') }}" method="post">
            @csrf
            <div class="form-group">
                <!--Date-->
                <div class="mb-3">
                    <label for="_date" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="_date">
                </div>

                <!--FollowUpDate-->
                <div class="mb-3">
                    <label for="_fdate" class="form-label">Follow-up Date</label>
                    <input type="date" name="fdate" class="form-control" id="_fdate">
                </div>

                <!--vaxdesc-vet-->
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_vaxdesc" class="form-label">Vaccine Description</label>
                            <input type="text" name="vaxdesc" class="form-control" id="_vaxdesc" placeholder="Vaccine Description">
                        </div>

                        <div class="col">
                            <label for="_vet" class="form-label">Veterinarian</label>
                            <input type="text" name="vet" class="form-control" id="_vet" placeholder="Vet Name">
                        </div>
                    </div>
                </div>

                <!--owner-pet-name-->
                <div class="mb-3 ">
                    <div class="row">
                        <div class="col">
                            <label for="_status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="_status">
                                <option value="Incomplete" selected>Incomplete</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="recid" value="{{ $vaxrecords->recid }}">
                <input type="hidden" name="owneremail" value="{{ $vaxrecords->owneremail }}">
                <input type="hidden" name="ownername" value="{{ $vaxrecords->ownername }}">

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Add History</button>
                </div>
            </div>
        </form>
    </div>
</div>