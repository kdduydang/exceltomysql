<?php

namespace App\Imports;

use App\ContentSheet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ContentSheetImport implements ToModel, WithCalculatedFormulas
{
	private $title_sheet_id;

    public function __construct($title_sheet_id)
    {
        $this->title_sheet_id = $title_sheet_id;
    }
	
    public function model(array $row)
    {
		
		if(!is_numeric($row[0]))
			return;
		
		$date = $row[3] . "/" . $row[2] . "/" . $row[1];
		$price = ($row[8] != null) ? $row[8] : 0;
		$total = ($row[9] != null) ? $row[9] : 0;
		
        return new ContentSheet([
			'serial' => $row[0],
            'name' => $row[4],
			'date' => date("Y-m-d", strtotime($date)),
			'type' => $row[5],
			'quantity' => $row[6],
			'price' => $price,
			'total' => $total,
			'note' => $row[10],
			'title_sheet_id' => $this->title_sheet_id,
        ]);
    }
	
	public function startRow(): int
    {
        return 6;
    }
}
