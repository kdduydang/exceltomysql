<?php

namespace App\Imports;

use App\TitleSheet;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\ToModel;

class TitleSheetImport implements WithEvents
{
    use Importable, RegistersEventListeners;
	
    public static function beforeSheet(BeforeSheet $event)
    {
		$name = $event->getSheet()->getTitle();
		$test = TitleSheet::where('name', $name)->first();
		
		if($test != null)
			return;
		
        $title_sheet = new TitleSheet();
		$title_sheet->name = $name;		
		$title_sheet->save();
    }
}