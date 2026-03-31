<?php

namespace App\Http\Controllers;

use App\Models\ProductContent;
use App\Models\ProductPackage;
use App\Models\ProductSimulationContent;
use App\Models\ProductSimulationHighlight;
use App\Models\ProductUnit;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $productContent = ProductContent::query()->first();

        $packages = ProductPackage::query()
            ->where('is_active', true)
            ->with([
                'benefits' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $units = ProductUnit::query()
            ->where('is_active', true)
            ->with([
                'galleries' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $simulationContent = ProductSimulationContent::query()->first();

        $simulationHighlights = ProductSimulationHighlight::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $productSpecsData = [];
        $defaultSpecKey = 'confero';

        foreach ($units as $index => $unit) {
            $specKey = (string) Str::slug($unit->name ?: ('unit-' . $unit->id));
            if ($specKey === '') {
                $specKey = 'unit-' . $unit->id;
            }

            if ($index === 0) {
                $defaultSpecKey = $specKey;
            }

            $images = [];
            foreach ($unit->galleries as $gallery) {
                $images[] = [
                    $gallery->image_path,
                    $gallery->alt_text ?: ('Galeri ' . $unit->name),
                ];
            }

            if (empty($images) && $unit->main_image) {
                $images[] = [$unit->main_image, $unit->name . ' preview'];
            }

            $productSpecsData[$specKey] = [
                'name' => $unit->name,
                'specs' => [
                    ['Kategori', $unit->category ?: '-'],
                    ['Jenis Energi', $unit->energy_type ?: '-'],
                    ['Kapasitas Penumpang', $unit->capacity ?: '-'],
                    ['Kegunaan Operasional', $unit->operational_use ?: '-'],
                    ['Keunggulan Utama', $unit->main_advantages ?: '-'],
                ],
                'images' => $images,
            ];

            $unit->spec_key = $specKey;
        }

        if (empty($productSpecsData)) {
            $productSpecsData = [
                'confero' => [
                    'name' => 'Wuling Confero',
                    'specs' => [
                        ['Kategori', 'Konvensional'],
                        ['Jenis Energi', 'Bensin'],
                        ['Kapasitas Penumpang', 'Family / operasional multi-penumpang'],
                        ['Kegunaan Operasional', 'Transportasi online dan B2B'],
                        ['Keunggulan Utama', 'Kabin lega, cocok untuk operasional, nilai kemitraan terjangkau'],
                    ],
                    'images' => [
                        ['https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1400&q=80', 'Wuling Confero tampak depan'],
                    ],
                ],
            ];
        }

        return view('produk', [
            'productContent' => $productContent,
            'packages' => $packages,
            'units' => $units,
            'simulationContent' => $simulationContent,
            'simulationHighlights' => $simulationHighlights,
            'productSpecsData' => $productSpecsData,
            'defaultSpecKey' => $defaultSpecKey,
        ]);
    }
}
