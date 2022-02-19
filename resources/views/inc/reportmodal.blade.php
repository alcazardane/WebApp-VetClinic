<div class="modal fade" id="reportTypeModal" tabindex="-1" aria-labelledby="reportTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="reportTypeModalLabel">Download Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('statistics.download') }}" method="GET">
                    @csrf
                    <div class="mb-3">
                        <label for="_type" class="col-form-label mb-3">Type:</label>
                        <select name="reporttype" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="_req">
                            <option value="daily">Daily</option>
                            <option value="monthly">Monthly</option>
                            <option value="annual">Annualy</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>