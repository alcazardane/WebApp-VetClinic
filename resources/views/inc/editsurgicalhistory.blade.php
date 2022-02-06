<div class="container-fluid">
    <div class="row justify-content-between mt-4">
        <div class="display-6">
            Edit History
        </div>
    </div>

    <div class="row justify-content-between mt-4">
        <form action="{{ route('surgicalhistory.update', $history->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_datetime" class="form-label">Date/Time</label>
                            <input type="datetime-local" class="form-control" name="datetime" id="_datetime" value="{{ date('Y-m-d\TH:i', strtotime($history->datetime)) }}">
                        </div>
                        <div class="col">
                            <label for="_weight" class="form-label">Weight</label>
                            <input type="text" class="form-control" name="weight" id="_weight" value="{{ $history->weight }}">
                        </div>
                        <div class="col">
                            <label for="_procedure" class="form-label">Procedure</label>
                            <input type="text" name="procedure" class="form-control" id="_procedure" value="{{ $history->procedure }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_pam" class="form-label">PAM</label>
                            <input type="text" name="pam" class="form-control" id="_pam" value="{{ $history->pam }}">
                        </div>
    
                        <div class="col">
                            <label for="_aa" class="form-label">AA</label>
                            <input type="text" name="aa" class="form-control" id="_aa" value="{{ $history->aa }}">
                        </div>

                        <div class="col">
                            <label for="_sas" class="form-label">SAS</label>
                            <input type="text" name="sas" class="form-control" id="_sas" value="{{ $history->sas }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_techinit" class="form-label">Technician/s Initial/s</label>
                            <input type="text" name="techinit" class="form-control" id="_techinit" value="{{ $history->techinit }}">
                        </div>

                        <div class="col">
                            <label for="_assinit" class="form-label">Assistant/s Initial/s</label>
                            <input type="text" name="assinit" class="form-control" id="_assinit" value="{{ $history->assinit }}">
                        </div>

                        <div class="col">
                            <label for="_vetinit" class="form-label">Veterinarian Initial/s</label>
                            <input type="text" name="vetinit" class="form-control" id="_vetinit" value="{{ $history->vetinit }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_lengthsurgery" class="form-label">Approx. Length of Surgery</label>
                            <input type="text" name="lengthsurgery" class="form-control" id="_lengthsurgery" value="{{ $history->lengthsurgery }}">
                        </div>

                        <div class="col">
                            <label for="_specimens" class="form-label">Lab Specimens Taken</label>
                            <input type="text" name="specimens" class="form-control" id="_specimens" value="{{ $history->specimens }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_comments" class="form-label">Comments</label>
                            <input type="text" name="comments" class="form-control" id="_comments" value="{{ $history->comments }}">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="recid" value="{{ $records->recid }}">

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Update History</button>
                </div>

            </div>

        </form>
    </div>
</div>