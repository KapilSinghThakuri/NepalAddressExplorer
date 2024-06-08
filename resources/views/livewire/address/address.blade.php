<div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="per-page d-flex align-items-center mb-3">
                            <label for="perPage" class="me-3">Per Page</label>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <select wire:model.live='perPage' class="form-select"
                                        aria-label="Default select example">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <div class="input-group mb-3">
                            <input type="text" wire:model.live.debounce.500ms='search' class="form-control"
                                placeholder="Search" aria-label="Search">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <select wire:model.live='selectedProvince' class="form-select"
                                aria-label="Default select example">
                                <option value="">Province</option>
                                @foreach ($this->getAllProvinces() as $province)
                                <option value='{{ $province->id }}'>{{ $province->province_name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select wire:model.live='selectedDistrict' class="form-select"
                                aria-label="Default select example">
                                <option value="">District</option>
                                @foreach ($this->getAllDistricts() as $district)
                                <option value='{{ $district->id }}'>{{ $district->district_name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select wire:model='selectedMunicipality' class="form-select"
                                aria-label="Default select example">
                                <option value="">Local Level</option>
                                @foreach ($this->getAllMunicipalities() as $municipality)
                                <option value='{{ $municipality->id }}'>{{ $municipality->municipality_name_eng }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>Local Level Type</option>
                                @foreach ($this->getAllMunicipalityTypes() as $municipalityType)
                                <option value='{{ $municipalityType->id }}'>{{
                                    $municipalityType->municipality_type_name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-3 address-table">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Province</th>
                                    <th>District</th>
                                    @include('livewire.address.includes.table-shortable-th',[
                                        'label' => 'Local Level',
                                        'columnName' => 'municipality_name_eng'
                                    ])
                                    <th>Local Level Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($municipalities as $municipality)
                                <tr wire:key='{{ $municipality->id }}'>
                                    <td>{{ $loop->index + $municipalities->firstItem() }}</td>
                                    <td>{{ $municipality->district->province->province_name_eng }}</td>
                                    <td>{{ $municipality->district->district_name_eng }}</td>
                                    <td>{{ $municipality->municipality_name_eng }}</td>
                                    <td>{{ $municipality->municipalityType->municipality_type_name_eng }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $municipalities->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>