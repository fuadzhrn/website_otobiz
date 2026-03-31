<?php

namespace App\Http\Controllers;

use App\Models\MekanismeBusinessModel;
use App\Models\MekanismeContent;
use App\Models\MekanismeFaq;
use App\Models\MekanismeFlowStep;
use App\Models\MekanismeTerm;

class MekanismeController extends Controller
{
    public function index()
    {
        $mekanismeContent = MekanismeContent::query()->first();

        $businessModels = MekanismeBusinessModel::query()
            ->where('is_active', true)
            ->with('points')
            ->orderBy('sort_order')
            ->get();

        $flowSteps = MekanismeFlowStep::query()
            ->where('is_active', true)
            ->with('points')
            ->orderBy('sort_order')
            ->get();

        $terms = MekanismeTerm::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $faqs = MekanismeFaq::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('mekanisme', [
            'mekanismeContent' => $mekanismeContent,
            'businessModels' => $businessModels,
            'flowSteps' => $flowSteps,
            'terms' => $terms,
            'faqs' => $faqs,
        ]);
    }
}
