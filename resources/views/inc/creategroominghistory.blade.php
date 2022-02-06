<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="display-6">
            Add Grooming History
        </div>
    </div>

    <div class="row justify-content-between">
        <form action="{{ route('groominghistory.store') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="_date">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="_formcheck">Service</label>
                    <div class="row form-check" id="_formcheck">
                        <div class="col">
                            <input class="form-check-input" name="service[]" type="checkbox" value="Bath" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Bath</label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" name="service[]" type="checkbox" value="Haircut" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Haircut</label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" name="service[]" type="checkbox" value="Dematting" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Dematting</label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" name="service[]" type="checkbox" value="Nail Clipping" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Nail Clipping</label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" name="service[]" type="checkbox" value="Ear Cleaning" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Ear Cleaning</label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" name="service[]" type="checkbox" value="Tooth Brushing" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Tooth Brushing</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="recid" value="{{ $groomingrecords->recid }}">
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-success">
                        Add History
                    </button>
                </div>

            </div>

        </form>
    </div>
</div>