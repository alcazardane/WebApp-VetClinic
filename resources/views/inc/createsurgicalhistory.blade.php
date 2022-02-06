<div class="container-fluid">
    <div class="row justify-content-between mt-4">
        <div class="display-6">
            Add History
        </div>
    </div>

    <div class="row justify-content-between mt-4">
        <form action="{{ route('surgicalhistory.store') }}" method="post">
            @csrf

            <div class="form-group">

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_datetime" class="form-label">Date/Time</label>
                            <input type="datetime-local" class="form-control" name="datetime" id="_datetime">
                        </div>
                        <div class="col">
                            <label for="_weight" class="form-label">Weight</label>
                            <input type="text" class="form-control" name="weight" id="_weight" placeholder="(kg)">
                        </div>
                        <div class="col">
                            <label for="_procedure" class="form-label">Procedure</label>
                            <input type="text" name="procedure" class="form-control" id="_procedure" placeholder="Surgical Procedure">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_pam" class="form-label">PAM</label>
                            <input type="text" name="pam" class="form-control" id="_pam" placeholder="Pre-anesthetic medications administered">
                        </div>
    
                        <div class="col">
                            <label for="_aa" class="form-label">AA</label>
                            <input type="text" name="aa" class="form-control" id="_aa" placeholder="Anesthetic administered">
                        </div>

                        <div class="col">
                            <label for="_sas" class="form-label">SAS</label>
                            <input type="text" name="sas" class="form-control" id="_sas" placeholder="Surgical Assessment Score">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_techinit" class="form-label">Technician/s Initial/s</label>
                            <input type="text" name="techinit" class="form-control" id="_techinit" placeholder="Technician/s Initial/s">
                        </div>

                        <div class="col">
                            <label for="_assinit" class="form-label">Assistant/s Initial/s</label>
                            <input type="text" name="assinit" class="form-control" id="_assinit" placeholder="Assistant/s Initial/s">
                        </div>

                        <div class="col">
                            <label for="_vetinit" class="form-label">Veterinarian Initial/s</label>
                            <input type="text" name="vetinit" class="form-control" id="_vetinit" placeholder="Veterinarian Initial/s">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_lengthsurgery" class="form-label">Approx. Length of Surgery</label>
                            <input type="text" name="lengthsurgery" class="form-control" id="_lengthsurgery" placeholder="Approx.">
                        </div>

                        <div class="col">
                            <label for="_specimens" class="form-label">Lab Specimens Taken</label>
                            <input type="text" name="specimens" class="form-control" id="_specimens" placeholder="Specimens">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_comments" class="form-label">Comments</label>
                            <input type="text" name="comments" class="form-control" id="_comments" placeholder="Comments">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="recid" value="{{ $records->recid }}">

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Insert History</button>
                </div>

            </div>

        </form>
    </div>
</div>