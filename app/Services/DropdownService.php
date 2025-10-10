<?php

namespace App\Services;

use App\Models\Area;
use App\Models\District;
use App\Models\Salon;
use App\Models\SalonSeat;
use App\Models\SalonSit;
use App\Models\Series;
use App\Models\Service;
use App\Models\Thana;

class DropdownService
{
    public function seriesList(): array
    {
        return Series::select('id as value', 'name as text')->get()->toArray();
    }
    public function categoryList(): array
    {
        return Series::select('id as value', 'name as text')->get()->toArray();
    }
    public function authorList(): array
    {
        return Series::select('id as value', 'name as text')->get()->toArray();
    }

}
