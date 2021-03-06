<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    
	public function new(Request $request) {

		// get the values submitted by the user
		$text = $request->input('text');
		$user = $request->input('user');
		$type = $request->input('type');

		// store the values in the database
		$report = new \App\Report();
		$report->report_type = $type;
		$report->report_text = $text;
		$report->reported_by = auth()->user()->id;
		$report->flaged_id = $user;
		$report->save();

		return redirect()->back();
	}

	public function postReport($pid) {

		// insert directly into the database
		$report = new \App\Report();
		$report->report_type = 1;
		$report->report_text = 'This post is inappropriate';
		$report->reported_by = auth()->user()->id;
		$report->flaged_id = $pid;
		$report->save();

		return redirect()->back();
	}

}
