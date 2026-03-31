<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Models\HomeStat;
use App\Models\HomeSummaryStep;
use App\Models\HomeValueItem;

class HomeController extends Controller
{
    public function index()
    {
        $homeContent = HomeContent::query()->first();

        $valueItems = HomeValueItem::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $summarySteps = HomeSummaryStep::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $stats = HomeStat::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('welcome', [
            'homeContent' => $homeContent,
            'valueItems' => $valueItems,
            'summarySteps' => $summarySteps,
            'stats' => $stats,
        ]);
    }
}
