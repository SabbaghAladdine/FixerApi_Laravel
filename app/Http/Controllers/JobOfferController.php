<?php
namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::all();
        return response()->json(['data' => $jobOffers]);
    }

    public function show(JobOffer $jobOffer)
    {
        return response()->json(['data' => $jobOffer]);
    }

    public function store(Request $request)
    {
        $jobOffer = JobOffer::create($request->all());
        return response()->json(['data' => $jobOffer], 201);
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        $jobOffer->update($request->all());
        return response()->json(['data' => $jobOffer]);
    }

    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();
        return response()->json(null, 204);
    }

    public function findByClient(int $id)
    {
         $jobOffers = JobOffer::where('client_id', $id)->get();
         if(is_null($jobOffers)){
               response()->json(['message'=>'job Offers introuvable'],404);
            }
        return response()->json($jobOffers,200);
    }
    public function findByFixer(int $id)
    {
         $jobOffers = JobOffer::where('fixer_id', $id)->get();
         if(is_null($jobOffers)){
               response()->json(['message'=>'job Offers introuvable'],404);
            }
        return response()->json($jobOffers,200);
    }
}

