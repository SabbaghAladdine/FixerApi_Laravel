<?php
namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return response()->json(['data' => $reports]);
    }

    public function show(Report $report)
    {
        return response()->json(['data' => $report]);
    }

    public function store(Request $request)
    {
        $report = Report::create($request->all());
        return response()->json(['data' => $report], 201);
    }

    public function update(Request $request, Report $report)
    {
        $report->update($request->all());
        return response()->json(['data' => $report]);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json(null, 204);
    }
    public function findByClient(int $id)
    {
         $reports = Report::where('client_id', $id)->get();
         if(is_null($reports)){
               response()->json(['message'=>'reports introuvable'],404);
            }
        return response()->json($reports,200);
    }
    public function findByFixer(int $id)
    {
         $reports = Report::where('fixer_id', $id)->get();
         if(is_null($reports)){
               response()->json(['message'=>'Report introuvable'],404);
            }
        return response()->json($reports,200);
    }
}
