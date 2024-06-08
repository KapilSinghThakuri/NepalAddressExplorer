<?php

namespace App\Livewire\Address;

use App\Models\District;
use App\Models\Municipality;
use App\Models\MunicipalityType;
use App\Models\Province;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Address extends Component
{
    use WithPagination;

    public $selectedProvince;
    public $selectedDistrict;
    public $selectedMunicipality;
    public $relatedDistricts;
    public $relatedMunicipalities;

    public $province, $district, $municipalityType, $municipality;
    public function mount(Province $province, District $district, MunicipalityType $municipalityType, Municipality $municipality)
    {
        $this->province = $province;
        $this->district = $district;
        $this->municipalityType = $municipalityType;
        $this->municipality = $municipality;

        $this->relatedDistricts = collect();
    }

    public function updatedSelectedProvince()
    {
        $province = $this->province->findOrFail($this->selectedProvince);
        $this->relatedDistricts = $province->districts;
        $this->selectedDistrict = null;
        $this->relatedMunicipalities = collect();
    }

    public function updatedSelectedDistrict()
    {
        $district = $this->district->findOrFail($this->selectedDistrict);
        $this->relatedMunicipalities = $district->municipalities;
        $this->selectedMunicipality = null;
    }

    #[Computed()]
    public function getAllProvinces()
    {
        return $this->province->get();
    }

    #[Computed()]
    public function getAllDistricts()
    {
        return isset($this->selectedProvince) ? $this->relatedDistricts : $this->district->get();
    }

    #[Computed()]
    public function getAllMunicipalityTypes()
    {
        return $this->municipalityType->get();
    }

    #[Computed()]
    public function getAllMunicipalities()
    {
        return isset($this->selectedDistrict) ? $this->relatedMunicipalities : $this->municipality->get();
    }

    #[Url(history:true)]
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Url(history: true)]
    public $shortBy = 'id';
    #[Url(history: true)]
    public $shortDir = 'ASC';
    
    public function setShortBy($shortByField) {
        if ($this->shortBy == $shortByField) {
            $this->shortDir = ($this->shortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }
        $this->shortBy = $shortByField;
        $this->shortDir = 'ASC';
    }

    public $perPage = 10;

    public function render()
    {
        $municipalities = $this->municipality
            ->when($this->search, function ($query) {
                $query->where('municipality_name_eng', 'like', "%{$this->search}%")
                    ->orWhereHas('district', function ($query) {
                        $query->where('district_name_eng', 'like', "%{$this->search}%");
                    })
                    ->orWhereHas('district.province', function ($query) {
                        $query->where('province_name_eng', 'like', "%{$this->search}%");
                    });
            })
            ->orderBy($this->shortBy, $this->shortDir)
            ->paginate($this->perPage);

        return view(
            'livewire.address.address',
            ['municipalities' => $municipalities]
        );
    }
}
