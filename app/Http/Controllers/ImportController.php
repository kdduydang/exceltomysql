<?php

namespace App\Http\Controllers;

use App\TitleSheet;
use App\ContentSheet;
use App\Imports\TitleSheetImport;
use App\Imports\ContentSheetImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function getImport(){
		$title_sheet = TitleSheet::all();
		$year = date('Y');
		
		return view('import', [
			'title_sheet' => $title_sheet,
			'year' => $year,
		]);
	}
	
	public function postTitleSheet(){
		$file = request()->file('file');
		Excel::import(new TitleSheetImport, $file);
		return redirect()->back();
	}
	
	public function postContentSheet(Request $request){
		$title_sheet_id = TitleSheet::where('id', $request->title_sheet_id)->firstOrFail()->id;
		$file = request()->file('file');		
		Excel::import(new ContentSheetImport($title_sheet_id), $file);
		return redirect()->back();
	}
	
	public function postTotalMoneyMonth(Request $request){
		$result = DB::table('content_sheet')
					->select(DB::raw('SUM(total) as sum'))
					->whereRaw("MONTH(date) = {$request->month} AND YEAR(date) = {$request->year}")
					->first();
		return redirect()->back()->with('total_money_month', $result->sum);
	}
	
	public function postTotalMoneyYear(Request $request){
		$result = DB::table('content_sheet')
					->select(DB::raw('SUM(total) as sum'))
					->whereRaw("YEAR(date) = {$request->year}")
					->first();
		return redirect()->back()->with('total_money_year', $result->sum);
	}
}
