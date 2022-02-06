<div class="container-fluid">

    <div class="row justify-content-between">
        <div class="display-6">
            Edit History
        </div>
    </div>
    
    <div class="row justify-content-between-mt-4">
        <form method="POST" action="{{ route('groominghistory.update', $history->id) }}">
            @csrf
            @method('PUT')
    
            <div class="form-group">
                <!--owner-pet-name-->
                <div class="mb-3 ">
                    <div class="row">
                        <div class="col">
                            <label for="_date" class="form-label">Date (DD/MM/YYYY)</label><br>
                            <input type="date" class="form-control" name="date" id="_date" value="{{ date('Y-m-d', strtotime($history->date)) }}">
                        </div>
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="_service">Service</label>
                    <label for="_formcheck">Service</label>
                    <div class="row form-check" id="_formcheck">
                        <div class="col">
                            <input 
                                class="form-check-input" 
                                name="service[]" 
                                type="checkbox" 
                                value="Bath" 
                                id="flexCheckDefault"
                                @if (in_array('Bath', explode(', ', $history->services)))
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="flexCheckDefault">Bath</label>
                        </div>
                        <div class="col">
                            <input 
                                class="form-check-input" 
                                name="service[]" 
                                type="checkbox" 
                                value="Haircut" 
                                id="flexCheckDefault"
                                @if (in_array('Haircut', explode(', ', $history->services)))
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="flexCheckDefault">Haircut</label>
                        </div>
                        <div class="col">
                            <input 
                                class="form-check-input" 
                                name="service[]" 
                                type="checkbox" 
                                value="Dematting" 
                                id="flexCheckDefault"
                                @if (in_array('Dematting', explode(', ', $history->services)))
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="flexCheckDefault">Dematting</label>
                        </div>
                        <div class="col">
                            <input 
                                class="form-check-input" 
                                name="service[]" 
                                type="checkbox" 
                                value="Nail Clipping" 
                                id="flexCheckDefault"
                                @if (in_array('Nail Clipping', explode(', ', $history->services)))
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="flexCheckDefault">Nail Clipping</label>
                        </div>
                        <div class="col">
                            <input 
                                class="form-check-input" 
                                name="service[]" 
                                type="checkbox" 
                                value="Ear Cleaning" 
                                id="flexCheckDefault"
                                @if (in_array('Ear Cleaning', explode(', ', $history->services)))
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="flexCheckDefault">Ear Cleaning</label>
                        </div>
                        <div class="col">
                            <input 
                                class="form-check-input" 
                                name="service[]" 
                                type="checkbox" 
                                value="Tooth Brushing" 
                                id="flexCheckDefault"
                                @if (in_array('Tooth Brushing', explode(', ', $history->services)))
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="flexCheckDefault">Tooth Brushing</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="recid" value="{{ $history->recid }}">
                <!--SUBMIT-->
                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Update History</button>
                </div>
            </div>
        </form>
    </div>
    
</div>  